<?php require("config/config.php") ?>
<?php
    defined("DS") ? null : define("DS",DIRECTORY_SEPARATOR);
    $arrDir = explode( '/', $_SERVER['SCRIPT_FILENAME'] );
    define("rootDir","/{$arrDir[3]}");
    define("SITE_ROOT",$_SERVER['DOCUMENT_ROOT'].rootDir);
?>
<?php
    if(isset($_SESSION['username'])){
        $userLoggedIn = $_SESSION['username'];
        $user_details_query = mysqli_query($con, "SELECT * FROM users WHERE username='$userLoggedIn'");
        $user = mysqli_fetch_array($user_details_query);
    }else{
        header("Location: register.php");
        exit();
    }
?>
<?php if(!class_exists("User")): ?>
<?php require("includes/classes/User.php") ?>
<?php require("includes/classes/Post.php") ?>
<?php require("includes/classes/Message.php") ?>
<?php require("includes/classes/Notification.php") ?>
<?php endif; ?>
<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    <link rel='shortcut icon' href='assets/upload/icon.png' type='image/x-icon'>
    <title><?php echo $pageTitle ?> - Socialite</title>

    <script src='assets/js/layout/jquery.min.js'></script>


    <link rel='stylesheet' href='assets/css/layout/all.min.css'>
    <link rel='stylesheet' href='assets/css/layout/bootstrap_3.min.css'>
    <link rel='stylesheet' href='assets/css/layout/jquery.Jcrop.css'>
    <link rel='stylesheet' href='assets/css/style.css'>
