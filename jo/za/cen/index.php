<meta http-equiv="Content-Security-Policy" content="default-src 'self'; img-src http://*; child-src 'none';">
<?php
//var_dump(getallheaders());
//exit;
//echo "Hi";exit;
error_reporting(0);
header('X-Frame-Options: DENY');
$status= http_response_code();
$pageurl='http://'.$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; // Page URL
include "includes/dbdetail.php";
include "function.php";
 session_start();
$serviceid=1;
date_default_timezone_set("Asia/Kolkata");
$date=date("Y-m-d H:i:s");
$date1=date("Y-m-d");
if($status==302)
{
	//echo "<h3 style='color:red'>302 You are not authorise to subscribe this Service</h3>";
	//exit;
}





$ll='';
		if($_SERVER['HTTP_X_FORWARDED_FOR']== '')
		{
			$ip=$_SERVER['REMOTE_ADDR'];
		}
		else{
			$ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
		}   

		if(sizeof($ip) == 1)
		{
			
		}
		else{
			//echo "your ip has been Blocked due to find unaurhorised activity";
			//exit;
		}
		
		//$ip='202.91.18.3';

		// Get Xforward IP Address
		if($_SERVER['REMOTE_ADDR'] == '')
		{
			$xforward = '';
		}
		else
		{
			$xforward = $_SERVER['REMOTE_ADDR'];
		}

		$pageurl=$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; // Page URL
		$referrer= $_SERVER['HTTP_REFERER']; //  Referrer URL
		//$browser = $_SERVER['HTTP_USER_AGENT'] ;
		function getClientIp() {
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
		

		if($_GET['advid']=='')
		{
			$advertiserid=0;
		} 
		else{
			$advertiserid=$_GET['advid'];
		}  // Advertiserid
	
	
	
	
	
	
		

		$useragent=strtolower($_SERVER['HTTP_USER_AGENT']); // User Agent
		//$userip=getClientIp();
		
		// creating clickid
		$mt = microtime(true);
		$mt =  $mt*1000; //microsecs
		$clickid = "jo".((string)$mt*10).rand(1, 999); 
		$txnid="t".((string)$mt*10).rand(1, 999);
		$chargeid="c".((string)$mt*10).rand(1, 999);
		if($_GET['pubid'] == '')
		{
			$pubid='101010';
		}
		else
		{
			$pubid=$_GET['pubid'];
		}
		
		
		if($_GET['clickid']=='')
		{
			$advertclickid='';
		}
		else{
			
			 $advertclickid=$_GET['clickid'];
		}

		
		
 
			
		
		
		
		
		$xforwardwith=strtolower($_SERVER['HTTP_X_REQUESTED_WITH']);
		
		
		
		
		
		
		



$useragent=strtolower($_SERVER['HTTP_USER_AGENT']);

$msisdn=$operator='';


$operator='06';
	
	  $insert_userlog="call ".$dblog.".insert_userlog ('".$date."','".$msisdn."','".$operator."','".$referrer."','".$clickid."','".$pubid."','".$advertiserid."','".$ip."','".$advertclickid."','".$useragent."','".$xforwardwith."','".$serviceid."','".$pageurl."')";   
		$res_userlog=$conn1->query($insert_userlog);

		
	
				$sql24 = "SELECT * from ".$advdb.".campaignconfig  where operator='jo_zain' and product='gamebar'";
				$me1=$conn1->query($sql24);
					while($row = $me1->fetch_assoc()) {
					
							$activationcap=$row['activationcap'];
							
					}
					
					
		
				$date55=date('Y-m-d');
				  $sql24 = "SELECT distinct(subscriber.clickid) from ".$db.".subscriber inner join ".$dblog.".userlog on subscriber.clickid=userlog.clickid where charging_mode='trial' and amount=0  and userlog.accesstime>'".$date55."' and subsriptionstartdate >'".$date55."'";
					$me1=$conn1->query($sql24);
				
				$rowcount11=mysqli_num_rows($me1);
				
			//	echo $rowcount11."<br>";
			//	echo $activationcap;exit;
				if($activationcap<=$rowcount11)
				{
						echo "Full Cap is Over please contact Administrator";exit;
				}
				
				
				
				$sql24 = "SELECT * from ".$db.".advertmanage  where advertiserid='".$advertiserid."'";
				$me1=$conn1->query($sql24);
					//echo $rowcount25=0;
				   $rowcount1=mysqli_num_rows($me1);
				   if($rowcount1==0)
				   {
					   
						$sql2 = "SELECT * from ".$advdb.".advertiser  where advertiserid='".$advertiserid."'";
					   $me3=$conn1->query($sql2);
					   while($row = $me3->fetch_assoc()) {
					
							$advid=$row['advertiserid'];
							 $advname=$row['advname'];
						}
						$op='jo';
						//echo "INSERT INTO ".$db.".advertmanage (`advertiserid`, `advname`, `operator`) VALUES ('$advid','$advname','$op')";
						$stmt1 = $conn1->prepare("INSERT INTO ".$db.".advertmanage (`advertiserid`, `advname`, `operator`) VALUES (?,?,?)");
						$stmt1->bind_param("sss",$advid,$advname,$op);	
						$stmt1->execute();
				   }
			
				 $sql24 = "SELECT * from ".$db.".advertmanage  where isactive=0 and advertiserid='".$advertiserid."' ";
					$me1=$conn1->query($sql24);
						$rowcount25=0;
						$rowcount25=mysqli_num_rows($me1); 
					
					if ($rowcount25 > 0)
					{
						
						echo "Your Traffic has been blocked please Contact Administrator ";
						exit;
					}
			




if (strpos( $useragent,'android') == true || strpos( $useragent,'iphone') == true ) {

}
else{
	//echo "This service not available for Desktop ";
//exit;
}

if (strpos( $useragent,'opera') == true ) {
//exit;
}

//$authtoken=authorizationtoken();

 $timestmp=time();
$returnurl="https://funworld.mobi/jo/za/cen/lp.php?clickid=".$clickid;
$returnurl=urlencode($returnurl);

//$url="onsubmit.php?clickid=".$clickid."";

 $url="http://dcb.centili.com/payment/pages/userIdentify.jsf?apikey=".$apikey."&timestamp=".$timestmp."&returnurl=".$returnurl."&sign=";

header("Location:$url");
exit;


//echo $url;
exit;
?>
