<?php session_start(); ob_start();
require '../../libraries/database_lib.php';
require '../../libraries/exception_lib.php';
require '../../libraries/security_lib.php';
require '../../libraries/strings_lib.php';
require '../../models/utilisateur.php';
require '../../services/utilisateur_services.php';
require '../../displays/utilisateur_displays.php';

$id   = isset($_POST['id']) ? $_POST['id'] : 4;
$etat = isset($_POST['etat']) ? $_POST['etat'] : 1;

echo strings_lib::display_message(utilisateur_services::modifier_etat($id, $etat));
