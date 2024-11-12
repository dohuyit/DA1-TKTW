<?php

class AdminTaiKhoanController
{
    public $modelTaiKhoan;
    public $modelDonHang;
    public $modelSanPham;

    public function __construct()
    {
        $this->modelTaiKhoan = new AdminTaiKhoan();
        $this->modelDonHang = new AdminDonHang();
        $this->modelSanPham = new AdminSanPham();
    }


    public function danhSachQuanTri()
    {
        $listQuanTri = $this->modelTaiKhoan->getAllTaiKhoan(1);

        require_once 'Views/taikhoan/quantri/listQuantri.php';
    }

    public function formAddQuanTri()
    {
        require_once './Views/taikhoan/quantri/addQuanTri.php';

        deleteSessionErrors();
    }

    public function postAddQuanTri()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy ra dl
          
            $ho_ten = $_POST['ho_ten'];
            $email = $_POST['email'];

            // Tạo 1 mảng trống để chứa dl
            $errors = [];
            if (empty($ho_ten)) {
                $errors['ho_ten'] = 'Tên không được để trống';
            }
            if (empty($email)) {
                $errors['email'] = 'Email không được để trống';
            }
            $_SESSION['errors'] = $errors;

            // Nếu k có lỗi thì thêm danh mục
            if (empty($errors)) {
                // Đặt pass mặc định

                $password = password_hash('123@123ab', PASSWORD_BCRYPT);
                $chuc_vu_id = 1;

                $this->modelTaiKhoan->insertTaiKhoan($ho_ten, $email, $password, $chuc_vu_id);
                //var_dump($email); die();

                header("Location: " . BASE_URL_ADMIN . '?act=list-tai-khoan-quan-tri');
                exit();
            } else {
                // trả lỗi
                $_SESSION['flash'] = true;
                header("Location: " . BASE_URL_ADMIN . '?act=form-them-quan-tri');
                exit();
            }
        }
    }

    public function formEditQuanTri()
    {
        $quan_tri_id = $_GET['id_quan_tri'];
        $quanTri = $this->modelTaiKhoan->getDetailTaiKhoan($quan_tri_id);

        require_once "./Views/taikhoan/quantri/editQuanTri.php";
        deleteSessionErrors();
    }

    public function postEditQuanTri()
    {
        // xử lý form nhập
        //var_dump($_POST);

        // Kiểm tra xem dữ dữ liệu có phải đc submit lên không
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy ra dl
            // Lấy ra dữ liệu của sản phẩm
            $quan_tri_id = $_POST['quan_tri_id'] ?? '';
            // Truy vấn 

            $ho_ten = $_POST['ho_ten'] ?? '';
            $email = $_POST['email'] ?? '';
            $so_dien_thoai = $_POST['so_dien_thoai'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? '';


            // Tạo 1 mảng trống để chứa dl
            $errors = [];
            if (empty($ho_ten)) {
                $errors['ho_ten'] = 'Tên người dùng không được để trống';
            }
            if (empty($email)) {
                $errors['email'] = 'Email người dùng không được để trống';
            }
            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'Vui lòng chọn trạng thái';
            }

            $_SESSION['errors'] = $errors;


            // Nếu k có lỗi thì thêm sản phẩm
            if (empty($errors)) {
                $this->modelTaiKhoan->updateTaiKhoan($quan_tri_id, $ho_ten, $email, $so_dien_thoai, $trang_thai);
                //  var_dump($a); die();
                //  var_dump($san_pham_id);die;
                header("Location: " . BASE_URL_ADMIN . '?act=list-tai-khoan-quan-tri');
                exit();
            } else {
                // trả lỗi
                // Đặt chỉ thị xóa session sau khi hiển thị form
                $_SESSION['flash'] = true;
                header("Location: " . BASE_URL_ADMIN . '?act=form-sua-quan-tri&id_quan_tri=' . $quan_tri_id);
                exit();
            }
        }
    }
    public function resetPassword()
    {
        $tai_khoan_id = $_GET['id_quan_tri'];
        $tai_khoan = $this->modelTaiKhoan->getDetailTaiKhoan($tai_khoan_id);
        //  var_dump($tai_khoan['mat_khau']);die();
        $password = password_hash('123@123ab', PASSWORD_BCRYPT);

        $status = $this->modelTaiKhoan->resetPassword($tai_khoan_id, $password);
        // var_dump($status); die();
        if ($status && $tai_khoan['chuc_vu_id'] === 1) {
            header('Location: ' . BASE_URL_ADMIN . '?act=list-tai-khoan-quan-tri');
            exit();
        } else if ($status && $tai_khoan['chuc_vu_id'] === 2) {
            header('Location: ' . BASE_URL_ADMIN . '?act=list-tai-khoan-khach-hang');
            exit();
        } else {
            var_dump('Lỗi khi reset tài khoản');
        }
    }



    public function danhSachKhachHang()
    {
        $listKhachHang = $this->modelTaiKhoan->getAllTaiKhoan(2);
        require_once 'Views/taikhoan/khachhang/listKhachHang.php';
    }

    public function formEditKhachHang()
    {
        $id_khach_hang = $_GET['id_khach_hang'];
        $khachHang = $this->modelTaiKhoan->getDetailTaiKhoan($id_khach_hang);

        require_once "./Views/taikhoan/khachhang/editKhachHang.php";
        deleteSessionErrors();
    }


    public function postEditKhachHang()
    {
        // xử lý form nhập
        //var_dump($_POST);

        // Kiểm tra xem dữ dữ liệu có phải đc submit lên không
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy ra dl
            // Lấy ra dữ liệu của sản phẩm
            $khach_hang_id = $_POST['khach_hang_id'] ?? '';
            // Truy vấn 

            $ho_ten = $_POST['ho_ten'] ?? '';
            $email = $_POST['email'] ?? '';
            $so_dien_thoai = $_POST['so_dien_thoai'] ?? '';
            $ngay_sinh = $_POST['ngay_sinh'] ?? '';
            $gioi_tinh = isset($_POST['gioi_tinh']) ? $_POST['gioi_tinh'] : 0;
            $dia_chi = $_POST['dia_chi'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? '';

            // Tạo 1 mảng trống để chứa dl
            $errors = [];
            if (empty($ho_ten)) {
                $errors['ho_ten'] = 'Tên người dùng không được để trống';
            }
            if (empty($email)) {
                $errors['email'] = 'Email người dùng không được để trống';
            }

            if (empty($so_dien_thoai)) {
                $errors['so_dien_thoai'] = 'Số điện thoại người dùng không được để trống';
            }
            if (empty($ngay_sinh)) {
                $errors['ngay_sinh'] = 'Ngày sinh người dùng không được để trống';
            }
            if (empty($dia_chi)) {
                $errors['dia_chi'] = 'Ngày sinh người dùng không được để trống';
            }

            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'Vui lòng chọn trạng thái';
            }

            $_SESSION['errors'] = $errors;
            //   var_dump($_SESSION);die();


            // Nếu k có lỗi thì thêm sản phẩm
            if (empty($errors)) {
                $this->modelTaiKhoan->updateKhachHang($khach_hang_id, $ho_ten, $email, $so_dien_thoai, $ngay_sinh, $gioi_tinh, $dia_chi, $trang_thai);
                //  var_dump($san_pham_id);die;

                //  var_dump($a); die();
                header("Location: " . BASE_URL_ADMIN . '?act=list-tai-khoan-khach-hang');
                exit();
            } else {
                // trả lỗi
                // Đặt chỉ thị xóa session sau khi hiển thị form
                //           var_dump('Loi');die();
                $_SESSION['flash'] = true;
                header("Location: " . BASE_URL_ADMIN . '?act=form-sua-khach-hang&id_khach_hang=' . $khach_hang_id);
                exit();
            }
        }
    }

    public function detailKhachHang()
    {
        $id_khach_hang = $_GET['id_khach_hang'];
        $khachHang = $this->modelTaiKhoan->getDetailTaiKhoan($id_khach_hang);
        //var_dump($khachHang);die();

        $listDonHang = $this->modelDonHang->getDonHangFromKhachHang($id_khach_hang);

        // $listBinhLuan = $this->modelSanPham->getBinhLuanFromKhachHang($id_khach_hang);
        require_once './Views/taikhoan/khachhang/detailKhachHang.php';
    }

    public function formLogin()
    {
        if(isset($_SESSION['user_admin'])){
            header('Location:'.BASE_URL_ADMIN);
            exit();
        }
        require_once './Views/auth/formLogin.php';
        deleteSessionErrors();
    }
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            // xử lý kiểm tra thông tin đăng nhập
            $user = $this->modelTaiKhoan->checkLogin($email, $password);
            // var_dump($user);
            // die;
            if ($user[0] == $email) {
                // dn thanh cong
                // Luu thong tin vao session
                $_SESSION['user_admin'] = $user;
                header("Location:" . BASE_URL_ADMIN);
                exit();
            } else {
                // Lỗi thì lưu lỗi vào session
                $_SESSION['errors'] = $user;
                //    var_dump($_SESSION['errors']);die();

                $_SESSION['flash'] = true;

                header("Location:" . BASE_URL_ADMIN . '?act=login-admin');
                exit();
            }
        }
    }


    // public function login()
    // {
    //     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //         // lay dl
    //         $email = $_POST['email'];
    //         $password = $_POST['password'];

    //         // xử lý kiểm tra thông tin đăng nhập
    //         $user = $this->modelTaiKhoan->checkLogin($email, $password);
    //         //    var_dump($user);die();

    //         if ($user == $email) {
    //             // dn thanh cong
    //             // Luu thong tin vao session
    //             $_SESSION['user_admin'] = $user;
    //             header("Location:" . BASE_URL_ADMIN);
    //             exit();
    //         } else {
    //             // Lỗi thì lưu lỗi vào session
    //             $_SESSION['errors'] = $user;
    //             //    var_dump($_SESSION['errors']);die();

    //             $_SESSION['flash'] = true;

    //             header("Location:" . BASE_URL_ADMIN . '?act=login-admin');
    //             exit();
    //         }
    //     }
    // }

  
    

    public function logout()
    {
        if (isset($_SESSION['user_admin'])) {
            unset($_SESSION['user_admin']);
            header('Location:' . BASE_URL_ADMIN . '?act=login-admin');
        }
    }

    public function formEditCaNhanQuanTri()
    {
        $email = $_SESSION['user_admin'];
        $thongTin = $this->modelTaiKhoan->getTaiKhoanformEmail($email);

        require_once './Views/taikhoan/canhan/editCaNhan.php';
        deleteSessionErrors();
    }


    public function postEditMatKhauCaNhan()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $old_pass = $_POST['old_pass'];
            $new_pass = $_POST['new_pass'];
            $confirm_pass = $_POST['confirm_pass'];



            // Lấy thông tin user từ sesion
            $user  = $this->modelTaiKhoan->getTaiKhoanformEmail($_SESSION['user_admin']);

            $checkPass = password_verify($old_pass, $user['mat_khau']);
            
            //var_dump('ok');die();
            $errors = [];
            if (!$checkPass) {
                $errors['old_pass'] = 'Mật khẩu cũ không đúng';
            }
            if ($new_pass !== $confirm_pass) {
                $errors['confirm_pass'] = 'Mật khẩu nhập lại không đúng';
            }


            if (empty($old_pass)) {
                $errors['old_pass'] = 'Mật khẩu cũ không được để trống';
            }

            if (empty($new_pass)) {
                $errors['new_pass'] = 'Mật khẩu mới không được để trống';
            }

            if (empty($confirm_pass)) {
                $errors['confirm_pass'] = 'Mật khẩu nhập lại không được để trống';
            }

            $_SESSION['errors'] = $errors;
            if (!$errors) {
                $hashPass = password_hash($new_pass, PASSWORD_BCRYPT);
                $status = $this->modelTaiKhoan->resetPassword($user['id'], $hashPass);
                if ($status) {
                    $_SESSION['success'] = "Đã đổi mật khẩu thành công";
                    $_SESSION['flash'] = true;

                    header("Location:" . BASE_URL_ADMIN . '?act=form-sua-thong-tin-ca-nhan-quan-tri');
                }
            } else {
                // Lỗi thì lưu lỗi vào session
                //    $_SESSION['errors'] = $user;
                //    var_dump($_SESSION['errors']);die();

                $_SESSION['flash'] = true;

                header("Location:" . BASE_URL_ADMIN . '?act=form-sua-thong-tin-ca-nhan-quan-tri');
                exit();
            }
        }
    }


    public function postEditCaNhanQuanTri()
    {
        // xử lý form nhập
        //var_dump($_POST);

        // Kiểm tra xem dữ dữ liệu có phải đc submit lên không
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy ra dl
            // Lấy ra dữ liệu của sản phẩm
            $tai_khoan_id = $_POST['tai_khoan_id'];
            $ho_ten = $_POST['ho_ten'] ?? '';
            // Truy vấn 

            $email = $_POST['email'] ?? '';
            $so_dien_thoai = $_POST['so_dien_thoai'] ?? '';
            $dia_chi = $_POST['dia_chi'] ?? '';

            // Tạo 1 mảng trống để chứa dl
            $errors = [];
            if (empty($ho_ten)) {
                $errors['ho_ten'] = 'Họ tên không được để trống';
            }
            if (empty($so_dien_thoai)) {
                $errors['so_dien_thoai'] = 'Số điện thoại không được để trống';
            }
            if (empty($dia_chi)) {
                $errors['dia_chi'] = 'Địa chỉ không được để trống';
            }
            if (empty($email)) {
                $errors['email'] = 'Email không được để trống';
            }

            $_SESSION['errors'] = $errors;


            // Nếu k có lỗi thì thêm sản phẩm
            if (empty($errors)) {
                $status = $this->modelTaiKhoan->updateTaiKhoanCaNhan($tai_khoan_id, $ho_ten, $email, $so_dien_thoai, $dia_chi);

                if ($status) {
                    $_SESSION['thongtin'] = "Đã đổi thông tin thành công";
                    $_SESSION['flash'] = true;
                }
                header("Location: " . BASE_URL_ADMIN . '?act=form-sua-thong-tin-ca-nhan-quan-tri');
                exit();
            } else {
                // trả lỗi
                // Đặt chỉ thị xóa session sau khi hiển thị form
                $_SESSION['flash'] = true;
                header("Location: " . BASE_URL_ADMIN . '?act=form-sua-thong-tin-ca-nhan-quan-tri');
                exit();
            }
        }
        

    }


    public function suaAnhTaiKhoanAdmin()
    {
        // xử lý form nhập
        //var_dump($_POST);

        // Kiểm tra xem dữ dữ liệu có phải đc submit lên không
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy ra dl
            // Lấy ra dữ liệu của sản phẩm
            $tai_khoan_id = $_POST['tai_khoan_id'];
            $thongTinCu = $this->modelTaiKhoan->getTaiKhoanformEmail($_SESSION['user_admin']);
            // var_dump($thongTinCu);die();
            $anh_cu = $thongTinCu['anh_dai_dien'];
            // var_dump($anh_cu);die();

            $anh_dai_dien = $_FILES['anh_dai_dien'] ?? null;
            // Logic sửa ảnh
            if (isset($anh_dai_dien)) {
                // upload file ảnh mới lên
                $new_file = uploadFile($anh_dai_dien, './uploads');
                if (!empty($old_file)) { // Nếu có ảnh cũ thì xóa đi
                    deleteFile($old_file);
                }
            } else {
                $new_file = $anh_cu;
            }

            // Nếu k có lỗi thì thêm anh
            if (empty($errors)) {
                $status = $this->modelTaiKhoan->updateAnhDaiDienAdmin($tai_khoan_id, $new_file);
                //  var_dump($status);die();

                if ($status) {
                    $_SESSION['successAnh'] = "Đã đổi thông tin thành công";
                    $_SESSION['flash'] = true;
                }
                header("Location: " . BASE_URL_ADMIN . '?act=form-sua-thong-tin-ca-nhan-quan-tri');
                exit();
            } else {
                // trả lỗi
                // Đặt chỉ thị xóa session sau khi hiển thị form
                $_SESSION['flash'] = true;
                header("Location: " . BASE_URL_ADMIN . '?act=form-sua-thong-tin-ca-nhan-quan-tri');
                exit();
            }
        }
    }




} //end
