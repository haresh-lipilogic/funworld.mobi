<?php







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
	
	
	/*
	
	Array
(
[sourceTransactionId] => 01405865-0780-4a41-b8fd-fc8709b96b8e
[status] => TRANSACTION SUCCESSFUL
[transaction-id] => b6614c52809cef848321a92b
[partner-id] => dcb_svmobi
[partner-name] => svmobi
[service-id] => vc-svmobi-worldforher-01
[partner-redirect-url] => http://funworld.mobi/vd2stag/redirect.php
[partner-callback-url] => https://funworld.mobi/vd2stag/callback.php
[client-txn-id] => zavod17472975460491211
[package-id] => package:p-svmobi-worldforher-c-01_TAX_3_8_999_999_999_*_*_*_false_false_*
[subscription-id] => 2400284
[reason] => undefined
)*/
	
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
exit;	
	
}

$sql="select * from ".$db.". subscriber where clickid='".$clickid."' order by id desc limit 1";
		$result1 = $conn1->query($sql);
			//$numrows1=$result1->num_rows;
			
				while($row = $result1->fetch_assoc()) {
					
					$msisdn=$row['msisdn'];
					$clickid=$row['clickid'];
					$advid=$row['advid'];
					$charge1=$row['charging_mode'];
					$serviceid1=$row['serviceid'];
					
					
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
	$subscriptionenddate = date('Y-m-d H:i:s', strtotime($receivedate . ' +24 hours'));
	$subscriptionstartdate =date('Y-m-d H:i:s');
	$stmt1 = $conn1->prepare("INSERT INTO ".$db.".subscriber(`msisdn`, `clickid`, `advid`, `charging_mode`, `subscriptionstartdate`, `subscriptionenddate`, `amount`, `serviceid`, `txnid`, `subscriptionid`, `xvczaacr`) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
				$stmt1->bind_param("sssssssssss",$msisdn,$clickid,$advid,$charging_mode,$subscriptionstartdate,$subscriptionenddate,$amount,$serviceid1,$transactionid,$subscriptionid,$packageid);	
				
				
	$stmt1->execute();
	
	
}
else{
	
	
	
	
}




?>