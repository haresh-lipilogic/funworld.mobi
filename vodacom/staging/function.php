<?php

function usage_authenticate($clickid,$msisdn,$serviceid,$txnid)
{
			//echo "hi";exit;
		include "includes/dbdetail.php";
		/*if($serviceid==4)
		{
			$mode='staging';
		}*/
		$date=date("Y-m-d H:i:s");
			$sql="select * from ".$db.".decoupling_url where mode='".$mode."'";
				$result1 = $conn1->query($sql);
					//$numrows1=$result1->num_rows;
					
						while($row2 = $result1->fetch_assoc()) {
						
							 $url=$row2['url'];
							//$advid=$row2['advid'];
							//exit;
						}
			$sql="select * from ".$db.". service where serviceid='".$serviceid."'";
				$result1 = $conn1->query($sql);
					//$numrows1=$result1->num_rows;
					
						while($row = $result1->fetch_assoc()) {
						
							$servicename=$row['servicename'];
							$servicecode=$row['servicecode'];
							$username=$row['serviceusername'];
							$password=$row['servicepassword'];
						}
						
						
					 $xml='<er-request id="100017" 
						  client-application-id="'.$username.'" 
						  purchase_locale="en_ZA" language_locale="en_ZA">        
						  <payload> <usage-auth-rate> <charging-id type="msisdn">'.$msisdn.'</charging-id> <service-id>'.$servicecode.'</service-id> 
						  <rating-attributes> <content-name>'.$servicename.'</content-name>
						  <partner-id>'.$username.'</partner-id> </rating-attributes> 
						  </usage-auth-rate>        
						  </payload> 
						  </er-request>
					';
			//exit;
			
					$request=sendrequest($url,$xml,$password,$serviceid);
					
					
					$stmt1 = $conn1->prepare("INSERT INTO ".$dblog2.".sendauthenticate_request (url,param,senttime,response,msisdn,clickid,txnid) VALUES (?,?,?,?,?,?,?)");
						$stmt1->bind_param("sssssss",$url, $xml,$date,$request,$msisdn,$clickid,$txnid);	
						$stmt1->execute();
					
					$array_data = json_decode(json_encode(simplexml_load_string($request)), true);
					
					//print_r($array_data);
					 $package=$array_data['payload']['purchase-options']['packages']['package']['id'];
			
			return $array_data;
			
}

function getserviceoffers($clickid,$msisdn,$serviceid,$txnid)
{
			//echo "hi";exit;
		include "includes/dbdetail.php";
		/*if($serviceid==4)
		{
			$mode='staging';
		}*/
		$date=date("Y-m-d H:i:s");
			$sql="select * from ".$db.".decoupling_url where mode='".$mode."'";
				$result1 = $conn1->query($sql);
					//$numrows1=$result1->num_rows;
					
						while($row2 = $result1->fetch_assoc()) {
						
							 $url=$row2['url'];
							//$advid=$row2['advid'];
							//exit;
						}
			$sql="select * from ".$db.". service where serviceid='".$serviceid."'";
				$result1 = $conn1->query($sql);
					//$numrows1=$result1->num_rows;
					
						while($row = $result1->fetch_assoc()) {
						
							$servicename=$row['servicename'];
							$servicecode=$row['servicecode'];
							$username=$row['serviceusername'];
							$password=$row['servicepassword'];
						}
						
						
				/*	 $xml='<er-request id="100017" 
						  client-application-id="'.$username.'" 
						  purchase_locale="en_ZA" language_locale="en_ZA">        
						  <payload> <usage-auth-rate> <charging-id type="msisdn">'.$msisdn.'</charging-id> <service-id>'.$servicecode.'</service-id> 
						  <rating-attributes> <content-name>'.$servicename.'</content-name>
						  <partner-id>'.$username.'</partner-id> </rating-attributes> 
						  </usage-auth-rate>        
						  </payload> 
						  </er-request>
					';*/
					//$msisdn='';
					
					
				 $xml='	<er-request id="120054" client-application-id="'.$username.'" purchase_locale="en_ZA" language_locale="en_ZA">
							 <payload>
							 <get-service-offers>
							 <charging-id type="msisdn">'.$msisdn.'</charging-id>
							 <service-ids>'.$servicecode.'</service-ids>
							 </get-service-offers>
							 </payload>
							</er-request>';
					
			//echo $url;
			//echo $xml;
			//exit;
			
					$request=sendrequest($url,$xml,$password,$serviceid);
					
					
					$stmt1 = $conn1->prepare("INSERT INTO ".$dblog2.".sendauthenticate_request (url,param,senttime,response,msisdn,clickid,txnid) VALUES (?,?,?,?,?,?,?)");
						$stmt1->bind_param("sssssss",$url, $xml,$date,$request,$msisdn,$clickid,$txnid);	
						$stmt1->execute();
					
					$array_data = json_decode(json_encode(simplexml_load_string($request)), true);
					
					//print_r($array_data);
					// $package=$array_data['payload']['purchase-options']['packages']['package']['id'];
			
			return $array_data;
			
}



