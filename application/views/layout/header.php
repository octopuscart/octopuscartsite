<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <?php
        meta_tags();
        ?>
        <!-- Favicon -->
        <link rel="shortcut icon" href="../../favicon.png">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&display=swap" rel="stylesheet">

        <!-- CSS Implementing Plugins -->
        <link rel="stylesheet" href="https://transvelo.github.io/electro-html/2.0/assets/vendor/font-awesome/css/fontawesome-all.min.css">
        <link rel="stylesheet" href="https://transvelo.github.io/electro-html/2.0/assets/css/font-electro.css">

        <link rel="stylesheet" href="https://transvelo.github.io/electro-html/2.0/assets/vendor/animate.css/animate.min.css">
        <link rel="stylesheet" href="https://transvelo.github.io/electro-html/2.0/assets/vendor/hs-megamenu/src/hs.megamenu.css">
        <link rel="stylesheet" href="https://transvelo.github.io/electro-html/2.0/assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
        <link rel="stylesheet" href="https://transvelo.github.io/electro-html/2.0/assets/vendor/fancybox/jquery.fancybox.css">
        <link rel="stylesheet" href="https://transvelo.github.io/electro-html/2.0/assets/vendor/slick-carousel/slick/slick.css">
        <link rel="stylesheet" href="https://transvelo.github.io/electro-html/2.0/assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css">

        <!-- CSS Electro Template -->
        <link rel="stylesheet" href="https://transvelo.github.io/electro-html/2.0/assets/css/theme.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme2/css/customstyle.css">

        <!--theme assets-->

        <!--sweet alert-->
        <script src="<?php echo base_url(); ?>assets/theme2/sweetalert2/sweetalert2.min.js"></script>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme2/sweetalert2/sweetalert2.min.css">

        <script src="<?php echo base_url(); ?>assets/theme2/angular/angular.min.js"></script>

        <link href="<?php echo base_url(); ?>assets/theme2/font-awesome-4.7.0/css/font-awesome.css" rel="stylesheet">

        <style>
            span.twitter-typeahead {
                width: 90%;
                width: 90%;
            }

            span.textoverflow.searchtitle {
                font-size: 15px;
            }
            .tt-menu {
                background: white;
                width:100%;
            }

            .searchtext{
                line-height: 40px;
            }
            .tt-menu .media-heading{
                line-height: 15px;
            }

            ul.media-list.tt-suggestion.tt-selectable {
                margin-bottom: 0;
                border-bottom: 1px solid #fed700;
                padding-top: 5px;
            }

            
           
            .typeahead {
                background-color: #fff;
            }

            .typeahead:focus {
                border: 2px solid #0097cf;
            }

            .tt-query {
                -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
                -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
                box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
            }

            .tt-hint {
                color: #999
            }

            .tt-menu {
                width: 100%;
                margin: 20px 0;
                margin-left: 20px;
                padding: 8px 0;
                background-color: #fff;
                border: 1px solid #ccc;
                border: 1px solid rgba(0, 0, 0, 0.2);
                -webkit-border-radius: 8px;
                -moz-border-radius: 8px;
                border-radius: 8px;
                -webkit-box-shadow: 0 5px 10px rgba(0,0,0,.2);
                -moz-box-shadow: 0 5px 10px rgba(0,0,0,.2);
                box-shadow: 0 5px 10px rgba(0,0,0,.2);
            }

            .tt-suggestion {

                border-bottom: 1px solid #b6b6b6;
                padding: 3px 20px;
                font-size: 14px;
                line-height: 24px;
                text-align: left;
            }



            .tt-suggestion p {
                margin: 0;
            }

            .gist {
                font-size: 14px;
            }


            .searchholder .btn{
                float: right;

            }

