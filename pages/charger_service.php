<?php
/*
cette page est consacrée pour réaliser la connexion vers la base de données
elle contient des requetes SQL qui permettent de vérifier si les identifiants recuent en 

*/
 //Démarrer la session si elle n'est pas démarrée
if(session_status()===PHP_SESSION_NONE){
	session_start(); 
 }
 //Appeler la page connexion.php
require_once '../connexion/connexion.php';

	// Préparation et exécution de la requête SQL pour vérifier l'authentification, aussi on a ajouté
	// le role,prenomUtil,nomUtil pour les mettres dans des sessions
	$statement=$pdo->prepare("select * from services");
	$statement->execute();
	// Récupération des résultats de la requête
	$row = $statement->fetchAll(PDO::FETCH_ASSOC);
	


?>