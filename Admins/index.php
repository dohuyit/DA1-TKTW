<?php
session_start();
// Require file Common
require_once '../Common/env.php'; // Khai báo biến môi trường
require_once '../Common/PDO.php'; // Hàm hỗ trợ


// Require toàn bộ file Controllers
require_once './Controllers/ControllersDanhMuc.php';
require_once './Controllers/ControllersSanPham.php';
require_once './Controllers/ControllersHome.php';
require_once './Controllers/ControllersTaiKhoan.php';
require_once './Controllers/ControllersDonHang.php';

// Require toàn bộ file Models
require_once './Models/AdminDanhMuc.php';
require_once './Models/AdminSanPham.php';
require_once './Models/AdminDonHang.php';
require_once './Models/AdminTaiKhoan.php';

// Route
$act = $_GET['act'] ?? '/';

if ($act !== 'login-admin' && $act !== 'check-login-admin' && $act !== 'logout-admin' && $act !== 'view-logout') {
    checkLoginAdmin();
}
match ($act) {
    '/' => (new HomeAdminsControllers())->HomeIndex(),

    // route danh mục
    'danh-muc' => (new AdminDanhMucController())->danhSachDanhMuc(),
    'form-them-danh-muc' => (new AdminDanhMucController())->formAddDanhMuc(),
    'them-danh-muc' => (new AdminDanhMucController())->postAddDanhMuc(),
    'form-sua-danh-muc' => (new AdminDanhMucController())->formEditDanhMuc(),
    'sua-danh-muc' => (new AdminDanhMucController())->postEditDanhMuc(),
    'xoa-danh-muc' => (new AdminDanhMucController())->deleteDanhMuc(),

    // route san pham
    'san-pham' => (new AdminSanPhamController())->danhsachSanPham(),
    'form-them-san-pham' => (new AdminSanPhamController())->formAddSanPham(),
    'them-san-pham' => (new AdminSanPhamController())->postAddSanPham(),
    'form-sua-san-pham' => (new AdminSanPhamController())->formEditSanPham(),
    'sua-san-pham' => (new AdminSanPhamController())->postEditSanPham(),
    'xoa-san-pham' => (new AdminSanPhamController())->deleteSanPham(),
    'sua-album-anh-san-pham' => (new AdminSanPhamController())->postEditAnhSanPham(),

    // route don hang
    'don-hang' => (new AdminDonHangController())->danhSachDonHang(),
    'chi-tiet-don-hang' => (new AdminDonHangController())->detailDonHang(),
    'form-sua-don-hang' => (new AdminDonHangController())->formEditDonHang(),
    'sua-don-hang' => (new AdminDonHangController())->postEditDonHang(),
    'chi-tiet-don-hang' => (new AdminDonHangController())->detailDonHang(),

    // route quản lý tài khoản
    // Quản lý tài khoản quản trị
    'list-tai-khoan-quan-tri' => (new AdminTaiKhoanController)->danhSachQuanTri(),
    'form-them-quan-tri' => (new AdminTaiKhoanController)->formAddQuanTri(),
    'them-quan-tri' => (new AdminTaiKhoanController)->postAddQuanTri(),
    'form-sua-quan-tri' => (new AdminTaiKhoanController)->formEditQuanTri(),
    'sua-quan-tri' => (new AdminTaiKhoanController)->postEditQuanTri(),

    // route reset password tài khoản
    'reset-pass' => (new AdminTaiKhoanController)->resetPassword(),

    // Quản lý tài khoản khách hàng
    'list-tai-khoan-khach-hang' => (new AdminTaiKhoanController)->danhSachKhachHang(),
    'form-sua-khach-hang' => (new AdminTaiKhoanController)->formEditKhachHang(),
    'sua-khach-hang' => (new AdminTaiKhoanController)->postEditKhachHang(),
    'chi-tiet-khach-hang' => (new AdminTaiKhoanController)->detailKhachHang(),


    // route auth
    'login-admin' => (new AdminTaiKhoanController)->formLogin(),
    'check-login-admin' => (new AdminTaiKhoanController)->login(),

    'logout-admin' => (new AdminTaiKhoanController)->logout(),
    'view-logout' => (new AdminTaiKhoanController)->tabLogout()
};
