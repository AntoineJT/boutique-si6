<?php
    include_once("php/bdd.php");
    session_start();
    if (!isset($_SESSION["products"])){
        $_SESSION["products"] = array();
    }
    $action = isset($_GET["action"]) ? $_GET["action"] : "products";

    function swi_disconnect(){
        $_SESSION = array();
        header("Location: /");
        die();
    }
    function swi_addprod(){
        $prod = isset($_POST["codeprod"]) ? $_POST["codeprod"] : null;
        $qte = isset($_POST["qte"]) ? $_POST["qte"] : null;
        $qte = is_numeric($_POST["qte"]) ? $qte : null;

        if (!is_null($prod) && !is_null($qte)){
            if ($qte > 0){
                if (!isset($_SESSION["products"][$prod])){
                    $_SESSION["products"][$prod] = 0;
                }
                $_SESSION["products"][$prod] += $qte;
            } else {
                echo "<script>alert('Vous avez sélectionné une quantité invalide!');window.location = '/products'</script>";
            }
        }
    }

    switch($action){
        case "disconnect": swi_disconnect(); break;
        case "addprod": swi_addprod(); break;
        case "clear": $_SESSION["products"] = array(); break;
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
        <?php include_once("./assets/internal/header.php"); ?>
        <aside>
            <h2>Votre Panier</h2>
            <ul>
                <?php
                    $total_fac = 0;
                    foreach($_SESSION["products"] as $key => $val){
                        $req = $bdd->prepare("SELECT NomArt, PrixArt FROM ARTICLE WHERE CodeArt = ?");
                        $req->execute(array($key));
                        $results = $req->fetch(PDO::FETCH_ASSOC);
                        $price = $results["PrixArt"];
                        $total = $val*$price;
                        echo "<li><span class='underlined'>" . $results["NomArt"] . "</span> (" . $price . "€) x " . $val . " = " . $total . "€</li>";
                        $total_fac += $total;
                    }
                    $_SESSION["total"] = $total_fac;
                ?>
            </ul>
            <p class="bold">Total : <?php echo $total_fac . "€"; ?></p>
            <a href="/buy">Acheter</a>
            <a href="/clear">Vider</a>
        </aside>
        <?php
            const pages = array(
                "products",
                "login",
                "register",
                "news",
                "contact",
                "buy",
                "showbill"
            );

            if (in_array($action, pages, true)){
                $file = "./assets/internal/" . $action . "_content";
                $file = (file_exists($file . ".htm")) ? $file . ".htm" : $file . ".php";
                include_once($file);
            }
            
            include_once("./assets/internal/footer.htm");
        ?>
    </body>
</html>
