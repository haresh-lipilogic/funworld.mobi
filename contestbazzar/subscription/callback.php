<?php

include("includes/dbdetail.php");
$pageurl='http://'.$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$date=date('Y-m-d H:i:s');
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


//echo "Hi";
$insert1="INSERT INTO ".$db.".paytm_callback(`url`,`param`,`date`) VALUES('".$pageurl."','".$output."','".$date."')";   
				
$res_insert=$conn1->query($insert1);



    // following file need to be included
     require_once("paytm/encdec_paytm.php");
	$orderId =$_POST['ORDERID'];
    $merchantMid = $_POST['MID'];
    $merchantKey = "uNYx6qm4FEzRKKWh";
    $paytmParams["MID"] = $merchantMid;
    $paytmParams["ORDERID"] = $orderId; 
    $paytmChecksum = getChecksumFromArray($paytmParams, $merchantKey);
    $paytmParams['CHECKSUMHASH'] = urlencode($paytmChecksum);
	$postData = json_encode($paytmParams, JSON_UNESCAPED_SLASHES);
    $connection = curl_init(); // initiate curl
    // $transactionURL = "https://securegw.paytm.in/merchant-status/getTxnStatus"; // for production
    $transactionURL = "https://securegw.paytm.in/merchant-status/getTxnStatus";
    curl_setopt($connection, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($connection, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($connection, CURLOPT_URL, $transactionURL);
    curl_setopt($connection, CURLOPT_POST, true);
    curl_setopt($connection, CURLOPT_POSTFIELDS, $postData);
    curl_setopt($connection, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($connection, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    $responseReader = curl_exec($connection);
    $responseData = json_decode($responseReader, true);
   // echo "<pre>data ="; print_r($responseData); echo "</pre>";
	 $status=$responseData['STATUS'];
	$clickid=$_GET['clickid'];
	$paytmtxn=$responseData['TXNID'];
	if($status=='TXN_SUCCESS')
	{
		
		 $insert1="update ".$db.".subscriber set `paytmresponse`='".$status."' ,paytmtxnid='".$paytmtxn."'   where clickid='".$clickid."'";   
				
			$res_insert=$conn1->query($insert1);
		
		
		
		
		
		header ('location:thanks1.php?clickid='.$_GET['clickid']);
		exit;
		
		
	}
	ELSE{
		
		 $insert1="update ".$db.".subscriber set `paytmresponse`='".$status."' ,paytmtxnid='".$paytmtxn."'   where clickid='".$clickid."'";   
				
			$res_insert=$conn1->query($insert1);
		echo "Hi . your payment has been not processed successful, please try again .";
	}
	exit;
	
?>







<html>
   <head>
     <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
     <title>Paytm Secure Online Payment Gateway</title>
   </head>
   <body>
      <table align='center'>
            <tr>
            <td><STRONG>Transaction is being processed,</STRONG></td>
            </tr>
            <tr>
            <td><font color='blue'>Please wait ...</font></td>
            </tr>
            <tr>
            <td>(Please do not press 'Refresh' or 'Back' button</td>
            </tr>
      </table>
	  <!--
	  
	  
	  
	  
	  
	  -->
      <FORM NAME='TESTFORM' ACTION='https://securegw-stage.paytm.in/merchant-status/getTxnStatus ' METHOD='POST'>
            <input type='hidden' name='CURRENCY' value=<?php echo $_REQUEST['CURRENCY'];?>>
            <input type='hidden' name='CUST_ID' value=<?php echo $_REQUEST['clickid'];?>>
            <input type='hidden' name='GATEWAYNAME' value=<?php echo $_REQUEST['GATEWAYNAME'];?>>
            <input type='hidden' name='RESPMSG' value=<?php echo $_REQUEST['RESPMSG'];?>>
            <input type='hidden' name='BANKNAME' value=<?php echo $_REQUEST['BANKNAME'];?>>
            <input type='hidden' name='PAYMENTMODE' value=<?php echo $_REQUEST['PAYMENTMODE'];?>>
            <input type='hidden' name='MID' value=<?php echo $_REQUEST['MID'];?>>
            <input type='hidden' name='RESPCODE' value=<?php echo $_REQUEST['RESPCODE'];?>>
            <input type='hidden' name='TXNID' value=<?php echo $_REQUEST['TXNID'];?>>
            <input type='hidden' name='TXNAMOUNT' value=<?php echo $_REQUEST['TXNAMOUNT'];?>>
            <input type='hidden' name='ORDERID' value=<?php echo $_REQUEST['ORDERID'];?>>
            <input type='hidden' name='STATUS' value=<?php echo $_REQUEST['STATUS'];?>>
            <input type='hidden' name='BANKTXNID' value=<?php echo $_REQUEST['BANKTXNID'];?>>
            <input type='hidden' name='TXNDATE' value=<?php echo $_REQUEST['TXNDATE'];?>>
            <input type='hidden' name='CHECKSUMHASH'   value=<?php echo $_REQUEST['CHECKSUMHASH'];?>>
      </FORM>
   </body>
 <script type="text/javascript">  document.forms[0].submit();</script>    
</html>