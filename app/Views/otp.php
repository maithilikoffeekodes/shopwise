<?= $this->extend(THEME . 'template') ?>

<?= $this->section('content') ?>


<div class="page main-signin-wrapper">

	<!-- Row -->
	<section class="middle">
		<div class="container">
			<div class="row align-items-start justify-content-center">

				<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
					<form class="border p-3 rounded" action="<?= url('Home/otp')?>" method="post">
						<div class="form-group">
							<label>Email *</label>
							<input type="text" class="form-control" placeholder="Username*" name="email">
						</div>

						<div class="form-group">
							<label>Password *</label>
							<input type="password" class="form-control" placeholder="Password*" name="password">
						</div>

						<!-- <div class="form-group">
							<div class="d-flex align-items-center justify-content-between">
								<div class="flex-1">
									<input id="dd" class="checkbox-custom" name="dd" type="checkbox">
									<label for="dd" class="checkbox-custom-label">Remember Me</label>
								</div>
								<div class="eltio_k2">
									<a href="#">Lost Your Password?</a>
								</div>
							</div>
						</div> -->
						<div class="error-msg"></div>
                        <div class="form_proccessing"></div>
						<div class="form-group">
							<button type="submit" id="save_data" class="btn btn-md full-width bg-dark text-light fs-md ft-medium">Login</button>
						</div>
						
					</form>
				</div>	
			</div>
		</div>
	</section>
	<!-- End Row -->

</div>
<?= $this->endSection() ?>