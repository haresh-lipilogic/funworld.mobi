<?php
require_once __DIR__ . '/../../includes/env.php';

//$conn = mysql_connect('10.125.0.50','productionuser','Zb8#fNIsXnoP12') or die(mysql_error()); //localhost connection query
$conn = new PDO("mysql:host=localhost;", env('DB_USER'), env('DB_PASS')) or die(print_r($conn->error));

//$conn = new PDO("mysql:host=localhost;", 'root', '') or die(print_r($conn->error));

//$conn = new PDO("mysql:host=10.125.0.50", 'webserveruser', 'K&dN&r4a8N@du0') or die(print_r($conn->error));
$conn1= new mysqli('localhost', env('DB_USER'), env('DB_PASS'));

$dblog='gamebar_ethopia_log';
$db='gamebar_ethopia';
$partnerid=env('GAMEBAR_PARTNER_ID');
$productid=env('GAMEBAR_PRODUCT_ID');
$Serviceid=env('GAMEBAR_SERVICE_ID');
$password=env('GAMEBAR_PASSWORD');
date_default_timezone_set("Asia/Kolkata");






?>