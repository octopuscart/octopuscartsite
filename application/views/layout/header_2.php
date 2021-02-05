<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <?php
        meta_tags();
        ?>
        <!-- Favicon -->
        <link rel="shortcut icon" href="<?php echo base_url() . 'assets/images/logof.png'; ?>" type="image/x-icon">
        <link rel="icon" href="<?php echo base_url() . 'assets/images/logof.png'; ?>" type="image/x-icon">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Favicon -->
        <!-- Normalize CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme2/css/normalize.css">
        <!-- Main CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme2/css/main.css">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme2/css/bootstrap.min.css">
        <!-- Animate CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme2/css/animate.min.css">
        <!-- Font-awesome CSS-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme2/css/font-awesome.min.css">
        <!-- Flaticon CSS-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/theme2/css//font/flaticon.css">
        <!-- Owl Caousel CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme2/css/owl.carousel.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme2/css/owl.theme.default.min.css">
        <!-- Main Menu CSS-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme2/css/meanmenu.min.css">
        <!-- Nivo Slider CSS-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme2/lib/custom-slider/css/nivo-slider.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme2/lib/custom-slider/css/preview.css" type="text/css" media="screen" />
        <!-- Select2 CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme2/css/select2.min.css">
        <!-- Custom CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme2/css/style.css">

        <!-- no slider CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme2/js/vendor/nouislider.min.css">

        <!--custom css style-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme2/css/custom_style.css">

        <!-- Modernizr Js -->
        <script src="<?php echo base_url(); ?>assets/theme2/js/vendor/modernizr-2.8.3.min.js"></script>
        <!-- JavaScripts -->
        <script src="<?php echo base_url(); ?>assets/theme/js/vendors/modernizr.js"></script>

        <!--sweet alert-->
        <script src="<?php echo base_url(); ?>assets/theme/sweetalert2/sweetalert2.min.js"></script>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme/sweetalert2/sweetalert2.min.css">

        <!--angular js-->
        <script src="<?php echo base_url(); ?>assets/theme/angular/angular.min.js"></script>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
            <![endif]-->

    </head>


    <style>
        .preloadimage{
            background: black;
            top: 38%;
            position: absolute;
          
               margin-left: -50px;
        }
    </style>

    <!-- Modal Dialog Box End Here-->
    <!-- Preloader Start Here -->

    <!-- Preloader End Here -->
    <body ng-app="App">
        <div class="wrapper-area" >
            <!--[if lt IE 8]>
                <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
            <![endif]-->
            <!-- Add your site or application content here -->
            <!-- Header Area Start Here -->



            <script>


                var App = angular.module('App', []).config(function ($interpolateProvider, $httpProvider) {
                //$interpolateProvider.startSymbol('{$');
                //$interpolateProvider.endSymbol('$}');
                $httpProvider.defaults.headers.common = {};
                        $httpProvider.defaults.headers.post = {};
                });
                        var baseurl = "<?php echo site_url(); ?>";
                        var imageurlg = "<?php echo imageserver; ?>";
                        var globlecurrency = "<?php echo globle_currency; ?>";
                        var avaiblecredits = 0;</script>

            <style>
                .ownmenu .dropdown.megamenu .dropdown-menu li:last-child{
                    margin-bottom: 20px;
                }

                .ownmenu .dropdown.megamenu .dropdown-menu li a{
                    line-height: 25px;
                }
            </style>



            <!-- Header Area Start Here -->
            <header>
                <div class="header-area-style2" id="sticker">
                    <div class="header-top" style="  ">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12">
                                    <div class="account-wishlist">
                                        <ul>
                                          
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-2 hidden-xs">


                                    <?php
                                    $logoimg = "logo73.png";
                                    ?>

                                    <div class="logo-area">
                                        <a href="<?php echo site_url(); ?>"><img class="img-responsive" src="<?php echo base_url() . 'assets/images/' . $logoimg; ?>" alt="logo" style="    
                                                                                 position: absolute;
                                                                                 top: -22px;
                                                                                 height: 74px;
                                                                                 margin-left: -135px;"></a>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12">
                                    <ul class="header-cart-area">
                                        <!--                                        <li class="header-search" id="remote">
                                                                                    <form id="top-search-form" action="<?php echo site_url('Product/ProductSearch'); ?>">                           
                                                                                        <input type="text" name="keyword" class="search-input typeahead" placeholder="Search...." required="">
                                                                                        <a href="#" class="search-button"><i class="fa fa-search" aria-hidden="true"></i></a>
                                                                                        <button type="submit" style="height: 0px;width: 0px;opacity: 0;"></button>
                                                                                    </form>
                                                                                </li>-->


                                        <!--                                    <li class="header-search" >
                                                                                <form id="top-search-form" >                           
                                                                                        <input type="text" id="searchdata" class="search-input" placeholder="Search...." required="">
                                                                                        <a href="#" class="search-button"><i class="fa fa-search" aria-hidden="true"></i></a>
                                                                                </form>
                                                                            </li>-->

                                        <li>
                                            <div class="cart-area">
                                                <a href="#"><i class="fa fa-shopping-cart"  aria-hidden="true"></i><span style="background: #f01211">{{globleCartData.total_quantity}}</span></a>
                                                <ul ng-if="globleCartData.total_quantity">
                                                    <li  ng-repeat="product in globleCartData.products">

                                                        <div class="cart-single-product">
                                                            <div class="media">
                                                                <div class="pull-left cart-product-img">
                                                                    <a href="#">
                                                                        <div class="product_image_back1" style="background: url({{product.file_name}});height: 80px;width: 80px;"></div>

                                                                    <!--<img class="img-responsive" alt="product" src="{{product.file_name}}">-->
                                                                    </a>
                                                                </div>
                                                                <div class="media-body cart-content">
                                                                    <ul>
                                                                        <li>
                                                                            <h2 style="    white-space: nowrap;
                                                                                overflow: hidden;
                                                                                text-overflow: ellipsis;
                                                                                width: 250px;"><a href="#" style="">{{product.title}} - {{product.item_name}}</a></h2>
                                                                            <h3>                                                                 
                                                                                <p>
                                                                                    {{product.price|currency:" "}} X {{product.quantity}} 
                                                                                </p>
                                                                            </h3>
                                                                        </li>
                                                                        <li>
                                                                        </li>
                                                                        <li>
                                                                            <p></p>
                                                                        </li>
                                                                        <li>
                                                                            <a class="trash" href="#." ng-click="removeCart(product.product_id)"><i class="fa fa-trash-o"></i></a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>

                                                    <li>
                                                        <span><span>Sub Total</span></span><span>{{globleCartData.total_price|currency:"<?php echo globle_currency; ?> "}}</span>

                                                    </li>
                                                    <li>
                                                        <ul class="checkout">
                                                            <li><a href="<?php echo site_url("Cart/details"); ?>" class="btn-checkout"><i class="fa fa-shopping-cart" aria-hidden="true"></i>View Cart</a></li>
                                                            <!--<li><a href="<?php echo site_url("Cart/checkoutInit"); ?>" class="btn-checkout"><i class="fa fa-share" aria-hidden="true"></i>Checkout</a></li>-->
                                                        </ul>
                                                    </li>
                                                </ul>




                                            </div>
                                        </li>
                                        <li>
                                            <div class="additional-menu-area" id="additional-menu-area">



                                                <div id="mySidenav" class="sidenav">
                                                    <a href="#" class="closebtn">×</a>
                                                    <div class="sidenav-search">
                                                        <div class="input-group stylish-input-group" >
                                                            <input type="text" placeholder="Search Here . . ." class="form-control">
                                                            <span class="input-group-addon">
                                                                <button type="submit">
                                                                    <span class="glyphicon glyphicon-search"></span>
                                                                </button>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <ul class="sidenav-login-registration">

                                                       
                                                            <li>
                                                                <a href="<?php echo site_url("Account/login"); ?>">Login<span class="arrow"></span></a>
                                                            </li>
                                                            <li>
                                                                <a href="<?php echo site_url("Account/login"); ?>">Registration<span class="arrow"></span></a>
                                                            </li>
                                                       
                                                    </ul>
                                                    <h3 class="ctg-name-title">Order Now</h3>
                                                    <ul class="sidenav-nav">
                                                        <li><a href="<?php echo site_url('Product/ProductList/1/0') ?>">Shirt</a></li>
                                                        <li><a href="<?php echo site_url('Product/ProductList/2/0') ?>">Suit</a></li>
                                                        <li><a href="<?php echo site_url('Product/ProductList/4/0') ?>">Jacket</a></li>
                                                        <li><a href="<?php echo site_url('Product/ProductList/3/0') ?>">Pant</a></li>

                                                    </ul>
                                                    <!-- times-->
                                                </div>
                                                <span class="side-menu-open side-menu-trigger"><i class="fa fa-bars" aria-hidden="true"></i></span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="header-bottom">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="logo-area" style="    margin-top: 2px;">
                                        <a href="<?php echo site_url(); ?>">
                                            <img class="img-responsive" src="<?php echo base_url() . 'assets/images/' . $logoimg; ?>" alt="logo" style="    height:60px;padding-top: 4px;
                                                 padding-bottom: 6px;">
                                        </a>
                                    </div>
                                    <div class="main-menu-area home2-sticky-area">
                                        <nav>
                                            <ul>
                                                <li class="active"><a href="#">Home</a>
                                                    <ul>
                                                        <li><a href="#">FAQ'S</a></li>
                                                        <li><a href="<?php echo site_url("Shop/aboutus") ?>">About Us</a></li>
                                                    </ul>
                                                </li>
                                                <li ><a href="#">Order Now</a>
                                                    <ul>
                                                        <li><a href="<?php echo site_url('Product/ProductList/1/0') ?>">Shirt</a></li>
                                                        <li><a href="<?php echo site_url('Product/ProductList/2/0') ?>">Suit</a></li>
                                                        <li><a href="<?php echo site_url('Product/ProductList/4/0') ?>">Jacket</a></li>
                                                        <li><a href="<?php echo site_url('Product/ProductList/3/0') ?>">Pant</a></li>

                                                    </ul>
                                                </li>
                                                <li><a href="#">Catalogue</a></li>
                                                <li><a href="#">Schedule</a></li>
                                                <li><a href="#">Help</a></li>
                                                <li><a href="<?php echo site_url("Shop/contactus") ?>">Contact Us</a></li>
                                            </ul>
                                        </nav>
                                    </div>
                                    <div class="cart_header_stick">
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i><span>{{globleCartData.total_quantity}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Mobile Menu Area Start Here -->
                        <div class="mobile-menu-area">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mobile-menu">
                                            <nav id="dropdown">
                                                <ul>
                                                    <li class="active"><a href="#">Home</a>
                                                        <ul>
                                                            <li><a href="#">FAQ'S</a></li>
                                                            <li><a href="<?php echo site_url("Shop/aboutus") ?>">About Us</a></li>
                                                        </ul>
                                                    </li>
                                                    <li ><a href="#">Order Now</a>
                                                        <ul>
                                                            <li><a href="<?php echo site_url('Product/ProductList/1/0') ?>">Shirt</a></li>
                                                            <li><a href="<?php echo site_url('Product/ProductList/2/0') ?>">Suit</a></li>
                                                            <li><a href="<?php echo site_url('Product/ProductList/4/0') ?>">Jacket</a></li>
                                                            <li><a href="<?php echo site_url('Product/ProductList/3/0') ?>">Pant</a></li>

                                                        </ul>
                                                    </li>
                                                    <li><a href="#">Catalogue</a></li>
                                                    <li><a href="#">Schedule</a></li>
                                                    <li><a href="#">Help</a></li>
                                                    <li><a href="<?php echo site_url("Shop/contactus") ?>">Contact Us</a></li>
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Mobile Menu Area End Here -->
                    </div>
                </div>
            </header>
            <!-- Header Area End Here -->




            <!--mobile model-->


            <!--search_open-->
            <div class="modal fade model_search" id="searchModel" tabindex="-1" role="dialog" aria-labelledby="searchModelLabel">
                <div class="modal-dialog" role="document" style="margin-top: 60px;">
                    <div class="modal-content mobile_model_search">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                        </div>
                        <div class="modal-body">

                            <form id="top-search-form1" action="<?php echo site_url('Product/ProductSearch'); ?>">                           
                                <input type="text" name="keyword" class="search-input1 typeahead" placeholder="Search...." required="" style="width: 100%">
                                <button type="submit" style="height: 0px;width: 0px;opacity: 0;"></button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>



            <!-- Modal -->
            <div class="modal fade" id="mobileModel" tabindex="-1" role="dialog" aria-labelledby="mobileModelLabel">
                <div class="modal-dialog" role="document" style="margin-top: 60px;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="mobileModelLabel">Total: {{globleCartData.total_price|currency:" "}}</h4>
                        </div>
                        <div class="modal-body">
                            <div class="cart-area cart-area1">

                                <ul ng-if="globleCartData.total_quantity">
                                    <li  ng-repeat="product in globleCartData.products">

                                        <div class="cart-single-product">
                                            <div class="media">
                                                <div class="pull-left cart-product-img">
                                                    <a href="#">
                                                        <div class="product_image_back" style="background: url({{product.file_name}});height: 80px;width: 80px;"></div>

                                                                    <!--<img class="img-responsive" alt="product" src="{{product.file_name}}">-->
                                                    </a>
                                                </div>
                                                <div class="media-body cart-content">
                                                    <ul>
                                                        <li>
                                                            <h2 style="    white-space: nowrap;
                                                                overflow: hidden;
                                                                text-overflow: ellipsis;
                                                                width: 250px;"><a href="#" style="">{{product.title}}-{{product.item_name}}</a></h2>
                                                            <h3>                                                                 
                                                                <p>
                                                                    {{product.price|currency:" "}} X {{product.quantity}} 
                                                                </p>
                                                            </h3>
                                                        </li>


                                                        <li>
                                                            <a class="trash" href="#." ng-click="removeCart(product.product_id)"><i class="fa fa-trash-o"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </li>


                                    <li>
                                        <ul class="checkout">
                                            <li><a href="<?php echo site_url("Cart/details"); ?>" class="btn-checkout1"><i class="fa fa-shopping-cart" aria-hidden="true"></i>View Cart</a></li>
                                            <li><a href="<?php echo site_url("Cart/checkoutInit"); ?>" class="btn-checkout1"><i class="fa fa-share" aria-hidden="true"></i>Checkout</a></li>
                                        </ul>
                                    </li>
                                </ul>




                            </div>
                        </div>
                        <!--                        <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Save changes</button>
                                                </div>-->
                    </div>
                </div>
            </div>

