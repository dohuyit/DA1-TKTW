<?php
class TrangChuClient
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function productsSale()
    {
        $sql = "SELECT * FROM san_phams WHERE trang_thai = 2 ORDER BY id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllProductsByView()
    {
        $sql = "SELECT san_phams.*, danh_mucs.ten_danh_muc FROM san_phams
            INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id WHERE luot_xem > 0 LIMIT 8";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllSanPhamClient()
    {
        $sql = "SELECT san_phams.*, danh_mucs.ten_danh_muc 
        FROM san_phams
        INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id 
        ORDER BY san_phams.id DESC 
        LIMIT 8";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
