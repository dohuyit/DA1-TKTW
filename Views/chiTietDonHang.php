<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="Common/assets/css/reset.css" />
    <link rel="stylesheet" href="Common/assets/css/order-detail.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>BEKAT - NHÓM 3</title>
</head>

<body>
    <div class="wrapper">
        <?php require_once "./Views/layout/header.php" ?>
        <main>
            <!-- <section id="main-order-detail">
                <div class="container">
                    <div class="order-detail">
                        <div class="order-info">
                            <h1><i class="fas fa-receipt"></i> <span>Chi Tiết Đơn Hàng <strong class="payment <?= $donHangInfor[0]['trang_thai_thanh_toan'] == 0 ? 'pending' : 'success' ?>"><?= $donHangInfor[0]['trang_thai_thanh_toan'] == 0 ? 'Chưa thanh toán' : 'Đã thanh toán' ?></strong></span></h1>
                            <p><strong><i class="fas fa-barcode"></i> Mã Đơn Hàng: </strong><?= $donHangInfor[0]['ma_don_hang'] ?></p>
                            <p><strong><i class="fas fa-calendar-alt"></i> Ngày Đặt Hàng:</strong> <?= $donHangInfor[0]['ngay_dat'] ?></p>
                            <p><strong><i class="fas fa-info-circle"></i> Trạng Thái:</strong>
                                <span class="status pending"><?= $donHangInfor[0]["ten_trang_thai"] ?></span>
                            </p>
                            <p><strong><i class="fas fa-user"></i> Tên Khách Hàng:</strong> <?= $donHangInfor[0]['ten_nguoi_nhan'] ?></p>
                            <p><strong><i class="fas fa-envelope"></i> Email:</strong> <?= $donHangInfor[0]['email_nguoi_nhan'] ?></p>
                            <p><strong><i class="fas fa-phone-alt"></i> Số Điện Thoại:</strong> <?= $donHangInfor[0]['sdt_nguoi_nhan'] ?></p>
                        </div>

                        <div class="cart-detail">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Ảnh</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Giá</th>
                                        <th>Số lượng</th>
                                        <th>Thành tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($DetailDonHang as $item): ?>
                                        <tr class="item-product-cart">
                                            <td class="img">
                                                <img src="<?= $item['hinh_anh'] ?>" alt="<?= $item['ten_san_pham'] ?>">
                                            </td>
                                            <td class="name">
                                                <p><?= $item['ten_san_pham'] ?></p>
                                            </td>
                                            <td class="price"><?= formatPrice($item['don_gia']) ?></td>
                                            <td class="quantity">
                                                <?= $item['so_luong'] ?>
                                            </td>
                                            <td class="total-wrap">
                                                <div class="content">
                                                    <span><?= formatPrice($item['thanh_tien']) ?></span>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="4" class="text-right"><strong>Tổng Tiền:</strong></td>
                                        <td class="price total"><?= formatPrice($donHangInfor[0]['tong_tien']) ?></td>
                                    </tr>
                                </tfoot>
                            </table>
                            <a href="<?= BASE_URL . '?act=thong-tin-don-hang' ?>" class="btn-forward">
                                <ion-icon name="arrow-back-outline"></ion-icon>
                                <span>Quay lại</span>
                            </a>
                        </div>
                    </div>
                </div>
            </section> -->
            <section id="main-order-detail">
                <div class="container">
                    <div class="order-detail">
                        <div class="order-info">
                            <h1>
                                <i class="fas fa-receipt"></i>
                                <span>
                                    Chi Tiết Đơn Hàng
                                    <strong class="payment <?= $donHangInfor[0]['trang_thai_thanh_toan'] == 0 ? 'pending' : 'success' ?>">
                                        <?= $donHangInfor[0]['trang_thai_thanh_toan'] == 0 ? 'Chưa thanh toán' : 'Đã thanh toán' ?>
                                    </strong>
                                </span>
                            </h1>
                            <p><strong><i class="fas fa-barcode"></i> Mã Đơn Hàng: </strong><?= $donHangInfor[0]['ma_don_hang'] ?></p>
                            <p><strong><i class="fas fa-calendar-alt"></i> Ngày Đặt Hàng:</strong> <?= $donHangInfor[0]['ngay_dat'] ?></p>
                            <p><strong><i class="fas fa-info-circle"></i> Trạng Thái:</strong>
                                <span class="status pending"><?= $donHangInfor[0]["ten_trang_thai"] ?></span>
                            </p>
                            <p><strong><i class="fas fa-user"></i> Tên Khách Hàng:</strong> <?= $donHangInfor[0]['ten_nguoi_nhan'] ?></p>
                            <p><strong><i class="fas fa-envelope"></i> Email:</strong> <?= $donHangInfor[0]['email_nguoi_nhan'] ?></p>
                            <p><strong><i class="fas fa-phone-alt"></i> Số Điện Thoại:</strong> <?= $donHangInfor[0]['sdt_nguoi_nhan'] ?></p>
                            <p><strong><i class="fas fa-wallet"></i> Phương Thức Thanh Toán:</strong>
                                <span class="payment-method <?= $donHangInfor[0]['phuong_thuc_thanh_toan_id'] == 1 ? 'cod' : 'online' ?>">
                                    <?= $donHangInfor[0]['phuong_thuc_thanh_toan_id'] == 1 ? 'Thanh Toán Khi Nhận Hàng (COD)' : 'Thanh Toán Online' ?>
                                </span>
                            </p>
                        </div>

                        <div class="cart-detail">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Ảnh</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Giá</th>
                                        <th>Số lượng</th>
                                        <th>Thành tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($DetailDonHang as $item): ?>
                                        <tr class="item-product-cart">
                                            <td class="img">
                                                <img src="<?= $item['hinh_anh'] ?>" alt="<?= $item['ten_san_pham'] ?>">
                                            </td>
                                            <td class="name">
                                                <p><?= $item['ten_san_pham'] ?></p>
                                            </td>
                                            <td class="price"><?= formatPrice($item['don_gia']) ?></td>
                                            <td class="quantity">
                                                <?= $item['so_luong'] ?>
                                            </td>
                                            <td class="total-wrap">
                                                <div class="content">
                                                    <span><?= formatPrice($item['thanh_tien']) ?></span>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="4" class="text-right"><strong>Tổng Tiền:</strong></td>
                                        <td class="price total"><?= formatPrice($donHangInfor[0]['tong_tien']) ?></td>
                                    </tr>
                                </tfoot>
                            </table>
                            <a href="<?= BASE_URL . '?act=thong-tin-don-hang' ?>" class="btn-forward">
                                <ion-icon name="arrow-back-outline"></ion-icon>
                                <span>Quay lại</span>
                            </a>
                        </div>
                    </div>
                </div>
            </section>

        </main>

        <?php require_once "./Views/layout/footer.php" ?>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script type="module" src="./js/detail.js"></script>
</body>

</html>