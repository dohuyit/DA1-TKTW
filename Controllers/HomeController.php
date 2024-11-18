<?php
class Homecontroller
{
    public $modelSanPham;
    public $modelBinhLuan;
    public $modelHomeClient;

    public function __construct()
    {
        $this->modelSanPham = new SanPham();
        $this->modelBinhLuan = new BinhLuan();
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
        $listBinhLuan = $this->modelBinhLuan->getBinhLuanBySanPham();
        // var_dump($listBinhLuan);
        // die;
        require_once('./Views/home.php');
    }

    public function filterCateByHome()
    {
        $listDanhMuc = $this->modelSanPham->getAllDanhMuc();
        $listProductsSale = $this->modelHomeClient->productsSale();
        $listSanPhamByView = $this->modelHomeClient->getAllProductsByView();
        $listBinhLuan = $this->modelBinhLuan->getBinhLuanBySanPham();
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
        $this->modelSanPham->updateLuotXemSanPham($id);
        $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);
        $listBinhLuan = $this->modelBinhLuan->getBinhLuanBySanPham($id);
        // var_dump($listBinhLuan);
        // die;
        $listSanPhamCungDanhMuc = $this->modelSanPham->getListSanPhamdDanhMuc($sanPham['id'], $sanPham['danh_muc_id']);
        // var_dump($listSanPhamCungDanhMuc);die();

        if (isset($sanPham)) {
            require_once './Views/detailSanPham.php';
        } else {
            header("Location: " . BASE_URL);
            exit();
        }
    }

    public function guiBinhLuan()
    {
        if (!isset($_SESSION['user_client'])) {
            header('location: ' . BASE_URL . '?act=form-login');
            exit();
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $san_pham_id = $_POST['san_pham_id'] ?? "";
            // var_dump($san_pham_id);
            // die;
            $tai_khoan_id = $_SESSION['user_client']['id'] ?? "";
            $content = $_POST['noi_dung'] ?? "";
            $ngay_dang = date('Y-m-d H:i:s');
            $status = $this->modelBinhLuan->insertComment($tai_khoan_id, $san_pham_id, $content, $ngay_dang);
            // var_dump($status);
            // die;
            header('location:' . BASE_URL . "?act=chi-tiet-san-pham&id_san_pham=$san_pham_id");
            exit();
        }
    }


    public function sanPhamDanhMuc()
    {
        $listDanhMuc = $this->modelSanPham->getAllDanhMuc();
        if (isset($_GET['danh_muc_id']) && $_GET['danh_muc_id'] > 0) {
            $iddm = $_GET['danh_muc_id'];
            $titleDanhMuc = $this->modelSanPham->getDanhMucById($iddm);
            // var_dump($titleDanhMuc);
            // die;
            $sanPhamByDanhMuc = $this->modelSanPham->sanPhamTheoDanhMuc($iddm);
            // var_dump($spdm);die();

            $listDanhMuc = $this->modelSanPham->getAllDanhMuc();
            require_once './Views/categorySanPham.php';
        } else {
            header("Location: " . BASE_URL);
        }
    }
}
