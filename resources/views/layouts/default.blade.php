<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
        @section('title')
        | Abuzuri Urbanistice
        @show
    </title>
    <link rel="shortcut icon" href="img/favicon.ico">
    <!--global css starts-->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/fonts/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/color.css') }}" id="color-change">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/jslider.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/leaflet.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/loader.css') }}">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <!--end of global css-
    <!--page level css-->
    @yield('header_styles')
    <!--end of page level css-->
</head>

<body class="pagewrap full-height-map nav-down">

<!-- slider / breadcrumbs section -->
@yield('top')

<!-- Content -->
@yield('content')

<!-- Footer Section Start -->
<section id="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="footer_widget">
                    <div class="footer-logo"><a href="index_1.html"><img class="logo-bottom" src="assets/frontend/img/logo2.png" alt=""></a></div>
                    <div class="footer_contact">
                        <p>Netus ut pede mus vestibulum montes. Mus. Pretium. Mattis habitant netus ligula ridiculus a nam bibendum fusce litora. Ac ullamcorper blandit, viverra pellentesque scelerisque. Phasellus aptent sociosqu nec posuere.</p>
                    </div>
                    <div class="socail_area">
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="footer_widget">
                    <div class="footer-title">
                        <h4>Get In Touch</h4>
                    </div>
                    <div class="footer_contact">
                        <ul>
                            <li> <i class="fa fa-map-marker" aria-hidden="true"></i>
                                <div class="ftr-list">
                                    <h6 class="touch-title">Office Address</h6>
                                    <span>1707 Orlando Central pkwy ste 100 Orlando FL, USA</span>
                                </div>
                            </li>
                            <li> <i class="fa fa-phone" aria-hidden="true"></i>
                                <div class="ftr-list">
                                    <h6 class="touch-title">Call Us 24/7</h6>
                                    <span>(+241) 542 34251, (+241) 234 88232</span>
                                </div>
                            </li>
                            <li> <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                <div class="ftr-list">
                                    <h6 class="touch-title">Email Address</h6>
                                    <span>info@webmail.com</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="footer_widget">
                    <div class="footer-title">
                        <h4>Quick Links</h4>
                    </div>
                    <div class="footer_contact">
                        <ul>
                            <li><a href="faq.html">Freequinly Ask Question</a></li>
                            <li><a href="about.html">About Our Company</a></li>
                            <li><a href="our_service.html">Our Professional Services</a></li>
                            <li><a href="terms_and_condition.html">Terms and Conditions</a></li>
                            <li><a href="submit_property.html">Submit Your Property</a></li>
                            <li><a href="#">Become A Member</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="footer_area">
                    <div class="footer-title">
                        <h4>Newslatter</h4>
                    </div>
                    <div class="footer_contact">
                        <p>Subscribe to our newsletter and we will inform your about newset projects.</p>
                        <div class="news_letter">
                            <form action="#" method="post">
                                <input type="email" name="email" placeholder="Enter Your Email" class="news_email">
                                <button type="submit" name="submit" class="btn btn-default">subscribe</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- //Footer Section End -->
<!-- Bottom Footer Start -->
<div id="bottom_footer">
    <div class="reserve_text"> <span>Copyright &copy; 2017 Uniland All Right Reserve</span> </div>
</div>
<!-- Bottom Footer End -->

<!-- Scroll to top -->
<div class="scroll-to-top">
    <a href="#" class="scroll-btn" data-target=".pagewrap"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
</div>
<!-- End Scroll To top -->



<!--global js starts-->
<script src="{{ asset('assets/frontend/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/bootstrap-select.js') }}"></script>
<script src="{{ asset('assets/frontend/js/YouTubePopUp.jquery.js') }}"></script>
<script src="{{ asset('assets/frontend/js/jquery.fancybox.pack.js') }}"></script>
<script src="{{ asset('assets/frontend/js/jquery.fancybox-media.js') }}"></script>
<script src="{{ asset('assets/frontend/js/owl.js') }}"></script>
<script src="{{ asset('assets/frontend/js/mixitup.js') }}"></script>
<script src="{{ asset('assets/frontend/js/wow.js') }}"></script>
<script src="{{ asset('assets/frontend/js/jshashtable-2.1_src.js') }}"></script>
<script src="{{ asset('assets/frontend/js/jquery.numberformatter-1.2.3.js') }}"></script>
<script src="{{ asset('assets/frontend/js/tmpl.js') }}"></script>
<script src="{{ asset('assets/frontend/js/jquery.dependClass-0.1.js') }}"></script>
<script src="{{ asset('assets/frontend/js/draggable-0.1.js') }}"></script>
<script src="{{ asset('assets/frontend/js/jquery.slider.js') }}"></script>
<script src="{{ asset('assets/frontend/js/custom.js') }}"></script>
<!--global js end-->
<!-- begin page level js -->
@yield('footer_scripts')
<!-- end page level js -->

</body>

</html>
