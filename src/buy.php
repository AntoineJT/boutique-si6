<?php
    session_start();
    if (!isset($_SESSION["pseudo"])){
        ?>
            <p>Vous devez être connecté pour passer commande!</p>
            <a href="/login">Se connecter</a>
            <a href="/register">S'inscrire</a>
        <?php
    } else {
        
    }
?>
