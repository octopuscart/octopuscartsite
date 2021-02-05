<?php
$this->load->view('layout/header');
?>
<?php
$linklist = [];
foreach ($categorie_parent as $key => $value) {
    $cattitle = $value['category_name'];
    $catid = $value['id'];
    $liobj = "<li><a href='" . site_url("Product/ProductList/" . $catid) . "'>$cattitle</a></li>";
    array_push($linklist, $liobj);
}



$image1 = "";
$image2 = "";
?>
<div style="opacity: 0;position: fixed;">

    {{showmodel = 1}}
</div>

<style>
    .page_navigation a {
        padding: 5px 10px;
        border: 1px solid #fed700;
        margin: 5px;
        background: #fed700;
        color: black;
        border-radius: 19px;
    }
    .page_navigation a.active_page {
        padding: 5px 10px;
        border: 1px solid #fed700;
        margin: 5px;
        background: #fff;
        color: black;
    }

    .colorblock{
        font-weight: 500;

        padding: 0px 10px;
        height: 13px;
        width: 100x;
        /* float: left; */
        margin-top: -71px;
        position: absolute;
        margin: auto;
        border: 1px solid #0000005e;
        border: 1px solid #0000005e;
        text-shadow: 0px 1px 4px #000;
        margin-top: -71px;
        margin-left: -7px;
    }


    /*    .product-box1 .product-img-holder {
            min-height: 260px;
            display: block
        }*/



    /*    .product-box1{
            min-height: 260px;
    
        }*/

    .h-100 {
    height: 100% !important;
    border: 1px solid #f5f5f5;
}
</style>


<!-- ========== MAIN CONTENT ========== -->
<main id="content" role="main" ng-controller="ProductController">
    <!-- breadcrumb -->
    <div class="bg-gray-13 bg-md-transparent">
        <div class="container">
            <!-- breadcrumb -->
            <div class="my-md-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="<?php echo site_url("/"); ?>">Octopuscart</a></li>
                        <?php
                        foreach ($linklist as $key => $value) {
                            ?>
                            <a class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 " aria-current="page" style="color:black"><?php echo $value; ?></a>
                            <a class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1" aria-current="page"></a>
                            <?php
                        }
                        ?>
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

                            <div id="" class=" " >
                                <ul class="list-unstyled dropdown-list">
                                    <!-- Menu List -->
                                    <?php
                                    foreach ($categories as $catkey => $catvalue) {
                                        ?>
                                        <li>
                                            <a href="<?php echo site_url('Product/productList/1/' . $catvalue['id']) ?>"  class="dropdown-item">
                                                <?php echo $catvalue['category_name']; ?><span><i class="flaticon-next"></i></span>
                                            </a>
                                        </li>
                                    <?php } ?>


                                </ul>
                            </div>
                        </li>

                    </ul>
                    <!-- End List -->
                </div>

                <div class="mb-8">
                     <div class="range-slider">
                                <h4 class="font-size-14 mb-3 font-weight-bold">Price</h4>
                                <!-- Range Slider -->
                                <input class="js-range-slider" type="text"
                                data-extra-classes="u-range-slider u-range-slider-indicator u-range-slider-grid"
                                data-type="double"
                                data-grid="false"
                                data-hide-from-to="true"
                                data-prefix="$"
                                data-min="0"
                                data-max="300"
                                data-from="0"
                                data-to="3000"
                                data-result-min="#rangeSliderExample3MinResult"
                                data-result-max="#rangeSliderExample3MaxResult">
                                <!-- End Range Slider -->
                                <div class="mt-1 text-gray-111 d-flex mb-4">
                                    <span class="mr-0dot5">Price: </span>
                                    <span>$</span>
                                    <span id="rangeSliderExample3MinResult" class=""></span>
                                    <span class="mx-0dot5"> — </span>
                                    <span>$</span>
                                    <span id="rangeSliderExample3MaxResult" class=""></span>
                                </div>
                                <button type="submit" class="btn px-4 btn-primary-dark-w py-2 rounded-lg">Filter</button>
                            </div>
                      
                </div>
            </div>
            <div class="col-xl-9 col-wd-9gdot5">

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


                            <li class="col-6 col-md-3 col-wd-2gdot4 product-item {{globleCartData.products[product.id] ? 'activeproduct': '' }} {{(product.hasvarient && globleCartData.products[product.varients[product.selectedobject].id]) ? 'activeproduct': '' }}"  ng-repeat="(k, product) in productResults.products" >
                                <div class="product-item__outer h-100">
                                    <div class="product-item__inner px-xl-4 p-3">
                                        <div class="product-item__body pb-xl-2">
                                            <div class="mb-2"><a href="../shop/product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">Speakers</a></div>
                                            <h5 class="mb-1 product-item__title"><a href="../shop/single-product-fullwidth.html" class="text-blue font-weight-bold">{{product.title}}</a></h5>
                                            <div class="mb-2">
                                                <a href="../shop/single-product-fullwidth.html" class="d-block text-center"><img class="img-fluid" src="<?php echo base_url(); ?>assets/images/defaultproduct.png" alt="Image Description"></a>
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
                                                 <li class="line-clamp-1 mb-1 list-bullet">{{product.short_description}}</li>
                                                <li class="line-clamp-1 mb-1 list-bullet">{{product.description}}</li>
                                          </ul>
                                            <div class="text-gray-20 mb-2 font-size-12">SKU: {{product.sku}}</div>
                                            <div class="flex-center-between mb-1">
                                                <div class="prodcut-price">
                                                    <div class="text-gray-100">{{product.price}}</div>
                                                </div>
                                                <div class="d-none d-xl-block prodcut-add-cart">
                                                    <button ng-click="addToCart(product.product_id, 1)" class="btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-item__footer">
                                            <div class="border-top pt-2 flex-center-between flex-wrap">
                                                <a href="../shop/compare.html" class="text-gray-6 font-size-13"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                                                <a href="../shop/wishlist.html" class="text-gray-6 font-size-13"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>


                        </ul>
                    </div>


                </div>

                <div class="col-md-12" id="paging_container3" style="margin-bottom:30px;">
                    <div class="showing-info">
                        <p class="text-center"><span class="info_text ">Showing {0}-{1} of {2} results</span></p>
                    </div>
                    <div class="row products-container  content" ng-if="productProcess.state == 2" style="display: none;">
                        <!-- Item -->
                        <div class="col-sm-4 animated zoomIn productscounter"  ng-repeat="(k, product) in productResults.productscounter">
                        </div>
                    </div>
                    <center>
                        <div class="page_navigation"></div>
                    </center>
                    <div style="clear: both"></div>
                </div>
                <!-- End Tab Content -->
                <!-- End Shop Body -->

            </div>
        </div>

    </div>
</main>
<!-- ========== END MAIN CONTENT ========== -->

<script>
    var category_id = <?php echo $category; ?>;</script>
<!--angular controllers-->

<!--<script src="<?php echo base_url(); ?>assets/theme2/js/jquery.pajinate.min.js"></script>-->

<script src="<?php echo base_url(); ?>assets/theme2/angular/productController.js"></script>


<script>
    var searchdata = "<?php echo isset($_GET["search"]) ? ($_GET["search"] != '' ? $_GET["search"] : '0') : "0"; ?>";

    var category_id = <?php echo $category; ?>;
    var custom_id = <?php echo $category; ?>;</script>
<?php
$this->load->view('layout/footer');
?>
<!--angular controllers-->
<script src="<?php echo base_url(); ?>assets/theme2/js/jquery.pajinate.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {

    });
</script>