<?php session_start(); ob_start();
require '../../libraries/database_lib.php';
require '../../libraries/exception_lib.php';
require '../../libraries/security_lib.php';
require '../../libraries/strings_lib.php';

require '../../models/offre.php';
require '../../services/offre_services.php';
require '../../displays/offre_displays.php';

$ido = isset($_POST['ido']) ? $_POST['ido'] : 1;
echo offre_displays::display_list(offre_services::lister_par_organisme($ido));

