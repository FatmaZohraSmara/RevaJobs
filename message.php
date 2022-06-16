<?php session_start(); ob_start();

$msg = isset($_GET['msg']) ? $_GET['msg'] : header('location: index.html');
$cd = isset($_GET['cd']) ? $_GET['cd'] : header('location: index.html');
$color = "#000000";
switch($cd) {
    case 0: $color = "#dc0000"; break;
    case 1: $color = "#00aa00"; break;
    case 2: $color = "#0000dc"; break;
}

$html = '<div style="margin: 15% auto; position: relative; width: 400px; 
                     padding: 20px; box-shadow: 3px 3px 6px #666666; text-align: center;
                     border-radius: 10px; font-size: 12px; font-family: Arial; font-weight: normal;">
            <h2 style="color: '.$color.'">'.$msg.'</h2>
        </div>';

echo $html;