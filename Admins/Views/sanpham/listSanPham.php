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
                            <h1>Danh sách sản phẩm</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Danh sách sản phẩm</li>
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
                                    <a href="<?= BASE_URL_ADMIN . '?act=form-them-san-pham' ?>">
                                        <button class="btn btn-primary">Thêm sản phẩm</button>
                                    </a>
                                </div>
                                <div class="card-body">
                                    <table id="example1" class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>Ảnh sản phẩm</th>
                                                <th>Tên sản phẩm</th>
                                                <th>Giá tiền</th>
                                                <th>Số lượng</th>
                                                <th>Danh mục</th>
                                                <th>Trạng thái</th>
                                                <th>Thao tác</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($listSanPham as $key => $sp) :
                                            ?>
                                                <tr>
                                                    <td><?= $key + 1 ?></td>
                                                    <td><img src="<?= BASE_URL . $sp['hinh_anh'] ?>" alt="Lỗi hình ảnh" width="120" height="120"></td>
                                                    <td><?= $sp['ten_san_pham'] ?></td>
                                                    <td><?= $sp['gia_san_pham'] ?></td>
                                                    <td><?= $sp['so_luong'] ?></td>
                                                    <td><?= $sp['danh_muc_id'] ?></td>
                                                    <td><?= $sp['trang_thai'] ?></td>
                                                    <td>
                                                        <a href="<?= BASE_URL_ADMIN . '?act=form-sua-san-pham&id_san_pham=' . $sp['id'] ?>"> <button class="btn btn-warning text-white"><i class="fas fa-edit"></i></button></a>
                                                        <a href="<?= BASE_URL_ADMIN . '?act=xoa-san-pham&id_san_pham=' . $sp['id'] ?>" onclick="return confirm('Bạn có muốn xóa không?')"><button class="btn btn-danger text-white"><i class="fas fa-trash-alt"></i></button></a>
                                                    </td>
                                                </tr>
                                            <?php endforeach ?>
                                        </tbody>
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

</body>

</html>