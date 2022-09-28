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
                    <li class="breadcrumb-item"><a href="<?= url('Home/index')?>">Home</a></li>
                    <!-- <li class="breadcrumb-item"><a href="#">Pages</a></li> -->
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
        <div class="row justify-content-center" >
            
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
                                            <td>&#8377 <?= $row['total_payment'] ?></td>
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