<?php session_start(); ob_start();
require '../../libraries/database_lib.php';
require '../../libraries/exception_lib.php';
require '../../libraries/security_lib.php';
require '../../libraries/strings_lib.php';
require '../../models/test.php';
require '../../services/test_services.php';
require '../../displays/test_displays.php';

//var_dump(test_displays::generate_object());
echo strings_lib::display_message(test_services::ajouter(test_displays::generate_object()));