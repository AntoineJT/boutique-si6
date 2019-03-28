<?php
    session_start();
    include_once("../php/bdd.php");

    const required = array("nick", "pass", "pass2", "name", "fname", "birth", "adr", "cp", "city", "mail");
    foreach(required as $var){
        if (!isset($_POST[$var]) || empty($_POST[$var])) {
            die("Erreur! Vous avez oublié de renseigner des champs requis!");
        }
        ${$var} = $_POST[$var];
    }
    
    if ($pass !== $pass2){
        die("Erreur! Les mots de passe ne correspondent pas!");
    }
    $pass = password_hash($pass, PASSWORD_BCRYPT);
    
    $req = $bdd->prepare("INSERT INTO CLIENT VALUES(:nick, :pass, :name, :fname, :birth, :adr, :cp, :city, :mail)");
    $req->execute(array(
        ":nick" => $nick,
        ":pass" => $pass,
        ":name" => $name,
        ":fname" => $fname,
        ":birth" => $birth,
        ":adr" => $adr,
        ":cp" => $cp,
        ":city" => $city,
        ":mail" => $mail
    ));

    $_SESSION["pseudo"] = $nick;
    echo "Vous êtes maintenant inscrit et connecté!";
    ?>
        <br><a href="/index">Retour à la racine du site</a>
        <script>setTimeout(`location.href = '/index'`,4000)</script>
    <?php
?>
