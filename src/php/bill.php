<?php

const DEVISE = "€";

// Usage
// printBill($bdd, null, null, $products) -> preview
// printBill($bdd, $commId, $clientId) -> registered one
function printBill($bdd, $commId, $clientId, $products=null){
    $preview = false;
    $total = null;
    if (is_null($commId) && is_null($clientId)){
        $clientId = $_SESSION["id"];
        $total = $_SESSION["total"];
        $preview = true;
    }
    $billDate = null;
    $clientNick = null;
    $req = $bdd->prepare("SELECT NomCli, PnomCli, AdrCli, CPCli, VilleCli, MailCli FROM CLIENT WHERE IdCli = ?");
    $req->execute(array($_SESSION["id"]));
    $cli_infos = $req->fetch(PDO::FETCH_ASSOC);
    $clientName = $cli_infos["NomCli"];
    $clientFName = $cli_infos["PnomCli"];
    $clientAddr = $cli_infos["AdrCli"];
    $clientCP = $cli_infos["CPCli"];
    $clientCity = $cli_infos["VilleCli"];
    $clientMail = $cli_infos["MailCli"];

    if (is_null($commId)){ // Preview
        if (is_null($products)){
            return false;
        }

        $commId = "X"; // this is a preview one!
        $billDate = gmdate("d/m/Y");
        $clientNick = $_SESSION["pseudo"];
    } else // Registered one!
    if (is_null($products)){ // TODO Gérer les prix des produits en fonction de l'historique, mais pas le temps de le faire
        if (is_null($clientId)){
            return false;
        }

        $req = $bdd->prepare(
            "SELECT CodeArt, Qte
            FROM ACHETER INNER JOIN COMMANDE
            WHERE COMMANDE.CodeComm = ACHETER.CodeComm
            AND IdCli = ?
            AND COMMANDE.CodeComm = ?");
        $req->execute(array($clientId,$commId));
        if ($req->rowCount() === 0){
            echo "Cette facture n'existe pas!";
            return;
        }
        $resp = $req->fetchAll(PDO::FETCH_ASSOC);
        $products = array();
        foreach($resp as $val){
            $products[$val["CodeArt"]] = $val["Qte"];
        }

        $req = $bdd->prepare("SELECT DateComm,PrixTotal FROM COMMANDE WHERE CodeComm = ?");
        $req->execute(array($commId));
        $results = $req->fetch(PDO::FETCH_ASSOC);
        $billDate = $results["DateComm"];
        $billDate = substr($billDate,8,2).'/'.substr($billDate,5,2).'/'.substr($billDate,0,4);
        $total = $results["PrixTotal"];
        $req = $bdd->prepare("SELECT PseudoCli FROM CLIENT WHERE IdCli = ?");
        $req->execute(array($clientId));
        $results = $req->fetch(PDO::FETCH_ASSOC);
        $clientNick = $results["PseudoCli"];
        
    } else {
        return false;
    }
    
    echo 
        '<section class="bill">
            <h2>Facture n°' . $commId . '</h2>
            <p>
                <details open>
                    <summary>Détails</summary>
                    Date : ' . $billDate . '<br>
                    <details open>
                        <summary>Prestataire</summary>
                        Dénomination : Le site du moins un<br>
                        <details open>
                            <summary>Adresse</summary>
                            11 rue du brocoli en fleurs<br>
                            75018 Paris<br>
                            France
                        </details>
                    </details>
                </details>
                <details open>
                    <summary>Client</summary>
                    Identifiant : ' . $clientId . '<br>
                    Pseudo : ' . $clientNick . '<br>
                    Patronyme : ' . strtoupper($clientName) . ' ' . ucfirst($clientFName) . '<br>
                    Courriel : ' . $clientMail . '<br>
                    <details open>
                        <summary>Adresse</summary>' . 
                        $clientAddr . '<br>' .
                        $clientCP . ' ' . $clientCity . '<br>
                        France
                    </details>
                </details>
            </p>
            <table>
                <thead>
                    <tr>
                        <th colspan="5">VOTRE COMMANDE</th>
                    </tr>
                    <tr>
                        <th>Produit</th>
                        <th>Nom</th>
                        <th>Prix</th>
                        <th>Quantité</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>';
    foreach($products as $prod => $qte){
        $req = $bdd->prepare("SELECT NomArt, PrixArt FROM ARTICLE WHERE CodeArt = ?");
        $req->execute(array($prod));
        $resp = $req->fetch(PDO::FETCH_ASSOC);
        echo 
                    '<tr>' . 
                        '<th>' . $prod . '</th>' .
                        '<th>' . $resp["NomArt"] . '</th>' .
                        '<th>' . $resp["PrixArt"] . DEVISE . '</th>' .
                        '<th>' . $qte . '</th>' .
                        '<th>' . $qte * $resp["PrixArt"] . DEVISE . '</th>' . 
                    '</tr>';
    }
    echo 
                    '<tr>
                        <th colspan="3">&nbsp</th>
                        <th>Prix Total</th>
                        <th>' . $total . DEVISE . '</th>
                    </tr>
                </tbody>
            </table>
        </section>';
    if ($preview){
        ?><a class="button" href="/form/buy_form.php">Valider</a><?php
    }
}
?>
