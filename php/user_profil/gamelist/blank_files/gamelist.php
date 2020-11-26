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
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../../css/list_style/stylesheet_gamelist.css">
    <title>GameList | JourneyMemories</title>
</head>
<body>
    <div class="list_container">
        <header>
            <h1>
                GameList
            </h1>
            <a href="" class="game_add">
                Ajouter un jeu non existant
            </a>
        </header>
        <h2>Playstation 5</h2>
        <?php
            $ps5 = 'playstation5';
            $query = $connectbdd->prepare('SELECT * FROM games WHERE platform = ?');
            $query->execute([$ps5]);
            $result = $query->fetchAll();

            foreach($result as $gamescontent)
            {
                echo 
                "<div class=\"games_array\">
                    <div class=\"array_content\">
                        <p class=\"array_title\">Jaquette</p>
                        <p class=\"array_title\">Nom</p>
                        <p class=\"array_title\">Genre</p>
                        <p class=\"array_title\">Plateforme</p>
                        <span><img src=\"../../gamelist/covers/".$gamescontent["cover"]."\"></span>
                        <p class=\"content\">".$gamescontent["gamename"]."</p>
                        <p class=\"content\">".$gamescontent["gametype"]."</p>
                        <p class=\"content\">".$gamescontent["platform"]."</p>
                    </div>
                </div>";
            }
        ?>
        <h2>Playstation 4</h2>
        <div class="games_array">
                <div class="array_content">
                    <p class="array_title">Jaquette</p>
                    <p class="array_title">Nom</p>
                    <p class="array_title">Genre</p>
                    <p class="array_title">Plateforme</p>
                    <p class="content">image</p>
                    <p class="content">Skyrim</p>
                    <p class="content">rpg</p>
                    <p class="content">ps4</p>
                    <p class="content">image</p>
                    <p class="content">Skyrim</p>
                    <p class="content">rpg</p>
                    <p class="content">ps4</p>
                </div>
        </div>
        <h2>Playstation 3</h2>
        <div class="games_array">
                <div class="array_content">
                    <p class="array_title">Jaquette</p>
                    <p class="array_title">Nom</p>
                    <p class="array_title">Genre</p>
                    <p class="array_title">Plateforme</p>
                    <p class="content">image</p>
                    <p class="content">Skyrim</p>
                    <p class="content">rpg</p>
                    <p class="content">ps4</p>
                    <p class="content">image</p>
                    <p class="content">Skyrim</p>
                    <p class="content">rpg</p>
                    <p class="content">ps4</p>
                </div>
        </div>
        <h2>Playstation 2</h2>
        <div class="games_array">
                <div class="array_content">
                    <p class="array_title">Jaquette</p>
                    <p class="array_title">Nom</p>
                    <p class="array_title">Genre</p>
                    <p class="array_title">Plateforme</p>
                    <p class="content">image</p>
                    <p class="content">Skyrim</p>
                    <p class="content">rpg</p>
                    <p class="content">ps4</p>
                    <p class="content">image</p>
                    <p class="content">Skyrim</p>
                    <p class="content">rpg</p>
                    <p class="content">ps4</p>
                </div>
        </div>
        <h2>Playstation 1</h2>
        <div class="games_array">
                <div class="array_content">
                    <p class="array_title">Jaquette</p>
                    <p class="array_title">Nom</p>
                    <p class="array_title">Genre</p>
                    <p class="array_title">Plateforme</p>
                    <p class="content">image</p>
                    <p class="content">Skyrim</p>
                    <p class="content">rpg</p>
                    <p class="content">ps4</p>
                    <p class="content">image</p>
                    <p class="content">Skyrim</p>
                    <p class="content">rpg</p>
                    <p class="content">ps4</p>
                </div>
        </div>
        <h2>Playstation portable Vita</h2>
        <div class="games_array">
                <div class="array_content">
                    <p class="array_title">Jaquette</p>
                    <p class="array_title">Nom</p>
                    <p class="array_title">Genre</p>
                    <p class="array_title">Plateforme</p>
                    <p class="content">image</p>
                    <p class="content">Skyrim</p>
                    <p class="content">rpg</p>
                    <p class="content">ps4</p>
                    <p class="content">image</p>
                    <p class="content">Skyrim</p>
                    <p class="content">rpg</p>
                    <p class="content">ps4</p>
                </div>
        </div>
        <h2>Playstation portable</h2>
        <div class="games_array">
                <div class="array_content">
                    <p class="array_title">Jaquette</p>
                    <p class="array_title">Nom</p>
                    <p class="array_title">Genre</p>
                    <p class="array_title">Plateforme</p>
                    <p class="content">image</p>
                    <p class="content">Skyrim</p>
                    <p class="content">rpg</p>
                    <p class="content">ps4</p>
                    <p class="content">image</p>
                    <p class="content">Skyrim</p>
                    <p class="content">rpg</p>
                    <p class="content">ps4</p>
                </div>
        </div>
    </div>
</body>
</html>