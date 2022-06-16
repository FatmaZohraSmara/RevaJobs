<?php session_start(); ob_start();
$user = isset($_SESSION['connected']) ? $_SESSION['connected'] : header('location: message.php?cd=0&msg=Accès Refusé !!!');
?>
<div class="container-fluid position-relative bg-white d-flex p-0">
    <!-- Sign Up Start -->
    <div class="container-fluid">
        <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
            <div>
                <form action="assets/programs/competence/modifier.php" method="POST">
                    <input type="hidden" name="id__" value="<?php $user->id_competence; ?>" readonly required>
                    <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h3>Mon profil</h3>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="inti" class="form-control" id="inti" placeholder="jhondoe"value="<?php echo $user->intitule_competence; ?>" required>
                            <label for="floatingText">Intitulé</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="dscr" class="form-control" id="dscr" placeholder="jhondoe"value="<?php echo $user->description_competence; ?>">
                            <label for="floatingText">Description</label>
                        </div> 
                        <div class="form-floating mb-3">
                            <input type="text" name="nive" class="form-control" id="nive" placeholder="jhondoe"value="<?php echo $user->niveau_competence; ?>">
                            <label for="floatingText">Niveau</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="date" name="ddeb" class="form-control" id="ddeb" placeholder="jhondoe"value="<?php echo $user->date_debut_competence; ?>">
                            <label for="floatingText">Date debut</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="date" name="dfin" class="form-control" id="dfin" placeholder="jhondoe"value="<?php echo $user->date_fin_competence; ?>">
                            <label for="floatingInput">Date fin</label>
                        </div>
                        <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Modifier</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Sign Up End -->
</div>