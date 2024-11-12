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
                    <h1>Quản lý tài khoản quản trị</h1>
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
                            <h3 class="card-title">Thêm tài khoản quản trị</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="<?= BASE_URL_ADMIN . '?act=them-quan-tri' ?>" method="POST">
                            <div class="card-body row">
                                <div class="form-group col-12">
                                    <label>Họ tên</label>
                                    <input type="text" class="form-control" name="ho_ten" placeholder="Nhập họ tên">
                                    <?php if (isset($_SESSION['errors']['ho_ten'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['errors']['ho_ten'] ?></p>
                                    <?php } ?>
                                </div>

                                <div class="form-group col-12">
                                    <label>Email</label>
                                    <input type="text" class="form-control" name="email" placeholder="Nhập email">
                                    <?php if (isset($_SESSION['errors']['email'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['errors']['email'] ?></p>
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