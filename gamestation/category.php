<?php
include('include/connection.php');
include('header.php');
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>Welcome to -Gamestation</title>
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
                <a class="navbar-brand" href="index.php"><img src="assets/img/gamestation.png" style="width:100%"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                     <ul class="navbar-nav ms-auto mb-2 mb-md-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="category.php?ct=Action">Action</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="category.php?ct=Adventure">Adventure</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="category.php?ct=Arcade">Arcade</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="category.php?ct=Board">Board</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="category.php?ct=Racing">Racing</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="category.php?ct=Sports">Sports</a>
                        </li>
                    </ul>
					 <form class="d-flex searchbox" role="search" action="action.php">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
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
			   <div class="col"> <a href="<?php echo "dl.php?ir=".$row['id'];?>"><img src="<?php echo "https://playcool.games/hgame/".$row['medianame'];?>"></a> </div>
	<?php		}  ?>
                    
                   


                </div>
            </section>
        </div>

    </main>
    <!-- FOOTER -->
    <footer>
        <div class="container">
         <!--   <p class="text-center">&copy; 2022 Gamebar &middot; <a href="privacy.html">Privacy</a> &middot; <a
                    href="terms.html">Terms &
                    Conditions</a></p>-->
        </div>
    </footer>

    <script src="dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>