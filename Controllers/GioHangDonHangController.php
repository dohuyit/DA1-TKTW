<?php
class GioHangDonHangController
{
    public $modelSanPham;
    public $modelTaiKhoan;
    public $modelGioHang;
    public $modelDonHang;


    public function __construct()
    {
        $this->modelSanPham = new SanPham();
        $this->modelTaiKhoan = new TaiKhoan();
        $this->modelGioHang = new GioHang();
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

                $san_pham_ids = $_POST['san_pham_id']; // 123
                $so_luongs = $_POST['so_luong']; // 456

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



    public function xoaItemGioHang()
    {
        $chi_tiet_gio_hang_id = $_GET['chi_tiet_gio_hang_id'];
        $xoa = $this->modelGioHang->deleteSanPhamGioHang($chi_tiet_gio_hang_id);
        header('location:' . BASE_URL . '?act=gio-hang');
    }
}
