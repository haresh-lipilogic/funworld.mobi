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


<?php

$sql1="select * from htmlgames.html where  id='".$_GET['ir']."'   order by id asc limit 1";
$flag=1;
foreach ($conn->query($sql1) as $row) {
				$flag=0;
			  $result[] = $row;
			}
			
if($_GET['ir']==141)
{	
 $url=$result[0]['filename'];
	//header("Location:$url");	exit;
}
else{
	
	$url="https://game.lkjgf.xyz/".$result[0]['filename']."index.html";
	
}



?>

<?php

$sql1="select * from htmlgames.html where  id !='".$_GET['ir']."'  order by rand() limit 50";
		//$result1 = $conn->query($sql1);
			$result = array();
		foreach ($conn->query($sql1) as $row) {
			  $result[] = $row;
			}


?>



    <main>
        <div class="game-section">
            <section class="container-fluid mb-3">
                <div class="row">
                    <div class="col">
                        <iframe src="<?php echo $url;?>" class="iframe-game"></iframe>
                    </div>
                </div>
                <div class="row gamerow">
                    <div class="col"> <a href="<?php echo "dl.php?ir=".$result[0]['id'];?>"><img src="<?php echo "https://game.lkjgf.xyz/".$result[0]['medianame'];?>"></a>
                    </div>
                    <div class="col"> <a href="<?php echo "dl.php?ir=".$result[1]['id'];?>"><img src="<?php echo "https://game.lkjgf.xyz/".$result[1]['medianame'];?>"></a>
                    </div>
                    <div class="col"><a href="<?php echo "dl.php?ir=".$result[2]['id'];?>"><img src="<?php echo "https://game.lkjgf.xyz/".$result[2]['medianame'];?>"></a>
                    </div>
                    <div class="col"> <a href="<?php echo "dl.php?ir=".$result[3]['id'];?>"><img src="<?php echo "https://game.lkjgf.xyz/".$result[3]['medianame'];?>"></a>
                    </div>
                    <div class="col"> <a href="<?php echo "dl.php?ir=".$result[4]['id'];?>"><img src="<?php echo "https://game.lkjgf.xyz/".$result[4]['medianame'];?>"></a>
                    </div>
                    <div class="col"> <a href="<?php echo "dl.php?ir=".$result[5]['id'];?>"><img src="<?php echo "https://game.lkjgf.xyz/".$result[5]['medianame'];?>"></a>
                    </div>
                    <div class="col"> <a href="<?php echo "dl.php?ir=".$result[6]['id'];?>"><img src="<?php echo "https://game.lkjgf.xyz/".$result[6]['medianame'];?>"></a>
                    </div>
                    <div class="col"> <a href="<?php echo "dl.php?ir=".$result[7]['id'];?>"><img src="<?php echo "https://game.lkjgf.xyz/".$result[7]['medianame'];?>"></a>
                    </div>
                    <div class="col"><a href="<?php echo "dl.php?ir=".$result[8]['id'];?>"><img src="<?php echo "https://game.lkjgf.xyz/".$result[8]['medianame'];?>"></a>
                    </div>
                    <div class="col"> <a href="<?php echo "dl.php?ir=".$result[9]['id'];?>"><img src="<?php echo "https://game.lkjgf.xyz/".$result[9]['medianame'];?>"></a>
                    </div>
                    <div class="col"><a href="<?php echo "dl.php?ir=".$result[10]['id'];?>"><img src="<?php echo "https://game.lkjgf.xyz/".$result[10]['medianame'];?>"></a>
                    </div>
                    <div class="col"><a href="<?php echo "dl.php?ir=".$result[11]['id'];?>"><img src="<?php echo "https://game.lkjgf.xyz/".$result[11]['medianame'];?>"></a>
                    </div>
                    <div class="col"> <a href="<?php echo "dl.php?ir=".$result[12]['id'];?>"><img src="<?php echo "https://game.lkjgf.xyz/".$result[12]['medianame'];?>"></a>
                    </div>
                    <div class="col"><a href="<?php echo "dl.php?ir=".$result[13]['id'];?>"><img src="<?php echo "https://game.lkjgf.xyz/".$result[13]['medianame'];?>"></a>
                    </div>
                    <div class="col"> <a href="<?php echo "dl.php?ir=".$result[14]['id'];?>"><img src="<?php echo "https://game.lkjgf.xyz/".$result[14]['medianame'];?>"></a>
                    </div>
                    <div class="col"><a href="<?php echo "dl.php?ir=".$result[15]['id'];?>"><img src="<?php echo "https://game.lkjgf.xyz/".$result[15]['medianame'];?>"></a>
                    </div>
                    <div class="col"> <a href="<?php echo "dl.php?ir=".$result[16]['id'];?>"><img src="<?php echo "https://game.lkjgf.xyz/".$result[16]['medianame'];?>"></a>
                    </div>
                    <div class="col"> <a href="<?php echo "dl.php?ir=".$result[17]['id'];?>"><img src="<?php echo "https://game.lkjgf.xyz/".$result[17]['medianame'];?>"></a>
                    </div>
                    <div class="col"><a href="<?php echo "dl.php?ir=".$result[18]['id'];?>"><img src="<?php echo "https://game.lkjgf.xyz/".$result[18]['medianame'];?>"></a>
                    </div>
                    <div class="col"> <a href="<?php echo "dl.php?ir=".$result[19]['id'];?>"><img src="<?php echo "https://game.lkjgf.xyz/".$result[19]['medianame'];?>"></a>
                    </div>
                    <div class="col"> <a href="<?php echo "dl.php?ir=".$result[20]['id'];?>"><img src="<?php echo "https://game.lkjgf.xyz/".$result[20]['medianame'];?>"></a>
                    </div>
                    <div class="col"><a href="<?php echo "dl.php?ir=".$result[21]['id'];?>"><img src="<?php echo "https://game.lkjgf.xyz/".$result[21]['medianame'];?>"></a>
                    </div>
                    <div class="col"> <a href="<?php echo "dl.php?ir=".$result[22]['id'];?>"><img src="<?php echo "https://game.lkjgf.xyz/".$result[22]['medianame'];?>"></a>
                    </div>
                    <div class="col"> <a href="<?php echo "dl.php?ir=".$result[23]['id'];?>"><img src="<?php echo "https://game.lkjgf.xyz/".$result[23]['medianame'];?>"></a>
                    </div>
                    <div class="col"> <a href="<?php echo "dl.php?ir=".$result[24]['id'];?>"><img src="<?php echo "https://game.lkjgf.xyz/".$result[24]['medianame'];?>"></a>
                    </div>
                    <div class="col"><a href="<?php echo "dl.php?ir=".$result[25]['id'];?>"><img src="<?php echo "https://game.lkjgf.xyz/".$result[25]['medianame'];?>"></a>
                    </div>
                    <div class="col"> <a href="<?php echo "dl.php?ir=".$result[26]['id'];?>"><img src="<?php echo "https://game.lkjgf.xyz/".$result[26]['medianame'];?>"></a>
                    </div>
                    <div class="col"><a href="<?php echo "dl.php?ir=".$result[27]['id'];?>"><img src="<?php echo "https://game.lkjgf.xyz/".$result[27]['medianame'];?>"></a>
                    </div>
                    <div class="col"> <a href="<?php echo "dl.php?ir=".$result[28]['id'];?>"><img src="<?php echo "https://game.lkjgf.xyz/".$result[28]['medianame'];?>"></a>
                    </div>
                    <div class="col"> <a href="<?php echo "dl.php?ir=".$result[29]['id'];?>"><img src="<?php echo "https://game.lkjgf.xyz/".$result[29]['medianame'];?>"></a>
                    </div>
                    <div class="col"> <a href="<?php echo "dl.php?ir=".$result[30]['id'];?>"><img src="<?php echo "https://game.lkjgf.xyz/".$result[30]['medianame'];?>"></a>
                    </div>
                    <div class="col"> <a href="<?php echo "dl.php?ir=".$result[31]['id'];?>"><img src="<?php echo "https://game.lkjgf.xyz/".$result[31]['medianame'];?>"></a>
                    </div>
                    <div class="col"><a href="<?php echo "dl.php?ir=".$result[32]['id'];?>"><img src="<?php echo "https://game.lkjgf.xyz/".$result[32]['medianame'];?>"></a>
                    </div>
                    <div class="col"> <a href="<?php echo "dl.php?ir=".$result[33]['id'];?>"><img src="<?php echo "https://game.lkjgf.xyz/".$result[33]['medianame'];?>"></a>
                    </div>
                    <div class="col"> <a href="<?php echo "dl.php?ir=".$result[34]['id'];?>"><img src="<?php echo "https://game.lkjgf.xyz/".$result[34]['medianame'];?>"></a>
                    </div>
                    <div class="col"> <a href="<?php echo "dl.php?ir=".$result[35]['id'];?>"><img src="<?php echo "https://game.lkjgf.xyz/".$result[35]['medianame'];?>"></a>
                    </div>
                    <div class="col"> <a href="<?php echo "dl.php?ir=".$result[36]['id'];?>"><img src="<?php echo "https://game.lkjgf.xyz/".$result[36]['medianame'];?>"></a>
                    </div>
                    <div class="col"> <a href="<?php echo "dl.php?ir=".$result[37]['id'];?>"><img src="<?php echo "https://game.lkjgf.xyz/".$result[37]['medianame'];?>"></a>
                    </div>
                    <div class="col"><a href="<?php echo "dl.php?ir=".$result[38]['id'];?>"><img src="<?php echo "https://game.lkjgf.xyz/".$result[38]['medianame'];?>"></a>
                    </div>
                    <div class="col"><a href="<?php echo "dl.php?ir=".$result[39]['id'];?>"><img src="<?php echo "https://game.lkjgf.xyz/".$result[39]['medianame'];?>"></a>
                    </div>
                    <div class="col"> <a href="<?php echo "dl.php?ir=".$result[40]['id'];?>"><img src="<?php echo "https://game.lkjgf.xyz/".$result[40]['medianame'];?>"></a>
                    </div>
                    <div class="col"><a href="<?php echo "dl.php?ir=".$result[41]['id'];?>"><img src="<?php echo "https://game.lkjgf.xyz/".$result[41]['medianame'];?>"></a>
                    </div>
                    <div class="col"> <a href="<?php echo "dl.php?ir=".$result[42]['id'];?>"><img src="<?php echo "https://game.lkjgf.xyz/".$result[42]['medianame'];?>"></a>
                    </div>
                    <div class="col"> <a href="<?php echo "dl.php?ir=".$result[43]['id'];?>"><img src="<?php echo "https://game.lkjgf.xyz/".$result[43]['medianame'];?>"></a>
                    </div>
                    <div class="col"> <a href="<?php echo "dl.php?ir=".$result[44]['id'];?>"><img src="<?php echo "https://game.lkjgf.xyz/".$result[44]['medianame'];?>"></a>
                    </div>
                    <div class="col"> <a href="<?php echo "dl.php?ir=".$result[45]['id'];?>"><img src="<?php echo "https://game.lkjgf.xyz/".$result[45]['medianame'];?>"></a>
                    </div>
                    <div class="col"> <a href="<?php echo "dl.php?ir=".$result[46]['id'];?>"><img src="<?php echo "https://game.lkjgf.xyz/".$result[46]['medianame'];?>"></a>
                    </div>
                    <div class="col"> <a href="<?php echo "dl.php?ir=".$result[47]['id'];?>"><img src="<?php echo "https://game.lkjgf.xyz/".$result[47]['medianame'];?>"></a>
                    </div>
                    <div class="col"><a href="<?php echo "dl.php?ir=".$result[48]['id'];?>"><img src="<?php echo "https://game.lkjgf.xyz/".$result[48]['medianame'];?>"></a>
                    </div>
                    <div class="col"> <a href="<?php echo "dl.php?ir=".$result[49]['id'];?>"><img src="<?php echo "https://game.lkjgf.xyz/".$result[49]['medianame'];?>"></a>
                    </div>
                    


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