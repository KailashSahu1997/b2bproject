<!--  Start Header Area -->
<?php include"header.php"; ?>
<!-- End Header Area -->

			
			<!-- site__body -->
            <div class="site__body">
                <div class="about">
                    <div class="about__body">
                        <div class="about__image">
                            <div class="about__image-bg" style="background-image: url('https://allmetalika.com/admin//assets/home_slider/8641unnamed-3_new.jpg');"></div>
                            <div class="decor about__image-decor decor--type--bottom">
                                <div class="decor__body">
                                    <div class="decor__start"></div>
                                    <div class="decor__end"></div>
                                    <div class="decor__center"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

				<div class="block-space block-space--layout--divider-xs"></div>
				<div class="container">
                    <div class="row" style="margin-bottom: 5px;">
                            <div class="col-sm-6">
                                 <!-- <h5>Bidding Details</h5> -->
                            </div>
                            <div class="col-sm-6 text-right">
                                 <a href="<?=$this->agent->referrer()?>" class="btn btn-sm btn-primary">Back</a>
                            </div>
                            </div>
                     <?php foreach($abouts->aluminum_standards as $list){?>
                        <div class="row" style="padding: 10px;box-shadow: 1px 2px 2px;">
                        <div class="col-md-6">
                            <h5 class="mb-3" style="text-transform: capitalize;"><?=$list->title?></h5>
                        </div>
                        <div class="col-md-6" align="right">
                            <a href="<?=main_url?>/<?=$list->files?>"><?=str_replace('/uploads/aluminium_standards/', '', $list->files)?>  &nbsp; <i class="fa fa-download" aria-hidden="true"></i></a>
                        </div>
                        </div>
                    <?php }?>
                    <?php if($_SESSION['issaller'] || $_SESSION['isbuyer']){}else{?>
                                        <div class="text-center mt-5" align="center">
                                            <p class="h5">Do you want buy or sell product?</p>
                                            <button class="btn btn-primary" onclick="window.location.href='<?=base_url()?>buyer_login'">BUY NOW</button>
                                            <button class="btn btn-primary" onclick="window.location.href='<?=base_url()?>login-seller'">SELL NOW</button>
                                        </div>
                                        <?php }?>
				</div>
                <div class="block-space block-space--layout--divider-xs"></div>
            </div>
            <!-- site__body / end -->
			

<!--  Start Footer Area -->
<?php include"footer.php"; ?>
<!-- End Footer Area -->			