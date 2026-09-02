<?php 
include("includes/connection.php");
error_reporting(0);


	
?>
<!DOCTYPE html>
<html>
<head>
   
    <meta charset="utf-8">
    <meta content="telephone=no" name="format-detection">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0, minimum-scale=1, maximum-scale=1, minimal-ui">
    <title data-c-role="title">Gamebar</title> 
<link href="css/style.css" rel="stylesheet" type="text/css"></head>

<body>
    <div id="container" class="show-subscribe-button qa-html5">
	
	<?php 
	
	if($status == 'SUCCESS' )
	{
	?>
		<center><p style="font-size: 40px;color: #fff;">تهانينا</p></center>
		<center><p style="font-size: 25px;color: #fff;">لقد تم الاشتراك بنجاح.</p></center>
		<center><p style="font-size: 25px;color: #fff;">للوصول إلى الألعاب</p></center>
		<center><a href="http://funworld.mobi/tmw/sa/content/index?msisdn=<?php echo $msisdn; ?>" style="font-size: 25px;color: #fff;">انقر هنا</a></center>
	<?php
	}
	else{
	?>
		<center><p style="font-size: 40px;color: #fff;">تهانينا</p></center>
		<center><p style="font-size: 25px;color: #fff;">لقد تم الاشتراك بنجاح.</p></center>
		<center><p style="font-size: 25px;color: #fff;">للوصول إلى الألعاب</p></center>
		<center><a href="http://gamebar.mobi/tmw/sa/content/index?msisdn=<?php echo $msisdn; ?>" style="font-size: 25px;color: #fff;">انقر هنا</a></center>
	<?php
	}
	?>
       
	   
		
<?php 
include("footer.php");
?>