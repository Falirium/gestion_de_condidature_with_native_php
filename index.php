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
            <?php 
            if(isset($_SESSION['user_cin'])){
                include "includes/db.php";
                $sql = "SELECT e_nom, e_prenom 
                FROM ".$table_etudiants." 
                WHERE e_cin = '".$_SESSION['user_cin']."'";
                $rep = $db->query($sql);
                if($rep->num_rows === 1){  //le cin  existe 
                    $user = $rep->fetch_assoc();
                    echo " Bonjour, ".$user['e_prenom']." ".$user['e_nom']." <a href = 'login-page.php' class = 'a_button'>Déconnexion</a>";
                }
            }
            else{
                echo "<a href = 'connexion.php' class = 'a_button'>Connexion</a>";
            }
            ?>
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
            <?php 
            if(isset($_SESSION['user_cin']))
                {
                    if($_SESSION['user_cin'] === "admin")
                        {
            ?>
            <form action = "#" method = "POST">
                <table width = "400px" class = "select_action">
                    <tr>
                        <td class = "select_action_td" width = "15%">
                            Aller à
                        </td>
                        <td class = "select_action_td" width = "70%">
                            <select name="page" class = "form_input" required>
                                <option value="form-page">Nouveau Dossier</option>
                                <option value="admin_messages">Consulter les Dossiers </option>
                            
                                <option value="delete_user">Supprimer un Dossier</option>
                            </select>
                        </td>
                        <td class = "select_action_td" width = "15%">
                            <input type="submit" name="GO" class = "form_input" value = "GO !">
                        </td>
                    </tr>
                </table>
            </form>
            <?php 
                if(isset($_POST['GO'])){
                    header('Location: '.$_POST['page'].'.php');
                    echo 'You\'ll be redirected in about 5 secs. ';
                    echo "If not, click <a href='".$_POST['page'].".php'>here</a>.";
                }
            ?>
            <?php  
                }
                else
                {
                ?>
            <form action = "#" method = "POST">
                <table width = "400px" class = "select_action">
                    <tr>
                        <td class = "select_action_td" width = "15%">
                            Aller à
                        </td>
                        <td class = "select_action_td" width = "70%">
                            <select name = "page2" class = "form_input" required>
                                <option value="ma_candidature">Ma fiche</option>
                                <option value="cand_consultation">Consulter ma candidature</option>
                                <option value="messages">Envoyer un message à l'admin</option>
                            </select>
                        </td>
                        <td class = "select_action_td" width = "15%">
                            <input type="submit" name="GO2" class = "form_input" value = "GO !">
                        </td>
                    </tr>
                </table>
            </form>
            <?php 
                if(isset($_POST['GO2'])){
                    header('Location: '.$_POST['page2'].'.php');
                    echo 'You\'ll be redirected in about 5 secs. ';
                    echo "If not, click <a href='".$_POST['page2'].".php'>here</a>.";
                }
            ?>
            <?php
            }
            }else{
            ?>
            
            
            <?php
            }
            ?>
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