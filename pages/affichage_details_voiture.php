<?php
// Démarrer la session si elle n'est pas démarrée
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once '../connexion/connexion.php';

$query_affichag_voiture = "SELECT * FROM garage_v_parrot.voitures WHERE id_voiture = :id_voiture";
$statement_affichag_voiture = $pdo->prepare($query_affichag_voiture);
$statement_affichag_voiture->bindParam(':id_voiture', $_POST['id_voiture']);
$statement_affichag_voiture->execute();
$resultat_affichag_voiture = $statement_affichag_voiture->fetch(PDO::FETCH_ASSOC);

// Convertir le résultat en format JSON
$jsonResultat = json_encode($resultat_affichag_voiture);

// Renvoyer le résultat en tant que réponse AJAX
header('Content-Type: application/json');
echo $jsonResultat;

