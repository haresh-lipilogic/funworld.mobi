<?php
include("includes/connection.php");
error_reporting(0);
date_default_timezone_set("Asia/Kolkata");

$date=date("Y-m-d");

$pageurl='http://'.$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; // Page URL

$success=$_GET['success'];
$clickid=$_GET['ti']; 

$sql= "select * from ".$db.".userlog where clickid='".$clickid."' order by userlogid desc limit 1";
$res=$conn->query($sql);
$row=$res->fetch();
$advertiserid =$row['advertiserid'];
$pubid =$row['pubid'];
$accesstime =$row['accesstime'];
$operator ="zain";

$subscriptionstartdate=date("Y-m-d H:i:s");

$subscriptionenddate=date('Y-m-d H:i:s',strtotime($subscriptionstartdate. ' + 1 days'));

if(date('Y-m-d',strtotime($accesstime)) == date('Y-m-d',strtotime($subscriptionstartdate)))
{
	$sameday=1; 
}
else
{
	$sameday=0;
}
	


if($success == 1 || $success == '1')
{
	$reason_code="success";
	$charging_mode = "cg";
	$msisdn=$_GET['msisdn'];
	
	$insert_activeuserlog="INSERT INTO ".$db.".`activeuserlog`(
													`accesstime`,
													`pageurl`,
													`clickid`,
													`msisdn`,
													`advertclickid`,
													`pubid`,
													`advertiserid`,
													`operator`,
													`referrer`,
													`useragent`,
													`ip`,
													`xforward`)
													select 
													`accesstime`,
													`pageurl`,
													`clickid`,
													'".$msisdn."',
													`advertclickid`,
													`pubid`,
													`advertiserid`,
													'zain',
													`referrer`,
													`useragent`,
													`ip`,
													`xforward` from ".$db.".`userlog` where clickid = '".$clickid."' ";
						$res_activeuserlog=$conn->query($insert_activeuserlog);
						
						$insert = "INSERT INTO ".$db.".`subscriber`
							(
							`clickid`,
							`pubid`,
							`msisdn`,
							`advertiserid`,
							`operator`,
							`channel`,
							`charging_mode`,
							`status`,
							`error`,
							`amount`,
							`subscriptionstartdate`,
							`subscriptionenddate`,
							`sameday`,
							`response`,
							`subid`,
							`refid`,
							`transactionid`)
							VALUES
							(
							'".$clickid."',
							'".$pubid."',
							'".$msisdn."',
							'".$advertiserid."',
							'zain',
							'WEB',
							'cg',
							'1',
							'0',
							'0',
							'".$subscriptionstartdate."',
							'".$subscriptionstartdate."',
							'".$sameday."',
							'".$pageurl."',
							'0',
							'0',
							'0');
							";
							$res_insert=$conn->query($insert);
	
	
}
else{
	
	$flow="no";
	
	if(isset($_POST['submit']))
	{
		
		$clickid=$_POST['clickid'];
		$msisdn=$_POST['msisdn'];
		$pubid =$_POST['pubid'];
		$advertiserid =$_POST['advertiserid'];
		
		$msisdn = ltrim($msisdn, '0'); 
		if(substr($msisdn,0,3) == '964')
		{
		}
		else
		{
			$msisdn="964".$msisdn;
		}
		$msisdn = str_replace(' ', '', $msisdn);

		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => 'https://dcb-api.window-technologies.com/method/sendSubPincode',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'POST',
		  CURLOPT_POSTFIELDS =>'{"user":"GameStation","password":"Game20Station24","msisdn":"'.$msisdn.'","shortcode":"4054","serviceId":"96","spId":"61"}',
		  CURLOPT_HTTPHEADER => array(
			'Content-Type: application/json'
		  ),
		));

		$result = curl_exec($curl);

		curl_close($curl);
		$data=json_decode($result,true);
		$status=strtolower($data['status']);

		if($status == 'success')
		{
			$flow="pin";
		}
		else{
			$flow="no";
		}
		
		$insert_pin="INSERT INTO `fashionbardb_iqzain`.`requestpin`
					(
					`clickid`,
					`msisdn`,
					`operator`,
					`advertiserid`,
					`pindatetime`,
					`status`,
					`response`)
					VALUES
					(
					'".$clickid."',
					'".$msisdn."',
					'".$operator."',
					'".$advertiserid."',
					'".DATE('Y-m-d H:i:s')."',
					'".$status."',
					'".$result."')";
		$res_pin=$conn->query($insert_pin);
		
		
	}
	
	if(isset($_POST['submit1']))
	{
		$clickid=$_POST['clickid'];
		$msisdn=$_POST['msisdn'];
		$pubid =$_POST['pubid'];
		$advertiserid =$_POST['advertiserid'];
		$pin =$_POST['pin'];
		$ts=time();
		
		$msisdn = ltrim($msisdn, '0'); 
		if(substr($msisdn,0,3) == '964')
		{
		}
		else
		{
			$msisdn="964".$msisdn;
		}
		$msisdn = str_replace(' ', '', $msisdn);
			
	
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => 'https://dcb-api.window-technologies.com/method/verifySubPincode',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'POST',
		  CURLOPT_POSTFIELDS =>'{"user":"GameStation","password":"Game20Station24","msisdn":"'.$msisdn.'","shortcode":"4054","serviceId":"96","spId":"61","pincode":"'.$pin.'","uniqueId":"'.$clickid.'"}',
		  CURLOPT_HTTPHEADER => array(
			'Content-Type: application/json'
		  ),
		));

		$result = curl_exec($curl);

		curl_close($curl);
		$data=json_decode($result,true);
		$status=strtolower($data['status']);
		
		$insert_pinverify="INSERT INTO ".$db.".`pinverify`
							(
							`msisdn`,
							`operator`,
							`clickid`,
							`advertiserid`,
							`pindatetime`,
							`pin`,
							`status`,
							`response`)
							VALUES
							(
							'".$msisdn."',
							".$operator."',
							'".$clickid."',
							'".$advertiserid."',
							'".DATE('Y-m-d H:i:s')."',
							'".$pin."',
							'".$status."',
							'".$result."')";
			$res_pinverify=$conn->query($insert_pinverify);
		
		if($status == 'success')
		{
			$flow="success";
			
			
			$insert_activeuserlog="INSERT INTO ".$db.".`activeuserlog`(
													`accesstime`,
													`pageurl`,
													`clickid`,
													`msisdn`,
													`advertclickid`,
													`pubid`,
													`advertiserid`,
													`operator`,
													`referrer`,
													`useragent`,
													`ip`,
													`xforward`)
													select 
													`accesstime`,
													`pageurl`,
													`clickid`,
													'".$msisdn."',
													`advertclickid`,
													`pubid`,
													`advertiserid`,
													'zain',
													`referrer`,
													`useragent`,
													`ip`,
													`xforward` from ".$db.".`userlog` where clickid = '".$clickid."' ";
						$res_activeuserlog=$conn->query($insert_activeuserlog);
						
						$insert = "INSERT INTO ".$db.".`subscriber`
							(
							`clickid`,
							`pubid`,
							`msisdn`,
							`advertiserid`,
							`operator`,
							`channel`,
							`charging_mode`,
							`status`,
							`error`,
							`amount`,
							`subscriptionstartdate`,
							`subscriptionenddate`,
							`sameday`,
							`response`,
							`subid`,
							`refid`,
							`transactionid`)
							VALUES
							(
							'".$clickid."',
							'".$pubid."',
							'".$msisdn."',
							'".$advertiserid."',
							'zain',
							'WEB',
							'cg',
							'1',
							'0',
							'0',
							'".$subscriptionstartdate."',
							'".$subscriptionstartdate."',
							'".$sameday."',
							'".$pageurl."',
							'0',
							'0',
							'0');
							";
							$res_insert=$conn->query($insert);
	
		}
		else{
			$flow="pin";

		}
		
		
	}
	
	
	$reason_code="fail";
}

