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
    <title>GameList | JourneyMemories</title>
</head>
<body>
    <div class="list_container">
        <header>
            <h1>
                nom de la génération
            </h1>
            <a href="./gamelist.php" class="game_add">
                Ajouter un jeu à ma GameList
            </a>
            <a href="./add_new_game.php" class="game_add">
                Ajouter un jeu non existant
            </a>
        </header>
        <div class="games_array">
            <div class="array_content">
                <p class="array_title">Jaquette</p>
                <p class="array_title">Nom</p>
                <p class="array_title">Genre</p>
                <p class="array_title">...</p>
                <?php
                $query = $connectbdd->prepare('SELECT * FROM userslinkgames WHERE id = ?');
                $query->execute([$userid]);
                $result = $query->fetchAll();

                // var_dump($result);
                // echo $result[1][1];

                foreach($result as $gameresult){
                    // var_dump($gameresult['gameid']);
                    $query = $connectbdd->prepare('SELECT * FROM games WHERE gameid = ?');
                    $query->execute([$gameresult['gameid']]);
                    $gamecontent = $query->fetch();

                    echo "<div>".$gamecontent['gamename']."</div>";


                }
                
                ?>
            </div>
        </div>
    </div>
</body>
</html>