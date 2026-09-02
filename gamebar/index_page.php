<?php
error_reporting(0);
//$conn11 = new PDO("mysql:host=10.125.1.51", 'webserveruser', 'K&dN&r4a8N@du0') or die(print_r($conn1->error));
//$db="gamebardb_portugal";
include("../games/dbdetail.php");

session_start();


?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name=viewport content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title>Welcome to Gamebar</title>
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

<body <?php if($_COOKIE['file1']!='' && isset($_SESSION['expire'])){ ?>onload='myfunction3()'<?php }?>>
<?php

/*if(isset($_SESSION['subid']))
{
	$subscription=$_SESSION['subid'];
	$asql="select * from ".$db." .`subscriber` where subscriptionId=".$subscription;
	foreach ($conn11->query($asql) as $row) {
		
		$operator=$row['operator'];
				
	}
	if($operator=='voda')
	{

	*/
?>
<div ><center><a href="http://club.funzone.mobi/spain/games/CancelSubscription.php?subscriptionId=<?php echo $_SESSION['subid'];?>"><button class="button button3">Cancelar</button></a></center></div>
<?php
//}
//}

?>
<div class="navbar-wrapper">
  <nav class="navbar navbar-inverse navbar-static-top">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="menu-icon"><span class="icon-toggle"> <span class="lines"></span></span></span> </button>
      <a class="navbar-brand" href="#"><img src="http://club.funzone.mobi/portugal/image/gamebar.png" alt="" title="" style="height:52px"></a> </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <li><a href="category.php?category=1">Nuevos juegos</a></li> <!--newgames-->
        <li><a href="category.php?category=2">Juegos de Acción</a></li><!--Action Games-->
        <li><a href="category.php?category=11">Juegos de carreras</a></li><!--Racing Games-->
        <li><a href="category.php?category=4">Juegos de Shoot En Up</a></li><!--Shoot-Em-Up Games-->
        <li><a href="category.php?category=13">Juegos de Tablero</a></li><!--Board Games-->
      </ul>
    </div>
  </nav>
</div>

<div id="myCarousel" class="carousel slide" data-ride="carousel"> 
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="3"></li>
    <li data-target="#myCarousel" data-slide-to="4"></li>
    <li data-target="#myCarousel" data-slide-to="5"></li>
  </ol>
  <div class="carousel-inner" role="listbox">
    <div class="item active"> 
    <img class="first-slide" src="images/banner/banner1.jpg" alt="Baner1"> </div>
    <div class="item"> <img class="second-slide" src="images/banner/banner2.jpg" alt="Baner2"> </div>
    <div class="item"> <img class="third-slide" src="images/banner/banner3.jpg" alt="Baner3"> </div>
    <div class="item"> <img class="third-slide" src="images/banner/banner4.jpg" alt="Baner4"> </div>
    <div class="item"> <img class="third-slide" src="images/banner/banner5.jpg" alt="Baner5"> </div>
    <div class="item"> <img class="third-slide" src="images/banner/banner6.jpg" alt="Baner6"> </div>
  </div>
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next"> <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> </div>
<!-- /.carousel -->
<?php

/*
if(isset($_SESSION['subid']))
{
	
	 $subscriptionId=$_SESSION['subid'];
	 
	 
	if(isset($_SESSION['expire']))
	{
	
		if(time() < $_SESSION['expire'])
		{
			
			
	*/		


