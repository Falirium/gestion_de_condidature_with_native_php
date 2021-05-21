<?php

    require __DIR__ . "/../../vendor/autoload.php";
    session_start();




    $e_cin = $_POST["cin_c"];
    $e_key = $_POST["key_c"];

    //Verify credentiels
    $userImpl = \App\models\user\UserDaoFactory::getUserDaoFactory("mysql");

    if ($user = $userImpl->verifierConnexion($e_cin,$e_key)) {
        // redirect to profil page
        // Start a seesion and remember this user
        //var_dump($user);
        $_SESSION['user_id'] = $user->getE_cin();
        header("Refresh:1; url=../views/profil.php");
    } else {
        // redirect to connexion page with "false crdentials message"
    }



?>