<?php
session_start();

if(!isset($_SESSION['id']))
{
    header("location: ../../index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/user_profil_style/stylesheet_contacts.css">
    <title>Contacts | VideoGamesJourney</title>
</head>
<body>
    <a href="./user_profil.php">Revenir à votre profil</a>
</body>
</html>