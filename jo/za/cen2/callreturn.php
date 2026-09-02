<?php
include "includes/dbdetail.php";
include "function.php";
error_reporting(0);
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
//echo "Hi";
//exit;
//htttp://gamebar.mobi/iq/za/cen/callreturn.php?trid=18195325401&status=success&operator=IQ_ZAIN&reference=pk16611506993834566&userid=9647800026715

	$dataPOST = trim(file_get_contents('php://input'));

	$array_data = json_decode(json_encode(simplexml_load_string($dataPOST)), true);
 $string_version = implode(',', $array_data);

 
//$data=$array_data['Response'];
//print_r($array_data);

$receivedate =date('Y-m-d H:i:s');
$currentdate=date('Y-m-d');

$request2=$_REQUEST;
$output = implode(', ', array_map(
    function ($v, $k) {
        if(is_array($v)){
            return $k.'[]='.implode('&'.$k.'[]=', $v);
        }else{
            return $k.'='.$v;
        }
    }, 
    $request2, 
    array_keys($request2)
));

$receivedate =date('Y-m-d H:i:s');



$stmt1 = $conn1->prepare("INSERT INTO ".$dblog.".callreturn (url,param,receivetime) VALUES (?,?,?)");
				$stmt1->bind_param("sss",$actual_link, $dataPOST,$receivedate);	
				
				
	$stmt1->execute();
	$trid=$_GET['trid'];
	$status=$_GET['status'];
	$operator=$_GET['operator'];
	$clickid=$_GET['reference'];
	
	 $msisdn=$_GET['userid'];
	
	
	$sql="insert into ".$db.". activeuser (select * from ".$dblog.".userlog where clickid='".$clickid."')";
			$res = $conn1->query($sql);
	
	//$subscriptionid=$_GET['subscriptionid'];
	if ($status=='success')
	{
	//	echo "hi";exit;
					session_start();
			 
				
					$_SESSION["subid"] = $clickid;
					$_SESSION["msisdn"] = $msisdn;
					$_SESSION["click"] = $clickid;
				//$_SESSION["msisdn"] = $msisdn;
					$cookie_name = "iq_act";
					
					setcookie($cookie_name, $clickid, strtotime( '+30 days' ), "/");
					
					
					
					$authtoken=authorizationtoken();
					$accesstoken=$authtoken['access_token'];
					
					$array['serviceKey']=$apikey;
					$array['transactionId']=$trid;
					$array['msisdn']=$msisdn;
					

				//print_r($array);exit;
					
					//exit;
				$url="https://api.centili.com/management/v2/transaction?id=$trid";
				$data_string=json_encode($array);
				
					$header=array(
				   "content-type: application/json",
					"Authorization:bearer $accesstoken"
				  );
				  
				//  print_r($header);
				 
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
				  CURLOPT_CUSTOMREQUEST => "GET",
				  CURLOPT_POSTFIELDS => $data_string,
				  CURLOPT_HTTPHEADER => $header,
				  
				));

				$response = curl_exec($curl);
				$err = curl_error($curl);

				curl_close($curl);

				if ($err) {
				  echo "cURL Error #:" . $err;
				} else {
				  echo $response;
				}
					//print_r($result1);exit;
					
					$stmt1 = $conn1->prepare("INSERT INTO ".$dblog.".requesttrans (accesstime,url,request,result) VALUES (?,?,?,?)");
						$stmt1->bind_param("ssss",$receivedate,$url,$data_string,$response);
						$stmt1->execute();
					
					$response1 = json_decode($response, true);
					
					
					exit;
					
					
					
		
	}
	else{
		
		
		
		
		
		echo "Your subscription was not successful, check your balance and try again";
				exit;
		
		
	}
	
	
	
	 //$sql="update  ".$db.". subscriber set callreturnstatus='".$status."' , subscriptionid='".$subscriptionid."' where `clickid`='".$clickid."' order by subscriberid desc limit 1";
	//	$result1 = $conn1->query($sql);
	
	header("Location:http://gamebar.mobi/iq/za/cen/gameportal/");

?>