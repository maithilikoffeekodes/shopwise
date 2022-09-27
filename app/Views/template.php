<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="Anil z" name="author">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Shopwise is Powerful features and You Can Use The Perfect Build this Template For Any eCommerce Website. The template is built for sell Fashion Products, Shoes, Bags, Cosmetics, Clothes, Sunglasses, Furniture, Kids Products, Electronics, Stationery Products and Sporting Goods.">
    <meta name="keywords" content="ecommerce, electronics store, Fashion store, furniture store,  bootstrap 4, clean, minimal, modern, online store, responsive, retail, shopping, ecommerce store">

    <!-- SITE TITLE -->
    <title>Shopwise - eCommerce</title>
    <!-- Favicon Icon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?= ASSETS; ?>images/favicon.png">
    <!-- Animation CSS -->
    <link rel="stylesheet" href="<?= ASSETS; ?>css/animate.css">
    <!-- Latest Bootstrap min CSS -->
    <link rel="stylesheet" href="<?= ASSETS; ?>bootstrap/css/bootstrap.min.css">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">
    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="<?= ASSETS; ?>css/all.min.css">
    <link rel="stylesheet" href="<?= ASSETS; ?>css/ionicons.min.css">
    <link rel="stylesheet" href="<?= ASSETS; ?>css/themify-icons.css">
    <link rel="stylesheet" href="<?= ASSETS; ?>css/linearicons.css">
    <link rel="stylesheet" href="<?= ASSETS; ?>css/flaticon.css">
    <link rel="stylesheet" href="<?= ASSETS; ?>css/simple-line-icons.css">
    <!--- owl carousel CSS-->
    <link rel="stylesheet" href="<?= ASSETS; ?>owlcarousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= ASSETS; ?>owlcarousel/css/owl.theme.css">
    <link rel="stylesheet" href="<?= ASSETS; ?>owlcarousel/css/owl.theme.default.min.css">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="<?= ASSETS; ?>css/magnific-popup.css">
    <!-- Slick CSS -->
    <link rel="stylesheet" href="<?= ASSETS; ?>css/slick.css">
    <link rel="stylesheet" href="<?= ASSETS; ?>css/slick-theme.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="<?= ASSETS; ?>css/style.css">
    <link rel="stylesheet" href="<?= ASSETS; ?>css/responsive.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
	<!-- <link rel="stylesheet" href="https://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" /> -->
	<link rel="stylesheet" type="text/css" href="<?= ASSETS; ?>plugins/sweet-alert/sweetalert2.min.css">
	<link href="<?= ASSETS; ?>plugins/dropzone/dropzone.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="<?= ASSETS; ?>plugins/datatable/dataTables.bootstrap4.min.css" />
	<link rel="stylesheet" type="text/css" href="<?= ASSETS; ?>plugins/datatable/responsivebootstrap4.min.css" />
	<link rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href=" https://cdn.datatables.net/fixedheader/3.1.7/css/fixedHeader.dataTables.min.css" />
	<link rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="<?= ASSETS; ?>plugins/datatable/fileexport/buttons.bootstrap4.min.css" />
	<!---Select2 css-->
	<link href="<?= ASSETS; ?>plugins/select2/css/select2.min.css" rel="stylesheet">

    <!-- Hotjar Tracking Code for bestwebcreator.com -->
    <!-- <script>
        (function(h, o, t, j, a, r) {
            h.hj = h.hj || function() {
                (h.hj.q = h.hj.q || []).push(arguments)
            };
            h._hjSettings = {
                hjid: 2073024,
                hjsv: 6
            };
            a = o.getElementsByTagName('head')[0];
            r = o.createElement('script');
            r.async = 1;
            r.src = t + h._hjSettings.hjid + j + h._hjSettings.hjsv;
            a.appendChild(r);
        })(window, document, 'https://static.hotjar.com/c/hotjar-', '.js?sv=');
    </script> -->

</head>

<body>

    <!-- LOADER -->
    <div class="preloader">
        <div class="lds-ellipsis">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <!-- END LOADER -->

    <!-- Home Popup Section -->
    <!-- <div class="modal fade subscribe_popup" id="onload-popup" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="ion-ios-close-empty"></i></span>
                    </button>
                    <div class="row no-gutters">
                        <div class="col-sm-5">
                            <div class="background_bg h-100" data-img-src="<?= ASSETS; ?>images/popup_img.jpg"></div>
                        </div>
                        <div class="col-sm-7">
                            <div class="popup_content">
                                <div class="popup-text">
                                    <div class="heading_s1">
                                        <h4>Subscribe and Get 25% Discount!</h4>
                                    </div>
                                    <p>Subscribe to the newsletter to receive updates about new products.</p>
                                </div>
                                <form method="post">
                                    <div class="form-group">
                                        <input name="email" required type="email" class="form-control rounded-0" placeholder="Enter Your Email">
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-fill-line btn-block text-uppercase rounded-0" title="Subscribe" type="submit">Subscribe</button>
                                    </div>
                                </form>
                                <div class="chek-form">
                                    <div class="custome-checkbox">
                                        <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox3" value="">
                                        <label class="form-check-label" for="exampleCheckbox3"><span>Don't show this popup again!</span></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- End Screen Load Popup Section -->

    <!-- START HEADER -->
    <header class="header_wrap fixed-top header_with_topbar">
       
        <div class="bottom_header dark_skin main_menu_uppercase">
            <?= $this->include(THEME . 'block/navmenu') ?>
        </div>
    </header>
    <!-- END HEADER -->

    <!-- START SECTION BANNER -->
    
    <!-- END SECTION BANNER -->

    <!-- END MAIN CONTENT -->
    <div class="main_content">

    <?= $this->renderSection('content') ?>

        <!-- START SECTION TESTIMONIAL -->

        <!-- END SECTION TESTIMONIAL -->

        <!-- START SECTION SHOP INFO -->

        <!-- END SECTION SHOP INFO -->

        <!-- START SECTION SUBSCRIBE NEWSLETTER -->

        <!-- START SECTION SUBSCRIBE NEWSLETTER -->

    </div>
    <!-- END MAIN CONTENT -->

    <!-- START FOOTER -->
    <?= $this->include(THEME . 'block/footer') ?>
    <!-- END FOOTER -->

    <a href="#" class="scrollup" style="display: none;"><i class="ion-ios-arrow-up"></i></a>

    <?= $this->include(THEME . 'block/scripts') ?>
    <?= $this->renderSection('scripts') ?>

</body>

</html>