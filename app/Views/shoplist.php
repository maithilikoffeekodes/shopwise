<?= $this->extend(THEME . 'template') ?>

<?= $this->section('content') ?>

<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="row align-items-center mb-4 pb-1">
                    <div class="col-12">
                        <div class="product_header">
                            <div class="product_header_left">
                                <div class="custom_select">
                                    <select class="form-control form-control-sm" id="price">
                                        <!-- <option value="order">Default sorting</option> -->
                                        <!-- <option value="popularity">Sort by popularity</option> -->
                                        <option value="1">Sort by newness</option>
                                        <option value="2">Sort by price: low to high</option>
                                        <option value="3">Sort by price: high to low</option>
                                    </select>
                                </div>
                            </div>
                            <div class="product_header_right">
                                <div class="products_view">
                                    <a href="javascript:Void(0);" class="shorting_icon grid"><i class="ti-view-grid"></i></a>
                                    <a href="javascript:Void(0);" class="shorting_icon list active"><i class="ti-layout-list-thumb"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row shop_container list filter_data">

                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="pagination-list" id="pagination_link">

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 order-lg-first mt-4 pt-2 mt-lg-0 pt-lg-0">
                <div class="sidebar">
                    <label><a href="<?= url('Home/shoplist')?>">Clear All Filters</a></label>
                    <div class="widget">
                        <h5 class="widget_title">Filter</h5>
                        <!-- <div class="filter_price"> -->
                            <!-- <div id="price_filter" data-min="0" data-max="500" data-min-value="0" data-max-value="500" data-price-sign="Rs"></div> -->
                            <!-- <div class="price_range"> -->
                                <span>Price: </span>
                                <input type="text" id="amount" readonly style="border:0; color:#FF324D; font-weight:bold;">
                                <input type="hidden" name="min_price" id="min">
                                <input type="hidden" name="max_price" id="max">
                            <!-- </div> -->

                            <div id="slider-range"></div>
                        <!-- </div> -->
                    </div>
                    <div class="widget">
                        <h5 class="widget_title">Brand</h5>
                        <div class="list_brand">
                            <select name="brand" id="brand" class="form-control ">
                                <?php if (isset($data)) { ?>
                                    <option value="<?= @$data['id'] ?>" selected><a href="<?= url('Home/productlist/' . @$data['id']) ?>"><?= @$data['brand'] ?></a></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="widget">
                        <h5 class="widget_title">Categories</h5>
                        <div class="widget_categories">
                            <select name="category" id="category" class="form-control ">
                                <?php if (isset($data)) { ?>
                                    <option value="<?= @$data['id'] ?>" selected><a href="<?= url('Home/productlist/' . @$data['id']) ?>"><?= @$data['category'] ?></a></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <!-- <div class="widget">
                        <div class="shop_banner">
                            <div class="banner_img overlay_bg_20">
                                <img src="<?= ASSETS; ?>images/sidebar_banner_img.jpg" alt="sidebar_banner_img">
                            </div>
                            <div class="shop_bn_content2 text_white">
                                <h5 class="text-uppercase shop_subtitle">New Collection</h5>
                                <h3 class="text-uppercase shop_title">Sale 30% Off</h3>
                                <a href="#" class="btn btn-white rounded-0 btn-sm text-uppercase">Shop Now</a>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    $(document).ready(function() {
        filter();
    });


    $(document).on('click', '.cartbtn', function(event) {

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
                if (response.st == 'success') {
                    toastr.success(response.msg);
                    window.location.reload();

                    wish.removeClass("wish");
                    wish.addClass("removeWish")
                    $('#cartbtn').prop('disabled', false);
                } else {
                    $('.form_processing').html('');
                    $('#cartbtn').prop('disabled', false);
                    $('.error-msg').html(response.msg);
                }
            }
        });
    });



    $("#brand").select2({
        width: '100%',
        placeholder: 'Search...',
        ajax: {
            url: PATH + "/Home/Getdata/getbrand",
            type: "post",
            allowClear: true,
            dataType: 'json',
            delay: 250,
            data: function(params) {
                return {
                    searchTerm: params.term // search term
                };
            },
            processResults: function(response) {
                return {
                    results: response
                };
            },
            cache: true
        }
    });

    $("#category").select2({
        width: '100%',
        placeholder: 'Select...',
        ajax: {
            url: PATH + "/Home/Getdata/getcategory",
            type: "post",
            allowClear: true,
            dataType: 'json',
            delay: 250,
            data: function(params) {
                return {
                    searchTerm: params.term // search term
                };
            },
            processResults: function(response) {
                return {
                    results: response
                };
            },
            cache: true
        }
    });
    $('#brand,#category').change(function() {
        var brand_id = $('#brand option:selected').val();
        var category_id = $('#category option:selected').val();
        // var data = new Array();
        // data['category_id'] = category_id;
        // data['brand_id'] = brand_id;
        filter();
    });


    $('#price').click(function() {
        var price = $("#price option:selected").val();
        filter();
    });

    $(document).on('click', '.pagination li a', function(event) {
        event.preventDefault();
        var page = $(this).data('ci-pagination-page');
        // console.log(page);
        filter(page);

    });

    function filter(page = 1) {
        var brand_id = $('#brand option:selected').val();
        var category_id = $('#category option:selected').val();
        var cat = "<?= isset($_GET['category']) ? $_GET['category'] : ''; ?>";
        var price = $("#price option:selected").val();
        var search = "<?= isset($_GET['search']) ? $_GET['search'] : ''; ?>";
        // var search = $('#searchdata').val();
        var min_price = $('#min').text();
        var max_price = $('#max').text();
        // console.log(page);
        $.ajax({
            url: "<?php echo url('Home/fetch_data'); ?>" + "/" + page,
            method: "POST",
            data: {
                brand_id: brand_id,
                category_id: category_id,
                price: price,
                cat: cat,
                // brand: brand,
                // search1:search1,
                search: search,
                min_price: min_price,
                max_price: max_price,
            },
            success: function(response) {
                // console.log(response);
                if (response.product_list == "") {
                    $('.filter_data').html('No item found....');
                    $('#pagination_link').hide();

                } else {
                    $('.filter_data').html(response.product_list);
                    $('#pagination_link').html(response.pagination_link);
                    // $('#product').hide();
                }
            }

        });
    }
</script>

<script>
    $(function() {
        $("#slider-range").slider({
            range: true,
            min: 0,
            max: <?= $max_value ?>,
            values: [0, <?= $max_value ?>],
            slide: function(event, ui) {
                $("#amount").val("₹" + ui.values[0] + " - ₹" + ui.values[1]);
                $('#min').text(ui.values[0])
                $('#max').text(ui.values[1])
                filter();
            }
        });
        $("#amount").val("₹" + $("#slider-range").slider("values", 0) +
            " - ₹" + $("#slider-range").slider("values", 1));
    });
</script>
<?= $this->endSection() ?>