<?php

namespace  App\models\paiement;

class PaiementDaoImpl implements PaiementDao {

    private $connect = null;

    function __construct ($connect) {
        $this->connect = $connect;
    }

    public function ajouterPaiement($paiement)
    {
        // TODO: Implement ajouterPaiement() method.
        $query = "INSERT INTO `paiement`
                    VALUES (:id, :did, :beneficiaire, :redevance,:montant, :nbv,:dbv,:dp,:bg,:fs,:dor,:obs);
                    ";
        $stmt= $this->connect->prepare($query);
        $result = $stmt->execute([
            ':id' => $paiement->getId(),
            ':did' => $paiement->getDossierId(),
            ':beneficiaire' =>$paiement->getBeneficiaire(),
            ':redevance' =>$paiement->getRedevance(),
            ':montant' => $paiement->getMontant(),
            ':nbv'=>$paiement->getNBV(),
            ':dbv'=>$paiement->getDateBV(),
            ':dp'=>$paiement->getDateDePaiement(),
            ':bg'=>$paiement->getBg(),
            ':fs'=>$paiement->getFs(),
            ':dor'=>$paiement->getDateDeOR(),
            ':obs'=>$paiement->getObservation()

        ]);

        $queryUpdate = "UPDATE `dossier` 
                        SET archive = 0 
                        WHERE numero = :did";
        $stmtUpdate = $this->connect->prepare($queryUpdate);
        //var_dump($paiement->getDossierNumero());
        $resultUpdate = $stmtUpdate->execute([
           ':did' => $paiement->getDossierId()
        ]);

        if ($result && $resultUpdate) {
            return true;
        } else {
            return false;
        }
    }

    public function selectionnerDossierParPaiment($pid)
    {
        // TODO: Implement selectionnerDossierParPaiment() method.
        $query = "SELECT * FROM `dossier` WHERE numero = (SELECT dossier_id FROM `paiement` WHERE id = :pid)";
        $stmt= $this->connect->prepare($query);
        $result = $stmt->execute([
            ':pid' => $pid
        ]);
        if ($result) {
            return $stmt->fetchObject("App\models\dossier\Dossier");
        } else {
            return null;
        }
    }

    public function selectionnerPaiement($pid)
    {
        // TODO: Implement selectionnerPaiement() method.
        $query = "SELECT * FROM `paiement` WHERE id = :id";
        $stmt= $this->connect->prepare($query);
        $result = $stmt->execute([
            ':id' => $pid
        ]);
        if ($result) {
            return $stmt->fetchObject("App\models\paiement\Paiement");
        } else {
            return null;
        }
    }
    public function modifierPaiement($paiement) {
        $query = "UPDATE `paiement` 
                        SET id = :id , beneficiaire = :beneficiaire, redevance = :redevance, montant = :montant, nBV = :nbv, date_BV = :dbv, date_de_paiement = :dp, bg = :bg, fs = :fs, date_de_OR = :dor, observation = :obs
                        WHERE dossier_id = :did";

        $stmt = $this->connect->prepare($query);
        $result = $stmt->execute([
            ':id' => $paiement->getId(),
            ':beneficiaire' => $paiement->getBeneficiaire(),
            ':redevance' => $paiement->getRedevance(),
            ':montant' => $paiement->getMontant(),
            ':nbv' => $paiement->getNBV(),
            ':dbv' => $paiement->getDateBV() ,
            ':dp' => $paiement->getDateDePaiement(),
            ':bg' => $paiement->getBg(),
            ':fs' => $paiement->getFs(),
            ':dor' => $paiement->getDateDeOR(),
            ':obs' => $paiement->getObservation(),

            ':did' =>$paiement->getDossierId()
        ]);
        var_dump($query,$result);
        if ($result)
            return true;
        else return false;
    }

    public function afficherTousPaiements()
    {
        // TODO: Implement afficherTousPaiements() method.
        $query = "SELECT * FROM `paiement`";
        $stmt= $this->connect->prepare($query);
        $result = $stmt->execute();
        if ($result) {
            return $stmt->fetchAll(\PDO::FETCH_CLASS,"App\models\paiement\Paiement");
        } else {
            return null;
        }
    }

    public function AfficherPaiementsParDossier($did)
    {
        // TODO: Implement AfficherPaiementsParDossier() method.
        $query = "SELECT * FROM `paiement` WHERE dossier_id = :did";
        $stmt= $this->connect->prepare($query);
        $result = $stmt->execute([
            ':did' => $did
        ]);
        if ($result) {
            return $stmt->fetchAll(\PDO::FETCH_CLASS,"App\models\paiement\Paiement");
        } else {
            return null;
        }
    }

    public function checkPid($pid) {
        $query = "SELECT * FROM `paiement` WHERE id = :pid";
        $stmt= $this->connect->prepare($query);
        $result = $stmt->execute([
            ':pid' => $pid
        ]);

        if ($result) {
            return $stmt->fetchObject("App\models\paiement\Paiement");
        } else {
            return null;
        }
    }
}


?>