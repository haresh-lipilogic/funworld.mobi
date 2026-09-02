<?php
include('include/connection.php');

?>
<!DOCTYPE html>
<html>
<?php
include('header.php');


?>


<style>



* {box-sizing: border-box}
body {font-family: Verdana, sans-serif; margin:0;align:center;
//background-image:url('image/bg1.jpg');
font:white;
background:black

}
.mySlides {display: none}
.gamecate {padding:5px;height:70%; }


/* Slideshow container */
.slideshow-container {
  //max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -22px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  animation-name: fade;
  animation-duration: 1.5s;
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 600px) {
  .prev, .next,.text {font-size: 11px}
  .cost30 {width:30%;}
  .cost9 {width:14.75%;position: absolute;vertical-align: middle;}
  .cost91 {width:14.75%}
  .cost92 {display:none}
  .nocost30 {display:none}
  .nocost9 {display:none}
  .nocost91 {display:none}
  .nocost93 {width:14.75%;position: absolute;vertical-align: middle;}
  .nocost913 {width:14.75%}
  .cost30 ,.cost9,.cost91 ,.cost92 ,.nocost30,.nocost9,.nocost91,.nocost93,.nocost913 {
	border-radius: 10px;
	border: 2px  #717171;
	max-width:30%;
	}
	.search{width:90%}
	.logo img {max-width: 100px;}
	 .iframe1 {width:80%;height:500px}
}

/* For mobile phones: */


@media only screen and (min-width: 600px) {
  /* For tablets: */
   .cost30 {width: 30%;}
  .cost9 {width:9.5%;position: absolute;vertical-align: middle;}
  .cost91 {width:9.5%}
  .cost92 {width:9.5%}
  .nocost30 {width: 30%;}
  .nocost9 {width:9.5%;position: absolute;vertical-align: middle;}
  .nocost91 {width:9.5%}
  .nocost93 {width:9.5%;position: absolute;vertical-align: middle;}
  .nocost913 {width:9.5%}
  .cost30 ,.cost9,.cost91 ,.cost92 ,.nocost30,.nocost9,.nocost91,.nocost93,.nocost913 
  {
	border-radius: 15px;
	border: 2px  #717171;
	max-width:20%;
  }
  .logo img {max-width: 170px;}
  .iframe1 {width:80%;height:500px}
}
@media only screen and (min-width: 768px) {
  /* For desktop: */
  .cost30 {width: 30%;}
  .cost9 {width:9.7%;position: absolute;vertical-align: middle;}
  .cost91 {width:9.5%}
  .cost92 {width:9.7%}
  .nocost30 {width: 30%;}
  .nocost9 {width:9.7%;position: absolute;vertical-align: middle;}
  .nocost93 {width:9.7%;position: absolute;vertical-align: middle;}
  .nocost91 {width:9.7%}
  .nocost913 {width:9.7%}
  .cost30 ,.cost9,.cost91 ,.cost92 ,.nocost30,.nocost9,.nocost91,.nocost93,.nocost913{
	border-radius: 15px;
	border: 2px  #717171;
	max-width:20%;
	
	}
	.search{
	border-radius: 15px;
	}
	
	.logo img {max-width: 170px;}
	.iframe1 {width:80%;height:400px}
}
</style>

<body>






<center>
 
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
	
	$url="https://playcool.games/hgame/".$result[0]['filename'];
	
}



?>

   <iframe src="<?php echo $url;?>"  class="iframe1" ></iframe>
 
 
  <!--<div class="text">Caption Three</div>-->
  </center>



<?php

$sql1="select * from htmlgames.html where  id !='".$_GET['ir']."'  order by rand() limit 25";
		//$result1 = $conn->query($sql1);
			$result = array();
		foreach ($conn->query($sql1) as $row) {
			  $result[] = $row;
			}


?>


<div class="gamecate">

