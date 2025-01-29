<?php include 'includes/header.php'; ?>
<?php include 'includes/items.php'; ?>
    <!--==============================
    Breadcumb
============================== -->
    <div class="breadcumb-wrapper breadcumb-layout1 pt-175 pb-125" data-bg-src="assets/img/bg/bg-27.jpg" data-overlay="dark" data-opacity="6">
        <div class="container z-index-common">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title sec-title text-white">Shop</h1>
                <ul class="breadcumb-menu text-white pt-1">
                    <li><a href="index.php"><i class="far fa-home-lg"></i>Home</a></li>
                    <li class="active">Shop</li>
                </ul>
            </div>
        </div>
    </div>
    <!--==============================
    Shop Products Area
    ==============================-->
    <section class="vs-shop-wrapper space-top space-md-bottom">
        <div class="container">
            <div class="vs-sort-bar flex-row-reverse row justify-content-center justify-content-md-between align-items-center mb-30 ">
                <div class="col-auto">
                    <div class="row justify-content-center justify-content-md-between">
                        <div class=" col-md-auto d-flex justify-content-center align-items-center mb-3 mb-md-0">
                            <label class="text-body2" for="filterby">Filter By</label>
                            <select name="filterby" id="filterby" class="form-select">
                                <option value="productName">$0 - $200</option>
                                <option value="productName">$150 - $300</option>
                                <option value="productName">$300 - $500</option>
                            </select>
                        </div>
                        <div class=" col-md-auto d-flex justify-content-center align-items-center mb-3 mb-md-0">
                            <label class="text-body2" for="sortBy">Sort by</label>
                            <select name="sortBy" id="sortBy" class="form-select">
                                <option selected hidden>Date Listing</option>
                                <option value="productName">This Week</option>
                                <option value="productName">This Month</option>
                                <option value="productName">This Year</option>
                            </select>
                        </div>
                        <div class=" col-md-auto d-flex justify-content-center align-items-center mb-3 mb-md-0">
                            <label class="text-body2" for="showTotal">Show</label>
                            <select name="showTotal" id="showTotal" class="form-select">
                                <option value="productName">01</option>
                                <option value="productName">02</option>
                                <option value="productName">03</option>
                                <option value="productName">04</option>
                                <option value="productName">05</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col d-none d-md-block">
                    <div class="border-top"></div>
                </div>
                <div class="col-auto ">
                    <div class="nav" role="tablist">
                        <a href="shop.html" class="icon-btn style4 me-2 active" id="tab-shop-grid" data-bs-toggle="tab" data-bs-target="#tab-grid" role="tab" aria-controls="tab-grid" aria-selected="true"><i class="fas fa-th"></i></a>
                        <a href="shop-list.html" class="icon-btn style4  " id="tab-shop-list" data-bs-toggle="tab" data-bs-target="#tab-list" role="tab" aria-controls="tab-grid" aria-selected="false"><i class="far fa-bars"></i></a>
                    </div>
                </div>
            </div>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="tab-grid" role="tabpanel" aria-labelledby="tab-shop-grid">
                    <div class="row">
                        <?php 
                        foreach( $wheel as $key=>$wheels){
                        ?>
                        <div class="col-sm-6 col-lg-4 col-xl-3">
                            <div class="vs-product grid-view">
                                <div class="product-img">
                                    <a href="product-details.php?product_id=<?php echo $key;?>"><img src="<?php echo $wheels["img-main"];?>" alt="Product Image" class="w-100"></a>
                                    <div class="actions-btn">
                                       <a class="icon-btn style5" href="product-details.php?product_id=<?php echo $key;?>"><i class="far fa-search"></i></a>
                                    </div>
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
                <div class="tab-pane fade " id="tab-list" role="tabpanel" aria-labelledby="tab-shop-list">
                    <div class="row">
                        <div class="col-sm-6 col-lg-6 col-xl-4">
                            <div class="vs-product list-view ">
                                <div class="product-tag">Hot</div>
                                <div class="product-img">
                                    <a href="product-details.php"><img src="assets/img/shop/shop-list-1-1.jpg" alt="Product Image" class="w-100"></a>
                                    <div class="actions-btn">
                                        <a class="icon-btn style5" href="#"><i class="fal fa-heart"></i></a>
                                        <a class="icon-btn style5" href="#"><i class="fal fa-cart-plus"></i></a>
                                        <a class="icon-btn style5" href="#"><i class="far fa-search"></i></a>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                        <span style="width:100%">Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span> customer rating</span>
                                    </div>
                                    <h4 class="product-title h5 "><a href="product-details.php">Legend Series</a></h4>
                                    <span class="price text-theme"><strong>$78.00</strong></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-6 col-xl-4">
                            <div class="vs-product list-view ">
                                <div class="product-img">
                                    <a href="product-details.php"><img src="assets/img/shop/shop-list-1-2.jpg" alt="Product Image" class="w-100"></a>
                                    <div class="actions-btn">
                                        <a class="icon-btn style5" href="#"><i class="fal fa-heart"></i></a>
                                        <a class="icon-btn style5" href="#"><i class="fal fa-cart-plus"></i></a>
                                        <a class="icon-btn style5" href="#"><i class="far fa-search"></i></a>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                        <span style="width:100%">Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span> customer rating</span>
                                    </div>
                                    <h4 class="product-title h5 "><a href="product-details.php">Dually Series</a></h4>
                                    <span class="price text-theme"><strong>$41.00</strong></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-6 col-xl-4">
                            <div class="vs-product list-view ">
                                <div class="product-img">
                                    <a href="product-details.php"><img src="assets/img/shop/shop-list-1-3.jpg" alt="Product Image" class="w-100"></a>
                                    <div class="actions-btn">
                                        <a class="icon-btn style5" href="#"><i class="fal fa-heart"></i></a>
                                        <a class="icon-btn style5" href="#"><i class="fal fa-cart-plus"></i></a>
                                        <a class="icon-btn style5" href="#"><i class="far fa-search"></i></a>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                        <span style="width:100%">Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span> customer rating</span>
                                    </div>
                                    <h4 class="product-title h5 "><a href="product-details.php">Stock Series</a></h4>
                                    <span class="price text-theme"><strong>$230.00</strong></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-6 col-xl-4">
                            <div class="vs-product list-view ">
                                <div class="product-tag">Hot</div>
                                <div class="product-img">
                                    <a href="product-details.php"><img src="assets/img/shop/shop-list-1-4.jpg" alt="Product Image" class="w-100"></a>
                                    <div class="actions-btn">
                                        <a class="icon-btn style5" href="#"><i class="fal fa-heart"></i></a>
                                        <a class="icon-btn style5" href="#"><i class="fal fa-cart-plus"></i></a>
                                        <a class="icon-btn style5" href="#"><i class="far fa-search"></i></a>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                        <span style="width:100%">Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span> customer rating</span>
                                    </div>
                                    <h4 class="product-title h5 "><a href="product-details.php">Popular Series</a></h4>
                                    <span class="price text-theme"><strong>$199.00</strong></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-6 col-xl-4">
                            <div class="vs-product list-view ">
                                <div class="product-img">
                                    <a href="product-details.php"><img src="assets/img/shop/shop-list-1-5.jpg" alt="Product Image" class="w-100"></a>
                                    <div class="actions-btn">
                                        <a class="icon-btn style5" href="#"><i class="fal fa-heart"></i></a>
                                        <a class="icon-btn style5" href="#"><i class="fal fa-cart-plus"></i></a>
                                        <a class="icon-btn style5" href="#"><i class="far fa-search"></i></a>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                        <span style="width:100%">Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span> customer rating</span>
                                    </div>
                                    <h4 class="product-title h5 "><a href="product-details.php">Marko Model</a></h4>
                                    <span class="price text-theme"><strong>$136.00</strong></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-6 col-xl-4">
                            <div class="vs-product list-view ">
                                <div class="product-img">
                                    <a href="product-details.php"><img src="assets/img/shop/shop-list-1-6.jpg" alt="Product Image" class="w-100"></a>
                                    <div class="actions-btn">
                                        <a class="icon-btn style5" href="#"><i class="fal fa-heart"></i></a>
                                        <a class="icon-btn style5" href="#"><i class="fal fa-cart-plus"></i></a>
                                        <a class="icon-btn style5" href="#"><i class="far fa-search"></i></a>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                        <span style="width:100%">Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span> customer rating</span>
                                    </div>
                                    <h4 class="product-title h5 "><a href="product-details.php">Promo Series</a></h4>
                                    <span class="price text-theme"><strong>$899.00</strong></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-6 col-xl-4">
                            <div class="vs-product list-view ">
                                <div class="product-tag">Hot</div>
                                <div class="product-img">
                                    <a href="product-details.php"><img src="assets/img/shop/shop-list-1-7.jpg" alt="Product Image" class="w-100"></a>
                                    <div class="actions-btn">
                                        <a class="icon-btn style5" href="#"><i class="fal fa-heart"></i></a>
                                        <a class="icon-btn style5" href="#"><i class="fal fa-cart-plus"></i></a>
                                        <a class="icon-btn style5" href="#"><i class="far fa-search"></i></a>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                        <span style="width:100%">Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span> customer rating</span>
                                    </div>
                                    <h4 class="product-title h5 "><a href="product-details.php">Model BAW</a></h4>
                                    <span class="price text-theme"><strong>$23.00</strong></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-6 col-xl-4">
                            <div class="vs-product list-view ">
                                <div class="product-img">
                                    <a href="product-details.php"><img src="assets/img/shop/shop-list-1-8.jpg" alt="Product Image" class="w-100"></a>
                                    <div class="actions-btn">
                                        <a class="icon-btn style5" href="#"><i class="fal fa-heart"></i></a>
                                        <a class="icon-btn style5" href="#"><i class="fal fa-cart-plus"></i></a>
                                        <a class="icon-btn style5" href="#"><i class="far fa-search"></i></a>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                        <span style="width:100%">Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span> customer rating</span>
                                    </div>
                                    <h4 class="product-title h5 "><a href="product-details.php">Navana RR</a></h4>
                                    <span class="price text-theme"><strong>$56.00</strong></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-6 col-xl-4">
                            <div class="vs-product list-view ">
                                <div class="product-img">
                                    <a href="product-details.php"><img src="assets/img/shop/shop-list-1-9.jpg" alt="Product Image" class="w-100"></a>
                                    <div class="actions-btn">
                                        <a class="icon-btn style5" href="#"><i class="fal fa-heart"></i></a>
                                        <a class="icon-btn style5" href="#"><i class="fal fa-cart-plus"></i></a>
                                        <a class="icon-btn style5" href="#"><i class="far fa-search"></i></a>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                        <span style="width:100%">Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span> customer rating</span>
                                    </div>
                                    <h4 class="product-title h5 "><a href="product-details.php">Mega Brodbe</a></h4>
                                    <span class="price text-theme"><strong>$52.00</strong></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           <!-- <div class="vs-pagination mt-0 mt-lg-4 mb-30">
                <ul>
                    <li><a href="news.html" class="active">1</a></li>
                    <li><a href="news.html">2</a></li>
                    <li><a href="news.html">3</a></li>
                    <li><a href="news.html"><i class="fas fa-angle-right"></i></a></li>
                </ul>
            </div>-->
        </div>
    </section>
    <!--==============================
			Footer Area
	==============================-->
        <?php include 'includes/footer.php'; ?>