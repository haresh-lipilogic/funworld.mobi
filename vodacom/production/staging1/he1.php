<?php
//var_dump(getallheaders());
error_reporting(0);
include "includes/dbdetail.php";
include "function.php";
$ll='';
foreach (getallheaders() as $name => $value) {
    //echo "$name: $value<br>";
	
	$ll=$ll.$name.":$value&";
	
}
$ip_address=$Referrer='';
$ip_address = $_SERVER['HTTP_CLIENT_IP'];
$accesstime=date("Y-m-d H:i:s");
$referrer= $_SERVER['HTTP_REFERER']; //  Referrer URL
$stmt1 = $conn1->prepare("INSERT INTO ".$dblog.".he (ip,referal,accesstime,he_detail) VALUES (?,?,?,?)");
$stmt1->bind_param("ssss",$ip_address, $referrer,$accesstime,$ll);
$stmt1->execute();


echo  $data=$_SERVER['HTTP_X_VC_ACR'];


//exit;
//$data='67d770a5b9869ec4b09ac354438c8cf77c1210b246929fb688b4a6666ba50c510187750a8020efedadc682a67b75d7266ee15dd26b249d82800595601a48bda00f8368c64d694d86fa2fe157da3d12c047650b2e68d6b3c485dde6f42907282edd20f13929c797cd3738f806f53c61f94af354bd3bc886b4e140aeff34f51306c151eafe14c5b60c0e466355438e96d883ec8231feb657343c22bbcc3a49d351f733066e9d635c32d1b91cad6b2b05ff31ece8c66804a18f68f36f0925edab32c2ebed35feaf677f487010f8983c7e3dd72f8db0c01df86923f7b29728e0e1c210fecae30f4fe13536384413d10710f182a24e59ea6beaa69a1eae3c0a59f65f';


$msisdn=decrypt($data);

echo '<br /><br /> Unencrypted Data: ' . $msisdn;


?>