<?php
include('include/connection.php');
include('include/header.php');
?>

<?php

$sql1="select * from htmlgames.html where  id='".$_GET['ir']."'  order by id asc limit 1";
$flag=1;

foreach ($conn->query($sql1) as $row) {
				$flag=0;
			  $result[] = $row;
			}
			
if($_GET['ir']==141)
{	
 $url=$result[0]['filename'];
	//header("Location:$url");	exit;
}
else{
	
	$url="https://playcool.games/hgame/".$result[0]['filename'];
	
}



?>


    <main>
        <div class="game-section">
            <section class="container-fluid mb-3">
                <div class="row">
                    <div class="col">
                        <iframe src="<?php echo $url;?>" class="iframe-game"></iframe>
                    </div>
                </div>
				</br>
				<div class="row gamerow">
					<?php
					$sql1="select * from htmlgames.html where isdisplay >= 1  order by rand() limit 40";
					foreach ($conn->query($sql1) as $row) 
					{ 
					?>
					<div class="col"> 
						 <a href="dl.php?ir=<?php echo $row['id'];?>&clickid=<?php echo $clickid;?>&msisdn=<?php echo $msisdn; ?>"><img src="<?php echo "https://playcool.games/hgame/".$row['medianame'];?>"></a> 
					</div>
					<?php		
					}  
					?>
                </div>
            </section>
        </div>

    </main>
<!-- FOOTER -->
<?php
include('include/footer.php'); 
?> 