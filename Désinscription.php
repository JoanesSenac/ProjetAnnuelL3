<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Désinscription</title>
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
                <a href="Homepage.html" class="btn">Accueil</a>
            </div>
        </div>
    </nav>

    <div class="wrapper">
        <h2>Désinscription</h2>
        <p>Voulez-vous vraiment vous désinscrire de notre service ?</p>
        <form action="Désinscription.php" method="post">
            <input type="submit" name="confirm" value="Confirmer la désinscription" class="btn">
        </form>
    </div>

    <?php
    session_start();
    include 'Connexion_bdd.php';
    
    if (isset($_POST['confirm'])) {
        // Supprimer l'utilisateur de la base de données
        $email = $_SESSION['email']; // Supposons que vous stockez l'email dans la session
        $requete = $bdd->prepare("DELETE FROM Utilisateur WHERE email = ?");
        $requete->execute([$email]);
        
        // Détruire la session et rediriger vers la page d'accueil
        session_destroy();
        header("Location: Homepage.html");
        exit();
    }
    ?>

</body>
</html>
