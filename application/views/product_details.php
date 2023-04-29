<!--  Start Header Area -->
<?php include"header.php"; ?>
<!-- End Header Area -->

            
            <!-- site__body -->
            <div class="site__body">
                <div class="about">
                    <div class="about__body">
                        <div class="about__image">
                            <div class="about__image-bg" style="background-image: url('<?=base_url()?>assets/website/images/about-1903x1903.jpg');"></div>
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
                    <div class="row">
                        <div class="col-sm-6">
                                 <!-- <h5>Bidding Details</h5> -->
                            </div>
                            <div class="col-sm-6 text-right">
                                 <a href="<?=$this->agent->referrer()?>" class="btn btn-sm btn-primary">Back</a>
                            </div>
                            <?php foreach($product->products as $pro)
                            if($id==$pro->id){
                            {?>
                                <div class="col-lg-3 col-md-4 col-sm-4 col-12">
                                    <div class="block-products-carousel__column">
                                        <div class="block-products-carousel__cell">
                                            <div class="product-card product-card--layout--grid">
                                                <div class="product-card__image">
                                                    <div class="image image--type--product">
                                                        <a href="javascript:void(0)" class="image__body product-card__action--quickview">
                                                            <img class="" src="<?=main_url?>/<?=$pro->product_image?>" alt="<?=$pro->product_name?>" style="width: 315px;height: 210px;">
                                                        </a>
                                                    </div>
                                                </div>
                                                <!-- <div class="product-card__info">
                                                    <div class="product-card__name">
                                                        <a href="javascript:void(0)" class="product-card__action--quickview"><?=$pro->product_name?></a>
                                                    </div>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-9 col-md-8 col-sm-8 col-12">
                                    <!-- <div class="block-products-carousel__column">
                                        <div class="block-products-carousel__cell">
                                            <div class="product-card product-card--layout--grid">
                                                <div class="product-card__image"> -->
                                                    <h3><?=$pro->product_name?></h3>
                                                    <!-- <div class="image image--type--product">
                                                        <a href="<?=base_url('product-details')?>/<?=$pro->id?>" class="image__body product-card__action--quickview">
                                                            <img class="image__tag" src="<?=main_url?>/<?=$pro->product_image?>" alt="<?=$pro->product_name?>">
                                                        </a>
                                                    </div> -->
                                                <!-- </div> -->
                                                <div class="product-card__info">
                                                    <p><?=$pro->product_description?></p>
                                                </div>
                                                <?php if($_SESSION['isbuyer'])
                                                {
                                                     $allbuyer=getbuyerparame('buyers_list');
                                                     $buyerlist=$allbuyer->buyers;
                                                     // check buyer approve or not approve by admin
                                                     foreach($buyerlist as $rowss)
                                                     {
                                                        if($rowss->buyer_id==$_SESSION['id'])
                                                        {
                                                            if($rowss->status=='0')
                                                            {
                                                               $checkactive="approved";
                                                            }
                                                            else
                                                            {
                                                             $checkactive="notapproved";
                                                            }
                                                             $companyname=$rowss->company_name;

                                                        }
                                                    }
                                                    $allbank=getbuyerparame('bank_list');
                                                    $banks=$allbank->buyers_bank_details;

                                                    foreach($banks as $bank)
                                                    { 
                                                        if($bank->buyer_id==$_SESSION['id'])
                                                        {
                                                            $acname=$bank->ac_name;

                                                        } 
                                                    }
                                                    if(empty($companyname)){?>
                                                        <button class="btn btn-primary" data-toggle="modal" data-target="#companyModal" data-placement="top">Post Requirement Now</button>

                                                    <?php }elseif($checkactive=="notapproved"){?>
                                                    <button class="btn btn-primary" data-modal-trigger="myModal" data-toggle="tooltip" data-placement="top">Post Requirement Now</button>
                                                <?php }else{?>
                                                    <button class="btn btn-primary" onclick="window.location.href='<?=base_url()?>buyer/post-requirement?product_name=<?=$pro->product_name?>'">Post Requirement Now</button>
                                                <?php } }elseif($_SESSION['issaller']){?>
                                               
                                                <?php }else{?>
                                                <p class="h5">Do you want buy or sell product?</p>
                                                <button class="btn btn-primary" onclick="window.location.href='<?=base_url()?>buyer_login'">BUY NOW</button>
                                                <button class="btn btn-primary" onclick="window.location.href='<?=base_url()?>login-seller'">SELL NOW</button>
                                                 <?php }?>
                                            <!-- </div>
                                        </div>
                                    </div> -->
                                </div>
                                <div class="col-md-12 col-lg-12" align="center"></div>
                            <?php } }?>


                        </div>

                </div>
                <div class="block-space block-space--layout--divider-xs"></div>
            </div>
            <!-- site__body / end -->
            <!-- business details bank detail blank modal -->
            <div id="companyModal" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header" style="padding: 24px 24px 10px;">
                            <h5 class="modal-title">Show Reason</h5>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body" style="padding: 40px;">
                            <p>Submit all required registration details (Bank Details, Company Details, GST verification, Personal Details). After submission, your account will get activated within 24 hours.</p>
                        </div>
                        <div class="modal-footer" style="padding:10px">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <?php if(empty($companyname)){?>
                                <button type="button" class="btn btn-danger" onclick="window.location.href='<?=base_url()?>buyer/business-details'">OK</button>
                            <?php }?>
                        </div>
                    </div>
                </div>
            </div>
            

<!--  Start Footer Area -->
<?php include"footer.php"; ?>
<!-- End Footer Area -->            