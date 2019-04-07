<header>
    <h1>Le Site du Moins Un</h1>
    <?php
        if (isset($_SESSION["pseudo"])){
            echo '<p>Connecté en tant que ' . $_SESSION["pseudo"] . '</p>';
        }
    ?>
</header>
<nav>
    <ul>
        <li><a href="/products">Nos Produits</a></li>
        <li><a href="/news">Actualités</a></li>
        <?php
            if (!isset($_SESSION["id"])){
                ?><li><a href="/login">Se connecter</a></li><?php
            } else {
                ?><li><a href="/?action=disconnect">Se déconnecter</a></li><?php
                if ($_SESSION["b_admin"]){
                    ?><li><a href="#">Panel Admin</a></li><?php
                }
            }
        ?>
        <li><a href="/contact">Nous contacter</a></li>
    </ul>
</nav>
