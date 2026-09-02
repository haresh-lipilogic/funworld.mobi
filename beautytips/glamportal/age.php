<?php


?>

<html>
    <head><title> Glambar</title><meta name="viewport" content="width=device-width"> 
	<meta http-equiv="expires" content="Mon, 06 Jan 1990 00:00:01 GMT">    
	<script src="https://s.codepen.io/assets/libs/modernizr.js" type="text/javascript"></script>

<meta name="viewport" content="width=device-width">
<script>
function close_window() {
  if (confirm("Close Window?")) {
    window.close();

  }
}


</script>


	<style>
	
	.button {
						background-color: white; 
						color: black;  /* Green */
						border: none;
						height :120px;
						width: 120px;
						padding: 8px 16px;
						text-align: center;
						text-decoration: none;
						display: inline-block;
						font-size: 12px;
						margin: 4px 2px;
						-webkit-transition-duration: 0.4s; /* Safari */
						transition-duration: 0.4s;
						cursor: pointer;
						border-radius: 12px;
						
					}

					.button1 {
						
						border: 2px solid #4CAF50;
						color: white;
						background-color: #4CAF50;
					}

					.button1:hover {
						background-color: white;
						color: black;
						border-radius: 3px;
					}


					.button3 {
						background-color: #f44336;
						color: white; 
						border: 2px solid #f44336;
					}

					.button3:hover {
						
						background-color: white; 
						color: black;
					}


					</style>
	</head>
	
	<body style="color: #; background:url(../glambar/image/bg.png);background-repeat: no-repeat;
    background-attachment: fixed;
    background-position: center; 
	background-size:cover; ">  
					
					<a href="about:blank"><img class="close" style="height:5%; width:5%; position:relative;margin-left:90%" src="http://club.funzone.mobi/spain/glambar/image/close.png"></a>
					 <img class="logosvg" style="height:8%; width:30%;" src="http://club.funzone.mobi/spain/glambar/image/logo.png">

						
					<br><br>
					<div id="main">
					<div style="height:35%;width:100%">
						<div style="height:100%;position:relative;margin-left:5px;">
						<center><img style="height:100%;width:45% ;border-radius: 12px;border: 3px solid #f442f4;margin-left:5px;" src="images/games/image/video1.jpg">
					
						<img style="height:100%;width:45% ;border-radius: 12px;border: 3px solid #f442f4;margin-left:5px;" src="images/games/image/video2.jpg">
						
						</center></div>
						
					</div>      
					</div>         
					 
					<input type="hidden" name="subscriptionid" value="<?php echo $subscriptionId ;?>">
					<div style="text-align:center">                 
					 <div class="bottom" style="margin-top: 10px;">
					  <div class="subscribebtn"><!-- <div class="subscribebtn"><a href="#"  >Cancelar</a> </div>-->
						<h3>Este es un servicio de contenido adulto <br>
						debes confirmar que eres mayor de edad </h3>
                        
                        
					  </div>
					  </center>
				<a href="http://club.funzone.mobi/spain/glambar/"><button class="button button1"  onclick='myfunction2()'><b>Si,</b><br>soy mayor<br>de 18 años</button></a>
				   <button class="button button3" ><b>no,</b><br> no soy mayor<br>de 18 años</button>
				   
				   
				   
				   <h3>
                      <!--  <marquee> Thank you for Visit.  </marquee>-->
                       
                       Precio 2,50€ semana (i.i.i.) renovación automatica
                                      
                        
                        </h3>
						<h5>Servicio oferecido por SVMobi</h5>
					</div>      
					</div>
					</body> 
					
					
					<script>
					function myfunction2()
					  {
						 // alert(file1);
						 var file12=1;
						var d = new Date();
						d.setTime(d.getTime() + ( 24 * 60 * 60 * 100000));
						var expires = "expires="+d.toUTCString();
						document.cookie = "age=" + file12 + ";" + expires  ;
					   //document.cookie = "username=John Doe; expires=Thu, 18 Dec 2013 12:00:00 UTC"; 
					  
					   
					  }
					</script>
					