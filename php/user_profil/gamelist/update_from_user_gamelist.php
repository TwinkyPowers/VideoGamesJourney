<?php 
session_start();

if(!isset($_SESSION['id']))
{
    header("location: ../../../index.php");
}
else
{
    $platform = htmlspecialchars($_GET['getgeneration']);
    $gameid = htmlspecialchars($_GET['gameid']);
    $gamename = htmlspecialchars($_GET['gamename']);
    $array = htmlspecialchars($_GET['array']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/list_style/stylesheet_update_game_to_usergamelist.css">
    <title>Confirmation | VideoGamesJourney</title>
</head>
<body>
    <div class="main_container">
        <h1>
            Veuillez sélectionner un statut pour le jeu <strong><?php echo $gamename ?></strong>
        </h1>
        <?php 
            if($array === "1"){
                echo 
                "<a href=\"update_inprogress_query.php?array=1&gameid=$gameid&getgeneration=$platform\">
                    Jeux en cours
                </a>
                <a href=\"update_wishlist_query.php?array=1&gameid=$gameid&getgeneration=$platform\">
                    Liste de souhaits
                </a>
                <a href=\"delete_from_usergamelist_query.php?array=1&gameid=$gameid&getgeneration=$platform\">
                    Supprimer
                </a>";
            }
            if($array === "2"){
                echo 
                "<a href=\"update_userslinkgames_query.php?array=2&gameid=$gameid&getgeneration=$platform\">
                    Jeux terminés
                </a>
                <a href=\"update_wishlist_query.php?array=2&gameid=$gameid&getgeneration=$platform\">
                    Liste de souhaits
                </a>
                <a href=\"delete_from_usergamelist_query.php?array=2&gameid=$gameid&getgeneration=$platform\">
                    Supprimer
                </a>";
            }
            if($array === "3"){
                echo 
                "<a href=\"update_userslinkgames_query.php?array=3&gameid=$gameid&getgeneration=$platform\">
                    Jeux terminés
                </a>
                <a href=\"update_inprogress_query.php?array=3&gameid=$gameid&getgeneration=$platform\">
                    Jeux en cours
                </a>
                <a href=\"delete_from_usergamelist_query.php?array=3&gameid=$gameid&getgeneration=$platform\">
                    Supprimer
                </a>";
            }
        ?>
    </div>
</body>
</html>