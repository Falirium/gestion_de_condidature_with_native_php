<?php 

     class UserDaoImpl implements UserDao {
          
          private $connect = null;

          function __construct ($connect) {
               $this->$connect = $connect;
          }

          public function verifierConnexion($e_cin, $e_key) {

               $query = "SELECT * FROM 'admin_contact' WHERE e_cin = :cin";

               $stmt = $connect->prepare($query);
               $result = $connect->execute([
                    ':cin'=> $e_cin
               ]);

               if($stmt->rowCount() == 1) {
                    $user = $stmt->fetch(PDO::FETCH_ASSOC);

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