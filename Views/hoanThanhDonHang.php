<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="Common/assets/css/reset.css" />
    <link rel="stylesheet" href="Common/assets/css/confirm-order.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>BEKAT - NHÓM 3</title>
</head>

<body>
    <div class="wrapper">
        <?php require_once './Views/layout/header.php' ?>

        <main>
            <section id="confirmation-container">
                <div class="container">
                    <div class="confirmation-card">
                        <div class="icon">
                            <i class="fa-solid fa-check"></i>
                        </div>
                        <h1>Đơn Hàng Hoàn Tất!</h1>
                        <p>Cảm ơn bạn đã đặt hàng. Chúng tôi sẽ sớm giao hàng đến bạn.</p>
                        <div class="btn">
                            <a href="#">
                                <span>Thông tin đơn hàng</span>
                                <i class="fa-solid fa-dolly"></i>
                            </a>
                            <a href="<?= BASE_URL ?>">
                                <span>Tiếp tục mua hàng</span>
                                <i class="fa-solid fa-house"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>