<?php session_start(); ob_start();
require '../../libraries/database_lib.php';
require '../../libraries/exception_lib.php';
require '../../libraries/security_lib.php';
require '../../libraries/strings_lib.php';
require '../../models/utilisateur.php';
require '../../services/utilisateur_services.php';
require '../../displays/utilisateur_displays.php';

$conf = isset($_POST['conf']) ? $_POST['conf'] : header('location: ../../../message.php?cd=0&msg=Confirmez votre mot de passe !');
$user = utilisateur_displays::generate_object();
$etatop = ($conf == $user->password) ? utilisateur_services::ajouter($user) : header('location: ../../../message.php?cd=0&msg=ERREUR !');
strings_lib::display_message($etatop);
