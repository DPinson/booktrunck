<?php
require("ajout.php");
require("recup.php");
require("pret.php");
require("retour.php");
require("modif.php");
require("suppr.php");

function connDB() {
	// Paramètre de connexion serveur
	$host = "localhost";
	$login = "";
	// Votre login du serveur de BDD
	$password = "toto";
	// Le mdp
	$base = "malle";
	// La bdd 
	try {
		$db = new PDO('mysql:host=' . $host . ';charset=utf8;dbname=' . $base, $login, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		return $db;
	} 
	catch (Exception $e) {
		echo 'Erreur : ' . $e->getMessage() . '<br />';
		echo 'N° : ' . $e->getCode() . '<br />';
		die (" Connexion au serveur impossible.");
	} 
}
