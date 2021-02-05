<?php
$this->load->view('layout/header');
?>

<section id="page-title" class="page-title-parallax page-title-dark page-title-center" style="background-image: url('<?php echo base_url(); ?>assets/theme2/res/images/sections/menu2.jpg'); background-size: cover; padding: 120px 0 180px;" data-bottom-top="background-position:0 0px;" data-top-bottom="background-position:0px -300px;">
    <div class="container clearfix">
        <h1 class="font-secondary capitalize ls0" style="font-size: 74px;">Menu</h1>
        <span class="t400">Choose Items from Our Menu</span>
    </div>
</section>

<section id="content" style="overflow: visible;"  ng-controller="ProductController">
    <div class="content-wrap nopadding">
        <div class="container">
            <div class="tabs tabs-justify clear-bottommargin clearfix" id="tab-1">
                <ul class="tab-nav clearfix border-bottom-0">
                    <?php
                    foreach ($categories as $catkey => $catvalue) {
                        ?>
                        <li><a href="#tabs-breakfast"><?php echo $catvalue['category_name']; ?></a></li>
                    <?php } ?>
                </ul>
                <div class="tab-container mt-4">
                    <div class="tab-content clearfix" id="tabs-breakfast">
                        <div class="row clearfix">
                            <div class="col-lg-3 col-md-6"  ng-repeat="(k, product) in productResults.products">
                                <div class="iportfolio mb-4 clearfix">
                                    <a href="#" ng-click="addToCart(product.product_id, 1)" class="portfolio-image"><img src="<?php echo base_url(); ?>assets/theme2/res/food/{{product.file_name}}" alt="1" class="rounded"></a>
                                    <div class="portfolio-desc pt-2">
                                        <h4 class="mb-1"><a href="#" class="" >{{product.title}}</a></h4>
                                        <div class="item-price">{{product.price|currency:"<?php echo globle_currency; ?> "}}</div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                 
                </div>
            </div>
        </div>
        <div class="section mb-0 mt-3" style="padding: 80px 0; background: #F5F5F5 url('<?php echo base_url(); ?>assets/theme2/res/images/food-pattern.png') repeat center center;">
            <div class="container">
                <div class="heading-block nobottomborder center bottommargin-sm">
                    <span class="font-primary ls1 color">Steps of Order</span>
                    <h3 class="nott font-secondary ls0" style="font-size: 52px; line-height: 1.3;">How do you Get your Food</h3>
                </div>
                <div class="clear"></div>
                <div class="row mt-5 clearfix">
                    <div class="col-lg-4 col-sm-6 bottommargin-sm">
                        <div class="feature-box media-box">
                            <div class="fbox-media" style="width: 60px; height: 60px">
                                <img src="<?php echo base_url(); ?>assets/theme2/res/images/icons/route.svg" alt="">
                            </div>
                            <h3>1. Select Your Location</h3>
                            <p></p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 bottommargin-sm">
                        <div class="feature-box media-box">
                            <div class="fbox-media" style="width: 60px; height: 60px">
                                <img src="<?php echo base_url(); ?>assets/theme2/res/images/icons/shop.svg" alt="">
                            </div>
                            <h3>2. Choose your Food</h3>
                            <p></p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 bottommargin-sm">
                        <div class="feature-box media-box">
                            <div class="fbox-media" style="width: 75px; height: 60px">
                                <img src="<?php echo base_url(); ?>assets/theme2/res/images/icons/delivery-bg.svg" alt="">
                            </div>
                            <h3>3. Your Item is on the Way</h3>
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section nomargin nobg" style="padding: 80px 0 70px;">
            <div class="container">
                <div class="divcenter d-flex justify-content-center center" style="max-width: 900px;">
                    <h3 class="mb-0 ls0">Free Delivery On Order Value $300 And Up <a href="#" class="button button-circle button-xlarge button-light text-white ls0 nott mt-0 mb-1 ml-3 colorlightgreen" style="position: relative;"><span>Order Now</span> <i class="icon-line-arrow-right t600"></i></a></h3>
                </div>
            </div>
        </div>
    </div>
    <div style="position: absolute; bottom: 0; left: 0; width: 100%; z-index: 3; background: url('<?php echo base_url(); ?>assets/theme2/res/images/sketch-header.png') repeat center bottom; background-size: auto 100%; height: 40px; margin-bottom: -10px;"></div>
</section>
<script>
    var searchdata = "<?php echo isset($_GET["search"]) ? ($_GET["search"] != '' ? $_GET["search"] : '0') : "0"; ?>";

    var category_id = <?php echo $category; ?>;
    var custom_id = <?php echo $category; ?>;</script>
<!--angular controllers-->
<script src="<?php echo base_url(); ?>assets/theme2/js/jquery.js"></script>
<script src="<?php echo base_url(); ?>assets/theme2/jquery.pajinate.min.js"></script>

<script src="<?php echo base_url(); ?>assets/theme2/angular/productController.js"></script>


<?php
$this->load->view('layout/footer');
?>