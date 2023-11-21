<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vente de Véhicules</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
<a href="https://imgbb.com/"><img src="https://i.ibb.co/cyDfF23/image.png" alt="image" border="0"></a>

<a href="login.php" class="connexion-link">Connexion Employé !</a>
<?php include('Fermeture.php'); ?>

<div class="button-container">
    <button class="button" onclick="window.location.href='horaire.php'">Voir les horaires</button>
    <button class="button button-secondary" onclick="window.location.href='service.php'">Nos Services</button>
    <button class="button button-secondary" onclick="window.location.href='Contact.html'">Nos Contacts</button>

    <form method="post">
        <div class="range-container">
            <label for="prix">Filtrer par prix :</label>
            <input type="range" id="prix" name="prix" min="0" max="1000000" step="1000" oninput="updateValue('prix', 'prix-value')">
            <div id="prix-value" class="range-value">0</div>
        </div>

        <div class="range-container">
            <label for="kilometres">Filtrer par kilomètres :</label>
            <input type="range" id="kilometres" name="kilometres" min="0" max="1000000" step="1000" oninput="updateValue('kilometres', 'kilometres-value')">
            <div id="kilometres-value" class="range-value">0</div>
        </div>

        <button type="submit">Appliquer les filtres</button>
    </form>

    <?php
    $serveur = "localhost";
    $utilisateur = "root";
    $mot_de_passe = "root";

    try {
        $bdd = new PDO("mysql:host=$serveur;dbname=vente_vehicules", $utilisateur, $mot_de_passe);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }

    // Appliquer les filtres si le formulaire est soumis
    $filtrePrix = isset($_POST['prix']) ? $_POST['prix'] : 100000; // Valeur maximale par défaut si le filtre n'est pas défini
    $filtreKilometres = isset($_POST['kilometres']) ? $_POST['kilometres'] : 100000; // Valeur maximale par défaut si le filtre n'est pas défini

    // Récupérer les informations de la base de données avec les filtres
    try {
        $requete = $bdd->prepare("SELECT * FROM vehicules WHERE prix <= :filtrePrix AND kilo <= :filtreKilometres");
        $requete->bindParam(':filtrePrix', $filtrePrix, PDO::PARAM_INT);
        $requete->bindParam(':filtreKilometres', $filtreKilometres, PDO::PARAM_INT);
        $requete->execute();
        $resultats = $requete->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
    ?>

    <h2>Nos véhicules d'occasion :</h2>

    <?php

    // Afficher les informations récupérées
    foreach ($resultats as $vehicule) {
        echo "<p><strong>Titre :</strong> " . $vehicule['titre'] . "</p>";
        echo "<p><strong>Prix :</strong> " . $vehicule['prix'] . "</p>";
        echo "<p><strong>Équipement :</strong> " . $vehicule['equipement'] . "</p>";
        echo "<p><strong>Kilométrage :</strong> " . $vehicule['kilo'] . "</p>";

        echo "<p><strong>Marques :</strong> ";
        if ($vehicule['BMW']) {
            echo "BMW ";
        }
        if ($vehicule['Toyota']) {
            echo "Toyota ";
        }
        if ($vehicule['Peugeot']) {
            echo "Peugeot";
        }
        echo "</p>";

        echo "<hr>";
    }
    ?>

    <?php include('horaire.php'); ?>
    <?php include('commentaire.php'); ?>
    <?php include('boxparrot.php'); ?>

</body>
</html>
