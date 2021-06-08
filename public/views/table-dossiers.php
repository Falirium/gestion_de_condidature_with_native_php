<?php
require __DIR__ . "/../../vendor/autoload.php";
$dossierDoa = \App\models\dossier\DossierDaoFactory::getDossierDaoFactory("mysql");

// for type of dossiers
if (isset($_GET['dossierType'])) {
    $dossierType = $_GET['dossierType'];



} else if (isset($_GET['query'])) {
    $query = $_GET['query'];
    

} else {
    $dossiers = $dossierDoa->afficherTousDossiers();
}



?>

<div class="row h-100">


    <div class="col-12 text-center align-self-start">
        <h2 class="my-2 mb-3">Dossier</h2>
        <div class="rwo">
            <form action="" class="form-inline">
                <div class="col-6 form-group">
                    <label for="typeDossier" class="col-form-label mx-4 ml-5">Selectionner :</label>
                    <select name="" id="dossierType" class="form-control form-control-sm custom-select" >
                        <option value="">Tous</option>
                        <option value="1">Archivé</option>
                        <option value="0">Activé</option>
                        <option value="2">En cours de traitement</option>
                    </select>
                </div>
                <div class="col-6 ">
                    <input id="query"  type="text" class="w-75 form-control form-control-sm float-right mr-4" placeholder="chercher par le nom d'utilisateur...">
                </div>
            </form>

        </div>
    </div>

    <div id="table-container" class="col-11 mx-auto align-self-start h-75 my-custom-scrollbar">
        <?php
        if (isset($_COOKIE['alert'])) {
            $msg = $_COOKIE['alert'];
            echo '<div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>Failed!</strong> '.$msg.'
                        </div>
                        ';

            
        }



        ?>
        <table class="table table-striped ">
            <thead>
                <tr>
                    <th scope="col" >Num</th>
                    <th scope="col" >Utilisateur</th>
                    <th scope="col" >Sujet</th>
                    <th scope="col" >Fin d'autorisation</th>
                    <th scope="col" >Montant</th>
                    <th scope="col" >Etat</th>
                    <th scope="col" ></th>
                </tr>
            </thead>
            <tbody>

                <?php
                    foreach ($dossiers as $dossier) {

                        $row = "<tr><td>" . $dossier->getNumero() . "</td>"
                            . "<td>" . $dossier->getUtilisateur() . "</td>"
                            . "<td>" . $dossier->getSujetAutorisation() . "</td>"
                            . "<td>" . $dossier->getDateFinAutorisation() . "</td>"
                            . "<td>" . $dossier->getMontant() . "</td>";

                        if ($dossier->getArchive() == 0) {
                            $archive = '<td class="p-2"><span class="badge badge-success p-2 d-inline-block m-0  text-center">active</span></td>';
                            $row = $row . $archive;
                        } else if ($dossier->getArchive() == 1) {
                            $archive = '<td class="p-2"><span class="badge badge-danger p-2 d-inline-block m-0  text-center">archivé</span></td>';
                            $row = $row . $archive;
                        } else if ($dossier->getArchive() == 2) {
                            $archive = '<td class="p-2"><span class="badge badge-warning p-2 d-inline-block m-0  text-center">en cours</span></td>';
                            $row = $row . $archive;
                        }

                        $row = $row.'<td class="p-2 pr-4 text-center"><a href="dossier.php?action=consulter&did='.$dossier->getNumero().'" class="w-100 table-btn btn btn-success btn-sm text-white" role="button">Consulter</a></td>';

                        echo $row;
                    }


                ?>


            </tbody>
        </table>

    </div>
</div>


