<?php
    include_once("../php/bdd.php");
    include_once("../php/bill.php");
    session_start();

    function getNextCommId($bdd){
        $req = $bdd->query("SELECT COUNT(CodeComm) AS r FROM COMMANDE");
        $codecomm = $req->fetch(PDO::FETCH_ASSOC);
        return $codecomm["r"] + 1;
    }
    
    if (isset($_SESSION["id"])){
        if (count($_SESSION["products"]) !== 0){
            $codeComm = getNextCommId($bdd);
            $req = $bdd->prepare("INSERT INTO COMMANDE(DateComm, PrixTotal, IdCli) VALUES(?, ?, ?)");
            $req->execute(array(gmdate('Y-m-d'), $_SESSION["total"], $_SESSION["id"]));
            foreach($_SESSION["products"] as $prod => $qte){
                $req = $bdd->prepare("INSERT INTO ACHETER VALUES(?, ?, ?)");
                $req->execute(array($prod, $codeComm, $qte));
            }
            $_SESSION["products"] = array();
            ?>
            <head>
                <link rel="stylesheet" type="text/css" href="/style/common.css">
                <meta charset="utf-8">
                <script src="/scripts/html2pdf.bundle.min.js"></script>
            </head>
            <?php
            echo "<p>La commande N°" . $codeComm . " a bien été enregistrée!</p>";
            printBill($bdd, $codeComm, $_SESSION["id"]);
            ?>
                <button onclick="html2pdf(document.getElementById('bill'))">Télécharger le pdf</button>
            <?php
        } else {
            ?>
                <p>Votre panier est vide!</p>
                <a href="/products">Ajouter des produits au panier</a>
                <script>setTimeout(`location.href = '/products'`,4000)</script>
            <?php
        }
    } else {
        ?>
            <p>Vous devez être connecté pour passer commande!</p>
            <a href="/login">Se connecter</a>
            <a href="/register">S'inscrire</a>
        <?php
    }
?>
