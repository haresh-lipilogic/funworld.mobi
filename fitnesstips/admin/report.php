<?php

ini_set('max_execution_time', 6000);

//include("includes/check_session.php");
//include("includes/connection.php");
date_default_timezone_set("Asia/Calcutta");
error_reporting(0);
$con=new mysqli("10.125.1.51","webserveruser","K&dN&r4a8N@du0") or die(mysqli_error());//cluster 2
$con3=new mysqli("10.125.1.51","webserveruser","K&dN&r4a8N@du0") or die(mysqli_error());//cluster 2





//$con1=new mysqli("10.125.0.50","webserveruser","K&dN&r4a8N@du0") or die(mysqli_error());//cluster1

$con1=$con;
$start_date='';
$end_date='';
$operator='';
$product='';
$count=0;
$cc=0;
if(isset($_POST['submit']))
{

$count=1;
$operator=$_POST['operator'];
$product=$_POST['product'];
$date1=date('Y-m-d');
	if($start_date == $end_date)
	{
		$start_date=date('Y-m-d 00:00:00',strtotime($_POST['start_date']));
		$end_date=date('Y-m-d 23:59:59',strtotime($_POST['end_date']));
		$start_date1=date('Y-m-d',strtotime($_POST['start_date']));
		$end_date1=date('Y-m-d',strtotime($_POST['end_date']));
	}	
	else
	{
		$start_date=date('Y-m-d 00:00:00',strtotime($_POST['start_date']));
		$end_date=date('Y-m-d 00:00:00',strtotime($_POST['end_date']));
		$start_date1=date('Y-m-d',strtotime($_POST['start_date']));
		$end_date1=date('Y-m-d',strtotime($_POST['end_date']));
	}
   
//echo $operator;

// report logic below
	if($product=='fitnessguru' || $product=='fitnessguru')
	{
		
		 if($operator=='vodacom_fg')
		{
			$db="vodacom_za";
			$dblog="vodacom_za_log";
			$report="gamebardb_vodafone_qatar_report";
			
			$sql_ad="select * from ".$db.".advertiser where serviceid=2";
			$res_ad=mysqli_query($con,$sql_ad);
			
		}
		
		
		
	}
	
	
	$data['startdate']=$start_date;
	$data['enddate']=$end_date;
	$data['db']=$db;
	//$data['dblog']=$dblog;
	//$data['advertiser']=$advertiserid;
	//echo $operator;exit;
	$advertiserid=2;





	
	if($operator=='vodacom_fg')
	{
		if($product=='gamebar' || $product=='gamebar')
		{
			
			
			
			
		}
		else{
			
			
			
			if($end_date1 == $date1 && $start_date1 == $date1)
			{	
				
				 $sql="call ".$db.".mainreport_adacts('".$start_date."','".$end_date."','2')";
				$cc=1;
					$res=mysqli_query($con1,$sql) or die(mysqli_error());
			}
			elseif($end_date1 == $date1 && $start_date1 != $date1)
			{
					$sql1="select * from ".$report.".vodacom_adacts where date >='".$start_date."' and date < SUBDATE('".$end_date."', INTERVAL 1 DAY)  and operator='".$operator."' and product='".$product."'";
					$res1=mysqli_query($con,$sql1);
			
					/*$start_date=date('Y-m-d 00:00:00');
					$end_date=date('Y-m-d 23:59:59');
			
					*/
			
			
			 $sql="call ".$db.".mainreport_adacts('".$start_date."','".$end_date."','2')";
			$cc=2;
			$res=mysqli_query($con1,$sql) or die(mysqli_error());
			
			}
			else
			{
				$sql="select * from ".$report.".vodacom_adacts where date >='".$start_date."' and date < '".$end_date."'  and operator='".$operator."' and product='".$product."'";

			$cc=3;
			$res=mysqli_query($con,$sql) or die(mysqli_error());
			}
			
			
		}
	}
	
	

//echo $sql;
//echo $count;exit;
$fields=mysqli_num_fields($res);// number of fields in table

//echo "<script>window.location='report.php';</script>";
$start_date2=$_POST['start_date'];
$end_date2=$_POST['end_date'];

	//					exit;

}
?>

		<?php include("includes/header.php"); ?>
		<?php include("includes/sidebar.php"); ?>
		<?php include("includes/top_navigation.php"); ?>
            
			

        <!-- page content -->
        <div class="right_col" role="main" >
          <div class="footer_down">

            
            

            <div class="row">
              <div class="col-md-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Search Report <small>Clicks, Activation, Deactivation, Churn, Amount, Revenue</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form class="form-horizontal form-label-left input_mask" method="post">
					
						<div class="col-md-2 col-sm-2 col-xs-12 form-group has-feedback"> Product
						<select name="product" class="form-control" id="product" onchange="myfun()">
							<option>Product</option>
							
							<option value="fitnessguru" <?php if($product=='fitnessguru'){$selected='selected';}else{$selected='';} echo $selected; ?> >FitnessGuru</option>
							
						</select>
						</div>
						
						<div class="col-md-2 col-sm-2 col-xs-12 form-group has-feedback"> Operator
						<select name="operator" class="form-control" id="operator">
						<?php
						if($product == 'fitnessguru')
						{ ?>
							
							<option value="vodacom_fg" <?php if($operator=='vodacom_fg'){$selected='selected';}else{$selected='';} echo $selected; ?> >Vodacom</option>
							
						<?php
						}
						
						
						?>
						</select>
						</div>
						
						<div class="col-md-2 col-sm-2 col-xs-12 form-group has-feedback"> Start Date
						<input class="date-picker form-control col-md-7 col-xs-12 birthday" name="start_date" value="<?php if($start_date!=''){ echo date('d-m-Y',strtotime($start_date2)); } else { echo date('d-m-Y');} ?>"  type="text">
						</div>

						<div class="col-md-2 col-sm-2 col-xs-12 form-group has-feedback"> End Date
						<input class="date-picker form-control col-md-7 col-xs-12 birthday" name="end_date" value="<?php if($end_date!=''){echo date('d-m-Y',strtotime($end_date2));}else{ echo date('d-m-Y');} ?>" type="text">
						</div>

						
						
						
                     
						<div class="col-md-9 col-sm-9 col-xs-12">
						 
						  <button type="submit" name="submit" class="btn btn-success">Submit</button>
						</div>
                      

                    </form>
                  </div>
                </div>
				
              
              </div>
            </div>
			
			<div class="row">

				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="x_panel">
						<div class="x_title">
							<h2>Output Records <small></small></h2>
							<ul class="nav navbar-right panel_toolbox">
							  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
							  </li>
							  <li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
								<ul class="dropdown-menu" role="menu">
								  <li><a href="#">Settings 1</a>
								  </li>
								  <li><a href="#">Settings 2</a>
								  </li>
								</ul>
							  </li>
							  <li><a class="close-link"><i class="fa fa-close"></i></a>
							  </li>
							</ul>
							<div class="clearfix"></div>
						</div>
						
			<?php 
			//echo $operator;
			
				$swq="select operator_cost from `gamebardb_vodafone_qatar_report`.`operatorcost` where operator='".$operator."'";
				$ser=mysqli_query($con3,$swq) or die(mysqli_error());
				while($wor=mysqli_fetch_array($ser))
				{
					$cost=$wor['operator_cost'];
				}
			if($count==1)
			{
				$k=$l=0;
				//echo $cc;exit;
			?>	
			
					  <div class="x_content"  style="overflow:auto;">
						
						<table id="datatable-buttons" class="table table-striped table-bordered">
							<thead>
								<tr>
									<td><strong>Date</strong></td>
									<td><strong>Clicks</strong></td>
									<td><strong>With mdn</strong></td><!--uniq-->
									<td><strong>Conv %</strong></td>
									<td><strong>Activation</strong></td>
									<td><strong>Amount</strong></td>
									<td><strong>Renewal</strong></td>
									<td><strong>Amount</strong></td>
									<td><strong>Total Count</strong></td>
									<td><strong>Total Amount</strong></td>
									<td><strong>Churn</strong></td>
									<td><strong>Low Bal.</strong></td>
									
									
									
									
								</tr>
							</thead>


							<tbody>
								<?php 
							//echo $sql;
								$click_sum='';
								$uniq_sum='';
								$cg_sum='';
								$act_sum='';
								$actamnt_sum='';
								$ren_sum='';
								$renamnt_sum='';
								$count_sum='';
								$amount_sum='';
								$low_sum='';
								$cbsent_sum='';
								$churn_sum='';
								$advcost_sum=$svmobiamount_sum='';
									
								if($cc==1)
								{
									//echo "hi";
									while($row=mysqli_fetch_array($res))
									{
										$ddate=date('d-m-Y',strtotime($row['dt']));
										$dclick=$row['clicks'];
										if($dclick=="")
										{
											$dclick=0;
										}
										$duniq=$row['uniq'];
										if($duniq == "")
										{
											$duniq=0;
											
										}
										
										$dconv=($row['act']*100)/$row['clicks'];
										$dact=$row['act'];
										
										$dactamnt=$row['actamnt'];
										
										$dren=$row['ren'];
										$drenamnt=$row['renamnt'];
										$dcount=$row['act']+$row['ren'];
										$damount=$row['actamnt']+$row['renamnt'];
										$churn=$row['dct'];
										$dlow=$row['Low'];
										
								?>
									<tr>
										<td><?php echo $ddate; //date('d-m-Y',strtotime($row['dt']));  ?></td>
										<td><?php echo number_format($dclick); $click_sum=$click_sum+$row['clicks']; ?></td>
										<td><?php echo number_format($duniq); $uniq_sum=$uniq_sum+$row['uniq'];?></td>
										<td><?php echo number_format($dconv, 2, '.', '')."%"; ?></td>
										<td><?php echo number_format($dact); $act_sum=$act_sum+$row['act'];?></td>
										<td><?php echo number_format($dactamnt,2,'.',''); $actamnt_sum=$actamnt_sum+$row['actamnt'];?></td>
										<td><?php echo number_format($dren); $ren_sum=$ren_sum+$row['ren']; ?></td>
										<td><?php echo number_format($drenamnt,2,'.',''); $renamnt_sum=$renamnt_sum+$row['renamnt'];?></td>
										<td><?php echo number_format($dcount); $count_sum=$count_sum+$dcount; ?></td>
										<td><?php echo number_format($damount,2,'.',''); $amount_sum=$amount_sum+$damount;?></td>
										
										
										<td><?php echo number_format($churn); $churn_sum=$churn_sum+$row['churn'];?></td>
										<td><?php echo number_format($dlow); $low_sum=$low_sum+$row['Low'];?></td>

										
									</tr>
								
								
								
								<?php
									}
									
								}
								elseif($cc==2)
								{
									
									
									if(mysqli_num_rows ($res1)>0)
									{
										$l=1;
									}
									while($row1=mysqli_fetch_array($res1))
									{
										
								?>
									<tr>
										<td><?php echo $dat2=date('d-m-Y',strtotime($row1['Date']));  ?></td>
										<td><?php echo number_format($row1['clicks']); $click_sum=$click_sum+$row1['clicks']; ?></td>
										
										<td><?php echo number_format($row1['uniq']); $uniq_sum=$uniq_sum+$row1['uniq'];?></td>
										
										<td><?php $conv=$row1['conversion']; echo number_format($conv, 2, '.', '')."%"; ?></td>
										<td><?php echo number_format($row1['actcount']); $act_sum=$act_sum+$row1['actcount'];?></td>
										<td><?php echo number_format($row1['actamount'],2,'.',''); $actamnt_sum=$actamnt_sum+$row1['actamount'];?></td>
										<td><?php echo number_format($row1['renewcount']); $ren_sum=$ren_sum+$row1['renewcount']; ?></a></td>
										<td><?php echo number_format($row1['renewamount'],2,'.',''); $renamnt_sum=$renamnt_sum+$row1['renewamount'];?></td>
										<td><?php echo number_format($count=$row1['totalcount']); $count_sum=$count_sum+$count; ?></td>
										<td><?php echo number_format($damount=$row1['totalamount'],2,'.',''); $amount_sum=$amount_sum+$damount;?></td>
										
									
										
										<td><?php echo number_format($row1['churn']); $churn_sum=$churn_sum+$row1['churn'];?></td>
										
										<td><?php echo number_format($row1['park']); $low_sum=$low_sum+$row1['park']; ?></td>
										
										
									</tr>
								<?php
									}
									while($row=mysqli_fetch_array($res))
									{
								?>
									<tr>
										<td><?php echo $dat2=date('d-m-Y',strtotime($row['dt']));  ?></td>
										<td><?php echo number_format($row['clicks']); $click_sum=$click_sum+$row['clicks']; ?></td>
										<td><?php echo number_format($row['uniq']); $uniq_sum=$uniq_sum+$row['uniq'];?></td>
										
										
										<td><?php $conv=($row['act']*100)/$row['clicks']; echo number_format($conv, 2, '.', '')."%"; ?></td>
										<td><?php echo number_format($row['act']); $act_sum=$act_sum+$row['act'];?></td>
										<td><?php echo number_format($row['actamnt'],2,'.',''); $actamnt_sum=$actamnt_sum+$row['actamnt'];?></td>
										<td><?php echo number_format($row['ren']); $ren_sum=$ren_sum+$row['ren']; ?></td>
										<td><?php echo number_format($row['renamnt'],2,'.',''); $renamnt_sum=$renamnt_sum+$row['renamnt'];?></td>
										<td><?php echo number_format($count=$row['act']+$row['ren']); $count_sum=$count_sum+$count; ?></td>
										<td><?php echo number_format($damount=$row['actamnt']+$row['renamnt'],2,'.',''); $amount_sum=$amount_sum+$damount;?></td>
										
										
										
										
										<td><?php echo number_format($row['churn']); $churn_sum=$churn_sum+$row1['churn'];?></td>
										<td><?php echo number_format($row['Low']); $low_sum=$low_sum+$row['Low'];?></td>
										
										
									</tr>
								<?php
									}
								}
								else
								{
									while($row=mysqli_fetch_array($res))
									{
										
								?>
									<tr>
										<td><?php echo $dat2=date('d-m-Y',strtotime($row['Date']));  ?></td>
										<td><?php echo number_format($row['clicks']); $click_sum=$click_sum+$row['clicks']; ?></td>
										
										<td><?php echo number_format($row['uniq']); $uniq_sum=$uniq_sum+$row['uniq'];?></td>
										
										
										
										<td><?php $conv=$row['conversion']; echo number_format($conv, 2, '.', '')."%"; ?></td>
										<td><?php echo number_format($row['actcount']); $act_sum=$act_sum+$row['actcount'];?></td>
										<td><?php echo number_format($row['actamount'],2,'.',''); $actamnt_sum=$actamnt_sum+$row['actamount'];?></td>
										<td><?php echo number_format($row['renewcount']); $ren_sum=$ren_sum+$row['renewcount']; ?></td>
										<td><?php echo number_format($row['renewamount'],2,'.',''); $renamnt_sum=$renamnt_sum+$row['renewamount'];?></td>
										<td><?php echo number_format($count=$row['totalcount'],2,'.',''); $count_sum=$count_sum+$count; ?></td>
										<td><?php echo number_format($damount=$row['totalamount'],2,'.',''); $amount_sum=$amount_sum+$damount;?></td>
										
										
										
										<td><?php echo number_format($row['churn']); $churn_sum=$churn_sum+$row['churn'];?></td>
										<td><?php echo number_format($row['park']); $low_sum=$low_sum+$row['park']; ?></td>
										
										
									</tr>
								<?php
									}
								}
								if(mysqli_num_rows ($res)>0)
								{
									$k=1;
								}
								
								if($k==1 or $l==1)
									{
								?>
								
								
								
								<tr>
									<td>Total</td>
									<td><?php echo number_format($click_sum); ?></td>
									<td><?php echo number_format($uniq_sum); ?></td>
									
									<td></td>
									<td><?php echo number_format($act_sum); ?></td>
									<td><?php echo  number_format($actamnt_sum,2,'.','');?></td>
									<td><?php echo number_format($ren_sum); ?></td>
									<td><?php echo number_format($renamnt_sum,2,'.',''); ?></td>
									<td><?php echo number_format($count_sum); ?></td>
									<td><?php echo number_format($amount_sum,2,'.',''); ?></td>
									
									<td><?php echo number_format($churn_sum); ?></td>
									<td><?php echo number_format($low_sum); ?></td>
									
									
								</tr>
									<?php 
									}
									?>
							</tbody>
							
							
								
								
						</table>
					  </div>
				<!--<div id="advertiser"></div>-->
			<?php
			}
			else if($count==2)
			{
				//echo "hi";exit;
			?>	
			
			<div class="x_content"  style="overflow:auto;">
						
						<table id="datatable-buttons" class="table table-striped table-bordered">
							<thead>
								<tr>
									<td><strong>Date</strong></td>
									<td><strong>Clicks</strong></td>
									<td><strong>With mdn</strong></td><!--uniq-->
									
									<td><strong>Conv %</strong></td>
									<td><strong>Activation</strong></td>
									<td><strong>Amount</strong></td>
									<td><strong>Renewal</strong></td>
									<td><strong>Amount</strong></td>
									<td><strong>Total Count</strong></td>
									<td><strong>Total Amount</strong></td>
									<td><strong>SVMobi Revenue</strong></td>
									<td><strong>Churn</strong></td>
									<td><strong>Low Bal.</strong></td>
									<td><strong>%Low Conv</strong></td>

										
								</tr>
							</thead>


							<tbody>
							<?php
							
							while($row=mysqli_fetch_array($res))
							{
								?>
									<tr>
										<td><?php echo $row['dt']; //date('d-m-Y',strtotime($row['dt']));  ?></td>
										<td><?php echo number_format($dclick=$row['clicks']); $click_sum=$click_sum+$row['clicks']; ?></td>
										<td><?php echo number_format($duniq=$row['uniq']); $uniq_sum=$uniq_sum+$row['uniq'];?></td>
										<td><?php echo number_format($dconv=$row['conv'], 2, '.', '')."%"; ?></td>
										<td><?php echo number_format($dact=$row['act']); $act_sum=$act_sum+$row['act'];?></td>
										<td><?php echo number_format($dactamnt=$row['actamnt'],2,'.',''); $actamnt_sum=$actamnt_sum+$row['actamnt'];?></td>
										<td><?php echo number_format($dren=$row['ren']); $ren_sum=$ren_sum+$row['ren']; ?></td>
										<td><?php echo number_format($drenamnt=$row['renamnt'],2,'.',''); $renamnt_sum=$renamnt_sum+$row['renamnt'];?></td>
										<td><?php echo number_format($dcount=$row['totalcount']); $count_sum=$count_sum+$dcount; ?></td>
										<td><?php echo number_format($damount=$row['totalamount'],2,'.',''); $amount_sum=$amount_sum+$damount;?></td>
										<?php
										if($operator=='vodafone')
										{
										?>	
										<td><?php echo number_format($damount*0.5,2,'.',''); $svmobiamount_sum=$svmobiamount_sum+$damount*0.5;?></td>
										<?php
										}
										else if($operator=='spain')
										{
										?>	
										<td><?php echo number_format($damount*0.42,2,'.',''); $svmobiamount_sum=$svmobiamount_sum+$damount*0.42;?></td>
										<?php
										}
										else if($operator=='idea')
										{
										?>	
										<td><?php echo number_format($damount*0.5,2,'.',''); $svmobiamount_sum=$svmobiamount_sum+$damount*0.5;?></td>
										<?php
										}
										?>
										<td><?php echo number_format($churn=$row['dct']); $churn_sum=$churn_sum+$row['churn'];?></td>
										<td><?php echo number_format($dlow=$row['Low']); $low_sum=$low_sum+$row['Low'];?></td>
										<td><?php echo number_format($row['lowconv'], 2, '.', '')."%"; ?></td>

									
										
										
										
										
									</tr>
								<?php
							}
							
							?>
							</tbody>
							</table>
					  </div>
			
			<?php	
			}
			else{
				
			}
			?>
					</div>
                </div>
			</div>
			
		</div>
        <!-- /page content -->
		
       <?php
	   include("includes/footer.php");
		?>
		
