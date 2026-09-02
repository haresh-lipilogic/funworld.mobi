<?php
//error_reporting(0);
//$conn11 = new PDO("mysql:host=10.125.1.51", 'webserveruser', 'K&dN&r4a8N@du0') or die(print_r($conn1->error));
//$db="gamebardb_portugal";
//include("../glamour/dbdetail.php");
//$url60="http://club.funzone.mobi/spain/glamour/CancelSubscription.php";
//session_start();

$conn1 = mysqli_connect('10.34.240.214', 'webserveruser', 'K&dN&r4a8N@du0') or die(print_r($conn1->error));
mysqli_set_charset($conn1,"utf8");
 $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

 if(isset($_GET['id']))
 {
	 $id=$_GET['id'];
 }
 else{
	 
	 header("location:index_fr.php");
	 exit;
	 
 }
 
if (isset($_GET['p']))
{
	$p=$_GET['p'];
	$p=$p+12;
	$actual_link="index_fr.php?p=$p";
}

else{
$p=12;
$actual_link="index_fr.php?p=$p";
}

?>

<!DOCTYPE html>
<html >
<head>
<meta charset="utf-8mb4">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name=viewport content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title>Bienvenue chez worldforher</title>
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
					body{
	
	background-size:cover; 
	font-size:14px;
	font-family: 'Open Sans', sans-serif;
	margin: 0px;
	padding: 0px;
}
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

<body>

<div class="navbar-wrapper">
  <nav class="navbar navbar-inverse navbar-static-top">
    <div class="navbar-header">
      <!--<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="menu-icon"><span class="icon-toggle"> <span class="lines"></span></span></span> </button>-->
      <a class="navbar-brand" href="index_fr.php"><img src="image/logo.png" alt="" title="" style="height:50px ;width:40%"></a> </div>
     <div id="navbar" class="navbar-collapse collapse" style="
    background-color: #cab4cb;">
      <ul class="nav navbar-nav">
       <!--<li><a href="category.php?category=1&page=0">Vídeos nuevos</a></li> <!--newgames-->
       <!-- <li><a href="category.php?category=2">Jogos de Ação</a></li><!--Action Games-->
        <!-- <li><a href="category.php?category=2&page=0">Vídeos calientes</a></li><!--Racing Games-->
       <!--  <li><a href="category.php?category=3&page=0">Nuevas imágenes</a></li><!--Shoot-Em-Up Games-->
       <!--  <li><a href="category.php?category=4&page=0">Imágenes calientes</a></li><!--Board Games
      </ul>
    </div>-->
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

<!-- /.carousel -->
<?php