?>
				<div class="container">
				  <div class="categoryrow">
					<h5>Nuevos juegos <a href="category.php?category=1">Ver más</a></h5>
					<div class="list-row">
					  <a href=" http://gamezzone.me/GameFiles/How Far Can You Drive Paid1.apk"><div class="listblock">
						<div class="list-img"><img src="images/games/image/28821_How Far Can You Drive Paid1.jpg" alt="" title=""></div>
						<div class="list-details">
						  <div class="list-info">
							<h6>You Can Drive</h6>
							<div class="ratingdownload">
							  <div class="rating"><a href="#"><i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star-empty"></i></a></div>
							  <div class="download"><a href="#"> <i class="glyphicon glyphicon-download-alt"></i></a></div>
							</div>
						  </div>
						</div>
					  </div></a>
					 <a href=" http://gamezzone.me/GameFiles/Exercise Map oj7.apk"> <div class="listblock">
						<div class="list-img"><img src="images/games/image/28923_Exercise Map oj7.jpg" alt="" title=""></div>
						<div class="list-details">
						  <div class="list-info">
							<h6>Exercise Map &nbsp;&nbsp;</h6>
							<div class="ratingdownload">
							  <div class="rating"><a href="#"><i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star-empty"></i></a></div>
							  <div class="download"><a href="#"> <i class="glyphicon glyphicon-download-alt"></i></a></div>
							</div>
						  </div>
						</div>
					  </div></a>
					  <a href=" http://gamezzone.me/GameFiles/Golf Physics Madness dz9.apk"><div class="listblock">
						<div class="list-img"><img src="images/games/image/28848_Golf%20Physics%20Madness%20dz9.jpg" alt="" title=""></div>
						<div class="list-details">
						  <div class="list-info">
							<h6>Golf Physics Madness</h6>
							<div class="ratingdownload">
							  <div class="rating"><a href="#"><i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star-empty"></i></a></div>
							  <div class="download"><a href="#"> <i class="glyphicon glyphicon-download-alt"></i></a></div>
							</div>
						  </div>
						</div>
					  </div></a>
					</div>
				  </div>
				  <div class="categoryrow">
					<h5>Juegos de Acción <a href="category.php?category=2">Ver más</a></h5>
					<div class="list-row">
					  <a href=" http://gamezzone.me/GameFiles/JewelExplosion_SamsungGalaxy-1.apk"><div class="listblock">
						<div class="list-img"><img src="images/games/image/10214_Icon_png_512_512.jpg" alt="" title=""></div>
						<div class="list-details">
						  <div class="list-info">
							<h6>JewelExplosion</h6>
							<div class="ratingdownload">
							  <div class="rating"><a href="#"><i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star-empty"></i></a></div>
							  <div class="download"><a href="#"> <i class="glyphicon glyphicon-download-alt"></i></a></div>
							</div>
						  </div>
						</div>
					  </div></a>
					  <a href=" http://gamezzone.me/GameFiles/FrogBurst_SamsungGalaxy-1.apk"><div class="listblock">
						<div class="list-img"><img src="images/games/image/9796_Icon_png_512_512.jpg" alt="" title=""></div>
						<div class="list-details">
						  <div class="list-info">
							<h6>Frog Burst  </h6>
							<div class="ratingdownload">
							  <div class="rating"><a href="#"><i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star-empty"></i></a></div>
							  <div class="download"><a href="#"> <i class="glyphicon glyphicon-download-alt"></i></a></div>
							</div>
						  </div>
						</div>
					  </div></a>
					  <a href=" http://gamezzone.me/GameFiles/Totemo_SamsungGalaxy-1.apk"><div class="listblock">
						<div class="list-img"><img src="images/games/image/4611_Icon_png_512_512.jpg" alt="" title=""></div>
						<div class="list-details">
						  <div class="list-info">
							<h6>Totemo</h6> 
							<div class="ratingdownload">
							  <div class="rating"><a href="#"><i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star-empty"></i></a></div>
							  <div class="download"><a href="#"> <i class="glyphicon glyphicon-download-alt"></i></a></div>
							</div>
						  </div>
						</div>
					  </div></a>
					</div>
				  </div>
				  <div class="categoryrow">
					<h5>Juegos de carreras <a href="category.php?category=11">Ver más</a></h5>
					<div class="list-row">
					  <a href=" http://gamezzone.me/GameFiles/Skate 3d gk2.apk"><div class="listblock">
						<div class="list-img"><img src="images/games/image/28714_Skate%203d%20gk2.jpg" alt="" title=""></div>
						<div class="list-details">
						  <div class="list-info">
							<h6>Skate 3D </h6>
							<div class="ratingdownload">
							  <div class="rating"><a href="#"><i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star-empty"></i></a></div>
							  <div class="download"><a href="#"> <i class="glyphicon glyphicon-download-alt"></i></a></div>
							</div>
						  </div>
						</div>
					  </div></a>
					 <a href=" http://gamezzone.me/GameFiles/Kart Physics PRo ri1.apk"> <div class="listblock">
						<div class="list-img"><img src="images/games/image/28794_Kart%20Physics%20PRo%20ri1.jpg" alt="" title=""></div>
						<div class="list-details">
						  <div class="list-info">
							<h6>Kart physics </h6>
							<div class="ratingdownload">
							  <div class="rating"><a href="#"><i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star-empty"></i></a></div>
							  <div class="download"><a href="#"> <i class="glyphicon glyphicon-download-alt"></i></a></div>
							</div>
						  </div>
						</div>
					  </div></a>
					 <a href=" http://gamezzone.me/GameFiles/Speedometer wi2.apk"> <div class="listblock">
						<div class="list-img"><img src="images/games/image/28703_Speedometer%20wi2.jpg" alt="" title=""></div>
						<div class="list-details">
						  <div class="list-info">
							<h6>Speedometer</h6>
							<div class="ratingdownload">
							  <div class="rating"><a href="#"><i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star-empty"></i></a></div>
							  <div class="download"><a href="#"> <i class="glyphicon glyphicon-download-alt"></i></a></div>
							</div>
						  </div>
						</div>
					  </div></a>
					</div>
				  </div>
				  <div class="categoryrow">
					<h5>Juegos de Shoot En Up <a href="category.php?category=4">Ver más</a></h5>
					<div class="list-row">
					 <a href=" http://gamezzone.me/GameFiles/VegasPoolSharks_SamsungGalaxy-1.apk"> <div class="listblock">
						<div class="list-img"><img src="images/games/image/4995_splashHires-512x512.jpg" alt="" title=""></div>
						<div class="list-details">
						  <div class="list-info">
							<h6>Vega Pool</h6>
							<div class="ratingdownload">
							  <div class="rating"><a href="#"><i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star-empty"></i></a></div>
							  <div class="download"><a href="#"> <i class="glyphicon glyphicon-download-alt"></i></a></div>
							</div>
						  </div>
						</div>
					  </div></a>
					  <a href=" http://gamezzone.me/GameFiles/PenaltyWorldChallenge_SamsungGalaxy-1.apk"><div class="listblock">
						<div class="list-img"><img src="images/games/image/7117_SplashScreen.jpg" alt="" title=""></div>
						<div class="list-details">
						  <div class="list-info">
							<h6>Penalty World </h6>
							<div class="ratingdownload">
							  <div class="rating"><a href="#"><i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star-empty"></i></a></div>
							  <div class="download"><a href="#">12K <i class="glyphicon glyphicon-download-alt"></i></a></div>
							</div>
						  </div>
						</div>
					  </div></a>
					<a href=" http://gamezzone.me/GameFiles/Par72Golf_SamsungGalaxy-1.apk">  <div class="listblock">
						<div class="list-img"><img src="images/games/image/5012_splashHires-512x512.jpg" alt="" title=""></div>
						<div class="list-details">
						  <div class="list-info">
							<h6>Para 7 Golf </h6>
							<div class="ratingdownload">
							  <div class="rating"><a href="#"><i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star-empty"></i></a></div>
							  <div class="download"><a href="#">12K <i class="glyphicon glyphicon-download-alt"></i></a></div>
							</div>
						  </div>
						</div>
					  </div></a>
					</div>
				  </div>
				  <div class="categoryrow">
					<h5>Juegos de Tablero<a href="category.php?category=13">Ver más</a></h5>
					<div class="list-row">
					 <a href=" http://gamezzone.me/GameFiles/BlackJackUniverse_SamsungGalaxy-1.apk"> <div class="listblock">
						<div class="list-img"><img src="images/games/image/10013_Icon_png_512_512.jpg" alt="" title=""></div>
						<div class="list-details">
						  <div class="list-info">
							<h6>Black Jack Universe</h6>
							<div class="ratingdownload">
							  <div class="rating"><a href="#"><i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star-empty"></i></a></div>
							  <div class="download"><a href="#"> <i class="glyphicon glyphicon-download-alt"></i></a></div>
							</div>
						  </div>
						</div>
					  </div></a>
					  <a href=" http://gamezzone.me/GameFiles/FruitMachineGold_SamsungGalaxy-1.apk"><div class="listblock">
						<div class="list-img"><img src="images/games/image/8889_Icon_png_512_512.jpg" alt="" title=""></div>
						<div class="list-details">
						  <div class="list-info">
							<h6>Fruit MAchine Gold</h6>
							<div class="ratingdownload">
							  <div class="rating"><a href="#"><i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star-empty"></i></a></div>
							  <div class="download"><a href="#"> <i class="glyphicon glyphicon-download-alt"></i></a></div>
							</div>
						  </div>
						</div>
					  </div></a>
					 <a href=" http://gamezzone.me/GameFiles/HoldemPokerInferno_SamsungGalaxy-1.apk"> <div class="listblock">
						<div class="list-img"><img src="images/games/image/9935_Icon_png_512_512.jpg" alt="" title=""></div>
						<div class="list-details">
						  <div class="list-info">
							<h6>Hold-Em-Poker</h6>
							<div class="ratingdownload">
							  <div class="rating"><a href="#"><i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star-empty"></i></a></div>
							  <div class="download"><a href="#"> <i class="glyphicon glyphicon-download-alt"></i></a></div>
							</div>
						  </div>
						</div>
					  </div></a>
					</div>
				  </div>
				</div>
				
	<?php
	/*}
	else{
		unset($_SESSION['']); // will delete just the name data

		session_destroy();
		
		header('Location:http://club.funzone.mobi/spain/games/landingpage.php');
	}
	}
	else{
		
		 $_SESSION['expire'] = time() + (60 * 60 * 24);
	}
}
else{*/
	//http://gamezzone.me/GameFiles/How Far Can You Drive Paid1.apk
	?>
	
	<!--	
		<div class="container">
				  <div class="categoryrow">
					<h5>Nuevos juegos <a href="category.php?category=1">Ver más</a></h5>
					<div class="list-row">
					  <a href="http://club.funzone.mobi/spain/games/landingpage.php" onClick="redirectOne('http://gamezzone.me/GameFiles/How Far Can You Drive Paid1.apk')"><div class="listblock">
						<div class="list-img"><img src="images/games/image/28821_How Far Can You Drive Paid1.jpg" alt="" title=""></div>
						<div class="list-details">
						  <div class="list-info">
							<h6>You Can Drive</h6>
							<div class="ratingdownload">
							  <div class="rating"><a href="#"><i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star-empty"></i></a></div>
							  <div class="download"><a href="#"> <i class="glyphicon glyphicon-download-alt"></i></a></div>
							</div>
						  </div>
						</div>
					  </div></a>
					 <a href=" http://club.funzone.mobi/spain/games/landingpage.php" onClick="redirectOne('http://gamezzone.me/GameFiles/Exercise Map oj7.apk')"> <div class="listblock">
						<div class="list-img"><img src="images/games/image/28923_Exercise Map oj7.jpg" alt="" title=""></div>
						<div class="list-details">
						  <div class="list-info">
							<h6>Exercise Map &nbsp;&nbsp;</h6>
							<div class="ratingdownload">
							  <div class="rating"><a href="#"><i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star-empty"></i></a></div>
							  <div class="download"><a href="#"> <i class="glyphicon glyphicon-download-alt"></i></a></div>
							</div>
						  </div>
						</div>
					  </div></a>
					  <a href="http://club.funzone.mobi/spain/games/landingpage.php" onClick="redirectOne('http://gamezzone.me/GameFiles/Golf Physics Madness dz9.apk')"><div class="listblock">
						<div class="list-img"><img src="images/games/image/28848_Golf%20Physics%20Madness%20dz9.jpg" alt="" title=""></div>
						<div class="list-details">
						  <div class="list-info">
							<h6>Golf Physics Madness</h6>
							<div class="ratingdownload">
							  <div class="rating"><a href="#"><i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star-empty"></i></a></div>
							  <div class="download"><a href="#"> <i class="glyphicon glyphicon-download-alt"></i></a></div>
							</div>
						  </div>
						</div>
					  </div></a>
					</div>
				  </div>
				  <div class="categoryrow">
					<h5>Juegos de Acción <a href="category.php?category=2">Ver más</a></h5>
					<div class="list-row">
					  <a href="http://club.funzone.mobi/spain/games/landingpage.php" onClick="redirectOne('http://gamezzone.me/GameFiles/JewelExplosion_SamsungGalaxy-1.apk')"><div class="listblock">
						<div class="list-img"><img src="images/games/image/10214_Icon_png_512_512.jpg" alt="" title=""></div>
						<div class="list-details">
						  <div class="list-info">
							<h6>JewelExplosion</h6>
							<div class="ratingdownload">
							  <div class="rating"><a href="#"><i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star-empty"></i></a></div>
							  <div class="download"><a href="#"> <i class="glyphicon glyphicon-download-alt"></i></a></div>
							</div>
						  </div>
						</div>
					  </div></a>
					  <a href="http://club.funzone.mobi/spain/games/landingpage.php" onClick="redirectOne('http://gamezzone.me/GameFiles/FrogBurst_SamsungGalaxy-1.apk')"><div class="listblock">
						<div class="list-img"><img src="images/games/image/9796_Icon_png_512_512.jpg" alt="" title=""></div>
						<div class="list-details">
						  <div class="list-info">
							<h6>Frog Burst  </h6>
							<div class="ratingdownload">
							  <div class="rating"><a href="#"><i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star-empty"></i></a></div>
							  <div class="download"><a href="#"> <i class="glyphicon glyphicon-download-alt"></i></a></div>
							</div>
						  </div>
						</div>
					  </div></a>
					  <a href="http://club.funzone.mobi/spain/games/landingpage.php" onClick="redirectOne('http://gamezzone.me/GameFiles/Totemo_SamsungGalaxy-1.apk')"><div class="listblock">
						<div class="list-img"><img src="images/games/image/4611_Icon_png_512_512.jpg" alt="" title=""></div>
						<div class="list-details">
						  <div class="list-info">
							<h6>Totemo</h6> 
							<div class="ratingdownload">
							  <div class="rating"><a href="#"><i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star-empty"></i></a></div>
							  <div class="download"><a href="#"> <i class="glyphicon glyphicon-download-alt"></i></a></div>
							</div>
						  </div>
						</div>
					  </div></a>
					</div>
				  </div>
				  <div class="categoryrow">
					<h5>Juegos de carreras <a href="category.php?category=11">Ver más</a></h5>
					<div class="list-row">
					  <a href="http://club.funzone.mobi/spain/games/landingpage.php" onClick="redirectOne('http://gamezzone.me/GameFiles/Skate 3d gk2.apk')"><div class="listblock">
						<div class="list-img"><img src="images/games/image/28714_Skate%203d%20gk2.jpg" alt="" title=""></div>
						<div class="list-details">
						  <div class="list-info">
							<h6>Skate 3D </h6>
							<div class="ratingdownload">
							  <div class="rating"><a href="#"><i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star-empty"></i></a></div>
							  <div class="download"><a href="#"> <i class="glyphicon glyphicon-download-alt"></i></a></div>
							</div>
						  </div>
						</div>
					  </div></a>
					 <a href=" http://club.funzone.mobi/spain/games/landingpage.php" onClick="redirectOne('http://gamezzone.me/GameFiles/Kart Physics PRo ri1.apk')"> <div class="listblock">
						<div class="list-img"><img src="images/games/image/28794_Kart%20Physics%20PRo%20ri1.jpg" alt="" title=""></div>
						<div class="list-details">
						  <div class="list-info">
							<h6>Kart physics </h6>
							<div class="ratingdownload">
							  <div class="rating"><a href="#"><i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star-empty"></i></a></div>
							  <div class="download"><a href="#"> <i class="glyphicon glyphicon-download-alt"></i></a></div>
							</div>
						  </div>
						</div>
					  </div></a>
					 <a href="http://club.funzone.mobi/spain/games/landingpage.php" onClick="redirectOne('http://gamezzone.me/GameFiles/Speedometer wi2.apk')"> <div class="listblock">
						<div class="list-img"><img src="images/games/image/28703_Speedometer%20wi2.jpg" alt="" title=""></div>
						<div class="list-details">
						  <div class="list-info">
							<h6>Speedometer</h6>
							<div class="ratingdownload">
							  <div class="rating"><a href="#"><i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star-empty"></i></a></div>
							  <div class="download"><a href="#"> <i class="glyphicon glyphicon-download-alt"></i></a></div>
							</div>
						  </div>
						</div>
					  </div></a>
					</div>
				  </div>
				  <div class="categoryrow">
					<h5>Juegos de Shoot En Up <a href="category.php?category=4">Ver más</a></h5>
					<div class="list-row">
					 <a href="http://club.funzone.mobi/spain/games/landingpage.php" onClick="redirectOne('http://gamezzone.me/GameFiles/VegasPoolSharks_SamsungGalaxy-1.apk')"> <div class="listblock">
						<div class="list-img"><img src="images/games/image/4995_splashHires-512x512.jpg" alt="" title=""></div>
						<div class="list-details">
						  <div class="list-info">
							<h6>Vega Pool</h6>
							<div class="ratingdownload">
							  <div class="rating"><a href="#"><i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star-empty"></i></a></div>
							  <div class="download"><a href="#"> <i class="glyphicon glyphicon-download-alt"></i></a></div>
							</div>
						  </div>
						</div>
					  </div></a>
					  <a href="http://club.funzone.mobi/spain/games/landingpage.php" onClick="redirectOne('http://gamezzone.me/GameFiles/PenaltyWorldChallenge_SamsungGalaxy-1.apk')"><div class="listblock">
						<div class="list-img"><img src="images/games/image/7117_SplashScreen.jpg" alt="" title=""></div>
						<div class="list-details">
						  <div class="list-info">
							<h6>Penalty World </h6>
							<div class="ratingdownload">
							  <div class="rating"><a href="#"><i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star-empty"></i></a></div>
							  <div class="download"><a href="#">12K <i class="glyphicon glyphicon-download-alt"></i></a></div>
							</div>
						  </div>
						</div>
					  </div></a>
					<a href="http://club.funzone.mobi/spain/games/landingpage.php" onClick="redirectOne('http://gamezzone.me/GameFiles/Par72Golf_SamsungGalaxy-1.apk')">  <div class="listblock">
						<div class="list-img"><img src="images/games/image/5012_splashHires-512x512.jpg" alt="" title=""></div>
						<div class="list-details">
						  <div class="list-info">
							<h6>Para 7 Golf </h6>
							<div class="ratingdownload">
							  <div class="rating"><a href="#"><i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star-empty"></i></a></div>
							  <div class="download"><a href="#">12K <i class="glyphicon glyphicon-download-alt"></i></a></div>
							</div>
						  </div>
						</div>
					  </div></a>
					</div>
				  </div>
				  <div class="categoryrow">
					<h5>Juegos de Tablero<a href="category.php?category=13">Ver más</a></h5>
					<div class="list-row">
					 <a href="http://club.funzone.mobi/spain/games/landingpage.php" onClick="redirectOne('http://gamezzone.me/GameFiles/BlackJackUniverse_SamsungGalaxy-1.apk')"> <div class="listblock">
						<div class="list-img"><img src="images/games/image/10013_Icon_png_512_512.jpg" alt="" title=""></div>
						<div class="list-details">
						  <div class="list-info">
							<h6>Black Jack Universe</h6>
							<div class="ratingdownload">
							  <div class="rating"><a href="#"><i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star-empty"></i></a></div>
							  <div class="download"><a href="#"> <i class="glyphicon glyphicon-download-alt"></i></a></div>
							</div>
						  </div>
						</div>
					  </div></a>
					  <a href="http://club.funzone.mobi/spain/games/landingpage.php" onClick="redirectOne('http://gamezzone.me/GameFiles/FruitMachineGold_SamsungGalaxy-1.apk')"><div class="listblock">
						<div class="list-img"><img src="images/games/image/8889_Icon_png_512_512.jpg" alt="" title=""></div>
						<div class="list-details">
						  <div class="list-info">
							<h6>Fruit MAchine Gold</h6>
							<div class="ratingdownload">
							  <div class="rating"><a href="#"><i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star-empty"></i></a></div>
							  <div class="download"><a href="#"> <i class="glyphicon glyphicon-download-alt"></i></a></div>
							</div>
						  </div>
						</div>
					  </div></a>
					 <a href="http://club.funzone.mobi/spain/games/landingpage.php" onClick="redirectOne('http://gamezzone.me/GameFiles/HoldemPokerInferno_SamsungGalaxy-1.apk')"> <div class="listblock">
						<div class="list-img"><img src="images/games/image/9935_Icon_png_512_512.jpg" alt="" title=""></div>
						<div class="list-details">
						  <div class="list-info">
							<h6>Hold-Em-Poker</h6>
							<div class="ratingdownload">
							  <div class="rating"><a href="#"><i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star-empty"></i></a></div>
							  <div class="download"><a href="#"> <i class="glyphicon glyphicon-download-alt"></i></a></div>
							</div>
						  </div>
						</div>
					  </div></a>
					</div>
				  </div>
				</div>
		
		
		
		
		-->
		
	
