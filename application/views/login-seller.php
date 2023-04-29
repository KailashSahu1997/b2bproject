<!--  Start Header Area -->
<?php include"header.php"; ?>
<!-- End Header Area -->


<!-- site__body -->
<div class="site__body login-bg bg-gray">
    <div class="block-header block-header--has-breadcrumb block-header--has-title">
        <div class="container">
            <div class="block-header__body">
                <nav class="breadcrumb block-header__breadcrumb" aria-label="breadcrumb">
                    <ol class="breadcrumb__list">
                        <li class="breadcrumb__spaceship-safe-area" role="presentation"></li>
                        <li class="breadcrumb__item breadcrumb__item--parent breadcrumb__item--first"><a href="<?=base_url()?>" class="breadcrumb__item-link">Home</a></li>
                        <li class="breadcrumb__item breadcrumb__item--current breadcrumb__item--last" aria-current="page"><span class="breadcrumb__item-link">Seller Login</span></li>
                        <li class="breadcrumb__title-safe-area" role="presentation"></li>
                    </ol>
                </nav>
                <!-- <h1 class="block-header__title">Seller Login</h1> -->
            </div>
        </div>
    </div>
    <div class="login-block">
        <div class="login-session">
            <div class="left">
                <svg enable-background="new 0 0 300 302.5" version="1.1" viewBox="0 0 300 302.5" xml:space="preserve" xmlns="http://www.w3.org/2000/svg">
                    <path class="st01" d="m126 302.2c-2.3 0.7-5.7 0.2-7.7-1.2l-105-71.6c-2-1.3-3.7-4.4-3.9-6.7l-9.4-126.7c-0.2-2.4 1.1-5.6 2.8-7.2l93.2-86.4c1.7-1.6 5.1-2.6 7.4-2.3l125.6 18.9c2.3 0.4 5.2 2.3 6.4 4.4l63.5 110.1c1.2 2 1.4 5.5 0.6 7.7l-46.4 118.3c-0.9 2.2-3.4 4.6-5.7 5.3l-121.4 37.4zm63.4-102.7c2.3-0.7 4.8-3.1 5.7-5.3l19.9-50.8c0.9-2.2 0.6-5.7-0.6-7.7l-27.3-47.3c-1.2-2-4.1-4-6.4-4.4l-53.9-8c-2.3-0.4-5.7 0.7-7.4 2.3l-40 37.1c-1.7 1.6-3 4.9-2.8 7.2l4.1 54.4c0.2 2.4 1.9 5.4 3.9 6.7l45.1 30.8c2 1.3 5.4 1.9 7.7 1.2l52-16.2z" />
                </svg>
            </div>
            <form id="buyer-login" class="log-in">
                <h4>Seller <span>Login</span></h4>
                <p>To keep connected with us please login with your personal info</p>
                <div class="floating-label">
                    <input class="form-input" placeholder="Email ID" type="email" name="email" id="buyer-login-email" required="">
                    <label for="buyer-login-email">Email ID</label>
                    <div class="icon">
                        <svg enable-background="new 0 0 100 100" version="1.1" viewBox="0 0 100 100" xml:space="preserve" xmlns="http://www.w3.org/2000/svg">
                            <g transform="translate(0 -952.36)">
                                <path d="m17.5 977c-1.3 0-2.4 1.1-2.4 2.4v45.9c0 1.3 1.1 2.4 2.4 2.4h64.9c1.3 0 2.4-1.1 2.4-2.4v-45.9c0-1.3-1.1-2.4-2.4-2.4h-64.9zm2.4 4.8h60.2v1.2l-30.1 22-30.1-22v-1.2zm0 7l28.7 21c0.8 0.6 2 0.6 2.8 0l28.7-21v34.1h-60.2v-34.1z" />
                            </g>
                            <rect class="st0" width="100" height="100" />
                        </svg>
                    </div>
                    <span id="error_buyer-login-email" class="text-danger"></span>
                </div>
                <div class="floating-label">
                    <input class="form-input" placeholder="Password" type="password" name="password" id="buyer-login-password" required="">
                    <label for="buyer-login-password">Password</label>
                    <div class="icon">
                        <svg enable-background="new 0 0 24 24" version="1.1" viewBox="0 0 24 24" xml:space="preserve" xmlns="http://www.w3.org/2000/svg">
                            <rect class="st0" width="24" height="24" />
                            <path class="st1" d="M19,21H5V9h14V21z M6,20h12V10H6V20z" />
                            <path class="st1" d="M16.5,10h-1V7c0-1.9-1.6-3.5-3.5-3.5S8.5,5.1,8.5,7v3h-1V7c0-2.5,2-4.5,4.5-4.5s4.5,2,4.5,4.5V10z" />
                            <path class="st1" d="m12 16.5c-0.8 0-1.5-0.7-1.5-1.5s0.7-1.5 1.5-1.5 1.5 0.7 1.5 1.5-0.7 1.5-1.5 1.5zm0-2c-0.3 0-0.5 0.2-0.5 0.5s0.2 0.5 0.5 0.5 0.5-0.2 0.5-0.5-0.2-0.5-0.5-0.5z" />
                        </svg>
                    </div>
                    <span id="error_buyer-login-password" class="text-danger"></span>
                </div>
                 <span id="error_msg" class="text-danger"></span>
                 <span id="sucess_login" class="text-success"></span>
                <button type="button" onclick="logins()" id='loginbtn'>Continue To Login</button>
                <div class="switch-btn">
                   <!--  <a href="javascript:void(0)" id="buyer-register-switch" class="discrete">Register as Seller</a> -->
                   <button type="button" id='buyer-register-switch' style="margin-left: -1%;">SIGN UP</button>
                    <a href="javascript:void(0)" id="buyer-forgot-switch" class="discrete forgot">Forgotten Password?</a>
                </div>
                <p class="mt-4 mb-0 mw-100 text-center">
                By proceeding, you agree to Allmetalika's <a href="<?=base_url()?>/privacy-policy" target="_blank">Privacy Policy</a>, User Agreement,and<a href="<?=base_url()?>/seller-terms-conditions" target="_blank"> T&Cs</a>.</p>
                <!-- <p class="mt-4 mb-0 mw-100 text-center">Continue to this website, you accept to our <a href="<?=base_url()?>/seller-terms-conditions" target="_blank">Terms of Conditions</a> and <a href="<?=base_url()?>/privacy-policy" target="_blank">Privacy Policy</a></p> -->
          </form>
            <form id="buyer-forgot" class="log-in signup-area" method="post">
                <h4>Seller Forgotten <span>Password</span></h4>
                <p>Provide your account's email for which you want to reset you password</p>
                <div class="floating-label">
                    <input class="form-input" placeholder="Enter Registered Email" type="text" name="email" id="buyer-forgot-email" required="">
                    <label for="buyer-forgot-email">Email ID</label>
                    <div class="icon">
                        <svg enable-background="new 0 0 100 100" version="1.1" viewBox="0 0 100 100" xml:space="preserve" xmlns="http://www.w3.org/2000/svg">
                            <g transform="translate(0 -952.36)">
                                <path d="m17.5 977c-1.3 0-2.4 1.1-2.4 2.4v45.9c0 1.3 1.1 2.4 2.4 2.4h64.9c1.3 0 2.4-1.1 2.4-2.4v-45.9c0-1.3-1.1-2.4-2.4-2.4h-64.9zm2.4 4.8h60.2v1.2l-30.1 22-30.1-22v-1.2zm0 7l28.7 21c0.8 0.6 2 0.6 2.8 0l28.7-21v34.1h-60.2v-34.1z" />
                            </g>
                            <rect class="st0" width="100" height="100" />
                        </svg>
                    </div>
                    <span id="error_forgote" class="text-danger"></span>
                </div>
                <div class="switch-btn border-none">
                    <a href="javascript:void(0)" id="buyer-forgot-to-login-switch" class="discrete">Back To Login</a>
                    <button type="button" onclick="
                    forgote()" id='forgotbtn'>Send OTP</button>
                </div>
            </form>
            <!-- otp secction -->
            <form id="buyer-otp-forgot" class="log-in signup-area" method="post">
                <h4>Verify Email <span>OTP</span></h4>
                <p>Provide your account's email for which you want to reset you password</p>

                <span id="success_otp" class="text-success"></span>
                <div class="floating-label">
                    <input class="form-input" placeholder="Enter Email OTP" type="number" name="email" id="otp-forgot">
                    <input class="form-input" type="hidden" name="mobile" id="buyer-otp-forgot-mobile">
                   <!--  <label for="otp-forgot">Enter OTP</label> -->
                    <div class="icon">
                        <svg enable-background="new 0 0 100 100" version="1.1" viewBox="0 0 100 100" xml:space="preserve" xmlns="http://www.w3.org/2000/svg">
                            <g transform="translate(0 -952.36)">
                                <path d="m17.5 977c-1.3 0-2.4 1.1-2.4 2.4v45.9c0 1.3 1.1 2.4 2.4 2.4h64.9c1.3 0 2.4-1.1 2.4-2.4v-45.9c0-1.3-1.1-2.4-2.4-2.4h-64.9zm2.4 4.8h60.2v1.2l-30.1 22-30.1-22v-1.2zm0 7l28.7 21c0.8 0.6 2 0.6 2.8 0l28.7-21v34.1h-60.2v-34.1z" />
                            </g>
                            <rect class="st0" width="100" height="100" />
                        </svg>
                    </div>
                    <span id="error_otp" class="text-danger"></span>
                </div>
                <p>after <span id="count">60</span> seconds</p>
                <div class="switch-btn border-none">
                    <button type="button" id="btnCounter" onclick="resend_otp()" class="btn btn-primary" disabled>Re-Send OTP</button>
                    <button type="button" onclick="
                    verify_forgot_email()" id="verifyotpmail">Verify</button>
                </div>
            </form>
            <!-- end otp section -->
            <!-- new password section -->
            <form id="buyer-new-password" class="log-in signup-area" method="post">
                <h4>Set New <span>Password</span></h4>
                <p></p>

                <span id="success_otp" class="text-success"></span>
                <div class="floating-label">
                    <input type="hidden" name="" id="user_id" >
                    <input class="form-input" placeholder="Enter New Password:" type="text" name="password" id="buyer-new-forgot" onkeyup="notblankpassword()">
                    <label for="buyer-new-forgot">Enter New Password</label>
                    <div class="icon">
                        <svg enable-background="new 0 0 100 100" version="1.1" viewBox="0 0 100 100" xml:space="preserve" xmlns="http://www.w3.org/2000/svg">
                            <g transform="translate(0 -952.36)">
                                <path d="m17.5 977c-1.3 0-2.4 1.1-2.4 2.4v45.9c0 1.3 1.1 2.4 2.4 2.4h64.9c1.3 0 2.4-1.1 2.4-2.4v-45.9c0-1.3-1.1-2.4-2.4-2.4h-64.9zm2.4 4.8h60.2v1.2l-30.1 22-30.1-22v-1.2zm0 7l28.7 21c0.8 0.6 2 0.6 2.8 0l28.7-21v34.1h-60.2v-34.1z" />
                            </g>
                            <rect class="st0" width="100" height="100" />
                        </svg>
                    </div>
                    <span id="error_new_pass" class="text-danger"></span>
                </div>
                 <div class="floating-label">
                    <input class="form-input" placeholder="Enter confirm Password:" type="text" name="password" id="buyer-confirm-forgot" onkeyup="confirnotblankpassword()">
                    <label for="buyer-confirm-forgot">Enter confirm Password</label>
                    <div class="icon">
                        <svg enable-background="new 0 0 100 100" version="1.1" viewBox="0 0 100 100" xml:space="preserve" xmlns="http://www.w3.org/2000/svg">
                            <g transform="translate(0 -952.36)">
                                <path d="m17.5 977c-1.3 0-2.4 1.1-2.4 2.4v45.9c0 1.3 1.1 2.4 2.4 2.4h64.9c1.3 0 2.4-1.1 2.4-2.4v-45.9c0-1.3-1.1-2.4-2.4-2.4h-64.9zm2.4 4.8h60.2v1.2l-30.1 22-30.1-22v-1.2zm0 7l28.7 21c0.8 0.6 2 0.6 2.8 0l28.7-21v34.1h-60.2v-34.1z" />
                            </g>
                            <rect class="st0" width="100" height="100" />
                        </svg>
                    </div>
                    <span id="error_confirm_forgot" class="text-danger"></span>
                </div>
                <div class="switch-btn border-none">
                   <!--  <a class="discrete" onclick="resend_otp()">Re-Send OTP</a> -->
                    <button type="button" onclick="
                    update_password()" id="confirm">Submit</button>
                </div>
            </form>
            <!-- end new password section -->

            <div id="buyer-register" class="log-in signup-area style-reg">
                <form id="msform">
                    <h4>Register as <span>Seller</span></h4>
                    <p class="text-left mw-100">Please Enter your personal details and start journey with us</p>
                    <span id="error_personal" class="text-danger"></span>
                    <!-- progressbar -->
                    <ul id="progressbar">
                        <li class="active mr-2">Personal Info</li>
                        <li class="mr-2 lisecond">Verify Mob OTP</li>
                        <li class="mr-2 liemail">Verify Email OTP</li>
                        <li class="mr-2 lithird">Business Details</li>
                         <li class="mr-2 liforth">Bank Details</li>
                    </ul>
                    <!-- fieldsets -->
                    <fieldset id="personal">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-xs-12">
                                <div class="floating-label">
                                    <input class="form-input" placeholder="Owner Name" type="text" name="name" id="buyer-reg-name" required="">
                                    <label for="buyer-reg-name">Owner Name</label>
                                    <div class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-person" viewBox="0 0 16 16">
                                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                                        </svg>
                                    </div>
                                </div>
                                <span id="error_buyer-reg-name" class="text-danger"></span>
                            </div>
                            <div class="col-lg-6 col-md-6 col-xs-12">
                                <div class="floating-label">
                                    <input class="form-input" placeholder="Email ID" type="email" name="email" id="buyer-reg-email" required="">
                                    <label for="buyer-reg-email">Email ID</label>
                                    <div class="icon">
                                        <svg enable-background="new 0 0 100 100" version="1.1" viewBox="0 0 100 100" xml:space="preserve" xmlns="http://www.w3.org/2000/svg">
                                            <g transform="translate(0 -952.36)">
                                                <path d="m17.5 977c-1.3 0-2.4 1.1-2.4 2.4v45.9c0 1.3 1.1 2.4 2.4 2.4h64.9c1.3 0 2.4-1.1 2.4-2.4v-45.9c0-1.3-1.1-2.4-2.4-2.4h-64.9zm2.4 4.8h60.2v1.2l-30.1 22-30.1-22v-1.2zm0 7l28.7 21c0.8 0.6 2 0.6 2.8 0l28.7-21v34.1h-60.2v-34.1z" />
                                            </g>
                                            <rect class="st0" width="100" height="100" />
                                        </svg>
                                    </div>
                                    <span id="error_buyer-reg-email" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-xs-12">
                                <div class="floating-label">
                                    <input class="form-input" placeholder="Mobile Number" type="number" name="phone" id="buyer-reg-phone" required="">
                                    <label for="buyer-reg-phone">Mobile Number</label>
                                    <div class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-phone" viewBox="0 0 19 19">
                                            <path d="M11 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h6zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H5z"/>
                                            <path d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                                        </svg>
                                    </div>
                                </div>
                                <span id="error_buyer-reg-phone" class="text-danger"></span>
                            </div>
                            <div class="col-lg-6 col-md-6 col-xs-12">
                                <div class="floating-label">
                                    <input class="form-input" placeholder="Landline (Optional)" type="number" name="landline" id="buyer-reg-landline" required="">
                                    <label for="buyer-reg-landline">Landline (Optional)</label>
                                    <div class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-telephone-plus" viewBox="0 0 20 20">
                                            <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                                            <path fill-rule="evenodd" d="M12.5 1a.5.5 0 0 1 .5.5V3h1.5a.5.5 0 0 1 0 1H13v1.5a.5.5 0 0 1-1 0V4h-1.5a.5.5 0 0 1 0-1H12V1.5a.5.5 0 0 1 .5-.5z"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-xs-12">
                                <div class="floating-label">
                                    <input class="form-input" placeholder="Password" type="password" name="password" id="buyer-reg-password" required="">
                                    <label for="buyer-reg-password">Password</label>
                                    <div class="icon">
                                        <svg enable-background="new 0 0 24 24" version="1.1" viewBox="0 0 24 24" xml:space="preserve" xmlns="http://www.w3.org/2000/svg">
                                            <rect class="st0" width="24" height="24" />
                                            <path class="st1" d="M19,21H5V9h14V21z M6,20h12V10H6V20z" />
                                            <path class="st1" d="M16.5,10h-1V7c0-1.9-1.6-3.5-3.5-3.5S8.5,5.1,8.5,7v3h-1V7c0-2.5,2-4.5,4.5-4.5s4.5,2,4.5,4.5V10z" />
                                            <path class="st1" d="m12 16.5c-0.8 0-1.5-0.7-1.5-1.5s0.7-1.5 1.5-1.5 1.5 0.7 1.5 1.5-0.7 1.5-1.5 1.5zm0-2c-0.3 0-0.5 0.2-0.5 0.5s0.2 0.5 0.5 0.5 0.5-0.2 0.5-0.5-0.2-0.5-0.5-0.5z" />
                                        </svg>
                                    </div>
                                </div>
                                <span id="error_buyer-reg-password" class="text-danger"></span>
                            </div>
                            <div class="col-lg-6 col-md-6 col-6 switch-btn border-none">
                                <!-- <a href="javascript:void(0)" id="buyer-login-switch" class="discrete reg">Login as Seller</a> -->
                            </div>
                        </div>
                        <input type="button" name="next" class="action-button" value="Next" onclick="personal_details()" />
                    </fieldset>
                    <!-- otp mobile verify  -->
                    <fieldset id="regiter_otp">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-xs-6">
                                <div class="floating-label">
                                    <input class="form-input" placeholder="Enter Mobile OTP" type="text" name="otp" id="buyer-reg-otp" required="">
                                    <label for="buyer-reg-otp">Mobile OTP</label>
                                    <div class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-person" viewBox="0 0 16 16">
                                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                                        </svg>
                                    </div>
                                </div>
                                <span id="error_buyer-reg-otp" class="text-danger"></span>
                            </div>
                            <div class="col-lg-6 col-md-6 col-6 switch-btn border-none">
                                <!-- <a href="javascript:void(0)" id="buyer-login-switch" class="discrete reg">Login as Seller</a> -->
                            </div>
                        </div>
                        <p>after <span id="countmobile">60</span> seconds</p>
                         <button type="button" class="btn btn-primary" onclick="resend_mobile_otp()" id="mobilebtn" disabled>Re-Send OTP</button>
                        <input type="button" name="next" class="action-button" onclick="verify_mobile()" value="Next" />
                       <!--  <input type="button" name="previous" class="previous action-button" value="Previous" /> -->
                    </fieldset>

                     <!-- otp Email verify  -->
                    <fieldset id="regiter_email">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-xs-6">
                                <div class="floating-label">
                                    <input class="form-input" placeholder="Enter Email OTP" type="text" name="otp" id="buyer-email-otp" required="">
                                    <label for="buyer-email-otp">Email OTP</label>
                                    <div class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-person" viewBox="0 0 16 16">
                                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                                        </svg>
                                    </div>
                                </div>
                                <span id="error_buyer-email-otp" class="text-danger"></span>
                            </div>
                            <div class="col-lg-6 col-md-6 col-6 switch-btn border-none">
                                <!-- <a href="javascript:void(0)" id="buyer-login-switch" class="discrete reg">Login as Buyer</a> -->
                            </div>
                        </div>
                         <p>after <span id="countemailregister">60</span> seconds</p>
                         <button type="button" class="btn btn-primary" id="emailrebtn" onclick="resend_register_email_otp()" disabled>Re-Send OTP</button>
                        <input type="button" name="next" class="action-button" onclick="verify_email()" value="Next" />
                       <!--  <input type="button" name="previous" class="previous action-button" value="Previous" /> -->
                    </fieldset>
                    <!-- Business Details-->
                    <fieldset id="business_details">
                        <span id="error_business_details" class="text-danger"></span>
                        <div class="row">
                            
                            <div class="col-lg-6 col-md-6 col-xs-12">
                                <div class="floating-label">
                                    <select class="form-input" name="type" id="buyer-reg-company-type" required="">
                                        <option selected="" disabled="">Company Type</option>
                                        <option value="Manufacturer">Manufacturer</option>
                                        <option value="Trader">Trader</option>
                                        <option value="Agent">Agent</option>
                                        <option value="End user">End user</option>
                                    </select>
                                    <div class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-briefcase" viewBox="0 0 16 16">
                                            <path d="M6.5 1A1.5 1.5 0 0 0 5 2.5V3H1.5A1.5 1.5 0 0 0 0 4.5v8A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-8A1.5 1.5 0 0 0 14.5 3H11v-.5A1.5 1.5 0 0 0 9.5 1h-3zm0 1h3a.5.5 0 0 1 .5.5V3H6v-.5a.5.5 0 0 1 .5-.5zm1.886 6.914L15 7.151V12.5a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5V7.15l6.614 1.764a1.5 1.5 0 0 0 .772 0zM1.5 4h13a.5.5 0 0 1 .5.5v1.616L8.129 7.948a.5.5 0 0 1-.258 0L1 6.116V4.5a.5.5 0 0 1 .5-.5z"/>
                                        </svg>
                                    </div>
                                </div>
                                <span id="error_buyer-reg-company-type" class="text-danger"></span>
                            </div>
                            <div class="col-lg-6 col-md-6 col-xs-12">
                                <div class="floating-label">
                                    <textarea class="form-input" placeholder="Office Address" type="text" name="address" id="buyer-reg-office-address" required=""></textarea>
                                    <label for="buyer-reg-office-address">Office Address</label>
                                    <div class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-geo-alt" viewBox="0 0 16 16">
                                            <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
                                            <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                        </svg>
                                    </div>
                                </div>
                                <span id="error_buyer-reg-office-address" class="text-danger"></span>
                            </div>
                            <div class="col-lg-6 col-md-6 col-xs-12">
                                <div class="floating-label">
                                    <textarea class="form-input" placeholder="Factory / Warehouse Address" type="text" name="address" id="buyer-reg-factory-address" required=""></textarea>
                                    <label for="buyer-reg-factory-address">Factory / Warehouse Address</label>
                                    <div class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-house-door" viewBox="0 0 16 16">
                                            <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z"/>
                                        </svg>
                                    </div>
                                </div>
                                <span id="error_buyer-reg-factory-address" class="text-danger"></span>
                            </div>
                             <div class="col-lg-6 col-md-6 col-xs-12">
                                <div class="floating-label">
                                    <!-- <input class="form-input" placeholder="State" type="text" name="state" id="buyer-reg-state" required=""> -->
                                    <select class="form-control form-control-select2" name="state" name="state" required="" id="buyer-reg-state">
                                        <option value="" selected>Select State</option>
                                       <?php foreach($state as $st){?>
                                            <option value="<?=$st?>"><?=$st?>
                                            </option>
                                        <?php }?>
                                    </select>
                                    <label for="buyer-reg-state">State</label>
                                    <div class="icon">
                                       <!--  <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-map" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M15.817.113A.5.5 0 0 1 16 .5v14a.5.5 0 0 1-.402.49l-5 1a.502.502 0 0 1-.196 0L5.5 15.01l-4.902.98A.5.5 0 0 1 0 15.5v-14a.5.5 0 0 1 .402-.49l5-1a.5.5 0 0 1 .196 0L10.5.99l4.902-.98a.5.5 0 0 1 .415.103zM10 1.91l-4-.8v12.98l4 .8V1.91zm1 12.98 4-.8V1.11l-4 .8v12.98zm-6-.8V1.11l-4 .8v12.98l4-.8z"/>
                                        </svg> -->
                                    </div>
                                </div>
                                <span id="error_buyer-reg-state" class="text-danger"></span>
                            </div>
                            <div class="col-lg-6 col-md-6 col-xs-12">
                                <div class="floating-label">
                                    <input class="form-input" placeholder="City" type="text" name="city" id="buyer-reg-city" required="">
                                    <label for="buyer-reg-city">City</label>
                                    <div class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-map" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M15.817.113A.5.5 0 0 1 16 .5v14a.5.5 0 0 1-.402.49l-5 1a.502.502 0 0 1-.196 0L5.5 15.01l-4.902.98A.5.5 0 0 1 0 15.5v-14a.5.5 0 0 1 .402-.49l5-1a.5.5 0 0 1 .196 0L10.5.99l4.902-.98a.5.5 0 0 1 .415.103zM10 1.91l-4-.8v12.98l4 .8V1.91zm1 12.98 4-.8V1.11l-4 .8v12.98zm-6-.8V1.11l-4 .8v12.98l4-.8z"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-xs-12">
                                <div class="floating-label">
                                    <input class="form-input" placeholder="Pincode" type="number" name="pincode" id="buyer-reg-pincode" required="">
                                    <label for="buyer-reg-pincode">Pincode</label>
                                    <div class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-pin-map" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M3.1 11.2a.5.5 0 0 1 .4-.2H6a.5.5 0 0 1 0 1H3.75L1.5 15h13l-2.25-3H10a.5.5 0 0 1 0-1h2.5a.5.5 0 0 1 .4.2l3 4a.5.5 0 0 1-.4.8H.5a.5.5 0 0 1-.4-.8l3-4z"/>
                                            <path fill-rule="evenodd" d="M8 1a3 3 0 1 0 0 6 3 3 0 0 0 0-6zM4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999z"/>
                                        </svg>
                                    </div>
                                </div>
                                <span id="error_buyer-reg-pincode" class="text-danger"></span>
                            </div>
                            <div class="col-lg-6 col-md-6 col-xs-12">
                                <div class="floating-label">
                                    <input class="form-input" placeholder="GST Number" type="text" name="gst" id="buyer-reg-gst" onkeyup="verify_gst()">
                                    <label for="buyer-reg-gst">GST Number</label>
                                    <div class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-file-earmark-medical" viewBox="0 0 16 16">
                                            <path d="M7.5 5.5a.5.5 0 0 0-1 0v.634l-.549-.317a.5.5 0 1 0-.5.866L6 7l-.549.317a.5.5 0 1 0 .5.866l.549-.317V8.5a.5.5 0 1 0 1 0v-.634l.549.317a.5.5 0 1 0 .5-.866L8 7l.549-.317a.5.5 0 1 0-.5-.866l-.549.317V5.5zm-2 4.5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zm0 2a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5z"/>
                                            <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/>
                                        </svg>
                                    </div>
                                </div>
                                <span id="error_buyer-reg-gst" class="text-danger"></span>
                            </div>
                            <div class="col-lg-6 col-md-6 col-xs-12">
                                <div class="floating-label">
                                    <input class="form-input" placeholder="PAN Number" type="text" name="pan" id="buyer-reg-pan" readonly>
                                    <label for="buyer-reg-pan">PAN Number</label>
                                    <div class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-file-earmark-medical" viewBox="0 0 16 16">
                                            <path d="M7.5 5.5a.5.5 0 0 0-1 0v.634l-.549-.317a.5.5 0 1 0-.5.866L6 7l-.549.317a.5.5 0 1 0 .5.866l.549-.317V8.5a.5.5 0 1 0 1 0v-.634l.549.317a.5.5 0 1 0 .5-.866L8 7l.549-.317a.5.5 0 1 0-.5-.866l-.549.317V5.5zm-2 4.5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zm0 2a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5z"/>
                                            <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/>
                                        </svg>
                                    </div>
                                </div>
                                <span id="error_buyer-reg-pan" class="text-danger"></span>
                            </div>
                            <div class="col-lg-6 col-md-6 col-xs-12">
                                <div class="floating-label">
                                    <input class="form-input" placeholder="Comapny Name" type="hidden" name="name" id="buyer-reg-userid" required="">
                                    <input class="form-input" placeholder="Comapny Name" type="text" name="name" id="buyer-reg-company-name" required="" readonly>
                                    <label for="buyer-reg-company-name">Comapny Name</label>
                                    <div class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-building" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022zM6 8.694 1 10.36V15h5V8.694zM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5V15z"/>
                                            <path d="M2 11h1v1H2v-1zm2 0h1v1H4v-1zm-2 2h1v1H2v-1zm2 0h1v1H4v-1zm4-4h1v1H8V9zm2 0h1v1h-1V9zm-2 2h1v1H8v-1zm2 0h1v1h-1v-1zm2-2h1v1h-1V9zm0 2h1v1h-1v-1zM8 7h1v1H8V7zm2 0h1v1h-1V7zm2 0h1v1h-1V7zM8 5h1v1H8V5zm2 0h1v1h-1V5zm2 0h1v1h-1V5zm0-2h1v1h-1V3z"/>
                                        </svg>
                                    </div>
                                </div>
                                <span id="error_buyer-reg-company-name" class="text-danger"></span>
                            </div>
                            <div class="col-lg-6 col-md-6 col-xs-12">
                                <div class="floating-label">
                                    <input class="form-input" placeholder="Website (Optional)" type="text" name="website" id="buyer-reg-website">
                                    <label for="buyer-reg-website">Website (Optional)</label>
                                    <div class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-display" viewBox="0 0 16 16">
                                            <path d="M0 4s0-2 2-2h12s2 0 2 2v6s0 2-2 2h-4c0 .667.083 1.167.25 1.5H11a.5.5 0 0 1 0 1H5a.5.5 0 0 1 0-1h.75c.167-.333.25-.833.25-1.5H2s-2 0-2-2V4zm1.398-.855a.758.758 0 0 0-.254.302A1.46 1.46 0 0 0 1 4.01V10c0 .325.078.502.145.602.07.105.17.188.302.254a1.464 1.464 0 0 0 .538.143L2.01 11H14c.325 0 .502-.078.602-.145a.758.758 0 0 0 .254-.302 1.464 1.464 0 0 0 .143-.538L15 9.99V4c0-.325-.078-.502-.145-.602a.757.757 0 0 0-.302-.254A1.46 1.46 0 0 0 13.99 3H2c-.325 0-.502.078-.602.145z"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-xs-12">
                                <div class="floating-label">
                                    <p class="mw-100 mt-3 mb-4" style="width: 100%;">
                                        <input type="checkbox" name="website" id="buyer-reg-check-term" placeholder=""> &nbsp;Continue to this website, you accept to our <a href="<?=base_url()?>/buyer-terms-conditions" target="_blank">Terms of Conditions</a> and <a href="<?=base_url()?>/privacy-policy" target="_blank">Privacy Policy</a>
                                    </p>
                                     <!-- <p class="mw-100"><input type="checkbox" name="website" id="buyer-reg-check-term" placeholder="Check Term">Continue to this website, you accept to our <a href="<?=base_url()?>/buyer-terms-conditions" target="_blank">Terms of Conditions</a> and <a href="<?=base_url()?>/privacy-policy" target="_blank">Privacy Policy</a></p> -->

                                    <!-- <label for="buyer-reg-check-term">Check Term</label> -->
                                    <div class="icon">
                                        <!-- <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-display" viewBox="0 0 16 16">
                                            <path d="M0 4s0-2 2-2h12s2 0 2 2v6s0 2-2 2h-4c0 .667.083 1.167.25 1.5H11a.5.5 0 0 1 0 1H5a.5.5 0 0 1 0-1h.75c.167-.333.25-.833.25-1.5H2s-2 0-2-2V4zm1.398-.855a.758.758 0 0 0-.254.302A1.46 1.46 0 0 0 1 4.01V10c0 .325.078.502.145.602.07.105.17.188.302.254a1.464 1.464 0 0 0 .538.143L2.01 11H14c.325 0 .502-.078.602-.145a.758.758 0 0 0 .254-.302 1.464 1.464 0 0 0 .143-.538L15 9.99V4c0-.325-.078-.502-.145-.602a.757.757 0 0 0-.302-.254A1.46 1.46 0 0 0 13.99 3H2c-.325 0-.502.078-.602.145z"/>
                                        </svg> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-6 switch-btn border-none">
                                <!-- <a href="javascript:void(0)" id="buyer-login-switch" class="discrete reg">Login as Seller</a> -->
                            </div>
                        </div>
                        <input type="button" name="next" class="action-button" onclick="business_detailsd()" value="Next" />
                        <input type="button" name="previous" class="previous action-button" value="Previous" />  
                    </fieldset>
                    <!-- end business details -->
                    <!-- bank details -->
                    <fieldset id="bank_details">
                        <span id="error_bank_details" class="text-danger"></span>
                        <span id="sucess_registration" class="text-success"></span>
                        <div class="row">
                            
                            <div class="col-lg-6 col-md-6 col-xs-12">
                                <div class="floating-label">
                                    <input class="form-input" placeholder="Account Holder Name" type="text" name="name" id="ac_name" required="">
                                    <label for="ac_name">Account Holder Name</label>
                                    <div class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-building" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022zM6 8.694 1 10.36V15h5V8.694zM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5V15z"/>
                                            <path d="M2 11h1v1H2v-1zm2 0h1v1H4v-1zm-2 2h1v1H2v-1zm2 0h1v1H4v-1zm4-4h1v1H8V9zm2 0h1v1h-1V9zm-2 2h1v1H8v-1zm2 0h1v1h-1v-1zm2-2h1v1h-1V9zm0 2h1v1h-1v-1zM8 7h1v1H8V7zm2 0h1v1h-1V7zm2 0h1v1h-1V7zM8 5h1v1H8V5zm2 0h1v1h-1V5zm2 0h1v1h-1V5zm0-2h1v1h-1V3z"/>
                                        </svg>
                                    </div>
                                </div>
                                <span id="error_ac_name" class="text-danger"></span>
                            </div>
                            <div class="col-lg-6 col-md-6 col-xs-12">
                                <div class="floating-label">
                                    <input class="form-input" placeholder="Account Number" type="number" name="ac_number" id="ac_number" required="">
                                    <label for="ac_number">Account  Number</label>
                                    <div class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-geo-alt" viewBox="0 0 16 16">
                                            <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
                                            <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                        </svg>
                                    </div>
                                </div>
                                <span id="error_ac_number" class="text-danger"></span>
                            </div>
                            <div class="col-lg-4 col-md-6 col-xs-12">
                                <div class="floating-label">
                                    <input class="form-input" placeholder="Bank Name" type="text" name="Bank name" id="ac_bank_name" required="">
                                    <label for="ac_bank_name">Bank Name</label>
                                    <div class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-map" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M15.817.113A.5.5 0 0 1 16 .5v14a.5.5 0 0 1-.402.49l-5 1a.502.502 0 0 1-.196 0L5.5 15.01l-4.902.98A.5.5 0 0 1 0 15.5v-14a.5.5 0 0 1 .402-.49l5-1a.5.5 0 0 1 .196 0L10.5.99l4.902-.98a.5.5 0 0 1 .415.103zM10 1.91l-4-.8v12.98l4 .8V1.91zm1 12.98 4-.8V1.11l-4 .8v12.98zm-6-.8V1.11l-4 .8v12.98l4-.8z"/>
                                        </svg>
                                    </div>
                                </div>
                                <span id="error_ac_bank_name" class="text-danger"></span>
                            </div>
                            <div class="col-lg-4 col-md-6 col-xs-12">
                                <div class="floating-label">
                                    <input class="form-input" placeholder="Branch Name" type="text" name="Branch name" id="branch_name" required="">
                                    <label for="branch_name">Branch Name</label>
                                    <div class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-map" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M15.817.113A.5.5 0 0 1 16 .5v14a.5.5 0 0 1-.402.49l-5 1a.502.502 0 0 1-.196 0L5.5 15.01l-4.902.98A.5.5 0 0 1 0 15.5v-14a.5.5 0 0 1 .402-.49l5-1a.5.5 0 0 1 .196 0L10.5.99l4.902-.98a.5.5 0 0 1 .415.103zM10 1.91l-4-.8v12.98l4 .8V1.91zm1 12.98 4-.8V1.11l-4 .8v12.98zm-6-.8V1.11l-4 .8v12.98l4-.8z"/>
                                        </svg>
                                    </div>
                                </div>
                                <span id="error_branch_name" class="text-danger"></span>
                            </div>
                            <div class="col-lg-4 col-md-6 col-xs-12">
                                <div class="floating-label">
                                    <input class="form-input" placeholder="IFCS Code" type="text" name="Ifcs Code" id="ac_ifcs" required="">
                                    <label for="ac_ifcs">IFCS Code</label>
                                    <div class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-pin-map" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M3.1 11.2a.5.5 0 0 1 .4-.2H6a.5.5 0 0 1 0 1H3.75L1.5 15h13l-2.25-3H10a.5.5 0 0 1 0-1h2.5a.5.5 0 0 1 .4.2l3 4a.5.5 0 0 1-.4.8H.5a.5.5 0 0 1-.4-.8l3-4z"/>
                                            <path fill-rule="evenodd" d="M8 1a3 3 0 1 0 0 6 3 3 0 0 0 0-6zM4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999z"/>
                                        </svg>
                                    </div>
                                </div>
                                <span id="error_ac_ifcs" class="text-danger"></span>
                            </div>
                            <div class="col-lg-6 col-md-6 col-xs-12">
                                <div class="floating-label">
                                    <input class="form-input" placeholder="UPI Id (Optional)" type="text" name="gst" id="upi_id">
                                    <label for="upi_id">UPI Id (Optional)</label>
                                    <div class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-file-earmark-medical" viewBox="0 0 16 16">
                                            <path d="M7.5 5.5a.5.5 0 0 0-1 0v.634l-.549-.317a.5.5 0 1 0-.5.866L6 7l-.549.317a.5.5 0 1 0 .5.866l.549-.317V8.5a.5.5 0 1 0 1 0v-.634l.549.317a.5.5 0 1 0 .5-.866L8 7l.549-.317a.5.5 0 1 0-.5-.866l-.549.317V5.5zm-2 4.5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zm0 2a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5z"/>
                                            <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/>
                                        </svg>
                                    </div>
                                </div>
                                <span id="error_upi_id" class="text-danger"></span>
                            </div>
                            <div class="col-lg-6 col-md-6 col-6 switch-btn border-none">
                                <a href="javascript:void(0)" id="buyer-login-switch" class="discrete reg">Login as Seller</a>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-xs-12 mt-5" style="float: right;">
                        
                       <!--  <input type="button" name="submit" class="action-button" onclick="bank_details()" value="Submit" /> -->
                         <input type="button" name="final" class="action-button" onclick="bank_detailsd()" value="Submit">
                         <input type="button" name="previous" class="previous action-button" value="Previous" />
                     </div>
                    </fieldset>
                    <!-- end bank details -->
                    <!-- <p class="mt-4 mb-0 mw-100 text-center">Continue to this website, you accept to our <a href="<?=base_url()?>/seller-terms-conditions" target="_blank">Terms of Conditions</a> and <a href="<?=base_url()?>/privacy-policy" target="_blank">Privacy Policy</a></p> -->
          
              </form>
            </div>
        </div>
    </div>
    <div class="block-space block-space--layout--before-footer"></div>
