<?php
require __DIR__ . "/../../vendor/autoload.php";
$paiementDao = \App\models\paiement\PaiementDaoFactory::getDossierDaoFactory('mysql');

if (isset($_GET['pid'])) {
    $pid = $_GET['pid'];
} else {
    //redirect to la liste des paiements
}

// exception : if there is no paiement with that specific pid
var_dump($paiementDao->checkPid($pid));
if (!$paiementDao->checkPid($pid)) {
    echo "3awd";
    die();
}

$paiement = $paiementDao->selectionnerPaiement($pid);




?>



                    <div class="row">


                        <div class="col-12 text-center">
                            <h2 class="my-2">Paiement</h2>
                            <p class="mb-4">Choisir un service que vous voulez accomplir en cliquant</p>
                        </div>

                        <div class="col-12">

                            <form action="" class=" text-right">

                                <div class="row">
                                    <div class="col-11 mt-3 mx-auto">

                                        <!--Row 1-->
                                        <div class="row text-center">

                                            <div class="col-4">
                                                <div class="form-group row ">
                                                    <label for="" class="col-5 col-form-label pr-0">N° de paiement</label>
                                                    <div class="col-5 pl-0">
                                                        <label for="" class=" font-weight-bold col-form-label border border-secondary rounded px-3 "><?php echo $paiement->getId(); ?></label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-4">
                                                <div class="form-group row ">
                                                    <label for="" class="col-6 col-form-label pr-0">Nom de beneficiaire</label>
                                                    <div class="col-6 arabic-label pl-0">
                                                        <label for="" class=" font-weight-bold col-form-label border border-secondary rounded px-3 "><?php echo $paiement->getBeneficiaire(); ?></label>
                                                        <!--<div class="invalid-feedback">Please choose a username</div> -->
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-3">
                                                <div class="form-group row">
                                                    <label for="numero" class="col-6 col-form-label pr-0">N° de dossier</label>
                                                    <div class="col-6 pl-0 ">
                                                        <label for="" class=" font-weight-bold col-form-label border border-secondary rounded px-3 "><?php echo $paiement->getDossierId(); ?></label>
                                                    </div>
                                                </div>
                                            </div>



                                        </div>

                                        <!--Row 2 -->
                                        <div class="row text-center">

                                            <div class="col-4">
                                                <div class="form-group row ">
                                                    <label for="" class="col-5 col-form-label pr-0">N° de OR [BG]</label>
                                                    <div class="col-4 pl-0">
                                                        <label for="" class=" font-weight-bold col-form-label border border-secondary rounded px-3 "><?php echo $paiement->getBg(); ?></label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-4">
                                                <div class="form-group row ">
                                                    <label for="numero" class="col-5 col-form-label pr-0">N° de OR [FS]</label>
                                                    <div class="col-4 pl-0 ">
                                                        <label for="" class=" font-weight-bold col-form-label border border-secondary rounded px-3 "><?php echo $paiement->getFs(); ?></label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-4">
                                                <div class="form-group row ">
                                                    <label for="" class="col-5 col-form-label pr-0">Date de OR</label>
                                                    <div class="col-5 pl-0">
                                                        <label for="" class=" font-weight-bold col-form-label border border-secondary rounded px-3 "><?php echo $paiement->getDateDeOR(); ?></label>
                                                    </div>
                                                </div>
                                            </div>



                                        </div>


                                        <!--Row 3 -->
                                        <div class="row text-center">

                                            <div class="col-3">
                                                <div class="form-group row">
                                                    <label for="" class="col-3 col-form-label pr-0">N° BV</label>
                                                    <div class="col-5 pl-0">
                                                        <label for="" class=" font-weight-bold col-form-label border border-secondary rounded px-3 "><?php echo $paiement->getNBV(); ?></label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-4">
                                                <div class="form-group row ">
                                                    <label for="numero" class="col-4 col-form-label pr-0">Date BV</label>
                                                    <div class="col-5 pl-0 ">
                                                        <label for="" class=" font-weight-bold col-form-label border border-secondary rounded px-3 "><?php echo $paiement->getDateBV(); ?></label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-5">
                                                <div class="form-group row ">
                                                    <label for="" class="col-5 col-form-label pr-0">Date de paiement</label>
                                                    <div class="col-5 pl-0">
                                                        <label for="" class=" font-weight-bold col-form-label border border-secondary rounded px-3 "><?php echo $paiement->getDateDePaiement(); ?></label>
                                                    </div>
                                                </div>
                                            </div>



                                        </div>

                                        <!--Row 4 -->
                                        <div class="row text-center">

                                            <div class="col-3">
                                                <div class="form-group row">
                                                    <label for="numero" class="col-5 col-form-label pr-0">Redevance</label>
                                                    <div class="col-5 pl-0 ">
                                                        <label for="" class=" font-weight-bold col-form-label border border-secondary rounded px-3 "><?php echo $paiement->getRedevance(); ?></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group row">
                                                    <label for="numero" class="col-5 col-form-label pr-3">Montant</label>
                                                    <div class="col-7 pl-0 text-left">
                                                        <label for="" class=" font-weight-bold col-form-label  border border-secondary rounded px-3"><?php echo $paiement->getMontant(); ?></label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-6 ">
                                                <div class="form-group row ">
                                                    <label for="" class="col-4 col-form-label pr-0">Observation</label>
                                                    <div class="col-8 pl-0">
                                                        <textarea name="situation" class = "form-control form-control-sm" rows="3" readonly required><?php echo $paiement->getDateDeOR(); ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-8 mt-3 mx-auto btn-position">

                                                <a href="paiement.php?action=modifier&pid=<?php echo $paiement->getId() ?>" class="btn btn-primary btn-sm float-center mx-2 text-white" role="button">Modifier</a>
                                                <a href="dossier.php?action=consulter&did=<?php echo $paiement->getDossierId() ?>" class="btn btn-success btn-sm float-center mx-2 text-white" role="button">Consulter le dossier associé</a>

                                            </div>


                                        </div>



                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>


