<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="staff.css">
    <title>Panel d'Administration</title>
</head>
<body>
<a href="https://imgbb.com/"><img src="https://i.ibb.co/cyDfF23/image.png" alt="image" border="0"></a>

<!-- index.php -->
<?php
session_start();

// Vérifiez si le formulaire est soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Inversez la valeur de la session 'message_active'
    $_SESSION['message_active'] = !isset($_SESSION['message_active']) || !$_SESSION['message_active'];
}
?>

<?php include('Fermeture.php'); ?>


<h1>Panel D'Administration</h1>

<form method="post">
    <button type="submit">Ouvrir/Fermer le Garage</button>

</form>


<h2>Ajout / Modifier </h2>
<button onclick="window.location.href='service-admin.php'">Modifier Nos Services</button>
    <button onclick="window.location.href='add_car.php'">Ajouter un véhicule</button>
    <button onclick="window.location.href='inscription.php'">Ajouter un Employer</button>
    <button onclick="window.location.href='messagerie.php'">Client contact</button>
    <button onclick="window.location.href='index.php'">Retour a la page d'acceuil</button>

    <?php include('supprimer_commentaire.php'); ?>
    
</body>
</html>