<?php
$username = htmlspecialchars($_POST['username']);
$email = htmlspecialchars($_POST['email_adress']);
$passw1 = htmlspecialchars($_POST['passw1']);
$passw2 = htmlspecialchars($_POST['passw2']);

if(strlen($username)>20){
    header("Location: inscription_form.php?error=length");
}
if($passw1 !=$passw2){
    header("Location: inscription_form.php?error=passw");
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

    $query = $connectbdd->prepare('INSERT INTO users(username,email,passw) VALUES(?,?,?)');
    $query->execute([$username,$email,$passw1]);

    header("Location: connection_form.php?accountcreate=1");
}
?>