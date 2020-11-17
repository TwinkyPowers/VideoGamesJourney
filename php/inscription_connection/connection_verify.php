<?php
$username = htmlspecialchars($_POST['username']);
$passw = htmlspecialchars($_POST['passw']);

try {
    $connectbdd = new PDO("mysql:host=localhost;dbname=journeymemories", "root", "");
    $connectbdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die($e->getMessage());
}

$query = $connectbdd->prepare('SELECT passw FROM users WHERE username = ?');
$query->execute([$username]);

$success = $query->fetch();
$verify_passw = password_verify($passw, $success['passw']);

if($success){
    if($verify_passw){
        $query1 = $connectbdd->prepare('SELECT * FROM users WHERE username = ?');
        $query1->execute([$username]);
        $userinfo = $query1->fetch();
        
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['id'] = $userinfo[0];
        $_SESSION['userdescription'] = $userinfo[4];
        $_SESSION['userimage'] = $userinfo[5];

        header("location: ../user_profil/user_profil.php");
    }
    else{
        header("location: connection_form.php?error=wrong_id");
    }
}
else{
    header("location: connection_form.php?error=wrong_id");
}

?>