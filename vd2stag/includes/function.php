<?php


function generateAccessToken()
{


include "dbdetail.php";



$url = 'https://qaapix.vodacom.co.za/oauth-framework/generateaccesstoken';



$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://qaapix.vodacom.co.za/oauth-framework/generateaccesstoken',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_POSTFIELDS => 'grant_type=client_credentials',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/x-www-form-urlencoded',
    'Authorization: Basic '.$authHeader
  ),
));

$response = curl_exec($curl);

curl_close($curl);
return $response;



}

function getServiceEligibilityHE($application_name,$accesstoken,$serviceid,$msisdn,$clickid)
{
include "dbdetail.php";
$date=date("Y-m-d H:i:s");
$postfield='{
"sourceTransactionId":"'.$application_name.'",
"name": "getServiceEligibility",
"relatedParty":[ 
{
"id": "'.$serviceid.'",
"@referredType": "service-id"
}
]
}



';

$url='https://qaapix.vodacom.co.za/v1/productofferingmanagement/getServiceEligibility';



$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => $url,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>$postfield,
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json',
    'X-ACR:'.$msisdn,
	'Authorization: Bearer '.$accesstoken
    
  ),
));

$response = curl_exec($curl);

curl_close($curl);
//echo "INSERT INTO ".$dblog.".getServiceEligibility (url,param,senttime,response,msisdn,clickid,txnid) values('$url','$postfield','$date','$response','$msisdn','$clickid','$clickid')";

$stmt1 = $conn1->prepare("INSERT INTO ".$dblog.".getServiceEligibility (url,param,senttime,response,msisdn,clickid,txnid) VALUES (?,?,?,?,?,?,?)");
$stmt1->bind_param("sssssss",$url, $postfield,$date,$response,$msisdn,$clickid,$clickid);	
$stmt1->execute();



return $response;




}

function productofferingHE($msisdn,$packageid,$accesstoken,$application_name,$serviceid,$clickid)
{
include "dbdetail.php";
$date=date("Y-m-d H:i:s");


$curl = curl_init();

$postfield='{
"sourceTransactionId":"'.$application_name.'",
"name": "catalogfullpackage",
"relatedParty": [
{
"id": "'.$packageid.'",
"@referredType": "package-id"
},
{
"id": "svmobi",
"@referredType": "partner-name"
},
{
"id": "https://funworld.mobi/vd2stag/redirect.php",
"@referredType": "partner-redirect-url"
},
{
"id": "'.$clickid.'",
"@referredType": "client-txn-id"
},
{
"id": "'.$serviceid.'",
"@referredType": "service-id"
}
]
}';

$url='https://qaapix.vodacom.co.za/v1/productofferingmanagement/productOfferingQualification';
curl_setopt_array($curl, array(
  CURLOPT_URL => $url,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>$postfield,
  CURLOPT_HTTPHEADER => array(
    'X-ACR: '.$msisdn,
    'Content-Type: application/json',
    'Authorization:  Bearer '.$accesstoken
  ),
));

$response = curl_exec($curl);

curl_close($curl);
//echo $response;
	$txnid='he';
	$stmt1 = $conn1->prepare("INSERT INTO ".$dblog.".productoffer (url,param,senttime,response,msisdn,clickid,txnid) VALUES (?,?,?,?,?,?,?)");
	$stmt1->bind_param("sssssss",$url, $postfield,$date,$response,$msisdn,$clickid,$txnid);	
	$stmt1->execute();
	return $response;
}


function productoffering($msisdn,$packageid,$accesstoken,$application_name,$serviceid,$clickid)
{
	
include "dbdetail.php";
$date=date("Y-m-d H:i:s");

$curl = curl_init();


$postfield='{
"sourceTransactionId":"799a18d9-dabe-43f8-935f-a5609eeb4e78",
"name": "catalogfullpackage",
"relatedParty": [
{
"id": "'.$packageid.'",
"@referredType": "package-id"
},
{
"id": "Svmobi",
"@referredType": "partner-name"
},
{
"id": "https://funworld.mobi/vd2stag/redirect.php",
"@referredType": "partner-redirect-url"
},
{
"id": "'.$clickid.'",
"@referredType": "client-txn-id"
},
{
"id": "'.$serviceid.'",
"@referredType": "service-id"
},
{
"id": "daily",
"@referredType": "purchase-frequency"
}
]
}';


$url='https://qaapix.vodacom.co.za/v1/productofferingmanagement/productOfferingQualification';

	curl_setopt_array($curl, array(
  CURLOPT_URL => $url,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>$postfield,
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json',
    'Authorization: Bearer '.$accesstoken
  ),
));

$response = curl_exec($curl);

curl_close($curl);

	$txnid='nohe';
	$stmt1 = $conn1->prepare("INSERT INTO ".$dblog.".productoffer (url,param,senttime,response,msisdn,clickid,txnid) VALUES (?,?,?,?,?,?,?)");
	$stmt1->bind_param("sssssss",$url, $postfield,$date,$response,$msisdn,$clickid,$txnid);	
	$stmt1->execute();
	return $response;
}


