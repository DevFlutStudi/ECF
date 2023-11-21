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

if (isset($_POST['car'])) {
    $prix = $_POST['Prix'];
    $titre = $_POST['Titre'];
    $equipement = $_POST['equipement'];
    $Circulation = $_POST['annee'];
    $kilo = $_POST['Kilo'];

    // Vérifie quelle marque est cochée
    $BMW = isset($_POST['BMW']) ? 1 : 0;
    $Toyota = isset($_POST['Toyota']) ? 1 : 0;
    $Peugeot = isset($_POST['Peugeot']) ? 1 : 0;



    $requete = $bdd->prepare("INSERT INTO vehicules (prix, titre, equipement, Circulation, Kilo, BMW, Toyota, Peugeot) VALUES (:prix, :titre, :equipement, :annee, :Kilo, :BMW, :Toyota, :Peugeot)");

    $requete->execute(
        array(
            "prix" => $prix,
            "titre" => $titre,
            "equipement" => $equipement,
            "annee" => $Circulation,
            "Kilo" => $kilo,
            "BMW" => $BMW,
            "Toyota" => $Toyota,
            "Peugeot" => $Peugeot,

        )
    );
    header("Location: Admin.php");
}
?>
