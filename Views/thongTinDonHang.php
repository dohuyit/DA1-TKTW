<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="Common/assets/css/reset.css" />
    <link rel="stylesheet" href="Common/assets/css/infor-order.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>BEKAT - NHÓM 3</title>
</head>

<body>
    <div class="wrapper">
        <?php require_once "./Views/layout/header.php" ?>
        <main>
            <section id="title-infor">
                <div class="container">
                    <div class="profile">
                        <div class="avatar">
                            <img src="<?= $user['anh_dai_dien'] ?>" alt="">
                        </div>
                        <div class="content-avatar">
                            <p>Xin chào,</p>
                            <h2><?= $_SESSION['user_client']['ho_ten'] ?></h2>
                        </div>
                    </div>
                </div>
            </section>
            <section id="main-infor">
                <div class="container">
                    <div class="wrapper-content">
                        <div class="sidebar-infor-user">
                            <ul class="menu">
                                <li class="nav-item">
                                    <a href="<?= BASE_URL . '?act=thong-tin-don-hang' ?>" class="nav-link active">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                            viewBox="0 0 22 22" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M11.0006 21.75C10.1206 21.75 9.25061 21.56 8.56061 21.18L3.22061 18.21C1.77061 17.41 0.640625 15.48 0.640625 13.82V8.16998C0.640625 6.50998 1.77061 4.59002 3.22061 3.78002L8.56061 0.82C9.93061 0.06 12.0706 0.06 13.4406 0.82L18.7806 3.78997C20.2306 4.58997 21.3606 6.51999 21.3606 8.17999V13.83C21.3606 15.49 20.2306 17.41 18.7806 18.22L13.4406 21.18C12.7506 21.56 11.8806 21.75 11.0006 21.75ZM11.0006 1.74999C10.3706 1.74999 9.75062 1.88 9.29062 2.13L7.76265 2.97982L16.0438 7.76184L19.047 6.02428C18.7566 5.63295 18.4114 5.3029 18.0506 5.09997L12.7106 2.13C12.2506 1.88 11.6306 1.74999 11.0006 1.74999ZM15.2507 9.96379V12.2405C15.2507 12.6505 15.5907 12.9905 16.0007 12.9905C16.4107 12.9905 16.7507 12.6506 16.7507 12.2606V9.09492L19.7307 7.36872C19.8142 7.64716 19.8606 7.92286 19.8606 8.17999V13.83C19.8606 14.94 19.0106 16.37 18.0506 16.91L12.7106 19.88C12.4396 20.0319 12.1074 20.1385 11.7505 20.1999V11.9913L15.2507 9.96379ZM14.5584 8.62129L11.0003 10.6799L2.95318 6.02299C3.24382 5.63229 3.58943 5.30314 3.95062 5.09997L6.2427 3.82517L14.5584 8.62129ZM10.2505 11.9859L2.26969 7.36731C2.18677 7.64537 2.14062 7.92136 2.14062 8.17999V13.83C2.14062 14.93 2.99062 16.37 3.95062 16.91L9.29062 19.88C9.56155 20.0318 9.89365 20.1385 10.2505 20.1999V11.9859Z">
                                            </path>
                                        </svg>
                                        <span>Đơn hàng của tôi</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= BASE_URL . '?act=thong-tin-tai-khoan' ?>" class="nav-link ">
                                        <svg width="16" height="22" viewBox="0 0 16 22" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g id="vuesax/outline/frame">
                                                <path id="Union" fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M8.07957 10.62H8.15957H8.18957C10.9796 10.53 13.1796 8.25 13.1896 5.44C13.1896 2.58 10.8596 0.25 7.99957 0.25C5.13957 0.25 2.80957 2.58 2.80957 5.44C2.80957 8.25 4.99957 10.53 7.89957 10.62C7.95957 10.61 8.02957 10.61 8.07957 10.62ZM4.30957 5.44C4.30957 3.41 5.96957 1.75 7.99957 1.75C10.0296 1.75 11.6896 3.41 11.6896 5.44C11.6796 7.42 10.1396 9.03 8.17957 9.12C8.04957 9.11 7.90957 9.11 7.85957 9.12C5.86957 9.05 4.30957 7.44 4.30957 5.44ZM2.74961 20.05C4.23961 21.05 6.20961 21.55 8.16961 21.55C10.1296 21.55 12.0896 21.05 13.5896 20.05C14.9796 19.12 15.7396 17.85 15.7396 16.48C15.7396 15.11 14.9696 13.85 13.5896 12.93C10.6096 10.94 5.74961 10.94 2.74961 12.93C1.35961 13.86 0.599609 15.13 0.599609 16.5C0.599609 17.87 1.35961 19.13 2.74961 20.05ZM2.09961 16.51C2.09961 15.65 2.61961 14.83 3.57961 14.19C6.06961 12.53 10.2696 12.53 12.7596 14.19C13.7096 14.82 14.2396 15.64 14.2396 16.49C14.2396 17.35 13.7196 18.17 12.7596 18.81C10.2696 20.48 6.06961 20.48 3.57961 18.81C2.62961 18.18 2.09961 17.36 2.09961 16.51Z">
                                                </path>
                                            </g>
                                        </svg>
                                        <span>Tài khoản của tôi</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g id="wrapper">
                                                <path id="Union" fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M7.00266 20.751H9.00269H17.0027C21.4127 20.751 22.7527 19.411 22.7527 15.001V9.00098C22.7527 4.59098 21.4127 3.25098 17.0027 3.25098H9.00269H7.00266C2.75266 3.25098 1.36266 4.52098 1.26266 8.48098C1.25266 8.68098 1.32266 8.87098 1.47266 9.02098C1.62266 9.17098 1.81266 9.25098 2.01266 9.25098C3.52266 9.25098 4.75266 10.491 4.75266 12.001C4.75266 13.511 3.52266 14.751 2.01266 14.751C1.80266 14.751 1.61266 14.841 1.47266 14.981C1.33266 15.121 1.26266 15.321 1.26266 15.521C1.36266 19.481 2.75266 20.751 7.00266 20.751ZM7.00266 19.251H8.25269V16.501C8.25269 16.091 8.59269 15.751 9.00269 15.751C9.41269 15.751 9.75269 16.091 9.75269 16.501V19.251H17.0027C20.5827 19.251 21.2527 18.571 21.2527 15.001V9.00098C21.2527 5.43098 20.5827 4.75098 17.0027 4.75098H9.75269V7.50098C9.75269 7.91098 9.41269 8.25098 9.00269 8.25098C8.59269 8.25098 8.25269 7.91098 8.25269 7.50098V4.75098H7.00266C3.82266 4.75098 2.96266 5.29098 2.79266 7.82098C4.76266 8.20098 6.25266 9.93098 6.25266 12.001C6.25266 14.071 4.76266 15.801 2.79266 16.181C2.96266 18.721 3.82266 19.251 7.00266 19.251ZM12.3626 15.4306C12.5626 15.5706 12.8026 15.6506 13.0426 15.6506C13.2326 15.6506 13.4226 15.6106 13.5926 15.5206L14.6726 14.9606L15.7426 15.5206C16.1326 15.7206 16.6026 15.6906 16.9626 15.4306C17.3226 15.1706 17.5026 14.7306 17.4226 14.2906L17.2126 13.1006L18.0826 12.2506C18.4026 11.9406 18.5226 11.4806 18.3826 11.0606C18.2426 10.6406 17.8826 10.3306 17.4426 10.2706L16.2426 10.0906L15.7026 9.00059C15.5126 8.60059 15.1126 8.35059 14.6626 8.35059C14.2226 8.35059 13.8226 8.60059 13.6226 9.00059L13.0826 10.0906L11.8826 10.2706C11.4426 10.3306 11.0826 10.6406 10.9426 11.0606C10.8126 11.4806 10.9226 11.9406 11.2426 12.2506L12.1126 13.1006L11.9026 14.2906C11.8226 14.7306 12.0026 15.1706 12.3626 15.4306ZM13.2826 12.1506L12.7726 11.6506L13.4926 11.5506C13.8726 11.4906 14.2026 11.2506 14.3726 10.9106L14.6826 10.2706L14.9926 10.9106C15.1626 11.2506 15.4926 11.4906 15.8726 11.5506L16.5726 11.6506L16.0626 12.1506C15.7826 12.4106 15.6626 12.7906 15.7226 13.1806L15.8426 13.8806L15.2126 13.5506C14.8726 13.3706 14.4726 13.3706 14.1326 13.5506L13.5026 13.8806L13.6226 13.1806C13.6826 12.8006 13.5626 12.4206 13.2826 12.1506Z">
                                                </path>
                                            </g>
                                        </svg>
                                        <span>Mã giảm giá</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g id="vuesax/outline/star">
                                                <path id="Vector"
                                                    d="M16.6601 21.6698C16.1301 21.6698 15.4501 21.4998 14.6001 20.9998L11.6101 19.2298C11.3001 19.0498 10.7001 19.0498 10.4001 19.2298L7.40012 20.9998C5.63012 22.0498 4.59012 21.6298 4.12012 21.2898C3.66012 20.9498 2.94012 20.0798 3.41012 18.0798L4.12012 15.0098C4.20012 14.6898 4.04012 14.1398 3.80012 13.8998L1.32012 11.4198C0.0801177 10.1798 0.180118 9.11983 0.350118 8.59982C0.520118 8.07982 1.06012 7.15982 2.78012 6.86982L5.97012 6.33982C6.27012 6.28982 6.70012 5.96982 6.83012 5.69982L8.60012 2.16982C9.40012 0.559824 10.4501 0.319824 11.0001 0.319824C11.5501 0.319824 12.6001 0.559824 13.4001 2.16982L15.1601 5.68982C15.3001 5.95982 15.7301 6.27982 16.0301 6.32982L19.2201 6.85982C20.9501 7.14982 21.4901 8.06982 21.6501 8.58982C21.8101 9.10983 21.9101 10.1698 20.6801 11.4098L18.2001 13.8998C17.9601 14.1398 17.8101 14.6798 17.8801 15.0098L18.5901 18.0798C19.0501 20.0798 18.3401 20.9498 17.8801 21.2898C17.6301 21.4698 17.2301 21.6698 16.6601 21.6698ZM11.0001 17.5898C11.4901 17.5898 11.9801 17.7098 12.3701 17.9398L15.3601 19.7098C16.2301 20.2298 16.7801 20.2298 16.9901 20.0798C17.2001 19.9298 17.3501 19.3998 17.1301 18.4198L16.4201 15.3498C16.2301 14.5198 16.5401 13.4498 17.1401 12.8398L19.6201 10.3598C20.1101 9.86982 20.3301 9.38982 20.2301 9.05982C20.1201 8.72983 19.6601 8.45982 18.9801 8.34982L15.7901 7.81982C15.0201 7.68982 14.1801 7.06982 13.8301 6.36982L12.0701 2.84982C11.7501 2.20982 11.3501 1.82982 11.0001 1.82982C10.6501 1.82982 10.2501 2.20982 9.94012 2.84982L8.17012 6.36982C7.82012 7.06982 6.98012 7.68982 6.21012 7.81982L3.03012 8.34982C2.35012 8.45982 1.89012 8.72983 1.78012 9.05982C1.67012 9.38982 1.90012 9.87982 2.39012 10.3598L4.87012 12.8398C5.47012 13.4398 5.78012 14.5198 5.59012 15.3498L4.88012 18.4198C4.65012 19.4098 4.81012 19.9298 5.02012 20.0798C5.23012 20.2298 5.77012 20.2198 6.65012 19.7098L9.64012 17.9398C10.0201 17.7098 10.5101 17.5898 11.0001 17.5898Z">
                                                </path>
                                            </g>
                                        </svg>
                                        <span>Đánh giá của tôi</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <svg width="22" height="20" viewBox="0 0 22 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g id="vuesax/outline/eye">
                                                <path id="Union" fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M1.25008 13C3.69008 16.82 7.24008 19.02 11.0001 19.02C14.7501 19.02 18.3001 16.82 20.7401 13C21.8001 11.34 21.8001 8.64998 20.7401 6.99998C18.3001 3.17998 14.7501 0.97998 11.0001 0.97998C7.25008 0.97998 3.70008 3.17998 1.25008 6.99998C0.190078 8.65998 0.190078 11.35 1.25008 13ZM2.52008 7.80998C4.68008 4.41998 7.77008 2.47998 11.0001 2.47998C14.2301 2.47998 17.3201 4.41998 19.4801 7.80998C20.2301 8.97998 20.2301 11.02 19.4801 12.19C17.3201 15.58 14.2301 17.52 11.0001 17.52C7.77008 17.52 4.68008 15.58 2.52008 12.19C1.77008 11.02 1.77008 8.97998 2.52008 7.80998ZM6.67004 10.0004C6.67004 12.3904 8.61004 14.3304 11 14.3304C13.39 14.3304 15.33 12.3904 15.33 10.0004C15.33 7.61041 13.39 5.67041 11 5.67041C8.61004 5.67041 6.67004 7.61041 6.67004 10.0004ZM8.17004 10.0004C8.17004 8.44041 9.44004 7.17041 11 7.17041C12.56 7.17041 13.83 8.44041 13.83 10.0004C13.83 11.5604 12.56 12.8304 11 12.8304C9.44004 12.8304 8.17004 11.5604 8.17004 10.0004Z">
                                                </path>
                                            </g>
                                        </svg>
                                        <span>Sản phẩm đã xem</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="main-infor-user">
                            <h1>TẤT CẢ ĐƠN HÀNG</h1>
                            <?php if (empty($listDonHang)) : ?>
                                <div class="empty-state">
                                    <div class="empty-box">
                                        <img src="Common/assets/image/EmptyOrder.a0f66ce0.svg" alt="">
                                    </div>
                                    <p>Đơn hàng trống</p>
                                </div>
                            <?php else : ?>
                                <div class="list-order">
                                    <table>
                                        <thead>
                                            <th>Mã đơn hàng</th>
                                            <th>Ngày đặt</th>
                                            <th>Phương thức thanh toán</th>
                                            <th>Trạng thái</th>
                                            <th>Thao tác</th>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($listDonHang as $itemDonHang) : ?>
                                                <tr>
                                                    <td><?= $itemDonHang['ma_don_hang'] ?></td>
                                                    <td><?= $itemDonHang['ngay_dat'] ?></td>
                                                    <td>
                                                        <?php if ($itemDonHang['phuong_thuc_thanh_toan_id'] == 1): ?>
                                                            <span class="payment-method <?= "normal" ?>">
                                                                Thanh toán COD
                                                            </span>
                                                        <?php else: ?>
                                                            <span class="payment-method <?= "banking" ?>">
                                                                Thanh Toán banking
                                                            </span>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td>
                                                        <?php if ($itemDonHang['ten_trang_thai'] == "Hủy đơn"): ?>
                                                            <span class="status danger"><?= $itemDonHang['ten_trang_thai']  ?></span>
                                                        <?php else: ?>
                                                            <span class="status pending"><?= $itemDonHang['ten_trang_thai']  ?></span>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td><a href="<?= BASE_URL . '?act=chi-tiet-don-hang&don_hang_id=' . $itemDonHang['id'] ?>" class="detail-link">Chi tiết</a></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                    <div id="pagination">
                                        <button class="page-arrow prev" disabled>&laquo;</button>
                                        <div class="page-numbers"></div>
                                        <button class="page-arrow next">&raquo;</button>
                                    </div>

                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <?php require_once "./Views/layout/footer.php" ?>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const rowsPerPage = 6; // Số dòng mỗi trang
            const tableBody = document.querySelector("tbody");
            const rows = tableBody.querySelectorAll("tr");
            const pagination = document.getElementById("pagination");
            const pageNumbers = pagination.querySelector(".page-numbers");
            const prevButton = pagination.querySelector(".prev");
            const nextButton = pagination.querySelector(".next");

            const totalPages = Math.ceil(rows.length / rowsPerPage);
            let currentPage = 1;

            // Hiển thị các dòng dựa trên trang hiện tại
            function displayRows(page) {
                const startIndex = (page - 1) * rowsPerPage;
                const endIndex = page * rowsPerPage;

                rows.forEach((row, index) => {
                    if (index >= startIndex && index < endIndex) {
                        row.style.display = ""; // Hiện dòng
                    } else {
                        row.style.display = "none"; // Ẩn dòng
                    }
                });
            }

            // Tạo nút phân trang
            function setupPagination() {
                pageNumbers.innerHTML = "";

                for (let i = 1; i <= totalPages; i++) {
                    const button = document.createElement("button");
                    button.textContent = i;
                    button.className = "page-btn";
                    if (i === currentPage) {
                        button.classList.add("active");
                    }

                    button.addEventListener("click", function() {
                        currentPage = i;
                        updatePagination();
                    });

                    pageNumbers.appendChild(button);
                }
            }

            // Cập nhật trạng thái nút và hiển thị dòng
            function updatePagination() {
                displayRows(currentPage);

                // Xóa active khỏi tất cả các nút
                document.querySelectorAll(".page-btn").forEach((btn) => {
                    btn.classList.remove("active");
                });

                // Đánh dấu nút hiện tại là active
                const activeButton = pageNumbers.querySelector(`.page-btn:nth-child(${currentPage})`);
                if (activeButton) activeButton.classList.add("active");

                // Bật hoặc tắt nút mũi tên
                prevButton.disabled = currentPage === 1;
                nextButton.disabled = currentPage === totalPages;
            }

            // Xử lý sự kiện cho nút mũi tên
            prevButton.addEventListener("click", function() {
                if (currentPage > 1) {
                    currentPage--;
                    updatePagination();
                }
            });

            nextButton.addEventListener("click", function() {
                if (currentPage < totalPages) {
                    currentPage++;
                    updatePagination();
                }
            });

            displayRows(currentPage);
            setupPagination();
            updatePagination();
        });
    </script>
</body>

</html>