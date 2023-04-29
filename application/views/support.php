<!--  Start Header Area -->
<?php include"header.php"; ?>
<!-- End Header Area -->

			
			<!-- site__body -->
            <div class="site__body">
				<!-- <div class="block-map block">
                    <div class="block-map__body"><iframe src="https://maps.google.com/maps?q=Holbrook-Palmer%20Park&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe></div>
                </div> -->
                <div class="block-header block-header--has-breadcrumb block-header--has-title">
                    <div class="container">
                        <div class="block-header__body">
                            <nav class="breadcrumb block-header__breadcrumb" aria-label="breadcrumb">
                                <ol class="breadcrumb__list">
                                    <li class="breadcrumb__spaceship-safe-area" role="presentation"></li>
                                    <li class="breadcrumb__item breadcrumb__item--parent breadcrumb__item--first"><a href="<?=base_url();?>" class="breadcrumb__item-link">Home</a></li>
                                    <li class="breadcrumb__item breadcrumb__item--current breadcrumb__item--last" aria-current="page"><span class="breadcrumb__item-link">Support</span></li>
                                    <li class="breadcrumb__title-safe-area" role="presentation"></li>
                                </ol>
                            </nav>
                            <h1 class="block-header__title">Support & Help Desk</h1>
                            <div class="row">
                            <div class="col-sm-6">
                                 <!-- <h5>Bidding Details</h5> -->
                            </div>
                            <div class="col-sm-6 text-right">
                                 <a href="<?=$this->agent->referrer()?>" class="btn btn-sm btn-primary">Back</a>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="block">
                    <div class="container container--max--lg">
                        <div class="card support">
                            <div class="card-body card-body--padding--2">
                                <div class="row">
                                    <div class="col-12 col-lg-12 pb-4 pb-lg-0">
                                        <div class="mr-1">
                                            <h4 class="contact-us__header card-title">Support</h4>
                                            <div class="contact-us__address">
                                                <!-- <p>715 Fake Ave, Apt. 34, New York, NY 10021 USA<br>Email: support@allmetalika.com<br>Phone Number: +91-9699500022</p>
                                                <p><strong>Opening Hours</strong><br>Monday to Friday: 8am-8pm<br>Saturday: 8am-6pm<br>Sunday: 10am-4pm</p>
                                                <p><strong>Comment</strong><br>We’re very approachable and would love to speak to you. Feel free to call, send us an email or simply complete to enquiry form.</p> -->
                                                <p><?=$abouts->Services->descriptions?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="col-12 col-lg-6">
                                        <div class="ml-1">
                                            <h4 class="contact-us__header card-title">Leave us a Message</h4>
                                            <form action="#!" method="POST" role="form">
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
														<label for="form-name">Your Name</label> 
														<input type="text" id="name" class="form-control" placeholder="e.g John Due" required="">
													</div>
                                                    <div class="form-group col-md-6">
														<label for="form-email">Email Address</label> 
														<input type="email" id="email" class="form-control" placeholder="e.g example@gmail.com" required="">
													</div>
                                                </div>
                                                <div class="form-group">
													<label for="form-subject">Phone Number</label> 
													<input type="text" id="phone" class="form-control" placeholder="e.g +91 90494 54815">
												</div>
                                                <div class="form-group">
													<label for="form-message">Message</label> 
													<textarea id="message" class="form-control" rows="4" placeholder="e.g write a message.."></textarea>
												</div>
                                                <button type="submit" class="btn btn-primary">Send Message</button>
                                            </form>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                             <?php if($_SESSION['issaller'] || $_SESSION['isbuyer']){}else{?>
                                        <div class="text-center mt-5" align="center">
                                            <p class="h5">Do you want buy or sell product?</p>
                                            <button class="btn btn-primary" onclick="window.location.href='<?=base_url()?>buyer_login'">BUY NOW</button>
                                            <button class="btn btn-primary" onclick="window.location.href='<?=base_url()?>login-seller'">SELL NOW</button>
                                        </div>
                                        <?php }?>
                        </div>
                    </div>
                </div>
                <div class="block-space block-space--layout--before-footer"></div>
            </div>
            <!-- site__body / end -->


<!--  Start Footer Area -->
<?php include"footer.php"; ?>
<!-- End Footer Area -->			