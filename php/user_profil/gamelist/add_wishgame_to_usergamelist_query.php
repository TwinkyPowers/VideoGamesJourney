<?php 
session_start();

if(!isset($_SESSION['id']))
{
    header("location: ../../../index.php");
}
elseif(!isset($_GET['gameid']))
{
    header("location: ../user_profil.php");
}
else
{
    $userid = $_SESSION['id'];
    $gameid = htmlspecialchars($_GET['gameid']);

    try
    {
    $connectbdd = new PDO("mysql:host=localhost;dbname=journeymemories", "root", "");
    $connectbdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } 
    catch(PDOException $e)
    {
        die($e->getMessage());
    }

    $query1 = $connectbdd->prepare('SELECT * FROM wishlistuserslinkgames WHERE id = ? AND gameid = ?');
    $query1->execute([$userid, $gameid]);
    $result = $query1->fetch();

    if(!empty($result)){
        header("location: ./gamelist.php?error=exist");
    }
    else{
        $query = $connectbdd->prepare('INSERT INTO wishlistuserslinkgames(id,gameid) VALUES(?,?)');
        $query->execute([$userid,$gameid]);
        header("location: ./link_to_gamelist_or_userprofil.php?success=1");
    }
}
?>