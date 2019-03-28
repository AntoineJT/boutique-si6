<?php 
    session_start();
    $action = isset($_GET["action"]) ? $_GET["action"] : "products";
    if ($action === "disconnect"){
        $_SESSION = array();
        header("Location: /");
        die();
    }
?>
<!DOCTYPE HTML>
<html lang="fr">
    <head>
        <title>Shoot2BeSoft</title>
        <meta charset="utf-8">
        <!--<link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">-->
        <link rel="stylesheet" type="text/css" href="/style/common.css">
    </head>
    <body>
        <?php
            include("./assets/internal/header.htm");

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

            if (isset($_SESSION["pseudo"])){
                ?><input type="button" value="Se déconnecter" onclick="window.location = '/?action=disconnect'"><?php
            }
            
            include("./assets/internal/footer.htm");
        ?>
    </body>
</html>
