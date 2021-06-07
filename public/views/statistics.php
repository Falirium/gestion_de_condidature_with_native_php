<?php
require __DIR__ . "/../../vendor/autoload.php";

$dossierDoa = \App\models\dossier\DossierDaoFactory::getDossierDaoFactory("mysql");

$nbrDossiers = $dossierDoa->nombreDossiers();
$nbrDossiersArchives = $dossierDoa->nombreDossiersArchives();
$nbrDossiersActives = $dossierDoa->nombreDossiersActives();
$montantTotal = $dossierDoa->montantTotal()['sum'];

?>


<div class="row h-100">
     <div class="col h-100 d-flex flex-column border-right">
          <div class="display-5 ml-3">Nombre de dossier</div>
          
          <p class="stat-numbers mt-2 mb-0 text-center"><?php echo $nbrDossiers; ?></p>
          
     </div>
     <div class="col h-100 d-flex flex-column border-right">
          <div class="display-5 ml-3">Montant total</div>
          <p class="stat-numbers mt-2 mb-0 text-center"><?php echo $montantTotal." DH"; ?></p>
     </div>
     <div class="col h-100 d-flex flex-column border-right">
          <div class="display-5 ml-3">Dossier archivé</div>
          <p class="stat-numbers mt-2 mb-0 text-center"><?php echo $nbrDossiersArchives; ?></p>
     </div>
     <div class="col h-100 d-flex flex-column">
          <div class="display-5 ml-3">Dossier activé</div>
          <p class="stat-numbers mt-2 mb-0 text-center"><?php echo $nbrDossiersActives; ?></p>
     </div>
</div>