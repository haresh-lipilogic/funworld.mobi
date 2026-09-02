<?php 
include("includes/connection.php");
error_reporting(0);

$clickid=$_GET['clickid'];
	
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
	
		<center><p style="font-size: 25px;color: #fff;">Please wait we are processing your request. You will be redirected on Content soon!</p></center>
			
<?php 
include("footer.php");
?>

	 <script>
	 
	var name = <?php echo json_encode($clickid); ?>;
         setTimeout(function(){
            window.location.href = 'https://funworld.mobi/dot/mz/content/index?clickid='+name;
         }, 3000);
      </script>