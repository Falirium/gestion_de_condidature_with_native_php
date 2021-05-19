<?php 
     // connexion db
     require '../classes/dbConnexion.php';

     class UserDaoFactory {

          public static $mysqlDao = "mysql";

          public static function getUserDaoFactory($typeDao) {
               if ($typeDao === "mysql") {
                    return UserDaoFactory.getUserDaoMysql();
               }
          }

          public static function getUserDaoMysql() {
               return new UserDaoImpl($connect);
          }
     }

     
?>