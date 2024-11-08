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
                            <h1>Cập nhật sản phẩm: <?= $sanPham['ten_san_pham'] ?></h1>
                        </div>
                        <div class="col-sm-6 text-right">
                            <a href="<?= BASE_URL_ADMIN . '?act=san-pham' ?>" class="btn btn-dark">
                                <span class="me-2 d-inline">Quay lại</span>
                                <span class="ms-4"><i class="fas fa-undo-alt"></i></span>
                            </a>
                        </div>

                    </div>
                </div>
                <!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card card-primary">
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form action="<?= BASE_URL_ADMIN . '?act=sua-san-pham' ?>" method="POST" enctype="multipart/form-data">
                                    <div class="card-body row">
                                        <input type="hidden" name="san_pham_id" value="<?= $sanPham['id'] ?>">
                                        <div class="form-group col-12">
                                            <label>Tên sản phẩm</label>
                                            <input type="text" class="form-control" name="ten_san_pham" value="<?= $sanPham['ten_san_pham'] ?>" placeholder="Nhập tên sản phẩm" value="<?= $sanPham['ten_san_pham'] ?>">
                                            <?php if (isset($_SESSION['errors']['ten_san_pham'])) { ?>
                                                <p class="text-danger"><?= $_SESSION['errors']['ten_san_pham'] ?></p>
                                            <?php } ?>
                                        </div>

                                        <div class="form-group col-6">
                                            <label>Giá sản phẩm</label>
                                            <input type="number" class="form-control" name="gia_san_pham" value="<?= $sanPham['gia_san_pham'] ?>" placeholder="Nhập giá sản phẩm">
                                            <?php if (isset($_SESSION['errors']['gia_san_pham'])) { ?>
                                                <p class="text-danger"><?= $_SESSION['errors']['gia_san_pham'] ?></p>
                                            <?php } ?>
                                        </div>

                                        <div class="form-group col-6">
                                            <label>Giá khuyến mãi</label>
                                            <input type="number" class="form-control" name="gia_khuyen_mai" value="<?= $sanPham['gia_khuyen_mai'] ?>" placeholder="Nhập giá khuyến mại sản phẩm">
                                            <?php if (isset($_SESSION['errors']['gia_khuyen_mai'])) { ?>
                                                <p class="text-danger"><?= $_SESSION['errors']['gia_khuyen_mai'] ?></p>
                                            <?php } ?>
                                        </div>

                                        <div class="form-group col-6">
                                            <label>Hình ảnh</label>
                                            <div class="image-upload-edit-container">
                                                <img src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="" class="image-update-form">
                                                <input type="file" name="hinh_anh" id="hinh_anh">
                                                <input type="hidden" name="hinh_anh" value="<?= $sanPham['hinh_anh'] ?>">
                                            </div>


                                            <?php if (isset($_SESSION['errors']['hinh_anh'])) { ?>
                                                <p class="text-danger"><?= $_SESSION['errors']['hinh_anh'] ?></p>
                                            <?php } ?>
                                        </div>

                                        <div class="form-group col-6">
                                            <label>Số lượng</label>
                                            <input type="number" class="form-control" name="so_luong" value="<?= $sanPham['so_luong'] ?>" placeholder="Nhập số lượng">
                                            <?php if (isset($_SESSION['errors']['so_luong'])) { ?>
                                                <p class="text-danger"><?= $_SESSION['errors']['so_luong'] ?></p>
                                            <?php } ?>
                                        </div>

                                        <div class="form-group col-6">
                                            <label>Ngày nhập </label>
                                            <input type="date" class="form-control" name="ngay_nhap" value="<?= $sanPham['ngay_nhap'] ?>">
                                            <?php if (isset($_SESSION['errors']['ngay_nhap'])) { ?>
                                                <p class="text-danger"><?= $_SESSION['errors']['ngay_nhap'] ?></p>
                                            <?php } ?>
                                        </div>


                                        <div class="form-group col-6">
                                            <label for="inputStatus">Danh mục</label>
                                            <select id="inputStatus" name="danh_muc_id" class="form-control custom-select">
                                                <?php foreach ($listDanhMuc as $danhMuc) { ?>
                                                    <option <?= $danhMuc['id'] === $sanPham['danh_muc_id'] ? 'selected' : '' ?> value="<?= $danhMuc['id'] ?>"><?= $danhMuc['ten_danh_muc'] ?></option>
                                                <?php } ?>
                                            </select>
                                            <?php if (isset($_SESSION['errors']['danh_muc'])) { ?>
                                                <p class="text-danger"><?= $_SESSION['errors']['danh_muc'] ?></p>
                                            <?php } ?>
                                        </div>

                                        <div class="form-group col-6">
                                            <label>Trạng thái</label>
                                            <select class="form-control" name="trang_thai">
                                                <option <?= $sanPham['trang_thai'] == 1 ? 'selected' : '' ?> value="1">Mặc định</option>
                                                <option <?= $sanPham['trang_thai'] == 1 ? 'selected' : '' ?> value="2">Sale</option>
                                            </select>
                                            <?php if (isset($_SESSION['errors']['trang_thai'])) { ?>
                                                <p class="text-danger"><?= $_SESSION['errors']['trang_thai'] ?></p>
                                            <?php } ?>
                                        </div>

                                        <div class="form-group col-12">
                                            <label for="mo_ta">Mô tả sản phẩm</label>
                                            <textarea name="mo_ta" id="mo_ta" class="form-control" rows="4" value="<?= $sanPham['mo_ta'] ?>"><?= $sanPham['mo_ta'] ?></textarea>
                                        </div>
                                        <?php if (isset($_SESSION['errors']['mo_ta'])) { ?>
                                            <p class="text-danger"><?= $_SESSION['errors']['mo_ta'] ?></p>
                                        <?php } ?>
                                    </div>

                                    <?php if (isset($_SESSION['errors']['label'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['errors']['label'] ?></p>
                                    <?php } ?>


                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" name='submit' class="btn btn-primary">Cập nhật thông tin</button>
                            </div>
                            </form>
                        </div>

                        <div class="col-md-4">
                            <div class="card card-infor">
                                <div class="card-header">
                                    <h3 class="card-title text-light">Album ảnh sản phẩm</h3>
                                </div>
                                <div class="card-body p-0">
                                    <form action="<?= BASE_URL_ADMIN . '?act=sua-album-anh-san-pham' ?>" method="POST" enctype="multipart/form-data">

                                        <div class="table-responsive">
                                            <table id="faqs" class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Ảnh</th>
                                                        <th>File</th>
                                                        <th>
                                                            <div class="text-center"><button type="button" onclick="addfaqs();" class="badge badge-success"><i class="fa fa-plus"></i> ADD NEW</button></div>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <input type="hidden" name="san_pham_id" value="<?= $sanPham['id'] ?>">
                                                    <input type="hidden" name="img_delete" id="img_delete">
                                                    <?php foreach ($listAnhSanPham as $key => $value) { ?>
                                                        <tr id="faqs-row-<?= $key ?>">
                                                            <input type="hidden" name="current_img_ids[]" value="<?= $value['id'] ?>">
                                                            <td><img src="<?= BASE_URL . $value['link_hinh_anh'] ?>" alt="" style="width: 50px; height: 50px"></td>
                                                            <td><input type="file" name="img_array[]" class="form-control"></td>
                                                            <td class="mt-10"><button type="button" class="badge badge-danger" onclick="removeRow(<?= $key ?>, <?= $value['id'] ?>)"><i class="fa fa-trash"></i> Delete</button></td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>


                                </div>
                                <div class="card-footer text-center">
                                    <button type="submit" class="btn btn-primary">Sửa thông tin</button>
                                </div>
                                </form>
                            </div>
                        </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php include './views/layout/footer.php' ?>

        <script>
            var faqs_row = <?= count($listAnhSanPham); ?>;

            function addfaqs() {
                html = '<tr id="faqs-row' + faqs_row + '">';
                html += '<td><img src="" alt="" style = "width: 50px; height: 50px"></td>';
                html += '<td><input type="file"name ="img_array[]" class="form-control"></td>';
                html += '<td class="mt-10"><button type= "button" class="badge badge-danger" onclick="removeRow(' + faqs_row + ', null);' + faqs_row + '\').remove();"><i class="fa fa-trash"></i> Delete</button></td>';

                html += '</tr>';

                $('#faqs tbody').append(html);

                faqs_row++;
            }

            function removeRow(rowId, imgId) {
                $('#faqs-row-' + rowId).remove()
                if (imgId !== null) {
                    var imgDeleteInput = document.getElementById('img_delete');
                    var currentValue = imgDeleteInput.value;
                    imgDeleteInput.value = currentValue ? currentValue + ',' + imgId : imgId;
                }

            }
        </script>
</body>

</html>