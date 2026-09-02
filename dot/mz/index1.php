<?php 



include("includes/connection.php");
error_reporting(0);
	
	$pageurl='http://'.$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; 

	date_default_timezone_set("Asia/Kolkata");
	$accesstime=date("Y-m-d H:i:s");
	$date=date("Y-m-d");
	//$date="2018-09-25";



$sql_count="SELECT count(distinct clickid) c FROM ".$db.".subscriber 
											where subscriptionstartdate >= '".date('Y-m-d')." 00:00:00' and subscriptionstartdate <= '".date('Y-m-d')." 23:59:59'
											and charging_mode = 'act'  and amount > 0 and sameday = '1' ";
										
		$res_count=$conn->query($sql_count);
		$row_count=$res_count->fetch();
		
		if($advertiserid == '1010')
		{
			
		}
		else{
			if($row_count['c'] > 150)
			{
				//$url = "http://mobiads.me/smart/testurl1.php?clickid=".$clickid."&pubid=".$pubid."&ad_id=2&opid=8&cmpid=5"; 
				//header("Location: $url"); exit;
				echo "Please pause traffic. Daily cap reached." ; exit;
			}
			else{
			
			}
		
		}

	$useragent=strtolower($_SERVER['HTTP_USER_AGENT']);
	

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


	$advertclickid=$_GET['clickid'];
	
	

	// Advertiserid
	$advertiserid=$_GET['advid'];
	if($advertiserid == '')
	{
		$advertiserid = "0";
	}

		
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
	
	if( 
		(ip2long($ip) >= ip2long('197.218.58.0') && ip2long($ip) <= ip2long('197.218.95.255')) || 
		(ip2long($ip) >= ip2long('197.218.98.0') && ip2long($ip) <= ip2long('197.218.127.255')) 
		
	   )
	{
		$flow="he";
	}
	else
	{
		$flow="wifi"; 
	}



	// Get Xforward IP Address
	if($_SERVER['REMOTE_ADDR'] == '')
	{
		$xforward = '';
	}
	else
	{
		$xforward = $_SERVER['REMOTE_ADDR'];
	}

	if(count($_COOKIE['clickid_dotmz']) > 0) {
	

		
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
				if($_COOKIE['hit_dotmz'] > 3000)
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
				if($_COOKIE['hit_dotmz'] > 3000)
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
	
	
	/*
				$tbl="spainvodafone_glamour_counter_tbl";
									
					$sqlmycount="select * from commondb.".$tbl." ";
					$resmycount=$conn->query($sqlmycount);
					$rowmycount=$resmycount->fetch();
					$cnt=$rowmycount['cnt'];
					
					$isactive=$rowmycount['isactive'];
						
			
						
				
				if( $pubid != '1383_' && $pubid != '230'   )			
				{
					
						if($cnt > $rowmycount['capping'] && $isactive == 1)
						{  
							 $cnt=$cnt+1;
								
								if($cnt == 101)
								{
									$cnt = 1;
								}
								$updatemycount="update commondb.".$tbl." set cnt='".$cnt."' where cntid = '1'";
								$resupdatemycount=$conn->query($updatemycount);
								 
		
								$url = "https://mobiads.me/smart/my.php?clickid=".$clickid."&pubid=".$pubid."&ad_id=2&opid=34";  
								//$url="http://adfuture.offerstrack.net/index.php?offer_id=806&aff_id=230&aff_sub1=$clickid";
								header("Location: $url"); exit;
								
							
						}
						else
						{
							$cnt=$cnt+1;
							if($cnt == 101)
							{
									$cnt = 1;
							}
					
							$updatemycount="update commondb.".$tbl." set cnt='".$cnt."' where cntid = '1'";
							$resupdatemycount=$conn->query($updatemycount);
							
						}
				}
				else{}

			*/	
			
		
	
	
	
	

	$partnerid="svmobi-201850";
	$serviceid="gamestation_service";
	$username="svmobi-997";
	$password="551STR99";
	$opid="99";
	
	$rurl="http://funworld.mobi/dot/mz/return?clickid=$clickid"; 
	$enrurl=urlencode($rurl); 

	$text = "".$username."-".$partnerid."-".$serviceid."-".$opid."-".$clickid."-".$rurl."-".$password."";
	$digest = hash('sha256', $text);

	$doturl="http://www.dot-jo.biz/appgw/dot-partners-lp?partner_id=$partnerid&service_id=$serviceid&partner_txid=$clickid&op_id=$opid&rurl=$enrurl&signature=$digest";
	$dotenrurl=urlencode($doturl); 
	
	$url="http://www.dot-jo.biz/appgw/PartnerHERedirect?partnerId=$partnerid&rurl=$dotenrurl";
 
		
	header("Location: $url"); exit;
		
?>
