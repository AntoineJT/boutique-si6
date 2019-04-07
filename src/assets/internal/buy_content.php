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
            ?>
            <table>
                <thead>
                    <tr>
                        <th colspan="5">Facture</th>
                    </tr>
                    <tr>
                        <th>Commande N°<?php echo getNextCommId($bdd); ?></th>
                        <th colspan="2">Date : <?php echo gmdate("d/m/Y"); ?></th>
                        <th colspan="2">Client N°<?php echo $_SESSION["id"];?> - Pseudo : <?php echo $_SESSION["pseudo"]; ?></th>
                    </tr>
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
            </table><?php
        } else {
            ?>
            <p>Votre panier est vide! <a href="/products">Ajouter des produits au panier</a></p>
            <script>setTimeout(`location.href = '/products'`,4000)</script><?php
        }
    }
?>
