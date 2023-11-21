<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avis</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "root";

try {
    $bdd = new PDO("mysql:host=$servername;dbname=comment", $username, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

// Récupération de tous les avis
$requete = $bdd->query("SELECT * FROM avis");
$avis = $requete->fetchAll(PDO::FETCH_ASSOC);

foreach ($avis as $avis) {
    echo "<div class='avis'>";
    echo "<p><strong>{$avis['nom']}</strong> - Note: {$avis['note']}</p>";
    echo "<p>{$avis['commentaire']}</p>";
    echo "</div>";
}

?>

</body>
</html>
