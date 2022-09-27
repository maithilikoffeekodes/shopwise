<?= $this->extend(THEME . 'template') ?>

<?= $this->section('content') ?>

<div class="section">
    <div class="container">
        <div class="row">
            <?php //echo"<pre>";print_r($product);exit;
            ?>
            <div class="col-lg-6 col-md-6 mb-4 mb-md-0">
                <div class="product-image">
                    <div class="product_img_box">
                        <img id="product_img" src='<?= @$product['image'][0] ?>' data-zoom-image="<?= $product['image'][0] ?>" alt="product_img1" />
                        <a href="#" class="product_img_zoom" title="Zoom">
                            <span class="linearicons-zoom-in"></span>
                        </a>
                    </div>
                    <?php $image = @$product['image']; ?>
                    <div id="pr_item_gallery" class="product_gallery_item slick_slider" data-slides-to-show="4" data-slides-to-scroll="1" data-infinite="false">
                        <?php
                        for ($i = 1; $i < count($image); $i++) {
                        ?>
                            <div class="item">
                                <a href="<?= $product['image'][$i]; ?>" class="product_gallery_item active" data-image="<?= $product['image'][$i]; ?>" data-zoom-image="<?= $product['image'][$i]; ?>">
                                    <img src="<?= $product['image'][$i]; ?>" alt="product_small_img1" />
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="pr_detail">
                    <div class="product_description">
                        <h4 class="product_title"><a href="#"><?= @$product['name'] ?></a></h4>
                        <div class="product_price">
                            <span class="price">&#8377 <?= $product['listedprice'] ?></span>
                            <del>&#8377 <?= $product['price'] ?></del>
                            <div class="on_sale">
                                <span><?= $product['discount'] ?>% Off</span>
                            </div>
                        </div>
                        <div class="rating_wrap">
                            <div class="rating">
                                <div class="product_rate" style="width:80%">
                                <?php for (@$i = 1; @$i <=  get_review_count($product['id']); @$i++) { ?>
                                    <i class="text-primary fas fa-star" value="1"></i>
                                <?php } ?>
                                <?php for (@$i = 1; @$i <= 5 - (int) get_review_count($product['id']); @$i++) { ?>
                                    <i class="text-primary far fa-star" value="1"></i>
                                <?php } ?>
                            </div>
                            </div>
                            <span class="rating_num">(21)</span>
                        </div>
                        <div class="pr_desc">
                            <p><?= $product['description'] ?></p>
                        </div>
                        <!-- <div class="product_sort_info">
                            <ul>
                                <li><i class="linearicons-shield-check"></i> 1 Year AL Jazeera Brand Warranty</li>
                                <li><i class="linearicons-sync"></i> 30 Day Return Policy</li>
                                <li><i class="linearicons-bag-dollar"></i> Cash on Delivery available</li>
                            </ul>
                        </div> -->
                        <!-- <div class="pr_switch_wrap">
                            <span class="switch_lable">Color</span>
                            <div class="product_color_switch">
                                <span class="active" data-color="#87554B"></span>
                                <span data-color="#333333"></span>
                                <span data-color="#DA323F"></span>
                            </div>
                        </div> -->
                        <!-- <div class="pr_switch_wrap">
                            <span class="switch_lable">Size</span>
                            <div class="product_size_switch">
                                <span>xs</span>
                                <span>s</span>
                                <span>m</span>
                                <span>l</span>
                                <span>xl</span>
                            </div>
                        </div> -->
                    </div>
                    <hr />
                    <div class="cart_extra">
                        <div class="cart-product-quantity">
                            <div class="quantity">
                                <input type="button" value="-" class="minus" onclick="decrement(this)" style="margin-top: -3px;">
                                <input type="text" name="qty" value="1" title="Qty" class="quantity text-center" min="1" max="10" style="width:43px ;">
                                <input type="button" value="+" class="plus" onclick="increment(this)" style="margin-top: -38px;margin-left: 90px;">
                            </div>
                        </div>
                        <div class="cart_btn">
                            <button class="btn btn-fill-out btn-addtocart cartbtn" id="cartbtn" data-product_id="<?php echo @$product['id'] ?> " data-price="<?= @$product['listedprice'] ?>" data-quantity="1" type="button"><i class="icon-basket-loaded"></i> Add to cart</button>
                            <a class="add_wishlist wish" id="wish" data-product_id="<?php echo @$product['id'] ?> " data-price="<?= @$row['price'] ?>" data-quantity="1" href="#"><i class="icon-heart"></i></a>
                        </div>
                    </div>
                    <hr />
                    <ul class="product-meta">
                        <!-- <li>SKU: <a href="#">BE45VGRT</a></li> -->
                        <li>Category: <a href="#"><?= $product['category_name'] ?></a></li>
                        <!-- <li>Tags: <a href="#" rel="tag">Cloth</a>, <a href="#" rel="tag">printed</a> </li> -->
                    </ul>

                    <!-- <div class="product_share">
                        <span>Share:</span>
                        <ul class="social_icons">
                            <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                            <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                            <li><a href="#"><i class="ion-social-googleplus"></i></a></li>
                            <li><a href="#"><i class="ion-social-youtube-outline"></i></a></li>
                            <li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
                        </ul>
                    </div> -->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="large_divider clearfix"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="tab-style3">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="Description-tab" data-toggle="tab" href="#Description" role="tab" aria-controls="Description" aria-selected="true">Description</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="Additional-info-tab" data-toggle="tab" href="#Additional-info" role="tab" aria-controls="Additional-info" aria-selected="false">Additional info</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="Reviews-tab" data-toggle="tab" href="#Reviews" role="tab" aria-controls="Reviews" aria-selected="false">Reviews</a>
                        </li>
                    </ul>
                    <div class="tab-content shop_info_tab">
                        <div class="tab-pane fade show active" id="Description" role="tabpanel" aria-labelledby="Description-tab">
                            <p><?= $product['description'] ?></p>
                        </div>
                        <div class="tab-pane fade" id="Additional-info" role="tabpanel" aria-labelledby="Additional-info-tab">
                            <?= $product['additional_information'] ?>
                        </div>
                        <div class="tab-pane fade" id="Reviews" role="tabpanel" aria-labelledby="Reviews-tab">
                            <?php //echo"<pre>";print_r($review);exit;
                            ?>
                            <div class="comments">
                                <!-- <h5 class="product_tab_title">2 Review For <span>Blue Dress For Woman</span></h5> -->
                                <ul class="list_none comment_list mt-4">
                                    <?php foreach ($review as $row) { ?>
                                        <li>
                                            <?php $date = new DateTime(@$row['created_at']); ?>
                                            <!-- <div class="comment_img">
                                                <img src="<?= ASSETS; ?>images/avtar-image.png" alt="user1" />
                                            </div> -->
                                            <div class="comment_block">
                                                <div class="rating_wrap">
                                                    <div class="rating">
                                                        <div class="product_rate" style="width:80%">
                                                            <?php for ($i = 1; $i <= @$row['rating']; $i++) { ?>
                                                                <i class="fas fa-star filled" value="1"></i>
                                                            <?php } ?>
                                                            <?php for ($i = 1; $i <= 5 - (int)@$row['rating']; $i++) { ?>
                                                                <i class="far fa-star filled" value="1"></i>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <p class="customer_meta">
                                                    <span class="review_author"><?= $row['name'] ?></span>
                                                    <span class="comment-date"><?php echo @$date->Format('d M Y') ?></span>
                                                </p>
                                                <div class="description">
                                                    <p><?= $row['review'] ?></p>
                                                </div>
                                            </div>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <div class="review_form field_form">
                                <h5>Add a review</h5>
                                <form class="row mt-3" method="post">
                                    <div class="form-group col-12">
                                        <input type="hidden" name="rating" id="rating"></input>
                                        <input type="hidden" name="product_id" id="product_id" value="<?= $product['id'] ?>"></input>
                                        <div class="star_rating">
                                            <span><i class="far fa-star btn_rating button1" onclick="get_rate(1)"></i></span>
                                            <span><i class="far fa-star btn_rating button2" onclick="get_rate(2)"></i></span>
                                            <span><i class="far fa-star btn_rating button3" onclick="get_rate(3)"></i></span>
                                            <span><i class="far fa-star btn_rating button4" onclick="get_rate(4)"></i></span>
                                            <span><i class="far fa-star btn_rating button5" onclick="get_rate(5)"></i></span>
                                        </div>
                                    </div>
                                    <div class="form-group col-12">
                                        <textarea required="required" placeholder="Your review *" class="form-control" name="review" rows="4" id="review"></textarea>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input required="required" placeholder="Enter Name *" class="form-control" name="name" type="text" id="name">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input required="required" placeholder="Enter Email *" class="form-control" name="email" type="email" id="email">
                                    </div>

                                    <div class="form-group col-12">
                                        <button type="submit" id="save_data" class="btn btn-fill-out review_btn" name="submit" value="Submit">Submit Review</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="small_divider"></div>
                <div class="divider"></div>
                <div class="medium_divider"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="heading_s1">
                    <h3>Releted Products</h3>
                </div>
                <div class="releted_product_slider carousel_slider owl-carousel owl-theme" data-margin="20" data-responsive='{"0":{"items": "1"}, "481":{"items": "2"}, "768":{"items": "3"}, "1199":{"items": "4"}}'>
                    <?php foreach (@$related_product as $row) {
                    ?>
                        <div class="item">
                            <div class="product">
                                <div class="product_img">
                                    <a href="shop-product-detail.html">
                                        <img src="<?= @$row['image'] ?>" alt="product_img1" style="width: 300px;height:300px;">
                                    </a>
                                    <div class="product_action_box">
                                        <ul class="list_none pr_action_btn">
                                            <li class="add-to-cart"><a href="#"><i class="icon-basket-loaded cartbtn" id="cartbtn" data-product_id="<?php echo @$row['id'] ?>" data-price="<?= @$row['price'] ?>" data-quantity="1"></i> Add To Cart</a></li>
                                            <li><a href="shop-compare.html"><i class="icon-shuffle"></i></a></li>
                                            <li><a href="shop-quick-view.html" class="popup-ajax"><i class="icon-magnifier-add"></i></a></li>
                                            <li><a href="#"><i class="icon-heart wish" id="wishlist" data-product_id="<?php echo @$row['id'] ?> " data-price="<?= @$row['listedprice'] ?>" data-quantity="1"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product_info">
                                    <h6 class="product_title"><a href="shop-product-detail.html"><?= $row['name'] ?></a></h6>
                                    <div class="product_price">
                                        <span class="price">&#8377 <?= $row['listedprice'] ?></span>
                                        <del>&#8377 <?= $row['price'] ?></del>
                                        <div class="on_sale">
                                            <span><?= $row['discount'] ?>% Off</span>
                                        </div>
                                    </div>
                                    <div class="rating_wrap">
                                        <div class="rating">
                                            <div class="product_rate" style="width:80%"></div>
                                        </div>
                                        <span class="rating_num">(21)</span>
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
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endsection() ?>
<?= $this->section('scripts') ?>
<script type="text/javascript">
    $(document).ready(function() {
       
        $('.cartbtn').click(function(event) {

            var product_id = $(this).data("product_id");
            var quantity = $('.quantity').val() != '' ? $('.quantity').val() : $(this).data("quantity");
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

    });

    function increment(val) {
        var qty = $(val).closest('.quantity').find('input[name="qty"]').val();
        qty++;
        console.log(qty);

        parseFloat($('.quantity').val(qty))
        $(val).closest('.quantity').find('.count').text(qty);


        calcu();
    }

    function decrement(val) {
        var qty = $(val).closest('.quantity').find('input[name="qty"]').val();

        if (qty != 1) {
            qty--;
        }
        parseFloat($('.quantity').val(qty));
        $(val).closest('.quantity').find('.count').text(qty);


        calcu();
    }

    function calcu() {
        console.log("qty");

        var qty = $('.quantity').map(function() {
            return parseFloat(this.value);
        }).get();
    }

    function get_rate(val) {
        $(".btn_rating").removeClass("fas fa-star");
        $(".btn_rating").addClass("far fa-star");
        $('#rating').val(val); // set rating value in hidden input

        / =========== loop for count the start and changing the color and class =========== /
        for (let i = 1; i <= parseInt(val); i++) {
            var button = ".button" + i;
            $(button).removeClass("far fa-star");
            $(button).addClass("fas fa-star");
        }
    }


    $(document).on('click', '.review_btn', function() {

        var email = $('#email').val();
        var name = $('#name').val();
        var review = $('#review').val();
        var rating = $('#rating').val();
        var product_id = $('#product_id').val();

        toastr.options = {
            "closeButton": true,
            "newestOnTop": true,
            "positionClass": "toast-top-right"
        };

        $.ajax({
            url: "<?php echo url('Home/review'); ?>",
            method: "POST",
            data: {
                email: email,
                name: name,
                review: review,
                rating: rating,
                product_id: product_id
            },
            success: function(response) {
                if (response.st == 'success') {
                    toastr.success(response.msg);
                } else {
                    $('.form_processing').html('');
                    $('#cartbtn').prop('disabled', false);
                    $('.error-msg').html(response.msg);
                }
            }

        });

    });
    // $('.ajax-form-submit').on('submit', function(e) {
    //     // console.log("abc");
    //     $('#save_data').prop('disabled', true);
    //     $('.save_data').attr("disabled", true);
    //     $('.error-msg').html('');
    //     $('.form_proccessing').html('Please wait...');
    //     e.preventDefault();
    //     var aurl = $(this).attr('action');
    //     var form = $(this);
    //     var formdata = false;
    //     $.ajax({
    //         type: "POST",
    //         url: aurl,
    //         data: formdata ? formdata : form.serialize(),
    //         success: function(response) {
    //             alert("sdjkhbfkdfkgbkdf");return;
    //             if (response.st == "success") {
    //                 alert("fpiohgldfhoigh");return;
    //                 // window.location.href( //= url('Home/productdetail/' . $product['id']) );
    //                 location.reload();
    //             } else {
    //                 location.reload();
    //                 $('.form_proccessing').html('');
    //                 $('#save_data').prop('disabled', false);
    //                 $('.error-msg').html(response.msg);
    //             }
    //         },
    //         error: function() {
    //             $('#save_data').prop('disabled', false);
    //             alert('Error');
    //         }
    //     });

    //     return false;
    // });
</script>
<?= $this->endSection() ?>