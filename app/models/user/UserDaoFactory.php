<?php 
     
     namespace App\models\user ;

     use App\classes\Connexion;

     class UserDaoFactory {

          public static $mysqlDao = "mysql";
          private $connect = null;

         function __construct ($connect) {
             $this->$connect = $connect;
         }

          public static function getUserDaoFactory($typeDao) {
               if ($typeDao === "mysql") {
                    return UserDaoFactory::getUserDaoMysql();
               }
          }

          private static function getUserDaoMysql() {
             $connect = Connexion::getConnexion();
             //var_dump($connect);
              return new UserDaoImpl($connect);
          }
     }

     
?>