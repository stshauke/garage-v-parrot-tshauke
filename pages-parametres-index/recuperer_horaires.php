<?php
// Démarrer la session si elle n'est pas démarrée
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once '../connexion/connexion.php';

// Récupération du jour_id à partir de la requête POST
$jour_id = $_POST['jour_id'];

try {
    // Préparation de la requête SQL
    $sql = "SELECT * FROM horairesgarage WHERE jour_id = :jour_id";

    // Utilisation des déclarations préparées pour éviter les injections SQL
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':jour_id', $jour_id, PDO::PARAM_INT);

    // Exécution de la requête
    $stmt->execute();

    // Récupération des résultats
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // Fermeture de la connexion
    $pdo = null;

    // Préparation des données à renvoyer au client
    $response = array();

    // Vérification si des résultats ont été trouvés
    if ($row) {
        // Remplissage du tableau de réponse
        $response['premiere_seance_ouverture'] = $row['premiere_seance_ouverture'];
        $response['premiere_seance_fermeture'] = $row['premiere_seance_fermeture'];
        $response['deuxieme_seance_ouverture'] = $row['deuxieme_seance_ouverture'];
        $response['deuxieme_seance_fermeture'] = $row['deuxieme_seance_fermeture'];
    } else {
        // Si aucun résultat n'est trouvé, vous pouvez gérer cela en fonction de vos besoins.
        // Par exemple, vous pouvez définir des valeurs par défaut ou renvoyer un message d'erreur.
        $response['error'] = "Aucun horaire trouvé pour le jour sélectionné.";
    }

    // Convertir le tableau associatif en JSON et imprimer la réponse
    echo json_encode($response);

} catch (PDOException $e) {
    // En cas d'erreur, affichez l'erreur
    echo "Erreur : " . $e->getMessage();
}
?>