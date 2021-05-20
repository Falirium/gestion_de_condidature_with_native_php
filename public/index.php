<?php
    require __DIR__ . "/../vendor/autoload.php";

    /*
    $faker = Faker\Factory::create();

    $num = $faker->randomDigit();
    $utilisateur = $faker->firstNameFemale();
    $sujetAutorisation = $faker->word();
    $numeroDecision = $faker->randomDigit();
    $dateDebutAutorisation = $faker->date('Y-m-d', 'now');
    $dateFinAutorisation = $faker->date('Y-m-d', 'now');
    $surface = $faker->randomDigit();
    $montant = $faker->randomDigit();
    $typeActivite = $faker->sentence( 6, true);
    $situationActuelle = $faker->sentence( 1, true);
    $decisionDeDirection = $faker->sentence( 3, true);

    $dossier = new \App\models\dossier\Dossier($utilisateur, $sujetAutorisation, $numeroDecision, $dateDebutAutorisation, $dateFinAutorisation, $surface, $montant, $typeActivite, $situationActuelle, $decisionDeDirection);

    var_dump($dossier);
    */

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Page principale</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/main.css">
    <link rel="icon" type="image/ico" href="css/img/logo.ico"/>
</head>
    <header>
        <h2>Direction-Plateforme</h2>
        <div class = "header_right">
            <a href = '?sconnexion=1' class = 'a_button'>Connexion</a>"

        </div>

    </header>
    <section>
        
        
        <nav>
            <!--Empty-->
        </nav>
  
        
        <article>
            <h1 align = "center">Page principale</h1>
            <p class = "con_instructions">Bienvenue sur la page principale de la plateforme, cette plateforme vous permet d'ajouter des dossiers à la base de donnée de la Direction. Vous pouvez founir toutes les informations  (nom de beneficiaire, montant, paiement ...) ces informations sont confidentielles aucune personne n'a le droit de changer ou de voir ces informations sauf l'admin!  </p>
            <p class = "con_instructions">Merci de founir des informations exactes, dans le cas ou vous remarquez un problème prière de contacter l'administrateur <a href = "mailto: admin@webmaster.com" >admin@webmaster.com</a></p>
            <p align = "center">
                <form action = "controllers/connexion.php" method = "POST">
                    <table class = "tab_form">
                        <tr>
                            <td><label for="nom">Votre CIN:</label></td>
                            <td class = "form_td"><input type="text" name="cin_c" class = "form_input" placeholder = "CIN ex : K101210" required></td>
                        </tr>
                        <tr>
                            <td><label for="prenom">Votre SecureKey:</label></td>
                            <td class = "form_td"><input type="password" name="key_c" class = "form_input" required></td>
                        </tr>
                    </table>
                    <table class = "tab_form">
                        <tr>
                            <td class = "form_td">
                                <center><input type = "submit" name = "GO" value = "Consulter" class = "form_input_conv"></center>

                            </td>
                        </tr>
                    </table>
                </form>
            </p>
        </article>

        
        <aside>
            <!--Empty-->
        </aside>
        
        
    </section>
    <footer>
      <p>Etudiants-plateforme Version 1.1 © <br />2021</p>
    </footer>
</body>
</html>