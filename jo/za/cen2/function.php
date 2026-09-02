<?php


function authorizationtoken()
{
	$receivedate =date('Y-m-d H:i:s');
	include "includes/dbdetail.php";
	//	$timestmp=time();
		$array['client_id']=$clientid;
		$array['grant_type']=$password;
		$array['username']=$username;
		$array['password']=$password;
		$array['client_secret ']=$clientsecret;
		$url='https://api.centili.com/auth/realms/api/protocol/openid-connect/token';	
		//print_r($array);
			
		//	exit;

		$data_string=json_encode($array);
			$array2="client_id=api-payments&grant_type=password&username=svmobi_api&password=3885e06e9d8832b0a8205e682547faec&client_secret=026fd944-9674-4816-8670-a341360e99dc";
			
			$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => $url,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_FOLLOWLOCATION => TRUE,
		  CURLOPT_SSL_VERIFYPEER => false,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => $array2,
		  CURLOPT_HTTPHEADER => array(
			"cache-control: no-cache",
			"content-type: application/x-www-form-urlencoded"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
		  //echo $response;
		}


		$response1 = json_decode($response, true);

		//$activesub=$response1['activesub'];
		//$validsub=$response1['validsub'];
		
		
		$stmt1 = $conn1->prepare("INSERT INTO ".$dblog.".authtoken (accesstime,url,request,result) VALUES (?,?,?,?)");
		$stmt1->bind_param("ssss",$receivedate,$url,$data_string,$response);
		$stmt1->execute();
		
		//exit;
		return($response1);

		
		
		

}








function findusersubscription($msisdn)
{
	$receivedate =date('Y-m-d H:i:s');
	include "includes/dbdetail.php";
		$timestmp=time();
		$array['apikey']=$apikey;
		$array['userid']=$msisdn;
		$array['timestamp']=$timestmp;
		$url='https://api.centili.com/api/payment/1_4/subscription?';	
		//print_r($array);
			
		//	exit;

		$data_string=json_encode($array);
			
			
			$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => $url,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_FOLLOWLOCATION => TRUE,
		  CURLOPT_SSL_VERIFYPEER => false,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => $data_string,
		  CURLOPT_HTTPHEADER => array(
			"cache-control: no-cache",
			"content-type: application/json",
			"host: api.centili.com:443",
			"postman-token: 135e6e37-fb38-fda0-ede2-b213dabee4cf"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
		  //echo $response;
		}
//exit;

		$response1 = json_decode($response, true);

		//$activesub=$response1['activesub'];
		//$validsub=$response1['validsub'];
		
		
		$stmt1 = $conn1->prepare("INSERT INTO ".$dblog.".findsubscription (accesstime,url,request,result) VALUES (?,?,?,?)");
		$stmt1->bind_param("ssss",$receivedate,$url,$data_string,$response);
		$stmt1->execute();
		
		
		return($response1);

		
		
		

}

function findhexval($msisdn)
{
	$receivedate =date('Y-m-d H:i:s');
	include "includes/dbdetail.php";
		$timestmp=time();
		$array['msisdns']=$msisdn;
	//	$array['userid']=$msisdn;
	//	$array['timestamp']=$timestmp;
		$url='http://api.centili.com/api/payment/1_4/subscriber/resolve';	
		//print_r($array);
			
		//	exit;

		$data_string=json_encode($array);
			
			
			$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://api.centili.com/api/payment/1_4/subscriber/resolve',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
  "msisdns":["'.$msisdn.'"]
}',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
//echo $response;exit;

		

		$response1 = json_decode($response, true);
		//echo $response1['subscribers'][0]['subscriberId'];
		//$activesub=$response1['activesub'];
		$msidn1=$response1['subscribers'][0]['subscriberId'];
		
		
		$stmt1 = $conn1->prepare("INSERT INTO ".$dblog.".findhex (accesstime,url,request,result) VALUES (?,?,?,?)");
		$stmt1->bind_param("ssss",$receivedate,$url,$data_string,$response);
		$stmt1->execute();
		
		
		return($msidn1);

		
		
		

}



function unsub($subscriptionid)
{
	$receivedate =date('Y-m-d H:i:s');
	include "includes/dbdetail.php";
		$timestmp=time();
		$array['apikey']=$apikey;
		$array['subscriptionid']=$subscriptionid;
		$array['timestamp']=$timestmp;
		$url='http://api.centili.com/payment/rest/optout';	
		//print_r($array);
			
		//	exit;

		$data_string=json_encode($array);
			
			
			$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => $url,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_FOLLOWLOCATION => TRUE,
		  CURLOPT_SSL_VERIFYPEER => false,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => $data_string,
		  CURLOPT_HTTPHEADER => array(
			"cache-control: no-cache",
			"content-type: application/json",
			"host: api.centili.com:443",
			"postman-token: 135e6e37-fb38-fda0-ede2-b213dabee4cf"
		  ),
		));
		
		$response = curl_exec($curl);
		$err = curl_error($curl);
		$httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
		  //echo $response;
		}


		$response1 = json_decode($response, true);

		//$activesub=$response1['activesub'];
		//$validsub=$response1['validsub'];
		//echo $httpcode;
		
		$stmt1 = $conn1->prepare("INSERT INTO ".$dblog.".unsub (accesstime,url,request,result) VALUES (?,?,?,?)");
		$stmt1->bind_param("ssss",$receivedate,$url,$data_string,$httpcode);
		$stmt1->execute();
		
		
		return($httpcode);

		
		
		

}


?>