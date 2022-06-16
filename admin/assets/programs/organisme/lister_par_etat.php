<?php session_start(); ob_start();
require '../../libraries/database_lib.php';
require '../../libraries/exception_lib.php';
require '../../libraries/security_lib.php';
require '../../libraries/strings_lib.php';
require '../../models/organisme.php';
require '../../services/organisme_services.php';
require '../../displays/organisme_displays.php';

$etat = isset($_POST['etat']) ? $_POST['etat'] : 1;
$title = ($etat == 0) ? 'Organisme à activer' : 'Organisme en vigueur';
echo organisme_displays::display_list(organisme_services::lister_par_etat($etat), $title);