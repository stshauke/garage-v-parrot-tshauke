<?php
// Démarrer la session si elle n'est pas démarrée
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// Appeler la page connexion.php
require_once '../connexion/connexion.php';
    if (
        isset($_POST['txtPrenom']) && !empty($_POST['txtPrenom']) &&
        isset($_POST['txtNom']) && !empty($_POST['txtNom']) &&
        isset($_POST['txtEmail']) && !empty($_POST['txtEmail']) &&
        isset($_POST['selectSexe']) && !empty($_POST['selectSexe']) &&
        isset($_POST['txtPassword']) && !empty($_POST['txtPassword']) &&
        isset($_POST['txtRetapPassword']) && !empty($_POST['txtRetapPassword']) &&
       ($_POST['txtPassword']===$_POST['txtRetapPassword']) && 
       verifierPasswordSecurise()
    ) {

        // Préparation et exécution de la requête SQL pour mettre à jour le profil
        $reqUpdateProfile = "UPDATE utilisateur SET ";
        $reqUpdateProfile .= "prenomUtil=:prenomUtil, ";
        $reqUpdateProfile .= "nomUtil=:nomUtil, ";
        $reqUpdateProfile .= "sexeUtil=:sexeUtil, ";
        $reqUpdateProfile .= "adresseEmail=:adresseEmail, ";
        $reqUpdateProfile .= "password=:password ";
        $reqUpdateProfile .= "WHERE idUtil=:idUtil";
        $sexeUtil='Homme';
        if( $_POST['selectSexe']==2){
            $sexeUtil='Femme';
        }
        $statement = $pdo->prepare($reqUpdateProfile);
        $statement->execute(array(
            ':prenomUtil' => $_POST['txtPrenom'],
            ':nomUtil' => $_POST['txtNom'],
            ':sexeUtil' =>  $sexeUtil,
            ':adresseEmail' => $_POST['txtEmail'],
            ':password' => $_POST['txtPassword'],
            ':idUtil' => $_SESSION['idUtil']
        ));

        // Aucune récupération nécessaire pour une requête UPDATE
    }

// tester la sécurité du mot passe coté backend

function verifierPasswordSecurise() {
    // Récupération du mot de passe depuis la requête (par exemple, depuis un formulaire POST)
    $password = $_POST['txtPassword'];

   
        // Vérification de la présence d'au moins une minuscule, une majuscule, un chiffre et un caractère spécial
        $hasLowerCase = preg_match('/[a-z]/', $password);
        $hasUpperCase = preg_match('/[A-Z]/', $password);
        $hasDigit = preg_match('/[0-9]/', $password);
        $hasSpecialChar = preg_match('/[!@#$%^&*(),.?":{}|<>]/', $password);

       // Vérification de la longueur minimale
        if ($hasLowerCase && $hasUpperCase && $hasDigit && $hasSpecialChar && strlen($password) >= 8) {
            return true;  // Mot de passe sécurisé
        } else {
            return false;  // Mot de passe non sécurisé
        }
}
// Exemple d'utilisation de la fonction
//verifierPasswordSecurise();

?>







?>
