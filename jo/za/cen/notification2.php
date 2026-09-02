<?php
include "includes/dbdetail.php";
error_reporting(0);

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
http://gamesworld.me/tpayalgeria/notification?
action=SubscriptionChargingNotification&
subscriptionContractId=139958354&
customerAccountNumber=637071983514107139&
paymentTransactionStatusCode=NotEnoughCredit&
transactionId=13841575717&
amountCharged=150.00&
billAmount=150.00&
collectedAmount=0.00&
currencyCode=DZD&
paymentDate=&
errorMessage=&
nextPaymentDate=2021-03-01+16%3A29%3A11Z&
productCatalogName=Gamebar_Weekly_Ooredoo_Algeria&
productId=GB1&
billAction=RetrailPayment&
billNumber=71&
msisdn=213549170068&
digest=bqqjzoZUioaX3ImfuG6v%3Abe19be1caddfa68360a6c0e964ac0d17d0672a67f211d6e83b7bab13938779d9


*/
if($_GET['action']=='SubscriptionChargingNotification')
{
	if($_GET['paymentTransactionStatusCode']=='NotEnoughCredit')
	{
		$msisdn=$_GET['msisdn'];
		$action=$_GET['action'];
		$subscriptionContractId=$_GET['subscriptionContractId'];
		$customerAccountNumber=$_GET['customerAccountNumber'];
		$paymentTransactionStatusCode=$_GET['paymentTransactionStatusCode'];
		$transactionId=$_GET['transactionId'];
		$collectedAmount=$_GET['collectedAmount'];
		$errorMessage=$_GET['errorMessage'];
		$nextPaymentDate=$_GET['nextPaymentDate'];
		$productCatalogName=$_GET['productCatalogName'];
		$productId=$_GET['productId'];
		$billNumber=$_GET['billNumber'];
		$digest=$_GET['billNumber'];
		//$amount=0;
		$subscriptionstartdate=date('Y-m-d H:i:s');
		 $sql="select * from ".$db.". subscriber where msisdn='".$msisdn."' and transactionid !='".$transactionId."' order by id desc limit 1";
		$result1 = $conn1->query($sql);
			$numrows1=$result1->num_rows;
				if($numrows1>0)
				{
				while($row = $result1->fetch_assoc()) {
				
						$charging_mode=$row['chargingmode'];
						$clickid=$row['clickid'];
						$advid=$row['advid'];
						
				}
				}
				if($charging_mode=='act')
				{
					$charging='ren';
				}
				else if ($charging_mode=='first')
				{
					$charging='low';
				}
				else{
					$charging='ren';
				}
				
				if($clickid=='')
				{
					$mt = microtime(true);
					$mt =  $mt*1000; //microsecs
					$clickid = "svm".((string)$mt*10).rand(1, 999); 
					$advid=0;
				}
			
			$stmt1 = $conn1->prepare("INSERT INTO ".$db.".subscriber (msisdn,accesstime,clickid,advid,action,subscriptionstartdate,subscriptionenddate,chargingmode,amount,subscriptioncontractid,customeraccountnumber,status,transactionid,collectedamount,errormessage,nextpaymentdate,productcatalogname,productid,billnumber) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
				$stmt1->bind_param("sssssssssssssssssss",$msisdn, $receivedate,$clickid,$advid, $action,$subscriptionstartdate,$nextPaymentDate, $charging,$collectedAmount,$subscriptionContractId, $customerAccountNumber,$paymentTransactionStatusCode,$transactionId, $collectedAmount,$errorMessage,$nextPaymentDate,$productCatalogName,$productId,$billNumber);	
				
			$stmt1->execute();	
				
		
		
	}
	else if($_GET['paymentTransactionStatusCode']=='PaymentCompletedSuccessfully'){
		
		
		$msisdn=$_GET['msisdn'];
		$action=$_GET['action'];
		$subscriptionContractId=$_GET['subscriptionContractId'];
		$customerAccountNumber=$_GET['customerAccountNumber'];
		$paymentTransactionStatusCode=$_GET['paymentTransactionStatusCode'];
		$transactionId=$_GET['transactionId'];
		$collectedAmount=$_GET['collectedAmount'];
		$errorMessage=$_GET['errorMessage'];
		$nextPaymentDate=$_GET['nextPaymentDate'];
		$productCatalogName=$_GET['productCatalogName'];
		$productId=$_GET['productId'];
		$billNumber=$_GET['billNumber'];
		$digest=$_GET['billNumber'];
		//$amount=0;
		$subscriptionstartdate=date('Y-m-d H:i:s');
		$sql="select * from ".$db.". subscriber where msisdn='".$msisdn."' and transactionid !='".$transactionId."' order by id desc limit 1";
		$result1 = $conn1->query($sql);
			 $numrows1=$result1->num_rows;
			if($numrows1>0)
			{
				while($row = $result1->fetch_assoc()) {
				
						$charging_mode=$row['chargingmode'];
						$clickid=$row['clickid'];
						$advid=$row['advid'];
						
				}
			}
			//echo "charging=". $charging_mode;exit;
				if($charging_mode=='act')
				{
					$charging='ren';
				}
				else if($charging_mode=='first')
				{
					$charging='act';
				}
				else{
					$charging='ren';
				}
				
				if($clickid=='')
				{
					$mt = microtime(true);
					$mt =  $mt*1000; //microsecs
					$clickid = "svm".((string)$mt*10).rand(1, 999); 
					$advid=0;
				}
			
			$stmt1 = $conn1->prepare("INSERT INTO ".$db.".subscriber (msisdn,accesstime,clickid,advid,action,subscriptionstartdate,subscriptionenddate,chargingmode,amount,subscriptioncontractid,customeraccountnumber,status,transactionid,collectedamount,errormessage,nextpaymentdate,productcatalogname,productid,billnumber) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
				$stmt1->bind_param("sssssssssssssssssss",$msisdn, $receivedate,$clickid,$advid, $action,$subscriptionstartdate,$nextPaymentDate, $charging,$collectedAmount,$subscriptionContractId, $customerAccountNumber,$paymentTransactionStatusCode,$transactionId, $collectedAmount,$errorMessage,$nextPaymentDate,$productCatalogName,$productId,$billNumber);	
				
			$stmt1->execute();	
		
		
	}
	
	
	
}
