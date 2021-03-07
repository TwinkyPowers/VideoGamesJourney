<?php 
    session_start();

    if(!isset($_SESSION['id']))
    {
        header("location: ../../../index.php");
    }
    if(!isset($_GET['array'])){
        header("location: ../../../index.php");
    }
    if(!isset($_GET['gameid'])){
        header("location: ../../../index.php");
    }
    if(!isset($_GET['getgeneration'])){
        header("location: ../../../index.php");
    }
    else {
        $userid = $_SESSION['id'];
        $platform = htmlspecialchars($_GET['getgeneration']);
        $gameid = htmlspecialchars($_GET['gameid']);
        $array = htmlspecialchars($_GET['array']);

        try {
            $connectbdd = new PDO("mysql:host=localhost;dbname=journeymemories", "root", "");
            $connectbdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e){
            die($e->getMessage());
        }
    }

    if($array === "1"){
        $deletequery = $connectbdd->prepare('DELETE FROM userslinkgames WHERE id = ? AND gameid = ?');
        $deletequery->execute([$userid, $gameid]);

        $insertquery = $connectbdd->prepare('INSERT INTO inprogressuserslinkgames(id,gameid,date_of_add2) VALUES(?,?,NOW())');
        $insertquery->execute([$userid, $gameid]);
        
        header("location: ./generationlist.php?getgeneration=$platform");
    }
    elseif($array === "3"){
        $deletequery = $connectbdd->prepare('DELETE FROM wishlistuserslinkgames WHERE id = ? AND gameid = ?');
        $deletequery->execute([$userid, $gameid]);

        $insertquery = $connectbdd->prepare('INSERT INTO inprogressuserslinkgames(id,gameid,date_of_add2) VALUES(?,?,NOW())');
        $insertquery->execute([$userid, $gameid]);

        header("location: ./generationlist.php?getgeneration=$platform");
    }
?>