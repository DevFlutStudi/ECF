<?php
$servername = "localhost";
$username = "root";
$password = "root";

try {
    $bdd = new PDO("mysql:host=$servername;dbname=utilisateurs", $username, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

if (isset($_POST['ok'])) {
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $mdp = $_POST['pass'];
    $email = $_POST['email'];

    // Vérifie si la checkbox "Admin" est cochée
    $isAdmin = isset($_POST['Admin']) ? 1 : 0;

    $requete = $bdd->prepare("INSERT INTO users (prenom, nom, mdp, email, isAdmin) VALUES (:prenom, :nom, :mdp, :email, :isAdmin)");
    $requete->execute(
        array(
            "prenom" => $prenom,
            "nom" => $nom,
            "mdp" => $mdp,
            "email" => $email,
            "isAdmin" => $isAdmin,
        )
    );
        header("Location: Admin.php");
}
?>
