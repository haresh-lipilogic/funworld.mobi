<?php
$clickid='pk16275695243185920';
$advid='1073';
$chage='cg';
$mnc='06';
$spi=1;


callback($clickid,$advid,$chage,$spi,$mnc);

function callback($clickid,$advid,$chage,$spi,$mnc) // remove _original for previous code
{
	//echo "Hi2";exit;
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
		
		
			if($mnc=='04' || $mnc=='4')
			{
			$sql24 = "SELECT * from ".$advdb.".campaignconfig  where operator='pk_zong' and product='gamebar'";
			//$op='Indonesia';
			}
			else{
				$sql24 = "SELECT * from ".$advdb.".campaignconfig  where operator='pk_telenor' and product='gamebar'";
			}
			
		
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
		if($rowcount262 >=1000) //advertiserwise callback cap
		{
			$kk=1;	
		}
			
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

