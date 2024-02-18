<?php
   /* Le fichier `config.php` contient des constantes définies, 
   telles que `DB_HOST`, `DB_NAME`, `DB_USER`, et `DB_PASSWORD`, qui sont utilisées pour 
   établir la connexion à la base de données.*/

require_once('config.php');

// Créer une nouvelle connexion PDO
try {
    $pdo = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME.";port=".DB_PORT.";charset=".DB_CHARSET, DB_USER, DB_PASSWORD);
    
    // Activer le mode d'erreur PDO
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Activer le mode d'émulation PDO pour désactiver l'utilisation de 'prepared statements'
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
//echo "Connexion réuissi";


} catch(PDOException $e) {
    // En cas d'erreur de connexion à la base de données, afficher un message d'erreur et arrêter le script
    die("Erreur de connexion à la base de données: ".$e->getMessage());
}
?>