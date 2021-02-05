<ul ng-if="globleCartData.total_quantity" class="">
    <li  ng-repeat="product in globleCartData.products">

        <div class="cart-single-product">
            <div class="media">
                <div class="pull-left cart-product-img">
                    <a href="#">

                        <img class="img-responsive" alt="product" src="{{product.file_name}}" style="height: 80px;" />
                    </a>
                </div>
                <div class="media-body cart-content">
                    <ul>
                        <li>
                            <h2 ><a href="#" style="">{{product.title}}</a></h2>
                            <h3>                                                                 
                                <p>
                                    {{product.quantity}} X  {{product.price|currency}} 
                                </p>
                            </h3>
                            <div  class="input-group cart-area-inc input-group-sm searchinputgroup">
                                <span class="input-group-btn input-group-sm">
                                    <button class="btn btn-default"  type="button" ng-click="updateCart(product, 'sub')">-</button>
                                </span>

                                <span class="cartquantitysearch2"> {{product.quantity}} </span>
                                <span class="input-group-btn input-group-sm" >
                                    <button class="btn btn-default   incbutton" type="button" ng-click="updateCart(product, 'add')">+</button>
                                </span>
                            </div>
                        </li>
                        <li>

                        </li>
                        <li>
                            <p></p>
                        </li>
                        <li>
                            <a class="trash" href="#." ng-click="removeCart(product.product_id)"><i class="fa fa-trash-o"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </li>

    <li>
        <span><span>Sub Total</span></span><span>{{globleCartData.sub_total_price|currency}}</span>

    </li>
    <li>
        <ul class="checkout">
            <li><a href="<?php echo site_url("Cart/details"); ?>" class="btn-checkout"><i class="fa fa-shopping-cart" aria-hidden="true"></i>View Cart</a></li>
            <li><a href="<?php echo site_url("Cart/checkoutInit"); ?>" class="btn-checkout"><i class="fa fa-share" aria-hidden="true"></i>Checkout</a></li>
        </ul>
    </li>
</ul>