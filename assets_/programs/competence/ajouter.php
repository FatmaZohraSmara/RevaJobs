<?php session_start(); ob_start();
require '../../libraries/database_lib.php';
require '../../libraries/exception_lib.php';
require '../../libraries/security_lib.php';
require '../../libraries/strings_lib.php';

require '../../models/competence.php';
require '../../services/competence_services.php';
require '../../displays/competence_displays.php';

//var_dump(competence_displays::generate_object());

echo strings_lib::display_message(competence_services::ajouter(competence_displays::generate_object()));