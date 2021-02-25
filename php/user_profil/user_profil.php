<?php
session_start();

if(!isset($_SESSION['id']))
{
    header("location: ../../index.php");
}
else
{
    $userid = $_SESSION['id'];
    $username = $_SESSION['username'];
    $userdescription = $_SESSION['userdescription'];
    $userimage = $_SESSION['userimage'];

    try {
        $connectbdd = new PDO("mysql:host=localhost;dbname=journeymemories", "root", "");
        $connectbdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e){
        die($e->getMessage());
    }

    $query1 = $connectbdd->prepare('SELECT COUNT(*) FROM userslinkgames WHERE id = ?');
    $query1->execute([$userid]);
    $result1 = $query1->fetch();
    
    $query2 = $connectbdd->prepare('SELECT COUNT(*) FROM inprogressuserslinkgames WHERE id = ?');
    $query2->execute([$userid]);
    $result2 = $query2->fetch();

    $query3 = $connectbdd->prepare('SELECT COUNT(*) FROM wishlistuserslinkgames WHERE id = ?');
    $query3->execute([$userid]);
    $result3 = $query3->fetch();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/user_profil_style/stylesheet_user_profil.css">
    <title>Profil | VideoGamesJourney</title>
</head>
<body>
    <header>
        <a class="header_p" href="./form_update_profil.php">
            Modification du profil
        </a>
        <a class="header_p" href="./contacts.php">
            Contacts
        </a>
        <a class="header_p" href="">
            Fonctionnement du site
        </a>
        <a class="header_p" href="../User_profil/deconnection.php">
            Déconnexion
        </a>
    </header>

    <div class="main_container">
        
        <div class="user_info_container">
            <div class="user_card">
                <img src="../inscription_connection/client_images/<?php echo $userimage?>" class="user_image">
                <p class="username">
                    <?php echo $username ?>
                </p>
                <p class="user_description">
                    <?php echo $userdescription ?>
                </p>
            </div> 
            <div class="user_stats">
                <h2 class="user_stats_title">
                    Statistiques
                </h2>
                <p class="user_stats_content">
                    Jeux terminés <br> <span class="user_stats_values"><?php echo $result1[0] ?></span>
                </p>
                <p class="user_stats_content">
                    Jeux en cours <br> <span class="user_stats_values"><?php echo $result2[0] ?></span>
                </p>
                <p class="user_stats_content">
                    Liste de souhaits <br> <span class="user_stats_values"><?php echo $result3[0] ?></span>
                </p>
            </div>
        </div>

        <div class="last_games_container">
                <div class="games_container">
                    <h2 class="last_games_title">Jeux terminés</h2>
                    <?php
                        $query = $connectbdd->prepare('SELECT gameid FROM userslinkgames WHERE id = ? ORDER BY RAND() LIMIT 3');
                        $query->execute([$userid]);
                        $result = $query->fetchAll();

                        foreach($result as $getgameid){
                            $query1 = $connectbdd->prepare('SELECT * FROM games WHERE gameid = ?');
                            $query1->execute([$getgameid['gameid']]);
                            $gamecontent = $query1->fetch();

                            echo "<div class=\"games\">
                                    <img src=\"./gamelist/covers/".$gamecontent['cover']."\" class=\"games_cover\">
                                        <div class=\"games_info\">
                                            <h3 class=\"game_title\">
                                                ".$gamecontent['gamename']."
                                            </h3>
                                        </div>
                                    </div>";
                        }
                    ?>
                </div>
        </div>

        <div class="gamelist_container">
            <h2 class="gamelist_title">
                My GameList
            </h2>
            <div class="plateform_container">
                <h3 class="constructor_title">
                    Sony
                </h3>
                <div class="generations_container">
                    <a class="generation" href="./gamelist/generationlist.php?getgeneration=Playstation 5">Playstation 5</a>
                    <a class="generation" href="./gamelist/generationlist.php?getgeneration=Playstation 4">Playstation 4</a>
                    <a class="generation" href="./gamelist/generationlist.php?getgeneration=Playstation 3">Playstation 3</a>
                    <a class="generation" href="./gamelist/generationlist.php?getgeneration=Playstation 2">Playstation 2</a>
                    <a class="generation" href="./gamelist/generationlist.php?getgeneration=Playstation 1">Playstation 1</a>
                    <a class="generation" href="./gamelist/generationlist.php?getgeneration=Playstation Portable">Playstation Portable</a>
                    <a class="generation" href="./gamelist/generationlist.php?getgeneration=Playstation portable Vita">Playstation Portable Vita</a>
                </div>
            </div>
            <div class="plateform_container">
                <h3 class="constructor_title">
                    Microsoft
                </h3>
                <div class="generations_container">
                    <a class="generation" href="./gamelist/generationlist.php?getgeneration=Xbox series x">Xbox Series X</a>
                    <a class="generation" href="./gamelist/generationlist.php?getgeneration=Xbox one">Xbox One</a>
                    <a class="generation" href="./gamelist/generationlist.php?getgeneration=Xbox 360">Xbox 360</a>
                    <a class="generation" href="./gamelist/generationlist.php?getgeneration=Xbox">Xbox</a>
                </div>
            </div>
            <div class="plateform_container">
                <h3 class="constructor_title">
                    Nintendo
                </h3>
                <div class="generations_container">
                    <a class="generation" href="./gamelist/generationlist.php?getgeneration=Switch">Nintendo Switch</a>
                    <a class="generation" href="./gamelist/generationlist.php?getgeneration=Wii U">Nintendo Wii U</a>
                    <a class="generation" href="./gamelist/generationlist.php?getgeneration=Wii">Nintendo Wii</a>
                    <a class="generation" href="./gamelist/generationlist.php?getgeneration=Gamecube">Nintendo GameCube</a>
                    <a class="generation" href="./gamelist/generationlist.php?getgeneration=N64">Nintendo 64</a>
                    <a class="generation" href="./gamelist/generationlist.php?getgeneration=SNES">SNES</a>
                    <a class="generation" href="./gamelist/generationlist.php?getgeneration=NES">NES</a>
                    <a class="generation" href="./gamelist/generationlist.php?getgeneration=3DS">Nintendo 3DS</a>
                    <a class="generation" href="./gamelist/generationlist.php?getgeneration=DS">Nintendo DS</a>
                    <a class="generation" href="./gamelist/generationlist.php?getgeneration=Gameboy SP">Nintendo GameBoy SP</a>
                    <a class="generation" href="./gamelist/generationlist.php?getgeneration=GameBoy">Nintendo GameBoy</a>

                </div>
            </div>
            <div class="plateform_container">
                <h3 class="constructor_title">
                    Autres
                </h3>
                <div class="generations_container">
                    <a class="generation" href="./gamelist/generationlist.php?getgeneration=Dream cast">SEGA DreamCast</a>
                    <a class="generation" href="./gamelist/generationlist.php?getgeneration=Sega saturn">SEGA Saturn</a>
                    <a class="generation" href="./gamelist/generationlist.php?getgeneration=Megadrive">SEGA Mega Drive</a>
                </div>
            </div>
            <div class="plateform_container">
                <h3 class="constructor_title">
                    PC
                </h3>
                <div class="generations_container">
                    <a class="generation" href="./gamelist/generationlist.php?getgeneration=PC">PC</a>
                </div>
            </div>
            
        </div>
        
    </div>
</body>
</html>