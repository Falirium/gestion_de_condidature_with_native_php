<?php

    require __DIR__ . "/../../vendor/autoload.php";

    // select dossier by id

    if (isset($_GET['did'])) {



        $dossierdao = \App\models\dossier\DossierDaoFactory::getDossierDaoFactory("mysql");

        $dossier = $dossierdao->selectionnerDossier($_GET['did']);

        if ($dossierdao->archiverDossier($dossier)) {
            // Archive is successful
            header("Location: ../views/dossier.php?action=consulter");

        } else {
            // redirect to single dossier page  + with alert message
            //echo "Failed";
            $alertMsg = "Failed to archive, please retry !";
            setcookie("alert", $alertMsg, time() + 10, "../views/");

            header("Refresh:1; url=../views/dossier.php?action=consulter&did={$dossier->getNumero()}");
        }


    } else {
        // redirect to table-dossiers.php  + with alert message
        $alertMsg = "Server problem, please retry !";
        setcookie("alert", $alertMsg, time() + 10, "../views/");

        header("Refresh:1; url=../views/dossier.php?action=consulter");
    }

?>