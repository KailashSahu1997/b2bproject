<!--  Start Header Area -->
<style type="text/css">
    .product-card__name{
        background-color: none !important;
    }
    /*.owl-item, .cloned
    {
        width: 340px !important;
    }*/
</style>
<?php include"header.php"; ?>
<!-- End Header Area -->
            <!-- site__body -->
            <div class="site__body">
                <div class="block block-slideshow">
                        <div class="block-slideshow__carousel">
                            <div class="owl-carousel">
                                <?php  foreach($sliderss->Slider as $list){?>
                                    <a class="block-slideshow__item" href="https://play.google.com/store/apps/details?id=com.allmetalika.allmetalika&hl=en_US&gl=IN" target="_blank">
                                        <span class="block-slideshow__item-image block-slideshow__item-image--desktop">
                                            <img src="<?=main_url?><?=$list->slider_images?>" class="" alt="banner" style='width: 100%; height: 500px;'>
                                        </span> 
                                        <span class="block-slideshow__item-image block-slideshow__item-image--mobile">
                                            <img src="<?=main_url?><?=$list->slider_images?>" class="img-fluid" alt="banner" style='width: 100%; height: 150px;'>
                                        </span> 
                                    </a>
                                <?php }?>
                            </div>
                        </div>
                </div>

                <div class="bg-gray block-features block block-features--layout--top-strip">
                    <div class="container p-3">
                         <div class="row justify-content-center" style="font-size: 22px;">
                            
                           <div class="col-sm-8"><marquee direction = "left"><b><?php foreach($slogans->slogan as $slog){?><?=$slog->text?> &nbsp;<?=$slog->price?> ,&nbsp;<?php }?></b></marquee></div>
                           
                        </div>
                    </div>
                </div>

                <!-- <div class="bg-gray block-features block block-features--layout--top-strip">
                    <div class="container">
                         <div class="row">
                           <div class="col-lg-6 col-md-6"><img src="<?=base_url()?>assets/Brochure_page-0008.jpg" class="img-fluid" style="height: 30%;width: 100%;"></div>
                            <div class="col-lg-6 col-md-6"><img src="<?=base_url()?>assets/Brochure_page-0004.jpg" class="img-fluid" style="height: 30%;width: 100%;"></div>
                        </div>
                    </div>
                </div> -->

                 <div class="bg-gray block block-products-carousel pt-4 pb-3 bg-1" data-layout="grid-5">
                    <div class="container">
                       <!--  <div class="section-header">
                            <div class="section-header__body">
                                <h2 class="section-header__title">Explore Products</h2>
                                <div class="section-header__spring"></div>
                                <div class="section-header__arrows">
                                    <button onclick="window.location.href='<?=base_url();?>products'" class="btn btn-sm btn-secondary">View More Products <i class="fad fa-long-arrow-right ml-1"></i></button>
                                </div>
                                <div class="section-header__divider"></div>
                            </div>
                        </div> -->

                        <div class="row">
                            <?php foreach($home_banner as $home_ban){?>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="block-products-carousel__column">
                                        <div class="block-products-carousel__cell">
                                            <div class="product-card product-card--layout--grid">
                                                <div class="product-card__image">
                                                    <div class="image image--type--product">
                                                        <a href="" class="">
                                                            <img class="" src="<?=main_url?><?=$home_ban->image?>" alt="" style="height: 220px;width: 600px;">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php }?>
                               <!--  <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="block-products-carousel__column">
                                        <div class="block-products-carousel__cell">
                                            <div class="product-card product-card--layout--grid">
                                                <div class="product-card__image">
                                                    <div class="image image--type--product">
                                                        <a href="" class="">
                                                            <img class="" src="<?=base_url()?>assets/2 new copy.jpg" alt="" style="height: 220px;width: 600px">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                
                        </div>
                    </div>
                </div>
                <section class="space-ptb2 pb-0">
                    <div class="container">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-lg-5 mt-lg-0 text-center">
                                <img class="mockup-img img-fluid" src="<?=base_url()?>uploads/mobile-app-removebg-preview.png" alt="image">
                            </div>
                            <div class="col-lg-6">
                                <div class="col-12">
                                    <div class="section-title">
                                        <h2 class="mb-3">STILL, TRADING ALUMINIUM THROUGH WEBSITES?</h2>
                                        <p> Why advertise and sell/buy aluminium on third-party websites when you can use an exclusive Aluminium Trading platform from your mobile phone? Trading Aluminium pan India has become so convenient now. Free download Allmetalika App from Google Play Store or Apple App Store. Log in as a buyer or a seller and start conducting business</p>
                                    </div>
                                    <div class="d-block d-sm-flex homeappicons">
                                        <a class="me-0 me-sm-2 mb-2 mb-sm-0" href="https://play.google.com/store/apps/details?id=com.allmetalika.allmetalika&hl=en_US&gl=IN" target="_blank">
                                            <img class="img-fluid" src="<?=base_url('assets/website/icon-google-play.webp')?>" alt="icon">
                                        </a>
                                        <a class="mb-2 mb-sm-0" href="https://apps.apple.com/in/app/allmetalika/id1639562292" target="_blank">
                                            <img class="img-fluid" src="<?=base_url('assets/website/icon-app-store.webp')?>" alt="icon">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                <div class="bg-gray block block-products-carousel pt-4 pb-3 bg-1" style="background-image: url(<?=base_url()?>/assets/website/images/bg-1.png);" data-layout="grid-5">
                    <div class="container">
                        <div class="section-header">
                            <div class="section-header__body">
                                <h2 class="section-header__title">Explore Products</h2>
                                <div class="section-header__spring"></div>
                                <div class="section-header__arrows">
                                    <button onclick="window.location.href='<?=base_url();?>products'" class="btn btn-sm btn-secondary">View More Products <i class="fad fa-long-arrow-right ml-1"></i></button>
                                </div>
                                <div class="section-header__divider"></div>
                            </div>
                        </div>

                        <div class="row">
                            <?php foreach($product->products as $pro)
                            {?>
                                <div class="col-lg-3 col-md-4 col-sm-4 col-12">
                                    <div class="block-products-carousel__column">
                                        <div class="block-products-carousel__cell">
                                            <div class="product-card product-card--layout--grid text-center">
                                                <div class="product-card__image">
                                                    <div class="image image--type--product ">
                                                        <a href="<?=base_url('product-details')?>/<?=$pro->id?>" class="image__body product-card__action--quickview">
                                                            <img class="" src="<?=main_url?>/<?=$pro->product_image?>" alt="<?=$pro->product_name?>" style="width: 315px;height: 210px;">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="product-card__info">
                                                    <div class="product-card__name">
                                                        <a href="<?=base_url('product-details')?>/<?=$pro->id?>" class="product-card__action--quickview"><?=$pro->product_name?></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            <?php }?>


                        </div>
                    </div>
                </div>
                <div class="block-space block-space--layout--divider-xs pt-2"></div>

                <!-- <div class="block-banners block">
                    <div class="container">
                        <div class="block-banners__list">
                            <a href="#" class="block-banners__item block-banners__item--style--one">
                                <span class="block-banners__item-image">
                                    <img src="<?=base_url()?>/assets/website/images/banners/banner1.jpg" alt="">
                                </span>
                                <span class="block-banners__item-image block-banners__item-image--blur">
                                    <img src="<?=base_url()?>/assets/website/images/banners/banner1.jpg" alt="">
                                </span>
                                <span class="block-banners__item-title">Aluminium stainless</span>
                                <span class="block-banners__item-details">Synthetic motor oil with free shipping<br>Friction free life guaranteed </span>

                            </a>
                            <a href="<?=base_url()?>supports" class="block-banners__item block-banners__item--style--two">
                                <span class="block-banners__item-image">
                                    <img src="<?=base_url()?>/assets/website/images/banners/banner2.jpg" alt="">
                                </span>
                                <span class="block-banners__item-image block-banners__item-image--blur">
                                    <img src="<?=base_url()?>/assets/website/images/banners/banner2.jpg" alt="">
                                </span>
                                <span class="block-banners__item-title">Connect with Us!</span>
                                <span class="block-banners__item-details">Feel free to call, send us an email or simply<br> complete tn enquiry form.</span>
                                <span class="block-banners__item-button btn btn-primary btn-sm">Help Desk <i class="fad fa-headset ml-1"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="block-space block-space--layout--divider-xs"></div> -->

                <div class="testimonial-area block block-posts-carousel block-posts-carousel--layout--grid" data-layout="grid">
                    <div class="container">
                        <div class="section-header">
                            <div class="section-header__body">
                                <h2 class="section-header__title">Client Testimonials</h2>
                                <div class="section-header__spring"></div>
                                <div class="section-header__arrows align-item-center">
                                    <div class="mr-3" style="margin-top:-3px;">
                                        <button onclick="window.location.href='<?=base_url();?>client-testimonials'" class="btn btn-sm btn-secondary" type="button">View More</button>
                                    </div>
                                    <div class="arrow section-header__arrow section-header__arrow--prev arrow--prev">
                                        <button class="arrow__button" type="button">
                                            <svg width="7" height="11">
                                                <path d="M6.7,0.3L6.7,0.3c-0.4-0.4-0.9-0.4-1.3,0L0,5.5l5.4,5.2c0.4,0.4,0.9,0.3,1.3,0l0,0c0.4-0.4,0.4-1,0-1.3l-4-3.9l4-3.9C7.1,1.2,7.1,0.6,6.7,0.3z"/>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="arrow section-header__arrow section-header__arrow--next arrow--next">
                                        <button class="arrow__button" type="button">
                                            <svg width="7" height="11">
                                                <path d="M0.3,10.7L0.3,10.7c0.4,0.4,0.9,0.4,1.3,0L7,5.5L1.6,0.3C1.2-0.1,0.7,0,0.3,0.3l0,0c-0.4,0.4-0.4,1,0,1.3l4,3.9l-4,3.9
                                                    C-0.1,9.8-0.1,10.4,0.3,10.7z"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <div class="section-header__divider"></div>
                            </div>
                        </div>
                        <div class="block-posts-carousel__carousel">
                            <div class="owl-carousel">
                                <!-- Single Testimonial -->
                                <?php foreach($testimonials->testimonials as $list){?>
                                <div class="single-testimonial">
                                    <div class="round-1 round"></div>
                                    <!-- <div class="round-2 round"></div> -->
                                    <p><?=$list->description?></p>
                                    <div class="client-info">
                                        <div class="client-details">
                                            <h6><?=$list->person_name?></h6>
                                            <p><?=$list->designation?></p>
                                            <span class="d-inline">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star-half-alt"></i>
                                                <i class="fal fa-star"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                               <?php }?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray block-space block-space--layout--divider-xs"></div>

                <div class="bg-gray block block-posts-carousel style-active block-posts-carousel--layout--grid" data-layout="grid">
                    <div class="container">
                        <div class="section-header">
                            <div class="section-header__body">
                                <h2 class="section-header__title">Expert Comments</h2>
                                <div class="section-header__spring"></div>
                                <div class="section-header__arrows">
                                    <div class="mr-3" style="margin-top:-3px;">
                                        <button onclick="window.location.href='<?=base_url();?>expert-comments'" class="btn btn-sm btn-secondary" type="button">View All Blog</button>
                                    </div>
                                    <div class="arrow section-header__arrow section-header__arrow--prev arrow--prev">
                                        <button class="arrow__button" type="button">
                                            <svg width="7" height="11">
                                                <path d="M6.7,0.3L6.7,0.3c-0.4-0.4-0.9-0.4-1.3,0L0,5.5l5.4,5.2c0.4,0.4,0.9,0.3,1.3,0l0,0c0.4-0.4,0.4-1,0-1.3l-4-3.9l4-3.9C7.1,1.2,7.1,0.6,6.7,0.3z"/>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="arrow section-header__arrow section-header__arrow--next arrow--next">
                                        <button class="arrow__button" type="button">
                                            <svg width="7" height="11">
                                                <path d="M0.3,10.7L0.3,10.7c0.4,0.4,0.9,0.4,1.3,0L7,5.5L1.6,0.3C1.2-0.1,0.7,0,0.3,0.3l0,0c-0.4,0.4-0.4,1,0,1.3l4,3.9l-4,3.9
                                                    C-0.1,9.8-0.1,10.4,0.3,10.7z"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <div class="section-header__divider"></div>
                            </div>
                        </div>
                        <div class="block-posts-carousel__carousel">
                            <div class="owl-carousel">
                                <?php foreach ($experts->expert_views as $expo) {?>
                                   <div class="block-posts-carousel__item">
                                    <div class="post-card">
                                        <div class="post-card__image"><a href="<?=base_url();?>single-expert-comments/<?=$expo->id?>"><img src="<?=main_url?><?=$expo->expert_image?>" alt=""></a></div>
                                        <div class="post-card__content">
                                            <div class="post-card__category"><a href="<?=base_url();?>single-expert-comments/<?=$expo->id?>"><?=$expo->created_at?></a></div>
                                            <div class="post-card__title">
                                                <h2><a href="<?=base_url();?>single-expert-comments/<?=$expo->id?>"><?=$expo->expert_description?></a></h2>
                                            </div>
                                            <div class="post-card__date">Posted by <a><?=$expo->expert_title?></a></div>
                                        </div>
                                    </div>
                                </div> 
                                <?php }?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray block-space block-space--layout--divider-xs"></div>

            </div>
            <!-- site__body / end -->
            

<!--  Start Footer Area -->
<?php include"footer.php"; ?>
<!-- End Footer Area --> 