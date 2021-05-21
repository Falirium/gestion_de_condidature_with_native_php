<?php
session_start();
require __DIR__ . "/../../vendor/autoload.php";


$dossierDao = \App\models\dossier\DossierDaoFactory::getDossierDaoFactory("mysql");
/*
$dossiers = $dossierDao->afficherTousDossier();
var_dump($dossiers);
echo "<table>";
foreach ($dossiers as $dossier) {
    $row = "<td>".$dossier->getNumero()."</td>"
        ."<td>".$dossier->getUtilisateur()."</td>"
        ."<td>".$dossier->getSujetAutorisation()."</td>"
        ."<td>".$dossier->getNumeroDecision()."</td>"
        ."<td>".$dossier->getDateDebutAutorisation()."</td>"
        ."<td>".$dossier->getDateFinAutorisation()."</td>"
        ."<td>".$dossier->getSurface()."</td>"
        ."<td>".$dossier->getMontant()."</td>"
        ."<td>".$dossier->getTypeActivite()."</td>"
        ."<td>".$dossier->getSituationActuelle()."</td>"
        ."<td>".$dossier->getDecisionDeDirection()."</td>"
        ."<td>".$dossier->getDateDecision()."</td>"
        ."<td>".$dossier->getArchive()."</td>";
    echo "<tr>".$row."</tr>";

}
echo "</table>"*/

if($dossiers = $dossierDao->afficherTousDossier()) {
    $_SESSION['do_DossiersExist'] = $dossiers;

    //header("Location: ../views/profil.php?action=consulter");
} else {
    // Show a database errors
}

?>







