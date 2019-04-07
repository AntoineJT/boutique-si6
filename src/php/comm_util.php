<?php
    function getNextCommId($bdd){
        $req = $bdd->query("SELECT COUNT(CodeComm) FROM COMMANDE");
        $codecomm = $req->fetch(PDO::FETCH_BOUND);
        $codecomm = $codecomm[0] + 1;
        return $codecomm;
    }
?>
