  <?php
 class AdminDonHangController{
    public $modelDonHang;

    public function __construct()
    {
        $this->modelDonHang = new AdminDonHang();
    }
    public function danhSachDonHang(){
        $listDonHang = $this->modelDonHang->getAllDonHang();
        // var_dump($listDonHang);
        // die;
        require_once './Views/donhang/listDonHang.php';
    }
    public function detailDonHang(){
        $don_hang_id = $_GET['id_don_hang'];

        $donHang = $this->modelDonHang->getDetailDonHang($don_hang_id);
// var_dump($donHang);
//         die;
        $sanPhamDonHang = $this ->modelDonHang->getListSpDonHang($don_hang_id);
        $listTrangThaiDonHang = $this->modelDonHang->getAllTrangThaiDonHang();

        require_once "./Views/donhang/detailDonHang.php";
    }

    public function formEditDonHang(){

    $id =$_GET['id_don_hang'];
    $donHang = $this->modelDonHang->getDetailDonHang($id);
    // var_dump($donHang);
    // die;
    $listTrangThaiDonHang = $this ->modelDonHang->getAllTrangThaiDonHang();
    if (isset($donHang)) {
         require_once './Views/donhang/editDonHang.php';
    }else{
        header("Location:" .BASE_URL_ADMIN .'?act=donhang');
        exit();
    }
    }
    public function postEditDonHang(){
        // xử lý form nhập
        //var_dump($_POST);

        // Kiểm tra xem dữ dữ liệu có phải đc submit lên không
        if($_SERVER['REQUEST_METHOD']== 'POST'){
            // Lấy ra dl
            // Lấy ra dữ liệu của sản phẩm
            $don_hang_id = $_POST['don_hang_id'] ?? '';
            // Truy vấn 

            $ten_nguoi_nhan = $_POST['ten_nguoi_nhan'] ?? '';
            $sdt_nguoi_nhan = $_POST['sdt_nguoi_nhan'] ?? '';
            $email_nguoi_nhan = $_POST['email_nguoi_nhan'] ?? '';
            $dia_chi_nguoi_nhan = $_POST['dia_chi_nguoi_nhan'] ?? '';
            $ghi_chu = $_POST['ghi_chu']?? '';
          // Đặt giá trị mặc định cho các trường
            $trang_thai_id =  $_POST['trang_thai_id'] ?? '';
          
            // Tạo 1 mảng trống để chứa dl
            $errors =[];
            if(empty($ten_nguoi_nhan)){
                $errors['ten_nguoi_nhan'] = 'Tên người nhận không được để trống';
            }
            if(empty($sdt_nguoi_nhan)){
                $errors['sdt_nguoi_nhan'] = 'Sdt người nhận không được để trống';
            }
            if(empty($email_nguoi_nhan)){
                $errors['email_nguoi_nhan'] = 'Email người nhận không được để trống';
            }
            if(empty($dia_chi_nguoi_nhan)){
                $errors['dia_chi_nguoi_nhan'] = 'Địa chỉ người nhân không được để trống';
            }
            if(empty($trang_thai_id)){
                $errors['trang_thai_id'] = 'Vui lòng chọn trạng thái đơn hàng';
            }

         
            
            $_SESSION['errors'] =$errors;


            // Nếu k có lỗi thì thêm sản phẩm
            if(empty($errors)){
              $this->modelDonHang->updateDonHang($don_hang_id,$ten_nguoi_nhan,$sdt_nguoi_nhan,$email_nguoi_nhan,$dia_chi_nguoi_nhan,$ghi_chu,$trang_thai_id);
              //  var_dump($san_pham_id);die;
                header("Location: ". BASE_URL_ADMIN . '?act=don-hang');
                exit();
            }else{
                // trả lỗi
                // Đặt chỉ thị xóa session sau khi hiển thị form
                $_SESSION['flash'] = true;
                header("Location: ". BASE_URL_ADMIN . '?act=form-sua-don-hang&id_don_hang='.$don_hang_id);
                exit();
            }
        }   
    }
 } 

