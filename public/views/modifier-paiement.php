<?php
require __DIR__ . "/../../vendor/autoload.php";

if (isset($_GET['pid']) && isset($_GET['action'])) {
    if ($_GET['action'] === "modifier") {

        //Get Paiement informations
        $pid = $_GET['pid'];

        $paiementDao = \App\models\paiement\PaiementDaoFactory::getDossierDaoFactory("mysql");

        // exception : if there is no paiement with that specific pid
        //var_dump($paiementDao->checkPid($pid));
        if (!$paiementDao->checkPid($pid)) {
            echo "3awd";
            die();
        }

        $paiement = $paiementDao->selectionnerPaiement($pid);
        //var_dump($paiement);

    }

}


?>
<div class="row">


    <div class="col-12 text-center">
        <h2 class="my-2">Paiement</h2>
        <p class="mb-4">Choisir un service que vous voulez accomplir en cliquant</p>
    </div>

    <div class="col-12">

        <form action="../controllers/modifierPaiement.php" class=" text-right" method="post">

            <div class="row">
                <div class="col-11 mt-3 mx-auto">

                    <!--Row 1-->
                    <div class="row text-center">

                        <div class="col-4">
                            <div class="form-group row ">
                                <label for="" class="col-5 col-form-label pr-0">N° de paiement</label>
                                <div class="col-5">
                                    <input type="text" name="pid" value="<?php echo $paiement->getId(); ?>" class = "form-control form-control-sm" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group row ">
                                <label for="" class="col-6 col-form-label pr-0">Nom de beneficiaire</label>
                                <div class="col-6">
                                    <input type="text" name="beneficiaire" value="<?php echo $paiement->getBeneficiaire(); ?>" class = "form-control form-control-sm" required readonly>
                                    <!--<div class="invalid-feedback">Please choose a username</div> -->
                                </div>
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group row ">
                                <label for="numero" class="col-6 col-form-label pr-0">N° de dossier</label>
                                <div class="col-6 ">
                                    <input type="text" name="did" value="<?php echo $paiement->getDossierId(); ?>"  class = "form-control form-control-sm" required readonly>
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
                                    <input type="text" name="bg" value="<?php echo $paiement->getBg(); ?>" class = "form-control form-control-sm" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group row ">
                                <label for="numero" class="col-5 col-form-label pr-0">N° de OR [FS]</label>
                                <div class="col-6 ">
                                    <input type="text" name="fs" value="<?php echo $paiement->getFs(); ?>" class = "form-control form-control-sm" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group row ">
                                <label for="" class="col-4 col-form-label pr-0">Date de OR</label>
                                <div class="col-8">
                                    <input type="date" name="dor" value="<?php echo $paiement->getDateDeOR(); ?>" class = "form-control form-control-sm" required>
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
                                    <input type="text" name="nbv" value="<?php echo $paiement->getNBV(); ?>" class = "form-control form-control-sm" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group row ">
                                <label for="numero" class="col-4 col-form-label pr-0">Date BV</label>
                                <div class="col-7 ">
                                    <input type="date" name="dbv" value="<?php echo $paiement->getDateBV(); ?>" class = "form-control form-control-sm" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-5">
                            <div class="form-group row ">
                                <label for="" class="col-5 col-form-label pr-0">Date de paiement</label>
                                <div class="col-7">
                                    <input type="date" name="dp" value="<?php echo $paiement->getDateDePaiement(); ?>" class = "form-control form-control-sm" required>
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
                                    <input type="text" name="redevance" value="<?php echo $paiement->getRedevance(); ?>" class = "form-control form-control-sm" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-3 ">
                            <div class="form-group row ">
                                <label for="numero" class="col-5 col-form-label pr-3">Montant</label>
                                <div class="col-7 ">
                                    <input type="text" name="montant" value="<?php echo $paiement->getMontant(); ?>" class = "form-control form-control-sm" required readonly>
                                </div>
                            </div>
                        </div>

                        <div class="col-6 ">
                            <div class="form-group row ">
                                <label for="" class="col-4 col-form-label pr-0">Observation</label>
                                <div class="col-8">
                                    <textarea name="obs"  class = "form-control form-control-sm" rows="3" required><?php echo $paiement->getObservation(); ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 mt-3 mx-auto">
                            <button class="btn btn-success btn-sm mx-auto" type="submit">Modifier paiement</button>
                        </div>


                    </div>



                </div>
            </div>
        </form>
    </div>
</div>

