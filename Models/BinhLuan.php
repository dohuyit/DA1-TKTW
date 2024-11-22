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
                INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id
                ";

            if ($id) {
                $sql .= " WHERE binh_luans.san_pham_id = :id ORDER BY id DESC";
            } else {
                $sql .= "ORDER BY id DESC";
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
