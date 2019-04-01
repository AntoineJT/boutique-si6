<header>
    <h1>Le Site du Moins Un</h1>
</header>
<nav>
    <ul>
        <li><a href="/products">Nos Produits</a></li>
        <li><a href="/news">Actualités</a></li>
        <?php
            if (!isset($_SESSION["pseudo"])){
                ?><li><a href="/login">Se connecter</a></li><?php
            } else {
                ?><li><a href="/?action=disconnect">Se déconnecter</a></li><?php
            }
        ?>
        <li><a href="/contact">Nous contacter</a></li>
    </ul>
</nav>