</div>
<!-- site__body / end -->
<script>
    function checkblank(id,typeoferror) 
    {
        let pw1 = $('#'+id).val();    
      if(pw1=='')  
      {   
        $('#error_'+id).html('The '+typeoferror+' field is Required');
        return false;
      } 
      else 
      {  
       $('#error_'+id).html('');
       return true;
      }  
    }
    function verify_gst() 
    {
        let gst_no=$('#buyer-reg-gst').val();
        if(gst_no.length>=15)
        {
            $.ajax({
            type: 'post',
            url: '<?=base_url()?>/Welcome/verify_gst',
            dataType: "json",
            data: {gst_no:gst_no},
            success: function (data) 
            {
                debugger;
                if(data.error==true)
                {
                   var text=data.message;
                   text.replace("\n", "<br>");
                    $('#buyer-reg-gst').html(text);
                }
                else
                {
                    let newobj=data.taxpayerInfo;
                    let pan_no=newobj.panNo;
                    let company_name;
                    if(newobj.tradeNam)
                    {
                        company_name=newobj.tradeNam;
                    }
                    else
                    {
                        company_name=newobj.lgnm;
                    }
                    
                    $('#buyer-reg-company-name').val(company_name);
                    $('#buyer-reg-pan').val(pan_no);
                }
            }
            });
        }
    }

    function bank_detailsd()
    {
        let ac_name=$('#ac_name').val();
        let ac_number=$('#ac_number').val();
        let ac_bank_name=$('#ac_bank_name').val();
        let ac_ifcs=$('#ac_ifcs').val();
        let upi_id=$('#upi_id').val();
        let branch_name=$('#branch_name').val();
        let user_id=$('#buyer-reg-userid').val();
        if(checkblank('ac_name','Account name') && checkblank('ac_number','Account Number') && checkblank('ac_bank_name','Bank name') && checkblank('ac_ifcs','Ifcs Code') && checkblank('branch_name','Branch name'))
        {
            $.ajax({
            type: 'post',
            url: '<?=base_url()?>/Welcome/saller_array',
            dataType: "json",
            data: {ac_name:ac_name,ac_number:ac_number,ac_bank_name:ac_bank_name,ac_ifcs:ac_ifcs,upi_id:upi_id,branch_name:branch_name,user_id:user_id,posturl:'bank_details'},
            beforeSend: function() 
            {
                $("#loginbtn").css("visibility:none");
            },
            success: function (data) 
            {
                if(data.status==false)
                {
                   var text=data.message;
                   text.replace("\n", "<br>");
                    $('#error_bank_details').html(text);
                }
                else
                {
                    //window.location.href = "buyer_login";
                    $('#sucess_registration').html('Registration Successfully');
                        // window.location.href = "buyer/dashboard";
                         setTimeout(function() {
                          window.location.href = "login-seller";
                        },2000);
                }
            }
            });

        }             
    }


    
    function business_detailsd()
    {

        let company_name=$('#buyer-reg-company-name').val();
        let company_type=$('#buyer-reg-company-type').val();
        let office_address=$('#buyer-reg-office-address').val();
        let factory_address=$('#buyer-reg-factory-address').val();
        let city=$('#buyer-reg-city').val();
        let state=$('#buyer-reg-state').val();
        let area_pincode=$('#buyer-reg-pincode').val();
        let gst_no=$('#buyer-reg-gst').val();
        let pan_no=$('#buyer-reg-pan').val();
        let website=$('#buyer-reg-website').val();
        let check_term=$('#buyer-reg-check-term').val();
        let user_id=$('#buyer-reg-userid').val();
        checkblank('buyer-reg-company-name','Company Name');
        checkblank('buyer-reg-company-type','Type of Company');
        checkblank('buyer-reg-office-address','Office address');
        checkblank('buyer-reg-factory-address','Factory address');
        checkblank('buyer-reg-city','City');
        checkblank('buyer-reg-pincode','pincode');
        checkblank('buyer-reg-state','State');
        checkblank('buyer-reg-gst','GST Number');
        checkblank('buyer-reg-pan','PAN Number');
        debugger;
            $.ajax({
            type: 'post',
            url: '<?=base_url()?>/Welcome/saller_array',
            dataType: "json",
            data: {company_name:company_name,company_type:company_type,office_address:office_address,factory_address:factory_address,city:city,state:state,area_pincode:area_pincode,pan_no:pan_no,check_term:check_term,website:website,user_id:user_id,gst_no:gst_no,posturl:'business_details'},
            beforeSend: function() 
            {
                $("#loginbtn").css("visibility:none");
            },
            success: function (data) 
            {
                debugger;
                if(data.status==false)
                {
                   var text=data.message;
                   text.replace("\n", "<br>");
                    $('#error_business_details').html(text);
                }
                else
                {
                    $('#personal').hide();
                    $('#business_details').hide();
                    $('#bank_details').show();
                    $(".liforth").addClass("active");
                }
            }
            });      
    }

    function verify_email()
    {
        let otp=$('#buyer-email-otp').val();
      let email=$('#buyer-reg-email').val();
        checkblank('buyer-email-otp','OTP');
            $.ajax({
            type: 'post',
            url: '<?=base_url()?>/Welcome/saller_array',
            dataType: "json",
            data: {otp:otp,email:email,posturl:'email_verify'},
            beforeSend: function() 
            {
                $("#loginbtn").css("visibility:none");
            },
            success: function (data) 
            {
                if(data.Success==false)
                {
                   var text=data.Message;
                   text.replace("\n", "<br>");
                    $('#error_buyer-email-otp').html(text);
                }
                else
                {
                    var regg=data.UserDetails;
                    $('#personal').hide();
                    $('#regiter_otp').hide();
                    $('#regiter_email').hide();
                    $('#buyer-reg-userid').val(regg.seller_id);
                    $('#business_details').show();
                    $(".lithird").addClass("active");
                }
            }
            });       
    }
    function verify_mobile()
    {
        let otp=$('#buyer-reg-otp').val();
      	let mobile= $('#buyer-reg-phone').val();
        checkblank('buyer-reg-otp','OTP');
            $.ajax({
            type: 'post',
            url: '<?=base_url()?>/Welcome/saller_array',
            dataType: "json",
            data: {otp:otp,mobile:mobile,posturl:'verify_otp'},
            beforeSend: function() 
            {
                $("#loginbtn").css("visibility:none");
            },
            success: function (data) 
            {
                clockme();
                if(data.Success==false)
                {
                   var text=data.Message;
                   text.replace("\n", "<br>");
                    $('#error_buyer-reg-otp').html(text);
                }
                else
                {
                    $('#personal').hide();
                    $('#regiter_otp').hide();
                    $('#regiter_email').show();
                    $(".liemail").addClass("active");
                }
            }
            });       
    }
    function personal_details()
    {
        let full_name=$('#buyer-reg-name').val();
        let email_id=$('#buyer-reg-email').val();
        let mobile_no=$('#buyer-reg-phone').val();
        let landline=$('#buyer-reg-landline').val();
        let password=$('#buyer-reg-password').val();
        checkblank('buyer-reg-name','Name');
        checkblank('buyer-reg-phone','Mobile'); 
        checkblank('buyer-reg-password','Password');
        checkblank('buyer-reg-email','Email');
        if(ValidateEmail(email_id) && checkblank('buyer-reg-name','Name') && checkblank('buyer-reg-phone','Mobile') && checkblank('buyer-reg-password','Password') && checkblank('buyer-reg-email','Email'))
        {
            $.ajax({
            type: 'post',
            url: '<?=base_url()?>/Welcome/saller_array',
            dataType: "json",
            data: {full_name:full_name,email_id:email_id,mobile_no:mobile_no,password:password,posturl:'personal_details'},
            beforeSend: function() 
            {
                $("#loginbtn").css("visibility:none");
            },
            success: function (data) 
            {
                clockm();
                if(data.status==false)
                {
                   var text=data.message;
                   text.replace("\n", "<br>");
                    $('#error_personal').html(text);
                }
                else
                {
                    $('#personal').hide();
                    $('#error_personal').hide();
                    $('#regiter_otp').show();
                    $(".lisecond").addClass("active");
                }
            }
            });
        }
        else
        {
            $('#error_buyer-reg-email').html('Please Enter Valid Email Address');
            return false;
        }       
    }
    function logins()
    {
        var email=$('#buyer-login-email').val();
        var password=$('#buyer-login-password').val();
        if(checkblank('buyer-login-email','Email') && checkblank('buyer-login-password','Password'))
        {
            
            $.ajax({
                type: 'post',
                url: '<?=base_url()?>/Welcome/seller_logins',
                dataType: "json",
                data: {email_id:email,password:password},
                beforeSend: function() 
                {
                     $("#loginbtn").disabled = true; 
                    $('#loginbtn').html('Processing....');
                },
                success: function (data) 
                {
                    if(data.Success==false)
                    {
                        $("#loginbtn").disabled = false; 
                        $('#loginbtn').html('Continue To Login');
                        $('#error_msg').html(data.Message);
                    }
                    else
                    {
                        //window.location.href = "seller/dashboard";
                         //$('#sucess_login').html('Login Successfully');
                        // window.location.href = "buyer/dashboard";
                        setTimeout(function() {
                          window.location.href = "seller/dashboard";
                        }, 2000);
                    }
                    //debugger;

                   
                }
              });
        }
        // else
        // {
        //     $('#error_email').html('Please Enter Valide Email Address');
        // }   
    }
    function forgote()
    {
        let email=$('#buyer-forgot-email').val();
        $.ajax({
            type: 'post',
            url: '<?=base_url()?>/Welcome/saller_array',
            dataType: "json",
            data: {email:email,posturl:'forgot_password'},
            beforeSend: function() 
            {
                $("#forgotbtn").disabled = true; 
                $('#forgotbtn').html('Processing....');
            },
            success: function (data) 
            {
                clock();
                 //console.log(data.Success);
                if(data.Success==false)
                {
                    //debugger;
                    console.log(data.Message);
                    $('#error_forgote').html(data.Message);
                    $("#forgotbtn").disabled = false; 
                    $('#forgotbtn').html('Send OTP');
                }
                else
                {
                    $('#buyer-forgot').hide();
                    $('#buyer-otp-forgot-mobile').val(email);
                    $('#buyer-otp-forgot').show();
                }
                //debugger;

               
            }
          });
    }   
    function resend_otp()
    {
         var btn=document.getElementById("btnCounter");
      //btn.removeAttribute("disabled");
      btn.disabled = true;
      clock();
        let email=$('#buyer-forgot-email').val();
        $.ajax({
            type: 'post',
            url: '<?=base_url()?>/Welcome/saller_array',
            dataType: "json",
            data: {email:email,posturl:'resend_email_otp'},
            beforeSend: function() 
            {
                $("#loginbtn").css("visibility:none");
            },
            success: function (data) 
            {
                if(data.Success==false)
                {
                    $('#error_forgote').html(data.Message);
                }
                else
                {
                     $('#success_otp').html(data.Message);
                }

               
            }
          });
    } 

    function otp_verify()
    {
        let otp=$('#otp-forgot').val();
        $.ajax({
            type: 'post',
            url: '<?=base_url()?>/Welcome/saller_array',
            dataType: "json",
            data: {otp:otp,posturl:'verify_otp'},
            beforeSend: function() 
            {
                $("#verifyotpmail").disabled = true; 
                $('#verifyotpmail').html('Processing....');
            },
            success: function (data) 
            {
                //console.log()
                if(data.Success==false)
                {
                    $('#error_otp').html(data.Message);
                    $("#verifyotpmail").disabled = false; 
                    $('#verifyotpmail').html('Verify');
                }
                else
                {
                    var main=data.UserDetails;
                    //console.log(main.seller_id);
                    $('#buyer-otp-forgot').hide();
                    $('#user_id').val(main.seller_id)
                    $('#buyer-new-password').show();
                     //$('#success_otp').html(data.Message);
                }

               
            }
          });
    } 


    function match_password() 
    {  
      var pw1 = $('#buyer-new-forgot').val();  
      var pw2 = $('#buyer-confirm-forgot').val();  
      if(pw1 != pw2)  
      {   
        return false;
      } 
      else 
      {  
       return true;  
      }  
    }

    function notblankpassword() 
    {  
      let pw1 = $('#buyer-new-forgot').val();    
      if(pw1=='')  
      {   
        $('#error_new_pass').html('Password is Required');
        return false;
      } 
      else 
      {  
       $('#error_new_pass').html('');
       return true;
      }  
    }  

    function confirnotblankpassword() 
    {  
      let pw1 = $('#buyer-confirm-forgot').val();    
      if(pw1=='')  
      {   
        $('#error_confirm_forgot').html('Confirm Password is Required');
        return false;
      } 
      else 
      {  
        $('#error_confirm_forgot').html('');
       return true;  
      }  
    }  

    function update_password()
    {
        let password=$('#buyer-new-forgot').val();
        let confirm_password=$('#buyer-confirm-forgot').val();
        let user_id=$('#user_id').val();
        confirnotblankpassword();
        notblankpassword();
        if(match_password())
        {
            $.ajax({
            type: 'post',
            url: '<?=base_url()?>/Welcome/saller_array',
            dataType: "json",
            data: {user_id:user_id,password:password,confirm_password:confirm_password,posturl:'new_password'},
            beforeSend: function() 
            {
                $("#loginbtn").css("visibility:none");
            },
            success: function (data) 
            {
                if(data.Success==false)
                {
                    $('#error_otp').html(data.Message);
                }
                else
                {
                    window.location.href = "buyer_login";
                }

               
            }
          });
        }
        else
        {
            $('#error_confirm_forgot').html('Password And Confirm Password is Not match');
        }  
    }   
