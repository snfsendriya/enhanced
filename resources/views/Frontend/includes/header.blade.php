<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="keywords" content="" />
<meta name="author" content="" />
<meta name="robots" content="" />
<meta name="description" content="" />
<meta name="format-detection" content="telephone=no">
<!-- Favicons Icon -->
<link rel="icon" href="{{asset('frontend_assets/images/favicon.ico')}}" type="image/x-icon" />
<link rel="shortcut icon" type="image/x-icon" href="{{asset('frontend_assets/images/favicon.html')}}" />
<!-- Page Title Here -->
<title>
    @yield('title')
</title>
<!-- Mobile Specific -->

<link rel="stylesheet" type="text/css" href="{{asset('frontend_assets/css/bootstrap.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend_assets/css/my-style.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend_assets/css/fontawesome/css/font-awesome.min.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('frontend_assets/css/flaticon/flaticon.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('frontend_assets/css/owl.carousel.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend_assets/css/bootstrap-select.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend_assets/css/magnific-popup.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend_assets/css/style.css')}}">
<link rel="stylesheet" rel="stylesheet" type="text/css" href="{{asset('frontend_assets/css/color.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend_assets/css/font-style.css')}}">
<link rel="stylesheet" href="{{asset('frontend_assets/css/animate.css')}}">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<link rel="stylesheet" href="{{asset('frontend_assets/css/imageslider.css')}}">

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.6/dist/sweetalert2.all.min.js"></script>

<!-- Revolution Slider Css -->
<link rel="stylesheet" type="text/css" href="{{asset('frontend_assets/plugins/revolution/revolution/css/settings.html')}}">
<!-- Revolution Navigation Style -->
<link rel="stylesheet" type="text/css" href="{{asset('frontend_assets/plugins/revolution/revolution/css/navigation.html')}}">
<!-- Google fonts -->
<link href="https://fonts.googleapis.com/css?family=Titillium+Web" rel="stylesheet">

<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>


<style>

.marque{
padding-left:15px;
}
</style>
</head>

<body id="bg">

<!-- Load Facebook SDK for JavaScript -->
      <div id="fb-root"></div>
      <script>
        window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v9.0'
          });
        };

        (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>

      <!-- Your Chat Plugin code -->
      <div class="fb-customerchat"
        attribution=setup_tool
        page_id="111389723801963">
      </div>
      
      <style>
          
        .nav li ul {
          display: none;
        }
        
        .nav > li:hover ul {
          display: block;
        }
          
      </style>
	
<div id="loading-area"></div><div class="page-wraper">
    <!-- header -->
    <header class="site-header header header-style-2 dark-primary">
        <!-- top bar -->
        <div class="top-bar bg-primary">
            <div class="container">
                <div class="row">
                    <div class="dez-topbar-left">
                        <ul class="social-line text-center pull-right">
                            <li><a href="tel:+919515021387"><i class="fa fa-phone"></i><span>&nbsp</span> <span>+91-9515021387</span> </a></li>
			    			<li><a href="mailto:teamsnfsendriya@gmail.com"><i class="fas fa-envelope-open"></i><span>&nbsp</span> <span>teamsnfsendriya@gmail.com</span></a></li>
                            <li><a href="javascript:void(0);"><i class="fa fa-clock-o"></i><span>&nbsp</span> <span>Mon - Fri: 09.00 - 20.00</span></a></li>
                        </ul>
                    </div>
                    <div class="dez-topbar-right">
                        <ul class="social-line text-center pull-right">
                            @if(auth()->check())
                                @if(auth()->user()->id == 1)
                                    <li><a href="{{url('admin/dashboard')}}">Account</a></li>
                                @else
                                    <li><a href="{{url('user/dashboard')}}">Account</a></li>
                                @endif
                            @else
                                <li><a href="{{url('/login')}}">Login</a></li>
                            @endif
                            <li><a href="https://www.facebook.com/snfsendriya" class="fab fa-facebook-f"></a></li>
                            <li><a href="https://www.instagram.com/snf_sendriya/" class="fab fa-instagram"></a></li>
                            <li><a href="https://www.youtube.com/channel/UConebq4I0Oy8w3bdBE6sZ4Q" class="fab fa-youtube"></a></li>
                            <li><a href="https://g.page/r/CRFvsx7b0s-PEAE" class="fab fa-google "></a></li>
                        </ul>
                    </div>
                    <div id="google_translate_element"></div>
                </div>
                </div>
            </div>
        </div>
        <!-- top bar END-->
        <!-- main header -->
        <div class="main-bar-wraper">
            <div class="main-bar clearfix ">
                <div class="container clearfix">
                    <!-- website logo -->
                    <div class="logo-header mostion"><a href="{{url('/')}}"><img src="{{asset('frontend_assets/images/logo.png')}}" width="193" height="89" alt=""></a></div>

                    <!-- nav toggle button -->
                    <button data-target=".header-nav" data-toggle="collapse" type="button" class="navbar-toggle collapsed"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                    <!-- extra nav -->
                    
                    <!-- main nav -->
                    <div class="header-nav navbar-collapse collapse">
                        <ul class=" nav navbar-nav">
                                <li class="{{ (request()->is('/')) ? 'active' : '' }}"> <a href="{{url('/')}}">Home</a></li>
                                <li class="{{ (request()->is('/our-story')) ? 'active' : '' }}"> <a href="{{url('/our-story')}}">Our Story</a></li>
                                <li class="{{ request()->is('*about-us') ? 'active' : '' }}"><a href="{{url('/about-us')}}">About Us</a></li>
								<li class="{{ request()->is('product') ? 'active' : '' }}"><a href="{{url('product')}}">Our Products</a></li>
                                <!--<li class="{{ request()->is('*our-project') ? 'active' : '' }}"><a href="{{url('/our-project')}}">Our Projects</a></li>                                -->
                                <li class="{{ request()->is('*donate') ? 'active' : '' }}"><a href="{{url('/donate')}}">Donate</a></li>
                                <li class="{{ request()->is('*news*') ? 'active' : '' }}"><a href="{{url('/news')}}">News</a></li>
                                <li class="{{ request()->is('*blogs*') ? 'active' : '' }}"><a href="{{url('/blogs')}}">Blogs</a></li>
                                <li class="{{ request()->is('contact-us') ? 'active' : '' }}"><a href="{{url('contact-us')}}">Contact Us</a></li>	
                                <li class="cart-icon">
                                    <a href="{{url('/cart')}}">
                                        <i class="fa fa-shopping-cart cart-size"></i>
                                        <span class="badge cart-badge">{{ get_cart_totals() }}</span>
                                    </a>
                                </li>
                                @if(auth()->check())
                                    @if(auth()->user()->id == 1)
                                        <li><a href="{{url('admin/logout')}}"><i class="fa fa-sign-out" style="font-size:24px"></i></a></li>
                                    @else
                                        <li><a href="{{url('user/logout')}}"><i class="fa fa-sign-out" style="font-size:24px"></i></a></li>
                                    @endif
                                @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- main header END -->
    </header>