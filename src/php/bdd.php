<?php
require_once('bdd_class.php');

class BDD_Caller {
    private static const SGBD = 'mysql';
    private static const HOST = '127.0.0.1';
    private static const DATABASE = 'Boutique';
    private static const USER = 'root';
    private static const PASS = '';

    public static $bdd = new BDD(SGBD,HOST,DATABASE,USER,PASS);
}
?>