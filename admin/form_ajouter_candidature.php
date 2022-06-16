<?php session_start(); ob_start();
$user = isset($_SESSION['connected']) ? $_SESSION['connected'] : header('location: message.php?cd=0&msg=Accès Refusé !!!');
$idoffre = isset($_GET['idoffre']) ? $_GET['idoffre'] : header('location: message.php?cd=0&msg=Accès Refusé !!!');
?>
        <!-- Sign Up Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center">
                <div class="col-12 col-sm-8 col-md-6">
                    <form action="assets/programs/candidature/ajouter.php" method="POST">
                        <input type="hidden" name="cand" value="<?php echo $user->id_utilisateur; ?>">
                        <input type="hidden" name="offr" value="<?php echo $idoffre; ?>">
                    <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="index.php" class="">
                                <h3 class="text-primary">REVA-JOBS</h3>
                            </a>
                            <h3> Candidature </h3>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="eval" class="form-control" id="eval" placeholder="jhondoe">
                            <label for="floatingText">Evaluation</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="date" name="drep" class="form-control" id="drep" placeholder="jhondoe">
                            <label for="floatingText">Date reponse</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="repn" class="form-control" id="repn" placeholder="jhondoe">
                            <label for="floatingText">Reponse</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="date" name="dent" class="form-control" id="dent" placeholder="jhondoe">
                            <label for="floatingText">Date entretien</label>
                        </div>
                        <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Postuler</button>
                        <!--p class="text-center mb-0"><a href="#">Connectez-vous</a></p-->
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Sign Up End -->