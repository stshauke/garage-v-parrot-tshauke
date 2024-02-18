<?php
// Démarrer la session si elle n'est pas démarrée
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once '../connexion/connexion.php';
// Initialiser les messages à vide
$success_message = "";
$error_message = "";
// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assurez-vous que le champ 'imageService' existe dans $_FILES
    if (!empty($_FILES["imageService"]) && $_FILES["imageService"]["error"] == UPLOAD_ERR_OK) {
        // Informations sur le fichier téléchargé
        $temp_name = $_FILES["imageService"]["tmp_name"];
        $original_name = basename($_FILES["imageService"]["name"]);

        // Vérifier la taille de l'image
        $image_size = getimagesize($temp_name);
        $width = $image_size[0];
        $height = $image_size[1];

        // Définir la taille souhaitée
        $desired_width = 500;
        $desired_height = 600;

        // Vérifier si la taille est correcte
        if ($width == $desired_width && $height == $desired_height) {
            // Définir le chemin du dossier de destination
            $upload_directory = "../img/";

            // Utiliser le nom du service (en supprimant les espaces) comme nom de fichier
            $service_name_without_spaces = str_replace(' ', '_', $_POST['nomService']);

            // Extraire l'extension du nom de fichier d'origine
            $file_extension = pathinfo($original_name, PATHINFO_EXTENSION);

            // Construire le nouveau nom en concaténant le nom du service et l'extension du fichier
            $new_name = $service_name_without_spaces . "." . $file_extension;

            // Déplacer le fichier téléchargé vers le dossier de destination
            $destination = $upload_directory . $new_name;
            move_uploaded_file($temp_name, $destination);

            // Préparation et exécution de la requête SQL pour mettre à jour le profil
            require_once '../connexion/connexion.php';
            $reqInsertService = "INSERT INTO services (nom_service, description_service, image_service) ";
            $reqInsertService .= "VALUES (:nom_service, :description_service, :image_service)";

            $statement = $pdo->prepare($reqInsertService);
            $statement->execute(array(
                ':nom_service' => $_POST['nomService'],
                ':description_service' => $_POST['descriptionService'],
                ':image_service' => $new_name
            ));
            // Définir le message de succès
            $success_message = "Service ajouté avec succès.";
        } else {
            // Définir le message d'erreur
            $error_message = "La taille de l'image doit être de 500x600 pixels.";
        }
    } else {
        // Définir le message d'erreur
        $error_message = "Erreur lors du téléchargement de l'image.";
    }
    // Stocker les messages dans des variables de session
    //session_start();
    $_SESSION['success_message'] = $success_message;
    $_SESSION['error_message'] = $error_message;

    // Rediriger après le traitement
    header("Location:service.php");
    exit();

}
?>



