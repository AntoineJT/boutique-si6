<?php 
    session_start();
    $action = isset($_GET["action"]) ? $_GET["action"] : "products";
    if ($action === "disconnect"){
        $_SESSION = array();
        header("Location: /");
        die();
    } else
    if ($action === "addprod"){
        $prod = isset($_POST["codeprod"]) ? $_POST["codeprod"] : null;
        $qte = isset($_POST["qte"]) ? $_POST["qte"] : null;
        $qte = is_numeric($_POST["qte"]) ? $qte : null;

        if (!is_null($prod) && !is_null($qte)){
            if (!isset($_SESSION["products"][$prod])){
                $_SESSION["products"][$prod] = 0;
            }
            $_SESSION["products"][$prod] += $qte;
        }
        echo var_dump($_SESSION["products"]); // debug thing
    }
?>
<!DOCTYPE HTML>
<html lang="fr">
    <head>
        <title>Le site du moins un</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="/style/common.css">
    </head>
    <body>
        <?php
            include("./assets/internal/header.php");

            const pages = array(
                "products",
                "login",
                "register",
                "news",
                "contact"
            );

            if (in_array($action, pages, true)){
                $file = "./assets/internal/" . $action . "_content";
                $file = (file_exists($file . ".htm")) ? $file.".htm" : $file.".php";
                include($file);
            } else {
                // TODO Include some error page : 404 not found or thing alike!
            }
            
            include("./assets/internal/footer.htm");
        ?>
    </body>
</html>
