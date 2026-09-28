<?php
require_once __DIR__ . '/env.php';

$conn1 = new mysqli(env('DB_HOST'), env('DB_USER'), env('DB_PASS'));
$connf = new PDO("mysql:host=" . env('DB_HOST') . ";", env('DB_USER'), env('DB_PASS')) or die(print_r($conn->error));
$db='vodacom_za';
$dblog='vodacom_za_log';
$dblog2='vodacom_za_log2';
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