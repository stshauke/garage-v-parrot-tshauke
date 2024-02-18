<?php
/*
cette page est consacrée pour réaliser la connexion vers la base de données
elle contient des requetes SQL qui permettent de vérifier si les identifiants recuent en 
requete HTTP sont valides ou non.
Aussi on a utiliser la notion des sessions pour sauvegarder les nom, les prénom des utilisateurs 
connecté( administrateur ou employé) et le rôle de chacun
*/
//Démarrer une session
 session_start();
 //Appeler la page connexion.php
require_once 'connexion.php';
// Initialisation de la variable $message pour sauvegarder l'état de la connexion
 $message="";
 // Vérification si le formulaire a été soumis (si l'utilisateur à cliqué sur le bouton submit)
if(isset($_POST['btnSubmit'])){
 // Vérification du champ 'user' (nom d'utilisateur) si il a été soumis et n'est pas vide
	if(!isset($_POST['user']) && empty($_POST['user'])){
		$message="Veuillez saisr votre nom d'utilisateur";
	}
	//  Vérification du champ 'password' (mot de passe)  si il a été soumis et n'est pas vide
	if(!isset($_POST['password']) && empty($_POST['password'])){
		$message="Veuillez saisr votre mot de passe";
	}
	// Préparation et exécution de la requête SQL pour vérifier l'authentification, aussi on a ajouté
	// le role,prenomUtil,nomUtil pour les mettres dans des sessions
	$statement=$pdo->prepare("select idUtil,adresseEmail, password,role,prenomUtil,nomUtil from utilisateur where adresseEmail=:adresseEmail and password=:password");
	$statement->execute(array(':adresseEmail' => $_POST['user'],':password' => $_POST['password']));
	// Récupération des résultats de la requête
	$row = $statement->fetchAll(PDO::FETCH_ASSOC);
	// Vérification si des résultats ont été trouvés (authentification réussie)
	if (count($row) > 0){	
		// Stockage des informations de l'utilisateur dans la session (role, prénom et nom )
		$_SESSION['idUtil']=$row[0]['idUtil'];
		$_SESSION['mailUtilisateur']=$row[0]['adresseEmail'];
		$_SESSION['roleUtilisateur']=$row[0]['role'];
		$_SESSION['nomUtilisateur']=$row[0]['prenomUtil']." ".$row[0]['nomUtil'];
		// Redirection vers la page d'accueil (index.php)
				header('location: ../index.php');
				exit();
	}else{
		// Authentification échouée - message d'erreur
		$message="Le mot de passe ou le nom d'utilisateur est incorrecte";
	}
}

?>