<?php
$username = htmlspecialchars($_POST['username']);
$email = htmlspecialchars($_POST['email_adress']);
$passw1 = htmlspecialchars($_POST['passw1']);
$passw2 = htmlspecialchars($_POST['passw2']);
$description = '';

if(strlen($username)>20){
    header("Location: inscription_form.php?error=length");
}
if($passw1 !=$passw2){
    header("Location: inscription_form.php?error=passw");
}

if(!isset($_FILES['userimage'])){
    header("Location: inscription_form.php?error=image");
}

if($_FILES['userimage']['error'] == 0)
{
    if($_FILES['userimage']['size'] <=1500000)
    {
        $fileinfo = pathinfo($_FILES['userimage']['name']);
        $getextension = $fileinfo['extension'];
        $validextension = array('png', 'jpg', 'jpeg');
        
        if(in_array($getextension, $validextension))
        {
            move_uploaded_file($_FILES['userimage']['tmp_name'], 'client_images/' . basename($_FILES['userimage']['name']));
            $userimagename = basename($_FILES['userimage']['name']);
        }
        else
        {
            header("Location: inscription_form.php?error=imageformat");
        }
    }
}

if($passw1 === $passw2){
    $passw1 = password_hash($passw1, PASSWORD_DEFAULT);

    try {
        $connectbdd = new PDO("mysql:host=localhost;dbname=journeymemories", "root", "");
        $connectbdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e){
        die($e->getMessage());
    }

    $query = $connectbdd->prepare('SELECT * FROM users WHERE username = ?');
    $query->execute([$username]);
    $result = $query->fetch();

    if($result){
        header("Location: inscription_form.php?error=exist");
    }

    $query = $connectbdd->prepare('SELECT * FROM users WHERE email = ?');
    $query->execute([$email]);
    $result = $query->fetch();

    if ($result){
        header("Location: inscription_form.php?error=existmail");
    }

    $query = $connectbdd->prepare('INSERT INTO users(username,email,passw,userdescription,userimage) VALUES(?,?,?,?,?)');
    $query->execute([$username,$email,$passw1,$description,$userimagename]);

    header("Location: connection_form.php?accountcreate=1");
}
?>