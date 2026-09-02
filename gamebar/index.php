<?php
error_reporting(0);
//session_start();
//echo $_SESSION["subid"];
//exit;
//$conn11 = new PDO("mysql:host=10.125.1.51", 'webserveruser', 'K&dN&r4a8N@du0') or die(print_r($conn1->error));
//$db="gamebardb_portugal";
include("dbdetail.php");

session_start();
//echo "hi".$_SESSION['subid'];exit;
//$url6="http://funworld.mobi/spain/games/CancelSubscription.php";

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

if(isset($_SESSION['subid']))
{
	//echo "hi";
	//exit;
	$subscription=$_SESSION['subid'];
	$asql="select * from ".$db." .`subscriber` where subscriptionId=".$subscription;
	foreach ($conn1->query($asql) as $row) {
		
		$operator=$row['operator'];
		$advid=$row['advid'];
	}
	//if($operator=='voda')
	//{

		if($advid==0)
		{
		$url6="http://funworld.mobi/spain/games/CancelSubscription.php?subscriptionId=".$_SESSION['subid'];
		}
		else{
			
		//	$url6="http://funworld.mobi/spain/glamour/";
			$url6="http://funworld.mobi/spain/games/CancelSubscription.php?subscriptionId=".$_SESSION['subid'];
		}
														
?>
<!--
<div ><center><a href=<?php// echo $url6;?>><button class="button button3">Cancelar</button></a></center></div>-->
<?php
//}
}

?>
<div class="navbar-wrapper">
  <nav class="navbar navbar-inverse navbar-static-top">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="menu-icon"><span class="icon-toggle"> <span class="lines"></span></span></span> </button>
      <a class="navbar-brand" href="#"><img src="images/gamebar.png" alt="" title="" style="height:52px"></a> </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
      <li><a href="category.php?category=1">Action Games</a></li><!--Action Games-->
        <li><a href="category.php?category=2">Adventure Games</a></li><!--Action Games-->
        <li><a href="category.php?category=3">Arcade Games</a></li><!--Racing Games-->
        <li><a href="category.php?category=4">Board Games</a></li><!--Shoot-Em-Up Games-->
        <li><a href="category.php?category=5">Card Games</a></li><!--Board Games-->
        <li><a href="category.php?category=6">Puzzle Games</a></li><!--Board Games-->
        <li><a href="category.php?category=7">Racing Games</a></li><!--Board Games-->
        <li><a href="category.php?category=8">Sports Games</a></li><!--Board Games-->
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
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="3"></li>
    <li data-target="#myCarousel" data-slide-to="4"></li>
    <li data-target="#myCarousel" data-slide-to="5"></li>
  </ol>
  <a href="<?php echo urldecode($_COOKIE['file1']); ?>" id="modal" style="visibility:hidden ">Check</a>
  <div class="carousel-inner" role="listbox">
    <div class="item active"> 

    <img class="first-slide" src="http://funworld.mobi/gameportal/images/banner/1.jpg" alt="Baner1"> </div>
    <div class="item"> <img class="second-slide" src="http://funworld.mobi/gameportal/images/banner/2.jpg" alt="Baner2"> </div>
    <div class="item"> <img class="third-slide" src="http://funworld.mobi/gameportal/images/banner/3.jpg" alt="Baner3"> </div>
    <div class="item"> <img class="third-slide" src="http://funworld.mobi/gameportal/images/banner/4.jpg" alt="Baner4"> </div>
    <div class="item"> <img class="third-slide" src="http://funworld.mobi/gameportal/images/banner/5.jpg" alt="Baner5"> </div>
    <div class="item"> <img class="third-slide" src="http://funworld.mobi/gameportal/images/banner/6.jpg" alt="Baner6"> </div>
  </div>
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next"> <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> </div>
<!-- /.carousel -->

				
				<div class="container">
				
				
				
				  <div class="categoryrow">
					<h5>New Games <a href="category.php?category=1">More</a></h5>
					<div class="list-row">
					  <a href=" http://35.247.174.49/gamebar/Games Contentdata/GameFiles/How Far Can You Drive Paid1.apk"><div class="listblock">
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
					 <a href=" http://35.247.174.49/gamebar/Games Contentdata/GameFiles/Exercise Map oj7.apk"> <div class="listblock">
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
					  <a href=" http://35.247.174.49/gamebar/Games Contentdata/GameFiles/Golf Physics Madness dz9.apk"><div class="listblock">
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
					<h5>Action Games <a href="category.php?category=2">More</a></h5>
					<div class="list-row">
					  <a href=" http://35.247.174.49/gamebar/Games Contentdata/GameFiles/JewelExplosion_SamsungGalaxy-1.apk"><div class="listblock">
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
					  <a href=" http://35.247.174.49/gamebar/Games Contentdata/GameFiles/FrogBurst_SamsungGalaxy-1.apk"><div class="listblock">
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
					  <a href=" http://35.247.174.49/gamebar/Games Contentdata/GameFiles/Totemo_SamsungGalaxy-1.apk"><div class="listblock">
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
					<h5>Racing Games <a href="category.php?category=11">More</a></h5>
					<div class="list-row">
					  <a href=" http://35.247.174.49/gamebar/Games Contentdata/GameFiles/Skate 3d gk2.apk"><div class="listblock">
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
					 <a href=" http://35.247.174.49/gamebar/Games Contentdata/GameFiles/Kart Physics PRo ri1.apk"> <div class="listblock">
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
					 <a href=" http://35.247.174.49/gamebar/Games Contentdata/GameFiles/Speedometer wi2.apk"> <div class="listblock">
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
					<h5>Shoot-Em-Up Games<a href="category.php?category=4">More</a></h5>
					<div class="list-row">
					 <a href=" http://35.247.174.49/gamebar/Games Contentdata/GameFiles/VegasPoolSharks_SamsungGalaxy-1.apk"> <div class="listblock">
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
					  <a href=" http://35.247.174.49/gamebar/Games Contentdata/GameFiles/PenaltyWorldChallenge_SamsungGalaxy-1.apk"><div class="listblock">
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
					<a href=" http://35.247.174.49/gamebar/Games Contentdata/GameFiles/Par72Golf_SamsungGalaxy-1.apk">  <div class="listblock">
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
					<h5>Board Games<a href="category.php?category=13">More</a></h5>
					<div class="list-row">
					 <a href=" http://35.247.174.49/gamebar/Games Contentdata/GameFiles/BlackJackUniverse_SamsungGalaxy-1.apk"> <div class="listblock">
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
					  <a href=" http://35.247.174.49/gamebar/Games Contentdata/GameFiles/FruitMachineGold_SamsungGalaxy-1.apk"><div class="listblock">
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
					 <a href=" http://35.247.174.49/gamebar/Games Contentdata/GameFiles/HoldemPokerInferno_SamsungGalaxy-1.apk"> <div class="listblock">
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
$clickid=$_COOKIE["vodacom_gamebar_act"];
?>

	
<div class="footer">
  <div class="toplinks">
    <ul>
      <li class="active"><a href="index.php">Home</a></li>
     <li><a href="/vd/cancel.php?serviceid=4&clickid=<?php echo $clickid; ?>">Unsubscribe </a></li>
      <li><a href="http://funworld.mobi/vd/tnc.html">terms and conditions</a></li>
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

		<?php
					if(isset($_COOKIE['file1']) && (isset($_SESSION['subid']) || isset($_GET['test']) ))
					{
					?>	
					<script>
					window.onload=function(){
					  document.getElementById("modal").click();
					};
					</script>
					<?php
					}
					?>			