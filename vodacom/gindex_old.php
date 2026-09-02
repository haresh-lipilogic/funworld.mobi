<!--<meta http-equiv="Content-Security-Policy" content="default-src 'self' 'unsafe-inline'; img-src http://* css; child-src 'none';">-->


<?php
//var_dump(getallheaders());
//exit;
//echo "Campaign has been blocked please Contact Administrator";exit;
error_reporting(0);
header('X-Frame-Options: DENY');
//header('X-Content-Type-Options: nosniff');
//header("Content-Security-Policy: default-src 'self'");
header("Referrer-Policy: origin");
header("Feature-Policy: geolocation 'none'");
header("Strict-Transport-Security: max-age=3600");
$status= http_response_code();
$pageurl='http://'.$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; // Page URL
include "includes/dbdetail.php";
include "function.php";
 session_start();
$serviceid=$_GET['planid'];
//echo $mode;exit;
$serviceid=4;
if($serviceid ==5)
{
	$mode='staging';
}


if($status==302)
{
	echo "<h3 style='color:red'>302 You are not authorise to subscribe this Service</h3>";
	exit;
}



if($serviceid==1)
{
	
	if(isset($_COOKIE["vodacom_worldforher_act"]))
	{
		$subid1=$_COOKIE["vodacom_worldforher_act"];
		
	 	$sql="select * from ".$db.". subscriber where serviceid='".$serviceid."' and clickid='".$subid1."' order by id desc limit 1";
		$result1 = $conn1->query($sql);
			//$numrows1=$result1->num_rows;
			
				while($row = $result1->fetch_assoc()) {
				
						$charging_mode=$row['charging_mode'];
				}
		
		if($charging_mode !='dct')
		{
			header("location:http://funworld.mobi/worldforher/");
			exit;
		}
	}
	else{
		
		$cookie_count='worldforhervisit';
		$co=1;
		if(!isset($_COOKIE[$cookie_count])) {
			//setcookie($cookie_name, $clickid, time() + (86400 * 2), "/"); 
			setcookie($cookie_count, $co, time() + (86400 * 2), "/");
				//header("location:$url");
		}
		else{
			$cookie_count='worldforhervisit';
			//$clickid1=$_COOKIE[$cookie_name];
			
			 $co=$_COOKIE[$cookie_count]+1;
			if($co >=3)
			{
				echo "You have blocked  For Service for 3 Days ";
				exit;
			}
			setcookie($cookie_count, $co, time() + (86400 * 2), "/");
		}
		
		
		
		
	}
}
else if($serviceid==2){
	if(isset($_COOKIE["vodacom_fitness_act"]))
	{
		$subid1=$_COOKIE["vodacom_fitness_act"];
		
		$sql="select * from ".$db.". subscriber where serviceid='".$serviceid."' and clickid='".$subid1."' order by id desc limit 1";
		$result1 = $conn1->query($sql);
			//$numrows1=$result1->num_rows;
			
				while($row = $result1->fetch_assoc()) {
				
						$charging_mode=$row['charging_mode'];
				}
		
		if($charging_mode !='dct')
		{
		header("location:http://funworld.mobi/fitnesstips/");
		exit;
		}
	}
	else{
		
		$cookie_count='fitnessguruvisit';
		$co=1;
		if(!isset($_COOKIE[$cookie_count])) {
			//setcookie($cookie_name, $clickid, time() + (86400 * 2), "/"); 
			setcookie($cookie_count, $co, time() + (86400 * 2), "/");
				//header("location:$url");
		}
		else{
			$cookie_count='fitnessguruvisit';
			//$clickid1=$_COOKIE[$cookie_name];
			
			 $co=$_COOKIE[$cookie_count]+1;
			if($co >=3)
			{
				echo "you Have Reached Max Limit Reached";
				exit;
			}
			setcookie($cookie_count, $co, time() + (86400 * 2), "/");
		}
		
		
		
		
	}
}
else if($serviceid==3){
	
	if(isset($_COOKIE["vodacom_beautytips_act"]))
	{
		
		$subid1=$_COOKIE["vodacom_beautytips_act"];
		
		$sql="select * from ".$db.". subscriber where serviceid='".$serviceid."' and clickid='".$subid1."' order by id desc limit 1";
		$result1 = $conn1->query($sql);
			//$numrows1=$result1->num_rows;
			
				while($row = $result1->fetch_assoc()) {
				
						$charging_mode=$row['charging_mode'];
				}
		
		if($charging_mode !='dct')
		{
		header("location:http://funworld.mobi/beautytips/");
		exit;
		}
		
	}
	else{
		
		$cookie_count='beautytipsvisit';
		$co=1;
		if(!isset($_COOKIE[$cookie_count])) {
			//setcookie($cookie_name, $clickid, time() + (86400 * 2), "/"); 
			setcookie($cookie_count, $co, time() + (86400 * 2), "/");
				//header("location:$url");
		}
		else{
			$cookie_count='beautytipsvisit';
			//$clickid1=$_COOKIE[$cookie_name];
			
			 $co=$_COOKIE[$cookie_count]+1;
			if($co >=3)
			{
				echo "you Have Reached Max Limit Reached";
				exit;
			}
			setcookie($cookie_count, $co, time() + (86400 * 2), "/");
		}
		
		
		
		
	}
	
	
	
}
else if($serviceid==4){
	
	if(isset($_COOKIE["vodacom_gamebar_act"]))
	{
		
		$subid1=$_COOKIE["vodacom_gamebar_act"];
		
		$sql="select * from ".$db.". subscriber where serviceid='".$serviceid."' and clickid='".$subid1."' order by id desc limit 1";
		$result1 = $conn1->query($sql);
			//$numrows1=$result1->num_rows;
			
				while($row = $result1->fetch_assoc()) {
				
						$charging_mode=$row['charging_mode'];
				}
		
		if($charging_mode !='dct')
		{
		header("location:http://funworld.mobi/gamebar/");
		exit;
		}
		
	}
	else{
		
		$cookie_count='gamebarvisit';
		$co=1;
		if(!isset($_COOKIE[$cookie_count])) {
			//setcookie($cookie_name, $clickid, time() + (86400 * 2), "/"); 
			setcookie($cookie_count, $co, time() + (86400 * 2), "/");
				//header("location:$url");
		}
		else{
			$cookie_count='gamebarvisit';
			//$clickid1=$_COOKIE[$cookie_name];
			
			 $co=$_COOKIE[$cookie_count]+1;
			if($co >=3)
			{
				echo "you Have Reached Max Limit Reached";
				exit;
			}
			setcookie($cookie_count, $co, time() + (86400 * 2), "/");
		}
		
		
		
		
	}
	
	
	
}
else {
	
	if(isset($_COOKIE["vodacom_glambar_act"]))
	{
		
		$subid1=$_COOKIE["vodacom_glambar_act"];
		
		$sql="select * from ".$db.". subscriber where serviceid='".$serviceid."' and clickid='".$subid1."' order by id desc limit 1";
		$result1 = $conn1->query($sql);
			//$numrows1=$result1->num_rows;
			
				while($row = $result1->fetch_assoc()) {
				
						$charging_mode=$row['charging_mode'];
				}
		
		if($charging_mode !='dct')
		{
		header("location:http://funworld.mobi/glamportal/");
		exit;
		}
		
	}
	else{
		
		$cookie_count='glambarvisit';
		$co=1;
		if(!isset($_COOKIE[$cookie_count])) {
			//setcookie($cookie_name, $clickid, time() + (86400 * 2), "/"); 
			setcookie($cookie_count, $co, time() + (86400 * 2), "/");
				//header("location:$url");
		}
		else{
			$cookie_count='glambarvisit';
			//$clickid1=$_COOKIE[$cookie_name];
			
			 $co=$_COOKIE[$cookie_count]+1;
			if($co >=3)
			{
				echo "you Have Reached Max Limit Reached";
				exit;
			}
			setcookie($cookie_count, $co, time() + (86400 * 2), "/");
		}
		
		
		
		
	}
	
	
	
}




