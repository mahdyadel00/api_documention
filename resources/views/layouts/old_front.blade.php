<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en-US"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8" lang="en-US"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9" lang="en-US"> <![endif]-->
<!--[if IE 9]>
<html class="no-js lt-ie9" lang="en-US"> <![endif]-->

<html class="no-js" lang="en-US">

<!--<![endif]-->


<!-- Mirrored from preview.redq.io/turbo/motor-bike/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Jun 2021 20:08:21 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ejarly</title>

    <link rel='stylesheet' id='turbo-style-css' href='/assets/css/rent.css' type='text/css' media='all' />
    <link rel='stylesheet' id='turbo-style-css' href='/assets/css/style.css' type='text/css' media='all' />
    <link rel='stylesheet' id='turbo-style-css' href='/assets/css/style-rtl.css' type='text/css' media='all' />

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css"
        integrity="sha384-Bfad6CLCknfcloXFOyFnlgtENryhrpZCe29RTifKEixXQZ38WheV+i/6YWSzkz3V" crossorigin="anonymous" />


    <script type='text/javascript' src='/assets/js/jquery.js' id='jquery-core-js'></script>
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> --}}

    @stack('head')

    <style>
        @font-face {
            font-family: 'Cairo';
            /*a name to be used later*/
            src: url('/assets/fonts/Cairo-Regular.ttf');
            /*URL to font*/
        }

        body * {
            font-family: 'Cairo' !important;

        }

        .fa,
        .far,
        .fas {
            font-family: "Font Awesome 5 Free" !important;

        }

        .alert.success {
            position: fixed;
    margin: 0 auto;
    top: 68px;
    z-index: 555555555;
    border: 2px solid;
    width: 90%;
    background: #f7ca3b;
    text-align: right;
    direction: rtl;
    left: 50%;
    transform: translateX(-50%);
        }
        .close{
            cursor: pointer;
        }
    </style>

</head>

