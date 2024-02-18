<?php
//Démarrer la session si elle n'est pas démarrée
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once '../connexion/connexion.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier que les clés existent dans $_POST
    if (isset($_POST['nom'], $_POST['email'], $_POST['id_service'], $_POST['date_service'], $_POST['demande_speciale'])) {
        // Sanitiser et valider les données du formulaire
        $nom = $_POST['nom'];
        $email = $_POST['email'];
        $id_service = $_POST['id_service'];
        //$date_service = $_POST['date_service'];
        $demande_speciale = $_POST['demande_speciale'];
        // Formater la date correctement
        $date_service_frm = DateTime::createFromFormat('m/d/Y', $_POST['date_service']);
        $date_service = $date_service_frm->format('Y-m-d');
        // Vérifier que les valeurs ne sont pas vides
        if (!empty($nom) && !empty($email) && !empty($id_service) && !empty($date_service)) {
            // Insérer les données dans la table à l'aide de requêtes préparées
            $sql = "INSERT INTO reserver_services (nom, email, id_service, date_service, demande_speciale) VALUES (:nom, :email, :id_service, :date_service, :demande_speciale)";

            $statement = $pdo->prepare($sql);
            $statement->bindParam(':nom', $nom);
            $statement->bindParam(':email', $email);
            $statement->bindParam(':id_service', $id_service);
            $statement->bindParam(':date_service', $date_service);
            $statement->bindParam(':demande_speciale', $demande_speciale);

            // Exécuter la requête seulement si toutes les valeurs sont présentes
            $statement->execute();
        } else {
            echo "Tous les champs du formulaire doivent être remplis.";
        }
    } else {
        echo "Certains champs du formulaire sont manquants.";
    }
}
