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
                    <h1>Quản lý tài khoản khách hàng</h1>
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
                            <h3 class="card-title">Sửa thông tin tài khoản khách hàng: <?= $khachHang['ho_ten'] ?></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="<?= BASE_URL_ADMIN . '?act=sua-khach-hang' ?>" method="POST">
                            <input type="hidden" name="khach_hang_id" value="<?= $khachHang['id'] ?>">
                            <div class="card-body row">
                                <div class="form-group col-12">
                                    <label>Họ tên</label>
                                    <input type="text" class="form-control" name="ho_ten" value="<?= $khachHang['ho_ten'] ?>" placeholder="Nhập họ tên">
                                    <?php if (isset($_SESSION['errors']['ho_ten'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['errors']['ho_ten'] ?></p>
                                    <?php } ?>
                                </div>

                                <div class="form-group col-12">
                                    <label>Email</label>
                                    <input type="text" class="form-control" name="email" value="<?= $khachHang['email'] ?>" placeholder="Nhập email">
                                    <?php if (isset($_SESSION['errors']['email'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['errors']['email'] ?></p>
                                    <?php } ?>
                                </div>
                                <div class="form-group col-12">
                                    <label>Ngày sinh</label>
                                    <input type="date" class="form-control" name="ngay_sinh" value="<?= $khachHang['ngay_sinh'] ?>">
                                    <?php if (isset($_SESSION['errors']['ngay_sinh'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['errors']['ngay_sinh'] ?></p>
                                    <?php } ?>
                                </div>
                             <!--   <div class="form-group col-12">
                                    <label>Giới tính</label>
                                    <select name="inputStatus" class="form-control custon-select">

                                        <option value="1" <?= $khachHang['gioi_tinh'] == 1 ? 'selected' : '' ?>>Nam</option>
                                        <option value="2" <?= $khachHang['gioi_tinh'] != 1 ? 'selected' : '' ?>>Nữ</option>

                                    </select>
                                
                                </div> -->
                                <div class="form-group col-12">
                                    <label>Giới tính</label>
                                    <select name="gioi_tinh" class="form-control custon-select">
                                        <option value="1" <?php if ($khachHang['gioi_tinh'] == 1) {
                                                                echo 'selected';
                                                            } ?>>Nam</option>
                                        <option value="2" <?php if ($khachHang['gioi_tinh'] != 1) {
                                                                echo 'selected';
                                                            } ?>>Nữ</option>
                                    </select>
                                    <?php if (isset($_SESSION['errors']['gioi_tinh'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['errors']['gioi_tinh'] ?></p>
                                    <?php } ?>
                                </div>

                                <div class="form-group col-12">
                                    <label>Địa chỉ</label>
                                    <input type="text" class="form-control" name="dia_chi" value="<?= $khachHang['dia_chi'] ?>" placeholder="Nhập địa chỉ">
                                    <?php if (isset($_SESSION['errors']['dia_chi'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['errors']['dia_chi'] ?></p>
                                    <?php } ?>
                                </div>
                                <div class="form-group col-12">
                                    <label>Số điện thoại</label>
                                    <input type="text" class="form-control" name="so_dien_thoai" value="<?= $khachHang['so_dien_thoai'] ?>" placeholder="Nhập số điện thoại">
                                    <?php if (isset($_SESSION['errors']['so_dien_thoai'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['errors']['so_dien_thoai'] ?></p>
                                    <?php } ?>
                                </div>
                                <div class="form-group col-12">
                                    <label>Trạng thái tài khoản</label>
                                    <select id="inputStatus" name="trang_thai" class="form-control custom-select">
                                        <option value="">Chọn trạng thái</option>
                                        <option value="1" <?= $khachHang['trang_thai'] == 1 ? 'selected' : '' ?>>Active</option>
                                        <option value="2" <?= $khachHang['trang_thai'] == 2 ? 'selected' : '' ?>>Inactive</option>
                                    </select> <?php if (isset($_SESSION['errors']['trang_thai'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['errors']['trang_thai'] ?></p>
                                    <?php } ?>
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