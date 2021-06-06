<?php

require __DIR__ . "/../../vendor/autoload.php";

// Get $_POST data

$newPaiement = new \App\models\paiement\Paiement();

//$faker = \Faker\Factory::create();

$newPaiement->setId($_POST['id']);
$newPaiement->setDossierId($_POST['num']) ;
$newPaiement->setBeneficiaire($_POST['beneficiaire']);
$newPaiement->setRedevance($_POST['redevance']);
$newPaiement->setMontant($_POST['montant']);
$newPaiement->setNBV($_POST['nbv']);
$newPaiement->setDateBV($_POST['dbv']);
$newPaiement->setDateDePaiement($_POST['dp']);
$newPaiement->setBg($_POST['bg']);
$newPaiement->setFs($_POST['fs']);
$newPaiement->setDateDeOR($_POST['dor']);
$newPaiement->setObservation($_POST['obs']);





$paiementDao = \App\models\paiement\PaiementDaoFactory::getDossierDaoFactory("mysql");

if($paiementDao->ajouterPaiement($newPaiement)) {
    echo 'bssatek';
    header("Refresh:1; url=../views/dossier.php?action=consulter");
} else {
    echo '3awd';
    // redirect to single dossier page
}
?>