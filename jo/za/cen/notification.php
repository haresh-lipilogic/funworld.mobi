<?php
include "includes/dbdetail.php";
//error_reporting(0);

$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";



	$dataPOST = trim(file_get_contents('php://input'));

	//$array_data = json_decode(json_encode(simplexml_load_string($dataPOST)), true);
 //$string_version = implode(',', $array_data);

 
//$data=$array_data['Response'];
//print_r($array_data);

$receivedate =date('Y-m-d H:i:s');
$currentdate=date('Y-m-d');
$receivedate =date('Y-m-d H:i:s');
$sql="update advertiserdb.mailalert set lastupdatetime='".$receivedate."' where id='32'";
		$res1 = $conn1->query($sql);

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

//echo "INSERT INTO ".$dblog.".notification(url,param,receivetime) values('$actual_link','$dataPOST','$receivedate')";

$stmt1 = $conn1->prepare("INSERT INTO ".$dblog.".notification(url,param,receivetime) VALUES (?,?,?)");
				$stmt1->bind_param("sss",$actual_link,$dataPOST,$receivedate);	
				
$stmt1->execute();

/*
http://gamebar.mobi/iq/za/cen/notification?
country=iq
&clientid=iq16659968717210889
&sign=89648d90a3a1617b7e9fd30cd0f5c33e7296e403
&opt_in_channel=wap
&transactionid=30016052626
&mno=41830
&revenue=0.0000
&event_type=recurring_billing
&phone=9647827207868
&enduserprice=300.000
&service=a9e8865552ebe088ee925acd242f447a
&interval=DAY
&mnocode=IQ_ZAIN
&subscriptionid=6000619627
&status=success
&revenuecurrency=USD


*/
if($_GET['event_type']=='recurring_billing')
{
	
		$clientid=$_GET['clientid'];
		$sign=$_GET['sign'];
		$opt_in_channel=$_GET['opt_in_channel'];
		$transactionid=$_GET['transactionid'];
		$mno=$_GET['mno'];
		$revenue=$_GET['revenue'];
		$transactiontype =$_GET['event_type'];
		$msisdn=$_GET['phone'];
		$enduserprice=$_GET['enduserprice'];
		$service=$_GET['service'];
		$interval=$_GET['interval'];
		$mnocode=$_GET['mnocode'];
		$subscriptionid=$_GET['subscriptionid'];
		$status=$_GET['status'];
		$revenuecurrency=$_GET['revenuecurrency'];
		//$amount=0;
	

	$subscriptionstartdate=date('Y-m-d H:i:s');
		 $sql="select * from ".$db.". subscriber where msisdn='".$msisdn."'  order by subscriberid  desc limit 1";
		$result1 = $conn1->query($sql);
			$numrows1=$result1->num_rows;
				if($numrows1>0)
				{
				while($row = $result1->fetch_assoc()) {
				
						$advid=$row['advid'];
						$clickid=$row['clickid'];
						$requestid =$row['requestid'];
						$charging_mode=$row['charging_mode'];
						$transactiontype=$row['transactiontype'];
						$amount=$row['amount'];

						
				}
				}
				
			if($_GET['status']=='success')
			{
					if($charging_mode=='act' && $amount==0)
					{
						$charging='act';
					}
					else if($charging_mode=='first' || $charging_mode=='low' || $charging_mode=='trial')
					{
						$charging='act';
						if($charging_mode=='first')
						{
							$chage='act';
							$spi='0';
							
						}
						else{
							$chage='spo';
							$spi='1';
						}
						$mnc=1;
						$call=callback($clickid,$advid,$chage,$spi,$mnc);
					}
					else{
						 $charging='ren';
					}
					
					
				$subscriptionenddate=date('Y-m-d H:i:s',strtotime("+1 days"));
				$stmt1 = $conn1->prepare("INSERT INTO ".$db.".subscriber (`accesstime`, `clickid`, `advid`, `msisdn`, `transactiontype`, `requestid`, `charging_mode`, `subsriptionstartdate`, `subscriptionenddate`, `amount`,`subscriptionid`, `transactionid`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
					$stmt1->bind_param("ssssssssssss",$receivedate,$clickid,$advid, $msisdn,$transactiontype,$requestid, $charging,$subscriptionstartdate,$subscriptionenddate, $enduserprice,$subscriptionid,$transactionid);	
					
				$stmt1->execute();	
				
		
		
			}
			else{
				
				if($charging_mode=='act' && $amount==0)
					{
						$charging='act';
					}
					else if($charging_mode=='first' || $charging_mode=='trial')
					{
						$charging='low';
					}
					else if($charging_mode=='low' )
					{
						$charging='act';
					}
					else{
						 $charging='ren';
					}
					
					$amount=0;
				$subscriptionenddate=date('Y-m-d H:i:s',strtotime("+1 days"));
				$stmt1 = $conn1->prepare("INSERT INTO ".$db.".subscriber (`accesstime`, `clickid`, `advid`, `msisdn`, `transactiontype`, `requestid`, `charging_mode`, `subsriptionstartdate`, `subscriptionenddate`, `amount`,`subscriptionid`, `transactionid`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
					$stmt1->bind_param("ssssssssssss",$receivedate,$clickid,$advid, $msisdn,$transactiontype,$requestid, $charging,$subscriptionstartdate,$subscriptionenddate, $amount,$subscriptionid,$transactionid);	
					
				$stmt1->execute();	
				
				
				
			}
	
	
	
	
}
else if($_GET['event_type']=='opt_out')
{
	
	//http://35.247.174.49/gamebar/iq/za/cen/notification?country=iq&clientid=iq16659968717210889&sign=cbf5b92cc099c7254d5700531f4b7871e31e7bc4&opt_in_channel=wap&transactionid=30016073230&mno=41830&revenue=0.0000&event_type=opt_out&phone=9647827207868&enduserprice=0.000&service=a9e8865552ebe088ee925acd242f447a&interval=DAY&mnocode=IQ_ZAIN&subscriptionid=6000619627&status=success&revenuecurrency=USD
	
	$clientid=$_GET['clientid'];
		$sign=$_GET['sign'];
		$opt_in_channel=$_GET['opt_in_channel'];
		$transactionid=$_GET['transactionid'];
		$mno=$_GET['mno'];
		$revenue=$_GET['revenue'];
		$transactiontype =$_GET['event_type'];
		$msisdn=$_GET['phone'];
		$enduserprice=$_GET['enduserprice'];
		$service=$_GET['service'];
		$interval=$_GET['interval'];
		$mnocode=$_GET['mnocode'];
		$subscriptionid=$_GET['subscriptionid'];
		$status=$_GET['status'];
		$revenuecurrency=$_GET['revenuecurrency'];
		
		
		if($status=='success')
		{
			
			
			$subscriptionstartdate=date('Y-m-d H:i:s');
		 $sql="select * from ".$db.". subscriber where msisdn='".$msisdn."'  order by subscriberid  desc limit 1";
		$result1 = $conn1->query($sql);
			$numrows1=$result1->num_rows;
				if($numrows1>0)
				{
				while($row = $result1->fetch_assoc()) {
				
						$advid=$row['advid'];
						$clickid=$row['clickid'];
						$requestid =$row['requestid'];
						$charging_mode=$row['charging_mode'];
						$transactiontype=$row['transactiontype'];
						
						
				}
				}
				
			$amount=0;$charging='dct';
			
			$stmt1 = $conn1->prepare("INSERT INTO ".$db.".subscriber (`accesstime`, `clickid`, `advid`, `msisdn`, `transactiontype`, `requestid`, `charging_mode`, `subsriptionstartdate`, `subscriptionenddate`, `amount`,`subscriptionid`, `transactionid`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
					$stmt1->bind_param("ssssssssssss",$receivedate,$clickid,$advid, $msisdn,$transactiontype,$requestid, $charging,$subscriptionstartdate,$subscriptionstartdate, $amount,$subscriptionid,$transactionid);	
					
				$stmt1->execute();	
			
			
		}
	
	
}

else if($_GET['event_type']=='opt_in')
{
	
	
	
$clientid=$_GET['clientid'];
		$sign=$_GET['sign'];
		$opt_in_channel=$_GET['opt_in_channel'];
		$transactionid=$_GET['transactionid'];
		$mno=$_GET['mno'];
		$revenue=$_GET['revenue'];
		$transactiontype =$_GET['event_type'];
		$msisdn=$_GET['phone'];
		$enduserprice=$_GET['enduserprice'];
		$service=$_GET['service'];
		$interval=$_GET['interval'];
		$mnocode=$_GET['mnocode'];
		$subscriptionid=$_GET['subscriptionid'];
		$status=$_GET['status'];
		$revenuecurrency=$_GET['revenuecurrency'];
		//$amount=0;
	

	$subscriptionstartdate=date('Y-m-d H:i:s');
		 $sql="select * from ".$db.". subscriber where msisdn='".$msisdn."'  order by subscriberid  desc limit 1";
		$result1 = $conn1->query($sql);
			$numrows1=$result1->num_rows;
				if($numrows1>0)
				{
				while($row = $result1->fetch_assoc()) {
				
						$advid=$row['advid'];
						$clickid=$row['clickid'];
						$requestid =$row['requestid'];
						$charging_mode=$row['charging_mode'];
						$transactiontype=$row['transactiontype'];
						$amount=$row['amount'];

						
				}
				}
				
			if($_GET['status']=='success')
			{
					if($charging_mode=='first' || $charging_mode=='trial')
					{
						$charging='trial';
						$chage='cg';
							$spi='0';
							$amount=0;
						$mnc=1;
						$call=callback($clickid,$advid,$chage,$spi,$mnc);
					}
					
					
					
				$subscriptionenddate=date('Y-m-d H:i:s',strtotime("+1 days"));
				$stmt1 = $conn1->prepare("INSERT INTO ".$db.".subscriber (`accesstime`, `clickid`, `advid`, `msisdn`, `transactiontype`, `requestid`, `charging_mode`, `subsriptionstartdate`, `subscriptionenddate`, `amount`,`subscriptionid`, `transactionid`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
					$stmt1->bind_param("ssssssssssss",$receivedate,$clickid,$advid, $msisdn,$transactiontype,$requestid, $charging,$subscriptionstartdate,$subscriptionenddate, $amount,$subscriptionid,$transactionid);	
					
				$stmt1->execute();	
				
		
		
			}
			else{
				
				
				
				
			}
	
	

}

	
function callback($clickid,$advid,$chage,$spi,$mnc) // remove _original for previous code
{
	//echo $chage;exit;
	include "includes/dbdetail.php";
	$conn=$conn1;
	//$conn1 = new mysqli('10.34.240.3','webserveruser','K&dN&r4a8N@du0');
	
	
	
	
	
	 $sql26 = "UPDATE ".$db.".callbackwavier  SET `spo_callback_counter`='20' where spo_callback_counter<=0";
	 $me6=$conn->query($sql26);
	 
	 $sql26 = "UPDATE ".$db.".callbackwavier  SET `act_callback_counter`='20' where act_callback_counter<=0";
	 $me6=$conn->query($sql26);
	 
	 
		$sql26 = "UPDATE ".$db.".callbackwavier  SET `cg_callback_counter`='20' where cg_callback_counter<=0";
	 $me6=$conn->query($sql26);
	
	
	
	
	
	 $sql26 = "SELECT * from ".$db.".callbackresponse  where clickid = '".$clickid."' ";
	$me6=$conn->query($sql26);
	
	  $rowcount26=mysqli_num_rows($me6);
	
	if($rowcount26==0)
	{
		$gg=rand(1, 50);
		sleep($gg);
		
			
				$sql24 = "SELECT * from ".$advdb.".campaignconfig  where operator='jo_zain' and product='gamebar'";
			
			
		
		//echo $sql24;exit;
		
		
		$me1=$conn1->query($sql24);
					while($row = $me1->fetch_assoc()) {
					
							 $callbackcap=$row['callbackcap'];
							
						}
						
		//echo $callbackcap;exit;
		$date4=date('Y-m-d');
		  $sql26 = "SELECT * from ".$db.".callbackresponse  where requesttime > '".$date4."' and issent=1  ";
		$me6=$conn->query($sql26);
		
		$rowcount26=mysqli_num_rows($me6); 
		 $kk=0;
		if ($rowcount26 >= $callbackcap)
		{
			$kk=1;
		}
		
		$sql12 = "SELECT * from ".$db.".callbackresponse  where requesttime > '".$date4."' and issent=1 and advertiserid='".$advid."' ";
		$me61=$conn->query($sql12);
		$rowcount262=0;
		$rowcount262=mysqli_num_rows($me61);
		/*if($advid=='1074')
		{
		if($rowcount262 >=500) //advertiserwise callback cap
		{
			$kk=1;	
		}
		}
		else{
			if($rowcount262 >=200) //advertiserwise callback cap
			{
				$kk=1;	
			}
			
			
		}*/
		//echo $chage;exit;
				$sql23 = "SELECT * from ".$db.".callbackresponse  where clickid='".$clickid."'";
				$me=$conn->query($sql23);
				
				$rowcount22=mysqli_num_rows($me); 
					if ($rowcount22<1)
					{
						
						if($chage=='act')
						{
							$mm='act_stop';
							$bb='act_callback_counter';
							$isspil=0;
						}
						else if($chage=='spo')
						{
							$mm='spo_stop';
							$bb='spo_callback_counter';
							$isspil=1;
						}	
						else{
							$mm='cg_stop';
							$bb='cg_callback_counter';
							$isspil=2;
						}
						
						
						  $sql = "SELECT userlog.advertiserid advid,".$mm." cutoff,callbackurl,advertclickid,pubid from ".$dblog.".userlog inner join ".$advdb.".advertiser on userlog.advertiserid = advertiser.advertiserid inner join ".$db.".advertmanage on userlog.advertiserid = advertmanage.advertiserid where clickid='".$clickid."' limit 1";
						
						//echo $sql;exit;
						foreach ($conn->query($sql) as $row) {
							$callback= $row['callbackurl'] ;
							$cutoff=$row['cutoff'];
							$advid=$row['advid'];
							//$nextdaycutoff=$row['nextdaycutoff'];
							$advertclickid=$row['advertclickid'];
							$pubid=$row['pubid'];
						}
						$sql1 = "select * from ".$db.".callbackwavier where advertiserid='".$advid."' ";
						foreach ($conn->query($sql1) as $row1) {
							//$callback= $row['callbackurl'] ;
							$counter=$row1[$bb];
							
							$advid=$row1['advertiserid'];
							
						
						}
						//echo "<br>cutoff=".$cutoff;
						//echo "<br>counter=".$counter;
				 
						
						
							$perc=20*$cutoff/100;
							
						
						
						//exit;
						
						
						
						
							
						
							if (strpos($callback,"[pubid]"))
							{
								//echo "<br>Hi";
								$callback=str_replace("[pubid]",$pubid,$callback);
								
							}
							if (strpos($callback,"[clickid]"))
							{
								 $url1=str_replace("[clickid]",$advertclickid,$callback);
								
							}
							
						//echo $url1;exit;
						
						
						$sql21 = "select * from ".$advdb.".callbacksent_counter where counter='".$perc."' and blockcounter like '%,".$counter."%'";
						$me34=$conn->query($sql21);
						$rowcount34=25;
						 $rowcount34=mysqli_num_rows($me34);
						
						
						//echo $rowcount34;
					//	echo "<br>".$kk;exit;
						$sql212 = "select callbackresponse.* from ".$db.".callbackresponse inner join (SELECT * FROM ".$db.".`callbackresponse` order by id desc limit 40)a on a.clickid=callbackresponse.clickid where callbackresponse.issent=1";
						$me342=$conn->query($sql212);
						$rowcount342=1;
						$rowcount342=mysqli_num_rows($me342);
					
					
					//exit;
					
							
						//if($rowcount34==0 && $kk==0 &&	$rowcount342==0)
						if($rowcount34==0 && $kk==0)	
						{
							 //echo "Hi";exit;
							$curl = curl_init();
								// Set some options - we are passing in a useragent too here
								curl_setopt_array($curl, array(
									CURLOPT_RETURNTRANSFER => 1,
									curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0),
									curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0),
									CURLOPT_URL => $url1,
									CURLOPT_USERAGENT => 'Codular Sample cURL Request'
								));

								$data = curl_exec($curl);
									
									
									
											if(curl_errno($curl))
											print curl_error($curl);
										else
											curl_close($curl);			
											//		$array_data = json_decode(json_encode(simplexml_load_string($data)), true);	
												
							$receivedate =date('Y-m-d H:i:s');
								$issent='1';	

						//echo  "INSERT INTO ".$db.".callbackresponse(requesttime,callbackurl,callbackresponse,advertiserid,clickid,advertclickid,issent,spilower,serviceid) VALUES ($receivedate,$url1,$data,$advid,$clickid,$advertclickid,$issent,$isspil,$mnc) ";
								
						$stmt1 = $conn1->prepare("INSERT INTO ".$db.".callbackresponse(requesttime,callbackurl,callbackresponse,advertiserid,clickid,advertclickid,issent,spilower,serviceid) VALUES (?,?,?,?,?,?,?,?,?)");
					 $stmt1->bind_param("sssssssss",$receivedate,$url1,$data,$advid,$clickid,$advertclickid,$issent,$isspil,$mnc) ; 
							 $stmt1->execute();		
								
							$counter--;
							//$nextdaycount--;
							
							 $sql = "UPDATE ".$db.".callbackwavier  SET ".$bb."='".$counter."' WHERE advertiserid='".$advid."'";

						// Prepare statement
							$stmt = $conn->prepare($sql);

						// execute the query
							$stmt->execute();
						}
						else{
							
						
							
							
							
							//echo "Hi1";exit;
							$issent='0';
							$data='';
							$receivedate =date('Y-m-d H:i:s');
							
							
							$stmt1 = $conn1->prepare("INSERT INTO ".$db.".callbackresponse(requesttime,callbackurl,callbackresponse,advertiserid,clickid,advertclickid,issent,spilower,serviceid) VALUES (?,?,?,?,?,?,?,?,?)");
							$stmt1->bind_param("sssssssss",$receivedate,$url1,$data,$advid,$clickid,$advertclickid,$issent,$isspil,$mnc) ; 
							 $stmt1->execute();		
							
							
							$counter--;
							 $sql = "UPDATE ".$db.".callbackwavier  SET ".$bb."='".$counter."' WHERE advertiserid='".$advid."' ";

						// Prepare statement
							$stmt = $conn->prepare($sql);

						// execute the query
							$stmt->execute();
							
						}
						
						if($counter <= 0)
						{
							
							 $sql = "UPDATE ".$db.".callbackwavier  SET ".$bb."='20' WHERE advertiserid='".$advid."'";

						
							$stmt = $conn->prepare($sql);

						
							$stmt->execute();
							
						}
					}
					
		
	}
	
	//echo "hi5";exit;
}


