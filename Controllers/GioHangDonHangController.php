<?php
class GioHangDonHangController
{
    public $modelSanPham;
    public $modelTaiKhoan;
    public $modelGioHang;
    public $modelDonHang;
    public $modelHomeClient;


    public function __construct()
    {
        $this->modelSanPham = new SanPham();
        $this->modelTaiKhoan = new TaiKhoan();
        $this->modelGioHang = new GioHang();
        $this->modelDonHang = new DonHang();
        $this->modelHomeClient = new TrangChuClient();
    }

    public function addGioHang()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_SESSION['user_client'])) {
                $mail = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']['email']);
                // var_dump($mail['id']);
                // die();

                // lẤy dl giỏ hàng
                $gioHang = $this->modelGioHang->getGioHangFromUser($mail['id']);
                // var_dump($gioHang);
                // die;
                if (!$gioHang) {
                    $gioHangId = $this->modelGioHang->addGioHang($mail['id']);
                    // var_dump($gioHangId);
                    // die;
                    $gioHang = ['id' => $gioHangId];
                    $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
                    // var_dump($chiTietGioHang);
                    // die;
                } else {
                    $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
                    // var_dump($chiTietGioHang);
                    // die;
                }

                $san_pham_id = $_POST['san_pham_id'];
                $so_luong = $_POST['so_luong'];

                // var_dump($_POST['san_pham_id']);
                // var_dump($_POST['so_luong']);
                // die;


                $checkSanPham = false;
                foreach ($chiTietGioHang as $detail) {
                    if ($detail['san_pham_id'] == $san_pham_id) {
                        $newSoLuong = $detail['so_luong'] + $so_luong;
                        $this->modelGioHang->updateSoLuong($gioHang['id'], $san_pham_id, $newSoLuong);
                        $checkSanPham = true;
                        break;
                    }
                }
                if (!$checkSanPham) {
                    $this->modelGioHang->addDetailGioHang($gioHang['id'], $san_pham_id, $so_luong);
                }

                $_SESSION['products-cart'] = count($chiTietGioHang);

                header('Location:' . BASE_URL . '?act=gio-hang');
            } else {
                header('Location:' . BASE_URL . '?act=form-login');
            }
        }
    }

    public function gioHang()
    {
        $listDanhMuc = $this->modelSanPham->getAllDanhMuc();

        if (isset($_SESSION['user_client'])) {
            $mail = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']['email']);

            $gioHang = $this->modelGioHang->getGioHangFromUser($mail['id']);
            if (!$gioHang) {
                $gioHangId = $this->modelGioHang->addGioHang($mail['id']);
                // var_dump($gioHangId);
                // die();

                $gioHang = ['id' => $gioHangId];
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
                // var_dump($chiTietGioHang);
                // die();
            } else {
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
                // var_dump($chiTietGioHang);
                // die();
            }
            $listSanPhamByView = $this->modelHomeClient->getAllProductsByView();
            $_SESSION['products-cart'] = count($chiTietGioHang);

            require_once './Views/gioHang.php';
        } else {
            header('Location:' . BASE_URL . '?act=form-login');
        }
    }

    public function updateGioHang()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_SESSION['user_client'])) {
                $mail = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']['email']);
                $gioHang = $this->modelGioHang->getGioHangFromUser($mail['id']);

                if (!$gioHang) {
                    $gioHangId = $this->modelGioHang->addGioHang($mail['id']);
                    $gioHang = ['id' => $gioHangId];
                }

                $san_pham_ids = $_POST['san_pham_id'];
                $so_luongs = $_POST['so_luong'];

                foreach ($san_pham_ids as $index => $san_pham_id) {
                    $so_luong = $so_luongs[$index];

                    if ($so_luong > 0) {
                        $this->modelGioHang->updateSoLuong($gioHang['id'], $san_pham_id, $so_luong);
                    }
                }


                // Chuyển hướng về giỏ hàng
                header('Location:' . BASE_URL . '?act=gio-hang');
                exit();
            } else {
                header('Location:' . BASE_URL . '?act=form-login');
                exit();
            }
        }
    }


    public function thanhToan()
    {
        // deleteSessionErrors();
        $listDanhMuc = $this->modelSanPham->getAllDanhMuc();

        if (isset($_SESSION['user_client'])) {
            $user = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']['email']);

            $gioHang = $this->modelGioHang->getGioHangFromUser($user['id']);
            if (!$gioHang) {
                $gioHangId = $this->modelGioHang->addGioHang($user['id']);
                $gioHang = ['id' => $gioHangId];
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
            } else {
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
            }
            require_once './Views/datHang.php';
        } else {
            header('Location:' . BASE_URL . '?act=form-login');
        }
    }

    public function postThanhToan()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ten_nguoi_nhan = $_POST['ten_nguoi_nhan'];
            $email_nguoi_nhan = $_POST['email_nguoi_nhan'];
            $sdt_nguoi_nhan = $_POST['sdt_nguoi_nhan'];
            $dia_chi = $_POST['dia_chi'];
            $ghi_chu = $_POST['ghi_chu'];
            $tong_tien = $_POST['tong_tien'];
            $phuong_thuc_thanh_toan_id = $_POST['phuong_thuc_thanh_toan_id'];
            $ngay_dat = date('Y-m-d');
            $trang_thai_id = 1;
            $ma_don_hang = 'BK' . rand(1000, 9999);

            // Lấy thông tin tài khoản người dùng
            $user = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']['email']);
            $tai_khoan_id = $user['id'];

            // Lấy thông tin giỏ hàng
            $gioHang = $this->modelGioHang->getGioHangFromUser($user['id']);
            $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);

            // Thêm đơn hàng vào database
            $donHangId = $this->modelDonHang->addDonHang($tai_khoan_id, $ten_nguoi_nhan, $email_nguoi_nhan, $sdt_nguoi_nhan, $dia_chi, $ghi_chu, $tong_tien, $phuong_thuc_thanh_toan_id, $ngay_dat, $ma_don_hang, $trang_thai_id);

            if ($donHangId) {
                // Thêm chi tiết đơn hàng
                foreach ($chiTietGioHang as $sanPham) {
                    $don_gia = $sanPham['gia_khuyen_mai'] > 0 ? $sanPham['gia_khuyen_mai'] : $sanPham['gia_san_pham'];
                    $tongTien = $don_gia * $sanPham['so_luong'];
                    $this->modelDonHang->addDetailDonHang($donHangId, $sanPham['san_pham_id'], $don_gia, $sanPham['so_luong'], $tongTien);
                }

                // Lấy thông tin đơn hàng để gửi mail
                $thongTinDonHang = $this->modelDonHang->getAllDonHang($donHangId);

                // Tạo nội dung email
                $subject = mb_encode_mimeheader('Xác nhận đơn hàng: ' . $ma_don_hang . '', 'UTF-8');
                $content = "<h2>Cảm ơn bạn đã đặt hàng tại cửa hàng của chúng tôi!</h2>";
                $content .= "<p>Mã đơn hàng: <strong>{$ma_don_hang}</strong></p>";
                $content .= "<p>Tên người nhận: {$ten_nguoi_nhan}</p>";
                $content .= "<p>Email: {$email_nguoi_nhan}</p>";
                $content .= "<p>Số điện thoại: {$sdt_nguoi_nhan}</p>";
                $content .= "<p>Địa chỉ giao hàng: {$dia_chi}</p>";
                $content .= "<p>Tổng tiền: <strong>" . formatPrice($tong_tien) . "</strong></p>";
                $content .= "<h3>Chi tiết đơn hàng:</h3>";
                $content .= "<table border='1' cellspacing='0' cellpadding='10' style='width: 100%; border-collapse: collapse;'>";
                $content .= "<tr><th>Sản phẩm</th><th>Số lượng</th><th>Đơn giá</th><th>Thành tiền</th></tr>";

                foreach ($chiTietGioHang as $sanPham) {
                    $don_gia = $sanPham['gia_khuyen_mai'] > 0 ? $sanPham['gia_khuyen_mai'] : $sanPham['gia_san_pham'];
                    $thanhTien = $don_gia * $sanPham['so_luong'];
                    $content .= "<tr>
                    <td>{$sanPham['ten_san_pham']}</td>
                    <td>{$sanPham['so_luong']}</td>
                    <td>" . formatPrice($don_gia) . "</td>
                    <td>" . formatPrice($thanhTien) . "</td>
                </tr>";
                }
                $content .= "</table>";
                $content .= "<p>Chúng tôi sẽ sớm giao hàng đến cho bạn. Xin cảm ơn!</p>";

                // Gửi email xác nhận
                sendMail($email_nguoi_nhan, $subject, $content);

                // Thông báo đặt hàng thành công và chuyển hướng
                $_SESSION['flash'] = true;
                $_SESSION['dat_hang_thanh_cong'] = 'Đã đặt hàng thành công! Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi';
                header('Location:' . BASE_URL . '?act=da-dat-hang');
                exit();
            }
        }
    }


    public function daDatHang()
    {
        require_once './Views/hoanThanhDonHang.php';
    }

    public function xoaItemGioHang()
    {
        $chi_tiet_gio_hang_id = $_GET['chi_tiet_gio_hang_id'];
        $xoa = $this->modelGioHang->deleteSanPhamGioHang($chi_tiet_gio_hang_id);
        header('location:' . BASE_URL . '?act=gio-hang');
    }
}
