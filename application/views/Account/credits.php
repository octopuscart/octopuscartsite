<?php
$this->load->view('layout/header');
?>


<style>
    .order_box{
        padding: 10px;
        padding-bottom: 11px!important;
        height: 110px;
    }
    .order_box li{
        line-height: 19px!important;
        padding: 7px!important;
        border: none!important;
    }

    .order_box li i{
        float: left!important;
        line-height: 19px!important;
        margin-right: 13px!important;
    }

    .blog-posts article {
        margin-bottom: 10px;
    }
</style>

<style>
    footer{
        position: inherit!important;
    }
</style> 
<!-- Inner Page Banner Area Start Here -->
<section id="page-title" class="page-title-parallax page-title-center border-bottom" style="background-image: url('<?php echo base_url(); ?>assets/theme2/res/images/sections/blog.jpg');   margin-top: -30px;    padding: 100px 0px;   " data-center="" data-top-bottom="">
    <div class="container clearfix">
        <h1 class="font-secondary capitalize ls0" style="font-size: 62px;color:white;">Account</h1>
    </div>
</section>
<!-- Inner Page Banner Area End Here -->

<img src="<?php echo base_url(); ?>assets/theme2/res/images/sketch.png" style="    margin-top: -65px;
     position: absolute;
     z-index: 200;" />
<!-- Content -->

<!-- Content -->
<div id="content"  class="my-account-page-area"> 

    <!-- Blog -->
    <section class="new-main blog-posts ">
        <div class="container"> 

            <!-- News Post -->
            <div class="news-post">
                <div class="row"> 

                    <?php
                    $this->load->view('Account/sidebar');
                    ?>


                    <div class="col-md-9" >
                        <h4>Available Credits : <small>Rs.</small> {{<?php echo $user_credits; ?> |currency:" "}}</h4>

                        <h5 style="    margin-top: 51px;
                            font-size: 18px;
                            font-weight: 400">Credits Statement</h5>


                        <table class="table">
                            <tr>
                                <th>S.No.</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Credit</th>
                                <th>Debit</th>
                                <th>Remark</th>
                            </tr>
                            <?php
                            foreach ($creditlist as $key => $value) {
                                ?>
                                <tr>
                                    <td><?php echo $key + 1; ?></td>
                                    <td><?php echo $value->c_date; ?></td>
                                    <td><?php echo $value->c_time; ?></td>
                                    <td>{{<?php echo $value->credit ? $value->credit : 0; ?> |currency:" "}}</td>
                                    <td>{{<?php echo $value->debit ? $value->debit : 0; ?> |currency:" "}}</td>
                                    <td><?php echo $value->remark; ?></td>

                                </tr>
                                <?php
                            }
                            ?>
                        </table>
                    </div>



                </div>
                </section>
            </div>
            <!-- End Content --> 



            <?php
            $this->load->view('layout/footer');
            ?>
            <script>
                $(function () {
                    $(".woocommerce-MyAccount-navigation-link--dashboard").removeClass("active");
                    $(".credit_page").addClass("active");
                })
            </script>