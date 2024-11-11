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
        var_dump('abc');

        $listProductsSale = $this->modelHomeClient->productsSale();

        // $listSanPham = $this->modelSanPham->getAllSanPham();
        require_once('./Views/home.php');
    }
}
