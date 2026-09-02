<?php

include "includes/dbdetail.php";
$ll='';
/*foreach (getallheaders() as $name => $value) {
    echo "$name: $value<br>";
	
	$ll=$ll.$name.":$value&";
	
}
$ip_address=$Referrer='';
$ip_address = $_SERVER['HTTP_CLIENT_IP'];
$accesstime=date("Y-m-d H:i:s");
$referrer= $_SERVER['HTTP_REFERER']; //  Referrer URL
$stmt1 = $conn1->prepare("INSERT INTO ".$dblog.".he (ip,referal,accesstime,he_detail) VALUES (?,?,?,?)");
$stmt1->bind_param("ssss",$ip_address, $referrer,$accesstime,$ll);
$stmt1->execute();
*/

$fp=fopen ("certificate/1.pem","r");
$str='5eaa386d9e335b83eacbe4934090a5f275a2e26409f18fd536437fbd1d19079c61ef1415dac4b242fd0ca72eb743b1c19ca1be3376cea1eac5d318f1cd3fe342351ef7618b16a4172451289b850151b3d25686148107408487e3b312ec59e77a61e72de6a5f7d0cfc196d588b1b42b309c93f18762bbe11c195b0d9fcfa294bce0484de92fff242354c5f08cf828657226792b74e42dc28c7618001141ac48010d8ae98bcf5cdefceadcd2f44dac9f679d9d7514d1c9791b9c48cb1ad21dbfd92c3e941a54dbe29bec0d6fe9fcf7c4dc78782a3d069ebe27c812a10d7bbae654ed66080e46d7e3665eb854549c2d2a3b63109d8b3b0f71461f4235ce3544595';
//$decrypt=decrypt_RSA($publicPEMKey, $data);
//echo $decrypt;
 function hhg( $str ) {
        $sbin = "";
        $len = strlen( $str );
        for ( $i = 0; $i < $len; $i += 2 ) {
            $sbin .= pack( "H*", substr( $str, $i, 2 ) );
        }
		//var_dump($sbin);
        return $sbin;
}

  $data1=hhg($str);
 $keyFile=fopen("certificate/1.pem","r");
   $privateKey=fread($keyFile,filesize("certificate/1.pem"));
 $res =openssl_get_privatekey($privateKey);
 //print_r ($privateKey1)exit;

// exit;
 // "openssl rsautl  -in $data1 -out $PLAINTEXT -inkey certificate/1.pem");
 // echo $PLAINTEXT;
  
  
  //exit;
/*function decryptString($cryptText)
{
  $keyFile=fopen("certificate/1.pem","r");
  $privateKey=fread($keyFile,filesize("certificate/1.pem"));
  fclose($keyFile);

  openssl_get_privatekey($privateKey);
  $binText = $cryptText;
  openssl_private_decrypt($binText,$clearText,$privateKey);
  return($clearText);
}
*/

//$data2= openssl_decrypt($data1, 'AES-256-CBC', $privateKey, OPENSSL_RAW_DATA);

var decrypt = new JSEncrypt();
decrypt.setPublicKey(publicKey);
var decoded = decrypt.decrypt(encoded);




echo $data2;

?>