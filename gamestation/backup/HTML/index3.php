<!DOCTYPE html>
<html lang="en">
  <?php
  
  include('header.php');
  
  $sql1="call htmlgames.GetGames(0,4);";
  ?>

    <!-- main content -->
    <main class="main-content">

      <!-- content area -->
      <section class="content-section owl-carousel-spotlight carousel-spotlight ig-carousel text-light" style="background-image: url(assets/img/bg/bg_shape.png);">
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
				$sql1="call htmlgames.GetGames(0,6);";
					foreach ($conn->query($sql1) as $row) {
				?>

				
				 <div class="item">
                    <div class="item-cont">
                      <figure class="owl_item_review">
                        <div>
                          <div class="position-relative overflow-hidden">
                            <img class="m-0-auto" src="<?php echo "https://gamebar.mobi/hgame/".$row['medianame'];?>" alt="Games Store">
                            <div class="review_h text-light">
                              <a href="<?php echo "https://gamebar.mobi/hgame/".$row['filename']; ?>">
                                <i class="item_icon_cart fas fa-shopping-cart"></i>
                                <span class="item_atc_text">Play Game</span>
                              </a>
                            </div>
                          </div>
                          <div>
                            <h5 class="owl_item_title text-lt"><a href=""><?php echo $row['productname'];?></a></h5>
                            <div class="relative small-1">
                              <span class="owl_item_price">€0.00</span>
                              <span class="owl_item_genre">
                                <?php echo $row['category'];?>
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
				$sql1="call htmlgames.GetGames(0,6);";
					foreach ($conn->query($sql1) as $row) {
				?>

				
				 <div class="item">
                    <div class="item-cont">
                      <figure class="owl_item_review">
                        <div>
                          <div class="position-relative overflow-hidden">
                            <img class="m-0-auto" src="<?php echo "https://gamebar.mobi/hgame/".$row['medianame'];?>" alt="Games Store">
                            <div class="review_h text-light">
                              <a href="<?php echo "https://gamebar.mobi/hgame/".$row['filename']; ?>">
                                <i class="item_icon_cart fas fa-shopping-cart"></i>
                                <span class="item_atc_text">Play Game</span>
                              </a>
                            </div>
                          </div>
                          <div>
                            <h5 class="owl_item_title text-lt"><a href=""><?php echo $row['productname'];?></a></h5>
                            <div class="relative small-1">
                              <span class="owl_item_price">€0.00</span>
                              <span class="owl_item_genre">
                                <?php echo $row['category'];?>
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
				$sql1="call htmlgames.GetGames(0,5);";
					foreach ($conn->query($sql1) as $row) {
				?>

				
				 <div class="item">
                    <div class="item-cont">
                      <figure class="owl_item_review">
                        <div>
                          <div class="position-relative overflow-hidden">
                            <img class="m-0-auto" src="<?php echo "https://gamebar.mobi/hgame/".$row['medianame'];?>" alt="Games Store">
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
                              <span class="owl_item_price">€0.00</span>
                              <span class="owl_item_genre">
                                <?php echo $row['category'];?>
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
      <!-- /.content area -->

      <!-- content area -->
      <section class="section gs_features">
        <div class="row no-gutters">
          <div class="col-xl-6 col-12 py-8 px-4 px-sm-8 py-md-9 px-md-9 br-n bs-c effect-wrapper effect-grayscale position-relative hover" style="background-image: url('https://gamebar.mobi/hgame//rummy-html5-card-games/thumbs/1.jpg');">
            <div class="overlay bg-dark_A-90 d-md-none"></div>
            <div class="row h-100 align-items-center content">
              <div class="col-12 col-md-8 ml-auto text-light text-md-right">
                <!--<small class="d-block text-uppercase fw-600 ls-3">New</small>
                <h2 class="mb-4">An Incredible Journey</h2>
                <span class="d-block text-uppercase ls-3 mb-6">Only On Wicodus</span>-->
                <a href="https://gamebar.mobi/hgame/rummy-html5-card-games/HTML5/" class="btn btn-lg btn-outline-light btn-round">Play Now</a>
              </div>
            </div>
            <figure class="d-none d-md-block effect-layla effect-layla-light"></figure>
          </div>
          <div class="col-xl-6 col-12 py-8 px-4 px-sm-8 py-md-9 px-md-9 br-n bs-c" style="background-image: url('https://gamebar.mobi/hgame/master-chess-html5-board-game/thumbs/master_chess_banner.jpg');" data-overlay="7">
            <div class="row align-items-center h-100">
              <div class="col-sm-6 col-md-4 mb-5 mb-md-0">
                <figure class="position-relative my-0">
                  <div style="background-image: url('https://gamebar.mobi/hgame/master-chess-html5-board-game/thumbs/thumbs0.jpg');" class="main-fb-product bs-c bp-c br-n">
                    <div class="position-absolute t-0 r-0 px-4 py-1 bg-danger text-white text-uppercase fw-600"></div>
                    <div class="position-absolute b-0 w-100 text-center">
                     <!-- <div data-countdown="2023/01/25 12:34:56" class="countdown-coupon bg-dark_A-50 py-3 text-light fw-700 timer"></div>-->
                    </div>
                  </div>
                </figure>
              </div>
              <div class="col-md-8 text-light">
                <!--<h2 class="text-light mb-4">Master</h2>
                <p class="mb-7">Chess</p>-->
                <a href="https://gamebar.mobi/hgame/master-chess-html5-board-game/HTML5/" class="btn btn-lg btn-danger btn-round"><i class="fa fa-shopping-cart mr-5" aria-hidden="true"></i>Play Now</a>
              </div>
            </div>
          </div>
        </div>
        <div class="row no-gutters">
          <div class="col-xl-6 py-8 px-4 px-sm-8 py-md-9 px-md-9 bs-c" style="background-image: url('https://gamebar.mobi/hgame/ultimate-tic-tac-toe-html5-game/thumbs/200x200.jpg');" data-overlay="7">
            <div class="row align-items-center h-100">
              <div class="col-sm-6 col-md-4 order-md-2 mb-6 mb-md-0">
                <figure class="position-relative my-0">
                  <div style="background-image: url('https://gamebar.mobi/hgame/ultimate-tic-tac-toe-html5-game/thumbs/1.jpg');" class="main-fb-product bs-c bp-c br-n">
                   <!-- <div class="position-absolute t-0 r-0 px-4 py-1 bg-danger text-white text-uppercase fw-600">-72%</div>-->
                    <div class="position-absolute b-0 w-100 text-center">
                      <!--<div data-countdown="2020/02/11 12:34:56" class="countdown-coupon bg-dark_A-50 py-3 text-light fw-700 timer"></div>-->
                    </div>
                  </div>
                </figure>
              </div>
              <div class="col-md-8 order-md-1 text-light text-md-right">
               <!-- <h2 class="mb-4">Explore vestibulum</h2>
                <p class="mb-7">Mauris euismod aliquam erat, a vestibulum tortor bibendum sit amet. Duis vitae augue non dolor fermentum faucibus non quis justo. Sed consequat accumsan turpis et semper. Nulla blandit blandit est, nec tincidunt neque sollicitudin vitae.</p>-->
                <a href="https://gamebar.mobi/hgame/ultimate-tic-tac-toe-html5-game/HTML5/" class="btn btn-lg btn-danger btn-round"><i class="fa fa-shopping-cart mr-5" aria-hidden="true"></i>Play Now</a>
              </div>
            </div>
          </div>
          <div class="col-xl-6 col-sm-12 py-8 px-4 px-sm-8 py-md-9 px-md-9 bs-c effect-wrapper effect-grayscale position-relative hover" style="background-image: url('https://gamebar.mobi/hgame/wheel-of-fortune-html5-casino-game/thumbs/ctl-wheel-fortune-2.jpg');">
            <div class="overlay bg-dark_A-90 d-md-none"></div>
            <div class="row h-100 align-items-center content">
              <div class="col-12 col-md-6 mr-auto text-light text-left">
              <!--  <small class="d-block text-uppercase fw-600 ls-3">Action</small>
                <h2 class="mb-4">Sed consequat</h2>
                <span class="d-block lead-1 text-uppercase ls-3 mb-7">An amazing experience from beginning to end.</span>-->
                <a href="https://gamebar.mobi/hgame/wheel-of-fortune-html5-casino-game/HTML5/" class="btn btn-lg btn-outline-light btn-round">Play Now</a>
              </div>
            </div>
            <figure class="d-none d-md-block effect-layla effect-layla-light"></figure>
          </div>
        </div>
      </section>
      <!-- /.content area -->

      <!-- content area style="background: linear-gradient(to bottom, #e8bf80 10%, #00030b 100%); background: linear-gradient(to bottom, #111931 0%, #0f131e 100%)"-->
      <section class="content-section text-light" style="background: linear-gradient(to bottom, #e8bf80 10%, #00030b 100%);">
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
                    <div class="img__news_wrapper"><img src="https://gamebar.mobi/hgame/blackjack-html5-casino-game/thumbs/2.jpg" alt="News"></div>
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
                   <br><br>
                  </div>
                  <p></p>
                  <a href="https://gamebar.mobi/hgame/blackjack-html5-casino-game/HTML5/" class="btn btn-outline-light">Play More</a>
                </div>
              </div>
            </div>
            <!-- /.post -->

            <!-- post -->
            <div class="col-12 mb-8">
              <div class="row">
                <div class="col-lg-4 mb-6 mb-lg-0">
                  <div class="card">
                    <div class="img__news_wrapper"><img src="https://gamebar.mobi/hgame/hockey-shootout-html5-sport-game/thumbs/shot1.jpg" alt="News"></div>
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
                  <p></p><br><br>
                  <a href="https://gamebar.mobi/hgame/hockey-shootout-html5-sport-game/HTML5/" class="btn btn-outline-light">Play More</a>
                </div>
              </div>
            </div>
            <!-- /.post -->

            <!-- post -->
            <div class="col-12">
              <div class="row">
                <div class="col-lg-4 mb-6 mb-lg-0">
                  <div class="card">
                    <div class="img__news_wrapper"><img src="https://gamebar.mobi/hgame/real-tennis-html5-sport-game/thumbs/screen_0.jpg" alt="News"></div>
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
                  <p></p>
                  <a href="https://gamebar.mobi/hgame/real-tennis-html5-sport-game/HTML5/" class="btn btn-outline-light">Play More</a>
                </div>
              </div>
            </div>
            <!-- /.post -->
          </div>
        </div>
      </section>
      <!-- /.content area -->

      <!-- banner -->
      <div class="content-section pt-0">
        <div class="container">
          <a href="#" class="d-block">
            <div class="position-relative br-n bs-cont bp-c" style="background-image: url('assets/img/content/banner_01.jpg');">
              <img src="assets/img/content/banner_01.jpg" alt="banner" class="invisible"/>
            </div>
          </a>
        </div>
      </div>
      <!-- /.banner -->

    </main>

    <!-- footer--> 
    <footer class="footer footer-dark bg-dark py-9">
      <div class="container">
          <div class="row gutters-y">
              <div class="col-6 col-lg-3">
                <a href="#" class="logo d-block mb-4"><img src="assets/img/logo-gaming.png" alt="Wicodus" class="logo-dark"></a>
                <p>Wicodus is a online store where you can find digital goods at the best prices.</p>
                <div class="social-buttons">
                  <a class="social-twitter" href="#"><i class="fab fa-twitter"></i></a>
                  <a class="social-dribbble" href="#"><i class="fab fa-dribbble"></i></a>
                  <a class="social-instagram" href="#"><i class="fab fa-instagram"></i></a>
                </div>
              </div>

              <div class="col-6 col-lg-2">
                <h6 class="text-uppercase fw-600 mb-4">About</h6>
                <div class="nav flex-column">
                  <a class="nav-link" href="about.html">Our team</a>
                  <a class="nav-link" href="about.html">Careers</a>
                  <a class="nav-link" href="about.html">Cookie Policy</a>
                  <a class="nav-link" href="about.html">Privacy Policy</a>
                  
                </div>
              </div>

              <div class="col-6 col-lg-2">
                <h6 class="text-uppercase fw-600 mb-4">Community</h6>
                <div class="nav flex-column">
                  <a class="nav-link" href="news.html">Forum</a>
                  <a class="nav-link" href="news.html">Blog</a>
                  <a class="nav-link" href="news.html">News</a>
                  <a class="nav-link" href="news.html">Team</a>
                </div>
              </div>

              <div class="col-6 col-lg-2">
                <h6 class="text-uppercase fw-600 mb-4">Help</h6>
                <div class="nav flex-column">
                  <a class="nav-link" href="contact.html">Contact Us</a>
                  <a class="nav-link" href="contact.html">Support</a>
                  <a class="nav-link" href="contact.html">Terms & conditions</a>
                  <a class="nav-link" href="contact.html">Refund policy</a>
                </div>
              </div>
              
              <div class="col col-lg-3 order-lg-last">
                <div class="mb-6">
                  <h6 class="text-uppercase fw-600 mb-4">Ways to pay</h6>
                  <div class="text-light lead-5 lh-1">
                    <a href="store.html" class="mr-2"><i class="fab fa-cc-paypal"></i></a>
                    <a href="store.html" class="mr-2"><i class="fab fa-cc-visa"></i></a>
                    <a href="store.html" class="mr-2"><i class="fab fa-cc-amazon-pay"></i></a>
                    <a href="store.html" class="mr-2"><i class="fab fa-cc-stripe"></i></a>
                    <a href="store.html" class="mr-2"><i class="fab fa-cc-jcb"></i></a>
                  </div>
                </div>
                <div>
                  <h6 class="mb-2">Reviews</h6>
                  <div class="text-warning lead-1">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star text-secondary"></i>
                  </div>
                </div>
              </div>
          </div>
      </div>
    </footer>
   <!--footer -->

    <!-- sign Up -->
    <div class="modal fade" id="userLogin" tabindex="-1" role="dialog" aria-labelledby="userLoginTitle" aria-hidden="true">
      <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content bg-dark text-light">
          <div class="modal-header border-secondary">
            <h5 class="modal-title" id="userLoginTitle">Log in</h5>
            <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div>
              <div class="text-center my-6"> 
                <a class="btn btn-circle btn-sm btn-google mr-2" href=""><i class="fab fa-google"></i></a>
                <a class="btn btn-circle btn-sm btn-facebook mr-2" href=""><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-circle btn-sm btn-twitter" href=""><i class="fab fa-twitter"></i></a>
              </div>
              <span class="hr-text small my-6">Or</span>
            </div>
            <form class="input-transparent">
              <div class="form-group">
                <input type="text" class="form-control border-secondary" name="username" placeholder="Username">
              </div>
              <div class="form-group">
                <input type="password" class="form-control border-secondary" name="password" placeholder="Password">
              </div>
              <div class="form-group d-flex justify-content-between">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" checked="" id="rememberMeCheck">
                  <label class="custom-control-label" for="rememberMeCheck">Remember me</label> 
                </div>
                <a class="small-3" href="#">Forgot password?</a>
              </div>
              <div class="form-group mt-6">
                <button class="btn btn-block btn-warning" type="submit">Login</button>
              </div>
            </form>
            <span class="small">Don't have an account? <a href="#">Create an account</a></span>
          </div>
        </div>
      </div>
    </div>
    <!-- /.sign Up -->

    <!-- offcanvas-cart -->
    <div id="offcanvas-cart" class="offcanvas-cart offcanvas text-light h-100 r-0 l-auto d-flex flex-column" data-animation="slideRight">
      <div>
        <button type="button" data-toggle="offcanvas-close" class="close float-right ml-4 text-light o-1 fw-100" data-dismiss="offcanvas" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        <hr class="border-light o-20 mt-8 mb-4">
      </div>
      <div class="offcanvas-cart-body flex-1">
        <div class="offcanvas-cart-list row align-items-center no-gutters">
          <div class="ocs-cart-item col-12">
            <div class="row align-items-center no-gutters">
              <div class="col-3 item_img d-none d-sm-block">
                <a href="store-product.html"><img class="img bl-3 text-primary" src="assets/img/content/cont/cg-h_01.jpg" alt="Product"></a>
              </div>
              <div class="col-7 flex-1 flex-grow pl-0 pl-sm-4 pr-4">
                <a href="store-product.html"><span class="d-block item_title text-lt ls-1 lh-1 small-1 fw-600 text-uppercase mb-2">Integer sagittis semper</span></a>
                <div class="position-relative lh-1">
                  <div class="number-input">
                    <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" ><i class="ti-minus"></i></button>
                    <input class="quantity" min="0" name="quantity" value="1" type="number">
                    <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i class="ti-plus"></i></button>
                  </div>
                </div>
              </div>
              <div class="col-2">
                <div class="row align-items-center h-100 no-gutters">
                  <div class="ml-auto text-center">
                    <a href="#"><i class="far fa-trash-alt"></i></a><br>
                    <span class="fw-500 text-warning">€44.99</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="ocs-cart-item col-12">
            <div class="row align-items-center no-gutters">
              <div class="col-3 item_img d-none d-sm-block">
                <a href="store-product.html"><img class="img bl-3 text-primary" src="assets/img/content/cont/cg-h_01.jpg" alt="Product"></a>
              </div>
              <div class="col-7 flex-1 flex-grow pl-0 pl-sm-4 pr-4">
                <a href="store-product.html"><span class="d-block item_title text-lt ls-1 lh-1 small-1 fw-600 text-uppercase mb-2">Integer sagittis semper</span></a>
                <div class="position-relative lh-1">
                  <div class="number-input">
                    <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" ><i class="ti-minus"></i></button>
                    <input class="quantity" min="0" name="quantity" value="1" type="number">
                    <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i class="ti-plus"></i></button>
                  </div>
                </div>
              </div>
              <div class="col-2">
                <div class="row align-items-center h-100 no-gutters">
                  <div class="ml-auto text-center">
                    <a href="#"><i class="far fa-trash-alt"></i></a><br>
                    <span class="fw-500 text-warning">€27.59</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div>
        <a href="checkout-order.html" class="btn btn-lg btn-block btn-outline-light">View cart</a>
      </div>
    </div>
    <!-- /.offcanvas-cart -->

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