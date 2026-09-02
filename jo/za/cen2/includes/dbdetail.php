<?php
$conn1 = new mysqli('10.34.240.3','webserveruser','K&dN&r4a8N@du0');
$connf = new PDO("mysql:host=10.34.240.3;", 'webserveruser', 'K&dN&r4a8N@du0') or die(print_r($conn->error));
$db='gamebar_jozain';
$dblog='gamebar_jozain_log';
$advdb='advertiserdb';
//$mode='pit';
//$mode='staging';
$mode='production';
//$apikey='c540265bb10987d96870c7d2d1072051';
$apikey='a9e8865552ebe088ee925acd242f447a';
date_default_timezone_set("Asia/Kolkata");
if ($conn1->connect_errno) {
    printf("Connect failed: %s\n", $conn->connect_error);
    exit();
}
$clientid='api-payments';
$granttype='password';
$username='svmobi_api';
$password='3885e06e9d8832b0a8205e682547faec';
$clientsecret='026fd944-9674-4816-8670-a341360e99dc';

//client_id : api-payments
//grant_type : password
//username : svmobi_api
//password : 3885e06e9d8832b0a8205e682547faec
//client_secret : 026fd944-9674-4816-8670-a341360e99dc
?>