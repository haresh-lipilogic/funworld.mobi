<?php 




if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
//Array ( [name] => fdsfs [email] => mehulgediya01@gmail.com [subject] => fasdf [message] => dsafdsf )	
	
	$name=$_POST['name'];
	$email=$_POST['email'];
	$subject=$_POST['subject'];
	$message=$_POST['message'];
	
	$body="name=$name&email=$email&subject=$subject&message=$message";
	$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://34.87.16.111/mailmehul/mailjson.php',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => $body,
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/x-www-form-urlencoded'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
	//echo $response;
	//exit;
	
}
include('header.php');
?>

    <main class="main-content">

      <!-- content area -->
      <section class="content-section">
        <div class="container">
          <div class="row gutters-y">
            <div class="col-lg-7 text-light">
              <div class="mb-6">
                <h3>Contact Us</h3>
                <p class="lead-1">Have questions in mind? Let us help you!</p>
              </div>
              <form  action="" class="input-transparent" method="POST">
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <input class="form-control form-control-lg" type="text" name="name" placeholder="Your Name" required>
                    </div>

                    <div class="form-group col-md-6">
                      <input class="form-control form-control-lg" type="email" name="email" placeholder="Your Email Address" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <input name="subject" type="text" class="form-control" placeholder="Subject" required>
                  </div>

                  <div class="form-group">
                    <textarea class="form-control form-control-lg" rows="4" placeholder="Your Message" name="message" required></textarea>
                  </div>
                  <button class="btn btn-lg" type="submit">Send it over</button>
              </form>
            </div>
            <div class="col-lg-5">
              <div class="p-4 border border-secondary" data-overlay="9">
                <div class="p-relative">
                  <div class="mb-7">
                    <h5 class="lead-2 fw-500 text-warning">Play Cool</h5>
                    <ul class="list-unstyled">
                      <li class="d-flex align-items-center"><i class="fas fa-map-marker-alt mr-3" style="width: 10px"></i>Near Pakvan Cross Roads,
						SG Highway, Bodakdev,Ahmedabad 380054,Gujarat, India</li>
                     <!-- <li class="d-flex align-items-center"><i class="fas fa-phone mr-3" style="width: 10px"></i>(812) 445-3742</li>
                      <li class="my-3">Maecenas in odio lacus. Nulla neque diam, molestie quis fringilla in, tempus eget leo.</li>-->
                    </ul>
                  </div>
                  <div class="mb-7">
                    <h5 class="lead-2 fw-500 text-warning">Office</h5>
                    <ul class="list-unstyled">
							 <li>Office 2707, 27th floor</li>
							 <li>Prime Tower, 6C Marasi Dr – Dubai,</li>
							 <li>P.O. Box 112037</li>
							 <li>United Arab Emirates (UAE)</li>
					
					
                    </ul>
                  </div>
                  <div>
                    <h5 class="lead-2 fw-500 text-warning">Follow Us</h5>
                    <div class="social-buttons">
                      <a class="mr-3 unset social-twitter" href="#"><i class="fab fa-twitter"></i></a>
                      <a class="mr-3 unset social-facebook" href="#"><i class="fab fa-facebook-f"></i></a>
                      <a class="mr-3 unset social-dribbble" href="#"><i class="fab fa-dribbble"></i></a>
                      <a class="mr-3 unset social-instagram" href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- /.content area -->

      <!-- content area -->
      
      <!-- /.content area -->

    </main>

    <!-- footer -->
  <?php 
include("footer.php");  
  
  ?>
    <!-- sign up -->
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
    <!-- /.sign up -->

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

    <!-- Parallax -->
    <script src="assets/plugins/parallax/parallax.js"></script>

    <!-- User JS -->
    <script src="assets/js/scripts.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js" id="_mainJS"></script>
  </body>
</html>