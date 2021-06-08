<?php
require __DIR__ . "/../../vendor/autoload.php";
$dossierDoa = \App\models\dossier\DossierDaoFactory::getDossierDaoFactory("mysql");

if (isset($_GET['did'])) {
    $did = $_GET['did'];
    $dossier = $dossierDoa->selectionnerDossier($did);
} else {
    // redirect to single dossier page
    $alertMsg = "Server problem, please retry !";
    setcookie("alert", $alertMsg, time() + 5, "../views/");

    header("Refresh:1; url=../views/dossier.php?action=consulter");
}

?>




                    <div class="row">


                        <div class="col-12 text-center">
                            <h2 class="my-2">Paiement</h2>
                            <p class="mb-4">Choisir un service que vous voulez accomplir en cliquant</p>


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

                        </div>

                        <div class="col-12">

                            <form action="../controllers/ajouterPaiement.php" class=" text-right" method="post">

                                <div class="row">
                                    <div class="col-11 mt-3 mx-auto">

                                        <!--Row 1-->
                                        <div class="row text-center">

                                            <div class="col-4">
                                                <div class="form-group row ">
                                                    <label for="" class="col-5 col-form-label pr-0">N° de paiement</label>
                                                    <div class="col-5">
                                                        <input type="text" name="id" class = "form-control form-control-sm" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-4">
                                                <div class="form-group row ">
                                                    <label for="" class="col-6 col-form-label pr-0">Nom de beneficiaire</label>
                                                    <div class="col-6">
                                                        <input type="text" name="beneficiaire" value="<?php echo $dossier->getUtilisateur(); ?>" class = "form-control form-control-sm" required readonly>
                                                        <!--<div class="invalid-feedback">Please choose a username</div> -->
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-3">
                                                <div class="form-group row ">
                                                    <label for="numero" class="col-6 col-form-label pr-0">N° de dossier</label>
                                                    <div class="col-6 ">
                                                        <input type="text" name="num" value="<?php echo $dossier->getNumero(); ?>" class = "form-control form-control-sm" required readonly>
                                                    </div>
                                                </div>
                                            </div>



                                        </div>

                                        <!--Row 2 -->
                                        <div class="row text-center">

                                            <div class="col-4">
                                                <div class="form-group row ">
                                                    <label for="" class="col-5 col-form-label pr-0">N° de OR [BG]</label>
                                                    <div class="col-6">
                                                        <input type="text" name="bg" class = "form-control form-control-sm" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-4">
                                                <div class="form-group row ">
                                                    <label for="numero" class="col-5 col-form-label pr-0">N° de OR [FS]</label>
                                                    <div class="col-6 ">
                                                        <input type="text" name="fs" class = "form-control form-control-sm" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-4">
                                                <div class="form-group row ">
                                                    <label for="" class="col-4 col-form-label pr-0">Date de OR</label>
                                                    <div class="col-8">
                                                        <input type="date" name="dor" class = "form-control form-control-sm" required>
                                                    </div>
                                                </div>
                                            </div>



                                        </div>


                                        <!--Row 3 -->
                                        <div class="row text-center">

                                            <div class="col-3">
                                                <div class="form-group row ">
                                                    <label for="" class="col-3 col-form-label pr-0">N° BV</label>
                                                    <div class="col-8">
                                                        <input type="text" name="nbv" class = "form-control form-control-sm" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-4">
                                                <div class="form-group row ">
                                                    <label for="numero" class="col-4 col-form-label pr-0">Date BV</label>
                                                    <div class="col-7 ">
                                                        <input type="date" name="dbv" class = "form-control form-control-sm" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-5">
                                                <div class="form-group row ">
                                                    <label for="" class="col-5 col-form-label pr-0">Date de paiement</label>
                                                    <div class="col-7">
                                                        <input type="date" name="dp" class = "form-control form-control-sm" required>
                                                    </div>
                                                </div>
                                            </div>



                                        </div>

                                        <!--Row 4 -->
                                        <div class="row text-center">

                                            <div class="col-3">
                                                <div class="form-group row ">
                                                    <label for="numero" class="col-5 col-form-label pr-0">Redevance</label>
                                                    <div class="col-7 ">
                                                        <input type="text" name="redevance" class = "form-control form-control-sm" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-3 ">
                                                <div class="form-group row ">
                                                    <label for="numero" class="col-5 col-form-label pr-3">Montant</label>
                                                    <div class="col-7 ">
                                                        <input type="text" name="montant" value="<?php echo $dossier->getMontant(); ?>" class = "form-control form-control-sm" required readonly>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-6 ">
                                                <div class="form-group row ">
                                                    <label for="" class="col-4 col-form-label pr-0">Observation</label>
                                                    <div class="col-8">
                                                        <textarea name="obs" class = "form-control form-control-sm" rows="3" required></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4 mt-3 mx-auto">
                                                <button class="btn btn-success btn-sm mx-auto" type="submit">Ajouter paiement</button>
                                            </div>


                                        </div>



                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

