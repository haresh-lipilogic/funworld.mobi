<?php
$conn1 = new mysqli('10.34.240.3','webserveruser','K&dN&r4a8N@du0');
$db='contestbazaar_demo';
$callbackurl='http://funworld.mobi/contestbazzar/demo/callback';





if ($conn1->connect_errno) {
    printf("Connect failed: %s\n", $conn->connect_error);
    exit();
}
?>