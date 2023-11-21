<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<?php

// Définir les horaires
$horaires = array(
    "lundi" => array(
        "ouverture" => "08:45",
        "pause_midi" => array("debut" => "12:00", "fin" => "14:00"),
        "fermeture" => "18:00"
    ),
    "mardi" => array(
        "ouverture" => "08:45",
        "pause_midi" => array("debut" => "12:00", "fin" => "14:00"),
        "fermeture" => "18:00"
    ),
    "mercredi" => array(
        "ouverture" => "08:45",
        "pause_midi" => array("debut" => "12:00", "fin" => "14:00"),
        "fermeture" => "18:00"
    ),
    "jeudi" => array(
        "ouverture" => "08:45",
        "pause_midi" => array("debut" => "12:00", "fin" => "14:00"),
        "fermeture" => "18:00"
    ),
    "vendredi" => array(
        "ouverture" => "08:45",
        "pause_midi" => array("debut" => "12:00", "fin" => "14:00"),
        "fermeture" => "18:00"
    ),
    "samedi" => array(
        "ouverture" => "08:45",
        "fermeture" => "12:00"
    ),
    "dimanche" => "Fermé"
);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horaires</title>
    <style>
        .horaire-case {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
            width: 200px;
        }
    </style>
</head>
<body>
<H2>Nos Horaires</H2>
<?php
// Afficher les horaires dans une case
foreach ($horaires as $jour => $horaire) {
    echo '<div class="horaire-case">';
    echo '<strong>' . ucfirst($jour) . '</strong>: ';
    
    if ($horaire === "Fermé") {
        echo "Fermé";
    } else {
        echo "Ouverture à " . $horaire['ouverture'];
        
        if (isset($horaire['pause_midi'])) {
            echo ", Pause de " . $horaire['pause_midi']['debut'] . " à " . $horaire['pause_midi']['fin'];
        }
        
        echo ", Fermeture à " . $horaire['fermeture'];
    }
    
    echo '</div>';
}
?>

</body>
</html>