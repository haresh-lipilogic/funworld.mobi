<?php
error_reporting(0);
include "includes/dbdetail.php";
include "function.php";

session_start();
if ($_SERVER['REQUEST_METHOD']=='POST')
{
	$select=$_POST['select'];
	$clickid=$_POST['clickid'];
	$serviceid=$_POST['serviceid'];
	
	
	
	if($select=='Continue')
	{
		if($serviceid==1)
		{	
			header("location:http://club.funzone.mobi/worldforher/");
			exit;
		}
		else if($serviceid==2)
		{
			header("location:http://club.funzone.mobi/fitnessguru/");
			exit;
		}
		else{
			
			header("location:http://club.funzone.mobi/beautytips/");
			
			exit;
		}
	}
	else if($select=='Unsubscribe'){
		
		$sql="select * from ".$db.". subscriber where clickid='".$clickid."'order by id desc limit 1";
		$result1 = $conn1->query($sql);
			//$numrows1=$result1->num_rows;
			
				while($row = $result1->fetch_assoc()) {
					
					$msisdn=$row['msisdn'];
					$clickid=$row['clickid'];
					$advid=$row['advid'];
					$serviceid=$row['serviceid'];
					$servicename=$row['servicename'];
					$servicecode=$row['servicecode'];
					$token=$row['token'];
					$packageid=$row['packageid'];
					$chargeid=$row['chargeid'];
					$txnid=$row['txnid'];
					
				}
		$charging_mode='dct';
		$date=date("Y-m-d H:i:s");
		$amount=0;
		$data='';
		$decoupling='';
		$try='';
		
		
		
		$selfcare=selfcare($clickid,$msisdn,$serviceid,$packageid,$txnid);
		//var_dump($selfcare['payload']["selfcare-subscriptions"]["subscription"]["0"]['id']);
	 	$subscriptionid=$selfcare['payload']["selfcare-subscriptions"]["subscription"][0]['id'];
		
		//var_dump($selfcare['payload']["selfcare-subscriptions"]["subscription"][0]['id']);
		//echo "$subscriptionid=".$subscriptionid;
		
		//exit;
		$inactive=inactive($clickid,$msisdn,$serviceid,$packageid,$txnid,$subscriptionid);
		
		//var_dump($inactive);
		$state=$inactive['payload']['inactivate-subscription-response']['success'];
		if($serviceid==1)
		{
			if($state=='true')
			{
			echo "<center><b><p style='font-size: 100;'>You have deactivated successfully from  world for Her . If you want to activate this service please <a href='http://club.funzone.mobi/vodacom/staging/index.php?planid=1'>click here</a></b></p></center>";
			
				$cookie_name = "vodacom_worldforher_act";
				setcookie($cookie_name, null, -1, '/');
			$charging_mode='dct';
			$stmt1 = $conn1->prepare("INSERT INTO ".$db.".activebase (msisdn,clickid,serviceid,servicename,charging_mode,active_date) VALUES (?,?,?,?,?,?)");
				$stmt1->bind_param("ssssss",$msisdn, $clickid,$serviceid,$servicename,$charging_mode,$date);	
			$stmt1->execute();
			
			//unset($_SESSION['subid']);
			
			
			}
			else{
				
				echo "<center><b><p style='font-size: 100;'>You have already deactivated successfully from  world for Her . If you want to activate this service please <a href='http://club.funzone.mobi/vodacom/staging/index.php?planid=1'>click here</a></b></p></center>";
				//unset($_SESSION['subid']);
				$cookie_name = "vodacom_worldforher_act";
				setcookie($cookie_name, null, -1, '/');
				$charging_mode='dct';
				$stmt1 = $conn1->prepare("INSERT INTO ".$db.".activebase (msisdn,clickid,serviceid,servicename,charging_mode,active_date) VALUES (?,?,?,?,?,?)");
					$stmt1->bind_param("ssssss",$msisdn, $clickid,$serviceid,$servicename,$charging_mode,$date);	
				$stmt1->execute();
			}
		}
		else if($serviceid==2)
		{
			if($state=='true')
			{
			echo "<center><b><p style='font-size: 100;'>You have deactivated successfully from  FitnessGuru . If you want to activate this service please <a href='http://club.funzone.mobi/vodacom/staging/index.php?planid=2'>click here</a></b></p></center>";
			
			$cookie_name = "vodacom_fitness_act";
				setcookie($cookie_name, null, -1, '/');
				$charging_mode='dct';
				$stmt1 = $conn1->prepare("INSERT INTO ".$db.".activebase (msisdn,clickid,serviceid,servicename,charging_mode,active_date) VALUES (?,?,?,?,?,?)");
					$stmt1->bind_param("ssssss",$msisdn, $clickid,$serviceid,$servicename,$charging_mode,$date);	
				$stmt1->execute();
			//unset($_SESSION['subid1']);
			}
			else{
				
				echo "<center><b><p style='font-size: 100;'>You have already deactivated successfully from  FitnessGuru . If you want to activate this service please <a href='http://club.funzone.mobi/vodacom/staging/index.php?planid=2'>click here</a></b></p></center>";
				
				$cookie_name = "vodacom_fitness_act";
				setcookie($cookie_name, null, -1, '/');
				//unset($_SESSION['subid1']);
				$charging_mode='dct';
				$stmt1 = $conn1->prepare("INSERT INTO ".$db.".activebase (msisdn,clickid,serviceid,servicename,charging_mode,active_date) VALUES (?,?,?,?,?,?)");
					$stmt1->bind_param("ssssss",$msisdn, $clickid,$serviceid,$servicename,$charging_mode,$date);	
				$stmt1->execute();
			}
		}
		else{
			
		
			if($state=='true')
			{
			echo "<center><b><p style='font-size: 100;'>You have deactivated successfully from  Beauty tips . If you want to activate this service please <a href='http://club.funzone.mobi/vodacom/staging/index.php?planid=3'>click here</a></b></p></center>";
			
			$cookie_name = "vodacom_beautytips_act";
				setcookie($cookie_name, null, -1, '/');
				$charging_mode='dct';
				$stmt1 = $conn1->prepare("INSERT INTO ".$db.".activebase (msisdn,clickid,serviceid,servicename,charging_mode,active_date) VALUES (?,?,?,?,?,?)");
					$stmt1->bind_param("ssssss",$msisdn, $clickid,$serviceid,$servicename,$charging_mode,$date);	
				$stmt1->execute();
			
			//unset($_SESSION['subid2']);
			}
			else{
				
				echo "<center><b><p style='font-size: 100;'>You have already deactivated successfully from  Beauty tips . If you want to activate this service please <a href='http://club.funzone.mobi/vodacom/staging/index.php?planid=3'>click here</a></b></p></center>";
		
				//unset($_SESSION['subid2']);
				$cookie_name = "vodacom_beautytips_act";
				setcookie($cookie_name, null, -1, '/');
				
				$charging_mode='dct';
				$stmt1 = $conn1->prepare("INSERT INTO ".$db.".activebase (msisdn,clickid,serviceid,servicename,charging_mode,active_date) VALUES (?,?,?,?,?,?)");
					$stmt1->bind_param("ssssss",$msisdn, $clickid,$serviceid,$servicename,$charging_mode,$date);	
				$stmt1->execute();
			}
		
			
		}
		
		
		$stmt1 = $conn1->prepare("INSERT INTO ".$db.".subscriber (msisdn,clickid,advid, charging_mode,subscriptionstartdate, subscriptionenddate, amount, serviceid, servicename, servicecode, token, packageid, try,txnid,chargeid) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
		$stmt1->bind_param("sssssssssssssss",$msisdn,$clickid,$advid, $charging_mode,$date,$date,$amount,$serviceid,$servicename,$servicecode,$data,$decoupling,$try,$txnid,$chargeid);	
		$stmt1->execute();
		
		
		
	exit;
		
		
		
	}
}
else{
	$serviceid=$_GET['serviceid'];
	
if($serviceid==1)
{
	$title='World for Her';
	$logo='http://club.funzone.mobi/worldforher/image/logo.png';
	$img='http://club.funzone.mobi/worldforher/images/use2.jpg';
	$url='http://club.funzone.mobi/worldforher/';
	
}
else if($serviceid==2)
{
	$title='Fitness Guru';
	$logo='http://club.funzone.mobi/fitnessguru/images/Fitness-Guru.png';
	$img='http://club.funzone.mobi/fitnessguru/Banners/3.jpg';
	$url='http://club.funzone.mobi/fitnessguru/';
}
else{
	$title='Beautytips';
	$logo='http://club.funzone.mobi/beautytips/content/Beauty%20Tips%20Logo.png';
	$img='http://club.funzone.mobi/beautytips/Banners/2.jpg';
	$url='http://club.funzone.mobi/beautytips/';
	
}
?>
<!DOCTYPE html> <html>     <head>         <meta name="viewport" content="width=device-width">        
 <title><?php echo $title; ?></title>             

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
<center> <img class="logosvg" style="height:10%; width:40%;" src="<?php echo $logo;?>"></center>      
<div id="LogoDiv">             
<a><img src="<?php echo $img;?>" width="640" alt="Go4Mobility(PT)" style="width:100%;height:15%"></a>         
</div>         

<div id="main">

 <center>
 <div class="home-faq"><h3><?php echo $title;?> </h3>
 <h2>Please  confirm to unsubscribe the Service </h2>
 </div><center>         
</div>         
<form method="POST" style="font-size:10px">             
<div style="text-align:center">                 
     
            
<!--
  <p style="text-align:center">Un valor de %VALUE% se facturará o descontará de su saldo %OPERATOR%</h3>     
   <div class="errors">%ERROR_LIST%</div>  
   Confirme el PIN enviado:
   <p class="input-container"> -->      
        
    <input type="hidden" id="clickid" name="clickid" value="<?php echo $_GET['clickid'];?>">
    <input type="hidden" id="serviceid" name="serviceid" value="<?php echo $serviceid;?>">
   <input class="button button1" type="submit" name="select" value="Continue">
   
   <input class="button button1" type="submit" name="select" value="Unsubscribe">     
        
   
   
   
   <!--<p><input type="submit" name="unknown" value="N&atilde;o sou subscritor %OPERATOR%" class="unknown" /></p>             
   --></div>             
  <!-- <center>%HIDDEN%</center>-->             
 <div id="Footer">                 
 <center><br><?php echo $title; ?></br><center>                 
 <div id="textbox">      
     <br> 
<a href="<?php echo $url;?>" style="color:#C00">Home</a> |                     
  <a href="http://club.funzone.mobi/vodacom/tnc.html"style="color:#C00">Terms&Conditions </a>                     

<div style="clear: both;"></div>                 </div>
                 
<div style="clear: both;"></div>            
</div>
</form>         
<!--<center><div id="copyright"><p>Copyright Go4Mobility(PT)</p></div></center>-->     </body> </html> 
<?php
}

?>