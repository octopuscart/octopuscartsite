<div class="pl-lg-3 ">
    <div class="bg-gray-1 rounded-lg">
        <div class="p-4 mb-4 checkout-table">
            <!-- Title -->
            <div class="border-bottom border-color-1 mb-5">
                <h3 class="section-title mb-0 pb-2 font-size-25">Your order</h3>
            </div>
            <!-- End Title -->

            <!-- Product Content -->
            <table class="table">
                <?php
                if ($vtype != 'payment') {
                    ?>
                    <thead>
                        <tr>
                            <th class="product-name">Product</th>
                            <th class="product-total">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="cart_item" ng-repeat="product in globleCartData.products">
                            <td>{{product.title}}&nbsp;<strong class="product-quantity">× {{product.quantity}}</strong></td>
                            <td>{{product.total_price|currency:"<?php echo globle_currency; ?>"}}</td>
                        </tr>

                    </tbody>
                    <?php
                }
                ?>
                <tfoot>
                    <tr>
                        <th>Subtotal</th>
                        <td>  {{globleCartData.sub_total_price|currency:"<?php echo globle_currency; ?>"}}</td>
                    </tr>
                    <tr>
                        <th>Shipping</th>
                        <td>{{globleCartData.shipping_price|currency:"<?php echo globle_currency; ?>"}}</td>
                    </tr>
                    <tr>
                        <th>Total</th>
                        <td><strong>  {{globleCartData.total_price|currency:"<?php echo globle_currency; ?>"}}</strong></td>
                    </tr>
                </tfoot>
            </table>

            <?php
            if ($vtype == 'payment') {
                ?>
                <form action="#" method="post">
                    <!-- End Product Content -->
                    <div class="border-top border-width-3 border-color-1 pt-3 mb-3">
                        <!-- Basics Accordion -->
                        <div id="basicsAccordion1">
                            <!-- Card -->
                            <div class="border-bottom border-color-1 border-dotted-bottom">
                                <div class="p-3" id="basicsHeadingOne">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="payment_type" name="payment_type"  value="Bank Transfer"> 
                                        <label class="custom-control-label form-label" for="payment_type" data-toggle="collapse" data-target="#basicsCollapseOnee" aria-expanded="true" aria-controls="basicsCollapseOnee">
                                            Direct bank transfer
                                        </label>
                                    </div>
                                </div>
                                <div id="basicsCollapseOnee" class="collapse  border-top border-color-1 border-dotted-top bg-dark-lighter" aria-labelledby="basicsHeadingOne" data-parent="#basicsAccordion1">
                                    <div class="p-4">
                                        Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.
                                    </div>
                                </div>
                            </div>
                            <!-- End Card -->

                            <!-- Card -->
                            <div class="border-bottom border-color-1 border-dotted-bottom">
                                <div class="p-3" id="basicsHeadingTwo">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="secondStylishRadio1" name="payment_type">
                                        <label class="custom-control-label form-label" for="secondStylishRadio1" data-toggle="collapse" data-target="#basicsCollapseTwo" aria-expanded="false" aria-controls="basicsCollapseTwo">
                                            Check payments
                                        </label>
                                    </div>
                                </div>
                                <div id="basicsCollapseTwo" class="collapse border-top border-color-1 border-dotted-top bg-dark-lighter" aria-labelledby="basicsHeadingTwo" data-parent="#basicsAccordion1">
                                    <div class="p-4">
                                        Please send a check to Store Name. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.
                                    </div>
                                </div>
                            </div>
                            <!-- End Card -->

                            <!-- Card -->
                            <div class="border-bottom border-color-1 border-dotted-bottom">
                                <div class="p-3" id="basicsHeadingThree">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="thirdpayment_type" name="payment_type" checked="" value="Cash On Delivery">
                                        <label class="custom-control-label form-label" for="thirdpayment_type" data-toggle="collapse" data-target="#basicsCollapseThree" aria-expanded="false" aria-controls="basicsCollapseThree">
                                            Cash on delivery
                                        </label>
                                    </div>
                                </div>
                                <div id="basicsCollapseThree" class="collapse show border-top border-color-1 border-dotted-top bg-dark-lighter" aria-labelledby="basicsHeadingThree" data-parent="#basicsAccordion1">
                                    <div class="p-4">
                                        Pay with cash upon delivery.
                                    </div>
                                </div>
                            </div>
                            <!-- End Card -->

                            <!-- Card -->
                            <div class="border-bottom border-color-1 border-dotted-bottom">
                                <div class="p-3" id="basicsHeadingFour">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="Fourpayment_type" name="payment_type" value="PayPal">
                                        <label class="custom-control-label form-label" for="Fourpayment_type" data-toggle="collapse" data-target="#basicsCollapseFour" aria-expanded="false" aria-controls="basicsCollapseFour">
                                            PayPal 
                                        </label>
                                    </div>
                                </div>
                                <div id="basicsCollapseFour" class="collapse border-top border-color-1 border-dotted-top bg-dark-lighter" aria-labelledby="basicsHeadingFour" data-parent="#basicsAccordion1">
                                    <div class="p-4">
                                        Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.
                                    </div>
                                </div>
                            </div>
                            <!-- End Card -->
                        </div>
                        <!-- End Basics Accordion -->
                    </div>
                    <div class="form-group d-flex align-items-center justify-content-between px-3 mb-5">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck10" required="" data-msg="Please agree terms and conditions." data-error-class="u-has-error" data-success-class="u-has-success">
                            <label class="form-check-label form-label" for="defaultCheck10">
                                I have read and agree to the website <a href="#" class="text-blue">terms and conditions </a>
                                <span class="text-danger">*</span>
                            </label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary-dark-w btn-block btn-pill font-size-20 mb-3 py-3" name="place_order">Place order</button>
                </form>
                <?php
            } else {
                ?><?php
                if (count($user_address_details)) {
                    ?>
                    <div class=" ">
                        <a href=" <?php echo site_url("Cart/checkoutPayment"); ?>" class="btn btn-primary-dark-w btn-block btn-pill font-size-20 mb-3 py-3 " >Choose Payment Method <i class="fa fa-arrow-right"></i></a>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </div>
</div>
