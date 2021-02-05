<?php
$this->db->where("parent_id", "0");
$query = $this->db->get('category');
$productcategory = $query->result_array();
?> 

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
                                <a id="TVMegaMenu" class="nav-link u-header__nav-link u-header__nav-link-toggle" href="<?php echo site_url("Product/productList/1/".$value['id']);?>" aria-haspopup="true" aria-expanded="false"><?php echo $value['category_name'] ?></a>

                                <!-- TV & Audio - Mega Menu -->
                                <div class="hs-mega-menu w-100 u-header__sub-menu" aria-labelledby="TVMegaMenu" style="display: none;">
                                    <div class="row u-header__mega-menu-wrapper">
                                        <div class="col-md-3">
                                            <span class="u-header__sub-menu-title">Televisions</span>
                                            <ul class="u-header__sub-menu-nav-group mb-3">
                                                <li><a href="#" class="nav-link u-header__sub-menu-nav-link">Smart TVs</a></li>
                                                <li><a href="#" class="nav-link u-header__sub-menu-nav-link">4K TVs</a></li>
                                                <li><a href="#" class="nav-link u-header__sub-menu-nav-link">Full HD TVs</a></li>
                                                <li><a href="#" class="nav-link u-header__sub-menu-nav-link">Large Screen TVs</a></li>
                                                <li><a href="#" class="nav-link u-header__sub-menu-nav-link">32 inch TVs</a></li>
                                                <li><a href="#" class="nav-link u-header__sub-menu-nav-link">39-43 inch TV</a></li>
                                                <li><a href="#" class="nav-link u-header__sub-menu-nav-link">48 &amp; Above</a></li>
                                            </ul>
                                            <span class="u-header__sub-menu-title">Home Audio/Video</span>
                                            <ul class="u-header__sub-menu-nav-group">
                                                <li><a href="#" class="nav-link u-header__sub-menu-nav-link">Speakers</a></li>
                                                <li><a href="#" class="nav-link u-header__sub-menu-nav-link">Home Theaters</a></li>
                                                <li><a href="#" class="nav-link u-header__sub-menu-nav-link">Projectors</a></li>
                                                <li><a href="#" class="nav-link u-header__sub-menu-nav-link">Headphones</a></li>
                                                <li><a href="#" class="nav-link u-header__sub-menu-nav-link">Noise Cancelling Headphones</a></li>
                                                <li><a href="#" class="nav-link u-header__sub-menu-nav-link">Soundbars</a></li>
                                                <li><a href="#" class="nav-link u-header__sub-menu-nav-link">Headphones with Mic</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-md-3">
                                            <span class="u-header__sub-menu-title">Shop by Brand</span>
                                            <ul class="u-header__sub-menu-nav-group mb-3">
                                                <li><a href="#" class="nav-link u-header__sub-menu-nav-link">VU</a></li>
                                                <li><a href="#" class="nav-link u-header__sub-menu-nav-link">Mi LED Smart TVs</a></li>
                                                <li><a href="#" class="nav-link u-header__sub-menu-nav-link">Samsung</a></li>
                                                <li><a href="#" class="nav-link u-header__sub-menu-nav-link">Panasonic</a></li>
                                                <li><a href="#" class="nav-link u-header__sub-menu-nav-link">TCL</a></li>
                                                <li><a href="#" class="nav-link u-header__sub-menu-nav-link">Sanyo</a></li>
                                                <li><a href="#" class="nav-link u-header__sub-menu-nav-link">Micromax</a></li>
                                            </ul>
                                            <span class="u-header__sub-menu-title">Shop by Brand</span>
                                            <ul class="u-header__sub-menu-nav-group">
                                                <li><a href="#" class="nav-link u-header__sub-menu-nav-link">JBL</a></li>
                                                <li><a href="#" class="nav-link u-header__sub-menu-nav-link">Sony</a></li>
                                                <li><a href="#" class="nav-link u-header__sub-menu-nav-link">Ultimate ears</a></li>
                                                <li><a href="#" class="nav-link u-header__sub-menu-nav-link">Philips</a></li>
                                                <li><a href="#" class="nav-link u-header__sub-menu-nav-link">Protronics</a></li>
                                                <li><a href="#" class="nav-link u-header__sub-menu-nav-link">Saregama</a></li>
                                                <li><a href="#" class="nav-link u-header__sub-menu-nav-link">Harmon Kardon</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-md-3">
                                            <span class="u-header__sub-menu-title">Other Home Entertainment</span>
                                            <ul class="u-header__sub-menu-nav-group mb-3">
                                                <li><a href="#" class="nav-link u-header__sub-menu-nav-link">Home Theater Systems</a></li>
                                                <li><a href="#" class="nav-link u-header__sub-menu-nav-link">Projectors &amp; Accessoires</a></li>
                                                <li><a href="#" class="nav-link u-header__sub-menu-nav-link">Set top Boxes</a></li>
                                                <li><a href="#" class="nav-link u-header__sub-menu-nav-link">Streaming Media Players</a></li>
                                                <li><a href="#" class="nav-link u-header__sub-menu-nav-link">DVD &amp; Blu-ray Players</a></li>
                                                <li><a href="#" class="nav-link u-header__sub-menu-nav-link">Cables</a></li>
                                                <li><a href="#" class="nav-link u-header__sub-menu-nav-link">Audio-video Accessories</a></li>
                                            </ul>
                                            <span class="u-header__sub-menu-title">Shop By Price</span>
                                            <ul class="u-header__sub-menu-nav-group">
                                                <li><a href="#" class="nav-link u-header__sub-menu-nav-link">Below Rs. 100$</a></li>
                                                <li><a href="#" class="nav-link u-header__sub-menu-nav-link">101$ - 199$</a></li>
                                                <li><a href="#" class="nav-link u-header__sub-menu-nav-link">200$ - 299$</a></li>
                                                <li><a href="#" class="nav-link u-header__sub-menu-nav-link">300$ - 399$</a></li>
                                                <li><a href="#" class="nav-link u-header__sub-menu-nav-link">400$ - 499$</a></li>
                                                <li><a href="#" class="nav-link u-header__sub-menu-nav-link">500$ - 599$</a></li>
                                                <li><a href="#" class="nav-link u-header__sub-menu-nav-link">600$ and Above</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-md-3">
                                            <a href="#" class="d-block mb-3">
                                                <img class="img-fluid" src="https://transvelo.github.io/electro-html/2.0/assets/img/300X275/img1.jpg" alt="Image Description">
                                            </a>
                                            <a href="#" class="d-block">
                                                <img class="img-fluid" src="https://transvelo.github.io/electro-html/2.0/assets/img/300X275/img2.jpg" alt="Image Description">
                                            </a>
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