<?php
ini_set('max_execution_time', 1000000);

ini_set('mysql.connect_timeout', 30000);
ini_set('default_socket_timeout', 30000);
$con1=mysqli_connect('10.125.1.51','webserveruser','K&dN&r4a8N@du0') or die(mysqli_error());//cluster 2

$con2=$con1;
//$con=mysql_connect("10.125.1.51","productionuser","Zb8#fNIsXnoP876") or die(mysql_error());//cluster2
$con=mysql_connect('10.125.1.51','webserveruser','K&dN&r4a8N@du0');
$con6=mysqli_connect('10.125.1.51','webserveruser','K&dN&r4a8N@du0');
date_default_timezone_set("Asia/Calcutta");
echo  $date1=date('Y-m-d',strtotime("-1 days"));

$startdate=$date1.' 00:00:00';
$enddate=$date1.' 23:59:59';
$report='gamebardb_vodafone_qatar_report';

$vodacom='vodacom_za';




 $main=0;

mysqli_query($con1,"DELETE FROM ".$report.".`vodacom_adacts` WHERE `date`='".$date1."' ;") or die(mysqli_error($con1));


								//all


//vodacom_fg

$sql="call ".$vodacom.".mainreport_adacts('".$startdate."','".$enddate."','2')";
			
				
								
								if($result=$con1->query($sql) )
								{
								
								
								while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
								{
									$Date=$row['dt'];
									$clicks=$row['clicks'];
									
									$uniq=$row['uniq'];
									$cg=$row['cg'];
									$actcount=$row['act'];
									$actamount=$row['actamnt'];
									$renewcount=$row['ren'];
									$renewamount=$row['renamnt'];
									$churn=$row['churn'];
									$park=$row['Low'];
									$cbsent=$row['cbsent'];
									$advertiser=0;
									$operator='vodacom_fg';
									$product='fitnessguru';
									$conversion=($row['act']*100)/$row['clicks'];
									$totalcount=$row['act']+$row['ren'];
									$totalamount=$row['actamnt']+$row['renamnt'];
									if($row['act']==0)
									{
										$cbsentpercent=0;
									}else{
										$cbsentpercent=($cbsent*100)/$row['act'];
									}	 
									$advamount=$row['cbsent']*12.75;
										
									//echo "hi";
								   $sql4="INSERT INTO ".$report.".`vodacom_adacts`(`Date`, `clicks`, `uniq`, `cg`, `conversion`, `actcount`, `actamount`, `renewcount`, `renewamount`, `totalcount`, `totalamount`, `churn`, `park`,  `cbsent`, `cbsentpercent`, `advamount`,   `advertiser`, `operator`, `product`) values('".$Date."','".$clicks."','".$uniq."','".$cg."','".$conversion."','".$actcount."','".$actamount."','".$renewcount."','".$renewamount."','".$totalcount."','".$totalamount."','".$churn."','".$park."','".$cbsent."','".$cbsentpercent."','".$advamount."','".$advertiser."','".$operator."','".$product."') ; ";
									$result1=mysql_query($sql4,$con) or die(mysql_error($con));
									$indonesia_query=$sql4;
								
								}
								}
								$result->close();
								//$result1->close();
							$con1->next_result();

						