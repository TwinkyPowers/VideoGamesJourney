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
                    <option value="mmorpg">MMO RPG</option>
                    <option value="aventure">Aventure</option>
                    <option value="fps">FPS</option>
                    <option value="sport">SPORT</option>
                    <option value="course">Course</option>
                    <option value="simulation">Simulation</option>
                    <option value="beat them all">Beat Them All</option>
                    <option value="gestion">Gestion</option>
                    <option value="plateform">Plateforme</option>
                </select>
                <p>Sélectionner une plateforme</p>
                <select name="plateforms" required>
                    <optgroup label="Sony">
                        <option value="playstation5">Playstation 5</option>
                        <option value="playstation4">Playstation 4</option>
                        <option value="playstation3">Playstation 3</option>
                        <option value="playstation2">Playstation 2</option>
                        <option value="playstation1">Playstation 1</option>
                        <option value="psp">Playstation Portable</option>
                        <option value="psvita">Playstation Vita</option>
                    </optgroup>
                    <optgroup label="Microsoft">
                        <option value="xboxseriesx">Xbox Series X</option>
                        <option value="xboxone">Xbox One</option>
                        <option value="xbox360">Xbox 360</option>
                        <option value="xbox">Xbox</option>
                    </optgroup>
                    <optgroup label="Nintendo">
                        <option value="switch">Nintendo Switch</option>
                        <option value="wiiu">Nintendo Wii U</option>
                        <option value="wii">Nintendo Wii</option>
                        <option value="gamecube">Nintendo GameCube</option>
                        <option value="n64">Nintendo 64</option>
                        <option value="snes">SNES</option>
                        <option value="nes">NES</option>
                            <optgroup label="Nintendo Portable">
                                <option value="3ds">Nintendo 3DS</option>
                                <option value="ds">Nintendo DS</option>
                                <option value="gameboysp">Nintendo GameBoy SP</option>
                                <option value="gameboy">Nintendo GameBoy</option>
                            </optgroup>
                    </optgroup>
                    <optgroup label="PC">
                        <option value="pc">PC</option>
                    </optgroup>
                    <optgroup label="Others">
                        <optgroup label="SEGA">
                            <option value="dreamcast">DreamCast</option>
                            <option value="segasaturn">Saturn</option>
                            <option value="megadrive">Mega Drive</option>
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