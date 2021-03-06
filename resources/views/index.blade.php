@extends('layouts/default')

{{-- Page title --}}
@section('title')
Home
@parent
@stop
@section('header_styles')


    <style>
        /* styles for '...' */
        .block-with-text {
            /* hide text if it more than N lines  */
            overflow: hidden;
            /* for set '...' in absolute position */
            position: relative;
            /* use this value to count block height */
            line-height: 1.2em;
            /* max-height = line-height (1.2) * lines max number (3) */
            max-height: 3.1em;
            /* fix problem when last visible word doesn't adjoin right side  */
            text-align: justify;
            /* place for '...' */
            margin-right: -1em;
            padding-right: 1em;
        }
        /* create the ... */
        .block-with-text:before {
            /* points in the end */
            content: '...';
            /* absolute position */
            position: absolute;
            /* set position to right bottom corner of block */
            right: 0;
            bottom: 0;
        }
        /* hide ... if we have text, which is less than or equal to max lines */
        .block-with-text:after {
            /* points in the end */
            content: '';
            /* absolute position */
            position: absolute;
            /* set position to right bottom corner of text */
            right: 0;
            /* set width and height */
            width: 1em;
            height: 1em;
            margin-top: 0.2em;
            /* bg color = bg color under block */
            background: white;
        }
    </style>
@stop

