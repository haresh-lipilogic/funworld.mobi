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
    <title>Welcome to - Gamestation Game</title>
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
        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
<?php
$sql1="call htmlgames.GetGames('0',38);";
		//$result1 = $conn->query($sql1);
			$result = array();
		foreach ($conn->query($sql1) as $row) {
			  $result[] = $row;
			}
			//print_r($result);exit;
?>
                    <div class="banner-slider">
                        <center>
                            <!--<div class="numbertext">1 / 3</div>-->
                            <a href="<?php echo "dl.php?ir=".$result[0]['id'];?>"><img class="cost30"
                                    src="<?php echo "https://playcool.games/hgame/".$result[0]['medianame'];?>"></a>
                            <a href="<?php echo "dl.php?ir=".$result[1]['id'];?>"><img class="cost9"
                                    src="<?php echo "https://playcool.games/hgame/".$result[1]['medianame'];?>"></a>
                            <a href="<?php echo "dl.php?ir=".$result[2]['id'];?>"><img class="cost91"
                                    src="<?php echo "https://playcool.games/hgame/".$result[2]['medianame'];?>"></a>
                            <a href="<?php echo "dl.php?ir=".$result[3]['id'];?>"><img class="cost9"
                                    src="<?php echo "https://playcool.games/hgame/".$result[3]['medianame'];?>"></a>
                            <a href="<?php echo "dl.php?ir=".$result[4]['id'];?>"><img class="cost91"
                                    src="<?php echo "https://playcool.games/hgame/".$result[4]['medianame'];?>"></a>

                            <a href="<?php echo "dl.php?ir=".$result[5]['id'];?>"><img class="cost9"
                                    src="<?php echo "https://playcool.games/hgame/".$result[5]['medianame'];?>"></a>
                            <a href="<?php echo "dl.php?ir=".$result[6]['id'];?>"><img class="cost91"
                                    src="<?php echo "https://playcool.games/hgame/".$result[6]['medianame'];?>"></a>

                            <a href="<?php echo "dl.php?ir=".$result[7]['id'];?>"><img class="nocost30"
                                    src="<?php echo "https://playcool.games/hgame/".$result[7]['medianame'];?>"></a>
                            <a href="<?php echo "dl.php?ir=".$result[8]['id'];?>"><img class="nocost9"
                                    src="<?php echo "https://playcool.games/hgame/".$result[8]['medianame'];?>"></a>
                            <a href="<?php echo "dl.php?ir=".$result[9]['id'];?>"><img class="nocost91"
                                    src="<?php echo "https://playcool.games/hgame/".$result[9]['medianame'];?>"></a>
                            <a href="<?php echo "dl.php?ir=".$result[10]['id'];?>"><img class="nocost93"
                                    src="<?php echo "https://playcool.games/hgame/".$result[10]['medianame'];?>"></a>
                            <a href="<?php echo "dl.php?ir=".$result[11]['id'];?>"><img class="nocost913"
                                    src="<?php echo "https://playcool.games/hgame/".$result[11]['medianame'];?>"></a>

                            <!--<div class="text">Caption Text</div></center>-->
                        </center>

                    </div>

                </div>
                <div class="carousel-item">
                    <div class="banner-slider">
                        <center>
                            <!--<div class="numbertext">1 / 3</div>-->
                             <a href="<?php echo "dl.php?ir=".$result[35]['id'];?>"><img class="cost30"
                                    src="<?php echo "https://playcool.games/hgame/".$result[35]['medianame'];?>"></a>
                            <a href="<?php echo "dl.php?ir=".$result[34]['id'];?>"><img class="cost9"
                                    src="<?php echo "https://playcool.games/hgame/".$result[34]['medianame'];?>"></a>
                            <a href="<?php echo "dl.php?ir=".$result[33]['id'];?>"><img class="cost91"
                                    src="<?php echo "https://playcool.games/hgame/".$result[33]['medianame'];?>"></a>
                            <a href="<?php echo "dl.php?ir=".$result[32]['id'];?>"><img class="cost9"
                                    src="<?php echo "https://playcool.games/hgame/".$result[32]['medianame'];?>"></a>
                            <a href="<?php echo "dl.php?ir=".$result[31]['id'];?>"><img class="cost91"
                                    src="<?php echo "https://playcool.games/hgame/".$result[31]['medianame'];?>"></a>

                            <a href="<?php echo "dl.php?ir=".$result[30]['id'];?>"><img class="cost9"
                                    src="<?php echo "https://playcool.games/hgame/".$result[30]['medianame'];?>"></a>
                            <a href="<?php echo "dl.php?ir=".$result[29]['id'];?>"><img class="cost91"
                                    src="<?php echo "https://playcool.games/hgame/".$result[29]['medianame'];?>"></a>

                            <a href="<?php echo "dl.php?ir=".$result[28]['id'];?>"><img class="nocost30"
                                    src="<?php echo "https://playcool.games/hgame/".$result[28]['medianame'];?>"></a>
                            <a href="<?php echo "dl.php?ir=".$result[27]['id'];?>"><img class="nocost9"
                                    src="<?php echo "https://playcool.games/hgame/".$result[27]['medianame'];?>"></a>
                            <a href="<?php echo "dl.php?ir=".$result[26]['id'];?>"><img class="nocost91"
                                    src="<?php echo "https://playcool.games/hgame/".$result[26]['medianame'];?>"></a>
                            <a href="<?php echo "dl.php?ir=".$result[25]['id'];?>"><img class="nocost93"
                                    src="<?php echo "https://playcool.games/hgame/".$result[25]['medianame'];?>"></a>
                            <a href="<?php echo "dl.php?ir=".$result[24]['id'];?>"><img class="nocost913"
                                    src="<?php echo "https://playcool.games/hgame/".$result[24]['medianame'];?>"></a>

                            <!--<div class="text">Caption Text</div></center>-->
                        </center>

                    </div>
                </div>
                <div class="carousel-item">
                    <div class="banner-slider">
                        <center>
                            <!--<div class="numbertext">1 / 3</div>-->
                          
									  <a href="<?php echo "dl.php?ir=".$result[12]['id'];?>"><img class="cost30"
                                    src="<?php echo "https://playcool.games/hgame/".$result[12]['medianame'];?>"></a>
                            <a href="<?php echo "dl.php?ir=".$result[13]['id'];?>"><img class="cost9"
                                    src="<?php echo "https://playcool.games/hgame/".$result[13]['medianame'];?>"></a>
                            <a href="<?php echo "dl.php?ir=".$result[14]['id'];?>"><img class="cost91"
                                    src="<?php echo "https://playcool.games/hgame/".$result[14]['medianame'];?>"></a>
                            <a href="<?php echo "dl.php?ir=".$result[15]['id'];?>"><img class="cost9"
                                    src="<?php echo "https://playcool.games/hgame/".$result[15]['medianame'];?>"></a>
                            <a href="<?php echo "dl.php?ir=".$result[16]['id'];?>"><img class="cost91"
                                    src="<?php echo "https://playcool.games/hgame/".$result[16]['medianame'];?>"></a>

                            <a href="<?php echo "dl.php?ir=".$result[17]['id'];?>"><img class="cost9"
                                    src="<?php echo "https://playcool.games/hgame/".$result[17]['medianame'];?>"></a>
                            <a href="<?php echo "dl.php?ir=".$result[18]['id'];?>"><img class="cost91"
                                    src="<?php echo "https://playcool.games/hgame/".$result[18]['medianame'];?>"></a>

                            <a href="<?php echo "dl.php?ir=".$result[19]['id'];?>"><img class="nocost30"
                                    src="<?php echo "https://playcool.games/hgame/".$result[19]['medianame'];?>"></a>
                            <a href="<?php echo "dl.php?ir=".$result[20]['id'];?>"><img class="nocost9"
                                    src="<?php echo "https://playcool.games/hgame/".$result[20]['medianame'];?>"></a>
                            <a href="<?php echo "dl.php?ir=".$result[21]['id'];?>"><img class="nocost91"
                                    src="<?php echo "https://playcool.games/hgame/".$result[21]['medianame'];?>"></a>
                            <a href="<?php echo "dl.php?ir=".$result[22]['id'];?>"><img class="nocost93"
                                    src="<?php echo "https://playcool.games/hgame/".$result[22]['medianame'];?>"></a>
                            <a href="<?php echo "dl.php?ir=".$result[23]['id'];?>"><img class="nocost913"
                                    src="<?php echo "https://playcool.games/hgame/".$result[23]['medianame'];?>"></a>

                            <!--<div class="text">Caption Text</div></center>-->
                        </center>

                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <div class="game-section">
            <section class="container-fluid mb-3">
                <div class="row">
                    <div class="col titleContainer">
                        <div class="title">
                            <h4>Just Arrived</h4>
                        </div>
                        <div class="viewmore"><a href="category.php?ct=Just Arrived">View More</a></div>
                    </div>
                </div>
				<?php

				$sql1="call htmlgames.catGetGames('action',25);";
						//$result1 = $conn->query($sql1);
							$result = array();
						foreach ($conn->query($sql1) as $row) {
							  $result[] = $row;
							}


				?>
				
                <div class="row gamerow">
                    <div class="col"><a href="<?php echo "dl.php?ir=".$result[0]['id'];?>"><img src="<?php echo "https://playcool.games/hgame/".$result[0]['medianame'];?>"></a>
                    </div>
                    <div class="col"> <a href="<?php echo "dl.php?ir=".$result[1]['id'];?>"><img src="<?php echo "https://playcool.games/hgame/".$result[1]['medianame'];?>"></a>
                    </div>
                    <div class="col"> <a href="<?php echo "dl.php?ir=".$result[2]['id'];?>"><img src="<?php echo "https://playcool.games/hgame/".$result[2]['medianame'];?>"></a>
                    </div>
                    <div class="col"> <a href="<?php echo "dl.php?ir=".$result[3]['id'];?>"><img src="<?php echo "https://playcool.games/hgame/".$result[3]['medianame'];?>"></a>
                    </div>
                    <div class="col"> <a href="<?php echo "dl.php?ir=".$result[4]['id'];?>"><img src="<?php echo "https://playcool.games/hgame/".$result[4]['medianame'];?>"></a>
                    </div>
                    <div class="col"> <a href="<?php echo "dl.php?ir=".$result[5]['id'];?>"><img src="<?php echo "https://playcool.games/hgame/".$result[5]['medianame'];?>"></a>
                    </div>
                    <div class="col"> <a href="<?php echo "dl.php?ir=".$result[6]['id'];?>"><img src="<?php echo "https://playcool.games/hgame/".$result[6]['medianame'];?>"></a>
                    </div>
                    <div class="col"> <a href="<?php echo "dl.php?ir=".$result[7]['id'];?>"><img src="<?php echo "https://playcool.games/hgame/".$result[7]['medianame'];?>"></a>
                    </div>
                    <div class="col"> <a href="<?php echo "dl.php?ir=".$result[8]['id'];?>"><img src="<?php echo "https://playcool.games/hgame/".$result[8]['medianame'];?>"></a>
                    </div>
                    <div class="col"> <a href="<?php echo "dl.php?ir=".$result[9]['id'];?>"><img src="<?php echo "https://playcool.games/hgame/".$result[9]['medianame'];?>"></a>
                    </div>
                   <!-- <div class="col"><a href="<?php //echo "dl.php?ir=".$result[10]['id'];?>"><img src="<?php //echo "https://playcool.games/hgame/".$result[10]['medianame'];?>"></a>
                    </div>
                    <div class="col"><a href="<?php //echo "dl.php?ir=".$result[11]['id'];?>"><img src="<?php //echo "https://playcool.games/hgame/".$result[11]['medianame'];?>"></a>
                    </div>
                    <div class="col"><a href="<?php //echo "dl.php?ir=".$result[12]['id'];?>"><img src="<?php // echo "https://playcool.games/hgame/".$result[12]['medianame'];?>"></a>
                    </div>-->
                </div>
            </section>
			
			
			
            <section class="container-fluid mb-3">
                <div class="row">
                    <div class="col titleContainer">
                        <div class="title">
                            <h4>Most Played</h4>
                        </div>
                        <div class="viewmore"><a href="category.php?ct=Most Played">View More</a></div>
                    </div>
                </div>
				
				
				<?php

				$sql1="call htmlgames.catGetGames('Adventure',25);";
						//$result1 = $conn->query($sql1);
							$result = array();
						foreach ($conn->query($sql1) as $row) {
							  $result[] = $row;
							}


				?>
				
				
				
				
                 <div class="row gamerow">
                    <div class="col"><a href="<?php echo "dl.php?ir=".$result[0]['id'];?>"><img src="<?php echo "https://playcool.games/hgame/".$result[0]['medianame'];?>"></a>
                    </div>
                    <div class="col"> <a href="<?php echo "dl.php?ir=".$result[1]['id'];?>"><img src="<?php echo "https://playcool.games/hgame/".$result[1]['medianame'];?>"></a>
                    </div>
                    <div class="col"> <a href="<?php echo "dl.php?ir=".$result[2]['id'];?>"><img src="<?php echo "https://playcool.games/hgame/".$result[2]['medianame'];?>"></a>
                    </div>
                    <div class="col"> <a href="<?php echo "dl.php?ir=".$result[3]['id'];?>"><img src="<?php echo "https://playcool.games/hgame/".$result[3]['medianame'];?>"></a>
                    </div>
                    <div class="col"> <a href="<?php echo "dl.php?ir=".$result[4]['id'];?>"><img src="<?php echo "https://playcool.games/hgame/".$result[4]['medianame'];?>"></a>
                    </div>
                    <div class="col"> <a href="<?php echo "dl.php?ir=".$result[5]['id'];?>"><img src="<?php echo "https://playcool.games/hgame/".$result[5]['medianame'];?>"></a>
                    </div>
                    <div class="col"> <a href="<?php echo "dl.php?ir=".$result[6]['id'];?>"><img src="<?php echo "https://playcool.games/hgame/".$result[6]['medianame'];?>"></a>
                    </div>
                    <div class="col"> <a href="<?php echo "dl.php?ir=".$result[7]['id'];?>"><img src="<?php echo "https://playcool.games/hgame/".$result[7]['medianame'];?>"></a>
                    </div>
                    <div class="col"> <a href="<?php echo "dl.php?ir=".$result[8]['id'];?>"><img src="<?php echo "https://playcool.games/hgame/".$result[8]['medianame'];?>"></a>
                    </div>
                    <div class="col"> <a href="<?php echo "dl.php?ir=".$result[9]['id'];?>"><img src="<?php echo "https://playcool.games/hgame/".$result[9]['medianame'];?>"></a>
                    </div>
                   <!-- <div class="col"><a href="<?php //echo "dl.php?ir=".$result[10]['id'];?>"><img src="<?php // echo "https://playcool.games/hgame/".$result[10]['medianame'];?>"></a>
                    </div>
                    <div class="col"><a href="<?php //echo "dl.php?ir=".$result[11]['id'];?>"><img src="<?php //echo "https://playcool.games/hgame/".$result[11]['medianame'];?>"></a>
                    </div>
                    <div class="col"><a href="<?php // echo "dl.php?ir=".$result[12]['id'];?>"><img src="<?php //echo "https://playcool.games/hgame/".$result[12]['medianame'];?>"></a>
                    </div>-->
                </div>
            </section>
            <section class="container-fluid mb-3">
                <div class="row">
                    <div class="col titleContainer">
                        <div class="title">
                            <h4>Most Visited</h4>
                        </div>
                        <div class="viewmore"><a href="category.php?ct=Most Visited">View More</a></div>
                    </div>
                </div>
				
				<?php

