<?php
class HomeAdminsControllers
{
    public $modelDonHang;
    public $modelTrangChuAdmin;
    public $modelSanPham;
    public $modelBinhLuan;
    public $modelTaiKhoan;
    public function __construct()
    {
        $this->modelDonHang = new AdminDonHang();
        $this->modelTrangChuAdmin = new AdminTrangChu();
        $this->modelSanPham = new AdminSanPham();
        $this->modelBinhLuan = new AdminBinhLuan();
        $this->modelTaiKhoan = new AdminTaiKhoan();
    }
    public function HomeIndex()
    {
        $listDonHang = count($this->modelDonHang->getAllDonHang());
        $listSanPham = count($this->modelSanPham->getAllSanPham());
        $listBinhLuanSanPham = count($this->modelBinhLuan->getAllBinhLuan());
        $tongDoanhThu = $this->modelTrangChuAdmin->getTongDoanhThu();
        $listTaiKhoan = $this->modelTaiKhoan->getAllTaiKhoan(2, 5);
        $listThongKe = $this->modelTrangChuAdmin->getAllThongKe();
        // var_dump($listThongKe);
        // die;
        require_once './Views/HomeAdmins.php';
    }
}
