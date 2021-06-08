<?php
require __DIR__ . "/../../vendor/autoload.php";

// Get $_POST data

$newPaiement = new \App\models\paiement\Paiement();

$newPaiement->setId($_POST['pid']) ;
$newPaiement->setDossierId($_POST['did']) ;
$newPaiement->setBeneficiaire($_POST['beneficiaire']);
$newPaiement->setRedevance($_POST['redevance']);
$newPaiement->setMontant($_POST['montant']);
$newPaiement->setNBV( $_POST['nbv']);
$newPaiement->setDateBV($_POST['dbv']);
$newPaiement->setDateDePaiement($_POST['dp']);
$newPaiement->setBg($_POST['bg']);
$newPaiement->setFs($_POST['fs']);
$newPaiement->setDateDeOR($_POST['dor']);
$newPaiement->setObservation($_POST['obs']);

var_dump($newPaiement);



//var_dump($newPaiement);
$paiementDao = \App\models\paiement\PaiementDaoFactory::getDossierDaoFactory("mysql");

if($paiementDao->modifierPaiement($newPaiement)) {
    //echo 'bssatek';
    //header("Refresh:1; url=../views/paiement.php?action=consulter&pid={$newPaiement->getId()}");
} else {
    echo '3awd';
    //redirect to single paiement page
}
?>