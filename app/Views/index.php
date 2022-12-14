<?= $this->extend(THEME . 'template') ?>

<?= $this->section('content') ?>

<div class="banner_section slide_medium shop_banner_slider staggered-animation-wrap">
    <div id="carouselExampleControls" class="carousel slide carousel-fade light_arrow" data-ride="carousel" autoplay="true">
        <div class="carousel-inner">
            <?php foreach ($rand_slider as $row)  ?>
            <div class="carousel-item active background_bg" data-img-src="<?= $row['image'] ?>">
                <div class="banner_slide_content">
                    <div class="container">
                        <!-- STRART CONTAINER -->
                        <div class="row">
                            <div class="col-lg-7 col-9">
                                <div class="banner_content overflow-hidden">
                                    <!-- <h5 class="mb-3 staggered-animation font-weight-light" data-animation="slideInLeft" data-animation-delay="0.5s">Get up to 50% off Today Only!</h5> -->
                                    <h2 class="staggered-animation" data-animation="slideInLeft" data-animation-delay="1s">Fashion</h2>
                                    <a class="btn btn-fill-out rounded-0 staggered-animation text-uppercase" href="<?= $row['link'] ?>" data-animation="slideInLeft" data-animation-delay="1.5s">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div><!-- END CONTAINER-->
                </div>
            </div>
            <?php foreach ($rand_slider as $row) { ?>
                <div class="carousel-item background_bg" data-img-src="<?= $row['image'] ?>">
                    <div class="banner_slide_content">
                        <div class="container">
                            <!-- STRART CONTAINER -->
                            <div class="row">
                                <div class="col-lg-7 col-9">
                                    <div class="banner_content overflow-hidden">
                                        <!-- <h5 class="mb-3 staggered-animation font-weight-light" data-animation="slideInLeft" data-animation-delay="0.5s">Get up to 50% off Today Only!</h5> -->
                                        <h2 class="staggered-animation" data-animation="slideInLeft" data-animation-delay="1s">Fashion</h2>
                                        <a class="btn btn-fill-out rounded-0 staggered-animation text-uppercase" href="<?= $row['link'] ?>" data-animation="slideInLeft" data-animation-delay="1.5s">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        </div><!-- END CONTAINER-->
                    </div>
                </div>
            <?php } ?>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev"><i class="ion-chevron-left"></i></a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next"><i class="ion-chevron-right"></i></a>
    </div>
