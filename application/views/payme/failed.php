<?php
$this->load->view('layout/header');
?> <!-- ========== MAIN CONTENT ========== -->
<main id="content" role="main">
    <div class="bg-img-hero mb-14" style="background-image: url(<?php echo base_url(); ?>assets/theme2/images/aboutback.jpg);">
        <div class="container">
            <div class="flex-content-center max-width-620-lg flex-column mx-auto text-center ">
                <h1 class="h1 font-weight-bold">Payment Failed</h1>
              
            </div>
        </div>
    </div>

    <div class="container mb-2 mb-lg-0">
        <div class="row mb-2">
            <div class="col-md-3"></div>
            <div class="col-md-6" style="text-align: center">
                 <h2><i class="fa fa-times" style="color:red"></i>&nbsp;&nbsp;&nbsp;Order Payment Unsuccessful</h2>
                <p>Your order payment failed.</p>
                <div class="ml-md-3">
                    <a href="<?php echo site_url("PaymePayment/initPaymeLogin/".$order_details['order_data']->order_key); ?>" class="btn px-5 btn-danger" ><i class="ec ec-returning mr-2 font-size-20"></i>Restart Payment</a>
                </div>
                <br/>
                     <p>Payment failed. Please contact customer support for diagnosis and further steps.</p>
                      <h2>Order ID: <?php echo $order_details['order_data']->order_no; ?></h2>
                <h4>Price: <b>{{<?php echo $order_amount; ?> |currency:"HKD"}}</b></h4>

                <table class="table" style="text-align: left;width:400px;display: inline-block;margin-top: 50px;">
                    <tr>
                        <th style="width:50%">Customer Name</th>
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
             
            </div>
            <div class="col-md-3"></div>
        </div>

    </div>
</main>
<!-- ========== END MAIN CONTENT ========== -->
<?php
$this->load->view('layout/footer');
?>