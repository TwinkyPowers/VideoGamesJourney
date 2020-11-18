<?php
session_start();

if(!isset($_SESSION['id']))
{
    header("location: ../../index.php");
}
else
{
$_SESSION = array();
session_destroy();

(header("location: ../../index.php"));
}
?>