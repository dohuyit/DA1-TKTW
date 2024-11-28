<?php
class TaikhoanController
{
    public $modelSanPham;
    public $modelTaiKhoan;
    public $modelDanhMuc;


    public function __construct()
    {
        $this->modelSanPham = new SanPham();
        $this->modelTaiKhoan = new TaiKhoan();
    }

    public function formLogin()
    {
        require_once "./Views/auth/formLogin.php";
        deleteSessionErrors();
    }

    public function postLogin()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = $_POST['mat_khau'];

            $errors = [];
            if (empty($email)) {
                $errors['email'] = 'Email không được để trống';
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = 'Email không hợp lệ';
            }
            if (empty($password)) {
                $errors['mat_khau'] = 'Mật khẩu không được để trống';
            } elseif (strlen($password) < 6) {
                $errors['mat_khau'] = 'Mật khẩu phải có ít nhất 6 ký tự';
            }

            if (!empty($errors)) {
                $_SESSION['errors'] = $errors;
                $_SESSION['flash'] = true;
                header("Location:" . BASE_URL . '?act=form-login');
                exit();
            };

            // var_dump($result);
            // die();
            $result = $this->modelTaiKhoan->checkLogin($email, $password);
            if (is_array($result)) {
                $email = $result['email'];
                $id = $result['id'];
                $infor = $this->modelTaiKhoan->getTaiKhoanFromEmail($email);
                $ho_ten = $infor['ho_ten'];
                // var_dump($infor);
                // die;
                $_SESSION['user_client'] = [
                    'ho_ten' => $ho_ten,
                    'email' => $email,
                    'id' => $id
                ];

                // var_dump($_SESSION['user_client']);
                // die;
                $_SESSION['thongBao'] = "Đăng nhập thành công";
                header("location:" . BASE_URL);
                exit();
            } else {
                $_SESSION['thongBao'] = $result;
                $_SESSION['flash'] = true;
                header("Location:" . BASE_URL . '?act=form-login');
                exit();
            }
        }
    }

    public function logout()
    {
        if (isset($_SESSION['user_client'])) {
            unset($_SESSION['user_client']);
            unset($_SESSION['products-cart']);
            $_SESSION['thongBao'] = "Đăng xuất thành công";
            header('Location:' . BASE_URL);
        }
    }

    public function formRegister()
    {
        require_once "./Views/auth/formRegister.php";
        deleteSessionErrors();
    }

    public function postRegister()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // Lấy ra dl
            $ho_ten = $_POST['ho_ten'] ?? '';
            $email = $_POST['email'] ?? '';
            $mat_khau = $_POST['mat_khau'] ?? '';
            $chuc_vu = 2;

            // Tạo 1 mảng trống để chứa dl
            $errors = [];
            if (empty($ho_ten)) {
                $errors['ho_ten'] = 'Họ tên không được để trống';
            }
            if (empty($email)) {
                $errors['email'] = 'Email không được để trống';
            }
            if (empty($mat_khau)) {
                $errors['mat_khau'] = 'Mật khẩu không được để trống';
            }
            $_SESSION['errors'] = $errors;

            if (empty($errors)) {
                $tai_khoan = $this->modelTaiKhoan->insertTaiKhoan($ho_ten, $email, $mat_khau, $chuc_vu);
                // var_dump($tai_khoan);
                // die();
                $_SESSION['thongBao'] = 'Đăng kí tài khoản thành công';
                header("Location: " . BASE_URL . '?act=form-login');
                exit();
            } else {
                $_SESSION['flash'] = true;
                $_SESSION['thongBao'] = 'Đăng ký thất bại';

                header("Location: " . BASE_URL . '?act=form-register');
                exit();
            }
        }
    }

    public function thongTinTaiKhoan()
    {
        $listDanhMuc = $this->modelSanPham->getAllDanhMuc();
        $user = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']['email']);
        // var_dump($user);
        // die;
        require_once "./Views/thongTinTaiKhoan.php";
    }

    public function postThongTinTaiKhoan()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            // var_dump($_POST);
            // die;
            $tai_khoan_id = $_POST['id'];
            $ho_ten = $_POST['ho_ten'] ?? '';
            $email = $_POST['email'] ?? '';
            $gioi_tinh = $_POST['gioi_tinh'] ?? null;
            $so_dien_thoai = $_POST['so_dien_thoai'] ?? null;
            $dia_chi = $_POST['dia_chi'] ?? null;
            $anh_dai_dien = $_FILES['anh_dai_dien'] ?? null;

            $user = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']['email']);

            if ($ho_ten) {
                $_SESSION['user_client']['ho_ten'] = $ho_ten;
            }

            if (isset($anh_dai_dien) && $anh_dai_dien['error'] === UPLOAD_ERR_OK) {
                if (!empty($user['anh_dai_dien'])) {
                    deleteFile($user['anh_dai_dien']);
                }
                // Upload ảnh mới
                $new_file = uploadFile($anh_dai_dien, './Uploads/');
            } else {
                // Nếu không upload ảnh mới, giữ lại ảnh cũ
                $new_file = $user['anh_dai_dien'];
            }


            // Tạo 1 mảng trống để chứa dl
            $errors = [];
            if (empty($ho_ten)) {
                $errors['ho_ten'] = 'Họ tên không được để trống';
            }
            if (empty($so_dien_thoai)) {
                $errors['so_dien_thoai'] = 'Số điện thoại không được để trống';
            }
            if (empty($email)) {
                $errors['email'] = 'Email không được để trống';
            }
            $_SESSION['errors'] = $errors;


            // Nếu k có lỗi thì thêm sản phẩm
            if (empty($errors)) {

                $status = $this->modelTaiKhoan->updateTaiKhoan($tai_khoan_id, $ho_ten, $email, $so_dien_thoai, $gioi_tinh, $new_file, $dia_chi);

                if ($status) {
                    $_SESSION['successTt'] = "Đã đổi thông tin thành công";
                    $_SESSION['flash'] = true;
                }
                header("Location: " . BASE_URL . '?act=thong-tin-tai-khoan');
                exit();
            } else {
                // trả lỗi
                // Đặt chỉ thị xóa session sau khi hiển thị form
                $_SESSION['flash'] = true;
                header("Location: " . BASE_URL . '?act=thong-tin-tai-khoan');
                exit();
            }
        }
    }

    public function formQuenMatKhau()
    {
        require_once "./Views/auth/fogotPassword.php";
        deleteSessionErrors();
    }

    public function postCapNhatMatKhau()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy ra dl
            // var_dump($_POST);
            // die;
            $email = $_POST['email'] ?? '';

            $checkEmail = $this->modelTaiKhoan->checkEmail($email);

            // var_dump($checkEmail);
            // die;
            if (is_array($checkEmail) && $checkEmail['chuc_vu_id'] == 2) {
                $_SESSION['layMk'] = 'Mật khẩu của bạn là: ' . $checkEmail['mat_khau'];
                header('Location:' . BASE_URL . '?act=quen-mat-khau');
            } else {
                $_SESSION['flash'] = true;
                $_SESSION['layMk'] = 'Email không hợp lệ';
                header('Location:' . BASE_URL . '?act=quen-mat-khau');
            }
        }
    }
}
