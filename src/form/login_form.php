<?php
    session_start();
    include_once("../php/bdd.php");

    function invalid_args(){
        die("Erreur! Vous avez oublié de renseigner le pseudo et/ou le mot de passe!");
    }

    $user = isset($_POST["user"]) ? $_POST["user"] : invalid_args();
    $pass = isset($_POST["pass"]) ? $_POST["pass"] : invalid_args();

    $req = $bdd->prepare("SELECT CodeCli, Mdp FROM CLIENT WHERE CodeCli = ?");
    $req->execute(array($user));

    if ($req->rowCount() === 0){
        echo "Ce compte n'existe pas!";
        ?>
            <br><a href="/register">S'enregistrer</a>
            <script>setTimeout(`location.href = '/register'`,4000)</script>
        <?php
    } else {
        $resp = $req->fetch(PDO::FETCH_ASSOC);
        if (password_verify($pass, $resp["Mdp"])){
            echo "Vous êtes connecté!";
            $_SESSION["pseudo"] = $user;
            ?>
                <br><a href="/index">Retour à la racine du site</a>
                <script>setTimeout(`location.href = '/index'`,4000)</script>
            <?php
        } else {
            echo("Mot de passe incorrect!");
            ?>
                <br><a href="/login">Revenir à l'écran de connexion</a>
                <script>setTimeout(`location.href = '/login'`,4000)</script>
            <?php
        }
    }
?>
