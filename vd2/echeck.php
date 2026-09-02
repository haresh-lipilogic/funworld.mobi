<?php
$clickid=$_GET['clickid'];
$serviceid=$_GET['serviceid'];
 $kt=$_GET['kt'];
 
 
error_reporting(0);
include "includes/dbdetail.php";
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
$dataPOST = trim(file_get_contents('php://input'));
$receivedate =date('Y-m-d H:i:s');
$staging=0;
$stmt1 = $conn1->prepare("INSERT INTO ".$dblog.".echeck (url,url_detail,accesstime,staging) VALUES (?,?,?,?)");
				$stmt1->bind_param("ssss",$actual_link, $dataPOST,$receivedate,$staging);	
				
				
	$stmt1->execute();

$receivedate =date('Y-m-d H:i:s');
//$staging=1;

 $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
 

$params = array(
				'ti' => $clickid,
				'ts' => time(),
				'country' => 'ZA',
				
				
			);

			$queryString = http_build_query($params);
			$toSign = "sv_mobi" . $queryString . "Dt0eBdbT1JKO0TXhAqkGBzA70ukfNl74";
			$signature = hash("sha256", $toSign, false);
			
		$url6="https://api.clfldcbprotect.com/sv_mobi/check?" .$queryString . "&s=" . $signature;
		$kk6= file_get_contents("$url6");
		//echo $kk6;exit;
		//echo $url6; exit;
		
		$kk7=json_decode($kk6,true);
		if($kk7['ft']==1000)
		{
		//echo "Success";	
			$aut='ok';
			$stmt1 = $conn1->prepare("INSERT INTO ".$dblog.".authcheck (url,clickid,accesstime,authcheck) VALUES (?,?,?,?)");
			$stmt1->bind_param("ssss",$actual_link, $clickid,$receivedate,$aut);	
			$stmt1->execute();
		
		
		
			header("location:$kt");
		}
		else{
			$aut='error';
			$stmt1 = $conn1->prepare("INSERT INTO ".$dblog.".authcheck (url,clickid,accesstime,authcheck) VALUES (?,?,?,?)");
			$stmt1->bind_param("ssss",$actual_link, $clickid,$receivedate,$aut);	
			$stmt1->execute();
			echo "you are not Authorized to subscribe this Offer";
		exit;
		}