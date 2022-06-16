<?php session_start(); ob_start();

session_regenerate_id();
$_SESSION['connected'] = NULL;
session_destroy();
header('location: ../../../../index.html');