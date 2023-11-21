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

if (isset($_POST['service'])) {
    $Titre = $_POST['Titre'];
    $descr = $_POST['descr'];

    try {
        $requete = $bdd->prepare("INSERT INTO services (titre, descr) VALUES (:Titre, :descr)");
        $requete->bindParam(':Titre', $Titre);
        $requete->bindParam(':descr', $descr);
        $requete->execute();
        header("Location: service.php");
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
?>
