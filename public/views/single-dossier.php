<?php
require __DIR__ . "/../../vendor/autoload.php";
$dossierDoa = \App\models\dossier\DossierDaoFactory::getDossierDaoFactory("mysql");

if (isset($_GET['did'])) {
    $did = $_GET['did'];
} else {
    //redirect to la liste des dossiers
}

// exception : if there is no dossier with that specific did
//var_dump($dossierDoa->checkDid($did));
if (!$dossierDoa->checkDid($did)) {
    echo "3awd";
    $alertMsg = "Server problem, please retry !";
    setcookie("alert", $alertMsg, time() + 5, "../views/");

    // redirect to table-dossiers
    header("Refresh:1; url=../views/dossier.php?action=consulter");

}

$dossier = $dossierDoa->selectionnerDossier($did);


?>

<div class="row">


    <div class="col-12 text-center">
        <h2 class="my-2">Dossier</h2>
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

        <form action="" class="form-rtl arabic-label text-right">

            <div class="row">
                <div class="col-11 mt-3 mx-auto">

                    <!--Row 1-->
                    <div class="row">

                        <div class="col-3">
                            <div class="form-group row form-rtl">
                                <label for="" class="col-2 col-form-label">رقم</label>
                                <div class="col-10 ">
                                    <label for="" class=" font-weight-bold col-form-label border border-secondary rounded px-3"><?php echo $dossier->getNumero() ?></label>
                                </div>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group row form-rtl row">
                                <label for="" class="col-3 col-form-label">المستغل</label>
                                <div class="col-9">
                                    <label for="" class=" font-weight-bold col-form-label border border-secondary rounded px-3"><?php echo $dossier->getUtilisateur() ?></label>
                                </div>
                            </div>
                        </div>

                        <div class="col-5">
                            <div class="form-group row form-rtl">
                                <label for="numero" class="col-4 col-form-label pl-0">موضوع الرخصة</label>
                                <div class="col-8 pr-0">
                                    <label for="" class=" font-weight-bold col-form-label border border-secondary rounded px-3"><?php echo $dossier->getSujetAutorisation() ?></label>
                                </div>
                            </div>
                        </div>



                    </div>

                    <!--Row 2 -->
                    <div class="row">

                        <div class="col-3">
                            <div class="form-group row form-rtl">
                                <label for="" class="col-5 col-form-label pl-0">رقم القرار</label>
                                <div class="col-7 pr-0">
                                    <label for="" class=" font-weight-bold col-form-label border border-secondary rounded px-3"><?php echo $dossier->getNumeroDecision() ?></label>
                                </div>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group row form-rtl">
                                <label for="numero" class="col-3 col-form-label pl-0">المساحة</label>
                                <div class="col-9 ">
                                    <label for="" class=" font-weight-bold col-form-label border border-secondary rounded px-3"><?php echo $dossier->getSurface() ?></label>
                                </div>
                            </div>
                        </div>

                        <div class="col-5">
                            <div class="form-group row form-rtl">
                                <label for="" class="col-5 col-form-label pl-0">مبلغ الإتاوة السنوية</label>
                                <div class="col-7 pr-0">
                                    <label for="" class=" font-weight-bold col-form-label border border-secondary rounded px-3"><?php echo $dossier->getMontant() ?></label>
                                </div>
                            </div>
                        </div>



                    </div>


                    <!--Row 3 -->
                    <div class="row">

                        <div class="col-6">
                            <div class="form-group row form-rtl">
                                <label for="" class="col-4 col-form-label">تاريخ القرار</label>
                                <div class="col-8">
                                    <label for="" class=" font-weight-bold col-form-label border border-secondary rounded px-3"><?php echo $dossier->getDateDecision() ?></label>
                                </div>

                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group row form-rtl">
                                <label for="numero" class="col-4 col-form-label"> نوعية النشاط</label>
                                <div class="col-8">
                                    <label for="" class=" font-weight-bold col-form-label border border-secondary rounded px-3"><?php echo $dossier->getTypeActivite() ?></label>
                                </div>
                            </div>
                        </div>



                    </div>

                    <!--Row 4 -->
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group row form-rtl">
                                <label for="numero" class="col-4 col-form-label">تاريخ بداية الرخصة</label>
                                <div class="col-8 pr-0">
                                    <label for="" class=" font-weight-bold col-form-label border border-secondary rounded px-3"><?php echo $dossier->getDateDebutAutorisation() ?></label>
                                </div>

                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group row form-rtl">
                                <label for="" class="col-4 col-form-label pl-0">تاريخ إنتهاء الرخصة</label>
                                <div class="col-8 pr-0">
                                    <label for="" class=" font-weight-bold col-form-label border border-secondary rounded px-3"><?php echo $dossier->getDateFinAutorisation() ?></label>
                                </div>

                            </div>
                        </div>


                    </div>

                    <!--Row 5 -->
                    <div class="row">

                        <div class="col-6">
                            <div class="form-group row form-rtl">
                                <label for="" class="col-4 col-form-label">الوضعية الحاليةالوضعية الحالية</label>
                                <div class="col-8">
                                    <textarea name="situation" class = " form-control form-control-sm" rows="3"  readonly required><?php echo $dossier->getSituationActuelle() ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group row form-rtl">
                                <label for="" class="col-4 col-form-label">الإجراءات المتخذة من طرف هذه المديرية</label>
                                <div class="col-8">
                                    <textarea name="situation" class = " form-control form-control-sm" rows="3"  readonly required><?php echo $dossier->getDecisionDeDirection() ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-8 mt-3 mx-auto btn-position">
                            <a href="../controllers/archiverDossier.php?did=<?php echo $dossier->getNumero() ?>" class="btn btn-danger btn-sm float-left mx-2 text-white" role="button" > Archiver </a>
                            <a href="dossier.php?action=modifier&did=<?php echo $dossier->getNumero() ?>" class="btn btn-secondary btn-sm float-left mx-2 text-white" role="button">Modifier</a>
                            <a href="paiement.php?action=consulter&did=<?php echo $dossier->getNumero() ?>" class="btn btn-primary btn-sm float-center mx-2 text-white" role="button">Historique de paiements</a>
                            <a href="paiement.php?action=payer&did=<?php echo $dossier->getNumero() ?>" class="btn btn-warning btn-sm float-right mx-2 text-white" role="button">Payer</a>
                        </div>
                    </div>


                </div>
            </div>
        </form>
    </div>
</div>
