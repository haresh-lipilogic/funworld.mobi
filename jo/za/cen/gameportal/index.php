<?php
include('include/connection.php');
include('include/header.php');

?>



    <main>
        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
			<!-- 
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
			-->
            <div class="carousel-inner">
                <div class="carousel-item active">
					<?php
					$sql1="call htmlgames.GetGames('0',38);";
							//$result1 = $conn->query($sql1);
					$result = array();
					foreach ($conn->query($sql1) as $row) 
					{
						$result[] = $row;
					}
								//print_r($result);exit;
					?>
                    <div class="banner-slider">
                        <center>
                            <!--<div class="numbertext">1 / 3</div>-->
                            <a href="dl.php?ir=<?php echo $result[0]['id'];?>&clickid=<?php echo $clickid;?>&msisdn=<?php echo $msisdn; ?>">
								<img class="cost30" src="<?php echo "https://playcool.games/hgame/".$result[0]['medianame'];?>">
							</a>
                            <a href="dl.php?ir=<?php echo $result[1]['id'];?>&clickid=<?php echo $clickid;?>&msisdn=<?php echo $msisdn; ?>">
								<img class="cost9" src="<?php echo "https://playcool.games/hgame/".$result[1]['medianame'];?>">
							</a>
							<a href="dl.php?ir=<?php echo $result[2]['id'];?>&clickid=<?php echo $clickid;?>&msisdn=<?php echo $msisdn; ?>">
								<img class="cost91" src="<?php echo "https://playcool.games/hgame/".$result[2]['medianame'];?>">
							</a>
                            <a href="dl.php?ir=<?php echo $result[3]['id'];?>&clickid=<?php echo $clickid;?>&msisdn=<?php echo $msisdn; ?>">
								<img class="cost9" src="<?php echo "https://playcool.games/hgame/".$result[3]['medianame'];?>">
							</a>
                            <a href="dl.php?ir=<?php echo $result[4]['id'];?>&clickid=<?php echo $clickid;?>&msisdn=<?php echo $msisdn; ?>">
								<img class="cost91" src="<?php echo "https://playcool.games/hgame/".$result[4]['medianame'];?>">
							</a>
                            <a href="dl.php?ir=<?php echo $result[5]['id'];?>&clickid=<?php echo $clickid;?>&msisdn=<?php echo $msisdn; ?>">
								<img class="cost9" src="<?php echo "https://playcool.games/hgame/".$result[5]['medianame'];?>">
							</a>
                            <a href="dl.php?ir=<?php echo $result[6]['id'];?>&clickid=<?php echo $clickid;?>&msisdn=<?php echo $msisdn; ?>">
								<img class="cost91" src="<?php echo "https://playcool.games/hgame/".$result[6]['medianame'];?>">
							</a>

                            <a href="dl.php?ir=<?php echo $result[7]['id'];?>&clickid=<?php echo $clickid;?>&msisdn=<?php echo $msisdn; ?>">
								<img class="nocost30" src="<?php echo "https://playcool.games/hgame/".$result[7]['medianame'];?>">
							</a>
                            <a href="dl.php?ir=<?php echo $result[8]['id'];?>&clickid=<?php echo $clickid;?>&msisdn=<?php echo $msisdn; ?>">
								<img class="nocost9" src="<?php echo "https://playcool.games/hgame/".$result[8]['medianame'];?>">
							</a>
                            <a href="dl.php?ir=<?php echo $result[9]['id'];?>&clickid=<?php echo $clickid;?>&msisdn=<?php echo $msisdn; ?>">
								<img class="nocost91" src="<?php echo "https://playcool.games/hgame/".$result[9]['medianame'];?>">
							</a>
                            <a href="dl.php?ir=<?php echo $result[10]['id'];?>&clickid=<?php echo $clickid;?>&msisdn=<?php echo $msisdn; ?>">
								<img class="nocost93" src="<?php echo "https://playcool.games/hgame/".$result[10]['medianame'];?>">
							</a>
                            <a href="dl.php?ir=<?php echo $result[11]['id'];?>&clickid=<?php echo $clickid;?>&msisdn=<?php echo $msisdn; ?>">
								<img class="nocost913" src="<?php echo "https://playcool.games/hgame/".$result[11]['medianame'];?>">
							</a>

                            <!--<div class="text">Caption Text</div></center>-->
                        </center>

                    </div>

                </div>
				<!--
                <div class="carousel-item">
                    <div class="banner-slider">
                        <center>                     
                             <a href="<?php echo "dl.php?ir=".$result[35]['id'];?>"><img class="cost30"
                                    src="<?php echo "https://playcool.games/hgame/".$result[35]['medianame'];?>"></a>
                            <a href="<?php echo "dl.php?ir=".$result[34]['id'];?>"><img class="cost9"
                                    src="<?php echo "https://playcool.games/hgame/".$result[34]['medianame'];?>"></a>
                            <a href="<?php echo "dl.php?ir=".$result[33]['id'];?>"><img class="cost91"
                                    src="<?php echo "https://playcool.games/hgame/".$result[33]['medianame'];?>"></a>
                            <a href="<?php echo "dl.php?ir=".$result[32]['id'];?>"><img class="cost9"
                                    src="<?php echo "https://playcool.games/hgame/".$result[32]['medianame'];?>"></a>
                            <a href="<?php echo "dl.php?ir=".$result[31]['id'];?>"><img class="cost91"
                                    src="<?php echo "https://playcool.games/hgame/".$result[31]['medianame'];?>"></a>

                            <a href="<?php echo "dl.php?ir=".$result[30]['id'];?>"><img class="cost9"
                                    src="<?php echo "https://playcool.games/hgame/".$result[30]['medianame'];?>"></a>
                            <a href="<?php echo "dl.php?ir=".$result[29]['id'];?>"><img class="cost91"
                                    src="<?php echo "https://playcool.games/hgame/".$result[29]['medianame'];?>"></a>

                            <a href="<?php echo "dl.php?ir=".$result[28]['id'];?>"><img class="nocost30"
                                    src="<?php echo "https://playcool.games/hgame/".$result[28]['medianame'];?>"></a>
                            <a href="<?php echo "dl.php?ir=".$result[27]['id'];?>"><img class="nocost9"
                                    src="<?php echo "https://playcool.games/hgame/".$result[27]['medianame'];?>"></a>
                            <a href="<?php echo "dl.php?ir=".$result[26]['id'];?>"><img class="nocost91"
                                    src="<?php echo "https://playcool.games/hgame/".$result[26]['medianame'];?>"></a>
                            <a href="<?php echo "dl.php?ir=".$result[25]['id'];?>"><img class="nocost93"
                                    src="<?php echo "https://playcool.games/hgame/".$result[25]['medianame'];?>"></a>
                            <a href="<?php echo "dl.php?ir=".$result[24]['id'];?>"><img class="nocost913"
                                    src="<?php echo "https://playcool.games/hgame/".$result[24]['medianame'];?>"></a>                         
                        </center>

                    </div>
                </div>
                <div class="carousel-item">
                    <div class="banner-slider">
                        <center>                     
							<a href="<?php echo "dl.php?ir=".$result[12]['id'];?>"><img class="cost30"
                                    src="<?php echo "https://playcool.games/hgame/".$result[12]['medianame'];?>"></a>
                            <a href="<?php echo "dl.php?ir=".$result[13]['id'];?>"><img class="cost9"
                                    src="<?php echo "https://playcool.games/hgame/".$result[13]['medianame'];?>"></a>
                            <a href="<?php echo "dl.php?ir=".$result[14]['id'];?>"><img class="cost91"
                                    src="<?php echo "https://playcool.games/hgame/".$result[14]['medianame'];?>"></a>
                            <a href="<?php echo "dl.php?ir=".$result[15]['id'];?>"><img class="cost9"
                                    src="<?php echo "https://playcool.games/hgame/".$result[15]['medianame'];?>"></a>
                            <a href="<?php echo "dl.php?ir=".$result[16]['id'];?>"><img class="cost91"
                                    src="<?php echo "https://playcool.games/hgame/".$result[16]['medianame'];?>"></a>

                            <a href="<?php echo "dl.php?ir=".$result[17]['id'];?>"><img class="cost9"
                                    src="<?php echo "https://playcool.games/hgame/".$result[17]['medianame'];?>"></a>
                            <a href="<?php echo "dl.php?ir=".$result[18]['id'];?>"><img class="cost91"
                                    src="<?php echo "https://playcool.games/hgame/".$result[18]['medianame'];?>"></a>

                            <a href="<?php echo "dl.php?ir=".$result[19]['id'];?>"><img class="nocost30"
                                    src="<?php echo "https://playcool.games/hgame/".$result[19]['medianame'];?>"></a>
                            <a href="<?php echo "dl.php?ir=".$result[20]['id'];?>"><img class="nocost9"
                                    src="<?php echo "https://playcool.games/hgame/".$result[20]['medianame'];?>"></a>
                            <a href="<?php echo "dl.php?ir=".$result[21]['id'];?>"><img class="nocost91"
                                    src="<?php echo "https://playcool.games/hgame/".$result[21]['medianame'];?>"></a>
                            <a href="<?php echo "dl.php?ir=".$result[22]['id'];?>"><img class="nocost93"
                                    src="<?php echo "https://playcool.games/hgame/".$result[22]['medianame'];?>"></a>
                            <a href="<?php echo "dl.php?ir=".$result[23]['id'];?>"><img class="nocost913"
                                    src="<?php echo "https://playcool.games/hgame/".$result[23]['medianame'];?>"></a>
                        </center>

                    </div>
                </div>
				-->
				
            </div>
			<!--
            <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
			-->
        </div>

        <div class="game-section">
          
			<section class="container-fluid mb-3">
                <div class="row">
                    <div class="col titleContainer">
                        <div class="title">
							<!-- JUST ARRIVED -->
                            <h4><?php echo $justarrived; ?></h4>
                        </div>
                       <!-- <div class="viewmore"><a href="category.php?ct=Popular Games"><?php echo $more; ?></a></div> -->
                    </div>
                </div>
                <div class="row gamerow">
				
				<?php
				$sql1="call htmlgames.catGetGames('action',10);";			
				foreach ($conn->query($sql1) as $row) 
				{ 
				?>
					
					<div class="col"> 
						<a href="dl.php?ir=<?php echo $row['id']; ?>&clickid=<?php echo $clickid;?>&msisdn=<?php echo $msisdn; ?>"><img src="<?php echo "https://playcool.games/hgame/".$row['medianame'];?>"></a>
					</div>
				   
				<?php		
				}  
				?>
                </div>
            </section>
           
			<section class="container-fluid mb-3">
                <div class="row">
                    <div class="col titleContainer">
                        <div class="title">
							<!-- MOST PLAYED -->
                            <h4><?php echo $mostplayed; ?></h4>
                        </div>
                       <!-- <div class="viewmore"><a href="category.php?ct=Popular Games"><?php echo $more; ?></a></div> -->
                    </div>
                </div>
                <div class="row gamerow">
				
				<?php
				$sql1="call htmlgames.catGetGames('Adventure',10);";			
				foreach ($conn->query($sql1) as $row) 
				{ 
				?>
					
					<div class="col"> 
						<a href="dl.php?ir=<?php echo $row['id']; ?>&clickid=<?php echo $clickid;?>&msisdn=<?php echo $msisdn; ?>"><img src="<?php echo "https://playcool.games/hgame/".$row['medianame'];?>"></a>
					</div>
				   
				<?php		
				}  
				?>
                </div>
            </section>
			
			<section class="container-fluid mb-3">
                <div class="row">
                    <div class="col titleContainer">
                        <div class="title">
							<!-- MOST VISITED -->
                            <h4><?php echo $mostvisited; ?></h4>
                        </div>
                       <!-- <div class="viewmore"><a href="category.php?ct=Popular Games"><?php echo $more; ?></a></div> -->
                    </div>
                </div>
                <div class="row gamerow">
				
				<?php
				$sql1="call htmlgames.catGetGames('Racing',10);";			
				foreach ($conn->query($sql1) as $row) 
				{ 
				?>
					
					<div class="col"> 
						<a href="dl.php?ir=<?php echo $row['id']; ?>&clickid=<?php echo $clickid;?>&msisdn=<?php echo $msisdn; ?>"><img src="<?php echo "https://playcool.games/hgame/".$row['medianame'];?>"></a>
					</div>
				   
				<?php		
				}  
				?>
                </div>
            </section>

            <section class="container-fluid mb-3">
                <div class="row">
                    <div class="col titleContainer">
                        <div class="title">
							<!-- POPULAR GAMES -->
                            <h4><?php echo $populargames; ?></h4>
                        </div>
                       <!-- <div class="viewmore"><a href="category.php?ct=Popular Games"><?php echo $more; ?></a></div> -->
                    </div>
                </div>
                <div class="row gamerow">
				
				<?php
				$sql1="call htmlgames.GetGames('11',10);";				
				foreach ($conn->query($sql1) as $row) 
				{ 
				?>
					
					<div class="col"> 
						<a href="dl.php?ir=<?php echo $row['id']; ?>&clickid=<?php echo $clickid;?>&msisdn=<?php echo $msisdn; ?>"><img src="<?php echo "https://playcool.games/hgame/".$row['medianame'];?>"></a>
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