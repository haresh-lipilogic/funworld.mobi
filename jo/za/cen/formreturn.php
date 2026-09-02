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

$stmt1 = $conn1->prepare("INSERT INTO ".$dblog.".formreturn (url,param,receivetime) VALUES (?,?,?)");
				$stmt1->bind_param("sss",$actual_link, $dataPOST,$receivedate);	
				
				
	$stmt1->execute();
	
	$msisdn=$operator=$price='';
	
	$url='https://api.centili.com/payments/v3/subscriptions/init';
	
	 $clickid=$_GET["clickid"];//exit;

	$identid=$_GET['identid'];
	$timestamp=$_GET['timestamp'];
	$sign=$_GET['sign'];
	$msisdn='';
	//exit;
	if (isset($_GET['msisdn']))
	{
		$msisdn=$_GET['msisdn'];
		
		//echo $msisdnhex=findhexval($msisdn);
		

		
		
		$usersubscribe=findusersubscription($msisdn);
		
		//print_r($usersubscribe);exit;
		
		$status=$usersubscribe['status'];
		$active=$usersubscribe['active'];
		//$valid=$usersubscribe['valid'];
		
		$operator=$_GET['operator'];
		
		
		$price=0.5;
		//exit;
		
		
		
		$stmt1 = $conn1->prepare("INSERT INTO ".$dblog.".requesturl (accesstime,clickid,identid,msisdn,operator,timestamp,sign,price,url) VALUES (?,?,?,?,?,?,?,?,?)");
		$stmt1->bind_param("sssssssss",$receivedate, $clickid,$identid,$msisdn,$operator,$timestamp,$sign,$price,$url);
		$stmt1->execute();
		
	}
	$authtoken=authorizationtoken();
	//print_r($authtoken);
	//exit;
	 $accesstoken=$authtoken['access_token'];
	$array['userIdentifier']['country']='JO';
	$array['userIdentifier']['imsi']='';
	$array['userIdentifier']['msisdn']=$msisdn;
	$array['userIdentifier']['operator']=$operator;
	$array['userIdentifier']['identId']=$identid;
	$array['price']='300';
	$array['serviceKey']=$apikey;
	$array['clientData']['clientUserId']='';
	$array['clientData']['pageCustomization']['itemName']='';
	$array['clientData']['pageCustomization']['designId']='';
	$array['clientData']['pageCustomization']['language']='';
	$array['clientData']['clientReference']=$clickid;
	$array['clientData']['returnURL']='htttp://funworld.mobi/jo/za/cen/callreturn.php';
	

//print_r($array);
	
	//exit;

$data_string=json_encode($array);
//echo $data_string;
//echo $url;
//exit;
	$header=array(
   "content-type: application/json",
    "Authorization:bearer $accesstoken"
  );
  //print_r($header);exit;
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
  CURLOPT_HTTPHEADER => $header,
  
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

	//print_r($result1);exit;
	
	$stmt1 = $conn1->prepare("INSERT INTO ".$dblog.".requestsub (accesstime,url,request,result) VALUES (?,?,?,?)");
		$stmt1->bind_param("ssss",$receivedate,$url,$data_string,$response);
		$stmt1->execute();
	
	$response1 = json_decode($response, true);
	
		//echo $response1['status'];
		//print_r($response);exit;
		//{"transactionType":"SUB_START","simtcha":null,"country":"iq","requestId":"PYM_Vhj94U3JFXss","clientData":{"clientUserId":null,"clientReference":"pk16611506993834566"},"msisdn":"9647800026715","operation":{"simtcha":null,"userInstruction":null,"urlRedirect":"htttp://funworld.mobi/jo/za/cen/callreturn.php?trid=18195325401&status=success&operator=IQ_ZAIN&reference=pk16611506993834566&userid=9647800026715","type":"URL_REDIRECT","shortcode":null,"keyword":null,"urlReturn":"htttp://funworld.mobi/jo/za/cen/callreturn.php"},"transactionId":"18195325401","operator":"IQ_ZAIN"}
		if(isset($response1['transactionType']))
		{
			
			if($response1['transactionType']=='SUB_START')
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
			
			
			
			$stmt1 = $conn1->prepare("INSERT INTO ".$db.".subscriber (accesstime,clickid,advid,msisdn,transactiontype,requestid ,charging_mode,subsriptionstartdate,subscriptionenddate,amount,transactionid ) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
			$stmt1->bind_param("sssssssssss",$receivedate,$clickid,$advid,$msisdn,$response1['transactionType'],$response1['requestId'],$charging_mode,$receivedate,$receivedate,$amount,$transactionId);
			$stmt1->execute();
			
			session_start();
			 
				
					$_SESSION["subid"] = $clickid;
					$_SESSION["msisdn"] = $msisdn;
					$_SESSION["clickid"] = $clickid;
			
			
			
			 $url2=$response1['operation']['urlRedirect'];
			
			if($response1['operation']['type']=='URL_REDIRECT')
			{
				
					header("Location:$url2");	
				
			}
			
			}
		}
		
		else if(isset($response1['code']))
		{
			if($response1['code']=='SUBSCRIPTION_ALREADY_EXISTS')
			{
			header("location:http://funworld.mobi/jo/za/cen/gameportal/");
				exit;
			}
		}
		
		
		
	
	
	
	
exit;

?>
<!--
<form id="myForm" action="<?php //echo $url;?>" method="post">
<?php
    /*foreach ($array as $a => $b) {
        echo '<input type="hidden" name="'.htmlentities($a).'" value="'.htmlentities($b).'">';
    }
	*/
?>
</form>
<script type="text/javascript">
   document.getElementById('myForm').submit();
</script>
-->