$sql1="select * from videocontent. worldforher where id=$id order by id asc  ";
//if(isset($_SESSION['subid']))
$j=1;
if($j==1)
{
	
	 //$subscriptionId=$_SESSION['subid'];
	//if(isset($_SESSION['expire']))
	if($j==1)
	{
	
		//if(time() < $_SESSION['expire'])
		
		if($j==1)
		{
			
			

			$i=1;
			
			


?>
				
				 
					<center>
					<table style="max-width=70%; ">
					<?php
					foreach ($conn1->query($sql1) as $row) {
						$title=$row['title_fr'];
						$image=$row['image'];
						$description=$row['description_fr'];
						
					}
					?>
					
					
					
					
					<center>
					<div style="color:#900">
					<h4><?php echo $title;?></h4>
					
					<br>
					<img  src="image2/<?php echo $image;?>">
					<br>
					<h4><?php echo $description;?></h4>
					
					</center>
					</div>
					
					<?php
					
					}
					
					?>
					</table>
					</center>
				  </div>
				
				 
				   <div class="categoryrow">
				   <h5> <a href="category_fr.php?id=<?php echo $id+1;?>">Next</a></h5>
				  </div>
				 
				</div>
				
				
	<?php
	}
	else{
		unset($_SESSION['']); // will delete just the name data

		session_destroy();
		
		header('Location:http://club.funzone.mobi/portugal/meo/index.php');
	}
	
}
else{
	
	?>
	
		
		<!--<div class="container">
				  <div class="categoryrow">
					<h5>New Games <a href="#">See all</a></h5>
					<div class="list-row">
					  <a href="http://club.funzone.mobi/portugal/meo/landingpage.php" onClick="redirectOne('http://gamezzone.me/GameFiles/How Far Can You Drive Paid1.apk')"><div class="listblock">
						<div class="list-img"><img src="http://gamezzone.me/mediafiles/28821_How%20Far%20Can%20You%20Drive%20Paid1.jpg" alt="" title=""></div>
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
					 <a href=" http://club.funzone.mobi/portugal/meo/landingpage.php" onClick="redirectOne('http://gamezzone.me/GameFiles/Exercise Map oj7.apk')"> <div class="listblock">
						<div class="list-img"><img src="http://gamezzone.me/mediafiles/28923_Exercise Map oj7.jpg" alt="" title=""></div>
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
					  <a href="http://club.funzone.mobi/portugal/meo/landingpage.php" onClick="redirectOne('http://gamezzone.me/GameFiles/Golf Physics Madness dz9.apk')"><div class="listblock">
						<div class="list-img"><img src="http://gamezzone.me/mediafiles/28848_Golf%20Physics%20Madness%20dz9.jpg" alt="" title=""></div>
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
					<h5>Action Games <a href="#">See all</a></h5>
					<div class="list-row">
					  <a href="http://club.funzone.mobi/portugal/meo/landingpage.php" onClick="redirectOne('http://gamezzone.me/GameFiles/JewelExplosion_SamsungGalaxy-1.apk')"><div class="listblock">
						<div class="list-img"><img src="http://gamezzone.me/mediafiles/10214_Icon_png_512_512.png" alt="" title=""></div>
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
					  <a href="http://club.funzone.mobi/portugal/meo/landingpage.php" onClick="redirectOne('http://gamezzone.me/GameFiles/FrogBurst_SamsungGalaxy-1.apk')"><div class="listblock">
						<div class="list-img"><img src="http://gamezzone.me/mediafiles/9796_Icon_png_512_512.png" alt="" title=""></div>
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
					  <a href="http://club.funzone.mobi/portugal/meo/landingpage.php" onClick="redirectOne('http://gamezzone.me/GameFiles/Totemo_SamsungGalaxy-1.apk')"><div class="listblock">
						<div class="list-img"><img src="http://gamezzone.me/mediafiles/4611_Icon_png_512_512.png" alt="" title=""></div>
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
					<h5>Racing Games <a href="#">See all</a></h5>
					<div class="list-row">
					  <a href="http://club.funzone.mobi/portugal/meo/landingpage.php" onClick="redirectOne('http://gamezzone.me/GameFiles/Skate 3d gk2.apk')"><div class="listblock">
						<div class="list-img"><img src="http://gamezzone.me/mediafiles/28714_Skate%203d%20gk2.jpg" alt="" title=""></div>
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
					 <a href=" http://club.funzone.mobi/portugal/meo/landingpage.php" onClick="redirectOne('http://gamezzone.me/GameFiles/Kart Physics PRo ri1.apk')"> <div class="listblock">
						<div class="list-img"><img src="http://gamezzone.me/mediafiles/28794_Kart%20Physics%20PRo%20ri1.jpg" alt="" title=""></div>
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
					 <a href="http://club.funzone.mobi/portugal/meo/landingpage.php" onClick="redirectOne('http://gamezzone.me/GameFiles/Speedometer wi2.apk')"> <div class="listblock">
						<div class="list-img"><img src="http://gamezzone.me/mediafiles/28703_Speedometer%20wi2.jpg" alt="" title=""></div>
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
					<h5>Shoot Em Up Games <a href="#">See all</a></h5>
					<div class="list-row">
					 <a href="http://club.funzone.mobi/portugal/meo/landingpage.php" onClick="redirectOne('http://gamezzone.me/GameFiles/VegasPoolSharks_SamsungGalaxy-1.apk')"> <div class="listblock">
						<div class="list-img"><img src="http://gamezzone.me/mediafiles/4995_splashHires-512x512.jpg" alt="" title=""></div>
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
					  <a href="http://club.funzone.mobi/portugal/meo/landingpage.php" onClick="redirectOne('http://gamezzone.me/GameFiles/PenaltyWorldChallenge_SamsungGalaxy-1.apk')"><div class="listblock">
						<div class="list-img"><img src="http://gamezzone.me/mediafiles/7117_SplashScreen_png_320_320.png" alt="" title=""></div>
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
					<a href="http://club.funzone.mobi/portugal/meo/landingpage.php" onClick="redirectOne('http://gamezzone.me/GameFiles/Par72Golf_SamsungGalaxy-1.apk')">  <div class="listblock">
						<div class="list-img"><img src="http://gamezzone.me/mediafiles/5012_splashHires-512x512.jpg" alt="" title=""></div>
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
					<h5>Board games <a href="#">See all</a></h5>
					<div class="list-row">
					 <a href="http://club.funzone.mobi/portugal/meo/landingpage.php" onClick="redirectOne('http://gamezzone.me/GameFiles/BlackJackUniverse_SamsungGalaxy-1.apk')"> <div class="listblock">
						<div class="list-img"><img src="http://gamezzone.me/mediafiles/10013_Icon_png_512_512.png" alt="" title=""></div>
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
					  <a href="http://club.funzone.mobi/portugal/meo/landingpage.php" onClick="redirectOne('http://gamezzone.me/GameFiles/FruitMachineGold_SamsungGalaxy-1.apk')"><div class="listblock">
						<div class="list-img"><img src="http://gamezzone.me/mediafiles/8889_Icon_png_512_512.png" alt="" title=""></div>
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
					 <a href="http://club.funzone.mobi/portugal/meo/landingpage.php" onClick="redirectOne('http://gamezzone.me/GameFiles/HoldemPokerInferno_SamsungGalaxy-1.apk')"> <div class="listblock">
						<div class="list-img"><img src="http://gamezzone.me/mediafiles/9935_Icon_png_512_512.png" alt="" title=""></div>
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
				</div>-->
		<div class="container">
				  <div class="categoryrow">
					
		<?php
		foreach ($conn1->query($sql1) as $row) {
		?>
		
		<a href="http://club.funzone.mobi/portugal/meo/index.php" onClick="redirectOne('http://gamezzone.me/GameFiles/<?php echo $row["filename"]; ?> ')"><!-- style="pointer-events: none;">-->
		<div style="height: 200px; width: 43%; color: #900; border: solid; background-color: #fff; border-color: #FF0; border-radius: 9px; position: relative; float: left; margin: 1% 1% 3% 3%; max-width: 200px;"><div>
		<img style="width:100%;height:120px" src="http://gamezzone.me/mediafiles/<?php echo $row['productcode']."_".$row['medianame'];?>"></div><center><div><h4><?php echo $row['productname'];?></h4></div></center>
		</div></a>
		<?php
		}
		?>
		  </div>
		  
					<div class="categoryrow1">
				   <h5> <a href="<?php echo $actual_link;?>">Back</a></h5>
				  </div>
				
				   <div class="categoryrow">
				   <h5> <a href="<?php echo $actual_link;?>">Next</a></h5>
				  </div>
				 
				</div>
		
	
<?php
		
}

		
	?>			

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
    a.href = "http://club.funzone.mobi/gamebar/index2.php";
    var evt = document.createEvent("MouseEvents");
    //the tenth parameter of initMouseEvent sets ctrl key
    evt.initMouseEvent("click", true, true, window, 0, 0, 0, 0, 0,
                                true, false, false, false, 0, null);
    a.dispatchEvent(evt);
	
	
 }
</script>