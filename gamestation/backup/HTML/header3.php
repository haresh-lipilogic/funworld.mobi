<?php
include("connection.php");


?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PlayCool</title>

    <!-- CSS -->
    <link href="assets/css/fonts/etline-font.min.css" rel="stylesheet">
    <link href="assets/css/fonts/fontawesome/all.min.css" rel="stylesheet">
    <link href="assets/css/fonts/pe-icon-7-stroke.css" rel="stylesheet">
    <link href="assets/css/fonts/themify-icons.css" rel="stylesheet">

    <link href="assets/plugins/owl.carousel/owl.carousel.min.css" rel="stylesheet">

    <link href="assets/css/main.css" rel="stylesheet">
    <link href="assets/css/styles.css" rel="stylesheet">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="assets/img/apple-touch-icon.png">
    <link rel="icon" href="assets/img/favicon.png">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="page-body">

    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-nav zi-3">
      <div class="container">
        <div class="row">
          <div class="col-4 col-sm-3 col-md-2 mr-auto">
            <a class="navbar-brand logo" href="#">
              <img src="assets/img/logo-gaming.png" alt="Wicodus" class="logo-light mx-auto">
            </a>
          </div>
          <div class="col-4 d-none d-lg-block mx-auto">
            <form class="input-group border-0 bg-transparent">
              <input class="form-control" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-sm btn-warning text-secondary my-0 mx-0" type="submit"><i class="fas fa-search"></i></button>
              </div>
            </form>
          </div>
          <div class="col-8 col-sm-8 col-md-8 col-lg-6 col-xl-4 ml-auto text-right">
            <a class="btn btn-sm btn-warning text-secondary mr-2" href="#" data-toggle="modal" data-target="#userLogin">Sign in</a>
            <a class="btn btn-sm text-light d-none d-sm-inline-block" href="#">Sign up</a>
            <ul class="nav navbar-nav d-none d-sm-inline-flex flex-row">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle small" href="#" id="dropdownGaming" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="mr-2 fas fa-globe"></i>EN </a>
                <div class="dropdown-menu position-absolute" aria-labelledby="dropdownGaming">
                  <a class="dropdown-item" href="#">English</a>
                  <a class="dropdown-item" href="#">Deutsch</a>
                  <a class="dropdown-item" href="#">Español</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link small" href="" data-toggle="offcanvas" data-target="#offcanvas-cart">
                  <span class="p-relative d-inline-flex">
                    <span class="badge-cart badge badge-counter badge-warning position-absolute l-1">2</span>
                    <i class="fas fa-shopping-cart"></i>
                  </span>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <button class="navbar-toggler navbar-toggler-fixed" type="button" data-toggle="collapse" data-target="#collapsingNavbar" aria-controls="collapsingNavbar" aria-expanded="false" aria-label="Toggle navigation">☰</button>
        <div class="collapse navbar-collapse" id="collapsingNavbar">
          <ul class="navbar-nav">
            <li class="nav-item dropdown dropdown-hover">
              <a class="nav-link dropdown-toggle pl-lg-0" href="#" id="dropdownGaming_games" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Games </a>
              <div class="dropdown-menu dropdown-menu-dark-lg" aria-labelledby="dropdownGaming_games">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Adventure</a>
                <a class="dropdown-item" href="#">Cooperative</a>
                <a class="dropdown-item" href="#">MMO</a>
                <a class="dropdown-item" href="#">RPG</a>
                <a class="dropdown-item" href="#">Simulation</a>
                <a class="dropdown-item" href="#">Economy</a>
                <a class="dropdown-item" href="#">Horror</a>
                <a class="dropdown-item" href="#">Arcade</a>
                <a class="dropdown-item" href="#">Hack & Slash</a>
                <a class="dropdown-item" href="#">Puzzle</a>
              </div>
            </li>
          
            <li class="nav-item dropdown dropdown-hover">
              <a class="nav-link dropdown-toggle" href="#" id="dropdownGaming_community" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Community </a>
              <div class="dropdown-menu dropdown-menu-dark-lg" aria-labelledby="dropdownGaming_community">
                <a class="dropdown-item" href="#">Discussions</a>
                <a class="dropdown-item" href="#">Workshop</a>
                <a class="dropdown-item" href="#">Market</a>
                <a class="dropdown-item" href="#">Broadcasts</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Support</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- /.navbar -->

    <!-- header -->
    <header class="header">
      <div id="carousel_main" class="carousel carousel-header slide carousel-fade fl-scn" data-ride="carousel">
        <!-- Indicators -->
        <div class="po_carousel__wrapper">
            <ol class="list-unstyled carousel-indicators def po_carousel-indicators">
              <li data-target="#carousel_main" data-slide-to="0" class=""></li>
              <li data-target="#carousel_main" data-slide-to="1" class=""></li>
              <li data-target="#carousel_main" data-slide-to="2" class="active"></li>
            </ol>
        </div>
        <!-- Carousel items -->
        <div class="carousel-inner a-cont">
          <!-- carousel-item -->
          <div class="carousel-item active">
            <div class="h-fullscreen__page bs-c br-n ow-h" style="background-image: url(assets/img/a3.jpg);">
              <div class="w-100 d-flex jc-c overlay">
                <!-- sm-overlay -->
                <div class="overlay bg-light_A-20 d-lg-none"></div>
                <div class="overlay bg-dark_A-50 d-lg-none"></div>
                <!-- lg-overlay -->
               <div class="d-none d-lg-block position-absolute triangle-bottomleft a-out carousel-shape__light light_A-2" data-carousel-animation="fade"></div>
               <!--  <div class="d-none d-lg-block position-absolute triangle-bottomleft a-out carousel-shape ad-200ms" data-carousel-animation="fade"></div>-->
              </div>
              <div class="d-flex align-items-center h-100">
                <div class="container">
                  <div class="row align-items-center h-100">
                    <div class="col-12 mr-auto ml-lg-0 col-lg-5">
                      <div class="main_carousel__content ad-900ms fadeIn text-light px-8 px-md-6 mx-lg-4 mx-xl-0">
                        <h2 class="carousel__heading text-light fadeInDown ad-500ms">Play Cool Games</h2>
                        <p class="carousel__text lead-1 mb-6 fadeInDown ad-600ms">Play Cool Games 100% free .</p>
                        <div class="d-flex fadeInLeft ad-900ms">
                        <a class="disabled btn btn-lg bg-dark_A-50 o-1 text-light br-round-0tr br-round-0br parallelogram un_text mb-0"><span class="d-block text-warning"><span class="carousel__discount td-lt text-light">349$</span> 0$</span></a>
                        <a href="#" class="btn btn-lg btn-light parallelogram br-round-0tl br-round-0bl un_text mb-0"><span class="d-block">Play Now</span></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /.carousel-item -->

          <!-- carousel-item -->
          <div class="carousel-item">
            <div class="h-fullscreen__page bs-c br-n ow-h" style="background-image: url(assets/img/a2.jpg);">
              <div class="w-100 d-flex jc-c overlay">
                <!-- sm-overlay -->
                <div class="overlay bg-light_A-20 d-lg-none"></div>
                <div class="overlay bg-dark_A-50 d-lg-none"></div>
                <!-- lg-overlay -->
                <div class="d-none d-lg-block position-absolute triangle-bottomleft a-out carousel-shape__light light_A-2" data-carousel-animation="fade"></div>
              <!--  <div class="d-none d-lg-block position-absolute triangle-bottomleft a-out carousel-shape ad-200ms" data-carousel-animation="fade"></div>-->
              </div>
              <div class="d-flex align-items-center h-100">
                <div class="container">
                  <div class="row align-items-center h-100">
                    <div class="col-12 mr-auto ml-lg-0 col-lg-5">
                      <div class="main_carousel__content ad-900ms fadeIn text-light px-8 px-md-6 mx-lg-4 mx-xl-0">
                        <h2 class="carousel__heading text-light fadeInDown ad-500ms" style="color:black !important">Play Cool Games</h2>
                        <p class="carousel__text lead-1 mb-6 fadeInDown ad-600ms"style="color:black !important">Play Cool Games 100% free .</p>
                        <div class="d-flex fadeInLeft ad-900ms">
                        <a class="disabled btn btn-lg bg-dark_A-50 o-1 text-light br-round-0tr br-round-0br parallelogram un_text mb-0"><span class="d-block text-warning"><span class="carousel__discount td-lt text-light">349$</span> 0$</span></a>
                        <a href="#" class="btn btn-lg btn-light parallelogram br-round-0tl br-round-0bl un_text mb-0"><span class="d-block">Play Now</span></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /.carousel-item -->

          <!-- carousel-item -->
          <div class="carousel-item">
            <div class="h-fullscreen__page bs-c br-n ow-h" style="background-image: url(assets/img/a1.jpg);">
              <div class="w-100 d-flex jc-c overlay">
                <!-- sm-overlay -->
                <div class="overlay bg-light_A-20 d-lg-none"></div>
                <div class="overlay bg-dark_A-50 d-lg-none"></div>
                <!-- lg-overlay -->
                <div class="d-none d-lg-block position-absolute triangle-bottomleft a-out carousel-shape__light light_A-2" data-carousel-animation="fade"></div>
               <!-- <div class="d-none d-lg-block position-absolute triangle-bottomleft a-out carousel-shape ad-200ms" data-carousel-animation="fade"></div>-->
              </div>
              <div class="d-flex align-items-center h-100">
                <div class="container">
                  <div class="row align-items-center h-100">
                    <div class="col-12 mr-auto ml-lg-0 col-lg-5">
                      <div class="main_carousel__content ad-900ms fadeIn text-light px-8 px-md-6 mx-lg-4 mx-xl-0">
                        <h2 class="carousel__heading text-light fadeInDown ad-500ms">Play Cool Games</h2>
                        <p class="carousel__text lead-1 mb-6 fadeInDown ad-600ms">Play Cool Games 100% free .</p>
                        <div class="d-flex fadeInLeft ad-900ms">
                        <a class="disabled btn btn-lg bg-dark_A-50 o-1 text-light br-round-0tr br-round-0br parallelogram un_text mb-0"><span class="d-block text-warning"><span class="carousel__discount td-lt text-light">349$</span> 0$</span></a>
                        <a href="#" class="btn btn-lg btn-light parallelogram br-round-0tl br-round-0bl un_text mb-0"><span class="d-block">Buy</span></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /.carousel-item -->
        </div>
        <!-- Carousel nav -->
        <div class="carousel-control-prev a-out-t"><a class="text-light" href="#carousel_main" data-slide="prev"><span class="icon-cl-prev text-shadow pe-7s-angle-left"></span></a></div>
        <div class="carousel-control-next a-out-t"><a class="text-light" href="#carousel_main" data-slide="next"><span class="icon-cl-next text-shadow pe-7s-angle-right"></span></a></div>
      </div>
    </header>
    <!-- /.header -->