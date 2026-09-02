<?php
//error_reporting(0);
include "includes/dbdetail.php";
include "function.php";
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$receivedate =date('Y-m-d H:i:s');
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
//$staging=1;
$stmt1 = $conn1->prepare("INSERT INTO ".$dblog.".redirect (url,url_detail,accesstime,staging) VALUES (?,?,?,?)");
				$stmt1->bind_param("ssss",$actual_link, $output,$receivedate,$mode);	
				
				
	$stmt1->execute();
	
	
//client-txn-id=15482449678672477, status-code=1, result=DECLINED, result-description=Customer Declined

$txnid=$_GET['client-txn-id'];
$status_code=$_GET['status-code'];
$result=$_GET['result'];
$result_description=$_GET['result-description'];


$sql="select * from ".$db.". subscriber where txnid='".$txnid."'";
		$result1 = $conn1->query($sql);
			//$numrows1=$result1->num_rows;
			
				while($row = $result1->fetch_assoc()) {
					$id=$row['id'];
					$msisdn=$row['msisdn'];
					$clickid=$row['clickid'];
					$advid=$row['advid'];
					$serviceid=$row['serviceid'];
					$servicename=$row['servicename'];
					$servicecode=$row['servicecode'];
					$token=$row['token'];
					$packageid=$row['packageid'];
					$chargeid=$row['chargeid'];
					
				}









