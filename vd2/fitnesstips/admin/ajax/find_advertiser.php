<?php 
include("../includes/connection.php");

$operator=$_GET['operator'];
$product=$_GET['product'];

//$con1=mysql_connect("10.125.0.50","webserveruser","K&dN&r4a8N@du0") or die(mysql_error());
//echo "<script>alert('".$product."');</script>"; 
//echo "<script>alert('".$operator."');</script>"; 

if($product == 'gamebar' || $product == 'GAMEBAR')
{
	if($operator == 'Vodafone_Qatar')
	{
		$sql11="select * from gamebardb_vodafone_qatar.advertiser ";
		$res11=mysql_query($sql11,$con);
		
	}
	else if($operator == 'Bangladesh_Robi')
	{
		$sql11="select * from gamesdbnew_robi_bangladesh.advertiser ";
		$res11=mysql_query($sql11,$con);
		
	}
	else if($operator == 'guatemala')
	{
		$sql11="select * from gamebardb_guatemala.advertiser ";
		$res11=mysql_query($sql11,$con);
		
	}
	else if($operator == 'myanmar')
	{
		$sql11="select advertiserid,advertiser_name advname from commondbmyanmar.advertiser ";
		$res11=mysql_query($sql11,$con);
		
	}
	else if($operator == 'kazakistan')
	{
		$sql11="select advertiserid,advertiser_name advname from commondbmyanmar.advertiser ";
		$res11=mysql_query($sql11,$con);
		
	}
	else if($operator == 'egypt')
	{
		$sql11="select * from gamebardb_vodafone_egypt.advertiser ";
		$res11=mysql_query($sql11,$con);
		
	}
	else if ($operator == 'tim_italy')
	{
		$sql11="select * from gamebardb_tim.advertiser ";
		$res11=mysql_query($sql11,$con);
		
	}
	else if ($operator == 'h3g_italy')
	{
		$sql11="select * from gamebardb_h3g.advertiser ";
		$res11=mysql_query($sql11,$con);
		
	}
	else if ($operator == 'wind_italy')
	{
		$sql11="select * from gamebardb_wind.advertiser ";
		$res11=mysql_query($sql11,$con);
		
	}
	elseif($operator == 'ooredoo_oman')
	{
		$sql11="select * from gamesdblog_ooredoo_oman.advertiser ";
		$res11=mysql_query($sql11,$con);
	}
	elseif($operator == 'du_dubai')
	{
		$sql11="select * from gamesdblog_uaedu.advertiser ";
		$res11=mysql_query($sql11,$con);
	}
	elseif($operator == 'malaysia_cellcom')
	{
		$sql11="select * from gamesdbnew_celcom_malaysia.advertiser ";
		$res11=mysql_query($sql11,$con);
	}
	elseif($operator == 'idea')
	{
		$sql11="select distinct(aggregator) advertiserid,aggregator_name advname from aggregator_common.aggregators where operator=2 group by aggregator";
		$res11=mysql_query($sql11,$con);
	}
	elseif($operator == 'vodafone')
	{
		$sql11="select * from gamebardb_svmobi.advertiser ";
		$res11=mysql_query($sql11,$con);
	}
	elseif($operator == 'poland')
	{
		$sql11="select * from gamebardb_poland.advertiser ";
		$res11=mysql_query($sql11,$con);
	}
	elseif($operator == 'bsnl_india')
	{
		$sql11="select distinct(aggregator) advertiserid,aggregator_name advname from aggregator_common.aggregators where operator=3 group by aggregator";
		$res11=mysql_query($sql11,$con);
	}
	elseif($operator == 'south-africa')
	{
		$sql11="select * from gamebarbardb_africa.advertiser ";
		$res11=mysql_query($sql11,$con);
		
	}
	if($operator == 'southafrica_intarget')
	{
		$sql11="select * from gamebardb_southafrica.advertiser ";
		$res11=mysql_query($sql11,$con);
		
	}
	elseif($operator == 'indonesia')
	{
		$sql11="select * from gamebardb_indonesia.advertiser ";
		$res11=mysql_query($sql11,$con);
		
	}
	elseif($operator == 'portugal')
	{
		$sql11="select * from gamebardb_portugal.advertiser ";
		$res11=mysql_query($sql11,$con);
		
	}
	elseif($operator == 'spain')
	{
		$sql11="select * from gamebardb_spain.advertiser ";
		$res11=mysql_query($sql11,$con);
		
	}
	elseif($operator == 'airtel_india')
	{
		$sql11="select * from gamebardb_airtel.advertiser ";
		$res11=mysql_query($sql11,$con);
		
	}
	elseif($operator == 'kenya_oxygen')
	{
		$sql11="select * from gamebardb_kenya.advertiser ";
		$res11=mysql_query($sql11,$con);
		
	}
	elseif($operator == 'rusia_tele2')
	{
		$sql11="select * from gamebardb_tele2.advertiser ";
		$res11=mysql_query($sql11,$con);
		
	}
	elseif($operator == 'rusia_biline')
	{
		$sql11="select * from gamebardb_beeline.advertiser ";
		$res11=mysql_query($sql11,$con);
		
	}
	elseif($operator == 'ecuador')
	{
		$sql11="select * from gamebardb_ecuador.advertiser ";
		$res11=mysql_query($sql11,$con);
		
	}
	elseif($operator == 'qu_qatar')
	{
		$sql11="select * from gamesdb_ooredoo_qatar_qyou.advertiser ";
		$res11=mysql_query($sql11,$con);
		
	}
	elseif($operator == 'a1_austria')
	{
		$sql11="select * from gamebardb_a1.advertiser ";
		$res11=mysql_query($sql11,$con);
		
	}
	elseif($operator == 'tmobile_austria')
	{
		$sql11="select * from gamebardb_tmobile.advertiser ";
		$res11=mysql_query($sql11,$con);
		
	}
	elseif($operator == 'hutchison_austria')
	{
		$sql11="select * from gamebardb_dimoco.advertiser ";
		$res11=mysql_query($sql11,$con);
		
	}
	
	elseif($operator == 'gamezone_vodafone')
	{
		$sql11="select * from gamesnewdb_voda.advertiser ";
		$res11=mysql_query($sql11,$con);
		
	}
	elseif($operator == 'qatar_gamestation')
	{
		$sql11="select * from gamesdblog_ooredoo_qatar_gamestation.advertiser ";
		$res11=mysql_query($sql11,$con);
		
	}
	/*else
	{
		
		$sql11="select * from hotshotsdblog1.advertiser where operator = 2 ";
		$res11=mysql_query($sql11,$con);
	}*/
}
else
{
	if($operator == 'south-africa')
	{
		$sql11="select * from fashionbardb_africa.advertiser ";
		$res11=mysql_query($sql11,$con);
		
	}
	if($operator == 'southafrica_intarget')
	{
		$sql11="select * from glambardb_southafrica.advertiser ";
		$res11=mysql_query($sql11,$con);
		
	}
	elseif($operator == 'poland')
	{
		$sql11="select * from glambardb_poland.advertiser ";
		$res11=mysql_query($sql11,$con);
	}
	elseif($operator == 'idea')
	{
		$sql11="select distinct(aggregator) advertiserid,aggregator_name advname from aggregator_common.aggregators where operator=2 group by aggregator";
		$res11=mysql_query($sql11,$con);
	}
	elseif($operator == 'vodafone')
	{
		$sql11="select * from fashionbardb_svmobi.advertiser ";
		$res11=mysql_query($sql11,$con);
		
	}
	elseif($operator == 'hotshots_vodafone')
	{
		$sql11="select * from  hotshotsnewdb_voda_0617.advertiser ";
		$res11=mysql_query($sql11,$con);
		
	}
	elseif($operator == 'bsnl_india')
	{
		$sql11="select distinct(aggregator) advertiserid,aggregator_name advname from aggregator_common.aggregators where operator=3 group by aggregator";
		$res11=mysql_query($sql11,$con);
	}
	elseif($operator == 'airtel_india')
	{
		$sql11="select * from funzonedb_airtel.advertiser ";
		$res11=mysql_query($sql11,$con);
		
	}
	elseif($operator == 'hotshots_airtel')
	{
		$sql11="select * from hotshotsdb_airtel.advertiser ";
		$res11=mysql_query($sql11,$con);
		
	}
	elseif($operator == 'spain')
	{
		$sql11="select * from fashionbardb_spain.advertiser ";
		$res11=mysql_query($sql11,$con);
		
	}
	
	
	elseif($operator == 'ooredoo_qatar')
	{
		$sql11="select * from gamesdblog_ooredoo_qatar.advertiser ";
		$res11=mysql_query($sql11,$con);
		
	}
	elseif($operator == 'kenya_oxygen')
	{
		$sql11="select * from glambardb_kenya.advertiser ";
		$res11=mysql_query($sql11,$con);
		
	}
	elseif($operator == 'portugal')
	{
		$sql11="select * from fashionbardb_portugal.advertiser ";
		$res11=mysql_query($sql11,$con);
		
	}
	elseif($operator == 'spain')
	{
		$sql11="select * from fashionbardb_spain.advertiser ";
		$res11=mysql_query($sql11,$con);
		
	}
	elseif($operator == 'rusia_tele2')
	{
		$sql11="select * from glambardb_tele2.advertiser ";
		$res11=mysql_query($sql11,$con);
		
	}
	elseif($operator == 'rusia_biline')
	{
		$sql11="select * from glambardb_beeline.advertiser ";
		$res11=mysql_query($sql11,$con);
		
	}
	elseif($operator == 'vodacom_wfh')
	{
		$sql11="select * from vodacom_za.advertiser where serviceid=1 ";
		$res11=mysql_query($sql11,$con);
		
	}
	elseif($operator == 'vodacom_fg')
	{
		$sql11="select * from vodacom_za.advertiser where serviceid=2 ";
		$res11=mysql_query($sql11,$con);
		
	}
	elseif($operator == 'vodacom_bt')
	{
		$sql11="select * from vodacom_za.advertiser where serviceid=3 ";
		$res11=mysql_query($sql11,$con);
		
	}
	
}


?>
                          
                        
	<select name="advertiserid" class="form-control select2_multiple"  required >
		<?php
		if( $operator == 'idea' )
		{
		?>
			<option value="16">SVMOBI</option>
			
		<?php
		
		}
		elseif($operator=='bsnl_india')
		{
			?>
		<option value="20">SVMOBI</option>
			
		<?php	
		}
		
		
		else{
		?>	
		<option value="all">All</option>
		<?php
		}
		while($row_ad=mysql_fetch_array($res11))
		{
			//echo $row_ad[0];exit;
		?>
		<option value="<?php echo $row_ad[0]; ?>"><?php echo $row_ad[1]; ?></option>
		<?php
		}
		?>
		
	</select>

	
	
<!-- Select2 -->
    <script>
      $(document).ready(function() {
        $(".select2_single").select2({
          placeholder: "Select",
          allowClear: true
        });
        $(".select2_group").select2({});
        $(".select2_multiple").select2({
          maximumSelectionLength: 4,
          placeholder: "With Max Selection limit 4",
          allowClear: true
        });
      });
    </script>
    <!-- /Select2 -->