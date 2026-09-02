<?php 
include("includes/connection.php");

	error_reporting(0);

	$pageurl='http://'.$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; 
	
	$clickid=$_GET['clickid']; 
	if($clickid == '')
	{
		$clickid=$_GET['partner_txid']; 
	}
	
	
	$msisdn=$_GET['msisdn'];
	$lpid = $_GET['lpTransId'];
	$reason_code=$_GET['reason_code'];


	$sql_clickid="select * from ".$db.".userlog where clickid = '".$clickid."' order by userlogid desc limit 1";
	$res_clickid = $conn->query($sql_clickid);
	$row_clickid=$res_clickid->fetch();
	$advertiserid=$row_clickid['advertiserid'];
	$pubid=$row_clickid['pubid'];
	$advertclickid=$row_clickid['advertclickid'];
	$accesstime=$row_clickid['accesstime'];
	
	
	$subscriptionstartdate=date('Y-m-d H:i:s');
	$subscriptionenddate=date('Y-m-d H:i:s',strtotime($subscriptionstartdate. ' + 1 days'));

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
							'movitel',
							'".$pageurl."');
							"; 
	$res_callbackrequest=$conn->query($insert_callbackrequest);
	
	$subscriber_entry="0";
	
	if($reason_code == 0) 
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
									'movitel',
									'WAP',
									'".$charging_mode."',
									'1',
									'".$reason_code."',
									'".$amount."',
									'".$subscriptionstartdate."',
									'".$subscriptionenddate."',
									'1',
									'".$pageurl."',
									'0',
									'0',
									'".$lpid."');
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
				"opId": 99,
				"msisdn": "'.$msisdn.'",
				"amount":"7",
				"serviceId": "gamestation_service",
				"extraField1":"Você assinou o serviço GameStation. Comece a jogar clicando em http://funworld.mobi/dot/mz/content/index por 7 MZN/dia."
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
				$amount="7";
			}
			elseif($resultcode == '1004' )
			{
				$charging_mode = "low";
				
				
				$sql_lb="select count(msisdn) c from ".$db.".lowbalance where msisdn = '".$msisdn."' ";
				$res_lb=$conn->query($sql_lb);
				$row_lb=$res_lb->fetch();
				
				if($row_lb['c'] > 0)
				{
					$subscriber_entry="1"; //subscriber table ma entry nai pade 
					
					$update_lb="update ".$db.".lowbalance set lbdatetime='".DATE('Y-m-d H:i:s')."' where msisdn = '".$msisdn."'"; 
					$res_update_lb=$conn->query($update_lb);
				}
				else{
					$subscriber_entry="0"; //subscriber table ma entry padse
					
					$insert_lb="INSERT INTO ".$db.".lowbalance
							(
							`msisdn`,
							`lbdatetime`)
							VALUES
							(
							'".$msisdn."',
							'".DATE('Y-m-d H:i:s')."'
							);
							"; 
					$res_insert_lb=$conn->query($insert_lb);
						
				}
								
			}
			elseif($resultcode == '1013' )
			{
				$charging_mode = "dct";
				
				$delete_lb="DELETE FROM  ".$db.".lowbalance where msisdn = '".$msisdn."' ";
				$res_lp=$conn->query($delete_lb);
			}
			else
			{
				$charging_mode = "fail";
			}	
				
				if($subscriber_entry== '0')
				{
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
									'movitel',
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

				}
				
				
			$insert_billing="INSERT INTO ".$db.".`billing`
							(
							`clickid`,
							`msisdn`,
							`billdatetime`,
							`resultcode`,
							`response`
							)
							VALUES
							(
							'".$clickid."',
							'".$msisdn."',
							'".DATE('Y-m-d H:i:s')."',
						'".$resultcode."',
						'".$response1."');
						";
								
						
			$res_billing=$conn->query($insert_billing);
			

		
		if($charging_mode == 'act')
		{
			
			
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
									
									$sql_count="SELECT count(*) c FROM ".$db.".advertcallback 
											where advertdatetime >= '".date('Y-m-d')." 00:00:00' and advertdatetime <= '".date('Y-m-d')." 23:59:59'
											and advertresponse != 'stop' ";
										
									$res_count=$conn->query($sql_count);
									$row_count=$res_count->fetch();
									
									
									
									
									if($row_count['c'] > 75)
									{
										$a="stop"; 
									}
									else{
										$a=file_get_contents($main_url); 	
									}
									
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
			
		}
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
										'movitel',
										'WAP',
										'".$charging_mode."',
										'1',
										'".$reason_code."',
										'".$amount."',
										'".$subscriptionstartdate."',
										'".$subscriptionenddate."',
										'1',
										'".$pageurl."',
										'0',
										'0',
										'".$lpid."');
										";
																 
						$res_subscriber=$conn->query($insert_subscribe);
	}

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
    <div id="container" class="show-subscribe-button qa-html5">
	
	<?php
	if($charging_mode == 'act' || $charging_mode == 'cg')
	{
	?>
		<center><p style="font-size: 40px;color: #fff;">Parabéns! Agora você está inscrito. </p></center>
	
		<center><p style="font-size: 25px;color: #fff;">Clique e obtenha o conteúdo <a href="http://funworld.mobi/dot/mz/content/index?msisdn=<?php echo $msisdn; ?>" style="color:#fff;background: #493f3f;padding: 7px;">Clique aqui</a></p></center>
		
	
	<?php
	}
	else
	{
	?>
	<center><p style="font-size: 25px;color: #fff;">Desculpe, ocorreram alguns problemas. Tente novamente mais tarde.</p></center>
		
	<?php 
	}
	?>
		
       
	   
		
<?php 
include("footer.php");
?>