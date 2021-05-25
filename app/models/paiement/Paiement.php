<?php

namespace App\models\paiement;

class Paiement
{

    private $id;
    private $dossier_id;
    private $beneficiaire;
    private $redevance;
    private $montant;
    private $nBV;
    private $date_BV;
    private $date_de_paiement;
    private $bg;
    private $fs;
    private $date_de_OR;
    private $observation;

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
    public function getBeneficiaire()
    {
        return $this->beneficiaire;
    }

    /**
     * @param mixed $beneficiaire
     */
    public function setBeneficiaire($beneficiaire)
    {
        $this->beneficiaire = $beneficiaire;
    }

    /**
     * @return mixed
     */
    public function getRedevance()
    {
        return $this->redevance;
    }

    /**
     * @param mixed $redevance
     */
    public function setRedevance($redevance)
    {
        $this->redevance = $redevance;
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

    /**
     * @return mixed
     */
    public function getNBV()
    {
        return $this->nBV;
    }

    /**
     * @param mixed $nBV
     */
    public function setNBV($nBV)
    {
        $this->nBV = $nBV;
    }

    /**
     * @return mixed
     */
    public function getDateBV()
    {
        return $this->date_BV;
    }

    /**
     * @param mixed $date_BV
     */
    public function setDateBV($date_BV)
    {
        $this->date_BV = $date_BV;
    }

    /**
     * @return mixed
     */
    public function getDateDePaiement()
    {
        return $this->date_de_paiement;
    }

    /**
     * @param mixed $date_de_paiement
     */
    public function setDateDePaiement($date_de_paiement)
    {
        $this->date_de_paiement = $date_de_paiement;
    }

    /**
     * @return mixed
     */
    public function getBg()
    {
        return $this->bg;
    }

    /**
     * @param mixed $bg
     */
    public function setBg($bg)
    {
        $this->bg = $bg;
    }

    /**
     * @return mixed
     */
    public function getFs()
    {
        return $this->fs;
    }

    /**
     * @param mixed $fs
     */
    public function setFs($fs)
    {
        $this->fs = $fs;
    }

    /**
     * @return mixed
     */
    public function getDateDeOR()
    {
        return $this->date_de_OR;
    }

    /**
     * @param mixed $date_de_OR
     */
    public function setDateDeOR($date_de_OR)
    {
        $this->date_de_OR = $date_de_OR;
    }



    /**
     * @return mixed
     */
    public function getObservation()
    {
        return $this->observation;
    }

    /**
     * @param mixed $observation
     */
    public function setObservation($observation)
    {
        $this->observation = $observation;
    }


}


?>