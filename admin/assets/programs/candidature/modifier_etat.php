<?php session_start(); ob_start();

require '../../libraries/database_lib.php';
require '../../libraries/exception_lib.php';
require '../../libraries/security_lib.php';
require '../../libraries/strings_lib.php';

require '../../models/candidature.php';
require '../../services/candidature_services.php';
require '../../displays/candidature_displays.php';

$id = isset($_POST['id']) ? $_POST['id'] : 1;

echo strings_lib::display_message(candidature_services::modifier_etat($id, $etat));

