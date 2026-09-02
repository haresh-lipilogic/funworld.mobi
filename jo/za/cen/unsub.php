<?php
include "includes/dbdetail.php";
include "function.php";
error_reporting(0);
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
					<center> <img class="logosvg" style="height:8%; width:30%;" src="gameportal/assets/logo/gamebar.png">      </center>
					<br><br>
					<div id="main">

					 <center>
					 <div class="home-faq">Funworld<br><h2>We are not identify the Subscription Please enter your mobile number Below</h2></div><center>         
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
if(isset($_GET['msisdn']))
{
	//print_r($_GET);exit;
	session_start();
	if(isset($_SESSION["jo_act"]))
	{
	 	$subscriptionid=$_SESSION["jo_act"];
		
	}
	else{
		
		//echo "hi2";exit;
		if(isset($_GET['msisdn']))
		{
			//echo $_GET['msisdn'];exit;
			 $msisdn1=$_GET['msisdn'];
			
			//exit;
			$usersubscribe=findusersubscription($msisdn1);
			//print_r($usersubscribe);
			
			  $subscriptionid=$usersubscribe['subscriptionId'];
		}
		else{
			session_start();
			$subscriptionid=$_SESSION["jo_act"];
		}
	}	
		//echo $subscriptionid;exit;
	
		$unsub=unsub($subscriptionid);
	
	if($unsub==200)
	{
	echo "you have Successfully Unsubscribe this Service ";	exit;
	}
	else{
		
	echo "there is a some issue , Please try after some time ";	
	}
	
}
}
?>