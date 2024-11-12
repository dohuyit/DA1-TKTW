<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="Common/assets/css/reset.css" />
    <link rel="stylesheet" href="Common/assets/css/detail.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>BEKAT - NHÓM 3</title>
</head>

<body>
    <div class="wrapper">
        <?php require_once "layout/header.php" ?>
        <main>
            <section id="title-main">
                <div class="container">
                    <h1>
                        <span>Trang Chủ</span> <span>/</span><strong><?= $sanPham['ten_san_pham'] ?></strong>
                    </h1>
                </div>
            </section>
            <section id="product-main">
                <div class="container">
                    <form action="<?= BASE_URL . '?act=them-gio-hang' ?>" class="body" method="post">
                        <div class="box-img-product">
                            <div class="thumbnail-container">
                                <?php foreach ($listAnhSanPham as $key => $anhSanPham) : ?>
                                    <img src="<?= BASE_URL . $anhSanPham['link_hinh_anh'] ?>" alt="Thumbnail 1" class="item-thumbnail active" />
                                <?php endforeach; ?>

                            </div>
                            <div class="main-image">

                                <img id="displayed-image" src="<?= $sanPham['hinh_anh'] ?>" alt="Main Image" />
                            </div>
                        </div>
                        <div class="box-infor-product">
                            <div class="product-header">
                                <div class="logo">
                                    <img src="Common/assets/image/logo-head.png" alt="Logo PNJ" />
                                    <h1><?= $sanPham['ten_san_pham'] ?></h1>
                                </div>
                                <div class="title-subtle">
                                    <p class="product-code">Mã: <?= $sanPham['ten_danh_muc'] . rand(1000, 9000) ?></p>
                                    <p class="rating">
                                        <span><ion-icon name="eye-outline"></ion-icon></span>
                                        <span><?= $sanPham['luot_xem'] ?></span>
                                    </p>
                                </div>
                            </div>

                            <div class="price-section">
                                <div class="main-price">
                                    <span class="price"><?= formatPrice($sanPham['gia_san_pham']) ?></span>
                                    <p class="note">
                                        (Giá sản phẩm thay đổi tùy size giày và màu sắc)
                                    </p>
                                </div>
                                <span class="installment">Chỉ cần trả 10%/tháng giá trị đơn hàng</span>
                            </div>

                            <div class="size-selection">
                                <label>Chọn kích cỡ</label>
                                <div class="size-options">
                                    <button>42</button>
                                    <button>45</button>
                                    <button>48</button>
                                </div>
                            </div>

                            <div class="consult">
                                <p>
                                    <?= $sanPham['trang_thai'] == 1 ? "Còn hàng" : "Sale" ?> -
                                    <a href="#">Nhấn để được tư vấn và nhận ưu đãi</a>
                                </p>
                            </div>

                            <div class="offers">
                                <h3>Ưu đãi:</h3>
                                <ul>
                                    <li>
                                        ✔ Giảm đến 300K khi thanh toán bằng
                                        <a href="#">VNPAY-QR</a>
                                    </li>
                                    <li>
                                        ✔ Giảm 800.000VNĐ cho đơn hàng từ 20.000.000 khi thanh
                                        toán qua PAYOO. <a href="#">Xem chi tiết</a>
                                    </li>
                                    <li>
                                        ✔ Ưu đãi thêm lên đến 1.5tr khi thanh toán bằng thẻ
                                        TECHCOMBANK. <a href="#">Xem chi tiết</a>
                                    </li>
                                    <li>
                                        ✔ Giảm 200.000đ cho hóa đơn mua hàng từ 2.500.000đ qua
                                        HDBANK. <a href="#">Xem chi tiết</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="quantity">
                                <label for="">Số Lượng</label>
                                <div class="btn-quantity">
                                    <input type="hidden" name="san_pham_id" value="<?= $sanPham['id'] ?>">
                                    <input type="number" id="product-quantity" value="1" min="1" name="so_luong" />
                                    <div class="control">
                                        <button class="btn-increase">
                                            <ion-icon name="caret-up-outline"></ion-icon>
                                        </button>
                                        <button class="btn-decrease">
                                            <ion-icon name="caret-down-outline"></ion-icon>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="btn-action">
                                <a href="#" class="buy-now">
                                    <span>Mua Ngay</span>
                                    <span><ion-icon name="arrow-forward-circle-outline"></ion-icon></span>
                                </a>
                                <button type="submit" class="add-to-cart">
                                    <span>Thêm vào giỏ hàng</span>
                                    <span><ion-icon name="cart-outline"></ion-icon></span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
            <section id="feature-icon">
                <div class="container">
                    <div class="body">
                        <div class="item-icon">
                            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 512 512"
                                style="enable-background: new 0 0 512 512" xmlns:xlink="http://www.w3.org/1999/xlink"
                                xml:space="preserve">
                                <g>
                                    <g>
                                        <path fill="rgb(201, 33, 39)"
                                            d="M501.905,10.593C489.743-1.57,468.721-2.766,441.099,7.133c-18.995,6.81-38.919,18.222-48.451,27.754l-76.55,76.55
                L64.116,71.859L0,135.975l209.501,82.059l-67.266,67.266l-95.472,5.591L0.984,336.67l103.609,49.994L75.567,415.69l21.24,21.24
                l28.987-28.987l50.043,103.56l45.768-45.769l5.592-95.472l68.395-68.395l82.043,209.459l64.115-64.116l-39.57-251.933
                l75.43-75.431c9.532-9.531,20.945-29.455,27.755-48.451C515.264,43.781,514.068,22.754,501.905,10.593z M53.706,124.751
                l20.846-20.846l215.268,33.811l-57.136,57.136L53.706,124.751z M409.705,436.776l-20.845,20.846l-70.087-178.935l57.128-57.128
                L409.705,436.776z M477.088,61.262c-5.739,16.012-15.224,31.853-20.718,37.347L197.88,357.101l-5.592,95.472l-7.797,7.797
                l-36.202-74.918l26.113-26.113l-21.24-21.24l-26.07,26.068L52.137,328l7.788-7.788l95.472-5.591L413.888,56.128
                c5.495-5.495,21.336-14.977,37.348-20.718c18.176-6.516,27.82-5.186,29.429-3.577C482.272,33.441,483.604,43.083,477.088,61.262z">
                                        </path>
                                    </g>
                                </g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g></g>
                            </svg>
                            <p class="desc">Vận chuyển trên toàn thế giới</p>
                        </div>
                        <div class="item-icon">
                            <svg height="512pt" viewBox="0 0 512 512" width="512pt" xmlns="http://www.w3.org/2000/svg">
                                <path fill="rgb(201, 33, 39)"
                                    d="m410 0c8.285156 0 15 6.714844 15 15v199.027344c52.363281 26.195312 87 79.976562 87 140.722656 0 86.84375-70.40625 157.25-157.25 157.25-60.746094 0-114.527344-34.636719-140.722656-87h-199.027344c-8.285156 0-15-6.714844-15-15v-395c0-8.285156 6.714844-15 15-15zm-126 30v84.0625c0 10.785156-11.507812 19.085938-22.746094 12.84375l-48.753906-24.773438-49.761719 25.289063c-9.988281 5.058594-21.710937-2.324219-21.703125-13.359375l-.035156-84.0625h-111v365h172.703125c-14.519531-54.976562 1.808594-112.394531 40.855469-151.441406s96.464844-55.375 151.441406-40.855469v-172.703125zm23 391h69.996094c15.984375 0 30.488281-6.511719 40.988281-17.015625 11.039063-11.035156 17.015625-25.332031 17.015625-41.980469 0-31.96875-26.035156-58.003906-58.003906-58.003906h-41.683594l8.804688-8.820312c13.871093-13.953126-7.339844-35.042969-21.210938-21.09375l-34.402344 34.464843c-5.824218 5.855469-5.800781 15.328125.058594 21.152344l34.46875 34.402344c13.949219 13.871093 35.042969-7.339844 21.09375-21.210938l-8.914062-8.894531h41.785156c16.242187 0 28.003906 12.984375 28.003906 28.996094 0 15.40625-12.597656 28.003906-28.003906 28.003906h-69.996094c-8.285156 0-15 6.714844-15 15s6.714844 15 15 15zm-42.230469-156.230469c-49.691406 49.695313-49.691406 130.269531 0 179.960938 49.695313 49.695312 130.269531 49.695312 179.960938 0 49.695312-49.691407 49.695312-130.265625 0-179.960938-49.691407-49.691406-130.269531-49.691406-179.960938 0zm-10.769531-234.769531h-83v59.65625l34.726562-17.648438c4.097657-2.078124 9.09375-2.246093 13.511719-.019531l34.761719 17.667969zm0 0"
                                    fill-rule="evenodd"></path>
                            </svg>
                            <p class="desc">Miễn phí đổi trả trong 60 ngày</p>
                        </div>
                        <div class="item-icon">
                            <svg id="Layer_1" enable-background="new 0 0 512 512" height="512" viewBox="0 0 512 512" width="512"
                                xmlns="http://www.w3.org/2000/svg">
                                <g>
                                    <path fill="rgb(201, 33, 39)"
                                        d="m507.606 395.512-81.129-81.138-1.671-20.564 22.359-13.626c6.324-3.854 8.889-11.746 6.039-18.582l-10.075-24.166 17.052-19.868c4.823-5.619 4.824-13.917.002-19.538l-17.055-19.875 10.076-24.167c2.85-6.835.285-14.728-6.039-18.582l-22.359-13.626 2.12-26.094c.6-7.382-4.279-14.097-11.484-15.809l-25.472-6.049-6.051-25.479c-1.711-7.207-8.44-12.082-15.808-11.485l-26.102 2.12-13.627-22.36c-3.854-6.326-11.751-8.887-18.584-6.038l-24.164 10.082-19.864-17.051c-5.619-4.823-13.92-4.823-19.539 0l-19.866 17.051-24.165-10.081c-6.837-2.851-14.729-.287-18.584 6.038l-13.627 22.36-26.102-2.12c-7.382-.591-14.096 4.278-15.808 11.485l-6.051 25.479-25.472 6.049c-7.205 1.712-12.084 8.427-11.484 15.809l2.12 26.094-22.359 13.626c-6.324 3.854-8.889 11.746-6.039 18.582l10.076 24.167-17.055 19.875c-4.822 5.62-4.821 13.918.002 19.538l17.052 19.868-10.075 24.166c-2.85 6.835-.285 14.728 6.039 18.582l22.359 13.626-1.671 20.564-81.127 81.137c-3.676 3.676-5.187 8.993-3.992 14.053 1.194 5.06 4.924 9.14 9.855 10.784l61.048 20.347 20.347 61.048c1.644 4.932 5.724 8.661 10.784 9.855s10.377-.316 14.053-3.992l111.391-111.382 18.349 15.755c5.592 4.801 13.893 4.851 19.543 0l18.349-15.755 111.391 111.381c3.676 3.676 8.993 5.187 14.053 3.992 5.06-1.194 9.14-4.924 10.784-9.855l20.347-61.048 61.048-20.347c4.932-1.644 8.661-5.724 9.855-10.784 1.194-5.059-.317-10.377-3.993-14.052zm-395.163 73.72-15.05-45.146c-1.493-4.479-5.009-7.994-9.487-9.487l-45.136-15.044 61.912-61.913 17.347 4.121 6.052 25.479c1.712 7.207 8.447 12.082 15.808 11.485l26.102-2.12 13.283 21.797zm208.76-116.13-11.736 19.258-20.812-8.683c-5.229-2.182-11.245-1.23-15.547 2.463l-17.108 14.689-17.108-14.689c-6.015-5.165-12.781-3.617-15.547-2.463l-20.812 8.683-11.736-19.258c-2.948-4.838-8.362-7.601-14.022-7.145l-22.481 1.826-5.212-21.944c-1.309-5.514-5.614-9.818-11.127-11.128l-21.937-5.211 1.826-22.474c.459-5.649-2.306-11.074-7.146-14.023l-19.26-11.737 8.678-20.813c2.181-5.23 1.229-11.242-2.463-15.542l-14.687-17.112 14.688-17.118c3.689-4.3 4.642-10.311 2.461-15.541l-8.678-20.813 19.26-11.737c4.84-2.95 7.604-8.375 7.146-14.023l-1.826-22.474 21.937-5.21c5.513-1.309 9.818-5.614 11.127-11.128l5.212-21.944 22.481 1.825c5.649.463 11.073-2.305 14.022-7.145l11.736-19.258 20.812 8.683c5.228 2.181 11.244 1.23 15.545-2.461l17.111-14.687 17.11 14.687c4.302 3.692 10.315 4.642 15.545 2.461l20.812-8.683 11.736 19.258c2.949 4.839 8.366 7.61 14.022 7.145l22.481-1.825 5.212 21.944c1.309 5.514 5.614 9.819 11.127 11.128l21.937 5.21-1.826 22.474c-.459 5.649 2.306 11.074 7.146 14.023l19.26 11.737-8.678 20.813c-2.181 5.229-1.229 11.241 2.461 15.541l14.688 17.118-14.687 17.112c-3.691 4.3-4.644 10.312-2.463 15.542l8.678 20.813-19.26 11.737c-4.84 2.95-7.604 8.375-7.146 14.023l1.826 22.474-21.937 5.211c-5.513 1.31-9.818 5.614-11.127 11.128l-5.212 21.944-22.481-1.826c-5.648-.459-11.072 2.305-14.021 7.145zm102.891 61.497c-4.479 1.493-7.994 5.008-9.487 9.487l-15.05 45.146-70.829-70.829 13.283-21.797 26.102 2.12c7.36.597 14.096-4.278 15.808-11.485l6.052-25.479 17.347-4.121 61.912 61.913z">
                                    </path>
                                    <path fill="rgb(201, 33, 39)"
                                        d="m379.073 165.06-45.444-45.444c-5.857-5.858-15.355-5.858-21.213 0l-72.482 72.482-32.316-32.315c-5.857-5.858-15.355-5.858-21.213 0l-45.444 45.445c-5.858 5.858-5.858 15.355 0 21.213l88.367 88.367c5.858 5.859 15.357 5.857 21.213 0l128.533-128.534c5.858-5.859 5.858-15.356-.001-21.214zm-139.139 117.927-67.154-67.153 24.231-24.231 32.316 32.315c5.857 5.858 15.355 5.858 21.213 0l72.482-72.482 24.231 24.231z">
                                    </path>
                                </g>
                            </svg>
                            <p class="desc">Bảo hành 24 tháng</p>
                        </div>
                        <div class="item-icon">
                            <svg id="Capa_1" enable-background="new 0 0 512 512" height="512" viewBox="0 0 512 512" width="512"
                                xmlns="http://www.w3.org/2000/svg">
                                <g>
                                    <path fill="rgb(201, 33, 39)"
                                        d="m459.669 82.906-196-81.377c-4.91-2.038-10.429-2.039-15.338 0l-196 81.377c-7.465 3.1-12.331 10.388-12.331 18.471v98.925c0 136.213 82.329 258.74 208.442 310.215 4.844 1.977 10.271 1.977 15.116 0 126.111-51.474 208.442-174.001 208.442-310.215v-98.925c0-8.083-4.865-15.371-12.331-18.471zm-27.669 117.396c0 115.795-68 222.392-176 269.974-105.114-46.311-176-151.041-176-269.974v-85.573l176-73.074 176 73.074zm-198.106 67.414 85.964-85.963c7.81-7.81 20.473-7.811 28.284 0s7.81 20.474-.001 28.284l-100.105 100.105c-7.812 7.812-20.475 7.809-28.284 0l-55.894-55.894c-7.811-7.811-7.811-20.474 0-28.284s20.474-7.811 28.284 0z">
                                    </path>
                                </g>
                            </svg>
                            <p class="desc">Thanh toán an toàn 100%</p>
                        </div>
                    </div>
                </div>
            </section>
            <section id="product-details-section">
                <div class="header-tab">
                    <div class="container">
                        <ul class="list-tab">
                            <li class="active" data-content="description">Mô tả sản phẩm</li>
                            <li data-content="care-instructions">Hướng dẫn bảo quản</li>
                            <li data-content="comments">Bình luận sản phẩm</li>
                        </ul>
                    </div>
                </div>
                <div class="main-tab">
                    <div class="container">
                        <div id="content-display" class="tab-content">
                            <div id="description" class="section-content">
                                <div class="box-img">
                                    <img src="Common/assets/image/table-size.jpeg" alt="" />
                                </div>
                                <div class="box-desc">
                                    <h3><?= $sanPham['ten_san_pham'] ?></h3>
                                    <p>
                                        <?= $sanPham['mo_ta'] ?>
                                    </p>
                                    <h3>Thông số</h3>
                                    <ul>
                                        <li>
                                            Thiết kế Upper bằng nylon nhẹ nhàng và thoáng khí kết
                                            hợp lớp phủ da lộn bền bỉ
                                        </li>
                                        <li>
                                            Lót giày bằng bọt cao cấp mang lại sự thoải mái vượt
                                            trội
                                        </li>
                                        <li>Đế giữa EVA nhẹ nhàng và thoải mái</li>
                                        <li>
                                            Đế ngoài hoàn toàn bằng cao su cho độ bám linh hoạt và
                                            độ bền bỉ
                                        </li>
                                        <li>Kích cỡ thông thường</li>
                                        <li>Loại dây cột tiêu chuẩn</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="inner-overlay-comment" id="innerOverlayComment">
                        <form action="" method="POST" class="container-comment">
                            <!-- <input
                          type="hidden"
                          name="id"
                          value="<?= $productById['id'] ?>"
                        /> -->
                            <h3>Viết bình luận</h3>
                            <div class="icon">
                                <ion-icon name="star"></ion-icon>
                                <ion-icon name="star"></ion-icon>
                                <ion-icon name="star"></ion-icon>
                                <ion-icon name="star"></ion-icon>
                                <ion-icon name="star"></ion-icon>
                            </div>
                            <div class="box-comment">
                                <textarea name="content_comments" id="comment" cols="30" rows="10"
                                    placeholder="Viết bình luận của bạn"></textarea>
                            </div>
                            <button type="submit">Gửi bình luận</button>
                        </form>
                    </div>
                    <div class="footer-tab">
                        <span><i class="fa-brands fa-tiktok"></i></span>
                        <span><i class="fa-brands fa-facebook"></i></span>
                        <span><i class="fa-brands fa-pinterest"></i></span>
                    </div>
            </section>
            <section id="products-similar">
                <div class="container">
                    <div class="title-similar">
                        <h2>Bạn có thể thích</h2>
                    </div>
                    <div class="body-similar">
                        <div class="container-product-similar">
                            <div class="list-product-similar">
                                <?php foreach ($listSanPhamCungDanhMuc as $sanPham) : ?>
                                    <div class="card-product">
                                        <div class="img-product">
                                            <div class="badge-product">
                                                <span>H</span>
                                                <span>O</span>
                                                <span>T</span>
                                            </div>
                                            <img src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="" />
                                        </div>
                                        <div class="content-product">
                                            <div class="top-content">
                                                <span><?= $sanPham['ten_danh_muc'] ?></span>
                                                <span>
                                                    <ion-icon name="star"></ion-icon>
                                                    <ion-icon name="star"></ion-icon>
                                                    <ion-icon name="star"></ion-icon>
                                                    <ion-icon name="star"></ion-icon>
                                                    <ion-icon name="star"></ion-icon>
                                                </span>
                                            </div>
                                            <div class="main-content">
                                                <h3 class="heading-card">
                                                    <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id'] ?>"><?= $sanPham['ten_san_pham'] ?></a>
                                                </h3>
                                                <div class="box-price">
                                                    <?php if ($sanPham['gia_khuyen_mai'] > 0) : ?>
                                                        <span class="price-old"><?= formatPrice($sanPham['gia_san_pham']) ?></span>
                                                        <span class="price-sale"><?= formatPrice($sanPham['gia_khuyen_mai']) ?></span>

                                                    <?php else : ?>
                                                        <span class="price-old"><?= formatPrice($sanPham['gia_san_pham']) ?></span>
                                                    <?php endif ?>
                                                </div>
                                                <div class="tag-card">
                                                    <img src="./image/sale-online 1.svg" alt="" />
                                                    <p>Giá độc quyền online</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="directive-control">
                            <button id="Pre-product">
                                <span>
                                    <ion-icon name="arrow-back-outline"></ion-icon>
                                </span>
                            </button>
                            <button id="Next-product">
                                <span>
                                    <ion-icon name="arrow-forward-outline"></ion-icon>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <?php require_once "layout/footer.php" ?>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script type="module" src="Common/assets/js/detail.js"></script>
    <script>
        // =============================TAB COMMENT =================//
        // Hàm hiển thị form comment
        function enableCommentForm() {
            const commentButton = document.getElementById("btn-comment");
            const innerOverlayComment = document.getElementById("innerOverlayComment");

            if (commentButton && innerOverlayComment) {
                commentButton.addEventListener("click", function() {
                    innerOverlayComment.style.display = "flex";
                    document.body.classList.add("no-scroll");
                });

                innerOverlayComment.addEventListener("click", function(event) {
                    if (event.target === innerOverlayComment) {
                        innerOverlayComment.style.display = "none";
                        document.body.classList.remove("no-scroll");
                    }
                });
            }
        }
        //========================================================//
        // Dữ liệu nội dung cho mỗi tab
        const tabContents = {
            description: `
      <div id="description" class="section-content">
                  <div class="box-img">
                    <img src="Common/assets/image/table-size.jpeg" alt="" />
                  </div>
                  <div class="box-desc">
                    <h3>
                    <?= $sanPham['ten_san_pham'] ?>
                    </h3>
                    <p>
                    <?= $sanPham['mo_ta'] ?>
                    </p>
                    <h3>Thông số</h3>
                    <ul>
                      <li>
                        Thiết kế Upper bằng nylon nhẹ nhàng và thoáng khí kết
                        hợp lớp phủ da lộn bền bỉ
                      </li>
                      <li>
                        Lót giày bằng bọt cao cấp mang lại sự thoải mái vượt
                        trội
                      </li>
                      <li>Đế giữa EVA nhẹ nhàng và thoải mái</li>
                      <li>
                        Đế ngoài hoàn toàn bằng cao su cho độ bám linh hoạt và
                        độ bền bỉ
                      </li>
                      <li>Kích cỡ thông thường</li>
                      <li>Loại dây cột tiêu chuẩn</li>
                    </ul>
                  </div>
                </div>
  `,
            "care-instructions": `
      <div id="care-instructions" class="section-content">
                  <ul>
                    <li>Bảo quản giày ở nơi thoáng mát và khô ráo</li>
                    <li>
                      Tránh ánh nắng trực tiếp để ngăn mất màu và biến dạng
                    </li>
                    <li>Sử dụng túi giày để tránh bụi và giữ giày luôn mới</li>
                    <li>
                      Tránh nước và độ ẩm cao, (đặc biệt là đối với chất liệu
                      da/ da lộn) để hạn chế tình trạng phai màu và bong tróc.
                    </li>
                    <li>
                      Sử dụng các sản phẩm chăm sóc giày chuyên dụng để vệ sinh
                      giày
                    </li>
                    <li>
                      Sử dụng bình xịt chống thấm nước để bảo vệ đôi giày của
                      bạn khỏi nước mưa, bùn đất hoặc những vết bẩn khác
                    </li>
                    <li>
                      Sử dụng bóng khử mùi hoặc xịt khử mùi để ngăn ngừa vi
                      khuẩn gây mùi
                    </li>
                  </ul>
                </div>
  `,
            comments: `
      <div id="comments" class="section-content">
                  <div class="wrapper-comment">
                    <div class="list-comment">
                      <div class="item-comment">
                        <!-- <p class="text-empty">Chưa có bình luận</p> -->
                        <div class="title-comment">
                          <span>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                          </span>
                          <p>2025-11-3</p>
                        </div>
                        <p class="text-comments">
                          Lorem ipsum dolor, sit amet consectetur adipisicing
                          elit. In minima deleniti, ipsum, nihil debitis nulla
                          ipsa amet animi quisquam accusantium nobis labore
                          quidem praesentium cum ab perspiciatis. Et, dolores.
                          Quibusdam?
                        </p>
                        <div class="footer-comment">
                          <img src="./image/auth.png" alt="" />
                          <div class="content">
                            <p>
                              <span>Đỗ Huy</span>
                              <span
                                ><ion-icon name="shield-checkmark"></ion-icon
                              ></span>
                            </p>
                            <p>huy@gmail.com</p>
                          </div>
                        </div>
                      </div>
                      <button id="btn-comment">
                        <span>Viết bình luận</span>
                        <span><i class="fa-solid fa-pen-to-square"></i></span>
                      </button>
                      <!-- <p class="text-login-form-comment">
                        Vui lòng <a href="index.php?action=login">đăng nhập</a> để
                        viết bình luận!!!
                      </p> -->
                    </div>
                    
                  </div>
                </div>
  `,
        };

        // Lấy các tab và nội dung hiển thị
        const tabs = document.querySelectorAll(".header-tab .list-tab li");
        const contentDisplay = document.getElementById("content-display");

        // Thêm sự kiện click cho từng tab
        tabs.forEach((tab) => {
            tab.addEventListener("click", () => {
                // Loại bỏ class active từ tất cả các tab
                tabs.forEach((t) => t.classList.remove("active"));

                // Thêm class active cho tab được chọn
                tab.classList.add("active");

                // Lấy dữ liệu nội dung dựa trên data-content của tab
                const contentKey = tab.getAttribute("data-content");
                contentDisplay.innerHTML = tabContents[contentKey];

                // Kích hoạt lại sự kiện cho nút comment khi nội dung tab thay đổi
                enableCommentForm();
            });
        });

        // Kích hoạt sự kiện comment form lần đầu
        enableCommentForm();
    </script>
</body>

</html>