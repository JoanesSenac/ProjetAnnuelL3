<!DOCTYPE html>
<html>
<head>
    <title>Question_Client</title>
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
                <a href="Inscription.php" class="btn">Inscription</a>
            </div>
        </div>
    </nav>

    <div class="wrapper">
        <h2>Information personnelle</h2>
        <form id="form" action="Question_client.php" method="post">
            <label for="sexe">Sexe(Femme/Homme)</label>
            <select id="sexe" name="sexe">
                <option value="Femme">Femme</option>
                <option value="Homme">Homme</option>
            </select><br>

            <label for="poids">Poids (kg):</label>
            <input type="number" id="poids" name="poids" required><br>

            <label for="taille">Taille (cm):</label>
            <input type="number" id="taille" name="taille" required><br>

            <label for="niveau">Niveau :</label>
            <select id="niveau" name="niveau">
                <option value="debutant">Débutant</option>
                <option value="intermediaire">Intermédiaire</option>
                <option value="confirme">Confirmé</option>
            </select><br>

            <label for="objectif">Objectif :</label>
            <select id="objectif" name="objectif">
                <option value="pertedepoids">Perte de poids</option>
                <option value="prisedemasse">Prise de masse</option>
                <option value="entretien">Entretien</option>
                <option value="seche">Sèche</option>
            </select><br>

            <label for="temps_libre_semaine">Temps libre par semaine(en heures) :</label>
            <input type="number" id="temps_libre_semaine" name="temps_libre_semaine" required><br>

            <input type="submit" name="Suivant" value="Suivant" class="btn">
        </form>
    </div>

<?php 
session_start();
include 'Connexion_bdd.php';
      
if (isset($_POST['Suivant'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $id_utilisateur = $bdd->lastInsertId(); //recuperation du derniere id inséré
        $sexe = $_POST['sexe'];
        $poids = $_POST['poids'];
        $taille = $_POST['taille'];
        $niveau = $_POST['niveau'];
        $objectif = $_POST['objectif'];
        $temps_libre_semaine = $_POST['temps_libre_semaine'];
        
        
        try {

            // Enregistrer l'ID de l'utilisateur dans la session
            $_SESSION['id_utilisateur'] = $id_utilisateur;
           
            // Mettre à jour la table avec les données des 2 formulaires
            $req = $bdd->prepare("UPDATE Utilisateur SET sexe = :sexe, poids = :poids, taille = :taille, niveau = :niveau, objectif = :objectif, temps_libre_semaine = :temps_libre_semaine WHERE id_utilisateur = :id_utilisateur");
            $req->bindParam(':sexe',$sexe);
            $req->bindParam(':poids',$poids);
            $req->bindParam(':taille',$taille);
            $req->bindParam(':niveau',$niveau);
            $req->bindParam(':objectif',$objectif);
            $req->bindParam(':temps_libre_semaine',$temps_libre_semaine);
            $req->bindParam(':id_utilisateur',$id_utilisateur);
            $req->execute();
            echo "Inscription réussie";
            
            // Rediriger vers la page suivante
            header("Location: Recapitulatif_paiement_client.php");
            exit();
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
}
?>

</body>
</html>
