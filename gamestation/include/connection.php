<?php
require_once __DIR__ . '/env.php';

//$conn = mysql_connect('10.125.0.50','productionuser','Zb8#fNIsXnoP12') or die(mysql_error()); //localhost connection query
$conn = new PDO("mysql:host=" . env('DB_HOST') . ";", env('DB_USER'), env('DB_PASS')) or die(print_r($conn->error));
//$conn = new PDO("mysql:host=localhost;", 'root', '') or die(print_r($conn->error));

//$conn = new PDO("mysql:host=10.125.0.50", 'webserveruser', 'K&dN&r4a8N@du0') or die(print_r($conn->error));



?>