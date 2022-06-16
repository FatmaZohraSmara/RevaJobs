<?php session_start(); ob_start();
$user = isset($_SESSION['connected']) ? $_SESSION['connected'] : header('location: message.php?cd=0&msg=Accès Refusé !!!');
?>
<div class="container-fluid position-relative bg-white d-flex p-0">
    <!-- Sign Up Start -->
    <div class="container-fluid">
        <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
            <div>
                <form action="assets/programs/offre/modifier.php" method="POST">
                    <input type="hidden" name="id__" value="<?php $user->id_offre; ?>" readonly required>
                    <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h3> offre </h3>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="inti" class="form-control" id="inti" placeholder="jhondoe" value="<?php echo $user->intitule_poste_offre; ?>" required>
                            <label for="floatingText">Intitulé</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="dscr" class="form-control" id="dscr" placeholder="jhondoe" value="<?php echo $user->description_offre; ?>">
                            <label for="floatingText">Description</label>
                        </div> 
                        <div class="form-floating mb-3">
                            <input type="text" name="coor" class="form-control" id="coor" placeholder="jhondoe" value="<?php echo $user->coordonnees_offre; ?>">
                            <label for="floatingText">Coordonnées</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="date" name="ddeb" class="form-control" id="ddeb" placeholder="jhondoe" value="<?php echo $user->date_debut_offre; ?>">
                            <label for="floatingText">Date début</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="date" name="dfin" class="form-control" id="dfin" placeholder="jhondoe" value="<?php echo $user->date_fin_offre; ?>">
                            <label for="floatingText">Date fin</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="" name="bmin" class="form-control" id="bmin"     placeholder="jhondoe" value="<?php echo $user->bareme_minimaum_offre; ?>">
                            <label for="floatingInput">Barème minimaum</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="doma" class="form-control" id="doma" placeholder="jhondoe" value="<?php echo $user->domaine_offre; ?>">
                            <label for="floatingText">Domaine</label>
                        </div>
                        <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Modifier</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Sign Up End -->
</div>