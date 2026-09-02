<?php
include("../includes/connection.php");

$type=strtolower($_GET['callbacktype']);
$operator=strtolower($_GET['operator']);
$product=strtolower($_GET['product']);
$callbackstop_perc=$_GET['callbackstop_perc'];

$callbackstop_perc1=round($_GET['callbackstop_perc']/10);
$advertiserid=$_GET['advertiserid'];
$db=$_GET['db'];

if($type=='next')
{
	$calldata='nextdaycutoff';
	
}
else{
	$calldata='cutoff';
	
}

//$commondb="commondb";

	//ajax/make.php?operator="+operator+"&product="+product+"&callbackstop_perc="+callbackstop_perc+"&advertiserid="+advertiserid+"&type="+type+"&db="+database
	
	if($product=='gamebar')
	{
		if($operator=='indonesia')
		{
				$update_advertiser="update ".$db.".advertiser set ".$calldata." ='".$callbackstop_perc."' where advertiserid = '".$advertiserid."'";
				$res_advertiser=mysql_query($update_advertiser,$con);
				
				
		}
		if($operator=='airtel_india')
		{
				$update_advertiser="update ".$db.".advertiser set ".$calldata."  ='".$callbackstop_perc."' where advertiserid = '".$advertiserid."'";
				$res_advertiser=mysql_query($update_advertiser,$con);
				
				
		}
		if($operator =='south_africa')
		{
			
			$update_advertiser="update ".$db.".advertiser set ".$calldata."  ='".$callbackstop_perc."' where advertiserid = '".$advertiserid."'";
			$res_advertiser=mysql_query($update_advertiser,$con);
			
		}
		if($operator =='south_africa_intarget')
		{
			
			$update_advertiser="update ".$db.".advertiser set ".$calldata."  ='".$callbackstop_perc."' where advertiserid = '".$advertiserid."'";
			$res_advertiser=mysql_query($update_advertiser,$con);
			
		}
		
		
	}
	else{
		
		if($operator=='airtel_india')
		{
				$update_advertiser="update ".$db.".advertiser set cutoff ='".$callbackstop_perc."' where advertiserid = '".$advertiserid."'";
				$res_advertiser=mysql_query($update_advertiser,$con);
				
				
		}
		
		if($operator =='south_africa')
		{
			
			$update_advertiser="update ".$db.".advertiser set ".$calldata."  ='".$callbackstop_perc."' where advertiserid = '".$advertiserid."'";
			$res_advertiser=mysql_query($update_advertiser,$con);
			
		}
		if($operator =='south_africa_intarget')
		{
			
			$update_advertiser="update ".$db.".advertiser set ".$calldata."  ='".$callbackstop_perc."' where advertiserid = '".$advertiserid."'";
			$res_advertiser=mysql_query($update_advertiser,$con);
			
		}
		
	}
	
	
	


?>