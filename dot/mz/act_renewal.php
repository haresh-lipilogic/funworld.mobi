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
    a5.*
FROM
    (SELECT 
        a2.*
    FROM
        (SELECT 
        msisdn, subscriberid, charging_mode
    FROM
        fashionbardb_joumniah.subscriber
    WHERE
        subscriberid IN (SELECT 
                MAX(subscriberid) subscriberid
            FROM
                fashionbardb_joumniah.subscriber
            GROUP BY msisdn)
            AND (charging_mode = 'ren'
            OR charging_mode = 'act')
            AND subscriptionstartdate <= '".$startdate."') a2
    LEFT JOIN (SELECT 
        msisdn
    FROM
        fashionbardb_joumniah.subscriber
    WHERE
        (charging_mode = 'ren'
            OR charging_mode = 'act')
            AND subscriptionstartdate >= '".$startdate."'
            AND subscriptionstartdate <= '".$enddate."') b2 ON a2.msisdn = b2.msisdn
    WHERE
        b2.msisdn IS NULL) a5
        LEFT JOIN
    (SELECT 
        COUNT(msisdn) c, msisdn
    FROM
        fashionbardb_joumniah.billing
    WHERE
        billdatetime >=  '".$startdate."'
            AND billdatetime <= '".$enddate."'
           
    GROUP BY msisdn
    HAVING c < 2) b5 ON a5.msisdn = b5.msisdn
WHERE
    b5.msisdn IS NULL
LIMIT 1000";

$res_active =$conn->query($sql_active);

$subscriber_entry="0";

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
					"extraField1":"لقد اشتركت في خدمة جيم بار. أبدء اللعب بالنقر على http://gamebar.mobi/dot/jo/content/index بسعر 25 قرش/يوم. لالغاء الاشتراك ارسل unsub gmb  الى 99700"
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
							'ACT ".$response."');
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
					
					
					$charging_mode ="ren";
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
				
					if($subscriber_entry=='0')
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
					
	
		}	
			
	}
	else
	{
		echo $delete_lb="DELETE FROM  ".$db.".lowbalance where msisdn = '".$msisdn."' ";
		$res_lp=$conn->query($delete_lb);
		echo "</br>";
	}
}


?>


 