$sql1="call htmlgames.catGetGames('Racing',25);";
		//$result1 = $conn->query($sql1);
			$result = array();
		foreach ($conn->query($sql1) as $row) {
			  $result[] = $row;
			}


?>
				
				
				
				
                <div class="row gamerow">
                    <div class="col"><a href="<?php echo "dl.php?ir=".$result[0]['id'];?>"><img src="<?php echo "https://playcool.games/hgame/".$result[0]['medianame'];?>"></a>
                    </div>
                    <div class="col"> <a href="<?php echo "dl.php?ir=".$result[1]['id'];?>"><img src="<?php echo "https://playcool.games/hgame/".$result[1]['medianame'];?>"></a>
                    </div>
                    <div class="col"> <a href="<?php echo "dl.php?ir=".$result[2]['id'];?>"><img src="<?php echo "https://playcool.games/hgame/".$result[2]['medianame'];?>"></a>
                    </div>
                    <div class="col"> <a href="<?php echo "dl.php?ir=".$result[3]['id'];?>"><img src="<?php echo "https://playcool.games/hgame/".$result[3]['medianame'];?>"></a>
                    </div>
                    <div class="col"> <a href="<?php echo "dl.php?ir=".$result[4]['id'];?>"><img src="<?php echo "https://playcool.games/hgame/".$result[4]['medianame'];?>"></a>
                    </div>
                    <div class="col"> <a href="<?php echo "dl.php?ir=".$result[5]['id'];?>"><img src="<?php echo "https://playcool.games/hgame/".$result[5]['medianame'];?>"></a>
                    </div>
                    <div class="col"> <a href="<?php echo "dl.php?ir=".$result[6]['id'];?>"><img src="<?php echo "https://playcool.games/hgame/".$result[6]['medianame'];?>"></a>
                    </div>
                    <div class="col"> <a href="<?php echo "dl.php?ir=".$result[7]['id'];?>"><img src="<?php echo "https://playcool.games/hgame/".$result[7]['medianame'];?>"></a>
                    </div>
                    <div class="col"> <a href="<?php echo "dl.php?ir=".$result[8]['id'];?>"><img src="<?php echo "https://playcool.games/hgame/".$result[8]['medianame'];?>"></a>
                    </div>
                    <div class="col"> <a href="<?php echo "dl.php?ir=".$result[9]['id'];?>"><img src="<?php echo "https://playcool.games/hgame/".$result[9]['medianame'];?>"></a>
                    </div>
                    <!--<div class="col"><a href="<?php //echo "dl.php?ir=".$result[10]['id'];?>"><img src="<?php //echo "https://playcool.games/hgame/".$result[10]['medianame'];?>"></a>
                    </div>
                    <div class="col"><a href="<?php //echo "dl.php?ir=".$result[11]['id'];?>"><img src="<?php //echo "https://playcool.games/hgame/".$result[11]['medianame'];?>"></a>
                    </div>
                    <div class="col"><a href="<?php //echo "dl.php?ir=".$result[12]['id'];?>"><img src="<?php //echo "https://playcool.games/hgame/".$result[12]['medianame'];?>"></a>
                    </div>-->
                </div>
            </section>

            <section class="container-fluid mb-3">
                <div class="row">
                    <div class="col titleContainer">
                        <div class="title">
                            <h4>Popular Games</h4>
                        </div>
                        <div class="viewmore"><a href="category.php?ct=Popular Games">View More</a></div>
                    </div>
                </div>
				<?php

				$sql1="call htmlgames.GetGames('11',50);";
						//$result1 = $conn->query($sql1);
							$result = array();
						


				?>
				
				
                <div class="row gamerow">
				
			<?php	
				foreach ($conn->query($sql1) as $row) { ?>
				
				<div class="col"> <a href="<?php echo "dl.php?ir=".$row['id'];?>"><img src="<?php echo "https://playcool.games/hgame/".$row['medianame'];?>"></a>
                    </div>
			   
	<?php		}  ?>
   
                   


                </div>
            </section>
        </div>

        <section class="container-fluid mb-3 showmore-section">
            <div class="row">
                <div class="col">
                    <div class="text-container">
                        <h5>Gamestation – Enjoy Free Unlimited Online Games</h5>
                        <div class="content hideContent">
                            <p><strong>Play the Newest Games Instantly</strong></p>
                            <p>Gamestation features the latest and best free online games. You can enjoy playing fun games
                                without
                                interruptions from downloads, intrusive ads, or pop-ups. Just load up your favourite
                                games instantly
                                in your web browser and enjoy the experience.</p>
                            <p>You can play our games on Laptop’s, Desktop PCs, and Chromebooks, to the latest
                                smartphones and
                                tablets from Apple and Android.</p>
                            <p><strong>Online Games at Gamestation</strong></p>
                            <p>There are plenty of Free Unlimited online games on Gamestation. You can find many of the
                                best games
                                titles on our gaming page.
                            </p>
                            <p><strong>Explore by Genre</strong></p>
                            <p>You can explore all games thru our various categories like action, adventure, sports,
                                board, etc. but
                                there’s also a range of subcategories that will help you find the perfect game. Popular
                                tags include
                                car games, Ludo, Snakes & Ladders, Rummy, Poker, Tetris, Penalty Kicks, Chess, Tic Tac
                                Toe, Flappy
                                Bird, Football & Cricket.</p>
                            <p><strong>About Gamestation</strong></p>
                            <p>Gamestation.games is the world’s most well-known gaming website for free content consumption
                                on
                                Desktops, Laptop's, mobile phones, ipads & other console devices. Our games have been
                                helping gamers
                                to go from completing games to conquering games since years. We deliver a full gamut of
                                games from
                                casual to hardcore, benefit from high-quality guides to enhance their gaming experience.
                                We honor
                                the multi-faceted interests of a diverse world of gamers.</p>
                        </div>
                        <div class="show-more">
                            <a href="javascript:void(0)">Show more</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- FOOTER -->
    <footer>
        <div class="container">
           <!-- <p class="text-center">&copy; 2022 Gamestation &middot; <a href="privacy.html">Privacy</a> &middot; <a
                    href="terms.html">Terms &
                    Conditions</a></p>-->
        </div>
    </footer>

    <script type="text/javascript" src="dist/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="dist/js/jquery-ui.js"></script>
    <script type="text/javascript" src="dist/js/bootstrap.bundle.min.js"></script>

    <script type="text/javascript">
        $(".show-more a").on("click", function () {
            var $this = $(this);
            var $content = $this.parent().prev("div.content");
            var linkText = $this.text().toUpperCase();

            if (linkText === "SHOW MORE") {
                linkText = "Show less";
                $content.switchClass("hideContent", "showContent", 400);
            } else {
                linkText = "Show more";
                $content.switchClass("showContent", "hideContent", 400);
            };

            $this.text(linkText);
        });
    </script>
</body>

</html>