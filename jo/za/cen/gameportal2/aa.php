<?php
//$lan=$_GET['lan'];
session_start();
$lan=$_SESSION["language"];
if($lan==1)
{
	$_SESSION["language"]=2;
	//$_COOKIE["lang"]='ar';
	
	setcookie('lang', 'ar');
}
else{
$_SESSION["language"]=1;	
//$_COOKIE["lang"]='en';
setcookie('lang', 'en');

}


header('location:index.php');