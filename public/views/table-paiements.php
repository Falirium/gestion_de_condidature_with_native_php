<?php
require __DIR__ . "/../../vendor/autoload.php";
$paiementDoa = \App\models\paiement\PaiementDaoFactory::getDossierDaoFactory('mysql');

//Check if did exists to show paiements for a specific dossier
if (isset($_GET['did'])) {
    $did = $_GET['did'];
    $paiements = $paiementDoa->AfficherPaiementsParDossier($did);
} else {
    $paiements = $paiementDoa->afficherTousPaiements();
}



?>



                    <div class="row h-100">


                        <div class="col-12 text-center align-self-start">
                            <h2 class="my-2 mb-3">Paiement</h2>
                            <div class="rwo">
                                <form action="" class="form-inline">

                                    <div class="col-12 ">
                                        <input type="text" class="w-25 form-control form-control-sm float-right mr-4" placeholder="search...">
                                    </div>
                                </form>

                            </div>
                        </div>

                        <div class="col-11 mx-auto align-self-start h-75 my-custom-scrollbar">
                            <table class="table table-striped ">
                                <thead>
                                <tr>
                                    <th scope="col" >Num</th>
                                    <th scope="col" >N° de dossier</th>
                                    <th scope="col" >Beneficiaire</th>
                                    <th scope="col" >Montant</th>
                                    <th scope="col" >Redevance</th>
                                    <th scope="col" ></th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        foreach ($paiements as $paiement) {
                                            $pid = $paiement->getId();
                                            $dossier = $paiementDoa->selectionnerDossierParPaiment($pid);

                                            $row = "<tr><td>" . $paiement->getId() . "</td>"
                                                . "<td>" . $dossier->getNumero() . "</td>"
                                                . "<td>" . $dossier->getUtilisateur() . "</td>"
                                                . "<td>" . $dossier->getMontant() . "</td>"
                                                . "<td>" . $paiement->getRedevance() . "</td>"
                                                .'<td class="p-2 pr-4 text-center"><a href="paiement.php?action=consulter&pid='.$paiement->getId().'" class="w-100 table-btn btn btn-success btn-sm text-white" role="button">Consulter</a></td>';
        
                                            echo $row;
                                        }
    
    
                                    ?>
                                </tbody>

                        </div>
                    </div>


