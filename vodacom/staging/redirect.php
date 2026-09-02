

<meta name="viewport" content="width=device-width, user-scalable=no">

<?php
error_reporting(0);
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


$sql1 = "insert into  ".$db.".activeuserlog  ( select * from ".$dblog.".userlog  WHERE clickid='".$clickid."')";
$result1 = $conn1->query($sql1);



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
				
				
		//	$charge=usage_charge($clickid,$msisdn,$serviceid,$packageid,$chargeid)	;
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
				else if($serviceid==3){
					
					 $_SESSION["subid2"] = $clickid;
					 $cookie_name = "vodacom_beautytips_act";
					
					setcookie($cookie_name, $clickid, time() + (86400 * 360), "/");
					$amount=2;
				}
				else if($serviceid==5){
					
					 $_SESSION["subid5"] = $clickid;
					 $cookie_name = "vodacom_glambar_act";
					
					setcookie($cookie_name, $clickid, time() + (86400 * 360), "/");
					$amount=2;
				}
				else{
					
					 $_SESSION["subid2"] = $clickid;
					 $cookie_name = "vodacom_gamebar_act";
					
					setcookie($cookie_name, $clickid, time() + (86400 * 360), "/");
					$amount=5;
				}
			
			
			 $_SESSION['start'] = time(); 
			 $_SESSION['expire'] = $_SESSION['start'] + (60 * 60*7);
			$charging_mode='first';
			
			
			
			
			//echo $sendmessage;
			
			if($serviceid==1){
			header("location:http://funworld.mobi/worldforher/");
			}
			elseif ($serviceid==2)
			{
				header("location:http://funworld.mobi/fitnesstips/");
			}
			elseif($serviceid==3){
				header("location:http://funworld.mobi/beautytips/");
				
			}
			elseif($serviceid==5){
				header("location:http://funworld.mobi/glamportal/");
				
			}
			else{
				header("location:http://funworld.mobi/gamebar/");
				
			}
	exit;
}	
else if($status_code==1) //declined
{
	
	
	if($serviceid==1)
	{	
		echo '
		<body style="background:#ffe1e1;">
		<center>
	<img class="logosvg" style="height:15%; width:40%;" src="http://funworld.mobi/worldforher/image/logo.png"><b><p style="font-size: 25;">You have declined permission to activate . If you want to activate this service please<br><br> <a href="http://funworld.mobi/vd/staging/index.php?planid=1"><button style="height:15%;width:40%;font-size:20px;background-color: #4CAF50;color:white;border: none;border-radius: 12px;">Return to Homepage</button></a></b></p></center>
	</body>';
		exit;
	}
	else if($serviceid==2)
	{	
		echo '
		<body style="background:#ffe1e1;">
		<center>
	<img class="logosvg" style="height:15%; width:40%;" src="http://funworld.mobi/fitnessguru/images/Fitness-Guru.png"><b><p style="font-size: 25;">You have declined permission to activate . If you want to activate this service please<br><br> <a href="http://funworld.mobi/vd/staging/index.php?planid=2"><button style="height:15%;width:40%;font-size:20px;background-color: #4CAF50;color:white;border: none;border-radius: 12px;">Return to Homepage</button></a></b></p></center>
	</body>';
		exit;
	}
	else if($serviceid==3)
	{	
		echo '
		<body style="background:#ffe1e1;">
		<center>
	<img class="logosvg" style="height:15%; width:40%;" src="http://funworld.mobi/beautytips/content/Beauty%20Tips%20Logo.png"><b><p style="font-size: 25;">You have declined permission to activate . If you want to activate this service please<br><br> <a href="http://funworld.mobi/vd/staging/index.php?planid=3"><button style="height:15%;width:40%;font-size:20px;background-color: #4CAF50;color:white;border: none;border-radius: 12px;">Return to Homepage</button></a></b></p></center>
	</body>';
		exit;
	}
	else if($serviceid==5)
	{	
		echo '
		<body style="background:#ffe1e1;">
		<center>
	<img class="logosvg" style="height:15%; width:40%;" src="http://funworld.mobi/glamportal/image/logo.png"><b><p style="font-size: 25;">You have declined permission to activate . If you want to activate this service please<br><br> <a href="http://funworld.mobi/vd/staging/index.php?planid=5"><button style="height:15%;width:40%;font-size:20px;background-color: #4CAF50;color:white;border: none;border-radius: 12px;">Return to Homepage</button></a></b></p></center>
	</body>';
		exit;
	}
	else 
	{	
		echo '
		<body style="background:#ffe1e1;">
		<center>
	<img class="logosvg" style="height:15%; width:40%;" src="http://funworld.mobi/portugal/image/gamebar.png"><b><p style="font-size: 25;">You have declined permission to activate . If you want to activate this service please<br><br> <a href="http://funworld.mobi/vd/staging/index.php?planid=4"><button style="height:15%;width:40%;font-size:20px;background-color: #4CAF50;color:white;border: none;border-radius: 12px;">Return to Homepage</button></a></b></p></center>
	</body>';
		exit;
	}
}	
else if($status_code==2) //fraud
{
	
	$charging_mode='fraud';
	$amount=0;
	
	
	$sql1 = "UPDATE ".$db.".subscriber  SET charging_mode='".$charging_mode."' ,amount='".$amount."'   WHERE clickid='".$clickid."'";

			// Prepare statement
				$stmt = $conn1->prepare($sql1);

			// execute the query
				$st=$stmt->execute();
	
	
	
	if($serviceid==1)
	{	
		echo '
		<body style="background:#ffe1e1;">
		<center>
	<img class="logosvg" style="height:15%; width:40%;" src="http://funworld.mobi/worldforher/image/logo.png"><b><p style="font-size: 25;">We are Detecting an fraud activity in your request,please Cancel your Subscribtion<br><br> <a href="http://funworld.mobi/vd/staging/index.php?planid=1"><button style="height:15%;width:40%;font-size:20px;background-color: #4CAF50;color:white;border: none;border-radius: 12px;">Return to Homepage</button></a></b></p></center>
	</body>';
		exit;
	}
	else if($serviceid==2)
	{	
		echo '
		<body style="background:#ffe1e1;">
		<center>
	<img class="logosvg" style="height:15%; width:40%;" src="http://funworld.mobi/fitnessguru/images/Fitness-Guru.png"><b><p style="font-size: 25;">We are Detecting an fraud activity in your request,please Cancel your Subscribtion<br><br> <a href="http://funworld.mobi/vd/staging/index.php?planid=2"><button style="height:15%;width:40%;font-size:20px;background-color: #4CAF50;color:white;border: none;border-radius: 12px;">Return to Homepage</button></a></b></p></center>
	</body>';
		exit;
	}
	else if($serviceid==3)
	{	
		echo '
		<body style="background:#ffe1e1;">
		<center>
	<img class="logosvg" style="height:15%; width:40%;" src="http://funworld.mobi/beautytips/content/Beauty%20Tips%20Logo.png"><b><p style="font-size: 25;">We are Detecting an fraud activity in your request,please Cancel your Subscribtion<br><br> <a href="http://funworld.mobi/vd/staging/index.php?planid=3"><button style="height:15%;width:40%;font-size:20px;background-color: #4CAF50;color:white;border: none;border-radius: 12px;">Return to Homepage</button></a></b></p></center>
	</body>';
		exit;
	}
	else if($serviceid==5)
	{	
		echo '
		<body style="background:#ffe1e1;">
		<center>
	<img class="logosvg" style="height:15%; width:40%;" src="http://funworld.mobi/glamportal/image/logo.png"><b><p style="font-size: 25;">We are Detecting an fraud activity in your request,please Cancel your Subscribtion<br><br> <a href="http://funworld.mobi/vd/staging/index.php?planid=5"><button style="height:15%;width:40%;font-size:20px;background-color: #4CAF50;color:white;border: none;border-radius: 12px;">Return to Homepage</button></a></b></p></center>
	</body>';
		exit;
	}
	else 
	{	
		echo '
		<body style="background:#ffe1e1;">
		<center>
	<img class="logosvg" style="height:15%; width:40%;" src="http://funworld.mobi/portugal/image/gamebar.png"><b><p style="font-size: 25;">We are Detecting an fraud activity in your request,please Cancel your Subscribtion<br><br> <a href="http://funworld.mobi/vd/staging/index.php?planid=4"><button style="height:15%;width:40%;font-size:20px;background-color: #4CAF50;color:white;border: none;border-radius: 12px;">Return to Homepage</button></a></b></p></center>
	</body>';
		exit;
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	/*echo '
	<body style="background:#ffe1e1;">
	
	<center>
	<img class="logosvg" style="height:15%; width:40%;" src="http://funworld.mobi/portugal/image/gamebar.png">
	<b><p style="font-size: 25;">We are Detecting an fraud activity in your request,please Cancel your Subscribtion </p></b></center></body>';
	
	*/
		exit;
	
}
else if($status_code==3) //An error has occurred
{
	
	
	
	if($serviceid==1)
	{	
		echo '
		<body style="background:#ffe1e1;">
		<center>
	<img class="logosvg" style="height:15%; width:40%;" src="http://funworld.mobi/worldforher/image/logo.png"><b><p style="font-size: 25;">An error has occurred please Try again later<br><br> <a href="http://funworld.mobi/vd/staging/index.php?planid=1"><button style="height:15%;width:40%;font-size:20px;background-color: #4CAF50;color:white;border: none;border-radius: 12px;">Return to Homepage</button></a></b></p></center>
	</body>';
		exit;
	}
	else if($serviceid==2)
	{	
		echo '
		<body style="background:#ffe1e1;">
		<center>
	<img class="logosvg" style="height:15%; width:40%;" src="http://funworld.mobi/fitnessguru/images/Fitness-Guru.png"><b><p style="font-size: 25;">An error has occurred please Try again later<br><br> <a href="http://funworld.mobi/vd/staging/index.php?planid=2"><button style="height:15%;width:40%;font-size:20px;background-color: #4CAF50;color:white;border: none;border-radius: 12px;">Return to Homepage</button></a></b></p></center>
	</body>';
		exit;
	}
	else if($serviceid==3)
	{	
		echo '
		<body style="background:#ffe1e1;">
		<center>
	<img class="logosvg" style="height:15%; width:40%;" src="http://funworld.mobi/beautytips/content/Beauty%20Tips%20Logo.png"><b><p style="font-size: 25;">An error has occurred please Try again later<br><br> <a href="http://funworld.mobi/vd/staging/index.php?planid=3"><button style="height:15%;width:40%;font-size:20px;background-color: #4CAF50;color:white;border: none;border-radius: 12px;">Return to Homepage</button></a></b></p></center>
	</body>';
		exit;
	}
	else if($serviceid==5)
	{	
		echo '
		<body style="background:#ffe1e1;">
		<center>
	<img class="logosvg" style="height:15%; width:40%;" src="http://funworld.mobi/glamportal/image/logo.png"><b><p style="font-size: 25;">An error has occurred please Try again later<br><br> <a href="http://funworld.mobi/vd/staging/index.php?planid=5"><button style="height:15%;width:40%;font-size:20px;background-color: #4CAF50;color:white;border: none;border-radius: 12px;">Return to Homepage</button></a></b></p></center>
	</body>';
		exit;
	}
	else 
	{	
		echo '
		<body style="background:#ffe1e1;">
		<center>
	<img class="logosvg" style="height:15%; width:40%;" src="http://funworld.mobi/portugal/image/gamebar.png"><b><p style="font-size: 25;">An error has occurred please Try again later<br><br> <a href="http://funworld.mobi/vd/staging/index.php?planid=4"><button style="height:15%;width:40%;font-size:20px;background-color: #4CAF50;color:white;border: none;border-radius: 12px;">Return to Homepage</button></a></b></p></center>
	</body>';
		exit;
	}
	
	
	
	
	
	
	
	
	
	/*
	
	echo '
	<body style="background:#ffe1e1;">
	
	<center>
	<img class="logosvg" style="height:15%; width:40%;" src="http://funworld.mobi/portugal/image/gamebar.png">
	<b><p style="font-size: 25;">An error has occurred please Try again later</p></b></center></body>';
	*/
	
		exit;
	
}
else if($status_code==4) //Blocked
{
	
	echo '
	<body style="background:#ffe1e1;">
	
	<center>
	
	<b><p style="font-size: 25;">Your Mobile number has been Blocked to subscribe this Service </p></b></center></body>';
		exit;
	
	
	
}
else if($status_code==5) //Insufficient funds
{
	
	
	$sql1 = "insert into  ".$db.".activeuserlog  ( select * from ".$dblog.".userlog  WHERE clickid='".$clickid."')";
	$result1 = $conn1->query($sql1);
	
	
	
	if($serviceid==1)
	{	
		echo '
		<body style="background:#ffe1e1;">
		<center>
	<img class="logosvg" style="height:15%; width:40%;" src="http://funworld.mobi/worldforher/image/logo.png"><b><p style="font-size: 25;">You have insufficient funds, please recharge and try again<br><br> <a href="http://funworld.mobi/vd/staging/index.php?planid=1"><button style="height:15%;width:40%;font-size:20px;background-color: #4CAF50;color:white;border: none;border-radius: 12px;">Try Again</button></a></b></p></center>
	</body>';
		exit;
	}
	else if($serviceid==2)
	{	
		echo '
		<body style="background:#ffe1e1;">
		<center>
	<img class="logosvg" style="height:15%; width:40%;" src="http://funworld.mobi/fitnessguru/images/Fitness-Guru.png"><b><p style="font-size: 25;">You have insufficient funds, please recharge and try again<br><br> <a href="http://funworld.mobi/vd/staging/index.php?planid=2"><button style="height:15%;width:40%;font-size:20px;background-color: #4CAF50;color:white;border: none;border-radius: 12px;">Try Again</button></a></b></p></center>
	</body>';
		exit;
	}
	else if($serviceid==3)
	{	
		echo '
		<body style="background:#ffe1e1;">
		<center>
	<img class="logosvg" style="height:15%; width:40%;" src="http://funworld.mobi/beautytips/content/Beauty%20Tips%20Logo.png"><b><p style="font-size: 25;">You have insufficient funds, please recharge and try again<br><br> <a href="http://funworld.mobi/vd/staging/index.php?planid=3"><button style="height:15%;width:40%;font-size:20px;background-color: #4CAF50;color:white;border: none;border-radius: 12px;">Try Again</button></a></b></p></center>
	</body>';
		exit;
	}
	else if($serviceid==5)
	{	
		echo '
		<body style="background:#ffe1e1;">
		<center>
	<img class="logosvg" style="height:15%; width:40%;" src="http://funworld.mobi/glamportal/image/logo.png"><b><p style="font-size: 25;">You have insufficient funds, please recharge and try again<br><br> <a href="http://funworld.mobi/vd/staging/index.php?planid=5"><button style="height:15%;width:40%;font-size:20px;background-color: #4CAF50;color:white;border: none;border-radius: 12px;">Try Again</button></a></b></p></center>
	</body>';
		exit;
	}
	else 
	{	
		echo '
		<body style="background:#ffe1e1;">
		<center>
	<img class="logosvg" style="height:15%; width:40%;" src="http://funworld.mobi/portugal/image/gamebar.png"><b><p style="font-size: 25;">You have insufficient funds, please recharge and try again<br><br> <a href="http://funworld.mobi/vd/staging/index.php?planid=4"><button style="height:15%;width:40%;font-size:20px;background-color: #4CAF50;color:white;border: none;border-radius: 12px;">Try Again</button></a></b></p></center>
	</body>';
		exit;
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	/*echo '
		<body style="background:#ffe1e1;">
		<center>
	<img class="logosvg" style="height:15%; width:40%;" src="http://funworld.mobi/portugal/image/gamebar.png"><b><p style="font-size: 25;">You have insufficient funds, please recharge and try again<br><br> <a href="http://funworld.mobi/vd/index.php?planid=4"><button style="height:15%;width:40%;font-size:20px;background-color: #4CAF50;color:white;border: none;border-radius: 12px;">Return to homepage</button></a></b></p></center>
	</body>';*/
	
	
	
	
	
	
	
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
		echo '
		<body style="background:#ffe1e1;">
		<center>
	<img class="logosvg" style="height:15%; width:40%;" src="http://funworld.mobi/worldforher/image/logo.png"><b><p style="font-size: 25;">We are unable to process your request due to delay in response.Kindly click on Below Button<br><br> <a href="http://funworld.mobi/vd/staging/index.php?planid=1"><button style="height:15%;width:40%;font-size:20px;background-color: #4CAF50;color:white;border: none;border-radius: 12px;">Return to Homepage</button></a></b></p></center>
	</body>';
		
		
		exit;
	}
	else if($serviceid==2)
	{
		echo '
		<body style="background:#ffe1e1;">
		<center>
	<img class="logosvg" style="height:15%; width:40%;" src="http://funworld.mobi/fitnessguru/images/Fitness-Guru.png"><b><p style="font-size: 25;">We are unable to process your request due to delay in response.Kindly click on Below Button<br><br> <a href="http://funworld.mobi/vd/staging/index.php?planid=2"><button style="height:15%;width:40%;font-size:20px;background-color: #4CAF50;color:white;border: none;border-radius: 12px;">Return to Homepage</button></a></b></p></center>
	</body>';
		exit;
	}
	else if($serviceid==3)
	{
		
			echo '
		<body style="background:#ffe1e1;">
		<center>
	<img class="logosvg" style="height:15%; width:40%;" src="http://funworld.mobi/beautytips/content/Beauty%20Tips%20Logo.png"><b><p style="font-size: 25;">We are unable to process your request due to delay in response.Kindly click on Below Button<br><br> <a href="http://funworld.mobi/vd/staging/index.php?planid=3"><button style="height:15%;width:40%;font-size:20px;background-color: #4CAF50;color:white;border: none;border-radius: 12px;">Return to Homepage</button></a></b></p></center>
	</body>';
		exit;
		
	}
	else if($serviceid==5)
	{
		
			echo '
		<body style="background:#ffe1e1;">
		<center>
	<img class="logosvg" style="height:15%; width:40%;" src="http://funworld.mobi/glamportal/image/logo.png"><b><p style="font-size: 25;">We are unable to process your request due to delay in response.Kindly click on Below Button<br><br> <a href="http://funworld.mobi/vd/staging/index.php?planid=5"><button style="height:15%;width:40%;font-size:20px;background-color: #4CAF50;color:white;border: none;border-radius: 12px;">Return to Homepage</button></a></b></p></center>
	</body>';
		exit;
		
	}
	
	else
	{
		
			echo '
		<body style="background:#ffe1e1;">
		<center>
	<img class="logosvg" style="height:15%; width:40%;" src="http://funworld.mobi/portugal/image/gamebar.png"><b><p style="font-size: 25;">We are unable to process your request due to delay in response.Kindly click on Below Button<br><br> <a href="http://funworld.mobi/vd/staging/index.php?planid=4"><button style="height:15%;width:40%;font-size:20px;background-color: #4CAF50;color:white;border: none;border-radius: 12px;">Return to Homepage</button></a></b></p></center>
	</body>';
		exit;
		
	}
}
else if($status_code==7) //Already subscribed to service
{
	if($serviceid==1)
	{
		
		echo '<body style="background:#ffe1e1;">
		<center>
	<img class="logosvg" style="height:15%; width:40%;" src="http://funworld.mobi/worldforher/image/logo.png"><b><p style="font-size: 25;">You already subscribed this service.Kindly click on Below Button to use the service<br><br> <a href="http://funworld.mobi/worldforher/"><button style="height:15%;width:40%;font-size:20px;background-color: #4CAF50;color:white;border: none;border-radius: 12px;">Homepage</button></a></b></p></center>
	</body>';
		
		
		exit;
	}
	else if($serviceid==2)
	{
		echo '<body style="background:#ffe1e1;">
		<center>
	<img class="logosvg" style="height:15%; width:40%;" src="http://funworld.mobi/fitnessguru/images/Fitness-Guru.png"><b><p style="font-size: 25;">You already subscribed this service.Kindly click on Below Button to use the service<br><br> <a href="http://funworld.mobi/fitnesstips/"><button style="height:15%;width:40%;font-size:20px;background-color: #4CAF50;color:white;border: none;border-radius: 12px;">Homepage</button></a></b></p></center>
	</body>';
		
		
		exit;
	}
	else if($serviceid==3)
	{
		echo '<body style="background:#ffe1e1;">
		<center>
	<img class="logosvg" style="height:15%; width:40%;" src="http://funworld.mobi/beautytips/content/Beauty%20Tips%20Logo.png"><b><p style="font-size: 25;">You already subscribed this service.Kindly click on Below Button to use the service<br><br> <a href="http://funworld.mobi/beautytips/"><button style="height:15%;width:40%;font-size:20px;background-color: #4CAF50;color:white;border: none;border-radius: 12px;">Homepage</button></a></b></p></center>
	</body>';
		
			
		exit;
		
	}
	else if($serviceid==5)
	{
		echo '<body style="background:#ffe1e1;">
		<center>
	<img class="logosvg" style="height:15%; width:40%;" src="http://funworld.mobi/glamportal/image/logo.png"><b><p style="font-size: 25;">You already subscribed this service.Kindly click on Below Button to use the service<br><br> <a href="http://funworld.mobi/glamportal/"><button style="height:15%;width:40%;font-size:20px;background-color: #4CAF50;color:white;border: none;border-radius: 12px;">Homepage</button></a></b></p></center>
	</body>';
		
			
		exit;
		
	}
	else{
		
		echo '<body style="background:#ffe1e1;">
		<center>
	<img class="logosvg" style="height:15%; width:40%;" src="http://funworld.mobi/portugal/image/gamebar.png"><b><p style=
	"font-size: 25;">You already subscribed this service.Kindly click on Below Button to use the service<br><br> <a href="http://funworld.mobi/gamebar/"><button style="height:15%;width:40%;font-size:20px;background-color: #4CAF50;color:white;border: none;border-radius: 12px;">Homepage</button></a></b></p></center>
	</body>';
		
			
		exit;
		
	}
	
}
else if($status_code==8) //Invalid request 
{
	
	
	
	if($serviceid==1)
	{	
		echo '
		<body style="background:#ffe1e1;">
		<center>
	<img class="logosvg" style="height:15%; width:40%;" src="http://funworld.mobi/worldforher/image/logo.png"><b><p style="font-size: 25;">Invalid request has been occured ,please try again after sometime<br><br> <a href="http://funworld.mobi/vd/staging/index.php?planid=1"><button style="height:15%;width:40%;font-size:20px;background-color: #4CAF50;color:white;border: none;border-radius: 12px;">Return to Homepage</button></a></b></p></center>
	</body>';
		exit;
	}
	else if($serviceid==2)
	{	
		echo '
		<body style="background:#ffe1e1;">
		<center>
	<img class="logosvg" style="height:15%; width:40%;" src="http://funworld.mobi/fitnessguru/images/Fitness-Guru.png"><b><p style="font-size: 25;">Invalid request has been occured ,please try again after sometime<br><br> <a href="http://funworld.mobi/vd/staging/index.php?planid=2"><button style="height:15%;width:40%;font-size:20px;background-color: #4CAF50;color:white;border: none;border-radius: 12px;">Return to Homepage</button></a></b></p></center>
	</body>';
		exit;
	}
	else if($serviceid==3)
	{	
		echo '
		<body style="background:#ffe1e1;">
		<center>
	<img class="logosvg" style="height:15%; width:40%;" src="http://funworld.mobi/beautytips/content/Beauty%20Tips%20Logo.png"><b><p style="font-size: 25;">Invalid request has been occured ,please try again after sometime<br><br> <a href="http://funworld.mobi/vd/staging/index.php?planid=3"><button style="height:15%;width:40%;font-size:20px;background-color: #4CAF50;color:white;border: none;border-radius: 12px;">Return to Homepage</button></a></b></p></center>
	</body>';
		exit;
	}
	else if($serviceid==5)
	{	
		echo '
		<body style="background:#ffe1e1;">
		<center>
	<img class="logosvg" style="height:15%; width:40%;" src="http://funworld.mobi/glamportal/image/logo.png"><b><p style="font-size: 25;">Invalid request has been occured ,please try again after sometime<br><br> <a href="http://funworld.mobi/vd/staging/index.php?planid=5"><button style="height:15%;width:40%;font-size:20px;background-color: #4CAF50;color:white;border: none;border-radius: 12px;">Return to Homepage</button></a></b></p></center>
	</body>';
		exit;
	}
	else 
	{	
		echo '
		<body style="background:#ffe1e1;">
		<center>
	<img class="logosvg" style="height:15%; width:40%;" src="http://funworld.mobi/portugal/image/gamebar.png"><b><p style="font-size: 25;">Invalid request has been occured ,please try again after sometime<br><br> <a href="http://funworld.mobi/vd/staging/index.php?planid=4"><button style="height:15%;width:40%;font-size:20px;background-color: #4CAF50;color:white;border: none;border-radius: 12px;">Return to Homepage</button></a></b></p></center>
	</body>';
		exit;
	}
	
	
	
	
	
	
	
	
	
	/*echo '
	<body style="background:#ffe1e1;">
	
	<center>
	<img class="logosvg" style="height:15%; width:40%;" src="http://funworld.mobi/portugal/image/gamebar.png">
	<b><p style="font-size: 25;">Invalid request has been occurs ,please try again after sometime</p></b></center></body>';*/
	
	exit;
	
	
}
else if($status_code==9) //BLOCKED
{
	
	echo '
	<body style="background:#ffe1e1;">
	
	<center>
	
	<b><p style="font-size: 25;">you are not eligibe to subscribe this service</p></b></center></body>';
	
		exit;
	
}

?>