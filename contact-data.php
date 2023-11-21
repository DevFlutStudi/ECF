<?php
$servername = "localhost";
$username = "root";
$password = "root";

try {
    $bdd = new PDO("mysql:host=$servername;dbname=contact", $username, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

if (isset($_POST['contact'])) {
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $tel = $_POST['tel'];
    $email = $_POST['email'];
    $msg = $_POST['msg'];

    $requete = $bdd->prepare("INSERT INTO contact (prenom, nom, tel, email, msg) VALUES (:prenom, :nom, :tel, :email, :msg)");
    $requete->execute(
        array(
            "nom" => $nom,
            "prenom" => $prenom,
            "tel" => $tel,
            "email" => $email,
            "msg" => $msg,
        )
    );
    
    header("Location: contact.php");
}
?>
