<?php
error_reporting(0);
//$conn11 = new PDO("mysql:host=10.125.1.51", 'webserveruser', 'K&dN&r4a8N@du0') or die(print_r($conn1->error));
//$db="gamebardb_portugal";
include("includes/dbdetail.php");

$cat1=$_GET['category'];
$page=0;
if(isset($_GET['page']))
{
	$page=$_GET['page']+12;
	
}
if($cat1==1 || $cat1==2)
{
if($page>132)
{
	$page=0;
}
}
$actual_link1='category.php?category='.$cat1.'&page='.$page;
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name=viewport content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title>Welcome to GlamourWorld</title>
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

<body>
<?php



?>
<div class="navbar-wrapper">
  <nav class="navbar navbar-inverse navbar-static-top">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="menu-icon"><span class="icon-toggle"> <span class="lines"></span></span></span> </button>
      <a class="navbar-brand" href="index.php"><img src="image/logo.png" alt="" title="" style="height:52px"></a> </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
         <li><a href="category.php?category=1&page=0">New videos</a></li> <!--newgames-->
       <!-- <li><a href="category.php?category=2">Jogos de Ação</a></li><!--Action Games-->
        <li><a href="category.php?category=2&page=0">Hot Videos</a></li><!--Racing Games-->
        <li><a href="category.php?category=3&page=0">New Images</a></li><!--Shoot-Em-Up Games-->
        <li><a href="category.php?category=4&page=0">Hot images</a></li><!--Board Games-->
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
    <img class="first-slide" src="images/banner1.jpg" alt="Baner1"> </div>
    <div class="item"> <img class="second-slide" src="images/banner2.jpg" alt="Baner2"> </div>
    <div class="item"> <img class="third-slide" src="images/banner3.jpg" alt="Baner3"> </div>
    <div class="item"> <img class="third-slide" src="images/banner4.jpg" alt="Baner4"> </div>
    <div class="item"> <img class="third-slide" src="images/banner5.jpg" alt="Baner5"> </div>
    <div class="item"> <img class="third-slide" src="images/banner6.jpg" alt="Baner6"> </div>
  </div>
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next"> <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> </div>
<!-- /.carousel -->
<?php

if($_GET['category']==1)
{
	$cate=3;
}else if($_GET['category']==2)
{
	$cate=3;
}else if($_GET['category']==3)
{
	$cate=1;
}else 
{
	$cate=1;
}

if($_GET['category']==1 || $_GET['category']==3 )
{
$sql1="call fashionbardb.mehul_get_files2(".$cate.",".$page.");";
}
else{
	$sql1="call fashionbardb.mehul_get_files1(".$cate.",".$page.");";
	
}

			
			

			
			


?>
				<div class="container">
				  <div class="categoryrow">
					<h5>
					<?php
					
					if($_GET['category']==1)
					{
						echo "New Videos";
					}	
					else if($_GET['category']==2)
					{
						echo "Hot Videos";
					}
					else if($_GET['category']==3)
					{
						echo "New Images";
					}
					else
					{
						echo "Hot Videos";
					}
					
					
					
					
					
					?>
					</h5>
					
					<?php
					foreach ($conn1->query($sql1) as $row) {
					if($_GET['category']==1 || $_GET['category']==2){
					//echo "hi";
					?>
					
					<a href="http://35.247.174.49/glambar/videocontent/images/gallary/rgkvideos/<?php echo $row['filename'];?>"><!-- style="pointer-events: none;">-->
					<div style="height: 60%; width: 100%; color: #900; border: solid; background-color: #fff; border-color: #c8b2cb; border-radius: 9px; position: relative; float: left; margin: 1% 1% 3% 3%; max-width: 500px;"><div>
					<img style="width:100%;height:260px" src="http://35.247.174.49/glambar/videocontent/images/gallary/thumb/<?php echo $row['thumbfile'];?>"></div><center><div><h4><?php echo $row['itemdescription'];?></h4></div></center>
					</div></a>
					<?php
					}
					else{
						//echo "hi1";
					?>

						<a href="http://35.247.174.49/glambar/videocontent/images/gallary/thumb/<?php echo $row['thumbfile'];?> "><!-- style="pointer-events: none;">-->
					<div style="height: 30%; width: 100%; color: #900; border: solid; background-color: #fff; border-color: #c8b2cb; border-radius: 9px; position: relative; float: left; margin: 1% 1% 3% 3%; max-width: 170px;"><div>
					<img style="width:100%;height:180px" src="http://35.247.174.49/glambar/videocontent/images/gallary/thumb/<?php echo $row['thumbfile'];?>"></div><center><div><h4><?php echo $row['itemdescription'];?></h4></div></center>
					</div></a>
						
					
					
					<?php	
					}
					
					}
					?>
				  </div>
				
				   <div class="categoryrow">
				   <h5> <a href="<?php echo $actual_link1;?>">More</a></h5>
				  </div>
				 
				</div>
				
				
			
<?php
$clickid=$_COOKIE["italyglambar"];
?>

<!--	
<div class="footer">
  <div class="toplinks">
    <ul>
	
	<li><a href="../glamour/TC">termini e condizioni</a></li>
     <li><a href="../glamour/INFO">info e privacy</a></li>
     <li><a href="../glamour/TERMINALI">terminali compatibili</a></li>
     <li><a href="../glamour/Contattaci">Contattaci</a></li>
	 
	 
     <li><a href="../glamour/cancel.php?clickid=<?php //echo $clickid; ?>">Gestione servizi </a></li>
   
     
    </ul>
  </div>
</div>-->
<script src="js/jquery.min.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<!-- Just to make our placeholder images work. Don't actually copy the next line! --> 
<script src="js/holder.min.js"></script> 
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug --> 
<script src="js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
<script>
function redirectOne(file2)
  {
	 // alert(file1);
    var d = new Date();
    d.setTime(d.getTime() + ( 24 * 60 * 60 * 1000));
    var expires1 = "expires="+d.toUTCString();
    document.cookie = "file2=" + file2 + ";" + expires1  ;
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
		
	/*var a = document.createElement("a");
    a.href = "http://club.funzone.mobi/portugal/glambar/file.php";
    var evt = document.createEvent("MouseEvents");
    //the tenth parameter of initMouseEvent sets ctrl key
    evt.initMouseEvent("click", true, true, window, 0, 0, 0, 0, 0,
                                true, false, false, false, 0, null);
    a.dispatchEvent(evt);
	*/
	
 }
</script>