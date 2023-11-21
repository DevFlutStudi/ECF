<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="formulaire.css">
</head>
<body>

<a href="https://imgbb.com/"><img src="https://i.ibb.co/cyDfF23/image.png" alt="image" border="0"></a>

<form method="POST" action="car_data.php" enctype="multipart/form-data">
    <label for="Prix">Prix..*</label>
    <input type="number" id="Prix" name="Prix" placeholder="0..." required>
    <br />
    <label for="Titre">Titre</label>
    <input type="text" id="Titre" name="Titre" placeholder="Titre..." required>
    <br />
    <label for="equipement">equipement*</label>
    <input type="text" id="equipement" name="equipement" placeholder="Séparer de virgule entre chaque equipement" required>
    <br />
    Marque
    <br />
    <label for="BMW">BMW</label>
    <input type="checkbox" name="BMW" value="1">
    <br />
    <label for="Toyota">Toyota</label>
    <input type="checkbox" name="Toyota" value="1">
    <br />
    <label for="Peugeot">Peugeot</label>
    <input type="checkbox" name="Peugeot" value="1">
    <br />
    <label for="Annee">Année de circulation</label>
    <input type="number" id="annee" name="annee" placeholder="0..." required>
    <label for="Kilo">Kilométrage*</label>
    <input type="number" id="Kilo" name="Kilo" placeholder="0..." required>
    <input type="submit" value="M'inscrire" name="car"> 
    <input type="reset" value="Effacer">
    <br />
</form>

</body>
</html>