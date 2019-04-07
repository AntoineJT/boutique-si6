<style>
    aside {
        display:none;
    }
</style>
<?php
    include_once("php/bdd.php");
    include_once("php/comm_util.php");

    if (isset($_SESSION["products"])){
        $products = $_SESSION["products"];
        if (count($products) !== 0){
            $req = $bdd->prepare("SELECT NomCli, PnomCli, AdrCli, CPCli, VilleCli, MailCli FROM CLIENT WHERE IdCli = ?");
            $req->execute(array($_SESSION["id"]));
            $cli_infos = $req->fetch(PDO::FETCH_ASSOC);
            ?>
            <section id="bill">
                <h2>Facture n°<?php echo getNextCommId($bdd); ?></h2>
                <span class="italic">Tous les prix incluent la TVA</span><br>
                <p>
                    <details open>
                        <summary>Détails</summary>
                        Date : <?php echo gmdate("d/m/Y"); ?><br>
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
                        Identifiant : <?php echo $_SESSION["id"];?><br>
                        Pseudo : <?php echo $_SESSION["pseudo"]; ?><br>
                        Patronyme : <?php echo strtoupper($cli_infos["NomCli"]) . " " . ucfirst($cli_infos["PnomCli"]); ?><br>
                        <details open>
                            <summary>Adresse</summary>
                            <?php echo $cli_infos["AdrCli"]; ?><br>
                            <?php echo $cli_infos["CPCli"] . " " . $cli_infos["VilleCli"]; ?><br>
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
                    <tbody><?php
                        foreach($products as $prod => $qte){
                            ?>
                            <tr><?php
                                $req = $bdd->prepare("SELECT NomArt, PrixArt FROM ARTICLE WHERE CodeArt = ?");
                                $req->execute(array($prod));
                                $resp = $req->fetch(PDO::FETCH_ASSOC);
                                echo '<th>' . $prod . '</th>' .
                                    '<th>' . $resp["NomArt"] . '</th>' .
                                    '<th>' . $resp["PrixArt"] . '</th>' .
                                    '<th>' . $qte . '</th>' .
                                    '<th>' . $qte * $resp["PrixArt"] . '</th>';
                            ?>
                            </tr><?php
                        }
                    ?>
                        <tr>
                            <th colspan="3">&nbsp</th>
                            <th>Prix Total</th>
                            <th><?php echo $_SESSION["total"]; ?></th>
                        </tr>
                    </tbody>
                </table>
            </section>
            <a class="button" href="/form/buy_form.php">Valider</a><?php
        } else {
            ?>
            <p>Votre panier est vide! <a href="/products">Ajouter des produits au panier</a></p>
            <script>setTimeout(`location.href = '/products'`,4000)</script><?php
        }
    }
?>
