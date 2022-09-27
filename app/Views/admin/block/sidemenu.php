<div class="main-sidebar main-sidebar-sticky side-menu">
	<div class="sidemenu-logo">
		<a class="main-logo" href="index.html">
			<img src="<?= ASSETS; ?>img/brand/logo.png" class="header-brand-img desktop-logo" alt="logo">
			<img src="<?= ASSETS; ?>img/brand/icon.png" class="header-brand-img icon-logo" alt="logo">
			<img src="<?= ASSETS; ?>img/brand/logo-light.png" class="header-brand-img desktop-logo theme-logo" alt="logo">
			<img src="<?= ASSETS; ?>img/brand/icon-light.png" class="header-brand-img icon-logo theme-logo" alt="logo">
		</a>
	</div>
	<div class="main-sidebar-body">
		<ul class="nav">
			<li class="nav-label">Dashboard</li>
			<li class="nav-item active show">
				<a class="nav-link" href="index.html"><i class="fe fe-airplay"></i><span class="sidemenu-label">Dashboard</span></a>
			</li>

			<li class="nav-label">Applications</li>

			<li class="nav-item">
				<a class="nav-link with-sub" href=""><i class="fe fe-box"></i><span class="sidemenu-label">Master</span><i class="angle fe fe-chevron-right"></i></a>
				<ul class="nav-sub">
					<li class="nav-item">
						<a class="nav-sub-link" href="<?= url('admin/Home/brand') ?>"><span class="sidemenu-label">Brand</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-sub-link" href="<?= url('admin/Home/category') ?>"><span class="sidemenu-label">Category</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-sub-link" href="<?= url('admin/Home/slider') ?>"><span class="sidemenu-label">Slider</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-sub-link" href="<?= url('admin/Home/item') ?>"><span class="sidemenu-label">Item</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-sub-link" href="<?= url('admin/Home/coupon') ?>"><span class="sidemenu-label">Coupon</span></a>
					</li>
				</ul>
			</li>
			<li class="nav-item ">
				<a class="nav-link" href="<?= url('admin/Home/subscribe') ?>"><i class="fa fa-envelope"></i><span class="sidemenu-label">Subscribe </span></a>
			</li>
			<li class="nav-item ">
				<a class="nav-link" href="<?= url('admin/Home/contact') ?>"><i class="fa fa-phone"></i><span class="sidemenu-label">Contact </span></a>
			</li>
			<li class="nav-label">Order</li>

			<li class="nav-item">
				<a class="nav-link with-sub" href=""><i class="fas fa-luggage-cart"></i><span class="sidemenu-label">Orders</span><i class="angle fe fe-chevron-right"></i></a>
				<ul class="nav-sub">
					<li class="nav-item">
						<a class="nav-sub-link" href="<?= url('admin/Home/order') ?>"><span class="sidemenu-label">OrderList</span></a>
					</li>
				</ul>
			</li>
		</ul>
	</div>
</div>
