<?php
//$lan=$_GET['lan'];
session_start();
$lan=$_SESSION["language"];
if($lan==1)
{
	$_SESSION["language"]=2;
}
else{
$_SESSION["language"]=1;	
}

header('location:index.php');