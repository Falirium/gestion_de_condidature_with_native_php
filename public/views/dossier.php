<?php

    require __DIR__ . "/../../vendor/autoload.php";

    $dossierDoa = \App\models\dossier\DossierDaoFactory::getDossierDaoFactory("mysql");

    session_start();
    //Check if a $_SESSION[admin] is set
    // else redirect to connxion page

    if (!isset($_SESSION['user_id'])) {
        header("Refresh:1; url=../");
    }

    //Function to display an array of Dossier | or single object Dossier
function afficher($dossiers) {
    echo '<table style="border: 1px solid black; border-collapse: collapse; width: 100%">';

    // If it is an array of Dossier
    if (gettype($dossiers) === "array")  {
        foreach ($dossiers as $dossier) {

            $row = "<tr><td style=\"border: 1px solid black; border-collapse: collapse;\">".$dossier->getNumero()."</td>"
                ."<td style=\"border: 1px solid black; border-collapse: collapse;\">".$dossier->getUtilisateur()."</td>"
                ."<td style=\"border: 1px solid black; border-collapse: collapse;\">".$dossier->getSujetAutorisation()."</td>"
                ."<td style=\"border: 1px solid black; border-collapse: collapse;\">".$dossier->getNumeroDecision()."</td>"
                ."<td style=\"border: 1px solid black; border-collapse: collapse;\">".$dossier->getDateDebutAutorisation()."</td>"
                ."<td style=\"border: 1px solid black; border-collapse: collapse;\">".$dossier->getDateFinAutorisation()."</td>"
                ."<td style=\"border: 1px solid black; border-collapse: collapse;\">".$dossier->getSurface()."</td>"
                ."<td style=\"border: 1px solid black; border-collapse: collapse;\">".$dossier->getMontant()."</td>"
                ."<td style=\"border: 1px solid black; border-collapse: collapse;\">".$dossier->getTypeActivite()."</td>"
                ."<td style=\"border: 1px solid black; border-collapse: collapse;\">".$dossier->getSituationActuelle()."</td>"
                ."<td style=\"border: 1px solid black; border-collapse: collapse;\">".$dossier->getDecisionDeDirection()."</td>"
                ."<td style=\"border: 1px solid black; border-collapse: collapse;\">".$dossier->getDateDecision()."</td>"
                ."<td style=\"border: 1px solid black; border-collapse: collapse;\">".$dossier->getArchive()."</td>"
                ."<td style=\"border: 1px solid black; border-collapse: collapse;\"> <button><a href='../controllers/archiverDossier.php?did={$dossier->getNumero()}'>Archiver</a></button></td>"
                ."<td style=\"border: 1px solid black; border-collapse: collapse;\"> <button><a href='?did={$dossier->getNumero()}&action=modifier'>Modifier</a></button></td>"
                ."<td style=\"border: 1px solid black; border-collapse: collapse;\"> <button><a href='?did={$dossier->getNumero()}'>Consulter</a></button></td></tr>";

            echo $row;
        }
    } elseif (gettype($dossiers) === "object") {
        

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
                ."<td style=\"border: 1px solid black; border-collapse: collapse;\">".$dossiers->getArchive()."</td>"
                ."<td style=\"border: 1px solid black; border-collapse: collapse;\"> <button><a href='../controllers/archiverDossier.php?did={$dossiers->getNumero()}'>Archiver</a></button></td>"
                ."<td style=\"border: 1px solid black; border-collapse: collapse;\"> <button><a href='did={$dossiers->getNumero()}&action=modifier'>Modifier</a></button></td>"
                ."<td style=\"border: 1px solid black; border-collapse: collapse;\"> <button><a href='profil.php?action=consulter&id=3'>Consulter</a></button></td></tr>";

            echo $row;
        
    }
    
    // If it is one Object of Dossier

    
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
<header>
    <h2>Direction.-Plateforme</h2>
</header>
<section>
    <nav>
        <!--Empty-->
    </nav>

    <article>
        <h1 align = "center">Nouveau dossier  !</h1>
        <div class = "cand_info" align = "center">Merci de founir des informations exactes, dans le cas ou vous remarquez un problème prière de contacter l'administrateur <a href = "mailto: admin@webmaster.com" >admin@webmaster.com</a></div>
        <div>

        </div>
        <div id = "select_form">
            <?php
            if (isset($_GET['did'])) {
                if (isset($_GET['action'])) {
                    if ($_GET['action'] === "modifier") {
                        require_once "modifier_formulaire.php";
                    }
                } else {


                $dossier = $dossierDoa->selectionnerDossier($_GET['did']);
                //echo gettype($dossier);
                afficher($dossier); ?>
            <div>
                <button><a href="">Archiver</a></button>
                <button><a href="">Modifier</a></button>
                <button><a href="">Historique de paiments</a></button>

            </div>

            <?php
                }
            } else {
                $dossiers = $dossierDoa->afficherTousDossier(0);

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