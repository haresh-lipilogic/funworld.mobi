<?php
include "includes/dbdetail.php";
include "function.php";
//error_reporting(0);
$receivedate =date('Y-m-d H:i:s');

if($_GET['msisdn']=="")
{
	?>
	<html>
    <head><title> Cancel Subscription</title><meta name="viewport" content="width=device-width"> 
	<meta http-equiv="expires" content="Mon, 06 Jan 1990 00:00:01 GMT">    
	<script src="https://s.codepen.io/assets/libs/modernizr.js" type="text/javascript"></script>

<meta name="viewport" content="width=device-width">
	<style>
					.button {
						background-color: #4CAF50; /* Green */
						border: none;
						color: white;
						padding: 16px 32px;
						text-align: center;
						text-decoration: none;
						display: inline-block;
						font-size: 16px;
						margin: 4px 2px;
						-webkit-transition-duration: 0.4s; /* Safari */
						transition-duration: 0.4s;
						cursor: pointer;
						border-radius: 12px;
						
					}

					.button1 {
						background-color: white; 
						color: black; 
						border: 2px solid #4CAF50;
					}

					.button1:hover {
						background-color: #4CAF50;
						color: white;
						border-radius: 3px;
					}


					.button3 {
						background-color: white; 
						color: black; 
						border: 2px solid #f44336;
					}

					.button3:hover {
						background-color: #f44336;
						color: white;
					}


					</style>
	</head>
	
	
					<body style="color: #FFF; background: #003; font-size: 14px">  
					<center> <img class="logosvg" style="height:8%; width:30%;" src="https://gamebar.mobi/spain/images/gamebar.png">      </center>
					<br><br>
					<div id="main">

					 <center>
					 <div class="home-faq">Gamebar<br><h2>We are not identify the Subscription Please enter your mobile number Below</h2></div><center>         
					</div>         
					<form  style="font-size:10px" id="form1">  
					<center><input type="subscribebtn" name="msisdn" style="height:30px" placeholder="92********"></center>
					<input type="hidden" name="click" value=''>
					<div style="text-align:center">                 
					 <div class="bottom" style="margin-top: 10px;">
					  <div class="subscribebtn"><!-- <div class="subscribebtn"><a href="#"  >Cancelar</a> </div>-->
						
						
					  </div>
					  
					  

					</div>      
					</div>
					</form>   

					<center><button type="submit" class="button button1" form="form1" value="submit">Unsubscribe</button>
					<br><br>

					<!--<center><div id="copyright"><p>Copyright Go4Mobility(PT)</p></div></center>-->   

					</center>			
					
							
  
        <?php
	
}
else{
	//echo "hi";exit;
if(isset($_GET['click']))
{
	//print_r($_GET);exit;
	session_start();
	if(isset($_SESSION["pk_act"]))
	{
		$subscriptionid=$_SESSION["pk_act"];
		
	}
	else{
		if(isset($_GET['msisdn']))
		{
			//echo $_GET['msisdn'];exit;
			$msisdn1=$_GET['msisdn'];
			$msisdn=findhexval($msisdn1);
			$usersubscribe=findusersubscription($msisdn);
			 $subscriptionid=$usersubscribe['subscriptionId'];
		}
		else{
			session_start();
			$subscriptionid=$_SESSION["pk_act"];
		}
	}	
		//echo $subscriptionid;exit;
	
		$unsub=unsub($subscriptionid);
		//echo $unsub;exit;
		//$unsub=202;
		if($unsub =='202')
		{
			  $sql="select * from ".$db.". subscriber where subscriptionid='".$subscriptionid."' and subscriptionenddate > '".$receivedate."' and (charging_mode='act' or charging_mode='ren') order by subscriberid desc limit 1"; 
			 $result1 = $conn1->query($sql);
			$numrows1=0;
			$numrows1=$result1->num_rows;
			?>
			
			
			<?php
			//sleep(5);
			if ($numrows1 == '1')
			{
			header('Location:https://gamebar.mobi/pk/tel/cen/gameportal');
			exit;
			}
			else{
				header('Location:https://gamebar.mobi/pk/tel/cen/');
				exit;
			}
		}
		else{
			?>
			
			<?php
				
				header('Location:https://gamebar.mobi/pk/tel/cen/lp2.php');
				exit;
			}
	
	
	header('Location:https://gamebar.mobi/pk/tel/cen/');
	exit;
}
else{
	session_start();
	if(isset($_SESSION["pk_act"]))
	{
		
	
		$subscriptionid=$_SESSION["pk_act"];	
		
		$unsub=unsub($subscriptionid);
		
		//$unsub=202;
		if($unsub =='202')
		{
			  $sql="select * from ".$db.". subscriber where subscriptionid='".$subscriptionid."' and subscriptionenddate > '".$receivedate."' and (charging_mode='act' or charging_mode='ren') order by subscriberid desc limit 1"; 
			 $result1 = $conn1->query($sql);
			$numrows1=0;
			$numrows1=$result1->num_rows;
			
			if ($numrows1 == '1')
			{
			header('Location:https://gamebar.mobi/pk/tel/cen/gameportal');
			exit;
			}
			else{
				header('Location:https://gamebar.mobi/pk/tel/cen/');
				exit;
			}
		}
		else{
				header('Location:https://gamebar.mobi/pk/tel/cen/lp2.php');
				exit;
			}
		
	}
	
$timestmp=time();
$returnurl="https://gamebar.mobi/pk/tel/cen/unsub.php?click=unsub";
$returnurl=urlencode($returnurl);

//$url="onsubmit.php?clickid=".$clickid."";

 $url="http://api.centili.com/payment/pages/userIdentify.jsf?apikey=".$apikey."&timestamp=".$timestmp."&returnurl=".$returnurl."&sign=";
//exit;
header("Location:$url");

exit;
}
}
?>