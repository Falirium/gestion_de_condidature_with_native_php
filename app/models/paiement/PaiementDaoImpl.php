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
                    VALUES (:id, :did, :montant);
                    ";
        $stmt= $this->connect->prepare($query);
        $result = $stmt->execute([
            ':id' => $paiement->getId(),
            'did' => $paiement->getDossierId(),
            ':montant' => $paiement->getMontant()
        ]);

        $queryUpdate = "UPDATE `dossier` 
                        SET archive = 0 
                        WHERE numero = :did";
        $stmtUpdate = $this->connect->prepare($queryUpdate);
        var_dump($paiement->getDossierId());
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
}


?>