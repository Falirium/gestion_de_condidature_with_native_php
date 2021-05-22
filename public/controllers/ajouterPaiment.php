<?php

require __DIR__ . "/../../vendor/autoload.php";

// Get $_POST data

$newPaiement = new \App\models\paiement\Paiement();

$faker = \Faker\Factory::create();

$newPaiement->setId($faker->randomDigit());
$newPaiement->setDossierId($_POST['num']) ;
$newPaiement->setMontant($_POST['montant']);





$paiementDao = \App\models\paiement\PaiementDaoFactory::getDossierDaoFactory("mysql");

if($paiementDao->ajouterPaiement($newPaiement)) {
    echo 'bssatek';
} else {
    echo '3awd';
}
?>