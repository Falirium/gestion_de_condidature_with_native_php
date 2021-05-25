<?php 

    namespace App\classes;

    //Define some constants
	define('DB_HOST',"localhost");
	define('DB_NAME',"data_dossier");
	define('DB_USER',"root");
	define('DB_PWD',"");
	//define('DB_PORT', 3308);

	class Connexion {


        public static function getConnexion()  {
            try {
                // Define DSN Data Source Name
                $dsn = 'mysql:host='.DB_HOST.';dbname='.DB_NAME;
                return $connect = new \PDO($dsn,DB_USER,DB_PWD);
            } catch (\PDOException $e ) {
                echo "Failed to connect to the database : ".$e->getMessage();
            }
        }

    }



?>