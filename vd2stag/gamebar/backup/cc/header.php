 
 
 
 <?php
 include('include/connection.php');
 $mt = microtime(true);
$mt =  $mt*1000; //microsecs
$clickid = "pc".((string)$mt*10).rand(1, 999); 


if(isset($_COOKIE["playcool_visit"]))
	{
		$subid1=$_COOKIE["playcool_visit"];
		
		
	}
	else{
		
		$cookie_count='playcool_visit';
		$co=1;
		$subid1=$clickid;
			setcookie($cookie_count, $clickid, time() + (86400 * 30), "/");
		
		
	}
	
	$pageurl=$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	





date_default_timezone_set("Asia/Kolkata");
$accesstime=date("Y-m-d H:i:s");



$sql1="insert into playcool.track(`url`,`accesstime`,`clickid`) values('".$pageurl."','".$accesstime."','".$subid1."')";
$result1 = $conn->query($sql1);
 ?>
 
 <head>
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="image/favicon.png"> 
  <title>PlayCool.Games</title>
  <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6691359041342922"
     crossorigin="anonymous"></script>
	 <script async src="https://www.googletagmanager.com/gtag/js?id=G-JCN31FTC9F"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-JCN31FTC9F');
</script>
 </head>
 

      
	  
	  
	  
    
        <div class="header-main">
            <div class="container">
                <nav id='cssmenu'>
                    <div class="logo">
                        <a href="index.php"><img src="image/logo3.png"></a><!--https://i.ibb.co/QDy827D/ak-logo.png-->
                    </div>
                    <div id="head-mobile"></div>
                    <div class="button"></div>
                    <ul>
                        <li><a href='index.php'>Home</a></li>
                        <li><a href='category.php?ct=Action'>Action</a>
                          <!--  <ul>
                                <li><a href='#'>Services 1</a></li>
                                <li><a href='#'>Services 2</a>
                                    <ul>
                                        <li><a href='#'>Services 21</a></li>
                                    </ul>
                                </li>

                                <li><a href='#'>Services 3</a></li>
                                <li><a href='#'>Services 4</a></li>
                            </ul>-->
                        </li>
                        <li><a href='category.php?ct=Adventure'>Adventure</a></li>
                        <li><a href='category.php?ct=Arcade'>Arcade</a></li>
                        <li><a href='category.php?ct=Board'>Board</a></li>
                        <li><a href='category.php?ct=Racing'>Racing</a></li>
                        <li><a href='category.php?ct=Sports'>Sports</a></li>
                      
                        <li style="Cursor:text !important; Text-Decoration: None ;background:none !important;border-bottom:none;"><form  action="action.php">
						  <input class="search" type="text" placeholder="Search.." name="search">
						  <button type="submit"><i class="fa fa-search"></i></button>
						</form></li>
                    </ul>
                </nav>
            </div>
        </div>
    
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	
	
	
	<style>
	
	.search{
	 background: Transparent;
color:red;	
height:30px;

		
	}
	
	
	h1, h2, h3, h4, h5, h6 {
    color: #ffffff;
}
a, a:hover, a:focus, a:active {
    text-decoration: none;
    outline: none;
}
ul {
    margin: 0;
    padding: 0;
    list-style: none;
}

header {
    position: relative;
    width: 100%;
    background: rgb(0, 0, 0);
    z-index: 99;
	//display: fixed;
}
/*---------header close----------*/
/*-----------header-top------------*/
.header-top {
    
    background: rgba(0, 0, 0, 0.57);
}
.left_info ul li {
    display: inline-block;
    margin-right: 30px;
}

.left_info a {
    color: #fffefe;
    font-size: 14px;
    font-weight: 500;
}

.left_info i.fa {
    font-size: 19px;
    color: #fff;
    padding-right: 10px;
}

.right_info p {
    color: #fff;
    font-size: 14px;
    font-weight: 500;
    line-height: 20px;
    margin: 0;
}

.left_info {
    text-align: right;
}

.right_info i.fa {
    font-size: 26px;
    margin-right: 10px;
    position: relative;
    bottom: -4px;
}

header i.fa.fa-mobile {
    bottom: -4px;
    font-size: 26px;
    position: relative;
    border: 40px;
    font-weight: 500;
}