$ll='';
		if($_SERVER['HTTP_X_FORWARDED_FOR']== '')
		{
			$ip=$_SERVER['REMOTE_ADDR'];
		}
		else{
			$ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
		}   

		if(sizeof($ip) == 1)
		{
			
		}
		else{
			echo "your ip has been Blocked due to find unaurhorised activity";
			exit;
		}
		
		//$ip='202.91.18.3';

		// Get Xforward IP Address
		if($_SERVER['REMOTE_ADDR'] == '')
		{
			$xforward = '';
		}
		else
		{
			$xforward = $_SERVER['REMOTE_ADDR'];
		}

		$pageurl=$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; // Page URL
		$referrer= $_SERVER['HTTP_REFERER']; //  Referrer URL
		//$browser = $_SERVER['HTTP_USER_AGENT'] ;
		function getClientIp() {
			 $ipaddress = null;
			 if ($_SERVER['HTTP_CLIENT_IP']) {
				$ipaddress = $_SERVER['HTTP_CLIENT_IP'];
			 } else if ($_SERVER['HTTP_X_FORWARDED_FOR']) {
				$ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
			 } else if ($_SERVER['HTTP_X_FORWARDED']) {
				$ipaddress = $_SERVER['HTTP_X_FORWARDED'];
			 } else if ($_SERVER['HTTP_FORWARDED_FOR']) {
				$ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
			 } else if ($_SERVER['HTTP_FORWARDED']) {
				$ipaddress = $_SERVER['HTTP_FORWARDED'];
			 } else if ($_SERVER['REMOTE_ADDR']) {
				$ipaddress = $_SERVER['REMOTE_ADDR'];
			}
			return $ipaddress; 
		}
		

		if($_GET['advid']=='')
		{
			$advertiserid=0;
		} 
		else{
			$advertiserid=$_GET['advid'];
			//exit;
		}  // Advertiserid
		
		//echo $serviceid;exit;
		if($serviceid==1)
		{
		$sql24 = "SELECT * from ".$advdb.".campaignconfig  where operator='Vodacom_wfh' and product='glambar'";
		$op='Vodacom_wfh';
		}
		else if($serviceid==2)
		{
			$sql24 = "SELECT * from ".$advdb.".campaignconfig  where operator='Vodacom_fg' and product='glambar'";
			$op='Vodacom_fg';
		}
		else if ($serviceid==3)
		{
			$sql24 = "SELECT * from ".$advdb.".campaignconfig  where operator='Vodacom_bt' and product='glambar'";
			$op='Vodacom_bt';
		}
		else if($serviceid==4)
		{
			 $sql24 = "SELECT * from ".$advdb.".campaignconfig  where operator='Vodacom_game' and product='gamebar'";
			$op='Vodacom_game';
			
		}
		else {
			$sql24 = "SELECT * from ".$advdb.".campaignconfig  where operator='Vodacom_glam' and product='glambar'";
			$op='Vodacom_glam';
			
		}
		//echo $sql24;exit;
			$me1=$conn1->query($sql24);
				while($row = $me1->fetch_assoc()) {
				
						$activationcap=$row['activationcap'];
						
					}
					
		
		
		
		$date55=date('Y-m-d');
		  $sql24 = "SELECT distinct(subscriber.clickid) from ".$db.".subscriber inner join ".$dblog.".userlog on subscriber.clickid=userlog.clickid where charging_mode='trial' and amount=0  and userlog.accesstime>'".$date55."' and subscriptionstartdate >'".$date55."' and subscriber.serviceid='".$serviceid."'";
			
			//echo $sql24;exit;
			
			$me1=$conn1->query($sql24);
		
		$rowcount11=mysqli_num_rows($me1);
		
		//echo $activationcap;
		//echo "<br>".$rowcount11;
		if($activationcap<=$rowcount11)
		{
				echo "Full Cap is Over please contact Administrator";exit;
		}
		 
		
		
		
		
		
		$sql24 = "SELECT * from ".$db.".advertmanage  where advertiserid='".$advertiserid."' and serviceid='".$serviceid."'";
		//echo $sql24."<br>";exit;
			$me1=$conn1->query($sql24);
				$rowcount25=0;
			   $rowcount25=mysqli_num_rows($me1);
			   if($rowcount25==0)
			   {
				   //echo "hi2";exit;
				    $sql2 = "SELECT * from ".$advdb.".advertiser  where advertiserid='".$advertiserid."'";
				   $me3=$conn1->query($sql2);
				   while($row = $me3->fetch_assoc()) {
				
						 $advid=$row['advertiserid'];
						 $advname=$row['advname'];
					}
					//echo "INSERT INTO ".$db.".advertmanage (`advertiserid`,`serviceid` ,`advname`, `operator`) VALUES ('$advid','$serviceid','$advname','$op')";
					$stmt1 = $conn1->prepare("INSERT INTO ".$db.".advertmanage (`advertiserid`,`serviceid`,`advname`, `operator`) VALUES (?,?,?,?)");
					$stmt1->bind_param("ssss",$advid,$serviceid,$advname,$op);	
					$stmt1->execute();
			   }
		
		 $sql24 = "SELECT * from ".$db.".advertmanage  where isactive=0 and advertiserid='".$advertiserid."' and serviceid='".$serviceid."' ";
			//echo $sql24;exit;
			$me1=$conn1->query($sql24);
				$rowcount25=0;
			    $rowcount25=mysqli_num_rows($me1); 
			
			if ($rowcount25 > 0)
			{
				
				echo "Your Traffic has been blocked please Contact Administrator ";
				exit;
			}
		
		

		$useragent=strtolower($_SERVER['HTTP_USER_AGENT']); // User Agent
		//$userip=getClientIp();
		
		// creating clickid
		$mt = microtime(true);
		$mt =  $mt*1000; //microsecs
		$clickid = "vod".((string)$mt*10).rand(1, 999); 
		$txnid="t".((string)$mt*10).rand(1, 999);
		$chargeid="c".((string)$mt*10).rand(1, 999);
		if($_GET['pubid'] == '')
		{
			$pubid='101010';
		}
		else
		{
			$pubid=$_GET['pubid'];
		}
		
		
		if($_GET['clickid']=='')
		{
			$advertclickid='';
		}
		else{
			
			 $advertclickid=$_GET['clickid'];
		}

		
		
 
			
		
		
		
		date_default_timezone_set("Asia/Kolkata");
		$date=date("Y-m-d H:i:s");
		$xforwardwith=strtolower($_SERVER['HTTP_X_REQUESTED_WITH']);
		
		
		
		
		
		
		
