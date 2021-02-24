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

        $table = htmlspecialchars($_GET['table']);
        $getid = htmlspecialchars($_GET['getid']);
    }

    if($table == 'users'){
        $query = $connectbdd->prepare("DELETE FROM users WHERE id = ?");
        $query->execute([$getid]);

        header("location: ./admin_space.php");
    }
    elseif($table == 'games'){
        $query = $connectbdd->prepare("DELETE FROM games WHERE gameid = ?");
        $query->execute([$getid]);

        header("location: ./admin_space.php");
    }