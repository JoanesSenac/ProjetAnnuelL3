<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
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
            <a href="Inscription.html" class="btn">Inscription</a>
        </div>
    </div>
</nav>

<div class="form-container">
    <div class="wrapper form">
        <h2>Connexion Client</h2>
        <form action="connexion.php" method="post">
            <label for="client_email">Adresse e-mail :</label><br>
            <input type="email" id="client_email" name="email" required><br><br>
            <label for="client_password">Mot de passe :</label><br>
            <input type="password" id="client_password" name="MDP" required><br><br>
            <input class="btn" type="submit" name="connexion" value="Connexion">
        </form>
        <p>Pas encore inscrit ? <a href="Inscription.php" class="btn">Inscription</a></p>
    </div>
</div>

<?php 
session_start();
include("Connexion_bdd.php");

if (isset($_POST['connexion'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];
        $MDP = $_POST['MDP']; 

        try {
            // Vérifier si l'utilisateur est un administrateur
            if ($email === 'joanes.senac@gmail.com' && $MDP === '123456') {
                $_SESSION['email'] = $email;
                $_SESSION['MDP'] = $MDP;
                header("Location: Tableau_bord_admin.php");
                exit();
            } 
            
            // Vérifier les informations de connexion pour les utilisateurs normaux
            else {
                $requete = $bdd->prepare("SELECT * FROM Utilisateur WHERE email = :email AND MDP = :MDP");
                $requete->bindParam(':email', $email);
                $requete->bindParam(':MDP', $MDP);
                $requete->execute();

                if ($requete->rowCount() > 0) {
                    $_SESSION['email'] = $email;
                    $_SESSION['MDP'] = $MDP;
                    header("Location: page_client.html");
                    exit();    
                } else { 
                    echo "Email ou mot de passe incorrect."; 
                    exit();
                }
            }
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
}
?>

</body>
</html>
