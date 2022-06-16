<?php session_start(); ob_start();
require '../../libraries/database_lib.php';
require '../../libraries/exception_lib.php';
require '../../libraries/security_lib.php';
require '../../libraries/strings_lib.php';
require '../../models/test.php';
require '../../services/test_services.php';
require '../../displays/test_displays.php';

$ido = isset($_POST['ido']) ? $_POST['ido'] : 0;
echo test_displays::display_list(test_services::lister($ido));

