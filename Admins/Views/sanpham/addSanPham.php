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
                            <h1>Thêm sản phẩm</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Thêm sản phẩm</li>
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
                                <form action="<?= BASE_URL_ADMIN . '?act=them-san-pham' ?>" method="POST" enctype="multipart/form-data">
                                    <div class="card-body row">
                                        <div class="form-group col-12">
                                            <label>Tên sản phẩm</label>
                                            <input type="text" class="form-control" name="ten_san_pham" value="" placeholder="Nhập tên sản phẩm">
                                            <?php if (isset($_SESSION['errors']['ten_san_pham'])) { ?>
                                                <p class="text-danger"><?= $_SESSION['errors']['ten_san_pham'] ?></p>
                                            <?php } ?>
                                        </div>

                                        <div class="form-group col-6">
                                            <label>Giá sản phẩm</label>
                                            <input type="number" class="form-control" name="gia_san_pham" value="" placeholder="Nhập giá sản phẩm">
                                            <?php if (isset($_SESSION['errors']['gia_san_pham'])) { ?>
                                                <p class="text-danger"><?= $_SESSION['errors']['gia_san_pham'] ?></p>
                                            <?php } ?>
                                        </div>

                                        <div class="form-group col-6">
                                            <label>Giá khuyến mãi</label>
                                            <input type="number" class="form-control" name="gia_khuyen_mai" value="" placeholder="Nhập giá sản phẩm">
                                            <?php if (isset($_SESSION['errors']['gia_khuyen_mai'])) { ?>
                                                <p class="text-danger"><?= $_SESSION['errors']['gia_khuyen_mai'] ?></p>
                                            <?php } ?>
                                        </div>

                                        <div class="form-group col-6">
                                            <label>Hình ảnh</label>
                                            <div class="image-upload-container" id="uploadContainer">
                                                <div class="upload-message" id="uploadMessage">
                                                    <div class="upload-icon"><i class="fas fa-camera-retro"></i></div>
                                                    <span>Nhấn để chọn ảnh</span>
                                                </div>
                                                <img id="previewImage" class="preview-image" alt="Preview Image">
                                                <p class="upload-button" id="uploadButton">Chọn lại ảnh</p>
                                                <input type="file" id="imageInput" name="hinh_anh" onchange="displayPreview(event)">
                                            </div>
                                            <?php if (isset($_SESSION['errors']['hinh_anh'])) { ?>
                                                <p class="text-danger"><?= $_SESSION['errors']['hinh_anh'] ?></p>
                                            <?php } ?>
                                        </div>

                                        <div class="form-group col-6">
                                            <label>Album ảnh</label>
                                            <div class="upload-container" id="upload-container">
                                                <i class="fas fa-cloud-upload-alt"></i>
                                                <p>Kéo/Thả ảnh vào đây</p>
                                                <input type="file" name="img_array[]" id="images" multiple accept="image/*">
                                            </div>
                                            <div class="preview" id="preview"></div>
                                        </div>

                                        <div class="form-group col-6">
                                            <label>Số lượng</label>
                                            <input type="number" class="form-control" name="so_luong" value="" placeholder="Nhập số lượng">
                                            <?php if (isset($_SESSION['errors']['so_luong'])) { ?>
                                                <p class="text-danger"><?= $_SESSION['errors']['so_luong'] ?></p>
                                            <?php } ?>
                                        </div>

                                        <div class="form-group col-6">
                                            <label>Ngày nhập </label>
                                            <input type="date" class="form-control" name="ngay_nhap" value="">
                                            <?php if (isset($_SESSION['errors']['ngay_nhap'])) { ?>
                                                <p class="text-danger"><?= $_SESSION['errors']['ngay_nhap'] ?></p>
                                            <?php } ?>
                                        </div>


                                        <div class="form-group col-6">
                                            <label>Danh mục</label>
                                            <select class="form-control" name="danh_muc_id" aria-label="exampleFormControlSelect1">
                                                <option selected disabled>Chọn danh mục sản phẩm</option>
                                                <?php foreach ($listDanhMuc as $danhMuc) { ?>
                                                    <option value="<?= $danhMuc['id'] ?>"><?= $danhMuc['ten_danh_muc'] ?></option>
                                                <?php } ?>
                                            </select>
                                            <?php if (isset($_SESSION['errors']['danh_muc_id'])) { ?>
                                                <p class="text-danger"><?= $_SESSION['errors']['danh_muc_id'] ?></p>
                                            <?php } ?>
                                        </div>

                                        <div class="form-group col-6">
                                            <label>Trạng thái</label>
                                            <select class="form-control" name="trang_thai" aria-label="exampleFormControlSelect1">
                                                <option selected disabled>Tùy chọn sản phẩm</option>
                                                <option value="1">Mặc định</option>
                                                <option value="2">Sale</option>
                                            </select>
                                            <?php if (isset($_SESSION['errors']['trang_thai'])) { ?>
                                                <p class="text-danger"><?= $_SESSION['errors']['trang_thai'] ?></p>
                                            <?php } ?>
                                        </div>

                                        <div class="form-group col-12">
                                            <label>Mô tả</label>
                                            <textarea name="mo_ta" class="form-control" placeholder="Nhập mô tả" rows="10"><?= isset($_SESSION['old_data']['mo_ta']) ? $_SESSION['old_data']['mo_ta'] : '' ?></textarea>
                                        </div>

                                        <?php if (isset($_SESSION['errors']['label'])) { ?>
                                            <p class="text-danger"><?= $_SESSION['errors']['label'] ?></p>
                                        <?php } ?>


                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" name='submit' class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php include './views/layout/footer.php' ?>

</body>

</html>