.left_info ul li:last-child {
    margin: 0px !IMPORTANT;
}
.header-main {
    padding: 21px 0;
    border-top: 1px solid #424242;

}
/*-----------header-top Close------------*/
/*-----------header-menu------------*/
nav#cssmenu ul {
    float: right;
    margin-top: 13px;
}
.logo{position:relative;z-index:123;padding:10px;font:18px verdana;color:#6DDB07;float:left;}
.logo img {
    max-width: 170px;
}
.logo a{color:#6DDB07;}
#cssmenu,#cssmenu ul,#cssmenu ul li,#cssmenu ul li a,#cssmenu #head-mobile{border:0;list-style:none;line-height:1;display:block;position:relative;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box}
#cssmenu:after,#cssmenu > ul:after{content:".";display:block;clear:both;visibility:hidden;line-height:0;height:0}
#cssmenu #head-mobile{display:none}
#cssmenu > ul > li{float:left}
#cssmenu > ul > li > a {
    padding: 9px 17px;
    font-size: 18px;
    letter-spacing: 1px;
    text-decoration: none;
    color: #efefef;
	font-weight:bold;
}
#cssmenu > ul > li:hover > a, #cssmenu ul li.active a {
    color: #fff;
}
#cssmenu > ul > li:hover, #cssmenu ul li.active:hover, #cssmenu ul li.active, #cssmenu ul li.has-sub.active:hover {
   // background: #f82249!important;
    -webkit-transition: background .3s ease;
    -ms-transition: background .3s ease;
    transition: background .3s ease;
}
#cssmenu > ul > li.has-sub > a{padding-right:30px}
#cssmenu > ul > li.has-sub > a:after{position:absolute;top:17px;right:11px;width:8px;height:2px;display:block;background:#ddd;content:''}
#cssmenu > ul > li.has-sub > a:before {
    position: absolute;
    top: 14px;
    right: 14px;
    display: block;
    width: 2px;
    height: 8px;
    background: #ddd;
    content: '';
    -webkit-transition: all .25s ease;
    -ms-transition: all .25s ease;
    transition: all .25s ease;
}

#cssmenu > ul > li.has-sub:hover > a:before{top:23px;height:0}
#cssmenu ul ul {
    position: absolute;
    left: -9999px;
    margin-top: 0;
}
#cssmenu ul ul li{height:0;-webkit-transition:all .25s ease;-ms-transition:all .25s ease;background:#333;transition:all .25s ease}
#cssmenu ul ul li:hover{}
#cssmenu li:hover > ul{left:auto}
#cssmenu li:hover > ul > li{height:35px}
#cssmenu ul ul ul{margin-left:100%;top:0}
#cssmenu ul ul li a {
    border-bottom: 1px solid rgba(150,150,150,0.15);
    padding: 11px 15px;
    width: 190px;
    font-size: 12px;
    text-decoration: none;
    color: #ddd;
    font-weight: 400;
}
#cssmenu ul ul li:last-child > a,#cssmenu ul ul li.last-item > a{border-bottom:0}
#cssmenu ul ul li:hover > a,#cssmenu ul ul li a:hover{color:#fff}
#cssmenu ul ul li.has-sub > a:after{position:absolute;top:16px;right:11px;width:8px;height:2px;display:block;background:#ddd;content:''}
#cssmenu ul ul li.has-sub > a:before{position:absolute;top:13px;right:14px;display:block;width:2px;height:8px;background:#ddd;content:'';-webkit-transition:all .25s ease;-ms-transition:all .25s ease;transition:all .25s ease}
#cssmenu ul ul > li.has-sub:hover > a:before{top:17px;height:0}
#cssmenu ul ul li.has-sub:hover,#cssmenu ul li.has-sub ul li.has-sub ul li:hover{background:#363636;}
#cssmenu ul ul ul li.active a{border-left:1px solid #333}
#cssmenu > ul > li.has-sub > ul > li.active > a,#cssmenu > ul ul > li.has-sub > ul > li.active> a{border-top:1px solid #333}

