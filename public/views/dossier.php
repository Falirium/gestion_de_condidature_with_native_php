<?php

    require __DIR__ . "/../../vendor/autoload.php";

    session_start();

    if (isset($_SESSION['do_DossiersExist'])) {
        $dossiers =  $_SESSION['do_DossiersExist'];
    } else {
        header('Location: ../controllers/afficherTousDossier.php');
        echo "makaynach";
    }
?>

<table style="border: 1px solid black; border-collapse: collapse; width: 100%">
   <?php

        foreach ($dossiers as $dossier) {

            $row = "<td style=\"border: 1px solid black; border-collapse: collapse;\">".$dossier->getNumero()."</td>"
                    ."<td style=\"border: 1px solid black; border-collapse: collapse;\">".$dossier->getUtilisateur()."</td>"
                    ."<td style=\"border: 1px solid black; border-collapse: collapse;\">".$dossier->getSujetAutorisation()."</td>"
                    ."<td style=\"border: 1px solid black; border-collapse: collapse;\">".$dossier->getNumeroDecision()."</td>"
                    ."<td style=\"border: 1px solid black; border-collapse: collapse;\">".$dossier->getDateDebutAutorisation()."</td>"
                    ."<td style=\"border: 1px solid black; border-collapse: collapse;\">".$dossier->getDateFinAutorisation()."</td>"
                    ."<td style=\"border: 1px solid black; border-collapse: collapse;\">".$dossier->getSurface()."</td>"
                    ."<td style=\"border: 1px solid black; border-collapse: collapse;\">".$dossier->getMontant()."</td>"
                    ."<td style=\"border: 1px solid black; border-collapse: collapse;\">".$dossier->getTypeActivite()."</td>"
                    ."<td style=\"border: 1px solid black; border-collapse: collapse;\">".$dossier->getSituationActuelle()."</td>"
                    ."<td style=\"border: 1px solid black; border-collapse: collapse;\">".$dossier->getDecisionDeDirection()."</td>"
                    ."<td style=\"border: 1px solid black; border-collapse: collapse;\">".$dossier->getDateDecision()."</td>"
                    ."<td style=\"border: 1px solid black; border-collapse: collapse;\">".$dossier->getArchive()."</td>"
                    ."<td style=\"border: 1px solid black; border-collapse: collapse;\"> <button><a href=''>Archiver</a></button></td>"
                    ."<td style=\"border: 1px solid black; border-collapse: collapse;\"> <button><a href=''>Modifier</a></button></td>"
                    ."<td style=\"border: 1px solid black; border-collapse: collapse;\"> <button><a href=''>Consulter</a></button></td>";
            echo "<tr>";
            echo $row;
            echo "</tr>";
        }
   ?>


    </tr>
</table>