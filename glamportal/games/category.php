<?php
error_reporting(0);
include("../portugal/meo/dbdetail.php");
/*$conn1 = new PDO("mysql:host=10.125.1.51", 'webserveruser', 'K&dN&r4a8N@du0') or die(print_r($conn1->error));
$db="gamebardb_portugal";*/
session_start();

$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
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
<body >


<div class="navbar-wrapper">
  <nav class="navbar navbar-inverse navbar-static-top">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="menu-icon"><span class="icon-toggle"> <span class="lines"></span></span></span> </button>
      <a class="navbar-brand" href="index.php"><img src="http://club.funzone.mobi/portugal/image/gamebar.png" alt="" title="" style="height:52px"></a> </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <li><a href="category.php?category=action">Action</a></li> <!--newgames-->
        <li><a href="category.php?category=adventure">Adventure</a></li><!--Action Games-->
        <li><a href="category.php?category=Arcade">Arcade</a></li><!--Racing Games-->
        <li><a href="category.php?category=Puzzle & Logic">Puzzle & Logic</a></li><!--Shoot-Em-Up Games-->
        <li><a href="category.php?category=Strategy">Strategy</a></li><!--Board Games-->
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

$sql1="select * from game_database . games order by rand() limit 16 ;";

			

			$i=1;
			foreach ($conn1->query($sql1) as $row) {
				$detail[$i]['filename']=$row['filename'];
				$detail[$i]['productcode']=$row['productcode'];
				$detail[$i]['medianame']=$row['medianame'];
				$detail[$i]['productname']=$row['productname'];
				$i++;
			}
			


?>
				<div class="container">
				  <div class="categoryrow">
					<h5>
					<?php
					
					
						echo $_GET['category'];
					
					
					
					
					
					?>
					</h5>
					
					<?php
					foreach ($conn1->query($sql1) as $row) {
					?>
					<a href=" <?php echo $row['url'];?>">
					<div style="height: 200px; width: 43%; color: #900; border: solid; background-color: #fff; border-color: #FF0; border-radius: 9px; position: relative; float: left; margin: 1% 1% 3% 3%; max-width: 200px;"><div>
					<img style="width:100%;height:140px" src="<?php echo $row['cover'];?>"></div><center><div><h4><?php echo $row['name'];?></h4>

					</div></center>
					</div></a>
					<?php
					}
					?>
				  </div>
				
				   <div class="categoryrow">
				   <h5> <a href="<?php echo $actual_link;?>">More</a></h5>
				  </div>
				 
				</div>
				
				
	<?php
	

		
	?>			
<div class="footer">
 
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
    a.href = "http://club.funzone.mobi/gamebar/index2.php";
    var evt = document.createEvent("MouseEvents");
    //the tenth parameter of initMouseEvent sets ctrl key
    evt.initMouseEvent("click", true, true, window, 0, 0, 0, 0, 0,
                                true, false, false, false, 0, null);
    a.dispatchEvent(evt);
	
	
 }
</script>