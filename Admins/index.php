<?php
session_start();
// Require file Common
require_once '../Common/env.php'; // Khai báo biến môi trường
require_once '../Common/PDO.php'; // Hàm hỗ trợ


// Require toàn bộ file Controllers
require_once './Controllers/ControllersDanhMuc.php';
require_once './Controllers/ControllersHome.php';

// Require toàn bộ file Models
require_once './Models/AdminDanhMuc.php';

// Route
$act = $_GET['act'] ?? '/';
// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    // route danh mục
    /*route báo cáo thống kê- trang chủ*/
    '/' => (new HomeAdminsControllers())->HomeIndex(),
    'danh-muc' => (new AdminDanhMucController())->danhSachDanhMuc(),
    'form-them-danh-muc' => (new AdminDanhMucController())->formAddDanhMuc(),
    'them-danh-muc' => (new AdminDanhMucController())->postAddDanhMuc(),
    'form-sua-danh-muc' => (new AdminDanhMucController())->formEditDanhMuc(),
    'sua-danh-muc' => (new AdminDanhMucController())->postEditDanhMuc(),
    'xoa-danh-muc' => (new AdminDanhMucController())->deleteDanhMuc(),
};
