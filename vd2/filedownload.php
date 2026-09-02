<?php
//The resource that we want to download.

include "includes/dbdetail.php";
//include "function.php";
//exit;
/*
$fileUrl = '213.239.205.74'; 
$ftp_user_name = 'sftpsvmobi'; 
$ftp_user_pass = 'h9rxHDeuEz6N6SttwnHRqCrbPMXwzQ';*/


$fileUrl = '34.87.16.111'; 
$ftp_user_name = 'vodftp1'; 
$ftp_user_pass = '|5}s25+*6owejV|:';

//$date2=date('Ymd',strtotime("-1 days"));
//echo $date2;exit;
$date2=date('Ymd');
//The path & filename to save to.
$name="uploads/SVMOBI_TRX_$date2.csv.gz";
echo $name."<br>";
$saveTo = "files/SVMOBI_TRX_$date2.csv.gz";

//Open file handler.
$fp = fopen($saveTo, 'w+');

//If $fp is FALSE, something went wrong.
if($fp === false){
    throw new Exception('Could not open: ' . $saveTo);
}else{
	echo "working";
}
//exit;
//Create a cURL handle.
$ch = curl_init("sftp://$ftp_user_name:$ftp_user_pass@$fileUrl/$name");
curl_setopt($ch, CURLOPT_PROTOCOLS, CURLPROTO_SFTP);
//Pass our file handle to cURL.
curl_setopt($ch, CURLOPT_FILE, $fp);

//Timeout if the file doesn't download after 20 seconds.
curl_setopt($ch, CURLOPT_TIMEOUT, 20);

//Execute the request.
curl_exec($ch);

//If there was an error, throw an Exception
if(curl_errno($ch)){
    throw new Exception(curl_error($ch));
}

//Get the HTTP status code.
$statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

//Close the cURL handler.
curl_close($ch);

//Close the file handler.
fclose($fp);

if($statusCode == 200){
    echo 'Downloaded!';
} else{
    echo "Status Code: " . $statusCode;
}


$zip = new ZipArchive;
$res = $zip->open($saveTo);
if ($res === TRUE) {
  $zip->extractTo($saveto);
  $zip->close();
  echo 'woot!';
} else {
  echo 'doh!';
}


$buffer_size = 4096; // read 4kb at a time
$out_file_name = str_replace('.gz', '', $saveTo); 

// Open our files (in binary mode)
$file = gzopen($saveTo, 'rb');
$out_file = fopen($out_file_name, 'wb'); 

// Keep repeating until the end of the input file
while (!gzeof($file)) {
    // Read buffer-size bytes
    // Both fwrite and gzread and binary-safe
    fwrite($out_file, gzread($file, $buffer_size));
}

// Files are done, close files
fclose($out_file);
gzclose($file);
$rk=0;

//$out_file_name='files/SVMOBI_TRX_20190318.csv';
$file1 = fopen("$out_file_name","r");

$kk=0;
while (($data = fgetcsv($file1, 10000, ";")) !== FALSE) {
		
				
				if($kk==0)
				{
					$kk++;
					
				}
				else{
	
				echo "<br>SUBSCRIPTION_ID==".$subscriptionid = $data[0];
				
				echo "<br>TRANSACTION_ID==".$transactionid = $data[1];
				echo "<br>PACKAGE_ID==".$service_code = $data[2];
				echo "<br>amount==".$amount = $data[3];
				echo "<br>timestamp==".$timestamp = $data[4];
				echo "<br>charging_mode==".$charging_mode = $data[5];
				
				echo "<br><br>";
				
				if($charging_mode=='RENEWAL')
				{
					 $sql="SELECT * FROM ".$db.".`subscriber` WHERE subscriptionid='".$subscriptionid."' ORDER BY `id` DESC limit 1";

					$result1 = $conn1->query($sql);
						//$numrows1=$result1->num_rows;
				
					$row = $result1->fetch_assoc(); 
						
						$msisdn=$row['msisdn'];
						$clickid=$row['clickid'];
						$advid=$row['advid'];
						$charging=$row['charging_mode'];
						$serviceid=$row['serviceid'];
						
						$txnid=$row['txnid'];
						
						
						$subcriptionid=$row['subscriptionid'];
						$xvczaacr=$row['xvczaacr'];
						
				//	$charging='ren';
					if ($charging=='trial')
					{
						$charging_mode='Act';
					}
					else{
						$charging_mode='ren';
					}
					
					$timestamp = str_replace('/', '-', $timestamp);
					$date=date('Y-m-d H:i:s',strtotime($timestamp));
					//$date=date('Y-m-d H:i:s', strtotime( ' -1 day'));
					$rk++;
					
					$subscriptionenddate=date('Y-m-d H:i:s', strtotime( ' +1 day'));
					//`msisdn`, `clickid`, `advid`, `charging_mode`, `subscriptionstartdate`, `subscriptionenddate`, `amount`, `serviceid`, `txnid`, `subscriptionid`, `xvczaacr`
					$stmt1 = $conn1->prepare("INSERT INTO ".$db.".subscriber (msisdn,clickid,advid,charging_mode,subscriptionstartdate,subscriptionenddate,amount, serviceid,txnid,subscriptionid,xvczaacr) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
					$stmt1->bind_param("sssssssssss",$msisdn,$clickid,$advid, $charging_mode,$date,$subscriptionenddate,$amount,$serviceid,$txnid,$subcriptionid,$xvczaacr);	
					$stmt1->execute();
					//exit;
					
					
					
				}
				else{
					
					$sql="SELECT * FROM ".$db.".`subscriber` WHERE subscriptionid='".$subscriptionid."' ORDER BY `id` DESC limit 1";

					$result1 = $conn1->query($sql);
						//$numrows1=$result1->num_rows;
				
					$row = $result1->fetch_assoc(); 
						
						$msisdn=$row['msisdn'];
						$clickid=$row['clickid'];
						$advid=$row['advid'];
						$charging3=$row['charging_mode'];
						$serviceid=$row['serviceid'];
						
						$txnid=$row['txnid'];
						
						
						$subcriptionid=$row['subscriptionid'];
						$xvczaacr=$row['xvczaacr'];
						
						if($charging3!='act' && $charging3!='ren' && $charging3!='trial')
						{
						
							$charging='act';
							
							
							$timestamp = str_replace('/', '-', $timestamp);
							$date=date('Y-m-d H:i:s',strtotime($timestamp));
							//$date=date('Y-m-d H:i:s', strtotime( ' -1 day'));
							
							$subscriptionenddate=date('Y-m-d H:i:s', strtotime( ' +1 day'));
							
							$stmt1 = $conn1->prepare("INSERT INTO ".$db.".subscriber (msisdn,clickid,advid,charging_mode,subscriptionstartdate,subscriptionenddate,amount, serviceid,txnid,subscriptionid,xvczaacr) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
							$stmt1->bind_param("ssssssssssssssssss",$msisdn,$clickid,$advid, $charging,$date,$subscriptionenddate,$amount,$serviceid,$txnid,$subcriptionid,$xvczaacr);	
							$stmt1->execute();
							//exit;
						}
				
				
				
					}
				
				$kk++;
				}		
}


//header('location:http://club.funzone.mobi/report/crons/activation_vodacom.php');
?>
<img src="http://club.funzone.mobi/report/crons/activation_vodacom.php" alt="Italian Trulli">



<?php
//header('location:http://club.funzone.mobi/report/crons/mainreport_Vodacom.php');
if($rk>0)
{
	//include('http://club.funzone.mobi/report/crons/mainreport_Vodacom1.php');
}
