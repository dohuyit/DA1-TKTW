<?php include './Views/layout/header.php' ?>

<?php include './Views/layout/navbar.php' ?>

<?php include './Views/layout/sidebar.php' ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Chỉnh sửa thông tin đơn hàng: <?= $donHang['ma_don_hang'] ?></h1>
        </div>
      </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">

          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Sửa đơn hàng</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="<?= BASE_URL_ADMIN . '?act=sua-don-hang' ?>" method="POST">
              <input type="text" name="don_hang_id" id="" value="<?= $donHang['id'] ?>" hidden>
              <div class="card-body">

                <div class="form-group">
                  <label>Tên người nhân</label>
                  <input type="text" class="form-control" name="ten_nguoi_nhan" value="<?= $donHang['ten_nguoi_nhan'] ?>" placeholder="Nhập tên danh mục">
                  <?php if (isset($_SESSION['errors']['ten_nguoi_nhan'])) { ?>
                    <p class="text-danger"><?= $_SESSION['errors']['ten_nguoi_nhan'] ?></p>
                  <?php } ?>
                </div>

                <div class="form-group">
                  <label>Số điện thoại</label>
                  <input type="text" class="form-control" name="sdt_nguoi_nhan" value="<?= $donHang['sdt_nguoi_nhan'] ?>" placeholder="Nhập tên danh mục">
                  <?php if (isset($_SESSION['errors']['sdt_nguoi_nhan'])) { ?>
                    <p class="text-danger"><?= $_SESSION['errors']['sdt_nguoi_nhan'] ?></p>
                  <?php } ?>
                </div>


                <div class="form-group">
                  <label>Email</label>
                  <input type="text" class="form-control" name="email_nguoi_nhan" value="<?= $donHang['email_nguoi_nhan'] ?>" placeholder="Nhập tên danh mục">

                  <?php if (isset($_SESSION['errors']['email_nguoi_nhan'])) { ?>
                    <p class="text-danger"><?= $_SESSION['errors']['email_nguoi_nhan'] ?></p>
                  <?php } ?>
                </div>

                <div class="form-group">
                  <label>Địa chỉ</label>
                  <input type="text" class="form-control" name="dia_chi_nguoi_nhan" value="<?= $donHang['dia_chi_nguoi_nhan'] ?>" placeholder="Nhập tên danh mục">
                  <?php if (isset($_SESSION['errors']['dia_chi_nguoi_nhan'])) { ?>
                    <p class="text-danger"><?= $_SESSION['errors']['dia_chi_nguoi_nhan'] ?></p>
                  <?php } ?>
                </div>
                <div class="form-group">
                  <label>Ghi chú</label>
                  <textarea name="ghi_chu" class="form-control" placeholder="Nhập mô tả" rows="8"><?= $donHang['ghi_chu'] ?></textarea>
                  <?php if (isset($_SESSION['errors']['ghi_chu'])) { ?>
                    <p class="text-danger"><?= $_SESSION['errors']['ghi_chu'] ?></p>
                  <?php } ?>
                </div>
                <div class="form-group">
                  <label for="inputStatus">Trạng thái đơn hàng</label>
                  <select id="inputStatus" name="trang_thai_id" class="form-control custom-select">
                    <?php foreach ($listTrangThaiDonHang as $trangThai) { ?>
                      <option <?= $trangThai['id'] < $donHang['trang_thai_id'] ? 'disabled' : '' ?> <?= $trangThai['id'] == $donHang['trang_thai_id'] ? 'selected' : '' ?> value="<?= $trangThai['id'] ?>">
                        <?= $trangThai['ten_trang_thai'] ?>
                      </option>
                    <?php } ?>
                  </select>
                  <?php if (isset($_SESSION['errors']['trang_thai'])) { ?>
                    <p class="text-danger"><?= $_SESSION['errors']['trang_thai'] ?></p>
                  <?php } ?>
                </div>

              </div>


          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
          </form>
        </div>



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

</div>
<!--footer-->
<?php include './Views/layout/footer.php'; ?>
<script>
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
</script>

</body>


</html>