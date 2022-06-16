<?php session_start(); ob_start();

require '../../libraries/database_lib.php';
require '../../libraries/exception_lib.php';
require '../../libraries/security_lib.php';
require '../../libraries/strings_lib.php';

require '../../models/candidature.php';
require '../../services/candidature_services.php';
require '../../displays/candidature_displays.php';

echo  candidature_services::ajouter(candidature_displays::generate_object()) ? 'OPERATION TERMINEE AVEC SUCCES !' : 'ECHEC DE L\'OPERATION !';