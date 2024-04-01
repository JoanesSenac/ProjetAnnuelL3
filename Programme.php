<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Voir les séances</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar">
        <div class="container">
            <div class="logo">
                <img src="Logo.jpg" height="70" alt="Logo">
            </div>
            <div class="go-muscu">GO MUSCU</div>
            <div class="cta">
                <a href="page_client.html" class="btn">Tableau de bord</a>
                <a href="deconnexion.php" class="btn">Déconnexion</a>
            </div>
        </div>
    </nav>

    <div class="wrapper">
    <?php
    include 'Connexion_bdd.php';

    $req = $bdd->prepare('SELECT * FROM Seances');
    $req->execute();

    // Vérification s'il y a des séances dans la base de données
    if ($req->rowCount() > 0) {
        echo "<h2>Liste des séances :</h2>";
        // Affichage des séances
        while ($seance = $req->fetch()) {
            echo "<p>" . $seance["nom_seance"] . "</p>";
        }
    } else {
        echo "Aucune séance trouvée dans la base de données.";
    }

    $req->closeCursor();
    ?>
    </div>
</body>
</html>



