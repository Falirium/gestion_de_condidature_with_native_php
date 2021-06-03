<?php 
     namespace App\models\dossier ;
     
     interface DossierDao  {

          public function ajouterDossier($dossier);
          public function selectionnerDossier($did);
          //public function modifierDossier($dossier);
          public function archiverDossier($dossier);
          public function afficherTousDossier($archiveValue);

          public function est_Paye($dossier);
          public function nombreDossiers();
          public function nombreDossiersArchives();
          public function nombreDossiersActives();
          public function montantTotal();

     }

     
?>