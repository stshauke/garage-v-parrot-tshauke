<?php
// Appeler la page connexion.php
require('../connexion/connexion.php');

// Récupérer les valeurs du slider envoyées via Ajax
$minPrice = isset($_POST['minPrice']) ? intval($_POST['minPrice']) : null;
$maxPrice = isset($_POST['maxPrice']) ? intval($_POST['maxPrice']) : null;

// Requête SQL pour récupérer les voitures en fonction des valeurs du slider
$sql = "SELECT * FROM voitures WHERE prix_voiture BETWEEN :minPrice AND :maxPrice";
$statement_voiture = $pdo->prepare($sql);
$statement_voiture->bindParam(':minPrice', $minPrice, PDO::PARAM_INT);
$statement_voiture->bindParam(':maxPrice', $maxPrice, PDO::PARAM_INT);
$statement_voiture->execute();

// Récupération des résultats de la requête
$row_voiture = $statement_voiture->fetchAll(PDO::FETCH_ASSOC);

// Convertir les résultats en JSON (vous pouvez ajuster cela en fonction de vos besoins)
echo json_encode($row_voiture);
