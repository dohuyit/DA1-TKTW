<?php
session_start();

// Require file Common
require_once './Common/env.php'; // Khai báo biến môi trường

require_once './Common/PHPMailer/src/Exception.php'; // các hàm của thư viện php
require_once './Common/PHPMailer/src/PHPMailer.php';
require_once './Common/PHPMailer/src/SMTP.php';
require_once './Common/PDO.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './Controllers/HomeController.php';
require_once './Controllers/TaikhoanController.php';
require_once './Controllers/GioHangDonHangController.php';

// Require toàn bộ file Models
require_once './Models/TrangChu.php';
require_once './Models/SanPham.php';
require_once './Models/BinhLuan.php';
require_once './Models/TaiKhoan.php';
require_once './Models/GioHang.php';
require_once './Models/DonHang.php';



// Route
$act = $_GET['act'] ?? '/';

// sendMail("huydonganh2005@gmail.com", "Chào mừng bạn", "Chào bạn");

match ($act) {
    // route
    '/' => (new HomeController())->home(),
    "productCate" => (new Homecontroller)->filterCateByHome(),
    'tim-kiem' => (new HomeController())->timKiem(),

    // route auth
    'form-login' => (new TaikhoanController())->formLogin(),
    'check-login' => (new TaikhoanController())->postLogin(),
    'logout' => (new TaiKhoanController())->logout(),
    'form-register' => (new TaiKhoanController())->formRegister(),
    'register' => (new TaiKhoanController())->postRegister(),

    // Sản phẩm
    'chi-tiet-san-pham' => (new HomeController())->chiTietSanPham(),
    'san-pham-theo-danh-muc' => (new HomeController())->sanPhamDanhMuc(),
    'gui-binh-luan' => (new HomeController())->guiBinhLuan(),

    // route giỏ hàng
    'them-gio-hang' => (new GioHangDonHangController)->addGioHang(),
    'gio-hang' => (new GioHangDonHangController)->gioHang(),
    'cap-nhat-gio-hang' => (new GioHangDonHangController)->updateGioHang(),
    'xoa-san-pham-gio-hang' => (new GioHangDonHangController)->xoaItemGioHang(),

    'thanh-toan' => (new GioHangDonHangController)->thanhToan(),
    'xu-ly-thanh-toan' => (new GioHangDonHangController())->postThanhToan(),
    'da-dat-hang' => (new GioHangDonHangController)->daDatHang(),
};
