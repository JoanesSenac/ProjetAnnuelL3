<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css"> 
    <title>Inscription</title>
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
                <a href="connexion.php" class="btn">Connexion</a>
            </div>
        </div>
    </nav>
    <div class="wrapper">
        <h2>Inscription</h2>
        <form id="myForm" action="Inscription.php" method="post">
            <label for="nom">Nom :</label><br>
            <input type="text" id="nom" name="nom" required><br>

            <label for="prenom">Prénom :</label><br>
            <input type="text" id="prenom" name="prenom" required><br>

            <label for="email">E-mail :</label><br>
            <input type="email" id="email" name="email" required><br>

            <label for="password">Mot de passe :</label><br>
            <input type="password" id="password" name="MDP" required><br>

            <label for="birthdate">Date de naissance :</label><br>
            <input type="date" id="birthdate" name="DateDeNaissance" required><br>
            <p id="errorMessage" class="error"></p>

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

            <input type="submit" class="btn" value="Inscription" onclick="checkYear()">
        </form>
    </div>
    <script>
        // Vérification et message d'erreur pour l'âge
        function checkYear() {
            var birthdate = new Date(document.getElementById("birthdate").value);
            var birthYear = birthdate.getFullYear();
            var currentYear = new Date().getFullYear();
            
            if (currentYear - birthYear < 16) {
                document.getElementById("errorMessage").innerText = "Vous devez être âgé d'au moins 16 ans pour vous inscrire.";
            } else {
                document.getElementById("errorMessage").innerText = "";
                document.getElementById("myForm").submit();
            }
        }
    </script>

<?php 
include ('Connexion_bdd.php');

// Initialisation de la session
session_start();
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $MDP = $_POST['MDP'];
        $DateDeNaissance = $_POST['DateDeNaissance'];
        $sexe = $_POST['sexe'];
        $poids = $_POST['poids']; 
        $taille = $_POST['taille'];
        $niveau = $_POST['niveau'];
        $objectif = $_POST['objectif'];
        $temps_libre_semaine = $_POST['temps_libre_semaine']; 
        
        // Formater la date de naissance au format Y-m-d
        $DateDeNaissanceFormatted = date('Y-m-d', strtotime($DateDeNaissance));
              
        $_SESSION['nom'] = $nom;
        $_SESSION['prenom'] = $prenom;
        $_SESSION['email'] = $email;
        $_SESSION['MDP'] = $MDP;
        $_SESSION['DateDeNaissance'] = $DateDeNaissanceFormatted;
        $_SESSION['sexe'] = $sexe;
        $_SESSION['poids'] = $poids; 
        $_SESSION['taille'] = $taille; 
        $_SESSION['niveau'] = $niveau;
        $_SESSION['objectif'] = $objectif;
        $_SESSION['temps_libre_semaine'] = $temps_libre_semaine;
        
        // Vérification si un client avec le même email existe déjà
        $requete = $bdd->prepare("SELECT * FROM Utilisateur WHERE email= :email");
        $requete->bindParam(':email', $email);
        $requete->execute();
      
        if ($requete->rowCount() > 0) {
            echo "Erreur : Un utilisateur avec cet email existe déjà";
        } else {
            // Insertion de l'utilisateur dans la base de données en utilisant une requête préparée
            $requeteInsert = $bdd->prepare("INSERT INTO Utilisateur (nom, prenom, email, MDP, DateDeNaissance, sexe, poids, taille, niveau, objectif, temps_libre_semaine) VALUES (:nom, :prenom, :email, :MDP, :DateDeNaissance, :sexe, :poids, :taille, :niveau, :objectif, :temps_libre_semaine )");
            $requeteInsert->bindParam(':nom', $nom);
            $requeteInsert->bindParam(':prenom', $prenom);
            $requeteInsert->bindParam(':email', $email);
            $requeteInsert->bindParam(':MDP', $MDP);
            $requeteInsert->bindParam(':DateDeNaissance', $DateDeNaissanceFormatted);
            $requeteInsert->bindParam(':sexe',$sexe);
            $requeteInsert->bindParam(':poids',$poids);
            $requeteInsert->bindParam(':taille',$taille);
            $requeteInsert->bindParam(':niveau',$niveau);
            $requeteInsert->bindParam(':objectif',$objectif);
            $requeteInsert->bindParam(':temps_libre_semaine',$temps_libre_semaine);
            
            try {
                $requeteInsert->execute();
                $id_utilisateur = $bdd->lastInsertid();
                $_SESSION['id_utilisateur'] = $id_utilisateur;
                echo "Inscription réussie";
                header("Location: Recap_client.php");
                exit();
            } catch (PDOException $e) {
                echo "Erreur : " . $e->getMessage();
            }
        }
    }
?>



</body>
</html>


