<?php
$this->load->view('layout/header');
?>


<!-- Inner Page Banner Area Start Here -->
<div class="inner-page-banner-area" style="    background: url(<?php echo base_url(); ?>assets/images/shop2.jpg);
     background-size: cover;
     background-position: 459px -1031px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcrumb-area">
                    <h1>Movie Ticket </h1>
                    <ul>
                        <li><a href="#">Home</a> /</li>
                        <li>Select Movie</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Inner Page Banner Area End Here -->
<!-- Contact Us Page Area Start Here -->
<!-- Single Blog Page Area Start Here -->


<div class="portfolio2-page-area1" style="padding: 30px">
    <div class="container-fluid">
        <div class="row">

            <?php
            foreach ($moves as $key => $catv) {
                ?>
                
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-6">
                    <div class="portfolio2-box">
                        <div class="portfolio2-img-holder">
                            <div class="portfolio2-content-holder">
                                <h3><a href="#"><?php echo $catv['title']?></a></h3>
                                <ul>
                                    <li><?php echo $catv['attr']?></li>
                                </ul>
                                <a href="<?php echo site_url('Movies/showTime/'.$catv['id'])?>" style="margin-top: 10px;" class="button btn btn-default">Book Now</a>
                            </div>
                            <a href="#">
                                <img class="img-responsive" src="<?php echo base_url(); ?>assets/movies/<?php echo $catv['image'];?>" alt="portfolio">
                            </a>
                        </div>
                    </div>
                </div>

                <?php
            }
            ?>

        </div>
    </div>
</div>


  <div class="offer-area1 hidden-after-desk movieblockhome">

        <div class="" style="padding: 0px 50px;">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="brand-area-box-l" style="padding-top: 24px;">
                        <span>Movie Ticket Price From </span>
                        <h1>HK$ 180 Only</h1>
                        <p>Choose your Ticket Price<br/> $220 (J-O) - $200 (E-I) - $180 (C-D)</p>
                        <a href="#" class="btn-shop-now-fill">Book Now</a>
                    </div>
                </div>
                <div id="countdown2">
                    <div class="countdown-section"><h3>7th</h3> <p>FAB</p> </div>
                    <div class="countdown-section"><h3>8th</h3> <p>FAB</p> </div>
                    <div class="countdown-section"><h3>9th</h3> <p>FAB</p> </div>

                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="brand-area-box-r">
                        <a href="#"><img src="<?php echo base_url(); ?>assets/movies/movieposter1.jpg" alt="offer"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="<?php echo base_url(); ?>assets/theme2/angular/ng-movies.js"></script>

<?php
$this->load->view('layout/footer');
?>