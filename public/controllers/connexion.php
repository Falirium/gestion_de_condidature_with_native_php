<?php

    require __DIR__ . "/../../vendor/autoload.php";



    $e_cin = $_POST["cin_c"];
    $e_key = $_POST["key_c"];

    //Verify credentiels
    $userImpl = \App\models\user\UserDaoFactory::getUserDaoFactory("mysql");

    if ($userImpl->verifierConnexion($e_cin,$e_key)) {
        // redirect to profil page
        // Start a seesion and remember this user
        header("Refresh:1; url=../views/profil.php");
    } else {
        // redirect to connexion page with "false crdentials message"
    }



?>