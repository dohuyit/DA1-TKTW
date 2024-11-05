<?php

class AdminDanhMucController{
    public $modelDanhMuc;
    
    public function __construct()
    {
        $this->modelDanhMuc = new AdminDanhMuc();
    }
    public function danhSachDanhMuc(){
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        require_once './views/danhmuc/ListDanhMuc.php';
    }
    public function formAddDanhMuc(){
        // hiển thị form nhập
        //var_dump('form them');
        require_once './views/danhmuc/AddDanhMuc.php';
    }
    public function postAddDanhMuc(){
        // xử lý form nhập
        //var_dump($_POST);

        // Kiểm tra xem dữ dữ liệu có phải đc submit lên không
        if($_SERVER['REQUEST_METHOD']== 'POST'){
            // Lấy ra dl
            $ten_danh_muc = $_POST['ten_danh_muc'];
            $mo_ta = $_POST['mo_ta'];

            // Tạo 1 mảng trống để chứa dl
            $errors =[];
            if(empty($ten_danh_muc)){
                $errors['ten_danh_muc'] = 'Tên danh mục không được để trống';
            }

            
            // Nếu k có lỗi thì thêm danh mục
            if(empty($errors)){
                $this->modelDanhMuc->insert_danhmuc($ten_danh_muc,$mo_ta);
                header("Location: ". BASE_URL_ADMIN . '?act=danh-muc');
                exit();
            }else{
                // trả lỗi
                require_once './views/danhmuc/addDanhMuc.php';
            }
        }   
    }

    public function formEditDanhMuc(){
        // hiển thị form nhập
        // Lấy ra thông tin của danh mục cần sửa
        $id =$_GET['id_danh_muc'];
        $danhMuc = $this->modelDanhMuc->getDetailDanhMuc($id);
        if(isset($danhMuc)){
            require_once './views/danhmuc/UpdateDanhMuc.php';
        }else{
            header("Location: ". BASE_URL_ADMIN . '?act=danh-muc');
            exit();
        }
    }
    public function postEditDanhMuc(){
        // xử lý form nhập
        //var_dump($_POST);

        // Kiểm tra xem dữ dữ liệu có phải đc submit lên không
        if($_SERVER['REQUEST_METHOD']== 'POST'){
            // Lấy ra dl
            $id =$_POST['id'];
            $ten_danh_muc = $_POST['ten_danh_muc'];
            $mo_ta = $_POST['mo_ta'];

            // Tạo 1 mảng trống để chứa dl
            $errors =[];
            if(empty($ten_danh_muc)){
                $errors['ten_danh_muc'] = 'Tên danh mục không được để trống';
            }

            // Nếu k có lỗi thì sửa danh mục
            if(empty($errors)){
                $this->modelDanhMuc->delete_danhmuc($id, $ten_danh_muc);
                header("Location: ". BASE_URL_ADMIN . '?act=danh-muc');
                exit();
            }else{
                // trả lỗi
                $danhMuc = ['id'=> $id, 'ten_danh_muc' =>$ten_danh_muc];
                require_once './views/danhmuc/UpdateDanhMuc.php';
            }
        }     
    }

    public function deleteDanhMuc(){
            $id = $_GET['id_danh_muc'];
            $danhMuc =$this->modelDanhMuc->getDetailDanhMuc($id);
            if($danhMuc){
                $this->modelDanhMuc->delete_danhmuc($id);
            }
        header("Location: ". BASE_URL_ADMIN . '?act=danh-muc');
        exit();         
    }
}


