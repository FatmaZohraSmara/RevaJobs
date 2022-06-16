<?php session_start(); ob_start();
require '../../libraries/database_lib.php';
require '../../libraries/exception_lib.php';
require '../../libraries/security_lib.php';
require '../../libraries/strings_lib.php';
require '../../models/organisme.php';
require '../../services/organisme_services.php';
require '../../displays/organisme_displays.php';

$id   = isset($_POST['id']) ? $_POST['id'] : 3;
$etat = isset($_POST['etat']) ? $_POST['etat'] : 0;

echo strings_lib::display_message(organisme_services::modifier_etat($id, $etat));
