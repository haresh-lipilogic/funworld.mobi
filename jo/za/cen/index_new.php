<meta http-equiv="Content-Security-Policy" content="default-src 'self'; img-src http://*; child-src 'none';">
<?php
//var_dump(getallheaders());
//exit;
//echo "Hi";exit;
error_reporting(0);
header('X-Frame-Options: DENY');
$status= http_response_code();
$pageurl='http://'.$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; // Page URL
include "includes/dbdetail.php";
//include "function.php";
 session_start();
$serviceid=1;
date_default_timezone_set("Asia/Kolkata");
$date=date("Y-m-d H:i:s");
$date1=date("Y-m-d");
if($status==302)
{
	//echo "<h3 style='color:red'>302 You are not authorise to subscribe this Service</h3>";
	//exit;
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
		
		$cookie_count='pktelenor';
		//$clickid1=$_COOKIE[$cookie_name];
		
		 $co=$_COOKIE[$cookie_count]+1;
		if($co >=3)
		{
			echo "You have blocked  For Service for 3 Days ";
			exit;
		}
		setcookie($cookie_count, $co, time() + (86400 * 2), "/");
		
		
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
				
				//echo "Your Traffic has been blocked please ask Service operator ";
				//exit;
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

		
		
 
			
		
		
		
		
		$xforwardwith=strtolower($_SERVER['HTTP_X_REQUESTED_WITH']);
		
		
		
		
		
		
		



$useragent=strtolower($_SERVER['HTTP_USER_AGENT']);

$msisdn=$operator='';



	
	 $insert_userlog="call ".$dblog.".insert_userlog ('".$date."','".$msisdn."','".$operator."','".$referrer."','".$clickid."','".$pubid."','".$advertiserid."','".$ip."','".$advertclickid."','".$useragent."','".$xforwardwith."','".$serviceid."','".$pageurl."')";   
		$res_userlog=$conn1->query($insert_userlog);

		
	
			$sql24 = "SELECT * from ".$db.".subscriber  where charging_mode='act' and amount>0 and date(subsriptionstartdate)='".$date1."' ";
			//exit;
			$me1=$conn1->query($sql24);
				$rowcount26=0;
			 $rowcount26=mysqli_num_rows($me1); 
		
			if ($rowcount26 >= 1000)
			{
				
				echo "Your Traffic has been blocked due to cap is over";
				exit;
			}
		
function ip_in_range( $ip, $range ) {
	if ( strpos( $range, '/' ) == false ) {
		$range .= '/32';
	}
	// $range is in IP/CIDR format eg 127.0.0.1/24
	list( $range, $netmask ) = explode( '/', $range, 2 );
	$range_decimal = ip2long( $range );
	$ip_decimal = ip2long( $ip );
	$wildcard_decimal = pow( 2, ( 32 - $netmask ) ) - 1;
	$netmask_decimal = ~ $wildcard_decimal;
	return ( ( $ip_decimal & $netmask_decimal ) == ( $range_decimal & $netmask_decimal ) );
}



$sql = "select * from ".$db.".ip where isblock=0";
foreach ($conn1->query($sql) as $row) {
//$i++;
$ipmask=$row['ip_mask'];
 $ipfind=ip_in_range($ip,$ipmask);
//echo $i.").ipfind=".$ipfind."<br>";
if($ipfind==1)
	{
		$id= $row['id'];
		break;
	}
}

if($id ==0)
{
	//exit;
}



if (strpos( $useragent,'android') == true || strpos( $useragent,'iphone') == true ) {

}
else{
	echo "This service not available for Desktop ";
exit;
}

if (strpos( $useragent,'opera') == true ) {
exit;
}

$timestmp=time();
$returnurl="https://club.funzone.mobi/pk/lp.php?clickid=".$clickid;
$returnurl=urlencode($returnurl);

//$url="onsubmit.php?clickid=".$clickid."";

$url="http://api.centili.com/payment/pages/userIdentify.jsf?apikey=".$apikey."&timestamp=".$timestmp."&returnurl=".$returnurl."&sign=";

header("Location:$url");
exit;
//echo $url;
//exit;
?>



<!DOCTYPE html>
<html>

<head>
    
     
    
    <meta charset="utf-8">
    <meta content="telephone=no" name="format-detection">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0, minimum-scale=1, maximum-scale=1, minimal-ui">
    <title data-c-role="title">Gamebar</title>
    
    
    
    
<link href="style.css" rel="stylesheet" type="text/css"></head>

<body>
    <div id="container" class="show-subscribe-button qa-html5">
        <div id="top-wrap">
          <!--  <div data-x-role="price" class="price">Vodafone: 3 QAR every 3 days. Ooredoo: QAR 9/week.</div>-->
            <!-- CAR ANIMATION AND BACKGROUND -->
            <!--<img src="images/1_html_title-en.png" alt="" class="title">-->
            <div class="car-wrap" id="car">
                <!-- <img src="/release/StreetRacingMania/html5/qa/qtel/en/default/v9/assets/2_html_arrow-down.png" alt="" class="pointer"> -->
                <div id="flames"></div>
                <img src="images/3_html_car_body.png" alt="" class="car slow">
                <!--<img src="images/4_html_car_engine.png" alt="" class="engine">-->
                <img src="images/5_html_wheel_rear.png" alt="" class="rearTyre slow">
                <img src="images/6_html_wheel_front.png" alt="" class="frontTyre slow">
                <img src="images/7_html_shadow.png" alt="" class="shadow">
                <div class="dust slow"></div>
            </div>
            <!-- <div id="car-hotspot" class="subscribe"></div> -->
            <!-- ANIMATION ENDS -->
            <img src="images/8_html_wind.png" alt="" class="wind slow">
            <img src="images/9_html_track.png" alt="" class="offroad-track slow">
            <img src="images/10_html_rocks.png" alt="" class="rocks slow">
            <img src="images/11_html_mountains.png" alt="" class="mountains slow">
            <img src="images/12_html_background.png" alt="" class="bgmountains slow">

            <!-- NUMBER ENTRY -->
           

            <!-- PIN ENTRY -->
           

            <!-- MO MESSAGE -->
            

            <!-- CONGRATS -->
            
        </div>

        <div class="speedometer">
            <div class="needle">
                <img src="images/13_html_needle.png" alt="" class="slow">
            </div>
        </div>

        <!-- SUBSCRIBE BUTTON -->
        <div id="default-state1" style=" display: block; important" >
            <a href="<?php echo $url;?>" id="subscribe" class="btn subscribe">
                <span data-x-role="subscribe-now">Subscribe Now!</span>
                <div class="hotspot subscribe"></div>
            </a>
            <div class="price-point">You will be charged 30pkr/week</div>
        </div>

        <!-- DOUBLE CONFIRMATION -->
        

        <!-- Click Here -->
        <div id="click-here">
            <!-- <a href="javascript:void(0)" id="subscribe-link" data-c-role="click-here" class="subscribe">Click Here</a>
            <span data-c-role="click-here-message">to subscribe for unlimited Mobile Games.</span> -->
            <img src="images/gamebar.png" alt="" class="logo">
            <span class="tagline">Unlimited Mobile Games</span>
        </div>

        <div class="footer-disclaimer">
       <!--  <a href="?lang=ar" id="language"><img src="images/16_html_language-qa-ar.png" alt=""></a>-->
           <center> <div data-x-role="disclaimer" class="disclaimer">
                Get unlimited access of Games upon subscription. 
				<!--Ooredoo users will be charged 30PKR/week. To unsubscribe send STOP to 92534. 
				To use this service you must be 18 years and above, or have received permission from your parents or person authorized to pay your bill.
             <!--   <p><br><a href="http://live.vipgames.me/#/general-terms" target="_blank">Terms &amp; Conditions</a></p>
			 
            -->
			<p>This is an ongoing subscription service until you unsubscribe. By clicking download you will be subscribed and charged 30.00 PKR/freq. All content is compatible with 3G/4G/LTE-enabled mobile phones and applicable to both postpaid and prepaid users. Data charges are billed separately by mobile operator. You can unsubscribe from the service anytime by clicking on SMS unsubscription link on your mobile phone.  Subscriptions will automatically be renewed unless cancelled. To use this service you must be more than 18 years old, or to have received permission from your parents or person who is authorized to pay your bill. Customer Support: global@dcb.com, Working hours Monday-Friday, 09-18h.</p>
			
			</div></center>
        </div>
      
<!-- GTM dataLayer -->
<script>
    if (typeof dataLayer == 'undefined') {
        dataLayer = [];
    }
    if (typeof mobiOneConstants != 'undefined') {
        dataLayer.push(mobiOneConstants);
    }
</script>
<!-- End GTM dataLayer -->

<!-- GTM global events -->
<!-- GTM global events -->

<!-- Google Tag Manager -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NXRZK5"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-NXRZK5');</script>
<!-- End Google Tag Manager -->

<script>

        </script>
        









        
   <!--     <img data-ignore-minification="true" src="/20798/imagePixel?_q42=pemn410Z&amp;_userId=15089264641878556&amp;_sessionId=1508926464187&amp;_clientSessionId=0&amp;_impressions=0&amp;creative=StreetRacingMania&amp;suffix=html5-qa-qtel-en-default&amp;queryTokens=v%3D681%26clickid%3DwK852BBILDCU0M69H3AGKPDK%26pid%3D8f374e3a-dfe7-4790-b05e-99399745db81" style="display: none" class="pixel">-->
    </div>
<script src="index.js" type="text/javascript"></script></body>

</html>





<?php

	 
exit;



?>