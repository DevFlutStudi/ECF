<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="service.css">
</head>
<body>

<H1>Création de Service</H1>
<form method="POST" action="service-data.php">
    <label for="Titre">Titre..*</label>
    <input type="text" id="Titre" name="Titre" placeholder="titre du service..." required>
    <br />
    <label for="descr">Description</label>
    <textarea id="descr" name="descr" placeholder="Saisissez votre description..."></textarea>
    <br />

    <input type="submit" value="Ajouter Service" name="service"> 
    <input type="reset" value="Effacer">
    <br />
</form>

<?php
$serveur = "localhost";
$utilisateur = "root";
$mot_de_passe = "root";

try {
    $bdd = new PDO("mysql:host=$serveur;dbname=services", $utilisateur, $mot_de_passe);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

// Suppression d'une entrée si le formulaire est soumis
if (isset($_POST['delete_id'])) {
    $idToDelete = $_POST['delete_id'];

    try {
        $requeteDelete = $bdd->prepare("DELETE FROM services WHERE id = :id");
        $requeteDelete->bindParam(':id', $idToDelete);
        $requeteDelete->execute();
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}

// Récupération des services après suppression
try {
    $requete = $bdd->query("SELECT * FROM services");
    $resultats = $requete->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>

<H1>Liste des Services</H1>

<?php
foreach ($resultats as $service) {
    echo "<h2>ID: " . $service['id'] . "</h2>";
    echo "<h3>" . $service['Titre'] . "</h3>";
    echo "<p><strong>Description :</strong> " . $service['descr'] . "</p>";
    
    // Formulaire de suppression avec le bouton de suppression
    echo "<form method='post' action=''>";
    echo "<input type='hidden' name='delete_id' value='" . $service['id'] . "'>";
    echo "<input type='submit' value='Supprimer'>";
    echo "</form>";

    echo "<hr>";
}
?>

<?php
$serveur = "localhost";
$utilisateur = "root";
$mot_de_passe = "root";

try {
    $bdd = new PDO("mysql:host=$serveur;dbname=services", $utilisateur, $mot_de_passe);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

// Traitement de la modification si le formulaire est soumis
if (isset($_POST['update_id'])) {
    $idToUpdate = $_POST['update_id'];
    $nouveauTitre = $_POST['nouveau_titre'];
    $nouvelleDescription = $_POST['nouvelle_description'];

    try {
        $requeteUpdate = $bdd->prepare("UPDATE services SET Titre = :titre, descr = :descr WHERE id = :id");
        $requeteUpdate->bindParam(':id', $idToUpdate);
        $requeteUpdate->bindParam(':titre', $nouveauTitre);
        $requeteUpdate->bindParam(':descr', $nouvelleDescription);
        $requeteUpdate->execute();
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}

// Récupération des services après mise à jour
try {
    $requete = $bdd->query("SELECT * FROM services");
    $resultats = $requete->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>

<H1>Liste des Services</H1>

<?php
foreach ($resultats as $service) {
    echo "<h2>ID: " . $service['id'] . "</h2>";
    echo "<h3>" . $service['Titre'] . "</h3>";
    echo "<p><strong>Description :</strong> " . $service['descr'] . "</p>";
    
    // Formulaire de modification avec les champs pré-remplis
    echo "<form method='post' action=''>";
    echo "<input type='hidden' name='update_id' value='" . $service['id'] . "'>";
    echo "<label for='nouveau_titre'>Nouveau Titre:</label>";
    echo "<input type='text' name='nouveau_titre' value='" . $service['Titre'] . "'>";
    echo "<label for='nouvelle_description'>Nouvelle Description:</label>";
    echo "<input type='text' name='nouvelle_description' value='" . $service['descr'] . "'>";
    echo "<input type='submit' value='Modifier'>";
    echo "</form>";

    // Formulaire de suppression
    echo "<form method='post' action=''>";
    echo "<input type='hidden' name='delete_id' value='" . $service['id'] . "'>";
    echo "<input type='submit' value='Supprimer'>";
    echo "</form>";

    echo "<hr>";
}
?>

</body>
</html>