<script type="text/javascript">
 $(document).ready(function(){

   $("#operator").change(function(){
		
		var check1=$("#check1").val();
		if(check1 == 0)
		{
			
		}
		else	
		{
			$(".sel").val('');
			$("#t").hide();
			$("#f").show();
						
		}
        var operator = $("#operator").val();
		var product = $("#product").val();
        $.ajax({
            type: "GET",
            url: "ajax/find_advertiser.php?operator="+operator+"&product="+product         
			
        }).done(function(data){
            $(".response").html(data);
			 
        });
    });
});
</script>
<script type="text/javascript">
function myfun() {
	var x = document.getElementById("product").value;
    //alert(x);
	if(x =='fitnessguru')
	{
		document.getElementById('operator').options.length = 0;
		var select = document.getElementById("operator");
		
		select.options[select.options.length] = new Option('Vodacom', 'vodacom_fg');
		
	}
	else if(x =='gamebar')
	{
		
	}
	
	/*if(x=="glambar")
	{
		 //alert("hi");
	document.getElementById('azharbeizan').style.visibility = 'hidden';
	}else
	{
		document.getElementById('azharbeizan').style.visibility = 'visible';
	}*/
}
</script>		
<script>
 function getdata(startdate,enddate,db,dblog,advertiser,parameter){

  
  if (window.XMLHttpRequest) {
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
        xmlhttp.open("GET","mehul_ajax/mehul_ajax.php?startdate="+startdate+"&enddate="+enddate+"&db="+db+"&dblog="+dblog+"&advertiser="+advertiser+"&parameter="+parameter,true);
        xmlhttp.send();
    }
 
 </script>   
<script>
	/*function myFunction() {
    var x = document.getElementById("product").value;
	
	//document.getElementById("demo").innerHTML = "You selected: " + x;
    if(x =='Hotshots')
	{
		document.getElementById('operator').options.length = 0;
		var select = document.getElementById("operator");
		select.options[select.options.length] = new Option('--operator--', '');
		select.options[select.options.length] = new Option('Vodafone_Qatar', 'Vodafone_Qatar');
		select.options[select.options.length] = new Option('Idea', 'Idea');
		select.options[select.options.length] = new Option('Airtel', 'Airtel');
	}
	else if(x =='gamebar')
	{
		document.getElementById('operator').options.length = 0;
		var select = document.getElementById("operator");
		select.options[select.options.length] = new Option('--operator--', '');
		select.options[select.options.length] = new Option('Vodafone_Qatar', 'Vodafone_Qatar');
		select.options[select.options.length] = new Option('Idea', 'Idea');
		//select.options[select.options.length] = new Option('Airtel', 'Airtel');
		select.options[select.options.length] = new Option('Azharbeizan', 'Azharbeizan');
		//select.options[select.options.length] = new Option('etisalat', 'etisalat');
		//select.options[select.options.length] = new Option('ooredoo_qatar', 'ooredoo_qatar');
	}
	
	//document.getElementById("demo").innerHTML = "You selected: " + x;
	}
	
	*/
	</script> 
