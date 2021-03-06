<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/inscription_connection_style/stylesheet_connection_form.css">
    <link rel="apple-touch-icon" sizes="180x180" href="../../ressources/png/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../../ressources/png/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../../ressources/png/favicon/favicon-16x16.png">
    <link rel="manifest" href="../../ressources/png/favicon/site.webmanifest">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <title>Connexion | VideoGamesJourney</title>
</head>
<body>
    <div class="form_container">
        <div class="form">
            <h1>
                Connexion
            </h1>
            <form method="POST" action="connection_verify.php">
                <input type="text" name="username" placeholder="Nom d'utilisateur" required>
                <input type="password" name="passw" placeholder="Mot de passe" required>
                <input type="submit" name="submit" class="submit_input">
            </form>
            <!-- <a href="./lost_passw_form.php">Mot de passe oublié</a> -->
        </div>
    </div>
    <p>
        <?php    
            if(isset($_GET['accountcreate'])){
                $success = 'Votre compte a bien été crée';
                echo $success;
            }
            if(isset($_GET['error'])){
                $error = 'Nom d\'utilisateur ou mot de passe incorrect';
                echo $error;
            }
        ?>
    </p>
</body>
</html>