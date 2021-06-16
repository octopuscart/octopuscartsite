<?php
$this->load->view('layout/header');
?> <!-- ========== MAIN CONTENT ========== -->
<main id="content" role="main" ng-controller="PaymeController">


    <div class="container mb-15">
        <div class="row ">

            <?php
            $amount = isset($paymentdata['totalAmount']) ? $paymentdata['totalAmount'] : "";

            $paymentdata2 = $paymentdata;
            $paylink = isset($paymentdata2['webLink']) ? $paymentdata2['webLink'] : "";
            $paymentid = isset($paymentdata2['paymentRequestId']) ? $paymentdata2['paymentRequestId'] : "";
            ?>
            <div class="col-md-1">

            </div>
            <div class="col-md-5">

                <div class="ml-md-3 ">
                    <img src="<?php echo base_url(); ?>assets/paymeassets/payme_logo_color_oneline.png" style="height:150px;">
                    <br/>
                    <h2>Order ID: <?php echo $order_details['order_data']->order_no; ?></h2>
                    <h4>Price: <b>{{<?php echo $order_amount; ?>|currency:"HKD"}}</b></h4>

                    <table class="table">
                        <tr>
                            <th style="width:150px">Customer Name</th>
                            <td><?php echo $order_details['order_data']->name; ?></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td><?php echo $order_details['order_data']->email; ?></td>
                        </tr>
                        <tr>
                            <th>Contact No.</th>
                            <td> <?php echo $order_details['order_data']->contact_no; ?></td>
                        </tr>
                    </table>

                    <img id="logo" style="display: none" width="30" height="30" src="<?php echo base_url(); ?>assets/paymeassets/Icon-1921.png" >
                    <hr/>
                    <?php
                    if (isset($paymentdata2["webLink"])) {
                        ?>
                        <div class="col-md-12 mt-5">

                            <b>Paying with PayMe	</b>
                            <ul>
                                <li>1. Open the PayMe app.	</li>
                                <li>2. Scan the PayCode to authorise payment.	</li>
                                <li>3. Complete payment in the app and wait for confirmation.	</li>
                            </ul>
                        </div>
                        <?php
                    }
                    ?>
<!--                    <table class="table table-borderd" style="display: block">
                    <?php
                    foreach ($paymentdata2 as $key => $value) {
                        echo "<tr>";
                        echo "<td>$key</td>";
                        echo "<td class='responsedatatd' >" . print_r($value, true) . "</td>";
                        echo "</tr>";
                    }
                    ?>
</table>-->

                </div>
            </div>
            <div class="col-md-5">
                <?php
                if (isset($paymentdata2["webLink"])) {
                    ?>
                    <div class="col-md-12 mt-5 text-center">
                        <?php
                        if ($is_mobile) {
                            ?>
                            <a href="<?php echo $paymentdata2["webLink"]; ?>">    
                                <img src="<?php echo base_url(); ?>assets/paymeassets/PayMeButton Round.png" style="">
                            </a>

                            <?php
                        } else {
                            ?>
                            <h4>Scan this PayCode with PayMe	</h4>

                            <div id="qr"></div>
                            <canvas id="payCodeCanvas" width="344" height="344"></canvas>

                            <?php
                        }
                        ?>
                        <p>Please do not close this page before payment is complete</p>
                        <div class="leadingdata">
                            <img  width="30" height="30" src="<?php echo base_url(); ?>assets/paymeassets/loading.gif" >
                            &nbsp; {{paymentdata.data.statusDescription}}

                        </div>
                    </div>
                    <?php
                } else {
                    ?>

                    <h3 style="font-size: 20px;margin-bottom: 20px;margin-top: 50px">
                        Sorry, we were unable to process your payment. Please contact the store to manually confirm the status of your order.
                    </h3>
                    <a href="<?php echo site_url("PaymePayment/initPaymeLogin/" . $order_details['order_data']->order_key); ?>">Restart Payment</a>
                    <?php
                }
                ?>


            </div>
            <div class="col-md-1"></div>

        </div>

    </div>
</main>

<script>
    var weblink = "<?php echo isset($paymentdata2["webLink"]) ? $paymentdata2["webLink"] : ""; ?>";
    var order_key = "<?php echo $order_key; ?>";
    var checkmobile = "<?php echo $is_mobile;?>";

</script>
<!-- ========== END MAIN CONTENT ========== -->
<script src="<?php echo base_url(); ?>assets/paymeassets/paycode.js"></script>
<script src="<?php echo base_url(); ?>assets/paymeassets/qrcode.js"></script>
<script src="<?php echo base_url(); ?>assets/paymeassets/paymeController.js"></script>

<?php
$this->load->view('layout/footer');
?>