/*
            .search-input, .search-input.typeahead  {
                position: absolute!important;
                top: -32px!important;
                left:auto!important;
                right: 20px!important;
                z-index: 10!important;
                height: 50px!important;
                width: 604px!important;
                background: rgba(17, 17, 17, 0.95);
                border: 1px solid #111111!important;
                padding: 5px 30px 8px!important;
                color: #ffffff!important;
                -webkit-border-radius: 45px;
                -moz-border-radius: 45px;
                -ms-border-radius: 45px;
                -o-border-radius: 45px;
                border-radius: 45px!important;
                display: none;
            }*/

            .searchholder{
                height: auto;
                float: left;
                width: 100%;
            }

            .serachbox-image{
                height:50px;width:50px;float:left;
                margin-right: 10px;
                
            }
            .empty-message{
                padding:10px;
                text-align: left;
            }

        </style>

    </head>


    <?php
    $megamenuitems = array(
        "TV & Audio" => array(
            "Smart Television" => [
                "Android Smart TV", "55/43/32 Inch Smart TV", "Full HD Smart Tv"
            ],
            "Audio System" => [
                "HI FI Audio System",
                "Portable Trolley Speaker",
                "Boom box",
                "Rechargeable Speaker",
                "Radio & MP3 Player"
            ],
        ),
        "Home Appliances" => array(
            "Air Conditioner" => ["Air Conditioner With Inverter", "Split AC", "Cooling & Heating AC"],
            "Washing Machine" => ['Fully Auto Washing Machine', "Semi Auto Washing Machine", "13KG Washing Machine"],
        ),
        "Kitchen Appliances" => array(
            "Blenders" => [
                "Commercial Blender", "Glass Blender", "Plastic Blender"
            ],
            "Food Processor" => [
                "Hand Mixer",
                "Kettle",
                "Electric Hot Plate",
                "Slice Toaster",
                "Pressure Cooker"
            ],
        ),
    );
    ?>

    <body ng-app="App" ng-controller="ShopController" id="ShopController">

        <!-- ========== HEADER ========== -->
        <header id="header" class="u-header u-header-left-aligned-nav">
            <div class="u-header__section">
                <!-- Topbar -->
                <div class="u-header-topbar py-2 d-none d-xl-block">
                    <div class="container">
                        <div class="d-flex align-items-center">
                            <div class="topbar-left">
                                <a href="#" class="text-gray-110 font-size-13 u-header-topbar__nav-link">Welcome to Worldwide Octopuscart Store</a>
                            </div>
                            <div class="topbar-right ml-auto">
                                <ul class="list-inline mb-0">

                                    <li class="list-inline-item mr-0 u-header-topbar__nav-item u-header-topbar__nav-item-border">
                                        <a href="#" class="u-header-topbar__nav-link"><i class="ec ec-transport mr-1"></i> Track Your Order</a>
                                    </li>
                                    <li class="list-inline-item mr-0 u-header-topbar__nav-item u-header-topbar__nav-item-border u-header-topbar__nav-item-no-border u-header-topbar__nav-item-border-single">
                                        <div class="d-flex align-items-center">
                                            <!-- Language -->
                                            <div class="position-relative">
                                                <a id="languageDropdownInvoker" class="dropdown-nav-link dropdown-toggle d-flex align-items-center u-header-topbar__nav-link font-weight-normal" href="javascript:;" role="button" aria-controls="languageDropdown" aria-haspopup="true" aria-expanded="false" data-unfold-event="hover" data-unfold-target="#languageDropdown" data-unfold-type="css-animation" data-unfold-duration="300" data-unfold-delay="300" data-unfold-hide-on-scroll="true" data-unfold-animation-in="slideInUp" data-unfold-animation-out="fadeOut">
                                                    <span class="d-inline-block d-sm-none">US</span>
                                                    <span class="d-none d-sm-inline-flex align-items-center"><i class="ec ec-dollar mr-1"></i> Dollar (US)</span>
                                                </a>

                                                <div id="languageDropdown" class="dropdown-menu dropdown-unfold u-unfold--css-animation u-unfold--hidden fadeOut" aria-labelledby="languageDropdownInvoker" style="animation-duration: 300ms; left: 0px;">
                                                    <a class="dropdown-item active" href="#">English</a>

                                                </div>
                                            </div>
                                            <!-- End Language -->
                                        </div>
                                    </li>
                                    <li class="list-inline-item mr-0 u-header-topbar__nav-item u-header-topbar__nav-item-border">
                                        <!-- Account Sidebar Toggle Button -->
                                        <a id="sidebarNavToggler" href="<?php echo site_url("Account/profile"); ?>" role="button" class="u-header-topbar__nav-link target-of-invoker-has-unfolds" aria-controls="sidebarContent" aria-haspopup="true" aria-expanded="false" data-unfold-event="click" data-unfold-hide-on-scroll="false" data-unfold-target="#sidebarContent" data-unfold-type="css-animation" data-unfold-animation-in="fadeInRight" data-unfold-animation-out="fadeOutRight" data-unfold-duration="500">
                                            <i class="ec ec-user mr-1"></i> Register <span class="text-gray-50">or</span> Sign in
                                        </a>
                                        <!-- End Account Sidebar Toggle Button -->
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Topbar -->

                <!-- Logo-Search-header-icons -->
                <div class="py-2 py-xl-5 ">
                    <div class="container my-0dot5 gmy-xl-0">
                        <div class="row align-items-center">
                            <!-- Logo-offcanvas-menu -->
                            <div class="col-auto">
                                <!-- Nav -->
                                <nav class="navbar navbar-expand u-header__navbar py-0 justify-content-xl-between max-width-270 min-width-270">
                                    <!-- Logo -->
                                    <a class="order-1 order-xl-0 navbar-brand u-header__navbar-brand u-header__navbar-brand-center" href="<?php echo site_url("/"); ?>" aria-label="Electro">
                                        <img src="<?php echo base_url(); ?>assets/images/logo73.png" style="width: 170px;">

                                    </a>
                                    <!-- End Logo -->
                                    <!-- Fullscreen Toggle Button -->
                                    <button id="sidebarHeaderInvokerMenu" type="button" class="navbar-toggler d-block btn u-hamburger mr-3 mr-xl-0"
                                            aria-controls="sidebarHeader"
                                            aria-haspopup="true"
                                            aria-expanded="false"
                                            data-unfold-event="click"
                                            data-unfold-hide-on-scroll="false"
                                            data-unfold-target="#sidebarHeader1"
                                            data-unfold-type="css-animation"
                                            data-unfold-animation-in="fadeInLeft"
                                            data-unfold-animation-out="fadeOutLeft"
                                            data-unfold-duration="500">
                                        <span id="hamburgerTriggerMenu" class="u-hamburger__box">
                                            <span class="u-hamburger__inner"></span>
                                        </span>
                                    </button>
                                    <!-- End Fullscreen Toggle Button -->
                                </nav>
                                <!-- End Nav -->

                                <!-- ========== HEADER SIDEBAR ========== -->
                                <aside id="sidebarHeader1" class="u-sidebar u-sidebar--left u-unfold--css-animation u-unfold--hidden fadeOutLeft" aria-labelledby="sidebarHeaderInvokerMenu" style="animation-duration: 500ms; left: 0px;">
                                    <div class="u-sidebar__scroller">
                                        <div class="u-sidebar__container">
                                            <div class="u-header-sidebar__footer-offset pb-0">
                                                <!-- Toggle Button -->
                                                <div class="position-absolute top-0 right-0 z-index-2 pt-4 pr-7">
                                                    <button type="button" class="close ml-auto target-of-invoker-has-unfolds" aria-controls="sidebarHeader" aria-haspopup="true" aria-expanded="false" data-unfold-event="click" data-unfold-hide-on-scroll="false" data-unfold-target="#sidebarHeader1" data-unfold-type="css-animation" data-unfold-animation-in="fadeInLeft" data-unfold-animation-out="fadeOutLeft" data-unfold-duration="500">
                                                        <span aria-hidden="true"><i class="ec ec-close-remove text-gray-90 font-size-20"></i></span>
                                                    </button>
                                                </div>
                                                <!-- End Toggle Button -->

                                                <!-- Content -->
                                                <div class="js-scrollbar u-sidebar__body mCustomScrollbar _mCS_1 mCS-autoHide mCS_no_scrollbar" style="position: relative; overflow: visible;"><div id="mCSB_1" class="mCustomScrollBox mCS-minimal-dark mCSB_vertical mCSB_outside" style="max-height: none;" tabindex="0"><div id="mCSB_1_container" class="mCSB_container mCS_y_hidden mCS_no_scrollbar_y" style="position:relative; top:0; left:0;" dir="ltr">
                                                            <div id="headerSidebarContent" class="u-sidebar__content u-header-sidebar__content">
                                                                <!-- Logo -->
                                                                <a class="d-flex ml-0 navbar-brand u-header__navbar-brand u-header__navbar-brand-vertical" href="<?php echo site_url("/"); ?>" aria-label="Electro">
                                                                    <img src="<?php echo base_url(); ?>assets/images/logo.png">
                                                                </a>
                                                                <!-- End Logo -->

                                                            </div>
                                                        </div></div><div id="mCSB_1_scrollbar_vertical" class="mCSB_scrollTools mCSB_1_scrollbar mCS-minimal-dark mCSB_scrollTools_vertical" style="display: none;"><div class="mCSB_draggerContainer"><div id="mCSB_1_dragger_vertical" class="mCSB_dragger" style="position: absolute; min-height: 50px; top: 0px; height: 0px;"><div class="mCSB_dragger_bar" style="line-height: 50px;"></div></div><div class="mCSB_draggerRail"></div></div></div></div>
                                                <!-- End Content -->
                                            </div>
                                        </div>
                                    </div>
                                </aside>
                                <!-- ========== END HEADER SIDEBAR ========== -->
                            </div>
                            <!-- End Logo-offcanvas-menu -->
                            <!-- Search Bar -->
                            <div class="col d-none d-xl-block">
                                <form class="js-focus-state">
                                    <label class="sr-only" for="searchproduct">Search</label>
                                    <div class="input-group">
                                        <input type="search" class="typeahead form-control py-2 pl-5 font-size-15 border-right-0 height-40 border-width-2 rounded-left-pill border-primary" name="email" id="searchproduct-item" placeholder="Search for Products" aria-label="Search for Products" aria-describedby="searchProduct1" >
                                        <div class="input-group-append">
                                            <!-- Select -->
                                            <!-- End Select -->
                                            <button class="btn btn-primary height-40 py-2 px-3 rounded-right-pill" type="button" id="searchProduct1">
                                                <span class="ec ec-search font-size-24"></span>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- End Search Bar -->
                            <!-- Header Icons -->
                            <div class="col col-xl-auto text-right text-xl-left pl-0 pl-xl-3 position-static">
                                <div class="d-inline-flex">
                                    <ul class="d-flex list-unstyled mb-0 align-items-center">
                                        <!-- Search -->
                                        <li class="col d-xl-none px-2 px-sm-3 position-static">
                                            <a id="searchClassicInvoker" class="font-size-22 text-gray-90 text-lh-1 btn-text-secondary" href="javascript:;" role="button" data-toggle="tooltip" data-placement="top" title="" aria-controls="searchClassic" aria-haspopup="true" aria-expanded="false" data-unfold-target="#searchClassic" data-unfold-type="css-animation" data-unfold-duration="300" data-unfold-delay="300" data-unfold-hide-on-scroll="true" data-unfold-animation-in="slideInUp" data-unfold-animation-out="fadeOut" data-original-title="Search">
                                                <span class="ec ec-search"></span>
                                            </a>

                                            <!-- Input -->
                                            <div id="searchClassic" class="dropdown-menu dropdown-unfold dropdown-menu-right left-0 mx-2 u-unfold--css-animation u-unfold--hidden fadeOut" aria-labelledby="searchClassicInvoker" style="animation-duration: 300ms; left: 0px;">
                                                <form class="js-focus-state input-group px-3">
                                                    <input class="form-control" type="search" placeholder="Search Product">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-primary px-3" type="button"><i class="font-size-18 ec ec-search"></i></button>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- End Input -->
                                        </li>
                                        <!-- End Search -->
                                        <li class="col d-none d-xl-block"><a href="../shop/compare.html" class="text-gray-90" data-toggle="tooltip" data-placement="top" title="" data-original-title="Compare"><i class="font-size-22 ec ec-user"></i></a></li>
                                        <li class="col d-none d-xl-block"><a href="../shop/wishlist.html" class="text-gray-90" data-toggle="tooltip" data-placement="top" title="" data-original-title="Favorites"><i class="font-size-22 ec ec-favorites"></i></a></li>
                                        <li class="col d-xl-none px-2 px-sm-3"><a href="../shop/my-account.html" class="text-gray-90" data-toggle="tooltip" data-placement="top" title="" data-original-title="My Account"><i class="font-size-22 ec ec-user"></i></a></li>
                                        <li class="col pr-xl-0 px-2 px-sm-3">
                                            <a href="<?php
                                            echo site_url("Cart/details");
                                            ?>" class="text-gray-90 position-relative d-flex " data-toggle="tooltip" data-placement="top" title="" data-original-title="Cart">
                                                <i class="font-size-22 ec ec-shopping-bag"></i>
                                                <span class="bg-lg-down-black width-22 height-22 bg-primary position-absolute d-flex align-items-center justify-content-center rounded-circle left-12 top-8 font-weight-bold font-size-12">{{globleCartData.total_quantity}}</span>
                                                <span class="d-none d-xl-block font-weight-bold font-size-16 text-gray-90 ml-3">{{globleCartData.sub_total_price|currency}}</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- End Header Icons -->
                        </div>
                    </div>
                </div>
                <!-- End Logo-Search-header-icons -->
                <?php
                $this->load->view('layout/menu');
                ?>
            </div>
        </header>
        <!-- ========== END HEADER ========== -->

        <script>


            var App = angular.module('App', []).config(function ($interpolateProvider, $httpProvider) {
            //$interpolateProvider.startSymbol('{$');
            //$interpolateProvider.endSymbol('$}');
            $httpProvider.defaults.headers.common = {};
            $httpProvider.defaults.headers.post = {};
            });
            var baseurl = "<?php echo site_url(); ?>";
            var imageurlg = "<?php echo PRODUCTIMAGELINK; ?>";
            var globlecurrency = "<?php echo globle_currency; ?>";
            var avaiblecredits = 0;
        </script> 






