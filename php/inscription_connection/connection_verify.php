<?php
$username = $_POST['username'];
$passw = $_POST['passw'];

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
        echo 'ok';
        // session_start();
        // $_SESSION['username'] = $username;
    }
    else{
        header("location: connection_form.php?error=wrong_id");
    }
}
else{
    header("location: connection_form.php?error=wrong_id");
}



?>