<?php
$this->load->view('layout/header');
?>

<style>




    .cartbutton{
        width: 100%;
        padding: 6px;
        color: #fff!important;
    }


    .noti-check1 span{
        color: red;
        color: red;
        width: 111px;
        float: left;
        text-align: right;
        padding-right: 13px;
    }

    .noti-check1 h6{
        font-size: 15px;
        font-weight: 600;
    }

    .address_block{
        background: #fff;
        border: 3px solid #d30603;
        padding: 5px 10px;
        margin-bottom: 20px;
        height: 150px;


    }
    .checkcart {
        border-radius: 50%;
        position: absolute;
        top: -28px;
        left: -8px;
        padding: 4px;
        background: #fff;
        border: 2px solid green;
    }


    .default{
        border: 2px solid green;
    }

    .default{
        border: 2px solid green;
    }

    .checkcart i{
        color: green;
    }

    .address_button{
        padding: 0px 10px;
        margin-top: 15px;
        font-size: 10px;


    }

    .cartdetail_small {
        float: left;
        width: 203px;
    }

</style>






<!-- Inner Page Banner Area Start Here -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme2/res/cart.css" type="text/css" />

<!-- Inner Page Banner Area Start Here -->
<div class="bg-gray-13 bg-md-transparent">
    <div class="container">
        <!-- breadcrumb -->
        <div class="my-md-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                    <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="<?php echo site_url("/"); ?>">Home</a></li>
                    <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Checkout</li>
                </ol>
            </nav>
        </div>
        <!-- End breadcrumb -->
    </div>
</div>

<!-- Inner Page Banner Area End Here -->

<!-- Content -->

<section id="content" style="overflow: visible;" class="checkout-page">
    <div class="content-wrap nobottompadding">
        <div class="container clearfix">
            <div class="">


                <div class="cart-page-area">
                    <div class="container" ng-if="globleCartData.total_quantity">
                        <div class="row">



                            <div class="col-lg-7 order-lg-1">
                                <?php
                                $this->load->view('Cart/itemblock', array('vtype' => 'useraccount'));
                                ?>

                                <?php
                                $this->load->view('Cart/itemblock', array('vtype' => 'cartdetails'));
                                ?>

                                <?php
                                $this->load->view('Cart/itemblock', array('vtype' => 'shipping'));
                                ?>
                                <div class="cart-page-top table-responsive">
                                    <table class="table table-hover">
                                        <tbody id="quantity-holder">

                                            <tr>
                                                <td colspan="4" class="text_right">
                                                    <div class="proceed-button pull-left ">
                                                        <a href="<?php echo site_url("Cart/checkoutShipping"); ?>" class="btn btn-primary-dark-w btn-block btn-pill"><i class="fa fa-arrow-left"></i> Change Shipping Details</a>
                                                    </div>

                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                            <div class="col-lg-5 order-lg-2 mb-7 mb-lg-0">

                                <?php
                                $this->load->view('Cart/checkoutsummary', array('vtype' => 'payment'));
                                ?>
                            </div>


                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<?php
$this->load->view('Cart/noproduct');
?>







<!--angular controllers-->
<script src="<?php echo base_url(); ?>assets/theme/angular/productController.js"></script>
<script>
                        var avaiblecredits = 0;
                        function confirmOrder() {
                            swal({
                                title: 'Processing Order',
                                onOpen: function () {
                                    swal.showLoading()
                                }
                            });
                        }


                        function myFunction() {
                            /* Get the text field */
                            var copyText = document.getElementById("myInput");

                            /* Select the text field */
                            copyText.select();


                            /* Copy the text inside the text field */
                            document.execCommand("copy");

                            /* Alert the copied text */
                            alert("Copied the link: " + copyText.value);
                        }
</script>

<?php
$this->load->view('layout/footer', array('custom_item' => 0, 'custom_id' => 0));
?>