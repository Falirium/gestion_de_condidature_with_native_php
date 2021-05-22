<?php

namespace App\models\paiement;

// connexion db
use App\classes\Connexion;
use App\models\paiement\PaiementDaoImpl;


class PaiementDaoFactory {

    private static $mysqlDao = "mysql";

    public static function getDossierDaoFactory($typeDao) {
        if ($typeDao === "mysql") {
            return PaiementDaoFactory::getPaimentDaoMysql();
        }
    }

    private static function getPaimentDaoMysql() {
        $connect = Connexion::getConnexion();
        return new PaiementDaoImpl($connect);
    }
}



?>