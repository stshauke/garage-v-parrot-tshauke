<?php
// Start the session
session_start();

//session_destroy
session_destroy();
//Rediriger l'utilisateur connecté(administrateur ou employé) vers la page Accueil
header("Location: ../index.php");
exit();
?>