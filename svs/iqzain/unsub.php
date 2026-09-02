<?php
include("includes/connection.php");

$msisdn=$_GET['msisdn'];

	$url="https://dcb-api.window-technologies.com/method/unsubscribeUser?user=GameStation&password=Game20Station24&msisdn=$msisdn&shortcode=4054&serviceId=96&spId=61"; 
 
	$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => $url,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'GET',
		));

	$response = curl_exec($curl);

	curl_close($curl);
	
	$data=json_decode($response,true);
	$response=str_replace("'"," ",$response);
	
	$insert_unsub="INSERT INTO ".$db.".`unsub`
					(
					`msisdn`,
					`unsubdatetime`,
					`response`)
					VALUES
					(
					'".$msisdn."',
					'".DATE('Y-m-d H:i:s')."',
					'".$response."');
					";
	$res_unsub=$conn->query($insert_unsub);
	
		if(strtolower($data['status']) == strtolower('Success')  )
		{
		

				include("includes/header.php"); 
				
		?>


		<div class="container">
			<div class="categoryrow">
			<br>
			<br>
			<br>
			<br>
				<center><p style="color:#fff;font-size:25px;"> You have been unsubscribed from <strong>GameStation.</strong>.</p></center>
			</div>
		</div>

		<?php include("includes/footer.php");
		
		}
		else
		{
			include("includes/header.php"); 
			?>
			<div class="container">
				<div class="categoryrow">
				<br>
				<br>
				<br>
				<br>
					<center><p style="color:#fff;font-size:25px;">Error : <?php echo $data['msg'];   ?> | Your unsubscription request for <strong>GameStation</strong> has not been accepted.  </p></center>
					
						<center><p style="color:#fff;font-size:25px;">Back to Content <a href="https://funworld.mobi/svs/iqzain/content/index?msisdn=$msisdn"> CLICK HERE </a> </p></center>
					
					
				</div>
			</div>
			<?php
			include("includes/footer.php");
		}
			

?>




		

