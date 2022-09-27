<?= $this->extend(THEME . 'template') ?>

<?= $this->section('content') ?>
<style>
	.btn.btn-sm {
		padding: 5px;
	}

	ul li .display_content {
		display: none !important;
	}
</style>
<?php //echo"<pre>";print_r($cart);exit;
?>
<div class="breadcrumb_section bg_gray page-title-mini">
	<div class="container">
		<!-- STRART CONTAINER -->
		<div class="row align-items-center">
			<div class="col-md-6">
				<div class="page-title">
					<h1>Shopping Cart</h1>
				</div>
			</div>
			<div class="col-md-6">
				<ol class="breadcrumb justify-content-md-end">
					<li class="breadcrumb-item"><a href="<?= url('Home/index')?>">Home</a></li>
					<li class="breadcrumb-item"><a href="#">Pages</a></li>
					<li class="breadcrumb-item active">Shopping Cart</li>
				</ol>
			</div>
		</div>
	</div><!-- END CONTAINER-->
</div>
<form action="<?= url('Home/final_cart') ?>" class="ajax-form-submit" method="post">
	<!-- Cart -->
	<section class="middle">
		<div class="container">
		<div class="row justify-content-between">
				<div class="col-12 col-lg-7 col-md-12">
					<table class="table table-borderless table-hover text-center mb-0" id="table_list_data" data-id="cart" data-module="Home" data-filter_data=''>
						<thead class="thead text-center" style="background-color:#FF324D ;color:white;">
							<tr>
								<th>Image</th>
								<th>Products</th>
								<th>Price</th>
								<th>Quantity</th>
								<th>Total</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
						</tbody>
					</table>

					<div class="row align-items-end justify-content-between mb-10 mb-md-0">
						<div class="col-12 col-md-7">
							<!-- Coupon -->
							<form class="mb-7 mb-md-0">
								<label class="fs-sm ft-medium text-dark">Coupon code:</label>
								<div class="row form-row">
									<div class="col">
										<input class="form-control coupon" type="text" placeholder="Enter coupon code*" name="coupon-apply">
									</div>
									<div class="col-auto">
										<button class="btn btn-fill-out btn-block applycoupon" type="submit">Apply</button>
									</div>
								</div>
								<div class="error-msg text-danger"></div>
							</form>
						</div>
						<!-- <div class="col-12 col-md-auto mfliud">
							<button class="btn stretched-link borders">Update Cart</button>
						</div> -->
					</div>
				</div>

				<div class="col-12 col-md-12 col-lg-4">
					<div class="card mb-4 gray mfliud">
						<div class="card-body">
							<ul class="list-group list-group-sm list-group-flush-y list-group-flush-x">
								<li class="list-group-item d-flex text-dark fs-sm ft-regular">
									<span>Subtotal</span> <span class="ml-auto text-dark ft-medium sub_total_amt">0</span>
								</li>
								<!-- <li class="list-group-item d-flex text-dark fs-sm ft-regular">
									<span>Tax</span> <span class="ml-auto text-dark ft-medium">$10.10</span>
								</li> -->
								<li class="list-group-item d-flex text-dark fs-sm ft-regular">
									<span>Delivery Charges</span> <span class="ml-auto text-dark ft-medium">Free</span>
								</li>
								<li class="list-group-item d-flex text-dark fs-sm ft-regular" id="discount">
									<input type="hidden" name="coupon_discount" id="coupon_discount" value='0'>
									<span>Coupons Discount</span> <span class="ml-auto text-dark ft-medium coupon-discount">0</span>
								</li>
								<li class="list-group-item d-flex text-dark fs-sm ft-regular">
									<input type="hidden" name="grand_total" id="grand_total" value='0'>
									<span>Total</span> <span class="ml-auto text-dark ft-medium total_amt">0</span>
								</li>
								<li class="list-group-item fs-sm text-center">
									Shipping cost calculated at Checkout *
								</li>
							</ul>
						</div>
					</div>

					<button class="btn btn-fill-out btn-block mb-3" id="save_data" type="submit">Proceed to Checkout</button>
					<a class="btn-link text-dark ft-medium" href="<?= url('Home/shoplist') ?>">
						<i class="ti-back-left mr-2"></i> Continue Shopping
					</a>
				</div>

			</div>
		</div>
	</section>
