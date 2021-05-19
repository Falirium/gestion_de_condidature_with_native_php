<?php 
     // connexion db
     require '../classes/dbConnexion.php';

     class DossierDaoFactory {

          public static $mysqlDao = "mysql";

          public static function getDossierDaoFactory($typeDao) {
               if ($typeDao === "mysql") {
                    return DossierDaoFactory.getDossierDaoMysql();
               }
          }

          public static function getDossierDaoMysql() {
               return new DossierDaoImpl($connect);
          }
     }

     
?>