<!DOCTYPE html>
<html lang="en">
  <?php
 
  include('header.php');
  
  //$sql1="call htmlgames.GetGames(0,4);";
  if(isset($_GET['search']))
  {
	  
	?>  
	  
	   
	   
	   <section class="content-section text-light" style="/* background: linear-gradient(to bottom, #e8bf80 10%, #00030b 100%); */">
        <div class="container">
          <header class="header text-left">
            <h2 class="mb-6">You have search for "<?php echo $_GET['search'];?>"</h2>
          </header>
          <div class="row">
	   
	   
	   
	   
	   
	   
	   
                  <!-- item -->
                 
				<?php
					$sql1="select * from htmlgames.html where  isdisplay >= 1 and (productname like '%".$_GET['search']."%' or category like '%".$_GET['search']."%') order by rand()";
					foreach ($conn->query($sql1) as $row) {
				?>
					<div class="col-12 mb-8">
					  <div class="row">
						<div class="col-lg-4 mb-6 mb-lg-0">
						  <div class="card">
							<div class="img__news_wrapper"><img src="<?php echo "https://playcool.games/hgame/".$row['medianame'];?>" alt="News"></div>
							<div class="badges badges-left badges-bottom text-white">
							  <div class="rating_circle-wrapper"> 
								<span class="rating_circle-foreground">
									<span class="rating_circle-number">9.7</span>
								</span> 
								<span class="rating_circle" data-rating-total="9"></span>
							  </div>
							</div>
						  </div>
						</div>
						<div class="col-lg-8">
						  <h4 class="text-uppercase mb-3"><?php echo $row['productname'];?></h4>
						  <div class="mb-3 small text-info">
						   
						  </div>
						  <p><?php echo $row['description'];?></p>
						  <a onclick="myfuction('<?php echo "https://playcool.games/hgame/".$row['filename']; ?>');" class="btn btn-outline-light">Play More</a>
						</div>
					  </div>
					</div>
				
				 
				 
				  <?php
					}
				  ?>
                
                
	  
          
            
          </div>
        </div>
      </section>
      <!-- /.content area -->
	  
	  
	  
<?php	  
  }
  else{
	  
	  include("header2.php");
	  
	
  
  ?>

    <!-- main content -->
    <main class="main-content">

      <!-- content area -->
      <section class="content-section owl-carousel-spotlight carousel-spotlight ig-carousel text-light" style="/* background-image: url(assets/img/bg/bg_shape.png); */padding-top: 40px;padding-bottom: 0px;">
        <div class="container">
          <header class="header">
            <h2> Most Popular Games</h2>
          </header>
          <div class="position-relative">
            <!-- nav tabs -->
            <ul class="spotlight-tabs spotlight-tabs-dark nav nav-tabs border-0 mb-5 position-relative flex-nowrap" id="most_popular_products-carousel" role="tablist">
              <li class="nav-item text-fnwp pg-none relative">
                <a class="nav-link active" id="mp-01-tab" data-toggle="tab" href="#mp-01-c" role="tab" aria-controls="mp-01-c" aria-selected="true">Just Arrived</a>
              </li>
              <li class="nav-item text-fnwp relative">
                <a class="nav-link" id="mp-02-tab" data-toggle="tab" href="#mp-02-c" role="tab" aria-controls="mp-02-c" aria-selected="false">Most Played</a>
              </li>
              <li class="nav-item text-fnwp relative">
                <a class="nav-link" id="mp-03-tab" data-toggle="tab" href="#mp-03-c" role="tab" aria-controls="mp-03-c" aria-selected="false">Most Visited</a>
              </li>
            </ul>
            <!-- /.nav tabs -->
            <!-- tab panes -->
            <div id="color_sel_Carousel-content" class="tab-content fl-scn relative w-100">

              <!-- tab item -->
              <div class="tab-pane fade show active" id="mp-01-c" role="tabpanel" aria-labelledby="mp-01-tab">
                <div class="owl-carousel gs-carousel" data-carousel-margin="30" data-carousel-nav="true" data-carousel-navText="<span class='icon-cl-next pe-7s-angle-left'></span>, <span class='icon-cl-next pe-7s-angle-right'></span>">
                  <!-- item -->
                 
				<?php
				$sql1="call htmlgames.catGetGames1('Just Arrived',6);";
					foreach ($conn->query($sql1) as $row) {
				?>

				
				 <div class="item">
                    <div class="item-cont">
                      <figure class="owl_item_review">
                        <div>
                          <div class="position-relative overflow-hidden">
                            <img class="m-0-auto" src="<?php echo "https://playcool.games/hgame/".$row['medianame'];?>" alt="Games Store">
                            <div class="review_h text-light">
                               <a onclick="myfuction('<?php echo "https://playcool.games/hgame/".$row['filename']; ?>');">
                                <i class="item_icon_cart fas fa-shopping-cart"></i>
                                <span class="item_atc_text">Play Game</span>
                              </a>
                            </div>
                          </div>
                          <div>
                            <h5 class="owl_item_title text-lt"><a href=""><?php echo $row['productname'];?></a></h5>
                            <div class="relative small-1">
                              <span class="owl_item_price">FREE</span>
                              <span class="owl_item_genre">
                                <?php echo strtok($row['category'],  ',');?>
                              </span>
                            </div>
                          </div>
                        </div>
                      </figure>
                    </div>
                  </div>
				 
				  <?php
					}
				  ?>
                
                </div>
              </div>
              <!-- /.tab item -->

              <!-- tab item -->
              <div class="tab-pane fade" id="mp-02-c" role="tabpanel" aria-labelledby="mp-02-tab">
                <div class="owl-carousel gs-carousel" data-carousel-margin="30" data-carousel-nav="true" data-carousel-navText="<span class='icon-cl-next pe-7s-angle-left'></span>, <span class='icon-cl-next pe-7s-angle-right'></span>">
                  <!-- item -->
				  
				  <?php
				$sql1="call htmlgames.catGetGames1('Most Played',6);";
					foreach ($conn->query($sql1) as $row) {
				?>

				
				 <div class="item">
                    <div class="item-cont">
                      <figure class="owl_item_review">
                        <div>
                          <div class="position-relative overflow-hidden">
                            <img class="m-0-auto" src="<?php echo "https://playcool.games/hgame/".$row['medianame'];?>" alt="Games Store">
                            <div class="review_h text-light">
                               <a onclick="myfuction('<?php echo "https://playcool.games/hgame/".$row['filename']; ?>');">
                                <i class="item_icon_cart fas fa-shopping-cart"></i>
                                <span class="item_atc_text">Play Game</span>
                              </a>
                            </div>
                          </div>
                          <div>
                            <h5 class="owl_item_title text-lt"><a href=""><?php echo $row['productname'];?></a></h5>
                            <div class="relative small-1">
                              <span class="owl_item_price">FREE</span>
                              <span class="owl_item_genre">
                                <?php echo strtok($row['category'],  ',');?>
                              </span>
                            </div>
                          </div>
                        </div>
                      </figure>
                    </div>
                  </div>
				 
				  <?php
					}
				  ?>
				  
				  
				  
               
                </div>
              </div>
              <!-- /.tab item -->

              <!-- tab item -->
              <div class="tab-pane fade" id="mp-03-c" role="tabpanel" aria-labelledby="mp-03-tab">
                <div class="owl-carousel gs-carousel" data-carousel-margin="30" data-carousel-nav="true" data-carousel-navText="<span class='icon-cl-next pe-7s-angle-left'></span>, <span class='icon-cl-next pe-7s-angle-right'></span>">
                  <!-- item -->
                 
				  <?php
				$sql1="call htmlgames.catGetGames1('Most Visited',6);";
					foreach ($conn->query($sql1) as $row) {
				?>

				
				 <div class="item">
                    <div class="item-cont">
                      <figure class="owl_item_review">
                        <div>
                          <div class="position-relative overflow-hidden">
                            <img class="m-0-auto" src="<?php echo "https://playcool.games/hgame/".$row['medianame'];?>" alt="Games Store">
                            <div class="review_h text-light">
                              <a href="">
                                <i class="item_icon_cart fas fa-shopping-cart"></i>
                                <span class="item_atc_text">Most Played</span>
                              </a>
                            </div>
                          </div>
                          <div>
                            <h5 class="owl_item_title text-lt"><a href=""><?php echo $row['productname'];?></a></h5>
                            <div class="relative small-1">
                              <span class="owl_item_price">FREE</span>
                              <span class="owl_item_genre">
                                <?php echo strtok($row['category'],  ',');?>
                              </span>
                            </div>
                          </div>
                        </div>
                      </figure>
                    </div>
                  </div>
				 
				  <?php
					}
				  ?>
				 
				 
				 
                </div>
              </div>
              <!-- /.tab item -->

            </div>
            <!-- /.tab panes -->
          </div>
        </div>  
      </section>
      
	  
	  
	  <section class="content-section owl-carousel-spotlight carousel-spotlight ig-carousel text-light" style="/* background-image: url(assets/img/bg/bg_shape.png); */padding-top: 40px;padding-bottom: 0px;">
        <div class="container">
          <header class="header">
            <h2> Categories</h2>
          </header>
          <div class="position-relative">
            <!-- nav tabs -->
            <ul class="spotlight-tabs spotlight-tabs-dark nav nav-tabs border-0 mb-5 position-relative flex-nowrap" id="most_popular_products-carousel" role="tablist">
              <li class="nav-item text-fnwp pg-none relative">
                <a class="nav-link active" id="mp-01-tab" data-toggle="tab" href="#mp-04-c" role="tab" aria-controls="mp-01-c" aria-selected="true">Action</a>
              </li>
              <li class="nav-item text-fnwp relative">
                <a class="nav-link" id="mp-02-tab" data-toggle="tab" href="#mp-05-c" role="tab" aria-controls="mp-02-c" aria-selected="false">Adventure</a>
              </li>
              <li class="nav-item text-fnwp relative">
                <a class="nav-link" id="mp-03-tab" data-toggle="tab" href="#mp-06-c" role="tab" aria-controls="mp-03-c" aria-selected="false">Arcade</a>
              </li>
			  <li class="nav-item text-fnwp relative">
                <a class="nav-link" id="mp-03-tab" data-toggle="tab" href="#mp-07-c" role="tab" aria-controls="mp-03-c" aria-selected="false">Board</a>
              </li>
			  <li class="nav-item text-fnwp relative">
                <a class="nav-link" id="mp-03-tab" data-toggle="tab" href="#mp-08-c" role="tab" aria-controls="mp-03-c" aria-selected="false">Racing</a>
              </li>
			  <li class="nav-item text-fnwp relative">
                <a class="nav-link" id="mp-03-tab" data-toggle="tab" href="#mp-09-c" role="tab" aria-controls="mp-03-c" aria-selected="false">Sports</a>
              </li>
			 </ul>
            <!-- /.nav tabs -->
            <!-- tab panes -->
            <div id="color_sel_Carousel-content" class="tab-content fl-scn relative w-100">

              <!-- tab item -->
              <div class="tab-pane fade show active" id="mp-04-c" role="tabpanel" aria-labelledby="mp-04-tab">
                <div class="owl-carousel gs-carousel" data-carousel-margin="30" data-carousel-nav="true" data-carousel-navText="<span class='icon-cl-next pe-7s-angle-left'></span>, <span class='icon-cl-next pe-7s-angle-right'></span>">
                  <!-- item -->
                 
				<?php
				$sql1="call htmlgames.catGetGames('action',4);";
					foreach ($conn->query($sql1) as $row) {
				?>

				
				 <div class="item">
                    <div class="item-cont">
                      <figure class="owl_item_review">
                        <div>
                          <div class="position-relative overflow-hidden">
                            <img class="m-0-auto" src="<?php echo "https://playcool.games/hgame/".$row['medianame'];?>" alt="Games Store">
                            <div class="review_h text-light">
                              <a onclick="myfuction('<?php echo "https://playcool.games/hgame/".$row['filename']; ?>');">
                                <i class="item_icon_cart fas fa-shopping-cart"></i>
                                <span class="item_atc_text">Play Game</span>
                              </a>
                            </div>
                          </div>
                          <div>
                            <h5 class="owl_item_title text-lt"><a href=""><?php echo $row['productname'];?></a></h5>
                            <div class="relative small-1">
                              <span class="owl_item_price">FREE</span>
                              <span class="owl_item_genre">
                                <?php echo strtok($row['category'],  ',');?>
                              </span>
                            </div>
                          </div>
                        </div>
                      </figure>
                    </div>
                  </div>
				 
				  <?php
					}
				  ?>
                <div class="item">
                    <div class="item-cont">
                      <figure class="owl_item_review">
                        <div>
                          <div class="position-relative overflow-hidden">
                            <img class="m-0-auto" src="assets/img/more.jpg" alt="Games Store">
                            <div class="review_h text-light">
                              <a href="category?cat=action">
                                <i class="item_icon_cart fas fa-shopping-cart"></i>
                                <span class="item_atc_text">More Action Games</span>
                              </a>
                            </div>
                          </div>
                          <div>
                            <h5 class="owl_item_title text-lt"><a href="category.php?cat=action">More Games</a></h5>
                            <div class="relative small-1">
                              <!--<span class="owl_item_price">FREE</span>-->
                              <span class="owl_item_genre">
                               <!-- <?php //echo strtok($row['category'],  ',');?>-->
                              </span>
                            </div>
                          </div>
                        </div>
                      </figure>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.tab item -->

              <!-- tab item -->
              <div class="tab-pane fade" id="mp-05-c" role="tabpanel" aria-labelledby="mp-05-tab">
                <div class="owl-carousel gs-carousel" data-carousel-margin="30" data-carousel-nav="true" data-carousel-navText="<span class='icon-cl-next pe-7s-angle-left'></span>, <span class='icon-cl-next pe-7s-angle-right'></span>">
                  <!-- item -->
				  
				  <?php
				$sql1="call htmlgames.catGetGames('Adventure',4);";
					foreach ($conn->query($sql1) as $row) {
				?>

				
				 <div class="item">
                    <div class="item-cont">
                      <figure class="owl_item_review">
                        <div>
                          <div class="position-relative overflow-hidden">
                            <img class="m-0-auto" src="<?php echo "https://playcool.games/hgame/".$row['medianame'];?>" alt="Games Store">
                            <div class="review_h text-light">
                               <a onclick="myfuction('<?php echo "https://playcool.games/hgame/".$row['filename']; ?>');">
                                <i class="item_icon_cart fas fa-shopping-cart"></i>
                                <span class="item_atc_text">Play Game</span>
                              </a>
                            </div>
                          </div>
                          <div>
                            <h5 class="owl_item_title text-lt"><a href=""><?php echo $row['productname'];?></a></h5>
                            <div class="relative small-1">
                              <span class="owl_item_price">FREE</span>
                              <span class="owl_item_genre">
                                <?php echo strtok($row['category'],  ',');?>
                              </span>
                            </div>
                          </div>
                        </div>
                      </figure>
                    </div>
                  </div>
				 
				  <?php
					}
				  ?>
				  
				  
				  <div class="item">
                    <div class="item-cont">
                      <figure class="owl_item_review">
                        <div>
                          <div class="position-relative overflow-hidden">
                            <img class="m-0-auto" src="assets/img/more.jpg" alt="Games Store">
                            <div class="review_h text-light">
                              <a href="category?cat=Adventure">
                                <i class="item_icon_cart fas fa-shopping-cart"></i>
                                <span class="item_atc_text">More Adventure Games</span>
                              </a>
                            </div>
                          </div>
                          <div>
                            <h5 class="owl_item_title text-lt"><a href="category.php?cat=Adventure">More Game</a></h5>
                            <div class="relative small-1">
                              <!--<span class="owl_item_price">FREE</span>-->
                              <span class="owl_item_genre">
                               <!-- <?php //echo strtok($row['category'],  ',');?>-->
                              </span>
                            </div>
                          </div>
                        </div>
                      </figure>
                    </div>
                  </div>
				  
				  
				  
				  
				  
               
                </div>
              </div>
              <!-- /.tab item -->

              <!-- tab item -->
              <div class="tab-pane fade" id="mp-06-c" role="tabpanel" aria-labelledby="mp-06-tab">
                <div class="owl-carousel gs-carousel" data-carousel-margin="30" data-carousel-nav="true" data-carousel-navText="<span class='icon-cl-next pe-7s-angle-left'></span>, <span class='icon-cl-next pe-7s-angle-right'></span>">
                  <!-- item -->
                 
				  <?php
				$sql1="call htmlgames.catGetGames('Arcade',4);";
					foreach ($conn->query($sql1) as $row) {
				?>

				
				 <div class="item">
                    <div class="item-cont">
                      <figure class="owl_item_review">
                        <div>
                          <div class="position-relative overflow-hidden">
                            <img class="m-0-auto" src="<?php echo "https://playcool.games/hgame/".$row['medianame'];?>" alt="Games Store">
                            <div class="review_h text-light">
                              <a href="">
                                <i class="item_icon_cart fas fa-shopping-cart"></i>
                                <span class="item_atc_text">Most Played</span>
                              </a>
                            </div>
                          </div>
                          <div>
                            <h5 class="owl_item_title text-lt"><a href=""><?php echo $row['productname'];?></a></h5>
                            <div class="relative small-1">
                              <span class="owl_item_price">FREE</span>
                              <span class="owl_item_genre">
                                <?php echo strtok($row['category'],  ',');?>
                              </span>
                            </div>
                          </div>
                        </div>
                      </figure>
                    </div>
                  </div>
				 
				  <?php
					}
				  ?>
				 
				 <div class="item">
                    <div class="item-cont">
                      <figure class="owl_item_review">
                        <div>
                          <div class="position-relative overflow-hidden">
                            <img class="m-0-auto" src="assets/img/more.jpg" alt="Games Store">
                            <div class="review_h text-light">
                              <a href="category?cat=Arcade">
                                <i class="item_icon_cart fas fa-shopping-cart"></i>
                                <span class="item_atc_text">More Arcade Games</span>
                              </a>
                            </div>
                          </div>
                          <div>
                            <h5 class="owl_item_title text-lt"><a href="category.php?cat=Arcade">More Game</a></h5>
                            <div class="relative small-1">
                              <!--<span class="owl_item_price">FREE</span>-->
                              <span class="owl_item_genre">
                               <!-- <?php //echo strtok($row['category'],  ',');?>-->
                              </span>
                            </div>
                          </div>
                        </div>
                      </figure>
                    </div>
                  </div>
				 
				 
				 
				 
				 
                </div>
              </div>
              <!-- /.tab item -->


			
              <!-- tab item -->
              <div class="tab-pane fade " id="mp-07-c" role="tabpanel" aria-labelledby="mp-07-tab">
                <div class="owl-carousel gs-carousel" data-carousel-margin="30" data-carousel-nav="true" data-carousel-navText="<span class='icon-cl-next pe-7s-angle-left'></span>, <span class='icon-cl-next pe-7s-angle-right'></span>">
                  <!-- item -->
                 
				<?php
				$sql1="call htmlgames.catGetGames('Board',4);";
					foreach ($conn->query($sql1) as $row) {
				?>

				
				 <div class="item">
                    <div class="item-cont">
                      <figure class="owl_item_review">
                        <div>
                          <div class="position-relative overflow-hidden">
                            <img class="m-0-auto" src="<?php echo "https://playcool.games/hgame/".$row['medianame'];?>" alt="Games Store">
                            <div class="review_h text-light">
                               <a onclick="myfuction('<?php echo "https://playcool.games/hgame/".$row['filename']; ?>');">
                                <i class="item_icon_cart fas fa-shopping-cart"></i>
                                <span class="item_atc_text">Play Game</span>
                              </a>
                            </div>
                          </div>
                          <div>
                            <h5 class="owl_item_title text-lt"><a href=""><?php echo $row['productname'];?></a></h5>
                            <div class="relative small-1">
                              <span class="owl_item_price">FREE</span>
                              <span class="owl_item_genre">
                                <?php echo strtok($row['category'],  ',');?>
                              </span>
                            </div>
                          </div>
                        </div>
                      </figure>
                    </div>
                  </div>
				 
				  <?php
					}
					
					
					
				  ?>
				  
				   <div class="item">
                    <div class="item-cont">
                      <figure class="owl_item_review">
                        <div>
                          <div class="position-relative overflow-hidden">
                            <img class="m-0-auto" src="assets/img/more.jpg" alt="Games Store">
                            <div class="review_h text-light">
                              <a href="category?cat=Board">
                                <i class="item_icon_cart fas fa-shopping-cart"></i>
                                <span class="item_atc_text">More Board Games</span>
                              </a>
                            </div>
                          </div>
                          <div>
                            <h5 class="owl_item_title text-lt"><a href="category.php?cat=Board">More Game</a></h5>
                            <div class="relative small-1">
                              <!--<span class="owl_item_price">FREE</span>-->
                              <span class="owl_item_genre">
                               <!-- <?php //echo strtok($row['category'],  ',');?>-->
                              </span>
                            </div>
                          </div>
                        </div>
                      </figure>
                    </div>
                  </div>
				  
				  
				  
				  
				  
                
                </div>
              </div>
              <!-- /.tab item -->

              <!-- tab item -->
              <div class="tab-pane fade" id="mp-08-c" role="tabpanel" aria-labelledby="mp-08-tab">
                <div class="owl-carousel gs-carousel" data-carousel-margin="30" data-carousel-nav="true" data-carousel-navText="<span class='icon-cl-next pe-7s-angle-left'></span>, <span class='icon-cl-next pe-7s-angle-right'></span>">
                  <!-- item -->
				  
				  <?php
				$sql1="call htmlgames.catGetGames('Racing',4);";
					foreach ($conn->query($sql1) as $row) {
				?>

				
				 <div class="item">
                    <div class="item-cont">
                      <figure class="owl_item_review">
                        <div>
                          <div class="position-relative overflow-hidden">
                            <img class="m-0-auto" src="<?php echo "https://playcool.games/hgame/".$row['medianame'];?>" alt="Games Store">
                            <div class="review_h text-light">
                               <a onclick="myfuction('<?php echo "https://playcool.games/hgame/".$row['filename']; ?>');">
                                <i class="item_icon_cart fas fa-shopping-cart"></i>
                                <span class="item_atc_text">Play Game</span>
                              </a>
                            </div>
                          </div>
                          <div>
                            <h5 class="owl_item_title text-lt"><a href=""><?php echo $row['productname'];?></a></h5>
                            <div class="relative small-1">
                              <span class="owl_item_price">FREE</span>
                              <span class="owl_item_genre">
                                <?php echo strtok($row['category'],  ',');?>
                              </span>
                            </div>
                          </div>
                        </div>
                      </figure>
                    </div>
                  </div>
				 
				  <?php
					}
				  ?>
				  
				  <div class="item">
                    <div class="item-cont">
                      <figure class="owl_item_review">
                        <div>
                          <div class="position-relative overflow-hidden">
                            <img class="m-0-auto" src="assets/img/more.jpg" alt="Games Store">
                            <div class="review_h text-light">
                              <a href="category?cat=Racing">
                                <i class="item_icon_cart fas fa-shopping-cart"></i>
                                <span class="item_atc_text">More Racing Games</span>
                              </a>
                            </div>
                          </div>
                          <div>
                            <h5 class="owl_item_title text-lt"><a href="category.php?cat=Racing">More Game</a></h5>
                            <div class="relative small-1">
                              <!--<span class="owl_item_price">FREE</span>-->
                              <span class="owl_item_genre">
                               <!-- <?php //echo strtok($row['category'],  ',');?>-->
                              </span>
                            </div>
                          </div>
                        </div>
                      </figure>
                    </div>
                  </div>
				  
               
                </div>
              </div>
              <!-- /.tab item -->

              <!-- tab item -->
              <div class="tab-pane fade" id="mp-09-c" role="tabpanel" aria-labelledby="mp-09-tab">
                <div class="owl-carousel gs-carousel" data-carousel-margin="30" data-carousel-nav="true" data-carousel-navText="<span class='icon-cl-next pe-7s-angle-left'></span>, <span class='icon-cl-next pe-7s-angle-right'></span>">
                  <!-- item -->
                 
				  <?php
				$sql1="call htmlgames.catGetGames('Sports',4);";
					foreach ($conn->query($sql1) as $row) {
				?>

				
				 <div class="item">
                    <div class="item-cont">
                      <figure class="owl_item_review">
                        <div>
                          <div class="position-relative overflow-hidden">
                            <img class="m-0-auto" src="<?php echo "https://playcool.games/hgame/".$row['medianame'];?>" alt="Games Store">
                            <div class="review_h text-light">
                              <a href="">
                                <i class="item_icon_cart fas fa-shopping-cart"></i>
                                <span class="item_atc_text">Most Played</span>
                              </a>
                            </div>
                          </div>
                          <div>
                            <h5 class="owl_item_title text-lt"><a href=""><?php echo $row['productname'];?></a></h5>
                            <div class="relative small-1">
                              <span class="owl_item_price">FREE</span>
                              <span class="owl_item_genre">
                                <?php echo strtok($row['category'],  ',');?>
                              </span>
                            </div>
                          </div>
                        </div>
                      </figure>
                    </div>
                  </div>
				 
				  <?php
					}
				  ?>
				 
				 <div class="item">
                    <div class="item-cont">
                      <figure class="owl_item_review">
                        <div>
                          <div class="position-relative overflow-hidden">
                            <img class="m-0-auto" src="assets/img/more.jpg" alt="Games Store">
                            <div class="review_h text-light">
                              <a href="category?cat=Sports">
                                <i class="item_icon_cart fas fa-shopping-cart"></i>
                                <span class="item_atc_text">More Sports Games</span>
                              </a>
                            </div>
                          </div>
                          <div>
                            <h5 class="owl_item_title text-lt"><a href="category.php?cat=Sports">More Game</a></h5>
                            <div class="relative small-1">
                              <!--<span class="owl_item_price">FREE</span>-->
                              <span class="owl_item_genre">
                               <!-- <?php //echo strtok($row['category'],  ',');?>-->
                              </span>
                            </div>
                          </div>
                        </div>
                      </figure>
                    </div>
                  </div>
				 
				 
				 
                </div>
              </div>
              <!-- /.tab item -->





            </div>
            <!-- /.tab panes -->
          </div>
        </div>  
      </section>
    
	  
	  
	  
	  
	  <!-- /.content area -->

      <!-- content area -->
       <!-- /.content area -->

      <!-- content area style="background: linear-gradient(to bottom, #e8bf80 10%, #00030b 100%); background: linear-gradient(to bottom, #111931 0%, #0f131e 100%)"-->
      <section class="content-section text-light" style="/* background: linear-gradient(to bottom, #e8bf80 10%, #00030b 100%); */">
        <div class="container">
          <header class="header text-left">
            <h2 class="mb-6">Latest Games</h2>
          </header>
          <div class="row">
            <!-- post -->
            <div class="col-12 mb-8">
              <div class="row">
                <div class="col-lg-4 mb-6 mb-lg-0">
                  <div class="card">
                    <div class="img__news_wrapper"><img src="https://playcool.games/hgame/blackjack-html5-casino-game/thumbs/2.jpg" alt="News"></div>
                    <div class="badges badges-left badges-bottom text-white">
                      <div class="rating_circle-wrapper"> 
                        <span class="rating_circle-foreground">
                            <span class="rating_circle-number">9.7</span>
                        </span> 
                        <span class="rating_circle" data-rating-total="9"></span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-8">
                  <h4 class="text-uppercase mb-3">Black Jack</h4>
                  <div class="mb-3 small text-info">
                   
                  </div>
                  <p>Blackjack is one of the most popular casino games out there. In our version, we have embedded 3D cards and chips and optimized the performance of the product to unmatched levels, especially for mobile devices. Aiming for 21 has never been such fun! Text, narration and background sound are available in various languages and forms.</p>
                  <a onclick="myfuction('https://playcool.games/hgame/blackjack-html5-casino-game/HTML5/');" class="btn btn-outline-light">Play More</a>
                </div>
              </div>
            </div>
            <!-- /.post -->

            <!-- post -->
            <div class="col-12 mb-8">
              <div class="row">
                <div class="col-lg-4 mb-6 mb-lg-0">
                  <div class="card">
                    <div class="img__news_wrapper"><img src="https://playcool.games/hgame/hockey-shootout-html5-sport-game/thumbs/shot1.jpg" alt="News"></div>
                    <div class="badges badges-left badges-bottom text-white">
                      <div class="rating_circle-wrapper"> 
                        <span class="rating_circle-foreground">
                            <span class="rating_circle-number">9.3</span>
                        </span> 
                        <span class="rating_circle" data-rating-total="9"></span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-8">
					
                  <h4 class="text-uppercase mb-3">Hockey Shootout</h4>
                  <div class="mb-3 small text-info">
                    
                  </div>
                  <p>Shootouts are a competition between the goalies and three designated shooters on each team. The team that scores the most goals in a shootout wins the game</p>
                  <a onclick="myfuction('https://playcool.games/hgame/hockey-shootout-html5-sport-game/HTML5/');" class="btn btn-outline-light">Play More</a>
                </div>
              </div>
            </div>
            <!-- /.post -->

            <!-- post -->
            <div class="col-12">
              <div class="row">
                <div class="col-lg-4 mb-6 mb-lg-0">
                  <div class="card">
                    <div class="img__news_wrapper"><img src="https://playcool.games/hgame/real-tennis-html5-sport-game/thumbs/screen_0.jpg" alt="News"></div>
                    <div class="badges badges-left badges-bottom text-white">
                      <div class="rating_circle-wrapper"> 
                        <span class="rating_circle-foreground">
                            <span class="rating_circle-number">9.7</span>
                        </span>
                        <span class="rating_circle" data-rating-total="9"></span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-8">
                  <h4 class="text-uppercase mb-3">Real Tennis</h4>
                  <div class="mb-3 small text-info">
                    
                  </div>
                  <p>Real Tennis is a sports game where you have to prove your worth professionally on the tennis court. Your opponents will get stronger with each passing match, but so will you! Do you have what it takes to win the Wimbledon Tournament?</p>
                  <a onclick="myfuction('https://playcool.games/hgame/real-tennis-html5-sport-game/HTML5/');" class="btn btn-outline-light">Play More</a>
                </div>
              </div>
            </div>
            <!-- /.post -->
			
			
			 <!-- post 
            <div class="col-12">
              <div class="row">
                <div class="col-lg-4 mb-6 mb-lg-0">
                  <div class="card">
                    <div class="img__news_wrapper"><img src="assets/img/cricket.jpg" alt="News"></div>
                    <div class="badges badges-left badges-bottom text-white">
                      <div class="rating_circle-wrapper"> 
                        <span class="rating_circle-foreground">
                            <span class="rating_circle-number">9.1</span>
                        </span>
                        <span class="rating_circle" data-rating-total="9"></span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-8">
                  <h4 class="text-uppercase mb-3">Cricket batter challenge</h4>
                  <div class="mb-3 small text-info">
                    
                  </div>
                  <p>Test your batting skills in this ultimate Cricket Batter Challenge game. As the bowler throws the ball, swing at just the right time to hit and score.</p>
                  <a onclick="myfuction('https://playcool.games/hgame/cricket-batter-challenge-html5-sport-game/HTML5/');" class="btn btn-outline-light">Play More</a>
                </div>
              </div>
            </div>
            <!-- /.post -->
			
			
			
			
			
          </div>
        </div>
      </section>
      <!-- /.content area -->
<?php
  }
  ?>
  
   <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3430328079998834"
     crossorigin="anonymous"></script>
      <!-- banner -->
      <div class="content-section pt-0">
        <div class="container">
          <a onclick="myfuction('https://playcool.games/hgame/11.Pool%208%20Ball/HTML5/');" class="d-block">
            <div class="position-relative br-n bs-cont bp-c" style="background-image: url('assets/img/8pool.jpg');">
              <img src="assets/img/8pool.jpg" alt="banner" class="invisible"/>
            </div>
          </a>
        </div>
      </div>
      <!-- /.banner -->

    </main>

    <?php
	include("footer.php");
	?>

    <!-- jQuery -->
    <script src="assets/js/jquery.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- User JS -->
    <script src="assets/js/scripts.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js" id="_mainJS" data-plugins="load"></script>
  </body>
