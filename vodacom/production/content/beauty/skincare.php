

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Welcome to BeautyTips</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet" />
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet" />
    <!--[if lt IE 9]><script src="js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
    <!-- Custom styles for this template -->
    <link href="css/carousel.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="css/style_beauty.css" />
    <style>
        .button {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 4px 20px 4px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 2px 2px;
            -webkit-transition-duration: 0.4s; /* Safari */
            transition-duration: 0.4s;
            cursor: pointer;
            border-radius: 12px;
        }

        .button3 {
            background-color: #f44336;
            color: white;
            border: 2px solid white;
        }

            .button3:hover {
                background-color: grey;
                color: white;
            }
    </style>
</head>
<body>
    <form id="form1" runat="server">
        <div class="navbar-wrapper">
            <nav class="navbar navbar-inverse navbar-static-top">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"><span class="sr-only">Toggle navigation</span> <span class="menu-icon"><span class="icon-toggle"><span class="lines"></span></span></span></button>
                    <a class="navbar-brand" href="#" style="width: 70%">
                        <img src="content/Beauty Tips Logo.png" alt="" title="" style="height: 52px; width: 80%" /></a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="skincare.php">Skin Care</a></li>
                        <!--newgames-->
                        <!-- <li><a href="category.php?category=2">Jogos de Ação</a></li><!--Action Games-->
                        <li><a href="hairtips.php">Hair Tips</a></li>
                        <!--Racing Games-->
                        <!--<li><a href="http://funzone.mobi/glambar/allfiles.html?cid=1">New Images</a></li>-->
                        <!--Shoot-Em-Up Games-->
                        <!--<li><a href="http://funzone.mobi/glambar/allfiles.html?cid=2">Hot Images</a></li>-->
                        <!--Board Games-->
                    </ul>
                </div>
            </nav>
        </div>
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img class="first-slide" src="Banners/1.jpg" alt="Baner1" />
                </div>
                <div class="item">
                    <img class="second-slide" src="Banners/2.jpg" alt="Baner2" />
                </div>
                <div class="item">
                    <img class="third-slide" src="Banners/3.jpg" alt="Baner3" />
                </div>
            </div>
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span><span class="sr-only">Previous</span> </a><a class="right carousel-control" href="#myCarousel" role="button" data-slide="next"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span><span class="sr-only">Next</span> </a>
        </div>
        <div class="container">
            <div class="categoryrow">
                <h5>Skin Care<span class="information"></span></h5>
                <a href="Videoplayer.html?file=content/videos/Skin_Video/Tip_For_Deadcells.mp4">
                    <div style="height: 60%; width: 100%; color: #900; border: solid; background-color: #fff; border-color: #c8b2cb; border-radius: 9px; position: relative; float: left; margin: 1% 1% 3% 3%; max-width: 500px;">
                        <div>
                            <img src='../images/loader-grey-big.gif' style="width: 100%; height: 260px" alt="" class='imgcls' />
                            <span style='display: none;'>content/Images/Skin Care/Tip_For_Deadcells.jpg</span>
                        </div>
                       
                        <div>
                            <h4>Deadcells
                            </h4>
                        </div>
                        
                    </div>
                </a>
                <a href="Videoplayer.html?file=content/videos/Skin_Video/Tip_For_Dryskin.mp4">
                    <div style="height: 60%; width: 100%; color: #900; border: solid; background-color: #fff; border-color: #c8b2cb; border-radius: 9px; position: relative; float: left; margin: 1% 1% 3% 3%; max-width: 500px;">
                        <div>
                            <img src='../images/loader-grey-big.gif' style="width: 100%; height: 260px" alt="" class='imgcls' />
                            <span style='display: none;'>content/Images/Skin Care/Tip_For_Dryskin.jpg</span>
                        </div>
                       
                        <div>
                            <h4>Dryskin
                            </h4>
                        </div>
                        
                    </div>
                </a>
                <a href="Videoplayer.html?file=content/videos/Skin_Video/Tip_For_Fairness.mp4">
                    <div style="height: 60%; width: 100%; color: #900; border: solid; background-color: #fff; border-color: #c8b2cb; border-radius: 9px; position: relative; float: left; margin: 1% 1% 3% 3%; max-width: 500px;">
                        <div>
                            <img src='../images/loader-grey-big.gif' style="width: 100%; height: 260px" alt="" class='imgcls' />
                            <span style='display: none;'>content/Images/Skin Care/Tip_For_Fairness.jpg</span>
                        </div>
                       
                        <div>
                            <h4>Fairness
                            </h4>
                        </div>
                        
                    </div>
                </a>
                <a href="Videoplayer.html?file=content/videos/Skin_Video/Tip_For_Lips.mp4">
                    <div style="height: 60%; width: 100%; color: #900; border: solid; background-color: #fff; border-color: #c8b2cb; border-radius: 9px; position: relative; float: left; margin: 1% 1% 3% 3%; max-width: 500px;">
                        <div>
                            <img src='../images/loader-grey-big.gif' style="width: 100%; height: 260px" alt="" class='imgcls' />
                            <span style='display: none;'>content/Images/Skin Care/Tip_For_Lips.jpg</span>
                        </div>
                       
                        <div>
                            <h4>Lips
                            </h4>
                        </div>
                        
                    </div>
                </a>
                <a href="Videoplayer.html?file=content/videos/Skin_Video/Tip_For_Moisturizer.mp4">
                    <div style="height: 60%; width: 100%; color: #900; border: solid; background-color: #fff; border-color: #c8b2cb; border-radius: 9px; position: relative; float: left; margin: 1% 1% 3% 3%; max-width: 500px;">
                        <div>
                            <img src='../images/loader-grey-big.gif' style="width: 100%; height: 260px" alt="" class='imgcls' />
                            <span style='display: none;'>content/Images/Skin Care/Tip_For_Moisturizer.jpg</span>
                        </div>
                       
                        <div>
                            <h4>Moisturizer
                            </h4>
                        </div>
                        
                    </div>
                </a>
                <a href="Videoplayer.html?file=content/videos/Skin_Video/Tip_For_Oilyskin.mp4">
                    <div style="height: 60%; width: 100%; color: #900; border: solid; background-color: #fff; border-color: #c8b2cb; border-radius: 9px; position: relative; float: left; margin: 1% 1% 3% 3%; max-width: 500px;">
                        <div>
                            <img src='../images/loader-grey-big.gif' style="width: 100%; height: 260px" alt="" class='imgcls' />
                            <span style='display: none;'>content/Images/Skin Care/Tip_For_Oilyskin.jpg</span>
                        </div>
                       
                        <div>
                            <h4>Oilyskin
                            </h4>
                        </div>
                        
                    </div>
                </a>
                <a href="Videoplayer.html?file=content/videos/Skin_Video/Tip_For_Skinglow.mp4">
                    <div style="height: 60%; width: 100%; color: #900; border: solid; background-color: #fff; border-color: #c8b2cb; border-radius: 9px; position: relative; float: left; margin: 1% 1% 3% 3%; max-width: 500px;">
                        <div>
                            <img src='../images/loader-grey-big.gif' style="width: 100%; height: 260px" alt="" class='imgcls' />
                            <span style='display: none;'>content/Images/Skin Care/Tip_For_Skinglow.jpg</span>
                        </div>
                       
                        <div>
                            <h4>Skinglow
                            </h4>
                        </div>
                        
                    </div>
                </a>
                <a href="Videoplayer.html?file=content/videos/Skin_Video/Tip_To_Remove_Blackheads.mp4">
                    <div style="height: 60%; width: 100%; color: #900; border: solid; background-color: #fff; border-color: #c8b2cb; border-radius: 9px; position: relative; float: left; margin: 1% 1% 3% 3%; max-width: 500px;">
                        <div>
                            <img src='../images/loader-grey-big.gif' style="width: 100%; height: 260px" alt="" class='imgcls' />
                            <span style='display: none;'>content/Images/Skin Care/Tip_To_Remove_Blackheads.jpg</span>
                        </div>
                       
                        <div>
                            <h4>Remove Blackheads
                            </h4>
                        </div>
                        
                    </div>
                </a>
                <a href="Videoplayer.html?file=content/videos/Skin_Video/Tip_To_Remove_Makeup_For_Dryskin.mp4">
                    <div style="height: 60%; width: 100%; color: #900; border: solid; background-color: #fff; border-color: #c8b2cb; border-radius: 9px; position: relative; float: left; margin: 1% 1% 3% 3%; max-width: 500px;">
                        <div>
                            <img src='../images/loader-grey-big.gif' style="width: 100%; height: 260px" alt="" class='imgcls' />
                            <span style='display: none;'>content/Images/Skin Care/Tip_To_Remove_Makeup_For_Dryskin.jpg</span>
                        </div>
                       
                        <div>
                            <h4>Remove Makeup For Dryskin
                            </h4>
                        </div>
                        
                    </div>
                </a>
                <a href="Videoplayer.html?file=content/videos/Skin_Video/Tip_To_Remove_Makeup_For_Oilyskin.mp4">
                    <div style="height: 60%; width: 100%; color: #900; border: solid; background-color: #fff; border-color: #c8b2cb; border-radius: 9px; position: relative; float: left; margin: 1% 1% 3% 3%; max-width: 500px;">
                        <div>
                            <img src='../images/loader-grey-big.gif' style="width: 100%; height: 260px" alt="" class='imgcls' />
                            <span style='display: none;'>content/Images/Skin Care/Tip_To_Remove_Makeup_For_Oilyskin.jpg</span>
                        </div>
                       
                        <div>
                            <h4>Remove Makeup For Oilyskin
                            </h4>
                        </div>
                        
                    </div>
                </a>
                <a href="Videoplayer.html?file=content/videos/Skin_Video/Tip_To_Using_Scrub_For_Oilyskin.mp4">
                    <div style="height: 60%; width: 100%; color: #900; border: solid; background-color: #fff; border-color: #c8b2cb; border-radius: 9px; position: relative; float: left; margin: 1% 1% 3% 3%; max-width: 500px;">
                        <div>
                            <img src='../images/loader-grey-big.gif' style="width: 100%; height: 260px" alt="" class='imgcls' />
                            <span style='display: none;'>content/Images/Skin Care/Tip_To_Using_Scrub_For_Oilyskin.jpg</span>
                        </div>
                       
                        <div>
                            <h4>Using Scrub For Oilyskin
                            </h4>
                        </div>
                        
                    </div>
                </a>
                <a href="Videoplayer.html?file=content/videos/Skin_Video/Tip_To_Using_Toner_For_Oilyskin.mp4">
                    <div style="height: 60%; width: 100%; color: #900; border: solid; background-color: #fff; border-color: #c8b2cb; border-radius: 9px; position: relative; float: left; margin: 1% 1% 3% 3%; max-width: 500px;">
                        <div>
                            <img src='../images/loader-grey-big.gif' style="width: 100%; height: 260px" alt="" class='imgcls' />
                            <span style='display: none;'>content/Images/Skin Care/Tip_To_Using_Toner_For_Oilyskin.jpg</span>
                        </div>
                       
                        <div>
                            <h4>Using Toner For Oilyskin
                            </h4>
                        </div>
                        
                    </div>
                </a>
            </div>
        </div>
        <script type="text/javascript">

            function openclick(action, label) {
                //setTimeout(function () { ga('send', 'event', 'download', action, label); }, 3000);
                return true;
            }
            //setTimeout(function () { ga('send', 'event', 'PageLoad', 'Load', 'LE_Inner_Load'); }, 5000);
            function loadimage(classname) {
                var y = document.getElementsByClassName(classname);
                var i;
                for (i = 0; i < y.length; i++)
                    y[i].src = y[i].nextSibling.nextSibling.innerHTML;
            }
            if (document.addEventListener) {                // For all major browsers, except IE 8 and earlier
                document.addEventListener('DOMContentLoaded', function () {
                    //setTimeout(function () { ga('send', 'event', 'PageLoad', 'Load', 'LE_Inner_Load'); }, 5000);]
                    loadimage('imgcls');
                }, false);
            } else if (document.attachEvent) {              // For IE 8 and earlier versions
                document.attachEvent('DOMContentLoaded', function () {
                    //setTimeout(function () { ga('send', 'event', 'PageLoad', 'Load', 'LE_Inner_Load'); }, 5000);
                    loadimage('imgcls');
                }, false);
            }
        </script>
        <div class="footer" style="color: white; text-align: center; color: #b91a6b; border-top: 1px solid #b91a6b;"></div>
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
        <script src="js/holder.min.js"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="js/ie10-viewport-bug-workaround.js"></script>
        <script type="text/javascript">
            //$(document).ready(function(){
            //  $('a#click-a').click(function(){
            //$('.gamecategory').toggleClass('nav-view');
            //  });
            //});
        </script>


    </form>
</body>
</html>
