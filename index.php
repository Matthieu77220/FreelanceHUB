<?php

    require_once "class/db/connexion_bdd.php";

    $connexion = new Connexion();

    $user = $connexion->getUser();
    var_dump($user);
    $pass = $connexion->getPass();
    var_dump($pass);
 
?>

<html lang="FR-fr">
    <head>
        <link rel="icon" href="img/freelance.ico">
        <title>FreelanceHub</title>
    </head>
</html>