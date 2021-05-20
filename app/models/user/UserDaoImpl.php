<?php 

     
     namespace App\models\user;

     class UserDaoImpl implements UserDao {
          
          private $connect = null;

          function __construct ($connect) {
               $this->connect = $connect;
          }

          public function verifierConnexion($e_cin, $e_key) {

              $this->connect->setAttribute( \PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION );

              $query = "SELECT * FROM `admin_contact` WHERE `e_cin` = :cin";
              var_dump($this->connect);
              try {
                  $stmt = $this->connect->prepare($query);
              } catch (\PDOException $e) {
                  echo "prepare is not working ".$e->getMessage();
              }


               $result =  $stmt->execute([
                    ':cin'=> $e_cin
               ]);
              var_dump($result);
               if($stmt->rowCount() == 1) {
                    $user = $stmt->fetch(\PDO::FETCH_ASSOC);
                    var_dump($user);

                    if($e_key === $user['e_key']) {
                         return true;
                    } else {
                         return false;
                    }
                      
               } else {
                    return false;
               }

          }
     }
?>