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

        <form action="../controllers/modifierDossier.php" class="form-rtl arabic-label text-right" method="post">

            <div class="row">
                <div class="col-11 mt-3 mx-auto">

                    <!--Row 1-->
                    <div class="row">

                        <div class="col-3">
                            <div class="form-group row form-rtl">
                                <label for="" class="col-2 col-form-label">رقم</label>
                                <div class="col-10">
                                    <input type="text" name="num" class = "form-control form-control-sm" value="<?php echo $dossier->getNumero() ?>" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group row form-rtl row">
                                <label for="" class="col-3 col-form-label">المستغل</label>
                                <div class="col-9">
                                    <input type="text" name="prenom" class = "form-control form-control-sm" value="<?php echo $dossier->getUtilisateur() ?>" required>
                                    <!--<div class="invalid-feedback">Please choose a username</div> -->
                                </div>
                            </div>
                        </div>

                        <div class="col-5">
                            <div class="form-group row form-rtl">
                                <label for="numero" class="col-4 col-form-label pl-0">موضوع الرخصة</label>
                                <div class="col-8 pr-0">
                                    <input type="text" name="sujet" class = "form-control form-control-sm" value="<?php echo $dossier->getSujetAutorisation() ?>" required>
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
                                    <input type="text" name="numero" class = "form-control form-control-sm" value="<?php echo $dossier->getNumeroDecision() ?>" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group row form-rtl">
                                <label for="numero" class="col-3 col-form-label pl-0">المساحة</label>
                                <div class="col-9 ">
                                    <input type="text" name="surface" class = "form-control form-control-sm" value="<?php echo $dossier->getSurface() ?>" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-5">
                            <div class="form-group row form-rtl">
                                <label for="" class="col-5 col-form-label pl-0">مبلغ الإتاوة السنوية</label>
                                <div class="col-7 pr-0">
                                    <input type="text" name="montant" class = "form-control form-control-sm" value="<?php echo $dossier->getMontant() ?>" required>
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
                                    <input type="date" name="dd" class = "form-control form-control-sm" value="<?php echo $dossier->getDateDecision() ?>" required>
                                </div>

                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group row form-rtl">
                                <label for="numero" class="col-4 col-form-label"> نوعية النشاط</label>
                                <div class="col-8">
                                    <select name="activite" class = "custom-select custom-select-sm" required>
                                        <option value="activite"> : نوعية النشاط </option>
                                        <option value="أنشطة سياحية">أنشطة سياحية </option>
                                        <option value="أنشطة تجارية">أنشطة تجارية</option>
                                        <option value="مصانع">مصانع</option>
                                        <option value="نقط تفريغ الأسماك ">نقط تفريغ الأسماك </option>
                                        <option value="محطة الضخ">محطة الضخ </option>
                                    </select>
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
                                    <input type="date" name="dda" class = "form-control form-control-sm" value="<?php echo $dossier->getDateDebutAutorisation() ?>" required>
                                </div>

                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group row form-rtl">
                                <label for="" class="col-4 col-form-label pl-0">تاريخ إنتهاء الرخصة</label>
                                <div class="col-8 pr-0">
                                    <input type="date" name="dfa" class = "form-control form-control-sm" value="<?php echo $dossier->getDateFinAutorisation() ?>" required>
                                </div>

                            </div>
                        </div>


                    </div>

                    <!--Row 5 -->
                    <div class="row">

                        <div class="col-6">
                            <div class="form-group row form-rtl">
                                <label for="" class="col-4 col-form-label">الوضعية الحالية</label>
                                <div class="col-8">
                                    <textarea name="situation" class = "form-control form-control-sm" rows="3" required><?php echo $dossier->getSituationActuelle() ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group row form-rtl">
                                <label for="" class="col-4 col-form-label">الإجراءات المتخذة من طرف هذه المديرية</label>
                                <div class="col-8">
                                    <textarea name="decision" class = "form-control form-control-sm" rows="3" required><?php echo $dossier->getDecisionDeDirection() ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 mt-3 mx-auto">
                            <button class="btn btn-success btn-sm mx-auto" type="submit">Modifier dossier</button>
                        </div>
                    </div>








                </div>
            </div>
        </form>
    </div>
</div>
