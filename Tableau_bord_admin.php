<?php
session_start();
include 'Connexion_bdd.php';

// Récupérer le nombre total d'utilisateurs inscrits
$sqlCount = "SELECT COUNT(*) AS total FROM Utilisateur";
$resultCount = $bdd->query($sqlCount);
$row = $resultCount->fetch(PDO::FETCH_ASSOC);
$totalUsers = $row['total'];

// Récupérer les données des utilisateurs inscrits
$sql = "SELECT * FROM Utilisateur";
$result = $bdd->query($sql);
$users = $result->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord Administrateur</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar">
        <div class="container">
            <div class="logo">
                <img src="Logo_2.jpg" height="70" alt="Logo">
            </div>
            <div class="go-muscu">GO MUSCU</div>
            <div class="cta">
                <a href="deconnexion.php" class="btn">Déconnexion</a>
            </div>
        </div>
    </nav>

    <div class="wrapper">
        <h2>Tableau de bord Administrateur</h2>
        <div class="section">
            <h3>Liste des personnes inscrites</h3>

            <table>
                <tr>
                    <th>Identifiant</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                </tr>
                <?php foreach ($users as $user) { ?>
                    <tr>
                        <td><?php echo $user['id']; ?></td>
                        <td><?php echo $user['nom']; ?></td>
                        <td><?php echo $user['prenom']; ?></td>
                        <td><?php echo $user['email']; ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>

        <div class="section">
            <h3>Nombre total de personnes inscrites : <?php echo $totalUsers; ?></h3>
        </div>

        <div class="section">
            <h3>Chiffre d'affaires de la semaine</h3>
            <!-- Afficher le chiffre d'affaires de la semaine -->
            <!-- Exemple : Chiffre d'affaires de la semaine : XXX € -->
        </div>

        <div class="section">
            <h3>Nombre de consultations du site de la semaine</h3>
            <!-- Afficher le nombre de consultations du site de la semaine -->
            <!-- Exemple : Nombre de consultations cette semaine : XX -->
        </div>
    </div>
</body>
</html>
