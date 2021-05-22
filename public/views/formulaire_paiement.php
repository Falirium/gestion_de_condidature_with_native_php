<?php
require __DIR__ . "/../../vendor/autoload.php";


$did = $_GET['did'];

$dossierDao = \App\models\dossier\DossierDaoFactory::getDossierDaoFactory("mysql");

$dossier = $dossierDao->selectionnerDossier($did);

?>

<form action = "../controllers/ajouterPaiment.php" method = "POST" enctype="multipart/form-data">
    <table class = "tab_form">

        <tr>
            <td>
                <label for="num">:رقم الملف</label>
            </td>
            <td class = "form_td">
                <input type="text" name="num" class = "form_input" value="<?php echo $dossier->getNumero();?>"   required >
            </td>
        </tr>
        <tr>
            <td>
                <label for="prenom">:المستغل</label>
            </td>
            <td class = "form_td">
                <input type="text" name="prenom" class = "form_input"  value="<?php echo $dossier->getUtilisateur();?>" required>
            </td>
        </tr>
        <tr>
            <td>
                <label for="sujet">:موضوع الرخصة</label>
            </td>
            <td class = "form_td">
                <input type="text" name="sujet" class = "form_input" value="<?php echo $dossier->getSujetAutorisation();?> " required>
            </td>
        </tr>

        <tr>
            <td>
                <label for="montant">:مبلغ الإتاوة السنوية</label>
            </td>
            <td class = "form_td">
                <input type="text" name="montant" class = "form_input"  value="<?php echo $dossier->getMontant();?>" required>
            </td>
        </tr>




    </table>
    <table class = "tab_form">
        <tr>
            <td class = "form_td">
                <center><input type = "submit" name = "GO" value = "Payer" class = "form_input_2"></center>
            </td>
        </tr>
    </table>
</form>
