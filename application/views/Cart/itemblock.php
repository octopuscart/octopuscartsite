
<style>
    .card{
        padding: 10px 15px;

    }
    .cardp{
        margin-bottom: 10px;
    }
</style>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mb-2">
    <div class="card card-default">
        <div class="card-heading" >

            <?php
            if ($vtype == 'items') {
                ?>
                <!--cart block-->
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    <span class="fa-stack">
                        <i class="fa fa-shopping-cart fa-stack-1x"></i>
                        <i class="ion-bag fa-stack-1x "></i>
                    </span>   My Shopping Bag
                    <span style="float: right; line-height: 29px;" class="ng-binding">Total: {{globleCartData.total_price|currency:"<?php echo globle_currency; ?>"}} (<small style="color: #000" class="ng-binding">{{globleCartData.total_quantity}}</small>)</span> 
                </a>
                <?php
            }
            ?>


            <?php
            if ($vtype == 'cartdetails') {
                ?>

                <div class="border-bottom border-color-1 mb-2">
                    <h3 class="section-title mb-0 pb-2 font-size-25">Shopping Cart</h3>
                </div>
                <p class="cardp">
                    <!-- Product Content -->
                <table class="table">
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
                   
                </table>
                </p>

                <?php
            }
            ?>



            <?php
            if ($vtype == 'useraccount') {
                ?>

                <div class="border-bottom border-color-1 mb-2">
                    <h3 class="section-title mb-0 pb-2 font-size-25">Login Details</h3>
                </div>
                <p class="cardp">
                    <i class="fa fa-user"></i> <?php echo $this->checklogin["first_name"] . " " . $this->checklogin["last_name"] ?>
                    (<b>  <?php
                        echo ($this->checklogin["username"]);
                        ?>
                    </b>)
                </p>

                <?php
            }
            ?>


            <?php
            if ($vtype == 'shipping') {
                ?>

                <div class="border-bottom border-color-1 mb-2">
                    <h3 class="section-title mb-0 pb-2 font-size-25">Shipping Details</h3>
                </div>
                <p class="cardp">

                    <?php
                    if (count($user_address_details)) {
                        $value = $user_address_details[0];
                        ?>

                        <?php echo $value['address1']; ?>,<br/>
                        <?php echo $value['address2']; ?>,
                        <?php echo $value['city']; ?>, <br/><?php echo $value['state']; ?> <?php echo $value['zipcode']; ?>
                        <?php
                    } else {
                        echo "Choose Shipping Address";
                    }
                    ?>
                </p>

                <?php
            }
            ?>

            <?php
            if ($vtype == 'payment') {
                ?>
                <!--shipping block-->
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    <span class="fa-stack">
                        <i class="fa fa-money fa-stack-1x"></i>
                        <i class="ion-bag fa-stack-1x "></i>
                    </span>  Payment Method
                    <span style="float: right; line-height: 29px;font-size: 12px;font-weight: 300" class="ng-binding">
                        Cash On Delivery
                    </span> 
                </a>
                <?php
            }
            ?>




        </div>
    </div>
</div>