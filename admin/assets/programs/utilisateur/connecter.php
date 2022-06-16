<?php session_start(); ob_start();
require '../../libraries/database_lib.php';
require '../../libraries/exception_lib.php';
require '../../libraries/security_lib.php';
require '../../libraries/strings_lib.php';
require '../../models/utilisateur.php';
require '../../services/utilisateur_services.php';
require '../../displays/utilisateur_displays.php';

$login = isset($_POST['login']) ? $_POST['login'] : ''; 
$password= isset($_POST['password']) ? $_POST['password']: '';

$user = utilisateur_services::connecter($login, $password);

$_SESSION['connected'] = isset($user) ? $user : header('location: ../../../message.php?cd=0&msg=COMPTE INTROUVABLE !');

header('location: ../../../index.php');