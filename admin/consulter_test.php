<?php session_start(); ob_start();
$user = isset($_SESSION['connected']) ? $_SESSION['connected'] : header('location: message.php?cd=0&msg=Accès Refusé !!!');
?>
<div class="container-fluid position-relative bg-white d-flex p-0">
    <!-- Sign Up Start -->
    <div class="container-fluid">
        <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
            <div>
                <form action="assets/programs/test/modifier.php" method="POST">
                    <input type="hidden" name="id__" value="<?php $user->id_utilisateur; ?>" readonly required>
                    <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h3>Mon profil</h3>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="enno" class="form-control" id="enno" placeholder="jhondoe" value="<?php echo $user->ennonce_test; ?>" required>
                            <label for="floatingText">Ennoncé</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="imge" class="form-control" id="imge" placeholder="jhondoe" value="<?php echo $user->image_test; ?>">
                            <label for="floatingText">Image</label>
                        </div> 
                        <div class="form-floating mb-3">
                            <input type="text" name="rep1" class="form-control" id="rep1" placeholder="jhondoe" value="<?php echo $user->reponse1_test; ?>">
                            <label for="floatingText">Reponse 1</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="rep2" class="form-control" id="rep2" placeholder="jhondoe" value="<?php echo $user->reponse2_test; ?>">
                            <label for="floatingText">Reponse 2</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="rep3" class="form-control" id="rep3" placeholder="jhondoe" value="<?php echo $user->reponse3_test; ?>">
                            <label for="floatingInput">Reponse 3</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="repv" class="form-control" id="repv" placeholder="jhondoe" value="<?php echo $user->reponse_valide_test; ?>">
                            <label for="floatingInput">Reponse valide</label>
                        </div>
                        <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Modifier</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Sign Up End -->
</div>