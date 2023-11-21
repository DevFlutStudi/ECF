<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="formulaire.css">
</head>
<body>

<form method="POST" action="add_comment.php">
    <label for="nom">Nom de l'employer*</label>
    <input type="text" id="nom" name="nom" placeholder="Nom..." required>
    <br />
    <label for="commentaire">Email de l'employer*</label>
    <input type="text" id="commentaire" name="commentaire" placeholder="Commentaire" required>
    <br />
    <label for="note">Un</label>
    <input type="radio" id="un" name="note" value="1">
    <label for="note">Deux</label>
    <input type="radio" id="deux" name="note" value="2">
    <label for="note">Trois</label>
    <input type="radio" id="trois" name="note" value="3">
    <label for="note">Quatres</label>
    <input type="radio" id="quatre" name="note" value="4">
    <label for="note">Cinq</label>
    <input type="radio" id="Cinq" name="note" value="5">



    <input type="submit" value="Soumettre" name="avis"> 

</form>

</body>
</html>