<?php 
    session_start();
    
    if(!isset($_SESSION['id']))
    {
        header("location: ../../../index.php");
    }
    elseif(!isset($_GET['gameid'])){
        header("location: ../../../index.php");
    }
    elseif(!isset($_GET['form'])){
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

        $form = htmlspecialchars($_GET['form']);
        $gameid = htmlspecialchars($_GET['gameid']);
        $comid = htmlspecialchars($_GET['comid']);
        if(isset($_POST['com_title']) & isset($_POST['com_text'])){
            $com_title = htmlspecialchars($_POST['com_title']);
            $com_text = htmlspecialchars($_POST['com_text']);
        }
        $userid = $_SESSION['id'];
    }

    if($form == 1){

        if(strlen($com_title)<=50){
            $query = $connectbdd->prepare('INSERT INTO commentariesaboutgames(id,gameid,title,commentary,date_creation) VALUES(?,?,?,?,NOW())');
            $query->execute([$userid,$gameid,$com_title,$com_text]);

            header("location: ./gamepage.php?gameid=".$gameid."");
        }
        else{
            header("location: ./gamepage.php?gameid=".$gameid."&erreur=titlesize");
        }
    }

    elseif($form == 2){
        if(strlen($com_title)<=50){
            $query = $connectbdd->prepare('UPDATE commentariesaboutgames SET title = ?, commentary = ? WHERE comid = ?');
            $query->execute([$com_title, $com_text, $comid]);

            header("location: ./gamepage.php?gameid=".$gameid."");
        }
        else{
            header("location: ./gamepage.php?gameid=".$gameid."&erreur=titlesize");
        }
    }
    elseif($form == 3){
        $query = $connectbdd->prepare('DELETE FROM commentariesaboutgames WHERE comid = ?');
        $query->execute([$comid]);

        header("location: ./gamepage.php?gameid=".$gameid."");
    }