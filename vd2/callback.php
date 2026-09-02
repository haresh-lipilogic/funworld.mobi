<?php


sleep(30);




include "includes/dbdetail.php";
//include "function.php";


//print_r(json_decode(file_get_contents("php://input"), true));

//exit;

//error_reporting(0);


$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$receivedate =date('Y-m-d H:i:s');
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
$staging=0;
$stmt1 = $conn1->prepare("INSERT INTO ".$dblog.".callback (url,url_detail,accesstime,staging) VALUES (?,?,?,?)");
				$stmt1->bind_param("ssss",$actual_link, $output,$receivedate,$staging);	
				
				
	$stmt1->execute();
	
	$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";



	$dataPOST = file_get_contents('php://input');
$kk=json_decode($dataPOST,true);
//print_r($kk);


 //print_r($_POST);
//$data=$array_data['Response'];
//print_r($array_data);
//exit;

//echo $dataPOST;
$receivedate =date('Y-m-d H:i:s');
$currentdate=date('Y-m-d');

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

$stmt1 = $conn1->prepare("INSERT INTO ".$dblog.".callback1 (url,param,receivetime) VALUES (?,?,?)");
				$stmt1->bind_param("sss",$actual_link, $dataPOST,$receivedate);	
				
				
	$stmt1->execute();
	
	
	
$sourcetransactionid=$kk['sourceTransactionId'];
$status=$kk['status'];
$transactionid=$kk['transaction-id'];
$partnerid=$kk['partner-id'];
$serviceid=$kk['service-id'];
$partnername=$kk['partner-name'];
$clickid=$kk['client-txn-id'];
$packageid=$kk['package-id'];
$subscriptionid=$kk['subscription-id'];
$reason=$kk['reason'];
$sql1="select * from ".$db.". subscriber where clickid='".$clickid."' order by id desc limit 1";
		$result11 = $conn1->query($sql1);
			$numrows11=$result11->num_rows;

//echo $numrows11;exit;
if($numrows11>0)
{
//exit;	
	
}

$sql="select * from ".$db.". subscriber where clickid='".$clickid."' order by id desc limit 1";
		$result1 = $conn1->query($sql);
			$numrows1=$result1->num_rows;
			
				while($row = $result1->fetch_assoc()) {
					
					$msisdn=$row['msisdn'];
					$clickid=$row['clickid'];
					$advid=$row['advid'];
					$charge1=$row['charging_mode'];
					$serviceid1=$row['serviceid'];
					
					
				}
				
//exit;				
				
if($numrows1==0)

{

 $sql="select * from ".$dblog.". userlog where clickid='".$clickid."' order by userlogid desc limit 1";
		$result1 = $conn1->query($sql);
			//$numrows1=$result1->num_rows;
			
				while($row = $result1->fetch_assoc()) {
					
					$msisdn=$row['msisdn'];
					$clickid=$row['clickid'];
					$advid=$row['advertiserid'];
					//$charge1='first';
					$serviceid1=$row['serviceid'];
					
					
				}
				



}	

