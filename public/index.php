<?php
    require __DIR__ . "/../vendor/autoload.php";

    session_start();
    if (isset($_SESSION['user_id'])) {
        header("Refresh:1; url=views/profil.php");
    }

    /*
    $faker = Faker\Factory::create();

    $num = $faker->randomDigit();
    $utilisateur = $faker->firstNameFemale();
    $sujetAutorisation = $faker->word();
    $numeroDecision = $faker->randomDigit();
    $dateDebutAutorisation = $faker->date('Y-m-d', 'now');
    $dateFinAutorisation = $faker->date('Y-m-d', 'now');
    $surface = $faker->randomDigit();
    $montant = $faker->randomDigit();
    $typeActivite = $faker->sentence( 6, true);
    $situationActuelle = $faker->sentence( 1, true);
    $decisionDeDirection = $faker->sentence( 3, true);

    $dossier = new \App\models\dossier\Dossier($utilisateur, $sujetAutorisation, $numeroDecision, $dateDebutAutorisation, $dateFinAutorisation, $surface, $montant, $typeActivite, $situationActuelle, $decisionDeDirection);

    var_dump($dossier);
    */

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
    <link href="css/main.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

    <link rel="icon" type="image/ico" href="css/img/logo.ico"/>
</head>

    <div class="container-fluid index-container">


        <div class="row h-100 ">
            <div class="col-12 px-5 pb-0 align-self-start">
                <img src="img/slogan.svg" alt="" class="index-logo">
                <p class="text-center mx-auto w-75 index-text">KAFA est une plateforme digitale concue pour gérer complétement les dossiers au sein de la Direction de la ministre de logistique et de transport à Kenitra </p>

            </div>
            <div class="col-4 mx-auto p-4 login align-self-center">
                <div class="row">
                    <div class="col-12 d-flex mb-3">

                        <div class="login-text py-3 px-2 mx-3">
                            <span>Login</span>
                        </div>
                        <div class="login-text py-3 px-2 mx-3">
                            <span>SignUp</span>
                        </div>

                    </div>

                    <div class="col-12">
                        <form action="controllers/connexion.php" class="col-10 mx-auto mt-3" method="post">
                            <div class="input-group form-group login-input ">
                                <div class="input-group-prepend  input-group-sm">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">username</span>
                                </div>
                                <input name="cin_c" type="text" class="form-control" required>
                            </div>
                            <div class="input-group form-group login-input mb-5">
                                <div class="input-group-prepend  input-group-sm">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">password</span>
                                </div>
                                <input name="key_c" type="password" class="form-control" required>
                            </div>



                            <div class="col text-center align-self-end">
                                <input type="submit" value="Connecter" class="btn btn-login">
                            </div>
                        </form>
                    </div>


                </div>
            </div>

            <div class="col-12 footer-height align-self-end">
                <footer class="h-100">
                    <div class="row h-50 d-flex justify-content-center">
                        <a href="#" class="col-auto mx-3  align-self-center">Contributors</a>
                        <img src="img/slogan.svg" alt="" class="col-auto footer-logo mx-3">
                        <a href="#" class="col-auto mx-3 align-self-center">About Us</a>
                    </div>

                    <div class="row h-50 d-flex justify-content-center align-items-center">
                        <div class="col-8 text-center">
                            <span>Made with <i class="fa fa-heart pulse"></i></span>
                        </div>
                    </div>
                </footer>

            </div>

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>