<?php session_start(); ob_start();
require '../../libraries/database_lib.php';
require '../../libraries/exception_lib.php';
require '../../libraries/security_lib.php';
require '../../libraries/strings_lib.php';
require '../../models/organisme.php';
require '../../services/organisme_services.php';
require '../../displays/organisme_displays.php';

$keywords = isset($_POST['kw']) ? $_POST['kw'] : '';
echo organisme_displays::display_list(organisme_services::chercher($keywords));
