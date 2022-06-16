<?php session_start(); ob_start();
$user = isset($_SESSION['connected']) ? $_SESSION['connected'] : header('location: ../index.html');
$nom = $user->prenon_utilisateur." ".$user->nom_utilisateur;
$type = display_label_type($user->type_utilisateur);
$html_navbar = display_navbar($user->id_utilisateur, $user->type_utilisateur);
$html_search = display_inputs_search($user->type_utilisateur);
$html_score = ($user->type_utilisateur == 1) ? '<small>Score : '.$user->valeur_utilisateur.'</small><br>' : '';
$html_diplome = ($user->type_utilisateur == 1) ? '<small>Nombre diplômes : '.$user->diplome_utilisateur.'</small>' : '';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>REVA-JOBS</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <input type="hidden" id="idcon" value="<?php echo $user->id_utilisateur; // Identifiant connecté ?>" readonly />
    <input type="hidden" id="vlcon" value="<?php echo $user->valeur_utilisateur; // Valeur connecté ?>" readonly />
    <input type="hidden" id="adcon" value="<?php echo $user->diplome_utilisateur; // Valeur connecté ?>" readonly />
    <input type="hidden" id="tpcon" value="<?php echo $user->type_utilisateur; // Type connecté ?>" readonly />
    <div class="container-fluid position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary">REVA-JOBS</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0"><?php echo $nom; ?></h6>
                        <span><?php echo $type; ?></span><br>
                        <?php echo $html_score.$html_diplome; ?>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <?php echo $html_navbar; ?>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->

        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <form class="d-none d-md-flex ms-4">
                    <?php echo $html_search; ?>
                    <!--input class="form-control border-0" type="search" placeholder="Search"-->
                </form>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex"><?php echo $nom; ?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item" onclick="consulter_utilisateur();">My Profile</a>
                            <a href="#" class="dropdown-item" onclick="deconnecter_utilisateur();">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->


            <!-- Display results Start -->
            <div id="displays" class="container-fluid pt-4 px-4" style="min-height: 900px;">
            </div>
            <!-- Display results End -->

            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="index.php">REVA-JOBS</a>, Tous droits réservés 2021-2022. 
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                            Designed By <a href="#">Fatma Zohra SMARA</a><br>
                            Etudiante en licence informatique<br>
                            Université Badji Mokhtar Annaba
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="js/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script src="js/global.js"></script>
    <script src="js/candidature.js"></script>
    <script src="js/competence.js"></script>
    <script src="js/offre.js"></script>
    <script src="js/organisme.js"></script>
    <script src="js/test.js"></script>
    <script src="js/utilisateur.js"></script>
</body>

</html>
<?php 
function display_inputs_search($type)
{ 
    $html = '';

    switch ($type) 
    {
        case 1: $html = '
        <input id="input-search-offers" 
               class="form-control border-0" 
               type="search" 
               placeholder="Chercher des offres"
               onkeyup="chercher_offres();">'; break;
        case 3: $html = '
        <input id="input-search-organisms" 
               class="form-control border-0" 
               type="search" 
               placeholder="Chercher des organismes" 
               onkeyup="chercher_organismes();">
        <input id="input-search-users" 
               class="form-control border-0" 
               type="search" 
               placeholder="Chercher des utilisateurs"
               onkeyup="chercher_utilisateurs();"
               style="margin: 0px 20px;">'; break;
    }

    return $html;
}

function display_navbar($id, $code)
{
    $html = "";


    switch ($code) 
    {
        case 0: $html = header('location: message.php?cd=0&msg=Accès Refusé !!!'); break;
        case 1: $html = display_navbar_items_for_candidat($id); break;
        case 2: $html = display_navbar_items_for_recruteur($id); break;
        case 3: $html = display_navbar_items_for_admin();                          break;
    }

    return $html;
}

function display_navbar_items_for_candidat($id)
{
    return '
    <a href="#" class="nav-item nav-link" onclick="lister_competences_pour_candidat('.$id.', \'Mes compétences\');">
        Mes compétences
    </a>
    <a href="#" class="nav-item nav-link" onclick="lister_candidatures_pour_candidat('.$id.', 0);">
        Mes candidatures
    </a>
    <a href="#" class="nav-item nav-link" onclick="lister_offres_en_vigueur();">
        Offres en vigueur
    </a>';
}

function display_navbar_items_for_recruteur()
{
    return '
    <a href="#" class="nav-item nav-link" onclick="lister_organismes_par_recruteur();">
        Mes Organismes
    </a>';
}

function display_navbar_items_for_admin()
{
    return '
    <a href="#" class="nav-item nav-link" onclick="lister_organismes_par_etat(0);">
        Organismes à valider
    </a>
    <a href="#" class="nav-item nav-link" onclick="lister_organismes_par_etat(1);">
        Organismes en activté
    </a>
    <hr>
    <a href="#" class="nav-item nav-link" onclick="lister_utilisateurs_par_etat(0);">
        Utilisateurs archivés
    </a>
    <a href="#" class="nav-item nav-link" onclick="lister_utilisateurs_par_etat(1);">
        Utilisateurs activés
    </a>
    <hr>
    <a href="#" class="nav-item nav-link" onclick="lister_offres();">
        Offres en vigueur
    </a>';
}

function display_label_type($code)
{
    $label = "";

    switch ($code) 
    {
        case 0: $label = header('location: message.php?cd=0&msg=Accès Refusé !!!'); break;
        case 1: $label = "Candidat";             break;
        case 2: $label = "Recruteur";            break;
        case 3: $label = "Administrateur";       break;
    }

    return $label;
}
 ?>