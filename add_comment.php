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

if (isset($_POST['avis'])) {
    $nom = $_POST['nom'];
    $commentaire = $_POST['commentaire'];

    // Vérifier si une note est sélectionnée
    if (isset($_POST['note'])) {
        $note = $_POST['note'];

        $requete = $bdd->prepare("INSERT INTO avis (nom, commentaire, note) VALUES (:nom, :commentaire, :note)");
        $requete->bindParam(':nom', $nom);
        $requete->bindParam(':commentaire', $commentaire);
        $requete->bindParam(':note', $note);
        $requete->execute();

        header("Location: Admin.php");
        exit();
    } else {
        // Aucune note n'est sélectionnée, gérer cette situation selon vos besoins
        echo "Veuillez sélectionner une note.";
    }
}
?>
