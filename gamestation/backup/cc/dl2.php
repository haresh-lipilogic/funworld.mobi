<?php
include('include/connection.php');

?>
<!DOCTYPE html>
<html>
<?php
include('header.php');


?>
<head>

<style>



* {box-sizing: border-box}
body {font-family: Verdana, sans-serif; margin:0;align:center;
//background-image:url('image/bg1.jpg');
font:white;
background:black

}
.mySlides {display: none}
.gamecate {padding:5px;height:80% }


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
	.rwd-media {
	  position: relative;
	  width: 100%;
	  height: 0;
	  padding-bottom: 56.25%; /* 16:9 */
	}

	.rwd-media iframe,
	.rwd-media video {
	  position: absolute;
	  width: 100%;
	  height: 100%;  
	}
	.content1 { width: 100%;  }
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
  .rwd-media {
	  position: relative;
	  width: 100%;
	  height: 0;
	  
	}

	.rwd-media iframe,
	.rwd-media video {
	  position: absolute;
	  width: 100%;
	  height: 100%;  
	}
	.content1 { width: 100%; background: #fff;  }
	.content2{
		position:absolute;
	width:100%;
	height:100%;
	padding-bottom:10px;
	
	}
	.content3{width:30%;
		position:absolute;
		float:right;
	}
  
}
@media only screen and (min-width: 768px) {
  /* For desktop: */
  .cost30 {width: 30%;}
  .cost9 {width:10%;position: absolute;vertical-align: middle;}
  .cost91 {width:42%;padding:0 0 0 3%;}
  .cost92 {width:9.5%}
  .nocost30 {width: 30%;}
  .nocost9 {width:10%;position: absolute;vertical-align: middle;}
  .nocost93 {width:10%;position: absolute;vertical-align: middle;}
  .nocost91 {width:9.5%}
  .nocost913 {width:9.5%}
  .cost30 ,.cost9,.cost91 ,.cost92 ,.nocost30,.nocost9,.nocost91,.nocost93,.nocost913{
	border-radius: 15px;
	border: 2px  #717171;
	max-width:50%;
	
	}
	.search{border-radius: 15px;}
	.logo img {max-width: 200px;}
  
	.rwd-media {
		display:block;
	  position: absolute;
	  width: 100%;
	  height: 100%;
	  
	}

	
	.content2 ,td{
		display:block;
		position:absolute;
	width:100%;
	height:100%;
	padding-bottom:10px;
	
	}
	.content3{width:30%;
	display:block;
		position:relative;
		float:right;
	}
	
}

</style>
</head>
<body>


<?php

$sql1="select * from htmlgames.html where  id='".$_GET['ir']."'  order by id asc limit 1";

foreach ($conn->query($sql1) as $row) {
			  $result[] = $row;
			}


?>




  <div class="content2">
  <div class="rwd-media">
    <iframe src="<?php echo "https://playcool.games/hgame/".$result[0]['filename'];?>" width="100%" height="100%" frameborder="3" ></iframe>
  </div>
 


</div>


 

<?php

$sql1="select * from htmlgames.html   order by id desc limit 10";

foreach ($conn->query($sql1) as $row) { ?>
			   <a href=""><img class="cost91"src="<?php echo "https://playcool.games/hgame/".$row['medianame'];?>"></a>
	<?php		} 

//include("footer.php");
//include("footer2.php");
?>

</body>
</html> 
