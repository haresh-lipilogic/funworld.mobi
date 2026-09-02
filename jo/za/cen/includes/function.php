<?php

include "dbdetail.php";


function httpPost($url,$params)
{
  $postData = '';
   //create name value pairs seperated by &
   foreach($params as $k => $v) 
   { 
      $postData .= $k . '='.$v.'&'; 
   }
   $postData = rtrim($postData, '&');
	
	
	$header=array("Accept: application/json","Host: gamesworld.me",
	   "Content-Length: " . strlen($postData));
	
    $ch = curl_init();  
 
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_HTTPHEADER, $header); 
    curl_setopt($ch, CURLOPT_POST, count($postData));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);    
 
    $output=curl_exec($ch);
 
    curl_close($ch);
    return $output;
 
}




function postrequest($url,$params)
{
	include "dbdetail.php";
	$date=date("Y-m-d H:i:s");
	//$data_string=arrayToXml($params);
	//$data_string=json_encode($params);
	//echo ($data_string);exit;
	
	
	
	
	
	
	$curl = curl_init();

	curl_setopt_array($curl, array(
	  CURLOPT_URL => $url,
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => "",
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 30,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_FOLLOWLOCATION => TRUE,
	  CURLOPT_SSL_VERIFYPEER => false,
	  CURLOPT_CUSTOMREQUEST => "POST",
	  CURLOPT_POSTFIELDS => $params,
	  CURLOPT_HTTPHEADER => array(
		"Content-Type: application/json",
	   "Content-Length: " . strlen($data_string)
		 
	  ),
	));

	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);

	if ($err) {
	 // echo "cURL Error #:" . $err;
	} else {
	  //echo $response;
	}
		//print_r($response);
		//exit;
		$stmt1 = $conn1->prepare("INSERT INTO ".$dblog.".requestsub (accesstime,url,request,result) VALUES (?,?,?,?)");
			$stmt1->bind_param("ssss",$date,$url,$data_string,$response);
			$stmt1->execute();

			$response1=json_decode($response,true);
			return $response1;

}


function arrayToXml($array, $rootElement = null, $xml = null) { 
    $_xml = $xml; 
      
    // If there is no Root Element then insert root 
    if ($_xml === null) { 
        $_xml = new SimpleXMLElement($rootElement !== null ? $rootElement : '<root/>'); 
    } 
      
    // Visit all key value pair 
    foreach ($array as $k => $v) { 
          
        // If there is nested array then 
        if (is_array($v)) {  
              
            // Call function for nested array 
            arrayToXml($v, $k, $_xml->addChild($k)); 
            } 
              
        else { 
              
            // Simply add child element.  
            $_xml->addChild($k, $v); 
        } 
    } 
      
    return $_xml->asXML(); 
} 



function sendrequest($url,$params,$clickid)
{
	include "dbdetail.php";
	$receivedate =date('Y-m-d H:i:s');

	
	$length=strlen($params);
		$headers = array(
			"Content-Type: text/xml"
		);
	
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
		
		if(curl_errno($ch))
			print curl_error($ch);
		else
			curl_close($ch);			
					//$array_data = json_decode(json_encode(simplexml_load_string($data2)), true);	
			
			//echo $data2;exit;
			
				$stmt1 = $conn1->prepare("INSERT INTO ".$dblog.".sendrequest (url,param,sendtime,response,clickid) VALUES (?,?,?,?,?)");
				$stmt1->bind_param("sssss",$url,$params,$receivedate,$data2,$clickid);	
				$stmt1->execute();
			
	
		return $data2;
	
	
}

function getClientIp1() {
			 $ipaddress = null;
			 if ($_SERVER['HTTP_CLIENT_IP']) {
				$ipaddress = $_SERVER['HTTP_CLIENT_IP'];
			 } else if ($_SERVER['HTTP_X_FORWARDED_FOR']) {
				$ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
			 } else if ($_SERVER['HTTP_X_FORWARDED']) {
				$ipaddress = $_SERVER['HTTP_X_FORWARDED'];
			 } else if ($_SERVER['HTTP_FORWARDED_FOR']) {
				$ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
			 } else if ($_SERVER['HTTP_FORWARDED']) {
				$ipaddress = $_SERVER['HTTP_FORWARDED'];
			 } else if ($_SERVER['REMOTE_ADDR']) {
				$ipaddress = $_SERVER['REMOTE_ADDR'];
			}
			return $ipaddress; 
		}


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




	
		
		
?>