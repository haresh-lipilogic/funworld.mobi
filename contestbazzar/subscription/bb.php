<?php
include "includes/dbdetail.php";

$clickid=$_POST['clickid'];
$mobile=$_POST['mobile'];
$price=$_POST['price'];
$question=$_POST['question'];


$sql24 = "update ".$db.".subscriber set price='".$price."',question='".$question."'  where clickid='".$clickid."' ";
			$me1=$conn1->query($sql24);






$sql="select * from ".$db.".subscriber where clickid = '".$clickid."'";
$res=$conn1->query($sql);
while($row=$res->fetch_assoc())
{
$subscriberid=$row['subscriberid'];
}


 require_once("paytm/encdec_paytm.php");
    define("merchantMid", "Sanvir97071634574784");
    // Key in your staging and production MID available in your dashboard
    define("merchantKey", "9aRD5Oeo19UkkLIa");
    // Key in your staging and production merchant key available in your dashboard
    define("orderId", $subscriberid);
    define("channelId", "WEB");
    define("custId", $clickid);
    define("mobileNo", $mobile);
    define("email", "");
    define("txnAmount", $price);
    define("website", "WEBPROD");
    // This is the staging value. Production value is available in your dashboard
    define("industryTypeId", "Retail92");
    // This is the staging value. Production value is available in your dashboard
    define("callbackUrl", $callbackurl."?clickid=".$clickid);
    $paytmParams = array();
    $paytmParams["MID"] = merchantMid;
    $paytmParams["ORDER_ID"] = orderId;
    $paytmParams["CUST_ID"] = custId;
    $paytmParams["MOBILE_NO"] = mobileNo;
    $paytmParams["EMAIL"] = email;
    $paytmParams["CHANNEL_ID"] = channelId;
    $paytmParams["TXN_AMOUNT"] = txnAmount;
    $paytmParams["WEBSITE"] = website;
    $paytmParams["INDUSTRY_TYPE_ID"] = industryTypeId;
    $paytmParams["CALLBACK_URL"] = callbackUrl;
    $paytmChecksum = getChecksumFromArray($paytmParams, merchantKey);
    $transactionURL = "https://securegw.paytm.in/theia/processTransaction";
    // $transactionURL = "https://securegw.paytm.in/theia/processTransaction"; // for production
?>
<html>
    <head>
        <title>Merchant Checkout Page</title>
    </head>
    <body>
        <center><h1>Please do not refresh this page...</h1></center>
        <form method='post' action='<?php echo $transactionURL; ?>' name='f1'>
            <?php
                foreach($paytmParams as $name => $value) {
                    echo '<input type="hidden" name="' . $name .'" value="' . $value . '">';
                }
            ?>
            <input type="hidden" name="CHECKSUMHASH" value="<?php echo $paytmChecksum ?>">
        </form>
        <script type="text/javascript">
            document.f1.submit();
        </script>
    </body>
</html>
