<?php session_start(); ob_start();

require '../../libraries/database_lib.php';
require '../../libraries/exception_lib.php';
require '../../libraries/security_lib.php';
require '../../libraries/strings_lib.php';

require '../../models/candidature.php';
require '../../services/candidature_services.php';
require '../../displays/candidature_displays.php';

$idc = isset($_POST['idc']) ? $_POST['idc'] : 0;
$ido = isset($_POST['ido']) ? $_POST['ido'] : 0;
echo candidature_displays::display_list(candidature_services::lister($idc, $ido));

