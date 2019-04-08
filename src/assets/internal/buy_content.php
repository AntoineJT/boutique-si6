<style>
    aside {
        display:none;
    }
</style>
<?php
    include_once("php/bdd.php");
    include_once("php/bill.php");

    if (isset($_SESSION["products"])){
        $products = $_SESSION["products"];
        if (count($products) !== 0){
            if (isset($_SESSION["id"])){
                printBill($bdd, null, null, $products);
            } else {
                ?><p>Vous devez être connecté pour passer commande! <a href="/login">Se connecter</a> / <a href="/register">S'inscrire</a></p><?php
            }
        } else {
            ?>
            <p>Votre panier est vide! <a href="/products">Ajouter des produits au panier</a></p>
            <script>setTimeout(`location.href = '/products'`,4000)</script><?php
        }
    }
?>
