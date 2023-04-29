<!--  Start Header Area -->
<?php include"header.php"; ?>
<!-- End Header Area -->


            <!-- site__body -->
            <div class="site__body">
                <div class="block-header block-header--has-breadcrumb block-header--has-title">
                    <div class="container">
                        <div class="block-header__body">
                            <nav class="breadcrumb block-header__breadcrumb" aria-label="breadcrumb">
                                <ol class="breadcrumb__list">
                                    <li class="breadcrumb__spaceship-safe-area" role="presentation"></li>
                                    <li class="breadcrumb__item breadcrumb__item--parent breadcrumb__item--first"><a href="<?=base_url();?>" class="breadcrumb__item-link">Home</a></li>
                                    <li class="breadcrumb__item breadcrumb__item--current breadcrumb__item--last" aria-current="page"><span class="breadcrumb__item-link">Testimonial</span></li>
                                    <li class="breadcrumb__title-safe-area" role="presentation"></li>
                                </ol>
                            </nav>
                            <h1 class="block-header__title">Client Testimonials</h1>
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
                </div>
                
                <div class="testimonial-area block pb-0">
                    <div class="container">
                        <div class="row">

                        <div class="col-lg-12">
                        <div class="row">
                            <!-- Single Testimonial -->
                            <?php foreach($testimonials->testimonials as $list){?>
                            <div class="col-lg-4 col-md-4 col-xs-12">
                                <div class="single-testimonial mb-5">
                                    <div class="round-1 round"></div>
                                    <div class="round-2 round"></div>
                                    <p><?=$list->description?></p>
                                    <div class="client-info">
                                        <!-- <div class="client-video">
                                            <img src="images/avtaar.png" alt="images">
                                        </div> -->
                                        <div class="client-details">
                                            <h6><?=$list->person_name?></h6>
                                            <p><?=$list->designation?></p>
                                           <!--  <span class="d-inline">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star-half-alt"></i>
                                                <i class="fal fa-star"></i>
                                            </span> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php }?>

                        </div>
                        <?php if($_SESSION['issaller'] || $_SESSION['isbuyer']){}else{?>
                                        <div class="text-center" align="center">
                                            <p class="h5">Do you want buy or sell product?</p>
                                            <button class="btn btn-primary" onclick="window.location.href='<?=base_url()?>buyer_login'">BUY NOW</button>
                                            <button class="btn btn-primary" onclick="window.location.href='<?=base_url()?>login-seller'">SELL NOW</button>
                                        </div>
                                        <?php }?>
                        <div class="row" id="loadmore"></div>
                        <div class="" style="padding-bottom: 15px;">
                               <!-- <a class="widget-newsletter__button mb-5" onclick="addmore()" style="color: #fff;margin-bottom: 10px;">
                                    Load More
                                </a>-->
                                <br>
                            </div>
                        </div>
                        <!-- <div class="col-lg-4">
                            <div class="post-view__item post-view__item-sidebar">
                                <div class="widget widget-newsletter text-left">
                                    <div class="widget-newsletter__title left">
                                        <h4>Write A Review</h4>
                                    </div>
                                    <div class="widget-newsletter__form">
                                        <form action="#!" method="POST" role="form">
                                            <div class="form-group">
                                                <label>Your Name</label>
                                                <input type="text" id="name" name="name" class="widget-newsletter__email" placeholder="e.g John Due" required="">
                                            </div>
                                            <div class="form-group mb-1">
                                                <label>Your Review</label>
                                                <textarea id="comment" name="comment" class="widget-newsletter__email comment" placeholder="e.g write your review...." required=""></textarea>
                                            </div>
                                            <button type="submit" class="widget-newsletter__button">Submit Now</button>
                                            <div class="widget-newsletter__text text-center mt-1 mb-0">
                                                Fill up form below for your true review. All fields are required.
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- site__body / end -->



<!-- load more -->
<script>
    var loop_count=1;
function addmore()
{
    var urls='testimonial';
    loop_count++;
    $.ajax({
            type: 'post',
            url: '<?=base_url()?>/Welcome/loadmoredata',
            dataType: "json",
            data: {page:loop_count,urls:urls},
            success: function (data) 
            {
                console.log(data.Success);
                if(data.Success==true)
                {
                    var testimonial=data.testimonials;
                    console.log(testimonial);
                    for (let i = 0; i < testimonial.length; i++) 
                    {
                        var html='<div class="col-lg-4 col-md-4 col-xs-12">\
                                <div class="single-testimonial mb-5">\
                                    <div class="round-1 round"></div>\
                                    <div class="round-2 round"></div>\
                                    <p>'+testimonial[i].description+'</p>\
                                    <div class="client-info">\
                                        <div class="client-details">\
                                            <h6>'+testimonial[i].person_name+'</h6>\
                                            <p>'+testimonial[i].designation+'</p>\
                                        </div>\
                                    </div>\
                                </div>\
                            </div>';
                            jQuery('#loadmore').append(html); 
                    }
                    
                }
                else
                {
                    var html='<div class="col-lg-4 col-md-4 col-xs-12">\
                                <h3>'+data.Message+'</h3>\
                            </div>';
                            jQuery('#loadmore').append(html); 

                }
               
            }
          });

    
}
</script>
<!-- end load more -->

<!--  Start Footer Area -->
<?php include"footer.php"; ?>
<!-- End Footer Area -->    