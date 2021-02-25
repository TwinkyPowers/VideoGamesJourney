<?php
    session_start();

    if(!isset($_SESSION['id']))
    {
        header("location: ../../index.php");
    }
    elseif($_SESSION['idrole'] != 1){
        header("location: ../../index.php");
    }
    else {
        $username = $_SESSION['username'];

        try {
            $connectbdd = new PDO("mysql:host=localhost;dbname=journeymemories", "root", "");
            $connectbdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e){
            die($e->getMessage());
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/user_profil_style/admin_space.css">
    <title>Admin | VideoGamesJourney</title>
</head>
<body>
    <a href="./user_profil.php" class="home_button">Accueil</a>
    <div class="selector_container">
        <a href="./admin_space.php?selector=users" class="selector">Users</a>
        <a href="./admin_space.php?selector=games" class="selector">games</a>
    </div>
    <?php
        if(!isset($_GET['selector'])){
            $selector = "Veuillez selectionner une table";
        }
        else{
            $selector = htmlspecialchars($_GET['selector']);
        }
    ?>
    <h1>
        <?php
            echo $selector;
         ?>
    </h1>
    <div class="array_container">
        <?php

        ?>    
    </div>
</body>
</html>