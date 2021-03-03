<?php 
    session_start();
    
    if(!isset($_SESSION['id']))
    {
    header("location: ../../index.php");
    }
    else
    {
        try {
            $connectbdd = new PDO("mysql:host=localhost;dbname=journeymemories", "root", "");
            $connectbdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e){
            die($e->getMessage());
        }

        if(isset($_GET['create'])){
            $createform = htmlspecialchars($_GET['create']);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/list_style/stylesheet_gamepage.css">
    <link rel="apple-touch-icon" sizes="180x180" href="../../../ressources/png/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../../../ressources/png/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../../../ressources/png/favicon/favicon-16x16.png">
    <link rel="manifest" href="../../../ressources/png/favicon/site.webmanifest">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <title>GamePage | VideoGamesJourney</title>
</head>

<body>
    <div class="nav_bar">
        <a class="nav_bar_links" href="../user_profil.php">
            Mon profil
        </a>
        <a class="nav_bar_links" href="">
            Contacts
        </a>
        <a class="nav_bar_links" href="">
            Fonctionnement du site
        </a>
        <a class="nav_bar_links" href="../deconnection.php">
            Déconnexion
        </a>
    </div>
    <div class="main_container">
        <div class="game_container">
            <img class="game_cover" src="../../user_profil/gamelist/covers/assassinscreedoriginsjaquettepc.jpg">
            <h1 class="game_title">GTA Vice City</h1>
            <!-- <p class="game_type">Open World action</p> -->
            <p class="platform">Playstation 2</p>
        </div>
        <div class="commentaries_section">
            <div class="header_com_section">
                <h2 class="commentaries_section_title">Espace commentaire</h2>
                <a class="create_com_link" href="./Gamepage.php?create=1">Écrire un commentaire</a>
            </div>
            <div class="commentaries_list">
                <?php
                    if(isset($createform)){
                        if($createform == 1){
                            echo "
                                <form method=\"POST\" action=\"./new_com_query.php\" enctype=\"multipart/form-data\">
                                    <input type=\"text\" name=\"com_title\" class=\"create_com_title\" placeholder=\"Titre\">
                                    <textarea type=\"text\" name=\"com_text\" class=\"create_com_text\"></textarea>
                                    <input type=\"submit\" name=\"submit\" value=\"Envoyer\" class=\"submit_input\">
                                </form>
                                ";          
                        }
                        else {
                            header("location: ./Gamepage.php");
                        }
                    }
                    else {
                        echo "com";
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>