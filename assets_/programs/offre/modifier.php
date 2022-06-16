<?php session_start(); ob_start();
require '../../libraries/database_lib.php';
require '../../libraries/exception_lib.php';
require '../../libraries/security_lib.php';
require '../../libraries/strings_lib.php';

require '../../models/offre.php';
require '../../services/offre_services.php';
require '../../displays/offre_displays.php';

var_dump(offre_services::modifier(offre_displays::generate_object()));

//echo strings_lib::display_message(offre_services::modifier(offre_displays::generate_object()));
