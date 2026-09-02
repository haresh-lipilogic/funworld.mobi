<?php
$conn1 = new mysqli('10.34.240.3','webserveruser','K&dN&r4a8N@du0');
$connf = new PDO("mysql:host=10.34.240.3;", 'webserveruser', 'K&dN&r4a8N@du0') or die(print_r($conn->error));
$db='gamebar_iqzain';
$dblog='gamebar_iqzain_log';
$advdb='advertiserdb';
//$mode='pit';
//$mode='staging';
$mode='production';
//$apikey='c540265bb10987d96870c7d2d1072051';
//$apikey='d79a84811dde01a0e0221988ccc7fd95';
date_default_timezone_set("Asia/Calcutta");
$username="svmobi@tpay.me"; 
$password="LiveP@ssw0rd1234";
$publickey="bqqjzoZUioaX3ImfuG6v";
$privatekey="CJ5ocsWuNAt6vJDH47KN";
$catalog='GameBar1';
$productSku='GB1';

if ($conn1->connect_errno) {
    printf("Connect failed: %s\n", $conn->connect_error);
    exit();
}
?>