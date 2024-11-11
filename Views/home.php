<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="Common/assets/css/reset.css" />
    <link rel="stylesheet" href="Common/assets/css/client.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>BEKAT - NHÓM 3</title>
</head>

<body>
    <?php if (isset($_SESSION['thongBao'])): ?>
        <script>
            alert('<?= $_SESSION['thongBao']; ?>');
        </script>
        <?php unset($_SESSION['thongBao']); ?>
    <?php endif; ?>
    <div class="wrapper">
        <?php require_once "layout/header.php" ?>
        <main>
            <section id="banner">
                <div class="slider-main">
                    <div class="slider-wrapper">
                        <div class="slide-container">
                            <img src="Common/assets/image/banner2.jpg" alt="" class="img-item" />
                            <img src="Common/assets/image/banner3.jpg" alt="" class="img-item" />
                            <img src="Common/assets/image/banner4.jpg" alt="" class="img-item" />
                            <img src="Common/assets/image/banner5.jpg" alt="" class="img-item" />
                        </div>
                        <div class="slide-controls">
                            <button type="button" id="pre">
                                <i class="fa-solid fa-angle-left"></i>
                            </button>
                            <button type="button" id="next">
                                <i class="fa-solid fa-angle-right"></i>
                            </button>
                        </div>
                        <ul class="dots-slide">
                            <li class="active"></li>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>
                    </div>
                </div>
            </section>
            <section id="brand-wrap">
                <div class="container">
                    <div class="body-brand">
                        <div class="item-brand-img">
                            <img src="Common/assets/image/Best_price_update_581_574_VI.jpg" alt="" />
                        </div>
                        <div class="item-brand-content">
                            <div class="br-content-title">
                                <h2>Thương Hiệu Nổi Tiếng</h2>
                            </div>
                            <div class="br-content">
                                <!-- Tạo slider -->
                                <div class="carousel-container">
                                    <div class="carousel-list">
                                        <div class="carousel-item">
                                            <img src="Common/assets/image/adidas-chinh-hang-tai-Sneaker-Daily.jpg.webp" alt="" />
                                        </div>
                                        <div class="carousel-item">
                                            <img src="Common/assets/image/Nike-chinh-hang-tai-Sneaker-Daily.jpg" alt="" />
                                        </div>
                                        <div class="carousel-item">
                                            <img src="Common/assets/image/Jordan-chinh-hang-tai-Sneaker-Daily.jpg.webp" alt="" />
                                        </div>
                                        <div class="carousel-item">
                                            <img src="Common/assets/image/mlb-chinh-hang-tai-Sneaker-Daily.jpg.webp" alt="" />
                                        </div>
                                        <div class="carousel-item">
                                            <img src="Common/assets/image/puma.jpg" alt="" />
                                        </div>
                                        <div class="carousel-item">
                                            <img src="Common/assets/image/mcqueen.jpg" alt="" />
                                        </div>
                                        <div class="carousel-item">
                                            <img src="Common/assets/image/converse.jpg" alt="" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Products-sale -->
            <section id="sale-wrap">
                <div class="container">
                    <div class="title-sale">
                        <h2>Sản phẩm <strong>khuyến mãi</strong></h2>
                        <div class="title-time-sale">
                            <span id="hours">00</span> Giờ :
                            <span id="minutes">00</span> Phút :
                            <span id="seconds">00</span> Giây
                        </div>
                    </div>
                    <div class="content-sale">
                        <div class="container-sale">
                            <div class="list-products-sale">
                                <?php foreach ($listProductsSale as $sale) : ?>
                                    <div class="cart-sale">
                                        <div class="main-cart">
                                            <div class="img-group">
                                                <span class="sale-tag">Sale</span>
                                                <img src="<?= $sale["hinh_anh"] ?>" alt="" />
                                            </div>
                                            <div class="content-group">
                                                <h3><a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sale['id'] ?>"><?= $sale["ten_san_pham"] ?></a></h3>
                                                <p class="price">
                                                    <?php if ($sale["gia_khuyen_mai"] > 0): ?>
                                                        <span class="sale-price"><?= formatPrice($sale["gia_khuyen_mai"]) ?></span>
                                                        <span class="original-price"><?= formatPrice($sale["gia_san_pham"]) ?></span>
                                                    <?php else: ?>
                                                        <span class="sale-price"><?= formatPrice($sale["gia_san_pham"]) ?></span>
                                                    <?php endif; ?>
                                                </p>

                                                <p class="desc">
                                                    <?= $sale["mo_ta"] ?>
                                                </p>
                                                <div class="btn-sale">
                                                    <a href="#">
                                                        <ion-icon name="checkmark-circle-outline"></ion-icon>
                                                        <span>Add to cart</span>
                                                    </a>
                                                    <a href="#"><ion-icon name="heart-outline"></ion-icon></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="footer-cart">
                                            <div class="content-countdown">
                                                <ion-icon name="time-outline"></ion-icon>
                                                <span>Mua Ngay!</span>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach ?>
                            </div>
                        </div>
                        <div class="directive">
                            <button id="btn-pre">
                                <ion-icon name="chevron-back-outline"></ion-icon>
                            </button>
                            <button id="btn-next">
                                <ion-icon name="chevron-forward-outline"></ion-icon>
                            </button>
                        </div>
                    </div>
                </div>
            </section>
            <section id="banner-child">
                <div class="body">
                    <div class="item-banner-child">
                        <div class="img-banner"><img src="Common/assets/image/ba2.jpg" alt="" /></div>
                        <div class="content-banner">
                            <h3>Giày Nữ Cao Cấp</h3>
                            <a href="#">Shop now</a>
                        </div>
                    </div>
                    <div class="item-banner-child">
                        <div class="img-banner"><img src="Common/assets/image/ba1.jpg" alt="" /></div>
                        <div class="content-banner">
                            <h3>Giày Nam Cao Cấp</h3>
                            <a href="#">Shop now</a>
                        </div>
                    </div>
                </div>
            </section>
            <section id="bestSellers-wrap">
                <div class="container">
                    <div class="bestSellers-title">
                        <h2>Sản phẩm <strong>Bán Chạy</strong></h2>
                    </div>
                    <div class="bestSellers-content">
                        <div class="group-content">
                            <div class="container-product-bsl">
                                <div class="list-product-bsl">
                                    <?php foreach ($listSanPhamByView as $bestSeller) : ?>
                                        <div class="item-bsl">
                                            <div class="desc-item">
                                                <h3><?= $bestSeller['ten_san_pham'] ?></h3>
                                                <div class="box-watch">
                                                    <span>Lượt xem</span>
                                                    <span><?= $bestSeller['luot_xem'] ?></span>
                                                </div>
                                                <div class="box-price">
                                                    <?php if ($bestSeller['gia_khuyen_mai'] > 0) : ?>
                                                        <span class="price-sale"><?= formatPrice($bestSeller['gia_khuyen_mai']) ?></span>
                                                        <span class="price-old"><?= formatPrice($bestSeller['gia_san_pham']) ?></span>
                                                    <?php else : ?>
                                                        <span class="price-old"><?= formatPrice($bestSeller['gia_san_pham']) ?></span>
                                                    <?php endif ?>
                                                </div>
                                                <div class="box-controls">
                                                    <span><ion-icon name="heart-outline"></ion-icon></span>
                                                    <span><ion-icon name="repeat-outline"></ion-icon></span>
                                                    <span><ion-icon name="eye-outline"></ion-icon></span>
                                                </div>
                                                <div class="box-action">
                                                    <a href="#" class="btn-add-cart">
                                                        <span>add to cart</span>
                                                        <span><ion-icon name="cart-outline"></ion-icon></span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="img-item">
                                                <div class="img-top">
                                                    <ion-icon name="star-outline"></ion-icon>
                                                    <ion-icon name="star-outline"></ion-icon>
                                                    <ion-icon name="star-outline"></ion-icon>
                                                    <ion-icon name="star-outline"></ion-icon>
                                                    <ion-icon name="star-outline"></ion-icon>
                                                </div>
                                                <div class="img-main">
                                                    <img src="<?= $bestSeller['hinh_anh'] ?>" alt="" />
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach ?>

                                </div>
                                <div class="footer-products-bsl">
                                    <a href="" class="btn-view-all">
                                        <span>Xem thêm</span>
                                        <span><ion-icon name="arrow-forward-outline"></ion-icon></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="group-img">
                            <img src="Common/assets/image/bn-2-10_630x.png" alt="" />
                        </div>
                    </div>
                </div>
            </section>
            <section id="banner-child-second">
                <img src="Common/assets/image/banner-child5.jpg" alt="" />
                <div class="content-banner">
                    <div class="badge-banner">Tính Năng</div>
                    <h2>Top Yêu Thích Từ NGười Mua</h2>
                    <p class="desc-first">Phần Thưởng Của Sự Hiện Đại!</p>
                    <p class="desc-second">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi
                        incidunt non impedit, mollitia porro placeat fugiat sint nisi
                        rerum neque. incidunt non impedit, mollitia porro placeat fugiat
                        sint nisi rerum neque.
                    </p>
                    <a href="#" class="btn-banner">
                        <span>Xem Thêm</span>
                        <span><ion-icon name="arrow-forward-outline"></ion-icon></span>
                    </a>
                </div>
            </section>
            <section id="all-products">
                <div class="container">
                    <div class="products-header">
                        <h2>Tất cả <strong>sản phẩm</strong></h2>
                        <div class="filter-category">
                            <!-- Link "Tất cả" -->
                            <a href="<?= BASE_URL . '?act=productCate' ?>" class="filter-link <?= !isset($danh_muc_id) ? 'active' : '' ?>">Tất cả</a>
                            <span>/</span>

                            <!-- Danh sách các danh mục -->
                            <?php foreach ($listDanhMuc as $index => $danhMuc): ?>
                                <a href="<?= BASE_URL . '?act=productCate&id_danh_muc=' . $danhMuc['id'] ?>#all-products" class="filter-link <?= (isset($danh_muc_id) && $danh_muc_id == $danhMuc['id']) ? 'active' : '' ?>">
                                    <?= $danhMuc['ten_danh_muc'] ?>
                                </a>
                                <?php if ($index < count($listDanhMuc) - 1): ?>
                                    <span>/</span>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php if (!empty($productByCate)) : ?>
                        <div class="products-body">
                            <?php foreach ($productByCate as $products) : ?>
                                <div class="card-product">
                                    <div class="img-product">
                                        <div class="badge-product">
                                            <span>H</span><span>O</span><span>T</span>
                                        </div>
                                        <img src="<?= $products['hinh_anh'] ?>" alt="" />
                                    </div>
                                    <div class="content-product">
                                        <div class="top-content">
                                            <span><?= $products['ten_danh_muc'] ?></span>
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
                                                <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $products['id'] ?>"><?= $products['ten_san_pham'] ?></a>
                                            </h3>
                                            <div class="box-price">
                                                <span><?= formatPrice($products['gia_khuyen_mai']) ?></span>
                                                <span><?= formatPrice($products['gia_san_pham']) ?></span>
                                            </div>
                                            <div class="tag-card">
                                                <img src="Common/assets/image/sale-online 1.svg" alt="" />
                                                <p>Giá độc quyền online</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php else: ?>
                        <div class="products-body error">
                            <div class="no-products">
                                <ion-icon name="alert-circle-outline"></ion-icon>
                                <p>Rất tiếc, hiện không có sản phẩm nào phù hợp!</p>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </section>

            <section id="comment">
                <img src="Common/assets/image/sub-right.png" alt="" class="sub-right" />
                <img src="Common/assets/image/sub-left.png" alt="" class="sub-left" />
                <div class="container">
                    <div class="title-box-comment">
                        <h2><strong>Bình luận</strong> sản phẩm</h2>
                    </div>
                    <div class="content-box-comment">
                        <div class="container-comment">
                            <div class="list-comment">
                                <div class="card-comment">
                                    <div class="infor-desc">
                                        <div class="top">
                                            <img src="./image/JORDAN+SPIZIKE+LOW+_GS_-removebg-preview.png" alt="" />
                                            <h3>NIKE</h3>
                                        </div>
                                        <div class="infor-main">
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing
                                                elit. Aliquam, eius. Lorem ipsum dolor sit amet,
                                                consectetur adipisicing elit. Aliquam, eius.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="infor-user">
                                        <div class="left">
                                            <div class="content">
                                                <img src="./image/auth.png" alt="" />
                                                <div class="desc-second">
                                                    <h4>Đỗ Huy</h4>
                                                    <p>huy2005@gmail.com</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="right">
                                            <ion-icon name="star"></ion-icon>
                                            <ion-icon name="star"></ion-icon>
                                            <ion-icon name="star"></ion-icon>
                                            <ion-icon name="star"></ion-icon>
                                            <ion-icon name="star"></ion-icon>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-comment">
                                    <div class="infor-desc">
                                        <div class="top">
                                            <img src="./image/JORDAN+SPIZIKE+LOW+_GS_-removebg-preview.png" alt="" />
                                            <h3>NIKE</h3>
                                        </div>
                                        <div class="infor-main">
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing
                                                elit. Aliquam, eius. Lorem ipsum dolor sit amet,
                                                consectetur adipisicing elit. Aliquam, eius.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="infor-user">
                                        <div class="left">
                                            <div class="content">
                                                <img src="./image/auth.png" alt="" />
                                                <div class="desc-second">
                                                    <h4>Đỗ Huy</h4>
                                                    <p>huy2005@gmail.com</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="right">
                                            <ion-icon name="star"></ion-icon>
                                            <ion-icon name="star"></ion-icon>
                                            <ion-icon name="star"></ion-icon>
                                            <ion-icon name="star"></ion-icon>
                                            <ion-icon name="star"></ion-icon>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-comment">
                                    <div class="infor-desc">
                                        <div class="top">
                                            <img src="./image/JORDAN+SPIZIKE+LOW+_GS_-removebg-preview.png" alt="" />
                                            <h3>NIKE</h3>
                                        </div>
                                        <div class="infor-main">
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing
                                                elit. Aliquam, eius. Lorem ipsum dolor sit amet,
                                                consectetur adipisicing elit. Aliquam, eius.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="infor-user">
                                        <div class="left">
                                            <div class="content">
                                                <img src="./image/auth.png" alt="" />
                                                <div class="desc-second">
                                                    <h4>Đỗ Huy</h4>
                                                    <p>huy2005@gmail.com</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="right">
                                            <ion-icon name="star"></ion-icon>
                                            <ion-icon name="star"></ion-icon>
                                            <ion-icon name="star"></ion-icon>
                                            <ion-icon name="star"></ion-icon>
                                            <ion-icon name="star"></ion-icon>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-comment">
                                    <div class="infor-desc">
                                        <div class="top">
                                            <img src="./image/JORDAN+SPIZIKE+LOW+_GS_-removebg-preview.png" alt="" />
                                            <h3>NIKE</h3>
                                        </div>
                                        <div class="infor-main">
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing
                                                elit. Aliquam, eius. Lorem ipsum dolor sit amet,
                                                consectetur adipisicing elit. Aliquam, eius.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="infor-user">
                                        <div class="left">
                                            <div class="content">
                                                <img src="./image/auth.png" alt="" />
                                                <div class="desc-second">
                                                    <h4>Đỗ Huy</h4>
                                                    <p>huy2005@gmail.com</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="right">
                                            <ion-icon name="star"></ion-icon>
                                            <ion-icon name="star"></ion-icon>
                                            <ion-icon name="star"></ion-icon>
                                            <ion-icon name="star"></ion-icon>
                                            <ion-icon name="star"></ion-icon>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-comment">
                                    <div class="infor-desc">
                                        <div class="top">
                                            <img src="./image/JORDAN+SPIZIKE+LOW+_GS_-removebg-preview.png" alt="" />
                                            <h3>NIKE</h3>
                                        </div>
                                        <div class="infor-main">
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing
                                                elit. Aliquam, eius. Lorem ipsum dolor sit amet,
                                                consectetur adipisicing elit. Aliquam, eius.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="infor-user">
                                        <div class="left">
                                            <div class="content">
                                                <img src="./image/auth.png" alt="" />
                                                <div class="desc-second">
                                                    <h4>Đỗ Huy</h4>
                                                    <p>huy2005@gmail.com</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="right">
                                            <ion-icon name="star"></ion-icon>
                                            <ion-icon name="star"></ion-icon>
                                            <ion-icon name="star"></ion-icon>
                                            <ion-icon name="star"></ion-icon>
                                            <ion-icon name="star"></ion-icon>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-comment">
                                    <div class="infor-desc">
                                        <div class="top">
                                            <img src="./image/JORDAN+SPIZIKE+LOW+_GS_-removebg-preview.png" alt="" />
                                            <h3>NIKE</h3>
                                        </div>
                                        <div class="infor-main">
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing
                                                elit. Aliquam, eius. Lorem ipsum dolor sit amet,
                                                consectetur adipisicing elit. Aliquam, eius.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="infor-user">
                                        <div class="left">
                                            <div class="content">
                                                <img src="Common/assets/image/auth.png" alt="" />
                                                <div class="desc-second">
                                                    <h4>Đỗ Huy</h4>
                                                    <p>huy2005@gmail.com</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="right">
                                            <ion-icon name="star"></ion-icon>
                                            <ion-icon name="star"></ion-icon>
                                            <ion-icon name="star"></ion-icon>
                                            <ion-icon name="star"></ion-icon>
                                            <ion-icon name="star"></ion-icon>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="directive-control">
                            <button id="Pre-comment">
                                <span>
                                    <ion-icon name="arrow-back-outline"></ion-icon>
                                </span>
                            </button>
                            <button id="Next-comment">
                                <span>
                                    <ion-icon name="arrow-forward-outline"></ion-icon>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </section>
            <section id="main-footer-benefits">
                <div class="container">
                    <div class="body-benefits">
                        <div class="benefit-card">
                            <div class="benefit-icon">
                                <svg width="62" height="61" viewBox="0 0 62 61" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect x="0.998535" y="0.832031" width="60.0027" height="60" rx="30" fill="rgb(201, 33, 39)"></rect>
                                    <path
                                        d="M47.2145 26.0904C46.3244 25.2952 45.1899 24.8545 44.0145 24.8473H36.2445V19.0358C36.2445 16.5931 35.5565 14.831 34.1965 13.7971C32.0455 12.1583 29.0805 13.0927 28.9545 13.1383C28.7751 13.1969 28.6182 13.3131 28.5066 13.47C28.395 13.627 28.3344 13.8166 28.3335 14.0116V20.514C28.3193 21.5868 28.046 22.6389 27.5383 23.574C27.0307 24.5092 26.305 25.2978 25.4275 25.8677C24.4874 26.5551 23.4528 27.0922 22.3585 27.4609L22.1445 27.5148C21.9834 27.2305 21.7532 26.9949 21.4769 26.8313C21.2006 26.6677 20.8878 26.582 20.5695 26.5825H14.8245C14.3409 26.5836 13.8774 26.7829 13.5352 27.137C13.1931 27.491 13.0001 27.971 12.9985 28.472V45.9646C12.9996 46.4659 13.1923 46.9464 13.5345 47.3009C13.8767 47.6555 14.3406 47.8551 14.8245 47.8562H20.5845C20.8517 47.8551 21.1155 47.7935 21.3573 47.6758C21.5991 47.558 21.8132 47.387 21.9845 47.1746C22.4518 47.6944 23.0169 48.1097 23.645 48.3947C24.2731 48.6798 24.9508 48.8286 25.6365 48.832H41.0045C44.3985 48.832 46.5645 46.9943 46.9485 43.7767L48.9375 30.9945C49.075 30.0928 48.989 29.1697 48.6876 28.3119C48.3862 27.454 47.8793 26.6896 47.2145 26.0904ZM20.6285 45.9646C20.6287 45.9717 20.6274 45.9788 20.6249 45.9854C20.6223 45.992 20.6185 45.998 20.6136 46.003C20.6088 46.008 20.603 46.012 20.5966 46.0147C20.5902 46.0173 20.5834 46.0186 20.5765 46.0185H14.8245C14.8177 46.0186 14.8108 46.0173 14.8045 46.0147C14.7981 46.012 14.7923 46.008 14.7875 46.003C14.7826 45.998 14.7788 45.992 14.7762 45.9854C14.7737 45.9788 14.7724 45.9717 14.7725 45.9646V28.472C14.7724 28.4649 14.7737 28.4578 14.7762 28.4512C14.7788 28.4446 14.7826 28.4386 14.7875 28.4336C14.7923 28.4286 14.7981 28.4246 14.8045 28.4219C14.8108 28.4193 14.8177 28.418 14.8245 28.4181H20.5845C20.5914 28.418 20.5982 28.4193 20.6046 28.4219C20.611 28.4246 20.6168 28.4286 20.6216 28.4336C20.6265 28.4386 20.6303 28.4446 20.6329 28.4512C20.6354 28.4578 20.6367 28.4649 20.6365 28.472V45.9646H20.6285ZM47.1705 30.7003L45.1895 43.5063C45.1902 43.5195 45.1878 43.5327 45.1825 43.5447C44.9085 45.8351 43.4985 46.9984 40.9985 46.9984H25.6335C24.8658 46.9929 24.1246 46.7062 23.5413 46.189C22.9581 45.6718 22.5702 44.9574 22.4465 44.1724C22.4377 44.1181 22.4253 44.0645 22.4095 44.0119V29.337L22.7935 29.2448C22.8085 29.2448 22.8155 29.2376 22.8305 29.2376C24.1137 28.8237 25.3262 28.2035 26.4235 27.3998C27.5415 26.6591 28.464 25.6419 29.108 24.4399C29.752 23.2378 30.0972 21.8887 30.1125 20.514V14.7471C31.1544 14.512 32.2437 14.7043 33.1515 15.2837C34.0235 15.9498 34.4675 17.2136 34.4675 19.0368V25.761C34.4683 26.0044 34.562 26.2377 34.7282 26.4098C34.8944 26.582 35.1195 26.679 35.3545 26.6799H44.0125C44.7659 26.6861 45.4923 26.9712 46.0605 27.4837C46.4952 27.8771 46.8254 28.3793 47.0197 28.9423C47.214 29.5054 47.2659 30.1106 47.1705 30.7003Z"
                                        fill="white"></path>
                                </svg>
                            </div>
                            <h3 class="benefit-title">HÀNG HÓA CHẤT LƯỢNG</h3>
                            <p class="benefit-description">
                                Tận hưởng các mặt hàng chất lượng hàng đầu với giá cả hợp lý
                            </p>
                        </div>
                        <div class="benefit-card">
                            <div class="benefit-icon">
                                <svg width="60" height="61" viewBox="0 0 60 61" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect y="0.832031" width="60" height="60" rx="30" fill="rgb(201, 33, 39)"></rect>
                                    <g clip-path="url(#clip0_7810_244239)">
                                        <path
                                            d="M42.2486 26.5224V25.1387C42.2887 21.9335 41.11 18.8326 38.9508 16.4634C37.8737 15.3044 36.5667 14.3828 35.1132 13.7577C33.6597 13.1325 32.0918 12.8174 30.5097 12.8326H29.3678C27.7856 12.8174 26.2177 13.1325 24.7643 13.7577C23.3108 14.3828 22.0037 15.3044 20.9266 16.4634C18.7675 18.8326 17.5887 21.9335 17.6288 25.1387V26.5233C16.3745 26.609 15.1993 27.1671 14.3403 28.0852C13.4813 29.0032 13.0023 30.2128 13 31.47V33.6335C13.002 34.9468 13.5246 36.2058 14.4533 37.1345C15.3819 38.0631 16.6409 38.5857 17.9543 38.5877H20.7451C20.9856 38.587 21.216 38.4911 21.3861 38.321C21.5562 38.151 21.652 37.9205 21.6528 37.68V27.4122C21.652 27.1717 21.5562 26.9412 21.3861 26.7712C21.216 26.6011 20.9856 26.5052 20.7451 26.5045H19.4433V25.1387C19.4433 19.1554 23.7099 14.648 29.3602 14.648H30.5022C36.16 14.648 40.4191 19.1554 40.4191 25.1387V26.5073H39.1173C38.8768 26.5081 38.6464 26.6039 38.4763 26.774C38.3062 26.9441 38.2104 27.1745 38.2096 27.415V37.6678C38.2104 37.9083 38.3062 38.1387 38.4763 38.3088C38.6464 38.4789 38.8768 38.5747 39.1173 38.5755H40.3881C40.0175 43.3106 36.7573 44.4073 35.2448 44.6566C35.0359 44.0169 34.6302 43.4595 34.0855 43.0642C33.5409 42.6689 32.8852 42.4558 32.2122 42.4556H29.9425C29.0969 42.4556 28.286 42.7915 27.6881 43.3894C27.0901 43.9873 26.7542 44.7982 26.7542 45.6438C26.7542 46.4894 27.0901 47.3003 27.6881 47.8982C28.286 48.4961 29.0969 48.832 29.9425 48.832H32.2188C32.9166 48.8305 33.5948 48.6004 34.1494 48.1769C34.7041 47.7534 35.1047 47.1599 35.2899 46.4871C36.3738 46.3359 37.4188 45.979 38.3686 45.4354C40.01 44.4751 41.9533 42.5195 42.211 38.5689C43.4703 38.4904 44.6524 37.9349 45.5165 37.0156C46.3807 36.0962 46.862 34.882 46.8624 33.6203V31.4569C46.8635 30.2023 46.3873 28.9944 45.5305 28.078C44.6737 27.1616 43.5004 26.6055 42.2486 26.5224ZM19.8524 36.7639H17.9712C17.1384 36.7629 16.3401 36.4311 15.7518 35.8416C15.1635 35.2521 14.8335 34.4531 14.8342 33.6203V31.4569C14.8347 30.6245 15.1656 29.8265 15.7541 29.2379C16.3427 28.6494 17.1407 28.3185 17.9731 28.318H19.8543L19.8524 36.7639ZM32.2188 47.0166H29.9425C29.5794 47.0166 29.2312 46.8724 28.9744 46.6156C28.7176 46.3589 28.5734 46.0107 28.5734 45.6476C28.5734 45.2845 28.7176 44.9362 28.9744 44.6795C29.2312 44.4227 29.5794 44.2785 29.9425 44.2785H32.2188C32.5819 44.2785 32.9301 44.4227 33.1869 44.6795C33.4436 44.9362 33.5879 45.2845 33.5879 45.6476C33.5879 46.0107 33.4436 46.3589 33.1869 46.6156C32.9301 46.8724 32.5819 47.0166 32.2188 47.0166ZM45.0545 33.6203C45.054 34.4526 44.7232 35.2507 44.1346 35.8393C43.5461 36.4278 42.748 36.7587 41.9157 36.7592H40.0344V28.3227H41.9157C42.748 28.3232 43.5461 28.6541 44.1346 29.2426C44.7232 29.8312 45.054 30.6292 45.0545 31.4616V33.6203Z"
                                            fill="white"></path>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_7810_244239">
                                            <rect width="36" height="36" fill="white" transform="translate(12 12.832)"></rect>
                                        </clipPath>
                                    </defs>
                                </svg>
                            </div>
                            <h3 class="benefit-title">HỖ TRỢ 24/7</h3>
                            <p class="benefit-description">
                                Nhận hỗ trợ ngay lập tức bất cứ khi nào bạn cần
                            </p>
                        </div>
                        <div class="benefit-card">
                            <div class="benefit-icon">
                                <svg width="61" height="61" viewBox="0 0 61 61" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect x="0.5" y="0.832031" width="60" height="60" rx="30" fill="rgb(201, 33, 39)"></rect>
                                    <g clip-path="url(#clip0_7810_244246)">
                                        <path
                                            d="M46.5303 24.5177C45.9148 23.8677 45.1702 23.3535 44.3443 23.0082C43.5185 22.6628 42.6295 22.4938 41.7345 22.5121H36.7939V19.7372C36.7932 19.4983 36.6983 19.2693 36.5299 19.0998C36.3614 18.9304 36.133 18.8342 35.8941 18.832H13.4052C13.1653 18.8327 12.9355 18.9283 12.7659 19.0979C12.5963 19.2675 12.5007 19.4974 12.5 19.7372V39.6366C12.5007 39.8764 12.5963 40.1062 12.7659 40.2758C12.9355 40.4454 13.1653 40.541 13.4052 40.5417H17.0097C17.1538 41.3671 17.5845 42.1151 18.2259 42.6542C18.8673 43.1932 19.6782 43.4888 20.5161 43.4888C21.3539 43.4888 22.1649 43.1932 22.8063 42.6542C23.4477 42.1151 23.8783 41.3671 24.0225 40.5417H37.8736C38.0178 41.3671 38.4484 42.1151 39.0898 42.6542C39.7312 43.1932 40.5422 43.4888 41.38 43.4888C42.2178 43.4888 43.0288 43.1932 43.6702 42.6542C44.3116 42.1151 44.7423 41.3671 44.8864 40.5417H47.5857C47.8256 40.541 48.0554 40.4454 48.225 40.2758C48.3946 40.1062 48.4902 39.8764 48.4909 39.6366V30.2861C48.5891 28.1847 47.8887 26.124 46.5303 24.5177ZM14.3094 20.6415H34.9862V38.7386H23.8632C23.6167 38.048 23.1626 37.4505 22.5632 37.0281C21.9638 36.6056 21.2485 36.3788 20.5152 36.3788C19.7819 36.3788 19.0665 36.6056 18.4671 37.0281C17.8677 37.4505 17.4137 38.048 17.1671 38.7386H14.3094V20.6415ZM20.5179 41.68C20.1718 41.6803 19.8334 41.578 19.5455 41.386C19.2576 41.194 19.0331 40.9209 18.9005 40.6012C18.7679 40.2816 18.733 39.9298 18.8004 39.5903C18.8677 39.2509 19.0343 38.939 19.2789 38.6943C19.5236 38.4495 19.8353 38.2828 20.1747 38.2153C20.5141 38.1477 20.866 38.1824 21.1857 38.3149C21.5054 38.4474 21.7786 38.6717 21.9708 38.9595C22.1629 39.2473 22.2654 39.5856 22.2652 39.9317C22.2645 40.3955 22.0799 40.84 21.7518 41.1678C21.4237 41.4955 20.9789 41.6797 20.5152 41.68H20.5179ZM41.3827 41.68C41.0366 41.6805 40.6981 41.5783 40.4101 41.3864C40.1221 41.1945 39.8975 40.9215 39.7647 40.6018C39.6319 40.2822 39.5969 39.9304 39.6642 39.5909C39.7315 39.2514 39.8979 38.9395 40.1425 38.6946C40.3871 38.4497 40.6989 38.2829 41.0383 38.2153C41.3778 38.1477 41.7296 38.1823 42.0494 38.3148C42.3691 38.4472 42.6424 38.6716 42.8346 38.9594C43.0268 39.2472 43.1293 39.5856 43.1292 39.9317C43.1285 40.3948 42.9443 40.8388 42.617 41.1665C42.2896 41.4941 41.8458 41.6788 41.3827 41.68ZM46.6761 38.7314H44.7281C44.4815 38.0408 44.0274 37.4433 43.4281 37.0209C42.8287 36.5984 42.1133 36.3716 41.38 36.3716C40.6467 36.3716 39.9313 36.5984 39.332 37.0209C38.7326 37.4433 38.2785 38.0408 38.032 38.7314H36.8029V24.3215H41.7426C44.7892 24.3215 46.6815 26.6061 46.6815 30.2861V38.7314H46.6761Z"
                                            fill="white"></path>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_7810_244246">
                                            <rect width="36" height="36" fill="white" transform="translate(12.5 12.832)"></rect>
                                        </clipPath>
                                    </defs>
                                </svg>
                            </div>
                            <h3 class="benefit-title">HỖ TRỢ 24/7</h3>
                            <p class="benefit-description">
                                Nhận hỗ trợ ngay lập tức bất cứ khi nào bạn cần
                            </p>
                        </div>
                        <div class="benefit-card">
                            <div class="benefit-icon">
                                <svg width="60" height="61" viewBox="0 0 60 61" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect y="0.832031" width="60" height="60" rx="30" fill="rgb(201, 33, 39)"></rect>
                                    <g clip-path="url(#clip0_7810_244254)">
                                        <path
                                            d="M31.3402 29.9135H28.6677C28.1335 29.9135 27.6212 29.7013 27.2434 29.3236C26.8657 28.9459 26.6535 28.4336 26.6535 27.8994C26.6535 27.3652 26.8657 26.8529 27.2434 26.4751C27.6212 26.0974 28.1335 25.8852 28.6677 25.8852H33.3849C33.5056 25.8852 33.6251 25.8614 33.7365 25.8152C33.848 25.7691 33.9493 25.7014 34.0346 25.6161C34.12 25.5307 34.1876 25.4295 34.2338 25.318C34.28 25.2065 34.3038 25.087 34.3038 24.9663C34.3038 24.8457 34.28 24.7262 34.2338 24.6147C34.1876 24.5032 34.12 24.4019 34.0346 24.3166C33.9493 24.2313 33.848 24.1636 33.7365 24.1174C33.6251 24.0713 33.5056 24.0475 33.3849 24.0475H30.9263V22.1708C30.9263 22.0501 30.9025 21.9307 30.8564 21.8192C30.8102 21.7077 30.7425 21.6064 30.6572 21.5211C30.5719 21.4358 30.4706 21.3681 30.3591 21.3219C30.2476 21.2757 30.1281 21.252 30.0075 21.252C29.8868 21.252 29.7673 21.2757 29.6558 21.3219C29.5443 21.3681 29.4431 21.4358 29.3577 21.5211C29.2724 21.6064 29.2047 21.7077 29.1585 21.8192C29.1124 21.9307 29.0886 22.0501 29.0886 22.1708V24.0515H28.6677C27.646 24.0515 26.6661 24.4574 25.9436 25.1798C25.2212 25.9023 24.8153 26.8822 24.8153 27.9039C24.8153 28.9256 25.2212 29.9054 25.9436 30.6279C26.6661 31.3504 27.646 31.7562 28.6677 31.7562H31.3402C31.8744 31.7562 32.3868 31.9684 32.7645 32.3462C33.1422 32.7239 33.3544 33.2362 33.3544 33.7704C33.3544 34.3046 33.1422 34.8169 32.7645 35.1946C32.3868 35.5724 31.8744 35.7846 31.3402 35.7846H26.541C26.2973 35.7846 26.0636 35.8814 25.8913 36.0537C25.719 36.226 25.6222 36.4597 25.6222 36.7034C25.6222 36.9471 25.719 37.1808 25.8913 37.3532C26.0636 37.5255 26.2973 37.6223 26.541 37.6223H29.0836V39.537C29.0836 39.7807 29.1804 40.0144 29.3527 40.1867C29.525 40.359 29.7588 40.4558 30.0025 40.4558C30.2462 40.4558 30.4799 40.359 30.6522 40.1867C30.8245 40.0144 30.9213 39.7807 30.9213 39.537V37.6223H31.3882C32.4099 37.6162 33.3874 37.2045 34.1055 36.4777C34.8237 35.7509 35.2237 34.7686 35.2176 33.7469C35.2115 32.7252 34.7998 31.7478 34.073 31.0296C33.3462 30.3115 32.364 29.9114 31.3422 29.9175L31.3402 29.9135Z"
                                            fill="white"></path>
                                        <path
                                            d="M42.7279 18.1041C39.3523 14.7285 34.7739 12.832 30 12.832C25.2261 12.832 20.6477 14.7285 17.2721 18.1041C13.8964 21.4798 12 26.0581 12 30.832C12 35.6059 13.8964 40.1843 17.2721 43.56C20.6477 46.9356 25.2261 48.832 30 48.832C34.7739 48.832 39.3523 46.9356 42.7279 43.56C46.1036 40.1843 48 35.6059 48 30.832C48 26.0581 46.1036 21.4798 42.7279 18.1041ZM30 46.9914C26.804 46.9914 23.6797 46.0437 21.0223 44.2681C18.3649 42.4924 16.2938 39.9687 15.0707 37.016C13.8476 34.0632 13.5276 30.8141 14.1511 27.6795C14.7746 24.5449 16.3137 21.6656 18.5736 19.4056C20.8335 17.1457 23.7129 15.6067 26.8475 14.9832C29.9821 14.3597 33.2312 14.6797 36.1839 15.9027C39.1367 17.1258 41.6604 19.197 43.436 21.8544C45.2116 24.5118 46.1594 27.636 46.1594 30.832C46.1533 35.1159 44.4488 39.2226 41.4197 42.2517C38.3905 45.2809 34.2839 46.9853 30 46.9914Z"
                                            fill="white"></path>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_7810_244254">
                                            <rect width="36" height="36" fill="white" transform="translate(12 12.832)"></rect>
                                        </clipPath>
                                    </defs>
                                </svg>
                            </div>
                            <h3 class="benefit-title">HỖ TRỢ 24/7</h3>
                            <p class="benefit-description">
                                Nhận hỗ trợ ngay lập tức bất cứ khi nào bạn cần
                            </p>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <?php require_once "layout/footer.php" ?>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script type="module" src="Common/assets/js/clients.js"></script>

</body>

</html>