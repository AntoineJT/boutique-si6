<!DOCTYPE HTML>
<html lang="fr">
    <head>
        <title>Un site qui vend des choses</title>
        <meta charset='utf-8'>
        <link rel="stylesheet" type="text/css" href="./style/common.css">
    </head>
    <body>
        <?php
            include('./assets/internal/header.htm');
            
            $action = isset($_GET['action']) ? $_GET['action'] : 'products';
            const pages = array(
                'products',
                'login',
                'register',
                'news',
                'contact'
            );

            if (in_array($action, pages, true)){
                include('./assets/internal/' . $action . '_content.php');
            } else {
                // TODO Include some error page : 404 not found or thing alike!
            }

            include('./assets/internal/footer.htm');
        ?>
    </body>
</html>