<?php
include('include/connection.php');
error_reporting(0);


// Langauge
$title="Gamebar";
$justarrived="Just Arrived";
$mostplayed="Most Played";
$mostvisited="Most Visited";
$populargames="Popular Games";
$populargames="Popular Games";
$more="More"; // This is currently hidden on index page. 
$unsub="UNSUBSCRIBE";

?>
 

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title><?php echo $title; ?></title>
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="dist/css/carousel.css" rel="stylesheet">
    <link href="dist/css/custom.css" rel="stylesheet">

    <!-- Favicons -->
  
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
                <a class="navbar-brand" href="index.php?&clickid=<?php echo $clickid;?>&msisdn=<?php echo $msisdn; ?>"><img src="./assets/logo/gamebar.png" style="width:100%"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav ms-auto mb-2 mb-md-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="index.php" style="text-decoration:none;">Home</a>
                        </li>
						
						<?php 
							$sql_cat="call gamesdb.GetCategory()";
							$res_cat=$conn->query($sql_cat);
							while($row_cat= $res_cat->fetch())
							{
								if($_GET['ct'] == $row_cat['cat_name'])
								{
									$active="active";
								}
								else
								{
									$active="";
								}
						?>
							
							<li class="nav-item">
								<a class="nav-link <?php echo $active; ?>" href="category.php?ct=<?php echo $row_cat['cat_name']; ?>&msisdn=<?php echo $msisdn; ?>&clickid=<?php echo $clickid; ?>" style="text-decoration:none;">
									<?php echo $row_cat['cat_name']; ?>
								</a>
							</li>
							 
						<?php
							}
							$res_cat='';
						?>

                       
                    </ul>
                    
                </div>
            </div>
        </nav>
    </header>