<?php
$conn1 = new mysqli('10.34.240.214','webserveruser','K&dN&r4a8N@du0');
$connf = new PDO("mysql:host=10.34.240.214;", 'webserveruser', 'K&dN&r4a8N@du0') or die(print_r($conn->error));
$db='vodacom2_za';
$dblog='vodacom2_log';
//$dblog2='vodacom2__log2';
$advdb='advertiserdb';
//$mode='pit';
//$mode='staging';
$mode='production';
date_default_timezone_set("Asia/Kolkata");

if ($conn1->connect_errno) {
    printf("Connect failed: %s\n", $conn->connect_error);
    exit();
}
?>