<center>
 
   
  <a href="<?php echo "dl.php?ir=".$result[0]['id'];?>"><img class="cost91"src="<?php echo "https://playcool.games/hgame/".$result[0]['medianame'];?>"></a>
  <a href="<?php echo "dl.php?ir=".$result[1]['id'];?>"><img class="cost91"src="<?php echo "https://playcool.games/hgame/".$result[1]['medianame'];?>"></a>
  <a href="<?php echo "dl.php?ir=".$result[2]['id'];?>"><img class="cost91"src="<?php echo "https://playcool.games/hgame/".$result[2]['medianame'];?>" ></a>
  <a href="<?php echo "dl.php?ir=".$result[3]['id'];?>"><img class="cost91" src="<?php echo "https://playcool.games/hgame/".$result[3]['medianame'];?>" ></a>
  
  <a href="<?php echo "dl.php?ir=".$result[4]['id'];?>"><img class="cost91"src="<?php echo "https://playcool.games/hgame/".$result[4]['medianame'];?>" ></a>
  <a href="<?php echo "dl.php?ir=".$result[5]['id'];?>"><img class="cost91" src="<?php echo "https://playcool.games/hgame/".$result[5]['medianame'];?>" ></a>
 
  <a href="<?php echo "dl.php?ir=".$result[6]['id'];?>"><img class="cost91"src="<?php echo "https://playcool.games/hgame/".$result[6]['medianame'];?>" ></a>
  <a href="<?php echo "dl.php?ir=".$result[7]['id'];?>"><img class="cost91"src="<?php echo "https://playcool.games/hgame/".$result[7]['medianame'];?>" ></a>
  <a href="<?php echo "dl.php?ir=".$result[8]['id'];?>"><img class="cost91"src="<?php echo "https://playcool.games/hgame/".$result[8]['medianame'];?>" ></a>
  <a href="<?php echo "dl.php?ir=".$result[9]['id'];?>"><img class="cost91"src="<?php echo "https://playcool.games/hgame/".$result[9]['medianame'];?>" ></a>
  <a href="<?php echo "dl.php?ir=".$result[10]['id'];?>"><img class="cost91"src="<?php echo "https://playcool.games/hgame/".$result[10]['medianame'];?>" ></a>
  <a href="<?php echo "dl.php?ir=".$result[11]['id'];?>"><img class="cost91"src="<?php echo "https://playcool.games/hgame/".$result[11]['medianame'];?>" ></a>
  <a href="<?php echo "dl.php?ir=".$result[12]['id'];?>"><img class="cost91"src="<?php echo "https://playcool.games/hgame/".$result[12]['medianame'];?>" ></a>
  <a href="<?php echo "dl.php?ir=".$result[13]['id'];?>"><img class="cost91"src="<?php echo "https://playcool.games/hgame/".$result[13]['medianame'];?>" ></a>
  <a href="<?php echo "dl.php?ir=".$result[14]['id'];?>"><img class="cost91"src="<?php echo "https://playcool.games/hgame/".$result[14]['medianame'];?>" ></a>
  <a href="<?php echo "dl.php?ir=".$result[15]['id'];?>"><img class="cost91"src="<?php echo "https://playcool.games/hgame/".$result[15]['medianame'];?>" ></a>
  <a href="<?php echo "dl.php?ir=".$result[16]['id'];?>"><img class="cost91"src="<?php echo "https://playcool.games/hgame/".$result[16]['medianame'];?>" ></a>
  <a href="<?php echo "dl.php?ir=".$result[17]['id'];?>"><img class="cost91"src="<?php echo "https://playcool.games/hgame/".$result[17]['medianame'];?>" ></a>
  <a href="<?php echo "dl.php?ir=".$result[18]['id'];?>"><img class="cost91"src="<?php echo "https://playcool.games/hgame/".$result[18]['medianame'];?>" ></a>
  <a href="<?php echo "dl.php?ir=".$result[19]['id'];?>"><img class="cost91"src="<?php echo "https://playcool.games/hgame/".$result[19]['medianame'];?>" ></a>
  <a href="<?php echo "dl.php?ir=".$result[20]['id'];?>"><img class="cost91"src="<?php echo "https://playcool.games/hgame/".$result[20]['medianame'];?>" ></a>
  <a href="<?php echo "dl.php?ir=".$result[21]['id'];?>"><img class="cost91"src="<?php echo "https://playcool.games/hgame/".$result[21]['medianame'];?>" ></a>
  <a href="<?php echo "dl.php?ir=".$result[22]['id'];?>"><img class="cost91"src="<?php echo "https://playcool.games/hgame/".$result[22]['medianame'];?>" ></a>
  <a href="<?php echo "dl.php?ir=".$result[23]['id'];?>"><img class="cost91"src="<?php echo "https://playcool.games/hgame/".$result[23]['medianame'];?>" ></a>
 
 
  <!--<div class="text">Caption Three</div>-->
  </center>
</div>

<?php		

include("footer.php");
include("footer2.php");
?>