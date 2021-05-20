<?php
    //Check if a $_SESSION[admin] is set
    // else redirect to connxion page
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

        <div id = "select_form">
            <button><a href="?action=ajouter">Ajouter un nouveau dossier</a> </button>
            <button><a href="?action=consulter">Consulter un dossier </a></button>
        </div>

        <div id = "select_form">
            <?php
                if (!isset($_GET['action'])){

                } else if ($_GET['action'] === "ajouter") {
                    require_once 'formulaire.php';
                } else if ($_GET['action'] === "consulter") {
                    require_once 'dossier.php';
                }
            ?>
        </div>






        <p>Retour vers la page principale : <a href = "index.php"> ici </a></p>
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
