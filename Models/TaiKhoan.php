<?php
class TaiKhoan
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function checkLogin($email, $mat_khau)
    {
        try {
            $sql = "SELECT * FROM tai_khoans WHERE email = :email";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(
                [
                    ':email' => $email
                ]
            );
            $user = $stmt->fetch();
            if ($user && $mat_khau == $user['mat_khau']) {
                if ($user['chuc_vu_id'] == 2) {
                    if ($user['trang_thai'] == 1) {
                        return [
                            'email' => $user['email'],
                            'id' => $user['id']
                        ]; // trả về email và id
                    } else {
                        return "Tài khoản bị cấm";
                    }
                }
            } elseif ($user && password_verify($mat_khau, $user['mat_khau'])) {
                if ($user['chuc_vu_id'] == 1) {
                    return "Tài khoản không có quyền đăng nhập khách hàng";
                }
            } else {
                return 'Vui lòng kiểm tra lại thông tin đăng nhập';
            }
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
            return  false;
        }
    }

    public function getTaiKhoanFromEmail($email)
    {
        try {
            $sql = "SELECT * FROM tai_khoans WHERE email = :email";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(
                [
                    ':email' => $email
                ]
            );
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }

    public function insertTaiKhoan($ho_ten, $email, $mat_khau, $chuc_vu_id)
    {
        try {
            $sql = "INSERT INTO tai_khoans (ho_ten,email,mat_khau,chuc_vu_id) VALUES (:ho_ten,:email,:mat_khau,:chuc_vu_id)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(
                [
                    ':ho_ten' => $ho_ten,
                    ':email' => $email,
                    ':mat_khau' => $mat_khau,
                    ':chuc_vu_id' => $chuc_vu_id,
                ]
            );

            return true;
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }

    public function InforTaiKhoan($id)
    {
        try {
            $sql = "SELECT * FROM tai_khoans WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(
                [
                    ':id' => $id
                ]
            );
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }

    public function updateTaiKhoan($id, $ho_ten, $email, $so_dien_thoai, $gioi_tinh, $anh_dai_dien, $dia_chi)
    {
        try {
            $sql = "UPDATE tai_khoans SET 
                    ho_ten = :ho_ten,
                    email = :email,
                    so_dien_thoai = :so_dien_thoai,
                    gioi_tinh = :gioi_tinh,
                    anh_dai_dien = :anh_dai_dien,
                    dia_chi = :dia_chi
                    WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(
                [
                    ':ho_ten' => $ho_ten,
                    ':email' => $email,
                    ':so_dien_thoai' => $so_dien_thoai,
                    ':gioi_tinh' => $gioi_tinh,
                    ':anh_dai_dien' => $anh_dai_dien,
                    ':dia_chi' => $dia_chi,
                    ':id' => $id
                ]
            );
            return true;
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
}
