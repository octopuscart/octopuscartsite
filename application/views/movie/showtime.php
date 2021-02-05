<?php
$this->load->view('layout/header');
?>
<style>
    .time-select--wide {
        margin-top: -3px;
        margin-bottom: 15px;
    }
    .time-select .time-select__group {
        position: relative;
        overflow: hidden;
        margin-bottom: 2px;
        background-color: #f5f5f5;
    }
    .time-select .time-select__place {
           font-size: 16px;
    margin-top: 15px;
    margin-left: 5px;
    margin-bottom: 15px;
    line-height: 30px;
    }
    .time-select .items-wrap {
           padding-top: 5px;
    margin-bottom: 5px;
    }
    .time-select .time-select__group:after {
        content: '';
        width: 2px;
        height: 25px;
        background-color: #fff;
        position: absolute;
        left: 31%;
        bottom: 0;
    }
    .time-select--wide .time-select__group:before, .time-select--wide .time-select__group:after {
        left: 23%;
    }
    .time-select .time-select__item {
        position: relative;
        z-index: 0;
        display: inline-block;
        font-size: 12px;
        padding: 9px 15px 8px 14px;
        margin: 5px 16px 5px 0;
        cursor: pointer;
        background-image: url(<?php echo base_url(); ?>assets/movies/bg-time.png);
        background-size: 100%;
        border: 4px solid #fff;
    }

    .time-select__item.active{
        border:4px solid #000;
    } 
    .time-select .time-select__item:after {
        content: '';
        width: 64px;
        height: 34px;

        background-repeat: no-repeat;
        -webkit-background-size: 64px 34px;
        background-size: 64px 34px;
        top: 0px;
        left: -2px;
        z-index: -1;
    }
    .time-select .time-select__item:before {
        content: '';
        width: 54px;
        height: 28px;
        position: absolute;
        top: 3px;
        left: 3px;

    }
    .time-select .time-select__item:hover {
        background-color: #000000;
        border: 4px solid #000;
    }


    .countdown-section:hover {
        cursor: pointer;
        border: 5px solid #000;
    }

    .countdown-section.active {
        cursor: pointer;
        border: 5px solid #000;
    }

    .countdown-section{
        cursor: pointer;
        border: 5px solid #ffeb3b;
    }
</style>

<!-- Inner Page Banner Area Start Here -->
<div class="inner-page-banner-area" style="   min-height: 27px;
     padding: 0;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcrumb-area">
                    <ul>
                        <li><a href="#"><?php echo($movie['title']); ?></a> /</li>
                        <li>Select Show Time</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Inner Page Banner Area End Here -->
<!-- Contact Us Page Area Start Here -->
<!-- Single Blog Page Area Start Here -->


<div class="portfolio2-page-area1 showtimeblock" style="padding: 20px" ng-controller="showTimeContoller">
    <div class="container">


        <div class="row">
            <div class="col-sm-12">


                <div class="row">
                   
                    <div class="col-md-6">
                        <div class="choose-container choose-container--short">
                            <h2 class="page-heading seatselectblock">
                                Select no. of seat(s)
                                <input type="number" class="pull-right" min="1" max="10" ng-model="selectShowtime.seats" style="    font-size: 25px;
                                       margin-right: 10px;height:35px;">
                            </h2>
                            <p style="padding: 0px 0px;font-size: 11px;">
                                More than 10 tickets must contact us for booking for making the payment to purchase the
                                tickets
                            </p>
                        </div>
                        <div class="choose-container choose-container--short">
                            <h2 class="page-heading">Select Date</h2>
                            <div class="offer-area1 hidden-after-desk movieblockhome" style="padding:10px;">
                                <div id="countdown2" style="position: inherit;    text-align: left;">

                                    <?php
                                    foreach ($datearray as $key => $value) {
                                        ?>
                                        <div class="countdown-section {{selectShowtime.date=='<?php echo $key; ?>'?'active':''}}" ng-click="selectDate('<?php echo $key; ?>')" ><h3><?php echo $value['day']; ?></h3> <p><?php echo $value['month']; ?></p> </div>
                                        <?php
                                    }
                                    ?>

                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="col-md-6">
                        <div class="product-box2" style="height: 250px;background: #f5f5f5;
                             color: white;
                             ">
                            <div class="media">
                                <a class="pull-left" href="#">
                                    <img class="img-responsive" style="width: 180px;" src="<?php echo base_url(); ?>assets/movies/<?php echo $movie['image']; ?>" alt="product">
                                </a>
                                <div class="media-body">
                                    <div class="product-box2-content">
                                        <h3><a href="#"><?php echo $movie['title']; ?></a></h3>
                                        <span><?php echo $movie['attr']; ?></span>
                                        <input type="button"  class="btn btn-default"  value="View Detais" /> 
                                        <input type="button"  class="btn btn-default"  value="Watch Trailer" /> 

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>




                <hr style="    margin: 5px 0px;"/>
                <h2 class="page-heading">Select time</h2>

                <div class="time-select time-select--wide">

                    <?php
                    foreach ($theaters as $key => $value) {
                        if ($value['active'] == 1) {
                            ?>    

                            <div class="time-select__group group--first">
                                <div class="col-sm-3">
                                    <p class="time-select__place"><?php echo $value['title']; ?></p>
                                </div>
                                <ul class="col-sm-6 items-wrap">
                                    <?php
                                    foreach ($value['timing'] as $key2 => $value2) {
                                        ?>
                                        <li class="time-select__item {{selectShowtime.time=='<?php echo $value2; ?>'?'active':''}}" ng-click="selectTime('<?php echo $value2; ?>', '<?php echo $key; ?>')" data-time="<?php echo $value2; ?>"><?php echo $value2; ?></li>
                                        <?php
                                    }
                                    ?>
                                </ul>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>


            </div>

        </div>
        <div class="well well-sm">
            <b>Selected Date/Time:</b> {{selectShowtime.theater?selectShowtime.theater:'---'}}, {{selectShowtime.date?selectShowtime.date:'YYYY-MM-DD'}}, {{selectShowtime.time?selectShowtime.time:'HH:MM'}}
        </div>
        <nav aria-label="...">
            <ul class="pager">
                <li class="previous"><a href="<?php echo site_url('Movies/index'); ?>" style="    background: #d92229;
                                        color: white;"><span aria-hidden="true">&larr;</span> Select Movie</a></li>
                <li class="next">
                    <a href="<?php echo site_url("Movies/selectSit") . "?movie=" . $movie['id'] . "&"; ?>theater={{selectShowtime.theater}}&selecttime={{selectShowtime.time}}&selectdate={{selectShowtime.date}}&seats={{selectShowtime.seats}}" ng-if="selectShowtime.date && selectShowtime.time" style="    background: #d92229;
                       color: white ;">Select Seat(s) <span aria-hidden="true">&rarr;</span></a>
                </li>
            </ul>
        </nav>
    </div>
</div>

<script src="<?php echo base_url(); ?>assets/theme2/angular/ng-movies.js"></script>


<?php
$this->load->view('layout/footer');
?>