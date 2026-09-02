<?php
include('include/connection.php');
include('include/header.php');
?>



    <main>
        <div class="game-section">
            <section class="container-fluid mb-3">
                <div class="row">
                    <div class="col titleContainer">
                        <div class="title">
                            <h4>Games</h4>
                        </div>
                    </div>
                </div>
				
				<div class="row gamerow1">
					<?php
					$sql1="select * from htmlgames.html where category = '".$_GET['ct']."' and isdisplay >= 1  order by rand() limit 40";
					foreach ($conn->query($sql1) as $row) 
					{ 
					?>
					<div class="col"> 
						 <a href="dl.php?ir=<?php echo $row['id'];?>&clickid=<?php echo $clickid;?>&msisdn=<?php echo $msisdn; ?>"><img src="<?php echo "https://lkjgf.xyz/hgame/".$row['medianame'];?>"></a> 
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