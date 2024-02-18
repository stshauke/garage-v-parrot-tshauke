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
    // Liste des noms de champs à vérifier
    $champs = array(
        "txtMarqueVoiture",
        "txtModeleVoiture",
        "txtAnneeVoiture",
        "txtKilomètrageVoiture",
        "txtSiegeVoiture",
        "txtboiteVoiture",
        "txtCouleurVoiture",
        "txtNbrPorteVoiture",
        "txtCo2Voiture",
        "txtCarburantVoiture",
        "txtprixVoiture",
        "txtPuissanceMoteurVoiture",
        "txtCarrosserieVoiture"
    );

    // Parcourez la liste des champs
    foreach ($champs as $champ) {
        // Vérifiez si le champ est défini et non vide
        if (!isset($_POST[$champ]) || empty($_POST[$champ])) {
            // Le champ est vide, définissez le message d'erreur
            $error_message = "Veuillez remplir tous les champs du formulaire.";
            break;
        }
    }

    // Assurez-vous que le champ 'imageVoiture' existe dans $_FILES
    if (!empty($_FILES["imageVoiture"]) && $_FILES["imageVoiture"]["error"] == UPLOAD_ERR_OK) {

        // Informations sur le fichier téléchargé
        $temp_name = $_FILES["imageVoiture"]["tmp_name"];
        $original_name = basename($_FILES["imageVoiture"]["name"]);

        // Vérifier la taille de l'image
        $image_size = getimagesize($temp_name);
        $width = $image_size[0];
        $height = $image_size[1];

        // Définir la taille souhaitée
        //$desired_width = 600;
        $desired_height = 450;
       
        // Vérifier si la taille est correcte
        if ($height == $desired_height) {

            // Définir le chemin du dossier de destination
            $upload_directory = "../img/voitures/";

            // Utiliser le nom du Voiture (en supprimant les espaces) comme nom de fichier
            $Voiture_name_without_spaces = str_replace(' ', '_', $_POST['txtMarqueVoiture'] . ' ' . $_POST['txtModeleVoiture']);
            // Extraire l'extension du nom de fichier d'origine"
            $file_extension = pathinfo($original_name, PATHINFO_EXTENSION);

            // Construire le nouveau nom en concaténant le nom du Voiture et l'extension du fichier
            $new_name = $Voiture_name_without_spaces . "." . $file_extension;

            // Déplacer le fichier téléchargé vers le dossier de destination
            $destination = $upload_directory.$new_name;
            move_uploaded_file($temp_name, $destination);

            // Assurez-vous que la requête SQL inclut tous les champs de la table Voitures
            $reqInsertVoiture = "INSERT INTO Voitures (
                marque_voiture, modele_voiture,  annee_fabrication_voiture, kilometrage_voiture, nombre_sieges_voiture,
                type_boite_voiture, couleur_voiture, nombre_porte_voiture, co2_voiture, carburant_voiture,
                prix_voiture, image_voiture, puissance_moteur_voiture, type_carrosserie_voiture
            ) VALUES (
                :marque_Voiture, :modele_Voiture,  :annee_fabrication_Voiture, :kilometrage_Voiture, :siege_Voiture,
                :boite_Voiture, :couleur_Voiture, :nbrPorte_Voiture, :co2_Voiture, :carburant_Voiture,
                :prix_Voiture, :image_Voiture, :puissanceMoteur_Voiture, :carrosserie_Voiture
            )";
            // Préparation et exécution de la requête
            $statement = $pdo->prepare($reqInsertVoiture);

            // Associez les valeurs des champs du formulaire avec les paramètres de la requête
            $statement->execute(
                array(
                    ':marque_Voiture' => $_POST['txtMarqueVoiture'],
                    ':modele_Voiture' => $_POST['txtModeleVoiture'],
                    ':annee_fabrication_Voiture' => $_POST['txtAnneeVoiture'],
                    ':kilometrage_Voiture' => $_POST['txtKilomètrageVoiture'],
                    ':siege_Voiture' => $_POST['txtSiegeVoiture'],
                    ':boite_Voiture' => $_POST['txtboiteVoiture'],
                    ':couleur_Voiture' => $_POST['txtCouleurVoiture'],
                    ':nbrPorte_Voiture' => $_POST['txtNbrPorteVoiture'],
                    ':co2_Voiture' => $_POST['txtCo2Voiture'],
                    ':carburant_Voiture' => $_POST['txtCarburantVoiture'],
                    ':prix_Voiture' => $_POST['txtprixVoiture'],
                    ':image_Voiture' => $new_name,
                    ':puissanceMoteur_Voiture' => $_POST['txtPuissanceMoteurVoiture'],
                    ':carrosserie_Voiture' => $_POST['txtCarrosserieVoiture']
                )
            );

            // Définir le message de succès
            $success_message = "Voiture ajoutée avec succès.";
        } else {
            // Définir le message d'erreur
            $error_message = "La taille de l'image doit être de 500x600 pixels.";
        }
    } else {
        // Définir le message d'erreur
        $error_message = "Erreur lors du téléchargement de l'image.";
    }

    // Stocker les messages dans des variables de session
    $_SESSION['success_message'] = $success_message;
    $_SESSION['error_message'] = $error_message;

    // Rediriger après le traitement
    header("Location: voitures.php");
    exit();
}