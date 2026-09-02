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
				//echo "You have blocked  For Service for 3 Days ";
				//exit;
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
				//echo "you Have Reached Max Limit Reached";
				//exit;
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
			//	echo "you Have Reached Max Limit Reached";
			//	exit;
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
				//echo "you Have Reached Max Limit Reached";
				//exit;
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
				//echo "you Have Reached Max Limit Reached";
				//exit;
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

		if($advertiserid=='1149')
		{
			
			$advertclickid=$clickid;
			
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
exit;
}





if (isset($_SERVER['HTTP_X_VCZA_ACR']) || $_GET['test']==1)
{
  //$data=$_SERVER['HTTP_X_VC_ACR'];
  $xvczaacr=$_SERVER['HTTP_X_VCZA_ACR'];
  if($_GET['test']==1)
  {
  $xvczaacr='31358b63251e5f0479c99e49cca2cff062ca4405dc5436b6164cda700816c3a0df341dbd3df4e2e702701f254955666a8831c2e9f9142c91940cfcc15cf7d309a18ac5787fc9fd33ed20f835dd6af42b8aeffb753915335053ee3b2b2bbe149e9d4fa08d6a914333079781255c1e0430f1544ea1a1ee9023d418bc9b0636447e2fc2167a410cf55165618ba2ddc8c48e473960f97affea3d663cfb132bfc13f852a3f3ad8e0f2b2e9af9356776816337a5a2df4605b953f0c54cfaf5b19f226ecaba209cb5fe8e1b1b4fc542ef836d5aef3051a855cd9c57b8fb097e6de322d03de548d202515dd30a51ead912366c18bdc52fcf0788c3966d885ac7287309a1';
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
		
		
		
		$params = array(
				'ti' => $clickid,
				'ts' => time(),
				'country' => 'ZA',
				'te'=>'.button1',
				'carrier'=>'65501',
				'service'=>'Gamebar',
				
				
			);

			$queryString = http_build_query($params);
			$toSign = "sv_mobi" . $queryString . "Dt0eBdbT1JKO0TXhAqkGBzA70ukfNl74";
			$signature = hash("sha256", $toSign, false);

		 $url="https://api.clfldcbprotect.com/sv_mobi/script?" .$queryString . "&s=" . $signature;
			$kk= file_get_contents("$url");
		
		$kk1=json_decode($kk,true);
		//print_r($kk1);
		//$url1=$kk1['page_redirect'];
		//header("location:$url1");
		
		
		
		?>
		
		<script>
		<?php
		echo $script=$kk1['s'];
		
		?>
		
		</script>
		<?php
		//exit;
		
		
		
		
		
		
		
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
		
		//echo "response=".$kk6;exit;
			
  
  $serviceid=$_GET['planid'];
  
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
			<img class="logosvg" style="height:15%; width:40%;" src="http://funworld.mobi/gamebar/assets/logo/gamebar.png"><b><p style=
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
		/*if($advertiserid=='1140')
		{
			header("location:$url2");
			exit;
		}
		*/
		
		//echo $url2;exit;
		 $url6=urlencode($url2);
		$url2="echeck.php?clickid=$clickid&kt=$url6&serviceid=$serviceid";
		//echo $url2;exit;
		
		
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
					
				<p>Service with First Day Free From the Second day you will Charged R7/Day Subscription.</p>
			   
			   
			   
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
					
				<p>Service with First Day Free From the Second day you will Charged R7/Day Subscription.</p>
			   
			   
			   
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
					
				<p>Service with First Day Free, From the Second day you will Charged R7/Day Subscription.</p>
			   
			   
			   
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
			<center> <img class="logosvg" style="height:10%; width:40%;" src="http://funworld.mobi/gamebar/assets/logo/gamebar.png"></center>      
			<div id="LogoDiv">             
			<a><img src="https://gamebar.mobi/ns/za/images/wapTop.jpg" width="640"  style="width:100%;height:15%"></a>         
			</div>         

			<div id="main">

			 <center>
			 <div class="home-faq"><h3>Gamebar </h3>
			 <h4>Welcome to Gamebar! Experience unlimited Free online game.</h4>
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
					
				<p>R7/day (Auto Renewal).<br>Free for one day & than charged R7/day subscription.</p>
			   
			   
			   
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
	
	echo "<p style='font-size: 100;'>Sorry, we’re unable to process your request at the moment. Kindly refresh your page & try again. </p>";
	$msisdn=$operator=0;
	if($ip=='' or $ip ==NULL)
	{
		$ip=0;
	}
	if($serviceid=='' or $serviceid ==NULL)
	{
		$serviceid=0;
	}
	
	
	  $insert_userlog="call ".$dblog.".insert_userlog ('".$date."','".$msisdn."','".$operator."','".$referrer."','".$clickid."','".$pubid."','".$advertiserid."','".$ip."','".$advertclickid."','".$useragent."','".$xforwardwith."','".$serviceid."','".$pageurl."','')";   
		$res_userlog=$conn1->query($insert_userlog);
exit;
}

//exit;







?>