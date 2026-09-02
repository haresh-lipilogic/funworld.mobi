<?php
$conn1 = new mysqli('10.34.240.214','webserveruser','K&dN&r4a8N@du0');
$connf = new PDO("mysql:host=10.34.240.214;", 'webserveruser', 'K&dN&r4a8N@du0') or die(print_r($conn->error));
$db='vodacom2_stag';
$dblog='vodacom2_stag_log';
//$dblog2='vodacom_za_log2';
$advdb='advertiserdb';

$clientSecret = 'xawqHngDPM77YtoG';
$clientKey = '8aPR69gxmVGTUI5LmKAubmAfmead4WRO';
$authHeader = base64_encode("$clientKey:$clientSecret");

date_default_timezone_set("Asia/Kolkata");

if ($conn1->connect_errno) {
    printf("Connect failed: %s\n", $conn->connect_error);
    exit();
}
?>