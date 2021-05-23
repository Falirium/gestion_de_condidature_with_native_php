<?php 

     
     namespace App\models\dossier ;
     
     class DossierDaoImpl implements DossierDao{

          private $connect = null;

          function __construct ($connect) {
               $this->connect = $connect;
          }

          public function ajouterDossier($dossier) {

              $query = "INSERT INTO `dossier`
                            VALUES  (:num, :util, :sa, :nd, :dd, :dda, :dfa, :surface, :montant, :ta, :sa, :ddd, :archive)
                         ";
              //$query = "INSERT INTO `dossier` VALUES ('{$dossier->getNumero()}', '{$dossier->getUtilisateur()}', '{$dossier->getSujetAutorisation()}', '{$dossier->getNumeroDecision()}', '{$dossier->getDateDecision()}', '{$dossier->getDateDebutAutorisation()}','{$dossier->getDateFinAutorisation()}', '{$dossier->getSurface()}', '{$dossier->getMontant()}','{$dossier->getTypeActivite()}','{$dossier->getSituationActuelle()}', '{$dossier->getDecisionDeDirection()}') ";
              //$query = "SELECT * FROM `dossier`";
              //$result = $this->connect->exec($query);
              
               $stmt = $this->connect->prepare($query);
               $result = $stmt->execute([
                    ':num' => $dossier->getNumero(),
                    ':util' => $dossier->getUtilisateur(),
                    ':sa' => $dossier->getSujetAutorisation(),
                    ':nd' => $dossier->getNumeroDecision(),
                    ':dd' => $dossier->getDateDecision(),
                    ':dda' => $dossier->getDateDebutAutorisation() ,
                    ':dfa' => $dossier->getDateFinAutorisation(),
                    ':surface' => $dossier->getSurface(),
                    ':montant' => $dossier->getMontant(),
                    ':ta' => $dossier->getTypeActivite(),
                    ':sa' => $dossier->getSituationActuelle(),
                    ':ddd' => $dossier->getDecisionDeDirection(),
                   ':archive' => 1
               ]);
              var_dump($result);
               if ($result)
                   return true;
               else return false;
                    
          }

          public function modifierDossier($dossier) {
              $query = "UPDATE `dossier` 
                        SET `utilisateur` = :util, `sujetAutorisation` = :sa, `numeroDecision` = :nd, `dateDecision` = :dd, `dateDebutAutorisation` = :dda, `dateFinAutorisation` = ':dfa', `surface` = :surface, `montant` = :montant, `typeActivite` = :ta, `situationActuelle` = :sa, `decisionDeDirection` = :ddd
                        WHERE numero = :id";

             $stmt = $this->connect->prepare($query);
             $result = $stmt->execute([

                 ':util' => $dossier->getUtilisateur(),
                 ':sa' => $dossier->getSujetAutorisation(),
                 ':nd' => $dossier->getNumeroDecision(),
                 ':dd' => $dossier->getDateDecision(),
                 ':dda' => $dossier->getDateDebutAutorisation() ,
                 ':dfa' => $dossier->getDateFinAutorisation(),
                 ':surface' => $dossier->getSurface(),
                 ':montant' => $dossier->getMontant(),
                 ':ta' => $dossier->getTypeActivite(),
                 ':sa' => $dossier->getSituationActuelle(),
                 ':ddd' => $dossier->getDecisionDeDirection(),
                 ':id' =>$dossier->getNumero()
             ]);
              var_dump($result);
              if ($result)
                  return true;
              else return false;
         }

          public  function selectionnerDossier($did)
          {
              // TODO: Implement selectionnerDossier() method.
              $query = "SELECT * FROM `dossier` WHERE `numero` = :id";
              $stmt = $this->connect->prepare($query);
              $result = $stmt->execute([
                  ':id' => $did
              ]);
              if ($result) {
                  return $stmt->fetchObject("App\models\dossier\Dossier");
                  //var_dump($result->fetchObject("\App\Models\Dossier"));
              }
          }

          public function archiverDossier($dossier)
          {
              // TODO: Implement archiverDossier() method.
              $query = "UPDATE `dossier` SET `archive` = 1 WHERE numero = :id";
              $stmt = $this->connect->prepare($query);
              $result = $stmt->execute([
                  ":id" => $dossier->getNumero()
              ]);
              //var_dump($result);
              if ($result) {
                  return true;
              } else {
                  return false;
              }
          }
         public function afficherTousDossier($archiveValue)
         {
             $isArchive = $archiveValue;
             $query = "SELECT * FROM  `dossier` WHERE archive = :b";
             $stmt = $this->connect->prepare($query);
             $result = $stmt->execute([
                 ':b' => $isArchive
             ]);



             if ($result) {

                  return $dossiers = $stmt->fetchAll(\PDO::FETCH_CLASS, "App\models\dossier\Dossier");
                  //var_dump($dossiers = $stmt->fetchAll(\PDO::FETCH_CLASS, "App\models\dossier\Dossier"));

             } else {
                 // Show database errors
                 return null;
             }
         }

         public function est_Paye($dossier)
         {
             // TODO: Implement est_Paye() method.
             $query = "SELECT * FROM `paiement` WHERE dossier_id = :did";
             $stmt = $this->connect->prepare($query);
             $result = $stmt->execute([
                 ':did' => $dossier->getNumero()
             ]);

             if ($dossier->getArchive() === 1) {
                 return false;
             } else {
                 return true;
             }
         }


     }

?>