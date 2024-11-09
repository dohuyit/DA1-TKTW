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
                    <img src="Common/assets/image/logo.png" alt="" />
                </div>
                <div class="group-search">
                    <form action="">
                        <input type="text" placeholder="Tìm kiếm sản phẩm..." />
                        <button><i class="fa-solid fa-magnifying-glass"></i></button>
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
                        <div class="desc-item-icon">
                            <p>3 item</p>
                            <strong>Cart</strong>
                        </div>
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
                                    <a href="#">
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
                <ul>
                    <li><a href="#">Trang chủ</a></li>
                    <li><a href="#">Sản phẩm</a></li>
                    <li><a href="#">Khuyến Mãi</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Liên Hệ</a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>