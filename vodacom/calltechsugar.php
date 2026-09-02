<?php


include "includes/dbdetail.php";
include "function.php";
error_reporting(0);
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



	$dataPOST = trim(file_get_contents('php://input'));

	$array_data = json_decode(json_encode(simplexml_load_string($dataPOST)), true);
 $string_version = implode(',', $array_data);

 
//$data=$array_data['Response'];
//print_r($array_data);

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
	
	
	
	

	
	 $transactionid=$array_data['@attributes']['external-trans-id'];
	 $apiid=$array_data['@attributes']['id'];
	 $status=$array_data['payload']['usage-authorisation']['is-success'];
	    $subcriptionid=$array_data['payload']['usage-authorisation']['package-subscription-id'];
		$word='consent';
		
		if($apiid=='100001' && strpos($dataPOST, $word) !== false)
		{
			
			$sql="select * from ".$db.". subscriber where txnid='".$transactionid."' order by id desc limit 1";
			$result1 = $conn1->query($sql);
			//$numrows1=$result1->num_rows;
			
				while($row = $result1->fetch_assoc()) {
				
				$advid=$row['advid'];
				$msisdn=$row['msisdn'];
				}
			
			$key='external-trans-id="'.$transactionid.'"';
			$sendid='"external-trans-id="'.$transactionid."_".$msisdn.'"';
			
			$datapp= str_replace($key, $sendid, $dataPOST);
			//echo $datapp;
			//exit;
		
			if($advid==77)
			{
				/*
				$urlsugar='http://139.59.13.146/h/data_sv.php';
				
				
				$curl = curl_init();

				curl_setopt_array($curl, array(
				  CURLOPT_URL => $urlsugar,
				  CURLOPT_RETURNTRANSFER => true,
				  CURLOPT_ENCODING => "",
				  CURLOPT_MAXREDIRS => 10,
				  CURLOPT_TIMEOUT => 30,
				  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				  CURLOPT_CUSTOMREQUEST => "POST",
				  CURLOPT_POSTFIELDS =>$datapp,
				  CURLOPT_HTTPHEADER => array(
					"cache-control: no-cache",
					"content-type: application/xml"
				  ),
				));
					
					$response = curl_exec($curl);
					$err = curl_error($curl);

					curl_close($curl);

					if ($err) {
					  echo "cURL Error #:" . $err;
					} else {
					  echo $response;
					}
				*/
			}
				
		}
		
		
	
	if($apiid=='100008' and $status=='true')
	{
		$sql="select * from ".$db.". subscriber where txnid='".$transactionid."' order by id desc limit 1";
		$result1 = $conn1->query($sql);
			//$numrows1=$result1->num_rows;
			
				while($row = $result1->fetch_assoc()) {
					$id=$row['id'];
					$msisdn=$row['msisdn'];
					$clickid=$row['clickid'];
					$advid=$row['advid'];
					$serviceid=$row['serviceid'];
					$servicename=$row['servicename'];
					$servicecode=$row['servicecode'];
					$token=$row['token'];
					$packageid=$row['packageid'];
					$chargeid=$row['chargeid'];
					$charging=$row['charging_mode'];
					$data=$row['token'];
					$try=$row['try'];
					$txnid=$row['txnid'];
					$chargeid=$row['chargeid'];
					$cbsent=$row['cbsent'];
					
				}
			if($serviceid==3)
			{
				$amount=2;
			}
			else{
				$amount=5;
			}
			
			
			if($charging=='first')
			{
				$charging_mode='act';
				$date=date('Y-m-d H:i:s');
				$subscriptionenddate=date('Y-m-d H:i:s', strtotime( ' +1 day'));
			 	$sql1 = "UPDATE ".$db.".subscriber  SET charging_mode='".$charging_mode."' ,amount='".$amount."',subscriptionstartdate='".$date."',subscriptionenddate='".$subscriptionenddate."',subscriptionid='".$subcriptionid."'   WHERE clickid='".$clickid."'";

				$stmt = $conn1->prepare($sql1);
				$st=$stmt->execute();
				
				$spill=0;
				
				
				
				
				if($serviceid==1){
				$data="You are subscribed to ".$servicename." at R5 per day. To Unsubscribe, Go To http://club.funzone.mobi/worldforher/ ";
				}
				elseif ($serviceid==2)
				{
				
					$data="You are subscribed to ".$servicename." at R5 per day. To Unsubscribe, Go To http://club.funzone.mobi/fitnessguru/ ";
				
				}
				else{
					
					$data="You are subscribed to ".$servicename." at R2 per day. To Unsubscribe, Go To http://club.funzone.mobi/beautytips/ ";
					
				}
				
				
				$sendmessage=sendmessage($msisdn,$data);
				
				
				
				
				
				
				
				$callback=callback($clickid,$spill,$serviceid);
				
				
				
			
			}
			else if($charging=='act')
			{
				$charging_mode='ren';
				
				$date=date('Y-m-d H:i:s');
				$subscriptionenddate=date('Y-m-d H:i:s', strtotime( ' +1 day'));
				
				$stmt1 = $conn1->prepare("INSERT INTO ".$db.".subscriber (msisdn,clickid, advid, charging_mode,subscriptionstartdate, subscriptionenddate, amount, serviceid, servicename, servicecode, token, packageid, try,txnid,chargeid,cbsent,subscriptionid) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
				$stmt1->bind_param("sssssssssssssssss",$msisdn,$clickid,$advid, $charging_mode,$date,$subscriptionenddate,$amount,$serviceid,$servicename,$servicecode,$data,$packageid,$try,$txnid,$chargeid,$cbsent,$subcriptionid);	
				$stmt1->execute();
					
				
			}
			
			else if($charging=='low')
			{
				$charging_mode='act';
				
				$date=date('Y-m-d H:i:s');
				$subscriptionenddate=date('Y-m-d H:i:s', strtotime( ' +1 day'));
				
				$stmt1 = $conn1->prepare("INSERT INTO ".$db.".subscriber (msisdn,clickid, advid, charging_mode,subscriptionstartdate, subscriptionenddate, amount, serviceid, servicename, servicecode, token, packageid, try,txnid,chargeid,subscriptionid) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
				$stmt1->bind_param("ssssssssssssssss",$msisdn,$clickid,$advid, $charging_mode,$date,$subscriptionenddate,$amount,$serviceid,$servicename,$servicecode,$data,$packageid,$try,$txnid,$chargeid,$subcriptionid);	
				$stmt1->execute();
				
				$spill=1;
				
				$callback=callback($clickid,$spill,$serviceid);

				
				
			}
			
			else{
				$charging_mode='ren';
				
				
				$date=date('Y-m-d H:i:s');
				$subscriptionenddate=date('Y-m-d H:i:s', strtotime( ' +1 day'));
				
				$stmt1 = $conn1->prepare("INSERT INTO ".$db.".subscriber (msisdn,clickid, advid, charging_mode,subscriptionstartdate, subscriptionenddate, amount, serviceid, servicename, servicecode, token, packageid, try,txnid,chargeid,cbsent,subscriptionid) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
				$stmt1->bind_param("sssssssssssssssss",$msisdn,$clickid,$advid, $charging_mode,$date,$subscriptionenddate,$amount,$serviceid,$servicename,$servicecode,$data,$packageid,$try,$txnid,$chargeid,$cbsent,$subcriptionid);	
				$stmt1->execute();
			}
		
				
				
				
			
			
			
			if($charging_mode=='act1')
			{
				
				
				
				if($serviceid==1){
				$data="You are subscribed to ".$servicename." at R5 per day. To Unsubscribe, Go To http://club.funzone.mobi/worldforher/ ";
				}
				elseif ($serviceid==2)
				{
				
					$data="You are subscribed to ".$servicename." at R5 per day. To Unsubscribe, Go To http://club.funzone.mobi/fitnessguru/ ";
				
				}
				else{
					
					$data="You are subscribed to ".$servicename." at R2 per day. To Unsubscribe, Go To http://club.funzone.mobi/beautytips/ ";
					
				}
				
				
				$sendmessage=sendmessage($msisdn,$data);
				
				
				
				
				
				
			}
			
			
			
			
			
	}
	
	
	else{
		if($apiid=='100008')
		{
		$sql="select * from ".$db.". subscriber where txnid='".$transactionid."' order by id desc limit 1";
		$result1 = $conn1->query($sql);
			//$numrows1=$result1->num_rows;
			
				while($row = $result1->fetch_assoc()) {
					$id=$row['id'];
					$msisdn=$row['msisdn'];
					$clickid=$row['clickid'];
					$advid=$row['advid'];
					$serviceid=$row['serviceid'];
					$servicename=$row['servicename'];
					$servicecode=$row['servicecode'];
					$token=$row['token'];
					$packageid=$row['packageid'];
					$chargeid=$row['chargeid'];
					$charging=$row['charging_mode'];
					$data=$row['token'];
					$try=$row['try'];
					$txnid=$row['txnid'];
					$chargeid=$row['chargeid'];
					
				}
			if($serviceid==3)
			{
				$amount=2;
			}
			else{
				$amount=5;
			}
			
			
			if($charging=='first')
			{
				$charging_mode='low';
				$amount=0;
				$subscriptionenddate=date('Y-m-d H:i:s', strtotime( ' +1 day'));
				$sql1 = "UPDATE ".$db.".subscriber  SET charging_mode='".$charging_mode."' ,amount='".$amount."',subscriptionenddate='".$subscriptionenddate."' ,subscriptionid='".$subcriptionid."'  WHERE clickid='".$clickid."'";

			
				$stmt = $conn1->prepare($sql1);
				
				$st=$stmt->execute();
			
			}
		
			if($charging=='grace')
			{
				$charging_mode='grace';
				$amount=0;
				$subscriptionenddate=date('Y-m-d H:i:s', strtotime( ' +1 day'));
				$sql1 = "UPDATE ".$db.".subscriber  SET charging_mode='".$charging_mode."' ,amount='".$amount."',subscriptionenddate='".$subscriptionenddate."' ,subscriptionid='".$subcriptionid."'  WHERE clickid='".$clickid."'";

			
				$stmt = $conn1->prepare($sql1);
				
				$st=$stmt->execute();
			
			}
		
		}
	
	}
	



?>