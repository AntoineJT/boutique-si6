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
    // TODO Finish
?>