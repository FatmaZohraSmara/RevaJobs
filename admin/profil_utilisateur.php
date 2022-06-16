<?php session_start(); ob_start();
$user = isset($_SESSION['connected']) ? $_SESSION['connected'] : header('location: message.php?cd=0&msg=Accès Refusé !!!');
?>
<div class="container-fluid position-relative bg-white d-flex p-0">
    <!-- Sign Up Start -->
    <div class="container-fluid">
        <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
            <div>
                <form action="assets/programs/utilisateur/modifier.php" method="POST">
                    <input type="hidden" name="id__" value="<?php $user->id_utilisateur; ?>" readonly required>
                    <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="index.php" class="">
                                <h3 class="text-primary">REVA-JOBS</h3>
                            </a>
                            <h3>Mon profil</h3>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="nom_" class="form-control" id="nom_" placeholder="Nom" value="<?php echo $user->nom_utilisateur; ?>" required>
                            <label for="floatingText">Nom</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="pren" class="form-control" id="pren" placeholder="Prénom" value="<?php echo $user->prenon_utilisateur; ?>">
                            <label for="floatingText">Prénom</label>
                        </div> 
                        <div class="form-floating mb-3">
                            <input type="date" name="dnai" class="form-control" id="dnai" placeholder="jhondoe" value="<?php echo $user->date_naissance_utilisateur; ?>">
                            <label for="floatingText">Date naissance</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="mobi" class="form-control" id="mobi" placeholder="jhondoe" value="<?php echo $user->mobile_utilisateur; ?>">
                            <label for="floatingText">Mobile</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" name="emai" class="form-control" id="emai" placeholder="name@example.com" value="<?php echo $user->email_utilisateur; ?>">
                            <label for="floatingInput">E-mail</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="adrs" class="form-control" id="adrs" placeholder="jhondoe" value="<?php echo $user->adresse_utilisateur; ?>">
                            <label for="floatingText">Adresse</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="cpos" class="form-control" id="cpos" placeholder="jhondoe" value="<?php echo $user->code_postal_utilisateur; ?>">
                            <label for="floatingText">Code postal</label>
                        </div>
                        
                        <div class="form-floating mb-3">
                            <select name="sitf" id="sitf" class="form-control">
                                <option value="0">Choisissez votre situation familliale</option>
                                <option value="1">Célibataire</option>
                                <option value="2">Marié(e)</option>
                                <option value="3">Divorcé(e)</option>
                                <option value="4">Veuf(e)</option>
                            </select>
                            <label for="floatingText">Situation familliale</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="logn" class="form-control" id="login" placeholder="Login" value="<?php echo $user->login_utilisateur; ?>">
                            <label for="floatingInput">Login</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="password" name="pswr" class="form-control" id="pswr" placeholder="Créer un mode passe">
                            <label for="floatingPassword">Ancien mot de passe</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="password" name="conf" class="form-control" id="floatingPassword" placeholder="Créer un mode passe">
                            <label for="floatingPassword">Nouveau mot de passe</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="password" name="conf" class="form-control" id="floatingPassword" placeholder="Créer un mode passe">
                            <label for="floatingPassword">Confirmer le nouveau mot de passe</label>
                        </div>
                        <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Modifier</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Sign Up End -->
</div>