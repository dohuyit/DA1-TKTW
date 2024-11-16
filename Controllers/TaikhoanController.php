<?php
class TaikhoanController
{
    public $modelSanPham;
    public $modelTaiKhoan;


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
                $_SESSION['errors'] = $result;
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


            // $_SESSION['old_data'] = array(
            //     'ho_ten' => $_POST['ho_ten'],
            //     'ngay_sinh' => $_POST['ngay_sinh'],
            //     'email' => $_POST['email'],
            //     'so_dien_thoai' => $_POST['so_dien_thoai'],
            //     'gioi_tinh' => $_POST['gioi_tinh'],
            //     'dia_chi' => $_POST['dia_chi'],
            //     'mat_khau' => $_POST['mat_khau'],


            // );

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
                $_SESSION['thongBao'] = 'Đăng kí thành công. Vui lòng đăng nhập để mua hàng và bình luận';
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
}
