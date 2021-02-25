<?php
    session_start();

    if(!isset($_SESSION['id']))
    {
        header("location: ../../index.php");
    }
    elseif($_SESSION['idrole'] != 1){
        header("location: ../../index.php");
    }
    else {
        $get_content = htmlspecialchars($_GET['dbinfoid']);
        $from = htmlspecialchars($_GET['from']);
        $table = htmlspecialchars($_GET['table']);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/user_profil_style/admin_space.css">
    <title>Admin-Update | VideoGamesJourney</title>
</head>
<body>
    <h1>Update</h1>
    <form method="POST" action="./admin_update_query.php?table=<?php echo $table ?>&from=<?php echo $from ?>&dbinfoid=<?php echo $get_content ?>">
        <input type="text" name="update_content">
        <input type="submit" name="submit">
    </form>
</body>
</html>