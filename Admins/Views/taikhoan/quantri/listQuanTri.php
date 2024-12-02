<?php include './Views/layout/header.php' ?>
<!-- Navbar -->
<?php include './Views/layout/navbar.php' ?>

<!-- /.navbar -->

<!-- Main Sidebar Container -->
<?php include './Views/layout/sidebar.php' ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Quản lý tài khoản quản trị viên</h1>

        </div><!-- /.container-fluid -->
      </div>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <a href="<?= BASE_URL_ADMIN . '?act=form-them-quan-tri' ?>">
                <button class="btn btn-success">Thêm tài khoản</button>
              </a>

            </div>
            <!-- /.card-header -->
            <div class="card-body">

              <!-- <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                  <div class="col-sm-12 col-md-6">
                    <div class="dt-buttons btn-group flex-wrap">

                    </div>
                  </div>
                  <div class="col-sm-12 col-md-6">
                    <div id="example1_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="example1"></label></div>
                  </div>
                </div> -->

              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>STT</th>
                    <th>Họ tên</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($listQuanTri as $key => $quanTri) { ?>
                    <tr>
                      <td><?= $key + 1 ?></td>
                      <td><?= $quanTri['ho_ten'] ?></td>
                      <td><?= $quanTri['email'] ?></td>
                      <td><?= $quanTri['so_dien_thoai'] ?></td>
                      <td><?= $quanTri['trang_thai'] == 1 ? '<span class="btn btn-outline-info rounded">Hoạt động</span>' : '<span class="btn btn-outline-danger rounded">Khóa</span>' ?></td>

                      <td>
                        <a href="<?= BASE_URL_ADMIN . '?act=form-sua-quan-tri&id_quan_tri=' . $quanTri['id'] ?>"> <button class="btn btn-warning">Sửa</button></a>
                        <a href="<?= BASE_URL_ADMIN . '?act=reset-pass&id_quan_tri=' . $quanTri['id'] ?>" onclick="return confirm('Bạn có muốn reset password không?')"><button class="btn btn-danger">Reset</button></a>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>STT</th>
                    <th>Họ tên</th>
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
<!--footer-->
<<?php include './Views/layout/footer.php'; ?>

  <!-- /.control-sidebar -->
  </div>
  </body>

  </html>


















  </table>
  </div>
  </div>

  </div>
  </div>









  </body>
  <script>
    $(function() {
      $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>

  </html>