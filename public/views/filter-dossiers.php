<?php
require __DIR__ . "/../../vendor/autoload.php";
$dossierDoa = \App\models\dossier\DossierDaoFactory::getDossierDaoFactory("mysql");

if (isset($_GET['dossierType']) && isset($_GET['query'])) {
    $dossierType = $_GET['dossierType'];
    $query = $_GET['query'];

    $dossierExp = null;
    $queryExp = null;

    if ($dossierType == "true" && $query == "true") {
        $dossierExp = "TRUE";
        $queryExp = "TRUE";
    } else if ($dossierType == "true") {
        $dossierExp = "TRUE";
        $queryExp = 'utilisateur LIKE "'.$query.'%"';
    } else if ($query == "true") {
        $dossierExp = "archive = " . $dossierType;
        $queryExp = 'utilisateur LIKE "%"';
    } else {
        $dossierExp = "archive = " . $dossierType;
        $queryExp = 'utilisateur LIKE "'.$query.'%"';
    }


} else {
    // redirect to liste ds dossiers
}

$dossiers = $dossierDoa->afficherDossiers($dossierExp, $queryExp);


?>



<table class="table table-striped ">
    <thead>
    <tr>
        <th scope="col" >Num</th>
        <th scope="col" >Utilisateur</th>
        <th scope="col" >Sujet</th>
        <th scope="col" >Fin d'autorisation</th>
        <th scope="col" >Montant</th>
        <th scope="col" >Etat</th>
        <th scope="col" ></th>
    </tr>
    </thead>
    <tbody>

    <?php

    foreach ($dossiers as $dossier) {

        $row = "<tr><td>" . $dossier->getNumero() . "</td>"
            . "<td>" . $dossier->getUtilisateur() . "</td>"
            . "<td>" . $dossier->getSujetAutorisation() . "</td>"
            . "<td>" . $dossier->getDateFinAutorisation() . "</td>"
            . "<td>" . $dossier->getMontant() . "</td>";

        if ($dossier->getArchive() == 0) {
            $archive = '<td class="p-2"><span class="badge badge-success p-2 d-inline-block m-0  text-center">active</span></td>';
            $row = $row . $archive;
        } else if ($dossier->getArchive() == 1) {
            $archive = '<td class="p-2"><span class="badge badge-danger p-2 d-inline-block m-0  text-center">archivé</span></td>';
            $row = $row . $archive;
        } else if ($dossier->getArchive() == 2) {
            $archive = '<td class="p-2"><span class="badge badge-warning p-2 d-inline-block m-0  text-center">en cours</span></td>';
            $row = $row . $archive;
        }

        $row = $row.'<td class="p-2 pr-4 text-center"><a href="dossier.php?action=consulter&did='.$dossier->getNumero().'" class="w-100 table-btn btn btn-success btn-sm text-white" role="button">Consulter</a></td>';

        echo $row;
    }


    ?>


    </tbody>
</table>