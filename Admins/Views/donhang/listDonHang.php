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
          <h1>Quản lý đơn hàng</h1>
        </div>
      </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">

            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                  <div class="col-sm-12 col-md-6">
                    <div class="dt-buttons btn-group flex-wrap">

                    </div>
                  </div>
                  <div class="col-sm-12 col-md-6">
                    <div id="example1_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="example1"></label></div>
                  </div>
                </div>

                <div class="table-responsive">
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
                  <div class="row">
                    <div class="col-sm-12 col-md-5">
                      <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
                    </div>
                    <div class="col-sm-12 col-md-7">
                      <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                        <ul class="pagination">
                          <li class="paginate_button page-item previous disabled" id="example1_previous"><a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                          <li class="paginate_button page-item active"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                          <li class="paginate_button page-item next" id="example1_next"><a href="#" aria-controls="example1" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
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
<?php include './Views/layout/footer.php'; ?>

<!-- /.control-sidebar -->
</div>
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
  var faqs_row = 0;

  function addfaqs() {

    html = '<tr id="faqs-row' + faqs_row + '">';
    html += '<td><input type="text" class="form-control" placeholder="User name"></td>';
    html += '<td><input type="text" placeholder="Product name" class="form-control"></td>';
    html += '<td class="text-danger mt-10"> 18.76% <i class="fa fa-arrow-down"></i></td>';
    html += '<td class="mt-10"><button class="badge badge-danger" onclick="$(\'#faqs-row' + faqs_row + '\').remove();"><i class="fa fa-trash"></i> Delete</button></td>';

    html += '</tr>';

    $('#faqs tbody').append(html);

    faqs_row++;
  }
  // Get the search input element
const searchInput = document.querySelector('#example1_filter input');

// Add an event listener for the 'input' event
searchInput.addEventListener('input', function() {
  const searchTerm = searchInput.value.toLowerCase();
  
  // Get all the table rows
  const tableRows = document.querySelectorAll('#example1 tbody tr');
  
  // Loop through the table rows and hide/show them based on the search term
  tableRows.forEach(function(row) {
    const rowText = row.textContent.toLowerCase();
    if (rowText.includes(searchTerm)) {
      row.style.display = 'table-row';
    } else {
      row.style.display = 'none';
    }
  });
});
</script>
</body>

</html>