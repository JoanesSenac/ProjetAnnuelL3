<?php 
session_start(); // Démarrez la session si ce n'est pas déjà fait
include 'Connexion_bdd.php';

// Vérifiez si l'utilisateur est connecté en vérifiant s'il y a une session d'ID utilisateur
if (isset($_SESSION['id_utilisateur'])) {
    $id_utilisateur = $_SESSION['id_utilisateur'];
    
    // Effectuez une requête pour récupérer les informations de l'utilisateur à partir de la base de données
    $requete_info_utilisateur = $bdd->prepare("SELECT * FROM Utilisateur WHERE id_utilisateur = :id_utilisateur");
    $requete_info_utilisateur->bindParam(':id_utilisateur', $id_utilisateur);
    $requete_info_utilisateur->execute();

    // Si l'utilisateur est trouvé, affichez ses informations
    if ($requete_info_utilisateur->rowCount() > 0) {
        $utilisateur = $requete_info_utilisateur->fetch(PDO::FETCH_ASSOC);
        // Maintenant vous pouvez accéder aux informations de l'utilisateur comme $utilisateur['nom'], $utilisateur['email'], etc.
    } else {
        // L'utilisateur n'existe pas dans la base de données
        echo "Utilisateur non trouvé.";
    }
} else {
    // L'utilisateur n'est pas connecté, redirigez-le vers la page de connexion
    header("Location: connexion.php");
    exit();
}
?>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Récapitulatif et Paiement</title>
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
        <h2>Récapitulatif de vos choix</h2>
        <div>
            <p>Poids : <span id="poids_recap"></span> kg</p>
            <p>Taille : <span id="taille_recap"></span> cm</p>
            <p>Niveau : <span id="niveau_recap"></span></p>
            <p>Objectif : <span id="objectif_recap"></span></p>
            <p>Temps libre : <span id="temps_libre_recap"></span> heures</p>
            <p>Nombre de séances par semaine : <span id="seances_recap"></span></p>
        </div>
    </div>
    <div class="wrapper">
        <h2>Paiement</h2>
        <form id="payment_form" action="Recap_client.php" method="post">
            <label for="card-number">Numéro de carte :</label><br>
            <input type="text" id="card-number" name="card-number" required><br>

            <label for="card-holder">Nom du titulaire :</label><br>
            <input type="text" id="card-holder" name="card-holder" required><br>

            <label for="expiry-date">Date d'expiration :</label><br>
            <input type="text" id="expiry-date" name="expiry-date" placeholder="MM/YY" required><br>

            <label for="cvv">CVV :</label><br>
            <input type="text" id="cvv" name="cvv" required><br>

            <label for="price">Prix :</label><br>
            <input type="text" id="price" name="price" readonly><br><br>
            <input type="hidden" name="payment_status" value="false">
            <input type="submit" value="Payer" class="btn">
        </form>
    </div>
    <script>
    // Récupérer les données du formulaire et les afficher dans le récapitulatif
    document.getElementById("payment_form").addEventListener("submit", function(event) {
        event.preventDefault(); // Empêcher l'envoi du formulaire
            
        // Récupérer les valeurs des champs du formulaire
        var poids = document.getElementById("poids").value;
        var taille = document.getElementById("taille").value;
        var niveau = document.getElementById("niveau").value;
        var objectif = document.getElementById("objectif").value;
        var temps_libre_semaine = document.getElementById("temps_libre_semaine").value;
        
        // Afficher les valeurs dans le récapitulatif
        document.getElementById("poids_recap").textContent = poids;
        document.getElementById("taille_recap").textContent = taille;
        document.getElementById("niveau_recap").textContent = niveau;
        document.getElementById("objectif_recap").textContent = objectif;
        document.getElementById("temps_libre_recap").textContent = temps_libre_semaine;
        
        // Calculer le prix en fonction du nombre d'heures
        var prixParHeure = 5; // Prix par heure en euros
        var prixTotal = temps_libre_semaine * prixParHeure;
        document.getElementById("price").value = prixTotal.toFixed(2) + "€"; // Afficher le prix avec 2 décimales
    });
</script>
</body>
</html>
<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['payment_status']) && isset($_POST['card-number']) && isset($_POST['card-holder']) && isset($_POST['expiry-date']) && isset($_POST['cvv']) && isset($_POST['price'])) {
    // Toutes les informations bancaires ont été remplies
    $payment_status = $_POST["payment_status"];
    $id_utilisateur = $_SESSION['id_utilisateur']; // Récupérer l'ID de l'utilisateur depuis la session
    
    try {
        // Mettre à jour le statut de paiement dans la base de données
        $updateReq = $bdd->prepare("UPDATE Utilisateur SET payer = :payer WHERE id_utilisateur = :id_utilisateur");
        $updateReq->bindParam(':payer', $payment_status);
        $updateReq->bindParam(':id_utilisateur', $id_utilisateur);
        $updateReq->execute();

        // Redirection vers la page de connexion après la mise à jour du paiement
        header("Location: connexion.php");
        exit();
    } catch (PDOException $e) {
        echo "Erreur lors de la mise à jour du statut de paiement : " . $e->getMessage();
    }
} else {
    // Les informations bancaires ne sont pas complètes, afficher un message d'erreur ou rediriger vers une autre page
    echo "Veuillez remplir toutes les informations bancaires.";
    // Ou rediriger vers une autre page
    // header("Location: autre_page.php");
    // exit();
}
?>
