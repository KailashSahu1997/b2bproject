<!--  Start Header Area -->
<?php include"header.php"; ?>
<!-- End Header Area -->
			
			
			<!-- site__body -->
            <?php foreach ($experts->expert_views as $expo) {
                                    if($id==$expo->id){?>
            <div class="site__body">
                <div class="block post-view">
                    <div class="post-view__header post-header post-header--has-image">

                        <div class="post-header__image">
                            <div class="row mt-3">
                            <div class="col-sm-6">
                                 <!-- <h5>Bidding Details</h5> -->
                            </div>
                            <div class="col-sm-6 text-right">
                                 <a href="<?=$this->agent->referrer()?>" class="btn btn-sm btn-primary">Back</a>
                            </div>
                            </div>
                        </div>
                        <div class="post-header__body">

                            <h1 class="post-header__title"><?=$expo->expert_title?></h1>
                            <div class="post-header__meta">
                                <!-- <ul class="post-header__meta-list">
                                    <li class="post-header__meta-item">By <a class="post-header__meta-link">Irshad Ahmed</a></li>
                                    <li class="post-header__meta-item">18 Jun, 2022</li>
                                    <li class="post-header__meta-item"><a href="#postcomment" class="post-header__meta-link">Post Comments</a></li>
                                </ul> -->
                            </div>
                        </div>
                        <div class="decor post-header__decor decor--type--bottom">
                            <div class="decor__body">
                                <div class="decor__start"></div>
                                <div class="decor__end"></div>
                                <div class="decor__center"></div>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="post-view__body">
                            <!-- <div class="post-view__item post-view__item-sidebar">
                                <div class="card widget widget-search">
                                    <form action="#" class="widget-search__form">
                                        <input class="widget-search__input" type="search" placeholder="Expert comments search..."> 
                                        <button class="widget-search__button">
                                            <svg width="20" height="20">
                                                <path d="M19.2,17.8c0,0-0.2,0.5-0.5,0.8c-0.4,0.4-0.9,0.6-0.9,0.6s-0.9,0.7-2.8-1.6c-1.1-1.4-2.2-2.8-3.1-3.9C10.9,14.5,9.5,15,8,15
                                                    c-3.9,0-7-3.1-7-7s3.1-7,7-7s7,3.1,7,7c0,1.5-0.5,2.9-1.3,4c1.1,0.8,2.5,2,4,3.1C20,16.8,19.2,17.8,19.2,17.8z M8,3C5.2,3,3,5.2,3,8
                                                    c0,2.8,2.2,5,5,5c2.8,0,5-2.2,5-5C13,5.2,10.8,3,8,3z"/>
                                            </svg>
                                        </button>
                                        <div class="widget-search__field"></div>
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
								<div id="postcomment" class="post-view__card">
                                    <h2 class="post-view__card-title">Write A Comment</h2>
                                    <form class="post-view__card-body">
                                        <div class="form-row">
                                            <div class="form-group col-12"><label for="comment-first-name">Your Name</label> <input type="text" class="form-control" id="comment-name" placeholder="Your Name"></div>
                                            <div class="form-group col-12"><label for="comment-email">Email Address</label> <input type="email" class="form-control" id="comment-email" placeholder="Email Address"></div>
                                        </div>
                                        <div class="form-group"><label for="comment-content">Comment</label> <textarea class="form-control" id="comment-content" rows="4"></textarea></div>
                                        <div class="form-group mb-0"><button type="submit" class="btn btn-primary">Post Comment</button></div>
                                    </form>
                                </div>
                                <div class="widget widget-newsletter">
                                    <div class="widget-newsletter__title">
                                        <h4>Newsletter</h4>
                                    </div>
                                    <div class="widget-newsletter__form">
                                        <form action="#">
                                            <div class="widget-newsletter__text">Enter your email address below to subscribe to our newsletter and keep up to date with the latest news, discounts and special offers.</div>
                                            <input type="text" class="widget-newsletter__email" placeholder="Email Address..."> <button type="button" class="widget-newsletter__button">Subscribe</button>
                                        </form>
                                    </div>
                                </div>
                            </div> -->
                            <div class="post-view__item post-view__item-post">

                                
                                <div class="post-view__card img post mt-0">
                                    <div class="post__body typography">
										<figure class="mb-4">
                                            <img src="<?=main_url?><?=$expo->expert_image?>" class="" alt="image" style="height: 500px;width: 100%;">
                                        </figure>
                                        <p><?=$expo->expert_description?></p>
                                        <blockquote>
                                           <!--  <p>Sed a dictum elit. In iaculis porttitor luctus. Maecenas ultricies dolor et semper placerat. Proin at lectus felis.</p> -->
                                            <p><cite><?=$expo->expert_title?></cite></p>
                                        </blockquote>
                                        <!-- <p>Vivamus in nisi at turpis rhoncus feugiat. Mauris scelerisque non ante et ultrices. Donec sit amet sem lobortis, ullamcorper felis at, finibus sem. Curabitur tincidunt neque nunc.</p> -->
                                        <?php if($_SESSION['issaller'] || $_SESSION['isbuyer']){}else{?>
                                        <div class="text-center" align="center">
                                            <p class="h5">Do you want buy or sell product?</p>
                                            <button class="btn btn-primary" onclick="window.location.href='<?=base_url()?>buyer_login'">BUY NOW</button>
                                            <button class="btn btn-primary" onclick="window.location.href='<?=base_url()?>login-seller'">SELL NOW</button>
                                        </div>
                                        <?php }?>
                                    </div>
                                    <div class="post__footer">
                                        <!-- <div class="post__tags tags tags--sm">
                                            <div class="tags__list">
												<a>Promotion</a>
												<a>Power Tool</a>
												<a>Wrench</a>
												<a>Electrodes</a>
											</div>
                                        </div>
 -->                                        <!-- <div class="post__share-links share-links">
                                            <ul class="share-links__list">
                                                <li class="share-links__item share-links__item--type--like"><a href="#" target="_blank">Like</a></li>
                                                <li class="share-links__item share-links__item--type--tweet"><a href="#" target="_blank">Tweet</a></li>
                                                <li class="share-links__item share-links__item--type--pin"><a href="#" target="_blank">Pin It</a></li>
                                                <li class="share-links__item share-links__item--type--counter"><a href="#" target="_blank">4K</a></li>
                                            </ul>
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
			<?php } }?>

<!--  Start Footer Area -->
<?php include"footer.php"; ?>
<!-- End Footer Area -->				