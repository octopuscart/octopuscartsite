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
        border: 1px solid #000;
        margin: 5px;
        background: #000;
        color: white;
    }
    .page_navigation a.active_page {
        padding: 5px 10px;
        border: 1px solid #000;
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

</style>


<!-- Inner Page Banner Area Start Here -->
<div class="inner-page-banner-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcrumb-area">

                    <ul>
                        <li><a href="<?php echo site_url("/"); ?>">Home</a></li>
                        <?php echo count($linklist) ? "<b class='barcomb-list'>/</b>" : ''; ?>
                        <?php
                        echo implode("<b class='barcomb-list'>/</b>", $linklist)
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Inner Page Banner Area End Here -->
<!-- Shop Page Area Start Here -->
<div class="shop-page-area" ng-controller="ProductController">
    <div class="container" id="paging_container1">



        <div class="row"  >
            <div class="col-lg-3 col-md-3">
                <div class="sidebar hidden-after-desk">
                    <h2 class="title-sidebar">SHOP CATEGORIES</h2>
                    <div class="category-menu-area sidebar-section-margin" id="category-menu-area">
                        <ul>
                            <?php
                            foreach ($categories as $catkey => $catvalue) {
                                ?>
                                <li>
                                    <a href="<?php echo site_url('Product/productList/1/' . $catvalue['id']) ?>">
                                        <?php echo $catvalue['category_name']; ?><span><i class="flaticon-next"></i></span>
                                    </a>
                                </li>
                            <?php } ?>

                        </ul>
                    </div>
<!--                    <h2 class="title-sidebar">BEST PRODUCTS</h2>
                    <div class="best-products sidebar-section-margin">
                        <div class="media" ng-repeat="prd in offerProducts">
                            <a href="#" class="pull-left">
                                <div class="product-img-holder" style="background: url(<?php echo PRODUCTIMAGELINK; ?>{{prd.file_name}});      background-size: cover;
                                     background-position: center;height:60px;width:60px;">

                                </div >                           
                            </a>
                            <div class="media-body">
                                <h3 class="media-heading"><a href="#" style="font-size: 13px;">{{prd.title}}</a></h3>
                                <p>{{prd.price|currency:"<?php echo globle_currency; ?> "}}</p>
                            </div>
                        </div>
                    </div>-->
                    <h2 class="title-sidebar">FILTER BY PRICE</h2>
                    
                    <p>
                        Price Range: {{productResults.price.minprice|currency}} to {{productResults.price.maxprice|currency}}
                    </p>
                    <div id="price-range-wrapper" class="price-range-wrapper" style="padding: 0px 20px;">
                        <div id="price-range-filter"></div>
                        <div class="price-range-select" style="margin: 0px;">
                            <div class="price-range" id="price-range-min"></div>
                            <div class="price-range" id="price-range-max"></div>
                        </div>
                        <button class="btn-services-shop-now" type="submit" value="Login" ng-click="getProducts()">Filter</button>
                    </div>
                    <h2 class="title-sidebar">Product Tags</h2>
                    <div class="product-tags sidebar-section-margin">
                        <ul>
                            <?php
                           
                            foreach ($producttag as $key => $value) {
                                ?>
                                <li><a href="<?php echo site_url('Product/productList/1/' . $value['id']) ?>" style="text-transform: uppercase"><?php echo $value['category_name']; ?></a></li>
                                <?php
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>


            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">


                <div id="content1"  ng-if="productProcess.state == 1" style="padding: 100px 0px;"> 

                    <!-- Tesm Text -->
                    <section class="error-page text-center pad-t-b-130">
                        <div class="container1"> 
                            <center>
                                <img src="<?php echo base_url() . 'assets/theme2/img/loader.gif' ?>">
                            </center>
                            <!-- Heading -->
                            <h1 style="font-size: 40px;text-align: center">Loading...</h1>
                        </div>
                    </section>

                </div>

                <div class="row inner-section-space-top"  style="padding-top: 10px;" >
                    <!-- Tab panes -->
                    <div class="tab-content" >
                        <div role="tabpanel"  class="tab-pane active clear products-container content" id="gried-view" ng-if="productProcess.state == 2"> 


                            <div style="clear:both"></div>
                            <!--                            <div class="" style="height: 265px;">
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 productlistmeddile" style="  ">
                                                                <div class="banner-bottom-left col-lg-8 col-md-8 col-sm-8 col-xs-12"><a href="http://maharajamart.com/deal-of-the-week.html"><img src="http://maharajamart.com/pub/media/wysiwyg/WhatsApp_Image_2018-10-15_at_11.30.10_PM.jpeg" alt=""></a></div>
                                                                <div class="banner-bottom-right col-lg-4 col-md-4 col-sm-4 col-xs-12"><a href="http://maharajamart.com/deal-of-the-day.html"><img class="img-responsive" src="http://maharajamart.com/pub/media/wysiwyg/WhatsApp_Image_2018-10-15_at_11.30.11_PM.jpeg" alt=""></a></div>
                                                            </div>
                                                        </div>-->
                            <div style="clear:both"></div>



                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 animated productlistborder {{globleCartData.products[product.id] ? 'activeproduct': '' }} {{(product.hasvarient && globleCartData.products[product.varients[product.selectedobject].id]) ? 'activeproduct': '' }}"  ng-repeat="(k, product) in productResults.products" >
                                <div class="product-box1" >
                                    <div class="addedtocard"><i class="fa fa-cart-plus"></i></div>

                                    <div class="product-img-holder" style="background: url(<?php echo PRODUCTIMAGELINK; ?>{{product.file_name}});      background-size: cover;
                                         background-position: center;">

                                    </div>

                                    <div class="product-content-holder" ng-if="product.hasvarient == 0">
                                        <h3>
                                            <div>{{product.title}}  <br>
                                               <small>SKU#: {{product.sku}}</small>

                                          
<!--                                            <select class="productsveriantselection" >

                                                <option  selected  >{{product.description}} - {{product.regular_price|currency:"<?php echo globle_currency; ?> "}}</option>
                                            </select>-->
                                            </div>


                                            <span><span  style="font-size: 11px;" ng-if="product.varients[product.selectedobject].sale_price > 0">{{product.varients[product.selectedobject].regular_price|currency:"<?php echo globle_currency; ?> "}}</span>{{product.varients[product.selectedobject].price|currency:"<?php echo globle_currency; ?> "}}</span>


                                            <span><span  style="font-size: 11px;" ng-if="product.sale_price > 0">{{product.regular_price|currency:"<?php echo globle_currency; ?> "}}</span>{{product.price|currency:"<?php echo globle_currency; ?> "}}</span>

                                        </h3>
                                        <div class="productbuttonscontainer">

                                            <button ng-click="addToCart(product.product_id, 1)" class="productbutton" style="    background: #d92229;
                                                    color: white;
                                                    border-color: #d92229;">Add To Cart</button>
                                            <button ng-click="addToBuy(product.product_id, 1)" type="button" class="productbutton">Buy Now</button>

                                        </div>  
                                    </div>


                                    <div class="product-content-holder" ng-if="product.hasvarient == 1">
                                        <h3>
                                            <div>{{product.varients[product.selectedobject].title}}  <br>
                                                <small>SKU#: {{product.sku}}</small> <br/>
                                                <select class="productsveriantselection" ng-change="changeProductVarient(product.selectedobject, product)" ng-model="product.selectedobject" >

                                                    <option ng-if="product.selectedobject == prd.id" selected value="{{prd.id}}" ng-repeat="(prk, prd) in product.varients">{{prd.description}} - {{prd.regular_price|currency:"<?php echo globle_currency; ?> "}}</option>
                                                    <option ng-if="product.selectedobject != prd.id"  value="{{prd.id}}" ng-repeat="(prk, prd) in product.varients">{{prd.description}} - {{prd.regular_price|currency:"<?php echo globle_currency; ?> "}}</option>
                                                </select>

                                            </div>
                                            <span><span  style="font-size: 11px;" ng-if="product.varients[product.selectedobject].sale_price > 0">{{product.varients[product.selectedobject].regular_price|currency:"<?php echo globle_currency; ?> "}}</span>{{product.varients[product.selectedobject].price|currency:"<?php echo globle_currency; ?> "}}</span>

                                        </h3>


                                        <div class="productbuttonscontainer" >

                                            <button ng-click="addToCart(product.varients[product.selectedobject].id, 1)" class="productbutton" style="    background: #d92229;
                                                    color: white;
                                                    border-color: #d92229;">Add To Cart</button>
                                            <button ng-click="addToBuy(product.varients[product.selectedobject].id, 1)" type="button" class="productbutton">Buy Now</button>

                                        </div>  
                                    </div>

                                </div>
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
                    </div>

                </div>

            </div>

        </div>



        <div id="content"  ng-if="productProcess.state == 0"> 
            <div ng-if="checkproduct == 0">
                <!-- Tesm Text -->
                <section class="error-page text-center pad-t-b-130">
                    <div class="container "> 

                        <!-- Heading -->
                        <h1 style="font-size: 40px">No Product Found</h1>
                        <p>Products Will Comming Soon</p>
                        <hr class="dotted">
                        <a href="<?php echo site_url(); ?>" class="woocommerce-Button button btn-shop-now-fill">BACK TO HOME</a>
                    </div>
                </section>
            </div>
        </div>





    </div>



</div>


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