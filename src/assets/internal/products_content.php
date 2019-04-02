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
    foreach($req->fetchAll() as $val){
        // TODO Faire mise en forme des articles, etc.
    }
    // TODO Finish
?>