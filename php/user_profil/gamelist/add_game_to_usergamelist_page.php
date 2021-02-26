<?php 
session_start();

if(!isset($_SESSION['id']))
{
    header("location: ../../../index.php");
}
else
{
    $gameid = htmlspecialchars($_GET['gameid']);
    $platform = htmlspecialchars($_GET['getgeneration']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation Gamelist | VideoGamesJourney</title>
    <link rel="stylesheet" href="../../../css/list_style/stylesheet_add_game_to_usergamelist.css">
    <link rel="apple-touch-icon" sizes="180x180" href="../../../ressources/png/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../../../ressources/png/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../../../ressources/png/favicon/favicon-16x16.png">
    <link rel="manifest" href="../../../ressources/png/favicon/site.webmanifest">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
</head>
<body>
    <div class="main_container">
        <h1>
            Veuillez selectionner le statut du jeu
        </h1>
        <a href="./add_game_to_usergamelist_query.php?getgeneration=<?php echo $platform ?>&gameid=<?php echo $gameid?>">
            Terminé
        </a>
        <a href="./add_gameinprogress_to_usergamelist_query.php?getgeneration=<?php echo $platform ?>&gameid=<?php echo $gameid?>">
            En cours
        </a>
        <a href="./add_wishgame_to_usergamelist_query.php?getgeneration=<?php echo $platform ?>&gameid=<?php echo $gameid?>">
            À faire prochainement
        </a>
    </div>
</body>
</html>