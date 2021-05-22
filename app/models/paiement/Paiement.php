<?php

namespace App\models\paiement;

class Paiement {

    private $id ;
    private $dossier_id;
    private $montant;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getDossierId()
    {
        return $this->dossier_id;
    }

    /**
     * @param mixed $dossier_id
     */
    public function setDossierId($dossier_id)
    {
        $this->dossier_id = $dossier_id;
    }

    /**
     * @return mixed
     */
    public function getMontant()
    {
        return $this->montant;
    }

    /**
     * @param mixed $montant
     */
    public function setMontant($montant)
    {
        $this->montant = $montant;
    }

}


?>