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
    <link rel="stylesheet" href="../../../css/list_style/stylesheet_gamelist.css">
    <title>GameList | JourneyMemories</title>
</head>
<body>
    <div class="list_container">
        <header>
            <h1>
                GameList
            </h1>
            <a href="./add_new_game.php" class="game_add">
                Ajouter un jeu non existant
            </a>
        </header>
        <h2>Playstation 5</h2>
        <div class="games_array">
            <div class="array_content">
                <p class="array_title">Jaquette</p>
                <p class="array_title">Nom</p>
                <p class="array_title">Genre</p>
                <p class="array_title">...</p>
                <?php
                $platform = 'Playstation 5';
                $query = $connectbdd->prepare('SELECT * FROM games WHERE platform = ?');
                $query->execute([$platform]);
                $result = $query->fetchAll();

                foreach($result as $gamescontent){
                echo "<span><img src=\"./covers/".$gamescontent["cover"]."\"></span>
                <p class=\"content\">".$gamescontent["gamename"]."</p>
                <p class=\"content\">".$gamescontent["gametype"]."</p>
                <a href=\"./add_game_to_usergamelist_query.php?gameid=".$gamescontent["gameid"]."\" class=\"gamepagelink\">Ajouter ce jeu à ma GameList</a>";
                }
                ?>
            </div>
        </div>
        <h2>Playstation 4</h2>
        <div class="games_array">
            <div class="array_content">
                <p class="array_title">Jaquette</p>
                <p class="array_title">Nom</p>
                <p class="array_title">Genre</p>
                <p class="array_title">...</p>
                <?php
                $platform = 'Playstation 4';
                $query = $connectbdd->prepare('SELECT * FROM games WHERE platform = ?');
                $query->execute([$platform]);
                $result = $query->fetchAll();

                foreach($result as $gamescontent){
                echo "<span><img src=\"./covers/".$gamescontent["cover"]."\"></span>
                <p class=\"content\">".$gamescontent["gamename"]."</p>
                <p class=\"content\">".$gamescontent["gametype"]."</p>
                <a href=\"./add_game_to_usergamelist_query.php?gameid=".$gamescontent["gameid"]."\" class=\"gamepagelink\">Ajouter ce jeu à ma GameList</a>";
                }
                ?>
            </div>
        </div>
        <h2>Playstation 3</h2>
        <div class="games_array">
            <div class="array_content">
                <p class="array_title">Jaquette</p>
                <p class="array_title">Nom</p>
                <p class="array_title">Genre</p>
                <p class="array_title">...</p>
                <?php
                $platform = 'Playstation 3';
                $query = $connectbdd->prepare('SELECT * FROM games WHERE platform = ?');
                $query->execute([$platform]);
                $result = $query->fetchAll();

                foreach($result as $gamescontent){
                echo "<span><img src=\"./covers/".$gamescontent["cover"]."\"></span>
                <p class=\"content\">".$gamescontent["gamename"]."</p>
                <p class=\"content\">".$gamescontent["gametype"]."</p>
                <a href=\"./add_game_to_usergamelist_query.php?gameid=".$gamescontent["gameid"]."\" class=\"gamepagelink\">Ajouter ce jeu à ma GameList</a>";
                }
                ?>
            </div>
        </div>
        <h2>Playstation 2</h2>
        <div class="games_array">
            <div class="array_content">
                <p class="array_title">Jaquette</p>
                <p class="array_title">Nom</p>
                <p class="array_title">Genre</p>
                <p class="array_title">...</p>
                <?php
                $platform = 'Playstation 2';
                $query = $connectbdd->prepare('SELECT * FROM games WHERE platform = ?');
                $query->execute([$platform]);
                $result = $query->fetchAll();

                foreach($result as $gamescontent){
                echo "<span><img src=\"./covers/".$gamescontent["cover"]."\"></span>
                <p class=\"content\">".$gamescontent["gamename"]."</p>
                <p class=\"content\">".$gamescontent["gametype"]."</p>
                <a href=\"./add_game_to_usergamelist_query.php?gameid=".$gamescontent["gameid"]."\" class=\"gamepagelink\">Ajouter ce jeu à ma GameList</a>";
                }
                ?>
            </div>
        </div>
        <h2>Playstation 1</h2>
        <div class="games_array">
            <div class="array_content">
                <p class="array_title">Jaquette</p>
                <p class="array_title">Nom</p>
                <p class="array_title">Genre</p>
                <p class="array_title">...</p>
                <?php
                $platform = 'Playstation 1';
                $query = $connectbdd->prepare('SELECT * FROM games WHERE platform = ?');
                $query->execute([$platform]);
                $result = $query->fetchAll();

                foreach($result as $gamescontent){
                echo "<span><img src=\"./covers/".$gamescontent["cover"]."\"></span>
                <p class=\"content\">".$gamescontent["gamename"]."</p>
                <p class=\"content\">".$gamescontent["gametype"]."</p>
                <a href=\"./add_game_to_usergamelist_query.php?gameid=".$gamescontent["gameid"]."\" class=\"gamepagelink\">Ajouter ce jeu à ma GameList</a>";
                }
                ?>
            </div>
        </div>
        <h2>Playstation portable Vita</h2>
        <div class="games_array">
            <div class="array_content">
                <p class="array_title">Jaquette</p>
                <p class="array_title">Nom</p>
                <p class="array_title">Genre</p>
                <p class="array_title">...</p>
                <?php
                $platform = 'Playstation portable Vita';
                $query = $connectbdd->prepare('SELECT * FROM games WHERE platform = ?');
                $query->execute([$platform]);
                $result = $query->fetchAll();

                foreach($result as $gamescontent){
                echo "<span><img src=\"./covers/".$gamescontent["cover"]."\"></span>
                <p class=\"content\">".$gamescontent["gamename"]."</p>
                <p class=\"content\">".$gamescontent["gametype"]."</p>
                <a href=\"./add_game_to_usergamelist_query.php?gameid=".$gamescontent["gameid"]."\" class=\"gamepagelink\">Ajouter ce jeu à ma GameList</a>";
                }
                ?>
            </div>
        </div>
        <h2>Playstation Portable</h2>
        <div class="games_array">
            <div class="array_content">
                <p class="array_title">Jaquette</p>
                <p class="array_title">Nom</p>
                <p class="array_title">Genre</p>
                <p class="array_title">...</p>
                <?php
                $platform = 'Playstation Portable';
                $query = $connectbdd->prepare('SELECT * FROM games WHERE platform = ?');
                $query->execute([$platform]);
                $result = $query->fetchAll();

                foreach($result as $gamescontent){
                echo "<span><img src=\"./covers/".$gamescontent["cover"]."\"></span>
                <p class=\"content\">".$gamescontent["gamename"]."</p>
                <p class=\"content\">".$gamescontent["gametype"]."</p>
                <a href=\"./add_game_to_usergamelist_query.php?gameid=".$gamescontent["gameid"]."\" class=\"gamepagelink\">Ajouter ce jeu à ma GameList</a>";
                }
                ?>
            </div>
        </div>
        <h2>Xbox series X</h2>
        <div class="games_array">
            <div class="array_content">
                <p class="array_title">Jaquette</p>
                <p class="array_title">Nom</p>
                <p class="array_title">Genre</p>
                <p class="array_title">...</p>
                <?php
                $platform = 'Xbox series x';
                $query = $connectbdd->prepare('SELECT * FROM games WHERE platform = ?');
                $query->execute([$platform]);
                $result = $query->fetchAll();

                foreach($result as $gamescontent){
                echo "<span><img src=\"./covers/".$gamescontent["cover"]."\"></span>
                <p class=\"content\">".$gamescontent["gamename"]."</p>
                <p class=\"content\">".$gamescontent["gametype"]."</p>
                <a href=\"./add_game_to_usergamelist_query.php?gameid=".$gamescontent["gameid"]."\" class=\"gamepagelink\">Ajouter ce jeu à ma GameList</a>";
                }
                ?>
            </div>
        </div>
        <h2>Xbox One</h2>
        <div class="games_array">
            <div class="array_content">
                <p class="array_title">Jaquette</p>
                <p class="array_title">Nom</p>
                <p class="array_title">Genre</p>
                <p class="array_title">...</p>
                <?php
                $platform = 'Xbox one';
                $query = $connectbdd->prepare('SELECT * FROM games WHERE platform = ?');
                $query->execute([$platform]);
                $result = $query->fetchAll();

                foreach($result as $gamescontent){
                echo "<span><img src=\"./covers/".$gamescontent["cover"]."\"></span>
                <p class=\"content\">".$gamescontent["gamename"]."</p>
                <p class=\"content\">".$gamescontent["gametype"]."</p>
                <a href=\"./add_game_to_usergamelist_query.php?gameid=".$gamescontent["gameid"]."\" class=\"gamepagelink\">Ajouter ce jeu à ma GameList</a>";
                }
                ?>
            </div>
        </div>
        <h2>Xbox 360</h2>
        <div class="games_array">
            <div class="array_content">
                <p class="array_title">Jaquette</p>
                <p class="array_title">Nom</p>
                <p class="array_title">Genre</p>
                <p class="array_title">...</p>
                <?php
                $platform = 'Xbox 360';
                $query = $connectbdd->prepare('SELECT * FROM games WHERE platform = ?');
                $query->execute([$platform]);
                $result = $query->fetchAll();

                foreach($result as $gamescontent){
                echo "<span><img src=\"./covers/".$gamescontent["cover"]."\"></span>
                <p class=\"content\">".$gamescontent["gamename"]."</p>
                <p class=\"content\">".$gamescontent["gametype"]."</p>
                <a href=\"./add_game_to_usergamelist_query.php?gameid=".$gamescontent["gameid"]."\" class=\"gamepagelink\">Ajouter ce jeu à ma GameList</a>";
                }
                ?>
            </div>
        </div>
        <h2>Xbox</h2>
        <div class="games_array">
            <div class="array_content">
                <p class="array_title">Jaquette</p>
                <p class="array_title">Nom</p>
                <p class="array_title">Genre</p>
                <p class="array_title">...</p>
                <?php
                $platform = 'Xbox';
                $query = $connectbdd->prepare('SELECT * FROM games WHERE platform = ?');
                $query->execute([$platform]);
                $result = $query->fetchAll();

                foreach($result as $gamescontent){
                echo "<span><img src=\"./covers/".$gamescontent["cover"]."\"></span>
                <p class=\"content\">".$gamescontent["gamename"]."</p>
                <p class=\"content\">".$gamescontent["gametype"]."</p>
                <a href=\"./add_game_to_usergamelist_query.php?gameid=".$gamescontent["gameid"]."\" class=\"gamepagelink\">Ajouter ce jeu à ma GameList</a>";
                }
                ?>
            </div>
        </div>
        <h2>Nintendo Switch</h2>
        <div class="games_array">
            <div class="array_content">
                <p class="array_title">Jaquette</p>
                <p class="array_title">Nom</p>
                <p class="array_title">Genre</p>
                <p class="array_title">...</p>
                <?php
                $platform = 'Switch';
                $query = $connectbdd->prepare('SELECT * FROM games WHERE platform = ?');
                $query->execute([$platform]);
                $result = $query->fetchAll();

                foreach($result as $gamescontent){
                echo "<span><img src=\"./covers/".$gamescontent["cover"]."\"></span>
                <p class=\"content\">".$gamescontent["gamename"]."</p>
                <p class=\"content\">".$gamescontent["gametype"]."</p>
                <a href=\"./add_game_to_usergamelist_query.php?gameid=".$gamescontent["gameid"]."\" class=\"gamepagelink\">Ajouter ce jeu à ma GameList</a>";
                }
                ?>
            </div>
        </div>
        <h2>Nintendo Wii U</h2>
        <div class="games_array">
            <div class="array_content">
                <p class="array_title">Jaquette</p>
                <p class="array_title">Nom</p>
                <p class="array_title">Genre</p>
                <p class="array_title">...</p>
                <?php
                $platform = 'Wii U';
                $query = $connectbdd->prepare('SELECT * FROM games WHERE platform = ?');
                $query->execute([$platform]);
                $result = $query->fetchAll();

                foreach($result as $gamescontent){
                echo "<span><img src=\"./covers/".$gamescontent["cover"]."\"></span>
                <p class=\"content\">".$gamescontent["gamename"]."</p>
                <p class=\"content\">".$gamescontent["gametype"]."</p>
                <a href=\"./add_game_to_usergamelist_query.php?gameid=".$gamescontent["gameid"]."\" class=\"gamepagelink\">Ajouter ce jeu à ma GameList</a>";
                }
                ?>
            </div>
        </div>
        <h2>Nintendo Wii</h2>
        <div class="games_array">
            <div class="array_content">
                <p class="array_title">Jaquette</p>
                <p class="array_title">Nom</p>
                <p class="array_title">Genre</p>
                <p class="array_title">...</p>
                <?php
                $platform = 'Wii';
                $query = $connectbdd->prepare('SELECT * FROM games WHERE platform = ?');
                $query->execute([$platform]);
                $result = $query->fetchAll();

                foreach($result as $gamescontent){
                echo "<span><img src=\"./covers/".$gamescontent["cover"]."\"></span>
                <p class=\"content\">".$gamescontent["gamename"]."</p>
                <p class=\"content\">".$gamescontent["gametype"]."</p>
                <a href=\"./add_game_to_usergamelist_query.php?gameid=".$gamescontent["gameid"]."\" class=\"gamepagelink\">Ajouter ce jeu à ma GameList</a>";
                }
                ?>
            </div>
        </div>
        <h2>Nintendo GameCube</h2>
        <div class="games_array">
            <div class="array_content">
                <p class="array_title">Jaquette</p>
                <p class="array_title">Nom</p>
                <p class="array_title">Genre</p>
                <p class="array_title">...</p>
                <?php
                $platform = 'Gamecube';
                $query = $connectbdd->prepare('SELECT * FROM games WHERE platform = ?');
                $query->execute([$platform]);
                $result = $query->fetchAll();

                foreach($result as $gamescontent){
                echo "<span><img src=\"./covers/".$gamescontent["cover"]."\"></span>
                <p class=\"content\">".$gamescontent["gamename"]."</p>
                <p class=\"content\">".$gamescontent["gametype"]."</p>
                <a href=\"./add_game_to_usergamelist_query.php?gameid=".$gamescontent["gameid"]."\" class=\"gamepagelink\">Ajouter ce jeu à ma GameList</a>";
                }
                ?>
            </div>
        </div>
        <h2>Nintendo 64</h2>
        <div class="games_array">
            <div class="array_content">
                <p class="array_title">Jaquette</p>
                <p class="array_title">Nom</p>
                <p class="array_title">Genre</p>
                <p class="array_title">...</p>
                <?php
                $platform = 'N64';
                $query = $connectbdd->prepare('SELECT * FROM games WHERE platform = ?');
                $query->execute([$platform]);
                $result = $query->fetchAll();

                foreach($result as $gamescontent){
                echo "<span><img src=\"./covers/".$gamescontent["cover"]."\"></span>
                <p class=\"content\">".$gamescontent["gamename"]."</p>
                <p class=\"content\">".$gamescontent["gametype"]."</p>
                <a href=\"./add_game_to_usergamelist_query.php?gameid=".$gamescontent["gameid"]."\" class=\"gamepagelink\">Ajouter ce jeu à ma GameList</a>";
                }
                ?>
            </div>
        </div>
        <h2>SNES</h2>
        <div class="games_array">
            <div class="array_content">
                <p class="array_title">Jaquette</p>
                <p class="array_title">Nom</p>
                <p class="array_title">Genre</p>
                <p class="array_title">...</p>
                <?php
                $platform = 'SNES';
                $query = $connectbdd->prepare('SELECT * FROM games WHERE platform = ?');
                $query->execute([$platform]);
                $result = $query->fetchAll();

                foreach($result as $gamescontent){
                echo "<span><img src=\"./covers/".$gamescontent["cover"]."\"></span>
                <p class=\"content\">".$gamescontent["gamename"]."</p>
                <p class=\"content\">".$gamescontent["gametype"]."</p>
                <a href=\"./add_game_to_usergamelist_query.php?gameid=".$gamescontent["gameid"]."\" class=\"gamepagelink\">Ajouter ce jeu à ma GameList</a>";
                }
                ?>
            </div>
        </div>
        <h2>NES</h2>
        <div class="games_array">
            <div class="array_content">
                <p class="array_title">Jaquette</p>
                <p class="array_title">Nom</p>
                <p class="array_title">Genre</p>
                <p class="array_title">...</p>
                <?php
                $platform = 'NES';
                $query = $connectbdd->prepare('SELECT * FROM games WHERE platform = ?');
                $query->execute([$platform]);
                $result = $query->fetchAll();

                foreach($result as $gamescontent){
                echo "<span><img src=\"./covers/".$gamescontent["cover"]."\"></span>
                <p class=\"content\">".$gamescontent["gamename"]."</p>
                <p class=\"content\">".$gamescontent["gametype"]."</p>
                <a href=\"./add_game_to_usergamelist_query.php?gameid=".$gamescontent["gameid"]."\" class=\"gamepagelink\">Ajouter ce jeu à ma GameList</a>";
                }
                ?>
            </div>
        </div>
        <h2>Nintendo 3DS</h2>
        <div class="games_array">
            <div class="array_content">
                <p class="array_title">Jaquette</p>
                <p class="array_title">Nom</p>
                <p class="array_title">Genre</p>
                <p class="array_title">...</p>
                <?php
                $platform = '3DS';
                $query = $connectbdd->prepare('SELECT * FROM games WHERE platform = ?');
                $query->execute([$platform]);
                $result = $query->fetchAll();

                foreach($result as $gamescontent){
                echo "<span><img src=\"./covers/".$gamescontent["cover"]."\"></span>
                <p class=\"content\">".$gamescontent["gamename"]."</p>
                <p class=\"content\">".$gamescontent["gametype"]."</p>
                <a href=\"./add_game_to_usergamelist_query.php?gameid=".$gamescontent["gameid"]."\" class=\"gamepagelink\">Ajouter ce jeu à ma GameList</a>";
                }
                ?>
            </div>
        </div>
        <h2>Nintendo DS</h2>
        <div class="games_array">
            <div class="array_content">
                <p class="array_title">Jaquette</p>
                <p class="array_title">Nom</p>
                <p class="array_title">Genre</p>
                <p class="array_title">...</p>
                <?php
                $platform = 'DS';
                $query = $connectbdd->prepare('SELECT * FROM games WHERE platform = ?');
                $query->execute([$platform]);
                $result = $query->fetchAll();

                foreach($result as $gamescontent){
                echo "<span><img src=\"./covers/".$gamescontent["cover"]."\"></span>
                <p class=\"content\">".$gamescontent["gamename"]."</p>
                <p class=\"content\">".$gamescontent["gametype"]."</p>
                <a href=\"./add_game_to_usergamelist_query.php?gameid=".$gamescontent["gameid"]."\" class=\"gamepagelink\">Ajouter ce jeu à ma GameList</a>";
                }
                ?>
            </div>
        </div>
        <h2>GameBoy SP</h2>
        <div class="games_array">
            <div class="array_content">
                <p class="array_title">Jaquette</p>
                <p class="array_title">Nom</p>
                <p class="array_title">Genre</p>
                <p class="array_title">...</p>
                <?php
                $platform = 'GameBoy SP';
                $query = $connectbdd->prepare('SELECT * FROM games WHERE platform = ?');
                $query->execute([$platform]);
                $result = $query->fetchAll();

                foreach($result as $gamescontent){
                echo "<span><img src=\"./covers/".$gamescontent["cover"]."\"></span>
                <p class=\"content\">".$gamescontent["gamename"]."</p>
                <p class=\"content\">".$gamescontent["gametype"]."</p>
                <a href=\"./add_game_to_usergamelist_query.php?gameid=".$gamescontent["gameid"]."\" class=\"gamepagelink\">Ajouter ce jeu à ma GameList</a>";
                }
                ?>
            </div>
        </div>
        <h2>GameBoy</h2>
        <div class="games_array">
            <div class="array_content">
                <p class="array_title">Jaquette</p>
                <p class="array_title">Nom</p>
                <p class="array_title">Genre</p>
                <p class="array_title">...</p>
                <?php
                $platform = 'GameBoy';
                $query = $connectbdd->prepare('SELECT * FROM games WHERE platform = ?');
                $query->execute([$platform]);
                $result = $query->fetchAll();

                foreach($result as $gamescontent){
                echo "<span><img src=\"./covers/".$gamescontent["cover"]."\"></span>
                <p class=\"content\">".$gamescontent["gamename"]."</p>
                <p class=\"content\">".$gamescontent["gametype"]."</p>
                <a href=\"./add_game_to_usergamelist_query.php?gameid=".$gamescontent["gameid"]."\" class=\"gamepagelink\">Ajouter ce jeu à ma GameList</a>";
                }
                ?>
            </div>
        </div>
        <h2>SEGA DreamCast</h2>
        <div class="games_array">
            <div class="array_content">
                <p class="array_title">Jaquette</p>
                <p class="array_title">Nom</p>
                <p class="array_title">Genre</p>
                <p class="array_title">...</p>
                <?php
                $platform = 'Dream cast';
                $query = $connectbdd->prepare('SELECT * FROM games WHERE platform = ?');
                $query->execute([$platform]);
                $result = $query->fetchAll();

                foreach($result as $gamescontent){
                echo "<span><img src=\"./covers/".$gamescontent["cover"]."\"></span>
                <p class=\"content\">".$gamescontent["gamename"]."</p>
                <p class=\"content\">".$gamescontent["gametype"]."</p>
                <a href=\"./add_game_to_usergamelist_query.php?gameid=".$gamescontent["gameid"]."\" class=\"gamepagelink\">Ajouter ce jeu à ma GameList</a>";
                }
                ?>
            </div>
        </div>
        <h2>SEGA Saturn</h2>
        <div class="games_array">
            <div class="array_content">
                <p class="array_title">Jaquette</p>
                <p class="array_title">Nom</p>
                <p class="array_title">Genre</p>
                <p class="array_title">...</p>
                <?php
                $platform = 'Sega Saturn';
                $query = $connectbdd->prepare('SELECT * FROM games WHERE platform = ?');
                $query->execute([$platform]);
                $result = $query->fetchAll();

                foreach($result as $gamescontent){
                echo "<span><img src=\"./covers/".$gamescontent["cover"]."\"></span>
                <p class=\"content\">".$gamescontent["gamename"]."</p>
                <p class=\"content\">".$gamescontent["gametype"]."</p>
                <a href=\"./add_game_to_usergamelist_query.php?gameid=".$gamescontent["gameid"]."\" class=\"gamepagelink\">Ajouter ce jeu à ma GameList</a>";
                }
                ?>
            </div>
        </div>
        <h2>SEGA MegaDrive</h2>
        <div class="games_array">
            <div class="array_content">
                <p class="array_title">Jaquette</p>
                <p class="array_title">Nom</p>
                <p class="array_title">Genre</p>
                <p class="array_title">...</p>
                <?php
                $platform = 'Megadrive';
                $query = $connectbdd->prepare('SELECT * FROM games WHERE platform = ?');
                $query->execute([$platform]);
                $result = $query->fetchAll();

                foreach($result as $gamescontent){
                echo "<span><img src=\"./covers/".$gamescontent["cover"]."\"></span>
                <p class=\"content\">".$gamescontent["gamename"]."</p>
                <p class=\"content\">".$gamescontent["gametype"]."</p>
                <a href=\"./add_game_to_usergamelist_query.php?gameid=".$gamescontent["gameid"]."\" class=\"gamepagelink\">Ajouter ce jeu à ma GameList</a>";
                }
                ?>
            </div>
        </div>
        <h2>PC</h2>
        <div class="games_array">
            <div class="array_content">
                <p class="array_title">Jaquette</p>
                <p class="array_title">Nom</p>
                <p class="array_title">Genre</p>
                <p class="array_title">...</p>
                <?php
                $platform = 'PC';
                $query = $connectbdd->prepare('SELECT * FROM games WHERE platform = ?');
                $query->execute([$platform]);
                $result = $query->fetchAll();

                foreach($result as $gamescontent){
                echo "<span><img src=\"./covers/".$gamescontent["cover"]."\"></span>
                <p class=\"content\">".$gamescontent["gamename"]."</p>
                <p class=\"content\">".$gamescontent["gametype"]."</p>
                <a href=\"./add_game_to_usergamelist_query.php?gameid=".$gamescontent["gameid"]."\" class=\"gamepagelink\">Ajouter ce jeu à ma GameList</a>";
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>