function ValidateEmail(inputText)
{
var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if(inputText.match(mailformat))
    {
        return true;
    }
    else
    {
        return false;
    }
}

</script>

<script type="text/javascript">
    //clock();
    var myTimer;
    var btn1=document.getElementById("btnCounter");
   function clock() {
     myTimer = setInterval(myClock, 1000);
     var c = 60;

     function myClock() {
       document.getElementById("count").innerHTML = --c;
       if (c == 0) {
         clearInterval(myTimer);
         //alert("Reached zero");
          btn1.removeAttribute("disabled");
       }
     }
   }
</script>

<script type="text/javascript">
    //clock();
    var myTimerm;
    var btn=document.getElementById("mobilebtn");
   function clockm() {
     myTimerm = setInterval(myClockm, 1000);
     var c1 = 60;

     function myClockm() {
       document.getElementById("countmobile").innerHTML = --c1;
       if (c1 == 0) {
         clearInterval(myTimerm);
         //alert("Reached zero");
          btn.removeAttribute("disabled");
       }
     }
   }
</script>


<script type="text/javascript">
    //clock();
    var myTimerme;
    var btne=document.getElementById("emailrebtn");
   function clockme() {
     myTimerme = setInterval(myClockme, 1000);
     var c12 = 60;

     function myClockme() {
       document.getElementById("countemailregister").innerHTML = --c12;
       if (c12 == 0) {
         clearInterval(myTimerme);
         //alert("Reached zero");
          btne.removeAttribute("disabled");
       }
     }
   }
