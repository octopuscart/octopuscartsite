<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <?php
        meta_tags();
        ?>
        <link href="https://fonts.googleapis.com/css?family=Cookie|Open+Sans:400,600,700,800,900|Poppins:300,400,500,600,700|Playfair+Display:400,400i,700,700i,900" rel="stylesheet">

        <link href="https://fonts.googleapis.com/css?family=Open+Sans%3A400%2C400italic%2C700%2C700italic%7CPoppins%3A400%2C400italic%2C700%2C700italic%2C600%2C600italic%2C300%2C300italic%7COswald%3A400%2C700" rel="stylesheet">

        <!--Theme assets-->
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&display=swap" rel="stylesheet">

        <!-- CSS Implementing Plugins -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme2/vendor/font-awesome/css/fontawesome-all.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme2/css/font-electro.css">

        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme2/vendor/animate.css/animate.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme2/vendor/hs-megamenu/src/hs.megamenu.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme2/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme2/vendor/fancybox/jquery.fancybox.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme2/vendor/slick-carousel/slick/slick.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme2/vendor/bootstrap-select/dist/css/bootstrap-select.min.css">

        <!-- CSS Electro Template -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme2/css/style.css">

        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme2/css/theme.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme2/css/customstyle.css">

        <!--theme assets-->

        <!--sweet alert-->
        <script src="<?php echo base_url(); ?>assets/theme2/sweetalert2/sweetalert2.min.js"></script>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme2/sweetalert2/sweetalert2.min.css">

        <script src="<?php echo base_url(); ?>assets/theme2/angular/angular.min.js"></script>

        <link href="<?php echo base_url(); ?>assets/theme2/font-awesome-4.7.0/css/font-awesome.css" rel="stylesheet">



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

    <body ng-app="App" >

        <!-- ========== HEADER ========== -->
        <header id="header" class="u-header u-header-left-aligned-nav" ng-controller="ShopController" id="ShopController">
            <div class="u-header__section">
                <!-- Topbar -->
                <div class="u-header-topbar py-2 d-none d-xl-block">
                    <div class="container">
                        <div class="d-flex align-items-center">
                            <div class="topbar-left">
                                <a href="#" class="text-gray-110 font-size-13 hover-on-dark">Welcome to JSW Electronics Store</a>
                            </div>
                            <div class="topbar-right ml-auto">
                                <ul class="list-inline mb-0">
                                    <li class="list-inline-item mr-0 u-header-topbar__nav-item u-header-topbar__nav-item-border">
                                        <a href="#" class="u-header-topbar__nav-link"><i class="ec ec-map-pointer mr-1"></i> Store Locator</a>
                                    </li>
                                    <li class="list-inline-item mr-0 u-header-topbar__nav-item u-header-topbar__nav-item-border">
                                        <a href="#" class="u-header-topbar__nav-link"><i class="ec ec-transport mr-1"></i> Track Your Order</a>
                                    </li>
                                    <li class="list-inline-item mr-0 u-header-topbar__nav-item u-header-topbar__nav-item-border u-header-topbar__nav-item-no-border u-header-topbar__nav-item-border-single">
                                        <div class="d-flex align-items-center">
                                            <!-- Language -->
                                            <div class="position-relative">
                                                <a id="languageDropdownInvoker" class="dropdown-nav-link dropdown-toggle d-flex align-items-center u-header-topbar__nav-link font-weight-normal" href="javascript:;" role="button"
                                                   aria-controls="languageDropdown"
                                                   aria-haspopup="true"
                                                   aria-expanded="false"
                                                   data-unfold-event="hover"
                                                   data-unfold-target="#languageDropdown"
                                                   data-unfold-type="css-animation"
                                                   data-unfold-duration="300"
                                                   data-unfold-delay="300"
                                                   data-unfold-hide-on-scroll="true"
                                                   data-unfold-animation-in="slideInUp"
                                                   data-unfold-animation-out="fadeOut">
                                                    <span class="d-inline-block d-sm-none">US</span>
                                                    <span class="d-none d-sm-inline-flex align-items-center"><i class="ec ec-dollar mr-1"></i> Dollar (US)</span>
                                                </a>

                                                <div id="languageDropdown" class="dropdown-menu dropdown-unfold" aria-labelledby="languageDropdownInvoker">
                                                    <a class="dropdown-item active" href="#">Dollar (US)</a>
                                                    <a class="dropdown-item active" href="#">Dollar (HK)</a>

                                                </div>
                                            </div>
                                            <!-- End Language -->
                                        </div>
                                    </li>
                                    <li class="list-inline-item mr-0 u-header-topbar__nav-item u-header-topbar__nav-item-border">
                                        <!-- Account Sidebar Toggle Button -->
                                        <a id="sidebarNavToggler" href="javascript:;" role="button" class="u-header-topbar__nav-link"
                                           aria-controls="sidebarContent"
                                           aria-haspopup="true"
                                           aria-expanded="false"
                                           data-unfold-event="click"
                                           data-unfold-hide-on-scroll="false"
                                           data-unfold-target="#sidebarContent"
                                           data-unfold-type="css-animation"
                                           data-unfold-animation-in="fadeInRight"
                                           data-unfold-animation-out="fadeOutRight"
                                           data-unfold-duration="500">
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
                <div class="py-2 py-xl-5 bg-primary-down-lg">
                    <div class="container my-0dot5 my-xl-0">
                        <div class="row align-items-center">
                            <!-- Logo-offcanvas-menu -->
                            <div class="col-auto">
                                <!-- Nav -->
                                <nav class="navbar navbar-expand u-header__navbar py-0 justify-content-xl-between max-width-270 min-width-270">
                                    <!-- Logo -->
                                    <a class="order-1 order-xl-0 navbar-brand u-header__navbar-brand u-header__navbar-brand-center" href="<?php echo site_url("/") ?>" aria-label="Electro">
                                        <img src="<?php echo base_url(); ?>assets/images/logo.png" style="    height: 50px;">

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
                                <aside id="sidebarHeader1" class="u-sidebar u-sidebar--left" aria-labelledby="sidebarHeaderInvoker">
                                    <div class="u-sidebar__scroller">
                                        <div class="u-sidebar__container">
                                            <div class="u-header-sidebar__footer-offset">
                                                <!-- Toggle Button -->
                                                <div class="position-absolute top-0 right-0 z-index-2 pt-4 pr-4 bg-white">
                                                    <button type="button" class="close ml-auto"
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
                                                        <span aria-hidden="true"><i class="ec ec-close-remove text-gray-90 font-size-20"></i></span>
                                                    </button>
                                                </div>
                                                <!-- End Toggle Button -->

                                                <!-- Content -->
                                                <div class="js-scrollbar u-sidebar__body">
                                                    <div id="headerSidebarContent" class="u-sidebar__content u-header-sidebar__content">
                                                        <!-- Logo -->
                                                        <a class="navbar-brand u-header__navbar-brand u-header__navbar-brand-center mb-3" href="index.html" aria-label="Electro">
                                                            <img src="<?php echo base_url(); ?>assets/images/logo.png" style="    height: 50px;">

                                                        </a>
                                                        <!-- End Logo -->

                                                        <!-- List -->
                                                        <ul id="headerSidebarList" class="u-header-collapse__nav">


                                                            <!-- Top 100 Offers -->
                                                            <li class="">
                                                                <a class="u-header-collapse__nav-link font-weight-bold" href="#">Top 100 Offers</a>
                                                            </li>
                                                            <!-- End Top 100 Offers -->

                                                            <!-- New Arrivals -->
                                                            <li class="">
                                                                <a class="u-header-collapse__nav-link font-weight-bold" href="#">New Arrivals</a>
                                                            </li>
                                                            <!-- End New Arrivals -->
                                                            <?php
                                                            foreach ($megamenuitems as $key1 => $mainmenu) {
                                                                ?>
                                                                <!-- Computers & Accessories -->
                                                                <li class="u-has-submenu u-header-collapse__submenu">
                                                                    <a class="u-header-collapse__nav-link u-header-collapse__nav-pointer" href="javascript:;" data-target="#headerSidebarComputersCollapse" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="headerSidebarComputersCollapse">
                                                                        <?php echo $key1; ?>
                                                                    </a>

                                                                    <div id="headerSidebarComputersCollapse" class="collapse" data-parent="#headerSidebarContent">
                                                                        <ul class="u-header-collapse__nav-list">
                                                                            <?php
                                                                            foreach ($mainmenu as $key2 => $menu2) {
                                                                                ?>
                                                                                <li><span class="u-header-sidebar__sub-menu-title"><?php echo $key2; ?></span></li>
                                                                                <?php
                                                                                foreach ($menu2 as $key2 => $item) {
                                                                                    ?>
                                                                                    <li class=""><a class="u-header-collapse__submenu-nav-link" href="<?php echo site_url('Product/productListView') ?>"><?php echo $item; ?></a></li>

                                                                                    <?php
                                                                                }
                                                                            }
                                                                            ?>
                                                                        </ul>
                                                                    </div>
                                                                </li>
                                                                <!-- End Computers & Accessories -->
                                                                <?php
                                                            }
                                                            ?>

                                                        </ul>
                                                        <!-- End List -->
                                                    </div>
                                                </div>
                                                <!-- End Content -->
                                            </div>
                                            <!-- Footer -->
                                            <footer id="SVGwaveWithDots" class="svg-preloader u-header-sidebar__footer">
                                                <ul class="list-inline mb-0">
                                                    <li class="list-inline-item pr-3">
                                                        <a class="u-header-sidebar__footer-link text-gray-90" href="#">Privacy</a>
                                                    </li>
                                                    <li class="list-inline-item pr-3">
                                                        <a class="u-header-sidebar__footer-link text-gray-90" href="#">Terms</a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a class="u-header-sidebar__footer-link text-gray-90" href="#">
                                                            <i class="fas fa-info-circle"></i>
                                                        </a>
                                                    </li>
                                                </ul>

                                                <!-- SVG Background Shape -->
                                                <div class="position-absolute right-0 bottom-0 left-0 z-index-n1">
                                                    <img class="js-svg-injector" src="<?php echo base_url(); ?>assets/theme2/svg/components/wave-bottom-with-dots.svg" alt="Image Description"
                                                         data-parent="#SVGwaveWithDots">
                                                </div>
                                                <!-- End SVG Background Shape -->
                                            </footer>
                                            <!-- End Footer -->
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
                                        <input type="email" class="form-control py-2 pl-5 font-size-15 border-right-0 height-40 border-width-2 rounded-left-pill border-primary" name="email" id="searchproduct-item" placeholder="Search for Products" aria-label="Search for Products" aria-describedby="searchProduct1" required>
                                        <div class="input-group-append">
                                            <!-- Select -->
                                            <select class="js-select selectpicker dropdown-select custom-search-categories-select"
                                                    data-style="btn height-40 text-gray-60 font-weight-normal border-top border-bottom border-left-0 rounded-0 border-primary border-width-2 pl-0 pr-5 py-2">
                                                <option value="one" selected>All Categories</option>
                                                <option value="two">Tv & Audio</option>
                                                <option value="three">Home Appliances</option>
                                                <option value="four">Kitchen Appliances</option>
                                            </select>
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
                                            <a id="searchClassicInvoker" class="font-size-22 text-gray-90 text-lh-1 btn-text-secondary" href="javascript:;" role="button"
                                               data-toggle="tooltip"
                                               data-placement="top"
                                               title="Search"
                                               aria-controls="searchClassic"
                                               aria-haspopup="true"
                                               aria-expanded="false"
                                               data-unfold-target="#searchClassic"
                                               data-unfold-type="css-animation"
                                               data-unfold-duration="300"
                                               data-unfold-delay="300"
                                               data-unfold-hide-on-scroll="true"
                                               data-unfold-animation-in="slideInUp"
                                               data-unfold-animation-out="fadeOut">
                                                <span class="ec ec-search"></span>
                                            </a>

                                            <!-- Input -->
                                            <div id="searchClassic" class="dropdown-menu dropdown-unfold dropdown-menu-right left-0 mx-2" aria-labelledby="searchClassicInvoker">
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
                                        <li class="col d-none d-xl-block"><a href="../shop/compare.html" class="text-gray-90" data-toggle="tooltip" data-placement="top" title="Compare"><i class="font-size-22 ec ec-compare"></i></a></li>
                                        <li class="col d-none d-xl-block"><a href="../shop/wishlist.html" class="text-gray-90" data-toggle="tooltip" data-placement="top" title="Favorites"><i class="font-size-22 ec ec-favorites"></i></a></li>
                                        <li class="col d-xl-none px-2 px-sm-3"><a href="../shop/my-account.html" class="text-gray-90" data-toggle="tooltip" data-placement="top" title="My Account"><i class="font-size-22 ec ec-user"></i></a></li>
                                        <li class="col pr-xl-0 px-2 px-sm-3 d-xl-none">
                                            <a href="../shop/cart.html" class="text-gray-90 position-relative d-flex " data-toggle="tooltip" data-placement="top" title="Cart">
                                                <i class="font-size-22 ec ec-shopping-bag"></i>
                                            </a>
                                        </li>
                                        <li class="col pr-xl-0 px-2 px-sm-3 d-none d-xl-block">

                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- End Header Icons -->
                        </div>
                    </div>
                </div>
                <!-- End Logo-Search-header-icons -->




                <!-- Vertical-and-secondary-menu -->
                <!-- Vertical-and-secondary-menu -->
                <div class="d-none d-xl-block mainmenucontainer">
                    <div class="row">


                        <!-- Secondary Menu -->
                        <div class="col">
                            <!-- Nav -->
                            <nav class="js-mega-menu navbar navbar-expand-md u-header__navbar u-header__navbar--no-space">
                                <!-- Navigation -->
                                <div id="navBar" class="collapse navbar-collapse u-header__navbar-collapse">
                                    <ul class="navbar-nav u-header__navbar-nav">


                                        <li class="nav-item hs-has-sub-menu u-header__nav-item" data-event="hover" data-animation-in="slideInUp" data-animation-out="fadeOut">
                                            <a id="blogMegaMenu" class="nav-link u-header__nav-link u-header__nav-link-toggle" href="javascript:;" aria-haspopup="true" aria-expanded="false" aria-labelledby="blogSubMenu">HOME</a>

                                            <!-- Blog - Submenu -->
                                            <ul id="blogSubMenu" class="hs-sub-menu u-header__sub-menu animated fadeOut" aria-labelledby="blogMegaMenu" style="min-width: 230px; display: none;">
                                                <li >
                                                    <a class="nav-link u-header__sub-menu-nav-link" href="<?php echo site_url("/") ?>">Customer Service</a>

                                                </li>
                                                <li><a class="nav-link u-header__sub-menu-nav-link" href="<?php echo site_url("/") ?>">Privacy Policy</a></li>
                                                <li><a class="nav-link u-header__sub-menu-nav-link" href="<?php echo site_url("/") ?>">Terms of Service</a></li>

                                            </ul>
                                            <!-- End Submenu -->
                                        </li>

                                        <li class="yamm-fw menu-item menu-item-has-children animate-dropdown dropdown">
                                            <a  class="nav-link u-header__nav-link u-header__nav-link-toggle" title="Pages" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true" href="javascript:;" aria-haspopup="true" aria-expanded="false" >PRODUCTS</a>
                                            <ul role="menu" class=" dropdown-menu" style="width: 800px;margin-top: -8px;">
                                                <li class="menu-item animate-dropdown">
                                                    <div class="yamm-content" style="display:inline-block; width: 100%;">
                                                        <div class="row">
                                                            <?php
                                                            foreach ($megamenuitems as $key1 => $mainmenu) {
                                                                ?>
                                                                <div class="wpb_column vc_column_container col-sm-4">
                                                                    <div class="vc_column-inner ">
                                                                        <div class="wpb_wrapper">
                                                                            <div class="vc_wp_custommenu wpb_content_element">
                                                                                <div class="widget widget_nav_menu">
                                                                                    <div class="menu-pages-menu-1-container">
                                                                                        <ul id="menu-pages-menu-1" class="menu">
                                                                                            <li class="nav-title menu-item">
                                                                                                <a href="#" class="menumainitem"><?php echo $key1; ?></a>
                                                                                            </li>
                                                                                            <?php
                                                                                            foreach ($mainmenu as $key2 => $menu2) {
                                                                                                ?>
                                                                                                <li class="nav-title menu-item"> 
                                                                                                    <a href="#" class="submenumainitem"><?php echo $key2; ?></a>
                                                                                                </li>
                                                                                                <?php
                                                                                                foreach ($menu2 as $key2 => $item) {
                                                                                                    ?>
                                                                                                    <li class=""><a class="u-header-collapse__submenu-nav-link" href="<?php echo site_url('Product/productListView') ?>"><?php echo $item; ?></a></li>

                                                                                                    <?php
                                                                                                }
                                                                                            }
                                                                                            ?>
                                                                                        </ul>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>

                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>

                                        <!-- Featured Brands -->
                                        <li class="nav-item u-header__nav-item">
                                            <a class="nav-link u-header__nav-link" href="<?php echo site_url("about-us") ?>" aria-haspopup="true" aria-expanded="false" aria-labelledby="pagesSubMenu">INSIGHTS</a>
                                        </li>
                                        <!-- End Featured Brands -->
                                        
                                        
                                        <!-- Featured Brands -->
                                        <li class="nav-item u-header__nav-item">
                                            <a class="nav-link u-header__nav-link" href="<?php echo site_url("Shop/catalogs") ?>" aria-haspopup="true" aria-expanded="false" aria-labelledby="pagesSubMenu">CATALOGS</a>
                                        </li>
                                        <!-- End Featured Brands -->
                                        
                                        
                                        
                                        <!-- Trending Styles -->
                                        <li class="nav-item u-header__nav-item">
                                            <a class="nav-link u-header__nav-link" href="<?php echo site_url("Shop/blog"); ?>" aria-haspopup="true" aria-expanded="false" aria-labelledby="blogSubMenu">BLOG</a>
                                        </li>
                                        <!-- End Trending Styles -->

                                        <!-- Trending Styles -->
                                        <li class="nav-item u-header__nav-item">
                                            <a class="nav-link u-header__nav-link" href="<?php echo site_url("faqs"); ?>" aria-haspopup="true" aria-expanded="false" aria-labelledby="blogSubMenu">FAQ's</a>
                                        </li>
                                        <!-- End Trending Styles -->

                                        <!-- Gift Cards -->
                                        <li class="nav-item u-header__nav-item">
                                            <a class="nav-link u-header__nav-link" href="<?php echo site_url("contact"); ?>" aria-haspopup="true" aria-expanded="false">CONTACT US</a>
                                        </li>
                                        <!-- End Gift Cards -->

                                        <!-- Button -->
                                        <li class="nav-item u-header__nav-last-item">
                                            <a class="text-gray-90" href="#" target="_blank">
                                                Free Shipping (T&C Applied)
                                            </a>
                                        </li>
                                        <!-- End Button -->
                                    </ul>
                                </div>
                                <!-- End Navigation -->
                            </nav>
                            <!-- End Nav -->
                        </div>
                        <!-- End Secondary Menu -->
                        <!-- End Vertical-and-secondary-menu -->
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