</html>

<div class="mlctr-popup" id="MlctrClose" style="display :none">
		<div class="mlctr-popup-stripe">
			<div class="mlctr-popup-content">
        <div class="mlctr-form-box">
          <iframe src="" id="MlctrClose1" name="MlctrClose1" width="100%" height="100%"></iframe>
          <a href="" class="mlctr-close"><img class="mlctr-close" src="https://www.mlcdn.eu/data/hannah/Close.jpg"></a>
        </div>
			</div>
		</div>
</div>

<script>
function myfuction (url)
{
//alert(url); 
document.getElementById('MlctrClose1').src = url;
document.getElementById('MlctrClose').style.display = 'block'; 
}

</script>


<style>

@import url('https://fonts.googleapis.com/css2?family=Quicksand&family=Rajdhani:wght@400;600;700&display=swap');

@-ms-viewport {
	width: device-width;
}
body {
	margin: 0;
	padding: 0;
}

.mlctr-popup {
	/* master mandatory container, required by Mailocator */
	/* z-index must be higher in DOM structure */
	z-index: 109999999;
  font-family: CircularPro, 'Quicksand', Helvetica, Arial, sans-serif;
  font-weight: 400;
}
.mlctr-popup .mlctr-popup-stripe {
	/* customize stripe */
	text-align: center;
	min-height: calc(55px + 2.5vw);
  -webkit-transition: height ease-out 0.2s;
  -moz-transition: height ease-out 0.2s;
	transition: height ease-out 0.2s;
	/* stripe defaults */
	position: fixed;
	bottom: 0px;
	width: 100%;
  z-index: 109999999;
  height: 100%;
  background-color: RGBA(0,0,0,0.8);
  padding: 0;
  border: 0;
  box-sizing: border-box;
}
/* Close via CSS;alternative to mailocator.action.do('close') */
.mlctr-popup:target {
	display: none;
	visibility: hidden;
}
/* customizable popup content... */
.mlctr-popup-content {
  position: relative;
	width: 100%;
  height: 100%;
	margin: 0;
  padding: 0px;
	text-align: center;
	color: #000000;
	box-sizing: border-box;
}
.mlctr-content-row {
  position: relative;
	width: 100%;
  margin: 0;
}
.mlctr-headline {
  position: relative;
	width: 100%;
  padding: 7% 0 0 0;
	height: 290px;
}
.mlctr-content {
	height: 122px;
}
.mlctr-form-box {
	position: absolute;
	top: 50%;
	left: 50%;
	width: 100%;
  //max-width: 880px;
  //min-width: 500px;
  height: 90%;
  background: transparent;
  background-size: 100% auto;
  //background-color: #ffffff;
  transform: translate(-50%, -50%);
  -webkit-transform: translate(-50%, -50%) scale(1.0, 1.0);
  -webkit-font-smoothing: subpixel-antialiased;
  border: 0;
	margin: 0px auto;
  padding: 0;
	-webkit-box-shadow: 0px 4px 16px rgba(0,0,0,0.2);
	-moz-box-shadow: 0px 4px 16px rgba(0,0,0,0.2);
	box-shadow: 0px 4px 16px rgba(0,0,0,0.2);
	text-align: center;
}
.mlctr-popup-content * {
	box-sizing: border-box;
}
.mlctr-popup-content a {
	color: #ffffff;
}
.mlctr-popup-content form {
	width: 100%;
	border: none;
}
.mlctr-popup-content h1 {
	width: 100%;
  font-family: ProtraktCZ, 'Rajdhani', Helvetica, Arial, sans-serif;
  font-size: 128px;
  line-height: 110px;
  font-weight: 700;
  text-align: left;
  color: #fff;
  padding: 0 8%;
  margin: 0;
  text-shadow: 0px 1px 12px #000000;
	box-sizing: border-box;
}
.mlctr-popup-content h1 span {
  font-size: 0.65em;
}
.mlctr-popup-content .mlctr-title {
  max-width: calc(50px + 16vw);
  margin: 15px 0 0 0;
}
.mlctr-popup-content h2 {
  position: relative;
	width: 100%;
  font-family: ProtraktCZ, 'Rajdhani', Helvetica, Arial, sans-serif;
  text-align: left;
  color: #fff;
  padding: 0 8%;
  font-size: 50px;
  line-height: 52px;
  font-weight: 600;
  text-shadow: 0px 1px 8px #000000;
  margin: 0;
	box-sizing: border-box;
}
.mlctr-popup-content p {
	width: 100%;
  position: relative;
  text-align: left;
  color: #fff;
  padding: 0 35% 0 8%;
  font-size: 19px;
  line-height: 24px;
  font-weight: 400;
  margin: 1% 0 0 0;
	box-sizing: border-box;
}
.mlctr-popup-content p.mlctr-star:before {
  position: absolute;
	content: '*';
  color: #fff;
  border: 0;
  font-size: 24px;
  font-weight: 400;
  top: 2%;
  left: 6%;
}
.mlctr-message-error {
  display: block;
  min-height: 14px;
  font-size: 17px;
  line-height: 16px;
  margin: 2.5% 0 0 0;
  padding: 0 8%;
  font-weight: 700;
  text-align: left;
  text-shadow: 0px 1px 8px #000000;
  color: #ff6767;
}
.mlctr-verification-alert {
  display: none;
}
.mlctr-verification-alert.display {
  display: block;
}
.mlctr-popup-content input[type=text] {
	height: 54px;
  width: 55%;
	font-size: 18px;
	color: rgba(0, 0, 0, 1);
	padding: 4px 3%;
	margin: 0;
  font-family: CircularPro, 'Quicksand', Helvetica, Arial, sans-serif;
	background-color: #ffffff;
	border: 1px solid #cacaca;
	-webkit-border-radius: 0px;
	-moz-border-radius: 0px;
	border-radius: 0px;
  -webkit-transition: border ease-in-out .15s;
  -moz-transition: border ease-in-out .15s;
  transition: border ease-in-out .15s;
  text-align: left;
	box-sizing: border-box;
	display: inline-block;
  outline: 0;
}
.mlctr-popup-content input[type="text"]:focus {
	border: 1px solid #e60000;
  outline: 0;
}
.mlctr-popup-content input[type="submit"], .mlctr-popup-content input[type="button"] {
	height: 54px;
  width: 30%;
  font-size: 22px;
  line-height: 24px;
  padding: 0 0 3px 0;
  margin: 0 0 0 1.3%;
  background-color: #e60000;
	border: 0;
	-webkit-border-radius: 2px;
	-moz-border-radius: 2px;
	border-radius: 2px;
  color: #ffffff;
	-webkit-transition: background-color .25s;
	-moz-transition: background-color .25s;
	transition: background-color .25s;
  cursor: pointer;
  font-family: CircularPro, 'Quicksand', Helvetica, Arial, sans-serif;
  font-weight: 600;
  box-sizing: border-box;
	display: inline-block;
  outline: 0;
}
.mlctr-popup-content input[type="button"] {
  padding: 0;
  margin: 0 56.8% 0 0;
}
.mlctr-popup-content input[type="submit"]:active, .mlctr-popup-content input[type="button"]:active {
  font-size: 21.5px;
  line-height: 25px;
	-webkit-box-shadow: inset 2px 2px 6px rgba(0,0,0,0.65);
	-moz-box-shadow: inset 2px 2px 6px rgba(0,0,0,0.65);
	box-shadow: inset 2px 2px 6px rgba(0,0,0,0.65);
  outline: 0;
}
.mlctr-privacy {
  display: block;
  background: none;
  margin: 0;
  height: auto;
}
a.mlctr-close {
  display: block;
  position: fixed;
  right: 0px;
  top: 0px;
	width: 6.5%;
	max-width: 54px;
  background: none;
  opacity: 0.8;
  cursor: pointer;
}
img.mlctr-close {
	width: 100%;
}
.mlctr-close:hover {
  opacity: 1;
}
</style>