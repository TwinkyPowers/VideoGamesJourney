<?php
session_start();

if(!isset($_SESSION['id']))
{
    header("location: ../../index.php");
}
else
{
    $userid = $_SESSION['id'];
    $username = $_SESSION['username'];
    $userdescription = $_SESSION['userdescription'];
    $userimage = $_SESSION['userimage'];
}

$newusername = htmlspecialchars($_POST['newusername']);
$newdescription = htmlspecialchars($_POST['newdescription']);

if(!empty($newusername)){
    if(strlen($newusername)<=20){
        try {
            $connectbdd = new PDO("mysql:host=localhost;dbname=journeymemories", "root", "");
            $connectbdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e){
            die($e->getMessage());
        }

        $query = $connectbdd->prepare('UPDATE users SET username = ? WHERE id = ?');
        $query->execute([$newusername, $userid]);

        $_SESSION['username'] = $newusername;
    }
    elseif(strlen($newusername) >20){
        header("Location: ./form_update_profil.php?error=usernamesize");
    }
}
else {
    // echo 'conserver username existant en bdd';
}

if(!empty($newdescription)){
    if(strlen($newdescription)<=100){
        try {
            $connectbdd = new PDO("mysql:host=localhost;dbname=journeymemories", "root", "");
            $connectbdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e){
            die($e->getMessage());
        }

        $query1 = $connectbdd->prepare('UPDATE users SET userdescription = ? WHERE id = ?');
        $query1->execute([$newdescription, $userid]);

        $_SESSION['userdescription'] = $newdescription;
    }
    else {
        header("Location: ./form_update_profil.php?error=descriptionsize");
    }
}
else {
    // echo 'conserver la description existante en bdd';
}

if($_FILES['newimage']['size'] === 0){
    // echo 'conserver image existante';
}
else {
    if($_FILES['newimage']['error'] == 0){
        if($_FILES['newimage']['size'] <=1500000){
            $fileinfo = pathinfo($_FILES['newimage']['name']);
            $getextension = $fileinfo['extension'];
            $validextension = array('png', 'jpg', 'jpeg');
            
            if(in_array($getextension, $validextension)){
                move_uploaded_file($_FILES['newimage']['tmp_name'], '../inscription_connection/client_images/' . basename($_FILES['newimage']['name']));
                $newimagename = basename($_FILES['newimage']['name']);

                try {
                    $connectbdd = new PDO("mysql:host=localhost;dbname=journeymemories", "root", "");
                    $connectbdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                } catch(PDOException $e){
                    die($e->getMessage());
                }
                
                $query2 = $connectbdd->prepare('UPDATE users SET userimage = ? WHERE id = ?');
                $query2->execute([$newimagename, $userid]);

                $_SESSION['userimage'] = $newimagename;
            }
            else{
                header("Location: ./form_update_profil.php?error=imageformat");
            }
        }
    }
}

header("Location: ./user_profil.php");
?>