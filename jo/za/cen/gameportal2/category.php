<?php
include('includes/header.php');


?>
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next"> <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> </div>
<!-- /.carousel -->
<?php
$res_banner='';
$sql1="call htmlgames.GetGames(".$_GET['category'].",20);";

?>
			
				
				
	
	
		
		<div class="container">
				 
					
		<?php
		foreach ($conn->query($sql1) as $row) {

		?>
		
		<a href="<?php echo "https://funworld.mobi/hgame/".$row["filename"]; ?>" ><!-- style="pointer-events: none;">-->
		<div style="height: 200px; width: 43%; color: #900; border: solid; background-color: #fff; border-color: #FF0; border-radius: 9px; position: relative; float: left; margin: 1% 1% 3% 3%; max-width: 200px;"><div>
		<img style="width:100%;height:120px" src="<?php  echo "https://funworld.mobi/hgame/".$row['medianame']; ?>"></div><center><div><h4><?php echo $row['productname'];?></h4></div></center>
		</div></a>
		<?php
		}
		?>
		
				 
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

</script>