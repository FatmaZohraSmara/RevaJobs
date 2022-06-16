<?php session_start(); ob_start();
$user = isset($_SESSION['connected']) ? $_SESSION['connected'] : header('location: message.php?cd=0&msg=Accès Refusé !!!');
?>
<!-- Sign Up Start -->
<div class="container-fluid">
    <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
        <div class="col-12">
            <form action="assets/programs/organisme/ajouter.php" method="POST">
            <input type="hidden" name="recr" value="<?php echo $user->id_utilisateur; ?>">
            <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <a href="index.php" class="">
                        <h3 class="text-primary">REVA-JOBS</h3>
                    </a>
                    <h3> Organisme </h3>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="rais" class="form-control" id="rais" placeholder="jhondoe"           >
                    <label for="floatingText">Raison sociale</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="file" name="logo" class="form-control" id="logo" placeholder="jhondoe"           >
                    <label for="floatingText">Logo</label>
                </div> 
                <div class="form-floating mb-3">
                    <input type="text" name="spec" class="form-control" id="spec" placeholder="jhondoe"           >
                    <label for="floatingText">Specialité</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="fixe" class="form-control" id="fixe" placeholder="jhondoe"           >
                    <label for="floatingText">Fixe</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="fax" class="form-control" id="fax" placeholder="jhondoe"             >
                    <label for="floatingText">Fax</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" name="emai" class="form-control" id="emai" placeholder="name@example.com" >
                    <label for="floatingInput"> E-mail </label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="adrs" class="form-control" id="adrs" placeholder="jhondoe"           >
                    <label for="floatingText">Adresse</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="cpos" class="form-control" id="cpos" placeholder="jhondoe"           >
                    <label for="floatingText">Code postal</label>
                </div>
                <div class="form-floating mb-4">
                    <input type="text" name="nrc_" class="form-control" id="nrc_" placeholder="jhondoe"           >
                    <label for="floatingPassword">NRC</label>
                </div>
                <div class="form-floating mb-4">
                    <input type="text" name="rib_" class="form-control" id="rib_" placeholder="jhondoe"           >
                    <label for="floatingPassword">RIB</label>
                </div>
                <button type="submit" class="btn btn-primary py-3 w-100 mb-4">S'inscrire</button>
                <!--p class="text-center mb-0"><a href=""></a></p-->
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Sign Up End -->