<?php

include("connection.php");



error_reporting(0);
session_start();
$msisdn=$_SESSION["msisdn"];
$clickid=$_SESSION["clickid"];
$language=$_SESSION["language"];
$language=1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name=viewport content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title>GamesBAr</title>
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
<!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">
<!--[if lt IE 9]><script src="js/ie8-responsive-file-warning.js"></script><![endif]-->
<script src="js/ie-emulation-modes-warning.js"></script>
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->

<!-- Custom styles for this template -->
<link href="css/carousel.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<style>
					.button {
						background-color: #4CAF50; /* Green */
						border: none;
						color: white;
						padding: 4px 20px 4px 20px;
						text-align: center;
						text-decoration: none;
						display: inline-block;
						font-size: 16px;
						margin: 2px 2px;
						-webkit-transition-duration: 0.4s; /* Safari */
						transition-duration: 0.4s;
						cursor: pointer;
						border-radius: 12px;
						
					}

					


					.button3 {
						background-color: #f44336; 
						color: white; 
						border: 2px solid white;
					}

					.button3:hover {
						background-color: grey;
						color: white;
					}


					</style>

</head>
<!-- NAVBAR#c4151a
================================================== -->

<body >

<div class="navbar-wrapper">
   <nav class="navbar navbar-inverse navbar-static-top">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="menu-icon"><span class="icon-toggle"> <span class="lines"></span></span></span> </button>
      <a class="navbar-brand" href="index.php?msisdn=<?php echo $msisdn; ?>"><img src="http://gamebar.mobi/Games%20Contentdata/logos/gamebar.png" alt="" title="" style="height:52px;padding:10px;"></a> </div>
    <div id="navbar" class="navbar-collapse collapse">
	  <ul class="nav navbar-nav">
    
		<?php 
			$sql_cat="call gamesdb.GetCategory()";
			$res_cat=$conn->query($sql_cat);
			while($row_cat= $res_cat->fetch())
			{
		?>
			 <li><a href="category.php?category=<?php echo $row_cat['catid']; ?>&msisdn=<?php echo $msisdn; ?>"><?php if($language==1){echo $row_cat['cat_name'];}else{echo $row_cat['arabian_name'];} ?> </a></li>
		<?php
			}
			session_start();
		?>
      <li><a href="../cancel.php?clickid=<?php //echo $clickid; ?>&msisdn=<?php echo $msisdn; ?>&language=<?php echo  $language;?>"><?php if($language==1){echo "Unsubscribe";} else{ echo "إلغاء الاشتراك";} ?> </a></li>
      <!--<li><a href="sms:'6699'?body=UNSUB GB"><?php // if($language==1){echo "Unsubscribe";} else{ echo "إلغاء الاشتراك";} ?></a></li>-->
      
	  <?php
	  if($language==2)
		{
		?>
			<li><a href="aa.php?lan=1">English</a></li>
		<?php
		} 
		else{
		?>
			<li><a href="aa.php?lan=2">عربى</a></li>
		<?php
		}
		?>
      </ul>
    </div>
  </nav>
</div>
<!--<div class="toplinks">
  <ul>
    <li class="active"><a href="#">Test1</a></li>
    <li><a href="#">Test1</a></li>
    <li><a href="E">Test1</a></li>
  </ul>
</div>
<!-- Carousel
    ================================================== -->
<div id="myCarousel" class="carousel slide" data-ride="carousel"> 
  <!-- Indicators -->
  
	
	
  </ol>
  <div class="carousel-inner" role="listbox">
  
  
  	<?php
	$res_cat='';
		$sql_banner="call gamesdb.GetBanners()"; 
		$res_banner=$conn->query($sql_banner);
		while($row_banner=$res_banner->fetch())
		{
			if($row_banner['bannerid'] == 1)
			{
				?>
				<div class="item active"> <img class="second-slide" src="<?php echo $row_banner['banner']; ?>" alt="Baner2"> </div>
				<?php
			}
			else
			{
				?>
				<div class="item"> <img class="second-slide" src="<?php echo $row_banner['banner']; ?>" alt="Baner2"> </div>
				<?php
			}
		}
	?>
   
    
  </div>
  
  <script type="text/javascript">
$(document).ready(function(){
     $("#myCarousel").carousel({
         interval : 1000,
         pause: false
     });
});
</script>