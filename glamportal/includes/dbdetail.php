<?php
//$conn1 = new mysqli('10.34.240.3','root','gPseporLEAvHDdpq');
$conn1 = new mysqli('10.34.240.214','webserveruser','K&dN&r4a8N@du0');
$connf = new PDO("mysql:host=10.34.240.214;", 'root', 'gPseporLEAvHDdpq') or die(print_r($connf->error));

$db='glambar_zamobixone';
$dblog='glambar_zamobixone_log';
$advdb='advertiserdb';
$username='sv-mobi-uid';
$password='e3fliBrDPO';
$clientid='sv-mobi-cid';
$clientsecret='93CC992BE3D8C4AA591C859FFD8BA';
$apikey='lsIk-qfbF-BNuG-3X84-DJwW-QjjD-67GO-5lTj';
$serviceid='qICRAwrRHFTJSPuAY20oTKq9';
$contentname='sv-mobi-glambar';
$name='sv-mobi';
$operatorname='mtn-za';
$op='ZA-mtn-mobixone';
$country='ZA';
//$scope='STAGE';
$scope='PRODUCTION';
if($scope=='STAGE')
{
	$tokenurl='https://stgxcis.mobixone.co.za:8585/oauth/token';
	$redirect='https://stgxcis.mobixone.co.za:9001/api/v1/web/ci/';
	$unsuburl='https://stgxcis.mobixone.co.za:9001/api/v1/service/ci/';
}
else{
	$tokenurl='https://xcis.mobixone.co.za:8585/oauth/token';
	$redirect='https://xcis.mobixone.co.za:9001/api/v1/web/ci/';
	$unsuburl='https://xcis.mobixone.co.za:9001/api/v1/service/ci/';
}
$basicauthorization = "Basic:".base64_encode("$clientid:$clientsecret");
date_default_timezone_set('Asia/Kolkata');
if ($conn1->connect_errno) {
    printf("Connect failed: %s\n", $conn->connect_error);
    exit();
}
?>