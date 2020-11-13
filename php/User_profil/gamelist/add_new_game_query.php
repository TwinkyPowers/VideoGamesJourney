<?php
$gamename = htmlspecialchars($_POST['name']);
$gametype = htmlspecialchars($_POST['type']);
$platform = htmlspecialchars($_POST['plateforms']);

if(empty($gamename))
{
    header("Location: add_new_game.php?error=empty");
}

if(!isset($gamename))
{
    header("Location: add_new_game.php?error=empty");
}

if(strlen($gamename)>40)
{
    header("Location: add_new_game.php?error=size");
}

if(!isset($_FILES['cover']))
{
    header("Location: add_new_game.php?error=nonexistent");
}

if($_FILES['cover']['error'] == 0)
{
    if($_FILES['cover']['size'] <=1500000)
    {
        $fileinfo = pathinfo($_FILES['cover']['name']);
        $getextension = $fileinfo['extension'];
        $validextension = array('png', 'jpg', 'jpeg');
        
        if(in_array($getextension, $validextension))
        {
            move_uploaded_file($_FILES['cover']['tmp_name'], 'covers/' . basename($_FILES['cover']['name']));
            $covername = basename($_FILES['cover']['name']);
        }
    }
}

try
{
    $connectbdd = new PDO("mysql:host=localhost;dbname=journeymemories", "root", "");
    $connectbdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} 
catch(PDOException $e)
{
    die($e->getMessage());
}

$query = $connectbdd->prepare('SELECT gamename FROM games WHERE gamename = ?');
$query->execute([$gamename]);
$result = $query->fetch();

if(!empty($result))
{
    header("Location: add_new_game.php?error=gameexist");
}
else
{
    $query = $connectbdd->prepare('INSERT INTO games(gamename,platform,gametype,cover) VALUES(?,?,?,?)');
    $query->execute([$gamename,$platform,$gametype,$covername]);

    header("Location: add_new_game.php?success=gameadd");
}