<?php

namespace App\models\paiement;

interface PaiementDao {
    public function ajouterPaiement($paiment);
    public function selectionnerDossierParPaiment($pid);
    public function selectionnerPaiement($pid);
    public function afficherTousPaiements();
    public function AfficherPaiementsParDossier($did);
    public function modifierPaiement($paiement);
}

?>