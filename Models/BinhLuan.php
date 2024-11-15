<?php
class BinhLuan
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function insertComment($tai_khoan_id, $san_pham_id, $noi_dung, $ngay_dang)
    {
        try {
            $sql = "INSERT INTO binh_luans (tai_khoan_id,san_pham_id,noi_dung,ngay_dang) VALUES (:tai_khoan_id, :san_pham_id,:noi_dung,:ngay_dang)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(
                [
                    ':tai_khoan_id' => $tai_khoan_id,
                    ':san_pham_id' => $san_pham_id,
                    ':noi_dung' => $noi_dung,
                    ':ngay_dang' => $ngay_dang,

                ]
            );

            return true;
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }

    public function getBinhLuanBySanPham($id = null)
    {
        try {
            // Tạo câu truy vấn với các bảng liên kết
            $sql = "SELECT binh_luans.*, 
                       tai_khoans.ho_ten, 
                       tai_khoans.email, 
                       tai_khoans.gioi_tinh, 
                       tai_khoans.anh_dai_dien, 
                       san_phams.hinh_anh, 
                       san_phams.ten_san_pham, 
                       danh_mucs.ten_danh_muc 
                FROM binh_luans
                INNER JOIN tai_khoans ON binh_luans.tai_khoan_id = tai_khoans.id
                INNER JOIN san_phams ON binh_luans.san_pham_id = san_phams.id
                INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id";

            // Nếu có id sản phẩm thì thêm điều kiện WHERE
            if ($id) {
                $sql .= " WHERE binh_luans.san_pham_id = :id";
            }

            $stmt = $this->conn->prepare($sql);

            // Kiểm tra nếu có id thì thực hiện bind giá trị
            if ($id) {
                $stmt->execute([':id' => $id]);
            } else {
                $stmt->execute();
            }

            // Trả về tất cả các kết quả
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
}
