<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/inscription_connection_style/stylesheet_inscription_form.css">
    <link rel="apple-touch-icon" sizes="180x180" href="../../ressources/png/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../../ressources/png/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../../ressources/png/favicon/favicon-16x16.png">
    <link rel="manifest" href="../../ressources/png/favicon/site.webmanifest">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <title>Inscription | VideoGamesJourney</title>
</head>
<?php
    $error = '';
    if(isset($_GET['error'])){
        if($_GET['error'] === 'empty'){
            $error = 'Veuillez choisir un nom d\'utilisateur';
        }
        if($_GET['error'] === 'length'){
            $error = 'Le nom d\'utilisateur est trop long';
        }
        if($_GET['error'] === 'passw'){
            $error = 'Les mots de passe ne sont pas identiques';
        }
        if($_GET['error'] === 'exist'){
            $error = 'Nom d\'utilisateur déjà existant';
        }
        if($_GET['error'] === 'existmail'){
            $error = 'Adresse email déjà existante';
        }
        if($_GET['error'] === 'image'){
            $error = 'Veuillez choisir une image d\'utilisateur';
        }
        if($_GET['error'] === 'imageformat'){
            $error = 'Veuillez choisir un format d\'image valide (png ou jpg) d\'une taille inférieur à 1.5mo';
        }
    }
?>
<body>
    <div class="form_container">
        <div class="form">
            <h1>
                Inscription
            </h1>
            <form method="POST" action="inscription_insert.php" enctype="multipart/form-data">
                <input type="text" name="username" placeholder="Nom d'utilisateur" required>
                <input type="email" name="email_adress" placeholder="Adresse Email" required>
                <input type="password" name="passw1" placeholder="Mot de passe" required>
                <input type="password" name="passw2" placeholder="Confirmation mot de passe" required>
                <p>Choisir une image de profil</p>
                <input type="file" name="userimage" class="upload_input">
                <input type="submit" name="submit" value="Envoyer" class="submit_input">
            </form>
            <p class="error">
                <?= $error ?>
            </p>
        </div>
    </div>
</body>
</html>