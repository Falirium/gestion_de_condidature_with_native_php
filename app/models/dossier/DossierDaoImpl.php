<?php 

     
     namespace App\models\dossier ;
     
     class DossierDaoImpl implements DossierDao{

          private $connect = null;

          function __construct ($connect) {
               $this->connect = $connect;
          }

          public function ajouterDossier($dossier) {

               /*$query = "INSERT INTO `dossier` (`رقم`, `المستغل`, `موضوع الرخصة`, `رقم القرار`, `تاريخ القرار`, `تاريخ بداية الرخصة`, `تاريخ إنتهاء الرخصة`, `المساحة`, `مبلغ الإتاوة السنوية`, `نوعية النشاط`, `الوضعية الحالية`, `الإجراءات المتخذة من طرف هذه المديرية`)
                            VALUES  (\`:num\`, \`:util\`, \`:sa\`, \`:nd\`, \`:dd\`, \`:dda\`, \`:dfa\`, \`:surface\`, \`:montant\`, \`:ta\`, \`:sa\`, \`:ddd\`)
                         ";*/
              $query = "INSERT INTO `dossier` VALUES ('{$dossier->getNumero()}', '{$dossier->getUtilisateur()}', '{$dossier->getSujetAutorisation()}', '{$dossier->getNumeroDecision()}', '{$dossier->getDateDecision()}', '{$dossier->getDateDebutAutorisation()}','{$dossier->getDateFinAutorisation()}', '{$dossier->getSurface()}', '{$dossier->getMontant()}','{$dossier->getTypeActivite()}','{$dossier->getSituationActuelle()}', '{$dossier->getDecisionDeDirection()}') ";
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



     }

?>