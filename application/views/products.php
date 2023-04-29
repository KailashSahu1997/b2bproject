<!--  Start Header Area -->
<?php include"header.php"; ?>
<!-- End Header Area -->


            <!-- site__body -->
            <div class="site__body bg-gray bg-1" style="background-image: url(<?=base_url()?>assets/website/images/bg-1.png);">
                <div class="block-header block-header--has-breadcrumb block-header--has-title">
                    <div class="container">
                        <div class="block-header__body">
                            <nav class="breadcrumb block-header__breadcrumb" aria-label="breadcrumb">
                                <ol class="breadcrumb__list">
                                    <li class="breadcrumb__spaceship-safe-area" role="presentation"></li>
                                    <li class="breadcrumb__item breadcrumb__item--parent breadcrumb__item--first"><a href="<?=base_url()?>" class="breadcrumb__item-link">Home</a></li>
                                    <li class="breadcrumb__item breadcrumb__item--current breadcrumb__item--last" aria-current="page"><span class="breadcrumb__item-link">Products</span></li>
                                    <li class="breadcrumb__title-safe-area" role="presentation"></li>
                                </ol>
                            </nav>
                            <div class="search text-right">
                      
                        <form action="#!" method="POST" class="search__body" style="float: right;margin-top:-45px">
                            <div class="search__shadow"></div>
                             <input class="search__input" type="text" id="search" placeholder="Enter Keyword or Product Name" onkeyup="autosujest()" required=""> 
                            <div class="autocom-box"></div>
                            <button class="search__button search__button--end" type="submit">
                                <span class="search__button-icon">
                                    <svg width="20" height="20">
                                        <path d="M19.2,17.8c0,0-0.2,0.5-0.5,0.8c-0.4,0.4-0.9,0.6-0.9,0.6s-0.9,0.7-2.8-1.6c-1.1-1.4-2.2-2.8-3.1-3.9C10.9,14.5,9.5,15,8,15
                                            c-3.9,0-7-3.1-7-7s3.1-7,7-7s7,3.1,7,7c0,1.5-0.5,2.9-1.3,4c1.1,0.8,2.5,2,4,3.1C20,16.8,19.2,17.8,19.2,17.8z M8,3C5.2,3,3,5.2,3,8
                                            c0,2.8,2.2,5,5,5c2.8,0,5-2.2,5-5C13,5.2,10.8,3,8,3z"></path>
                                    </svg>
                                </span>
                            </button>
                        </form>
                      <script>
                      function autosujest() {

                           var search_in=$('#search').val();
                           //debugger;  

                            $.ajax({
                                type: 'post',
                                url: '<?=base_url();?>/Welcome/search_data',
                                data: {product_name:search_in},
                                success: function (result) 
                                {
                                  $('.autocomplete').html(result);    
                                }
                            });  

                        }

                      </script>
                      <div class="autocomplete" style="position: absolute;right: 8.5%;
    z-index: 100;
    text-align: center;
     width: 17%; 
    margin-top: 3%;"></div>
                    </div>
                            <h1 class="block-header__title">Explore Products</h1>
                        </div>
                    </div>
                </div>
                <div class="container">
                <div class="row" style="margin-bottom: 3px;">
                            <div class="col-sm-6">
                                 <!-- <h5>Bidding Details</h5> -->
                            </div>
                            <div class="col-sm-6 text-right">
                                 <a href="<?=$this->agent->referrer()?>" class="btn btn-sm btn-primary">Back</a>
                            </div>
                            </div>
                            </div>
                <div class="block block-products-carousel" data-layout="grid-5">
                    <div class="container">
                        <div class="row">
                            <?php foreach($product->products as $pro){?>
                                <div class="col-lg-3 col-md-4 col-sm-4 col-12">
                                    <div class="block-products-carousel__column">
                                        <div class="block-products-carousel__cell">
                                            <div class="product-card product-card--layout--grid">
                                                <div class="product-card__image">
                                                    <div class="image image--type--product text-center">
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
                    </div>
                </div>
                <div class="block-space block-space--layout--divider-xs"></div>

            </div>
            <!-- site__body / end -->


<script>
    var loop_count=1;
function addmore()
{
    var urls='products';
    loop_count++;
    $.ajax({
            type: 'post',
            url: '<?=base_url()?>/Welcome/loadmoredata',
            dataType: "json",
            data: {page:loop_count,urls:urls},
            success: function (data) 
            {
                console.log(data.Success);
                // var  html='';
                if(data.Success==true)
                {
                   
                    var testimonial=data.products;
                    console.log(testimonial);
                    for (let i = 0; i < testimonial.length; i++) 
                    {
                        var html='<div class="col-lg-3 col-md-4 col-sm-4 col-6">\
                                    <div class="block-products-carousel__column">\
                                        <div class="block-products-carousel__cell">\
                                            <div class="product-card product-card--layout--grid">\
                                                <div class="product-card__image">\
                                                    <div class="image image--type--product">\
                                                        <a href="'.base_url('product-details').'/'.$pro->id.'" class="image__body product-card__action--quickview">\
                                                            <img class="image__tag" src="<?=main_url?>'+testimonial[i].product_image+'" alt="'+testimonial[i].product_name+'">\
                                                        </a>\
                                                    </div>\
                                                </div>\
                                                <div class="product-card__info">\
                                                    <div class="'.base_url('product-details').'/'.$pro->id.'">\
                                                        <a href="javascript:void(0)" class="product-card__action--quickview">'+testimonial[i].product_name+'</a>\
                                                    </div>\
                                                </div>\
                                            </div>\
                                        </div>\
                                    </div>\
                                </div>';
                                jQuery('#loadmore').append(html); 
                    }
                    
                }
                else
                {
                    html=+'<div class="col-lg-6 col-md-6 col-xs-12">\
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