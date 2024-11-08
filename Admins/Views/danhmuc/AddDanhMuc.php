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
                            <h1>Thêm Danh Mục</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Thêm Danh Mục</li>
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
                                <form action="<?= BASE_URL_ADMIN . '?act=them-danh-muc' ?>" method="POST" enctype="multipart/form-data">
                                    <div class="card-body row">
                                        <div class="form-group col-12">
                                            <label>Tên danh mục</label>
                                            <input type="text" class="form-control" name="ten_danh_muc" placeholder="Nhập tên danh mục...">
                                            <?php if (isset($errors['ten_danh_muc'])) { ?>
                                                <p class="text-danger"><?= $errors['ten_danh_muc'] ?></p>
                                            <?php } ?>
                                        </div>
                                        <div class="form-group col-12">
                                            <label>Mô tả</label>
                                            <textarea name="mo_ta" id="" cols="30" rows="10" class="form-control" placeholder="Nhập mô tả..."></textarea>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Thêm danh mục</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php include './views/layout/footer.php' ?>