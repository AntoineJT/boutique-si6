<?php
    include_once("php/bdd.php");

    $access = isset($_SESSION["b_admin"]) ? $_SESSION["b_admin"] : die();
    if (!$access){
        die("<p>Vous n'avez pas la permission d'accéder au panel administrateur!</p>");
    }

?>
<h1 style="text-align:center;color:red">This is clearly in a WIP state!</h1> <!-- This is shit, just to advice that this is in a WIP state -->
<details open>
    <summary>Article</summary>
    <form method="POST" action="./form/admin_form.php">
        <fieldset>
            <legend>Ajouter un article</legend>
            <label for="CodeArt">Code : </label><input type="text" min="3" max="3" name="CodeArt" id="CodeArt" required><br>
            <label for="NomArt">Nom : </label><input type="text" max="50" name="NomArt" id="NomArt" required><br>
            <label for="ImgArt">Nom de l'image : </label><input type="text" max="50" name="ImgArt" id="ImgArt" required><br>
            <label for="DescArt">Description : </label><input type="text" max="255" name="DescArt" id="DescArt" required><br>
            <label for="PrixArt">Prix : </label><input type="number" step="0.1" name="PrixArt" id="PrixArt" required><br>
            <select name="CodeCat">
            <?php
                $req = $bdd->query("SELECT * FROM CATEGORIE");
                $results = $req->fetchAll(PDO::FETCH_ASSOC);
                foreach($results as $val){
                    echo '<option value="' . $val["CodeCat"] . '">' . $val["NomCat"] . '</option>';
                }
            ?>
            </select>
            <input type="hidden" name="action" value="addprod">
            <input type="submit" value="Se connecter">
        </fieldset>
    </form>
</details>
