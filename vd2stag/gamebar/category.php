<?php
include('include/connection.php');
include('header.php');
error_reporting(0);
session_start();
$msisdn=$_SESSION["msisdn"];
$clickid=$_SESSION["clickid"];
$language=$_SESSION["language"];
if(!isset($_SESSION["language"]))
{	
$language=1;
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>Welcome to - GameStation</title>
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="dist/css/carousel.css" rel="stylesheet">
    <link href="dist/css/custom.css" rel="stylesheet">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="assets/img/favicons/favicon.png" sizes="180x180">
    <link rel="icon" href="assets/img/favicons/favicon.png" sizes="32x32" type="image/png">
    <link rel="icon" href="assets/img/favicons/favicon.png" sizes="16x16" type="image/png">
    <link rel="mask-icon" href="assets/img/favicons/favicon.png" color="#712cf9">
    <link rel="icon" href="assets/img/favicons/favicon.png">
    <meta name="theme-color" content="#712cf9">
	<!--<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6691359041342922"
     crossorigin="anonymous"></script>
	 <script async src="https://www.googletagmanager.com/gtag/js?id=G-JCN31FTC9F"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'G-JCN31FTC9F');
	</script>-->

</head>

<body>

    <header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php"><img src="https://gamebar.mobi/images/logo.png" style="width:100%"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <?php include('headbar.php');?>
            </div>
        </nav>
    </header>

    <main>
        <div class="game-section">
            <section class="container-fluid mb-3">
                <div class="row">
                    <div class="col titleContainer">
                        <div class="title">
                            <h4><?php echo $_GET['ct'];?> Games</h4>
                        </div>
                    </div>
                </div>
				
<?php

if($_GET['ct']=='Just Arrived')
{
$sql1="select * from htmlgames.html where  isdisplay >= 1  order by id desc limit 30";

//echo $sql1;exit;
		//$result1 = $conn->query($sql1);
			$result = array();
}
else if($_GET['ct']=='Just Arrived')
{
$sql1="select * from htmlgames.html where  isdisplay >= 1  order by id desc limit 30";

//echo $sql1;exit;
		//$result1 = $conn->query($sql1);
			$result = array();
}
else if($_GET['ct']=='Most Played')
{
$sql1="select * from htmlgames.html where  isdisplay >= 1  order by isdisplay desc limit 30";

//echo $sql1;exit;
		//$result1 = $conn->query($sql1);
			$result = array();
}
else if($_GET['ct']=='Most Visited')
{
$sql1="select * from htmlgames.html where  isdisplay >= 1  order by isdisplay asc limit 30";

//echo $sql1;exit;
		//$result1 = $conn->query($sql1);
			$result = array();
}
else if($_GET['ct']=='Popular Games')
{
$sql1="select * from htmlgames.html where  isdisplay >= 1  order by id asc limit 30";

//echo $sql1;exit;
		//$result1 = $conn->query($sql1);
			$result = array();
}

else{
$sql1="select * from htmlgames.html where  isdisplay >= 1  order by rand() limit 40"; //and (productname like '%".$_GET['ct']."%' or category like '%".$_GET['ct']."%')
		//$result1 = $conn->query($sql1);
			$result = array();
}		


?>

				
				
				
				
                <div class="row gamerow1">
                    <?php
 
 foreach ($conn->query($sql1) as $row) { ?>
			   <div class="col"> <a href="<?php echo "dl.php?ir=".$row['id'];?>"><img src="<?php echo "https://game.lkjgf.xyz/".$row['medianame'];?>"></a> </div>
	<?php		}  ?>
                    
                   


                </div>
            </section>
        </div>

    </main>
    <!-- FOOTER -->
   <!-- <footer>
        <div class="container">
            <p class="text-center">&copy; 2022 Gamebar &middot; 
			

                   		<?php //if($language==2)
					//	{
						?>
						<a href="tnc.html">ውሎች እና ሁኔታዎች</a>
						
						<?php 
						//}
						//else{
						?>		<a href="tnc.html">Terms &
							Conditions</a>
						<?php
					//	}
						?>
					
					</p>
        </div>
    </footer>-->

    <script src="dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>