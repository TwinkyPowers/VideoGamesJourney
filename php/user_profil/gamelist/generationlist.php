<?php
session_start();

if(!isset($_SESSION['id']))
{
    header("location: ../../index.php");
}
else{
    $userid = $_SESSION['id'];
    $username = $_SESSION['username'];
    $userdescription = $_SESSION['userdescription'];
    $userimage = $_SESSION['userimage'];

    {
        try {
            $connectbdd = new PDO("mysql:host=localhost;dbname=journeymemories", "root", "");
            $connectbdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e){
            die($e->getMessage());
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/list_style/stylesheet_generationlist.css">
    <title>GenerationList | JourneyMemories</title>
</head>
<body>
    <div class="list_container">
        <header>
            <h1>
                <?php echo $_GET['getgeneration'] ?>
            </h1>
            <a href="./gamelist.php" class="game_add">
                Ajouter un jeu à ma GameList
            </a>
            <a href="./add_new_game.php" class="game_add">
                Ajouter un jeu non existant
            </a>
        </header>
        <h2>Jeux terminés</h2>
        <div class="games_array">
            <div class="array_content">
                <p class="array_title">Jaquette</p>
                <p class="array_title">Nom</p>
                <p class="array_title">Genre</p>
                <p class="array_title">...</p>
                <?php
                $query = $connectbdd->prepare('SELECT gameid FROM userslinkgames WHERE id = ?');
                $query->execute([$userid]);
                $result = $query->fetchAll();

                if($_GET['getgeneration'] === 'Playstation 5'){
                    $platform = 'Playstation 5';
                    foreach($result as $getgameid){
                        $query = $connectbdd->prepare('SELECT * FROM games WHERE gameid = ? AND platform = ?');
                        $query->execute([$getgameid['gameid'], $platform]);
                        $gamecontent = $query->fetch();

                        if(isset($gamecontent['cover'])){
                            echo "<span><img src=\"./covers/".$gamecontent["cover"]."\"></span>
                            <p class=\"content\">".$gamecontent["gamename"]."</p>
                            <p class=\"content\">".$gamecontent["gametype"]."</p>
                            <a href=\"./delete_from_user_gamelist.php?gameid=".$gamecontent["gameid"]."\" class=\"gamepagelink\">Supprimer ce jeu de ma GameList</a>";
                        }
                    }  
                }

                if($_GET['getgeneration'] === 'Playstation 4'){
                    $platform = 'Playstation 4';
                    foreach($result as $getgameid){
                        $query = $connectbdd->prepare('SELECT * FROM games WHERE gameid = ? AND platform = ?');
                        $query->execute([$getgameid['gameid'], $platform]);
                        $gamecontent = $query->fetch();

                        if(isset($gamecontent['cover'])){
                            echo "<span><img src=\"./covers/".$gamecontent["cover"]."\"></span>
                            <p class=\"content\">".$gamecontent["gamename"]."</p>
                            <p class=\"content\">".$gamecontent["gametype"]."</p>
                            <a href=\"./delete_from_user_gamelist.php?gameid=".$gamecontent["gameid"]."\" class=\"gamepagelink\">Supprimer ce jeu de ma GameList</a>";
                        }
                    }  
                }

                if($_GET['getgeneration'] === 'Playstation 3'){
                    $platform = 'Playstation 3';
                    foreach($result as $getgameid){
                        $query = $connectbdd->prepare('SELECT * FROM games WHERE gameid = ? AND platform = ?');
                        $query->execute([$getgameid['gameid'], $platform]);
                        $gamecontent = $query->fetch();

                        if(isset($gamecontent['cover'])){
                            echo "<span><img src=\"./covers/".$gamecontent["cover"]."\"></span>
                            <p class=\"content\">".$gamecontent["gamename"]."</p>
                            <p class=\"content\">".$gamecontent["gametype"]."</p>
                            <a href=\"./delete_from_user_gamelist.php?gameid=".$gamecontent["gameid"]."\" class=\"gamepagelink\">Supprimer ce jeu de ma GameList</a>";
                        }
                    }  
                }

                if($_GET['getgeneration'] === 'Playstation 2'){
                    $platform = 'Playstation 2';
                    foreach($result as $getgameid){
                        $query = $connectbdd->prepare('SELECT * FROM games WHERE gameid = ? AND platform = ?');
                        $query->execute([$getgameid['gameid'], $platform]);
                        $gamecontent = $query->fetch();

                        if(isset($gamecontent['cover'])){
                            echo "<span><img src=\"./covers/".$gamecontent["cover"]."\"></span>
                            <p class=\"content\">".$gamecontent["gamename"]."</p>
                            <p class=\"content\">".$gamecontent["gametype"]."</p>
                            <a href=\"./delete_from_user_gamelist.php?gameid=".$gamecontent["gameid"]."\" class=\"gamepagelink\">Supprimer ce jeu de ma GameList</a>";
                        }
                    }  
                }

                if($_GET['getgeneration'] === 'Playstation 1'){
                    $platform = 'Playstation 1';
                    foreach($result as $getgameid){
                        $query = $connectbdd->prepare('SELECT * FROM games WHERE gameid = ? AND platform = ?');
                        $query->execute([$getgameid['gameid'], $platform]);
                        $gamecontent = $query->fetch();

                        if(isset($gamecontent['cover'])){
                            echo "<span><img src=\"./covers/".$gamecontent["cover"]."\"></span>
                            <p class=\"content\">".$gamecontent["gamename"]."</p>
                            <p class=\"content\">".$gamecontent["gametype"]."</p>
                            <a href=\"./delete_from_user_gamelist.php?gameid=".$gamecontent["gameid"]."\" class=\"gamepagelink\">Supprimer ce jeu de ma GameList</a>";
                        }
                    }  
                }

                if($_GET['getgeneration'] === 'Playstation portable Vita'){
                    $platform = 'Playstation portable Vita';
                    foreach($result as $getgameid){
                        $query = $connectbdd->prepare('SELECT * FROM games WHERE gameid = ? AND platform = ?');
                        $query->execute([$getgameid['gameid'], $platform]);
                        $gamecontent = $query->fetch();

                        if(isset($gamecontent['cover'])){
                            echo "<span><img src=\"./covers/".$gamecontent["cover"]."\"></span>
                            <p class=\"content\">".$gamecontent["gamename"]."</p>
                            <p class=\"content\">".$gamecontent["gametype"]."</p>
                            <a href=\"./delete_from_user_gamelist.php?gameid=".$gamecontent["gameid"]."\" class=\"gamepagelink\">Supprimer ce jeu de ma GameList</a>";
                        }
                    }  
                }

                if($_GET['getgeneration'] === 'Playstation Portable'){
                    $platform = 'Playstation Portable';
                    foreach($result as $getgameid){
                        $query = $connectbdd->prepare('SELECT * FROM games WHERE gameid = ? AND platform = ?');
                        $query->execute([$getgameid['gameid'], $platform]);
                        $gamecontent = $query->fetch();

                        if(isset($gamecontent['cover'])){
                            echo "<span><img src=\"./covers/".$gamecontent["cover"]."\"></span>
                            <p class=\"content\">".$gamecontent["gamename"]."</p>
                            <p class=\"content\">".$gamecontent["gametype"]."</p>
                            <a href=\"./delete_from_user_gamelist.php?gameid=".$gamecontent["gameid"]."\" class=\"gamepagelink\">Supprimer ce jeu de ma GameList</a>";
                        }
                    }  
                }

                if($_GET['getgeneration'] === 'Xbox series X'){
                    $platform = 'Xbox series X';
                    foreach($result as $getgameid){
                        $query = $connectbdd->prepare('SELECT * FROM games WHERE gameid = ? AND platform = ?');
                        $query->execute([$getgameid['gameid'], $platform]);
                        $gamecontent = $query->fetch();

                        if(isset($gamecontent['cover'])){
                            echo "<span><img src=\"./covers/".$gamecontent["cover"]."\"></span>
                            <p class=\"content\">".$gamecontent["gamename"]."</p>
                            <p class=\"content\">".$gamecontent["gametype"]."</p>
                            <a href=\"./delete_from_user_gamelist.php?gameid=".$gamecontent["gameid"]."\" class=\"gamepagelink\">Supprimer ce jeu de ma GameList</a>";
                        }
                    }  
                }

                if($_GET['getgeneration'] === 'Xbox one'){
                    $platform = 'Xbox one';
                    foreach($result as $getgameid){
                        $query = $connectbdd->prepare('SELECT * FROM games WHERE gameid = ? AND platform = ?');
                        $query->execute([$getgameid['gameid'], $platform]);
                        $gamecontent = $query->fetch();

                        if(isset($gamecontent['cover'])){
                            echo "<span><img src=\"./covers/".$gamecontent["cover"]."\"></span>
                            <p class=\"content\">".$gamecontent["gamename"]."</p>
                            <p class=\"content\">".$gamecontent["gametype"]."</p>
                            <a href=\"./delete_from_user_gamelist.php?gameid=".$gamecontent["gameid"]."\" class=\"gamepagelink\">Supprimer ce jeu de ma GameList</a>";
                        }
                    }  
                }

                if($_GET['getgeneration'] === 'Xbox 360'){
                    $platform = 'Xbox 360';
                    foreach($result as $getgameid){
                        $query = $connectbdd->prepare('SELECT * FROM games WHERE gameid = ? AND platform = ?');
                        $query->execute([$getgameid['gameid'], $platform]);
                        $gamecontent = $query->fetch();

                        if(isset($gamecontent['cover'])){
                            echo "<span><img src=\"./covers/".$gamecontent["cover"]."\"></span>
                            <p class=\"content\">".$gamecontent["gamename"]."</p>
                            <p class=\"content\">".$gamecontent["gametype"]."</p>
                            <a href=\"./delete_from_user_gamelist.php?gameid=".$gamecontent["gameid"]."\" class=\"gamepagelink\">Supprimer ce jeu de ma GameList</a>";
                        }
                    }  
                }

                if($_GET['getgeneration'] === 'Xbox'){
                    $platform = 'Xbox';
                    foreach($result as $getgameid){
                        $query = $connectbdd->prepare('SELECT * FROM games WHERE gameid = ? AND platform = ?');
                        $query->execute([$getgameid['gameid'], $platform]);
                        $gamecontent = $query->fetch();

                        if(isset($gamecontent['cover'])){
                            echo "<span><img src=\"./covers/".$gamecontent["cover"]."\"></span>
                            <p class=\"content\">".$gamecontent["gamename"]."</p>
                            <p class=\"content\">".$gamecontent["gametype"]."</p>
                            <a href=\"./delete_from_user_gamelist.php?gameid=".$gamecontent["gameid"]."\" class=\"gamepagelink\">Supprimer ce jeu de ma GameList</a>";
                        }
                    }  
                }

                if($_GET['getgeneration'] === 'Switch'){
                    $platform = 'Switch';
                    foreach($result as $getgameid){
                        $query = $connectbdd->prepare('SELECT * FROM games WHERE gameid = ? AND platform = ?');
                        $query->execute([$getgameid['gameid'], $platform]);
                        $gamecontent = $query->fetch();

                        if(isset($gamecontent['cover'])){
                            echo "<span><img src=\"./covers/".$gamecontent["cover"]."\"></span>
                            <p class=\"content\">".$gamecontent["gamename"]."</p>
                            <p class=\"content\">".$gamecontent["gametype"]."</p>
                            <a href=\"./delete_from_user_gamelist.php?gameid=".$gamecontent["gameid"]."\" class=\"gamepagelink\">Supprimer ce jeu de ma GameList</a>";
                        }
                    }  
                }

                if($_GET['getgeneration'] === 'Wii U'){
                    $platform = 'Wii U';
                    foreach($result as $getgameid){
                        $query = $connectbdd->prepare('SELECT * FROM games WHERE gameid = ? AND platform = ?');
                        $query->execute([$getgameid['gameid'], $platform]);
                        $gamecontent = $query->fetch();

                        if(isset($gamecontent['cover'])){
                            echo "<span><img src=\"./covers/".$gamecontent["cover"]."\"></span>
                            <p class=\"content\">".$gamecontent["gamename"]."</p>
                            <p class=\"content\">".$gamecontent["gametype"]."</p>
                            <a href=\"./delete_from_user_gamelist.php?gameid=".$gamecontent["gameid"]."\" class=\"gamepagelink\">Supprimer ce jeu de ma GameList</a>";
                        }
                    }  
                }

                if($_GET['getgeneration'] === 'Wii'){
                    $platform = 'Wii';
                    foreach($result as $getgameid){
                        $query = $connectbdd->prepare('SELECT * FROM games WHERE gameid = ? AND platform = ?');
                        $query->execute([$getgameid['gameid'], $platform]);
                        $gamecontent = $query->fetch();

                        if(isset($gamecontent['cover'])){
                            echo "<span><img src=\"./covers/".$gamecontent["cover"]."\"></span>
                            <p class=\"content\">".$gamecontent["gamename"]."</p>
                            <p class=\"content\">".$gamecontent["gametype"]."</p>
                            <a href=\"./delete_from_user_gamelist.php?gameid=".$gamecontent["gameid"]."\" class=\"gamepagelink\">Supprimer ce jeu de ma GameList</a>";
                        }
                    }  
                }

                if($_GET['getgeneration'] === 'Gamecube'){
                    $platform = 'Gamecube';
                    foreach($result as $getgameid){
                        $query = $connectbdd->prepare('SELECT * FROM games WHERE gameid = ? AND platform = ?');
                        $query->execute([$getgameid['gameid'], $platform]);
                        $gamecontent = $query->fetch();

                        if(isset($gamecontent['cover'])){
                            echo "<span><img src=\"./covers/".$gamecontent["cover"]."\"></span>
                            <p class=\"content\">".$gamecontent["gamename"]."</p>
                            <p class=\"content\">".$gamecontent["gametype"]."</p>
                            <a href=\"./delete_from_user_gamelist.php?gameid=".$gamecontent["gameid"]."\" class=\"gamepagelink\">Supprimer ce jeu de ma GameList</a>";
                        }
                    }  
                }

                if($_GET['getgeneration'] === 'N64'){
                    $platform = 'N64';
                    foreach($result as $getgameid){
                        $query = $connectbdd->prepare('SELECT * FROM games WHERE gameid = ? AND platform = ?');
                        $query->execute([$getgameid['gameid'], $platform]);
                        $gamecontent = $query->fetch();

                        if(isset($gamecontent['cover'])){
                            echo "<span><img src=\"./covers/".$gamecontent["cover"]."\"></span>
                            <p class=\"content\">".$gamecontent["gamename"]."</p>
                            <p class=\"content\">".$gamecontent["gametype"]."</p>
                            <a href=\"./delete_from_user_gamelist.php?gameid=".$gamecontent["gameid"]."\" class=\"gamepagelink\">Supprimer ce jeu de ma GameList</a>";
                        }
                    }  
                }

                if($_GET['getgeneration'] === 'SNES'){
                    $platform = 'SNES';
                    foreach($result as $getgameid){
                        $query = $connectbdd->prepare('SELECT * FROM games WHERE gameid = ? AND platform = ?');
                        $query->execute([$getgameid['gameid'], $platform]);
                        $gamecontent = $query->fetch();

                        if(isset($gamecontent['cover'])){
                            echo "<span><img src=\"./covers/".$gamecontent["cover"]."\"></span>
                            <p class=\"content\">".$gamecontent["gamename"]."</p>
                            <p class=\"content\">".$gamecontent["gametype"]."</p>
                            <a href=\"./delete_from_user_gamelist.php?gameid=".$gamecontent["gameid"]."\" class=\"gamepagelink\">Supprimer ce jeu de ma GameList</a>";
                        }
                    }  
                }

                if($_GET['getgeneration'] === 'NES'){
                    $platform = 'NES';
                    foreach($result as $getgameid){
                        $query = $connectbdd->prepare('SELECT * FROM games WHERE gameid = ? AND platform = ?');
                        $query->execute([$getgameid['gameid'], $platform]);
                        $gamecontent = $query->fetch();

                        if(isset($gamecontent['cover'])){
                            echo "<span><img src=\"./covers/".$gamecontent["cover"]."\"></span>
                            <p class=\"content\">".$gamecontent["gamename"]."</p>
                            <p class=\"content\">".$gamecontent["gametype"]."</p>
                            <a href=\"./delete_from_user_gamelist.php?gameid=".$gamecontent["gameid"]."\" class=\"gamepagelink\">Supprimer ce jeu de ma GameList</a>";
                        }
                    }  
                }

                if($_GET['getgeneration'] === '3DS'){
                    $platform = '3DS';
                    foreach($result as $getgameid){
                        $query = $connectbdd->prepare('SELECT * FROM games WHERE gameid = ? AND platform = ?');
                        $query->execute([$getgameid['gameid'], $platform]);
                        $gamecontent = $query->fetch();

                        if(isset($gamecontent['cover'])){
                            echo "<span><img src=\"./covers/".$gamecontent["cover"]."\"></span>
                            <p class=\"content\">".$gamecontent["gamename"]."</p>
                            <p class=\"content\">".$gamecontent["gametype"]."</p>
                            <a href=\"./delete_from_user_gamelist.php?gameid=".$gamecontent["gameid"]."\" class=\"gamepagelink\">Supprimer ce jeu de ma GameList</a>";
                        }
                    }  
                }

                if($_GET['getgeneration'] === 'DS'){
                    $platform = 'DS';
                    foreach($result as $getgameid){
                        $query = $connectbdd->prepare('SELECT * FROM games WHERE gameid = ? AND platform = ?');
                        $query->execute([$getgameid['gameid'], $platform]);
                        $gamecontent = $query->fetch();

                        if(isset($gamecontent['cover'])){
                            echo "<span><img src=\"./covers/".$gamecontent["cover"]."\"></span>
                            <p class=\"content\">".$gamecontent["gamename"]."</p>
                            <p class=\"content\">".$gamecontent["gametype"]."</p>
                            <a href=\"./delete_from_user_gamelist.php?gameid=".$gamecontent["gameid"]."\" class=\"gamepagelink\">Supprimer ce jeu de ma GameList</a>";
                        }
                    }  
                }

                if($_GET['getgeneration'] === 'Gameboy SP'){
                    $platform = 'Gameboy SP';
                    foreach($result as $getgameid){
                        $query = $connectbdd->prepare('SELECT * FROM games WHERE gameid = ? AND platform = ?');
                        $query->execute([$getgameid['gameid'], $platform]);
                        $gamecontent = $query->fetch();

                        if(isset($gamecontent['cover'])){
                            echo "<span><img src=\"./covers/".$gamecontent["cover"]."\"></span>
                            <p class=\"content\">".$gamecontent["gamename"]."</p>
                            <p class=\"content\">".$gamecontent["gametype"]."</p>
                            <a href=\"./delete_from_user_gamelist.php?gameid=".$gamecontent["gameid"]."\" class=\"gamepagelink\">Supprimer ce jeu de ma GameList</a>";
                        }
                    }  
                }

                if($_GET['getgeneration'] === 'GameBoy'){
                    $platform = 'GameBoy';
                    foreach($result as $getgameid){
                        $query = $connectbdd->prepare('SELECT * FROM games WHERE gameid = ? AND platform = ?');
                        $query->execute([$getgameid['gameid'], $platform]);
                        $gamecontent = $query->fetch();

                        if(isset($gamecontent['cover'])){
                            echo "<span><img src=\"./covers/".$gamecontent["cover"]."\"></span>
                            <p class=\"content\">".$gamecontent["gamename"]."</p>
                            <p class=\"content\">".$gamecontent["gametype"]."</p>
                            <a href=\"./delete_from_user_gamelist.php?gameid=".$gamecontent["gameid"]."\" class=\"gamepagelink\">Supprimer ce jeu de ma GameList</a>";
                        }
                    }  
                }

                if($_GET['getgeneration'] === 'PC'){
                    $platform = 'PC';
                    foreach($result as $getgameid){
                        $query = $connectbdd->prepare('SELECT * FROM games WHERE gameid = ? AND platform = ?');
                        $query->execute([$getgameid['gameid'], $platform]);
                        $gamecontent = $query->fetch();
                        
                        if(isset($gamecontent['cover'])){
                            echo "<span><img src=\"./covers/".$gamecontent["cover"]."\"></span>
                            <p class=\"content\">".$gamecontent["gamename"]."</p>
                            <p class=\"content\">".$gamecontent["gametype"]."</p>
                            <a href=\"./delete_from_user_gamelist.php?gameid=".$gamecontent["gameid"]."\" class=\"gamepagelink\">Supprimer ce jeu de ma GameList</a>";
                        }
                    }
                }

                if($_GET['getgeneration'] === 'Dream cast'){
                    $platform = 'Dream cast';
                    foreach($result as $getgameid){
                        $query = $connectbdd->prepare('SELECT * FROM games WHERE gameid = ? AND platform = ?');
                        $query->execute([$getgameid['gameid'], $platform]);
                        $gamecontent = $query->fetch();

                        if(isset($gamecontent['cover'])){
                            echo "<span><img src=\"./covers/".$gamecontent["cover"]."\"></span>
                            <p class=\"content\">".$gamecontent["gamename"]."</p>
                            <p class=\"content\">".$gamecontent["gametype"]."</p>
                            <a href=\"./delete_from_user_gamelist.php?gameid=".$gamecontent["gameid"]."\" class=\"gamepagelink\">Supprimer ce jeu de ma GameList</a>";
                        }
                    }  
                }

                if($_GET['getgeneration'] === 'Sega saturn'){
                    $platform = 'Sega saturn';
                    foreach($result as $getgameid){
                        $query = $connectbdd->prepare('SELECT * FROM games WHERE gameid = ? AND platform = ?');
                        $query->execute([$getgameid['gameid'], $platform]);
                        $gamecontent = $query->fetch();

                        if(isset($gamecontent['cover'])){
                            echo "<span><img src=\"./covers/".$gamecontent["cover"]."\"></span>
                            <p class=\"content\">".$gamecontent["gamename"]."</p>
                            <p class=\"content\">".$gamecontent["gametype"]."</p>
                            <a href=\"./delete_from_user_gamelist.php?gameid=".$gamecontent["gameid"]."\" class=\"gamepagelink\">Supprimer ce jeu de ma GameList</a>";
                        }
                    }  
                }

                if($_GET['getgeneration'] === 'Megadrive'){
                    $platform = 'Megadrive';
                    foreach($result as $getgameid){
                        $query = $connectbdd->prepare('SELECT * FROM games WHERE gameid = ? AND platform = ?');
                        $query->execute([$getgameid['gameid'], $platform]);
                        $gamecontent = $query->fetch();

                        if(isset($gamecontent['cover'])){
                            echo "<span><img src=\"./covers/".$gamecontent["cover"]."\"></span>
                            <p class=\"content\">".$gamecontent["gamename"]."</p>
                            <p class=\"content\">".$gamecontent["gametype"]."</p>
                            <a href=\"./delete_from_user_gamelist.php?gameid=".$gamecontent["gameid"]."\" class=\"gamepagelink\">Supprimer ce jeu de ma GameList</a>";
                        }
                    }  
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>