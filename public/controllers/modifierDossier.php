<?php

    require __DIR__ . "/../../vendor/autoload.php";

    // Get $_POST data

    $newDossier = new \App\models\dossier\Dossier();

    $newDossier->setNumero($_POST['num']) ;
    $newDossier->setUtilisateur($_POST['prenom']) ;
    $newDossier->setSujetAutorisation($_POST['sujet']);
    $newDossier->setNumeroDecision($_POST['numero']);
    $newDossier->setDateDecision($_POST['dd']);
    $newDossier->setDateDebutAutorisation( $_POST['dda']);
    $newDossier->setDateFinAutorisation($_POST['dfa']);
    $newDossier->setSurface($_POST['surface']);
    $newDossier->setMontant($_POST['montant']);
    $newDossier->setTypeActivite($_POST['activite']);
    $newDossier->setSituationActuelle($_POST['situation']);
    $newDossier->setDecisionDeDirection($_POST['decision']);




    //var_dump($newDossier);
    $dossierDao = \App\models\dossier\DossierDaoFactory::getDossierDaoFactory("mysql");

    if($dossierDao->modifierDossier($newDossier)) {
        //echo 'bssatek';
        header("Refresh:1; url=../views/dossier.php?action=consulter&did={$newDossier->getNumero()}");
    } else {
        //echo '3awd';
        // redirect to modifier-dossier formulaire  + with alert message
        $alertMsg = "Failed to modify this folder, please retry !";
        setcookie("alert", $alertMsg, time() + 10, "../views/");

        header("Refresh:1; url=../views/dossier.php?action=modifier&did={$newDossier->getNumero()}");
    }
?>