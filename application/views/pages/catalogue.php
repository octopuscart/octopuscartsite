<?php
$this->load->view('layout/header');
?>
<style>
    .container3d .image{
        padding: 15px;
    }
</style>
<main id="content" role="main">
    <div class="bg-img-hero mb-1" >
        <div class="container" style="padding-top: 30px;">
            <h2 class="text-center">Product Catalogs</h2>

        </div>
    </div>

    <div class="container ">
        <div class=" " style="display: block;
             height: 350px;">

            <div class="hover3deffect">
                <div class=" container">

                    <div class="row">
                        <div class="col-md-4">
                            <div class="container3d" >
                                <div class="image" >
                                    <a href="<?php echo base_url(); ?>assets/images/jswele.pdf" target="_blank">
                                        <img src="<?php echo base_url(); ?>assets/images/cat1.jpg">
                                    </a>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="container3d" >
                                <div class="image" >
                                    <a href="<?php echo base_url(); ?>assets/images/jswele.pdf" target="_blank">
                                        <img src="<?php echo base_url(); ?>assets/images/cat2.jpg">
                                    </a>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="container3d" >
                                <div class="image" >
                                    <a href="<?php echo base_url(); ?>assets/images/jswele.pdf" target="_blank">
                                        <img src="<?php echo base_url(); ?>assets/images/cat3.jpg">
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>






                </div>
            </div>
        </div>
    </div>
</main>



<?php
$this->load->view('layout/footer');
?>