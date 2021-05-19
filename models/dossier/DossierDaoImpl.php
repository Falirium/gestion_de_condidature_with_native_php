<?php 

     class DossierDaoImpl implements DossierDao{

          private $connect = null;

          function __construct ($connect) {
               $this->$connect = $connect;
          }

          public function ajouterDossier($dossier) {

               $query = "INSERT INTO 'dossier' 
                         VALUES (:num, :util, :sa, :nd, :dda, :dfa, :surface, :montant, :ta, :sa, :ddd)
                         ";
               $stmt = $connect->prepare($query);
               $result = $stmt->execute([
                    ':num' => $dossier->getNumero(),
                    ':util' => $dossier->getUtilisateur(),
                    ':sa' => $dossier->getSujetAutorisation(),
                    ':nd' => $dossier->getNumeroDecision(),
                    ':dda' => $dossier->getDateDebutAutorisation() ,
                    ':dfa' => $dossier->getDateFinAutorisation(),
                    ':surface' => $dossier->getSurface(),
                    ':montant' => $dossier->getMontant(),
                    ':ta' => $dossier->getTypeActivite(),
                    ':sa' => $dossier->getSituationActuelle(),
                    ':dds' => $dossier->getDecisionDeDirection(),
               ]);
               if ($result->rowCount() > 0) 
                    return true;
                    else return false; 
                    
          }



     }

?>