{{-- content --}}
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('content')
    <!-- Page Loader -->
    <div class="loading-page">
        <div class="sk-circle">
            <div class="sk-circle1 sk-child"></div>
            <div class="sk-circle2 sk-child"></div>
            <div class="sk-circle3 sk-child"></div>
            <div class="sk-circle4 sk-child"></div>
            <div class="sk-circle5 sk-child"></div>
            <div class="sk-circle6 sk-child"></div>
            <div class="sk-circle7 sk-child"></div>
            <div class="sk-circle8 sk-child"></div>
            <div class="sk-circle9 sk-child"></div>
            <div class="sk-circle10 sk-child"></div>
            <div class="sk-circle11 sk-child"></div>
            <div class="sk-circle12 sk-child"></div>
        </div>
    </div>
    <!-- End Loader -->

    <!-- Slider Part Start -->
    <div id="map-banner">
        <div class="full-map">
            <div id="map"></div>
        </div>
        <!-- Search Form On Map -->
        <div class="search-box-map hidden">
            <div id="find-location">
                <div class="map-search">
                    <form action="#" method="post" class="property_filter_input">
                        <h4 class="search-form-title">Search Property</h4>
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <select class="selectpicker form-control">
                                    <option>Any Status</option>
                                    <option>For Rent</option>
                                    <option>For Sale</option>
                                </select>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <select class="selectpicker form-control">
                                    <option>Any Type</option>
                                    <option>House</option>
                                    <option>Office</option>
                                    <option>Appartment</option>
                                    <option>Condos</option>
                                    <option>Villa</option>
                                    <option>Small Family</option>
                                    <option>Single Room</option>
                                </select>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <select class="selectpicker form-control" data-live-search="true">
                                    <option>Any State</option>
                                    <option>New york</option>
                                    <option>Sydney</option>
                                    <option>Washington</option>
                                    <option>Las vegas</option>
                                </select>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <select class="selectpicker form-control">
                                    <option>Bedrs</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>6</option>
                                </select>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <select class="selectpicker form-control">
                                    <option>Baths</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                </select>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="price_range">
                                    <div class="price-filter">
											<span class="price-slider">
												<input class="filter_price" type="text" name="price" value="0;1000000" />
											</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <input type="submit" name="search" class="btn btn-default" value="Search">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Search Form On Map -->
    </div>
    <!-- Slider Part End -->

    <!-- Color Settings -->
    <div class="color-panel">
        <div class="on-panel"><img src="assets/frontend/img/icons/settings.png" alt=""></div>
        <div class="panel-box">
            <span class="panel-title">Change Colors</span>
            <ul class="color-box">
                <li class="green" data-path="css/colors/green.css" data-image="assets/frontend/img/logo1.png" data-target="assets/frontend/img/logo2.png"></li>
                <li class="blue" data-path="css/colors/blue.css" data-image="assets/frontend/img/logo1_blue.png" data-target="assets/frontend/img/logo2_blue.png"></li>
                <li class="red" data-path="css/colors/red.css" data-image="assets/frontend/img/logo1_red.png" data-target="assets/frontend/img/logo2_red.png"></li>
                <li class="purple" data-path="css/colors/purple.css" data-image="assets/frontend/img/logo1_purple.png" data-target="assets/frontend/img/logo2_purple.png"></li>
                <li class="yellow" data-path="css/colors/yellow.css" data-image="assets/frontend/img/logo1_yellow.png" data-target="assets/frontend/img/logo2_yellow.png"></li>
                <li class="orange" data-path="css/colors/orange.css" data-image="assets/frontend/img/logo1_orange.png" data-target="assets/frontend/img/logo2_orange.png"></li>
                <li class="magento" data-path="css/colors/magento.css" data-image="assets/frontend/img/logo1_magento.png" data-target="assets/frontend/img/logo2_magento.png"></li>
                <li class="turquoise" data-path="css/colors/turquoise.css" data-image="assets/frontend/img/logo1_turquoise.png" data-target="assets/frontend/img/logo2_turquoise.png"></li>
                <li class="lemon" data-path="css/colors/lemon.css" data-image="assets/frontend/img/logo1_lemon.png" data-target="assets/frontend/img/logo2_lemon.png"></li>
            </ul>
        </div>
    </div>
    <!-- End Color Settings -->

    <header id="header" class="fixed-header">
        <!-- Nav Header Start -->
        <div id="nav_header">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <nav class="navbar navbar-default nav_edit">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a class="navbar-brand" href="#"><img class="nav-logo" src="assets/frontend/img/logo1.png" alt=""></a>
                            </div>
                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse my_nav" id="bs-example-navbar-collapse-1">
                                <div class="submit_property">
                                    <a href="submit_property.html"><i class="fa fa-plus" aria-hidden="true"></i>Submit Property</a>
                                </div>
                                <ul class="nav navbar-nav navbar-right nav_text">
                                    <li class="dropdown">
                                        <a href="index_1.html" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Home <i class="fa fa-caret-down" aria-hidden="true"></i></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="index_1.html">Simple Image Slider</a></li>
                                            <li><a href="index_2.html">Fixed Height Map</a></li>
                                            <li><a href="index_3.html">Video Banner + Search</a></li>
                                            <li><a href="index_4.html">Fixed Banner + Search</a></li>
                                            <li><a href="index_5.html">Property Slide</a></li>
                                            <li><a href="index_6.html">Full Height Map + Nav</a></li>
                                            <li><a href="index_7.html">Fixed Height Map + Search</a></li>
                                            <li class="active"><a href="index_8.html">Full Height Map + Search</a></li>
                                            <li><a href="index_9.html">Map Left + Search Right</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Properties <i class="fa fa-caret-down" aria-hidden="true"></i></a>
                                        <ul class="dropdown-menu">
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Property List <i class="fa fa-caret-right" aria-hidden="true"></i></a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="property_list.html">Right Sidebar</a></li>
                                                    <li><a href="property_list_left.html">Left Sidebar</a></li>
                                                    <li><a href="property_list_full.html">Full Width</a></li>
                                                </ul>
                                            </li>
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Property Grid <i class="fa fa-caret-right" aria-hidden="true"></i></a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="property_grid.html">Right Sidebar</a></li>
                                                    <li><a href="property_grid_left.html">Left Sidebar</a></li>
                                                    <li><a href="property_grid_full.html">Full Width</a></li>
                                                </ul>
                                            </li>
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Single Properties <i class="fa fa-caret-right" aria-hidden="true"></i></a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="single_property.html">Single Property 1</a></li>
                                                    <li><a href="single_property_2.html">Single Property 2</a></li>
                                                    <li><a href="single_property_3.html">Single Property 3</a></li>
                                                    <li><a href="single_property_4.html">Single Property 4</a></li>
                                                    <li><a href="single_property_5.html">Single Property 5</a></li>
                                                </ul>
                                            </li>
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Property With Map <i class="fa fa-caret-right" aria-hidden="true"></i></a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="property_grid_map.html">Grid View</a></li>
                                                    <li><a href="property_list_map.html">List View</a></li>
                                                    <li><a href="property_grid_fullmap.html">Grid View Full Map</a></li>
                                                    <li><a href="property_list_fullmap.html">List View Full Map</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Agents <i class="fa fa-caret-down" aria-hidden="true"></i></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="agents.html">Agents</a></li>
                                            <li><a href="agent_profile_grid.html">Agent Profile Grid</a></li>
                                            <li><a href="agent_profile_list.html">Agent Profile List</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pages <i class="fa fa-caret-down" aria-hidden="true"></i></a>
                                        <ul class="dropdown-menu">
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">About <i class="fa fa-caret-right" aria-hidden="true"></i></a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="about.html">About Us</a></li>
                                                    <li><a href="mission.html">Our Mission</a></li>
                                                    <li><a href="career.html">Careers</a></li>
                                                    <li><a href="award.html">Awards</a></li>
                                                    <li><a href="testimonial.html">Testimonials</a></li>
                                                </ul>
                                            </li>
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">My Account <i class="fa fa-caret-right" aria-hidden="true"></i></a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="my_profile.html">My Profile</a></li>
                                                    <li><a href="profile_media.html">Social Media</a></li>
                                                    <li><a href="my_properties.html">My Properties</a></li>
                                                    <li><a href="my_favorite.html">Favorited Properties</a></li>
                                                    <li><a href="submit_property.html">Submit New Property</a></li>
                                                    <li><a href="message.html">Message</a></li>
                                                    <li><a href="comments.html">Feedback and Comments</a></li>
                                                    <li><a href="invoices.html">Payments and Invoice</a></li>
                                                    <li><a href="change_password.html">Change Password</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="our_service.html">Our Service</a></li>
                                            <li><a href="submit_property.html">Submit Property</a></li>
                                            <li><a href="terms_and_condition.html">Terms And Condition</a></li>
                                            <li><a href="pricing_table.html">Pricing Table</a></li>
                                            <li><a href="invoice_details.html">Invoice</a></li>
                                            <li><a href="message_view.html">Message</a></li>
                                            <li><a href="error.html">Error Page</a></li>
                                            <li><a href="faq.html">FAQ</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Blog <i class="fa fa-caret-down" aria-hidden="true"></i></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="blog_grid.html">Blog Grid</a></li>
                                            <li><a href="blog.html">Blog List</a></li>
                                            <li><a href="blog_detail.html">Blog Detail</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="contact.html">Contact</a></li>
                                </ul>
                            </div>
                            <!-- /.navbar-collapse -->
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- Nav Header End -->
    </header>

    <!-- Offer Part Start -->
    <section id="offer-style-3">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="offer_area wow fadeInLeft" data-wow-delay="200ms" data-wow-duration="1000ms">
                        <div class="circle_area"><i class="flaticon-home-1"></i></div>
                        <a href="#"><h5 class="offer-title">Property Booking</h5></a>
                        <p>Nunc. Lectus eget. Iaculis dui velit velit turpis lacus nostra a aliquet integer</p>
                        <a href="#" class="btn-link">Read More</a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="offer_area wow fadeInLeft" data-wow-delay="100ms" data-wow-duration="1000ms">
                        <div class="circle_area"><i class="flaticon-pencil-and-paper"></i></div>
                        <a href="#"><h5 class="offer-title">Payment Guarantee</h5></a>
                        <p>Nunc. Lectus eget. Iaculis dui velit velit turpis lacus nostra a aliquet integer</p>
                        <a href="#" class="btn-link">Read More</a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="offer_area wow fadeInRight" data-wow-delay="100ms" data-wow-duration="1000ms">
                        <div class="circle_area"><i class="flaticon-home"></i></div>
                        <a href="#"><h5 class="offer-title">House Management</h5></a>
                        <p>Nunc. Lectus eget. Iaculis dui velit velit turpis lacus nostra a aliquet integer</p>
                        <a href="#" class="btn-link">Read More</a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="offer_area wow fadeInRight" data-wow-delay="200ms" data-wow-duration="1000ms">
                        <div class="circle_area"><i class="flaticon-connections"></i></div>
                        <a href="#"><h5 class="offer-title">Property Deal</h5></a>
                        <p>Nunc. Lectus eget. Iaculis dui velit velit turpis lacus nostra a aliquet integer</p>
                        <a href="#" class="btn-link">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Offer Part End -->

    <!-- Recent Property Start -->
    <section id="recent_property">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title-row">
                        <h3 class="section_title_blue">Recent <span>Properties</span></h3>
                    </div>
                    <a href="property_grid.html" class="property_link">View All Properties</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="property_grid">
                        <div class="img_area">
                            <div class="sale_btn">Rent</div>
                            <a href="#"><img src="assets/frontend/img/property_grid/property_grid-4.png" alt=""></a>
                            <div class="sale_amount">2 Hours Ago</div>
                            <div class="hover_property">
                                <ul>
                                    <li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-link" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="property-text">
                            <a href="#">
                                <h5 class="property-title">Lovelece Road Greenfield</h5>
                            </a> <span><i class="fa fa-map-marker" aria-hidden="true"></i> 4213 Duff Avenue South Burlington, VT 05403 </span>
                            <div class="quantity">
                                <ul>
                                    <li><span>Area</span>1200 Sqft</li>
                                    <li><span>Rooms</span>7</li>
                                    <li><span>Beds</span>5</li>
                                    <li><span>Baths</span>4</li>
                                    <li><span>Garage</span>1</li>
                                </ul>
                            </div>
                        </div>
                        <div class="bed_area">
                            <ul>
                                <li>$850/mo</li>
                                <li class="flat-icon"><a href="#"><i class="flaticon-like"></i></a></li>
                                <li class="flat-icon"><a href="#"><i class="flaticon-connections"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="property_grid">
                        <div class="img_area">
                            <div class="sale_btn">Sale</div>
                            <div class="featured_btn">Featured</div>
                            <a href="#"><img src="assets/frontend/img/property_grid/property_grid-5.png" alt=""></a>
                            <div class="sale_amount">2 Hours Ago</div>
                            <div class="hover_property">
                                <ul>
                                    <li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-link" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="property-text">
                            <a href="#">
                                <h5 class="property-title">Luxury Condos Infront of River</h5>
                            </a> <span><i class="fa fa-map-marker" aria-hidden="true"></i> 2305 Tree Frog Lane Overlandpk, MO 66210 </span>
                            <div class="quantity">
                                <ul>
                                    <li><span>Area</span>1600 Sqft</li>
                                    <li><span>Rooms</span>7</li>
                                    <li><span>Beds</span>4</li>
                                    <li><span>Baths</span>3</li>
                                    <li><span>Garage</span>1</li>
                                </ul>
                            </div>
                        </div>
                        <div class="bed_area">
                            <ul>
                                <li>$1,205,500</li>
                                <li class="flat-icon"><a href="#"><i class="flaticon-like"></i></a></li>
                                <li class="flat-icon"><a href="#"><i class="flaticon-connections"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="property_grid">
                        <div class="img_area">
                            <div class="sale_btn">Rent</div>
                            <a href="#"><img src="assets/frontend/img/property_grid/property_grid-6.png" alt="" /></a>
                            <div class="sale_amount">2 Hours Ago</div>
                            <div class="hover_property">
                                <ul>
                                    <li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-link" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="property-text">
                            <a href="#">
                                <h5 class="property-title">Park Road Appartment Rent</h5>
                            </a> <span><i class="fa fa-map-marker" aria-hidden="true"></i> 4133 Arbor Court Worland, WY 82401
								</span>
                            <div class="quantity">
                                <ul>
                                    <li><span>Area</span>2100 Sqft</li>
                                    <li><span>Rooms</span>9</li>
                                    <li><span>Beds</span>5</li>
                                    <li><span>Baths</span>4</li>
                                    <li><span>Garage</span>1</li>
                                </ul>
                            </div>
                        </div>
                        <div class="bed_area">
                            <ul>
                                <li>$1300/mo</li>
                                <li class="flat-icon"><a href="#"><i class="flaticon-like"></i></a></li>
                                <li class="flat-icon"><a href="#"><i class="flaticon-connections"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="property_grid">
                        <div class="img_area">
                            <div class="sale_btn">Rent</div>
                            <div class="featured_btn">Featured</div>
                            <a href="#"><img src="assets/frontend/img/property_grid/property_grid-7.png" alt=""></a>
                            <div class="sale_amount">10 Hours Ago</div>
                            <div class="hover_property">
                                <ul>
                                    <li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-link" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="property-text">
                            <a href="#">
                                <h5 class="property-title">Lovelece Road Greenfield</h5>
                            </a> <span><i class="fa fa-map-marker" aria-hidden="true"></i> 4213 Duff Avenue South Burlington, VT 05403
								</span>
                            <div class="quantity">
                                <ul>
                                    <li><span>Area</span>1600 Sqft</li>
                                    <li><span>Rooms</span>7</li>
                                    <li><span>Beds</span>5</li>
                                    <li><span>Baths</span>4</li>
                                    <li><span>Garage</span>1</li>
                                </ul>
                            </div>
                        </div>
                        <div class="bed_area">
                            <ul>
                                <li>$850/mo</li>
                                <li class="flat-icon"><a href="#"><i class="flaticon-like"></i></a></li>
                                <li class="flat-icon"><a href="#"><i class="flaticon-connections"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="property_grid">
                        <div class="img_area">
                            <div class="sale_btn">Sale</div>
                            <a href="#"><img src="assets/frontend/img/property_grid/property_grid-8.png" alt=""></a>
                            <div class="sale_amount">12 Hours Ago</div>
                            <div class="hover_property">
                                <ul>
                                    <li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-link" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="property-text">
                            <a href="#">
                                <h5 class="property-title">Luxury Condos Infront of River</h5>
                            </a> <span><i class="fa fa-map-marker" aria-hidden="true"></i> 2305 Tree Frog Lane Overlandpk, MO 66210 </span>
                            <div class="quantity">
                                <ul>
                                    <li><span>Area</span>1600 Sqft</li>
                                    <li><span>Rooms</span>7</li>
                                    <li><span>Beds</span>5</li>
                                    <li><span>Baths</span>4</li>
                                    <li><span>Garage</span>1</li>
                                </ul>
                            </div>
                        </div>
                        <div class="bed_area">
                            <ul>
                                <li>$1,205,500</li>
                                <li class="flat-icon"><a href="#"><i class="flaticon-like"></i></a></li>
                                <li class="flat-icon"><a href="#"><i class="flaticon-connections"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="property_grid">
                        <div class="img_area">
                            <div class="sale_btn">Sale</div>
                            <a href="#"><img src="assets/frontend/img/property_grid/property_grid-1.png" alt=""></a>
                            <div class="sale_amount">15 Hours Ago</div>
                            <div class="hover_property">
                                <ul>
                                    <li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-link" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="property-text">
                            <a href="#"><h5 class="property-title">New Developed Condos</h5></a>
                            <span><i class="fa fa-map-marker" aria-hidden="true"></i>367 Sharon Lane South Bend, IN 4601 </span>
                            <div class="quantity">
                                <ul>
                                    <li><span>Area</span>1200 Sqft</li>
                                    <li><span>Rooms</span>7</li>
                                    <li><span>Beds</span>5</li>
                                    <li><span>Baths</span>4</li>
                                    <li><span>Garage</span>1</li>
                                </ul>
                            </div>
                        </div>
                        <div class="bed_area">
                            <ul>
                                <li>$152,000</li>
                                <li class="flat-icon"><a href="#"><i class="flaticon-like"></i></a></li>
                                <li class="flat-icon"><a href="#"><i class="flaticon-connections"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="property_grid">
                        <div class="img_area">
                            <div class="sale_btn">Sale</div>
                            <a href="#"><img src="assets/frontend/img/property_grid/property_grid-8.png" alt=""></a>
                            <div class="sale_amount">17 Hours Ago</div>
                            <div class="hover_property">
                                <ul>
                                    <li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-link" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="property-text">
                            <a href="#"><h5 class="property-title">Renovate Small Condos</h5></a>
                            <span><i class="fa fa-map-marker" aria-hidden="true"></i>499 Tenmile Road Boston, MA 02110 </span>
                            <div class="quantity">
                                <ul>
                                    <li><span>Area</span>1200 Sqft</li>
                                    <li><span>Rooms</span>7</li>
                                    <li><span>Beds</span>5</li>
                                    <li><span>Baths</span>4</li>
                                    <li><span>Garage</span>1</li>
                                </ul>
                            </div>
                        </div>
                        <div class="bed_area">
                            <ul>
                                <li>$152,000</li>
                                <li class="flat-icon"><a href="#"><i class="flaticon-like"></i></a></li>
                                <li class="flat-icon"><a href="#"><i class="flaticon-connections"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="property_grid">
                        <div class="img_area">
                            <div class="sale_btn">Rent</div>
                            <a href="#"><img src="assets/frontend/img/property_grid/property_grid-2.png" alt=""></a>
                            <div class="sale_amount">20 Hours Ago</div>
                            <div class="hover_property">
                                <ul>
                                    <li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-link" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="property-text">
                            <a href="#"><h5 class="property-title">Telico Villas House and Condos</h5></a>
                            <span><i class="fa fa-map-marker" aria-hidden="true"></i>1751 Finwood Road Freehold, NJ 07728 </span>
                            <div class="quantity">
                                <ul>
                                    <li><span>Area</span>1200 Sqft</li>
                                    <li><span>Rooms</span>7</li>
                                    <li><span>Beds</span>3</li>
                                    <li><span>Baths</span>3</li>
                                    <li><span>Garage</span>1</li>
                                </ul>
                            </div>
                        </div>
                        <div class="bed_area">
                            <ul>
                                <li>$850/mo</li>
                                <li class="flat-icon"><a href="#"><i class="flaticon-like"></i></a></li>
                                <li class="flat-icon"><a href="#"><i class="flaticon-connections"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="property_grid">
                        <div class="img_area">
                            <div class="sale_btn">Rent</div>
                            <div class="featured_btn">Featured</div>
                            <a href="#"><img src="assets/frontend/img/property_grid/property_grid-3.png" alt=""></a>
                            <div class="sale_amount">1 Day Ago</div>
                            <div class="hover_property">
                                <ul>
                                    <li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-link" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="property-text">
                            <a href="#"><h5 class="property-title">Telico Villas House and Condos</h5></a>
                            <span><i class="fa fa-map-marker" aria-hidden="true"></i>1751 Finwood Road Freehold, NJ 07728 </span>
                            <div class="quantity">
                                <ul>
                                    <li><span>Area</span>1200 Sqft</li>
                                    <li><span>Rooms</span>5</li>
                                    <li><span>Beds</span>3</li>
                                    <li><span>Baths</span>3</li>
                                    <li><span>Garage</span>1</li>
                                </ul>
                            </div>
                        </div>
                        <div class="bed_area">
                            <ul>
                                <li>$850/mo</li>
                                <li class="flat-icon"><a href="#"><i class="flaticon-like"></i></a></li>
                                <li class="flat-icon"><a href="#"><i class="flaticon-connections"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Recent Property End -->

    <!-- Popular Category -->
    <section id="popular-category">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title-row">
                        <h3 class="section_title_blue">Popular <span>Category</span></h3>
                        <div class="sub-title">
                            <p>Pellentesque porttitor dolor natoque pretium. Scelerisque Quisque, vel curabitur lobortis potenti primis praesent volutpat mi nonummy faucibus tempor consequat vulputate.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 col-sm-8">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="category-grid wow zoomIn" data-wow-delay="100ms" data-wow-duration="1000ms">
                                <div class="category-img ctg-grid ctg-1"></div>
                                <div class="overlay">
                                    <div class="category-text">
                                        <a href="#"><h3 class="overlay-title">Appartment</h3></a>
                                        <span>34 Properties</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="category-grid wow zoomIn" data-wow-delay="100ms" data-wow-duration="1000ms">
                                <div class="category-img ctg-grid ctg-2"></div>
                                <div class="overlay">
                                    <div class="category-text">
                                        <a href="#"><h3 class="overlay-title">Condos</h3></a>
                                        <span>20 Properties</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="category-grid wow zoomIn" data-wow-delay="100ms" data-wow-duration="1000ms">
                                <div class="category-img ctg-grid ctg-3"></div>
                                <div class="overlay">
                                    <div class="category-text">
                                        <a href="#"><h3 class="overlay-title">Condos</h3></a>
                                        <span>20 Properties</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="category-grid wow zoomIn" data-wow-delay="100ms" data-wow-duration="1000ms">
                                <div class="category-img ctg-grid ctg-4"></div>
                                <div class="overlay">
                                    <div class="category-text">
                                        <a href="#"><h3 class="overlay-title">Villa</h3></a>
                                        <span>27 Properties</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Popular Category End -->

    <!-- Service Section Start -->
    <section id="service_part3">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title-row">
                        <h3 class="section_title_blue">What you are looking for?</h3>
                        <div class="sub-title">
                            <p>Pellentesque porttitor dolor natoque pretium. Scelerisque Quisque, vel curabitur lobortis potenti primis praesent volutpat mi nonummy faucibus tempor consequat vulputate.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="service_area wow fadeInUp" data-wow-delay="100ms" data-wow-duration="1500ms">
                        <div class="service_icon"><i class="glyph-icon flaticon-home"></i></div>
                        <a href="property_grid.html"><h4 class="service_title">House</h4></a>
                        <p>Nisi. Tellus lobortis dapibus erat eu et. Senectus quam vitae in arcu nisi quam</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="service_area wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                        <div class="service_icon"><i class="glyph-icon flaticon-signs"></i></div>
                        <a href="property_grid.html"><h4 class="service_title">Land</h4></a>
                        <p>Nisi. Tellus lobortis dapibus erat eu et. Senectus quam vitae in arcu nisi quam</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="service_area wow fadeInUp" data-wow-delay="300ms" data-wow-duration="1500ms">
                        <div class="service_icon"><i class="glyph-icon flaticon-office"></i></div>
                        <a href="property_grid.html"><h4 class="service_title">Office</h4></a>
                        <p>Nisi. Tellus lobortis dapibus erat eu et. Senectus quam vitae in arcu nisi quam</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="service_area wow fadeInUp" data-wow-delay="400ms" data-wow-duration="1500ms">
                        <div class="service_icon"><i class="glyph-icon flaticon-shop"></i></div>
                        <a href="property_grid.html"><h4 class="service_title">Business</h4></a>
                        <p>Nisi. Tellus lobortis dapibus erat eu et. Senectus quam vitae in arcu nisi quam </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Service Section End -->

    <!--achivement Section Start-->
    <div id="achivment">
        <div class="container">
            <div class="row">
                <div class="fact-counter">
                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <div class="achievement wow fadeIn" data-wow-duration="500ms">
                            <h2 class="counting" data-speed="3000" data-stop="1020">0</h2>
                            <p class="subject">Project Done</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <div class="achievement wow fadeIn" data-wow-duration="500ms">
                            <h2 class="counting" data-speed="3000" data-stop="960">0</h2>
                            <p class="subject">Satisfied Clients</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <div class="achievement wow fadeIn" data-wow-duration="500ms">
                            <h2 class="counting" data-speed="3000" data-stop="420">0</h2>
                            <p class="subject">Awards Win</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <div class="achievement wow fadeIn" data-wow-duration="500ms">
                            <h2 class="counting" data-speed="3000" data-stop="860">0</h2>
                            <p class="subject">Years Experience</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--achivement Section End-->

    <!-- Featured Section Start -->
    <section id="featured">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title-row">
                        <h3 class="section_title_blue">Featured <span>Property</span></h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="property_slide">
                        <div class="item">
                            <div class="property_grid">
                                <div class="img_area">
                                    <div class="sale_btn">Rent</div>
                                    <div class="featured_btn">Featured</div>
                                    <a href="#"><img src="assets/frontend/img/property_grid/property_grid-1.png" alt=""></a>
                                    <div class="sale_amount">1 Month Ago</div>
                                    <div class="hover_property">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                                            <li><a href="#"><i class="fa fa-link" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="property-text">
                                    <a href="#">
                                        <h5 class="property-title">Park Road Appartment Rent</h5>
                                    </a><span><i class="fa fa-map-marker" aria-hidden="true"></i> 3225 George Street Brooksville, FL 34610</span>
                                    <div class="quantity">
                                        <ul>
                                            <li><span>Area</span>2100 Sqft</li>
                                            <li><span>Rooms</span>8</li>
                                            <li><span>Beds</span>4</li>
                                            <li><span>Baths</span>3</li>
                                            <li><span>Garage</span>1</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="bed_area">
                                    <ul>
                                        <li>$1600/mo</li>
                                        <li class="flat-icon"><a href="#"><i class="flaticon-like"></i></a></li>
                                        <li class="flat-icon"><a href="#"><i class="flaticon-connections"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="property_grid">
                                <div class="img_area">
                                    <div class="sale_btn">Sale</div>
                                    <div class="featured_btn">Featured</div>
                                    <a href="#"><img src="assets/frontend/img/property_grid/property_grid-2.png" alt=""></a>
                                    <div class="sale_amount">5 Days Ago</div>
                                    <div class="hover_property">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                                            <li><a href="#"><i class="fa fa-link" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="property-text">
                                    <a href="#">
                                        <h5 class="property-title">Park Road Appartment Rent</h5>
                                    </a><span><i class="fa fa-map-marker" aria-hidden="true"></i> 3494 Lyon Avenue Middleboro, MA 02346 </span>
                                    <div class="quantity">
                                        <ul>
                                            <li><span>Area</span>1100 Sqft</li>
                                            <li><span>Rooms</span>5</li>
                                            <li><span>Beds</span>2</li>
                                            <li><span>Baths</span>2</li>
                                            <li><span>Garage</span>1</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="bed_area">
                                    <ul>
                                        <li>$1,410,000</li>
                                        <li class="flat-icon"><a href="#"><i class="flaticon-like"></i></a></li>
                                        <li class="flat-icon"><a href="#"><i class="flaticon-connections"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="property_grid">
                                <div class="img_area">
                                    <div class="sale_btn">Rent</div>
                                    <div class="featured_btn">Featured</div>
                                    <a href="#"><img src="assets/frontend/img/property_grid/property_grid-3.png" alt=""></a>
                                    <div class="sale_amount">10 Days Ago</div>
                                    <div class="hover_property">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                                            <li><a href="#"><i class="fa fa-link" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="property-text">
                                    <a href="#">
                                        <h5 class="property-title">Park Road Appartment Rent</h5>
                                    </a><span><i class="fa fa-map-marker" aria-hidden="true"></i> 39 Parrill Court Oak Brook, IN 60523 </span>
                                    <div class="quantity">
                                        <ul>
                                            <li><span>Area</span>1600 Sqft</li>
                                            <li><span>Rooms</span>7</li>
                                            <li><span>Beds</span>4</li>
                                            <li><span>Baths</span>3</li>
                                            <li><span>Garage</span>1</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="bed_area">
                                    <ul>
                                        <li>$1200/mo</li>
                                        <li class="flat-icon"><a href="#"><i class="flaticon-like"></i></a></li>
                                        <li class="flat-icon"><a href="#"><i class="flaticon-connections"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="property_grid">
                                <div class="img_area">
                                    <div class="sale_btn">Rent</div>
                                    <div class="featured_btn">Featured</div>
                                    <a href="#"><img src="assets/frontend/img/property_grid/property_grid-4.png" alt=""></a>
                                    <div class="sale_amount">3 Days Ago</div>
                                    <div class="hover_property">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                                            <li><a href="#"><i class="fa fa-link" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="property-text">
                                    <a href="#">
                                        <h5 class="property-title">Central Road Appartment Rent</h5>
                                    </a><span><i class="fa fa-map-marker" aria-hidden="true"></i> 39 Parrill Court Oak Brook, IN 60523 </span>
                                    <div class="quantity">
                                        <ul>
                                            <li><span>Area</span>1800 Sqft</li>
                                            <li><span>Rooms</span>8</li>
                                            <li><span>Beds</span>4</li>
                                            <li><span>Baths</span>3</li>
                                            <li><span>Garage</span>1</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="bed_area">
                                    <ul>
                                        <li>$1200/mo</li>
                                        <li class="flat-icon"><a href="#"><i class="flaticon-like"></i></a></li>
                                        <li class="flat-icon"><a href="#"><i class="flaticon-connections"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Featured Section End -->

    <!-- Client Feedback Section Start -->
    <section id="feedback">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="fedback_area">
                        <div class="row">
                            <div class="col-ms-12">
                                <div class="title-row">
                                    <h3 class="section_title_white">clients <span>feedback</span></h3>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-ms-12">
                                <div class="testimonials-carousel">
                                    <div class="item">
                                        <div class="feedback">
                                            <p>Posuere mus curabitur parturient scelerisque suspendisse elementum facilisis dignissim non purus torquent turpis interdum hendrerit erat ultrices pretium risus elementum. Magnis sit. Auctor quam. Mollis. Bibendum fames lacus. Fringilla aliquet mattis lacinia quam a montes maecenas parturient urna varius. Sollicitudin pede sapien taciti dui senectus sit diam curabitur Lacus sapien.</p>
                                            <div class="testimonial_person">
                                                <img class="avata" src="assets/frontend/img/testimonial/Johan-swift.png" alt="">
                                                <h5 class="client-name">Johan Swift</h5>
                                                <span>someone from company</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="feedback">
                                            <p>Posuere mus curabitur parturient scelerisque suspendisse elementum facilisis dignissim non purus torquent turpis interdum hendrerit erat ultrices pretium risus elementum. Magnis sit. Auctor quam. Mollis. Bibendum fames lacus. Fringilla aliquet mattis lacinia quam a montes maecenas parturient urna varius. Sollicitudin pede sapien taciti dui senectus sit diam curabitur Lacus sapien.</p>
                                            <div class="testimonial_person">
                                                <img class="avata" src="assets/frontend/img/testimonial/Johan-swift.png" alt="">
                                                <h5 class="client-name">Johan Swift</h5>
                                                <span>someone from company</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="feedback">
                                            <p>Posuere mus curabitur parturient scelerisque suspendisse elementum facilisis dignissim non purus torquent turpis interdum hendrerit erat ultrices pretium risus elementum. Magnis sit. Auctor quam. Mollis. Bibendum fames lacus. Fringilla aliquet mattis lacinia quam a montes maecenas parturient urna varius. Sollicitudin pede sapien taciti dui senectus sit diam curabitur Lacus sapien.</p>
                                            <div class="testimonial_person">
                                                <img class="avata" src="assets/frontend/img/testimonial/Johan-swift.png" alt="">
                                                <h5 class="client-name">Johan Swift</h5>
                                                <span>someone from company</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Client Feedback Section End -->

    <!-- Start Pricing Plans -->
    <section id="pricing">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title-row">
                        <h3 class="section_title_blue">Pricing <span>Plans</span></h3>
                        <div class="sub-title">
                            <p>Pellentesque porttitor dolor natoque pretium. Scelerisque Quisque, vel curabitur lobortis potenti primis praesent volutpat mi nonummy faucibus tempor consequat vulputate.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <div class="common-plan">
                        <span>Basic</span>
                        <div class="price">$0.00</div>
                        <p>Free subscribe for 30 days and we’ll list your property for customer search</p>
                        <ul class="features">
                            <li>Single Property Listing</li>
                            <li>30 Days Available / One time</li>
                            <li>One User Access</li>
                            <li>Email support available</li>
                            <li>No transacti help</li>
                        </ul>
                        <a href="#" class="btn btn-default">Get Started</a>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="feature-plan">
                        <span>Pro</span>
                        <div class="price">$29.99</div>
                        <p>Subscribe for 1 year property listing and keep your property top of the search list.</p>
                        <ul class="features">
                            <li>Unlimited Property Listing</li>
                            <li>1 Year Available</li>
                            <li>Unlimited User Access</li>
                            <li>Live Support 24/7 Days</li>
                            <li>Any type Transacti Facility and Help</li>
                            <li>Top Listing On Search</li>
                            <li>Suggest People and Advartisement</li>
                        </ul>
                        <a href="#" class="btn btn-default">Get Started</a>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="common-plan">
                        <span>Standard</span>
                        <div class="price">$9.99</div>
                        <p>Free subscribe for 30 days and we’ll list your property for customer search</p>
                        <ul class="features">
                            <li>Unlimited Property Listing</li>
                            <li>6 Month Available</li>
                            <li>One User Access</li>
                            <li>Live Support 24/7 Days</li>
                            <li>Any type Transacti Facility and Help</li>
                        </ul>
                        <a href="#" class="btn btn-default">Get Started</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Pricing Plans -->

    <!-- Register Section Start -->
    <section id="register-banner">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="reg_banner">
                        <h4 class="reg_banner_title">Are you looking for a House or Customer for your Property sale?</h4>
                        <span>Please click the button for register, we will become your best agent and help you for both.</span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="register_btn">
                        <a href="#" class="btn btn-primary">Register Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Register Section End -->
@stop
{{-- footer scripts --}}
@section('footer_scripts')
<!-- page level js starts-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD1hWquLT9SvRFXzQsY-iX3X24kt8cxVi8&callback=initMap"></script>
<script src="{{ asset('assets/frontend/js/map/markerwithlabel_packed.js') }}"></script>
<script src="{{ asset('assets/frontend/js/map/infobox.js') }}"></script>
<script src="{{ asset('assets/frontend/js/map/markerclusterer_packed.js') }}"></script>
<script src="{{ asset('assets/frontend/js/map/custom-map.js') }}"></script>
<script>
	$(document).ready(function() {
        _latitude = 45.66;
        _longitude = 25.61;
        createHomepageGoogleMap(_latitude,_longitude);
        $(window).load(function(){
            //initializeOwl(false);
        });
	});
</script>
<!--page level js ends-->
@stop


