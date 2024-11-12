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
        $productByCate = $this->modelHomeClient->getAllSanPhamClient();
        $listProductsSale = $this->modelHomeClient->productsSale();
        $listSanPhamByView = $this->modelHomeClient->getAllProductsByView();
        require_once('./Views/home.php');
    }

    public function filterCateByHome()
    {
        $listDanhMuc = $this->modelSanPham->getAllDanhMuc();
        $listProductsSale = $this->modelHomeClient->productsSale();
        $listSanPhamByView = $this->modelHomeClient->getAllProductsByView();
        $danh_muc_id = $_GET['id_danh_muc'] ?? null;
        // var_dump($danh_muc_id);
        // die;
        if ($danh_muc_id) {
            $productByCate = $this->modelSanPham->sanPhamTheoDanhMuc($danh_muc_id);
        } else {
            $productByCate = $this->modelHomeClient->getAllSanPhamClient();
        }
        require_once('./Views/home.php');
    }

    public function  chiTietSanPham()
    {
        $id = $_GET['id_san_pham'];
        $sanPham = $this->modelSanPham->getDetailSanPham($id);
        $listDanhMuc = $this->modelSanPham->getAllDanhMuc();

        $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);
        // $listBinhLuan = $this->modelSanPham->getBinhLuanFromSanPham($id);
        $listSanPhamCungDanhMuc = $this->modelSanPham->getListSanPhamdDanhMuc($sanPham['id'], $sanPham['danh_muc_id']);
        // var_dump($listSanPhamCungDanhMuc);die();

        if (isset($sanPham)) {
            require_once './Views/detailSanPham.php';
        } else {
            header("Location: " . BASE_URL);
            exit();
        }
    }

    public function sanPhamDanhMuc()
    {
        $listDanhMuc = $this->modelSanPham->getAllDanhMuc();
        if (isset($_GET['danh_muc_id']) && $_GET['danh_muc_id'] > 0) {
            $iddm = $_GET['danh_muc_id'];
            $sanPhamByDanhMuc = $this->modelSanPham->sanPhamTheoDanhMuc($iddm);
            // var_dump($spdm);die();


            $listDanhMuc = $this->modelSanPham->getAllDanhMuc();
            //    var_dump($listDanhMuc);die();
            require_once './Views/categorySanPham.php';
        } else {
            header("Location: " . BASE_URL);
        }
    }
}