$insert_callbackrequest="INSERT INTO ".$db.".`callbackrequests`
						(
						`requesttime`,
						`clickid`,
						`advertiserid`,
						`msisdn`,
						`status`,
						`operator`,
						`response`)
						VALUES
						(
						'".DATE('Y-m-d H:i:s')."',
						'".$clickid."',
						'".$advertiserid."',
						'".$msisdn."',
						'".$reason_code."',
						'zain',
						'".$pageurl."');
						"; 
$res_callbackrequest=$conn->query($insert_callbackrequest);


	
?>

<!DOCTYPE html>
<html>
<head>
   
    <meta charset="utf-8">
    <meta content="telephone=no" name="format-detection">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0, minimum-scale=1, maximum-scale=1, minimal-ui">
    <title data-c-role="title">GameStation</title> 
<link href="css/style.css" rel="stylesheet" type="text/css"></head>

<body>
   
	
	<?php 
	
	if($success == 1 || $success == '1')
	{
	?>
		<center><p style="font-size: 40px;color: #fff;">Congratulations!</p></center>
		<center><p style="font-size: 25px;color: #fff;">You have been successfully subscribed.</p></center>
		<center><p style="font-size: 25px;color: #fff;">For Content Access, <a href="http://funworld.mobi/svs/iqzain/content/index?msisdn=<?php echo $msisdn; ?>" style="font-size: 25px;color: #fff;">Click Here</a></p> </center>
	<?php
	}
	else{
	?>
	
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
			<?php
			if($flow =='pin')
			{
				?>
				<form method="post" id="number-entry" >
		
					<img src="images/gameStation.png" style=" height: 30px; width: 200px;" alt="" class="logo">
					
					<div class="eng">
						<p>Enter OTP</p>
					</div>
					<div class="arb" style="display:none;">
						<p>أدخل كلمة المرور لمرة واحدة</p>
					</div>
					<input type="text" name="pin" id="pin" value="<?php echo $pin; ?>" style="width:100px;text-align:center;" placeholder="XXXX">
					<input type="text" name="clickid" value="<?php echo $clickid; ?>" hidden  >
					<input type="text" name="msisdn" value="<?php echo $msisdn; ?>" hidden  >
					<input type="text" name="pubid" value="<?php echo $pubid; ?>" hidden  >
					<input type="text" name="advertiserid" value="<?php echo $advertiserid; ?>" hidden  >
					
					</br>
					
							
					<div class="eng">
						<center><input type="submit" name ="submit1" value = "CONFIRM" id="button1"  style="padding:5px;height:40px;width:180px;font-size:18px; background:#f57e42; color:#fff; border:none;"> </center> 
						<div class="price-point" >300 dinars/daily.</div> 
					</div>
					
					<div class="arb" style="display:none;">
						<center><input type="submit" name ="submit1" value = "تأكيد" id="button1"  style="padding:5px;height:40px;width:180px;font-size:18px; background:#f57e42; color:#fff; border:none;"> 
						<div class="price-point" >300 دينار/يومياً.</div> 
					</div>
    
				</form>
			
			<?php
			}
			elseif($flow =='success')
			{
			?>
			
			<form id="number-entry" >
				<img src="images/gameStation.png" style=" height: 30px; width: 200px;" alt="" class="logo">
				<div class="eng">
					<p  style="font-size:25px;"><strong>SUBSCRIBED SUCCESSFULLY!</strong></p>
					<p  style="font-size:14px;"><strong>For content access <a href="https://funworld.mobi/svs/iqzain/content/index?msisdn=<?php echo $msisdn; ?>" style="color: white;font-size: 18px;">Click Here</a></strong></p>
				</div>
				<div class="arb" style="display:none;">
					<p  style="font-size:25px;"><strong>تم الاشتراك بنجاح</strong></p>
						<p  style="font-size:14px;"><strong>للوصول إلى المحتوى <a href="https://funworld.mobi/svs/iqzain/content/index?msisdn=<?php echo $msisdn; ?>" style="color: white;font-size: 18px;">انقر هنا</a></strong></p>
				</div>
               
             </form>  
               
			   
       
			<?php
			}
			else
			{
			?>
				
				<form method="post" id="number-entry" >
		
					<img src="images/gameStation.png" style=" height: 30px; width: 200px;" alt="" class="logo">
					
					<div class="eng">
						<p>Enter Mobile Number</p>
					</div>
					<div class="arb" style="display:none;">
						<p>أدخل رقم الجوال</p>
					</div>
					<span style="margin-left:-46px;font-size:18px;">+964<span> <input type="text" name="msisdn" id="msisdn" value="<?php  echo $msisdn ; ?>" style="width:164px;"  placeholder="">
				   
					<input type="text" name="clickid" value="<?php echo $clickid; ?>" hidden  >
					<input type="text" name="pubid" value="<?php echo $pubid; ?>" hidden  >
					<input type="text" name="advertiserid" value="<?php echo $advertiserid; ?>" hidden  >
				  
					</br>
					
			
					<div class="eng">
						<center><input type="submit" name ="submit" value = "SUBSCRIBE"   style="padding:5px;height:40px;width:180px;font-size:18px; background:#f57e42; color:#fff; border:none;"> </center> 
						
						<div class="price-point" >300 dinars/daily.</div> 
					</div>
					
					<div class="arb" style="display:none;">
					
						<center><input type="submit" name ="submit" value = "إشترك"   style="padding:5px;height:40px;width:180px;font-size:18px; background:#f57e42; color:#fff; border:none;"> </center>
						
						<div class="price-point" >300 دينار/يومياً.</div> 
					</div>
              
       
				</form>
		
				<?php
			}
			?>
  
           
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
            <img src="images/gameStation.png" style=" height: 42px; width: 300px;" alt="" class="logo">
          
        </div>

      
		
		<div class="footer-disclaimer">
       <!--  <a href="?lang=ar" id="language"><img src="images/16_html_language-qa-ar.png" alt=""></a>-->
            <div data-x-role="disclaimer" class="disclaimer">
			
				</br>
				<p style="font-size:14px;text-align:center;"><strong><span id="english" >ENGLISH</span>  |  <span id="arabic" >عربي</span></strong></p>
				</br>
				
				<div class="eng">
				<p style="font-size:14px;text-align:center;">Welcome, to subscribe in Game Station send a text message containing 13 to 3999 or by pressing the button above.</p>
				<p style="font-size:14px;text-align:center;">For new subscribers, the first day is free.</p>
				<p style="font-size:14px;text-align:center;">After the end of the free period, an amount of 300 Iraqi dinars will be deducted daily. </p>
				<p style="font-size:14px;text-align:center;">To unsubscribe, send 013 to 3999 for free</p>
				</div>
				
				
				<div class="arb" style="display:none;">
				<p style="font-size:14px;text-align:center;">مرحبًا بك! للاشتراك، يُرجى إرسال رسالة نصية تحتوي على رقم 13 إلى 3999 أو الضغط على الزر أعلاه. للمشتركين الجدد، اليوم الأول مجاني. بعد نهاية الفترة المجانية، سيتم خصم مبلغ 300 دينار عراقي يومياً. لإلغاء الاشتراك، يُرجى إرسال رقم 013 إلى 3999 مجانًا.</p>
				</div>
            <!--   <p><br><a href="http://live.vipgames.me/#/general-terms" target="_blank">Terms &amp; Conditions</a></p>
            --></div>
        </div>
		
	</div>



		
	<?php
	}

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
</script>