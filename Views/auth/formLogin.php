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
        <?php if (isset($_SESSION['thongBao'])): ?>
            <script>
                alert('<?= $_SESSION['thongBao']; ?>');
            </script>
            <?php unset($_SESSION['thongBao']); ?>
        <?php endif; ?>
        <section class="card-body ">
            <div class="form-main">
                <article>
                    <h3><img src="Common/assets/image/logo.png" alt="" /></h3>
                    <p>Chào mừng đến với website của chúng tôi 🎉</p>
                </article>
                <form action="<?= BASE_URL . '?act=check-login' ?>" method="post">
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
                    <button type="submit" class="btn-submit">Login</button>
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
                <p>Đăng kí để trải nghiệm dịch vụ của chúng tôi</p>
                <div class="btn-register">
                    <a href="<?= BASE_URL . '?act=form-register' ?>">
                        <strong>Đăng kí ngay</strong>
                        <strong><i class="fa-solid fa-arrow-right"></i></strong>
                    </a>
                </div>
            </div>
        </section>
    </div>
</body>

</html>