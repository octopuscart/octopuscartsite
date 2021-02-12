<?php
$this->load->view('layout/header');
?>

<style>
    .features-list .media {
        width: 200px;
        margin: 0 auto;
    }
    .features-list {
        border: 5px solid #fed700;
        border-radius: 0px;
        margin-bottom: 2.5em;
        margin-left: 0;
        margin-right: 0;
        border-left: none;
        border-right: 0px;
    }
</style>

<!-- ========== MAIN CONTENT ========== -->
<main id="content" role="main">
    <!-- Slider Section -->
    <div class="mb-5">
        <div class="bg-img-hero" style="background-image: url(<?php echo base_url(); ?>assets/theme2/img/1920X422/img1.jpg);">
            <div class="container min-height-420 overflow-hidden">
                <div class="js-slick-carousel u-slick"
                     data-pagi-classes="text-center position-absolute right-0 bottom-0 left-0 u-slick__pagination u-slick__pagination--long justify-content-start mb-3 mb-md-4 offset-xl-3 pl-2 pb-1">
                    <div class="js-slide">
                        <div class="row pt-7 py-md-0">
                            <div class="d-none d-wd-block offset-1"></div>
                            <div class="col-xl col col-md-6 mt-md-8 mt-lg-8">
                                <div class="ml-xl-4">
                                    <h6 class="font-size-15 font-weight-bold mb-2 text-cyan"
                                        data-scs-animation-in="fadeInUp">
                                        SHOP TO GET WHAT YOU LOVE
                                    </h6>
                                    <h1 class="font-size-46 text-lh-50 font-weight-light mb-8"
                                        data-scs-animation-in="fadeInUp"
                                        data-scs-animation-delay="200">
                                        Shop from the latest collection of Earrings for women & girls online. 

                                        <stong class="font-weight-bold">40% OFF</stong>
                                    </h1>
                                    <a href="../shop/single-product-fullwidth.html" class="btn btn-primary transition-3d-hover rounded-lg font-weight-normal py-2 px-md-7 px-3 font-size-16"
                                       data-scs-animation-in="fadeInUp"
                                       data-scs-animation-delay="300">
                                        Start Buying
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-5 col-6 d-flex align-items-end ml-auto ml-md-0"
                                 data-scs-animation-in="fadeInRight"
                                 data-scs-animation-delay="500">
                                <img class="img-fluid ml-auto mr-10 mr-wd-auto" src="<?php echo base_url(); ?>assets/theme2/img/416X420/neckless.png" alt="Image Description">
                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>
    <!-- End Slider Section -->
    <div class="container">
        <div class="mb-6 row border rounded-lg mx-0 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
            <!-- Feature List -->
            <div class="media col px-6 px-xl-4 px-wd-8 flex-shrink-0 flex-xl-shrink-1 min-width-270-all py-3">
                <div class="u-avatar mr-2">
                    <i class="text-primary ec ec-transport font-size-46"></i>
                </div>
                <div class="media-body text-center">
                    <span class="d-block font-weight-bold text-dark">Free Delivery</span>
                    <div class=" text-secondary">from $300</div>
                </div>
            </div>
            <!-- End Feature List -->

            <!-- Feature List -->
            <div class="media col px-6 px-xl-4 px-wd-8 flex-shrink-0 flex-xl-shrink-1 min-width-270-all border-left py-3">
                <div class="u-avatar mr-2">
                    <i class="text-primary ec ec-customers font-size-56"></i>
                </div>
                <div class="media-body text-center">
                    <span class="d-block font-weight-bold text-dark">99 % Customer</span>
                    <div class=" text-secondary">Feedbacks</div>
                </div>
            </div>
            <!-- End Feature List -->

            <!-- Feature List -->
            <div class="media col px-6 px-xl-4 px-wd-8 flex-shrink-0 flex-xl-shrink-1 min-width-270-all border-left py-3">
                <div class="u-avatar mr-2">
                    <i class="text-primary ec ec-returning font-size-46"></i>
                </div>
                <div class="media-body text-center">
                    <span class="d-block font-weight-bold text-dark">365 Days</span>
                    <div class=" text-secondary">for free return</div>
                </div>
            </div>
            <!-- End Feature List -->

            <!-- Feature List -->
            <div class="media col px-6 px-xl-4 px-wd-8 flex-shrink-0 flex-xl-shrink-1 min-width-270-all border-left py-3">
                <div class="u-avatar mr-2">
                    <i class="text-primary ec ec-payment font-size-46"></i>
                </div>
                <div class="media-body text-center">
                    <span class="d-block font-weight-bold text-dark">Payment</span>
                    <div class=" text-secondary">Secure System</div>
                </div>
            </div>
        </div>
    </div>

    <!--one and other section-->
    <div class="container">
        <!-- Banner -->
        <div class="mb-5">
            <div class="row">
                <div class="col-md-6 mb-4 mb-xl-0 col-xl-3">
                    <a href="../shop/shop.html" class="d-black text-gray-90">
                        <div class="min-height-132 py-1 d-flex bg-gray-1 align-items-center">
                            <div class="col-6 col-xl-5 col-wd-6 pr-0">
                                <img class="img-fluid" src="<?php echo base_url(); ?>assets/theme2/img/190X150/img1.png" alt="Image Description">
                            </div>
                            <div class="col-6 col-xl-7 col-wd-6">
                                <div class="mb-2 pb-1 font-size-18 font-weight-light text-ls-n1 text-lh-23">
                                    UP TO  <strong>75%</strong> ON THE FASHIONS JEWELLERY
                                </div>
                                <div class="link text-gray-90 font-weight-bold font-size-15" href="#">
                                    Shop now
                                    <span class="link__icon ml-1">
                                        <span class="link__icon-inner"><i class="ec ec-arrow-right-categproes"></i></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 mb-4 mb-xl-0 col-xl-3">
                    <a href="../shop/shop.html" class="d-black text-gray-90">
                        <div class="min-height-132 py-1 d-flex bg-gray-1 align-items-center">
                            <div class="col-6 col-xl-5 col-wd-6 pr-0">
                                <img class="img-fluid" src="<?php echo base_url(); ?>assets/theme2/img/190X150/img2.png" alt="Image Description">
                            </div>
                            <div class="col-6 col-xl-7 col-wd-6">
                                <div class="mb-2 pb-1 font-size-18 font-weight-light text-ls-n1 text-lh-23">
                                    BEST <strong>OFFERS</strong> ON THE MOBILE ACCESSORIES
                                </div>
                                <div class="link text-gray-90 font-weight-bold font-size-15" href="#">
                                    Shop now
                                    <span class="link__icon ml-1">
                                        <span class="link__icon-inner"><i class="ec ec-arrow-right-categproes"></i></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 mb-4 mb-xl-0 col-xl-3">
                    <a href="../shop/shop.html" class="d-black text-gray-90">
                        <div class="min-height-132 py-1 d-flex bg-gray-1 align-items-center">
                            <div class="col-6 col-xl-5 col-wd-6 pr-0">
                                <img class="img-fluid" src="<?php echo base_url(); ?>assets/theme2/img/190X150/img3.png" alt="Image Description">
                            </div>
                            <div class="col-6 col-xl-7 col-wd-6">
                                <div class="mb-2 pb-1 font-size-18 font-weight-light text-ls-n1 text-lh-23">
                                    FASHIONS ACCESSORIES START FROM <strong>5$</strong> 
                                </div>
                                <div class="link text-gray-90 font-weight-bold font-size-15" href="#">
                                    Shop now
                                    <span class="link__icon ml-1">
                                        <span class="link__icon-inner"><i class="ec ec-arrow-right-categproes"></i></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 mb-4 mb-xl-0 col-xl-3">
                    <a href="../shop/shop.html" class="d-black text-gray-90">
                        <div class="min-height-132 py-1 d-flex bg-gray-1 align-items-center">
                            <div class="col-6 col-xl-5 col-wd-6 pr-0">
                                <img class="img-fluid" src="<?php echo base_url(); ?>assets/theme2/img/190X150/img4.png" alt="Image Description">
                            </div>
                            <div class="col-6 col-xl-7 col-wd-6">
                                <div class="mb-2 pb-1 font-size-18 font-weight-light text-ls-n1 text-lh-23">
                                    GET <strong>80%</strong> OFF ON PERSONAL CARE
                                </div>
                                <div class="link text-gray-90 font-weight-bold font-size-15" href="#">
                                    Shop now
                                    <span class="link__icon ml-1">
                                        <span class="link__icon-inner"><i class="ec ec-arrow-right-categproes"></i></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <!-- End Banner -->



        <!-- Recently viewed -->
        <div class="mb-6">
            <div class="position-relative">
                <div class="border-bottom border-color-1 mb-2">
                    <h3 class="section-title mb-0 pb-2 font-size-22">New Arrival </h3>
                </div>
                <div class="js-slick-carousel u-slick position-static overflow-hidden u-slick-overflow-visble pb-7 pt-2 px-1"
                     data-pagi-classes="text-center right-0 bottom-1 left-0 u-slick__pagination u-slick__pagination--long mb-0 z-index-n1 mt-3 mt-md-0"
                     data-slides-show="7"
                     data-slides-scroll="1"
                     data-arrows-classes="position-absolute top-0 font-size-17 u-slick__arrow-normal top-10"
                     data-arrow-left-classes="fa fa-angle-left right-1"
                     data-arrow-right-classes="fa fa-angle-right right-0"
                     data-responsive='[{
                     "breakpoint": 1400,
                     "settings": {
                     "slidesToShow": 6
                     }
                     }, {
                     "breakpoint": 1200,
                     "settings": {
                     "slidesToShow": 4
                     }
                     }, {
                     "breakpoint": 992,
                     "settings": {
                     "slidesToShow": 3
                     }
                     }, {
                     "breakpoint": 768,
                     "settings": {
                     "slidesToShow": 2
                     }
                     }, {
                     "breakpoint": 554,
                     "settings": {
                     "slidesToShow": 2
                     }
                     }]'>

                    <?php
                    foreach ($newproducts as $key => $pvalue) {
                        ?>
                        <div class="js-slide products-group">
                            <div class="product-item">
                                <div class="product-item__outer h-100">
                                    <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                        <div class="product-item__body pb-xl-2">
                                            <div class="mb-2"><a href="#" class="font-size-12 text-gray-5"><?php echo $pvalue['category_name']; ?></a></div>
                                            <h5 class="mb-1 product-item__title"><a href="#" class="text-blue font-weight-bold"><?php echo $pvalue['title']; ?></a></h5>
                                            <div class="mb-2">
                                                <a href="#" class="d-block text-center">
                                                    <img class="img-fluid backgroundsetimage" src="<?php echo base_url(); ?>assets/theme2/img/212X200/blank.png" style="background:url('<?php echo PRODUCTIMAGELINK . $pvalue['file_name'] ?>')" alt="Image Description">
                                                </a>
                                            </div>
                                            <div class="flex-center-between mb-1">
                                                 <div class="prodcut-price">
                                                        <div class="text-gray-100">{{<?php echo $pvalue['price']; ?>|currency:"<?php echo globle_currency;?>"}}</div>
                                                    </div>
                                                <div class="d-none d-xl-block prodcut-add-cart">
                                                    <a href="<?php echo site_url('Product/productDetailsView/' . $key); ?>" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                                </div>
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
        </div>
        <!-- End Recently viewed -->
    </div>
    <!--end of section-->

    <div class="container">
        <!-- Prodcut-cards-carousel -->
        <div class="">
            <dv class=" d-flex justify-content-between border-bottom border-color-1 flex-md-nowrap flex-wrap border-sm-bottom-0">
                <h3 class="section-title mb-0 pb-2 font-size-22">Bestsellers</h3>
                <ul class="nav nav-pills mb-2 pt-3 pt-md-0 mb-0 border-top border-color-1 border-md-top-0 align-items-center font-size-15 font-size-15-md flex-nowrap flex-md-wrap overflow-auto overflow-md-visble">
                    <li class="nav-item flex-shrink-0 flex-md-shrink-1">
                        <a class="text-gray-90 btn btn-outline-primary border-width-2 rounded-pill py-1 px-4 font-size-15 text-lh-19 font-size-15-md" href="#">Top 20</a>
                    </li>
                    <li class="nav-item flex-shrink-0 flex-md-shrink-1">
                        <a class="nav-link text-gray-8" href="#">Phones & Tablets</a>
                    </li>
                    <li class="nav-item flex-shrink-0 flex-md-shrink-1">
                        <a class="nav-link text-gray-8" href="#">Laptops & Computers</a>
                    </li>
                    <li class="nav-item flex-shrink-0 flex-md-shrink-1">
                        <a class="nav-link text-gray-8" href="#"> Video Cameras</a>
                    </li>
                </ul>
            </dv>
            <div class="js-slick-carousel u-slick u-slick--gutters-2 overflow-hidden u-slick-overflow-visble pt-3 pb-6"
                 data-pagi-classes="text-center right-0 bottom-1 left-0 u-slick__pagination u-slick__pagination--long mb-0 z-index-n1 mt-4">

                <?php
                foreach ($topproducts as $pkey => $pvalue) {
                    $productlist = $pvalue;
                    ?>
                    <div class="js-slide">
                        <ul class="row list-unstyled products-group no-gutters mb-0 overflow-visible">
                            <?php
                            foreach ($productlist as $key => $value) {
                                $productt = $value;
                                ?>
                                <li class="col-wd-3 col-md-4 product-item product-item__card pb-2 mb-2 pb-md-0 mb-md-0 border-bottom border-md-bottom-0">
                                    <div class="product-item__outer h-100">
                                        <div class="product-item__inner p-md-3 row no-gutters">
                                            <div class="col col-lg-auto product-media-left">
                                                <a href="#" class="max-width-150 d-block"><img class="img-fluid backgroundsetimage" src="<?php echo base_url(); ?>assets/theme2/img/150X140/blank.png" style="background:url('<?php echo PRODUCTIMAGELINK . $productt['file_name'] ?>')"  alt="Image Description"></a>
                                            </div>
                                            <div class="col product-item__body pl-2 pl-lg-3 mr-xl-2 mr-wd-1">
                                                <div class="mb-4">
                                                    <div class="mb-2"><a href="#" class="font-size-12 text-gray-5"><?php echo $productt['category_name']; ?></a></div>
                                                    <h5 class="product-item__title"><a href="#" class="text-blue font-weight-bold"><?php echo $productt['title']; ?></a></h5>
                                                </div>
                                                <div class="flex-center-between mb-3">
                                                    <div class="prodcut-price">
                                                        <div class="text-gray-100">{{<?php echo $productt['price']; ?>|currency:"<?php echo globle_currency;?>"}}</div>
                                                    </div>
                                                    <div class="d-none d-xl-block prodcut-add-cart">
                                                        <a href="" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <?php
                            }
                            ?>

                        </ul>
                    </div>
                    <?php
                }
                ?>

            </div>
        </div>
        <!-- End Prodcut-cards-carousel -->
        <!-- Full banner -->
        <div class="mb-6">
            <a href="../shop/shop.html" class="d-block text-gray-90">
                <div class="" style="background-image: url(<?php echo base_url(); ?>assets/theme2/img/1400X206/img1.jpg);">
                    <div class="space-top-2-md p-4 pt-6 pt-md-8 pt-lg-6 pt-xl-8 pb-lg-4 px-xl-8 px-lg-6">
                        <div class="flex-horizontal-center mt-lg-3 mt-xl-0 overflow-auto overflow-md-visble">
                            <h1 class="text-lh-38 font-size-32 font-weight-light mb-0 flex-shrink-0 flex-md-shrink-1">SHOP AND <strong>SAVE BIG</strong> ON HOTTEST TABLETS</h1>
                            <div class="ml-5 flex-content-center flex-shrink-0">
                                <div class="bg-primary rounded-lg px-6 py-2">
                                    <em class="font-size-14 font-weight-light">STARTING AT</em>
                                    <div class="font-size-30 font-weight-bold text-lh-1">
                                        <sup class="">$</sup>79<sup class="">99</sup>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <!-- End Full banner -->

        <!-- Brand Carousel -->
           <!-- Recently viewed -->
        <div class="mb-6">
            <div class="position-relative">
                <div class="border-bottom border-color-1 mb-2">
                    <h3 class="section-title mb-0 pb-2 font-size-22">Recently Viewed </h3>
                </div>
                <div class="js-slick-carousel u-slick position-static overflow-hidden u-slick-overflow-visble pb-7 pt-2 px-1"
                     data-pagi-classes="text-center right-0 bottom-1 left-0 u-slick__pagination u-slick__pagination--long mb-0 z-index-n1 mt-3 mt-md-0"
                     data-slides-show="7"
                     data-slides-scroll="1"
                     data-arrows-classes="position-absolute top-0 font-size-17 u-slick__arrow-normal top-10"
                     data-arrow-left-classes="fa fa-angle-left right-1"
                     data-arrow-right-classes="fa fa-angle-right right-0"
                     data-responsive='[{
                     "breakpoint": 1400,
                     "settings": {
                     "slidesToShow": 6
                     }
                     }, {
                     "breakpoint": 1200,
                     "settings": {
                     "slidesToShow": 4
                     }
                     }, {
                     "breakpoint": 992,
                     "settings": {
                     "slidesToShow": 3
                     }
                     }, {
                     "breakpoint": 768,
                     "settings": {
                     "slidesToShow": 2
                     }
                     }, {
                     "breakpoint": 554,
                     "settings": {
                     "slidesToShow": 2
                     }
                     }]'>

                    <?php
                    foreach ($newproducts as $key => $pvalue) {
                        ?>
                        <div class="js-slide products-group">
                            <div class="product-item">
                                <div class="product-item__outer h-100">
                                    <div class="product-item__inner px-wd-4 p-2 p-md-3">
                                        <div class="product-item__body pb-xl-2">
                                            <div class="mb-2"><a href="#" class="font-size-12 text-gray-5"><?php echo $pvalue['category_name']; ?></a></div>
                                            <h5 class="mb-1 product-item__title"><a href="#" class="text-blue font-weight-bold"><?php echo $pvalue['title']; ?></a></h5>
                                            <div class="mb-2">
                                                <a href="#" class="d-block text-center">
                                                    <img class="img-fluid backgroundsetimage" src="<?php echo base_url(); ?>assets/theme2/img/212X200/blank.png" style="background:url('<?php echo PRODUCTIMAGELINK . $pvalue['file_name'] ?>')" alt="Image Description">
                                                </a>
                                            </div>
                                            <div class="flex-center-between mb-1">
                                                 <div class="prodcut-price">
                                                        <div class="text-gray-100">{{<?php echo $pvalue['price']; ?>|currency:"<?php echo globle_currency;?>"}}</div>
                                                    </div>
                                                <div class="d-none d-xl-block prodcut-add-cart">
                                                    <a href="<?php echo site_url('Product/productDetailsView/' . $key); ?>" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                                </div>
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
        </div>
        <!-- End Recently viewed -->
        <!-- End Brand Carousel -->
    </div>
</main>
<!-- ========== END MAIN CONTENT ========== -->

<?php
$this->load->view('layout/footer');
?>