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
}
