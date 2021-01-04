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