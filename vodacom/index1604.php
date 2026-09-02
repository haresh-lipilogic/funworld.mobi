<!--<meta http-equiv="Content-Security-Policy" content="default-src 'self'; img-src http://*; child-src 'none';">-->
<?php
//var_dump(getallheaders());
//exit;
//echo "Hi";exit;
error_reporting(0);
header('X-Frame-Options: DENY');
$status= http_response_code();
$pageurl='http://'.$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; // Page URL
include "includes/dbdetail.php";
include "function.php";
 session_start();
$serviceid=$_GET['planid'];
/*if($serviceid==4)
{
	$mode='staging';
}
*/
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
		
		$sql="select * from ".$db.". activebase where serviceid='".$serviceid."' and clickid='".$subid1."' order by id desc limit 1";
		$result1 = $conn1->query($sql);
			//$numrows1=$result1->num_rows;
			
				while($row = $result1->fetch_assoc()) {
				
						$charging_mode=$row['charging_mode'];
				}
		
		if($charging_mode !='dct')
		{
			header("location:http://club.funzone.mobi/worldforher/");
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
		
		$sql="select * from ".$db.". activebase where serviceid='".$serviceid."' and clickid='".$subid1."' order by id desc limit 1";
		$result1 = $conn1->query($sql);
			//$numrows1=$result1->num_rows;
			
				while($row = $result1->fetch_assoc()) {
				
						$charging_mode=$row['charging_mode'];
				}
		
		if($charging_mode !='dct')
		{
		header("location:http://club.funzone.mobi/fitnessguru/");
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
		
		$sql="select * from ".$db.". activebase where serviceid='".$serviceid."' and clickid='".$subid1."' order by id desc limit 1";
		$result1 = $conn1->query($sql);
			//$numrows1=$result1->num_rows;
			
				while($row = $result1->fetch_assoc()) {
				
						$charging_mode=$row['charging_mode'];
				}
		
		if($charging_mode !='dct')
		{
		header("location:http://club.funzone.mobi/beautytips/");
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
else{
	
	if(isset($_COOKIE["vodacom_gamebar_act"]))
	{
		
		$subid1=$_COOKIE["vodacom_gamebar_act"];
		
		$sql="select * from ".$db.". activebase where serviceid='".$serviceid."' and clickid='".$subid1."' order by id desc limit 1";
		$result1 = $conn1->query($sql);
			//$numrows1=$result1->num_rows;
			
				while($row = $result1->fetch_assoc()) {
				
						$charging_mode=$row['charging_mode'];
				}
		
		if($charging_mode !='dct')
		{
		header("location:http://club.funzone.mobi/gamebar/");
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
		

		if($_GET['adid']=='')
		{
			$advertiserid=0;
		} 
		else{
			$advertiserid=$_GET['adid'];
		}  // Advertiserid
		$sql24 = "SELECT * from ".$db.".advertiser  where blackout=1 and advertiserid='".$advertiserid."' ";
			$me1=$conn1->query($sql24);
				$rowcount25=0;
			   $rowcount25=mysqli_num_rows($me1); 
			//exit;
			if ($rowcount25 > 0)
			{
				
				echo "Your Traffic has been blocked please ask Service operator ";
				exit;
			}
		
		

		$useragent=strtolower($_SERVER['HTTP_USER_AGENT']); // User Agent
		//$userip=getClientIp();
		
		// creating clickid
		$mt = microtime(true);
		$mt =  $mt*1000; //microsecs
		$clickid = ((string)$mt*10).rand(1, 999); 
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
exit;
}






if (isset($_SERVER['HTTP_X_VC_ACR']))
{
  $data=$_SERVER['HTTP_X_VC_ACR'];
	$msisdn=0;
	$operator='';
    $insert_userlog="call ".$dblog.".insert_userlog ('".$date."','".$msisdn."','".$operator."','".$referrer."','".$clickid."','".$pubid."','".$advertiserid."','".$ip."','".$advertclickid."','".$useragent."','".$xforwardwith."','".$serviceid."','".$pageurl."')";  
		$res_userlog=$conn1->query($insert_userlog);

		
		$msisdn=decrypt($data);
		//$msisdn=88; 
		 
		  $update_userlog="update ".$dblog.".userlog  set msisdn='".$msisdn."' where clickid='".$clickid."'";  
		$up_userlog=$conn1->query($update_userlog);
		
		
		
		
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
		
		
		
		
  
  $serviceid=$_GET['planid'];
  
   $decouplin=usage_authenticate($clickid,$msisdn,$serviceid,$txnid);
   
   // print_r($decouplin);
	//	exit;
	
	 $decoupling=$decouplin['payload']['purchase-options']['packages']['package']['id'];
	
   $authenticationid=$decouplin['@attributes']['id']; 
   
   if ($authenticationid=='100008')
   {
	   
	   $success=$decouplin['payload']['usage-authorisation']['is-success'];
	   if ($success=='true')
	   {
		   
		  echo '<body style="background:#ffe1e1;">
		<center>
	<img class="logosvg" style="height:15%; width:40%;" src="http://club.funzone.mobi/portugal/image/gamebar.png"><b><p style=
	"font-size: 35;">You already subscribed this service.Kindly click on Below Button to use the service<br><br> <a href="http://club.funzone.mobi/gamebar/"><button style="height:15%;width:40%;font-size:35px;background-color: #4CAF50;color:white;border: none;border-radius: 12px;">Homepage</button></a></b></p></center>
	</body>';
			exit;
	   }
	   
   }
   else{
   
   
   
  // $issuccess=$decoupling['payload']['purchase-options']['packages']['package']['id'];
  
  //exit;
  
  
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
  
  
  
  
  
  
  
 
 
  
  
		$url2=$url2."?partner-id=".$username."&token=".$data."&package-id=".$decoupling."&client-txn-id=".$txnid."&partner-redirect-url=".$redirecturl;
		
		
		$stmt1 = $conn1->prepare("INSERT INTO ".$dblog.".redirect_request (url,senttime,msisdn,clickid,txnid) VALUES (?,?,?,?,?)");
				$stmt1->bind_param("sssss",$url2, $date,$msisdn,$clickid,$txnid);	
				$stmt1->execute();
  
		$charging_mode='first';
		$subscriptionenddate=date('Y-m-d H:i:s', strtotime( ' +1 day'));
		$amount=0;
		$try=0;
		
		
		$stmt1 = $conn1->prepare("INSERT INTO ".$db.".subscriber (msisdn,clickid, advid, charging_mode,subscriptionstartdate, subscriptionenddate, amount, serviceid, servicename, servicecode, token, packageid, try,txnid,chargeid) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
		$stmt1->bind_param("sssssssssssssss",$msisdn,$clickid,$advertiserid, $charging_mode,$date,$subscriptionenddate,$amount,$serviceid,$servicename,$servicecode,$data,$decoupling,$try,$txnid,$chargeid);	
		$stmt1->execute();
		
		
  // if($advertiserid=='14' || $advertiserid=='15' || $advertiserid=='16' || $advertiserid== '17' || $advertiserid=='1' || $advertiserid=='3' || $advertiserid=='20' || $advertiserid=='21' || $advertiserid=='22' || $advertiserid=='23')
		//if($advertiserid > '0')
	//	if($advertiserid=='14' || $advertiserid=='15' || $advertiserid=='16' || $advertiserid== '17' || $advertiserid=='1' || $advertiserid=='3' || $advertiserid=='20' || $advertiserid=='21' || $advertiserid=='22' || $advertiserid=='23')	
		if($advertiserid>0 )
		{
			header("location:$url2");
			exit;
		}
		
		
		
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
			<center> <img class="logosvg" style="height:10%; width:40%;" src="http://club.funzone.mobi/worldforher/image/logo.png"></center>      
			<div id="LogoDiv">             
			<a><img src="http://club.funzone.mobi/worldforher/images/use2.jpg" width="640" style="width:100%;height:15%"></a>         
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
					
				<p>Service with a value of R 5/day, discounted from the balance or invoice of communication and renewed automatically.</p>
			   
			   
			   
			   <!--<p><input type="submit" name="unknown" value="N&atilde;o sou subscritor %OPERATOR%" class="unknown" /></p>             
			   --></div>             
			  <!-- <center>%HIDDEN%</center>-->             
			 <div id="Footer">                 
			 <center><br>World for her</br><center>                 
			 <div id="textbox">      
				 <br> 
		<!--	<a href="http://club.funzone.mobi/worldforher/index.php" style="color:#C00">Home</a> |     -->                
			  <a href="http://club.funzone.mobi/vodacom/tnc.html"style="color:#C00">Terms&Conditions </a>                     

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
			 <title>Fitness Guru</title>             

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
			<center> <img class="logosvg" style="height:10%; width:40%;" src="http://club.funzone.mobi/fitnessguru/images/Fitness-Guru.png"></center>      
			<div id="LogoDiv">             
			<a><img src="http://club.funzone.mobi/fitnessguru/Banners/1.jpg" width="640"  style="width:100%;height:15%"></a>         
			</div>         

			<div id="main">

			 <center>
			 <div class="home-faq"><h3>Fitness Guru </h3>
			 <h4>Fitness Guru service provides different fitness exercise for all generations.</h4>
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
					
				<p>Service with a value of R 5/day, discounted from the balance or invoice of communication and renewed automatically.</p>
			   
			   
			   
			   <!--<p><input type="submit" name="unknown" value="N&atilde;o sou subscritor %OPERATOR%" class="unknown" /></p>             
			   --></div>             
			  <!-- <center>%HIDDEN%</center>-->             
			 <div id="Footer">                 
			 <center><br>Fitness Guru</br><center>                 
			 <div id="textbox">      
				 <br> 
			<!--<a href="http://club.funzone.mobi/fitnessguru/index.php" style="color:#C00">Home</a> |        -->             
			  <a href="http://club.funzone.mobi/vodacom/tnc.html"style="color:#C00">Terms&Conditions </a>                     

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
			<center> <img class="logosvg" style="height:10%; width:40%;" src="http://club.funzone.mobi/beautytips/content/Beauty%20Tips%20Logo.png"></center>      
			<div id="LogoDiv">             
			<a><img src="http://club.funzone.mobi/beautytips/Banners/1.jpg" width="640"  style="width:100%;height:15%"></a>         
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
					
				<p>Service with a value of R 2/day, discounted from the balance or invoice of communication and renewed automatically.</p>
			   
			   
			   
			   <!--<p><input type="submit" name="unknown" value="N&atilde;o sou subscritor %OPERATOR%" class="unknown" /></p>             
			   --></div>             
			  <!-- <center>%HIDDEN%</center>-->             
			 <div id="Footer">                 
			 <center><br>Beauty tips</br><center>                 
			 <div id="textbox">      
				 <br> 
		<!--	<a href="http://club.funzone.mobi/beautytips/index.php" style="color:#C00">Home</a> |-->                     
			  <a href="http://club.funzone.mobi/vodacom/tnc.html"style="color:#C00">Terms&Conditions </a>                     

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
			<center> <img class="logosvg" style="height:10%; width:40%;" src="http://club.funzone.mobi/portugal/image/gamebar.png"></center>      
			<div id="LogoDiv">             
			<a><img src="http://club.funzone.mobi/spain/gamebar/images/banner/banner3.jpg" width="640"  style="width:100%;height:15%"></a>         
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
					
				<p>Service with a value of R 5/day, discounted from the balance or invoice of communication and renewed automatically.</p>
			   
			   
			   
			   <!--<p><input type="submit" name="unknown" value="N&atilde;o sou subscritor %OPERATOR%" class="unknown" /></p>             
			   --></div>             
			  <!-- <center>%HIDDEN%</center>-->             
			 <div id="Footer">                 
			 <center><br>Gamebar</br><center>                 
			 <div id="textbox">      
				 <br> 
		<!--	<a href="http://club.funzone.mobi/beautytips/index.php" style="color:#C00">Home</a> |-->                     
			  <a href="http://club.funzone.mobi/vodacom/tnc.html"style="color:#C00">Terms&Conditions </a>                     

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