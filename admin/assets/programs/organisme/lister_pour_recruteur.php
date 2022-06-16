<?php session_start(); ob_start();
require '../../libraries/database_lib.php';
require '../../libraries/exception_lib.php';
require '../../libraries/security_lib.php';
require '../../libraries/strings_lib.php';
require '../../models/organisme.php';
require '../../services/organisme_services.php';
require '../../displays/organisme_displays.php';

$idr = isset($_POST['idr']) ? $_POST['idr'] : 1;
$title = 'Mes organismes';
echo organisme_displays::display_list_for_recruteur(organisme_services::lister_par_recruteur($idr), $title);