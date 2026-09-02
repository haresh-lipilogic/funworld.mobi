<?php 
include("includes/connection.php");

	error_reporting(0);

	$pageurl='http://'.$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; 
	
	$clickid=$_GET['clickid']; 
	
	$msisdn=$_GET['e'];
	$secretkey="URJKVOKJAU26IUDU";
	
	$msisdn = base64_decode($msisdn);
	$msisdn = openssl_decrypt($msisdn, 'AES-128-ECB', $secretkey,  OPENSSL_RAW_DATA ); 
	$a=explode("-",$msisdn);
echo	$msisdn=$a[1]; exit;  // Actual MSISDN is HERE
	$heid = $_GET['heId'];
	
	$reason_code=$_GET['ec'];
	if($reason_code == '0')
	{
		$flow="HE";
		
	}
	else
	{
		
	}

	$sql_clickid="select * from ".$db.".userlog where clickid = '".$clickid."' order by userlogid desc limit 1";
	$res_clickid = $conn->query($sql_clickid);
	$row_clickid=$res_clickid->fetch();
	$advertiserid=$row_clickid['advertiserid'];
	$pubid=$row_clickid['pubid'];
	$advertclickid=$row_clickid['advertclickid'];
	$accesstime=$row_clickid['accesstime'];
	
	
	$subscriptionstartdate=date('Y-m-d H:i:s');
	$subscriptionenddate=date('Y-m-d H:i:s',strtotime($subscriptionstartdate. ' + 7 days'));

	if(date('Y-m-d',strtotime($accesstime)) == date('Y-m-d',strtotime($subscriptionstartdate)))
	{
		$sameday=1;
	}
	else
	{
		$sameday=0;
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
							'zong',
							'".$pageurl."');
							"; 
	$res_callbackrequest=$conn->query($insert_callbackrequest);
	
	
	if(isset($_POST['submit'])) // PIN Submit
	{
		$flow="pin";
		$clickid = $_POST['clickid'];
		$pubid = $_POST['pubid'];
		$advertiserid = $_POST['advertiserid'];
		$advertclickid = $_POST['advertclickid'];
		$msisdn = $_POST['msisdn']; 
		$heid = $_POST['heid'];
		
		
		$pin=RAND(2,8)."".RAND(10,99)."".RAND(3,7); 
		
		
		$curl3 = curl_init();

		curl_setopt_array($curl3, array(
		  CURLOPT_URL => 'https://dot-jo.biz/lb2/PartnersMTSMS/',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'POST',
		  CURLOPT_POSTFIELDS =>'{
			"partnerId": "svmobi-201850",
			"opId": 27,
			"serviceId": "gamebar_service",
			"msisdn": "'.$msisdn.'",
			"sender":"3557",
			"text": "Dear Customer, Please enter the following PIN code '.$pin.'"
		}',
		  CURLOPT_HTTPHEADER => array(
		  	'Authorization: Basic c3Ztb2JpLTk5Nzo1NTFTVFI5OQ==',
			'Accept: application/json',
			'Content-Type: application/json'
		  ),
		));

		$otpresponse = curl_exec($curl3);
		curl_close($curl3);
		
		
		$insert_pin="INSERT INTO ".$db.".`pinsent`
					(
					`clickid`,
					`msisdn`,
					`pin`,
					`pindatetime`,
					`pinresponse`)
					VALUES
					(
					'".$clickid."',
					'".$msisdn."',
					'".$pin."',
					'".DATE('Y-m-d H:i:s')."',
					'".$otpresponse."');
					";
		$res_pin=$conn->query($insert_pin);
		
		
	}
	
	if(isset($_POST['submit1'])) // PIN Submit
	{
		
			/*
			echo $clickid = $_POST['clickid']."</br>";
			echo $pubid = $_POST['pubid']."</br>";
			echo $advertiserid = $_POST['advertiserid']."</br>";
			echo $advertclickid = $_POST['advertclickid']."</br>";
			echo $msisdn = $_POST['msisdn']."</br>";
			echo $heid = $_POST['heid']."</br>"; 
			*/
			
			$clickid = $_POST['clickid'];
			$pubid = $_POST['pubid'];
			$advertiserid = $_POST['advertiserid'];
			$advertclickid = $_POST['advertclickid'];
			$msisdn = $_POST['msisdn']; 
			$heid = urlencode($_POST['heid']); 
			
			
			$curl = curl_init();

			curl_setopt_array($curl, array(
			  CURLOPT_URL => 'https://dot-jo.biz/lb2/partners-subscription-notification',
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => '',
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 0,
			  CURLOPT_FOLLOWLOCATION => true,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => 'POST',
			  CURLOPT_POSTFIELDS =>'{
			"msisdn" : "'.$msisdn.'",
			"serviceId" : "gamebar_service",
			"opId" : "27",
			"action" : "1",
			"heId" : "'.$heid.'"
			}',
			  CURLOPT_HTTPHEADER => array(
				'PartnerId: svmobi-201850',
				'Authorization: Basic c3Ztb2JpLTk5Nzo1NTFTVFI5OQ==',
				'Content-Type: application/json'
			  ),
			));



			$response = curl_exec($curl);
			//echo "Subscription Notification API: " .$response."</br> </br>";
			$result = str_replace("'","", $response); 
			curl_close($curl);
			$data=json_decode($response,true);
			$errorcode=$data['errorCode'];	 
			$dotTransId=$data['dotTransId'];
			
			
			
			if($errorcode == '1000' || $errorcode == '0' ) 
			{
				
				$charging_mode ="cg";
				$amount="0";
				
			$insert_subscribe="  INSERT INTO ".$db.".`subscriber`
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
										('".$clickid."',
										'".$pubid."',				
										'".$msisdn."',
										'".$advertiserid."',
										'zong',
										'WAP',
										'".$charging_mode."',
										'1',
										'".$errorcode."',
										'".$amount."',
										'".$subscriptionstartdate."',
										'".$subscriptionenddate."',
										'1',
										'Sub Notif API ".$response."',
										'0',
										'0',
										'".$dotTransId."');
										";
																 
						$res_subscriber=$conn->query($insert_subscribe);

				//	echo "</br>";	
				//	echo "</br>";	
					
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
													'ooredoo',
													`referrer`,
													`useragent`,
													`ip`,
													`xforward` from ".$db.".`userlog` where clickid = '".$clickid."' ";
						$res_activeuserlog=$conn->query($insert_activeuserlog);
											
				
				// Charging/Billing API
				$curl1 = curl_init();

				curl_setopt_array($curl1, array(
				  CURLOPT_URL => 'https://dot-jo.biz/lb2/PartnersDirectBilling/',
				  CURLOPT_RETURNTRANSFER => true,
				  CURLOPT_ENCODING => '',
				  CURLOPT_MAXREDIRS => 10,
				  CURLOPT_TIMEOUT => 0,
				  CURLOPT_FOLLOWLOCATION => true,
				  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				  CURLOPT_CUSTOMREQUEST => 'POST',
				  CURLOPT_POSTFIELDS =>'{
					"partnerTransId": "'.$clickid.'",
					"opId": 27,
					"msisdn": "'.$msisdn.'",
					"amount":"20",
					"serviceId": "gamebar_service",
					"extraField1":"Dear Customer, We have deducting the fees for Gamebar Service  by 20 PKR"
				}',
				  CURLOPT_HTTPHEADER => array(
					'PartnerId: svmobi-201850',
					'Authorization: Basic c3Ztb2JpLTk5Nzo1NTFTVFI5OQ==',
					'Accept: application/json',
					'Content-Type: application/json'
				  ),
				));

				$response1 = curl_exec($curl1);
			//	echo "Billing API: " .$response1."</br> </br>";
				curl_close($curl1);
				$data1 = json_decode($response1,true);
				$resultcode=$data1['resultCode'];  
				$billdotTransId=$data1['dotTransId'];
				
				
				if($resultcode == '1000' || $resultcode == '0')
				{	
					
					$charging_mode ="act";
					$amount="20";
				
					// Sending MT SMS
			
					$curl2 = curl_init();

					curl_setopt_array($curl2, array(
					  CURLOPT_URL => 'https://dot-jo.biz/lb2/PartnersMTSMS/',
					  CURLOPT_RETURNTRANSFER => true,
					  CURLOPT_ENCODING => '',
					  CURLOPT_MAXREDIRS => 10,
					  CURLOPT_TIMEOUT => 0,
					  CURLOPT_FOLLOWLOCATION => true,
					  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
					  CURLOPT_CUSTOMREQUEST => 'POST',
					  CURLOPT_POSTFIELDS =>'{
						"partnerId": "svmobi-201850",
						"opId": 27,
						"serviceId": "gamebar_service",
						"msisdn": "'.$msisdn.'",
						"sender":"3557",
						"text": "Dear Customer, We have deducting the fees for Gamebar Service  by 20 PKR"
					}',
					  CURLOPT_HTTPHEADER => array(
						'Authorization: Basic c3Ztb2JpLTk5Nzo1NTFTVFI5OQ==',
						'Accept: application/json',
						'Content-Type: application/json'
					  ),
					));

					$mtresponse = curl_exec($curl2);
					curl_close($curl2);


				}
				elseif($resultcode == '1004' )
				{
					$charging_mode = "low";
				}
				elseif($resultcode == '1013' )
				{
					$charging_mode = "dct";
				}
				else
				{
					$charging_mode = "fail";
				}	
					
					$insert_subscribe="  INSERT INTO ".$db.".`subscriber`
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
										('".$clickid."',
										'".$pubid."',				
										'".$msisdn."',
										'".$advertiserid."',
										'zong',
										'WAP',
										'".$charging_mode."',
										'2',
										'".$resultcode."',
										'".$amount."',
										'".$subscriptionstartdate."',
										'".$subscriptionenddate."',
										'1',
										'Billing API ".$response1."',
										'0',
										'0',
										'".$billdotTransId."');
										";
					//echo "</br>";	
					//echo "</br>";						
					$res_subscriber=$conn->query($insert_subscribe);

					
				$insert_billing="INSERT INTO ".$db.".`billing`
								(
								`clickid`,
								`msisdn`,
								`billdatetime`,
								`resultcode`,
								`response`,)
								`mtresponse`)
								VALUES
								(
								'".$clickid."',
								'".$msisdn."',
								'".DATE('Y-m-d H:i:s')."',
							'".$resultcode."',
							'".$response1."',);
							'".$mtresponse."');
							";
				$res_billing=$conn->query($insert_billing);
				

			}
			else{
				
				$status="failed";
				
				$charging_mode ="fail";
				$amount="0";
				$insert_subscribe="  INSERT INTO ".$db.".`subscriber`
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
										('".$clickid."',
										'".$pubid."',				
										'".$msisdn."',
										'".$advertiserid."',
										'zong',
										'WAP',
										'".$charging_mode."',
										'1',
										'".$errorcode."',
										'".$amount."',
										'".$subscriptionstartdate."',
										'".$subscriptionenddate."',
										'1',
										'Sub Notif API ".$response."',
										'0',
										'0',
										'".$dotTransId."');
										";
																 
						$res_subscriber=$conn->query($insert_subscribe);
			
			}
		
			
			
			
			if($charging_mode == 'act')
			{
				$flow="success";
				
				$select_callback="select count(*) c from ".$db.".advertcallback where clickid = '".$clickid."' ";
				$res_callback=$conn->query($select_callback);
				$row_callback=$res_callback->fetch();
				
				
				if($row_callback['c'] > 0)
				{
				
				}
				else{
			
					//Advertiser ni url fetch karva 
					$sql_adv_url="select * from ".$commondb.".advertiser where advertiserid = '".$advertiserid."' ";   
					$res_adv_url=$conn->query($sql_adv_url);
					$row_adv_url=$res_adv_url->fetch();
					$url=$row_adv_url['callbackurl']; 
					$main_url=$row_adv_url['callbackurl']; 

					$aa=0;

					while($aa <= 20)
					{
						
							$first=strpos($url,'[');
							$last=strpos($url,']');
							
							$param_value=substr($url,strpos($url,'[')+1,(strpos($url,']')-strpos($url,'['))-1);	
							
							if($param_value=='clickid')
							{
								$replace_value=$advertclickid;
							}
							elseif($param_value == 'pubid')
							{
								$replace_value=$pubid;
							}
							else{
								$param_value=$param_value; 
							}
								
							$edited_url=str_replace('['.$param_value.']',$replace_value,$main_url); 
							
							$main_url=$edited_url;
							
							$url= substr($url,$last+1); 

						$aa=$aa	+1;
					}
				
				
						
						
							if( $sameday == 1 || $sameday == '1' ) // same day activation's clickid.. 100% callback jase.. pure pura callback jase.. koi cut nai thay..
							{	
									$sql_callback_counter="SELECT 
													act_callback_counter, act_stop
												FROM
													".$db.".advertiser_callback_counter_tbl
														INNER JOIN
													".$db.".advertmanage ON advertiser_callback_counter_tbl.advertiserid = advertmanage.advertiserid
												WHERE
													advertmanage.advertiserid = '".$advertiserid."'";   
								$res_callback_counter=$conn->query($sql_callback_counter);
								$row_callback_counter=$res_callback_counter->fetch();
								$callback_counter=$row_callback_counter['act_callback_counter'];  
								$stopcallback_count=($row_callback_counter['act_stop']/10)*2;  
							
								$select_blockcounter="select * from ".$commondb.".callbacksent_counter where counter = '".$stopcallback_count."' ;"; 
										$res_blockcounter=$conn->query($select_blockcounter);
										$row_blockcounter=$res_blockcounter->fetch();

												
								if(strpos($row_blockcounter['blockcounter'],",$callback_counter,") === false)
								{
									
									$a=file_get_contents($main_url); 
									//$a="success";
									$callback_counter =$callback_counter-1;
									
									if($callback_counter == '0')
									{
										$update_counter="UPDATE ".$db.".advertiser_callback_counter_tbl set act_callback_counter = '20' where advertiserid ='".$advertiserid."' "; 
										$res_counter=$conn->query($update_counter);
									}
									else
									{
										$update_counter="UPDATE ".$db.".advertiser_callback_counter_tbl set act_callback_counter = '".$callback_counter."' where advertiserid ='".$advertiserid."' "; 
										$res_counter=$conn->query($update_counter);
									}
								}
							
								else
								{
								
									$a='stop'; 
									$callback_counter =$callback_counter-1;
									if($callback_counter == '0')
									{
										$update_counter="UPDATE ".$db.".advertiser_callback_counter_tbl set act_callback_counter = '20' where advertiserid ='".$advertiserid."' ";
										$res_counter=$conn->query($update_counter);
									}
									else
									{
										$update_counter="UPDATE ".$db.".advertiser_callback_counter_tbl set act_callback_counter = '".$callback_counter."' where advertiserid ='".$advertiserid."' ";
										$res_counter=$conn->query($update_counter);
									}
								}
							}
							else // SPILL OVER mate..  activation's clickid aaj ni nai hoy etle callback percentage nakki karel hase e rite jase. 
							{
								
								$sql_callback_counter="SELECT 
													spo_callback_counter, spo_stop
												FROM
													".$db.".advertiser_callback_counter_tbl
														INNER JOIN
													".$db.".advertmanage ON advertiser_callback_counter_tbl.advertiserid = advertmanage.advertiserid
												WHERE
													advertmanage.advertiserid = '".$advertiserid."'"; 
								$res_callback_counter=$conn->query($sql_callback_counter);
								$row_callback_counter=$res_callback_counter->fetch();
								$callback_counter=$row_callback_counter['spo_callback_counter'];
								$stopcallback_count=($row_callback_counter['spo_stop']/10)*2;
							
								$select_blockcounter="select * from ".$commondb.".callbacksent_counter where counter = '".$stopcallback_count."' ;"; 
										$res_blockcounter=$conn->query($select_blockcounter);
										$row_blockcounter=$res_blockcounter->fetch();

												
								if(strpos($row_blockcounter['blockcounter'],",$callback_counter,") === false)
								{
									
									$a=file_get_contents($edited_url);
									//$a="success";
									$callback_counter =$callback_counter-1;
									
									if($callback_counter == '0')
									{
										$update_counter="UPDATE ".$db.".advertiser_callback_counter_tbl set spo_callback_counter = '20' where advertiserid ='".$advertiserid."' ";
										$res_counter=$conn->query($update_counter);
									}
									else
									{
										$update_counter="UPDATE ".$db.".advertiser_callback_counter_tbl set spo_callback_counter = '".$callback_counter."' where advertiserid ='".$advertiserid."' ";
										$res_counter=$conn->query($update_counter);
									}
								}
							
								else
								{
								
									$a='stop'; 
									$callback_counter =$callback_counter-1;
									if($callback_counter == '0')
									{
										$update_counter="UPDATE ".$db.".advertiser_callback_counter_tbl set spo_callback_counter = '20' where advertiserid ='".$advertiserid."' ";
										$res_counter=$conn->query($update_counter);
									}
									else
									{
										$update_counter="UPDATE ".$db.".advertiser_callback_counter_tbl set spo_callback_counter = '".$callback_counter."' where advertiserid ='".$advertiserid."' ";
										$res_counter=$conn->query($update_counter);
									}
								}
							
							
							}

					// Advertiser callbackresponse ma entry padva.. je callback apne advertiser ne mokaliye
					$insert_advertcallback="insert into ".$db.".advertcallback (advertcallbackurl,operator,clickid,msisdn,advertclickid,pubid,advertdatetime,action,advertiserid,advertresponse) values
					('".$edited_url."','".$operator."','".$clickid."','".$msisdn."','".$advertclickid."','".$pubid."','".$subscriptionstartdate."','".$charging_mode."','".$advertiserid."','".$a."')";  
					$res_advertcallback=$conn->query($insert_advertcallback) ;
				}
			 
			}
			else
			{
				$flow="pin";
			}
	}

