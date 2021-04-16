<?php
$this->load->view('layout/header_1');
?> <!-- ========== MAIN CONTENT ========== -->
<main id="content" role="main">
    <div class="bg-img-hero mb-8" style="background-image: url(<?php echo base_url(); ?>assets/theme2/images/aboutback.jpg);">
        <div class="container">
            <div class="flex-content-center max-width-620-lg flex-column mx-auto text-center ">
                <h1 class="h1 font-weight-bold">Order Your Package</h1>
                <p class="text-gray-39 font-size-18 text-lh-default">
                </p>
            </div>
        </div>
    </div>

    <div class="container mb-lg-0">
        <div class="row ">
            <?php
            $amount = isset($paymentdata['totalAmount']) ? $paymentdata['totalAmount'] : "";
            $package = $paymentlist[$amount];
            $paymentdata2 = $paymentdata;
            $paylink = isset($paymentdata2['webLink']) ? $paymentdata2['webLink'] : "";
            $paymentid = isset($paymentdata2['paymentRequestId']) ? $paymentdata2['paymentRequestId'] : "";
            ?>

            <div class="col-md-3"></div>
            <div class="col-md-8">
                <div class="col-md-12">
                    <div class="ml-md-3 mb-5">
                        <h2>Package: <?php echo $package["title"]; ?></h2>
                        <b>Price: HKD<?php echo $amount; ?></b>
                        <hr/>
                        <ul>
                            <li>3 Months Validity </li>
                            <li>24X7 Product support</li>
                            <li>Upload up to 100 products</li>
                            <li>10 Business Emails</li>
                        </ul>
                        <?php
                        if ($paylink) {
                            ?>
                            <a href="<?php echo $paylink; ?>" class="btn" target="_blank"><img src="<?php echo base_url(); ?>assets/paymentstatus/payme-button-red.png"></a>
                            &nbsp;&nbsp;&nbsp;
                            <a href="<?php echo site_url("PaymePayment/cancel/" . $paymentid); ?>" class="btn px-5 btn-primary-dark transition-3d-hover btn-danger" ><i class="ec ec-close-remove mr-2 font-size-20"></i> Cancel</a>

                            <?php
                        } else {
                            ?>
                            <a href="<?php echo site_url("PaymePayment/loginPayme"); ?>" class="btn px-5 btn-danger" ><i class="ec ec-add-to-cart mr-2 font-size-20"></i> Logged out go back</a>

                            <?php
                        }
                        ?>
                        <p>
                            <b>You have selected PayMe as your payment method and will be redirected to the PayMe app to complete payment.</b>
                        </p>
                    </div>
                </div>
<!--                <table class="table table-borderd">
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
            <div class="col-md-2"></div>

        </div>

    </div>
</main>
<!-- ========== END MAIN CONTENT ========== -->
<?php
$this->load->view('layout/footer');
?>