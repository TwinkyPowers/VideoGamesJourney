<?php 
    session_start();
    
    if(!isset($_SESSION['id']))
    {
        header("location: ../../../index.php");
    }
    elseif(!isset($_GET['gameid'])){
        header("location: ../../../index.php");
    }
    else
    {
        try {
            $connectbdd = new PDO("mysql:host=localhost;dbname=journeymemories", "root", "");
            $connectbdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e){
            die($e->getMessage());
        }

        if(isset($_GET['create'])){
            $form = htmlspecialchars($_GET['create']);
        }

        $gameid = htmlspecialchars($_GET['gameid']);

        $query = $connectbdd->prepare('SELECT * FROM games WHERE gameid = ?');
        $query->execute([$gameid]);
        $gamecontent = $query->fetch();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/list_style/stylesheet_gamepage.css">
    <link rel="apple-touch-icon" sizes="180x180" href="../../../ressources/png/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../../../ressources/png/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../../../ressources/png/favicon/favicon-16x16.png">
    <link rel="manifest" href="../../../ressources/png/favicon/site.webmanifest">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <title>GamePage | VideoGamesJourney</title>
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
    <div class="main_container">
        <div class="game_container">
            <img class="game_cover" src="../../user_profil/gamelist/covers/<?php echo $gamecontent['cover'] ?>">
            <h1 class="game_title"><?php echo $gamecontent['gamename'] ?></h1>
            <p class="platform"><?php echo $gamecontent['platform']?></p>
        </div>
        <div class="commentaries_section">
            <div class="header_com_section">
                <h2 class="commentaries_section_title">Espace commentaire</h2>
                <a class="create_com_link" href="./Gamepage.php?gameid=<?php echo $gameid ?>&create=1">Écrire un commentaire</a>
            </div>
            <div class="commentaries_list">
                <?php
                    if(isset($form)){
                        if($form == 1){
                            echo "
                                <form method=\"POST\" action=\"./comment_query.php?form=1&gameid=".$gameid."\" enctype=\"multipart/form-data\">
                                    <input type=\"text\" name=\"com_title\" class=\"create_com_title\" placeholder=\"Titre\">
                                    <textarea type=\"text\" name=\"com_text\" class=\"create_com_text\"></textarea>
                                    <input type=\"submit\" name=\"submit\" value=\"Envoyer\" class=\"submit_input\">
                                </form>
                                ";          
                        }
                        elseif($form == 2){
                            echo "
                                <form method=\"POST\" action=\"./comment_query.php?form=2&gameid=".$gameid."\" enctype=\"multipart/form-data\">
                                    <input type=\"text\" name=\"com_title\" class=\"create_com_title\" placeholder=\"Titre\">
                                    <textarea type=\"text\" name=\"com_text\" class=\"create_com_text\"></textarea>
                                    <input type=\"submit\" name=\"submit\" value=\"Envoyer\" class=\"submit_input\">
                                </form>
                                ";
                        }
                        elseif($form == 3){
                            header("location: ./comment_query.php?form=3");
                        }
                        else {
                            header("location: ./gamepage.php");
                        }
                    }
                    else {
                        echo "
                            <div class=\"commentary\">
                            <div class=\"commentary_header\">
                                <p class=\"com_info\">username</p>
                                <p class=\"com_info\">01/02/2020</p>
                                <a class=\"link_com\" href=\"gamepage.php?gameid=".$gameid."&create=2\">Modifier</a>
                                <a class=\"link_com\" href=\"comment_query.php?create=3\">Supprimer</a>
                            </div>
                            <div class=\"commentary_content\">
                                <h2 class=\"commentary_title\">jeu super bien</h2>
                                <p class=\"commentary_text\">Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                                    Lorem, ipsum dolor sit amet consectetur adipisicing elit
                                    Lorem, ipsum dolor sit amet consectetur adipisicing elit
                                    Lorem, ipsum dolor sit amet consectetur adipisicing elit
                                    Lorem, ipsum dolor sit amet consectetur adipisicing elit
                                    Lorem, ipsum dolor sit amet consectetur adipisicing elit
                                </p>
                            </div>
                        </div>
                            ";
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>