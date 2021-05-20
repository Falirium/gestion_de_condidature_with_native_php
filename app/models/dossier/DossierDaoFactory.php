<?php 
     namespace App\models\dossier ;

     // connexion db
     use App\classes\Connexion;



     class DossierDaoFactory {

          public static $mysqlDao = "mysql";

          public static function getDossierDaoFactory($typeDao) {
               if ($typeDao === "mysql") {
                    return DossierDaoFactory::getDossierDaoMysql();
               }
          }

          private static function getDossierDaoMysql() {
              $connect = Connexion::getConnexion();
              return new DossierDaoImpl($connect);
          }
     }

     
?>