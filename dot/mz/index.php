<?php 

include("includes/connection.php");
error_reporting(0);

if(isset($_POST['submit']))
{
	
	
	$msisdn=$_POST['msisdn'];  
	$clickid=$_POST['clickid'];
	$pubid=$_POST['pubid'];
	$advertiserid=$_POST['advertiserid'];
	$advertclickid=$_POST['advertclickid'];
	
	
	$partner_id="svmobi-201850";
	$op_id="99";
	$service_id="gamestation_service";
	$clickid=$_POST['clickid'];
	$rurl="http://funworld.mobi/dot/mz/return";
	$enrurl=urlencode("http://funworld.mobi/dot/mz/return");
	$username="svmobi-997";
	$password="551STR99";
	
	$text = "".$username."-".$partner_id."-".$service_id."-".$op_id."-".$clickid."-".$rurl."-".$password."";
	$digest = hash('sha256', $text);
	
	if($msisdn == '')
	{
		$url="https://dot-jo.biz/operator-consent-page-subscription?partner_id=$partner_id&service_id=$service_id&partner_txid=$clickid&op_id=$op_id&rurl=$enrurl&signature=$digest";  
	}
	else{
		$url="https://dot-jo.biz/operator-consent-page-subscription?partner_id=$partner_id&service_id=$service_id&partner_txid=$clickid&op_id=$op_id&rurl=$enrurl&signature=$digest&msisdn=$msisdn"; 
		
	}
	
	
	
	header("Location: $url"); exit;

}
else
{
	
	
	
	
	// creating clickid
	$mt = microtime(true);
	$mt =  $mt*1000; //microsecs
	$clickid = ((string)$mt*10).rand(1, 99); // Clickid 

	//Pubid
	if($_GET['pubid'] == '')
	{
		$pubid='101010';
	}
	else
	{
		$pubid=$_GET['pubid'];
	}
	
	// Advertiserid
	$advertiserid=$_GET['advid'];
	if($advertiserid == '')
	{
		$advertiserid = "0";
	}
	

		
		$sql_count="SELECT count(distinct clickid) c FROM ".$db.".subscriber 
											where subscriptionstartdate >= '".date('Y-m-d')." 00:00:00' and subscriptionstartdate <= '".date('Y-m-d')." 23:59:59'
											and charging_mode = 'act'  and amount > 0 and sameday = '1' ";
										
		$res_count=$conn->query($sql_count);
		$row_count=$res_count->fetch();
		
		if($advertiserid == '1010')
		{
			
		}
		else{
			if($row_count['c'] > 500)
			{
				$url = "http://mobiads.me/smart/testurl1.php?clickid=".$clickid."&pubid=".$pubid."&ad_id=2&opid=8&cmpid=5"; 
				header("Location: $url"); exit;
				echo "Please pause traffic. Daily cap reached." ; exit;
			}
			else{
			
			}
		
		}
	
	
	
		
	$pageurl='http://'.$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; 

	date_default_timezone_set("Asia/Kolkata");
	$accesstime=date("Y-m-d H:i:s");
	$date=date("Y-m-d");
	//$date="2018-09-25";


	$useragent=strtolower($_SERVER['HTTP_USER_AGENT']);
	if (strpos( $useragent,'android') == true  ) {
		
	}
	elseif(strpos( $useragent,'iphone') == true  )
	{
			//echo "<h2><center>Sorry, Your Iphone device is not compatible with our games.</center></h2>"; exit;
	}
	else{
		
	}

	

	$advertclickid=$_GET['clickid'];
	
	

		
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

	if( 
		(ip2long($ip) >= ip2long('197.218.58.0') && ip2long($ip) <= ip2long('197.218.95.255')) || 
		(ip2long($ip) >= ip2long('197.218.98.0') && ip2long($ip) <= ip2long('197.218.127.255')) 
		
	   )
	{
		$operator="movitel";
		$flow="he";
	}
	else
	{
		$operator="wifi";
		$flow="wifi"; 
	}


	if(count($_COOKIE['clickid_dotmz']) > 0) {
	sleep(2);

		
		$flag=1;
		$cookie_value=$_COOKIE['clickid_dotmz'];  
		
		$sql_data="select * from ".$db.".subscriber WHERE clickid = '".$cookie_value."'  order by subscriberid desc limit 1";     
		$res_data=$conn->query($sql_data); 
		$row_data=$res_data->fetch();
		$status=$row_data['charging_mode']; 
		$msisdn=$row_data['msisdn']; 
		
		if($status == 'act' || $status=='ren' || $status=='low'  )
		{	
			header("Location: http://funworld.mobi/dot/mz/content/index?clickid=$cookie_value&msisdn=$msisdn");
			exit;
		}
		
		else
		{
			$cookie_name = "clickid_dotmz";
			$cookie_value = $clickid;
			setcookie($cookie_name, $cookie_value, strtotime( '+30 days' )); 
			
			if(count($_COOKIE['hit_dotmz']) > 0)
			{			
				if($_COOKIE['hit_dotmz'] > 50)
				{
					header("Location: http://bit.ly/28SN1Lw");
					exit;
				}
				else
				{
					$cookie_hit = "hit_dotmz";
					 $cookie_hit_value=$_COOKIE['hit_dotmz']+1;
					 setcookie($cookie_hit, $cookie_hit_value, strtotime( '+1 days' ));
				}
			}
			else
			{
			
				$cookie_hit = "hit_dotmz";
				$cookie_hit_value = 1;
				setcookie($cookie_hit, $cookie_hit_value, strtotime( '+1 days' ));
				 
			}
		}

	} 
	else 
	{
		$flag=0;
		//echo "Cookies are enabled.";
		$cookie_name = "clickid_dotmz";
		$cookie_value = $clickid;
		setcookie($cookie_name, $cookie_value, strtotime( '+20 days' )); 
		
			if(count($_COOKIE['hit_dotmz']) > 0)
			{						
				if($_COOKIE['hit_dotmz'] > 50)
				{
					header("Location: http://bit.ly/28SN1Lw");
					exit;
				}
				else
				{
					$cookie_hit = "hit_dotmz";
					 $cookie_hit_value=$_COOKIE['hit_dotmz']+1;
					 setcookie($cookie_hit, $cookie_hit_value, strtotime( '+1 days' ));
				}
			}
			else
			{
			
				$cookie_hit = "hit_dotmz";
				$cookie_hit_value = 1;
				setcookie($cookie_hit, $cookie_hit_value, strtotime( '+1 days' ));
				 
			}
	}
	
	
	
	
	$insert_userlog="call ".$db.".insert_userlog('".$accesstime."','".$pageurl."','".$clickid."','".$advertclickid."','".$pubid."',
	'".$advertiserid."','".$operator."','".$referrer."','".$useragent."','".$ip1."','".$xforward."','".$xforwardwith."')"; 
	$res_userlog=$conn->query($insert_userlog); 
	
		
			
}


