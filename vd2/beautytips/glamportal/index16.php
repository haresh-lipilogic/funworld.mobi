<?php
/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
*/


$conn = new PDO("mysql:host=10.125.1.51", 'webserveruser', 'K&dN&r4a8N@du0') or die(print_r($conn->error));

session_start();


?>

<!DOCTYPE html> <html xmlns="http://www.w3.org/1999/xhtml" lang="eb" xml:lang="en" >     <head>         
<meta name="viewport" content="width=device-width">        
 <title>GameBar</title>             

<meta http-equiv="expires" content="Mon, 06 Jan 1990 00:00:01 GMT">          

<!--<link href="/skysms/css/DCB_go4mobility.css" type="text/css" rel="stylesheet">     
-->
<link href="https://www.fontify.me/wf/4fc2639ccaa571e6178d2fcf311c77ac" rel="stylesheet" type="text/css">
<style>
.dropbtn {
    background:transparent;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

.dropbtn:hover, .dropbtn:focus {
   
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
	display: none;
	position: absolute;
	background-color: #000033;
	min-width: 160px;
	overflow: auto;
	box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
	z-index: 1;
}

.dropdown-content a {
    color: white;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown a:hover {
	background:white;
	color:black;
	font-size:20px;
	
}

.show {display:block;}
</style>
</head>     

<body style="color:#FFF ;background:#003; font-size:10px ;font-family: font128281;" disabled='disabled' important! <?php if($_COOKIE['file1']!=''){ ?>onload='myfunction3()'<?php }?> >

<div>
<div class="dropdown" >
<img onclick="myFunction()" class="dropbtn" src="icon_menu.png">



  <div id="myDropdown" class="dropdown-content">
    <a href="category.php?category=1">Novos jogos</a>
    <a href="category.php?category=2">Jogos de Ação</a>
    <a href="category.php?category=11">Jogos de corrida</a>
     <a href="category.php?category=4">Jogos de Shoot Em Up</a>
    <a href="category.php?category=13">Jogos de tabuleiro</a>
    
  </div><img  src="http://club.funzone.mobi/portugal/image/gamebar.png" width="173" height="58" class="logosvg">
</div>
</div>      
<div id="LogoDiv">             
<a><img src="http://club.funzone.mobi/portugal/image/mak.gif" width="640" alt="Go4Mobility(PT)" style="width:100%;height:15%"></a>         
</div>         

<div id="main" style="background:#C00">

 <center>
<h1>Jogos Recentes</h1>  </center>

<!--<center><div id="copyright"><p>Copyright Go4Mobility(PT)</p></div></center>-->     
</div>
<p>
<div style="height: 100%; position: relative;">
<?php


$sql1="call gamebardb.getproductlist(1);";

if(isset($_SESSION['subid']))
{
	 $subscriptionId=$_SESSION['subid'];
	if(isset($_SESSION['expire']))
	{
	
		if(time() < $_SESSION['expire'])
		{
			
			
			foreach ($conn->query($sql1) as $row) 
			{
			?>
				<center><a href=" http://gamezzone.me/GameFiles/<?php echo $row['filename'];?>" ><!--style="pointer-events: none;">-->
				<div style="height: 200px; width: 43%; color: #900; border: solid; background-color: #fff; border-color: #FF0; border-radius: 9px; position: relative; float: left; margin: 1% 1% 3% 3%; max-width: 200px;"><div>
				<img style="width:100%;height:120px" src="http://gamezzone.me/mediafiles/<?php echo $row['productcode']."_".$row['medianame'];?>"></div><center><div><h2><?php echo $row['productname'];?></h2></div></center>
				</div></a></center>
				<?php
			}
		}
		else{
			unset($_SESSION['']); // will delete just the name data

			session_destroy();
			
			header('Location:http://club.funzone.mobi/portugal/meo/landingpage.php');
		}
	}
	else{
		
		 $_SESSION['expire'] = time() + (30 * 60);
	}
}
else{
	foreach ($conn->query($sql1) as $row) {
	?>
		<a href="http://club.funzone.mobi/portugal/meo/landingpage.php" onClick="redirectOne('http://gamezzone.me/GameFiles/<?php echo $row["filename"]; ?> ')"><!-- style="pointer-events: none;">-->
		<div style="height: 200px; width: 43%; color: #900; border: solid; background-color: #fff; border-color: #FF0; border-radius: 9px; position: relative; float: left; margin: 1% 1% 3% 3%; max-width: 200px;"><div>
		<img style="width:100%;height:120px" src="http://gamezzone.me/mediafiles/<?php echo $row['productcode']."_".$row['medianame'];?>"></div><center><div><h2><?php echo $row['productname'];?></h2></div></center>
		</div></a>
		<?php
	}
	
}
/*}
else{
	
	header('Location:http://club.funzone.mobi/portugal/meo/landingpage.php');

}*/



$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>
</div>

<br><br><br><br><br>
<p>
<div id="textbox">

<p style="float:left;margin-left:10px;font-size:10px">    
          
<a href="http://club.funzone.mobi/portugal/meo/CancelSubscription.php?subscriptionId=<?php echo $subscriptionId;?>" >cancelar </a><br><br><br>
  <a href="http://club.funzone.mobi/portugal/meo/t&c.php"style="color:#C00">Termos e condi&ccedil;&otilde;es gerais</a>
  
  </p>
<p style="float:right;margin-right:10px;font-size:10px;">
<a style="float:right; position:relative" href="<?php echo $actual_link;?>"><button style=" background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 10px 10px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
	 box-shadow: 0 8px 16px 0 rgba(0.67,0.67,0.67,0.67), 0 6px 20px 0 rgba(0,0,0,0.19);"><b>More Games >> </b></button></a> 


</p>     
<p><br>
     
  </p>
  
 <p id="advertiser"></p>

<!--<a href="<?php //echo $actual_link;?>"><button>More Games</button></a>-->



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
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
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