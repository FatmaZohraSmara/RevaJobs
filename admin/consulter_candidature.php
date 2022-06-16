<?php session_start(); ob_start();
$user = isset($_SESSION['connected']) ? $_SESSION['connected'] : header('location: message.php?cd=0&msg=Accès Refusé !!!');
?>
<div class="container-fluid position-relative bg-white d-flex p-0">
    <!-- Sign Up Start -->
    <div class="container-fluid">
        <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
            <div>
                <form action="assets/programs/candidature/modifier.php" method="POST">
                    <input type="hidden" name="id__" value="<?php $user->id_candidature; ?>" readonly required>
                    <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h3>Ma candidature</h3>
                        </div>
                        <div class="form-floating mb-3">
                              <input type="text" name="eval" class="form-control" id="eval" placeholder="jhondoe" value="<?php echo $user->evaluation_cantidature; ?>" required>
                              <label for="floatingText">Evaluation</label>
                          </div>
                          <div class="form-floating mb-3">
                              <input type="date" name="drep" class="form-control" id="drep" placeholder="jhondoe" value="<?php echo $user->date_reponse_cantidature; ?>">
                              <label for="floatingText">Date reponse</label>
                          </div>
                          <div class="form-floating mb-3">
                              <input type="text" name="repn" class="form-control" id="repn" placeholder="jhondoe" value="<?php echo $user->reponse_cantidature; ?>">
                              <label for="floatingText">Reponse</label>
                          </div>
                          <div class="form-floating mb-3">
                              <input type="date" name="dent" class="form-control" id="dent" placeholder="jhondoe" value="<?php echo $user->date_entretien_cantidature; ?>">
                              <label for="floatingText">Date entretien</label>
                          </div>
                          <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Modifier</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Sign Up End -->
</div>