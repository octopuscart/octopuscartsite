<?php
$this->load->view('layout/header');
?>


<div class="container">

    <div class="my-4 my-xl-8">
        <?php
        if ($msg) {
            ?>
            <div class="col-md-12">
                <div class="alert alert-dismissible alert alert-primary mb-0" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="fa fa-close"></i> </span></button>
                    <i class="fa fa-exclamation-triangle"></i>  <?php echo $msg; ?>
                </div>
            </div>
            <?php
        }
        ?>
        <br/>
        <div class="row">
            <div class="col-md-5 ml-xl-auto mr-md-auto mr-xl-0 mb-8 mb-md-0">
                <!-- Title -->
                <div class="border-bottom border-color-1 mb-6">
                    <h3 class="d-inline-block section-title mb-0 pb-2 font-size-26">Login</h3>
                </div>
                <p class="text-gray-90 mb-4">Welcome back! Sign in to your account.</p>
                <!-- End Title -->
                <form class="js-validate" novalidate="novalidate"  method="post" action="#">
                    <!-- Form Group -->
                    <div class="js-form-message form-group">
                        <label class="form-label" for="signinSrEmailExample3">Username or Email address
                            <span class="text-danger">*</span>
                        </label>
                        <input type="email" class="form-control" name="email" id="signinSrEmailExample3" placeholder="Username or Email address" aria-label="Username or Email address" required="" data-msg="Please enter a valid email address." data-error-class="u-has-error" data-success-class="u-has-success">
                    </div>
                    <!-- End Form Group -->

                    <!-- Form Group -->
                    <div class="js-form-message form-group">
                        <label class="form-label" for="signinSrPasswordExample2">Password <span class="text-danger">*</span></label>
                        <input type="password" class="form-control" name="password" id="signinSrPasswordExample2" placeholder="Password" aria-label="Password" required="" data-msg="Your password is invalid. Please try again." data-error-class="u-has-error" data-success-class="u-has-success">
                    </div>
                    <!-- End Form Group -->

                    <!-- Checkbox -->

                    <!-- End Checkbox -->

                    <!-- Button -->
                    <div class="mb-1">
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary-dark-w px-5" name="signIn">Login</button>
                        </div>
                        <div class="mb-2">
                            <a class="text-blue" href="#">Lost your password?</a>
                        </div>
                    </div>
                    <!-- End Button -->
                </form>
            </div>
            <div class="col-md-1 d-none d-md-block">
                <div class="flex-content-center h-100">
                    <div class="width-1 bg-1 h-100"></div>
                    <div class="width-50 height-50 border border-color-1 rounded-circle flex-content-center font-italic bg-white position-absolute">or</div>
                </div>
            </div>
            <div class="col-md-5 ml-md-auto ml-xl-0 mr-xl-auto">
                <!-- Title -->
                <div class="border-bottom border-color-1 mb-6">
                    <h3 class="d-inline-block section-title mb-0 pb-2 font-size-26">Register</h3>
                </div>
                <p class="text-gray-90 mb-4">Create new account today to reap the benefits of a personalized shopping experience.</p>
                <!-- End Title -->
                <!-- Form Group -->
                <form class="js-validate" novalidate="novalidate" method="post" action="#">
                    <div class="row">
                        <div class="col-md-6">
                            <!-- Input -->
                            <div class="js-form-message mb-3">
                                <label class="form-label">
                                    First name
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" name="first_name" placeholder="" aria-label="" required="" data-msg="Please enter your frist name." data-error-class="u-has-error" data-success-class="u-has-success" autocomplete="off">
                            </div>
                            <!-- End Input -->
                        </div>
                        <div class="col-md-6">
                            <!-- Input -->
                            <div class="js-form-message mb-3">
                                <label class="form-label">
                                    Last Name
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" name="last_name" placeholder="" aria-label="" required="" data-msg="Please enter your last name." data-error-class="u-has-error" data-success-class="u-has-success" autocomplete="off">
                            </div>
                            <!-- End Input -->
                        </div>
                        <div class="col-md-12">
                            <div class="js-form-message form-group mb-3">
                                <label class="form-label" for="RegisterSrEmailExample3">Email address
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="email" class="form-control" name="email" id="RegisterSrEmailExample3" placeholder="Email address" aria-label="Email address" required="" data-msg="Please enter a valid email address." data-error-class="u-has-error" data-success-class="u-has-success">
                            </div>
                        </div> 
                        <div class="col-md-6">
                            <!-- Input -->
                            <div class="js-form-message mb-3">
                                <label class="form-label">
                                   Password
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="password" class="form-control" name="password" placeholder="" aria-label="Jack" required="" data-msg="Please enter your password" data-error-class="u-has-error" data-success-class="u-has-success" autocomplete="off">
                            </div>
                            <!-- End Input -->
                        </div>
                        <div class="col-md-6">
                            <!-- Input -->
                            <div class="js-form-message mb-3">
                                <label class="form-label">
                                   Confirm Password"
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="password" class="form-control" name="con_password" placeholder="" aria-label="Jack" required="" data-msg="Please confirm password." data-error-class="u-has-error" data-success-class="u-has-success" autocomplete="off">
                            </div>
                            <!-- End Input -->
                        </div>
                        <!-- End Form Group -->
                        <p class="text-gray-90 mb-4">Your personal data will be used to support your experience throughout this website, to manage your account, and for other purposes described in our <a href="#" class="text-blue">privacy policy.</a></p>
                        <!-- Button -->
                        <div class="mb-6">
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary-dark-w px-5" name="registration" value="registration   ">Register</button>
                            </div>
                        </div>
                        <!-- End Button -->
                    </div>
                </form>
                <h3 class="font-size-18 mb-3">Sign up today and you will be able to :</h3>
                <ul class="list-group list-group-borderless">
                    <li class="list-group-item px-0"><i class="fas fa-check mr-2 text-green font-size-16"></i> Speed your way through checkout</li>
                    <li class="list-group-item px-0"><i class="fas fa-check mr-2 text-green font-size-16"></i> Track your orders easily</li>
                    <li class="list-group-item px-0"><i class="fas fa-check mr-2 text-green font-size-16"></i> Keep a record of all your purchases</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php
$this->load->view('layout/footer');
?>