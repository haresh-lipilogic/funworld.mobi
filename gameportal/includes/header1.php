<?php

include("connection.php");
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
      <a class="navbar-brand" href="http://club.funzone.mobi/myanmar/content/content.php"><img src="http://club.funzone.mobi/portugal/image/gamebar.png" alt="" title="" style="height:52px"></a> </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <li><a href="newcategory.php?category=1">New Games</a></li> <!--newgames-->
        <li><a href="newcategory.php?category=2">Action Games</a></li><!--Action Games-->
        <li><a href="newcategory.php?category=11">Racing Games</a></li><!--Racing Games-->
        <li><a href="newcategory.php?category=4">Shoot'em  up Games</a></li><!--Shoot-Em-Up Games-->
		
		
       
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
  
    <div class="item"> <img class="third-slide" src="images/banner/banner6.jpg" alt="Baner6"> </div>
  </div>