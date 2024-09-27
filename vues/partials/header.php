<?php 
session_start();
require_once('./functions.php'); //le serveur va aller chercher le contenu du fichier et l'inclure à cet endroit 
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La promo DWWM RODEZ 2024</title>
</head>
<body>
    <?php if(isset($_SESSION['user'])&&!empty($_SESSION['user'])) { ?>
        <a href="logout.php">se déconnecter</a>
    <?php }else{ ?>   
        <a href="login.php">se connecter</a>
    <?php } ?>
<?php
require_once('nav.php');
?>
