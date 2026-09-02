<?php







include "includes/dbdetail.php";
//include "function.php";


//print_r(json_decode(file_get_contents("php://input"), true));

//exit;

error_reporting(0);


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
$dataPOST = trim(file_get_contents('php://input'));
$receivedate =date('Y-m-d H:i:s');
$staging=0;
$stmt1 = $conn1->prepare("INSERT INTO ".$dblog.".redirect (url,url_detail,accesstime,staging) VALUES (?,?,?,?)");
				$stmt1->bind_param("ssss",$actual_link, $dataPOST,$receivedate,$staging);	
				
				
	$stmt1->execute();
	
//	client-txn-id=zavod17447208574427909&subscriptionId=2396685&result=Completed&result-description=SuccessfullySubscribed

$clickid=$_GET['client-txn-id'];
$subscriptionid=$_GET['subscriptionId'];
$result=$_GET['result'];
$resultdescription=$_GET['result-description'];

 $sql="select * from ".$dblog.". userlog where clickid='".$clickid."' order by userlogid desc limit 1";
		$result1 = $conn1->query($sql);
			//$numrows1=$result1->num_rows;
			
				while($row = $result1->fetch_assoc()) {
					
					$msisdn=$row['msisdn'];
					$clickid=$row['clickid'];
					$advid=$row['advertiserid'];
					$serviceid=$row['serviceid'];
					
					
				}
				$charging_mode='first';
				$amount=0;
				$txnid=0;
				$subscriptionstartdate =date('Y-m-d H:i:s');
				$subscriptionenddate =date('Y-m-d H:i:s');

$stmt1 = $conn1->prepare("INSERT INTO ".$db.".subscriber(`msisdn`, `clickid`, `advid`, `charging_mode`, `subscriptionstartdate`, `subscriptionenddate`, `amount`, `serviceid`, `txnid`, `subscriptionid`, `xvczaacr`) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
				$stmt1->bind_param("sssssssssss",$msisdn,$clickid,$advid,$charging_mode,$subscriptionstartdate,$subscriptionenddate,$amount,$serviceid,$txnid,$subscriptionid,$msisdn);	
				
				
	$stmt1->execute();
	
	if($result=='Completed' || $result==7)
	{
		$error=0;
			if($serviceid==1)
			{
				$url='worldforher/';
				$name="World for Her";
				$lpimage="http://funworld.mobi/worldforher/images/use2.jpg";
				//$description="World four Her service provides current and relevant information for every woman: health, fashion, homecare and cooking advices, news provided by professionals.";
				//$description2="Service with First Day Free From the Second day you will Charged R7/Day Subscription.";
				$tandc="http://funworld.mobi/vodacom/production/wfhtnc.html";
				
			}
			else if($serviceid==2)
			{
				
				$url='fitnesstips/';
				$name="Fitness Tips";
				$lpimage="http://funworld.mobi/fitnessguru/Banners/1.jpg";
				//$description="Fitness Tips service provides different fitness exercise for all generations.";
				//$description2="Service with First Day Free From the Second day you will Charged R7/Day Subscription.";
				$tandc="http://funworld.mobi/vodacom/production/fttnc.html";
			}
			else if($serviceid==3)
			{
				
				$url='beautytips/';
				$name="Beauty Tips";
				$lpimage="http://funworld.mobi/beautytips/Banners/1.jpg";
				//$description="Beauty Tips service provides skin & hair care tips for women with new content being added every week to make it more relevant & increase the life time user value.";
				//$description2="Service with First Day Free From the Second day you will Charged R7/Day Subscription.";
				$tandc="http://funworld.mobi/vodacom/production/bttnc.html";
			}
			else{
				$url='gamebar/';
				$name="Gamebar";
				$lpimage="https://gamebar.mobi/ns/za/images/wapTop.jpg";
				//$description="Welcome to Gamebar! Experience unlimited Free online game.";
				//$description2="Service with First Day Free From the Second day you will Charged R7/Day Subscription.";
				$tandc="http://funworld.mobi/vodacom/production/gametnc.html";
			}
			//header ("location:$url");
		
			$description='You have successfully subscribed '.$name.' service ,Please press continue to Access the portal';
	}
	else{
		$error=1;
		if($serviceid==1)
			{
				$url='index.php?planid=1';
				$name="World for Her";
				$lpimage="http://funworld.mobi/worldforher/images/use2.jpg";
				//$description="World four Her service provides current and relevant information for every woman: health, fashion, homecare and cooking advices, news provided by professionals.";
				//$description2="Service with First Day Free From the Second day you will Charged R7/Day Subscription.";
				$tandc="http://funworld.mobi/vodacom/production/wfhtnc.html";
				
			}
			else if($serviceid==2)
			{
				
				$url='index.php?planid=2';
				$name="Fitness Tips";
				$lpimage="http://funworld.mobi/fitnessguru/Banners/1.jpg";
				//$description="Fitness Tips service provides different fitness exercise for all generations.";
				//$description2="Service with First Day Free From the Second day you will Charged R7/Day Subscription.";
				$tandc="http://funworld.mobi/vodacom/production/fttnc.html";
			}
			else if($serviceid==3)
			{
				
				$url='index.php?planid=3';
				$name="Beauty Tips";
				$lpimage="http://funworld.mobi/beautytips/Banners/1.jpg";
				//$description="Beauty Tips service provides skin & hair care tips for women with new content being added every week to make it more relevant & increase the life time user value.";
				//$description2="Service with First Day Free From the Second day you will Charged R7/Day Subscription.";
				$tandc="http://funworld.mobi/vodacom/production/bttnc.html";
			}
			else{
				$url='index.php?planid=4';
				$name="Gamebar";
				$lpimage="https://gamebar.mobi/ns/za/images/wapTop.jpg";
				//$description="Welcome to Gamebar! Experience unlimited Free online game.";
				//$description2="Service with First Day Free From the Second day you will Charged R7/Day Subscription.";
				$tandc="http://funworld.mobi/vodacom/production/gametnc.html";
			}
		
		if($result=='Fraud')
		{
		$description="Hi, we have detected fraud activity in your subscription Kindly close the current tab Or press Retry to subscribe";
		}
		else if ($result=='22')
		{
			$description="Hi, we have found Duplicate promocode .Please press Retry for Purchase";
			
		}
		else if($result=='21')
		{
			$description="Hi, You have insufficient Funds for this Purchase , Kindly recharge your account and press Retry .";
			
		}
		else{
			
			$description="Hi, we have found Technical Error , Kindly please press Retry to subscribe  .";
		}
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
			 <h3><?php echo $description;?></h3>
			 </div><center>         
			</div>         
			<form method="POST" style="font-size:10px">             
			<div style="text-align:center">                 
				 
						
			<!--
			  <p style="text-align:center">Un valor de %VALUE% se facturará o descontará de su saldo %OPERATOR%</h3>     
			   <div class="errors">%ERROR_LIST%</div>  
			   Confirme el PIN enviado:
			   <p class="input-container"> -->      
					
			   <a href="<?php echo $url; ?>"><input class="button button1" type="button" name="select" value='<?php if($error==1){ echo "Retry";} else{echo "Continue";}?> ' ></a>   
					<!--<H3>You have successfully subscribed  <?php //echo $name;?> service ,Please press continue to Access the portal</h3>
				<p><?php //echo $description2;?></p>
			   
			   
			   
			   <p><input type="submit" name="unknown" value="N&atilde;o sou subscritor %OPERATOR%" class="unknown" /></p>             
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
	
	