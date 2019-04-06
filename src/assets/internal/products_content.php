<?php
    include_once("php/bdd.php");
?>
<form action="/products" method="POST">
    <select name="categ">
        <?php
            $req = $bdd->query("SELECT * FROM CATEGORIE");
            $req->setFetchMode(PDO::FETCH_ASSOC);
            foreach($req->fetchAll() as $val){
                echo '<option value="' . $val["CodeCat"] . '">' . $val["NomCat"] . '</option>';
            }
        ?>
    </select>
    <input type="submit" value="OK">
</form>
<?php
    $cat = (isset($_POST["categ"]) && !empty($_POST["categ"])) ? $_POST["categ"] : die(); // Si la catégorie n'est pas définie, on arrête le script
    $req = $bdd->prepare("SELECT * FROM ARTICLE WHERE CodeCat = ?");
    $req->setFetchMode(PDO::FETCH_BOTH); // for debug reasons both for now
    $req->execute(array($cat));

    foreach($req->fetchAll() as $val){
        $name = $val["NomArt"];
        $img = $val["ImgArt"];
        $desc = $val["DescArt"];
        $price = $val["PrixArt"];
        $code = $val["CodeArt"];
        ?>
        <section class="product">
            <h2><?php echo $name; ?></h2>
            <?php echo '<img src="/assets/images/' . $img . '" alt="' . $name . '">'; ?>
            <p class="italic"><?php echo $desc; ?></p>
            <p><span class="bold">Prix: </span><?php echo $price; ?>€</p>
            <form method="POST" action="/?action=addprod">
                <?php echo '<input type="hidden" name="codeprod" value="' . $code . '">'; ?>
                <input type="number" name="qte" value="1">
                <input type="submit" value="Ajouter au panier">
            </form>
        </section>
        <?php
    }
?>