?>
<!DOCTYPE html>
<html>
<head>
   
    <meta charset="utf-8">
    <meta content="telephone=no" name="format-detection">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0, minimum-scale=1, maximum-scale=1, minimal-ui">
    <title data-c-role="title">GameStation</title> 
	<link href="css/style.css" rel="stylesheet" type="text/css">


	
	
	
</head>

<body onpageshow="myFunction()">
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
			
            <form method="post" id="number-entry" >
		
				<img src="images/gameStation.png" style=" height: 17px; width: 120px;" alt="" class="logo">
				<p  style="font-size:14px;"><strong>7 MZN/dia (IVA incluÃ­do)</strong></p>
				
				<?php
				if($flow =='he')
				{	
				}
				else{
				?>
					 <input type="text" name="msisdn" id="msisdn"  style="width:180px" >
				<?php
					
				}
				?>
               
                <input type="text" name="clickid" value="<?php echo $clickid; ?>" hidden  >
                <input type="text" name="pubid" value="<?php echo $pubid; ?>" hidden  >
                <input type="text" name="advertiserid" value="<?php echo $advertiserid; ?>" hidden  >
                <input type="text" name="advertclickid" value="<?php echo $advertclickid; ?>" hidden  >
				</br>
				
				<center><input type="submit" name ="submit" value = "Se inscrever"   style="padding:5px;height:40px;width:180px;font-size:18px; background:#f57e42; color:#fff; border:none;"> </center> 
              
               
       
            </form>
			

            
           
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
            <img src="images/gameStation.png" style=" height: 30px; width: 200px;" alt="" class="logo">
           
        </div>

       <div class="footer-disclaimer">
       <!--  <a href="?lang=ar" id="language"><img src="images/16_html_language-qa-ar.png" alt=""></a>-->
            <div data-x-role="disclaimer" class="disclaimer">
                    <ul>
						<li>
							Ao assinar o serviço GameStation, você aceita todos os Termos e Condições do serviço e autoriza a Movitel a compartilhar seu número de celular com nosso parceiro SVMobi, que gerencia este serviço de assinatura.
						</li>
						<li>
							A assinatura será renovada automaticamente e sua conta será debitada com um ciclo de cobrança de 7MZN/dia até você cancelar a assinatura.
						</li>                        
                        
                        <li>
							Para qualquer dúvida entre em contato conosco em <a href="mailto:customer.care@svmobi.com" style="text-align: left; color: white; font-weight:bold; display: inline;">customer.care@svmobi.com</a>
                        </li>
						<li style="text-align:left;">
							<a href="https://funworld.mobi/dot/mz/tnc" style="text-decoration:none; text-align:left !important; ">Termos e Condições Gerais</a>
						</li>
						<li style="text-align:left;">
							<a href="https://funworld.mobi/dot/mz/content/index" style="text-decoration:none;text-align:left !important; ">Para acesso ao conteúdo</a>
						</li>                        
                        <li style="text-align:left;">
							<a href="https://funworld.mobi/dot/mz/lpunsub?clickid=<?php echo $clickid ?>" style="text-decoration:none;text-align:left !important; ">Deseja cancelar a inscrição?</a>
                        </li>						
                    </ul>
                </div>
        </div>
				
		
		
		
		
<?php 
include("footer.php");
?>