</form>
<?= $this->endsection() ?>
<?= $this->section('scripts') ?>
<script type="text/javascript">
	$(document).ready(function() {
		// alert("abc");return;
		datatable_load();
	});

	function increment(val) {
		var qty = $(val).closest('.qty_class').find('input[name="qty[]"]').val();
		qty++;

		$(val).closest('.qty_class').find('.count').text(qty);
		$(val).closest('.qty_class').find('input[name="qty[]"]').val(qty);

		calcu();
	}

	function decrement(val) {
		var qty = $(val).closest('.qty_class').find('input[name="qty[]"]').val();

		if (qty != 1) {
			qty--;
		}
		// $(".qty").val(qty);
		$(val).closest('.qty_class').find('.count').text(qty);
		$(val).closest('.qty_class').find('input[name="qty[]"]').val(qty);

		calcu();
	}

	function calcu() {
		// console.log("aes0");

		var qty = $('input[name="qty[]"]').map(function() {
			return parseFloat(this.value);
		}).get();

		var price = $('input[name="price[]"]').map(function() {
			return parseFloat(this.value);
		}).get();

		var total = 0;

		for (var i = 0; i < qty.length; i++) {
			// console.log("hello");
			var sub = qty[i] * price[i];
			$('input[name="sub[]"]').eq(i).val(sub);

			total += sub;
		}

		var sub_tot = $(".sub_total_amt").text(total);
		$(".total_amt").text($(".sub_total_amt").text());
		var grand_tot = $(".sub_total_amt").text();
		$("#grand_total").val(grand_tot);
		$("#coupon_discount").val($('.coupon-discount').text());
	}
	// });

	function datatable_load(filter_val) {
		// console.log("abc");return;
		$('#table_list_data').DataTable({
			searching: false,
			paging: false,
			info: false,
			destroy: true,
			processing: true,
			serverSide: true,
			scrollX: false,
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
			"initComplete": function() {
				calcu();
			}
		});
	}

	function editable_remove(data_edit) {
		var type = 'Remove';

		var data_val = $(data_edit).data('val');

		var ot_title = $(data_edit).attr('title');
		var pkno = $(data_edit).data('pk');
		//console.log(pkno);
		swal.fire({
			title: "Are you sure Remove " + ot_title + " ?",
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

						if (data.st == 'success') {
							datatable_load('');
							swal.fire("Deleted!", "Your Data has been deleted.", "success");

						}

					});
				}

			} else {
				swal("Cancelled", "Your Data is safe :)", "error");
			}
			// })}
		});
	}
	$('.applycoupon').on('click', function(e) {
		var coupon = $('.coupon').val();
		var total = $('.total_amt').text();
		// alert(coupon);
		$('.error-msg').html('');
		$('.applycoupon').prop('disabled', true);
		$(".total_amt").text($(".sub_total_amt").text());

		e.preventDefault();

		$.ajax({
			url: "<?php echo url('Home/applycoupon'); ?>",
			method: "POST",
			data: {
				coupon: coupon,
				total: total,
			},
			success: function(response) {
				console.log(response);
				if (response.final_total && response.coupon_discount != '') {
					$('.coupon-discount').html(response.coupon_discount);
					$('.total_amt').text(response.final_total);
					$('#grand_total').val(response.final_total);
					$("#coupon_discount").val(response.coupon_discount);
					$('.error-msg').html(response.msg);
					$('.applycoupon').prop('disabled', false);
				} else {
					$('.applycoupon').prop('disabled', false);
					$('.error-msg').html(response.msg);
				}
			}

		});
	});
	$('.ajax-form-submit').on('submit', function(e) {
		// console.log("abc");
		$('#save_data').prop('disabled', true);
		$('.save_data').attr("disabled", true);

		$('.error-msg').html('');
		$('.form_proccessing').html('Please wait...');
		e.preventDefault();

		var aurl = $(this).attr('action');
		$.ajax({
			type: "POST",
			url: aurl,
			data: $(this).serialize(),
			success: function(response) {
				// console.log(response);
				if (response == "1") {
					window.location.href = "<?= url('Home/checkout') ?>";
				} else {
					$('.form_proccessing').html('');
					$('#save_data').prop('disabled', false);
					$('.error-msg').html(response.msg);
				}
			},
			error: function() {
				$('#save_data').prop('disabled', false);
				alert('Error');
			}
		});

		return false;
	});
</script>
<?= $this->endSection() ?>