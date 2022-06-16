<?php session_start(); ob_start();
require '../../libraries/database_lib.php';
require '../../libraries/exception_lib.php';
require '../../libraries/security_lib.php';
require '../../libraries/strings_lib.php';

require '../../models/candidature.php';
require '../../services/candidature_services.php';
require '../../displays/candidature_displays.php';

$id = isset($_POST['id']) ? $_POST['id'] : 20;
echo candidature_services::supprimer($id) ? 'OPERATION TERMINEE AVEC SUCCES !' : 'ECHEC DE L\'OPERATION !';