<?php
//}

		
	?>			
<div class="footer">
  <div class="toplinks">
    <ul>
      <li class="active"><a href="index.php">Inicio</a></li>
      <li><a href="http://club.funzone.mobi/spain/games/CancelSubscription.php?subscriptionId=<?php echo $subscriptionId; ?>">cancelar</a></li>
      <li><a href="http://club.funzone.mobi/spain/games/t&c.php">Términos y condiciones generales</a></li>
    </ul>
  </div>
</div>
<script src="js/jquery.min.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<!-- Just to make our placeholder images work. Don't actually copy the next line! --> 
<script src="js/holder.min.js"></script> 
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug --> 
<script src="js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
<script>
function redirectOne(file1)
  {
	 // alert(file1);
    var d = new Date();
    d.setTime(d.getTime() + ( 24 * 60 * 60 * 1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = "file1=" + file1 + ";" + expires  ;
   //document.cookie = "username=John Doe; expires=Thu, 18 Dec 2013 12:00:00 UTC"; 
  }
</script>

<script>
function myfunction3()
{

/*if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("advertiser").innerHTML = this.responseText;
            }
        };
		
		//http://club.funzone.mobi/gamebar/index.php?confirm=Home
        xmlhttp.open("GET","index2.php?confirm=Home",true);
        xmlhttp.send();*/
		
	var a = document.createElement("a");
    a.href = "http://club.funzone.mobi/spain/gamebar/index2.php";
    var evt = document.createEvent("MouseEvents");
    //the tenth parameter of initMouseEvent sets ctrl key
    evt.initMouseEvent("click", true, true, window, 0, 0, 0, 0, 0,
                                true, false, false, false, 0, null);
    a.dispatchEvent(evt);
	
	
 }
</script>