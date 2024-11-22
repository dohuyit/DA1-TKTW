<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="Common/assets/css/reset.css" />
    <link rel="stylesheet" href="Common/assets/css/fogot-password.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Quên mật khẩu - BEKAT</title>
</head>

<body>
    <div class="wrapper-main">
        <?php if (isset($_SESSION['layMk'])): ?>
            <script>
                alert('<?= $_SESSION['layMk']; ?>');
            </script>
            <?php unset($_SESSION['layMk']); ?>
        <?php endif; ?>
        <section class="card-body">
            <div class="form-main">
                <article>
                    <h3><img src="Common/assets/image/logo.png" alt="" /></h3>
                    <p>Nhập email của bạn để nhận hướng dẫn khôi phục.</p>
                </article>
                <form action="<?= BASE_URL . '?act=cap-nhat-mat-khau' ?>" method="post">
                    <div class="item-form">
                        <label for="">Email</label>
                        <input type="email" name="email" id="" placeholder="Nhập email của bạn..." />
                    </div>
                    <button type="submit" class="btn-submit">Gửi yêu cầu</button>
                </form>
                <div class="back-to-login">
                    <p>Nhớ lại mật khẩu?<a href="<?= BASE_URL . '?act=form-login' ?>">Đăng nhập ngay</a></p>
                </div>
            </div>
        </section>
    </div>
</body>

</html>