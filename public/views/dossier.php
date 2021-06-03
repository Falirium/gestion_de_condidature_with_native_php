<?php

    require __DIR__ . "/../../vendor/autoload.php";

    $dossierDoa = \App\models\dossier\DossierDaoFactory::getDossierDaoFactory("mysql");

    session_start();
    //Check if a $_SESSION[admin] is set
    // else redirect to connxion page

    if (!isset($_SESSION['user_id'])) {
        header("Refresh:1; url=../");
    }

// Gere l'affichage des dossiers archivés
$archive = 1;
if (isset($_POST['archive'])) {
    $archive = $_POST['archive'];
} else {
    $archive = 1;
}

//Function to display an array of Dossier | or single object Dossier
function afficher($dossiers) {


    // If it is an array of Dossier
    if (gettype($dossiers) === "array")  {
        echo '<table style="border: 1px solid black; border-collapse: collapse; width: 100%">';
        foreach ($dossiers as $dossier) {

            $row = "<tr><td style=\"border: 1px solid black; border-collapse: collapse;\">".$dossier->getNumero()."</td>"
                ."<td style=\"border: 1px solid black; border-collapse: collapse;\">".$dossier->getUtilisateur()."</td>"
                ."<td style=\"border: 1px solid black; border-collapse: collapse;\">".$dossier->getSujetAutorisation()."</td>"
                ."<td style=\"border: 1px solid black; border-collapse: collapse;\">".$dossier->getDateFinAutorisation()."</td>"
                ."<td style=\"border: 1px solid black; border-collapse: collapse;\">".$dossier->getMontant()."</td>"
                ."<td style=\"border: 1px solid black; border-collapse: collapse;\">".$dossier->getTypeActivite()."</td>"
                ."<td style=\"border: 1px solid black; border-collapse: collapse;\"> <button><a href='../controllers/archiverDossier.php?did={$dossier->getNumero()}'>Archiver</a></button></td>"
                ."<td style=\"border: 1px solid black; border-collapse: collapse;\"> <button><a href='?did={$dossier->getNumero()}&action=modifier'>Modifier</a></button></td>"
                ."<td style=\"border: 1px solid black; border-collapse: collapse;\"> <button><a href='?did={$dossier->getNumero()}'>Consulter</a></button></td></tr>";

            echo $row;
        }

        echo "</table>";
    } elseif (gettype($dossiers) === "object") {
        /*

            $row = "<tr><td style=\"border: 1px solid black; border-collapse: collapse;\">".$dossiers->getNumero()."</td>"
                ."<td style=\"border: 1px solid black; border-collapse: collapse;\">".$dossiers->getUtilisateur()."</td>"
                ."<td style=\"border: 1px solid black; border-collapse: collapse;\">".$dossiers->getSujetAutorisation()."</td>"
                ."<td style=\"border: 1px solid black; border-collapse: collapse;\">".$dossiers->getNumeroDecision()."</td>"
                ."<td style=\"border: 1px solid black; border-collapse: collapse;\">".$dossiers->getDateDebutAutorisation()."</td>"
                ."<td style=\"border: 1px solid black; border-collapse: collapse;\">".$dossiers->getDateFinAutorisation()."</td>"
                ."<td style=\"border: 1px solid black; border-collapse: collapse;\">".$dossiers->getSurface()."</td>"
                ."<td style=\"border: 1px solid black; border-collapse: collapse;\">".$dossiers->getMontant()."</td>"
                ."<td style=\"border: 1px solid black; border-collapse: collapse;\">".$dossiers->getTypeActivite()."</td>"
                ."<td style=\"border: 1px solid black; border-collapse: collapse;\">".$dossiers->getSituationActuelle()."</td>"
                ."<td style=\"border: 1px solid black; border-collapse: collapse;\">".$dossiers->getDecisionDeDirection()."</td>"
                ."<td style=\"border: 1px solid black; border-collapse: collapse;\">".$dossiers->getDateDecision()."</td>"
                ."<td style=\"border: 1px solid black; border-collapse: collapse;\">".$dossiers->getArchive()."</td>";
            */

            $row = "
             <div style='width: 100%; margin: 20px auto;'>
               <div style='float: left; width: 50%'>
                    <div><span style=' width: 50%; font-weight: bold '>Numero   </span><span style=' width: 50%; float: right; '>{$dossiers->getNumero()}</span></div>
                        <div><span style=' width: 50%; font-weight: bold '>Beneficiaire  </span><span style=' width: 50%; float: right; '>{$dossiers->getUtilisateur()}</span></div>
                    <div><span style=' width: 50%; font-weight: bold '>Sujet d'autorisation  </span><span style=' width: 50%; float: right; '>{$dossiers->getSujetAutorisation()}</span></div>
                    <div><span style=' width: 50%; font-weight: bold '>Numero de decision  </span><span style=' width: 50%; float: right; '>{$dossiers->getNumeroDecision()}</span></div>
                    <div><span style=' width: 50%; font-weight: bold '>Date de decision   </span><span style=' width: 50%; float: right; '>{$dossiers->getDateDecision()}</span></div>
                    <div><span style=' width: 50%; font-weight: bold '>Date debut autorisation  </span><span style=' width: 50%; float: right; '>{$dossiers->getDateDebutAutorisation()}</span></div>
               </div>
               <div style='float: right; width: 50%'>
                    <div><span style=' width: 50%; font-weight: bold '>Date fin autorisation   </span><span style=' width: 50%; float: right; '>{$dossiers->getDateFinAutorisation()}</span></div>
                    <div><span style=' width: 50%; font-weight: bold '>Surface (en m²)  </span><span style=' width: 50%; float: right; '>{$dossiers->getSurface()}</span></div>
                    <div><span style=' width: 50%; font-weight: bold '>Montant (en DH)  </span><span style=' width: 50%; float: right; '>{$dossiers->getMontant()}</span></div>
                    <div><span style=' width: 50%; font-weight: bold '>Type d'activité   </span><span style=' width: 50%; float: right; '>{$dossiers->getTypeActivite()}</span></div>
                    <div><span style=' width: 50%; font-weight: bold '>Situation actuelle   </span><span style=' width: 50%; float: right; '>{$dossiers->getSituationActuelle()}</span></div>
                    <div><span style=' width: 50%; font-weight: bold '>Decision  </span><span style=' width: 50%; float: right; '>{$dossiers->getDecisionDeDirection()}</span></div>
                   
               </div>
            </div>
            ";


            echo $row;


    }
    
    // If it is one Object of Dossier

    



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
        <h1 align = "center">Dossiers!</h1>
        <div class = "cand_info" align = "center">Merci de founir des informations exactes, dans le cas ou vous remarquez un problème prière de contacter l'administrateur <a href = "mailto: admin@webmaster.com" >admin@webmaster.com</a></div>
        <div>

        </div>
        <!--
        <div>

            <form action="" method="post">
                <input type="checkbox" id="archive" name="archive" value="1" >
                <label for="archive">Afficher les dossiers archivés</label>
                <input type="submit" value="Actualiser">
            </form>
        </div>
        -->
        <div id = "select_form">
            <?php
            if (isset($_GET['did'])) {
                if (isset($_GET['action'])) {
                    if ($_GET['action'] === "modifier") {
                        require_once "modifier_formulaire.php";
                    } else {
                        //Renvoie vers la liste des dossiers
                    }
                } else {


                $dossier = $dossierDoa->selectionnerDossier($_GET['did']);
                //echo gettype($dossier);
                afficher($dossier); ?>
            <div>
>               <button><a href=<?php echo "?did={$dossier->getNumero()}&action=modifier" ?>>Modifier</a></button>
                <button><a href=<?php echo "paiement.php?did={$dossier->getNumero()}" ?>>Historique de paiements</a></button>
                <button><a href=<?php echo "formulaire_paiement.php?did={$dossier->getNumero()}&action=payer"?>>Payer</a></button>

                <?php
                /*var_dump($dossierDoa->est_Paye($dossier));
                if (!$dossierDoa->est_Paye($dossier)) {
                    echo "<button><a href='paiement.php?did={$dossier->getNumero()}&action=payer'>Payer</a></button>";
                }*/
                ?>



            </div>

            <?php
                }
            } else {
                $dossiers = $dossierDoa->afficherTousDossier($archive);
                //var_dump($archive, $dossiers);

                afficher($dossiers);

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