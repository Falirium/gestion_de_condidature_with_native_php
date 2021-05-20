<?php

    require __DIR__ . "/../../vendor/autoload.php";

    // Get $_POST data

    $utilisateur = $_POST['prenom'];
    $sujetAutorisation = $_POST['sujet'];
    $numeroDecision = $_POST['numero'];
    $dateDecision = $_POST['dd'];
    $dateDebutAutorisation = $_POST['dda'];
    $dateFinAutorisation = $_POST['dfa'];
    $surface = $_POST['surface'];
    $montant = $_POST['montant'];
    $typeActivite = $_POST['activite'];
    $situationActuelle = $_POST['situation'];
    $decisionDeDirection = $_POST['decision'];

    $newDossier = new \App\models\dossier\Dossier($utilisateur, $sujetAutorisation, $numeroDecision, $dateDecision, $dateDebutAutorisation, $dateFinAutorisation, $surface, $montant, $typeActivite, $situationActuelle, $decisionDeDirection);

    var_dump($newDossier);
    $dossierDao = \App\models\dossier\DossierDaoFactory::getDossierDaoFactory("mysql");

    if($dossierDao->ajouterDossier($newDossier)) {
        echo 'bssatek';
    } else {
        echo '3awd';
    }
?>