</script>
<script>
    function resend_register_email_otp()
    {
      debugger;
      let btn=document.getElementById("emailrebtn");
      //btn.removeAttribute("disabled");
      btn.disabled = true;
      clockme();
        let email=$('#buyer-reg-email').val();
        $.ajax({
            type: 'post',
            url: '<?=base_url()?>/Welcome/saller_array',
            dataType: "json",
            data: {email:email,posturl:'resend_email_otp'},
            success: function (data) 
            {
                if(data.Success==false)
                {
                    $('#error_forgote').html(data.Message);
                }
                else
                {
                     $('#success_otp').html(data.Message);
                }

               
            }
          });
    } 

</script>
<script type="text/javascript">
    function verify_forgot_email()
    {
        let otp=$('#otp-forgot').val();
      let email=$('#buyer-forgot-email').val();
        $.ajax({
            type: 'post',
            url: '<?=base_url()?>/Welcome/saller_array',
            dataType: "json",
            data: {otp:otp,email:email,posturl:'email_verify'},
            beforeSend: function() 
            {
                $("#verifyotpmail").disabled = true; 
                $('#verifyotpmail').html('Processing....');
            },
            success: function (data) 
            {
                //console.log()
                if(data.Success==false)
                {
                    $('#error_otp').html(data.Message);
                    $("#verifyotpmail").disabled = false; 
                    $('#verifyotpmail').html('Verify');
                }
                else
                {
                    var main=data.UserDetails;
                    //console.log(main.buyer_id);
                    $('#buyer-otp-forgot').hide();
                    $('#user_id').val(main.buyer_id)
                    $('#buyer-new-password').show();
                     //$('#success_otp').html(data.Message);
                }

               
            }
          });
    } 


    function resend_mobile_otp()
    {
      debugger;
      let btn=document.getElementById("mobilebtn");
      //btn.removeAttribute("disabled");
      btn.disabled = true;
      clockm();
        let email=$('#buyer-reg-phone').val();
        $.ajax({
            type: 'post',
            url: '<?=base_url()?>/Welcome/saller_array',
            dataType: "json",
            data: {mobile_no:email,posturl:'resend_otp'},
            success: function (data) 
            {
                if(data.Success==false)
                {
                    $('#error_forgote').html(data.Message);
                }
                else
                {
                     $('#success_otp').html(data.Message);
                }

               
            }
          });
    } 

    function otp_verify()
    {
        let otp=$('#otp-forgot').val();
        $.ajax({
            type: 'post',
            url: '<?=base_url()?>/Welcome/saller_array',
            dataType: "json",
            data: {otp:otp,posturl:'verify_otp'},
            beforeSend: function() 
            {
                $("#verifyotpmail").disabled = true; 
                $('#verifyotpmail').html('Processing....');
            },
            success: function (data) 
            {
                //console.log()
                if(data.Success==false)
                {
                    $('#error_otp').html(data.Message);
                    $("#verifyotpmail").disabled = false; 
                    $('#verifyotpmail').html('Verify');
                }
                else
                {
                    var main=data.UserDetails;
                    //console.log(main.buyer_id);
                    $('#buyer-otp-forgot').hide();
                    $('#user_id').val(main.buyer_id)
                    $('#buyer-new-password').show();
                     //$('#success_otp').html(data.Message);
                }

               
            }
          });
    } 
</script>


<!--  Start Footer Area -->
<?php include"footer.php"; ?>
<!-- End Footer Area -->  