</div>
<!-- START SECTION BANNER -->
<div class="section pb_20">
    <div class="container">
        <div class="row">
            <?php foreach ($coupon as $row) { ?>
                <div class="col-md-6">
                    <div class="single_banner">
                        <img src="<?= $row['image'] ?>" alt="shop_banner_img1" />
                        <div class="single_banner_info">
                            <h5 class="single_bn_title1">Coupon Discount</h5>
                            <h6 class="single_bn_title">Get Discount on Minimum purchase of &#8377 <?= $row['cart_min_value'] ?></h6>
                            <!-- <p>Coupon Code</p> -->
                            <h5 class="coupon-code"><?= $row['coupon_code'] ?></h5>
                            <a href="<?= url('Home/shoplist') ?>" class="single_bn_link">Shop Now</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<!-- END SECTION BANNER -->

<!-- START SECTION SHOP -->
<div class="section small_pt pb_70">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="heading_s1 text-center">
                    <h2>Exclusive Products</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="tab-style1">
                    <ul class="nav nav-tabs justify-content-center" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="arrival-tab" data-toggle="tab" href="#arrival" role="tab" aria-controls="arrival" aria-selected="true">New Arrival</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="sellers-tab" data-toggle="tab" href="#sellers" role="tab" aria-controls="sellers" aria-selected="false">Best Sellers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="featured-tab" data-toggle="tab" href="#featured" role="tab" aria-controls="featured" aria-selected="false">Featured</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" id="special-tab" data-toggle="tab" href="#special" role="tab" aria-controls="special" aria-selected="false">Special Offer
                            </a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link" id="most-views-tab" data-toggle="tab" href="#most-views" role="tab" aria-controls="most-views" aria-selected="false">Most Viewed
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="arrival" role="tabpanel" aria-labelledby="arrival-tab">
                        <div class="row shop_container">
                            <?php foreach ($latest_product as $row) { ?>
                                <div class="col-lg-3 col-md-4 col-6">
                                    <a href="<?= url('Home/productdetail/' . $row['id']) ?>">
                                        <div class="product">
                                            <a class="product_img" href="<?= url('Home/productdetail/' . $row['id']) ?>">
                                                <img src="<?= $row['image'] ?>" alt="product_img1" style="width: 300px;height:300px;">
                                            </a>
                                            <div class="product-left-hover-overlay">
                                                <ul class="left-over-buttons">
                                                    <li><a class="d-inline-flex circle align-items-center justify-content-center wish" id="wishlist" data-product_id="<?php echo @$row['id'] ?> " data-price="<?= @$row['listedprice'] ?>" data-quantity="1"><i class="far fa-heart position-absolute"></i></a></li>
                                                    <li><a class="d-inline-flex circle align-items-center justify-content-center  cartbtn" id="cartbtn" data-product_id="<?php echo @$row['id'] ?> " data-price="<?= @$row['listedprice'] ?>" data-quantity="1"><i class="icon-basket-loaded position-absolute"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="product_info">
                                            <div class="elso_titl"><span class="small"><?= $row['category_name'] ?></span></div>
                                                <h6 class="product_title"><a href="<?= url('Home/productdetail/' . $row['id']) ?>"><?= $row['name'] ?></a></h6>
                                                <div class="product_price">
                                                    <span class="price">&#8377 <?= $row['listedprice'] ?></span>
                                                    <del>&#8377 <?= $row['price'] ?></del>
                                                    <div class="on_sale">
                                                        <span><?= $row['discount'] ?>% Off</span>
                                                    </div>
                                                </div>
                                                <div class="rating_wrap">
                                                    <div class="">
                                                        <div class="single_capt_right">
                                                            <div class="star-rating align-items-center d-flex justify-content-left mb-1 p-0">
                                                                <?php for ($i = 1; $i <= get_review_count(@$row['id']); $i++) { ?>
                                                                    <i class="fas fa-star filled" value="1"></i>
                                                                <?php } ?>
                                                                <?php for ($i = 1; $i <= 5 - (int)get_review_count(@$row['id']); $i++) { ?>
                                                                    <i class="far fa-star filled" value="1"></i>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <span class="rating_num">(<?= get_review_total($row['id']) ?>)</span>
                                                </div>
                                                <div class="pr_desc">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p>
                                                </div>
                                                <!-- <div class="pr_switch_wrap">
                                                <div class="product_color_switch">
                                                    <span class="active" data-color="#87554B"></span>
                                                    <span data-color="#333333"></span>
                                                    <span data-color="#DA323F"></span>
                                                </div>
                                            </div> -->
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php } ?>
                            <div class="" style="margin-left: 500px;">
                                <a href="<?= url('Home/shoplist') ?>" class="btn btn-fill-out rounded-0">Explore More</a>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="sellers" role="tabpanel" aria-labelledby="sellers-tab">
                        <div class="row shop_container">
                            <?php foreach ($top_seller as $row) { ?>
                                <div class="col-lg-3 col-md-4 col-6">
                                    <a href="<?= url('Home/productdetail/' . $row['id']) ?>">
                                        <div class="product">
                                            <a class="product_img" href="<?= url('Home/productdetail/' . $row['id']) ?>">
                                                <img src="<?= $row['image'] ?>" alt="product_img1" style="width: 300px;height:300px;">
                                            </a>
                                            <div class="product-left-hover-overlay">
                                                <ul class="left-over-buttons">
                                                    <li><a class="d-inline-flex circle align-items-center justify-content-center wish" id="wishlist" data-product_id="<?php echo @$row['id'] ?> " data-price="<?= @$row['listedprice'] ?>" data-quantity="1"><i class="far fa-heart position-absolute"></i></a></li>
                                                    <li><a class="d-inline-flex circle align-items-center justify-content-center  cartbtn" id="cartbtn" data-product_id="<?php echo @$row['id'] ?> " data-price="<?= @$row['listedprice'] ?>" data-quantity="1"><i class="icon-basket-loaded position-absolute"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="product_info">
                                            <div class="elso_titl"><span class="small"><?= $row['category_name'] ?></span></div>
                                                <h6 class="product_title"><a href="<?= url('Home/productdetail/' . $row['id']) ?>"><?= $row['name'] ?></a></h6>
                                                <div class="product_price">
                                                    <span class="price">&#8377 <?= $row['listedprice'] ?></span>
                                                    <del>&#8377 <?= $row['price'] ?></del>
                                                    <div class="on_sale">
                                                        <span><?= $row['discount'] ?>% Off</span>
                                                    </div>
                                                </div>
                                                <div class="rating_wrap">
                                                    <div class="">
                                                        <div class="single_capt_right">
                                                            <div class="star-rating align-items-center d-flex justify-content-left mb-1 p-0">
                                                                <?php for ($i = 1; $i <= get_review_count(@$row['id']); $i++) { ?>
                                                                    <i class="fas fa-star filled" value="1"></i>
                                                                <?php } ?>
                                                                <?php for ($i = 1; $i <= 5 - (int)get_review_count(@$row['id']); $i++) { ?>
                                                                    <i class="far fa-star filled" value="1"></i>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <span class="rating_num">(<?= get_review_total($row['id']) ?>)</span>
                                                </div>
                                                <div class="pr_desc">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p>
                                                </div>
                                                <!-- <div class="pr_switch_wrap">
                                                <div class="product_color_switch">
                                                    <span class="active" data-color="#87554B"></span>
                                                    <span data-color="#333333"></span>
                                                    <span data-color="#DA323F"></span>
                                                </div>
                                            </div> -->
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php } ?>
                            <div class="" style="margin-left: 500px;">
                                <a href="<?= url('Home/shoplist') ?>" class="btn btn-fill-out rounded-0">Explore More</a>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="featured" role="tabpanel" aria-labelledby="featured-tab">
                        <div class="row shop_container">
                            <?php foreach ($featured_product as $row) { ?>
                                <div class="col-lg-3 col-md-4 col-6">
                                    <a href="<?= url('Home/productdetail/' . $row['id']) ?>">
                                        <div class="product">
                                            <a class="product_img" href="<?= url('Home/productdetail/' . $row['id']) ?>">
                                                <img src="<?= $row['image'] ?>" alt="product_img1" style="width: 300px;height:300px;">
                                            </a>
                                            <div class="product-left-hover-overlay">
                                                <ul class="left-over-buttons">
                                                    <li><a class="d-inline-flex circle align-items-center justify-content-center wish" id="wishlist" data-product_id="<?php echo @$row['id'] ?> " data-price="<?= @$row['listedprice'] ?>" data-quantity="1"><i class="far fa-heart position-absolute"></i></a></li>
                                                    <li><a class="d-inline-flex circle align-items-center justify-content-center  cartbtn" id="cartbtn" data-product_id="<?php echo @$row['id'] ?> " data-price="<?= @$row['listedprice'] ?>" data-quantity="1"><i class="icon-basket-loaded position-absolute"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="product_info">
                                            <div class="elso_titl"><span class="small"><?= $row['category_name'] ?></span></div>
                                                <h6 class="product_title"><a href="<?= url('Home/productdetail/' . $row['id']) ?>"><?= $row['name'] ?></a></h6>
                                                <div class="product_price">
                                                    <span class="price">&#8377 <?= $row['listedprice'] ?></span>
                                                    <del>&#8377 <?= $row['price'] ?></del>
                                                    <div class="on_sale">
                                                        <span><?= $row['discount'] ?>% Off</span>
                                                    </div>
                                                </div>
                                                <div class="rating_wrap">
                                                    <div class="">
                                                        <div class="single_capt_right">
                                                            <div class="star-rating align-items-center d-flex justify-content-left mb-1 p-0">
                                                                <?php for ($i = 1; $i <= get_review_count(@$row['id']); $i++) { ?>
                                                                    <i class="fas fa-star filled" value="1"></i>
                                                                <?php } ?>
                                                                <?php for ($i = 1; $i <= 5 - (int)get_review_count(@$row['id']); $i++) { ?>
                                                                    <i class="far fa-star filled" value="1"></i>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <span class="rating_num">(<?= get_review_total($row['id']) ?>)</span>
                                                </div>
                                                <div class="pr_desc">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p>
                                                </div>
                                                <!-- <div class="pr_switch_wrap">
                                                <div class="product_color_switch">
                                                    <span class="active" data-color="#87554B"></span>
                                                    <span data-color="#333333"></span>
                                                    <span data-color="#DA323F"></span>
                                                </div>
                                            </div> -->
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php } ?>
                            <div class="" style="margin-left: 500px;">
                                <a href="<?= url('Home/shoplist') ?>" class="btn btn-fill-out rounded-0">Explore More</a>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="tab-pane fade" id="special" role="tabpanel" aria-labelledby="special-tab">
                        <div class="row shop_container">
                            <div class="col-lg-3 col-md-4 col-6">
                                <div class="product">
                                    <div class="product_img">
                                        <a href="<?= url('Home/productdetail/' . $row['id']) ?>">
                                            <img src="<?= ASSETS; ?>images/product_img4.jpg" alt="product_img4">
                                        </a>
                                        <div class="product_action_box">
                                            <ul class="list_none pr_action_btn">
                                                <li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                                <li><a href="shop-compare.html" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
                                                <li><a href="shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                                <li><a href="#"><i class="icon-heart"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product_info">
                                        <h6 class="product_title"><a href="<?= url('Home/productdetail/' . $row['id']) ?>">light blue Shirt</a></h6>
                                        <div class="product_price">
                                            <span class="price">$69.00</span>
                                            <del>$89.00</del>
                                            <div class="on_sale">
                                                <span>20% Off</span>
                                            </div>
                                        </div>
                                        <div class="rating_wrap">
                                            <div class="rating">
                                                <div class="product_rate" style="width:70%"></div>
                                            </div>
                                            <span class="rating_num">(22)</span>
                                        </div>
                                        <div class="pr_desc">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p>
                                        </div>
                                        <div class="pr_switch_wrap">
                                            <div class="product_color_switch">
                                                <span class="active" data-color="#333333"></span>
                                                <span data-color="#A92534"></span>
                                                <span data-color="#B9C2DF"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-6">
                                <div class="product">
                                    <div class="product_img">
                                        <a href="<?= url('Home/productdetail/' . $row['id']) ?>">
                                            <img src="<?= ASSETS; ?>images/product_img9.jpg" alt="product_img9">
                                        </a>
                                        <div class="product_action_box">
                                            <ul class="list_none pr_action_btn">
                                                <li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                                <li><a href="shop-compare.html" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
                                                <li><a href="shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                                <li><a href="#"><i class="icon-heart"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product_info">
                                        <h6 class="product_title"><a href="<?= url('Home/productdetail/' . $row['id']) ?>">T-Shirt Form Girls</a></h6>
                                        <div class="product_price">
                                            <span class="price">$45.00</span>
                                            <del>$55.25</del>
                                            <div class="on_sale">
                                                <span>35% Off</span>
                                            </div>
                                        </div>
                                        <div class="rating_wrap">
                                            <div class="">
                                                <div class="single_capt_right">
                                                    <div class="star-rating align-items-center d-flex justify-content-left mb-1 p-0">
                                                        <?php for ($i = 1; $i <= get_review_count(@$row['id']); $i++) { ?>
                                                            <i class="fas fa-star filled" value="1"></i>
                                                        <?php } ?>
                                                        <?php for ($i = 1; $i <= 5 - (int)get_review_count(@$row['id']); $i++) { ?>
                                                            <i class="far fa-star filled" value="1"></i>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <span class="rating_num">(<?= get_review_total($row['id']) ?>)</span>
                                        </div>
                                        <div class="pr_desc">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p>
                                        </div>
                                        <div class="pr_switch_wrap">
                                            <div class="product_color_switch">
                                                <span class="active" data-color="#B5B6BB"></span>
                                                <span data-color="#333333"></span>
                                                <span data-color="#DA323F"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-6">
                                <div class="product">
                                    <div class="product_img">
                                        <a href="<?= url('Home/productdetail/' . $row['id']) ?>">
                                            <img src="<?= ASSETS; ?>images/product_img8.jpg" alt="product_img8">
                                        </a>
                                        <div class="product_action_box">
                                            <ul class="list_none pr_action_btn">
                                                <li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                                <li><a href="shop-compare.html" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
                                                <li><a href="shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                                <li><a href="#"><i class="icon-heart"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product_info">
                                        <h6 class="product_title"><a href="<?= url('Home/productdetail/' . $row['id']) ?>">Men Checks Casual Shirt</a></h6>
                                        <div class="product_price">
                                            <span class="price">$69.00</span>
                                            <del>$89.00</del>
                                            <div class="on_sale">
                                                <span>20% Off</span>
                                            </div>
                                        </div>
                                        <div class="rating_wrap">
                                            <div class="rating">
                                                <div class="product_rate" style="width:70%"></div>
                                            </div>
                                            <span class="rating_num">(22)</span>
                                        </div>
                                        <div class="pr_desc">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p>
                                        </div>
                                        <div class="pr_switch_wrap">
                                            <div class="product_color_switch">
                                                <span class="active" data-color="#333333"></span>
                                                <span data-color="#444653"></span>
                                                <span data-color="#B9C2DF"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-6">
                                <div class="product">
                                    <span class="pr_flash">New</span>
                                    <div class="product_img">
                                        <a href="<?= url('Home/productdetail/' . $row['id']) ?>">
                                            <img src="<?= ASSETS; ?>images/product_img1.jpg" alt="product_img1">
                                        </a>
                                        <div class="product_action_box">
                                            <ul class="list_none pr_action_btn">
                                                <li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                                <li><a href="shop-compare.html" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
                                                <li><a href="shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                                <li><a href="#"><i class="icon-heart"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product_info">
                                        <h6 class="product_title"><a href="<?= url('Home/productdetail/' . $row['id']) ?>">Blue Dress For Woman</a></h6>
                                        <div class="product_price">
                                            <span class="price">$45.00</span>
                                            <del>$55.25</del>
                                            <div class="on_sale">
                                                <span>35% Off</span>
                                            </div>
                                        </div>
                                        <div class="rating_wrap">
                                            <div class="">
                                                <div class="single_capt_right">
                                                    <div class="star-rating align-items-center d-flex justify-content-left mb-1 p-0">
                                                        <?php for ($i = 1; $i <= get_review_count(@$row['id']); $i++) { ?>
                                                            <i class="fas fa-star filled" value="1"></i>
                                                        <?php } ?>
                                                        <?php for ($i = 1; $i <= 5 - (int)get_review_count(@$row['id']); $i++) { ?>
                                                            <i class="far fa-star filled" value="1"></i>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <span class="rating_num">(<?= get_review_total($row['id']) ?>)</span>
                                        </div>
                                        <div class="pr_desc">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p>
                                        </div>
                                        <div class="pr_switch_wrap">
                                            <div class="product_color_switch">
                                                <span class="active" data-color="#87554B"></span>
                                                <span data-color="#333333"></span>
                                                <span data-color="#DA323F"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-6">
                                <div class="product">
                                    <div class="product_img">
                                        <a href="<?= url('Home/productdetail/' . $row['id']) ?>">
                                            <img src="<?= ASSETS; ?>images/product_img12.jpg" alt="product_img12">
                                        </a>
                                        <div class="product_action_box">
                                            <ul class="list_none pr_action_btn">
                                                <li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                                <li><a href="shop-compare.html" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
                                                <li><a href="shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                                <li><a href="#"><i class="icon-heart"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product_info">
                                        <span class="pr_flash bg-danger">Hot</span>
                                        <h6 class="product_title"><a href="<?= url('Home/productdetail/' . $row['id']) ?>">Black T-shirt for woman</a></h6>
                                        <div class="product_price">
                                            <span class="price">$69.00</span>
                                            <del>$89.00</del>
                                            <div class="on_sale">
                                                <span>20% Off</span>
                                            </div>
                                        </div>
                                        <div class="rating_wrap">
                                            <div class="rating">
                                                <div class="product_rate" style="width:70%"></div>
                                            </div>
                                            <span class="rating_num">(22)</span>
                                        </div>
                                        <div class="pr_desc">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p>
                                        </div>
                                        <div class="pr_switch_wrap">
                                            <div class="product_color_switch">
                                                <span class="active" data-color="#1B1B25"></span>
                                                <span data-color="#444653"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-6">
                                <div class="product">
                                    <div class="product_img">
                                        <a href="<?= url('Home/productdetail/' . $row['id']) ?>">
                                            <img src="<?= ASSETS; ?>images/product_img6.jpg" alt="product_img6">
                                        </a>
                                        <div class="product_action_box">
                                            <ul class="list_none pr_action_btn">
                                                <li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                                <li><a href="shop-compare.html" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
                                                <li><a href="shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                                <li><a href="#"><i class="icon-heart"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product_info">
                                        <h6 class="product_title"><a href="<?= url('Home/productdetail/' . $row['id']) ?>">Blue casual check shirt</a></h6>
                                        <div class="product_price">
                                            <span class="price">$55.00</span>
                                            <del>$95.00</del>
                                            <div class="on_sale">
                                                <span>25% Off</span>
                                            </div>
                                        </div>
                                        <div class="rating_wrap">
                                            <div class="rating">
                                                <div class="product_rate" style="width:68%"></div>
                                            </div>
                                            <span class="rating_num">(15)</span>
                                        </div>
                                        <div class="pr_desc">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p>
                                        </div>
                                        <div class="pr_switch_wrap">
                                            <div class="product_color_switch">
                                                <span class="active" data-color="#87554B"></span>
                                                <span data-color="#333333"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-6">
                                <div class="product">
                                    <span class="pr_flash bg-success">Sale</span>
                                    <div class="product_img">
                                        <a href="<?= url('Home/productdetail/' . $row['id']) ?>">
                                            <img src="<?= ASSETS; ?>images/product_img7.jpg" alt="product_img7">
                                        </a>
                                        <div class="product_action_box">
                                            <ul class="list_none pr_action_btn">
                                                <li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                                <li><a href="shop-compare.html" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
                                                <li><a href="shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                                <li><a href="#"><i class="icon-heart"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product_info">
                                        <h6 class="product_title"><a href="<?= url('Home/productdetail/' . $row['id']) ?>">white black line dress</a></h6>
                                        <div class="product_price">
                                            <span class="price">$68.00</span>
                                            <del>$99.00</del>
                                            <div class="on_sale">
                                                <span>20% Off</span>
                                            </div>
                                        </div>
                                        <div class="rating_wrap">
                                            <div class="rating">
                                                <div class="product_rate" style="width:87%"></div>
                                            </div>
                                            <span class="rating_num">(25)</span>
                                        </div>
                                        <div class="pr_desc">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p>
                                        </div>
                                        <div class="pr_switch_wrap">
                                            <div class="product_color_switch">
                                                <span class="active" data-color="#333333"></span>
                                                <span data-color="#7C502F"></span>
                                                <span data-color="#2F366C"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-6">
                                <div class="product">
                                    <div class="product_img">
                                        <a href="<?= url('Home/productdetail/' . $row['id']) ?>">
                                            <img src="<?= ASSETS; ?>images/product_img11.jpg" alt="product_img11">
                                        </a>
                                        <div class="product_action_box">
                                            <ul class="list_none pr_action_btn">
                                                <li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                                <li><a href="shop-compare.html" class="popup-ajax"><i class="icon-shuffle"></i></a></li>
                                                <li><a href="shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                                <li><a href="#"><i class="icon-heart"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product_info">
                                        <h6 class="product_title"><a href="<?= url('Home/productdetail/' . $row['id']) ?>">Black dress for woman</a></h6>
                                        <div class="product_price">
                                            <span class="price">$68.00</span>
                                            <del>$99.00</del>
                                            <div class="on_sale">
                                                <span>20% Off</span>
                                            </div>
                                        </div>
                                        <div class="rating_wrap">
                                            <div class="rating">
                                                <div class="product_rate" style="width:87%"></div>
                                            </div>
                                            <span class="rating_num">(25)</span>
                                        </div>
                                        <div class="pr_desc">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p>
                                        </div>
                                        <div class="pr_switch_wrap">
                                            <div class="product_color_switch">
                                                <span class="active" data-color="#090909"></span>
                                                <span data-color="#AC644D"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <div class="tab-pane fade" id="most-views" role="tabpanel" aria-labelledby="most-views-tab">
                        <div class="row shop_container">
                            <?php foreach ($most_view as $row) { ?>
                                <div class="col-lg-3 col-md-4 col-6">
                                    <a href="<?= url('Home/productdetail/' . $row['id']) ?>">
                                        <div class="product">
                                            <a class="product_img" href="<?= url('Home/productdetail/' . $row['id']) ?>">
                                                <img src="<?= $row['image'] ?>" alt="product_img1" style="width: 300px;height:300px;">
                                            </a>
                                            <div class="product-left-hover-overlay">
                                                <ul class="left-over-buttons">
                                                    <li><a class="d-inline-flex circle align-items-center justify-content-center wish" id="wishlist" data-product_id="<?php echo @$row['id'] ?> " data-price="<?= @$row['listedprice'] ?>" data-quantity="1"><i class="far fa-heart position-absolute"></i></a></li>
                                                    <li><a class="d-inline-flex circle align-items-center justify-content-center  cartbtn" id="cartbtn" data-product_id="<?php echo @$row['id'] ?> " data-price="<?= @$row['listedprice'] ?>" data-quantity="1"><i class="icon-basket-loaded position-absolute"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="product_info">
                                                <h6 class="product_title"><a href="<?= url('Home/productdetail/' . $row['id']) ?>"><?= $row['name'] ?></a></h6>
                                                <div class="product_price">
                                                    <span class="price">&#8377 <?= $row['listedprice'] ?></span>
                                                    <del>&#8377 <?= $row['price'] ?></del>
                                                    <div class="on_sale">
                                                        <span><?= $row['discount'] ?>% Off</span>
                                                    </div>
                                                </div>
                                                <div class="rating_wrap">
                                                    <div class="">
                                                        <div class="single_capt_right">
                                                            <div class="star-rating align-items-center d-flex justify-content-left mb-1 p-0">
                                                                <?php for ($i = 1; $i <= get_review_count(@$row['id']); $i++) { ?>
                                                                    <i class="fas fa-star filled" value="1"></i>
                                                                <?php } ?>
                                                                <?php for ($i = 1; $i <= 5 - (int)get_review_count(@$row['id']); $i++) { ?>
                                                                    <i class="far fa-star filled" value="1"></i>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <span class="rating_num">(<?= get_review_total($row['id']) ?>)</span>
                                                </div>
                                                <div class="pr_desc">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p>
                                                </div>
                                                <!-- <div class="pr_switch_wrap">
                                                <div class="product_color_switch">
                                                    <span class="active" data-color="#87554B"></span>
                                                    <span data-color="#333333"></span>
                                                    <span data-color="#DA323F"></span>
                                                </div>
                                            </div> -->
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php } ?>
                            <div class="" style="margin-left: 500px;">
                                <a href="<?= url('Home/shoplist') ?>" class="btn btn-fill-out rounded-0">Explore More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION SHOP -->

<!-- START SECTION SINGLE BANNER -->
<div class="section bg_light_blue2 pb-0 pt-md-0">
    <div class="container">
        <div class="row align-items-center flex-row-reverse">
            <div class="col-md-6 offset-md-1">
                <div class="medium_divider d-none d-md-block clearfix"></div>
                <div class="trand_banner_text text-center text-md-left">
                    <div class="heading_s1 mb-3">
                        <span class="sub_heading">New season trends!</span>
                        <h2><?= @$banner['banner'] ?></h2>
                    </div>
                    <h5 class="mb-4">Sale Get up to 50% Off</h5>
                    <a href="<?= @$banner['link'] ?>" class="btn btn-fill-out rounded-0">Shop Now</a>
                </div>
                <div class="medium_divider clearfix"></div>
            </div>
            <div class="col-md-5">
                <div class="text-center trading_img">
                    <img src="<?= @$banner['image'] ?>" alt="tranding_img" />
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION SINGLE BANNER -->

<!-- START SECTION SHOP -->
<div class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="heading_s1 text-center">
                    <h2>Featured Products</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="product_slider carousel_slider owl-carousel owl-theme nav_style1" data-loop="true" data-dots="false" data-nav="true" data-margin="20" data-responsive='{"0":{"items": "1"}, "481":{"items": "2"}, "768":{"items": "3"}, "1199":{"items": "4"}}'>
                    <?php foreach ($rand_item as $row) { ?>
                        <div class="item">
                            <div class="product">
                                <div class="product_img">
                                    <a href="<?= url('Home/productdetail/' . $row['id']) ?>">
                                        <img src="<?= $row['image'] ?>" alt="product_img1" style="width: 300px;height:300px;">
                                    </a>
                                    <div class="product_action_box">
                                        <ul class="list_none pr_action_btn">
                                            <li type="submit" class="add-to-cart"><a><i class="icon-basket-loaded cartbtn" id="cartbtn" data-product_id="<?php echo @$row['id'] ?> " data-price="<?= @$row['listedprice'] ?>" data-quantity="1"></i> Add To Cart</a></li>

                                            <li type="submit"><a><i class="icon-heart wish" id="wishlist" data-product_id="<?php echo @$row['id'] ?> " data-price="<?= @$row['listedprice'] ?>" data-quantity="1"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product_info">
                                    <h6 class="product_title"><a href="<?= url('Home/productdetail/' . $row['id']) ?>"><?= $row['name'] ?></a></h6>
                                    <div class="product_price">
                                        <span class="price">&#8377 <?= $row['listedprice'] ?></span>
                                        <del>&#8377 <?= $row['price'] ?></del>
                                        <div class="on_sale">
                                            <span><?= $row['discount'] ?>% Off</span>
                                        </div>
                                    </div>
                                    <div class="rating_wrap">
                                        <div class="">
                                            <div class="single_capt_right">
                                                <div class="star-rating align-items-center d-flex justify-content-left mb-1 p-0">
                                                    <?php for ($i = 1; $i <= get_review_count(@$row['id']); $i++) { ?>
                                                        <i class="fas fa-star filled" value="1"></i>
                                                    <?php } ?>
                                                    <?php for ($i = 1; $i <= 5 - (int)get_review_count(@$row['id']); $i++) { ?>
                                                        <i class="far fa-star filled" value="1"></i>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                        <span class="rating_num">(<?= get_review_total($row['id']) ?>)</span>
                                    </div>
                                    <div class="pr_desc">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION SHOP -->
<div class="section small_pt">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading_tab_header">
                    <div class="heading_s2">
                        <h2>Our Brands</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="client_logo carousel_slider owl-carousel owl-theme nav_style3" data-dots="false" data-nav="true" data-margin="30" data-loop="true" data-autoplay="true" data-responsive='{"0":{"items": "2"}, "480":{"items": "3"}, "767":{"items": "4"}, "991":{"items": "5"}}'>
                    <?php foreach ($rand_brand as $row) { ?>
                        <div class="item">
                            <div class="cl_logo">
                                <a href="<?= url('Home/shoplist?brand=' . $row['id']) ?>">
                                    <img src="<?= $row['image'] ?>" alt="cl_logo" style="height:120px;" />
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- START SECTION TESTIMONIAL -->
<div class="section bg_redon">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="heading_s1 text-center">
                    <h2>Our Client Say!</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="testimonial_wrap testimonial_style1 carousel_slider owl-carousel owl-theme nav_style2" data-nav="true" data-dots="false" data-center="true" data-loop="true" data-autoplay="true" data-items='1'>
                    <?php foreach ($review as $row) { ?>

                        <div class="testimonial_box">
                            <div class="testimonial_desc">
                                <p><?= $row['review'] ?></p>
                            </div>
                            <div class="author_wrap">
                                <div class="author_img">
                                    <!-- <img src="<?= ASSETS; ?>images/user_img1.jpg" alt="user_img1" /> -->
                                </div>
                                <div class="author_name">
                                    <h6><?= $row['name'] ?></h6>
                                    <!-- <span>Designer</span> -->
                                </div>
                            </div>
                            <div class="">
                                <div class="star-rating align-items-center d-flex justify-content-center ml-3 mb-1 p-0">
                                    <?php for ($i = 1; $i <= get_review_count(@$row['id']); $i++) { ?>
                                        <i class="fas fa-star filled" value="1"></i>
                                    <?php } ?>
                                    <?php for ($i = 1; $i <= 5 - (int)get_review_count(@$row['id']); $i++) { ?>
                                        <i class="far fa-star filled" value="1"></i>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION TESTIMONIAL -->

<?= $this->endSection() ?>
<?= $this->section('scripts') ?>

<script>
    $(document).ready(function() {

        $('.cartbtn').click(function(event) {

            var product_id = $(this).data("product_id");
            var quantity = $(this).data("quantity");
            var price = $(this).data("price");
            // alert(quantity);
            toastr.options = {
                "closeButton": true,
                "newestOnTop": true,
                "positionClass": "toast-top-right"
            };

            $.ajax({
                url: "<?php echo url('Home/cart'); ?>",
                method: "POST",
                data: {
                    product_id: product_id,
                    quantity: quantity,
                    price: price
                },
                success: function(response) {
                    if (response.st == 'success') {
                        toastr.success(response.msg);
                        window.location.reload();
                        var cart_count = parseInt($(".cart_count").text());
                        $(".cart_count").text(cart_count + 1);
                    }
                    if (response.st == 'added') {
                        toastr.info(response.msg);
                    } else {
                        $('.form_processing').html('');
                        $('#cartbtn').prop('disabled', false);
                        $('.error-msg').html(response.msg);
                    }
                }

            });

        });

    });
    /*
     *Add to Wish
     */

    $(document).on('click', '.wish', function() {
        var product_id = $(this).data("product_id");
        let wish = $(this);
        toastr.options = {
            "closeButton": true,
            "newestOnTop": true,
            "positionClass": "toast-top-right"
        };
        $.ajax({
            url: "<?php echo url('Home/wishlist'); ?>",
            method: "POST",
            data: {
                productid: product_id
            },
            success: function(response) {
                console.log(response);
                if (response.st == 'success') {
                    toastr.success(response.msg);
                    window.location.reload();
                    wish.removeClass("wish");
                    wish.addClass("removeWish")
                    $('#cartbtn').prop('disabled', false);
                }
                if (response.st == 'added') {
                    toastr.warning(response.msg);
                } else {
                    $('.form_processing').html('');
                    $('#cartbtn').prop('disabled', false);
                    $('.error-msg').html(response.msg);
                }
            }
        });
    });
</script>
<?= $this->endSection() ?>