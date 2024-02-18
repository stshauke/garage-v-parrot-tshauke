<?php
// Démarrer la session si elle n'est pas démarrée
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// Appeler la page connexion.php
require_once '../connexion/connexion.php';
    if (
        //Vérifier si tous les du formulaire d'ajout d'un employé sont définis et ne sont pas vides
        isset($_POST['txtPrenomEmploye']) && !empty($_POST['txtPrenomEmploye']) &&
        isset($_POST['txtNomEmploye']) && !empty($_POST['txtNomEmploye']) &&
        isset($_POST['txtEmailEmploye']) && !empty($_POST['txtEmailEmploye']) &&
        isset($_POST['selectSexeEmploye']) && !empty($_POST['selectSexeEmploye']) &&
        isset($_POST['txtPasswordEmploye']) && !empty($_POST['txtPasswordEmploye'])
    ) {

        // Préparation et exécution de la requête SQL pour insérer un nouvel employé
        $reqInsertEmploye = " INSERT INTO utilisateur (idUtil, prenomUtil, nomUtil, sexeUtil, adresseEmail, password, role) ";
        $reqInsertEmploye.= " VALUES (NULL, :prenomUtil, :nomUtil, :sexeUtil, :adresseEmail, :password, 'Employe')";

        $sexeUtil='Homme';
        if( $_POST['selectSexeEmploye']==2){
            $sexeUtil='Femme';
        }
        //Préparer et exécuter la requete SQL avec les paramètres du formulaire
        $statement = $pdo->prepare($reqInsertEmploye);
        $statement->execute(array(
            ':prenomUtil' => $_POST['txtPrenomEmploye'],
            ':nomUtil' => $_POST['txtNomEmploye'],
            ':sexeUtil' =>  $sexeUtil,
            ':adresseEmail' => $_POST['txtEmailEmploye'],
            ':password' => $_POST['txtPasswordEmploye']
        ));
    }

?>
