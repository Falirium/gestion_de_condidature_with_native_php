<?php

    require __DIR__ . "/../../vendor/autoload.php";
    session_start();



    //
    if (isset($_POST["cin_c"]) && isset($_POST["key_c"])) {
        $e_cin = $_POST["cin_c"];
        $e_key = $_POST["key_c"];
    } else {
        header("Refresh:1; url=../");
    }


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

        $alertMsg = "Failed to connect you, please verify your crdentials and retry !";
        setcookie("alert", $alertMsg, time() + 1200,"/");

        var_dump($_COOKIE['alert']);

        header("Refresh:1; url=../");
    }



?>