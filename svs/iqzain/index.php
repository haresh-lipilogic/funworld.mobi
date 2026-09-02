<?php 
include("includes/connection.php");
error_reporting(0);

	
		date_default_timezone_set("Asia/Kolkata");
			$accesstime=date("Y-m-d H:i:s");
			$date=date("Y-m-d");

	// creating clickid
			$mt = microtime(true);
			$mt =  $mt*1000; //microsecs
			$clickid = ((string)$mt*10).rand(1, 99); // Clickid 
			
			
			$useragent=strtolower($_SERVER['HTTP_USER_AGENT']);
		
			//Pubid
			if($_GET['pubid'] == '')
			{
				$pubid='101010';
			}
			else
			{
				$pubid=$_GET['pubid'];
			}

			$advertclickid=$_GET['clickid'];
			if($advertclickid == '')
			{
				$advertclickid=$_GET['clickd'];
			}
			else{
				
			}
		
			// Advertiserid
			$advertiserid=$_GET['advid']; 

			$pageurl='http://'.$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; // Page URL
			$referrer= $_SERVER['HTTP_REFERER']; //  Referrer URL

			
			$xforwardwith=strtolower($_SERVER['HTTP_X_REQUESTED_WITH']);
		//$xforwardwith='com.nemo.vidmate';

	
			//Get Operator IP Address- Remotehost
			if($_SERVER['HTTP_X_FORWARDED_FOR']== '')
			{
				$ip1=$_SERVER['REMOTE_ADDR'];
			}
			else{
				$ip1=$_SERVER['HTTP_X_FORWARDED_FOR'];
			}   

			$urlParts = parse_url($ip1);
			$ip= $urlParts['host'];


			// Get Xforward IP Address
			if($_SERVER['REMOTE_ADDR'] == '')
			{
				$xforward = '';
			}
			else
			{
				$xforward = $_SERVER['REMOTE_ADDR'];
			}

			if(count($_COOKIE['clickid_iqzain']) > 0) {


				
				$flag=1;
				$cookie_value=$_COOKIE['clickid_iqzain'];  
				
				$sql_data="select * from ".$db.".subscriber WHERE clickid = '".$cookie_value."'  order by subscriberid desc limit 1";    
				$res_data=$conn->query($sql_data); 
				$row_data=$res_data->fetch();
				$status=$row_data['charging_mode']; 
				
				if($status == 'act' || $status=='ren' || $status=='cg' )
				{	

				}
				
				else
				{
					$cookie_name = "clickid_iqzain";
					$cookie_value = $clickid;
					setcookie($cookie_name, $cookie_value, strtotime( '+2 days' )); 
					
					if(count($_COOKIE['hit_iqzain']) > 0)
					{			
						if($_COOKIE['hit_iqzain'] > 300)
						{
							header("Location: http://google.com");
							exit;
						}
						else
						{
							$cookie_hit = "hit_iqzain";
							 $cookie_hit_value=$_COOKIE['hit_iqzain']+1;
							 setcookie($cookie_hit, $cookie_hit_value, strtotime( '+1 days' ));
						}
					}
					else
					{
					
						$cookie_hit = "hit_iqzain";
						$cookie_hit_value = 1;
						setcookie($cookie_hit, $cookie_hit_value, strtotime( '+1 days' ));
						 
					}
				}

			} 
			else 
			{
				$flag=0;
				//echo "Cookies are enabled.";
				$cookie_name = "clickid_iqzain";
				$cookie_value = $clickid;
				setcookie($cookie_name, $cookie_value, strtotime( '+2 days' )); 
				
					if(count($_COOKIE['hit_iqzain']) > 0)
					{						
						if($_COOKIE['hit_iqzain'] > 200)
						{
							header("Location: http://google.com");
							exit;
						}
						else
						{
							$cookie_hit = "hit_iqzain";
							 $cookie_hit_value=$_COOKIE['hit_iqzain']+1;
							 setcookie($cookie_hit, $cookie_hit_value, strtotime( '+1 days' ));
						}
					}
					else
					{
					
						$cookie_hit = "hit_iqzain";
						$cookie_hit_value = 1;
						setcookie($cookie_hit, $cookie_hit_value, strtotime( '+1 days' ));
						 
					}
			}

			$insert_userlog="call ".$db.".insert_userlog('".$accesstime."','".$pageurl."','".$clickid."','".$advertclickid."','".$pubid."',
			'".$advertiserid."','".$operator."','".$referrer."','".$useragent."','".$ip1."','".$xforward."','".$xforwardwith."')";
			$res_userlog=$conn->query($insert_userlog); 
			
			
			
			$ts=time();
			$merchantname ="SVMobi";
			$servicename ="game+station";
			$serviceid ="96";
			$spid ="61";
			$shortcode ="4054";
			$type ="he";
			
$html = "http://he.thegate-tech.com:8081/dcbprotect.php?action=script&ti=$clickid&ts=$ts&te=.cta_button&servicename=$servicename&merchantname=$merchantname&type=$type"; 
$test = file_get_contents($html);
$test = json_decode($test); 


