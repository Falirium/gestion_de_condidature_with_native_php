<?php

    require __DIR__ . "/../../vendor/autoload.php";

    $dossierDoa = \App\models\dossier\DossierDaoFactory::getDossierDaoFactory("mysql");

    session_start();
    //Check if a $_SESSION[admin] is set
    // else redirect to connxion page

    if (!isset($_SESSION['user_id'])) {
        header("Refresh:1; url=../");
    }

// Gere l'affichage des dossiers archivés
$archive = 1;
if (isset($_POST['archive'])) {
    $archive = $_POST['archive'];
} else {
    $archive = 1;
}

//Function to display an array of Dossier | or single object Dossier
function afficher($dossiers) {


    // If it is an array of Dossier
    if (gettype($dossiers) === "array")  {
        echo '<table style="border: 1px solid black; border-collapse: collapse; width: 100%">';
        foreach ($dossiers as $dossier) {

            $row = "<tr><td>".$dossier->getNumero()."</td>"
                ."<td>".$dossier->getUtilisateur()."</td>"
                ."<td>".$dossier->getSujetAutorisation()."</td>"
                ."<td>".$dossier->getDateFinAutorisation()."</td>"
                ."<td>".$dossier->getMontant()."</td>"
                ."<td>".$dossier->getTypeActivite()."</td>"
                ."<td> <button><a href='../controllers/archiverDossier.php?did={$dossier->getNumero()}'>Archiver</a></button></td>"
                ."<td> <button><a href='?did={$dossier->getNumero()}&action=modifier'>Modifier</a></button></td>"
                ."<td> <button><a href='?did={$dossier->getNumero()}'>Consulter</a></button></td></tr>";

            echo $row;
        }

        echo "</table>";
    } elseif (gettype($dossiers) === "object") {
        /*

            $row = "<tr><td style=\"border: 1px solid black; border-collapse: collapse;\">".$dossiers->getNumero()."</td>"
                ."<td style=\"border: 1px solid black; border-collapse: collapse;\">".$dossiers->getUtilisateur()."</td>"
                ."<td style=\"border: 1px solid black; border-collapse: collapse;\">".$dossiers->getSujetAutorisation()."</td>"
                ."<td style=\"border: 1px solid black; border-collapse: collapse;\">".$dossiers->getNumeroDecision()."</td>"
                ."<td style=\"border: 1px solid black; border-collapse: collapse;\">".$dossiers->getDateDebutAutorisation()."</td>"
                ."<td style=\"border: 1px solid black; border-collapse: collapse;\">".$dossiers->getDateFinAutorisation()."</td>"
                ."<td style=\"border: 1px solid black; border-collapse: collapse;\">".$dossiers->getSurface()."</td>"
                ."<td style=\"border: 1px solid black; border-collapse: collapse;\">".$dossiers->getMontant()."</td>"
                ."<td style=\"border: 1px solid black; border-collapse: collapse;\">".$dossiers->getTypeActivite()."</td>"
                ."<td style=\"border: 1px solid black; border-collapse: collapse;\">".$dossiers->getSituationActuelle()."</td>"
                ."<td style=\"border: 1px solid black; border-collapse: collapse;\">".$dossiers->getDecisionDeDirection()."</td>"
                ."<td style=\"border: 1px solid black; border-collapse: collapse;\">".$dossiers->getDateDecision()."</td>"
                ."<td style=\"border: 1px solid black; border-collapse: collapse;\">".$dossiers->getArchive()."</td>";
            */

            $row = "
             <div style='width: 100%; margin: 20px auto;'>
               <div style='float: left; width: 50%'>
                    <div><span style=' width: 50%; font-weight: bold '>Numero   </span><span style=' width: 50%; float: right; '>{$dossiers->getNumero()}</span></div>
                        <div><span style=' width: 50%; font-weight: bold '>Beneficiaire  </span><span style=' width: 50%; float: right; '>{$dossiers->getUtilisateur()}</span></div>
                    <div><span style=' width: 50%; font-weight: bold '>Sujet d'autorisation  </span><span style=' width: 50%; float: right; '>{$dossiers->getSujetAutorisation()}</span></div>
                    <div><span style=' width: 50%; font-weight: bold '>Numero de decision  </span><span style=' width: 50%; float: right; '>{$dossiers->getNumeroDecision()}</span></div>
                    <div><span style=' width: 50%; font-weight: bold '>Date de decision   </span><span style=' width: 50%; float: right; '>{$dossiers->getDateDecision()}</span></div>
                    <div><span style=' width: 50%; font-weight: bold '>Date debut autorisation  </span><span style=' width: 50%; float: right; '>{$dossiers->getDateDebutAutorisation()}</span></div>
               </div>
               <div style='float: right; width: 50%'>
                    <div><span style=' width: 50%; font-weight: bold '>Date fin autorisation   </span><span style=' width: 50%; float: right; '>{$dossiers->getDateFinAutorisation()}</span></div>
                    <div><span style=' width: 50%; font-weight: bold '>Surface (en m²)  </span><span style=' width: 50%; float: right; '>{$dossiers->getSurface()}</span></div>
                    <div><span style=' width: 50%; font-weight: bold '>Montant (en DH)  </span><span style=' width: 50%; float: right; '>{$dossiers->getMontant()}</span></div>
                    <div><span style=' width: 50%; font-weight: bold '>Type d'activité   </span><span style=' width: 50%; float: right; '>{$dossiers->getTypeActivite()}</span></div>
                    <div><span style=' width: 50%; font-weight: bold '>Situation actuelle   </span><span style=' width: 50%; float: right; '>{$dossiers->getSituationActuelle()}</span></div>
                    <div><span style=' width: 50%; font-weight: bold '>Decision  </span><span style=' width: 50%; float: right; '>{$dossiers->getDecisionDeDirection()}</span></div>
                   
               </div>
            </div>
            ";


            echo $row;


    }
    
    // If it is one Object of Dossier

    



}

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

                                if ($action === "ajouter") {

                                    require_once 'formulaire-dossier.php';

                                } else if ($action === "consulter") {
                                    // Cas : tous les dossiers
                                    if (!isset($_GET['did'])) {
                                        require_once 'table-dossiers.php';
                                    } else { // dossier avec did
                                        require_once 'single-dossier.php';
                                    }


                                } else if ($action === "modifier") {
                                    require_once 'modifier-dossier.php';
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