<?php
error_reporting(0);
//$conn11 = new PDO("mysql:host=10.125.1.51", 'webserveruser', 'K&dN&r4a8N@du0') or die(print_r($conn1->error));
//$db="gamebardb_portugal";
//include("../glamour/dbdetail.php");
//$url60="http://funworld.mobi/spain/glamour/CancelSubscription.php";
//session_start();

$conn1 = mysqli_connect('10.34.240.214', 'webserveruser', 'K&dN&r4a8N@du0') or die(print_r($conn1->error));

 $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

if (isset($_GET['p']))
{
	$p=$_GET['p'];
	$p=$p+12;
	$actual_link="thesis.php?p=$p";
}

else{
$p=0;
$actual_link="thesis.php?p=$p";
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name=viewport content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="description" content="">
<meta name="author" content="">


<title>Welcome to worldforher</title>
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

<style>
.footer {
  
   left: 0;
   bottom: 0;
   width: 100%;
   background-color: red;
   color: white;
   text-align: center;
   position: relative;
}
.dropbtn {
    background:transparent;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

.dropbtn:hover, .dropbtn:focus {
   
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
	display: none;
	position: absolute;
	background-color: #000033;
	min-width: 160px;
	overflow: auto;
	box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
	z-index: 1;
}

.dropdown-content a {
    color: white;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown a:hover {
	background:white;
	color:black;
	font-size:20px;
	
}

.show {display:block;}

</style>					
					
</head>

<body>

<div class="navbar-wrapper">
  <nav class="navbar navbar-inverse navbar-static-top">
    <div class="navbar-header">
	
	
	
<div class="dropdown" >
<img onclick="myFunction()" class="dropbtn" src="icon_menu.png">



  <div id="myDropdown" class="dropdown-content">
    <a href="index.php">Home</a>
    <a href="<?php echo $actual_link;?>">Tips</a>
    <a href="videos.php">Videos</a>
    
  </div><a href='index.php'><img  src="image/logo.png" width="173" height="58" class="logosvg"></a>
</div>

	
	
	
	
	
	
      
     <!-- <a class="navbar-brand" href="#"><img src="image/logo.png" alt="" title="" style="height:50px ;width:40%"></a> --></div>
     <div id="navbar" class="navbar-collapse collapse" style="
    background-color: #cab4cb;">
      <ul class="nav navbar-nav">
      
  </nav>
</div>

<div id="myCarousel" class="carousel slide" data-ride="carousel"> 
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  
  </ol>
  <div class="carousel-inner" role="listbox" style="max-height=759px; important";>
    <div class="item active"> 
	
	
	
    <img class="first-slide" src="images/use1.jpg" style="max-height=759px;" alt="Baner1"> </div>
   
    <div class="item"> <img class="third-slide" src="images/use2.jpg" alt="Baner2" style="max-height=759px;"> </div>
    <div class="item"> <img class="third-slide" src="images/use3.jpg" alt="Baner3" style="max-height=759px;"> </div>
  
  </div>
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next"> <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> </div>

<?php


$sql1="select * from videocontent.worldforher order by id asc limit $p, 6";

$j=1;

	
	
		
		if($j==1)
		{
			
			

			$i=1;
			
			


?>
				
				 
					<center>
					
					
					<table style="max-width=30%; ">
					<?php
					foreach ($conn1->query($sql1) as $row) {
						
						//border: solid;  #fff; border-color: #040404; border-radius: 9px; margin-top:30px; border-spacing: 5px;padding-top: .5em;padding-bottom: .5em;
					?>
					
					
					
					<tr  style=" border: 3px solid #900;text-align: center;important!;padding=10px important">
					
					<td  scope="row"style="max-width=10%;border-left: 2px solid #900;border-top: 3px solid #900;border-bottom: 2px solid #900;padding-top: 10px ;padding-left: 10px ;padding-bottom: 10px ;text-align: center;"> 
					<a href="category.php?id=<?php echo $row['id'];?>">
					<img  src="image2/<?php echo $row['image'];?>" style="max-width:100px;">
					</a>
					</td>
					
					
					<td  style="max-width=10%;border-right: 2px solid #900;border-top: 3px solid #900;border-bottom: 2px solid #900;padding-top: 10px ;padding-right: 10px ;padding-bottom: 10px ;text-align: center;position:relative">
					<a href="category.php?id=<?php echo $row['id'];?>">
					<label style=" font-size: 15px;color:#900"><?php echo $row['title'];?></label>
					</a>
					</td>
					
					</tr>
					
					
					<?php
					
					}
					
					?>
					</table>
					</center>
				  </div>
				
				   <div class="categoryrow">
				   <h5> <a href="<?php echo $actual_link;?>">More</a></h5>
				  </div>
				 
				</div>
				
				
	<?php
	
}

 //session_start();
$clickid=$_COOKIE["vodacom_worldforher_act"];

	?>	
<br>
<br>
	
<div class="footer">
  <div class="toplinks">
    <ul>
      <li class="active"><a href="index.php">Home</a></li>
     <li><a href="../vodacom/cancel.php?serviceid=1&clickid=<?php echo $clickid; ?>">Unsubscribe </a></li>
      <li><a href="http://funworld.mobi/vodacom/tnc.html">terms and conditions</a></li>
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
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>