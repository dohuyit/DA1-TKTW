<header id="header">
    <div class="header-top">
        <div class="container">
            <p>Chào mừng đến với website của chúng tôi 🎉</p>
        </div>
    </div>
    <div class="header-middle">
        <div class="container">
            <div class="body">
                <div class="group-logo">
                    <a href="<?= BASE_URL ?>"><img src="Common/assets/image/logo.png" alt="" /></a>
                </div>
                <div class="group-search">
                    <form action="<?= BASE_URL . '?act=tim-kiem' ?>" method="post">
                        <input type="text" placeholder="Tìm kiếm sản phẩm..." name="keyword" />
                        <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </div>
                <div class="group-icon">
                    <div class="item-icon">
                        <ion-icon name="heart-outline"></ion-icon>
                        <div class="desc-item-icon">
                            <p>3 item</p>
                            <strong>Wishlist</strong>
                        </div>
                    </div>
                    <div class="item-icon">
                        <ion-icon name="cart-outline"></ion-icon>
                        <a href="<?= BASE_URL . '?act=gio-hang' ?>" class="desc-item-icon">
                            <p>
                                <?= isset($_SESSION['products-cart'])
                                    ? $_SESSION['products-cart'] . ' items'
                                    : '0 items';
                                ?>
                            </p>
                            <strong>Cart</strong>
                        </a>
                    </div>
                    <div class="item-icon">
                        <ion-icon name="people-outline"></ion-icon>
                        <?php if (isset($_SESSION['user_client'])): ?>
                            <div class="desc-item-icon">
                                <p>Xin chào</p>
                                <strong><?= $_SESSION['user_client']['ho_ten'] ?></strong>
                            </div>
                            <ul class="account-dropdown">
                                <li>
                                    <a href="<?= BASE_URL . '?act=thong-tin-don-hang' ?>">
                                        <ion-icon name="person-add-outline"></ion-icon>
                                        <span>Thông tin tài khoản</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= BASE_URL . '?act=logout' ?>">
                                        <ion-icon name="log-out-outline"></ion-icon>
                                        <span>Đăng xuất</span>
                                    </a>
                                </li>
                            </ul>
                        <?php else : ?>
                            <a href="<?= BASE_URL . '?act=form-login' ?>" class="desc-item-icon">
                                <p>Account</p>
                                <strong>Login</strong>
                            </a>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom">
        <div class="container">
            <nav id="nav">
                <ul class="list-nav">
                    <li><a href="<?= BASE_URL ?>" class="nav-link">Trang chủ</a></li>
                    <li>
                        <a href="#" class="nav-link">Sản phẩm</a>
                        <div class="navsubtle-hover-wrap">
                            <div class="wrap-left">
                                <ul class="list-data">
                                    <h3>Giày</h3>
                                    <div class="content">
                                        <?php foreach ($listDanhMuc as $danhMuc) : ?>
                                            <li><a href="<?= BASE_URL . '?act=san-pham-theo-danh-muc&danh_muc_id=' . $danhMuc['id'] ?>"><?= $danhMuc['ten_danh_muc'] ?></a></li>
                                        <?php endforeach ?>
                                    </div>
                                </ul>
                                <ul class="list-data">
                                    <h3>Quần Áo</h3>
                                    <div class="content">
                                        <li><a href="#">Hodie & Sweater</a></li>
                                        <li><a href="#">Jackets & Outerwear</a></li>
                                        <li><a href="#">T-shirts</a></li>
                                        <li><a href="#">Tanktops</a></li>
                                    </div>
                                </ul>
                                <ul class="list-data">
                                    <h3>Thương hiệu</h3>
                                    <div class="content">
                                        <li><a href="#">Nike</a></li>
                                        <li><a href="#">Addidas</a></li>
                                        <li><a href="#">Puma</a></li>
                                        <li><a href="#">Converse</a></li>
                                        <li><a href="#">Fila</a></li>
                                        <li><a href="#">Pegasus</a></li>
                                    </div>
                                </ul>
                                <ul class="list-data">
                                    <h3>Thể thao</h3>
                                    <div class="content">
                                        <li><a href="#">Basketball</a></li>
                                        <li><a href="#">Pickleball</a></li>
                                        <li><a href="#">Golf</a></li>
                                        <li><a href="#">Soccer</a></li>
                                    </div>
                                </ul>
                            </div>
                            <div class="wrap-right">
                                <img src="Common/assets/image/tab-hover.jpg" alt="">
                            </div>
                        </div>
                    </li>
                    <li><a href="#" class="nav-link">Khuyến Mãi</a></li>
                    <li><a href="#" class="nav-link">Blog</a></li>
                    <li><a href="#" class="nav-link">Liên Hệ</a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>