<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/user_profil_style/stylesheet_update_profil.css">
    <title>Modification profil | JourneyMemories</title>
</head>
<?php
if(isset($_GET['error'])){
    if($_GET['error'] === 'usernamesize'){
        $info = 'Le nom d\'utilisateur doit contenir moins de 21 caractères';
    }
    if($_GET['error'] === 'descriptionsize'){
        $info = 'La description doit contenir moins de 61 caractères';
    }
    if($_GET['error'] === 'imageformat'){
        $info = 'Veuillez selectionner une image au format png ou jpg/jpeg';
    }
}
if(isset($_GET['success'])){
    if($_GET['success'] === '1'){
        $info = 'Les modifications ont été prises en compte';
    }
}
?>
<body>
    <div class="form_container">
        <div class="form">
            <h1>
                Modification profil
            </h1>
            <form method="POST" action="update_profil_query.php" enctype="multipart/form-data">
                <input type="text" name="newusername" placeholder="Choisir un nouveau nom d'utilisateur">
                <textarea placeholder="Modifier la description du profil" name="newdescription" class="description_text_area"></textarea>
                <p>Choisir une nouvelle image de profil</p>
                <input type="file" name="newimage" class="upload_image_input">
                <input type="submit" name="submit" class="submit_input">
            </form>
            <p class="alert">
                <?php
                    if(isset($_GET['error'])){
                        echo $info;
                    }
                    elseif(isset($_GET['success'])){
                        echo $info;
                    }
                    else{
                    }
                ?>
            </p>
        </div>
    </div>
</body>
</html>