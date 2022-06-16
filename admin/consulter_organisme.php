<?php session_start(); ob_start();
$user = isset($_SESSION['connected']) ? $_SESSION['connected'] : header('location: message.php?cd=0&msg=Accès Refusé !!!');
?>
<div class="container-fluid position-relative bg-white d-flex p-0">
    <!-- Sign Up Start -->
    <div class="container-fluid">
        <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
            <div>
                <form action="assets/programs/organisme/modifier.php" method="POST">
                    <input type="hidden" name="id__" value="<?php $user->id_organisme; ?>" readonly required>
                    <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h3>Mon profil</h3>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="rais" class="form-control" id="rais" placeholder="jhondoe" value="<?php echo $user->raison_sociale_organisme; ?>" required>
                            <label for="floatingText">Raison sociale</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="logo" class="form-control" id="logo" placeholder="jhondoe" value="<?php echo $user->logo_organisme; ?>">
                            <label for="floatingText">Logo</label>
                        </div> 
                        <div class="form-floating mb-3">
                            <input type="text" name="spec" class="form-control" id="spec" placeholder="jhondoe" value="<?php echo $user->specialite_organisme; ?>">
                            <label for="floatingText">Specialité</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="fixe" class="form-control" id="fixe" placeholder="jhondoe" value="<?php echo $user->fixe_organisme; ?>">
                            <label for="floatingText">Fixe</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="fax" class="form-control" id="fax" placeholder="jhondoe" value="<?php echo $user->fax_organisme; ?>">
                            <label for="floatingText">Fax</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" name="emai" class="form-control" id="emai" placeholder="name@example.com" value="<?php echo $user->email_organisme; ?>">
                            <label for="floatingInput"> E-mail </label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="adrs" class="form-control" id="adrs" placeholder="jhondoe" value="<?php echo $user->adresse_organisme; ?>">
                            <label for="floatingText">Adresse</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="cpos" class="form-control" id="cpos" placeholder="jhondoe" value="<?php echo $user->code_postal_organisme; ?>">
                            <label for="floatingText">Code postal</label>
                        </div>
                        <div> 
                            <input type="text" name="nrc_" class="form-control" id="nrc_" placeholder="jhondoe" value="<?php echo $user->nrc_organisme; ?>">
                            <label for="floatingInput"> NRC </label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="text" name="rib_" class="form-control" id="rib_" placeholder="jhondoe" value="<?php echo $user->rib_organisme; ?>">
                            <label for="floatingPassword">RIB</label>
                        </div>
                        <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Modifier</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Sign Up End -->
</div>