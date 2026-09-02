<?php
include('includes/header1.php');


?>
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next"> <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> </div>
<!-- /.carousel -->
<?php

$sql1="call gamebardb.m_getproductlist(".$_GET['category'].");";
if(isset($_SESSION['subid']))
{
	
	 $subscriptionId=$_SESSION['subid'];
	if(isset($_SESSION['expire']))
	{
	
		if(time() < $_SESSION['expire'])
		{
			
			

			$i=1;
			foreach ($conn->query($sql1) as $row) {
				$detail[$i]['filename']=$row['filename'];
				$detail[$i]['productcode']=$row['productcode'];
				$detail[$i]['medianame']=$row['medianame'];
				$detail[$i]['productname']=$row['productname'];
				$i++;
			}
			


?>
				<div class="container">
				  <div class="categoryrow">
					<h5>
					<?php
					
					if($_GET['category']==2)
					{
						echo "Jogos de Ação";
					}	
					else if($_GET['category']==11)
					{
						echo "Jogos de corrida";
					}
					else if($_GET['category']==4)
					{
						echo "Jogos de Shoot Em Up";
					}
					else if($_GET['category']==13)
					{
						echo "Jogos de tabuleiro";
					}
					else{
						echo "Novos jogos";
					}
					
					
					
					
					?>
					</h5>
					<!--<div class="list-row">
					  <a href=" http://gamezzone.me/GameFiles/<?php //echo $detail[1]['filename'];?>"><div class="listblock">
						<div class="list-img"><img src="http://gamezzone.me/mediafiles/<?php //echo $detail[1]['productcode']."_".$detail[1]['medianame'];?>" alt="" title="" style="height:100px;width:100px;max-height:60%;min-height:60%"></div>
						<div class="list-details">
						  <div class="list-info">
							<h6><?php //echo $detail[1]['productname'];?></h6>
							<div class="ratingdownload">
							  <div class="rating"><a href="#"><i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star-empty"></i></a></div>
							  <div class="download"><a href="#"> <i class="glyphicon glyphicon-download-alt"></i></a></div>
							</div>
						  </div>
						</div>
					  </div></a>
					 <a href=" http://gamezzone.me/GameFiles/<?php //echo $detail[2]['filename'];?>"><div class="listblock">
						<div class="list-img" style="max-height:20%; display:block;"><img src="http://gamezzone.me/mediafiles/<?php //echo $detail[2]['productcode']."_".$detail[2]['medianame'];?>" alt="" title="" style="height:60%;width:100%;max-height:200px;"></div>
						<div class="list-details">
						  <div class="list-info">
							<h6><?php //echo $detail[2]['productname'];?></h6>
							<div class="ratingdownload">
							  <div class="rating"><a href="#"><i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star-empty"></i></a></div>
							  <div class="download"><a href="#"> <i class="glyphicon glyphicon-download-alt"></i></a></div>
							</div>
						  </div>
						</div>
					  </div></a>
					  <a href=" http://gamezzone.me/GameFiles/Golf Physics Madness dz9.apk"><div class="listblock">
						<div class="list-img" style="max-height:300px;"><img src="http://gamezzone.me/mediafiles/28848_Golf%20Physics%20Madness%20dz9.jpg" alt="" title="" style="max-height:200px;></div>
						<div class="list-details">
						  <div class="list-info">
							<h6>Golf Physics Madness</h6>
							<div class="ratingdownload">
							  <div class="rating"><a href="#"><i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star"></i> <i class="glyphicon glyphicon-star-empty"></i></a></div>
							  <div class="download"><a href="#"> <i class="glyphicon glyphicon-download-alt"></i></a></div>
							</div>
						  </div>
						</div>
					  </div></a>
					</div>-->
					<?php
					foreach ($conn->query($sql1) as $row) {
					?>
					<a href=" http://gamezzone.me/GameFiles/<?php echo $row['filename'];?>">
					<div style="height: 200px; width: 43%; color: #900; border: solid; background-color: #fff; border-color: #FF0; border-radius: 9px; position: relative; float: left; margin: 1% 1% 3% 3%; max-width: 200px;"><div>
					<img style="width:100%;height:140px" src="http://gamezzone.me/mediafiles/<?php echo $row['productcode']."_".$row['medianame'];?>"></div><center><div><h4><?php echo $row['productname'];?></h4>

					</div></center>
					</div></a>
					<?php
					}
					?>
				  </div>
				
				   <div class="categoryrow">
				   <h5> <a href="<?php echo $actual_link;?>">Ver mais</a></h5>
				  </div>
				 
				</div>
				
				
	<?php
	}
	else{
		unset($_SESSION['']); // will delete just the name data

		session_destroy();
		
		header('Location:http://club.funzone.mobi/portugal/meo/index.php');
	}
	}
	else{
		
		 $_SESSION['expire'] = time() + (30 * 60);
	}
}
else{
	//http://gamezzone.me/GameFiles/How Far Can You Drive Paid1.apk
	?>
	
		
		<div class="container">
				  <div class="categoryrow">
					
		<?php
		foreach ($conn->query($sql1) as $row) {
		?>
		
		<a href="http://gamezzone.me/GameFiles/<?php echo $row["filename"]; ?>" ><!-- style="pointer-events: none;">-->
		<div style="height: 200px; width: 43%; color: #900; border: solid; background-color: #fff; border-color: #FF0; border-radius: 9px; position: relative; float: left; margin: 1% 1% 3% 3%; max-width: 200px;"><div>
		<img style="width:100%;height:120px" src="http://gamezzone.me/mediafiles/<?php echo $row['productcode']."_".$row['medianame'];?>"></div><center><div><h4><?php echo $row['productname'];?></h4></div></center>
		</div></a>
		<?php
		}
		?>
		  </div>
				
				   <div class="categoryrow">
				
				  </div>
				 
				</div>
		
	
<?php
		
}

		
	?>			
<div class="footer">
  <div class="toplinks">
    
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