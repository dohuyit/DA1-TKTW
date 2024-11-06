<?php include './Views/layout/header.php' ?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?php include './Views/layout/navbar.php' ?>


        <?php include './Views/layout/sidebar.php' ?>


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Dashboard</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-md-3 col-sm-6 col-12 card-infor-header ">
                            <div class="info-box bg-info">
                                <span class="info-box-icon"><i class="fas fa-gifts"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Đơn hàng</span>
                                    <span class="info-box-number">41,410</span>

                                    <span class="progress-description">
                                        70% Increase in 30 Days
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-3 col-sm-6 col-12 card-infor-header">
                            <div class="info-box bg-success">
                                <span class="info-box-icon"><i class="fas fa-hand-holding-usd"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Tổng doanh thu</span>
                                    <span class="info-box-number">41,410</span>

                                    <span class="progress-description">
                                        70% Increase in 30 Days
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-3 col-sm-6 col-12 card-infor-header">
                            <div class="info-box bg-warning text-white">
                                <span class="info-box-icon"><i class="fas fa-boxes"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Sản phẩm</span>
                                    <span class="info-box-number">41,410</span>

                                    <span class="progress-description">
                                        70% Increase in 30 Days
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->

                        <!-- /.col -->
                        <div class="col-md-3 col-sm-6 col-12 card-infor-header">
                            <div class="info-box bg-danger">
                                <span class="info-box-icon"><i class="fas fa-comments"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Bình luận sản phẩm</span>
                                    <span class="info-box-number">41,410</span>

                                    <span class="progress-description">
                                        70% Increase in 30 Days
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- Main row -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <h4 class="py-2 px-3 font-weight-bold">Đơn hàng cần xác nhận</h4>
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-striped table-hover text-nowrap">
                                        <thead>
                                            <tr>
                                                <th>Khách Hàng</th>
                                                <th>Ngày Đặt Hàng</th>
                                                <th>Giỏ Hàng</th>
                                                <th>Trạng Thái</th>
                                                <th>Thao Tác</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Trần Thị B</td>
                                                <td>11-7-2023</td>
                                                <td>2 sản phẩm</td>
                                                <td>
                                                    <span class="badge bg-primary">Chờ xác nhận</span>
                                                </td>
                                                <td>
                                                    <button
                                                        type="button"
                                                        class="btn btn-danger btn-sm text-white ">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                    <button
                                                        type="button"
                                                        class="btn btn-success btn-sm ">
                                                        <i class="fas fa-check"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-md-7">
                            <!-- LINE CHART -->
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">Line Chart</h3>
                                </div>
                                <div class="card-body">
                                    <div class="chart">
                                        <div class="chartjs-size-monitor">
                                            <div class="chartjs-size-monitor-expand">
                                                <div class=""></div>
                                            </div>
                                            <div class="chartjs-size-monitor-shrink">
                                                <div class=""></div>
                                            </div>
                                        </div>
                                        <canvas
                                            id="lineChart"
                                            style="
                          min-height: 250px;
                          height: 250px;
                          max-height: 250px;
                          max-width: 100%;
                          display: block;
                          width: 572px;
                        "
                                            width="715"
                                            height="312"
                                            class="chartjs-render-monitor"></canvas>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <div class="col-md-5">
                            <!-- USERS LIST -->
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Khách hàng mới</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-0">
                                    <div class="list-group">
                                        <div class="list-group-item d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <img src="dist/img/user1-128x128.jpg" alt="User Image" class="rounded-circle mr-3" style="width: 50px;">
                                                <div>
                                                    <a class="users-list-name font-weight-bold h5 mb-1" href="#">Alexander Pierce</a>
                                                    <p class="text-muted mb-0">Senior Web Developer</p>
                                                </div>
                                            </div>
                                            <span class="badge badge-success">Active</span>
                                        </div>
                                        <div class="list-group-item d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <img src="dist/img/user8-128x128.jpg" alt="User Image" class="rounded-circle mr-3" style="width: 50px;">
                                                <div>
                                                    <a class="users-list-name font-weight-bold h5 mb-1" href="#">Norman</a>
                                                    <p class="text-muted mb-0">UI/UX Designer</p>
                                                </div>
                                            </div>
                                            <span class="badge badge-warning">Pending</span>
                                        </div>
                                        <div class="list-group-item d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <img src="dist/img/user7-128x128.jpg" alt="User Image" class="rounded-circle mr-3" style="width: 50px;">
                                                <div>
                                                    <a class="users-list-name font-weight-bold h5 mb-1" href="#">Jane</a>
                                                    <p class="text-muted mb-0">Project Manager</p>
                                                </div>
                                            </div>
                                            <span class="badge badge-danger">Inactive</span>
                                        </div>
                                        <div class="list-group-item d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <img src="dist/img/user7-128x128.jpg" alt="User Image" class="rounded-circle mr-3" style="width: 50px;">
                                                <div>
                                                    <a class="users-list-name font-weight-bold h5 mb-1" href="#">Jane</a>
                                                    <p class="text-muted mb-0">Frontend Developer</p>
                                                </div>
                                            </div>
                                            <span class="badge badge-danger">Inactive</span>
                                        </div>
                                    </div>
                                </div>
                                <!--/.card -->
                            </div>
                        </div>
                        <!-- /.row (main row) -->
                    </div>
                    <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php include './Views/layout/footer.php' ?>