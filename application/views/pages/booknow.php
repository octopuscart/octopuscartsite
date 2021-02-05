<?php
$this->load->view('layout/header');
?>

<section id="page-title" class="page-title-parallax page-title-dark page-title-center" style="background-image: url('<?php echo base_url(); ?>assets/theme2/res/images/sections/booknow.jpg'); background-size: cover; padding: 50px 0 100px;" data-bottom-top="background-position:0 0px;" data-top-bottom="background-position:0px -49px;">
    <div class="container clearfix">
        <h1 class="font-secondary capitalize ls0" style="font-size: 74px;">Book Now</h1>
        <span class="t400">------</span>
    </div>
</section>

<section id="content" style="overflow: visible;"  ng-controller="ProductController" >
    <div class="content-wrap nopadding" style="background: url(http://localhost/woodlandshk/assets/theme2/res/images/food-pattern.png) center center repeat rgb(245, 245, 245);">
        <div class="container">
            <div class="tabs tabs-justify clear-bottommargin clearfix" id="tab-1">
                <ul class="tab-nav clearfix border-bottom-0">

                    <li>
                        <a href="#tabs-restaurant">
                            <img src="<?php echo base_url(); ?>assets/images/logo.png" style="    width: 145px;   height: auto;"> 
                        </a>
                    </li>
                    <li>
                        <a href="#tabs-quandoo">
                            <img src="<?php echo base_url(); ?>assets/theme2/res/images/icons/Quandoo.png" style="    width: 145px;   height: auto;"> 

                        </a>
                    </li>
                    <li>
                        <a href="#tabs-chope">
                            <img src="<?php echo base_url(); ?>assets/theme2/res/images/icons/chope.png" style="    width: 145px;   height: auto;"> 

                        </a>
                    </li>

                </ul>
                <div class="tab-container mt-4" >
                    <div class="tab-content clearfix" id="tabs-restaurant">
                        <center style="width:100%;">
                            <div class="row clearfix" style="    width: fit-content;">

                                <div class="p-5rounded bg-white" style="width: 600px;
                                     padding: 15px;">
                                    <h3 class="font-secondary h1 color">Book At Restaurants</h3>

                                    <div class=" mt-4 mt-lg-0" >
                                        <div class="form-result"></div>
                                        <form class="mb-0 row"  action="#" method="post" >
                                            <div class="form-process"></div>
                                            <div class="col-sm-6 mb-3">
                                                <input type="text" id="template-contactform-name" name="name" value="" class="sm-form-control border-form-control required" placeholder="Name" required="">
                                            </div>
                                            <div class="col-sm-6 mb-3">
                                                <input type="email" id="template-contactform-email" name="email" value="" class="required email sm-form-control border-form-control" placeholder="Email Address" required="">
                                            </div>
                                            <div class="clear"></div>
                                            <div class="col-sm-6 mb-3">
                                                <input type="text" id="template-contactform-phone" name="contact" value="" class="sm-form-control border-form-control required" placeholder="Contact No." required="">
                                            </div>
                                            <div class="col-sm-6 mb-3 input-daterange travel-date-group">
                                                <input type="date" id="template-contactform-subject" name="select_date" value="" class="sm-form-control border-form-control tleft required" placeholder="Select Reservation Date" required="" min="<?php echo date("Y-m-d")?>">
                                            </div>
                                            <div class="clear"></div>
                                            <div class="col-6 mb-3">
                                                <select id="template-contactform-time" class="custom-select sm-form-control border-form-control" name="select_time" required="">
                                                    <option value="disabled" disabled="" selected="">Select Time</option>
                                                    <option value="12:00">12:00 - 13:00</option>
                                                    <option value="13:00">13:00 - 14:00</option>
                                                    <option value="14:00">14:00 - 15:00</option>
