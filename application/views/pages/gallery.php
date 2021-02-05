<?php
$this->load->view('layout/header');
$galleryImages = [
    array("title" => "Our Restaurant",
        "front_image" => "restaurant1.jpg",
        "imagelist" => ['1.jpg', '2.jpg', '3.jpg',  '621A0262.jpg', '621A0264.jpg', '621A0266.jpg', '621A0269.jpg', '621A0278.jpg', '621A0280.jpg', 'EK8A5498.jpg', 'EK8A5503.jpg', 'EK8A5524.jpg', 'EK8A5527.jpg', 'EK8A5538.jpg', 'mainimage.jpg', 'Wall.jpg'],
        "folder" => "restaurant",
    ),
    array("title" => "Our Food",
        "front_image" => "food1.jpg",
        "imagelist" => ['1.jpg', '1367_25674-PanneerBurji Uttappam.jpg', '1367_25725-RasamSoup.jpg', '1367_25774.jpg', '1367_25796-WoodlandsSpecialButterMasalaDosa.jpg', '1367_25814-MysoreMushroomMasalaDosa.jpg', '1367_25823MysoreMushroomMasaladosa2.jpg', '1367_25856-PavBaji.jpg', '1367_25863-LemonRice.jpg',  '1367_25900-WoodlandsSpecialThali.jpg', '1367_25906-SouthIndianthali.jpg',   '1367_26119-ChannaMasala.jpg', '2.JPG', '3.jpg', '4.jpg', '5.jpg', '6.jpg',  '621A2660.jpg', '621A2670.jpg', '621A2706.jpg', '621A2711.jpg'],
        "folder" => "food",
    ),
      array("title" => "Set Lunch",
        "front_image" => "default.jpg",
        "imagelist" => ['1330_2783v1.jpg', '1330_2793v1.jpg', '1330_2801v1.jpg', '1330_2812v1.jpg', '1330_2838v1.jpg', '1330_2852v1.jpg', '1330_2860v1.jpg', '1330_2871v1.jpg', '1330_2894v1.jpg', 'RICE.jpg'],
        "folder" => "SetLunch",
    ),
    
     array("title" => "Drinks",
        "front_image" => "default.jpg",
        "imagelist" => ['HerbalTea.jpg', 'IMG_2265.jpg', 'IMG_2272.jpg', 'IMG_2293.jpg', 'IMG_2297.jpg', 'IMG_2310.jpg', 'IMG_2320.jpg', 'IMG_2326.jpg', 'IMG_2336.jpg', 'IMG_9564.jpg', '1367_25984.jpg', '1367_25995.jpg', '1367_26066-RoyalFalooda.jpg'],
        "folder" => "Drinks",
    ),
 
    array("title" => "Customers with Dosa",
        "front_image" => "default.jpg",
        "imagelist" => ['1.jpg', '57587016_2607598859257469_3143910795042095104_n.jpg', '65456330_1275458245949686_9021677159999078400_o.jpg', '70292917_10220342901063012_2743297106327371776_n.jpg', '80340688_10156564079755825_4520669064355381248_o.jpg','IMG_1538.jpg', 'IMG_1745.jpg', 'IMG_8114.jpg', 'IMG_9098.jpg'],
        "folder" => "CustomerswithDosa",
    ),
  
    array("title" => "Chef & Team",
        "front_image" => "default.jpg",
        "imagelist" => ['621A0212.jpg', '621A0226.jpg', 'DSC_9638.jpg', 'DSC_9640.jpg', 'E98A8513.jpg', ],
        "folder" => "ChefTeam",
    ),
    
   
];
?>

<style>
    #slider {
        height: 1200px!important;
        width: -webkit-fill-available;
    }
</style>
<section id="slider" class="slider-element gallery-images dark force-full-screen full-screen clearfix" style="background-image: url('<?php echo base_url(); ?>assets/theme2/res/images/sections/booknow.jpg'); background-size: cover">
    <div class="vertical-middle">
        <div class="container">
            <div class="heading-block center nobottomborder">
                <span class="font-primary ls1">Gallery</span>
                <h3 class="nott font-secondary ls0" style="font-size: 68px; line-height: 1.3;">See what we do</h3>
            </div>
            <div class="row justify-content-center align-items-center clearfix">
                <!--                <div class="col-sm-5 col-7 center align-self-center" data-lightbox="gallery">
                                    <a href="<?php echo base_url(); ?>assets/theme2/res/images/gallery/restaurant/1.jpg" data-lightbox="gallery-item">
                                        <img src="<?php echo base_url(); ?>assets/theme2/res/images/gallery/restaurant1.jpg" alt="img" width="350" class="rounded" style="border: 3px solid rgba(255,255,255,0.8);">
                                    </a>
                                    <a href="<?php echo base_url(); ?>assets/theme2/res/images/gallery/restaurant/2.jpg" class="hidden" data-lightbox="gallery-item"></a>
                                    <a href="<?php echo base_url(); ?>assets/theme2/res/images/gallery/restaurant/3.jpg" class="hidden" data-lightbox="gallery-item"></a>
                                    <a href="<?php echo base_url(); ?>assets/theme2/res/images/gallery/restaurant/4.jpg" class="hidden" data-lightbox="gallery-item"></a>
                                    <h3 class="mt-3 mb-0">Our Restaurant</h3>
                                </div>-->
                <?php
                foreach ($galleryImages as $gkey => $gvalue) {
                    ?>
                    <div class="col-sm-5 col-7 mt-5 mt-sm-0 center align-self-center" data-lightbox="gallery" style='    margin-bottom: 36px;'>
                        <a href="<?php echo base_url(); ?>assets/theme2/res/images/gallery/<?php echo $gvalue['folder'] . '/' . $gvalue['front_image']; ?>" data-lightbox="gallery-item">
                            <img src="<?php echo base_url(); ?>assets/theme2/res/images/gallery/<?php echo $gvalue['folder'] . '/' . $gvalue['front_image']; ?>" alt="img" width="350" class="rounded" style="border: 3px solid rgba(255,255,255,0.8);">
                        </a>
                        <?php
                        foreach ($gvalue['imagelist'] as $ikey => $ivalue) {
                            ?>
                            <a href="<?php echo base_url(); ?>assets/theme2/res/images/gallery/<?php echo $gvalue['folder'] . '/' . $ivalue; ?>" class="hidden" data-lightbox="gallery-item"></a>
                            <?php
                        }
                        ?>
                        <h3 class="mt-3 mb-0"><?php echo $gvalue['title']; ?></h3>
                    </div>
                    <?php
                }
                ?>

            </div>
        </div>
    </div>
    <div class="video-wrap" style="position: absolute; height: 100%; z-index: 1;">
        <div class="video-overlay" style="background: rgba(0,0,0,0.3);"></div>
    </div>

</section>

<section >
    <?php
    $this->load->view('layout/contactfooter');
    ?>
    <div style="position: absolute; bottom: 0; left: 0; width: 100%; z-index: 3; background: url('images/sketch-header.png') repeat center bottom; background-size: auto 100%; height: 40px; margin-bottom: -10px;"></div>

</section>


<?php
$this->load->view('layout/footer');
?>