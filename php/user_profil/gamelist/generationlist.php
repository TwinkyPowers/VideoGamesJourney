<?php
session_start();

if(!isset($_SESSION['id']))
{
    header("location: ../../../index.php");
}
elseif(!isset($_GET['getgeneration'])){
    header("location: ../user_profil.php");
}
else{
    $userid = $_SESSION['id'];
    $username = $_SESSION['username'];
    $userdescription = $_SESSION['userdescription'];
    $userimage = $_SESSION['userimage'];
    $platform = htmlspecialchars($_GET['getgeneration']);

    
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
    <link rel="stylesheet" href="../../../css/list_style/stylesheet_generationlist.css">
    <link rel="apple-touch-icon" sizes="180x180" href="../../../ressources/png/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../../../ressources/png/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../../../ressources/png/favicon/favicon-16x16.png">
    <link rel="manifest" href="../../../ressources/png/favicon/site.webmanifest">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <title>GenerationList | VideoGamesJourney</title>
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
    <div class="list_container">
        <header>
            <h1>
                <?php echo $platform ?>
            </h1>
            <a href="./gamelist.php?getgeneration=<?php echo $platform ?>" class="game_add">
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
                <p class="array_title">Titre</p>
                <p class="array_title">Genre</p>
                <p class="array_title">...</p>
                <?php
                $query = $connectbdd->prepare('SELECT gameid FROM userslinkgames WHERE id = ?');
                $query->execute([$userid]);
                $result = $query->fetchAll();
                
                if(isset($_GET['getgeneration'])){
                    $platform = htmlspecialchars($_GET['getgeneration']);
                        foreach($result as $getgameid){
                            $query = $connectbdd->prepare('SELECT * FROM games WHERE gameid = ? AND platform = ?');
                            $query->execute([$getgameid['gameid'], $platform]);
                            $gamecontent = $query->fetch();
                        
                            if(isset($gamecontent['cover'])){
                                echo "<span><img src=\"./covers/".$gamecontent["cover"]."\"></span>
                                <p class=\"content\"><a href=\"./gamepage.php?gameid=".$gamecontent['gameid']."\" class=\"gamepage_link\">".$gamecontent["gamename"]."</a></p>
                                <p class=\"content\">".$gamecontent["gametype"]."</p>
                                <a href=\"./update_from_user_gamelist.php?gamename=".$gamecontent["gamename"]."&getgeneration=".$platform."&array=1&gameid=".$gamecontent["gameid"]."\" class=\"change_status\">Modifier le statut</a>";
                            }
                    }
                }
                ?>
            </div>
        </div>

        <h2>Jeux en cours</h2>
        <div class="games_array">
            <div class="array_content">
                <p class="array_title">Jaquette</p>
                <p class="array_title">Titre</p>
                <p class="array_title">Genre</p>
                <p class="array_title">...</p>
                <?php
                $query = $connectbdd->prepare('SELECT gameid FROM inprogressuserslinkgames WHERE id = ?');
                $query->execute([$userid]);
                $result = $query->fetchAll();
                
                if(isset($_GET['getgeneration'])){
                    $platform = htmlspecialchars($_GET['getgeneration']);
                        foreach($result as $getgameid){
                            $query = $connectbdd->prepare('SELECT * FROM games WHERE gameid = ? AND platform = ?');
                            $query->execute([$getgameid['gameid'], $platform]);
                            $gamecontent = $query->fetch();
                        
                            if(isset($gamecontent['cover'])){
                                echo "<span><img src=\"./covers/".$gamecontent["cover"]."\"></span>
                                <p class=\"content\"><a href=\"./gamepage.php?gameid=".$gamecontent['gameid']."\" class=\"gamepage_link\">".$gamecontent["gamename"]."</a></p>
                                <p class=\"content\">".$gamecontent["gametype"]."</p>
                                <a href=\"./update_from_user_gamelist.php?gamename=".$gamecontent["gamename"]."&getgeneration=".$platform."&array=2&gameid=".$gamecontent["gameid"]."\" class=\"change_status\">Modifier le statut</a>";
                            }
                    }
                }
                ?>
            </div>
        </div>

        <h2>Liste de souhaits</h2>
        <div class="games_array">
            <div class="array_content">
                <p class="array_title">Jaquette</p>
                <p class="array_title">Titre</p>
                <p class="array_title">Genre</p>
                <p class="array_title">...</p>
                <?php
                $query = $connectbdd->prepare('SELECT gameid FROM wishlistuserslinkgames WHERE id = ?');
                $query->execute([$userid]);
                $result = $query->fetchAll();
                
                if(isset($_GET['getgeneration'])){
                    $platform = htmlspecialchars($_GET['getgeneration']);
                        foreach($result as $getgameid){
                            $query = $connectbdd->prepare('SELECT * FROM games WHERE gameid = ? AND platform = ?');
                            $query->execute([$getgameid['gameid'], $platform]);
                            $gamecontent = $query->fetch();
                        
                            if(isset($gamecontent['cover'])){
                                echo "<span><img src=\"./covers/".$gamecontent["cover"]."\"></span>
                                <p class=\"content\"><a href=\"./gamepage.php?gameid=".$gamecontent['gameid']."\" class=\"gamepage_link\">".$gamecontent["gamename"]."</a></p>
                                <p class=\"content\">".$gamecontent["gametype"]."</p>
                                <a href=\"./update_from_user_gamelist.php?gamename=".$gamecontent["gamename"]."&getgeneration=".$platform."&array=3&gameid=".$gamecontent["gameid"]."\" class=\"change_status\">Modifier le statut</a>";
                            }
                    }
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>