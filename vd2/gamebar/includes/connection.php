<?php
//$conn = mysql_connect('10.125.0.50','productionuser','Zb8#fNIsXnoP12') or die(mysql_error()); //localhost connection query
$conn = new PDO("mysql:host=localhost;", 'webserveruser', 'K&dN&r4a8N@du0') or die(print_r($conn->error));

//$conn = new PDO("mysql:host=localhost;", 'root', '') or die(print_r($conn->error));

//$conn = new PDO("mysql:host=10.125.0.50", 'webserveruser', 'K&dN&r4a8N@du0') or die(print_r($conn->error));
$conn1= new mysqli('localhost','webserveruser','K&dN&r4a8N@du0');

$dblog='gamebar_ethopia_log';
$db='gamebar_ethopia';
$partnerid='015612';
$productid='1000021648';
$Serviceid='0156122000014514';
$password='FMSit#65';
date_default_timezone_set("Asia/Kolkata");






?>