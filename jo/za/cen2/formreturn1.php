<?php
include "includes/dbdetail.php";
include "function.php";
error_reporting(0);
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";



	$dataPOST = trim(file_get_contents('php://input'));

	$array_data = json_decode(json_encode(simplexml_load_string($dataPOST)), true);
 $string_version = implode(',', $array_data);

 
//$data=$array_data['Response'];
//print_r($array_data);



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

$stmt1 = $conn1->prepare("INSERT INTO ".$dblog.".formreturn1 (url,param,receivetime) VALUES (?,?,?)");
				$stmt1->bind_param("sss",$actual_link, $dataPOST,$receivedate);	
				
				
	$stmt1->execute();
	
	$msisdn=$operator=$price='';
	
	
	
	 $clickid=$_GET["clickid"];//exit;

	$identid=$_GET['identid'];
	$timestamp=$_GET['timestamp'];
	$sign=$_GET['sign'];
	
	//HE
	if ($_GET['pin']==0)
	{
		$msisdn=$_GET['msisdn'];
		$clickid=$_GET['clickid'];
		$operator=$_GET['operator'];
		$timestamp=$_GET['timestamp'];
		$sign=$_GET['sign'];
		$identid=$_GET['identid'];
		
		 $url="https://gamebar.mobi/jo/za/cen/formreturn?clickid=".$clickid."&identid=".$identid."&msisdn=".$msisdn."&operator=".$operator."&timestamp=".$timestamp."&sign=".$sign."&confirm=1";
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
							<span data-x-role="subscribe-now">أشترك</span>
							<div class="hotspot subscribe"></div>
						</a>
						<div class="price-point">وصول غير محدود لأكثر من 1000 لعبة HTML</div>
					</div>

					<!-- DOUBLE CONFIRMATION -->
					

					<!-- Click Here -->
					<div id="click-here">
						<!-- <a href="javascript:void(0)" id="subscribe-link" data-c-role="click-here" class="subscribe">Click Here</a>
						<span data-c-role="click-here-message">to subscribe for unlimited Mobile Games.</span> -->
						<img src="images/gamebar.png" alt="" class="logo">
						<span class="tagline">ألعاب جوال غير محدودة</span>
					</div>

					<div class="footer-disclaimer">
				   <!--  <a href="?lang=ar" id="language"><img src="images/16_html_language-qa-ar.png" alt=""></a>-->
					   <center> <div data-x-role="disclaimer" class="disclaimer">
							ملاحظة: سيتم تسجيلك برقم الهاتف <?php echo $_GET['msisdn']; ?> إذا كنت لا تريد المتابعة ، انقر هنا
							<!--Ooredoo users will be charged 30PKR/week. To unsubscribe send STOP to 92534. 
							To use this service you must be 18 years and above, or have received permission from your parents or person authorized to pay your bill.
						 <!--   <p><br><a href="http://live.vipgames.me/#/general-terms" target="_blank">Terms &amp; Conditions</a></p>
						 
						-->
						
						<p>عند الاستخدام الأول ، ستحصل على 3 أيام من الإصدار التجريبي المجاني
رسوم الاشتراك 0.5 دينار لليوم الواحد
لإلغاء الاشتراك ، أرسل 011 إلى 95598
إلغاء</p>
						
						
						
						
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
	}
	
	
	else{
		$url1='https://api.centili.com/payments/v3/subscriptions/init';
		$msisdn=$_GET['msisdn'];
		$clickid=$_GET['clickid'];
		$operator="JO_ZAIN";
		$timestamp=$_GET['timestamp'];
		$sign=$_GET['sign'];
		$identid=$_GET['identid'];
		
		
		$authtoken=authorizationtoken();
	//print_r($authtoken);
	//exit;
	 $accesstoken=$authtoken['access_token'];
	$array['userIdentifier']['country']='jo';
	$array['userIdentifier']['imsi']='';
	$array['userIdentifier']['msisdn']=$msisdn;
	$array['userIdentifier']['operator']=$operator;
	$array['userIdentifier']['identId']=$identid;
	$array['price']='0.5';
	$array['serviceKey']=$apikey;
	$array['clientData']['clientUserId']='';
	$array['clientData']['pageCustomization']['itemName']='';
	$array['clientData']['pageCustomization']['designId']='';
	$array['clientData']['pageCustomization']['language']='';
	$array['clientData']['clientReference']=$clickid;
	$array['clientData']['returnURL']='https://gamebar.mobi/jo/za/cen/pinverify';
	

//print_r($array);
	
	//exit;

$data_string=json_encode($array);
//echo $data_string;
//echo $url;
//exit;
	$header=array(
   "content-type: application/json",
    "Authorization:bearer $accesstoken"
  );
  //print_r($header);exit;
	$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => $url1,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_FOLLOWLOCATION => TRUE,
  CURLOPT_SSL_VERIFYPEER => false,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => $data_string,
  CURLOPT_HTTPHEADER => $header,
  
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  //echo $response;
}
	//print_r($result1);exit;
	
	$stmt1 = $conn1->prepare("INSERT INTO ".$dblog.".requestsub (accesstime,url,request,result) VALUES (?,?,?,?)");
		$stmt1->bind_param("ssss",$receivedate,$url1,$data_string,$response);
		$stmt1->execute();
	
	$response1 = json_decode($response, true);
		
		
		
		
		
		
		
		
		
		
		
		
		 $url="https://gamebar.mobi/jo/za/cen/pinverify";
		
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
						<form id="number-entry" action="<?php echo $url;?>">
							<!--<label data-x-role="enter-number">Enter your mobile number</label>-->
							<input type="number" id="number" maxlength="6" placeholder="ادخل رمز التحقق" name="msisdn" required>
							<input type="hidden" id="clickid" name="clickid" value="<?php echo $clickid;?>" >
							<input type="hidden" id="msisdn1" name="msisdn1" value="<?php echo $msisdn;?>" >
							<input type="hidden" id="operator" name="operator" value="<?php echo $operator;?>" >
							<input type="hidden" id="timestamp" name="timestamp" value="<?php echo $timestamp;?>" >
							<input type="hidden" id="sign" name="sign" value="<?php echo $sign;?>" >
							<input type="hidden" id="identid" name="identid" value="<?php echo $identid;?>" >
							<input type="hidden" id="pin" name="pin" value="1" >
							
							<a href="javascript:void(0)" id="submit-number" class="btn" onclick="document.getElementById('number-entry').submit();">
								<span data-x-role="number-entry-submit">اشترك الان</span>
							</a>
							<div class="price-point">وصول غير محدود لأكثر من 1000 لعبة HTML</div>
					</div>

					<!-- DOUBLE CONFIRMATION -->
					

					<!-- Click Here -->
					<div id="click-here">
						<!-- <a href="javascript:void(0)" id="subscribe-link" data-c-role="click-here" class="subscribe">Click Here</a>
						<span data-c-role="click-here-message">to subscribe for unlimited Mobile Games.</span> -->
						<img src="images/gamebar.png" alt="" class="logo">
						<span class="tagline">ألعاب جوال غير محدودة</span>
					</div>

					<div class="footer-disclaimer">
				   <!--  <a href="?lang=ar" id="language"><img src="images/16_html_language-qa-ar.png" alt=""></a>-->
					   <center> <div data-x-role="disclaimer" class="disclaimer">
							ملاحظة: سيتم تسجيلك برقم الهاتف <?php echo $_GET['msisdn']; ?> إذا كنت لا تريد المتابعة ، انقر هنا
							<!--Ooredoo users will be charged 30PKR/week. To unsubscribe send STOP to 92534. 
							To use this service you must be 18 years and above, or have received permission from your parents or person authorized to pay your bill.
						 <!--   <p><br><a href="http://live.vipgames.me/#/general-terms" target="_blank">Terms &amp; Conditions</a></p>
						 
						-->
						
						<p>عند الاستخدام الأول ، ستحصل على 3 أيام من الإصدار التجريبي المجاني
رسوم الاشتراك 0.5 دينار لليوم الواحد
لإلغاء الاشتراك ، أرسل 011 إلى 95598
إلغاء</p>
						
						<p><br><a href="tncar.html" target="_blank">الأحكام والشروط</a>   <a href="contactar.html" target="_blank">جهات الاتصال</a></p>
						
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
	
	}	
	
	
exit;

?>
<!--
<form id="myForm" action="<?php //echo $url;?>" method="post">
<?php
    /*foreach ($array as $a => $b) {
        echo '<input type="hidden" name="'.htmlentities($a).'" value="'.htmlentities($b).'">';
    }
	*/
?>
</form>
<script type="text/javascript">
   document.getElementById('myForm').submit();
</script>
-->

