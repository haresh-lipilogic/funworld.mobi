<?php

function usage_authenticate($clickid,$msisdn,$serviceid,$txnid)
{
			//echo "hi";exit;
		include "includes/dbdetail.php";
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
			
					$request=sendrequest($url,$xml,$password);
					
					
					$stmt1 = $conn1->prepare("INSERT INTO ".$dblog.".sendauthenticate_request (url,param,senttime,response,msisdn,clickid,txnid) VALUES (?,?,?,?,?,?,?)");
						$stmt1->bind_param("sssssss",$url, $xml,$date,$request,$msisdn,$clickid,$txnid);	
						$stmt1->execute();
					
					$array_data = json_decode(json_encode(simplexml_load_string($request)), true);
					
					//print_r($array_data);
					 $package=$array_data['payload']['purchase-options']['packages']['package']['id'];
			
			return $array_data;
			
}

function usage_charge($clickid,$msisdn,$serviceid,$packageid,$txnid)
{
	//echo "hi";exit;
include "includes/dbdetail.php";
$date=date("Y-m-d H:i:s");
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
	
			$request=sendrequest($url5,$xml,$password);
			
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
			<charging-id type="msisdn">'.$msisdn.'</charging-id> 
			<subscription-filter> 
			<transactions-not-required>yes</transactions-not-required> 
			<add-services>true</add-services> 
			<package-id>'.$p1.'</package-id> 
			<partner-id>'.$username.'</partner-id> 
			</subscription-filter> 
			</selfcare-subscriptions-request> 
			</payload> 
			</er-request>';
	
	
	
			$request=sendrequest($url5,$xml,$password);
			
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
			"postman-token: 0ed6924b-4a0b-378e-52d5-0cca4c0c8b57"
		  ),
		));

		$data2 = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
		  echo $data2;
		}
		
		
		
		
		
		
		
		$stmt1 = $conn1->prepare("INSERT INTO ".$dblog.".sendmessage (url,response,senttime) VALUES (?,?,?)");
				$stmt1->bind_param("sss",$url, $data2,$date);	
				
				
	$stmt1->execute();
		
		
		
		
		
	return $data2;
	
}

function inactive($clickid,$msisdn,$serviceid,$packageid,$txnid,$subscriptionid)
{
	//echo "hi";exit;
include "includes/dbdetail.php";
$date=date("Y-m-d H:i:s");
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
	
			$request=sendrequest($url5,$xml,$password);
			//$request=1;
			$stmt1 = $conn1->prepare("INSERT INTO ".$dblog.".inactivate (url,param,senttime,response,msisdn,clickid,txnid) VALUES (?,?,?,?,?,?,?)");
				$stmt1->bind_param("sssssss",$url5, $xml,$date,$request,$msisdn,$clickid,$txnid);	
				$stmt1->execute();
			
			$array_data = json_decode(json_encode(simplexml_load_string($request)), true);
					
					//print_r($array_data);
					//$package=$array_data['payload']['purchase-options']['packages']['package']['id'];
	
	return $array_data;
	
}





function sendrequest($url,$params,$password)
{
	//$url="http://club.funzone.mobi/vodacom/staging/callback";
	//echo "hi";
	
//	echo $url."<br>";
	
//	echo $params;
	
//	exit;
	
		$headers = array(
			"Content-type: application/xml",
			"Content-length: " . strlen($params),
			"Connection: close",
			"Authorization:Basic RENCX1NWTU9CSTpjcno1dGU3aXVxa3c0Mg==",
		);
	
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



