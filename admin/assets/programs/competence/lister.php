<?php session_start(); ob_start();
require '../../libraries/database_lib.php';
require '../../libraries/exception_lib.php';
require '../../libraries/security_lib.php';
require '../../libraries/strings_lib.php';

require '../../models/competence.php';
require '../../services/competence_services.php';
require '../../displays/competence_displays.php';

$id = isset($_POST['id']) ? $_POST['id'] : 0;
$title = isset($_POST['title']) ? $_POST['title'] : 'Liste des compétences';
echo competence_displays::display_list(competence_services::lister($id), $title);

