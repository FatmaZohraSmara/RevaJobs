<?php session_start(); ob_start();
require '../../libraries/database_lib.php';
require '../../libraries/exception_lib.php';
require '../../libraries/security_lib.php';
require '../../libraries/strings_lib.php';

require '../../models/test.php';
require '../../services/test_services.php';
require '../../displays/test_displays.php';

$id = isset($_POST['id']) ? $_POST['id'] : 1;
echo test_displays::display_one(test_services::consulter($id));
