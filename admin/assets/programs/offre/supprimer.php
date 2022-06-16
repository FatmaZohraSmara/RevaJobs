<?php session_start(); ob_start();
require '../../libraries/database_lib.php';
require '../../libraries/exception_lib.php';
require '../../libraries/security_lib.php';
require '../../libraries/strings_lib.php';

require '../../models/offre.php';
require '../../services/offre_services.php';
require '../../displays/offre_displays.php';

$id = isset($_POST['id']) ? $_POST['id'] : 1;

echo strings_lib::display_message(offre_services::supprimer($id));