<?= $this->extend(THEME . 'template') ?>

<?= $this->section('content') ?>

<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container">
        <!-- STRART CONTAINER -->
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="page-title">
                    <h1>Wishlist</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="<?= url('Home/index')?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active">Wishlist</li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="table-responsive wishlist_table">
                    <table class="table" id="table_list_data" data-id="wishlist" data-module="Home">
                        <thead class="text-center" style="background-color:#FF324D ;color:white;">
                            <tr>
                                <th class="product-thumbnail">Image</th>
                                <th class="product-name">Product</th>
                                <th class="product-price">Price</th>
                                <!-- <th class="product-stock-status">Stock Status</th> -->
                                <th class="product-add-to-cart">Add to cart</th>
                                <th class="product-remove">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
<?= $this->section('scripts') ?>

<script type="text/javascript">
    $(document).ready(function() {
    	datatable_load('');
    });


    $(document).on('click', '.cartbtn', function() {

        var product_id = $(this).data("product_id");
        var quantity = $(this).data("quantity");
        var price = $(this).data("price");

        toastr.options = {
            "closeButton": true,
            "newestOnTop": true,
            "positionClass": "toast-top-right"
        };
        // alert(product_id);return;
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

    function datatable_load(filter_val) {

        $('#table_list_data').DataTable({
            destroy: true,
            paging: false,
            info: false,
            processing: true,
            serverSide: true,
            scrollX: false,
            searching: false,
            ordering: false,
            buttons: [

            ],
            dom: "<'row be-datatable-header'<'col-sm-2'l><'col-sm-6 text-left'B><'col-sm-4 text-right'f>>" +
                "<'row be-datatable-body'<'col-sm-12'tr>>" +
                "<'row be-datatable-footer'<'col-sm-5'i><'col-sm-7'p>>",
            order: [
                [0, "desc"]
            ],
            ajax: {
                "type": "POST",
                "url": PATH + "/" + $("#table_list_data").data('module') + "/Getdata/" + $("#table_list_data").data(
                    'id') + '?filter_data=' + $("#table_list_data").data('filter_data')
            },

            language: {
                "emptyTable": "Empty Wishlist"
            }

        });
    }

    function editable_remove(data_edit) {
        var type = 'Remove';
        var data_val = $(data_edit).data('val');
        // alert(data_val);
        var pkno = $(data_edit).data('pk');
        // alert(pkno);
        swal.fire({
            title: "Are you sure Remove  ?",
            text: "You will not be able to recover this Data!",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel plx!",
            //closeOnConfirm: false,
            //closeOnCancel: false
        }).then((result) => {
            // function(isConfirm) {
            if (result.value) {
                _data = $.param({
                    pk: pkno
                }) + '&' + $.param({
                    val: data_val
                }) + '&' + $.param({
                    type: type
                }) + '&' + $.param({
                    method: $("#table_list_data").data('id')
                });
                if (data_val != undefined && data_val != '') {
                    $.post(PATH + "/" + $("#table_list_data").data('module') + "/Action/Update", _data, function(
                        data) {
                        console.log($.post);
                        if (data.st == 'success') {
                            // datatable_load('');
                            swal.fire("Deleted!", "Your Data has been deleted.", "success");
                            location.reload();
                        }

                    });
                }

            } else {
                swal("Cancelled", "Your Data is safe :)", "error");
            }
            // })}
        });
    }
    if ($.isFunction($.fn.datatable_load)) {
    	datatable_load('');
    }
</script>
<?= $this->endSection() ?>