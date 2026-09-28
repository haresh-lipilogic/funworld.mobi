<?php
require_once __DIR__ . '/env.php';

$conn1 = new mysqli(env('DB_HOST'), env('DB_USER'), env('DB_PASS'));
$connf = new PDO("mysql:host=" . env('DB_HOST') . ";", env('DB_USER'), env('DB_PASS')) or die(print_r($conn->error));
$db='vodacom2_za';
$dblog='vodacom2_za_log';
$advdb='advertiserdb';

$clientSecret = env('API_CLIENT_SECRET');
$clientKey = env('API_CLIENT_KEY');
$authHeader = base64_encode("$clientKey:$clientSecret");

date_default_timezone_set("Asia/Kolkata");

if ($conn1->connect_errno) {
    printf("Connect failed: %s\n", $conn->connect_error);
    exit();
}
?>