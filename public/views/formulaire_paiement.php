<?php
require __DIR__ . "/../../vendor/autoload.php";

$dossierDao = \App\models\dossier\DossierDaoFactory::getDossierDaoFactory("mysql");

$did = $_GET['did'];

$dossier = $dossierDao->selectionnerDossier($did);

?>

<form action = "../controllers/ajouterPaiment.php" method = "POST" enctype="multipart/form-data">
    <table class = "tab_form">

        <tr>
            <td>
                <label for="num">N°de dossier:</label>
            </td>
            <td class = "form_td">
                <input type="text" name="num" class = "form_input" value="<?php echo $dossier->getNumero();?>"   required >
            </td>
        </tr>
        <tr>
            <td>
                <label for="prenom">Nom de beneficiaire:</label>
            </td>
            <td class = "form_td">
                <input type="text" name="beneficiaire" class = "form_input"  value="<?php echo $dossier->getUtilisateur();?>" required>
            </td>
        </tr>
        <tr>
            <td>
                <label for="sujet">Redevance:</label>
            </td>
            <td class = "form_td">
                <input type="text" name="redevance" class = "form_input"  required>
            </td>
        </tr>

        <tr>
            <td>
                <label for="montant">Montant:</label>
            </td>
            <td class = "form_td">
                <input type="text" name="montant" class = "form_input"  value="<?php echo $dossier->getMontant();?>" required>
            </td>
        </tr>
        <tr>
            <td>
                <label for="N°BV">N° BV</label>
            </td>
            <td class = "form_td">
                <input type="text" name="nbv" class = "form_input"   required>
            </td>
        </tr>
        <tr>
            <td>Date BV</td>
            <td>
                <input type="date" name="dbv" class = "form_input" required>
            </td>
        </tr>
        <tr>
            <td> Date de paiement </td>
            <td>
                <input type="date" name="dp" class = "form_input" required>
            </td>
        </tr>
        <tr>
            <td>
                <label for="N° de OR : BG">N° de OR : BG</label>
            </td>
            <td class = "form_td">
                <input type="text" name="bg" class = "form_input"   required>
            </td>
        </tr>
        <tr>
            <td>
                <label for="N° de OR : FS">N° de OR : FS</label>
            </td>
            <td class = "form_td">
                <input type="text" name="fs" class = "form_input"   required>
            </td>
        </tr>
        <tr>
            <td> Date de OR </td>
            <td>
                <input type="date" name="dor" class = "form_input" required>
            </td>
        </tr>
        <tr>
            <td>
                <label for="observation">Observation</label>
            </td>
            <td class = "form_td">
                <input type="text" name="obs" class = "form_input"   required>
            </td>
        </tr>




    </table>
    <table class = "tab_form">
        <tr>
            <td class = "form_td">
                <center><input type = "submit" name = "GO" value = "Ajouter" class = "form_input_2"></center>
            </td>
        </tr>
    </table>
</form>
