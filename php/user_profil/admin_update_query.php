<?php 
    session_start();

    if(!isset($_SESSION['id']))
    {
        header("location: ../../index.php");
    }
        elseif($_SESSION['idrole'] != 1){
            header("location: ../../index.php");
        }
            // elseif(empty($_POST['update_content'])){
            //     header("location: ../../index.php");
            // }
    else{
        $get_content = htmlspecialchars($_GET['dbinfoid']);
        $from = htmlspecialchars($_GET['from']);
        $update_content = htmlspecialchars($_POST['update_content']);
        $table = htmlspecialchars($_GET['table']);

        try {
            $connectbdd = new PDO("mysql:host=localhost;dbname=journeymemories", "root", "");
            $connectbdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e){
            die($e->getMessage());
        }
    }

    if($table == 'users'){
        if($from == 0){
            $query = $connectbdd->prepare("UPDATE users SET id = ? WHERE id = ?");
            $query->execute([$update_content, $get_content]);

            header("location: ./admin_space.php");
        }
         elseif($from == 1){
            $query = $connectbdd->prepare("UPDATE users SET username = ? WHERE username = ?");
            $query->execute([$update_content, $get_content]);

            header("location: ./admin_space.php");
         }
            elseif($from == 2){
                $query = $connectbdd->prepare("UPDATE users SET email = ? WHERE email = ?");
                $query->execute([$update_content, $get_content]);

                header("location: ./admin_space.php");
            }
                elseif($from == 3){
                    $query = $connectbdd->prepare("UPDATE users SET passw = ? WHERE passw = ?");
                    $query->execute([$update_content, $get_content]);

                    header("location: ./admin_space.php");
                }
                    elseif($from == 4){
                        $query = $connectbdd->prepare("UPDATE users SET userdescription = ? WHERE userdescription = ?");
                        $query->execute([$update_content, $get_content]);

                        header("location: ./admin_space.php");
                    }
                        elseif($from == 5){
                            $query = $connectbdd->prepare("UPDATE users SET userimage = ? WHERE userimage = ?");
                            $query->execute([$update_content, $get_content]);

                            header("location: ./admin_space.php");
                        }
                            elseif($from == 6){
                                $query = $connectbdd->prepare("UPDATE users SET idrole = ? WHERE idrole = ?");
                                $query->execute([$update_content, $get_content]);

                                header("location: ./admin_space.php");
                            }
    }

    elseif($table == 'games'){
        if($from == 0){
            $query = $connectbdd->prepare("UPDATE games SET gameid = ? WHERE gameid = ?");
            $query->execute([$update_content, $get_content]);

            header("location: ./admin_space.php");
        }
         elseif($from == 1){
            $query = $connectbdd->prepare("UPDATE games SET gamename = ? WHERE gamename = ?");
            $query->execute([$update_content, $get_content]);

            header("location: ./admin_space.php");
         }
            elseif($from == 2){
                $query = $connectbdd->prepare("UPDATE games SET platform = ? WHERE platform = ?");
                $query->execute([$update_content, $get_content]);

                header("location: ./admin_space.php");
            }
                elseif($from == 3){
                    $query = $connectbdd->prepare("UPDATE games SET gametype = ? WHERE gametype = ?");
                    $query->execute([$update_content, $get_content]);

                    header("location: ./admin_space.php");
                }
                    elseif($from == 4){
                        $query = $connectbdd->prepare("UPDATE games SET cover = ? WHERE cover = ?");
                        $query->execute([$update_content, $get_content]);

                        header("location: ./admin_space.php");
                    }
    }
    
    