@media screen and (max-width:991px){
.logo{position:absolute;top:0;left: 0;width:100%;height:46px;text-align:center;padding:10px 0 0 0 ;float:none}
.logo2{display:none}
nav{width:100%;}
#cssmenu{width:100%}
#cssmenu ul{width:100%;display:none}
#cssmenu ul li {
    width: 100%;
    border-top: 1px solid #444;
    float: left;
}
#cssmenu ul li:hover{
    background: transparent !important;
}
#cssmenu ul ul li,#cssmenu li:hover > ul > li{height:auto}
#cssmenu ul li a,#cssmenu ul ul li a{width:100%;border-bottom:0}
#cssmenu ul ul li a{padding-left:25px}
#cssmenu ul ul li{background:#333!important;}
#cssmenu ul ul li:hover{background:#363636!important}
#cssmenu ul ul ul li a{padding-left:35px}
#cssmenu ul ul li a{color:#ddd;background:none}
#cssmenu ul ul li:hover > a,#cssmenu ul ul li.active > a{color:#fff}
#cssmenu ul ul,#cssmenu ul ul ul{position:relative;left:0;width:100%;margin:0;text-align:left}
#cssmenu > ul > li.has-sub > a:after,#cssmenu > ul > li.has-sub > a:before,#cssmenu ul ul > li.has-sub > a:after,#cssmenu ul ul > li.has-sub > a:before{display:none}
#cssmenu #head-mobile{display:block;padding:23px;color:#ddd;font-size:12px;font-weight:700}
.button{width:55px;height:46px;position:absolute;right:0;top:0;cursor:pointer;z-index: 12399994;}
.button:after{position:absolute;top:22px;right:20px;display:block;height:8px;width:20px;border-top:2px solid #dddddd;border-bottom:2px solid #dddddd;content:''}
.button:before{-webkit-transition:all .3s ease;-ms-transition:all .3s ease;transition:all .3s ease;position:absolute;top:16px;right:20px;display:block;height:2px;width:20px;background:#ddd;content:''}
.button.menu-opened:after{-webkit-transition:all .3s ease;-ms-transition:all .3s ease;transition:all .3s ease;top:23px;border:0;height:2px;width:19px;background:#fff;-webkit-transform:rotate(45deg);-moz-transform:rotate(45deg);-ms-transform:rotate(45deg);-o-transform:rotate(45deg);transform:rotate(45deg)}
.button.menu-opened:before{top:23px;background:#fff;width:19px;-webkit-transform:rotate(-45deg);-moz-transform:rotate(-45deg);-ms-transform:rotate(-45deg);-o-transform:rotate(-45deg);transform:rotate(-45deg)}
#cssmenu .submenu-button{position:absolute;z-index:99;right:0;top:0;display:block;border-left:1px solid #444;height:46px;width:46px;cursor:pointer}
#cssmenu .submenu-button.submenu-opened{background:#262626}
#cssmenu ul ul .submenu-button{height:34px;width:34px}
#cssmenu .submenu-button:after{position:absolute;top:22px;right:19px;width:8px;height:2px;display:block;background:#ddd;content:''}
#cssmenu ul ul .submenu-button:after{top:15px;right:13px}
#cssmenu .submenu-button.submenu-opened:after{background:#fff}
#cssmenu .submenu-button:before{position:absolute;top:19px;right:22px;display:block;width:2px;height:8px;background:#ddd;content:''}
#cssmenu ul ul .submenu-button:before{top:12px;right:16px}
#cssmenu .submenu-button.submenu-opened:before{display:none}
#cssmenu ul ul ul li.active a{border-left:none}
#cssmenu > ul > li.has-sub > ul > li.active > a,#cssmenu > ul ul > li.has-sub > ul > li.active > a{border-top:none}
}

img{
    width: 100%;
}
div#slider-home .carousel-item::before {
    background: #0000005c;
    content: "";
    position: absolute;
    width: 100%;
    height: 100%;
}
#slider-home h3 {
    text-transform: capitalize;
    font-size: 50px;
}

#slider-home p {
    font-size: 23px;
}

#slider-home .btn {
    background: #f82249;
    color: #fff;
    padding: 12px 30px !important;
    font-size: 18px;
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-top: 10px;
    margin-bottom: 30px;
}
#slider-home .btn:hover{    
    background: #ffffff;
    color: #f82249;
}
	</style>
	<script src="include/jquery.min.js" type="text/javascript"></script>
	<script>
	(function($) {
            $.fn.menumaker = function(options) {
                var cssmenu = $(this),
                    settings = $.extend({
                        format: "dropdown",
                        sticky: false
                    }, options);
                return this.each(function() {
                    $(this).find(".button").on('click', function() {
                        $(this).toggleClass('menu-opened');
                        var mainmenu = $(this).next('ul');
                        if (mainmenu.hasClass('open')) {
                            mainmenu.slideToggle().removeClass('open');
                        } else {
                            mainmenu.slideToggle().addClass('open');
                            if (settings.format === "dropdown") {
                                mainmenu.find('ul').show();
                            }
                        }
                    });
                    cssmenu.find('li ul').parent().addClass('has-sub');
                    multiTg = function() {
                        cssmenu.find(".has-sub").prepend('<span class="submenu-button"></span>');
                        cssmenu.find('.submenu-button').on('click', function() {
                            $(this).toggleClass('submenu-opened');
                            if ($(this).siblings('ul').hasClass('open')) {
                                $(this).siblings('ul').removeClass('open').slideToggle();
                            } else {
                                $(this).siblings('ul').addClass('open').slideToggle();
                            }
                        });
                    };
                    if (settings.format === 'multitoggle') multiTg();
                    else cssmenu.addClass('dropdown');
                    if (settings.sticky === true) cssmenu.css('position', 'fixed');
                    resizeFix = function() {
                        var mediasize = 1000;
                        if ($(window).width() > mediasize) {
                            cssmenu.find('ul').show();
                        }
                        if ($(window).width() <= mediasize) {
                            cssmenu.find('ul').hide().removeClass('open');
                        }
                    };
                    resizeFix();
                    return $(window).on('resize', resizeFix);
                });
            };
        })(jQuery);

        (function($) {
            $(document).ready(function() {
                $("#cssmenu").menumaker({
                    format: "multitoggle"
                });
            });
        })(jQuery);
	
	</script>
	
	