<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/misc_style/stylesheet_features.css">
    <title>Fonctionnalités | VideoGamesJourney</title>
</head>
<body>
    <div class="logo_container">
        <img class="logo" src="../../ressources/png/Logo-Laurent.png">
        <h1>
            VideoGamesJourney
        </h1>
    </div>
    <div class="features_container">
        <p class="feature_description">
            Après avoir créé un Compte Utilisateur, il sera possible de sélectionner des jeux vidéo à ajouter 
            dans 3 listes distinctes : Jeux terminés ; Jeux en cours ; Jeux souhaités.<br>
            Pour accéder à celles-ci, il suffit de cliquer sur la plateforme de votre choix, (Playstation 4, Nintendo Switch, Xbox One etc...).<br>
            Une fois la plateforme sélectionnée, vous pourrez alors enrichir vos listes grâce à la bibliothèque de jeux du site en cliquant sur "Ajouter un jeu à ma Gamelist". 
        </p>
        <img class="screen_about_feature" src="../../ressources/png/feature1.png">
    </div>
    <div class="features_container">
        <p class="feature_description">
            La bibliothèque de VideoGamesJourney est encore incomplète.<br>
            Elle le sera probablement toujours puisque le monde du jeu est en perpétuelle évolution.<br>
            Cependant il est possible d'ajouter un nouveau jeu sur le site en cliquant sur "ajouter un jeu non existant".
        </p>
        <img class="screen_about_feature" src="../../ressources/png/feature2.png">
    </div>
    <div class="features_container">
        <p class="feature_description">
            En cliquant sur le nom d'un jeu, une page dédiée à celui-ci se présentera alors.<br>
            Sur cette page vous pourrez retrouver quelques informations à propos du jeu.<br>
            De plus une section commentaire est disponible sur la droite de la page.<br>
            Elle a pour but de laisser la possibilité aux joueurs de s'exprimer à propos des jeux auxquels ils ont joué.
        </p>
        <img class="screen_about_feature" src="../../ressources/png/feature3.png">
    </div>
    <div class="input_container">
        <?php
            if(isset($_SESSION['id'])){
                echo "<a class=\"input_user\" href=\"../user_profil/user_profil.php\">
                        Retour à mon profil
                        </a>";
            }
            else{
                echo "<a class=\"input\" href=\"../inscription_connection/connection_form.php\">
                Connexion
            </a>
            <a class=\"input\" href=\"../inscription_connection/inscription_form.php\">
                Inscription
            </a>";
            }
        ?>
    </div>
</body>
</html>