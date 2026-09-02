<?php
$conn1 = new mysqli('10.34.240.214','webserveruser','K&dN&r4a8N@du0');
$db='contestbazaar';
$callbackurl='https://funworld.mobi/contestbazzar/callback';





if ($conn1->connect_errno) {
    printf("Connect failed: %s\n", $conn->connect_error);
    exit();
}
?>