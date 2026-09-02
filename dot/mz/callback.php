<?php
include("includes/connection.php");

error_reporting(0);
//Mail Alert Update Last Datetime
date_default_timezone_set("Asia/Kolkata");
$responsedatetime=date("Y-m-d H:i:s"); 

$result = trim(file_get_contents('php://input'));
$data = json_decode($result,true);

$msisdn= $data['msisdn']; 
$commandtype= strtolower($data['commandType']); 
$msgid= $data['msgId']; 

if($commandtype == 'sub')
{
	// Sending MT SMS

	
	$curl2 = curl_init();

	curl_setopt_array($curl2, array(
	  CURLOPT_URL => 'https://dot-jo.biz/lb2/PartnersMTSMS/',
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => '',
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 0,
	  CURLOPT_FOLLOWLOCATION => true,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => 'POST',
	  CURLOPT_POSTFIELDS =>'{
		"partnerId": "svmobi-201850",
		"opId": 3,
		"serviceId": "gamebar_service",
		"msisdn": "'.$msisdn.'",
		"sender":"99700",
		"text": "لقد اشتركت في خدمة جيم بار. أبدء اللعب بالنقر على  http://gamebar.mobi/dot/jo/content/index بسعر 25 قرش/يوم. لالغاء الاشتراك ارسل unsub gmb  الى 99700"
	}',
	  CURLOPT_HTTPHEADER => array(
		'Authorization: Basic c3Ztb2JpLTk5Nzo1NTFTVFI5OQ==',
		'Accept: application/json',
		'Content-Type: application/json'
	  ),
	));

	$mtresponse = curl_exec($curl2);
	curl_close($curl2);
}
elseif($commandtype == 'unsub')
{
	$charging_mode="dct";
	
	// Sending MT SMS

	$curl2 = curl_init();

	curl_setopt_array($curl2, array(
	  CURLOPT_URL => 'https://dot-jo.biz/lb2/PartnersMTSMS/',
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => '',
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 0,
	  CURLOPT_FOLLOWLOCATION => true,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => 'POST',
	  CURLOPT_POSTFIELDS =>'{
		"partnerId": "svmobi-201850",
		"opId": 3,
		"serviceId": "gamebar_service",
		"msisdn": "'.$msisdn.'",
		"sender":"99700",
		"text": "لقد تم الغاء خدمة جيم بار بنجاح"
	}',
	  CURLOPT_HTTPHEADER => array(
		'Authorization: Basic c3Ztb2JpLTk5Nzo1NTFTVFI5OQ==',
		'Accept: application/json',
		'Content-Type: application/json'
	  ),
	));

	$mtresponse = curl_exec($curl2);
	curl_close($curl2);
}
else
{
	
}

$sql_subscriber="select * from ".$db.".subscriber where msisdn = '".$msisdn."' order by subscriberid desc limit 1 ";
$res_subscriber=$conn->query($sql_subscriber);
$row_subscriber=$res_subscriber->fetch();
$clickid=$row_subscriber['clickid'];
$pubid=$row_subscriber['pubid'];
$advertiserid=$row_subscriber['advertiserid'];


$sql_userlog="select * from ".$db.".userlog where clickid = '".$clickid."' order by userlogid desc limit 1 ";
$res_userlog=$conn->query($sql_userlog);
$row_userlog=$res_userlog->fetch();
$accesstime=$row_userlog['accesstime'];
	
if($charging_mode == 'act')
{

}
else{
	$status=0;
	$charging_mode = "dct";
}



if($advertiserid == '')
{
	$advertiserid ="0";
}

$subscriptionstartdate=date('Y-m-d H:i:s');
$subscriptionenddate=date('Y-m-d H:i:s',strtotime($subscriptionstartdate. ' + 7 days'));

if(date('Y-m-d',strtotime($accesstime)) == date('Y-m-d',strtotime($subscriptionstartdate)))
{
	$sameday=1;
}
else
{
	$sameday=0;
}

		 
	$insert_subscribe="   INSERT INTO ".$db.".`subscriber`
						(
						`clickid`,
						`pubid`,
						`msisdn`,
						`advertiserid`,
						`operator`,
						`channel`,
						`charging_mode`,
						`status`,
						`error`,
						`amount`,
						`subscriptionstartdate`,
						`subscriptionenddate`,
						`sameday`,
						`response`,
						`subid`,
						`refid`,
						`transactionid`)
						VALUES
						('".$clickid."',
						'".$pubid."',				
						'".$msisdn."',
						'".$advertiserid."',
						'zong',
						'WAP',
						'".$charging_mode."',
						'".$status."',
						'0',
						'0',
						'".$subscriptionstartdate."',
						'".$subscriptionenddate."',
						'".$sameday."',
						'".$result."',
						'0',
						'0',
						'".$msgid."');
						";
												 
		$res_subscriber=$conn->query($insert_subscribe);

	
		echo "1";
	

?>