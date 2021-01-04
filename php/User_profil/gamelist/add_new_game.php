<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/list_style/stylesheet_add_new_game.css">
    <title>Ajouter un jeu | JourneyMemories</title>
</head>
<?php
$error = '';
$success = '';
if(isset($_GET['error'])){
    if($_GET['error'] === 'empty'){
        $error = 'Veuillez entrer un nom';
    }
    if($_GET['error'] === 'size'){
        $error = 'Le nombre de caractères dans le champ nom est trop élevé';
    }
    if($_GET['error'] === 'nonexistent'){
        $error = 'Veuillez envoyer un fichier de type PNG ou JPG dans le champ Ilustration du jeu';
    }
    if($_GET['error'] === 'gameexist'){
        $error = 'Le jeu est déjà existant';
    }
}
if(isset($_GET['success'])){
    $success = 'Le jeu a bien été envoyé, vous pouvez maintenant l\'ajouter à votre liste personnelle à partir de la barre de recherche';
}
?>
<body>
    <div class="form_container">
        <div class="form">
            <h1>Ajouter un jeu</h1>
            <form method="POST" action="./add_new_game_query.php" enctype="multipart/form-data">
                <input type="text" name="name" placeholder="Nom du jeu" required maxlength="40">
                <p>Sélectionner un genre</p>
                <select name="type" required>
                    <option value="rpg">RPG</option>
                    <option value="action rpg">Action RPG</option>
                    <option value="mmo rpg">MMO RPG</option>
                    <option value="action aventure">Action Aventure</option>
                    <option value="aventure">Aventure</option>
                    <option value="fps">FPS</option>
                    <option value="sport">SPORT</option>
                    <option value="course">Course</option>
                    <option value="simulation">Simulation</option>
                    <option value="beat them all">Beat Them All</option>
                    <option value="gestion">Gestion</option>
                    <option value="plates formes">Plateforme</option>
                    <option value="gta like">GTA like</option>
                    <option value="rogue like lite">Rogue Like/Lite</option>
                    <option value="strategie">Strategie</option>
                    <option value="survie">Survie</option>
                    <option value="sand box">Sand box</option>
                    <option value="horreur">Horreur</option>
                    <option value="survival horror">Survival horror</option>
                    <option value="film interactif">Film interactif</option>
                    <option value="point and click">Point and click</option>
                    <option value="Combat">Combat</option>
                </select>
                <p>Sélectionner une plateforme</p>
                <select name="plateforms" required>
                    <optgroup label="Sony">
                        <option value="Playstation 5">Playstation 5</option>
                        <option value="Playstation 4">Playstation 4</option>
                        <option value="Playstation 3">Playstation 3</option>
                        <option value="Playstation 2">Playstation 2</option>
                        <option value="Playstation 1">Playstation 1</option>
                        <option value="Playstation Portable">Playstation Portable</option>
                        <option value="Playstation portable Vita">Playstation Vita</option>
                    </optgroup>
                    <optgroup label="Microsoft">
                        <option value="Xbox series x">Xbox Series X</option>
                        <option value="Xbox one">Xbox One</option>
                        <option value="Xbox 360">Xbox 360</option>
                        <option value="Xbox">Xbox</option>
                    </optgroup>
                    <optgroup label="Nintendo">
                        <option value="Switch">Nintendo Switch</option>
                        <option value="Wii U">Nintendo Wii U</option>
                        <option value="Wii">Nintendo Wii</option>
                        <option value="Gamecube">Nintendo GameCube</option>
                        <option value="N64">Nintendo 64</option>
                        <option value="SNES">SNES</option>
                        <option value="NES">NES</option>
                            <optgroup label="Nintendo Portable">
                                <option value="3DS">Nintendo 3DS</option>
                                <option value="DS">Nintendo DS</option>
                                <option value="Gameboy SP">Nintendo GameBoy SP</option>
                                <option value="GameBoy">Nintendo GameBoy</option>
                            </optgroup>
                    </optgroup>
                    <optgroup label="PC">
                        <option value="PC">PC</option>
                    </optgroup>
                    <optgroup label="Others">
                        <optgroup label="SEGA">
                            <option value="Dream cast">DreamCast</option>
                            <option value="Sega saturn">Saturn</option>
                            <option value="Megadrive">Mega Drive</option>
                        </optgroup>
                    </optgroup>
                </select>
                <p>Sélectionner une ilustration du jeu</p>
                <input type="file" name="cover" class="upload" required>
                <input type="submit" name="submit" value="Ajouter" class="submit_input" required>
                <p>
                    <?php
                        echo $error;
                        echo $success;
                    ?>
                </p>
            </form>
        </div>
    </div>
</body>
</html>