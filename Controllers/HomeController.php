<?php
class Homecontroller
{
    public $modelSanPham;
    public function __construct()
    {
        $this->modelSanPham = new SanPham();
    }

    public function home()
    {
        // $listDanhMuc = $this->modelSanPham->getAllDanhMuc();

        // $listtop10 = $this->modelSanPham->top10();

        // $listSanPham = $this->modelSanPham->getAllSanPham();
        require_once('./views/home.php');
    }
}
