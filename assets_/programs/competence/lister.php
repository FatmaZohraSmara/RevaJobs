<?php session_start(); ob_start();
require '../../libraries/database_lib.php';
require '../../libraries/exception_lib.php';
require '../../libraries/security_lib.php';
require '../../libraries/strings_lib.php';

require '../../models/competence.php';
require '../../services/competence_services.php';
require '../../displays/competence_displays.php';

$idcandidat = isset($_POST['idcandidat']) ? $_POST['idcandidat'] : 0;
echo competence_displays::display_list(competence_services::lister($idcandidat));

