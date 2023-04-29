<!--  Start Header Area -->
<?php include"header.php"; ?>
<!-- End Header Area -->

            
<!-- site__body -->
<div class="site__body bg-gray bg-1" style="background-image: url(<?=base_url()?>assets/website/images/bg-1.png);">
    <div class="block-space block-space--layout--after-header"></div>
    <div class="block">
        <div class="container container--max--xl">
            <div class="row">
                <div class="col-12 col-lg-3">
                    <?php include"navigation.php"; ?>
                </div>
                <div class="col-12 col-lg-9 mt-4 mt-lg-0">
                    <div class="pricing-tables content-area">
                        <h5 class="text-center mb-4">Membership Subscriptions</h5>
                        <div class="row">
                            <?php $i=0; foreach($servicecharge as $list){?>
                            <div class="col-sm-12 col-lg-4 col-md-4">
                                <div class="pricing <?php if($i=="1"){ echo "featured outline";}?>">
                                    <?php if($i=="1"){ ?>
                                    <div class="listing-badges">
                                        <span class="featured">Featured</span>
                                    </div>
                                   <?php }?>
                                    <div class="price-header <?php if($i=="1"){ echo "price-header-2"; }?>">
                                        <div class="title">Basic Plan</div>
                                        <div class="price">₹.1500</div>
                                    </div>
                                    <div class="content">
                                        <ul>
                                            <li>For the verification of user’s identity, eligibility etc. and for registration of the user and to provide customized services to the users.</li>
                                            <li>For facilitating the services offered/available on the Website.</li>
                                            <li>For advertising, marketing, displaying & publication.</li>
                                        </ul>
                                        <div class="button">
                                            <a href="#" class="btn btn-sm btn-outline-danger">Subscribe Now</a>
                                        </div>
                                        <p class="validity">*This Plan Validity : 3 Months</p>
                                    </div>
                                </div>
                            </div>
                            <?php $i++; }?>
                            <div class="col-sm-12 col-lg-4 col-md-4">
                                <div class="pricing featured outline">
                                    <div class="listing-badges">
                                        <span class="featured">Featured</span>
                                    </div>
                                    <div class="price-header price-header-2">
                                        <div class="title">Deluxe Plan</div>
                                        <div class="price">₹.2500</div>
                                    </div>
                                    <div class="content">
                                        <ul>
                                            <li>For the verification of user’s identity, eligibility etc. and for registration of the user and to provide customized services to the users.</li>
                                            <li>For facilitating the services offered/available on the Website.</li>
                                            <li>For advertising, marketing, displaying & publication.</li>
                                        </ul>
                                        <div class="button"><a href="#" class="btn btn-sm btn-danger">Subscribe Now</a></div>
                                        <p class="validity">*This Plan Validity : 6 Months</p>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-sm-12 col-lg-4 col-md-4">
                                <div class="pricing">
                                    <div class="price-header">
                                        <div class="title">Premium Plan</div>
                                        <div class="price">₹.3500</div>
                                    </div>
                                    <div class="content">
                                        <ul>
                                            <li>For the verification of user’s identity, eligibility etc. and for registration of the user and to provide customized services to the users.</li>
                                            <li>For facilitating the services offered/available on the Website.</li>
                                            <li>For advertising, marketing, displaying & publication.</li>
                                        </ul>
                                        <div class="button"><a href="#" class="btn btn-sm btn-outline-danger">Subscribe Now</a></div>
                                        <p class="validity">*This Plan Validity : 12 Months</p>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="block-space block-space--layout--before-footer"></div>
</div>
<!-- site__body / end -->
<!-- Download Invoice Modal Start -->
<div class="modal default" data-modal-name="edit-bids-modal">
    <div class="modal__dialog">
        <div class="modal-content">
            <div class="modal-header mb-3">
                <h5 class="modal-title">Edit Bidding Form</h5>
                <button data-modal-dismiss class="modal__close">
                <i data-modal-dismiss class="fal fa-times"></i>
                </button>  
            </div>
            <form action="#!" method="POST" role="form">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 col-lg-12 col-xl-12">
                            <div class="form-group">
                                <label for="full-name">Full Name</label> 
                                <input type="text" class="form-control" id="full-name" placeholder="e.g John Duw" required="">
                            </div>
                            <div class="form-group">
                                <label for="email-address">Email Address</label> 
                                <input type="text" class="form-control" id="email-address" placeholder="e.g example@gmail.com" required="">
                            </div>
                            <div class="form-group">
                                <label for="mobile-number">Mobile Number</label> 
                                <input type="text" class="form-control" id="mobile-number" placeholder="e.g 12345 67890" required="">
                            </div>
                            <div class="form-group">
                                <label for="bidding-price">Bidding Price</label> 
                                <input type="number" class="form-control" id="bidding-price" placeholder="e.g 1200.00" required="">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label> 
                                <textarea class="form-control" id="description" placeholder="e.g write a description...." rows="3" required=""></textarea>
                            </div>
                            <div class="form-group mb-0">
                                <label for="delivery-time">Delivery Time</label> 
                                <input type="text" class="form-control" id="delivery-time" placeholder="e.g 20 Hrs" required="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button data-modal-dismiss class="btn btn-secondary">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save Now</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Download Invoice Modal End -->          


<!--  Start Footer Area -->
<?php include"footer.php"; ?>
<!-- End Footer Area -->	            