function usage_charge($clickid,$msisdn,$serviceid,$packageid,$txnid)
{
	//echo "hi";exit;
include "includes/dbdetail.php";
$date=date("Y-m-d H:i:s");
/*if($serviceid==4)
{
	$mode='staging';
}*/
	$sql="select * from ".$db.".decoupling_url where mode='".$mode."'";
		$result1 = $conn1->query($sql);
			//$numrows1=$result1->num_rows;
			
				while($row2 = $result1->fetch_assoc()) {
				
					$url5=$row2['url'];
					//$advid=$row2['advid'];
				}
	$sql="select * from ".$db.". service where serviceid='".$serviceid."'";
		$result1 = $conn1->query($sql);
			//$numrows1=$result1->num_rows;
			
				while($row = $result1->fetch_assoc()) {
				
					$servicename=$row['servicename'];
					$servicecode=$row['servicecode'];
					$username=$row['serviceusername'];
					$password=$row['servicepassword'];
				}
			
				
			$xml='<er-request id="100004" client-application-id="'.$username.'" purchase_locale="en_ZA" language_locale="en_ZA"> 
			<payload> 
			<purchase>
			<charging-id type="msisdn">'.$msisdn.'</charging-id> 
			<package-id>'.$packageid.'</package-id> 
			<rating-attributes> 
			<asset-id>tips videos</asset-id> 
			<content-name>'.$servicename.'</content-name> 
			<external-trans-id>'.$txnid.'</external-trans-id> 
			<partner-id>'.$username.'</partner-id> 
			</rating-attributes> 
			</purchase> 
			</payload> 
			</er-request>
			';
	
			$request=sendrequest($url5,$xml,$password,$serviceid);
			
			$stmt1 = $conn1->prepare("INSERT INTO ".$dblog.".request_charge (url,param,senttime,response,msisdn,clickid,txnid) VALUES (?,?,?,?,?,?,?)");
				$stmt1->bind_param("sssssss",$url5, $xml,$date,$request,$msisdn,$clickid,$txnid);	
				$stmt1->execute();
			
			$array_data = json_decode(json_encode(simplexml_load_string($request)), true);
					
					//print_r($array_data);
					$package=$array_data['payload']['purchase-options']['packages']['package']['id'];
	
	return $request;
	
}

function selfcare($clickid,$msisdn,$serviceid,$packageid,$txnid)
{
	//echo "hi";exit;
include "includes/dbdetail.php";
$date=date("Y-m-d H:i:s");
/*if($serviceid==4)
{
	$mode='staging';
}*/
	$sql="select * from ".$db.".decoupling_url where mode='".$mode."'";
		$result1 = $conn1->query($sql);
			//$numrows1=$result1->num_rows;
			
				while($row2 = $result1->fetch_assoc()) {
				
					$url5=$row2['url'];
					//$advid=$row2['advid'];
				}
	$sql="select * from ".$db.". service where serviceid='".$serviceid."'";
		$result1 = $conn1->query($sql);
			//$numrows1=$result1->num_rows;
			
				while($row = $result1->fetch_assoc()) {
				
					$servicename=$row['servicename'];
					$servicecode=$row['servicecode'];
					$username=$row['serviceusername'];
					$password=$row['servicepassword'];
					$p1=$row['package'];
				}
			
				
		
	
	
			$xml='<er-request id="100005" client-application-id="'.$username.'" purchase_locale="en_ZA" language_locale="en_ZA"> 
			<payload> 
			<selfcare-subscriptions-request> 
			<msisdn>'.$msisdn.'</msisdn> 
			<subscription-filter> 
			<transactions-not-required>yes</transactions-not-required> 
			<add-services>true</add-services> 
			<package-id>'.$p1.'</package-id> 
			<partner-id>'.$username.'</partner-id> 
			</subscription-filter> 
			</selfcare-subscriptions-request> 
			</payload> 
			</er-request>';
	
	
	
			$request=sendrequest($url5,$xml,$password,$serviceid);
			
			$stmt1 = $conn1->prepare("INSERT INTO ".$dblog.".selfcare (url,param,senttime,response,msisdn,clickid,txnid) VALUES (?,?,?,?,?,?,?)");
				$stmt1->bind_param("sssssss",$url5, $xml,$date,$request,$msisdn,$clickid,$txnid);	
				$stmt1->execute();
			
			$array_data = json_decode(json_encode(simplexml_load_string($request)), true);
					
					//print_r($array_data);
					//$package=$array_data['payload']['purchase-options']['packages']['package']['id'];
	
	return $array_data;
	
}

