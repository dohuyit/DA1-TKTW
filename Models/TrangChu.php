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

    public function increaseViewCount($id)
    {
        $sql = "UPDATE products SET view = view + 1 WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':id' => $id
        ]);
    }

    public function getAllProductsByView()
    {
        $sql = "SELECT * FROM san_phams WHERE luot_xem LIMIT 8";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllSanPhamClient()
    {
        $sql = "SELECT san_phams.*, danh_mucs.ten_danh_muc FROM san_phams
            INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id LIMIT 8";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
