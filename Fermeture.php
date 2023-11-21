<!-- header.php -->
<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Site Web</title>
</head>
<body>

<?php
// Vérifiez si la session 'message_active' est définie et si elle est à true
if (isset($_SESSION['message_active']) && $_SESSION['message_active']) {
    echo '<div style="background-color: #f8d7da; color: #721c24; padding: 20px; margin-bottom: 20px;">
        <strong>Message important:</strong> Votre Garage est Fermer !.
    </div>';
} else {
    echo '<div style="background-color: #d4edda; color: #155724; padding: 20px; margin-bottom: 20px;">
        <strong>Message Important:</strong> Votre Garage est Ouvert !.
    </div>';
}
?>
