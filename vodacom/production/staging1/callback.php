<?php

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

$receivedate =date('Y-m-d H:i:s');
$staging=1;
$stmt1 = $conn1->prepare("INSERT INTO ".$dblog.".callback (url,url_detail,accesstime,staging) VALUES (?,?,?,?)");
				$stmt1->bind_param("ssss",$actual_link, $output,$receivedate,$staging);	
				
				
	$stmt1->execute();
	
	$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";



	$dataPOST = trim(file_get_contents('php://input'));

	$array_data = json_decode(json_encode(simplexml_load_string($dataPOST)), true);
 $string_version = implode(',', $array_data);

 
$data=$array_data['Response'];
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



?>