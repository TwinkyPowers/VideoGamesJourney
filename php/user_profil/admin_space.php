<?php
    session_start();

    if(!isset($_SESSION['id']))
    {
        header("location: ../../index.php");
    }
    elseif($_SESSION['idrole'] != 1){
        header("location: ../../index.php");
    }
    else {
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/user_profil_style/admin_space.css">
    <title>Admin | VideoGamesJourney</title>
</head>
<body>
    <a href="./user_profil.php" class="home_button">Accueil</a>
    <div class="selector_container">
        <a href="./admin_space.php?selector=users" class="selector">Users</a>
        <a href="./admin_space.php?selector=games" class="selector">games</a>
    </div>
    <?php
        if(!isset($_GET['selector'])){
            $selector = "Veuillez selectionner une table";
        }
        else{
            $selector = htmlspecialchars($_GET['selector']);
        }
    ?>
    <h1>
        <?php
            echo $selector;
         ?>
    </h1>
    <div class="array_container">
         <?php 
            if($selector === "users"){
                $query = $connectbdd->prepare('SELECT * FROM users');
                $query->execute();
                $result = $query->fetchAll();
                // var_dump($result);
                foreach($result as $dbinfo){
                    echo
                    "
                    <p class=\"array_info\"><a href=\"./admin_update.php?table=".$selector."&from=0&dbinfoid=".$dbinfo['id']."\">".$dbinfo['id']."</a></p>
                    <p class=\"array_info\"><a href=\"./admin_update.php?table=".$selector."&from=1&dbinfoid=".$dbinfo['username']."\">".$dbinfo['username']."</a></p>
                    <p class=\"array_info\"><a href=\"./admin_update.php?table=".$selector."&from=2&dbinfoid=".$dbinfo['email']."\">".$dbinfo['email']."</a></p>
                    <p class=\"array_info\"><a href=\"./admin_update.php?table=".$selector."&from=3&dbinfoid=".$dbinfo['passw']."\">".$dbinfo['passw']."</a></p>
                    <p class=\"array_info\"><a href=\"./admin_update.php?table=".$selector."&from=4&dbinfoid=".$dbinfo['userdescription']."\">".$dbinfo['userdescription']."</a></p>
                    <p class=\"array_info\"><a href=\"./admin_update.php?table=".$selector."&from=5&dbinfoid=".$dbinfo['userimage']."\">".$dbinfo['userimage']."</a></p>
                    <p class=\"array_info\"><a href=\"./admin_update.php?table=".$selector."&from=6&dbinfoid=".$dbinfo['idrole']."\">".$dbinfo['idrole']."</a></p>
                    <p class=\"array_info\"><a class=\"red\" href=\"admin_delete_query.php?table=".$selector."&getid=".$dbinfo['id']."\">Delete</a></p>";
                }
            }
            elseif($selector === "games"){
                $query = $connectbdd->prepare('SELECT * FROM games');
                $query->execute();
                $result = $query->fetchAll();

                foreach($result as $dbinfo){
                    echo
                    "
                    <p class=\"array_info1\"><a href=\"./admin_update.php?table=".$selector."&from=0&dbinfoid=".$dbinfo['gameid']."\">".$dbinfo['gameid']."</a></p>
                    <p class=\"array_info1\"><a href=\"./admin_update.php?table=".$selector."&from=1&dbinfoid=".$dbinfo['gamename']."\">".$dbinfo['gamename']."</a></p>
                    <p class=\"array_info1\"><a href=\"./admin_update.php?table=".$selector."&from=2&dbinfoid=".$dbinfo['platform']."\">".$dbinfo['platform']."</a></p>
                    <p class=\"array_info1\"><a href=\"./admin_update.php?table=".$selector."&from=3&dbinfoid=".$dbinfo['gametype']."\">".$dbinfo['gametype']."</a></p>
                    <p class=\"array_info1\"><a href=\"./admin_update.php?table=".$selector."&from=4&dbinfoid=".$dbinfo['cover']."\">".$dbinfo['cover']."</a></p>
                    <p class=\"array_info1\"><a class=\"red\" href=\"admin_delete_query.php?table=".$selector."&getid=".$dbinfo['gameid']."\">Delete</a></p>";
                }
            }
         ?>
    </div>
</body>
</html>