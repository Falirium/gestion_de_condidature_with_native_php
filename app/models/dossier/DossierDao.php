<?php 
     namespace App\models\dossier ;
     
     interface DossierDao  {

          public function ajouterDossier($dossier);
          public function selectionnerDossier($did);
          //public function modifierDossier($dossier);
          public function archiverDossier($dossier);
          public function afficherTousDossier();

     }

     
?>