<?php
include("includes/connection.php");
error_reporting(0);
$clickid=$_GET['clickid'];
$unsubdatetime=DATE("Y-m-d H:i:s");


if(isset($_POST['submit']))
{
	$msisdn=$_POST['msisdn'];
	
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
			$success="1";
		}
		else{
			$success="0";
		}
		
	
}

?>

<?php
include("includes/header.php"); 
?>

	<form method="post">
	<div class="container">

		<?php
		if($success == '1' )
		{
			?>
		
				<br>
				<br>
				<br>
				<br>
			
				<center><p style="color:#fff;font-size:25px;"> Você foi cancelado de <strong>GameStation</strong>. Obrigada!</p></center>
			
				
			
			<?php
		}
		else
		{
		?>
			
			<br>
			<br>
			<?php
			if($success=='0')
			{
				?>
				<center><p style="color:#fff;font-size:25px;"> Por favor, tente novamente!</p></center>
				<?php
			}
			else{
				?>
				<center><p style="color:#fff;font-size:25px;"> Digite o número do seu celular para cancelar a assinatura.</p></center>
				<?php
			}
			?>
			
			
			<br>
			<br>
			<center>
				<input type="text" name="msisdn" placeholder="Digite seu número de celular" style="width: 250px;height: 30px; padding: 10px;" >
			<br>
			<br>
			<input type="submit" name="submit" value ="Cancelar assinatura" style="width: 150px;height: 40px; padding: 10px;background:red;border:none;color:white" >
			</center>
			
			<?php
		}
		?>

		
	</form>
	</div>	

<?php
include("includes/footer.php");
		
?>



		

