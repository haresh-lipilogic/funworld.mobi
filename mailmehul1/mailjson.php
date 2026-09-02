<?php
//print_r($_POST);exit;
//echo "mail has been sent successfully";
error_reporting(0);
$conn1 = new mysqli('10.34.240.3','webserveruser','K&dN&r4a8N@du0');
$db='advertiserdb';
date_default_timezone_set("Asia/Kolkata");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';



$mail = new PHPMailer(true);

 



 $subject="playcool ".$_POST['subject'];
			 $body="Name=".$_POST['name']."<br>mail Address=".$_POST['email']."<br>Messge=".$_POST['message'];	
				


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
	$mail->addAddress('Durgesh@svmobi.com');
	//$mail->addAddress('mehulgediya01@gmail.com', 'Mehul');
	
	$mail->isHTML(true);								
	$mail->Subject = $subject;
	$mail->Body = $body;
	$mail->AltBody = '';
	$mail->send();
	echo "Mail has been sent successfully!";
} catch (Exception $e) {
	echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>
