<?php

//include "includes/dbdetail.php";
//include "function.php";

 $ftp_server = '213.239.205.74'; $ftp_user_name = 'sftpsvmobi'; $ftp_user_pass = 'h9rxHDeuEz6N6SttwnHRqCrbPMXwzQ';

$c = curl_init("sftp://$ftp_user_name:$ftp_user_pass@$ftp_server/SVMOBI_TRX_20190319.csv.gz");
curl_setopt($c, CURLOPT_PROTOCOLS, CURLPROTO_SFTP);
$data = curl_exec($c);
curl_close($c);
//print_r($data);
 if ($data === false){echo 'err';}else{echo 'done';}








exit;
$host = '213.239.205.74';
$port = 22;
$username = 'sftpsvmobi';
$password = 'h9rxHDeuEz6N6SttwnHRqCrbPMXwzQ';
$remoteDir = 'SVMOBI_TRX_20190319.csv.gz';
$localDir = 'files/';

if (!function_exists("ssh2_connect"))
    die('Function ssh2_connect not found, you cannot use ssh2 here');

if (!$connection = ssh2_connect($host, $port))
    die('Unable to connect');

if (!ssh2_auth_password($connection, $username, $password))
    die('Unable to authenticate.');

if (!$stream = ssh2_sftp($connection))
    die('Unable to create a stream.');

if (!$dir = opendir("ssh2.sftp://{$stream}{$remoteDir}"))
    die('Could not open the directory');

$files = array();
while (false !== ($file = readdir($dir)))
{
    if ($file == "." || $file == "..")
        continue;
    $files[] = $file;
}

foreach ($files as $file)
{
    echo "Copying file: $file\n";
    if (!$remote = @fopen("ssh2.sftp://{$stream}/{$remoteDir}{$file}", 'r'))
    {
        echo "Unable to open remote file: $file\n";
        continue;
    }

    if (!$local = @fopen($localDir . $file, 'w'))
    {
        echo "Unable to create local file: $file\n";
        continue;
    }

    $read = 0;
    $filesize = filesize("ssh2.sftp://{$stream}/{$remoteDir}{$file}");
    while ($read < $filesize && ($buffer = fread($remote, $filesize - $read)))
    {
        $read += strlen($buffer);
        if (fwrite($local, $buffer) === FALSE)
        {
            echo "Unable to write to local file: $file\n";
            break;
        }
    }
    fclose($local);
    fclose($remote);
}







/*
 $sql="SELECT * FROM ".$db.".`subscriber` WHERE charging_mode='act' and subscriptionstartdate>'2019-03-15' ORDER BY `id` DESC limit 1,1";

$result1 = $conn1->query($sql);
			//$numrows1=$result1->num_rows;
			
				while($row = $result1->fetch_assoc()) {
					$clickid=$row['clickid'];
				echo 	$txnid=$row['txnid'];
				
		   $sql1=("select * from (SELECT id,receivetime,substring_index(substring_index(`param`, 'package-subscription-id>', -1), '/package-subscription-id>', 1) subscriptionid ,param FROM ".$dblog.".callback1 )a where subscriptionid not like '%xm%' and param like '%".$txnid."%' ORDER BY `id` DESC limit 1");
		   echo $sql1;
		   exit;
					 $result11 = $conn1->query($sql1);
						while($row11 = $result1->fetch_assoc()) {
									echo "<br>subscrip===".$subscriptionid=$row11['subscriptionid'];
						
							
							echo "<br>".$sql44 = "UPDATE ".$db.".subscriber subscriptionid='".$subscriptionid."'   WHERE txnid='".$txnid."'";

							$stmt = $conn1->prepare($sql44);
							$st=$stmt->execute();												
							
							
							
							
							
						exit;
						}
						
				}
		/*		
	
$clickid='15525596942800606';
					$spil=0;
					$serviceid=2;
				
				
				$callback=callback($clickid,$spil,$serviceid);*/