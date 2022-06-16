<?php session_start(); ob_start();
require '../../libraries/database_lib.php';
require '../../libraries/exception_lib.php';
require '../../libraries/security_lib.php';
require '../../libraries/strings_lib.php';

require '../../models/competence.php';
require '../../services/competence_services.php';
require '../../displays/competence_displays.php';

$idcomp = isset($_POST['idcomp']) ? $_POST['idcomp'] : 0;
$tpcomp = isset($_POST['tpcomp']) ? $_POST['tpcomp'] : 0;
$idcand = isset($_POST['idcand']) ? $_POST['idcand'] : 0;
$ddcomp = isset($_POST['ddcomp']) ? $_POST['ddcomp'] : 0;
$dfcomp = isset($_POST['dfcomp']) ? $_POST['dfcomp'] : 0;

echo competence_services::supprimer($idcomp, $tpcomp, $idcand, $ddcomp, $dfcomp) ? 
     'OPERATION TERMINEE AVEC SUCCES !' : 
     'ECHEC DE L\'OPERATION !';