?>
<!DOCTYPE html>
<html>
<head>
   
    <meta charset="utf-8">
    <meta content="telephone=no" name="format-detection">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0, minimum-scale=1, maximum-scale=1, minimal-ui">
	<meta name="referrer" content="unsafe-url">
    <title data-c-role="title">GameStation</title> 
<link href="css/style.css" rel="stylesheet" type="text/css">
<script>
 <?php echo $test->s; ?>
 
</script>

</head>

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
		
            <div id="number-entry" >
				<img src="images/gameStation.png" alt="GameStation" class="logo" style="height:40px;width:250px;">
				</br>
				</br>
				
				<div class="eng">
					<button class="btn hide" style="border:none;">SUBSCRIBE</button>
					<button class="btn cta_button" onclick="functiontodo()" style="border:none;">CONFIRM</button>
					<div class="price-point" >300 dinars/daily.</div> 
				</div>
				
				<div class="arb" style="display:none;">
					<button class="btn hide" style="border:none;">إشترك</button>
					<button class="btn cta_button" onclick="functiontodo()"  style="border:none;">تأكيد</button>
					<div class="price-point" >300 دينار/يومياً.</div> 
				</div>
       
            </div>
			
		
            
           
        </div>

        <div class="speedometer">
            <div class="needle">
                <img src="images/13_html_needle.png" alt="" class="slow">
            </div>
        </div>

        <!-- SUBSCRIBE BUTTON 
        <div id="default-state">
            <a href="javascript:void(0)" id="subscribe" class="btn subscribe">
                <span data-x-role="subscribe-now">Subscribe Now!</span>
                <div class="hotspot subscribe"></div>
            </a>
            <div class="price-point">You will be charged QAR 9/week</div>
        </div>-->

       

        <!-- Click Here -->
        <div id="click-here">
            <!-- <a href="javascript:void(0)" id="subscribe-link" data-c-role="click-here" class="subscribe">Click Here</a>
            <span data-c-role="click-here-message">to subscribe for unlimited Mobile Games.</span> -->
            <img src="images/gameStation.png" alt="GameStation" class="logo" style="height:50px;width:300px;">
            <!--<span class="tagline" style="font-size:14px;">Unlimited Mobile Games</span> -->
        </div>
	
        <div class="footer-disclaimer">
       <!--  <a href="?lang=ar" id="language"><img src="images/16_html_language-qa-ar.png" alt=""></a>-->
            <div data-x-role="disclaimer" class="disclaimer">
			
				</br>
				<p style="font-size:14px;text-align:center;"><strong><span id="english" >ENGLISH</span>  |  <span id="arabic" >عربي</span></strong></p>
				</br>
				
				<div class="eng">
				<p style="font-size:14px;text-align:center;">Welcome, to subscribe in Game Station send a text message containing 69 to 4054 or by pressing the button above.</p>
				<p style="font-size:14px;text-align:center;">For new subscribers, the first day is free.</p>
				<p style="font-size:14px;text-align:center;">After the end of the free period, an amount of 300 Iraqi dinars will be deducted daily. </p>
				<p style="font-size:14px;text-align:center;">To unsubscribe, send 069 to 4054 for free</p>
				</div>
				
				
				<div class="arb" style="display:none;">
				<p style="font-size:14px;text-align:center;">مرحباً! للاشتراك، يرجى إرسال رسالة نصية برقم 69 إلى 4054 أو الضغط على الزر أعلاه. للمشتركين الجدد، اليوم الأول مجاني. وبعد انتهاء الفترة المجانية سيتم خصم مبلغ 300 دينار عراقي يومياً. لإلغاء الاشتراك، برجاء إرسال رسالة نصية على الرقم 069 إلى 4054 مجانًا.</p>
				</div>
            <!--   <p><br><a href="http://live.vipgames.me/#/general-terms" target="_blank">Terms &amp; Conditions</a></p>
            --></div>
        </div>
		
		

<?php 
include("footer.php");
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>

$(document).ready(function(){
  $("#english").click(function(){
	   
	$(".eng").show();
	$(".arb").hide();
;
  });
  $("#arabic").click(function(){
	  
     $(".arb").show();
	$(".eng").hide();
	
  });
});

$(".cta_button").hide();

$(document).ready(function(){
  $(".hide").click(function(){
    $(".hide").hide();
    $(".cta_button").show();
  });

});




	function functiontodo(){
	
	var ts = Math.floor(Date.now() / 1000);
	var servicename = '<?php echo $servicename; ?>';
	var merchantname =  '<?php echo $merchantname; ?>';
	
		window.location.href = "http://he.thegatetech.com:8081/HE/v1.2/oneclick/subscribeUser.php?serviceId="+<?php echo $serviceid; ?> + "&spId=" +<?php echo $spid; ?> +"&shortcode="+ <?php echo $shortcode; ?> +"&ti="+<?php echo $clickid; ?> +"&ts=" +ts + "&servicename="+ servicename +"&merchantname="+ merchantname +"&type=he";
	
	}
</script>