<?php
include('connexion.php'); // Inclut le fichier de connexion à la base de données

// Récupère les données du formulaire
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$motDePasse = password_hash($_POST['motDePasse'], PASSWORD_DEFAULT); // Hash du mot de passe

// Exécute la requête pour insérer les données dans la base de données
$requete = "INSERT INTO utilisateurs (nom, prenom, email, mot_de_passe) VALUES ('$nom', '$prenom', '$email', '$motDePasse')";

if ($connexion->query($requete) === TRUE) {
    echo "Inscription réussie !";
} else {
    echo "Erreur : " . $requete . "<br>" . $connexion->error;
}

// Ferme la connexion à la base de données
$connexion->close();
?>