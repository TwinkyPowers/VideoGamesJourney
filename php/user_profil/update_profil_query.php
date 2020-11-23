<?php
$newusername = htmlspecialchars($_POST['newusername']);
$newdescription = htmlspecialchars($_POST['newdescription']);

if(!empty($newusername)){
    if(strlen($newusername)<=20){
        echo 'inclure new username en bdd';
        
    }
    else {
        echo 'renvoyer une erreur en get pseudo trop long';
    }
}
else {
    echo 'conserver username existant en bdd';
}

if(!empty($newdescription)){
    if(strlen($newdescription)<=60){
        echo 'inclure newdescription en bdd';
    }
    else {
        echo 'renvoyer une erreur en get description trop longue';
    }
}
else {
    echo 'conserver la description existante en bdd';
}

if(isset($_FILES['newimage'])){
    if($_FILES['newimage']['size'] <=1500000)
    {
        $fileinfo = pathinfo($_FILES['newimage']['name']);
        $getextension = $fileinfo['extension'];
        $validextension = array('png', 'jpg', 'jpeg');
        
        if(in_array($getextension, $validextension))
        {
            move_uploaded_file($_FILES['newimage']['tmp_name'], '../inscription_connection/client_images/' . basename($_FILES['newimage']['name']));
            $newuserimagename = basename($_FILES['newimage']['name']);
        }
        else
        {
            header("Location: ./form_update_profil.php?error=type");
        }
    }
    else {
        header("Location: ./form_update_profil.php?error=size");
    }
}
else {
    echo 'conserver l\'image existante en bdd';
}
?>