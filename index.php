<?php
session_start();

// Require file Common
require_once './Common/env.php'; // Khai báo biến môi trường
require_once './Common/PDO.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './Controllers/HomeController.php';
require_once './Controllers/SanPhamController.php';

// Require toàn bộ file Models
require_once './Models/TrangChu.php';
require_once './Models/SanPham.php';



// Route
$act = $_GET['act'] ?? '/';


match ($act) {
    // route
    '/' => (new HomeController())->home(),
};
