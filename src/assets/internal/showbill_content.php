<style>
    aside {
        display:none;
    }
</style>
<?php
    include_once("php/bdd.php");
    include_once("php/bill.php");

    $id = isset($_SESSION["id"]) ? $_SESSION["id"] : die();
    if (empty($id)){
        die();
    }

    $req = $bdd->prepare("SELECT CodeComm FROM COMMANDE WHERE IdCli = ?");
    $req->execute(array($id));
    $results = $req->fetchAll(PDO::FETCH_ASSOC);

    if ($req->rowCount() > 0){
        foreach($results as $val){
            printBill($bdd, $val["CodeComm"], $id);
        }
    } else {
        echo "<p>Vous n'avez passé aucune commande!</p>";
    }
?>
