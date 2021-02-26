<?php
    session_start();

    if(!isset($_SESSION['id']))
    {
        header("location: ../../index.php");
    }
    else{
        $idrole = $_SESSION['idrole'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/user_profil_style/stylesheet_deconnection.css">
    <link rel="apple-touch-icon" sizes="180x180" href="../../ressources/png/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../../ressources/png/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../../ressources/png/favicon/favicon-16x16.png">
    <link rel="manifest" href="../../ressources/png/favicon/site.webmanifest">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <title>Déconnexion | VideoGamesJourney</title>
</head>
<body>
    <div class="main_container">
        <h1>Voulez vous vraiment vous déconnecter?</h1>
        <a href="./deconnection_query.php">Confirmer la déconnection</a>
        <?php 
            if($idrole == 1){
                echo "<a href=\"./admin_space.php\">Espace Admin</a>";
            }
        ?>
    </div>
</body>
</html>