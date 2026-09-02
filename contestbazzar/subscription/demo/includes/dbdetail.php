<?php
$conn1 = new mysqli('10.125.1.51:3308','webserveruser','K&dN&r4a8N@du0');
$db='contestbazaar_demo';
$callbackurl='http://contestbazaar.mobi/demo/callback';





if ($conn1->connect_errno) {
    printf("Connect failed: %s\n", $conn->connect_error);
    exit();
}
?>