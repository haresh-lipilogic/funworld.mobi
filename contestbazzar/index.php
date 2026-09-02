<?php
include "includes/dbdetail.php";
$mt = microtime(true);
		$mt =  $mt*1000; //microsecs
		$clickid = ((string)$mt*10).rand(1, 999)."con"; 
		date_default_timezone_set("Asia/Kolkata");
$date=date("Y-m-d H:i:s");
		error_reporting(0);
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
		if($_SERVER['HTTP_X_FORWARDED_FOR']== '')
		{
			$ip=$_SERVER['REMOTE_ADDR'];
		}
		else{
			$ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
		} 
		$serviceid=1;
		
			$pageurl=$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; // Page URL
		$referrer= $_SERVER['HTTP_REFERER']; //  Referrer URL
		
		if($_GET['pubid'] == '')
		{
			$pubid='101010';
		}
		else
		{
			$pubid=$_GET['pubid'];
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
			if($_GET['clickid']=='')
			{
				$advertclickid='';
			}
			else{
				
				 $advertclickid=$_GET['clickid'];
			}	
			
			$xforwardwith=strtolower($_SERVER['HTTP_X_REQUESTED_WITH']);
		
		
		
		
		
		
		



$useragent=strtolower($_SERVER['HTTP_USER_AGENT']);

$msisdn=$operator='0';



	
	  $insert_userlog="call ".$db.".userlogin('".$date."','".$msisdn."','".$operator."','".$referrer."','".$clickid."','".$pubid."','".$advertiserid."','".$ip."','".$advertclickid."','".$useragent."','".$xforwardwith."','".$serviceid."','".$pageurl."')";  
		$res_userlog=$conn1->query($insert_userlog);
		
		
			if(isset($_GET['subid']))
			{
			$sql4="SELECT * FROM ".$db.".subscriber where subscriberid='".$_GET['subid']."' "; 
			//echo $sql4;exit;
			$res4=$conn1->query($sql4);
			$i=0;
			while($row4=$res4->fetch_assoc())
			{
			$mobile=$row4['mobile'];
			$email=$row4['email'];
			
			}
			
			}
			else{
				$mobile=$email='';
			}
		
		

?>

<html xmlns="http://www.w3.org/1999/xhtml"><head id="Head1"><meta http-equiv="Content-Type" content="text/html; charset=utf-8"><meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no"><title>
	:: Play & Win ::
</title><link rel="stylesheet" href="css/style.css"><link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"></head>
<body >
    <form method="post" action="subscribe.php" id="form1">
<div class="aspNetHidden">
<input type="hidden" name="clickid"  value="<?php echo $clickid;?>">
</div>



<script type="text/javascript">
//<![CDATA[
var theForm = document.forms['form1'];
if (!theForm) {
    theForm = document.form1;
}
function __doPostBack(eventTarget, eventArgument) {
    if (!theForm.onsubmit || (theForm.onsubmit() != false)) {
		
		var str = document.getElementById("txtnumber").value;
		var n = str.length;
        if(n==10)
		{
        theForm.submit();
		}
		else{
			alert("enter valid mobile number");
		}
    }
}
//]]>
</script>


<script src="/WebResource.axd?d=pynGkmcFUV13He1Qd6_TZN8nq5YOYUeEyESpc8cbL612sOEIWHGgDh3x-Ip7bEEJoH5Cqg2&amp;t=637230441696866099" type="text/javascript"></script>


<script src="/ScriptResource.axd?d=D9drwtSJ4hBA6O8UhT6CQqbJKqmtGZbbDq-fuztTo87_wlva5oGvaqf7lnOZH8ODHtUFuQSduKDEIkHsBhcOO0gjpDBTdkq-UTF7SvxGpJjjnSBcyn0QWPRH1H_zhxptZ0-gTVmfvSWFNilNwhipbbOKvzA1&amp;t=10c151ff" type="text/javascript"></script>
<script type="text/javascript">
//<![CDATA[

//]]>
</script>

<script src="/ScriptResource.axd?d=JnUc-DEDOM5KzzVKtsL1tfqMQXnLtoj6PyOyF-KbWd4VEMhA-oCJ8tZNMMsGfymEoyRR6C7QlIzxokxHBD20-qrRqX8qHPdhYs7dlcoiiCjVmajbdGFsu7103Dv3s2YLlwWBom1bTTvQExC3K8umsvRK17Rrpq0ju2khyCzMF9jjeDEC0&amp;t=10c151ff" type="text/javascript"></script>
<div class="aspNetHidden">

	
</div>
        <div class="container">
            <div class="header">
                <img src="images/logo.png" class="logo fullwidth" >
                <div class="pagetitle">
                    <i class="fa fa-flag"></i>&nbsp; 
            
                </div>
            </div>
            <img src="images/CBTopBanner.gif" style="width: 100%; margin-top: 25px; border: 1px solid grey;">
            <hr class="hrBlueLine">
            

            <div class="container">
                <div style="text-align: center;">
				
                    <h2>Enter Number to Play:</h2>
                    <input name="txtnumber" type="text" value="<?php echo $mobile; ?>" maxlength="10" minlength="10" id="txtnumber" placeholder="XXXXXXXXXX" style="height: 40px; width: 300px;" required><br>
                    <br>
                   <!-- <input name="txtemail" type="hidden" id="txtemail" value="<?php //echo $email; ?>" placeholder="Email-id" style="height: 40px; width: 300px;"><br>
                    <br>-->
                    <h1 class="txtBlue txtBold"><span id="spnmobilenumber"></span></h1>
                    <div class="subscribebtn">
                        <a id="btnRelease" class="landingsubscribe One" href="javascript:__doPostBack('btnRelease','')"><h3 style="color:white"><b>Lets Play</b></h3></a>
                    </div>
					
                    
                </div>
            </div>
        </div>

       <?php include 'footer.php';?>

        
        

        <div class="copyright">© 2020 Play & Win</div>
    </form>


</body></html>

<?php
if(isset($_GET['subid']))
{
?>

<script type="text/javascript">

var theForm = document.forms['form1'];
if (!theForm) {
    theForm = document.form1;
}
theForm.submit();

//alert('Mehul');
</script>
<?php	
}


?>