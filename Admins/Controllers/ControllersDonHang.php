  <?php
 class AdminDonHangController{
    public $modelDonHang;

    public function __construct()
    {
        $this->modelDonHang = new AdminDonHang();
    }
    public function danhSachDonHang(){
        $listDonHang = $this->modelDonHang->getAllDonHang();
        require_once './views/donhang/listDonHang.php';
    }
    public function detailDonHang(){
        $don_hang_id = $_GET['id_don_hang'];

        $donHang = $this->modelDonHang->getDetailDonHang($don_hang_id);

        $sanPhamDonHang = $this ->modelDonHang->getListSpDonHang($don_hang_id);
        $listTrangThaiDonHang = $this->modelDonHang->getAllTrangThaiDonHang();

        require_once "./views/donhang/detailDonHang.php";
    }

    public function formEditDonHang(){

    $id =$_GET['id_don_hang'];
    $donHang = $this->modelDonHang->getAllTrangThaiDonHang();
    $listTrangThaiDonHang = $this ->modelDonHang->getAllTrangThaiDonHang();
    if (isset($donHang)) {
         require_once './views/donhang/editDonHang.php';
    }else{
        header("Location:" .BASE_URL_ADMIN .'?act=donhang');
        exit();
    }
    }
    public function postEditDonHang(){

        if ($_SERVER['REQUEST_METHOD']=='POST') {
            # code...

            $don_hang_id =$_POST['don_hang_id'] ?? '';

            $ten_nguoi_nhan = $_POST['ten_nguoi_nhan'] ?? '';
            $sdt_nguoi_nhan = $_POST['sdt_nguoi_nhan'] ?? '';
            $email_nguoi_nhan = $_POST['email_nguoi_nhan'] ?? '';
            $dia_chi_nguoi_nhan = $_POST['di_chi_nguoi_nhan'] ?? '';
            $ghi_chu = $_POST['ghi_chu'] ?? '';

            $trang_thai_id = $_POST['trang_thai_id'] ?? '';

            $errors =[];
            if (empty($ten_nguoi_nhan)) {
                $errors['ten_nguoi_nhan'] = 'Tên người nhận ko đc để trống';
            }
            if (empty($sdt_nguoi_nhan)) {
                $errors['sdt_nguoi_nhan'] = 'Sdt người nhận ko đc để trống';
            }
            if (empty($email_nguoi_nhan)) {
                $errors['email_nguoi_nhan'] = 'Email người nhận ko đc để trống';
            }
            if (empty($dia_chi_nguoi_nhan)) {
                $errors['dia_chi_nguoi_nhan'] = 'Địa chỉ người nhận ko đc để trống';
            }
            if (empty($trang_thai_id)) {
                $errors['trang_thai_id'] = 'Tên người nhận ko đc để trống';
            }

            $_SESSION['errors'] =$errors;



            if(empty($errors)){
                $this->modelDonHang->updateDonHang($don_hang_id,$ten_nguoi_nhan,$sdt_nguoi_nhan,$email_nguoi_nhan,$dia_chi_nguoi_nhan,$ghi_chu,$trang_thai_id);

                header("Location:". BASE_URL_ADMIN . '?act=don-hang');
                exit();
            }else{
                $_SESSION['flash'] =true;
                header("Location :" .BASE_URL_ADMIN .'?act=form-sua-don-hang&id_don_hang='.$don_hang_id);
                exit();
            }
        }
    }
 } 

