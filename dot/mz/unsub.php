<?php
include("includes/connection.php");

$msisdn=$_GET['msisdn'];

	$curl = curl_init();

	curl_setopt_array($curl, array(
	  CURLOPT_URL => 'https://dot-jo.biz/lb2/partners-subscription-notification',
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => '',
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 0,
	  CURLOPT_FOLLOWLOCATION => true,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => 'POST',
	  CURLOPT_POSTFIELDS =>'{
	"msisdn" : "'.$msisdn.'",
	"serviceId" : "gamestation_service",
	"opId" : "99",
	"action" : "2"
	}',
	  CURLOPT_HTTPHEADER => array(
		'PartnerId: svmobi-201850',
		'Authorization: Basic c3Ztb2JpLTk5Nzo1NTFTVFI5OQ==',
		'Content-Type: application/json'
	  ),
	));

	$response = curl_exec($curl);
	$result = str_replace("'","", $response); 
	curl_close($curl);
	$data=json_decode($response,true);

	
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
	
		if($data['errorCode'] == '1000'  )
		{
		

				include("includes/header.php"); 
				
		?>


		<div class="container">
			<div class="categoryrow">
			<br>
			<br>
			<br>
			<br>
				<center><p style="color:#fff;font-size:25px;"> Sua inscrição foi cancelada <strong>GameStation</strong>.</p></center>
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
					<center><p style="color:#fff;font-size:25px;">Erro de código : <?php echo $data['errorCode'];   ?> | Seu pedido de cancelamento de assinatura do GameStation não foi aceito.
					</p></center>
					
						<center><p style="color:#fff;font-size:25px;">Voltar ao conteúdo <a href="https://funworld.mobi/dot/mz/content/index?msisdn=$msisdn"> CLICK HERE </a> </p></center>
					
					
				</div>
			</div>
			<?php
			include("includes/footer.php");
		}
			

?>




		

