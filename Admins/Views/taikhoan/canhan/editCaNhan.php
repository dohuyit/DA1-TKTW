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
          <h1>Quản lý tài khoản cá nhân</h1>
        </div>
      </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container">
      <div class="row">
        <!-- left column -->
        <div class="col-md-4">
          <div class="text-center">
            <form action="<?= BASE_URL_ADMIN . '?act=sua-anh-tai-khoan' ?>" method="POST" enctype="multipart/form-data" class="d-flex justify-content-center align-items-center flex-column">
              <input type="text" name="tai_khoan_id" id="" value="<?= $thongTin['id'] ?>" hidden>
              <div class=" bg bg-light d-flex justify-content-center align-items-center shadow" style="border-radius: 50%; width: 170px; height: 170px;">
                <img src=".<?= $thongTin['anh_dai_dien'] ?>"
                  width="150"
                  height="150"
                  class="avatar img-circle"
                  alt="avatar"
                  style="border-radius: 50%;">
              </div>

              <input type="file" name="anh_dai_dien">

              <div class="form-group">
                <label class="col-md-3 control-label"></label>
                <div class="col-md-12">
                  <input type="submit" class="btn btn-primary" value="Cập nhật Avatar">
                </div>
              </div>
              <hr>


            </form>
          </div>
        </div>
        <!-- edit form column -->

        <div class="col-md-8 personal-info">
          <form action="<?= BASE_URL_ADMIN . '?act=sua-thong-tin-ca-nhan-quan-tri' ?>" method="POST">
            <input type="text" name="tai_khoan_id" id="" value="<?= $thongTin['id'] ?>" hidden>


            <h3>Thông tin cá nhân</h3>
            <div class="form-group">
              <label class="col-lg-3 control-label">Họ tên:</label>
              <div class="col-lg-12">
                <input class="form-control" type="text" value="<?= $thongTin['ho_ten'] ?>" name="ho_ten">
                <?php if (isset($_SESSION['errors']['ho_ten'])) { ?>
                  <p class="text-danger"><?= $_SESSION['errors']['ho_ten'] ?></p>
                <?php } ?>
              </div>
            </div>

            <div class="form-group">
              <label class="col-lg-3 control-label">Email:</label>
              <div class="col-lg-12">
                <input class="form-control" type="text" value="<?= $thongTin['email'] ?>" name="email">
                <?php if (isset($_SESSION['errors']['email'])) { ?>
                  <p class="text-danger"><?= $_SESSION['errors']['email'] ?></p>
                <?php } ?>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-3 control-label">Số điện thoại:</label>
              <div class="col-lg-12">
                <input class="form-control" type="number" value="<?= $thongTin['so_dien_thoai'] ?>" name="so_dien_thoai">
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-3 control-label">Địa chỉ:</label>
              <div class="col-lg-12">
                <input class="form-control" type="text" value="<?= $thongTin['dia_chi'] ?>" name="dia_chi">
                <?php if (isset($_SESSION['errors']['dia_chi'])) { ?>
                  <p class="text-danger"><?= $_SESSION['errors']['dia_chi'] ?></p>
                <?php } ?>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-3 control-label"></label>
              <div class="col-md-12">
                <input type="submit" class="btn btn-primary" value="Save Changes">
              </div>
            </div>

          </form>
          <hr>



          <h3>Đổi mật khẩu</h3>
          <?php if (isset($_SESSION['successMk'])) { ?>
            <div class="alert alert-info alert-dismissable">
              <a href="" class="panel-close close" data-dismiss="alert"></a>
              <i class="fa fa-coffee"></i>
              <?= $_SESSION['successMk'] ?>
            </div>
          <?php } ?>
          <form action="<?= BASE_URL_ADMIN . '?act=sua-mat-khau-ca-nhan-quan-tri' ?>" method="POST">
            <div class="form-group">
              <label class="col-md-3 control-label">Mật khẩu cũ:</label>
              <div class="col-md-12">
                <input class="form-control" name="old_pass" type="password" value="">
                <?php if (isset($_SESSION['errors']['old_pass'])) { ?>
                  <p class="text-danger"><?= $_SESSION['errors']['old_pass'] ?></p>
                <?php } ?>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label">Mật khẩu mới:</label>
              <div class="col-md-12">
                <input class="form-control" name="new_pass" type="password" value="">
                <?php if (isset($_SESSION['errors']['new_pass'])) { ?>
                  <p class="text-danger"><?= $_SESSION['errors']['new_pass'] ?></p>
                <?php } ?>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label">Nhập lại mật khẩu mới:</label>
              <div class="col-md-12">
                <input class="form-control" name="confirm_pass" type="password" value="">
                <?php if (isset($_SESSION['errors']['confirm_pass'])) { ?>
                  <p class="text-danger"><?= $_SESSION['errors']['confirm_pass'] ?></p>
                <?php } ?>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label"></label>
              <div class="col-md-12">
                <input type="submit" class="btn btn-primary" value="Save Changes">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <hr>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!--footer-->
<?php include './Views/layout/footer.php'; ?>
<!-- Control Sidebar -->

<!-- /.control-sidebar -->
</div>
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