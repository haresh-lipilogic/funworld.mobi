<?php
error_reporting(0);
$serviceid='vc-svmobi-gamebar-01';
include("includes/dbdetail.php");
include("includes/function.php");

header('X-Frame-Options: DENY');
//header('X-Content-Type-Options: nosniff');
//header("Content-Security-Policy: default-src 'self'");
header("Referrer-Policy: origin");
header("Feature-Policy: geolocation 'none'");
header("Strict-Transport-Security: max-age=3600");
$status= http_response_code();
$pageurl='http://'.$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

$serviceid=$_GET['planid'];

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
}


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

$mt = microtime(true);
$mt =  $mt*1000; //microsecs
$clickid = "zavod".((string)$mt*10).rand(1, 999);


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


$operator='';
  



 
$accesstokenreq=generateAccessToken();

//Array ( [refresh_token_expires_in] => 0 [api_product_list] => [Charge To Bill] [api_product_list_json] => Array ( [0] => Charge To Bill ) [organization_name] => vodacom-qa [developer.email] => Mehul.gediya@Svmobi.com [token_type] => BearerToken [issued_at] => 1744350658640 [client_id] => 8aPR69gxmVGTUI5LmKAubmAfmead4WRO [access_token] => vJGxvOGiLZkMJW8nN9Y2RZbJma3T [application_name] => 799a18d9-dabe-43f8-935f-a5609eeb4e78 [scope] => [expires_in] => 86399 [refresh_count] => 0 [status] => approved )

$aar=json_decode($accesstokenreq,true);
//print_r($aar);
$accesstoken=$aar['access_token'];
$clientid=$aar['client_id'];
$application_name=$aar['application_name'];
//echo "<br>accesstoken=".$accesstoken;
//echo "<br>client_id=".$clientid;
//echo "<br>application_name=".$application_name;
//$accesstoken=
//echo "<br>";
//echo "<br>";

if (isset($_SERVER['HTTP_X_API_ID']) || isset($_GET['test']) )
{
	//echo "hi";exit;
	if(	isset($_GET['test']))
	{
	$msisdn='465cc5f9ced58c854ca45b2f46f13711c4bc973661dfc09f56673225d04f44b07c47655149cbe00e7270148963a6f7b866d1e22f6b212b5e1c319ed668e7b12ebc02d391d52347abd09108869c6297bef917a438584c985b7777410515530fdb6281a7884fb33cc2f5251e99697751cd4de583ace63e5b44b1e4e2a58c6e522a04a6970c37b33e17b37bd75bf9a3f4cb3da518ad7fd484a7858b74dc44ad5b32381a6e668a9b17d9d7b3f287b5995c4a4dc2a0e4e7d8646c4b7b77503b8296d597245e42f77031f2d04cff9e6a92b1e9940563b997a4d3281eb9ba3c0be61c6ee0f78eeaa82708bda27addd546e12558d127ac83fcc4aa3e3d21226cb101b765';
	}
	else{
		
		$msisdn=$_SERVER['HTTP_X_API_ID'];
		
	}
}
else{
	
	
	$msisdn=0;
	
}
//echo "hi2";
$xvczaacr=$msisdn;
$xforwardwith=strtolower($_SERVER['HTTP_X_REQUESTED_WITH']);
date_default_timezone_set("Asia/Kolkata");
		$date=date("Y-m-d H:i:s");
//echo "<br>msisdn=".$msisdn."<br>" ;
  $insert_userlog="call ".$dblog.".insert_userlog ('".$date."','".$msisdn."','".$operator."','".$referrer."','".$clickid."','".$pubid."','".$advertiserid."','".$ip."','".$advertclickid."','".$useragent."','".$xforwardwith."','".$serviceid."','".$pageurl."','".$xvczaacr."')";  
		$res_userlog=$conn1->query($insert_userlog);
		
		if($serviceid==1)//wfh
		{
			$service='vc-svmobi-worldforher-01';
		}
		else if($serviceid==2)//ft
		{
			$service='vc-svmobi-fitnesstips-01';
		}
		else if($serviceid==3)//bt
		{
			$service='vc-svmobi-beautytips-01';
		}
		else{
			
			$service='vc-svmobi-gamebar-01';
		}
		

if($msisdn!=0)
{

$getserviceeligibility=getServiceEligibilityHE($application_name,$accesstoken,$service,$msisdn,$clickid);

$aar1=json_decode($getserviceeligibility,true);

//$uuid=random_string();
//print_r($aar1);
//exit;

//echo $packageid;exit;
//echo $aar1['errorCode'];exit;
if(isset($aar1['errorCode']))
{
	//echo "error code=".$aar1['errorCode'];
	//echo "<br>errorType=".$aar1['errorType'];
	if($aar1['errorCode']=='409')
	{
		if($serviceid==1)//wfh
		{
			$portal="worldforher/";
		}
		else if($serviceid==2)//wfh
		{
			$portal="fitnesstips/";
		}
		else if($serviceid==3)//wfh
		{
			$portal="beautytips/";
		}
		else{
			
			$portal="gamebar/";
		}
		
		echo "<html><body style='color: white;background-color: #333; font-size=60px;'><center>you have already subscribed the service please click <a href='$portal'> Here</a> to access the portal</center></body></html> ";
	//header('location:gamebar/');exit;	
	}
	
	exit;
}
else{
$pack=$aar1['relatedParty'][0]['id'];
$packageid=$aar1['relatedParty'][0]['id'];
	$istrial=strpos($pack,'TRIAL');

	if($istrial>0)
	{
	$charging_mode='trial';	
		
	}
	else{
		
		$charging_mode='act';
		
	}

	$productofferingHE=productofferingHE($msisdn,$packageid,$accesstoken,$application_name,$service,$clickid);
	$pr=json_decode($productofferingHE,true);
	
	$redurl=$pr['relatedParty'][0]['id'];
	//print_r($redurl);
	
	
	
	
}
}

