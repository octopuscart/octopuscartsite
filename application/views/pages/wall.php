<?php
$this->load->view('layout/header');
?>

<style>
    footer{
        position: inherit!important;
    }
    .dessert-menu .item-thumb{
        height: 600px;
        overflow-y: scroll;
        margin-top: 100px;
    }
    <?php
    $reviewList = array(
        "ranikant" => array(
            "image" => "Rajini.jpg",
            "name" => "Rajinikanth",
            "position" => "Indian Cine Super Star",
            "date" => "",
        ),
        "ilayaraja" => array(
            "image" => "Ilayaraja.jpg",
            "name" => "Iilayaraja",
            "position" => "Famous Indian Music Director",
            "date" => "",
        ),
        "SPB" => array(
            "image" => "SPB.jpg",
            "name" => "S. P. Balasubrahmanyam",
            "position" => "Indian playback singer",
            "date" => "",
        ),
        "Sunil-Gav" => array(
            "image" => "Sunil-Gav.jpg",
            "name" => "Sunil Gavaskar",
            "position" => "Indian cricketer",
            "date" => "",
        ),
        "Anil-Kumble" => array(
            "image" => "Anil-Kumble.jpg",
            "name" => "Anil Kumble",
            "position" => "Indian cricketer",
            "date" => "",
        ),
        "Amrish" => array(
            "image" => "Amrish.jpg",
            "name" => "Amrish Puri",
            "position" => "Indian bollywood actor ",
            "date" => "",
        ),
        "hariharan" => array(
            "image" => "Hari-haran.jpg",
            "name" => "Hari Haran",
            "position" => "Indian Cine Singar ",
            "date" => "",
        ),
        "shrikanth" => array(
            "image" => "Srikanth.jpg",
            "name" => "Shri Kanth",
            "position" => "Indian cricketer ",
            "date" => "",
        ),
        "Solomon" => array(
            "image" => "Solomon.jpg",
            "name" => "Solomon Pappaiah",
            "position" => "Indian scholar",
            "date" => "",
        ),
        "Sudha" => array(
            "image" => "Sudha.jpg",
            "name" => "Sudha Ragunathan",
            "position" => "Indian Vocalist",
            "date" => "",
        ),
        "Narasimha" => array(
            "image" => "Narasimrao.jpg",
            "name" => "P. V. Narasimha Rao",
            "position" => "Former Prime Minister of India",
            "date" => "",
        ),
        "omar" => array(
            "image" => "omar.jpg",
            "name" => "Omar Abdullah",
            "position" => "Former Chief Minister of Jammu and Kashmir",
            "date" => "",
        ),
        "Jaipal" => array(
            "image" => "Jaipal.jpg",
            "name" => "Jaipal Reddy",
            "position" => "Indian Politician",
            "date" => "",
        ),
        "Jayawanti" => array(
            "image" => "Jayawanti.jpg",
            "name" => "Jayawanti Mehta",
            "position" => "Indian Politician",
            "date" => "",
        ),
        "BSA" => array(
            "image" => "BSA.jpg",
            "name" => "Indian entrepreneur",
            "position" => "Indian Politician",
            "date" => "",
        ),
        "Sivanthi" => array(
            "image" => "Sivanthi.jpg",
            "name" => "Sivanthi Adithan",
            "position" => "Indian media baron",
            "date" => "",
        ),
        "Vedavalli" => array(
            "image" => "Vedavalli.jpg",
            "name" => "Vedavalli",
            "position" => "South Indian Carnatic Singer",
            "date" => "",
        ),
        "Gopalakrishnan" => array(
            "image" => "Gopalakrishnan.jpg",
            "name" => "M. S. Gopalakrishnan",
            "position" => "Indian Violinist",
            "date" => "",
        ),
        "Hariprasad" => array(
            "image" => "Hariprasad.jpg",
            "name" => "Hariprasad Chaurasia",
            "position" => "Famous Indian music director",
            "date" => "",
        ),
        "Ravikumar" => array(
            "image" => "Ravikumar.jpg",
            "name" => "K. S. Ravikumar",
            "position" => "Indian Cine Director",
            "date" => "",
        ),
        "YGeeMahendra" => array(
            "image" => "YGeeMahendra.jpg",
            "name" => "Y. Gee. Mahendra",
            "position" => "Indian dramatist",
            "date" => "",
        ),
        "Gangai" => array(
            "image" => "Gangai.jpg",
            "name" => "Gangai Amaran",
            "position" => "Indian Music Director",
            "date" => "",
        ),
        "annachi" => array(
            "image" => "annachi.jpg",
            "name" => "Imman Annachi",
            "position" => "Indian Actor",
            "date" => "",
        ),
    );
    $countrr = 1;
    foreach ($reviewList as $key => $value) {
        ?>

        .dessert-menu .item-thumb .owl-dot:nth-of-type(<?php echo $countrr; ?>) span {
            background-image: url(<?php echo base_url(); ?>assets/theme2/res/images/review/<?php echo $value['image']; ?>)!important;
            background-size: 100%!important;
        }
        <?php
        $countrr ++;
    }
    ?>

