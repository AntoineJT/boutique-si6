<?php
    //include_once('../php/bdd.php');

    function kill(){
        echo 'Erreur! Vous avez oublié de renseigner le pseudo et/ou le mot de passe!';
        die();
        return null;
    }

    $user = isset($_POST['user']) ? $_POST['user'] : kill();
    $pass = isset($_POST['pass']) ? $_POST['pass'] : kill();

    // TODO Continuer
?>