?>
<!DOCTYPE html>
<html>
<head>
   
    <meta charset="utf-8">
    <meta content="telephone=no" name="format-detection">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0, minimum-scale=1, maximum-scale=1, minimal-ui">
    <title data-c-role="title"><?php echo $servicename; ?></title> 
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
			<?php
			if($flow =='pin')
			{
				?>
				<form method="post" id="number-entry" >
		
				<img src="images/gamebar.png" style=" height: 30px; width: 120px;" alt="" class="logo">
				<p  style="font-size:14px;"><strong>Price: PKR 20/Week (VAT & Excite tax included)</strong></p>
				
                <input type="text" name="pin" id="pin" value="<?php echo $pin; ?>" style="width:100px;text-align:center;" >
                <input type="text" name="clickid" value="<?php echo $clickid; ?>" hidden  >
                <input type="text" name="heid" value="<?php echo $heid; ?>" hidden  >
                <input type="text" name="msisdn" value="<?php echo $msisdn; ?>" hidden  >
                <input type="text" name="pubid" value="<?php echo $pubid; ?>" hidden  >
                <input type="text" name="advertiserid" value="<?php echo $advertiserid; ?>" hidden  >
                <input type="text" name="advertclickid" value="<?php echo $advertclickid; ?>" hidden  >
				</br>
				
				<center><input type="submit" name ="submit1" value = "SUBSCRIBE"   style="padding:5px;height:40px;width:180px;font-size:18px; background:#f57e42; color:#fff; border:none;"> </center> 
              
               
       
            </form>
			
				<?php
			}
			elseif($flow =='success')
			{
				?>
				<form method="post" id="number-entry" >
		
				<img src="images/gamebar.png" style=" height: 30px; width: 120px;" alt="" class="logo">
				<p  style="font-size:14px;"><strong>SUBSCRIBED SUCCESSFULLY!</strong></p>
				
               
               
       
            </form>
				<?php
			}
			else
			{
				?>
				
				<form method="post" id="number-entry" >
		
				<img src="images/gamebar.png" style=" height: 30px; width: 120px;" alt="" class="logo">
				<p  style="font-size:14px;"><strong>Price: PKR 20/Week (VAT & Excite tax included)</strong></p>
				
               <input type="text" name="msisdn" id="msisdn" value="<?php echo $msisdn; ?>" style="width:150px;text-align:center;" >
                <input type="text" name="clickid" value="<?php echo $clickid; ?>" hidden  >
                <input type="text" name="heid" value="<?php echo $heid; ?>" hidden  >
               
                <input type="text" name="pubid" value="<?php echo $pubid; ?>" hidden  >
                <input type="text" name="advertiserid" value="<?php echo $advertiserid; ?>" hidden  >
                <input type="text" name="advertclickid" value="<?php echo $advertclickid; ?>" hidden  >
				</br>
				
				<center><input type="submit" name ="submit" value = "SUBSCRIBE"   style="padding:5px;height:40px;width:180px;font-size:18px; background:#f57e42; color:#fff; border:none;"> </center> 
              
               
       
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
            <img src="images/gamebar.png" style=" height: 42px; width: 209px;" alt="" class="logo">
            <span class="tagline" style="font-size:14px;">Unlimited Mobile Games</span>
        </div>

        <div class="footer-disclaimer">
       <!--  <a href="?lang=ar" id="language"><img src="images/16_html_language-qa-ar.png" alt=""></a>-->
            <div data-x-role="disclaimer" class="disclaimer">
                    <ul>
						<li>
							By subscribing to Gamebar service , you are accepting all Terms &amp; Conditions of the service &amp; authorize <span id="lbloprtr">Zong</span> to share your mobile number with our partner SVMobi, who manages this subcription service
						</li>
						<li>
							Subscription would be automatically renewed and your account would be debited with <?php echo $pricemsg; ?> charging cycle until you unsubscribe.
						</li>                        
                        <li>
							To unsubscribe, send <strong>UNSUB PLCO</strong> to <strong>24884</strong>
                        </li>
						                                      
						<li>
							Data charges apply for browsing and downloading contents on this portal
						</li>
                        <li>
							For any inquires please contact us on <a href="mailto:customer.care@svmobi.com" style="text-align: left; color: blue; display: inline;">customer.care@svmobi.com</a>
                        </li>						
                    </ul>
                </div>
        </div>
		
		


<?php 
include("footer.php");
?>