<?php





error_reporting(0);

include "includes/dbdetail.php";
include "function.php";


//print_r(json_decode(file_get_contents("php://input"), true));

//exit;

//error_reporting(0);


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
$staging=0;
$stmt1 = $conn1->prepare("INSERT INTO ".$dblog.".ru (url,url_detail,accesstime,staging) VALUES (?,?,?,?)");
				$stmt1->bind_param("ssss",$actual_link, $output,$receivedate,$staging);	
				
				
	$stmt1->execute();
	
	
	
	$xvczaacr=$_SERVER['HTTP_X_VCZA_ACR'];
	// $xvczaacr='72b7e00a39b054ec1448bae6942c7f904bbeb35240beebbe17b1529ceffedb7f2f67c46812e78126fb9f0cffe1d0b63e2a8efd89bacc20c9554ef81670776ab19b61a73eb68dded938456502cf82e64552bfc6e68f9b7a015bb7142da53452fd779a72f3ed5e07bed6cc68291bff8ccefd7a914ece9d287fdd7946db1fee24d62d06a8513bcc6a740fedc7b1a4229ead5dad87219c3d0b37efacb5e1f355b9cc19ed415ea4f7f62bba926014588e2cbbe188c5f11d4eee93d6d5b235c93dccc4242890f14025a23dda0ff02e1d433e12cf0720e8b243e993763d7086e7d1947e4971b625146c56b81b5d387ecc90bb741ed7ad23dd961f6f15f558913b0137be';
	$clickid=$_GET['clickid'];
	
	 $sql2 = "SELECT * from ".$dblog.".userlog  where clickid='".$clickid."' order by userlogid desc limit 1";
				   $me3=$conn1->query($sql2);
				   while($row = $me3->fetch_assoc()) {
				
						 $advid=$row['advertiserid'];
						 $serviceid=$row['serviceid'];
						 
					}
							$mt = microtime(true);
							$mt =  $mt*1000; 
							$txnid="t".((string)$mt*10).rand(1, 999);
					
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
  //print_r($decouplin);
  //exit;
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
		
		
  
		if($advertiserid=='1140')
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