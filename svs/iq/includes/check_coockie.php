<?php
include("connection.php");
if(count($_COOKIE) > 0) 
{
		
	$cookie_value=$_COOKIE['clickid']; 
	
	// Check karva ke coockie wala clickid activate 6 ke nai.. cgcallback table ma check karisu.. flag 0 etle khali subscribe thayo 6 or subscribe thai ne activate thayo 6
	$select="select * from ".$db.".cgcallback WHERE clickid = '".$cookie_value."' and flag = 0"; 
	$res=$conn->query($select);
	//$num=$res->rowCount();
	
	if($num >= '1'  )
	{
		header("Location: http://club.funzone.mobi/serbia/site/");
		exit;	
		
	}
	
	else
	{
		header ("Location: http://club.funzone.mobi/thailand/index.php?clickid=1&pubid=1&advertiserid=1&planid=1");
		exit;
	}
}
else
{
	
	header ("Location: http://club.funzone.mobi/thailand/index.php?clickid=1&pubid=1&advertiserid=1&planid=1");
	exit;
}

?>