<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nous contacter</title>
    <link rel="stylesheet" href="formulaire.css">

</head>

<body>

<a href="https://imgbb.com/"><img src="https://i.ibb.co/cyDfF23/image.png" alt="image" border="0"></a>

<form method="POST" action="contact-data.php">
    <label for="prenom">Prénom*</label>
    <input type="text" id="prenom" name="prenom" placeholder="Prénom.." required>
    <br />
    <label for="nom">Nom*</label>
    <input type="text" id="nom" name="nom" placeholder="Nom..." required>
    <br />
    <label for="email">Email*</label>
    <input type="text" id="email" name="email" placeholder="Email" required>
    <br />
    <label for="tel">Tel*</label>
    <input type="tel" id="tel" name="tel" placeholder="Votre numéro de téléphone.." required>
    <br />
    <label for="msg">Message*</label>
    <textarea id="msg" name="msg" placeholder="Message.." required></textarea>
    <br />

    <input type="submit" value="Envoyer" name="contact"> 
    <br />
</form>

</body>
</html>
