<?php session_start(); ob_start();
require '../../libraries/database_lib.php';
require '../../libraries/exception_lib.php';
require '../../libraries/security_lib.php';
require '../../libraries/strings_lib.php';
require '../../models/utilisateur.php';
require '../../services/utilisateur_services.php';
require '../../displays/utilisateur_displays.php';

$keywords = isset($_POST['kw']) ? $_POST['kw'] : '';
echo utilisateur_displays::display_list(utilisateur_services::chercher($keywords));
