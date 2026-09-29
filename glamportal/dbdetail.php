<?php
require_once __DIR__ . '/includes/env.php';

$conn = new mysqli(env('DB_HOST'), env('DB_USER'), env('DB_PASS'));
//$conn = new PDO("mysql:host=10.125.1.51", 'webserveruser', 'K&dN&r4a8N@du0') or die(print_r($conn->error));
$db="gamebardb_spain";
$dblog="gamebardblog_spain";
if ($conn->connect_errno) {
    printf("Connect failed: %s\n", $conn->connect_error);
    exit();
}

$conn1 = new PDO("mysql:host=" . env('DB_HOST') . ";", env('DB_USER'), env('DB_PASS')) or die(print_r($conn1->error));
//$db="gamebardb_portugal";


?>