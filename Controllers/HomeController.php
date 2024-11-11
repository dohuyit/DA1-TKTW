<?php
class Homecontroller
{
    public $modelSanPham;
    public $modelHomeClient;

    public function __construct()
    {
        $this->modelSanPham = new SanPham();
        $this->modelHomeClient = new TrangChuClient();
    }

    public function home()
    {
        $listDanhMuc = $this->modelSanPham->getAllDanhMuc();
        // var_dump($listDanhMuc);
        // die;
        $danh_muc_id = $_GET['id_danh_muc'] ?? null;
        $productByCate = $this->modelSanPham->sanPhamTheoDanhMuc($danh_muc_id);
        $listProductsSale = $this->modelHomeClient->productsSale();
        $listSanPhamByView = $this->modelHomeClient->getAllProductsByView();
        require_once('./Views/home.php');
    }
}
