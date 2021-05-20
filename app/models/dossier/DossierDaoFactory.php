<?php 
     namespace App\models\dossier ;

     // connexion db
     use App\classes\Connexion;

     require '../classes/Connexion.php';

     class DossierDaoFactory {

          public static $mysqlDao = "mysql";

          public static function getDossierDaoFactory($typeDao) {
               if ($typeDao === "mysql") {
                    return DossierDaoFactory::getDossierDaoMysql();
               }
          }

          public static function getDossierDaoMysql() {
              $connect = Connexion::getConnexion();
              return new DossierDaoImpl($connect);
          }
     }

     
?>