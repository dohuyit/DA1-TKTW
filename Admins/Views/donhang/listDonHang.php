<?php include './views/layout/header.php' ?>


<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <?php include './views/layout/navbar.php' ?>
    <?php include './views/layout/sidebar.php' ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Danh sách đơn hàng</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Danh sách đơn hàng</li>
              </ol>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <!-- /.card-header -->
                <div class="card-header">
                </div>
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped ">
                    <thead>
                      <tr>
                        <th>STT</th>
                        <th>Mã đơn hàng</th>
                        <th>Tên người nhận</th>
                        <th>Số điện thoại</th>
                        <th>Ngày đặt</th>
                        <th>Tổng tiền</th>
                        <th>Trạng thái</th>
                        <th>Thao tác</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($listDonHang as $key => $donHang) { ?>
                        <tr>
                          <td><?= $key + 1 ?></td>
                          <td><?= $donHang['ma_don_hang'] ?></td>
                          <td><?= $donHang['ten_nguoi_nhan'] ?></td>
                          <td><?= $donHang['sdt_nguoi_nhan'] ?></td>
                          <td><?= $donHang['ngay_dat'] ?></td>
                          <td><?= $donHang['tong_tien'] ?></td>
                          <td><?= $donHang['ten_trang_thai'] ?></td>

                          <td>
                            <div class="btn-group">
                              <a href="<?= BASE_URL_ADMIN . '?act=chi-tiet-don-hang&id_don_hang=' . $donHang['id'] ?>"><button class="btn btn-primary"><i class="fas fa-eye"></i></button></a>
                              <a href="<?= BASE_URL_ADMIN . '?act=form-sua-don-hang&id_don_hang=' . $donHang['id'] ?>"> <button class="btn btn-warning"><i class="fas fa-cogs"></i></button></a>
                            </div>
                          </td>
                        </tr>
                      <?php } ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>STT</th>
                        <th>Mã đơn hàng</th>
                        <th>Tên người nhận</th>
                        <th>Số điện thoại</th>
                        <th>Ngày đặt</th>
                        <th>Tổng tiền</th>
                        <th>Trạng thái</th>
                        <th>Thao tác</th>
                      </tr>
                    </tfoot>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php include './views/layout/footer.php' ?>