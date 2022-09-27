<?= $this->extend(THEME . 'template') ?>

<?= $this->section('content') ?>

<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
        	<div class="col-md-6">
                <div class="page-title">
            		<h1>Login</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active">Login</li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<div class="login_register_wrap section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-md-10">
                <div class="login_wrap">
            		<div class="padding_eight_all bg-white">
                        <div class="heading_s1">
                            <h3>Login</h3>
                        </div>
                        <form action="<?= url('Home/login') ?>" method="post">
						<?php if (!empty($msg) && $msg['st'] == 'failed') { ?>
							<div class="alert alert-danger alert-dismissible" role="alert">
								<button class="close" type="button" data-dismiss="alert" aria-label="Close"><span class="mdi mdi-close" aria-hidden="true"></span></button>
								<div class="icon"> <span class="mdi mdi-close-circle-o"></span></div>
								<div class="message"><strong>Failed!</strong> <?= $msg['msg']; ?></div>
							</div>
						<?php } ?>
                            <div class="form-group">
							<input type="text" class="form-control" id="inputName" placeholder="Username*" name="email" required>

                            </div>
                            <div class="form-group">
							<input type="password" class="form-control" id="txtPassword" placeholder="Password*" name="password" required>
							<!-- <div class="input-group-addon">
                                        <a type="button" id="btnToggle" class="toggle">
                                            <i id="eyeIcon" class="fa fa-eye"></i>
                                        </a>
                                    </div> -->
                            </div>
                            <div class="login_footer form-group">
                                <!-- <div class="chek-form">
                                    <div class="custome-checkbox">
                                        <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox1" value="">
                                        <label class="form-check-label" for="exampleCheckbox1"><span>Remember me</span></label>
                                    </div>
                                </div> -->
                                <a href="#" name="send_otp" id="send_otp" >Forgot password?</a>
                            </div>
                            <div class="form-group">
                                <button type="submit"  id="save_data" class="btn btn-fill-out btn-block" name="login">Log in</button>
                            </div>
                        </form>
                        
                        
                        <div class="form-note text-center">Don't Have an Account? <a href="<?= url('Home/register') ?>">Sign up now</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
<?= $this->section('scripts') ?>
<script>
    let passwordInput = document.getElementById("txtPassword"),

        toggle = document.getElementById("btnToggle"),
        icon = document.getElementById("eyeIcon");

    function togglePassword() {
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            icon.classList.add("fa-eye-slash");
            //toggle.innerHTML = 'hide';
        } else {
            passwordInput.type = "password";
            icon.classList.remove("fa-eye-slash");
            //toggle.innerHTML = 'show';
        }
    }

    function checkInput() {

    }

    toggle.addEventListener("click", togglePassword, false);
    passwordInput.addEventListener("keyup", checkInput, false);
</script>
<script>
	$('#send_otp').click(function(event) {
		event.preventDefault();
		var email = $('#inputName').val();
		if (email == '') {
			toastr.error("Please Enter Email");
			return false;
		}
		$('#send_otp').prop('disabled', true);
		$('.error-msg').html('');
		$('.form_proccessing').html('Please wait...');
		$.ajax({
			method: "post",
			url: "<?= url('Home/forgot_password') ?>",
			data: "email=" + $("#inputName").val(),
			success: function(response) {
				if (response.st == 'success') {
					$('#send_otp').prop('disabled', false);
					toastr.success("OTP successfully sent to your mail");
					window.location.href = "<?= url('Home/forgot_password') ?>";
				} else {
					$('#send_otp').prop('disabled', false);
					toastr.error("Enter Valid Email");
					$('.form_proccessing').html('');
				}
			},
			error: function() {
				alert('Error');
			}
		});
	});
</script>
<?= $this->endSection() ?>