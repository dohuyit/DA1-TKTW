<?php
// Bình luận
class AdminBinhLuan
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getBinhLuanFromKhachHang($id)
    {
        try {
            $sql = "SELECT binh_luans.*, san_phams.ten_san_pham FROM binh_luans
            INNER JOIN san_phams ON binh_luans.san_pham_id = san_phams.id
            WHERE binh_luans.tai_khoan_id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }

    public function getDetailBinhLuan($id)
    {
        try {
            $sql = "SELECT * FROM binh_luans WHERE id = :id";
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

    public function updateTrangThaiBinhLuan($id, $trang_thai)
    {
        try {
            $sql = "UPDATE binh_luans 
                    SET 
                    trang_thai = :trang_thai
                    WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(
                [
                    ':trang_thai' => $trang_thai,
                    ':id' => $id

                ]
            );


            // Lấy id sản phẩm vừa thêm
            return true;
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }

    public function getBinhLuanFromSanPham($id)
    {
        try {
            $sql = "SELECT binh_luans.*, tai_khoans.ho_ten FROM binh_luans
            INNER JOIN tai_khoans ON binh_luans.tai_khoan_id = tai_khoans.id
            WHERE binh_luans.san_pham_id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }


    public function deleteBinhLuan($id)
    {
        try {
            $sql = "DELETE FROM binh_luans WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(
                [
                    ':id' => $id
                ]
            );

            return true;
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
}
