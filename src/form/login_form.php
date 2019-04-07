<?php
    session_start();
    include_once("../php/bdd.php");

    function invalid_args(){
        die("Erreur! Vous avez oublié de renseigner le pseudo et/ou le mot de passe!");
    }

    const required = array("user", "pass");
    foreach(required as $var){
        if (!isset($_POST[$var]) || empty($_POST[$var])) {
            echo "Erreur! Vous avez oublié de renseigner des champs requis!";
            ?>
                <br><a href="/login">S'enregistrer</a>
                <script>setTimeout(`location.href = '/login'`,4000)</script>
            <?php
            die();
        }
        ${$var} = $_POST[$var];
    }

    $req = $bdd->prepare("SELECT IdCli, TypeCli, Mdp FROM CLIENT WHERE PseudoCli = ?");
    $req->execute(array($user));

    if ($req->rowCount() === 0){
        ?>
            <p>Ce compte n'existe pas!</p>
            <a href="/register">S'enregistrer</a>
            <script>setTimeout(`location.href = '/register'`,4000)</script>
        <?php
    } else {
        $resp = $req->fetch(PDO::FETCH_ASSOC);
        if (password_verify($pass, $resp["Mdp"])){
            $_SESSION["id"] = $resp["IdCli"];
            $_SESSION["b_admin"] = ($resp["TypeCli"] === 0) ? false : true;
            $_SESSION["pseudo"] = $user;
            ?>
                <p>Vous êtes connecté!</p>
                <a href="/index">Retour à la racine du site</a>
                <script>setTimeout(`location.href = '/index'`,4000)</script>
            <?php
        } else {
            ?>
                <p>Mot de passe incorrect!</p>
                <a href="/login">Revenir à l'écran de connexion</a>
                <script>setTimeout(`location.href = '/login'`,4000)</script>
            <?php
        }
    }
?>
