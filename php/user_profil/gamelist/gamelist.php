<?php
    session_start();
    
    if(!isset($_SESSION['id']))
    {
    header("location: ../../index.php");
    }
    else
    {
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
    <link rel="stylesheet" href="../../../css/list_style/stylesheet_gamelist.css">
    <link rel="apple-touch-icon" sizes="180x180" href="../../../ressources/png/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../../../ressources/png/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../../../ressources/png/favicon/favicon-16x16.png">
    <link rel="manifest" href="../../../ressources/png/favicon/site.webmanifest">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <title>GameList | VideoGamesJourney</title>
</head>
<?php
    // erreur GET ici
?>
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
                GameList
            </h1>
            <a href="./add_new_game.php" class="game_add">
                Ajouter un jeu non existant
            </a>
        </header>
        <h2><?php echo $platform ?></h2>
        <div class="games_array">
            <div class="array_content">
                <p class="array_title">Jaquette</p>
                <p class="array_title">Nom</p>
                <p class="array_title">Genre</p>
                <p class="array_title">...</p>
                <?php
                $query = $connectbdd->prepare('SELECT * FROM games WHERE platform = ?');
                $query->execute([$platform]);
                $result = $query->fetchAll();

                foreach($result as $gamescontent){
                echo "<span><img src=\"./covers/".$gamescontent["cover"]."\"></span>
                <p class=\"content\">".$gamescontent["gamename"]."</p>
                <p class=\"content\">".$gamescontent["gametype"]."</p>
                <a href=\"./add_game_to_usergamelist_page.php?getgeneration=".$platform."&gameid=".$gamescontent["gameid"]."\" class=\"gamepagelink\">Ajouter ce jeu à ma GameList</a>";
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>