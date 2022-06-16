<?php session_start(); ob_start();
require '../../libraries/database_lib.php';
require '../../libraries/exception_lib.php';
require '../../libraries/security_lib.php';
require '../../libraries/strings_lib.php';
require '../../models/utilisateur.php';
require '../../services/utilisateur_services.php';
require '../../displays/utilisateur_displays.php';

$etat = isset($_POST['etat']) ? $_POST['etat'] : 1;
$cdp  = isset($_POST['cdp']) ? $_POST['cdp'] : "01091997";
$title = ($etat == 0) ? 'Utilisateur à activer' : 'Utilisateur en vigueur';
echo utilisateur_displays::display_list(utilisateur_services::lister($etat, $type), $title);

