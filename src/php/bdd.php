<?php
	const SGBD = "mysql";
	const HOST = "127.0.0.1";
	const DATABASE = "Boutique";
	const USER = "root";
	const PASS = "";
	$bdd = null;
	try {
		$bdd = new PDO(SGBD . ":host=" . HOST . ";dbname=" . DATABASE, USER, PASS);
	} catch (PDOException $err) {
		die("La connexion à la base de données a échoué : Veuillez contacter un administrateur du site.");
	}
?>