<body
    class="archive post-type-archive post-type-archive-product theme-turbo woocommerce woocommerce-page woocommerce-no-js turbo-listing-woocommerce turbo_motor_bike wpb-js-composer js-comp-ver-6.4.1 vc_responsive">
    <div class="turbo-loader">
        <div class="loader">
            <div class="loader--text" data="تحميل"></div>
            <div class="loader--dot"></div>
            <div class="loader--dot"></div>
            <div class="loader--dot"></div>
            <div class="loader--dot"></div>
            <div class="loader--dot"></div>
            <div class="loader--dot"></div>
        </div>
    </div>


    <!-- Start main wrapper  -->
    <div id="main-wrapper">

        <header class="header transparent-header sticky-header">
            <nav class="navbar" id="sticker">
                <div class="container">

                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a href="/" class="navbar-brand">
                            <img src="/assets/imgs/logo.png" alt="Site logo">
                        </a>
                    </div>
                    @php
                    $url = @explode('/' , url()->current())[3];
                    // var_dump(!$url);
                    @endphp
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <div class="menu-turbo-menu-container">
                            <div class="menu-turbo-menu-container">
                                <ul id="menu-turbo-menu" class="nav navbar-nav navbar-center menu rtl">
                                    <li id="menu-item-1133"
                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home page_item page-item-760 <?= (!$url) ? 'active' : ''?> dropdown">
                                        <a href="/" class="dropdown-toggle" role="button" data-toggle=""
                                            aria-haspopup="true" aria-expanded="false">
                                            {{display('home')}}
                                        </a>
                                    </li>
                                    <li id="menu-item-1109"
                                        class="menu-item menu-item-type-post_type menu-item-object-page <?= ($url == 'products' || $url == 'product' ) ? 'active' : ''?> dropdown">
                                        <a href="/products" class="dropdown-toggle" role="button" data-toggle=""
                                            aria-haspopup="true" aria-expanded="false">
                                            {{display('products')}}
                                        </a></li>
                                    <li id="menu-item-1032"
                                        class="menu-item menu-item-type-post_type menu-item-object-page <?= ($url == 'about' ) ? 'active' : ''?> dropdown">
                                        <a href="/about" class="dropdown-toggle" role="button" data-toggle=""
                                            aria-haspopup="true" aria-expanded="false">
                                            {{display('about-us')}}

                                        </a></li>
                                    <li id="menu-item-1086"
                                        class="menu-item menu-item-type-post_type menu-item-object-page <?= ($url == 'contact' ) ? 'active' : ''?> dropdown">
                                        <a href="/contact" class="dropdown-toggle" role="button" data-toggle=""
                                            aria-haspopup="true" aria-expanded="false">
                                            {{display('contact-us')}}

                                        </a></li>

                                </ul>
                            </div>
                        </div>

                    </div>

                </div>
            </nav>

        </header>

        @if (Session::has('success'))

        <div class="alert round success alert-success alert-icon-left mb-2" role="alert">
            <span class="alert-icon">
                <i class="ft-info"></i>
            </span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <strong>{{ Session::get('success') }}</strong>
        </div>
        @endif


        @yield('content')



        <footer class="rq-footer text-justify rtl">
            <div class="rq-main-footer"
                style="background-color: #212020;background-repeat: repeat-x;background-size: cover; -webkit-background-size: cover;background-position: center center;background-attachment: scroll;">
                <div class="container">
                    <button class="toggle-widget">Footer widget</button>
                    <div class="footer-widget footer-widget-toggle">
                        <div class="row">
                            <div class="col-lg-3 col-sm-6 widget-list">
                                <h4 class="widget-title">
                                    <div class="widget-list">
                                        <ul>
                                            <li><a href="/">
                                                    {{display('Home')}}
                                                </a></li>
                                            <li><a href="/products">
                                                    {{display('products')}}
                                                </a></li>
                                            {{-- <li><a href="scooty-listing//">
                                                    {{display('')}}
                                            </a></li> --}}
                                        </ul>
                                    </div>
                                </h4>
                            </div>
                            <div class="col-lg-3 col-sm-6 widget-list">
                                <h4 class="widget-title">
                                    <div class="widget-list">
                                        <ul>
                                            <li><a href="/about">
                                                    {{display('about-us')}}
                                                </a></li>
                                            <li><a href="/contact">
                                                    {{display('Contact Us')}}
                                                </a></li>

                                        </ul>
                                    </div>
                                </h4>
                            </div>
                            <div class="col-lg-3 col-sm-6 widget-list">
                                <h4 class="widget-title">
                                    <div class="widget-list">
                                        <ul>
                                            <li><a href="/terms">
                                                    {{display('Terms and Conditions')}}
                                                </a></li>
                                            <li><a href="/privacy">
                                                    {{display('Privacy policy')}}
                                                </a></li>

                                            <li><a href="/use">
                                                    {{display('how to use')}}
                                                </a></li>
                                            <li><a href="#"></a></li>
                                        </ul>
                                    </div>
                                </h4>
                            </div>
                            <div class="col-lg-3 col-sm-6 widget-list">
                                <div class="widget-list">
                                    <div class="rq-newsletter">
                                        <h4 class="widget-title">
                                            {{display('Sign up for get our newsletter')}}
                                        </h4>
                                        <form action="/" method="get"
                                            id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form"
                                            class="validate rq-newsletter-form" target="_blank">

                                            <input type="email" value="" name="EMAIL" placeholder="{{display('Your Email')}}..."
                                                class="fq-newsletter-form" required>
                                            <button class="rq-btn" type="submit"><i
                                                    class="fas fa-paper-plane"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="rq-copyright-section"
                style="background-color: #191919;background-repeat: repeat-x;background-size: cover; -webkit-background-size: cover;background-position: center center;background-attachment: scroll;">
                <div class="container">
                    <div class="copyright-content">
                        <p>
                            <a href="/">
                                <!-- <img
                src="https://n8n4c4t5.stackpathcdn.com/turbo/motor-bike/wp-content/uploads/sites/3/2018/09/logo-1.png"
                alt="logo"> -->

                                <img class="footer-logo" src="/assets/imgs/logo.png" alt="logo">
                            </a>
                            {{display('© Copyright 2020. All right reserved.')}}
                        </p>
                        <ul class="list-unstyled social-list">
                            <li><a href="http://www.facebook.com/" target="_blank"><i class="fab fa-facebook"></i></a>
                            </li>
                            <li><a href="http://www.twitter.com/" target="_blank"><i class="fab fa-twitter"></i></a>
                            </li>
                            <li><a href="http://www.youtube.com/" target="_blank"><i class="fab fa-youtube"></i></a>
                            </li>
                            <li><a href="http://www.instagram.com/" target="_blank"><i class="fab fa-instagram"></i></a>
                            </li>
                            <li><a href="http://www.dribble.com/" target="_blank"><i class="fab fa-dribble"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>

        <script type='text/javascript' src='/assets/js/jquery.js' id='jquery-core-js'></script>

        <script type='text/javascript' src='/assets/js/custom.js' id='turbo-custom-scripts-js'></script>
        <script type='text/javascript' src='/assets/js/istrope.js' id='isotope.pkgd.min-js'></script>
        <script type='text/javascript' src='/assets/js/imagesloaded.js' id='imagesloaded.pkgd.min-js'></script>
        @stack('scripts')
        <script>
            jQuery('body').on('click', '.close', function(){
                jQuery(this).parent().remove()
                // console.log('test');
            }) 
   

        </script>
</body>

</html>