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

try {
    $requete = $bdd->query("SELECT * FROM services");
    $resultats = $requete->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affichage des Services</title>
    <link rel="stylesheet" href="services.css">
</head>
<body>

<H1>Liste des Services</H1>

<?php
foreach ($resultats as $service) {
    echo "<h3>" . $service['Titre'] . "</h3>";
    echo "<p><strong>Description :</strong> " . $service['descr'] . "</p>";
    echo "<hr>";
}
?>



</body>
</html>
