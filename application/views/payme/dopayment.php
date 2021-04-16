<?php
$this->load->view('layout/header');
?> <!-- ========== MAIN CONTENT ========== -->
<main id="content" role="main">
    <div class="bg-img-hero mb-14" style="background-image: url(<?php echo base_url(); ?>assets/theme2/images/aboutback.jpg);">
        <div class="container">
            <div class="flex-content-center max-width-620-lg flex-column mx-auto text-center ">
                <h1 class="h1 font-weight-bold">Select Your Package</h1>
                <p class="text-gray-39 font-size-18 text-lh-default">
                </p>
            </div>
        </div>
    </div>

    <div class="container mb-8 mb-lg-0">
        <div class="row mb-8">

<!--            <label>     <input type="checkbox" ng-model="showtoken" ng-init="showtoken = false" /> Show Token</label>
            <p  style="white-space: normal;
                width: 100%;"><input ng-if="showtoken" type="text" class="form-control" value="<?php echo $access_token; ?>"></p>
           -->
            <div class="row">

                <?php
                $paymentlist = [
                    array("amt" => "1.80", "status" => "Normal expiry", "title" => "Package 1"),
                    array("amt" => "1.81", "status" => "Payment success", "title" => "Package 2"),
                    array("amt" => "1.77", "status" => "Payment failure", "title" => "Package 3"),
                    array("amt" => "1.83", "status" => "Error when cancelling a payment request that is being processed", "title" => "Package 4"),
                    array("amt" => "1.44", "status" => "Server Error - No PayCode", "title" => "Package 5"),
                     array("amt" => "1.45", "status" => "Server Error - No Status", "title" => "Package 5"),
                ];
                foreach ($paymentlist as $key => $value) {
                    ?>
                    <div class="col-md-3">
                        <div class="card" style="padding: 15px;">
                            <h2 style="font-size: 15px;font-weight: bold"><?php echo $value["title"]; ?></h2>
                            <!--<p  style="font-size: 12px;height:30px;"><?php echo $value["status"]; ?></p>-->
                            <h3 style="font-size: 13px">Price: <?php echo $value["amt"]; ?></h3>
                            <p>
                                <select class="form-control">
                                    <option>Select Payment Method</option>
                                    <option>PayMe</option>
                                    <option>Bank Transfer</option>
                                </select>
                            </p>
                            <a href="<?php echo site_url("PaymePayment/process/" . $value["amt"]); ?>" class="btn px-5 btn-primary-dark transition-3d-hover"  ><i class="ec ec-add-to-cart mr-2 font-size-20"></i> Order Now</a>
                        </div>
                    </div>
    <?php
}
?>

            </div>
        </div>

    </div>
</main>
<!-- ========== END MAIN CONTENT ========== -->
<?php
$this->load->view('layout/footer');
?>