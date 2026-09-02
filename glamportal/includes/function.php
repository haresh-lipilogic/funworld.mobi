<?php

function authorization()
{
include"dbdetail.php";
$postfields="username=".$username."&password=".$password."&grant_type=password&scope=".$scope;
$headers=array(
'Authorization:'.$basicauthorization
);
$headers1=json_encode($headers,true);
$curl = curl_init();

curl_setopt_array($curl, array(
CURLOPT_URL => $tokenurl,
CURLOPT_RETURNTRANSFER => true,
CURLOPT_ENCODING => '',
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT => 0,
CURLOPT_FOLLOWLOCATION => true,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => 'POST',
CURLOPT_POSTFIELDS =>$postfields,
CURLOPT_HTTPHEADER =>$headers ,
));

$response = curl_exec($curl);

curl_close($curl);
//echo $response;
	
	
	$response1=json_decode($response,true);
	 $aoctoken=$response1['access_token'];
	
		$stmt = $conn1->prepare("INSERT INTO ".$dblog.".accesstoken(`acesstime`,`clickid`,`advid`,`headers`,`url`,`param`,`response`) VALUES (?,?,?,?,?,?,?)");
					$stmt->bind_param("sssssss",$date,$clickid,$advertiserid,$headers1,$tokenurl,$postfields,$response);	
					$stmt->execute();
					
		return $aoctoken;			
					
}


function callback($clickid,$serviceid,$advid,$chage) // remove _original for previous code
{
	//echo "Hi2";exit;
	include "dbdetail.php";
	$conn=$conn1;
	
	
	//echo $clickid;
	
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
	
		$sql24 = "SELECT * from ".$advdb.".campaignconfig  where operator='mtn_mobixone' and product='glambar'";
				$me1=$conn1->query($sql24);
					while($row = $me1->fetch_assoc()) {
					
							 $callbackcap=$row['callbackcap'];
							
						}
						
			
		$date4=date('Y-m-d');
		$sql26 = "SELECT * from ".$db.".callbackresponse  where requesttime > '".$date4."' and issent=1";
		$me6=$conn->query($sql26);
		
		$rowcount26=mysqli_num_rows($me6); 
		 
		if ($rowcount26 <= $callbackcap)
		{
		
		
		
		
		
		$sql23 = "SELECT * from ".$db.".callbackresponse  where clickid=".$clickid;
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
				
				
				$sql = "SELECT userlog.advertiserid advid,".$mm." cutoff,callbackurl,advertclickid,pubid from ".$dblog.".userlog inner join ".$advdb.".advertiser on userlog.advertiserid = advertiser.advertiserid inner join ".$db.".advertmanage on userlog.advertiserid = advertmanage.advertiserid where clickid='".$clickid."'";
				//echo $sql;exit;
				
				foreach ($conn->query($sql) as $row) {
					$callback= $row['callbackurl'] ;
					$cutoff=$row['cutoff'];
					$advid=$row['advid'];
					//$nextdaycutoff=$row['nextdaycutoff'];
					$advertclickid=$row['advertclickid'];
					$pubid=$row['pubid'];
				}
				$sql1 = "select * from ".$db.".callbackwavier where advertiserid='".$advid."'";
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

				
						
				$stmt1 = $conn->prepare("INSERT INTO ".$db.".callbackresponse(requesttime,callbackurl,callbackresponse,advertiserid,clickid,advertclickid,issent,spilower) VALUES (?,?,?,?,?,?,?,?)");
					 $stmt1->bind_param("ssssssss",$receivedate,$url1,$data,$advid,$clickid,$advertclickid,$issent,$isspil) ; 
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
					
					$issent='0';
					$data='';
					$receivedate =date('Y-m-d H:i:s');
					
					
					$stmt1 = $conn->prepare("INSERT INTO ".$db.".callbackresponse(requesttime,callbackurl,callbackresponse,advertiserid,clickid,advertclickid,issent,spilower) VALUES (?,?,?,?,?,?,?,?)");
					 $stmt1->bind_param("ssssssss",$receivedate,$url1,$data,$advid,$clickid,$advertclickid,$issent,$isspil) ; 
					 $stmt1->execute();		
					
					
					$counter--;
					 $sql = "UPDATE ".$db.".callbackwavier  SET ".$bb."='".$counter."' WHERE advertiserid='".$advid."'";

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

		
	}

	
	//echo "hi5";exit;
}



