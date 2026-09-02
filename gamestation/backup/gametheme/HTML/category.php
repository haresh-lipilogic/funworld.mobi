<!DOCTYPE html>
<html lang="en">
  <?php
 
  include('header.php');
  
  //$sql1="call htmlgames.GetGames(0,4);";
  if(isset($_GET['cat']))
  {
	  
	?>  
	  
	   
	   
	   <section class="content-section text-light" style="/* background: linear-gradient(to bottom, #e8bf80 10%, #00030b 100%); */">
        <div class="container">
          <header class="header text-left">
            <!--<h2 class="mb-6"><?php //echo $_GET['cat'];?></h2>-->
          </header>
          <div class="row">
	   
	   
	   
	   
	   
	   
	   
                  <!-- item -->
                 
				<?php
					$sql1="select * from htmlgames.html where  isdisplay >= 1 and (productname like '%".$_GET['cat']."%' or category like '%".$_GET['cat']."%') order by rand()";
					foreach ($conn->query($sql1) as $row) {
				?>
					<div class="col-12 mb-8">
					  <div class="row">
						<div class="col-lg-4 mb-6 mb-lg-0">
						  <div class="card">
							<div class="img__news_wrapper"><img src="<?php echo "https://playcool.games/hgame/".$row['medianame'];?>" alt="News"></div>
							<div class="badges badges-left badges-bottom text-white">
							  <div class="rating_circle-wrapper"> 
								<span class="rating_circle-foreground">
									<span class="rating_circle-number">9.7</span>
								</span> 
								<span class="rating_circle" data-rating-total="9"></span>
							  </div>
							</div>
						  </div>
						</div>
						<div class="col-lg-8"><br><br>
						  <h4 class="text-uppercase mb-3"><?php echo $row['productname'];?></h4>
						  <div class="mb-3 small text-info">
						   <br><br>
						   
						  </div>
						  <p><?php echo $row['description'];?></p>
						  <a onclick="myfuction('<?php echo "https://playcool.games/hgame/".$row['filename']; ?>');" class="btn btn-outline-light">Play More</a>
						</div>
					  </div>
					</div>
				
				 
				 
				  <?php
					}
				  ?>
                
                
	  
          
            
          </div>
        </div>
      </section>
      <!-- /.content area -->
	  
	  
	  
<?php	  
  }
  
  ?>
  <div class="mlctr-popup" id="MlctrClose" style="display :none">
		<div class="mlctr-popup-stripe">
			<div class="mlctr-popup-content">
        <div class="mlctr-form-box">
          <iframe src="" id="MlctrClose1" name="MlctrClose1" width="100%" height="100%"></iframe>
          <a href="" class="mlctr-close"><img class="mlctr-close" src="https://www.mlcdn.eu/data/hannah/Close.jpg"></a>
        </div>
			</div>
		</div>
</div>
<script>
function myfuction (url)
{
//alert(url); 
document.getElementById('MlctrClose1').src = url;
document.getElementById('MlctrClose').style.display = 'block'; 
}

</script>


<style>

@import url('https://fonts.googleapis.com/css2?family=Quicksand&family=Rajdhani:wght@400;600;700&display=swap');

@-ms-viewport {
	width: device-width;
}
body {
	margin: 0;
	padding: 0;
}

