<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "root";
    
    try{
        $bdd = new PDO("mysql:host=$servername;dbname=utilisateurs", $username, $password);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "connexion reussie !";
    }
    catch(PDOException $e){
        echo "Erreur : " .$e->getMessage();
    }

    $error_msg = ""; // Initialisez la variable d'erreur

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $email = $_POST['email'];
        $password = $_POST['password'];

        if($email != "" && $password != ""){
            // Connexion à la base de données de manière sécurisée avec des requêtes préparées
            $requete = $bdd->prepare("SELECT * FROM users WHERE email = :email AND mdp = :password");
            $requete->bindParam(":email", $email);
            $requete->bindParam(":password", $password);
            $requete->execute();

            // Récupération du résultat
            $utilisateur = $requete->fetch();

            if($utilisateur !== false){
                // Vérification du statut isAdmin
                if ($utilisateur['isAdmin'] == 1) {
                    header("Location: Admin.php");
                    exit();
                } else {
                    header("Location: Employer.php");
                    exit();
                }
            }
            else{
                $error_msg = "Email ou Mot de passe incorrect !";
            }
        }
    }
    ?>

    <form method="POST" action="">
        <label>Email</label>
        <input type="email" placeholder="Entrez votre Email..." id="email" name="email" required />
        <label>Mots de passe</label>
        <input type="password" placeholder="Entrez votre mot de passe..." id="password" name="password" required />
        <input type="submit" value="Se Connecter" name="ok">
        <p><?php echo $error_msg; ?></p>
    </form>

</body>
</html>
