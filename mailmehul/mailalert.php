<?php
$conn1 = new mysqli('10.34.240.3','webserveruser','K&dN&r4a8N@du0');
$db='advertiserdb';
date_default_timezone_set("Asia/Kolkata");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

 $body="<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>

<h2 style='color:red'>Alert</h2>

<table>
  <tr>
    <th>Id</th>
    <th>Product</th>
    <th>Operator</th>
    <th>Url</th>
    <th>Last Update Time </th>
	
  </tr>

";

$issue=0;

 $sql="select * from ".$db.". mailalert where  active=1";
		$result1 = $conn1->query($sql);
			//$numrows1=$result1->num_rows;
			
				while($row = $result1->fetch_assoc()) {
					$id=$row['id'];
					$product=$row['product'];
						$operator=$row['operator'];
						$url=$row['url'];
						$lastupdatetime=$row['lastupdatetime'];
						$buffertime=$row['buffertime'];
						$comparedate=date('Y-m-d H:i:s',strtotime("-$buffertime minutes"));
					
					if($lastupdatetime<$comparedate)
					{
						//echo "issue found";
						$body.="<tr><td>$id</td><td>$product</td>";
						$body.="<td>$operator</td>";
						$body.="<td>$url</td>";
						$body.="<td>$lastupdatetime</td></tr>";
						
						$issue=1;
						
					}
					
						
				}
				$body.="</table>";
			echo $body;	
if($issue==0)
{
	exit;
}
//exit;

try {
	$mail->SMTPDebug = 1;									
	$mail->isSMTP();											
	$mail->Host	 = 'smtp.gmail.com;';					
	$mail->SMTPAuth = true;							
	$mail->Username = 'alert.svmobi@gmail.com';				
	$mail->Password = 'blajonmnhdpfigno';						
	$mail->SMTPSecure = 'tls';							
	$mail->Port	 = 587;

	$mail->setFrom('alert.svmobi@gmail.com', 'alert');		
	$mail->addAddress('team@svmobi.com');
	//$mail->addAddress('mehulgediya01@gmail.com', 'Mehul');
	
	$mail->isHTML(true);								
	$mail->Subject = 'Alert';
	$mail->Body = $body;
	$mail->AltBody = '';
	$mail->send();
	echo "Mail has been sent successfully!";
} catch (Exception $e) {
	echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>
