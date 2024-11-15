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
              <h1>Danh sách tài khoản khách hàng</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Danh sách tài khoản khách hàng</li>
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
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>STT</th>
                        <th>Họ tên</th>
                        <th>Ảnh đại diện</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                        <th>Trạng thái</th>
                        <th>Thao tác</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($listKhachHang as $key => $khachHang) { ?>
                        <tr>
                          <td><?= $key + 1 ?></td>
                          <td><?= $khachHang['ho_ten'] ?></td>
                          <td>
                            <img src="<?= BASE_URL . ($khachHang['anh_dai_dien'] ?? 'Common/assets/image/avt-default.jpg') ?>" alt="" width="120">

                          </td>
                          <td><?= $khachHang['email'] ?></td>
                          <td><?= $khachHang['so_dien_thoai'] ?></td>
                          <td><?= $khachHang['trang_thai'] == 1 ? 'Active' : 'Inactive' ?></td>

                          <td>
                            <div class="btn-group">
                              <a href="<?= BASE_URL_ADMIN . '?act=chi-tiet-khach-hang&id_khach_hang=' . $khachHang['id'] ?>"> <button class="btn btn-primary"><i class="far fa-eye"></i></button></a>
                              <a href="<?= BASE_URL_ADMIN . '?act=form-sua-khach-hang&id_khach_hang=' . $khachHang['id'] ?>"> <button class="btn btn-warning"><i class="fas fa-user-edit"></i></button></a>
                              <a href="<?= BASE_URL_ADMIN . '?act=reset-pass&id_quan_tri=' . $khachHang['id'] ?>" onclick="return confirm('Bạn có muốn reset password không?')"><button class="btn btn-danger"><i class="fas fa-circle-notch"></i></button></a>
                            </div>
                          </td>
                        </tr>
                      <?php } ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>STT</th>
                        <th>Họ tên</th>
                        <th>Ảnh đại diện</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
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