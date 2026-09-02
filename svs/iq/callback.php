<?php
include("includes/connection.php");
error_reporting(0);
date_default_timezone_set("Asia/Kolkata");

$date=date("Y-m-d");

$pageurl='http://'.$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; // Page URL

$msisdn=$_GET['msisdn']; 
$actiontype=$_GET['actionType'];
$spid=$_GET['spId'];
$requestid=$_GET['requestid'];

$sql = "select * from ".$db.".subscriber where (charging_mode = 'act' or charging_mode = 'dct' or charging_mode = 'cg') and msisdn ='".$msisdn."' order by subscriberid desc limit 1"; 
$res=$conn->query($sql);
$row=$res->fetch();
$clickid=$row['clickid'];
$pubid=$row['pubid'];
$advertiserid=$row['advertiserid'];

$sql1= "select * from ".$db.".activeuserlog where clickid='".$clickid."' order by userlogid desc limit 1";
$res1=$conn->query($sql1);
$row1=$res1->fetch();
$accesstime =$row1['accesstime'];
$advertclickid =$row1['advertclickid'];
$operator ="korek";

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
	
	
if($actiontype == '1')
{
	$charging_mode = 'cg';
}
elseif($actiontype == '2')
{	
	$amount="300";
	if($row['charging_mode'] == 'cg' || $row['charging_mode'] == 'dct' )
	{
		$charging_mode ="act";
	}
	else{
		$charging_mode ="ren";
	}
}
elseif($actiontype == '0')
{
	$amount="0";
	$charging_mode = "dct";
}
else{
	$amount="0";
	$charging_mode = "fail";
}

if($charging_mode != 'cg')
{
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
	'".$operator."',
	'WEB',
	'".$charging_mode."',
	'".$actiontype."',
	'0',
	'".$amount."',
	'".$subscriptionstartdate."',
	'".$subscriptionstartdate."',
	'".$sameday."',
	'".$pageurl."',
	'".$spid."',
	'0',
	'".$requestid."');
	";
	$res_insert=$conn->query($insert);
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
								
								
								$sql_count="SELECT count(*) c FROM ".$db.".advertcallback 
												where advertdatetime >= '".date('Y-m-d')." 00:00:00' and advertdatetime <= '".date('Y-m-d')." 23:59:59'
												and advertresponse != 'stop' ";
											
									$res_count=$conn->query($sql_count);
									$row_count=$res_count->fetch();

									if($row_count['c'] > 500)
									{
										$a="stop"; 
									}
									else{
										$a=file_get_contents($main_url); 	
									}
								
								//$a=file_get_contents($main_url); 
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
								$a="stop"; 
								//$a=file_get_contents($edited_url);
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

echo "OK";

?>