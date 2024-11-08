<?php
session_start();
// Require file Common
require_once '../Common/env.php'; // Khai báo biến môi trường
require_once '../Common/PDO.php'; // Hàm hỗ trợ


// Require toàn bộ file Controllers
require_once './Controllers/ControllersDanhMuc.php';
require_once './Controllers/ControllersSanPham.php';
require_once './Controllers/ControllersHome.php';

// Require toàn bộ file Models
require_once './Models/AdminDanhMuc.php';
require_once './Models/AdminSanPham.php';

// Route
$act = $_GET['act'] ?? '/';
match ($act) {
    '/' => (new HomeAdminsControllers())->HomeIndex(),

    // route danh mục
    'danh-muc' => (new AdminDanhMucController())->danhSachDanhMuc(),
    'form-them-danh-muc' => (new AdminDanhMucController())->formAddDanhMuc(),
    'them-danh-muc' => (new AdminDanhMucController())->postAddDanhMuc(),
    'form-sua-danh-muc' => (new AdminDanhMucController())->formEditDanhMuc(),
    'sua-danh-muc' => (new AdminDanhMucController())->postEditDanhMuc(),
    'xoa-danh-muc' => (new AdminDanhMucController())->deleteDanhMuc(),

    // route danh mục
    'san-pham' => (new AdminSanPhamController())->danhsachSanPham(),
    'form-them-san-pham' => (new AdminSanPhamController())->formAddSanPham(),
    'them-san-pham' => (new AdminSanPhamController())->postAddSanPham(),
    'form-sua-san-pham' => (new AdminSanPhamController())->formEditSanPham(),
    'sua-san-pham' => (new AdminSanPhamController())->postEditSanPham(),
    'xoa-san-pham' => (new AdminSanPhamController())->deleteSanPham(),
    'sua-album-anh-san-pham' => (new AdminSanPhamController())->postEditAnhSanPham(),
};
