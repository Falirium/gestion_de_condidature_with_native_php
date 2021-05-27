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


    if (gettype($paiements) === "object") {
        // Get dossier associé à la fiche de paiment
        $dossier = $paiementDao->selectionnerDossierParPaiment($paiements->getId());



            $row = "<div style='width: 100%; margin: 20px auto;'>
               <div style='float: left; width: 50%'>
                    <div><span style=' width: 50%; font-weight: bold '>N° de dossier : </span><span style=' width: 50%; float: right; '>{$paiements->getDossierId()}</span></div>
                        <div><span style=' width: 50%; font-weight: bold '>Beneficiaire :  </span><span style=' width: 50%; float: right; '>{$dossier->getUtilisateur()}</span></div>
                    <div><span style=' width: 50%; font-weight: bold '> Redevance : </span><span style=' width: 50%; float: right; '>{$paiements->getRedevance()}</span></div>
                    <div><span style=' width: 50%; font-weight: bold '>N° BV : </span><span style=' width: 50%; float: right; '>{$paiements->getNBV()}</span></div>
                    <div><span style=' width: 50%; font-weight: bold '>Date BV : </span><span style=' width: 50%; float: right; '>{$paiements->getDateBV()}</span></div>
               </div>
               <div style='float: right; width: 50%'>
                    <div><span style=' width: 50%; font-weight: bold '>Date de paiement :  </span><span style=' width: 50%; float: right; '>{$paiements->getDateDePaiement()}</span></div>
                    <div><span style=' width: 50%; font-weight: bold '> N° de OR->BG:  </span><span style=' width: 50%; float: right; '>{$paiements->getBg()}</span></div>
                    <div><span style=' width: 50%; font-weight: bold '> N° de OR->FS:  </span><span style=' width: 50%; float: right; '>{$paiements->getFs()}</span></div>
                    <div><span style=' width: 50%; font-weight: bold '> Date de OR : </span><span style=' width: 50%; float: right; '>{$paiements->getDateDeOR()}</span></div>
                    <div><span style=' width: 50%; font-weight: bold '>Obseravation : </span><span style=' width: 50%; float: right; '>{$paiements->getObservation()}</span></div>
               </div>
            </div>
            ";

            echo $row;

    } elseif (gettype($paiements) === "array") {
        echo '<table style="border: 1px solid black; border-collapse: collapse; width: 100%">';
        echo "<tr><td style=\"border: 1px solid black; border-collapse: collapse;\">N° de dossier</td>"

            ."<td style=\"border: 1px solid black; border-collapse: collapse;\">Beneficiaire</td>"
            ."<td style=\"border: 1px solid black; border-collapse: collapse;\">Montant(dh)</td>"

            ."<td style=\"border: 1px solid black; border-collapse: collapse;\">Redevance</td></tr>";

        foreach ($paiements as $paiement) {

            $dossier = $paiementDao->selectionnerDossierParPaiment($paiement->getId());
            //var_dump($paiement);

            $row = "<tr><td style=\"border: 1px solid black; border-collapse: collapse;\">".$paiement->getDossierId()."</td>"

                ."<td style=\"border: 1px solid black; border-collapse: collapse;\">".$dossier->getUtilisateur()."</td>"

                ."<td style=\"border: 1px solid black; border-collapse: collapse;\">".$dossier->getMontant()."</td>"
                ."<td style=\"border: 1px solid black; border-collapse: collapse;\">".$paiement->getRedevance()."</td>"


                ."<td style=\"border: 1px solid black; border-collapse: collapse;\"> <button><a href='?pid={$paiement->getId()}'>Consulter</a></button></td>

                 .<td style=\"border: 1px solid black; border-collapse: collapse;\"> <button><a href='modifier-paiement.php?pid={$paiement->getId()}&action=modifier'>Modifier</a></button>
</tr>";

            echo $row;
        }
        echo "</table>";
    }


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
                    if ($_GET['action'] === "Payer") {
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
                /*if (isset($_GET['action'])) {
                    if ($_GET['action'] === "Modifier") {
                        // Formulaire de paiment de dossier
                        require_once "modifier-paiement.php";
                    }*/

                    $paiment = $paiementDao->selectionnerPaiement($pid);

                    afficher($paiment);

                } else {
                    //Show all paiement objects

                    $paiements = $paiementDao->afficherTousPaiements();

                    afficher($paiements);



            }

            ?>

        </div>








        <p>Retour vers la page precedente : <a href = "dossier.php"> ici </a></p>
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