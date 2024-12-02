<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="Common/assets/css/reset.css" />
    <link rel="stylesheet" href="Common/assets/css/orders.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>BEKAT - NHÓM 3</title>
</head>

<body>
    <div class="wrapper">
        <?php require_once './Views/layout/header.php' ?>
        <main>
            <section id="title-main">
                <div class="container">
                    <div class="progress-bar">
                        <div class="step ">
                            <div class="step-icon">
                                <svg width="17" height="21" viewBox="0 0 17 21" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M0.780969 20.3C0.574712 20.3 0.376872 20.2182 0.230839 20.0726C0.0848054 19.9269 0.00249869 19.7293 0.00196915 19.523V5.77004C0.00131058 5.66723 0.0209594 5.56529 0.0597883 5.47009C0.0986172 5.37489 0.155862 5.28829 0.228238 5.21526C0.300614 5.14224 0.386698 5.08422 0.481549 5.04454C0.5764 5.00486 0.678153 4.9843 0.780969 4.98404H3.16697C3.32212 3.69357 3.94475 2.50469 4.91713 1.64221C5.8895 0.779738 7.14421 0.303467 8.44397 0.303467C9.74373 0.303467 10.9984 0.779738 11.9708 1.64221C12.9432 2.50469 13.5658 3.69357 13.721 4.98404H16.102C16.2053 4.98364 16.3077 5.0037 16.4032 5.04306C16.4988 5.08242 16.5856 5.14031 16.6586 5.21337C16.7317 5.28644 16.7896 5.37324 16.8289 5.46878C16.8683 5.56432 16.8884 5.66671 16.888 5.77004V19.523C16.8874 19.6257 16.8667 19.7272 16.8269 19.8218C16.7871 19.9165 16.729 20.0023 16.656 20.0745C16.583 20.1466 16.4965 20.2037 16.4015 20.2424C16.3064 20.2811 16.2046 20.3007 16.102 20.3H0.780969ZM4.74397 4.98404H12.144C11.9968 4.10917 11.5443 3.31475 10.867 2.74183C10.1896 2.16891 9.33114 1.85454 8.44397 1.85454C7.5568 1.85454 6.69833 2.16891 6.02097 2.74183C5.3436 3.31475 4.89116 4.10917 4.74397 4.98404Z"
                                        fill="#000"></path>
                                    <path
                                        d="M12.634 8.65607V6.78107H14.381V8.65607C14.381 9.00107 13.99 9.28107 13.508 9.28107C13.026 9.28107 12.634 9.00107 12.634 8.65607ZM2.50195 8.65607V6.78107H4.24895V8.65607C4.24895 9.00107 3.85795 9.28107 3.37495 9.28107C2.89195 9.28107 2.50195 9.00107 2.50195 8.65607Z"
                                        fill="white"></path>
                                </svg>
                            </div>
                            <span>Giỏ hàng</span>
                        </div>
                        <div class="step active">
                            <div class="step-icon"><svg width="17" height="19" viewBox="0 0 17 19" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M13.35 0.806049C13.2609 0.652538 13.1331 0.525046 12.9794 0.436268C12.8257 0.347491 12.6515 0.300525 12.474 0.300049H8.70996V4.75205H15.633L13.35 0.806049Z"
                                        fill="rgb(201, 33, 39)"></path>
                                    <path
                                        d="M7.65586 0.300049H3.85586C3.67808 0.300351 3.5035 0.347343 3.34959 0.43632C3.19568 0.525297 3.06784 0.653138 2.97886 0.807049L0.703857 4.75205H7.65386V0.300049H7.65586Z"
                                        fill="rgb(201, 33, 39)"></path>
                                    <path
                                        d="M0.326904 5.80707V17.0591C0.327434 17.3879 0.458386 17.7032 0.691032 17.9357C0.923679 18.1681 1.23903 18.2988 1.56791 18.2991H14.7619C15.0908 18.2988 15.4061 18.1681 15.6388 17.9357C15.8714 17.7032 16.0024 17.3879 16.0029 17.0591V5.80707H0.326904ZM10.5599 10.5391L7.83191 13.2671C7.78296 13.3161 7.72482 13.355 7.66081 13.3816C7.59681 13.4081 7.5282 13.4218 7.4589 13.4218C7.38961 13.4218 7.321 13.4081 7.257 13.3816C7.193 13.355 7.13486 13.3161 7.08591 13.2671L5.8069 11.9881C5.75437 11.9399 5.71212 11.8816 5.68272 11.8167C5.65332 11.7518 5.63736 11.6816 5.63581 11.6103C5.63426 11.5391 5.64716 11.4683 5.67371 11.4021C5.70027 11.336 5.73994 11.2759 5.79034 11.2255C5.84073 11.1751 5.90081 11.1354 5.96694 11.1089C6.03308 11.0823 6.10391 11.0694 6.17516 11.071C6.24641 11.0725 6.31661 11.0885 6.38153 11.1179C6.44645 11.1473 6.50475 11.1895 6.55291 11.2421L7.4589 12.1481L9.8149 9.79207C9.86389 9.74309 9.92204 9.70423 9.98604 9.67772C10.05 9.65121 10.1186 9.63757 10.1879 9.63757C10.2572 9.63757 10.3258 9.65121 10.3898 9.67772C10.4538 9.70423 10.5119 9.74309 10.5609 9.79207C10.6099 9.84105 10.6487 9.89921 10.6753 9.96321C10.7018 10.0272 10.7154 10.0958 10.7154 10.1651C10.7154 10.2343 10.7018 10.3029 10.6753 10.3669C10.6487 10.4309 10.6099 10.4891 10.5609 10.5381L10.5599 10.5391Z"
                                        fill="rgb(201, 33, 39)"></path>
                                </svg></div>
                            <span>Đặt hàng</span>
                        </div>
                        <div class="step">
                            <div class="step-icon"><svg width="21" height="21" viewBox="0 0 21 21" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M16.3259 9.70705V0.930049C16.3259 0.762962 16.2596 0.602719 16.1414 0.484572C16.0233 0.366424 15.863 0.300049 15.6959 0.300049L11.3039 0.300049V6.52405C11.3043 6.63809 11.2736 6.75007 11.2153 6.84807C11.157 6.94607 11.0732 7.0264 10.9728 7.08049C10.8724 7.13459 10.7592 7.16042 10.6453 7.15524C10.5314 7.15005 10.421 7.11404 10.3259 7.05105L8.32593 5.73905L6.32593 7.05105C6.23091 7.11324 6.12084 7.14859 6.00738 7.15336C5.89391 7.15812 5.78127 7.13213 5.68136 7.07813C5.58146 7.02413 5.49801 6.94413 5.43984 6.8466C5.38167 6.74906 5.35095 6.63761 5.35093 6.52405V0.300049H0.955928C0.788841 0.300049 0.628598 0.366424 0.51045 0.484572C0.392303 0.602719 0.325928 0.762962 0.325928 0.930049L0.325928 14.23C0.325928 14.3128 0.342223 14.3947 0.373884 14.4711C0.405544 14.5476 0.45195 14.617 0.51045 14.6755C0.568951 14.734 0.638402 14.7804 0.714837 14.8121C0.791272 14.8438 0.873195 14.86 0.955928 14.86H10.0709C10.3089 13.3875 11.0752 12.0522 12.2265 11.1037C13.3777 10.1553 14.8351 9.65877 16.3259 9.70705Z"
                                        fill="#999999"></path>
                                    <path
                                        d="M8.67093 4.45905L10.0439 5.35905V0.300049H6.60693V5.35805L7.97993 4.45805C8.08259 4.39063 8.20277 4.35479 8.32559 4.35497C8.44841 4.35514 8.56847 4.39133 8.67093 4.45905Z"
                                        fill="#999999"></path>
                                    <path
                                        d="M16.5559 12.4811C15.8103 12.4811 15.0814 12.7022 14.4614 13.1164C13.8414 13.5307 13.3582 14.1195 13.0729 14.8083C12.7875 15.4972 12.7129 16.2553 12.8583 16.9866C13.0038 17.7179 13.3629 18.3896 13.8901 18.9169C14.4173 19.4441 15.0891 19.8032 15.8204 19.9486C16.5517 20.0941 17.3097 20.0194 17.9986 19.7341C18.6875 19.4488 19.2763 18.9656 19.6905 18.3456C20.1048 17.7256 20.3259 16.9967 20.3259 16.2511C20.3248 15.2515 19.9273 14.2932 19.2205 13.5865C18.5137 12.8797 17.5554 12.4821 16.5559 12.4811ZM18.7759 15.5811L16.2959 18.0621C16.2044 18.1535 16.0803 18.2049 15.9509 18.2049C15.8215 18.2049 15.6974 18.1535 15.6059 18.0621L14.2429 16.6991C14.1961 16.6541 14.1587 16.6002 14.133 16.5406C14.1073 16.4811 14.0937 16.4169 14.0931 16.3521C14.0924 16.2872 14.1047 16.2228 14.1293 16.1627C14.1538 16.1026 14.1901 16.048 14.236 16.0021C14.2818 15.9562 14.3365 15.92 14.3965 15.8954C14.4566 15.8709 14.521 15.8586 14.5859 15.8592C14.6508 15.8599 14.7149 15.8735 14.7745 15.8992C14.8341 15.9249 14.8879 15.9623 14.9329 16.0091L15.9509 17.0271L18.0859 14.8921C18.178 14.8035 18.3011 14.7547 18.4289 14.756C18.5566 14.7572 18.6788 14.8085 18.7691 14.8989C18.8594 14.9892 18.9107 15.1113 18.912 15.2391C18.9133 15.3668 18.8644 15.49 18.7759 15.5821V15.5811Z"
                                        fill="#999999"></path>
                                </svg></div>
                            <span>Hoàn thành đơn hàng</span>
                        </div>
                    </div>
                </div>
            </section>
            <section id="cart-main">
                <div class="container">
                    <form action="<?= BASE_URL . '?act=xu-ly-thanh-toan' ?>" method="post">
                        <div class="body-main-cart">
                            <div class="content-left-cart">
                                <div class="checkout-form">
                                    <div class="form-title">
                                        <h3>
                                            <span><ion-icon name="location-outline"></ion-icon></span>
                                            <span>Địa chỉ giao hàng</span>
                                        </h3>
                                    </div>
                                    <form>
                                        <div class="form-group">
                                            <label for="ten_nguoi_nhan">Họ tên *</label>
                                            <input type="text" name="ten_nguoi_nhan" placeholder="Nhập họ tên của bạn" value="<?= $user['ho_ten'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="email_nguoi_nhan">Email *</label>
                                            <input type="email" name="email_nguoi_nhan" placeholder="Nhập email của bạn" value="<?= $user['email'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="phone">SĐT *</label>
                                            <input type="tel" name="sdt_nguoi_nhan" placeholder="Nhập số điện thoại" value="<?= $user['so_dien_thoai'] ?>">
                                        </div>
                                        <div class="form-group full-width">
                                            <label for="dia_chi">Địa chỉ</label>
                                            <input type="text" name="dia_chi" placeholder="Nhập địa chỉ của bạn" value="<?= $user['dia_chi'] ?>">
                                        </div>
                                        <div class="form-group full-width">
                                            <label for="ghi_chu">Ghi chú</label>
                                            <textarea name="ghi_chu" cols="30" rows="10"
                                                placeholder="Nhập ghi chú..."></textarea>
                                        </div>

                                        <div class="form-title">
                                            <h3>
                                                <span><ion-icon name="card-outline"></ion-icon></span>
                                                <span>Phương thức thanh toán</span>
                                            </h3>
                                        </div>
                                        <div class="payment-method">
                                            <div class="item-payment">
                                                <input type="radio" id="cashon" name="phuong_thuc_thanh_toan_id" value="1" class="custom-control-input" checked />
                                                <label for="">
                                                    Thanh toán khi nhận hàng (COD)
                                                </label>
                                            </div>
                                            <div class="item-payment">
                                                <input type="radio" id="directbank" name="phuong_thuc_thanh_toan_id" value="2" class="custom-control-input" />
                                                <label for="">Thẻ ATM/Visa/Master/JCB/QR Pay qua VNPAY-QR</label>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="main-group">
                                    <h2 class="heading-main-cart">
                                        <span>Giỏ hàng</span>
                                        <span>(<?= $_SESSION['products-cart'] ?> sản phẩm)</span>
                                    </h2>
                                    <div class="table-products">
                                        <table>
                                            <thead>
                                                <th>Ảnh</th>
                                                <th>Tên sản phẩm</th>
                                                <th>Giá</th>
                                                <th>Số lượng</th>
                                                <th>Tổng tiền</th>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $tongGioHang = 0;
                                                ?>
                                                <?php foreach ($chiTietGioHang as $itemGioHang) : ?>
                                                    <tr class="item-product-cart">
                                                        <td class="img">
                                                            <img src="<?= $itemGioHang['hinh_anh'] ?>" alt="">
                                                        </td>
                                                        <td class="name">
                                                            <p> <?= $itemGioHang['ten_san_pham'] ?></p>
                                                            <p><?= $itemGioHang['ten_danh_muc'] ?></p>
                                                        </td>
                                                        <td class="price">
                                                            <?php if ($itemGioHang['gia_khuyen_mai'] > 0) : ?>
                                                                <?= formatPrice($itemGioHang['gia_khuyen_mai']) ?>
                                                            <?php else: ?>
                                                                <?= formatPrice($itemGioHang['gia_san_pham']) ?>
                                                            <?php endif ?></td>
                                                        <td class="quantity">
                                                            <div class="quantity-control">
                                                                <input type="number" value="<?= $itemGioHang['so_luong'] ?>" class="quantity-input" readonly>
                                                            </div>
                                                        </td>
                                                        <td class="total-wrap">
                                                            <div class="content">
                                                                <span>
                                                                    <?php
                                                                    $tongTien = 0;
                                                                    if ($itemGioHang['gia_khuyen_mai'] > 0) {
                                                                        $tongTien =  $itemGioHang['gia_khuyen_mai'] * $itemGioHang['so_luong'];
                                                                    } else {
                                                                        $tongTien = $itemGioHang['gia_san_pham'] * $itemGioHang['so_luong'];
                                                                    }
                                                                    $tongGioHang += $tongTien;
                                                                    echo formatPrice($tongTien);
                                                                    ?>
                                                                </span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="content-right-cart">
                                <div class="checkout-box">
                                    <h3>ĐƠN HÀNG</h3>
                                    <label for="coupon">MÃ PHIẾU GIẢM GIÁ</label>
                                    <div class="input-group">
                                        <input type="text" id="coupon" placeholder="Mã phiếu giảm giá">
                                        <button class="apply-btn">ÁP DỤNG</button>
                                    </div>
                                    <div class="price-detail">
                                        <span>Tạm tính</span>
                                        <span><?= formatPrice($tongGioHang) ?></span>
                                    </div>
                                    <div class="price-detail">
                                        <span>Phí vận chuyển</span>
                                        <span><?= formatPrice(30000) ?></span>
                                    </div>
                                    <div class="price-detail">
                                        <span>Mã giảm giá</span>
                                        <span>-0đ</span>
                                    </div>
                                    <hr>
                                    <div class="price-detail">
                                        <span>Tổng thanh toán</span>
                                        <input type="hidden" name="tong_tien" value="<?= $tongGioHang + 30000 ?>">
                                        <span><strong><?= formatPrice($tongGioHang + 30000) ?></strong></span>
                                    </div>
                                    <hr>
                                    <div class="invoice-option">
                                        <input type="checkbox" id="invoice">
                                        <label for="invoice">Yêu cầu hoá đơn</label>
                                    </div>
                                    <button type="submit" class="btn-action-cart">
                                        <span>Tiếp tục thanh toán</span>
                                        <span><ion-icon name="arrow-forward-outline"></ion-icon></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </section>
        </main>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>