function sendmessage($msisdn,$data)
{
	return;
	exit;
	include "includes/dbdetail.php";
	$date=date("Y-m-d H:i:s");
	$params='';
	$headers = array(
			"Content-type: application/x-www-form-urlencoded",
			
			"Connection: close",
			"Authorization: Basic c3Ztb2JpOlFQZ2ZHOVN6M05KZ0o1SzgzMmpL",
		);
	
	//$url = "http://xhg-lb1.higate.co.za:8888/hg_request";
	
	  $url="http://smsgw.mobixone.co.za/xml/send?number=+".urlencode($msisdn)."&message=".urlencode($data);
	
	//exit;
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "$url",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
			"authorization: Basic c3Ztb2JpOlFQZ2ZHOVN6M05KZ0o1SzgzMmpL",
			"cache-control: no-cache",
			
		  ),
		));

		$data2 = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
		  //echo $data2;
		}
		
		
		
		
		
		
		
		$stmt1 = $conn1->prepare("INSERT INTO ".$dblog.".sendmessage (url,response,senttime) VALUES (?,?,?)");
				$stmt1->bind_param("sss",$url, $data2,$date);	
				
				
	$stmt1->execute();
		
		
		
		
		
	return $data2;
	
}

function inactive($clickid,$msisdn,$serviceid,$packageid,$txnid,$subscriptionid)
{
	//echo $msisdn;exit;
include "includes/dbdetail.php";
$date=date("Y-m-d H:i:s");
/*if($serviceid==4)
{
	$mode='staging';
}*/
	$sql="select * from ".$db.".decoupling_url where mode='".$mode."'";
	
		$result1 = $conn1->query($sql);
			//$numrows1=$result1->num_rows;
			
				while($row2 = $result1->fetch_assoc()) {
				
					$url5=$row2['url'];
					//$advid=$row2['advid'];
				}
	$sql="select * from ".$db.". service where serviceid='".$serviceid."'";
		$result1 = $conn1->query($sql);
			//$numrows1=$result1->num_rows;
			
				while($row = $result1->fetch_assoc()) {
				
					$servicename=$row['servicename'];
					$servicecode=$row['servicecode'];
					$username=$row['serviceusername'];
					$password=$row['servicepassword'];
				}
			
			$xml='<er-request id="100002" client-application-id="'.$username.'" purchase_locale="en_ZA" language_locale="en_ZA"> 
			<payload> 
			<inactivate-subscription> 
			<charging-id type="msisdn">'.$msisdn.'</charging-id> 
			<subscription-id>'.$subscriptionid.'</subscription-id>  
			<csr-id>'.$username.'</csr-id>        
			<reason>Summer Promo Correction</reason>
			</inactivate-subscription> 
			</payload> 
			</er-request>
			';
			
			
			//echo $xml;exit;
	
			$request=sendrequest($url5,$xml,$password,$serviceid);
			//$request=1;
			$xml='';
			
			
		//	echo "INSERT INTO ".$dblog.".inactivate (url,param,senttime,response,msisdn,clickid,txnid) values('$url5','$xml','$date','$request','$msisdn','$clickid','$txnid')";exit;
			$stmt1 = $conn1->prepare("INSERT INTO ".$dblog.".inactivate (`url`,`param`,`senttime`,`response`,`msisdn`,`clickid`,`txnid`) VALUES (?,?,?,?,?,?,?)");
				$stmt1->bind_param("sssssss",$url5,$xml,$date,$reque,$msisdn,$clickid,$txnid);	
				$stmt1->execute();
			//echo $stmt1;exit;
			$array_data = json_decode(json_encode(simplexml_load_string($request)), true);
					
				//	print_r($array_data);
					//$package=$array_data['payload']['purchase-options']['packages']['package']['id'];
	
	return $array_data;
	
}





