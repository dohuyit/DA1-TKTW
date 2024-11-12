<head>
    <link rel="stylesheet" href="assets/dist/css/formLogin.css" />
</head>

<body>
    <div class="container">
        <div id="content">
            <h1>Welcome!</h1>
            <!-- <?php if (isset($_SESSION['errors'])) { ?>
                <p class="text-danger text-center"><?= $_SESSION['errors'] ?></p>
            <?php } else { ?>
                <p class="login-box-msg">Vui lòng đăng nhập</p>
            <?php } ?> -->
            <form action="<?= BASE_URL_ADMIN . '?act=check-login-admin' ?>" method="post">
                <div class="input-bar">
                    <label for="name">Email</label>
                    <input type="email" id="name" class="input" name="email">
                    <box-icon name='user'></box-icon>
                </div>
                <div class="input-bar">
                    <label for="password">Password</label>
                    <input type="password" id="password" class="input" name="password">
                    <box-icon name='lock-alt'></box-icon>
                </div>
                <button type="submit" id="btn">Đăng nhập</button>
            </form>
        </div>
    </div>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="assets/dist/js/formLogin.js"></script>
</body>