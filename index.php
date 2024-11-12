<?php
session_start();

// Require file Common
require_once './Common/env.php'; // Khai báo biến môi trường
require_once './Common/PDO.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './Controllers/HomeController.php';
require_once './Controllers/TaikhoanController.php';
require_once './Controllers/GioHangDonHangController.php';

// Require toàn bộ file Models
require_once './Models/TrangChu.php';
require_once './Models/SanPham.php';
require_once './Models/TaiKhoan.php';
require_once './Models/GioHang.php';



// Route
$act = $_GET['act'] ?? '/';


match ($act) {
    // route
    '/' => (new HomeController())->home(),
    "productCate" => (new Homecontroller)->filterCateByHome(),

    // route auth
    'form-login' => (new TaikhoanController())->formLogin(),
    'check-login' => (new TaikhoanController())->postLogin(),
    'logout' => (new TaiKhoanController())->logout(),
    'form-register' => (new TaiKhoanController())->formRegister(),
    'register' => (new TaiKhoanController())->postRegister(),

    // Sản phẩm
    'chi-tiet-san-pham' => (new HomeController())->chiTietSanPham(),
    'san-pham-theo-danh-muc' => (new HomeController())->sanPhamDanhMuc(),
    //    'gui-binh-luan' =>(new HomeController())->guiBinhLuan(),

    // route giỏ hàng
    'them-gio-hang' => (new GioHangDonHangController)->addGioHang(),
    'gio-hang' => (new GioHangDonHangController)->gioHang(),
};