function sendrequest($url,$params,$password,$serviceid)
{
	//$url="http://club.funzone.mobi/vodacom/staging/callback";
	//echo "hi";
	
//	echo $url."<br>";
	
	


if($serviceid >=6)//testids
{
$headers = array(
			"Content-type: application/xml",
			"Authorization:Basic RENCX1NWTU9CSToyaXA1Z3puYXlqMTJzNw==",
		);
		
}
else{  
$headers = array(
			"Content-type: application/xml",
			"Authorization:Basic RENCX1NWTU9CSTpjcno1dGU3aXVxa3c0Mg==",
		);
}

//Basic RENCX1NWTU9CSToyaXA1Z3puYXlqMTJzNw==
//print_r($headers);

	//"Authorization:Basic RENCX1NWTU9CSTpjcno1dGU3aXVxa3c0Mg==",
	//$url = "http://xhg-lb1.higate.co.za:8888/hg_request";
		$ch = curl_init(); 
		curl_setopt($ch, CURLOPT_URL,$url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 10);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

		 $data2 = curl_exec($ch); 
		//echo $data2;
		//exit;
		if(curl_errno($ch))
			print curl_error($ch);
		else
			curl_close($ch);			
					$array_data = json_decode(json_encode(simplexml_load_string($data2)), true);	
			
			
		//	echo "headers==";
		//	print_r($headers);
		//	echo "<br><br>URl==".$url;
		//	echo "<br><br>params==".$params,"<br><br>response==";
			//print_r($array_data);
			//exit;
		// $statuscode2=$array_data ['@attributes']['status_code'];
	//print_r($array_data);
	
	
	
		return $data2;
	
	
	
	
	
}


function decrypt($chun)
{
	//echo "hi";
		$fopen_private = fopen("1.pem","r");
		$private_key = fread($fopen_private,8192);
		fclose($fopen_private);

		if (!$privateKey = openssl_pkey_get_private($private_key))
		{
			die('Private Key failed');
		}
		 $a_key = openssl_pkey_get_details($privateKey);
		//var_dump($privateKey); 
		// Decrypt the data in the small chunks
		//print_r($privateKey);
		$chunkSize = ceil($a_key['bits']);
		$output = '';
		
		$chunk=hex2bin($chun); //$chunk=hex2bin('0590240835cbd0e68134620fed83332b47b7b14b28b9c4907ab101ddb56c686b698ce54a0f3cb0527b49b2f761fbe7f478194c2e787eedda2c25cef663acff2602c8ea60bf14485dfd3acfd98f9cb7207d40029d72512e1f151d13a62c43f89e94fd43be54cce0ca513317b70f15c4bf7cf7cea00e0ffea8a82de669914e6d7b0d2f5c81dae725a49ec24cff91700401ee3e2e00caec9af56d8630bc57f53e06b495476c33452c17f16150bc8b16f014340f77eebe5f0f4e80d923250fe3da25f10bb17308378aa4c34c17ca4fa43fbcc1b4954b8537c9795f71dd2297cf905c2952daebca74d7b3100af5b03aa272201b9c5fa2337532b566e5005e3ab0fd47');

			if (!openssl_private_decrypt($chunk, $decrypted, $privateKey))
			{
				die('Failed to decrypt data');
			}
			$output .= $decrypted;

		openssl_free_key($privateKey);
		 
		// Uncompress the unencrypted data.
		//$output = gzuncompress($output);
		 
		
		return $output;
}