<!--                                                    <option value="18:00">18:00 - 19:00</option>
                                                    <option value="19:00">19:00 - 20:00</option>
                                                    <option value="20:00">20:00 - 21:00</option>
                                                    <option value="21:00">21:00 - 22:00</option>-->
                                                </select>
                                            </div>
                                            <div class="col-6 mb-3">
                                                <select id="template-contactform-people" class="custom-select sm-form-control border-form-control" name="people" required="">
                                                    <option value="disabled" disabled="" selected=""  >Person</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6+</option>
                                                </select>
                                            </div>
                                            <div class="clear"></div>
                                            <div class="col-12 nobottommargin">
                                                <button class="button button-circle button-large text-white ml-0 mt-3 colordarkgreen" type="submit" name="booknow" value="submit">Book Now</button>
                                            </div>
                                            <div class="clear"></div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </center>
                    </div>
                    <div class="tab-content clearfix" id="tabs-quandoo">
                        <div class="row clearfix">
                            <center style="width:100%;">
                                <div class="row clearfix" style="    width: fit-content;">
                                    <iframe src="https://booking-widget.quandoo.com.hk/iframe.html?agentId=2&merchantId=64066&origin=https%3A%2F%2Fwww.woodlandshk.com&path=https%3A%2F%2Fbooking-widget.quandoo.com%2F&theme=brand" style="width:380px;height: 700px;"></iframe>
                                </div>
                            </center>
                        </div>
                    </div>
                    <div class="tab-content clearfix" id="tabs-chope">
                        <center style="width:100%;">
                            <div class="row clearfix" style="    width: fit-content;">
                                <iframe src="https://book.chope.co/booking?rid=woodlands1901tst&source=rest_woodlands-id-veg_hk" style="width: 550px;;
                                        height: 600px;"></iframe>
                            </div>
                        </center>
                    </div>

                </div>
            </div>
        </div>
        <div class="line clear"></div>


    </div>
    <div class="container section-contact topmargin-lg clearfix" style="background: white;">
        <div class="row clearfix">
            <div class="col-lg-3 col-md-6 bottommargin-sm center">
                <i class="i-plain i-xlarge divcenter nobottommargin icon-et-map"></i>
                <h3 class="uppercase font-body" style="font-size: 22px; font-weight: 700;margin-top: 20px">Contact</h3>
                <span class="font-primary">
                    UG Shop 16 & 17, Wing On Plaza,<br/>
                    62, Mody Road, Tsim Sha Tsui East,<br/>
                    Kowloon, Hong Kong
                </span>
            </div>
            <div class="col-lg-3 col-md-6 bottommargin-sm center">
                <i class="i-plain i-xlarge divcenter nobottommargin icon-et-clock"></i>
                <h3 class="uppercase font-body" style="font-size: 22px; font-weight: 700;margin-top: 20px">Opening Time</h3>
                <span class="font-primary">
                    <table style="    width: 100%;text-align: left;">
                        <tr>
                            <td colspan="2" style="text-align: center;"><strong>Monday To Sunday</strong></td>

                        </tr>
                        <tr>
                            <td>Lunch</td>
                            <td>: &nbsp; 11:30 am – 03:30 pm</td>
                        </tr>
                        <tr>
                            <td>Dinner</td>
                            <td>: &nbsp; 06:30 pm – 10:30 pm</td>
                        </tr>
                    </table>
                </span>
            </div>
            <div class="col-lg-3 col-md-6 bottommargin-sm center">
                <i class="i-plain i-xlarge divcenter nobottommargin icon-et-clipboard"></i>
                <h3 class="uppercase font-body" style="font-size: 22px; font-weight: 700;margin-top: 20px">Reservation</h3>
                <span class="font-primary">
                    <table style="    width: 100%;">
                        <tr>
                            <td colspan="1" style="text-align: center;font-size: 20px;"><strong>+(852) 2369 3718</strong></td>

                        </tr>
                        <tr>

                            <td><i class="icon-et-phone"></i>&nbsp; +(852) 2366 1945</td>
                        </tr>
                        <tr>

                            <td><i class="icon-et-envelope"></i>&nbsp; reachus@vegconcepts.com</td>
                        </tr>
                    </table>
                </span>
            </div>
            <div class="col-lg-3 col-md-6 bottommargin-sm center">
                <i class="i-plain i-xlarge divcenter nobottommargin icon-et-heart"></i>
                <h3 class="uppercase font-body" style="font-size: 22px; font-weight: 700;margin-top: 20px">Social Contact</h3>
                <div style="display: flex; justify-content: center">
                    <a href="#" class="social-icon si-borderless si-facebook">
                        <i class="icon-line2-social-facebook"></i>
                        <i class="icon-line2-social-facebook"></i>
                    </a>
                    <a href="#" class="social-icon si-borderless si-twitter">
                        <i class="icon-line2-social-twitter"></i>
                        <i class="icon-line2-social-twitter"></i>
                    </a>
                    <a href="#" class="social-icon si-borderless si-youtube">
                        <i class="icon-line2-social-youtube"></i>
                        <i class="icon-line2-social-youtube"></i>
                    </a>
                    <a href="#" class="social-icon si-borderless si-instagram">
                        <i class="icon-line2-envelope"></i>
                        <i class="icon-line2-envelope"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div style="position: absolute; bottom: 0; left: 0; width: 100%; z-index: 3; background: url('<?php echo base_url(); ?>assets/theme2/res/images/sketch-header.png') repeat center bottom; background-size: auto 100%; height: 40px; margin-bottom: -10px;"></div>
</section>


<?php
$this->load->view('layout/footer');
?>