<?php
    include_once("php/bdd.php");

    $access = isset($_SESSION["b_admin"]) ? $_SESSION["b_admin"] : die();
    if (!$access){
        die("<p>Vous n'avez pas la permission d'accéder au panel administrateur!</p>");
    }

    $action = isset($_POST["action"]) ? $_POST["action"] : die();
    if (empty($action)){
        die();
    }
    const actions = array(
        "addprod"
    );

    function swi_addprod(){
        // TODO finish it!
        const required = array("CodeArt", "NomArt", "ImgArt", "DescArt", "PrixArt", "CodeCat");
        foreach(required as $var){
            if (!isset($_POST[$var]) || empty($_POST[$var])) {
                die("Erreur! Vous avez oublié de renseigner des champs requis!");
            }
            ${$var} = $_POST[$var];
        }

        $req = $bdd->prepare("INSERT INTO ARTICLE VALUES(:codeart, :nomart, :imgart, :descart, :prixart, :codecat");
        $req->execute(array(
            "codeart" => $CodeArt,
            "nomart" => $NomArt,
            "imgart" => $ImgArt,
            "descart" => $DescArt,
            "prixart" => $PrixArt,
            "codecat" => $CodeCat
        ));
        ?>
        <p>Ajout effectué!</p>
        <script>setTimeout(`location.href = '/admin'`,4000)</script>
        <?php
    }

    if (in_array($action, actions, true)){
        switch($action){
            case "addprod": swi_addprod(); break;
        }
    } else {
        echo "<p>";
    }
?>
