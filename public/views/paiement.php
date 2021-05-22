<?php
require __DIR__ . "/../../vendor/autoload.php";

session_start();
//Check if a $_SESSION[admin] is set
// else redirect to connxion page

if (!isset($_SESSION['user_id'])) {
    header("Refresh:1; url=../");
}

$paiementDao = \App\models\paiement\PaiementDaoFactory::getDossierDaoFactory("mysql");

function afficher($paiements) {
    global $paiementDao;

    echo '<table style="border: 1px solid black; border-collapse: collapse; width: 100%">';
    echo "<tr><td style=\"border: 1px solid black; border-collapse: collapse;\">numero de paiement</td>"
        ."<td style=\"border: 1px solid black; border-collapse: collapse;\">numero de dossier</td>"
        ."<td style=\"border: 1px solid black; border-collapse: collapse;\">utilisateur</td>"
        ."<td style=\"border: 1px solid black; border-collapse: collapse;\">sujet autorisation</td>"
        ."<td style=\"border: 1px solid black; border-collapse: collapse;\">montant</td></tr>";
    if (gettype($paiements) === "object") {
        // Get dossier associé à la fiche de paiment


        $dossier = $paiementDao->selectionnerDossierParPaiment($paiements->getId());
        $row = "<tr><td style=\"border: 1px solid black; border-collapse: collapse;\">".$paiements->getId()."</td>"
            ."<td style=\"border: 1px solid black; border-collapse: collapse;\">".$dossier->getNumero()."</td>"
            ."<td style=\"border: 1px solid black; border-collapse: collapse;\">".$dossier->getUtilisateur()."</td>"
            ."<td style=\"border: 1px solid black; border-collapse: collapse;\">".$dossier->getSujetAutorisation()."</td>"
            ."<td style=\"border: 1px solid black; border-collapse: collapse;\">".$dossier->getMontant()."</td>"
            ."<td style=\"border: 1px solid black; border-collapse: collapse;\"> <button><a href='dossier.php?did={$dossier->getNumero()}'>Consulter le dossier</a></button></td></tr>";

        echo $row;
    } elseif (gettype($paiements) === "array") {
        foreach ($paiements as $paiement) {

            $dossier = $paiementDao->selectionnerDossierParPaiment($paiement->getId());

            $row = "<tr><td style=\"border: 1px solid black; border-collapse: collapse;\">".$paiement->getId()."</td>"
                ."<td style=\"border: 1px solid black; border-collapse: collapse;\">".$dossier->getNumero()."</td>"
                ."<td style=\"border: 1px solid black; border-collapse: collapse;\">".$dossier->getUtilisateur()."</td>"
                ."<td style=\"border: 1px solid black; border-collapse: collapse;\">".$dossier->getSujetAutorisation()."</td>"
                ."<td style=\"border: 1px solid black; border-collapse: collapse;\">".$dossier->getMontant()."</td>"
                ."<td style=\"border: 1px solid black; border-collapse: collapse;\"> <button><a href='?pid={$paiement->getId()}'>Consulter</a></button></td></tr>";

            echo $row;
        }
    }

    echo "</table>";
}

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Nouveau dossier </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="icon" type="image/ico" href="../css/img/logo.ico"/>
</head>
<body>
<?php require_once "../header.php"?>
<section>
    <nav>
        <!--Empty-->
    </nav>

    <article>
        <h1 align = "center">Paiements!</h1>
        <div class = "cand_info" align = "center">Merci de founir des informations exactes, dans le cas ou vous remarquez un problème prière de contacter l'administrateur <a href = "mailto: admin@webmaster.com" >admin@webmaster.com</a></div>
        <div>

        </div>
        <div id = "select_form">
            <?php
            if (isset($_GET['did'])) {
                $did = $_GET['did'];
                if (isset($_GET['action'])) {
                    //Formulaire de paiement pour un dossier
                    if ($_GET['action'] === "payer") {
                        // Formulaire de paiment de dossier
                        require_once "formulaire_paiement.php";
                    }
                } else {
                    // Les fiches de paie pour ce dossier
                    $paiements = $paiementDao->afficherPaiementsParDossier($did);

                    afficher($paiements);
                }

            } elseif(isset($_GET['pid'])) {
                //Show single informations about single Paiment
                $pid = $_GET['pid'];
                $paiment = $paiementDao->selectionnerPaiement($pid);

                afficher($paiment);

            } else {
                //Show all paiement objects

                $paiements = $paiementDao->afficherTousPaiements();

                afficher($paiements);

            }



            ?>

        </div>








        <p>Retour vers la page precedente : <a href = "paiement.php"> ici </a></p>
    </article>
    <aside>
        <!--Empty-->
    </aside>
</section>
<footer>
    <p>Direction-plateforme Version 1.1 © <br />2021</p>
</footer>
</body>
</html>