.mlctr-popup {
	/* master mandatory container, required by Mailocator */
	/* z-index must be higher in DOM structure */
	z-index: 109999999;
  font-family: CircularPro, 'Quicksand', Helvetica, Arial, sans-serif;
  font-weight: 400;
}
.mlctr-popup .mlctr-popup-stripe {
	/* customize stripe */
	text-align: center;
	min-height: calc(55px + 2.5vw);
  -webkit-transition: height ease-out 0.2s;
  -moz-transition: height ease-out 0.2s;
	transition: height ease-out 0.2s;
	/* stripe defaults */
	position: fixed;
	bottom: 0px;
	width: 100%;
  z-index: 109999999;
  height: 100%;
  background-color: RGBA(0,0,0,0.8);
  padding: 0;
  border: 0;
  box-sizing: border-box;
}
/* Close via CSS;alternative to mailocator.action.do('close') */
.mlctr-popup:target {
	display: none;
	visibility: hidden;
}
/* customizable popup content... */
.mlctr-popup-content {
  position: relative;
	width: 100%;
  height: 100%;
	margin: 0;
  padding: 0px;
	text-align: center;
	color: #000000;
	box-sizing: border-box;
}
.mlctr-content-row {
  position: relative;
	width: 100%;
  margin: 0;
}
.mlctr-headline {
  position: relative;
	width: 100%;
  padding: 7% 0 0 0;
	height: 290px;
}
.mlctr-content {
	height: 122px;
}
.mlctr-form-box {
	position: absolute;
	top: 50%;
	left: 50%;
	width: 100%;
  //max-width: 880px;
  //min-width: 500px;
  height: 90%;
  background: transparent;
  background-size: 100% auto;
  //background-color: #ffffff;
  transform: translate(-50%, -50%);
  -webkit-transform: translate(-50%, -50%) scale(1.0, 1.0);
  -webkit-font-smoothing: subpixel-antialiased;
  border: 0;
	margin: 0px auto;
  padding: 0;
	-webkit-box-shadow: 0px 4px 16px rgba(0,0,0,0.2);
	-moz-box-shadow: 0px 4px 16px rgba(0,0,0,0.2);
	box-shadow: 0px 4px 16px rgba(0,0,0,0.2);
	text-align: center;
}
.mlctr-popup-content * {
	box-sizing: border-box;
}
.mlctr-popup-content a {
	color: #ffffff;
}
.mlctr-popup-content form {
	width: 100%;
	border: none;
}
.mlctr-popup-content h1 {
	width: 100%;
  font-family: ProtraktCZ, 'Rajdhani', Helvetica, Arial, sans-serif;
  font-size: 128px;
  line-height: 110px;
  font-weight: 700;
  text-align: left;
  color: #fff;
  padding: 0 8%;
  margin: 0;
  text-shadow: 0px 1px 12px #000000;
	box-sizing: border-box;
}
.mlctr-popup-content h1 span {
  font-size: 0.65em;
}
.mlctr-popup-content .mlctr-title {
  max-width: calc(50px + 16vw);
  margin: 15px 0 0 0;
}
.mlctr-popup-content h2 {
  position: relative;
	width: 100%;
  font-family: ProtraktCZ, 'Rajdhani', Helvetica, Arial, sans-serif;
  text-align: left;
  color: #fff;
  padding: 0 8%;
  font-size: 50px;
  line-height: 52px;
  font-weight: 600;
  text-shadow: 0px 1px 8px #000000;
  margin: 0;
	box-sizing: border-box;
}
.mlctr-popup-content p {
	width: 100%;
  position: relative;
  text-align: left;
  color: #fff;
  padding: 0 35% 0 8%;
  font-size: 19px;
  line-height: 24px;
  font-weight: 400;
  margin: 1% 0 0 0;
	box-sizing: border-box;
}
.mlctr-popup-content p.mlctr-star:before {
  position: absolute;
	content: '*';
  color: #fff;
  border: 0;
  font-size: 24px;
  font-weight: 400;
  top: 2%;
  left: 6%;
}
.mlctr-message-error {
  display: block;
  min-height: 14px;
  font-size: 17px;
  line-height: 16px;
  margin: 2.5% 0 0 0;
  padding: 0 8%;
  font-weight: 700;
  text-align: left;
  text-shadow: 0px 1px 8px #000000;
  color: #ff6767;
}
.mlctr-verification-alert {
  display: none;
}
.mlctr-verification-alert.display {
  display: block;
}
.mlctr-popup-content input[type=text] {
	height: 54px;
  width: 55%;
	font-size: 18px;
	color: rgba(0, 0, 0, 1);
	padding: 4px 3%;
	margin: 0;
  font-family: CircularPro, 'Quicksand', Helvetica, Arial, sans-serif;
	background-color: #ffffff;
	border: 1px solid #cacaca;
	-webkit-border-radius: 0px;
	-moz-border-radius: 0px;
	border-radius: 0px;
  -webkit-transition: border ease-in-out .15s;
  -moz-transition: border ease-in-out .15s;
  transition: border ease-in-out .15s;
  text-align: left;
	box-sizing: border-box;
	display: inline-block;
  outline: 0;
}
.mlctr-popup-content input[type="text"]:focus {
	border: 1px solid #e60000;
  outline: 0;
}
.mlctr-popup-content input[type="submit"], .mlctr-popup-content input[type="button"] {
	height: 54px;
  width: 30%;
  font-size: 22px;
  line-height: 24px;
  padding: 0 0 3px 0;
  margin: 0 0 0 1.3%;
  background-color: #e60000;
	border: 0;
	-webkit-border-radius: 2px;
	-moz-border-radius: 2px;
	border-radius: 2px;
  color: #ffffff;
	-webkit-transition: background-color .25s;
	-moz-transition: background-color .25s;
	transition: background-color .25s;
  cursor: pointer;
  font-family: CircularPro, 'Quicksand', Helvetica, Arial, sans-serif;
  font-weight: 600;
  box-sizing: border-box;
	display: inline-block;
  outline: 0;
}
.mlctr-popup-content input[type="button"] {
  padding: 0;
  margin: 0 56.8% 0 0;
}
.mlctr-popup-content input[type="submit"]:active, .mlctr-popup-content input[type="button"]:active {
  font-size: 21.5px;
  line-height: 25px;
	-webkit-box-shadow: inset 2px 2px 6px rgba(0,0,0,0.65);
	-moz-box-shadow: inset 2px 2px 6px rgba(0,0,0,0.65);
	box-shadow: inset 2px 2px 6px rgba(0,0,0,0.65);
  outline: 0;
}
.mlctr-privacy {
  display: block;
  background: none;
  margin: 0;
  height: auto;
}
a.mlctr-close {
  display: block;
  position: fixed;
  right: 0px;
  top: 0px;
	width: 6.5%;
	max-width: 54px;
  background: none;
  opacity: 0.8;
  cursor: pointer;
}
img.mlctr-close {
	width: 100%;
}
.mlctr-close:hover {
  opacity: 1;
}
</style>