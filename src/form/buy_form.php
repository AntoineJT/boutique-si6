<?php
    include_once("../php/bdd.php");
    include_once("../php/comm_util.php");
    session_start();

    if (isset($_SESSION["id"])){
        if (count($_SESSION["products"]) !== 0){
            $codecomm = getNextCommId($bdd);
            $req = $bdd->prepare("INSERT INTO COMMANDE VALUES(?, ?, ?, ?)");
            $req->execute(array($codecomm, gmdate('Y-m-d'), $_SESSION["total"], $_SESSION["id"]));
            foreach($_SESSION["products"] as $prod => $qte){
                $req = $bdd->prepare("INSERT INTO ACHETER VALUES(?, ?, ?)");
                $req->execute(array($prod, $codecomm, $qte));
            }
            $_SESSION["products"] = array();
            echo "La commande N°" . $codecomm . " a bien été enregistrée!";
            // TODO 
        } else {
            ?>
                <p>Votre panier est vide!</p>
                <a href="/products">Ajouter des produits au panier</p>
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
