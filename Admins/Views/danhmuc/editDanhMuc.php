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
                            <h1>Cập nhật Danh Mục</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Cập nhật Danh Mục</li>
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
                            <div class="card card-primary">
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form action="<?= BASE_URL_ADMIN . '?act=sua-danh-muc' ?>" method="post" enctype="multipart/form-data">
                                    <div class="card-body row">
                                        <input type="text" name="id" id="" value="<?= $danhMuc['id'] ?>" hidden>
                                        <div class="form-group col-12">
                                            <label>Tên danh mục</label>
                                            <input type="text" class="form-control" name="ten_danh_muc" placeholder="Nhập tên sản phẩm..."
                                                value="<?= $danhMuc['ten_danh_muc'] ?>">
                                        </div>
                                        <div class="form-group col-12">
                                            <label>Mô tả</label>
                                            <textarea name="mo_ta" id="" cols="30" rows="10" class="form-control"><?= $danhMuc['mo_ta'] ?></textarea>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Cập nhật danh mục</button>
                                    </div>
                            </div>
                            <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php include './views/layout/footer.php' ?>