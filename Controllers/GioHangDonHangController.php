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

                $_SESSION['alert'] = [
                    'title' => 'Success',
                    'message' => 'Thêm giỏ hàng thành công!',
                    'type' => 'success',
                    'redirect' => BASE_URL . '?act=gio-hang',
                ];
                showAlert();
                exit();
            } else {
                header('Location:' . BASE_URL . '?act=form-login');
            }
        }
    }

    // hiển thị giỏ hàng
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


                $_SESSION['alert'] = [
                    'title' => 'Success',
                    'message' => 'Cập nhật giỏ hàng thành công!',
                    'type' => 'success',
                    'redirect' => BASE_URL . '?act=gio-hang',
                ];
                showAlert();
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

    public function thanhToanVNPAY($ma_don_hang, $tong_tien)
    {
        // code vnpay test
        error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
        date_default_timezone_set('Asia/Ho_Chi_Minh');

        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = BASE_URL . '?act=da-dat-hang';
        $vnp_TmnCode = "Q6MJK2QF"; //Mã website tại VNPAY 
        $vnp_HashSecret = "0UULYG2REHGOG3NCGDO2YNZK9FFHTQBK"; //Chuỗi bí mật

        $vnp_TxnRef = $ma_don_hang;
        $vnp_OrderInfo = "Nội dung thanh toán";
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = $tong_tien * 100;
        $vnp_Locale = 'vn';
        $vnp_BankCode = 'NCB';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }

        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }

        // dữ liệu trả về
        $returnData = array(
            'code' => '00',
            'message' => 'success',
            'data' => $vnp_Url
        );

        if (isset($_POST['redirect'])) {
            echo json_encode($returnData);
            die;
        } else {
            header('Location: ' . $vnp_Url);
            die();
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
            // echo "<pre>";
            // var_dump($chiTietGioHang);
            // echo "</pre>";
            // die;

            if ($phuong_thuc_thanh_toan_id == 2) {

                $donHangId = $this->modelDonHang->addDonHang($tai_khoan_id, $ten_nguoi_nhan, $email_nguoi_nhan, $sdt_nguoi_nhan, $dia_chi, $ghi_chu, $tong_tien, $phuong_thuc_thanh_toan_id, $ngay_dat, $ma_don_hang, $trang_thai_id);

                $this->modelGioHang->clearCart($user['id']);
                unset($_SESSION['products-cart']);
                if ($donHangId) {
                    foreach ($chiTietGioHang as $sanPham) {
                        $don_gia = $sanPham['gia_khuyen_mai'] > 0 ? $sanPham['gia_khuyen_mai'] : $sanPham['gia_san_pham'];
                        $tongTien = $don_gia * $sanPham['so_luong'];
                        $this->modelDonHang->addDetailDonHang($donHangId, $sanPham['san_pham_id'], $don_gia, $sanPham['so_luong'], $tongTien);
                    }

                    $this->thanhToanVNPAY($ma_don_hang, $tong_tien);
                }
            }



            $donHangId = $this->modelDonHang->addDonHang($tai_khoan_id, $ten_nguoi_nhan, $email_nguoi_nhan, $sdt_nguoi_nhan, $dia_chi, $ghi_chu, $tong_tien, $phuong_thuc_thanh_toan_id, $ngay_dat, $ma_don_hang, $trang_thai_id);

            if ($donHangId) {
                // Thêm chi tiết đơn hàng
                foreach ($chiTietGioHang as $sanPham) {
                    $don_gia = $sanPham['gia_khuyen_mai'] > 0 ? $sanPham['gia_khuyen_mai'] : $sanPham['gia_san_pham'];
                    $tongTien = $don_gia * $sanPham['so_luong'];
                    $this->modelDonHang->addDetailDonHang($donHangId, $sanPham['san_pham_id'], $don_gia, $sanPham['so_luong'], $tongTien);
                }

                $this->modelGioHang->clearCart($user['id']);
                unset($_SESSION['products-cart']);
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

                sendMail($email_nguoi_nhan, $subject, $content);


                // Thông báo đặt hàng thành công và chuyển hướng
                $_SESSION['flash'] = true;
                header('Location:' . BASE_URL . '?act=da-dat-hang');
                exit();
            }
        }
    }

    public function xuLyThanhToanVNPAY()
    {
        $vnp_TxnRef = $_GET['vnp_TxnRef']; // Mã đơn hàng
        $vnp_TransactionNo = 'VNP' . $_GET['vnp_TransactionNo']; // Mã giao dịch của VNPAY
        $vnp_ResponseCode = $_GET['vnp_ResponseCode'];
        // var_dump($vnp_TransactionNo);
        // die;
        $vnp_Amount = $_GET['vnp_Amount']; // Số tiền đã thanh toán (đơn vị: VND)
        $vnp_BankCode = $_GET['vnp_BankCode']; // Mã ngân hàng


        $donHang = $this->modelDonHang->getDonHangByMaDonHang($vnp_TxnRef);
        // var_dump($donHang);
        // die;


        if ($vnp_ResponseCode == "00") {
            $this->modelDonHang->updateThanhToanOnline($donHang['id'], $vnp_TransactionNo, 2);
            sendMail($donHang['email_nguoi_nhan'], mb_encode_mimeheader("Bạn đã thanh toán thành công"), "Vui lòng theo dõi thời gian và nhận hàng");

            header("Location: " . BASE_URL . "?act=da-dat-hang");
            exit();
        } else {
            $this->modelDonHang->updateThanhToanOnline($donHang['id'], $vnp_TransactionNo, 1);

            $_SESSION['thong_bao'] = 'Thanh toán thất bại';
            header("Location: " . BASE_URL . "?act=thong-tin-don-hang");
            exit();
        }
    }

    public function daDatHang()
    {
        if (isset($_GET['vnp_TxnRef']) && isset($_GET['vnp_TransactionNo']) && isset($_GET['vnp_ResponseCode'])) {
            $this->xuLyThanhToanVNPAY();
        } else {

            $listDanhMuc = $this->modelSanPham->getAllDanhMuc();
            require_once './Views/hoanThanhDonHang.php';
        }
    }

    public function thongTinDonHang()
    {
        $listDanhMuc = $this->modelSanPham->getAllDanhMuc();

        $user = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']['email']);
        $tai_khoan_id = $user['id'];
        $listDonHang = $this->modelDonHang->getAllDonHang($tai_khoan_id);
        // var_dump($listDonHang);
        // die;
        require_once './Views/thongTinDonHang.php';
    }

    public function chiTietDonHang()
    {
        $listDanhMuc = $this->modelSanPham->getAllDanhMuc();
        $id_don_hang = $_GET['don_hang_id'];
        $donHangInfor = $this->modelDonHang->getAllDonHang($tai_khoan_id = null, $id_don_hang);
        $trangThaiDonHang = $donHangInfor[0]['trang_thai_id'];
        $trangThaiThanhToan = $donHangInfor[0]['trang_thai_thanh_toan'];
        // echo "<pre>";
        // var_dump($donHangInfor);
        // echo "</pre>";
        // die;
        $DetailDonHang = $this->modelDonHang->getDetailDonHang($id_don_hang);
        // var_dump($DetailDonHang);
        // die;
        require_once './Views/chiTietDonHang.php';
    }

    public function xoaItemGioHang()
    {
        $chi_tiet_gio_hang_id = $_GET['chi_tiet_gio_hang_id'];
        $xoa = $this->modelGioHang->deleteSanPhamGioHang($chi_tiet_gio_hang_id);
        header('location:' . BASE_URL . '?act=gio-hang');
    }

    public function huyDonHang()
    {
        if (isset($_SESSION['user_client'])) {
            // lấy ra thông tin tài khẩn đăng nhập
            $user = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']['email']);
            $tai_khoan_id = $user['id'];
            // var_dump($tai_khoan_id);
            // die;
            $donHangId = $_GET['id'];

            $donHang = $this->modelDonHang->getAllDonHang($tai_khoan_id = null, $donHangId);

            // var_dump($donHang);
            // die;

            if ($donHang[0]['trang_thai_id'] != 1) {
                echo "Chỉ đơn hàng ở trạng thái 'Chưa xác nhận mới có thể hủy'";
                exit;
            }

            // hủy đơn hàng 
            $this->modelDonHang->updateTrangThaiDonHang($donHangId, 11);
            header("location: " . BASE_URL . '?act=thong-tin-don-hang');
            exit;
        } else {
            // var_dump('Bạn chưa đăng  nhập');
            header("location: " . BASE_URL . 'login');
            die;
        }
    }
}
