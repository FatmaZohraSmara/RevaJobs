<?php session_start(); ob_start();
$user = isset($_SESSION['connected']) ? $_SESSION['connected'] : header('location: message.php?cd=0&msg=Accès Refusé !!!');
?>
<!-- Sign Up Start -->
<div class="container-fluid">
    <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
        <div class="col-12 col-sm-8 col-md-6 ">
            <form action="assets/programs/competence/ajouter.php" method="POST">
                <input type="hidden" name="cand" value="<?php echo $user->id_utilisateur; ?>">
                <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <a href="index.php" class="">
                            <h3 class="text-primary">REVA-JOBS</h3>
                        </a>
                        <h3> Compétence </h3>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="inti" class="form-control" id="inti" placeholder="jhondoe">
                        <label for="floatingText">Intitulé</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="dscr" class="form-control" id="dscr" placeholder="jhondoe">
                        <label for="floatingText">Description</label>
                    </div> 
                    <div class="form-floating mb-3">
                        <input type="date" name="ddeb" class="form-control" id="ddeb" placeholder="jhondoe">
                        <label for="floatingText">Date debut</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="date" name="dfin" class="form-control" id="dfin" placeholder="jhondoe">
                        <label for="dfin">Date fin</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select name="typ_" id="typ_" class="form-control">
                            <option value="0">Choisir un type</option>
                            <option value="1">Langue A1</option>
                            <option value="3">langue A2</option>
                            <option value="4">langue B1</option>
                            <option value="5">langue B2</option>   
                            <option value="6">langue C1</option>                                                                                                                             
                            <option value="7">Langue C2</option>                                                                                                                             
                            <option value="8">Licence</option>                                                                                                                             
                            <option value="9">Master</option>                                                                                                                             
                            <option value="10">Doctorat</option>                                                                                                                             
                            <option value="11">Expérience</option>                                                                                                                             
                            <option value="12">Maîtrise</option>                                                                                                                             
                            <option value="13">Autres</option>                                                                                                                             
                        </select>       
                        <label for="typ_">  Type de compétence</label>             
                    </div>
                    <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Ajouter</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Sign Up End -->