</style>



<!-- Inner Page Banner Area Start Here -->
<section id="page-title" class="page-title-parallax page-title-center border-bottom" style="background-image: url('<?php echo base_url(); ?>assets/theme2/res/images/sections/wall.jpg');   margin-top: -30px;    padding: 100px 0px;    background-position: -471px -230px;" data-center="" data-top-bottom="">
    <div class="container clearfix">
        <h1 class="font-secondary capitalize ls0" style="font-size: 62px;">Wall Of Woodland</h1>

    </div>
</section>
<!-- Inner Page Banner Area End Here -->

<img src="<?php echo base_url(); ?>assets/theme2/res/images/sketch.png" style="    margin-top: -65px;
     position: absolute;
     z-index: 200;" />
<!-- Content -->

<section style="overflow: visible;">

    <div class="section dessert-menu nomargin nopadding" style="    background: white;">
        <div class="container-fluid">
            <div class="row align-items-stretch clearfix">
                <div class="col-lg-5 colordarkgreen" style="background-color: #FFF; padding: 0; box-shadow: 0px 2px 38px 4px rgba(0, 0, 0, 0.61);

                     margin: 39px 0px;height: 600px;">
                    <div id="dessert-menu-carousel" class="menu-carousel owl-carousel image-carousel custom-js">
                        <?php
                        foreach ($reviewList as $key => $value) {
                            ?>
                            <div class="oc-item">
                                <img class="topmargin-sm" src="<?php echo base_url(); ?>assets/theme2/res/images/review/<?php echo $value['image']; ?>" alt="<?php echo $value['name']; ?>" style="margin: 26px;    width: 90%;">
                                <div class="food-content clearfix">
                                    <div class="heading-block nobottomborder nobottommargin">
                                        <h3 class="font-secondary nott txtcolorlightyellow"><?php echo $value['name']; ?></h3>
                                        <div class="food-info txtcolorlightgreen"><?php echo $value['position']; ?></div>
                                        <p class="nobottommargin"><?php echo $value['date']; ?></p>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>

                    </div>
                </div>
                <div class="col-lg-7 clearfix" style="background:url()">
                    <span class="t400 font-secondary " style="font-size: 25px;
                          text-align: center!important;
                          width: 100%;
                          float: left;
                          padding: 10px 68px;">
                        Many iconic personalities from India and around the world
                        have dined at Woodlands and left their hand-written
                        testimonials about their experience with us.
                    </span>
                    <div class="vertical-middle">
                        <div class="col-padding clearfix">
                            <div><div id="item-thumb1" class="item-thumb"></div></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section >


        <div class="container clearfix" style="padding: 20px 0px;">
            <div class="heading-block center nobottommargin nobottomborder">
                <h3 class="nott font-secondary ls0" style="font-size: 60px;">Reviews on TripAdvisor</h3>
            </div>
            <div class="row">
                <div class="" style="text-align: center;width:100%;">
                    <div id="TA_selfserveprop474" class="TA_selfserveprop" style="display: inline-block;width:500px;">
                        <ul id="VTatmM" class="TA_links XW52hq5Xclrd">
                            <li id="HGpatLPntM7" class="O6eEKDqDdZdK">
                                <a target="_blank" href="https://en.tripadvisor.com.hk/"><img src="https://en.tripadvisor.com.hk/img/cdsi/img2/branding/150_logo-11900-2.png" alt="TripAdvisor"/></a>
                            </li>
                        </ul>
                    </div>
                    <script async src="https://www.jscache.com/wejs?wtype=selfserveprop&uniq=474&locationId=1216071&lang=en_HK&rating=true&nreviews=4&writereviewlink=true&popIdx=true&iswide=true&border=true&display_version=2" data-loadtrk onload="this.loadtrk = true"></script>
                </div>
            </div>
        </div>

    </section>
    <?php
    $this->load->view('layout/contactfooter');
    ?>

</section>




<?php
$this->load->view('layout/footer', array('custom_item' => 0, 'custom_id' => 0));
?>