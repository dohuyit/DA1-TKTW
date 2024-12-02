<?php
class AdminTrangChu
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }

    // Hàm lấy tổng doanh thu từ các đơn hàng thành công
    public function getTongDoanhThu()
    {
        $sql = "SELECT SUM(tong_tien) AS tong_doanh_thu FROM don_hangs WHERE trang_thai_id = 9";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['tong_doanh_thu'] ?? 0;
    }

    public function getAllThongKe()
    {
        try {
            $sql = "SELECT danh_mucs.ten_danh_muc, danh_mucs.id, 
                           COUNT(san_phams.id) as countSp, 
                           MIN(san_phams.gia_san_pham) as minPrice, 
                           MAX(san_phams.gia_san_pham) as maxPrice, 
                           AVG(san_phams.gia_san_pham) as avgPrice
                    FROM san_phams 
                    LEFT JOIN danh_mucs ON danh_mucs.id = san_phams.danh_muc_id
                    GROUP BY danh_mucs.ten_danh_muc, danh_mucs.id
                    ORDER BY danh_mucs.id DESC";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
}
