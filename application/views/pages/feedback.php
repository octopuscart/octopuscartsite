<?php
$this->load->view('layout/header');
?>

<style>
    footer{
        position: inherit!important;
    }

    .smilyblock{
        padding: 5px 0px 0px 0px;
        border: 1px solid #000;
        text-align: center;
        border-radius: 10px;
    }

    .smilyblock h3{
        font-size:15px; 
        margin-bottom: 10px;
    }

    .smilyblock .col-smile-20{
        width: 20%;
        float:left;
    }

    .smilyblock .col-smile-20 img{
        height: 35px;
        width: 35px;
        margin-bottom: 5px;
    }

    .displaynone {
        display: none;
    }


</style>



<!-- Inner Page Banner Area Start Here -->
<section id="page-title" class="page-title-parallax page-title-center border-bottom" style="background-image: url('<?php echo base_url(); ?>assets/theme2/res/images/sections/wall2.jpg');   margin-top: -30px;    padding: 50px 0px;    background-position: -471px -230px;" data-center="" data-top-bottom="">
    <div class="container clearfix">
        <h1 class="font-secondary capitalize ls0 text-white" style="font-size: 62px;">Feedback</h1>
    </div>
</section>
<!-- Inner Page Banner Area End Here -->


<section id="content" style="overflow: visible; margin-bottom: 192px!important;">
    <div class="content-wrap1 charity-block">
        <div class="section nomargin clearfix" style="padding: 10px 0; background: url('<?php echo base_url(); ?>assets/theme2/res/images/sections/4.jpg') center center no-repeat; background-size: 100% auto">
            <div class="container clearfix">

                <div class="row clearfix">
                    <div class="row clearfix" style="    width: fit-content;">
                        <div class='col-md-5'>
                            <div class="p-5rounded bg-white" style="max-width:500px;
                                 padding: 15px;">
                                <h3 class="font-secondary h1 color">Give Your Feedback</h3>

                                <div class=" mt-4 mt-lg-0" >
                                    <div class="form-result"></div>
                                    <form class="mb-0 row"  action="#" method="post" >
                                        <div class="form-process"></div>
                                        <div class="col-sm-6 mb-3">
                                            <input type="text" id="template-contactform-name" name="name" value="" class="sm-form-control border-form-control required" placeholder="Name" >
                                        </div>
                                        <div class="col-sm-6 mb-3">
                                            <input type="text" id="template-contactform-phone" name="contact" value="" class="sm-form-control border-form-control required" placeholder="Contact No." >
                                        </div>

                                        <div class="clear"></div>
                                        <div class="col-sm-12 mb-3">
                                            <input type="email" id="template-contactform-email" name="email" value="" class="required email sm-form-control border-form-control" placeholder="Email Address" >
                                        </div>


                                        <div class="clear"></div>
                                        <div class="col-6 mb-3">
                                            <select id="template-contactform-time" class="custom-select sm-form-control border-form-control" name="gender" required="">
                                                <option value="-"   >Gender</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>

                                            </select>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <select id="template-contactform-people" class="custom-select sm-form-control border-form-control" name="age_group" required="">
                                                <option value="-"  >Age Group</option>
                                                <option value="Adult">Adult</option>
                                                <option value="Teen">Teen</option>
                                                <option value="Sr. Citizen">Sr. Citizen</option>

                                            </select>
                                        </div>

                                        <div class="clear"></div>
                                        <div class="col-sm-12 mb-3">
                                            <div class="smilyblock">
                                                <h3>Quality Of Food</h3>
                                                <input type="radio" name="quality_of_food" id="quality_of_food" class="displaynone" value="-" checked="">
                                                <?php
                                                for ($i = 5; $i > 0; $i--) {
                                                    ?>
                                                    <div class="col-smile-20">
                                                        <div class="radio">
                                                            <label>
                                                                <img src="<?php echo base_url(); ?>assets/theme2/smily/<?php echo $i; ?>.png">
                                                                <br/>
                                                                <input type="radio" name="quality_of_food" id="quality_of_food" value="<?php echo $i; ?>" >
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <?php
                                                }
                                                ?>
                                                <div class="clear"></div>
                                            </div>
                                        </div>

                                        <!--start of Quantity of food--> 
                                        <div class="col-sm-12 mb-3">
                                            <div class="smilyblock">
                                                <h3>Quantity Of Food </h3>
                                                <input type="radio" name="quantity_of_food" id="quantity_of_food" class="displaynone" value="-" checked="">

                                                <?php
                                                for ($i = 5; $i > 0; $i--) {
                                                    ?>
                                                    <div class="col-smile-20">
                                                        <div class="radio">
                                                            <label>
                                                                <img src="<?php echo base_url(); ?>assets/theme2/smily/<?php echo $i; ?>.png">
                                                                <br/>
                                                                <input type="radio" name="quantity_of_food" id="quantity_of_food" value="<?php echo $i; ?>" >
                                                            </label>
                                                        </div>
                                                    </div>

                                                    <?php
                                                }
                                                ?>
                                                <div class="clear"></div>
                                            </div>
                                        </div>


                                        <!--On Time Delivery-->
                                        <div class="col-sm-12 mb-3">
                                            <div class="smilyblock">
                                                <h3>On Time Delivery</h3>
                                                <input type="radio" name="on_time_delivery" id="on_time_delivery" class="displaynone" value="-" checked="">

                                                <?php
                                                for ($i = 5; $i > 0; $i--) {
                                                    ?>
                                                    <div class="col-smile-20">
                                                        <div class="radio">
                                                            <label>
                                                                <img src="<?php echo base_url(); ?>assets/theme2/smily/<?php echo $i; ?>.png">
                                                                <br/>
                                                                <input type="radio" name="on_time_delivery" id="on_time_delivery" value="<?php echo $i; ?>" >
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <?php
                                                }
                                                ?>
                                                <div class="clear"></div>
                                            </div>
                                        </div>

                                        <!--Variety Of Food-->
                                        <div class="col-sm-12 mb-3">
                                            <div class="smilyblock">
                                                <h3>Varieties Of Food</h3>
                                                <input type="radio" name="variety_of_food" id="varieties_of_food"  class="displaynone" value="-" checked="">

                                                <?php
                                                for ($i = 5; $i > 0; $i--) {
                                                    ?>
                                                    <div class="col-smile-20">
                                                        <div class="radio">
                                                            <label>
                                                                <img src="<?php echo base_url(); ?>assets/theme2/smily/<?php echo $i; ?>.png">
                                                                <br/>
                                                                <input type="radio" name="variety_of_food" id="varieties_of_food" value="<?php echo $i; ?>" >
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <?php
                                                }
                                                ?>
                                                <div class="clear"></div>
                                            </div>
                                        </div>

                                        <!--Variety Of Food-->
                                        <div class="col-sm-12 mb-3">
                                            <div class="smilyblock">
                                                <h3>Comment</h3>
                                                <textarea style="height: 220px;    border: 1px solid;
                                                          border-radius: 7px!important;" class="required sm-form-control border-form-control" name="comment" maxlength="500"></textarea>
                                                <div class="clear"></div>
                                            </div>
                                        </div>

                                        <div class="clear"></div>
                                        <div class="col-12 nobottommargin" style='    text-align: center;'>
                                            <button class="button button-circle button-large text-white ml-0 mt-3 colordarkgreen" type="submit" name="submit_now" value="submit">Submit Now</button>
                                        </div>
                                        <div class="clear"></div>

                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class='col-md-7'>
                            <div class="heading-block nobottomborder bottommargin-sm">
                                <h2 class="font-secondary color nott" style="color:#000!important;">
                                    Give feedback and get 20% off on Home Delivery
                                </h2>
                            </div>
                            <div class="feature-box media-box" style="">
                                
                                <p>
                                    Woodlands Restaurant owners should always be looking for feedback, even if what comes back isn't all positive. Good or bad, guest feedback is vital to the success of your restaurant. </p>
                                  <p>  By listening to your customers and responding to their thoughts, you can improve the dining experience and build customer relationships.  </p>
                                 <p>   In addition, positive guest feedback posted online can help build your brand reputation and establish your restaurant in your local community and beyond.  </p>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div style="position: absolute; top: 0; left: 0; width: 100%; z-index: 3; background: url('<?php echo base_url(); ?>assets/theme2/res/images/sketch.png') repeat center bottom; background-size: auto 100%; height: 40px; margin-top: -40px;"></div>

    </div>

    <!-- Content -->

    <section style="overflow: visible;">


        <?php
        $this->load->view('layout/contactfooter');
        ?>
    </section>

    <?php
    $this->load->view('layout/footer');
    ?>