<?php include 'includes/items.php';?>
<?php
//get id from url
$id = $_GET['product_id'];

//↓if invalid id return to product page
if($wheel["$id"]["name"] == null){
    header("Location: product.php");
}
?>

<?php include 'includes/header.php' ?>

    <!--==============================
    Breadcumb
============================== -->
    <div class="breadcumb-wrapper breadcumb-layout1 pt-175 pb-125" data-bg-src="assets/img/bg/bg-27.jpg" data-overlay="dark" data-opacity="6">
        <div class="container z-index-common">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title sec-title text-white">Shop Details</h1>
                <ul class="breadcumb-menu text-white pt-1">
                    <li><a href="index.php"><i class="far fa-home-lg"></i>Home</a></li>
                    <li class="active">Shop Details</li>
                </ul>
            </div>
        </div>
    </div>
    <!--==============================
    Shop Products Details
    ==============================-->
    <section class="vs-shop-details space-top space-md-bottom">
        <div class="container">
            <div class="shop-wrap1 mb-80 bg-smoke">
                <div class="row gx-60">
                    <div class="col-lg-6 col-xl-6 mb-30 mb-lg-0">
                        <div class="product-big-img mb-4">
                            <p class="price">$<?php echo $wheel["$id"]["price"];?><del>$799</del></p>
                            <div class="img-fullsize">
                                <img src="<?php echo $wheel["$id"]["img-detail"];?>" alt="Project Image" class="w-100">
                                <a href="<?php echo $wheel["$id"]["img-detail"];?>" class="popup-icon popup-image"><i class="far fa-search"></i></a>
                            </div>
                        </div>
                        <div class="product-thumb-area vs-carousel row" data-slide-show="4" data-md-slide-show="3" data-sm-slide-show="4" data-xs-slide-show="2" data-focuson-select="false">
                            <div class="product-thumb col-lg-3">
                                <img src="assets/img/shop/shop-d-th-1.jpg" data-big-img="assets/img/shop/<?php echo $image;?>" alt="Thumb Image" class="w-100">
                            </div>
                            <div class="product-thumb col-lg-3">
                                <img src="assets/img/shop/shop-d-th-2.jpg" data-big-img="assets/img/shop/shop-d-1-2.jpg" alt="Thumb Image" class="w-100">
                            </div>
                            <div class="product-thumb col-lg-3">
                                <img src="assets/img/shop/shop-d-th-3.jpg" data-big-img="assets/img/shop/shop-d-1-3.jpg" alt="Thumb Image" class="w-100">
                            </div>
                            <div class="product-thumb col-lg-3">
                                <img src="assets/img/shop/shop-d-th-4.jpg" data-big-img="assets/img/shop/shop-d-1-4.jpg" alt="Thumb Image" class="w-100">
                            </div>
                            <div class="product-thumb col-lg-3">
                                <img src="assets/img/shop/shop-d-th-5.jpg" data-big-img="assets/img/shop/shop-d-1-5.jpg" alt="Thumb Image" class="w-100">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-6 align-self-center">
                        <div class="product-details mt-n1">
                            <div class="woocommerce-product-rating">
                                <div class="star-rating" role="img" aria-label="Rated 4.00 out of 5">
                                    <span style="width:75%">Rated
                                        <strong class="rating">4.00</strong> out of 5 based on
                                        <span class="rating">1</span> customer rating
                                    </span>
                                </div>
                                <a href="#" class="woocommerce-review-link">(<span class="count">1</span> customer review)</a>
                            </div>
                            <div class="row">
                                <div class="col-xxl-10">
                                    <h2 class="product-title d-xl-inline-block h3"><?php echo $wheel["$id"]["name"];?></h2>
                                    <p class="mb-2">Credibly mesh technically sound results whereas cost effective leadership skills.</p>
                                </div>
                            </div>
                            <a href="#" class="link-btn add_to_wishlist"><i class="far fa-heart"></i>Add To Wishlist</a>
                            <div class="input-group mt-4">
                                <div class="mr-15 fw-bold">Color :</div>
                                <div class="color-select row gx-0">
                                    <div class="col-auto">
                                        <input type="radio" name="colorselect" id="color1" checked>
                                        <label for="color1"><span data-bg-color="#a541f2"></span></label>
                                    </div>
                                    <div class="col-auto">
                                        <input type="radio" name="colorselect" id="color2">
                                        <label for="color2"><span data-bg-color="#ee672c"></span></label>
                                    </div>
                                    <div class="col-auto">
                                        <input type="radio" name="colorselect" id="color3">
                                        <label for="color3"><span data-bg-color="#8ee122"></span></label>
                                    </div>
                                    <div class="col-auto">
                                        <input type="radio" name="colorselect" id="color4">
                                        <label for="color4"><span data-bg-color="#252fb0"></span></label>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mt-4 pt-1">
                                <div class="mr-15 fw-bold">Wheel Size :</div>
                                <div class="size-select row gx-2">
                                    <div class="col-auto">
                                        <input type="radio" id="size16" name="sizeselect" checked>
                                        <label for="size16">16"</label>
                                    </div>
                                    <div class="col-auto">
                                        <input type="radio" id="size18" name="sizeselect">
                                        <label for="size18">18"</label>
                                    </div>
                                    <div class="col-auto">
                                        <input type="radio" id="size24" name="sizeselect">
                                        <label for="size24">24"</label>
                                    </div>
                                </div>
                            </div>
                            <div class="actions mt-4 pt-1">
                                <div class="quantity me-4">
                                    <input type="number" class="qty-input border-0" value="1" min="1" max="99">
                                    <button class="quantity-minus qut-btn"><i class="far fa-chevron-down"></i></button>
                                    <button class="quantity-plus qut-btn"><i class="far fa-chevron-up"></i></button>
                                </div>
                                <a href="#" class="vs-btn shadow-none">Add To Cart<i class="fas fa-chevron-right"></i></a>
                            </div>
                            <div class="product_meta fs-xs mt-3 pt-1">
                                <span>Product By: <span class="sku">Hueiler Inc.LTD</span></span>
                                <span>SKU: <span class="sku"><?php echo $wheel["$id"]["sku"];?></span></span>
                                <span>Category: <a href="product.php">Cleanup</a><a href="product.php">Repire</a></span>
                                <span>Tag: <a href="product.php"> trendy</a></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <ul class="nav product-tab mb-30 justify-content-center mb-4" id="productTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="description-tab" data-bs-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Description</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link " id="reviews-tab" data-bs-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Review (02)</a>
                </li>
            </ul>
            <div class="row justify-content-center">
                <div class="col-xl-9 col-xxl-8">
                    <div class="tab-content mb-25 " id="productTabContent">
                        <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                            <div class="product-desc  ">
                                <p><?php echo $wheel["$id"]["description"];?></p>
                                <div class="row mt-30">
                                    <div class="col-lg-6 mb-30">
                                        <img src="assets/img/shop/shop-dd-1-2.jpg" class="w-100" alt="Shop Image">
                                    </div>
                                    <div class="col-lg-6 mb-30">
                                        <img src="assets/img/shop/shop-dd-1-3.jpg" class="w-100" alt="Shop Image">
                                    </div>
                                </div>
                                <p>Progressively supply clicks-and-mortar human capital through enterprise-wide web services. Objectively provide access to extensible processes through 24/365 solutions. Professionally actualize client-based leadership via out-of-the-box supply chains.</p>
                                <h3 class="inner-title h4 pt-4 mt-4">Additional Features</h3>
                                <p>Progressively supply clicks-and-mortar human capital through enterprise-wide web services. Objectively provide access to extensible processes through 24/365 solutions.</p>
                                <div class="row  mt-4">
                                    <div class="col-lg-5">
                                        <ul class="product-info-list">
                                            <li><span>Low:</span> 588 G / KM</li>
                                            <li><span>Mid:</span> 360 G / KM</li>
                                            <li><span>High:</span> 318 G / KM</li>
                                            <li><span>Extra High:</span> 348 G / KM</li>
                                            <li><span>Combined:</span> 373 G/ KM</li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="vs-text-box bg-smoke">
                                            Enthusiastically transition multidisciplinary "outside the box" thinking without premium networks services.
                                        </div>
                                    </div>
                                </div>
                                <p>Assertively conceptualize parallel process improvements through user friendly action items. Interactively cultivate interdependent customer service without clicks-and-mortar e-services. Proactively cultivate go forward testing procedures with accurate quality vectors. Globally embrace ethical functionalities via empowered scenarios.</p>
                                <p>Enthusiastically transition multidisciplinary "outside the box" thinking without premium networks. Progressively supply clicks-and-mortar human capital through enterprise-wide web services. Objectively provide access to extensible processes through 24/365 solutions. Professionally actualize client-based leadership via out-of-the-box supply chains. Collaboratively unleash e-business human capital through plug-and-play metrics.</p>
                            </div>
                        </div>
                        <div class="tab-pane fade " id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                            <div class="vs-comment-area list-style-none vs-comments-layout1 pt-3 ">
                                <ul class="comment-list">
                                    <li class="review vs-comment">
                                        <div class="vs-post-comment">
                                            <div class="author-img">
                                                <img src="assets/img/blog/comment-author-1.jpg" alt="Comment Author">
                                            </div>
                                            <div class="comment-content">
                                                <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                                    <span style="width:100%">Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span> customer rating</span>
                                                </div>
                                                <h4 class="name h5">Mark Jack</h4>
                                                <span class="commented-on">22 April, 2020</span>
                                                <p class="text">Progressively procrastinate mission-critical action items before team building ROI.
                                                    Interactively provide access to cross functional quality vectors for client-centric catalysts for change.
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="review vs-comment">
                                        <div class="vs-post-comment">
                                            <div class="author-img">
                                                <img src="assets/img/blog/comment-author-2.jpg" alt="Comment Author">
                                            </div>
                                            <div class="comment-content">
                                                <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                                    <span style="width:100%">Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span> customer rating</span>
                                                </div>
                                                <h4 class="name h5">John Deo</h4>
                                                <span class="commented-on">26 April, 2020</span>
                                                <p class="text">Competently provide access to fully researched methods of empowerment without sticky models. Credibly morph front-end niche markets whereas 2.0 users. Enthusiastically seize team.</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="review vs-comment">
                                        <div class="vs-post-comment">
                                            <div class="author-img">
                                                <img src="assets/img/blog/comment-author-3.jpg" alt="Comment Author">
                                            </div>
                                            <div class="comment-content">
                                                <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                                    <span style="width:100%">Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span> customer rating</span>
                                                </div>
                                                <h4 class="name h5">Tara sing</h4>
                                                <span class="commented-on">26 April, 2020</span>
                                                <p class="text">Competently provide access to fully researched methods of empowerment without sticky models. Credibly morph front-end niche markets whereas 2.0 users. Enthusiastically seize team.</p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div> <!-- Comment Form -->
                            <div class="vs-comment-form pt-3">
                                <div class="form-title">
                                    <h3 class="h4 mb-3">Add a review</h3>
                                </div>
                                <div class="row">
                                    <div class="form-group mb-3 rating-select d-flex align-items-center">
                                        <label>Your Rating</label>
                                        <p class="stars">
                                            <span>
                                                <a class="star-1" href="#">1</a>
                                                <a class="star-2" href="#">2</a>
                                                <a class="star-3" href="#">3</a>
                                                <a class="star-4" href="#">4</a>
                                                <a class="star-5" href="#">5</a>
                                            </span>
                                        </p>
                                    </div>
                                    <div class="col-12 form-group mb-4">
                                        <textarea placeholder="Write a Message" class="form-control"></textarea>
                                    </div>
                                    <div class="col-md-6 form-group mb-4">
                                        <input type="text" placeholder="Your Name" class="form-control">
                                    </div>
                                    <div class="col-md-6 form-group mb-4 ">
                                        <input type="text" placeholder="Your Email" class="form-control">
                                    </div>
                                    <div class="col-12 form-group mb-4">
                                        <input id="reviewcheck" name="reviewcheck" type="checkbox">
                                        <label for="reviewcheck">Save my name, email, and website in this browser for the next time I comment.<span class="checkmark"></span></label>
                                    </div>
                                    <div class="col-12 form-group mb-0">
                                        <button class="vs-btn">Post Review<i class="fas fa-chevron-right"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--==============================
    Related Products
    ==============================-->
    <section class="vs-related-products space-md-bottom">
        <div class="container">
            <h2 class="mt-n2 mb-5">Related Products</h2>
            <div class="row vs-carousel" data-slide-show="4" data-lg-slide-show="3" data-sm-slide-show="2">
                                       <?php 
                        foreach( $wheel as $key=>$wheels){
                        ?>
                        <div class="col-sm-6 col-lg-4 col-xl-3">
                            <div class="vs-product grid-view">
                                <div class="product-img">
                                    <a href="product-details.php?product_id=<?php echo $key;?>"><img src="<?php echo $wheels["img-main"];?>" alt="Product Image" class="w-100"></a>
                                   
                                </div>
                                <div class="product-content">
                                    <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                        <span style="width:100%">Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span> customer rating</span>
                                    </div>
                                    <h4 class="product-title h5 "><a href="product-details.php?product_id=<?php echo $key;?>"><?php echo $wheels["name"];?></a></h4>
                                    <span class="price text-theme"><strong>$<?php echo $wheels["price"];?></strong></span>
                                </div>
                            </div>
                        </div>
                        
                        <?php } ?>
            </div>
        </div>
    </section>
    <!--==============================
			Footer Area
	==============================-->
    <?php include 'includes/footer.php'; ?>