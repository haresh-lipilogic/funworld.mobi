<?php

include('includes/header.php');



?>
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next"> <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> </div>
<!-- /.carousel -->
			<div class="container">
				  <div class="categoryrow">
					<h5>Action Games <a href="category.php?category=1">View More</a></h5>
					<div class="list-row">
					<?php 
					$res_banner='';
					$sql1="call gamesdb.GetGames(1,3);";
					foreach ($conn->query($sql1) as $row) {
						?>
						 <a href="<?php echo $row['filename']; ?>"><div class="listblock">
						<div class="list-img"><img src="<?php echo $row['medianame']; ?>" alt="" title=""></div>
						<div class="list-details">
						  <div class="list-info">
							<h6><?php echo $row['productname'];?></h6>
							<div class="ratingdownload">
							  <div class="rating"><a href="#"><i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star-empty"></i></a></div>
							  <div class="download"><a href="#"> <i class="glyphicon glyphicon-download-alt"></i></a></div>
							</div>
						  </div>
						</div>
					  </div></a>
						<?php
					}
					?> 
					</div>
				  </div>
				  
				  
				  <div class="categoryrow">
					<h5>Adventure Games <a href="category.php?category=2">View More</a></h5>
					<div class="list-row">
					<?php 
					$sql1="call gamesdb.GetGames(2,3);";
					foreach ($conn->query($sql1) as $row) {
						?>
						 <a href="<?php echo $row['filename']; ?>"><div class="listblock">
						<div class="list-img"><img src="<?php echo $row['medianame']; ?>" alt="" title=""></div>
						<div class="list-details">
						  <div class="list-info">
							<h6><?php echo $row['productname'];?></h6>
							<div class="ratingdownload">
							  <div class="rating"><a href="#"><i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star-empty"></i></a></div>
							  <div class="download"><a href="#"> <i class="glyphicon glyphicon-download-alt"></i></a></div>
							</div>
						  </div>
						</div>
					  </div></a>
						<?php
					}
					?>
					</div>
				  </div>
				  
				  <div class="categoryrow">
					<h5>Arcade Games <a href="category.php?category=3">View More</a></h5>
					<div class="list-row">
					<?php 
					$sql1="call gamesdb.GetGames(3,3);";
					foreach ($conn->query($sql1) as $row) {
						?>
						 <a href="<?php echo $row['filename']; ?>"><div class="listblock">
						<div class="list-img"><img src="<?php echo $row['medianame']; ?>" alt="" title=""></div>
						<div class="list-details">
						  <div class="list-info">
							<h6><?php echo $row['productname'];?></h6>
							<div class="ratingdownload">
							  <div class="rating"><a href="#"><i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star-empty"></i></a></div>
							  <div class="download"><a href="#"> <i class="glyphicon glyphicon-download-alt"></i></a></div>
							</div>
						  </div>
						</div>
					  </div></a>
						<?php
					}
					?>
					</div>
				  </div>
				  
				   <div class="categoryrow">
					<h5>Board Games <a href="category.php?category=4">View More</a></h5>
					<div class="list-row">
					<?php 
					$sql1="call gamesdb.GetGames(4,3);";
					foreach ($conn->query($sql1) as $row) {
						?>
						 <a href="<?php echo $row['filename']; ?>"><div class="listblock">
						<div class="list-img"><img src="<?php echo $row['medianame']; ?>" alt="" title=""></div>
						<div class="list-details">
						  <div class="list-info">
							<h6><?php echo $row['productname'];?></h6>
							<div class="ratingdownload">
							  <div class="rating"><a href="#"><i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star-empty"></i></a></div>
							  <div class="download"><a href="#"> <i class="glyphicon glyphicon-download-alt"></i></a></div>
							</div>
						  </div>
						</div>
					  </div></a>
						<?php
					}
					?>
					</div>
				  </div>
				  
				  <div class="categoryrow">
					<h5>Card Games <a href="category.php?category=5">View More</a></h5>
					<div class="list-row">
					<?php 
					$sql1="call gamesdb.GetGames(5,3);";
					foreach ($conn->query($sql1) as $row) {
						?>
						 <a href="<?php echo $row['filename']; ?>"><div class="listblock">
						<div class="list-img"><img src="<?php echo $row['medianame']; ?>" alt="" title=""></div>
						<div class="list-details">
						  <div class="list-info">
							<h6><?php echo $row['productname'];?></h6>
							<div class="ratingdownload">
							  <div class="rating"><a href="#"><i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star-empty"></i></a></div>
							  <div class="download"><a href="#"> <i class="glyphicon glyphicon-download-alt"></i></a></div>
							</div>
						  </div>
						</div>
					  </div></a>
						<?php
					}
					?>
					</div>
				  </div>
				  
				   <div class="categoryrow">
					<h5>Puzzle Games <a href="category.php?category=6">View More</a></h5>
					<div class="list-row">
					<?php 
					$sql1="call gamesdb.GetGames(6,3);";
					foreach ($conn->query($sql1) as $row) {
						?>
						 <a href="<?php echo $row['filename']; ?>"><div class="listblock">
						<div class="list-img"><img src="<?php echo $row['medianame']; ?>" alt="" title=""></div>
						<div class="list-details">
						  <div class="list-info">
							<h6><?php echo $row['productname'];?></h6>
							<div class="ratingdownload">
							  <div class="rating"><a href="#"><i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star-empty"></i></a></div>
							  <div class="download"><a href="#"> <i class="glyphicon glyphicon-download-alt"></i></a></div>
							</div>
						  </div>
						</div>
					  </div></a>
						<?php
					}
					?>
					</div>
				  </div>
				  
				  <div class="categoryrow">
					<h5>Racing Games <a href="category.php?category=7">View More</a></h5>
					<div class="list-row">
					<?php 
					$sql1="call gamesdb.GetGames(7,3);";
					foreach ($conn->query($sql1) as $row) {
						?>
						 <a href="<?php echo $row['filename']; ?>"><div class="listblock">
						<div class="list-img"><img src="<?php echo $row['medianame']; ?>" alt="" title=""></div>
						<div class="list-details">
						  <div class="list-info">
							<h6><?php echo $row['productname'];?></h6>
							<div class="ratingdownload">
							  <div class="rating"><a href="#"><i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star-empty"></i></a></div>
							  <div class="download"><a href="#"> <i class="glyphicon glyphicon-download-alt"></i></a></div>
							</div>
						  </div>
						</div>
					  </div></a>
						<?php
					}
					?>
					</div>
				  </div>
				  
				  <div class="categoryrow">
					<h5>Sports Games <a href="category.php?category=8">View More</a></h5>
					<div class="list-row">
					<?php 
					$sql1="call gamesdb.GetGames(8,3);";
					foreach ($conn->query($sql1) as $row) {
						?>
						 <a href="<?php echo $row['filename']; ?>"><div class="listblock">
						<div class="list-img"><img src="<?php echo $row['medianame']; ?>" alt="" title=""></div>
						<div class="list-details">
						  <div class="list-info">
							<h6><?php echo $row['productname'];?></h6>
							<div class="ratingdownload">
							  <div class="rating"><a href="#"><i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star-empty"></i></a></div>
							  <div class="download"><a href="#"> <i class="glyphicon glyphicon-download-alt"></i></a></div>
							</div>
						  </div>
						</div>
					  </div></a>
						<?php
					}
					?>
					</div>
				  </div>
				 <!-- 
				  <div class="categoryrow">
					<h5>Strategy Games <a href="category.php?category=9">View More</a></h5>
					<div class="list-row">
					<?php 
					//$sql1="call gamesdb.GetGames(9,3);";
					//foreach ($conn->query($sql1) as $row) {
						?>
						 <a href="<?php //echo $row['filename']; ?>"><div class="listblock">
						<div class="list-img"><img src="<?php ///echo $row['medianame']; ?>" alt="" title=""></div>
						<div class="list-details">
						  <div class="list-info">
							<h6><?php //echo $row['productname'];?></h6>
							<div class="ratingdownload">
							  <div class="rating"><a href="#"><i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star-empty"></i></a></div>
							  <div class="download"><a href="#"> <i class="glyphicon glyphicon-download-alt"></i></a></div>
							</div>
						  </div>
						</div>
					  </div></a>
						<?php
					//}
					?>
					</div>
				  </div>
				  -->
				  
				  
				

	
		
		
		
		
		

<!--
<div class="footer">
		<center><a href="../unsub?clickid=<?php echo $clickid; ?>" style= "background:#e7b409;font-size:20px;text-decoration:none;padding:8px;color:#fff;font-weight:bold;" onclick="return confirm('Are you sure you want to unsubscribe?')">UNSUBSCRIBE</a></center>
</div>
-->


<script src="js/jquery.min.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<!-- Just to make our placeholder images work. Don't actually copy the next line! --> 
<script src="js/holder.min.js"></script> 
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug --> 
<script src="js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
<script>
function redirectOne(file1)
  {
	 // alert(file1);
    var d = new Date();
    d.setTime(d.getTime() + ( 24 * 60 * 60 * 1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = "file1=" + file1 + ";" + expires  ;
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
		
	var a = document.createElement("a");
    a.href = "http://club.funzone.mobi/gamebar/index2.php";
    var evt = document.createEvent("MouseEvents");
    //the tenth parameter of initMouseEvent sets ctrl key
    evt.initMouseEvent("click", true, true, window, 0, 0, 0, 0, 0,
                                true, false, false, false, 0, null);
    a.dispatchEvent(evt);
	
	
 }
</script>