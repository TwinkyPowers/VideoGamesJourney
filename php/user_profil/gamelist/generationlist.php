<?php
session_start();

if(!isset($_SESSION['id']))
{
    header("location: ../../index.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/list_style/stylesheet_generationlist.css">
    <title>GameList | JourneyMemories</title>
</head>
<body>
    <div class="list_container">
        <a class="profil_link" href="">
            Retour
        </a>
        <header>
            <h1>
                nom de la génération
            </h1>
            <form method="" action="">
                <input type="search" name="search_bar" placeholder="Rechercher un jeu" class="search_bar">
                <label>Terminé
                    <input type="radio" name="status" value="finished" id="finished">
                </label>
                <label>En cours
                    <input type="radio" name="status" value="inprogress" id="inprogress">
                </label>
                <input type="submit" name="submit" value="Ajouter" class="submit_button">
            </form>
            <a href="" class="game_add">
                Ajouter un jeu non existant
            </a>
        </header>
        <div class="games_array">
            <h2>
                Jeux terminés
            </h2>
                <div class="array_header">
                    <p class="array_title">
                        Jaquette
                    </p>
                    <p class="array_title">
                        Nom
                    </p>
                    <p class="array_title">
                        Genre
                    </p>
                </div>
        </div>
    </div>
</body>
</html>