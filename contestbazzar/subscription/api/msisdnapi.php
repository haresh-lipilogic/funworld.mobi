<?php

include "../includes/dbdetail.php";
error_reporting(0);

$receivedate =date('Y-m-d H:i:s');
$currentdate=date('Y-m-d');

$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";



	$dataPOST = trim(file_get_contents('php://input'));

	$array_data = json_decode(json_encode(simplexml_load_string($dataPOST)), true);
 $string_version = implode(',', $array_data);


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

//echo "INSERT INTO ".$db.".apihits(url,param,receivetime) values($actual_link, $dataPOST,$receivedate)";

$stmt1 = $conn1->prepare("INSERT INTO ".$db.".apihits(url,param,receivetime) VALUES (?,?,?)");
				$stmt1->bind_param("sss",$actual_link, $dataPOST,$receivedate);	
				
$stmt1->execute();



$mobile=$_GET['mobile'];

$mt = microtime(true);
		$mt =  $mt*1000; //microsecs
		$clickid = ((string)$mt*10).rand(1, 999)."api";


$url='http://contestbazaar.mobi/apisub.php?clickid='.$clickid.'&mobile='.$mobile;
$redirect['status']='ok';
$redirect['redirecturl']=$url;


$jsredirect=json_encode($redirect);

echo $jsredirect;
exit;
		
		
		
		
		
		
		
		