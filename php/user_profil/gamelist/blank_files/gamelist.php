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
            $platform = 'Playstation 5';
            $query = $connectbdd->prepare('SELECT * FROM games WHERE platform = ?');
            $query->execute([$platform]);
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
        <?php
            $platform = 'Playstation 4';
            $query = $connectbdd->prepare('SELECT * FROM games WHERE platform = ?');
            $query->execute([$platform]);
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
        <h2>Playstation 3</h2>
        <?php
            $platform = 'Playstation 3';
            $query = $connectbdd->prepare('SELECT * FROM games WHERE platform = ?');
            $query->execute([$platform]);
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
        <h2>Playstation 2</h2>
        <?php
            $platform = 'Playstation 2';
            $query = $connectbdd->prepare('SELECT * FROM games WHERE platform = ?');
            $query->execute([$platform]);
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
        <h2>Playstation 1</h2>
        <?php
            $platform = 'Playstation 1';
            $query = $connectbdd->prepare('SELECT * FROM games WHERE platform = ?');
            $query->execute([$platform]);
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
        <h2>Playstation portable Vita</h2>
        <?php
            $platform = 'Playstation portable Vita';
            $query = $connectbdd->prepare('SELECT * FROM games WHERE platform = ?');
            $query->execute([$platform]);
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
        <h2>Playstation portable</h2>
        <?php
            $platform = 'Playstation Portable';
            $query = $connectbdd->prepare('SELECT * FROM games WHERE platform = ?');
            $query->execute([$platform]);
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
        <h2>Xbox Series X</h2>
        <?php
            $platform = 'Xbox series x';
            $query = $connectbdd->prepare('SELECT * FROM games WHERE platform = ?');
            $query->execute([$platform]);
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
        <h2>Xbox One</h2>
        <?php
            $platform = 'Xbox one';
            $query = $connectbdd->prepare('SELECT * FROM games WHERE platform = ?');
            $query->execute([$platform]);
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
        <h2>Xbox 360</h2>
        <?php
            $platform = 'Xbox 360';
            $query = $connectbdd->prepare('SELECT * FROM games WHERE platform = ?');
            $query->execute([$platform]);
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
        <h2>Xbox</h2>
        <?php
            $platform = 'Xbox';
            $query = $connectbdd->prepare('SELECT * FROM games WHERE platform = ?');
            $query->execute([$platform]);
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
    </div>
</body>
</html>