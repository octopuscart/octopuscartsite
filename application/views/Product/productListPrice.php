<?php
$this->load->view('layout/header_1');
?>

<!-- ========== MAIN CONTENT ========== -->
<main id="content" role="main">
    <!-- breadcrumb -->
    <div class="bg-gray-13 bg-md-transparent">
        <div class="container">
            <!-- breadcrumb -->
            <div class="my-md-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="../home/index.html">Home</a></li>
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Smart Phones & Tablets</li>
                    </ol>
                </nav>
            </div>
            <!-- End breadcrumb -->
        </div>
    </div>
    <!-- End breadcrumb -->

    <div class="container">
        <div class="row mb-8">
            <div class="d-none d-xl-block col-xl-3 col-wd-2gdot5">
                <div class="mb-8 border border-width-2 border-color-3 borders-radius-6">
                    <!-- List -->
                    <ul id="sidebarNav" class="list-unstyled mb-0 sidebar-navbar">
                        <li>
                            <a class="dropdown-toggle dropdown-toggle-collapse dropdown-title" href="javascript:;" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="sidebarNav1Collapse" data-target="#sidebarNav1Collapse">
                                Show All Categories
                            </a>

                            <div id="sidebarNav1Collapse" class="collapse" data-parent="#sidebarNav">
                                <ul id="sidebarNav1" class="list-unstyled dropdown-list">
                                    <!-- Menu List -->
                                    <li><a class="dropdown-item" href="#">Accessories<span class="text-gray-25 font-size-12 font-weight-normal"> (56)</span></a></li>
                                    <li><a class="dropdown-item" href="#">Cameras & Photography<span class="text-gray-25 font-size-12 font-weight-normal"> (11)</span></a></li>
                                    <li><a class="dropdown-item" href="#">Computer Components<span class="text-gray-25 font-size-12 font-weight-normal"> (22)</span></a></li>
                                    <li><a class="dropdown-item" href="#">Gadgets<span class="text-gray-25 font-size-12 font-weight-normal"> (5)</span></a></li>
                                    <li><a class="dropdown-item" href="#">Home Entertainment<span class="text-gray-25 font-size-12 font-weight-normal"> (7)</span></a></li>
                                    <li><a class="dropdown-item" href="#">Laptops & Computers<span class="text-gray-25 font-size-12 font-weight-normal"> (42)</span></a></li>
                                    <li><a class="dropdown-item" href="#">Printers & Ink<span class="text-gray-25 font-size-12 font-weight-normal"> (63)</span></a></li>
                                    <li><a class="dropdown-item" href="#">Smart Phones & Tablets<span class="text-gray-25 font-size-12 font-weight-normal"> (11)</span></a></li>
                                    <li><a class="dropdown-item" href="#">TV & Audio<span class="text-gray-25 font-size-12 font-weight-normal"> (66)</span></a></li>
                                    <li><a class="dropdown-item" href="#">Video Games & Consoles<span class="text-gray-25 font-size-12 font-weight-normal"> (31)</span></a></li>
                                    <!-- End Menu List -->
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a class="dropdown-current active" href="#">Smart Phones & Tablets <span class="text-gray-25 font-size-12 font-weight-normal"> (50)</span></a>

                            <ul class="list-unstyled dropdown-list">
                                <!-- Menu List -->
                                <li><a class="dropdown-item" href="#">Smartphones<span class="text-gray-25 font-size-12 font-weight-normal"> (30)</span></a></li>
                                <li><a class="dropdown-item" href="#">Tablets<span class="text-gray-25 font-size-12 font-weight-normal"> (20)</span></a></li>
                                <!-- End Menu List -->
                            </ul>
                        </li>
                    </ul>
                    <!-- End List -->
                </div>
           
                <div class="mb-8">
                    <div class="border-bottom border-color-1 mb-5">
                        <h3 class="section-title section-title__sm mb-0 pb-2 font-size-18">Latest Products</h3>
                    </div>
                    <ul class="list-unstyled">
                           <?php
                            foreach ($products as $pkey => $pvalue) {
                                ?>
                        <li class="mb-4">
                            <div class="row">
                                <div class="col-auto">
                                    <a href="<?php echo site_url('Product/productDetailsView/'.$pkey);?>" class="d-block width-75">
                                        <img class="img-fluid" src="<?php echo base_url(); ?>assets/theme2/images/testproduct/<?php echo $pvalue['img'][0]; ?>" alt="Image Description">
                                    </a>
                                </div>
                                <div class="col">
                                    <h3 class="text-lh-1dot2 font-size-14 mb-0"><a href="<?php echo site_url('Product/productDetailsView/'.$pkey);?>"><?php echo $pvalue['title']; ?></a></h3>
                                    <div class="text-warning text-ls-n2 font-size-16 mb-1" style="width: 80px;">
                                        <small class="fas fa-star"></small>
                                        <small class="fas fa-star"></small>
                                        <small class="fas fa-star"></small>
                                        <small class="fas fa-star"></small>
                                        <small class="far fa-star text-muted"></small>
                                    </div>
                                   
                                </div>
                            </div>
                        </li>
                        <?php }
                            ?>
                        
                    </ul>
                </div>
            </div>
            <div class="col-xl-9 col-wd-9gdot5">
                <!-- Shop-control-bar Title -->
                <div class="d-block d-md-flex flex-center-between mb-3">
                    <h3 class="font-size-25 mb-2 mb-md-0">Smart Phones & Tablets</h3>
                    <p class="font-size-14 text-gray-90 mb-0">Showing 1–25 of 56 results</p>
                </div>
                <!-- End shop-control-bar Title -->
                <!-- Shop-control-bar -->
                <div class="bg-gray-1 flex-center-between borders-radius-9 py-1">
                    <div class="d-xl-none">
                        <!-- Account Sidebar Toggle Button -->
                        <a id="sidebarNavToggler1" class="btn btn-sm py-1 font-weight-normal" href="javascript:;" role="button"
                           aria-controls="sidebarContent1"
                           aria-haspopup="true"
                           aria-expanded="false"
                           data-unfold-event="click"
                           data-unfold-hide-on-scroll="false"
                           data-unfold-target="#sidebarContent1"
                           data-unfold-type="css-animation"
                           data-unfold-animation-in="fadeInLeft"
                           data-unfold-animation-out="fadeOutLeft"
                           data-unfold-duration="500">
                            <i class="fas fa-sliders-h"></i> <span class="ml-1">Filters</span>
                        </a>
                        <!-- End Account Sidebar Toggle Button -->
                    </div>
                    <div class="px-3 d-none d-xl-block">
                        <ul class="nav nav-tab-shop" id="pills-tab" role="tablist">

                            <li class="nav-item">
                                <a class="nav-link active" id="pills-two-example1-tab" data-toggle="pill" href="#pills-two-example1" role="tab" aria-controls="pills-two-example1" aria-selected="false">
                                    <div class="d-md-flex justify-content-md-center align-items-md-center">
                                        <i class="fa fa-align-justify"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-three-example1-tab" data-toggle="pill" href="#pills-three-example1" role="tab" aria-controls="pills-three-example1" aria-selected="true">
                                    <div class="d-md-flex justify-content-md-center align-items-md-center">
                                        <i class="fa fa-list"></i>
                                    </div>
                                </a>
                            </li>

                        </ul>
                    </div>
                    <div class="d-flex">
                        <form method="get">
                            <!-- Select -->
                            <select class="js-select selectpicker dropdown-select max-width-200 max-width-160-sm right-dropdown-0 px-2 px-xl-0"
                                    data-style="btn-sm bg-white font-weight-normal py-2 border text-gray-20 bg-lg-down-transparent border-lg-down-0">
                                <option value="one" selected>Default sorting</option>
                                <option value="two">Sort by popularity</option>
                                <option value="three">Sort by average rating</option>
                                <option value="four">Sort by latest</option>
                                <option value="five">Sort by price: low to high</option>
                                <option value="six">Sort by price: high to low</option>
                            </select>
                            <!-- End Select -->
                        </form>
                        <form method="POST" class="ml-2 d-none d-xl-block">
                            <!-- Select -->
                            <select class="js-select selectpicker dropdown-select max-width-120"
                                    data-style="btn-sm bg-white font-weight-normal py-2 border text-gray-20 bg-lg-down-transparent border-lg-down-0">
                                <option value="one" selected>Show 20</option>
                                <option value="two">Show 40</option>
                                <option value="three">Show All</option>
                            </select>
                            <!-- End Select -->
                        </form>
                    </div>
                    <nav class="px-3 flex-horizontal-center text-gray-20 d-none d-xl-flex">
                        <form method="post" class="min-width-50 mr-1">
                            <input size="2" min="1" max="3" step="1" type="number" class="form-control text-center px-2 height-35" value="1">
                        </form> of 3
                        <a class="text-gray-30 font-size-20 ml-2" href="#">→</a>
                    </nav>
                </div>
                <!-- End Shop-control-bar -->
                <!-- Shop Body -->
                <!-- Tab Content -->
                <div class="tab-content" id="pills-tabContent">

                    <div class="tab-pane fade pt-2 show active" id="pills-two-example1" role="tabpanel" aria-labelledby="pills-two-example1-tab" data-target-group="groups">
                        <ul class="row list-unstyled products-group no-gutters">
                            <?php
                            foreach ($products as $pkey => $pvalue) {
                                ?>

                                <li class="col-6 col-md-3 col-wd-2gdot4 product-item">
                                    <div class="product-item__outer h-100">
                                        <div class="product-item__inner px-xl-4 p-3">
                                            <div class="product-item__body pb-xl-2">
                                                <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5"><?php echo $pvalue['tag']; ?></a></div>
                                                <h5 class="mb-1 product-item__title"><a href="<?php echo site_url('Product/productDetailsView/'.$pkey);?>" class="text-blue font-weight-bold"><?php echo $pvalue['title']; ?></a></h5>
                                                <div class="mb-2">
                                                    <a href="<?php echo site_url('Product/productDetailsView/'.$pkey);?>" class="d-block text-center"><img class="img-fluid" src="<?php echo base_url(); ?>assets/theme2/images/testproduct/<?php echo $pvalue['img'][0]; ?>" alt="Image Description"></a>
                                                </div>
                                                <div class="mb-3">
                                                    <a class="d-inline-flex align-items-center small font-size-14" href="#">
                                                        <div class="text-warning mr-2">
                                                            <small class="fas fa-star"></small>
                                                            <small class="fas fa-star"></small>
                                                            <small class="fas fa-star"></small>
                                                            <small class="fas fa-star"></small>
                                                            <small class="far fa-star text-muted"></small>
                                                        </div>
                                                        <span class="text-secondary">(40)</span>
                                                    </a>
                                                </div>
                                                <ul class="font-size-12 p-0 text-gray-110 mb-4">
                                                    <?php
                                                    $spacs = $pvalue['spacs'];
                                                    foreach ($spacs as $key => $value) {
                                                        if ($key < 4) {
                                                            ?>
                                                            <li class="line-clamp-1 mb-1 list-bullet"><?php echo $value; ?></li>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </ul>
                                                <div class="text-gray-20 mb-2 font-size-12">SKU: <?php echo $pvalue['sku']; ?></div>
                                                <div class="flex-center-between mb-1">
                                                    <div class="prodcut-add-cart">
                                                        <a href="<?php echo site_url('Product/productDetailsView/'.$pkey);?>" class="btn btn-sm btn-block btn-primary-dark btn-wide transition-3d-hover">Inquire</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-item__footer">
                                               
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            <?php }
                            ?>

                        </ul>
                    </div>
                    <div class="tab-pane fade pt-2" id="pills-three-example1" role="tabpanel" aria-labelledby="pills-three-example1-tab" data-target-group="groups">
                        <ul class="d-block list-unstyled products-group prodcut-list-view">
                            <?php
                            foreach ($products as $pkey => $pvalue) {
                                ?>
                                <li class="product-item remove-divider">
                                    <div class="product-item__outer w-100">
                                        <div class="product-item__inner remove-prodcut-hover py-4 row">
                                            <div class="product-item__header col-6 col-md-4">
                                                <div class="mb-2">
                                                    <a href="<?php echo site_url('Product/productDetailsView/'.$pkey);?>" class="d-block text-center"><img class="img-fluid" src="<?php echo base_url(); ?>assets/theme2/images/testproduct/<?php echo $pvalue['img'][0]; ?>" alt="Image Description"></a>
                                                </div>
                                            </div>
                                            <div class="product-item__body col-6 col-md-5">
                                                <div class="pr-lg-10">
                                                    <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5"><?php echo $pvalue['tag']; ?></a></div>
                                                    <h5 class="mb-2 product-item__title"><a href="<?php echo site_url('Product/productDetailsView/'.$pkey);?>" class="text-blue font-weight-bold"><?php echo $pvalue['title']; ?></a></h5>
                                                    <div class="prodcut-price mb-2 d-md-none">
                                                        <div class="text-gray-100">$685,00</div>
                                                    </div>
                                                    <div class="mb-3 d-none d-md-block">
                                                        <a class="d-inline-flex align-items-center small font-size-14" href="#">
                                                            <div class="text-warning mr-2">
                                                                <small class="fas fa-star"></small>
                                                                <small class="fas fa-star"></small>
                                                                <small class="fas fa-star"></small>
                                                                <small class="fas fa-star"></small>
                                                                <small class="far fa-star text-muted"></small>
                                                            </div>
                                                            <span class="text-secondary">(40)</span>
                                                        </a>
                                                    </div>
                                                    <ul class="font-size-12 p-0 text-gray-110 mb-4 d-none d-md-block">
                                                        <?php
                                                        $spacs = $pvalue['spacs'];
                                                        foreach ($spacs as $key => $value) {
                                                            if ($key < 4) {
                                                                ?>
                                                                <li class="line-clamp-1 mb-1 list-bullet"><?php echo $value; ?></li>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-item__footer col-md-3 d-md-block">
                                                <div class="text-gray-20 mb-2 font-size-12">SKU: <?php echo $pvalue['sku']; ?></div>

                                                <div class="mb-3" style="    margin-top: 60px;">

                                                    <div class="prodcut-add-cart">
                                                        <a href="<?php echo site_url('Product/productDetailsView/'.$pkey);?>" class="btn btn-sm btn-block btn-primary-dark btn-wide transition-3d-hover">Inquire</a>
                                                    </div>
                                                </div>
                                                <div class="flex-horizontal-center justify-content-between justify-content-wd-center flex-wrap">
                                                    <a href="../shop/compare.html" class="text-gray-6 font-size-13 mx-wd-3"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                                    <a href="../shop/wishlist.html" class="text-gray-6 font-size-13 mx-wd-3"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            <?php }
                            ?>

                        </ul>
                    </div>

                </div>
                <!-- End Tab Content -->
                <!-- End Shop Body -->
                <!-- Shop Pagination -->
                <nav class="d-md-flex justify-content-between align-items-center border-top pt-3" aria-label="Page navigation example">
                    <div class="text-center text-md-left mb-3 mb-md-0">Showing 1–25 of 56 results</div>
                    <ul class="pagination mb-0 pagination-shop justify-content-center justify-content-md-start">
                        <li class="page-item"><a class="page-link current" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                    </ul>
                </nav>
                <!-- End Shop Pagination -->
            </div>
        </div>

    </div>
</main>
<!-- ========== END MAIN CONTENT ========== -->

<?php
$this->load->view('layout/footer');
?>
