<?php
include("includes/connection.php");
error_reporting(0);

ini_set('max_execution_time', 3000);
ini_set('mysql.connect_timeout', 3000);
ini_set('default_socket_timeout', 3000);

$startdate = DATE('Y-m-d')." 00:00:00";
$enddate = DATE('Y-m-d')." 23:59:59";


$insert_cron="INSERT INTO `fashionbardb_joumniah`.`cron`
			(
			`crondatetime`)
			VALUES
			(
			'".DATE('Y-m-d H:i:s')."');";
$res_cron=$conn->query($insert_cron);


$sql_active="
SELECT 
    a2.*
FROM
    (SELECT 
        msisdn
    FROM
        ".$db.".lowbalance
    WHERE
        lbdatetime <= '".$enddate."') a2
        LEFT JOIN
    (SELECT 
        msisdn
    FROM
        ".$db.".billing
    WHERE
        billdatetime >= '".$startdate."'
            AND billdatetime <= '".$enddate."'
           ) b5 ON a2.msisdn = b5.msisdn
WHERE
    b5.msisdn IS NULL

LIMIT 1000;"; 
  
/*

$sql_active="
SELECT 
    a2.*
FROM
    (SELECT 
        msisdn, TIMESTAMPDIFF(MINUTE, lbdatetime, NOW()) dt
    FROM
        fashionbardb_joumniah.lowbalance
    WHERE
         lbdatetime <= '".$enddate."'
    HAVING dt > 300) a2
        LEFT JOIN
    (SELECT 
        COUNT(msisdn) c, msisdn
    FROM
        fashionbardb_joumniah.billing
    WHERE
         billdatetime >= '".$startdate."'
            AND billdatetime <= '".$enddate."'
    GROUP BY msisdn
    HAVING c > 2
    ORDER BY c DESC) b5 ON a2.msisdn = b5.msisdn
WHERE
    b5.msisdn IS NULL
ORDER BY RAND()
LIMIT 1000; ";
*/
$res_active =$conn->query($sql_active);

while($row_active=$res_active->fetch())
{
	
	$msisdn=$row_active['msisdn'];


	$sql="select * from fashionbardb_joumniah.subscriber where msisdn = '".$msisdn."' order by subscriberid desc limit 1 "; 
	$res=$conn->query($sql);
	$row = $res->fetch();
	$clickid=$row['clickid'];
	
	
	
	$sql_clickid="select * from fashionbardb_joumniah.userlog where clickid = '".$clickid."' order by userlogid desc limit 1";
	$res_clickid = $conn->query($sql_clickid);
	$row_clickid=$res_clickid->fetch();
	
	$advertiserid=$row_clickid['advertiserid'];
	$pubid=$row_clickid['pubid'];
	$advertclickid=$row_clickid['advertclickid'];
	$accesstime=$row_clickid['accesstime'];
	
	
	$subscriptionstartdate=date('Y-m-d H:i:s');
	$subscriptionenddate=date('Y-m-d H:i:s',strtotime($subscriptionstartdate. ' + 7 days'));

$subscriber_entry="0";

	if(date('Y-m-d',strtotime($accesstime)) == date('Y-m-d',strtotime($subscriptionstartdate)))
	{
		$sameday=1;
	}
	else
	{
		$sameday=0;
	}
	
	if($row['charging_mode'] != 'dct' )	
	{
		
		$sql_bill="SELECT  COUNT(msisdn) c FROM fashionbardb_joumniah.billing WHERE resultcode = '0' and msisdn = '".$msisdn."' AND DATE(billdatetime) = DATE(NOW()) ";
		$res_bill=$conn->query($sql_bill);
		$row_bill=$res_bill->fetch();
		
		if( $row_bill['c'] > 0 )
		{
			
			
			echo "PENDING ".$resultcode." - ".$msisdn. " - Bill - ".$row_bill['c'] ;
			echo "</br>";
		}
		else
		{
			
				// Charging/Billing API
				$curl = curl_init();

				curl_setopt_array($curl, array(
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
					"opId": 3,
					"msisdn": "'.$msisdn.'",
					"amount":"0.25",
					"serviceId": "gamebar_service",
					"extraField1":"لقد اشتركت في خدمة جيم بار. أبدء اللعب بالنقر على  http://gamebar.mobi/dot/jo/content/index بسعر 25 قرش/يوم. لالغاء الاشتراك ارسل unsub gmb  الى 99700"
				}',
				  CURLOPT_HTTPHEADER => array(
					'PartnerId: svmobi-201850',
					'Authorization: Basic c3Ztb2JpLTk5Nzo1NTFTVFI5OQ==',
					'Accept: application/json',
					'Content-Type: application/json'
				  ),
				));

				$response = curl_exec($curl);
			//	echo "Billing API: " .$response1."</br> </br>";
				curl_close($curl);
				$data = json_decode($response,true);
				$resultcode=$data['resultCode'];  
				$billdotTransId=$data['dotTransId'];
				
				$insert_billing="INSERT INTO fashionbardb_joumniah.`billing`
							(
							`clickid`,
							`msisdn`,
							`billdatetime`,
							`resultcode`,
							`response`)
							VALUES
							(
							'".$clickid."',
							'".$msisdn."',
							'".DATE('Y-m-d H:i:s')."',
							'".$resultcode."',
							'LOW ".$response."');
							"; 
			$res_billing=$conn->query($insert_billing);
		
				if($resultcode == '1000' || $resultcode == '0')
				{	
					$subscriber_entry="0";	
					echo "SUCCESS ".$resultcode." - ".$msisdn. " - Bill - ".$row_bill['c'] ;
					echo "</br>";
					
					$delete_lb="DELETE FROM  ".$db.".lowbalance where msisdn = '".$msisdn."' ";
					$res_lp=$conn->query($delete_lb);
					
					$update_cbs="update advertiserdb.mailalert set lastupdatetime = '".DATE('Y-m-d H:i:s')."' where id='45' ";
					$res_cbs=$conn->query($update_cbs);
					
					$select_ren="select count(msisdn) c from fashionbardb_joumniah.subscriber where clickid = '".$clickid."' and charging_mode = 'act'
						order by subscriberid desc limit 1";
					$res_ren=$conn->query($select_ren);
					$row_ren=$res_ren->fetch();
					$status=2;
					if($row_ren['c'] > 0)
					{
						$charging_mode="ren";	
					}
					else
					{
						$charging_mode="act";	
					}

					$amount="0.25";
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
					
					echo "ERROR ".$resultcode." - ".$msisdn. " - Bill - ".$row_bill['c'] ;
					echo "</br>";
				}
				elseif($resultcode == '1013' )
				{
					$subscriber_entry="0";
					$charging_mode = "dct";
					
					$delete_lb="DELETE FROM  ".$db.".lowbalance where msisdn = '".$msisdn."' ";
					$res_lp=$conn->query($delete_lb);
					
					echo "ERROR ".$resultcode." - ".$msisdn. " - Bill - ".$row_bill['c'] ;
					echo "</br>";
				}
				else
				{
					$subscriber_entry="0";
					$charging_mode = "fail";
					echo "ERROR ".$resultcode." - ".$msisdn. " - Bill - ".$row_bill['c'] ;
					echo "</br>";
				}	
					if($subscriber_entry == '0')
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

					}
	
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
				
			}
			
		}
				
			
	}
	else{
		echo $delete_lb="DELETE FROM  ".$db.".lowbalance where msisdn = '".$msisdn."' ";
		$res_lp=$conn->query($delete_lb);
		echo "</br>";
	}
	
	



	
}


$conn=null;

?>


 

