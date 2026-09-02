<?php







include "includes/dbdetail.php";
include "function.php";


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
$stmt1 = $conn1->prepare("INSERT INTO ".$dblog.".rfu (url,url_detail,accesstime,staging) VALUES (?,?,?,?)");
				$stmt1->bind_param("ssss",$actual_link, $output,$receivedate,$staging);	
				
				
	$stmt1->execute();