<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="inscription.css">
</head>
<body>

<form method="POST" action="traitement.php">
    <label for="nom">Nom de l'employer*</label>
    <input type="text" id="nom" name="nom" placeholder="Nom..." required>
    <br />
    <label for="prenom">Prénom de l'employer*</label>
    <input type="text" id="prenom" name="prenom" placeholder="Prénom.." required>
    <br />
    <label for="mail">Email de l'employer*</label>
    <input type="text" id="email" name="email" placeholder="Email" required>
    <br />
    <label for="pass">Mots de passe*</label>
    <input type="password" id="pass" name="pass" placeholder="Entre le Mots de passe.." required>
    <br />
    <label for="admin">Administrateur</label>
    <input type="checkbox" name="Admin" value="1">

    <input type="submit" value="Inscription" name="ok"> 
    <br />
</form>

</body>
</html>