<?php
// Démarrer la session si elle n'est pas démarrée
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once '../connexion/connexion.php';

// Récupération des données du formulaire
$premiere_seance_ouverture = $_POST['premiere_seance_ouverture'];
$premiere_seance_fermeture = $_POST['premiere_seance_fermeture'];
$deuxieme_seance_ouverture = $_POST['deuxieme_seance_ouverture'];
$deuxieme_seance_fermeture = $_POST['deuxieme_seance_fermeture'];
$jour_id = $_POST['jour_id'];

// Requête d'insertion dans la base de données
$sql = "UPDATE horairesgarage
        SET premiere_seance_ouverture = :premiere_seance_ouverture,
            premiere_seance_fermeture = :premiere_seance_fermeture,
            deuxieme_seance_ouverture = :deuxieme_seance_ouverture,
            deuxieme_seance_fermeture = :deuxieme_seance_fermeture
        WHERE horaire_id = :horaire_id ";

$stmt = $pdo->prepare($sql);
$stmt->bindParam(':premiere_seance_ouverture', $premiere_seance_ouverture);
$stmt->bindParam(':premiere_seance_fermeture', $premiere_seance_fermeture);
$stmt->bindParam(':deuxieme_seance_ouverture', $deuxieme_seance_ouverture);
$stmt->bindParam(':deuxieme_seance_fermeture', $deuxieme_seance_fermeture);
$stmt->bindParam(':horaire_id', $jour_id);

// Exécution de la requête
$result = $stmt->execute();

// Préparer la réponse JSON
$response = array();

if ($result) {
    $response['success'] = true;
    $response['message'] = 'Mise à jour réussie.';
} else {
    $response['success'] = false;
    $response['message'] = 'Échec de la mise à jour.';
}

// Renvoyer la réponse au format JSON
header('Content-Type: application/json');
echo json_encode($response);
exit();

