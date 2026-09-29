<?php
require_once __DIR__ . '/env.php';

//$conn1 = new mysqli('10.34.240.3','root','gPseporLEAvHDdpq');
$conn1 = new mysqli(env('DB_HOST_MAIN'), env('DB_USER'), env('DB_PASS'));
$connf = new PDO("mysql:host=" . env('DB_HOST_MAIN') . ";", env('DB_ROOT_USER'), env('DB_ROOT_PASS')) or die(print_r($connf->error));

$db='glambar_zamobixone';
$dblog='glambar_zamobixone_log';
$advdb='advertiserdb';
$username=env('GLAMBAR_USERNAME');
$password=env('GLAMBAR_PASSWORD');
$clientid=env('GLAMBAR_CLIENT_ID');
$clientsecret=env('GLAMBAR_CLIENT_SECRET');
$apikey=env('GLAMBAR_API_KEY');
$serviceid=env('GLAMBAR_SERVICE_ID');
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