if ($status_code==0) //subscribed
{	

$sql="select * from ".$db.". subscriber where txnid='".$txnid."'";
		$result1 = $conn1->query($sql);
			//$numrows1=$result1->num_rows;
			
				while($row = $result1->fetch_assoc()) {
					$id=$row['id'];
					$msisdn=$row['msisdn'];
					$clickid=$row['clickid'];
					$advid=$row['advid'];
					$serviceid=$row['serviceid'];
					$servicename=$row['servicename'];
					$servicecode=$row['servicecode'];
					$token=$row['token'];
					$packageid=$row['packageid'];
					$chargeid=$row['chargeid'];
					
				}
				
			$charge=usage_charge($clickid,$msisdn,$serviceid,$packageid,$chargeid)	;
			 session_start();
			 
				if($serviceid==1){
					$_SESSION["subid"] = $clickid;
					$cookie_name = "vodacom_worldforher_act";
					
					setcookie($cookie_name, $clickid, time() + (86400 * 360), "/");
					
					$amount=5;
				}
				else if($serviceid==2){
					 $_SESSION["subid1"] = $clickid;
					 $cookie_name = "vodacom_fitness_act";
					
					setcookie($cookie_name, $clickid, time() + (86400 * 360), "/");
					$amount=5;
				}
				else{
					
					 $_SESSION["subid2"] = $clickid;
					 $cookie_name = "vodacom_beautytips_act";
					
					setcookie($cookie_name, $clickid, time() + (86400 * 360), "/");
					$amount=2;
				}
			
			
			 $_SESSION['start'] = time(); 
			 $_SESSION['expire'] = $_SESSION['start'] + (60 * 60*7);
			$charging_mode='act';
			
			$stmt1 = $conn1->prepare("INSERT INTO ".$db.".activebase (msisdn,clickid,serviceid,servicename,charging_mode,active_date) VALUES (?,?,?,?,?,?)");
				$stmt1->bind_param("ssssss",$msisdn, $clickid,$serviceid,$servicename,$charging_mode,$receivedate);	
			$stmt1->execute();
			
			
			$sql1 = "UPDATE ".$db.".subscriber  SET charging_mode='".$charging_mode."' ,amount='".$amount."'   WHERE clickid='".$clickid."'";

			// Prepare statement
				$stmt = $conn1->prepare($sql1);

			// execute the query
				$st=$stmt->execute();
			
			
			
			if($serviceid==1){
			$data="You are subscribed to ".$servicename." at R5 per day. To Unsubscribe, Go To http://club.funzone.mobi/worldforher/ ";
			}
			elseif ($serviceid==2)
			{
			
				$data="You are subscribed to ".$servicename." at R5 per day. To Unsubscribe, Go To http://club.funzone.mobi/fitnessguru/ ";
			
			}
			else{
				
				$data="You are subscribed to ".$servicename." at R2 per day. To Unsubscribe, Go To http://club.funzone.mobi/beautytips/ ";
				
			}
			
			
			$sendmessage=sendmessage($msisdn,$data);
			
			//echo $sendmessage;
			
			if($serviceid==1){
			header("location:http://club.funzone.mobi/worldforher/");
			}
			elseif ($serviceid==2)
			{
				header("location:http://club.funzone.mobi/fitnessguru/");
			}
			else{
				header("location:http://club.funzone.mobi/beautytips/");
				
			}
	exit;
}	
else if($status_code==1) //declined
{
	
	
	if($serviceid==1)
	{	
		echo "<center><b><p style='font-size: 100;'>You have declined permission to activate . If you want to activate this service please <a href='http://club.funzone.mobi/vodacom/staging/index.php?planid=1'>click here</a></b></p></center>";
		exit;
	}
	else if($serviceid==2)
	{	
		echo "<center><b><p style='font-size: 100;'>You have declined permission to activate . If you want to activate this service please <a href='http://club.funzone.mobi/vodacom/staging/index.php?planid=2'>click here</a></b></p></center>";
		exit;
	}
	else 
	{	
		echo "<center><b><p style='font-size: 100;'>You have declined permission to activate . If you want to activate this service please <a href='http://club.funzone.mobi/vodacom/staging/index.php?planid=3'>click here</a></b></p></center>";
		exit;
	}
}	
else if($status_code==2) //fraud
{
	
	echo "<center><b><p style='font-size: 100;'>WE are Detecting an fraud activity in your request,please Cancel your Subscribtion </p></b></center>";
		exit;
	
}
else if($status_code==3) //An error has occurred
{
	echo "<center><b><p style='font-size: 100;'> An error has occurred please Try again later</p></b></center>";
		exit;
	
}
else if($status_code==4) //Blocked
{
	echo "<center><b><p style='font-size: 100;'> Your Mobile number has been Blocked to subscribe this Service</p></b></center>";
		exit;
}
else if($status_code==5) //Insufficient funds
{
	echo "<center><b><p style='font-size: 100;'>You have insufficient funds, please recharge and try again</p></b></center>";
	$charging_mode='low';
	$amount=0;
	//$stmt1 = $conn1->prepare("INSERT INTO ".$db.".activebase (msisdn,clickid,serviceid,servicename,charging_mode,active_date,) VALUES (?,?,?,?,?,?)");
	//			$stmt1->bind_param("ssssss",$msisdn, $clickid,$serviceid,$servicename,$charging_mode,$receivedate);	
	//		$stmt1->execute();
	
	$sql1 = "UPDATE ".$db.".subscriber  SET charging_mode='".$charging_mode."' ,amount='".$amount."'   WHERE clickid='".$clickid."'";

			// Prepare statement
				$stmt = $conn1->prepare($sql1);

			// execute the query
				$st=$stmt->execute();
	
	
	exit;
	
}
else if($status_code==6) //Timeout waiting for response
{
	if($serviceid==1)
	{
		echo "<center><b><p style='font-size: 100;'>We are unable to process your request due to delay in response. Kindly <a href='http://club.funzone.mobi/vodacom/staging/index.php?planid=1'>click here</a> to try again please </p></b></center>";
		exit;
	}
	else if($serviceid==2)
	{
		echo "<center><b><p style='font-size: 100;'>We are unable to process your request due to delay in response. Kindly <a href='http://club.funzone.mobi/vodacom/staging/index.php?planid=2'>click here</a> to try again please </b></p></center>";
		exit;
	}
	else{
		
			echo "<center><b><p style='font-size: 100;'>We are unable to process your request due to delay in response. Kindly <a href='http://club.funzone.mobi/vodacom/staging/index.php?planid=3'>click here</a> to try again please </b></p></center>";
		exit;
		
	}
}
else if($status_code==7) //Already subscribed to service
{
	if($serviceid==1)
	{
		echo "<center><b><p style='font-size: 100;'>You already subscribed this service.  Kindly <a href='http://club.funzone.mobi/worldforher/'>click here</a> to use the service.  </p></b></center>";
		exit;
	}
	else if($serviceid==2)
	{
		echo "<center><b><p style='font-size: 100;'>You already subscribed this service.  Kindly <a href='http://club.funzone.mobi/fitnessguru/'>click here</a> to use the service. </b></p></center>";
		exit;
	}
	else{
		
			echo "<center><b><p style='font-size: 100;'>You already subscribed this service. Kindly<a href='http://club.funzone.mobi/beautytips/'>click here</a> to use the service. </b></p></center>";
		exit;
		
	}
	
}
else if($status_code==8) //Invalid request 
{
	
	echo "<center><b><p style='font-size: 100;'> Invalid request has been occurs ,please try again after sometime </p></b></center>";
		exit;
	
	
}
else if($status_code==9) //BLOCKED
{
	
	
	echo "<center><b><p style='font-size: 100;'> you are not eligibe to subscribe this service.s </p></b></center>";
		exit;
	
}

?>