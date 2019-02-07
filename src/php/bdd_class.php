<?php
class BDD {
    function __construct($sgbd, $host, $db, $user, $pass){
        return new PDO($sgbd.':host='.$host.';dbname='.$db, $user, $pass);
    }
}
?>