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
        // $listDanhMuc = $this->modelSanPham->getAllDanhMuc();

        $listProductsSale = $this->modelHomeClient->productsSale();

        // $listSanPham = $this->modelSanPham->getAllSanPham();
        require_once('./Views/home.php');
    }
}
