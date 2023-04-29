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
                                    <li class="breadcrumb__item breadcrumb__item--parent breadcrumb__item--first"><a href="<?=base_url()?>" class="breadcrumb__item-link">Home</a></li>
                                    <li class="breadcrumb__item breadcrumb__item--current breadcrumb__item--last" aria-current="page"><span class="breadcrumb__item-link">Expert Comments</span></li>
                                    <li class="breadcrumb__title-safe-area" role="presentation"></li>
                                </ol>
                            </nav>
                            <h1 class="block-header__title">Expert Comments</h1>
                            <div class="row" style="margin-bottom: 5px;">
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
                <div class="block blog-view blog-view--layout--list">
                    <div class="container">
                        <div class="blog-view__body">
                            <!-- <div class="blog-view__item blog-view__item-sidebar">
                                <div class="card widget widget-search">
                                    <form action="#" class="widget-search__form">
                                        <input class="widget-search__input" type="search" placeholder="Expert comments search..." required=""> 
                                        <button type="submit" class="widget-search__button">
                                            <svg width="20" height="20">
                                                <path d="M19.2,17.8c0,0-0.2,0.5-0.5,0.8c-0.4,0.4-0.9,0.6-0.9,0.6s-0.9,0.7-2.8-1.6c-1.1-1.4-2.2-2.8-3.1-3.9C10.9,14.5,9.5,15,8,15
                                                    c-3.9,0-7-3.1-7-7s3.1-7,7-7s7,3.1,7,7c0,1.5-0.5,2.9-1.3,4c1.1,0.8,2.5,2,4,3.1C20,16.8,19.2,17.8,19.2,17.8z M8,3C5.2,3,3,5.2,3,8
                                                    c0,2.8,2.2,5,5,5c2.8,0,5-2.2,5-5C13,5.2,10.8,3,8,3z"/>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                                <div class="card widget widget-posts">
                                    <div class="widget__header">
                                        <h4>Latest Posts</h4>
                                    </div>
                                    <ul class="widget-posts__list">
                                        <li class="widget-posts__item">
                                            <div class="widget-posts__image"><a href="single-expert-comments.php"><img src="https://dummyimage.com/600x370/cfcfcf/878787.jpg" alt=""></a></div>
                                            <div class="widget-posts__info">
                                                <div class="widget-posts__name"><a href="single-expert-comments.php">Lorem ipsum dolor sit amet, consectetur aliust alui adipiscing elit</a></div>
                                                <div class="widget-posts__date">October 19, 2019</div>
                                            </div>
                                        </li>
                                        <li class="widget-posts__item">
                                            <div class="widget-posts__image"><a href="single-expert-comments.php"><img src="https://dummyimage.com/600x370/cfcfcf/878787.jpg" alt=""></a></div>
                                            <div class="widget-posts__info">
                                                <div class="widget-posts__name"><a href="single-expert-comments.php">Lorem ipsum dolor sit amet, consectetur aliust alui adipiscing elit</a></div>
                                                <div class="widget-posts__date">September 5, 2019</div>
                                            </div>
                                        </li>
                                        <li class="widget-posts__item">
                                            <div class="widget-posts__image"><a href="single-expert-comments.php"><img src="https://dummyimage.com/600x370/cfcfcf/878787.jpg" alt=""></a></div>
                                            <div class="widget-posts__info">
                                                <div class="widget-posts__name"><a href="single-expert-comments.php">Lorem ipsum dolor sit amet, consectetur aliust alui adipiscing elit</a></div>
                                                <div class="widget-posts__date">August 12, 2019</div>
                                            </div>
                                        </li>
                                        <li class="widget-posts__item">
                                            <div class="widget-posts__image"><a href="single-expert-comments.php"><img src="https://dummyimage.com/600x370/cfcfcf/878787.jpg" alt=""></a></div>
                                            <div class="widget-posts__info">
                                                <div class="widget-posts__name"><a href="single-expert-comments.php">Lorem ipsum dolor sit amet, consectetur aliust alui adipiscing elit</a></div>
                                                <div class="widget-posts__date">Jule 30, 2019</div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="widget widget-newsletter">
                                    <div class="widget-newsletter__title">
                                        <h4>Newsletter</h4>
                                    </div>
                                    <div class="widget-newsletter__form">
                                        <form action="#!" method="POST" role="form">
                                            <div class="widget-newsletter__text">Enter your email address below to subscribe to our newsletter and keep up to date with the latest news, discounts and special offers.</div>
                                            <input type="text" id="email" name="email" class="widget-newsletter__email" placeholder="Email Address..." required=""> <button type="button" class="widget-newsletter__button">Subscribe Us</button>
                                        </form>
                                    </div>
                                </div>
                            </div> -->
                            <div class="blog-view__item blog-view__item-posts">
                                <div class="block posts-view">
                                    <div class="posts-view__list posts-list posts-list--layout--list">
                                        <div class="posts-list__body">
											<!-- Start Expert Comment Item -->
                                            <?php foreach (array_reverse($experts->expert_views) as $expo) {?>
                                            <div class="posts-list__item">
                                                <div class="post-card post-card--layout--list">
                                                    <div class="post-card__image"><a href="<?=base_url('single-expert-comments')?>/<?=$expo->id?>"><img src="<?=main_url?><?=$expo->expert_image?>" alt=""></a></div>
                                                    <div class="post-card__content">
                                                        <div class="post-card__title">
                                                            <h2><a href="<?=base_url('single-expert-comments')?>/<?=$expo->id?>"><?=$expo->expert_title?></a></h2>
                                                        </div>
                                                        <div class="post-card__date">on <?=$expo->created_at?></div>
                                                        <div class="post-card__excerpt">
                                                            <div class="typography"><?=$expo->expert_description?></div>
                                                        </div>
                                                        <br>
                                                        <div class="post-card__more">
                                                            <a href="<?=base_url('single-expert-comments')?>/<?=$expo->id?>" class="btn btn-danger btn-sm">Read more <i class="fad fa-long-arrow-right ml-1"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php }?>
                                            <!-- End Expert Comment Item -->
                                        </div>
                                    </div>
                                    <?php if($_SESSION['issaller'] || $_SESSION['isbuyer']){}else{?>
                                        <div class="text-center mt-3" align="center">
                                            <p class="h5">Do you want buy or sell product?</p>
                                            <button class="btn btn-primary" onclick="window.location.href='<?=base_url()?>buyer_login'">BUY NOW</button>
                                            <button class="btn btn-primary" onclick="window.location.href='<?=base_url()?>login-seller'">SELL NOW</button>
                                        </div>
                                        <?php }?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="block-space block-space--layout--before-footer"></div>
            </div>
            <!-- site__body / end -->
			

<!--  Start Footer Area -->
<?php include"footer.php"; ?>
<!-- End Footer Area -->				