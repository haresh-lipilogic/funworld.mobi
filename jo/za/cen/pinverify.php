<?php
include "includes/dbdetail.php";
include "function.php";
error_reporting(0);
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";



	$dataPOST = trim(file_get_contents('php://input'));

	$array_data = json_decode(json_encode(simplexml_load_string($dataPOST)), true);
 $string_version = implode(',', $array_data);

 
//$data=$array_data['Response'];
//print_r($array_data);



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

$stmt1 = $conn1->prepare("INSERT INTO ".$dblog.".pinverify (url,param,receivetime) VALUES (?,?,?)");
				$stmt1->bind_param("sss",$actual_link, $dataPOST,$receivedate);	
				
				
	$stmt1->execute();
	
	$msisdn=$operator=$price='';
	
	
	//msisdn=345534&clickid=iq16637417129451302&msisdn1=25342546765&operator=IQ_ZAIN&timestamp=&sign=&identid=&pin=1
	
	$msisdn=$_GET['msisdn'];
	$clickid=$_GET['clickid'];
	$msisdn1=$_GET['msisdn1'];
	$operator=$_GET['operator'];
	$timestamp=$_GET['timestamp'];
	$sign=$_GET['sign'];
	$identid=$_GET['identid'];
	$pin=$_GET['pin'];
	$transactionid=$_GET['transactionid'];
	
	
	if($pin==1)
	{
		$authtoken=authorizationtoken();
		
		$accesstoken=$authtoken['access_token'];
	$array['pin']=$msisdn;
	$array['transactionId']=$accesstoken;
	
	
	$url1="https://api.centili.com/payments/v3/transactions/$transactionid/pin";
	
	$data_string=json_encode($array);
//echo $data_string;
//echo $url1;
//exit;
	$header=array(
   "content-type: application/json",
    "Authorization:bearer $accesstoken"
  );
  //print_r($header);exit;
	$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => $url1,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_FOLLOWLOCATION => TRUE,
  CURLOPT_SSL_VERIFYPEER => false,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => $data_string,
  CURLOPT_HTTPHEADER => $header,
  
));

$response = curl_exec($curl);
$err = curl_error($curl);
$httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  //echo $response;exit;
}
	//print_r($result1);exit;
	
	//print $url1;
	//echo "<br><br>".$data_string;
	//print_r($header);exit;
	
	//echo "INSERT INTO ".$dblog.".requestpinverify (accesstime,url,request,result) VALUES ('$receivedate','$url1','$data_string','$response')";exit;
	$stmt1 = $conn1->prepare("INSERT INTO ".$dblog.".requestpinverify (accesstime,url,request,result) VALUES (?,?,?,?)");
		$stmt1->bind_param("ssss",$receivedate,$url1,$data_string,$response);
		$stmt1->execute();
	//$response='{"transactionId":"18213807060","clientData":{"clientUserId":null,"clientReference":"iq16648621632914304"}}';
	$response1 = json_decode($response, true);
		
	
	
		//echo $response1['status'];
		//print_r($response);exit;
		//{"transactionType":"SUB_START","simtcha":null,"country":"iq","requestId":"PYM_Vhj94U3JFXss","clientData":{"clientUserId":null,"clientReference":"pk16611506993834566"},"msisdn":"9647800026715","operation":{"simtcha":null,"userInstruction":null,"urlRedirect":"htttp://funworld.mobi/jo/za/cen/callreturn.php?trid=18195325401&status=success&operator=IQ_ZAIN&reference=pk16611506993834566&userid=9647800026715","type":"URL_REDIRECT","shortcode":null,"keyword":null,"urlReturn":"htttp://funworld.mobi/jo/za/cen/callreturn.php"},"transactionId":"18195325401","operator":"IQ_ZAIN"}
		
		if($httpcode==200)
		{
		if(isset($response1['transactionId']))
		{
			
			
			//echo "hi2";
			
			
			 $sql="select * from ".$dblog.". userlog where clickid='".$clickid."' order by userlogid  desc limit 1";
			$res1 = $conn1->query($sql);
			
			
			//$numrows1=$res1->num_rows;
			
				while($row = $res1->fetch_assoc()) {
				
						 $advid=$row['advertiserid'];
				}
				//exit;
			$charging_mode='first';
			$amount='0';
			
			$transactionId=$response1['transactionId'];
			$pinverify='pinverify';
			
			$stmt1 = $conn1->prepare("INSERT INTO ".$db.".subscriber (accesstime,clickid,advid,msisdn,transactiontype,requestid ,charging_mode,subsriptionstartdate,subscriptionenddate,amount,transactionid ) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
			$stmt1->bind_param("sssssssssss",$receivedate,$clickid,$advid,$msisdn1,$pinverify,$transactionid,$charging_mode,$receivedate,$receivedate,$amount,$transactionId);
			$stmt1->execute();
			
			
			
			session_start();
			 
				
					$_SESSION["subid"] = $clickid;
					$_SESSION["msisdn"] = $msisdn1;
					$_SESSION["click"] = $clickid;
				//$_SESSION["msisdn"] = $msisdn;
					$cookie_name = "jo_act";
					//echo $_SESSION["msisdn"];exit;
					setcookie($cookie_name, $clickid, strtotime( '+30 days' ), "/");
				
				//	header("Location:$url2");	
				header("location:http://funworld.mobi/jo/za/cen/gameportal/");exit;
			
			
			
		}
		
		else if(isset($response1['code']))
		{
			if($response1['code']=='SUBSCRIPTION_ALREADY_EXISTS')
			{
			header("location:http://funworld.mobi/jo/za/cen/gameportal/");
				exit;
			}
		}
		}
		else if($httpcode==400)
		{
			echo "<script> alert('Invalid Pin');</script>";
			
		}
		else{
			
			echo "<script> alert('Something Went Wrong,Please Try After some time');</script>";
		}
		
		
		
		
		
		
	}
	else{
		
		
		
		
	}