<?= $this->extend(THEME . 'template') ?>

<?= $this->section('content') ?>

<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container">
        <!-- STRART CONTAINER -->
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="page-title">
                    <h1>Order Completed</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active">Order Completed</li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<?php //echo"<pre>";print_r($my_orders);exit;
?>
<div class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-3 col-md-4">
                <div class="dashboard_menu">
                    <ul class="nav nav-tabs flex-column" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="dashboard-tab" data-toggle="tab" href="#dashboard" role="tab" aria-controls="dashboard" aria-selected="false"><i class="ti-layout-grid2"></i>Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="orders-tab" data-toggle="tab" href="#orders" role="tab" aria-controls="orders" aria-selected="false"><i class="ti-shopping-cart-full"></i>Orders</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="address-tab" data-toggle="tab" href="#address" role="tab" aria-controls="address" aria-selected="true"><i class="ti-location-pin"></i>My Address</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="account-detail-tab" data-toggle="tab" href="#account-detail" role="tab" aria-controls="account-detail" aria-selected="true"><i class="ti-id-badge"></i>Account details</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="login.html"><i class="ti-lock"></i>Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9 col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3>Orders</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Order</th>
                                        <th>Date</th>
                                        <!-- <th>Status</th> -->
                                        <th>Total</th>
                                        <th>View</th>
                                        <th>Track</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($my_orders as $row) { ?>
                                        <tr>
                                            <td><?= $row['id'] ?></td>
                                            <td><?= $row['order_date'] ?></td>
                                            <!-- <td>Processing</td> -->
                                            <td><?= $row['total_payment'] ?></td>
                                            <td><a href="<?= url('Home/orderview/' . $row['id']) ?>" class="btn btn-fill-out btn-sm">View</a></td>
                                            <td> <a href="<?= url('Home/track_order/' . @$row['id']) ?>" class="btn btn-fill-out btn-sm">Track Order</a></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endsection() ?>