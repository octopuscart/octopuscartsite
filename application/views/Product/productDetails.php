<?php
$this->load->view('layout/header');
?>
<style>
    .u-slick--slider-syncing .slick-slide.slick-current {
        border-bottom-width: 1px;
        border-bottom-color: #ffffff;
    }
    .veriationbutton{
        margin-right: 10px;
    }
</style>

<!-- ========== MAIN CONTENT ========== -->
<main id="content" role="main" ng-controller="productDetailsController">
    <!-- breadcrumb -->
    <div class="bg-gray-13 bg-md-transparent">
        <div class="container">
            <!-- breadcrumb -->
            <div class="my-md-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="../home/index.html">Home</a></li>
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="../shop/shop.html"><?php echo $product['tag']; ?></a></li>
                    </ol>
                </nav>
            </div>
            <!-- End breadcrumb -->
        </div>
    </div>
    <!-- End breadcrumb -->

    <div class="container">


        <!-- Single Product Body -->
        <div class="mb-xl-14 mb-6">
            <div class="row">

                <?php
                if ($product['attr']) {
                    ?>
                    <div class="col-md-5 mb-4 mb-md-0" ng-if="selectProduct">
                        <div id="sliderSyncingNav" class="js-slick-carousel u-slick mb-2"
                             data-infinite="true"
                             data-arrows-classes="d-none d-lg-inline-block u-slick__arrow-classic u-slick__arrow-centered--y rounded-circle"
                             data-arrow-left-classes="fas fa-arrow-left u-slick__arrow-classic-inner u-slick__arrow-classic-inner--left ml-lg-2 ml-xl-4"
                             data-arrow-right-classes="fas fa-arrow-right u-slick__arrow-classic-inner u-slick__arrow-classic-inner--right mr-lg-2 mr-xl-4"
                             data-nav-for="#sliderSyncingThumb">

                            <div class="js-slide">
                                <img class="img-fluid" src="<?php echo base_url(); ?>assets/theme2/images/testproduct/{{selectProduct.img[0]}}" alt="Image Description">
                            </div>
                            <div class="js-slide">
                                <img class="img-fluid" src="<?php echo base_url(); ?>assets/theme2/images/testproduct/{{selectProduct.img[1]}}" alt="Image Description">
                            </div>

                        </div>

                        <div id="sliderSyncingThumb" class="js-slick-carousel u-slick u-slick--slider-syncing u-slick--slider-syncing-size u-slick--gutters-1 u-slick--transform-off"
                             data-infinite="true"
                             data-slides-show="5"
                             data-is-thumbs="true"
                             data-nav-for="#sliderSyncingNav">

                            <div class="js-slide">
                                <img class="img-fluid" src="<?php echo base_url(); ?>assets/theme2/images/testproduct/{{selectProduct.img[0]}}" alt="Image Description">
                            </div>
                            <div class="js-slide">
                                <img class="img-fluid" src="<?php echo base_url(); ?>assets/theme2/images/testproduct/{{selectProduct.img[1]}}" alt="Image Description">
                            </div>


                        </div>
                    </div>
                    <?php
                } else {
                    ?>
                    <div class="col-md-5 mb-4 mb-md-0" >
                        <div id="sliderSyncingNav" class="js-slick-carousel u-slick mb-2"
                             data-infinite="true"
                             data-arrows-classes="d-none d-lg-inline-block u-slick__arrow-classic u-slick__arrow-centered--y rounded-circle"
                             data-arrow-left-classes="fas fa-arrow-left u-slick__arrow-classic-inner u-slick__arrow-classic-inner--left ml-lg-2 ml-xl-4"
                             data-arrow-right-classes="fas fa-arrow-right u-slick__arrow-classic-inner u-slick__arrow-classic-inner--right mr-lg-2 mr-xl-4"
                             data-nav-for="#sliderSyncingThumb">
                                 <?php
                                 foreach ($product['img'] as $ikey => $ivalue) {
                                     ?>
                                <div class="js-slide">
                                    <img class="img-fluid" src="<?php echo base_url(); ?>assets/theme2/images/testproduct/<?php echo $ivalue; ?>" alt="Image Description">
                                </div>
                                <div class="js-slide">
                                    <img class="img-fluid" src="<?php echo base_url(); ?>assets/theme2/images/testproduct/<?php echo $ivalue; ?>" alt="Image Description">
                                </div>
                                <?php
                            }
                            ?>
                        </div>

                        <div id="sliderSyncingThumb" class="js-slick-carousel u-slick u-slick--slider-syncing u-slick--slider-syncing-size u-slick--gutters-1 u-slick--transform-off"
                             data-infinite="true"
                             data-slides-show="5"
                             data-is-thumbs="true"
                             data-nav-for="#sliderSyncingNav">
                                 <?php
                                 foreach ($product['img'] as $ikey => $ivalue) {
                                     ?>
                                <div class="js-slide" style="cursor: pointer;">
                                    <img class="img-fluid" src="<?php echo base_url(); ?>assets/theme2/images/testproduct/<?php echo $ivalue; ?>" alt="Image Description">
                                </div>
                                <div class="js-slide" style="cursor: pointer;">
                                    <img class="img-fluid" src="<?php echo base_url(); ?>assets/theme2/images/testproduct/<?php echo $ivalue; ?>" alt="Image Description">
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <div class="col-md-7 mb-md-6 mb-lg-0">
                    <div class="mb-2">
                        <div class="border-bottom mb-3 pb-md-1 pb-3">
                            <a href="#" class="font-size-12 text-gray-5 mb-2 d-inline-block"><?php echo $product['tag']; ?></a>
                            <h2 class="font-size-25 text-lh-1dot2"><?php echo $product['title']; ?></h2>
                            <div class="mb-2">
                                <a class="d-inline-flex align-items-center small font-size-15 text-lh-1" href="#">
                                    <div class="text-warning mr-2">
                                        <small class="fas fa-star"></small>
                                        <small class="fas fa-star"></small>
                                        <small class="fas fa-star"></small>
                                        <small class="fas fa-star"></small>
                                        <small class="far fa-star text-muted"></small>
                                    </div>

                                </a>
                            </div>
                            <div class="d-md-flex align-items-center">
                                <div class="ml-md-3 text-gray-9 font-size-14">Availability: <span class="text-green font-weight-bold">In stock</span></div>
                            </div>
                        </div>
                        <div class="flex-horizontal-center flex-wrap mb-4">
                            <a href="#" class="text-gray-6 font-size-13 mr-2"><i class="ec ec-favorites mr-1 font-size-15"></i> Wishlist</a>
                            <a href="#" class="text-gray-6 font-size-13 ml-2"><i class="ec ec-compare mr-1 font-size-15"></i> Compare</a>
                        </div>
                        <div class="mb-2">
                            <ul class="font-size-14 pl-3 ml-1 text-gray-110">
                                <?php
                                foreach ($product['spacs'] as $skey => $svalue) {
                                    ?>
                                    <li><?php echo $svalue; ?></li>
                                    <?php
                                }
                                ?>
                            </ul>
                        </div>
                        <p><strong>SKU</strong>: <?php echo $product['sku']; ?></p>

                        <div class="border-top border-bottom py-3 mb-4">
                            <div class="d-flex align-items-center">

                                <!-- Select -->
                                <div class="row"> <?php
                                    foreach ($product['attr'] as $skey => $svalue) {
                                        ?>
                                        <button class="btn veriationbutton {{selectVeriation==<?php echo $skey; ?>?'btn-danger':'btn-warning'}}"  ng-click="changeVeriation(<?php echo $skey; ?>)" ><?php echo $svalue['title']; ?></button>
                                        <?php
                                    }
                                    ?>
                                </div>
                                <!-- End Select -->
                            </div>
                        </div>
                        <div class="d-md-flex align-items-end mb-3">
                            <div class="max-width-150 mb-4 mb-md-0">
                                <h6 class="font-size-14">MOQ</h6>
                                <!-- Quantity -->
                                <div class="border rounded-pill py-2 px-3 border-color-1">
                                    <div class="js-quantity row align-items-center">
                                        <div class="col">
                                            <input class="js-result form-control h-auto border-0 rounded p-0 shadow-none" type="number" value="<?php echo $product['moq']; ?>" min='<?php echo $product['moq']; ?>'>
                                        </div>
                                        <div class="col-auto pr-1">
                                            <a class="js-minus btn btn-icon btn-xs btn-outline-secondary rounded-circle border-0" href="javascript:;">
                                                <small class="fas fa-minus btn-icon__inner"></small>
                                            </a>
                                            <a class="js-plus btn btn-icon btn-xs btn-outline-secondary rounded-circle border-0" href="javascript:;">
                                                <small class="fas fa-plus btn-icon__inner"></small>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Quantity -->
                            </div>
                            <div class="ml-md-3">
                                <a href="#" class="btn px-5 btn-primary-dark transition-3d-hover"  data-toggle="modal" data-target="#productInquire
                                   "><i class="ec ec-add-to-cart mr-2 font-size-20"></i> Inquire</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Single Product Body -->



    </div>
    <!-- Modal -->
    <div class="modal fade" id="productInquire" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form class="js-validate" novalidate="novalidate">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Product Inquiry</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="product-item__outer h-100">
                            <div class="product-item__inner p-md-3 row no-gutters">
                                <div class="col col-lg-auto product-media-left">
                                    <a href="#" class="max-width-150 d-block"><img class="img-fluid" src="<?php echo base_url(); ?>assets/theme2/images/testproduct/<?php echo $product['img'][0]; ?>" style="    height: 80px;" alt="Image Description"></a>
                                </div>
                                <div class="col product-item__body pl-2 pl-lg-3 mr-xl-2 mr-wd-1">
                                    <div class="mb-4">
                                        <div class="mb-2"><a href="#" class="font-size-12 text-gray-5"><?php echo $product['sku']; ?></a></div>
                                        <h5 class="product-item__title"><a href="#" class="text-blue font-weight-bold"><?php echo $product['title']; ?></a></h5>
                                    </div>


                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <!-- Input -->
                                        <div class="js-form-message mb-4">
                                            <label class="form-label">
                                                NAME
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" class="form-control" name="name" placeholder="" aria-label="" required="" data-msg="Please enter your frist name." data-error-class="u-has-error" data-success-class="u-has-success" autocomplete="off">
                                        </div>
                                        <!-- End Input -->
                                    </div>

                                    <div class="col-md-4">
                                        <!-- Input -->
                                        <div class="js-form-message mb-4">
                                            <label class="form-label">
                                                EMAIL
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" class="form-control" name="email" placeholder="" aria-label="" required="" data-msg="Please enter your last name." data-error-class="u-has-error" data-success-class="u-has-success">
                                        </div>
                                        <!-- End Input -->
                                    </div>

                                    <div class="col-md-4">
                                        <!-- Input -->
                                        <div class="js-form-message mb-4">
                                            <label class="form-label">
                                                CONTACT
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" class="form-control" name="contact_no" placeholder="" aria-label="" required="" data-msg="Please enter your last name." data-error-class="u-has-error" data-success-class="u-has-success">
                                        </div>
                                        <!-- End Input -->
                                    </div>


                                    <div class="col-md-12">
                                        <div class="js-form-message mb-4">
                                            <label class="form-label">
                                                MESSAGE
                                            </label>

                                            <div class="input-group">
                                                <textarea class="form-control p-5" rows="4" name="message" placeholder=""></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="send_inquiry" class="btn btn-primary">Send Inquiry</button>

                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


</main>
<!-- ========== END MAIN CONTENT ========== -->


<script>
    App.controller('productDetailsController', function ($scope, $http, $timeout, $interval) {

    $scope.productsAttr = <?php echo json_encode($product['attr']); ?>;
    console.log($scope.productsAttr[0]);
    $scope.selectVeriation = 0;
    $scope.selectProduct = $scope.productsAttr[$scope.selectVeriation ];
    $scope.changeVeriation = function(index){
    $scope.selectVeriation = index;
    $scope.selectProduct = $scope.productsAttr[$scope.selectVeriation ];
    $timeout(function(){
    $("#sliderSyncingNav").slick("refresh");
    $("#sliderSyncingThumb").slick("refresh");
    }, 500)


    }

    })
</script>

<?php
$this->load->view('layout/footer');
?>
