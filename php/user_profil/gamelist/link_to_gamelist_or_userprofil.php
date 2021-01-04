<?php 
session_start();

if(!isset($_SESSION['id']))
{
    header("location: ../../../index.php");
}
else
{
    $platform = htmlspecialchars($_GET['getgeneration']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/list_style/stylesheet_add_game_to_usergamelist.css">
    <title>Redirection | VideoGamesJourney</title>
</head>
<body>
    <div class="main_container">
        <h1>
            Que souhaitez vous faire ?
        </h1>
        <a href="./gamelist.php?getgeneration=<?php echo $platform?>">
            Ajouter un autre jeu à votre GameList
        </a>
        <a href="./generationlist.php?getgeneration=<?php echo $platform?>">
            Revenir à votre GameList
        </a>
    </div>
</body>
</html>