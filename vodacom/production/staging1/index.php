<?php
//var_dump(getallheaders());
error_reporting(0);
include "includes/dbdetail.php";
include "function.php";
 session_start();
$serviceid=$_GET['planid'];

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
}
else{
	
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
}


$ll='';
		if($_SERVER['HTTP_X_FORWARDED_FOR']== '')
		{
			$ip=$_SERVER['REMOTE_ADDR'];
		}
		else{
			$ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
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

		$useragent=strtolower($_SERVER['HTTP_USER_AGENT']); // User Agent
		$userip=getClientIp();
		
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
$referrer= $_SERVER['HTTP_REFERER']; //  Referrer URL
$stmt1 = $conn1->prepare("INSERT INTO ".$dblog.".he (ip,referal,accesstime,he_detail) VALUES (?,?,?,?)");
$stmt1->bind_param("ssss",$ip_address, $referrer,$accesstime,$ll);
$stmt1->execute();

//$data='67d770a5b9869ec4b09ac354438c8cf77c1210b246929fb688b4a6666ba50c510187750a8020efedadc682a67b75d7266ee15dd26b249d82800595601a48bda00f8368c64d694d86fa2fe157da3d12c047650b2e68d6b3c485dde6f42907282edd20f13929c797cd3738f806f53c61f94af354bd3bc886b4e140aeff34f51306c151eafe14c5b60c0e466355438e96d883ec8231feb657343c22bbcc3a49d351f733066e9d635c32d1b91cad6b2b05ff31ece8c66804a18f68f36f0925edab32c2ebed35feaf677f487010f8983c7e3dd72f8db0c01df86923f7b29728e0e1c210fecae30f4fe13536384413d10710f182a24e59ea6beaa69a1eae3c0a59f65f';


if (isset($_SERVER['HTTP_X_VC_ACR']))
{
  $data=$_SERVER['HTTP_X_VC_ACR'];
  $msisdn=decrypt($data);
	$operator='';
   $insert_userlog="call ".$dblog.".insert_userlog ('".$date."','".$msisdn."','".$operator."','".$referrer."','".$clickid."','".$pubid."','".$advertiserid."','".$userip."','".$advertclickid."','".$useragent."','".$xforwardwith."')";   
		$res_userlog=$conn1->query($insert_userlog);

  
  $serviceid=$_GET['planid'];
  
   $decouplin=usage_authenticate($clickid,$msisdn,$serviceid,$txnid);
   
    
	
	
	$decoupling=$decouplin['payload']['purchase-options']['packages']['package']['id'];
   $authenticationid=$decouplin['@id'];
   
   if ($authenticationid=='100008')
   {
	   
	   $success=$decouplin['payload']['usage-authorisation']['is-success'];
	   if ($success=='true')
	   {
		   echo "<center><b><h2>You have already subscriberd the service  please <a href='http://club.funzone.mobi/vodacom/staging/index.php?planid=1'>click here to enjoy the Service.</a></b></h2></center>";
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
		
		else{
			
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
		
   }	
		
  exit;
}
else{
	
	echo "<p style='font-size: 100;'>Please turn off Wifi and try again.</p>";
	
	 $insert_userlog="call ".$dblog.".insert_userlog ('".$date."','".$msisdn."','".$operator."','".$referrer."','".$clickid."','".$pubid."','".$advertiserid."','".$userip."','".$advertclickid."','".$useragent."','".$xforwardwith."')";   
		$res_userlog=$conn1->query($insert_userlog);
exit;
}

//exit;







?>