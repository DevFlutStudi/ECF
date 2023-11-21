<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel d'Administration</title>
</head>
<body>

<!-- index.php -->
<?php
session_start();

// Vérifiez si le formulaire est soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Inversez la valeur de la session 'message_active'
    $_SESSION['message_active'] = !isset($_SESSION['message_active']) || !$_SESSION['message_active'];
}

$servername = "localhost";
$username = "root";
$password = "root";

try {
    $bdd = new PDO("mysql:host=$servername;dbname=contact", $username, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

// Suppression d'un contact si le formulaire est soumis
if (isset($_POST['delete_id'])) {
    $idToDelete = $_POST['delete_id'];

    try {
        $requeteDelete = $bdd->prepare("DELETE FROM contact WHERE id = :id");
        $requeteDelete->bindParam(':id', $idToDelete);
        $requeteDelete->execute();
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}

try {
    $requete = $bdd->query("SELECT * FROM contact");
    $resultats = $requete->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>

<h1>Liste des Contacts</h1>

<?php
foreach ($resultats as $contact) {
    echo "<h3>Nom: " . $contact['nom'] . "</h3>";
    echo "<p><strong>Prénom :</strong> " . $contact['prenom'] . "</p>";
    echo "<p><strong>Tel :</strong> " . $contact['tel'] . "</p>";
    echo "<p><strong>Email :</strong> " . $contact['email'] . "</p>";
    echo "<p><strong>Message :</strong> " . $contact['msg'] . "</p>";
    echo "<hr>";

    // Formulaire de suppression avec le bouton de suppression
    echo "<form method='post' action=''>";
    echo "<input type='hidden' name='delete_id' value='" . $contact['id'] . "'>";
    echo "<input type='submit' value='Supprimer'>";
    echo "</form>";

    echo "<hr>";
}
?>

</body>
</html>
