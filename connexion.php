<?php
$serveur = "10.16.140.38"; // Adresse du serveur MySQL (généralement localhost)
$utilisateur = "jsenac"; // Nom d'utilisateur de la base de données
$motDePasse = "22109342"; // Mot de passe de la base de données
$nomDeLaBase = "jsenac"; // Nom de la base de données

// Connexion à la base de données
$connexion = new mysqli($serveur, $utilisateur, $motDePasse, $nomDeLaBase);

// Vérification de la connexion
if ($connexion->connect_error) {
    die("Échec de la connexion à la base de données : " . $connexion->connect_error);
}
?>