foreach (getallheaders() as $name => $value) {
    //echo "$name: $value<br>";
	
	$ll=$ll.$name.":$value&";
	
}
$ip_address=$Referrer='';
$ip_address = $_SERVER['HTTP_CLIENT_IP'];
$accesstime=date("Y-m-d H:i:s");
$referrer= $_SERVER['HTTP_REFERER']; 
//  Referrer URL
$stmt1 = $conn1->prepare("INSERT INTO ".$dblog.".he (ip,referal,accesstime,he_detail) VALUES (?,?,?,?)");
$stmt1->bind_param("ssss",$ip_address, $referrer,$accesstime,$ll);
$stmt1->execute();



$useragent=strtolower($_SERVER['HTTP_USER_AGENT']);

if (strpos( $useragent,'android') == true || strpos( $useragent,'iphone') == true ) {

}
else{
	//echo "This service not available for Desktop ";
//exit;
}

if (strpos( $useragent,'opera') == true ) {
	echo "Opera Browser not allowed";
exit;
}





if (isset($_SERVER['HTTP_X_VCZA_ACR']) || $_GET['test']==1)
{
  //$data=$_SERVER['HTTP_X_VC_ACR'];
  $xvczaacr=$_SERVER['HTTP_X_VCZA_ACR'];
  //echo "hi2";exit;
  if($_GET['test']==1)
  {
  $xvczaacr='407d16f95f4600902730e77dce6a4f8773ee431c28be33a55e55d767cf8aa647e3c296ef7a55abf9874acb4c85332295b23103d7d65570182cb533d1dc913790cf2bf8c5f9d66ba7888909b3fe680686edef74d6b8f5784fb9d2ec07a70b01b5cb4efff8295e61084c2b7753705735e0c6707c7bf1367e59e3335b5342118ab79e8fe52855a2d334077ab6e3425b5de14fb238b65e07a302661415a73c5912c6668e4344325009499d352eecbda6a5ab64d8ececcaf99ae6e05849f850623f674570b0e38057ce0245844a1da038c061179b786310793983cfa7d7033c03a9f858d219f19d0fdda03c495a447298443a789d58239f0d88825128e04b0acc650e';
  }
	$msisdn=0;
	$operator='';
    $insert_userlog="call ".$dblog.".insert_userlog ('".$date."','".$msisdn."','".$operator."','".$referrer."','".$clickid."','".$pubid."','".$advertiserid."','".$ip."','".$advertclickid."','".$useragent."','".$xforwardwith."','".$serviceid."','".$pageurl."','".$xvczaacr."')";  
		$res_userlog=$conn1->query($insert_userlog);

		
		//$msisdn=decrypt($data);
		//$msisdn=88; 
		
	/*	$sql23 = "SELECT * from ".$db.".dndnumbers  where number like '%".$msisdn."%'";
			$me=$conn1->query($sql23);
			
			   $rowcount22=mysqli_num_rows($me);
				if($rowcount22>0)
				{
					echo "your number is Block to Subscribe the Service ";
					exit;
				}

		*/
		 // $update_userlog="update ".$dblog.".userlog  set msisdn='".$msisdn."' where clickid='".$clickid."'";  
		//$up_userlog=$conn1->query($update_userlog);
		
		
		
		
		if ($xforwardwith != '')
		{
		 $sql23 = "SELECT * from fashionbardb_africa.blockurls  where url like '%".$xforwardwith."%'";
			$me=$conn1->query($sql23);
			
			   $rowcount22=mysqli_num_rows($me); 
			//exit;
			if ($rowcount22 > 0)
			{
				//$withouturl="http://skybiter.com/l/14158415ab24a813bdd4?sub=%7ByourClickId%7D&source=%7ByourSubPublisherId%7D";
				//header("location:".$withouturl);
				echo "Your Application Have Blocked ";
				exit;
			}
			
		}	
		
		
		
		
  
  //$serviceid=$_GET['planid'];
  
   //$decouplin=usage_authenticate($clickid,$xvczaacr,$serviceid,$txnid);
   $decouplin=getserviceoffers($clickid,$xvczaacr,$serviceid,$txnid);
   
   // print_r($decouplin);
	//exit;
	
	 $decoupling=$decouplin['payload']['get-service-offers-response']['service']['pricepoint'][0]['@attributes']['id'];
	 if($decoupling=='')
	 {
		 $decoupling=$decouplin['payload']['get-service-offers-response']['service']['pricepoint']['@attributes']['id'];
	 }
	
	//echo $decoupling;
	//exit;
	
   $authenticationid=$decouplin['@attributes']['id']; 
   //print_r($authenticationid);
   //echo $authenticationid;exit;
   if ($authenticationid !='120055')
   {
	   
	  
	   
   }
   else{
   
   
   
  // $issuccess=$decoupling['payload']['purchase-options']['packages']['package']['id'];
  
  //exit;
  
 //$ll= $decouplin['payload']['get-service-offers-response']['service']['subscription'];
 // print_r($ll);
  
   $success=$decouplin['payload']['get-service-offers-response']['service']['subscription']['@attributes']['id'];
	  // echo $success;exit;
	   if ($success>0)
	   {
		   
		   $sql="select * from ".$db.".subscriber where subscriptionid='".$success."' order by id desc limit 1";
		$result1 = $conn1->query($sql);
			//$numrows1=$result1->num_rows;
			
				while($row = $result1->fetch_assoc()) {
				
						$clickid=$row['clickid'];
						
				}
		   
		   if($serviceid==4)
		   {
			   
			    setcookie("vodacom_gamebar_act", $clickid, time() + (86400 * 2), "/");
			   
			echo '<body style="background:#ffe1e1;">
			<center>
			<img class="logosvg" style="height:15%; width:40%;" src="http://funworld.mobi/portugal/image/gamebar.png"><b><p style=
			"font-size: 35;">You already subscribed this service.Kindly click on Below Button to use the service<br><br> <a href="http://funworld.mobi/gamebar/"><button style="height:15%;width:40%;font-size:35px;background-color: #4CAF50;color:white;border: none;border-radius: 12px;">Homepage</button></a></b></p></center>
			</body>';
			exit;
		   }
		   else if($serviceid==1)
		   {
			   
			   setcookie("vodacom_worldforher_act", $clickid, time() + (86400 * 2), "/");
			   
			echo '<body style="background:#ffe1e1;">
			<center>
			<img class="logosvg" style="height:15%; width:40%;" src="http://funworld.mobi/worldforher/image/logo.png"><b><p style=
			"font-size: 35;">You already subscribed this service.Kindly click on Below Button to use the service<br><br> <a href="http://funworld.mobi/worldforher/"><button style="height:15%;width:40%;font-size:35px;background-color: #4CAF50;color:white;border: none;border-radius: 12px;">Homepage</button></a></b></p></center>
			</body>';
			exit;
		   }
		   else if($serviceid==2)
		   {
			   
			    setcookie("vodacom_fitness_act", $clickid, time() + (86400 * 2), "/");
			   
			echo '<body style="background:#ffe1e1;">
			<center>
			<img class="logosvg" style="height:15%; width:40%;" src="http://funworld.mobi/fitnesstips/images/Fitness-Guru.png"><b><p style=
			"font-size: 35;">You already subscribed this service.Kindly click on Below Button to use the service<br><br> <a href="http://funworld.mobi/fitnesstips/"><button style="height:15%;width:40%;font-size:35px;background-color: #4CAF50;color:white;border: none;border-radius: 12px;">Homepage</button></a></b></p></center>
			</body>';
			exit;
		   }
		   else
		   {
			    setcookie("vodacom_beautytips_act", $clickid, time() + (86400 * 2), "/");
			echo '<body style="background:#ffe1e1;">
			<center>
			<img class="logosvg" style="height:15%; width:40%;" src="http://funworld.mobi/beautytips/content/Beauty%20Tips%20Logo.png"><b><p style=
			"font-size: 35;">You already subscribed this service.Kindly click on Below Button to use the service<br><br> <a href="http://funworld.mobi/beautytips/"><button style="height:15%;width:40%;font-size:35px;background-color: #4CAF50;color:white;border: none;border-radius: 12px;">Homepage</button></a></b></p></center>
			</body>';
			exit;
		   }
		   
	   }
  
  
  
  
  
  
  $sql="select * from ".$db.".redirect_url where mode='".$mode."'";
		$result1 = $conn1->query($sql);
			//$numrows1=$result1->num_rows;
			
				while($row2 = $result1->fetch_assoc()) {
				
					$url2=$row2['url'];
					//$advid=$row2['advid'];
					$redirecturl=$row2['redirecturl'];
				}
  
	$sql="select * from ".$db.". service where serviceid='".$serviceid."'";
		$result1 = $conn1->query($sql);
			//$numrows1=$result1->num_rows;
			
				while($row = $result1->fetch_assoc()) {
				
					$servicename=$row['servicename'];
					$servicecode=$row['servicecode'];
					$username=$row['serviceusername'];
					$password=$row['servicepassword'];
				}
  
  
  
  
  
  
  
 
 
  
  
		$url2=$url2."?partner-id=".$username."&token=".$xvczaacr."&package-id=".$decoupling."&client-txn-id=".$txnid."&partner-redirect-url=".$redirecturl;
		
		
		$stmt1 = $conn1->prepare("INSERT INTO ".$dblog.".redirect_request (url,senttime,msisdn,clickid,txnid) VALUES (?,?,?,?,?)");
				$stmt1->bind_param("sssss",$url2, $date,$xvczaacr,$clickid,$txnid);	
				$stmt1->execute();
  
		$charging_mode='first';
		$subscriptionenddate=date('Y-m-d H:i:s', strtotime( ' +1 day'));
		$amount=0;
		$try=0;
		
		
		$stmt1 = $conn1->prepare("INSERT INTO ".$db.".subscriber (msisdn,clickid, advid, charging_mode,subscriptionstartdate, subscriptionenddate, amount, serviceid, servicename, servicecode, token, packageid, try,txnid,chargeid,xvczaacr) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
		$stmt1->bind_param("ssssssssssssssss",$msisdn,$clickid,$advertiserid, $charging_mode,$date,$subscriptionenddate,$amount,$serviceid,$servicename,$servicecode,$data,$decoupling,$try,$txnid,$chargeid,$xvczaacr);	
		$stmt1->execute();
		
		
  // if($advertiserid=='14' || $advertiserid=='15' || $advertiserid=='16' || $advertiserid== '17' || $advertiserid=='1' || $advertiserid=='3' || $advertiserid=='20' || $advertiserid=='21' || $advertiserid=='22' || $advertiserid=='23')
		//if($advertiserid > '0')
	//	if($advertiserid=='14' || $advertiserid=='15' || $advertiserid=='16' || $advertiserid== '17' || $advertiserid=='1' || $advertiserid=='3' || $advertiserid=='20' || $advertiserid=='21' || $advertiserid=='22' || $advertiserid=='23')	
		
		
		
		if ($serviceid==1)
		{
		?>	
			
			
			<!DOCTYPE html> <html>     <head>         <meta name="viewport" content="width=device-width">        
			 <title>World for Her</title>             

			<meta http-equiv="expires" content="Mon, 06 Jan 1990 00:00:01 GMT">          

			<!--<link href="/skysms/css/DCB_go4mobility.css" type="text/css" rel="stylesheet">     
			-->

			<style>
			.button {
				background-color: #4CAF50; /* Green */
				border: none;
				color: white;
				padding: 4px 8px;
				text-align: center;
				width:170px;
				text-decoration: none;
				display: inline-block;
				font-size: 16px;
				margin: 2px 1px;
				-webkit-transition-duration: 0.4s; /* Safari */
				transition-duration: 0.4s;
				cursor: pointer;
				border-radius: 12px;
				
			}



			</style>
			</head>     

			<body style="color:#b5171e ;background:#ffe1e1; font-size:12px">  
			<center> <img class="logosvg" style="height:10%; width:40%;" src="http://funworld.mobi/worldforher/image/logo.png"></center>      
			<div id="LogoDiv">             
			<a><img src="http://funworld.mobi/worldforher/images/use2.jpg" width="640" style="width:100%;height:15%"></a>         
			</div>         

			<div id="main">

			 <center>
			 <div class="home-faq"><h3>World for Her </h3>
			 <h4>World four Her service provides current and relevant information for every woman: health, fashion, homecare and cooking advices, news provided by professionals.</h4>
			 </div><center>         
			</div>         
			<form method="POST" style="font-size:10px">             
			<div style="text-align:center">                 
				 
						
			<!--
			  <p style="text-align:center">Un valor de %VALUE% se facturará o descontará de su saldo %OPERATOR%</h3>     
			   <div class="errors">%ERROR_LIST%</div>  
			   Confirme el PIN enviado:
			   <p class="input-container"> -->      
					
			   <a href="<?php echo $url2; ?>"><input class="button button1" type="button" name="select" value="Subscribe">  </a>   
					
				<p>Service with First Day Free From the Second day you will Charged R5.00 per day.</p>
			   
			   
			   
			   <!--<p><input type="submit" name="unknown" value="N&atilde;o sou subscritor %OPERATOR%" class="unknown" /></p>             
			   --></div>             
			  <!-- <center>%HIDDEN%</center>-->             
			 <div id="Footer">                 
			              
			 <div id="textbox">      
				 <br> 
		<!--	<a href="http://funworld.mobi/worldforher/index.php" style="color:#C00">Home</a> |     -->                
			  <a href="http://funworld.mobi/vodacom/production/wfhtnc.html"style="color:#C00">Terms&Conditions </a>                     

			<div style="clear: both;"></div>                 </div>
							 
			<div style="clear: both;"></div>            
			</div>
			</form>         
			<!--<center><div id="copyright"><p>Copyright Go4Mobility(PT)</p></div></center>-->     </body> </html> 
						
						
		<?php	
		}
		else if($serviceid==2)
		{
		?>	
			
		
			<!DOCTYPE html> <html>     <head>         <meta name="viewport" content="width=device-width">        
			 <title>Fitness Tips</title>             

			<meta http-equiv="expires" content="Mon, 06 Jan 1990 00:00:01 GMT">          

			<!--<link href="/skysms/css/DCB_go4mobility.css" type="text/css" rel="stylesheet">     
			-->

			<style>
			.button {
				background-color: #4CAF50; /* Green */
				border: none;
				color: white;
				padding: 4px 8px;
				text-align: center;
				width:170px;
				text-decoration: none;
				display: inline-block;
				font-size: 16px;
				margin: 2px 1px;
				-webkit-transition-duration: 0.4s; /* Safari */
				transition-duration: 0.4s;
				cursor: pointer;
				border-radius: 12px;
				
			}



			</style>
			</head>     

			<body style="color:#b5171e ;background:#ffe1e1; font-size:12px">  
			<center> <img class="logosvg" style="height:10%; width:40%;" src="http://funworld.mobi/fitnessguru/images/Fitness-Guru.png"></center>      
			<div id="LogoDiv">             
			<a><img src="http://funworld.mobi/fitnessguru/Banners/1.jpg" width="640"  style="width:100%;height:15%"></a>         
			</div>         

			<div id="main">

			 <center>
			 <div class="home-faq"><h3>Fitness Tips </h3>
			 <h4>Fitness Tips service provides different fitness exercise for all generations.</h4>
			 </div><center>         
			</div>         
			<form method="POST" style="font-size:10px">             
			<div style="text-align:center">                 
				 
						
			<!--
			  <p style="text-align:center">Un valor de %VALUE% se facturará o descontará de su saldo %OPERATOR%</h3>     
			   <div class="errors">%ERROR_LIST%</div>  
			   Confirme el PIN enviado:
			   <p class="input-container"> -->      
					
			   <a href="<?php echo $url2; ?>"><input class="button button1" type="button" name="select" value="Subscribe">  </a>   
					
				<p>Service with First Day Free From the Second day you will Charged R5.00 per day.</p>
			   
			   
			   
			   <!--<p><input type="submit" name="unknown" value="N&atilde;o sou subscritor %OPERATOR%" class="unknown" /></p>             
			   --></div>             
			  <!-- <center>%HIDDEN%</center>-->             
			 <div id="Footer">                 
			                
			 <div id="textbox">      
				 <br> 
			<!--<a href="http://funworld.mobi/fitnessguru/index.php" style="color:#C00">Home</a> |        -->             
			  <a href="http://funworld.mobi/vodacom/production/fttnc.html"style="color:#C00">Terms&Conditions </a>                     

			<div style="clear: both;"></div>                 </div>
							 
			<div style="clear: both;"></div>            
			</div>
			</form>         
			<!--<center><div id="copyright"><p>Copyright Go4Mobility(PT)</p></div></center>-->     </body> </html> 
			
			
		<?php	
		}
		
		else if($serviceid==3){
			
		?>
		
		
			<!DOCTYPE html> <html>     <head>         <meta name="viewport" content="width=device-width">        
			 <title>Beauty tips</title>             

			<meta http-equiv="expires" content="Mon, 06 Jan 1990 00:00:01 GMT">          

			<!--<link href="/skysms/css/DCB_go4mobility.css" type="text/css" rel="stylesheet">     
			-->

			<style>
			.button {
				background-color: #4CAF50; /* Green */
				border: none;
				color: white;
				padding: 4px 8px;
				text-align: center;
				width:170px;
				text-decoration: none;
				display: inline-block;
				font-size: 16px;
				margin: 2px 1px;
				-webkit-transition-duration: 0.4s; /* Safari */
				transition-duration: 0.4s;
				cursor: pointer;
				border-radius: 12px;
				
			}



			</style>
			</head>     

			<body style="color:#b5171e ;background:#ffe1e1; font-size:12px">  
			<center> <img class="logosvg" style="height:10%; width:40%;" src="http://funworld.mobi/beautytips/content/Beauty%20Tips%20Logo.png"></center>      
			<div id="LogoDiv">             
			<a><img src="http://funworld.mobi/beautytips/Banners/1.jpg" width="640"  style="width:100%;height:15%"></a>         
			</div>         

			<div id="main">

			 <center>
			 <div class="home-faq"><h3>Beauty tips </h3>
			 <h4>Beauty Tips service provides skin & hair care tips for women with new content being added every week to make it more relevant & increase the life time user value.</h4>
			 </div><center>         
			</div>         
			<form method="POST" style="font-size:10px">             
			<div style="text-align:center">                 
				 
						
			<!--
			  <p style="text-align:center">Un valor de %VALUE% se facturará o descontará de su saldo %OPERATOR%</h3>     
			   <div class="errors">%ERROR_LIST%</div>  
			   Confirme el PIN enviado:
			   <p class="input-container"> -->      
					
			   <a href="<?php echo $url2; ?>"><input class="button button1" type="button" name="select" value="Subscribe">  </a>   
					
				<p>Service with First Day Free, From the Second day you will Charged R2.00 per day.</p>
			   
			   
			   
			   <!--<p><input type="submit" name="unknown" value="N&atilde;o sou subscritor %OPERATOR%" class="unknown" /></p>             
			   --></div>             
			  <!-- <center>%HIDDEN%</center>-->             
			 <div id="Footer">                 
			 <div id="textbox">      
				 <br> 
		<!--	<a href="http://funworld.mobi/beautytips/index.php" style="color:#C00">Home</a> |-->                     
			  <a href="http://funworld.mobi/vodacom/production/bttnc.html"style="color:#C00">Terms&Conditions </a>                     

			<div style="clear: both;"></div>                 </div>
							 
			<div style="clear: both;"></div>            
			</div>
			</form>         
			<!--<center><div id="copyright"><p>Copyright Go4Mobility(PT)</p></div></center>-->     </body> </html> 
			
		
		<?php
		}
		
		else{
			//echo "hi";exit;
			header("location:$url2");exit;
		?>
		
		
			<!DOCTYPE html> <html>     <head>         <meta name="viewport" content="width=device-width">        
			 <title>Gamebar</title>             

			<meta http-equiv="expires" content="Mon, 06 Jan 1990 00:00:01 GMT">          

			<!--<link href="/skysms/css/DCB_go4mobility.css" type="text/css" rel="stylesheet">     
			-->

			<style>
			.button {
				background-color: #4CAF50; /* Green */
				border: none;
				color: white;
				padding: 4px 8px;
				text-align: center;
				width:170px;
				text-decoration: none;
				display: inline-block;
				font-size: 16px;
				margin: 2px 1px;
				-webkit-transition-duration: 0.4s; /* Safari */
				transition-duration: 0.4s;
				cursor: pointer;
				border-radius: 12px;
				
			}



			</style>
			</head>     

			<body style="color:#b5171e ;background:#2633261c; font-size:12px">  
			<center> <img class="logosvg" style="height:10%; width:40%;" src="https://funworld.mobi/gamebar/images/gamebar.png"></center>      
			<div id="LogoDiv">             
			<a><img src="http://Gamebar.mobi/spain/gamebar/images/banner/banner3.jpg" width="640"  style="width:100%;height:15%"></a>         
			</div>         

			<div id="main">

			 <center>
			 <div class="home-faq"><h3>Gamebar </h3>
			 <h4>Looking for a new game to play on your phone or tablet? Here are our picks of the best mobile games.</h4>
			 </div><center>         
			</div>         
			<form method="POST" style="font-size:10px">             
			<div style="text-align:center">                 
				 
						
			<!--
			  <p style="text-align:center">Un valor de %VALUE% se facturará o descontará de su saldo %OPERATOR%</h3>     
			   <div class="errors">%ERROR_LIST%</div>  
			   Confirme el PIN enviado:
			   <p class="input-container"> -->      
					
			   <a href="<?php echo $url2; ?>"><input class="button button1" type="button" name="select" value="Subscribe">  </a>   
					
				<p>Service with First Day Free , From the Second day you will Charged R5.00 per day.</p>
			   
			   
			   
			   <!--<p><input type="submit" name="unknown" value="N&atilde;o sou subscritor %OPERATOR%" class="unknown" /></p>             
			   --></div>             
			  <!-- <center>%HIDDEN%</center>-->             
			 <div id="Footer">                 
			<div id="textbox">      
				 <br> 
		<!--	<a href="http://funworld.mobi/beautytips/index.php" style="color:#C00">Home</a> |-->                     
			  <a href="http://funworld.mobi/vodacom/production/gametnc.html"style="color:#C00">Terms&Conditions </a>                     

			<div style="clear: both;"></div>                 </div>
							 
			<div style="clear: both;"></div>            
			</div>
			</form>         
			<!--<center><div id="copyright"><p>Copyright Go4Mobility(PT)</p></div></center>-->     </body> </html> 
			
		
		<?php
		}
		
		
		
		
		
		
   }	
		
  exit;
}
else{
	
	echo "<p style='font-size: 100;'>Please turn off Wifi and try again.</p>";
	$msisdn=$operator=0;
	if($ip=='' or $ip ==NULL)
	{
		$ip=0;
	}
	if($serviceid=='' or $serviceid ==NULL)
	{
		$serviceid=0;
	}
	
	
	 $insert_userlog="call ".$dblog.".insert_userlog ('".$date."','".$msisdn."','".$operator."','".$referrer."','".$clickid."','".$pubid."','".$advertiserid."','".$ip."','".$advertclickid."','".$useragent."','".$xforwardwith."','".$serviceid."','".$pageurl."')";   
		$res_userlog=$conn1->query($insert_userlog);
exit;
}

//exit;







?>