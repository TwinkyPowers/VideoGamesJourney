<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/inscription_connection_style/stylesheet_connection_form.css">
    <title>Connexion | JourneyMemories</title>
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
            <a href="./lost_passw_form.php">Mot de passe oublié</a>
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