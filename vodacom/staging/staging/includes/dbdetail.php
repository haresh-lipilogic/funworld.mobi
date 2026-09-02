<?php
$conn1 = new mysqli('10.125.1.51:3308','webserveruser','K&dN&r4a8N@du0');
$connf = new PDO("mysql:host=10.125.1.51;port=3308;", 'webserveruser', 'K&dN&r4a8N@du0') or die(print_r($conn->error));
$db='vodacom_za';
$dblog='vodacom_za_log';

if ($conn1->connect_errno) {
    printf("Connect failed: %s\n", $conn->connect_error);
    exit();
}
?>