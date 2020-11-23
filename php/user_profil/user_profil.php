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
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/user_profil_style/stylesheet_user_profil.css">
    <title>Profil | JourneyMemories</title>
</head>
<body>
    <header>
        <a class="header_p" href="./form_update_profil.php">
            Modification profil utilisateur
        </a>
        <a class="header_p" href="../misc/informations_about_jm.html">
            Fonctionnement du site
        </a>
        <a class="header_p" href="../misc/contacts.html">
            Contacts
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
                <!-- à voir plus tard -->
            </div>
        </div>

        <div class="fav_games_container">
            <div class="gamecard">

            </div>
            <div class="gamecard">

            </div>
            <div class="gamecard">

            </div>
        </div>

        <div class="gamelist_container">
            <h2 class="gamelist_title">
                GameList
            </h2>
            <div class="plateform_container">
                <h3 class="constructor_title">
                    Sony
                </h3>
                <div class="generations_container">
                    <a class="generation" href="./gamelist/generationlist.php?getgeneration=ps5">Playstation 5</a>
                    <a class="generation" href="./gamelist/generationlist.php?getgeneration=ps4">Playstation 4</a>
                    <a class="generation" href="./gamelist/generationlist.php?getgeneration=ps3">Playstation 3</a>
                    <a class="generation" href="./gamelist/generationlist.php?getgeneration=ps2">Playstation 2</a>
                    <a class="generation" href="./gamelist/generationlist.php?getgeneration=ps1">Playstation 1</a>
                    <a class="generation" href="./gamelist/generationlist.php?getgeneration=psvita">Playstation Vita</a>
                    <a class="generation" href="./gamelist/generationlist.php?getgeneration=psp">Playstation Portable</a>
                </div>
            </div>
            <div class="plateform_container">
                <h3 class="constructor_title">
                    Microsoft
                </h3>
                <div class="generations_container">
                    <a class="generation" href="./gamelist/generationlist.php?getgeneration=xboxseriesx">Xbox Series X</a>
                    <a class="generation" href="./gamelist/generationlist.php?getgeneration=xboxone">Xbox One</a>
                    <a class="generation" href="./gamelist/generationlist.php?getgeneration=xbox360">Xbox 360</a>
                    <a class="generation" href="./gamelist/generationlist.php?getgeneration=xbox">Xbox</a>
                </div>
            </div>
            <div class="plateform_container">
                <h3 class="constructor_title">
                    Nintendo
                </h3>
                <div class="generations_container">
                    <a class="generation" href="./gamelist/generationlist.php?getgeneration=switch">Nintendo Switch</a>
                    <a class="generation" href="./gamelist/generationlist.php?getgeneration=wiiu">Nintendo Wii U</a>
                    <a class="generation" href="./gamelist/generationlist.php?getgeneration=wii">Nintendo Wii</a>
                    <a class="generation" href="./gamelist/generationlist.php?getgeneration=gamecube">Nintendo GameCube</a>
                    <a class="generation" href="./gamelist/generationlist.php?getgeneration=n64">Nintendo 64</a>
                    <a class="generation" href="./gamelist/generationlist.php?getgeneration=snes">SNES</a>
                    <a class="generation" href="./gamelist/generationlist.php?getgeneration=nes">NES</a>
                    <a class="generation" href="./gamelist/generationlist.php?getgeneration=3ds">Nintendo 3DS</a>
                    <a class="generation" href="./gamelist/generationlist.php?getgeneration=ds">Nintendo DS</a>
                    <a class="generation" href="./gamelist/generationlist.php?getgeneration=gameboysp">Nintendo GameBoy SP</a>
                    <a class="generation" href="./gamelist/generationlist.php?getgeneration=gameboy">Nintendo GameBoy</a>

                </div>
            </div>
            <div class="plateform_container">
                <h3 class="constructor_title">
                    Autres
                </h3>
                <div class="generations_container">
                    <a class="generation" href="./gamelist/generationlist.php?getgeneration=dreamcast">SEGA DreamCast</a>
                    <a class="generation" href="./gamelist/generationlist.php?getgeneration=saturn">SEGA Saturn</a>
                    <a class="generation" href="./gamelist/generationlist.php?getgeneration=megadrive">SEGA Mega Drive</a>
                </div>
            </div>
            <div class="plateform_container">
                <h3 class="constructor_title">
                    PC
                </h3>
                <div class="generations_container">
                    <a class="generation" href="./gamelist/generationlist.php?getgeneration=pc">PC</a>
                </div>
            </div>
            
        </div>
        
    </div>
</body>
</html>