/*
function callback($clickid,$spil,$serviceid)
{
	
	include "includes/dbdetail.php";
	echo "hi";
	
		
	$sql23 = "SELECT * from ".$db.".callbackresponse  where clickid=".$clickid;
	$me=$conn1->query($sql23);
	
	 $rowcount22=mysqli_num_rows($me); 
	if ($rowcount22<1)
	{
		
		
		  $sql = "SELECT activeuserlog.advertiserid advid,cutoff,callbackurl,nextdaycutoff,advertclickid,pubid from ".$dblog.".userlog activeuserlog inner join ".$db.".advertiser on activeuserlog.advertiserid = advertiser.advertiserid where clickid='".$clickid."'";
		foreach ($conn1->query($sql) as $row) {
			$callback= $row['callbackurl'] ;
			$cutoff=$row['cutoff'];
			$advid=$row['advid'];
			$nextdaycutoff=$row['nextdaycutoff'];
			$advertclickid=$row['advertclickid'];
			$pubid=$row['pubid'];
		}
		   $sql1 = "select * from ".$db.".callbackwavier where advid='".$advid."'";
		foreach ($conn1->query($sql1) as $row1) {
			//$callback= $row['callbackurl'] ;
			$count1=$row1['count'];
			$nextdaycount=$row1['nextdaycutoff'];
			$advid=$row1['advid'];
			
		
		}
		
		if($spil == 0)
		{
			$count=$count1;
			$setcount='count';
			$perc=20*$cutoff/100;
			
		}
		else{
			$count=$nextdaycount;
			$setcount='nextdaycutoff';
			$perc=20*$nextdaycutoff/100;
			
		}
		
		
		
			
		
			if (strpos($callback,"[pubid]"))
			{
				//echo "<br>Hi";
				$callback=str_replace("[pubid]",$pubid,$callback);
				
			}
			if (strpos($callback,"[clickid]"))
			{
				$url1=str_replace("[clickid]",$advertclickid,$callback);
				
			}
			
		
		if($count > $perc)
		{
			
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
			$stmt1 = $conn1->prepare("INSERT INTO ".$db.".callbackresponse(requesttime,callbackurl,callbackresponse,advertiserid,clickid,advertclickid,issent,spilower,serviceid) VALUES (?,?,?,?,?,?,?,?,?)");
			 $stmt1->bind_param("sssssssss",$receivedate,$url1,$data,$advid,$clickid,$advertclickid,$issent,$spil,$serviceid) ; 
			 $stmt1->execute();		
				
			$count--;
			//$nextdaycount--;
			$sql = "UPDATE ".$db.".callbackwavier  SET ".$setcount."=".$count." WHERE advid=".$advid;

			// Prepare statement
			$stmt = $conn1->prepare($sql);

			// execute the query
			$stmt->execute();
			
			$sql22 = "UPDATE ".$db.".subscriber  SET cbsent=1 WHERE clickid='".$clickid."'";

			// Prepare statement
			$stmt22 = $conn1->prepare($sql22);

			// execute the query
			$stmt22->execute();
			
			
			if($count==0)
			{
				$sql = "UPDATE ".$db.".callbackwavier  SET ".$setcount."='20' WHERE advid=".$advid;
				$stmt = $conn1->prepare($sql);
				$stmt->execute();
			}
			
			
		}
		else{
			$issent='0';
			$data='';
			$receivedate =date('Y-m-d H:i:s');
			//echo "INSERT INTO ".$db.".callbackresponse(requesttime,callbackurl,callbackresponse,advertiserid,clickid,advertclickid,issent)values('$receivedate','$url1','$data','$advid','$clickid','$advertclickid','$issent')";
			$stmt1 = $conn1->prepare("INSERT INTO ".$db.".callbackresponse(requesttime,callbackurl,callbackresponse,advertiserid,clickid,advertclickid,issent,spilower,serviceid) VALUES (?,?,?,?,?,?,?,?,?)");
			 $stmt1->bind_param("sssssssss",$receivedate,$url1,$data,$advid,$clickid,$advertclickid,$issent,$spil,$serviceid) ; 
			 $stmt1->execute();		
			
			
			$count--;
		 	$sql = "UPDATE ".$db.".callbackwavier  SET ".$setcount."=".$count." WHERE advid=".$advid;

		// Prepare statement
			$stmt = $conn1->prepare($sql);

		// execute the query
			$stmt->execute();
			
			if($count==0)
			{
				$sql = "UPDATE ".$db.".callbackwavier  SET ".$setcount."='20' WHERE advid=".$advid;
				$stmt = $conn1->prepare($sql);
				$stmt->execute();
			}
			
			
		}
		if($count == 0)
		{
			
			$sql3 = "UPDATE ".$db.".callbackwavier  SET ".$setcount."='20' WHERE advid=".$advid;

		
			$stmt = $conn1->prepare($sql3);

		
			$stmt->execute();
			
		}
		
		
	}
}

*/


function callback($clickid,$serviceid,$advid,$chage) // remove _original for previous code
{
	//echo "Hi2";exit;
	include "includes/dbdetail.php";
	$conn=$conn1;
	
	
	echo "<br>clickid=".$clickid;
	echo "<br>serviceid=".$serviceid;
	echo "<br>advid=".$advid;
	echo "<br>chage=".$chage;
	
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





