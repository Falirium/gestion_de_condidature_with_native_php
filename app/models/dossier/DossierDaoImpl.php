<?php 

     
     namespace App\models\dossier ;
     
     class DossierDaoImpl implements DossierDao{

          private $connect = null;

          function __construct ($connect) {
               $this->connect = $connect;
          }

          public function ajouterDossier($dossier) {

               $query = "INSERT INTO `dossier`
                            VALUES  (\`:num\`, \`:util\`, \`:sa\`, \`:nd\`, \`:dd\`, \`:dda\`, \`:dfa\`, \`:surface\`, \`:montant\`, \`:ta\`, \`:sa\`, \`:ddd\`)
                         ";
              //$query = "INSERT INTO `dossier` VALUES ('{$dossier->getNumero()}', '{$dossier->getUtilisateur()}', '{$dossier->getSujetAutorisation()}', '{$dossier->getNumeroDecision()}', '{$dossier->getDateDecision()}', '{$dossier->getDateDebutAutorisation()}','{$dossier->getDateFinAutorisation()}', '{$dossier->getSurface()}', '{$dossier->getMontant()}','{$dossier->getTypeActivite()}','{$dossier->getSituationActuelle()}', '{$dossier->getDecisionDeDirection()}') ";
              //$query = "SELECT * FROM `dossier`";
              $result = $this->connect->exec($query);
              /*
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
                    ':ddd' => $dossier->getDecisionDeDirection()
               ]);*/
               var_dump($dossier->getTypeActivite() , $query);
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
                  return $result->fetchObject("\App\Models\Dossier");
              }
          }

          public function archiverDossier($dossier)
          {
              // TODO: Implement archiverDossier() method.
              $query = "UPDATE `archive` FROM`dossier` WHERE numero = :id";
              $stmt = $this->connect->prepare($query);
              $result = $stmt->execute([
                  ":id" => $dossier->getNumero()
              ]);
              if ($result) {
                  return true;
              } else {
                  return false;
              }
          }
         public function afficherTousDossier()
         {
             $query = "select * from  `dossier` ";
             $stmt = $this->connect->prepare($query);
             $result = $stmt->execute();



             if ($result) {

                  return $dossiers = $stmt->fetchAll(\PDO::FETCH_CLASS, "App\models\dossier\Dossier");

             } else {
                 // Show database errors
                 return null;
             }
         }


     }

?>