if($status=='TRANSACTION SUCCESSFUL')
{
	//echo "hi1=";
	$ll=stripos($packageid,'TRIAL');
	//if(stringpos())
		
	if(stripos($packageid,'TRIAL')>0)
	{
	$charging_mode='trial';
	$amount=0;
	}
	else{
		if($charge1=='first' || $charge1=='trial')
		{
			$charging_mode='act';
			$amount=7;	
		}
		else if($charge1=='act' || $charge1=='ren')
		{
			$charging_mode='ren';
			$amount=7;	
		}
		else{
			
			$charging_mode='ren';
			$amount=7;	
			
		}
		
		
	}
	
	$chage='trial';
				//echo "clickid=".$clickid;
				//echo "serviceid=".$serviceid;
				//echo "advid=".$advid;
				
				//exit;
	
	
	//echo "INSERT INTO ".$db.".subscriber(`msisdn`, `clickid`, `advid`, `charging_mode`, `subscriptionstartdate`, `subscriptionenddate`, `amount`, `serviceid`, `txnid`, `subscriptionid`, `xvczaacr`) VALUES ($msisdn,$clickid,$advid,$charging_mode,$subscriptionstartdate,$subscriptionenddate,$amount,$serviceid1,$transactionid,$subscriptionid,$packageid)";
	$subscriptionenddate = date('Y-m-d H:i:s', strtotime($receivedate . ' +24 hours'));
	$subscriptionstartdate =date('Y-m-d H:i:s');
	$stmt1 = $conn1->prepare("INSERT INTO ".$db.".subscriber(`msisdn`, `clickid`, `advid`, `charging_mode`, `subscriptionstartdate`, `subscriptionenddate`, `amount`, `serviceid`, `txnid`, `subscriptionid`, `xvczaacr`) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
				$stmt1->bind_param("sssssssssss",$msisdn,$clickid,$advid,$charging_mode,$subscriptionstartdate,$subscriptionenddate,$amount,$serviceid1,$transactionid,$subscriptionid,$packageid);	
				
				
	$stmt1->execute();
	if($charging_mode=='trial')
	{
	$callback=callback($clickid,$serviceid1,$advid,$chage);
	}
	
}
else{
	
	
	
	
}



function callback($clickid,$serviceid,$advid,$chage) // remove _original for previous code
{
	//echo "Hi2";exit;
	include "includes/dbdetail.php";
	$conn=$conn1;
	
	
	//echo "<br>clickid=".$clickid;
	//echo "<br>serviceid=".$serviceid;
	//echo "<br>advid=".$advid;
	//echo "<br>chage=".$chage;
	
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
		
		
		if($serviceid==1)
		{
		$sql24 = "SELECT * from ".$advdb.".campaignconfig  where operator='Vodacom_wfh' and product='glambar'";
		$op='Vodacom_wfh';
		}
		else if($serviceid==2)
		{
			$sql24 = "SELECT * from ".$advdb.".campaignconfig  where operator='Vodacom_fg' and product='glambar'";
			$op='Vodacom_fg';
		}
		else if ($serviceid==3)
		{
			$sql24 = "SELECT * from ".$advdb.".campaignconfig  where operator='Vodacom_bt' and product='glambar'";
			$op='Vodacom_bt';
		}
		else if($serviceid==4)
		{
			$sql24 = "SELECT * from ".$advdb.".campaignconfig  where operator='Vodacom_game' and product='gamebar'";
			$op='Vodacom_game';
			
		}
		else {
			$sql24 = "SELECT * from ".$advdb.".campaignconfig  where operator='Vodacom_glam' and product='glambar'";
			$op='Vodacom_glam';
			
		}
		
		
		
		
		$me1=$conn1->query($sql24);
					while($row = $me1->fetch_assoc()) {
					
							 $callbackcap=$row['callbackcap'];
							
						}
						
			//echo $callbackcap;exit;
		$date4=date('Y-m-d');
		 $sql26 = "SELECT * from ".$db.".callbackresponse  where requesttime > '".$date4."' and issent=1 and serviceid='".$serviceid."' ";
		$me6=$conn->query($sql26);
		
		$rowcount26=mysqli_num_rows($me6); 
		 
		if ($rowcount26 <= $callbackcap)
		{
			//echo "hi";exit;
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
				$sql1 = "select * from ".$db.".callbackwavier where advertiserid='".$advid."' and serviceid='".$serviceid."'";
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
					if (strpos($callback,"[clickid]"))
					{
						 $url1=str_replace("[opid]",'vodacom',$url1);
						
					}
					
					
					
					
				//echo $url1;exit;
				
				
				$sql21 = "select * from ".$advdb.".callbacksent_counter where counter='".$perc."' and blockcounter like '%,".$counter."%'";
				$me34=$conn->query($sql21);
				$rowcount34=0;
				$rowcount34=mysqli_num_rows($me34);
				
				
				
					
				if($rowcount34==0)
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

				//echo  "INSERT INTO ".$db.".callbackresponse(requesttime,callbackurl,callbackresponse,advertiserid,clickid,advertclickid,issent,spilower,serviceid) VALUES ($receivedate,$url1,$data,$advid,$clickid,$advertclickid,$issent,$isspil,$serviceid)";
						
				$stmt1 = $conn->prepare("INSERT INTO ".$db.".callbackresponse(requesttime,callbackurl,callbackresponse,advertiserid,clickid,advertclickid,issent,spilower,serviceid) VALUES (?,?,?,?,?,?,?,?,?)");
					 $stmt1->bind_param("sssssssss",$receivedate,$url1,$data,$advid,$clickid,$advertclickid,$issent,$isspil,$serviceid) ; 
					 $stmt1->execute();		
						
					$counter--;
					//$nextdaycount--;
					
					 $sql = "UPDATE ".$db.".callbackwavier  SET ".$bb."='".$counter."' WHERE advertiserid='".$advid."' and serviceid='".$serviceid."'";

				// Prepare statement
					$stmt = $conn->prepare($sql);

				// execute the query
					$stmt->execute();
				}
				else{
					
					$issent='0';
					$data='';
					$receivedate =date('Y-m-d H:i:s');
					
					
					$stmt1 = $conn->prepare("INSERT INTO ".$db.".callbackresponse(requesttime,callbackurl,callbackresponse,advertiserid,clickid,advertclickid,issent,spilower,serviceid) VALUES (?,?,?,?,?,?,?,?,?)");
					 $stmt1->bind_param("sssssssss",$receivedate,$url1,$data,$advid,$clickid,$advertclickid,$issent,$isspil,$serviceid) ; 
					 $stmt1->execute();		
					
					
					$counter--;
					 $sql = "UPDATE ".$db.".callbackwavier  SET ".$bb."='".$counter."' WHERE advertiserid='".$advid."' and serviceid='".$serviceid."'";

				// Prepare statement
					$stmt = $conn->prepare($sql);

				// execute the query
					$stmt->execute();
					
				}
				
				if($counter <= 0)
				{
					
					 $sql = "UPDATE ".$db.".callbackwavier  SET ".$bb."='20' WHERE advertiserid='".$advid."' and serviceid='".$serviceid."'";

				
					$stmt = $conn->prepare($sql3);

				
					$stmt->execute();
					
				}
			}
			
		}

		
	}

	
	//echo "hi5";exit;
}







?>