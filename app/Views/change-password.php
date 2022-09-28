<?= $this->extend(THEME . 'template') ?>

<?= $this->section('content') ?>

<div class="breadcrumb_section bg_gray page-title-mini">
	<div class="container">
		<!-- STRART CONTAINER -->
		<div class="row align-items-center">
			<div class="col-md-6">
				<div class="page-title">
					<h1>Change Password</h1>
				</div>
			</div>
			<div class="col-md-6">
				<ol class="breadcrumb justify-content-md-end">
					<li class="breadcrumb-item"><a href="<?= url('Home/index')?>">Home</a></li>
				 <!-- <li class="breadcrumb-item"><a href="#">Pages</a></li> -->
					<li class="breadcrumb-item active">Change Password</li>
				</ol>
			</div>
		</div>
	</div><!-- END CONTAINER-->
</div>

<section class="middle">
    <div class="container">
        <div class="row">

            <div class="row align-items-start justify-content-between mt-5">
                <div class="col-12 col-md-12 col-lg-8 col-xl-8">
                    <!-- row -->
                    <div class="row align-items-center">

                        <form action="<?= url('Home/change_password') ?>" method="post" class="ajax-form-submit row m-0">

                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label class="small text-dark ft-medium">Current Password *</label>
                                    <input type="password" class="form-control" name="password" value="" required />
                                </div>
                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label class="small text-dark ft-medium">New Password *</label>
                                    <input type="password" class="form-control" name="npassword" value="" required />
                                </div>
                            </div>

                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label class="small text-dark ft-medium">Confirm Password*</label>
                                    <input type="password" class="form-control" name="cpassword" value="" required />
                                </div>
                            </div>
                            <?php if (!empty($msg) && $msg['st'] == 'failed') { ?>
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span class="mdi mdi-close" aria-hidden="true"></span></button>
                                    <div class="icon"> <span class="mdi mdi-close-circle-o"></span></div>
                                    <div class="message"><strong>Failed!</strong> <?= $msg['msg']; ?></div>
                                </div>
                            <?php } ?>
                            <div class="error-msg"></div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <button type="submit" id="save_data" class="btn btn btn-fill-out">Save Changes</button>
                                </div>
                            </div>

                        </form>
                    </div>
                    <!-- row -->
                </div>

            </div>
        </div>
</section>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    $('.ajax-form-submit').on('submit', function(e) {

        $('#save_data').prop('disabled', true);
        $('.error-msg').html('');
        $('.form_proccessing').html('Please wait...');
        e.preventDefault();
        var aurl = $(this).attr('action');
        var form = $(this);
        var formdata = false;
        if (window.FormData) {
            formdata = new FormData(form[0]);
        }
        $.ajax({
            type: "POST",
            url: aurl,
            cache: false,
            contentType: false,
            processData: false,
            data: formdata ? formdata : form.serialize(),
            success: function(response) {
                if (response.st == 'success') {
                    swal("success!", "Your password changed successfully!", "success"); //swal is library
                    // datatable_load('');
                    window.location.href = "<?php echo base_url('Home/login') ?>";
                    $('#save_data').prop('disabled', false);

                } else {
                    toastr.info(response.msg);
                    // $('.error-msg').html(response.msg);
                    // location.reload();
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