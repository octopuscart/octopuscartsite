<?php

$productcategory = [
    array("title"=>"Jewelry Accessories", "link"=>""),
];
?> 
<style>
    .menudescription{
        font-size: 12px;margin-bottom: 10px
    }
</style>
<!-- Primary-menu-wide -->
<div class="d-none d-xl-block bg-primary">
    <div class="container">
        <div class="min-height-45">
            <!-- Nav -->
            <nav class="js-mega-menu navbar navbar-expand-md u-header__navbar u-header__navbar--wide u-header__navbar--no-space hs-menu-initialized hs-menu-horizontal">
                <!-- Navigation -->
                <div id="navBar" class="collapse navbar-collapse u-header__navbar-collapse">
                    <ul class="navbar-nav u-header__navbar-nav">

                        <?php
                        foreach ($productcategory as $key => $value) {
                            ?>
                            <!-- TV & Audio -->
                            <li class="nav-item hs-has-mega-menu u-header__nav-item" data-event="hover" data-animation-in="slideInUp" data-animation-out="fadeOut">
                                <a id="TVMegaMenu" class="nav-link u-header__nav-link u-header__nav-link-toggle" href="<?php echo $value['link']; ?>" aria-haspopup="true" aria-expanded="false"><?php echo $value['title'] ?></a>

                                <!-- TV & Audio - Mega Menu -->
                                <div class="hs-mega-menu w-100 u-header__sub-menu" aria-labelledby="TVMegaMenu" style="display: none;">
                                    <div class="row u-header__mega-menu-wrapper">

                                        <div class="col-md-3">
                                            <span class="u-header__sub-menu-title">Latest Earrings</span>

                                            <p class="menudescription">
                                                Shop from the latest collection of Earrings for women & girls online. Buy studs, ear cuff, drop & more Earrings at best price
                                            </p>
                                            <ul class="u-header__sub-menu-nav-group mb-3">
                                                <?php
                                                $menuarray = [
                                                    array("title" => "Earrings", "link" => ""),
                                                    array("title" => "Bracelets", "link" => ""),
                                                    array("title" => "Rings", "link" => ""),
                                                    array("title" => "Brooches", "link" => ""),
                                                    array("title" => "Keychains", "link" => ""),
                                                ];
                                                foreach ($menuarray as $key => $value) {
                                                    ?>
                                                    <li><a href="#" class="nav-link u-header__sub-menu-nav-link"><?php echo $value['title']; ?></a></li>
                                                    <?php
                                                }
                                                ?>
                                            </ul>
                                            <span class="u-header__sub-menu-title">Shop By Discount</span>

                                            <ul class="u-header__sub-menu-nav-group mb-3">
                                                <?php
                                                $menuarray = [
                                                    array("title" => "Upto 25% Off", "link" => ""),
                                                    array("title" => "Upto 50% Off", "link" => ""),
                                                    array("title" => "Upto 60% Off", "link" => ""),
                                                    array("title" => "Upto 80% Off", "link" => ""),
                                                ];
                                                foreach ($menuarray as $key => $value) {
                                                    ?>
                                                    <li><a href="#" class="nav-link u-header__sub-menu-nav-link"><?php echo $value['title']; ?></a></li>
                                                    <?php
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                        <div class="col-md-3">
                                            <span class="u-header__sub-menu-title">Fashion Jewellery</span>
                                            <p class="menudescription">
                                                Amazing fashion jewellery by Octopuscart . 
                                            </p>
                                            <ul class="u-header__sub-menu-nav-group mb-3">
                                                <?php
                                                $menuarray = [
                                                    array("title" => "Women's Jewelry", "link" => ""),
                                                    array("title" => "Necklaces", "link" => ""),
                                                    array("title" => "Jewelry Sets", "link" => ""),
                                                    array("title" => "Body Jewelry", "link" => ""),
                                                    array("title" => "Hair Jewelry", "link" => ""),
                                                    array("title" => "Fine Jewelry", "link" => ""),
                                                ];
                                                foreach ($menuarray as $key => $value) {
                                                    ?>
                                                    <li><a href="#" class="nav-link u-header__sub-menu-nav-link"><?php echo $value['title']; ?></a></li>
                                                    <?php
                                                }
                                                ?>
                                            </ul>

                                            <span class="u-header__sub-menu-title">Shop By Price</span>

                                            <ul class="u-header__sub-menu-nav-group mb-3">
                                                <?php
                                                $menuarray = [
                                                    array("title" => "Below Rs. 10$", "link" => ""),
                                                    array("title" => "10$ - 99$", "link" => ""),
                                                    array("title" => "100$ - 199$", "link" => ""),
                                                    array("title" => "200$ - 499$", "link" => ""),
                                                    array("title" => "900$ and Above", "link" => ""),
                                                ];
                                                foreach ($menuarray as $key => $value) {
                                                    ?>
                                                    <li><a href="#" class="nav-link u-header__sub-menu-nav-link"><?php echo $value['title']; ?></a></li>
                                                    <?php
                                                }
                                                ?>
                                            </ul>

                                        </div>
                                        <div class="col-md-3">
                                            <span class="u-header__sub-menu-title">Special Moments</span>

                                            <ul class="u-header__sub-menu-nav-group mb-3">
                                                <?php
                                                $menuarray3 = [
                                                    array("title" => "Wedding", "link" => ""),
                                                    array("title" => "Engagement", "link" => ""),
                                                    array("title" => "Party Evening", "link" => ""),
                                                    array("title" => "Street", "link" => ""),
                                                    array("title" => "Holiday", "link" => ""),
                                                    array("title" => "Dating", "link" => ""),
                                                    array("title" => "Birthday Party", "link" => ""),
                                                    array("title" => "Graduation", "link" => ""),
                                                    array("title" => "Anniversary", "link" => ""),
                                                    array("title" => "Movie Night", "link" => ""),
                                                    array("title" => "Prom", "link" => ""),
                                                    array("title" => "Halloween Jewelry", "link" => ""),
                                                ];
                                                foreach ($menuarray3 as $key => $value) {
                                                    ?>
                                                    <li><a href="#" class="nav-link u-header__sub-menu-nav-link"><?php echo $value['title']; ?></a></li>
                                                    <?php
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                        <div class="col-md-3">

                                            <a href="#" class="d-block mb-3">
                                                <img class="img-fluid" src="<?php echo base_url(); ?>assets/theme2/img/300X275/necklace.png" alt="Image Description">
                                            </a>
                                            <p>
                                                Browse through a wide array of Bracelet Designs crafted with dexterity and buy your favorite from octopuscart jewellery.      
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!-- End TV & Audio - Mega Menu -->
                            </li>
                            <!-- End Pages -->
                            <?php
                        }
                        ?>
                        <!-- End Movies & Games -->
                    </ul>
                </div>
                <!-- End Navigation -->
            </nav>
            <!-- End Nav -->
        </div>
    </div>
</div>
<!-- End Primary-menu-wide -->