else{
	
		if($serviceid==1)//wfh
		{
			$packageid ='package:p-svmobi-worldforher-c-01_TAX_3_8_999_999_999_TRIAL_*_*_false_false_*';
		}
		else if($serviceid==2)//ft
		{
			$packageid ='package:p-svmobi-fitnesstips-c-01_TAX_3_8_999_999_999_TRIAL_*_*_false_false_*_*_*';
		}
		else if($serviceid==3)//bt
		{
			$packageid ='package:p-svmobi-beautytips-c-01_TAX_3_8_999_999_999_TRIAL_*_*_false_false_*_*_*';
		}
		else{
			
			$packageid ='package:p-svmobi-gamebar-c-01_TAX_3_8_999_999_999_TRIAL_*_*_false_false_*_*_*';
		}
	
	
	//$packageid ='package:p-svmobi-gamebar-c-01_TAX_3_8_999_999_999_TRIAL_*_*_false_false_*_*_*';
	$productofferingHE=productoffering($msisdn,$packageid,$accesstoken,$application_name,$service,$clickid);
	//echo $productofferingHE;
	$pr=json_decode($productofferingHE,true);
	//print_r($pr);
	
	$redurl=$pr['relatedParty'][0]['id'];
	//print_r($redurl);
	
}
if($serviceid==1)
{
	$name="World for Her";
	$lpimage="http://funworld.mobi/worldforher/images/use2.jpg";
	$description="World four Her service provides current and relevant information for every woman: health, fashion, homecare and cooking advices, news provided by professionals.";
	$description2="Service with First Day Free From the Second day you will Charged R7/Day Subscription.";
	$tandc="https://funworld.mobi/vd2stag/wfhtnc.html";
}
else if($serviceid==2)
{
	$name="Fitness Tips";
	$lpimage="http://funworld.mobi/fitnessguru/Banners/1.jpg";
	$description="Fitness Tips service provides different fitness exercise for all generations.";
	$description2="Service with First Day Free From the Second day you will Charged R7/Day Subscription.";
	$tandc="https://funworld.mobi/vd2stag/fttnc.html";
}
else if($serviceid==3)
{
	$name="Beauty Tips";
	$lpimage="http://funworld.mobi/beautytips/Banners/1.jpg";
	$description="Beauty Tips service provides skin & hair care tips for women with new content being added every week to make it more relevant & increase the life time user value.";
	$description2="Service with First Day Free From the Second day you will Charged R7/Day Subscription.";
	$tandc="https://funworld.mobi/vd2stag/bttnc.html";
}
else{
	
	$name="Gamebar";
	$lpimage="https://gamebar.mobi/ns/za/images/wapTop.jpg";
	$description="Welcome to Gamebar! Experience unlimited Free online game.";
	$description2="Service with First Day Free From the Second day you will Charged R7/Day Subscription.";
	$tandc="https://funworld.mobi/vd2stag/gametnc.html";
	
	
}


?>

<!DOCTYPE html> <html>     <head>         <meta name="viewport" content="width=device-width">        
			 <title><?php echo $name;?></title>             

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

			<body style="color:#fff ;background:#333; font-size:12px">  
			<center> <div  >
			<!--<img class="logosvg" style="height:10%; width:40%;" src="http://funworld.mobi/worldforher/image/logo.png">   --> 
			<label style="font: italic  bold 35px Monotype corsiva; color:red;"><?php echo $name;?> </label>
			
			
			</div> </center>  
			<div id="LogoDiv">            
			<a><img src="<?php echo $lpimage;?>" style="width:100%;height:5%;max-height: 500px;"></a>         
			</div>         

			<div id="main">

			 <center>
			 <div class="home-faq"><h3><?php echo $name;?> </h3>
			 <h4><?php echo $description;?></h4>
			 </div><center>         
			</div>         
			<form method="POST" style="font-size:10px">             
			<div style="text-align:center">                 
				 
						
			<!--
			  <p style="text-align:center">Un valor de %VALUE% se facturará o descontará de su saldo %OPERATOR%</h3>     
			   <div class="errors">%ERROR_LIST%</div>  
			   Confirme el PIN enviado:
			   <p class="input-container"> -->      
					
			   <a href="<?php echo $redurl; ?>"><input class="button button1" type="button" name="select" value="Subscribe">  </a>   
					
				<p><?php echo $description2;?></p>
				<p><b>To unsubscribe dial *135*997#<b></p>
			   
			   
			   
			   <!--<p><input type="submit" name="unknown" value="N&atilde;o sou subscritor %OPERATOR%" class="unknown" /></p>             
			   --></div>             
			  <!-- <center>%HIDDEN%</center>-->             
			 <div id="Footer">                 
			              
			 <div id="textbox">      
				 <br> 
		<!--	<a href="http://funworld.mobi/worldforher/index.php" style="color:#C00">Home</a> |     -->                
			  <a href="<?php echo $tandc;?>"style="color:#C00">Terms&Conditions </a>                     

			<div style="clear: both;"></div>                 </div>
							 
			<div style="clear: both;"></div>            
			</div>
			</form>         
			<!--<center><div id="copyright"><p>Copyright Go4Mobility(PT)</p></div></center>-->     </body> </html> 	
	
	
