<?php
require __DIR__ . "/../../vendor/autoload.php";

session_start();
//Check if a $_SESSION[admin] is set
// else redirect to connxion page

if (!isset($_SESSION['user_id'])) {
    header("Refresh:1; url=../");
}

$paiementDao = \App\models\paiement\PaiementDaoFactory::getDossierDaoFactory("mysql");



?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP MVC Frameworks - Search Engine</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <script type="text/javascript" src="auto_complete.js"></script>
    <link href="../css/main.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="sidebar px-4">

                <?php require_once 'sidemenu.php' ?>

            </div>

            <div class="col-9 ml-5">

                <div class="row">
                    <div class="col mt-4 mb-2 p-3 statistics">

                        <?php require_once 'statistics.php';?>

                    </div>

                </div>

                <div class="row">

                    <div class="col mt-3 py-3 content">

                        <?php
                        if (isset($_GET['action'])) {
                            $action = $_GET['action'];

                            if ($action === "consulter") {
                                // Cas : tous les dossiers
                                if (!isset($_GET['pid'])) {
                                    require_once 'table-paiements.php';
                                } else { // dossier avec did
                                    require_once 'single-paiement.php';
                                }


                            } else if ($action === "modifier") {
                                require_once 'modifier-paiement.php';

                            } else if ($action === "payer") {
                                if (isset($_GET['did'])) {
                                    $did = $_GET['did'];

                                    require_once 'formulaire-paiement.php';

                                } else {
                                    // redirect to liste des dossiers
                                }

                            }

                        } else {
                            // redirect to the profil page
                        }

                        ?>

                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>