<?php
$this->load->view('layout/header');
?>


<div id="content"> 
    <section class="page_title bg_gradiant image_fixed t_align_c relative wrapper" style="margin-top: 0px;">
        <img src="images/page_404.jpg" alt="" class="page_404 d_xs_none">
        <h1 class="color_light fw_light m_bottom_12 text-center">Error 404 Page</h1>
        <!--breadcrumbs-->
        <h4 class="color_grey_light_3 text-center" style="margin-bottom: 50px; ">This Page Could Not Be Found :(</h4>
       <center style="margin-bottom: 50px; ">
           <a href="/"  style="    font-size: 20px;" class=" text-center btn btn-danger">BACK TO HOME</a>
       </center>
    </section>
</div>


<?php
$this->load->view('layout/footer');
?>