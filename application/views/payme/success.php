<?php
$this->load->view('layout/header_1');
?> <!-- ========== MAIN CONTENT ========== -->
<main id="content" role="main">
    <div class="bg-img-hero mb-8" style="background-image: url(<?php echo base_url(); ?>assets/theme2/images/aboutback.jpg);">
        <div class="container">
            <div class="flex-content-center max-width-620-lg flex-column mx-auto text-center ">
                <h1 class="h1 font-weight-bold">Payment Success</h1>
                <p class="text-gray-39 font-size-18 text-lh-default">
                </p>
            </div>
        </div>
    </div>

    <div class="container mb-8 mb-lg-0">

        <div class="row mb-8">
            <div class="col-md-3"></div>
            <div class="col-md-6" style="text-align: center">
                <h2><i class="fa fa-check-circle" style="color:green"></i>&nbsp;&nbsp;&nbsp;Order Successful</h2>
                <p>Your order has been placed, please check your email.</p>
                <div class="ml-md-3">
                    <a href="<?php echo site_url("PaymePayment/login"); ?>" class="btn px-5 btn-primary-dark transition-3d-hover"><i class="ec ec-add-to-cart mr-2 font-size-20"></i> Order Again</a>
                </div>
<!--                <table class="table table-borderd">
                    <?php
                    foreach ($paymentdata as $key => $value) {
                        echo "<tr>";
                        echo "<td>$key</td>";
                        echo "<td class='responsedatatd' >" . print_r($value, true) . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </table>-->
            </div>
            <div class="col-md-3"></div>
        </div>

    </div>
</main>
<!-- ========== END MAIN CONTENT ========== -->
<?php
$this->load->view('layout/footer');
?>