<?php

    require __DIR__ . "/../../vendor/autoload.php";

    // select dossier by id

    if (isset($_GET['did'])) {



        $dossierdao = \App\models\dossier\DossierDaoFactory::getDossierDaoFactory("mysql");

        $dossier = $dossierdao->selectionnerDossier($_GET['did']);

        if ($dossierdao->archiverDossier($dossier)) {
            // Archive is successful
        } else {
            // Renvoie un erreur
        }

    } else {
        // Renvoie un error
    }

?>