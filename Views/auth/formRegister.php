<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="Common/assets/css/reset.css" />
    <link rel="stylesheet" href="Common/assets/css/login-register.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>BEKAT - NHÓM 3</title>
</head>

<body>
    <div class="wrapper-main">
        <div class="custom-shape-divider-top-1720948200">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120"
                preserveAspectRatio="none">
                <path
                    d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z"
                    class="shape-fill"></path>
            </svg>
        </div>

        <section class="card-body register">
            <div class="form-main">
                <article>
                    <h3><img src="Common/assets/image/logo.png" alt="" /></h3>
                    <p>Chào mừng đến với website của chúng tôi 🎉</p>
                </article>
                <form action="<?= BASE_URL . '?act=register' ?>" method="post">
                    <div class="item-form">
                        <label for="">Họ tên</label>
                        <input type="text" name="ho_ten" id="" placeholder="Họ tên của bạn..." />
                    </div>
                    <?php if (isset($_SESSION['errors']['ho_ten'])) { ?>
                        <p class="text-danger"><?= $_SESSION['errors']['ho_ten'] ?></p>
                    <?php } ?>
                    <div class="item-form">
                        <label for="">Email</label>
                        <input type="email" name="email" id="" placeholder="Email của bạn..." />
                    </div>
                    <?php if (isset($_SESSION['errors']['email'])) { ?>
                        <p class="text-danger"><?= $_SESSION['errors']['email'] ?></p>
                    <?php } ?>
                    <div class="item-form">
                        <label for="">Password</label>
                        <input type="password" name="mat_khau" id="" placeholder="Mật khẩu của bạn..." />
                    </div>
                    <?php if (isset($_SESSION['errors']['mat_khau'])) { ?>
                        <p class="text-danger"><?= $_SESSION['errors']['mat_khau'] ?></p>
                    <?php } ?>
                    <div class="form-check">
                        <a href="<?= BASE_URL . '?act=quen-mat-khau' ?>">Quên mật khẩu?</a>
                    </div>
                    <button type="submit" class="btn-submit">Sign Up</button>
                    <div class="signin-orther-title">
                        <h4>Sign in with</h4>
                        <div class="form-media">
                            <div class="item-media">
                                <img src="Common/assets/image/google.png" alt="">
                                <p>Đăng nhập tài khoản Google</p>
                            </div>
                            <div class="item-media">
                                <img src="Common/assets/image/github.png" alt="">
                                <p>Đăng nhập tài khoản Github</p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="form-sub">
                <h2>Chào Mừng</h2>
                <p>Đăng nhập tài khoản ngay!!!</p>
                <div class="btn-register">
                    <a href="<?= BASE_URL . '?act=form-login' ?>">
                        <strong>Đăng nhập</strong>
                        <strong><i class="fa-solid fa-arrow-right"></i></strong>
                    </a>
                </div>
            </div>
        </section>
    </div>
</body>

</html>