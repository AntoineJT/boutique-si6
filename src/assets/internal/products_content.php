<?php
    // include_once("php/bdd.php");
?>
<form action="/products" method="POST">
    <select name="categ">
        <?php /*
            $req = $bdd->query("SELECT * FROM CATEGORIE");
            $req->setFetchMode(PDO::FETCH_ASSOC);
            foreach($req->fetchAll() as $val){
                echo '<option value="' . $val["CodeCat"] . '">' . $val["NomCat"] . '</option>';
            } */
        ?>
    </select>
    <input type="submit" value="OK">
</form>
<?php /*
    $cat = (isset($_POST["categ"]) && !empty($_POST["categ"])) ? $_POST["categ"] : die(); // Si la catégorie n'est pas définie, on arrête le script
    $req = $bdd->prepare("SELECT * FROM ARTICLE WHERE CodeCat = ?");
    $req->setFetchMode(PDO::FETCH_BOTH); // for debug reasons both for now
    $req->execute(array($cat));
    /*
    foreach($req->fetchAll() as $val){
        ?>
            <section>
                <?php
                    // TODO Faire mise en forme des articles, etc.
                    // CodeArt
                    // ImgArt
                    // DescArt
                    // PrixArt
                    // img
                    // texte
                ?>
            </section>
        <?php
    } */
    // TODO Finish
?>
<!-- This is a test -->
<section class="product">
    <h2>Le guide des mauvaises pratiques</h2>
    <img src="/assets/images/le_guide_des_bad_practices.png" alt="Le guide des mauvaises pratiques">
    <p class="italic">Description de test</p>
    <p><span class="bold">Prix:</span> 20€</p>
    <form method="POST" action="/?action=addprod"> <?php // Add some action form ?>
        <input type="hidden" name="codeprod" value="gbd"> <!-- Mauvaise forme de CodeProd -->
        <input type="number" name="qte" value="1">
        <input type="submit" value="Ajouter au panier">
    </form>
</section>
