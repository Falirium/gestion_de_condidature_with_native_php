<?php

    require __DIR__ . "/../../vendor/autoload.php";

    // Get $_POST data

    $newDossier = new \App\models\dossier\Dossier();

    $newDossier->setNumero($_POST['numero']) ;
    $newDossier->setUtilisateur($_POST['prenom']) ;
    $newDossier->setSujetAutorisation($_POST['sujet']);
    $newDossier->setNumeroDecision($_POST['numeroDecision']);
    $newDossier->setDateDecision($_POST['dd']);
    $newDossier->setDateDebutAutorisation( $_POST['dda']);
    $newDossier->setDateFinAutorisation($_POST['dfa']);
    $newDossier->setSurface($_POST['surface']);
    $newDossier->setMontant($_POST['montant']);
    $newDossier->setTypeActivite($_POST['activite']);
    $newDossier->setSituationActuelle($_POST['situation']);
    $newDossier->setDecisionDeDirection($_POST['decision']);



    var_dump($newDossier);
    $dossierDao = \App\models\dossier\DossierDaoFactory::getDossierDaoFactory("mysql");

    if($dossierDao->ajouterDossier($newDossier)) {
        //echo 'bssatek';
        header("Refresh:1; url=../views/dossier.php?action=consulter&did={$newDossier->getNumero()}");
    } else {
        echo '3awd';
        // redirect to formulaire-paiement.php
    }
?>