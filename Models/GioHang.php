<?php
class GioHang
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getGioHangFromUser($id)
    {
        try {
            $sql = "SELECT *FROM gio_hangs WHERE tai_khoan_id = :tai_khoan_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':tai_khoan_id' => $id,
            ]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }

    public function getDetailGioHang($id)
    {
        try {
            $sql = "SELECT chi_tiet_gio_hangs.*, san_phams.ten_san_pham, san_phams.hinh_anh, san_phams.gia_san_pham, san_phams.gia_khuyen_mai,danh_mucs.ten_danh_muc
              FROM chi_tiet_gio_hangs
              INNER JOIN san_phams ON chi_tiet_gio_hangs.san_pham_id = san_phams.id
              INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id
              WHERE chi_tiet_gio_hangs.gio_hang_id = :gio_hang_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(
                [
                    ':gio_hang_id' => $id
                ]
            );
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }

    public function addGioHang($id)
    {
        try {
            $sql = "INSERT INTO gio_hangs (tai_khoan_id) VALUES(:id)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(
                [
                    ':id' => $id
                ]
            );
            return $this->conn->lastInsertId();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }

    public function updateSoLuong($gio_hang_id, $san_pham_id, $so_luong)
    {
        try {
            $sql = "UPDATE chi_tiet_gio_hangs 
      SET so_luong = :so_luong
      WHERE gio_hang_id = :gio_hang_id AND san_pham_id = :san_pham_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(
                [
                    ':gio_hang_id' => $gio_hang_id,
                    ':san_pham_id' => $san_pham_id,
                    ':so_luong' => $so_luong,


                ]
            );
            return true;
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }


    public function addDetailGioHang($gio_hang_id, $san_pham_id, $so_luong)
    {
        try {
            $sql = "INSERT INTO chi_tiet_gio_hangs (gio_hang_id, san_pham_id, so_luong) VALUES(:gio_hang_id, :san_pham_id, :so_luong)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(
                [
                    ':gio_hang_id' => $gio_hang_id,
                    ':san_pham_id' => $san_pham_id,
                    ':so_luong' => $so_luong,


                ]
            );
            return true;
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }



    public function deleteSanPhamGioHang($id)
    {
        try {
            $sql = "DELETE FROM chi_tiet_gio_hangs WHERE id=:id";
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

    // // Model/GioHang.php
    // public function getTongSoLuongSanPham($userId)
    // {
    //     $sql = "SELECT COUNT(DISTINCT chi_tiet_gio_hangs.san_pham_id) AS so_luong_san_pham 
    //         FROM chi_tiet_gio_hangs 
    //         JOIN gio_hangs ON chi_tiet_gio_hangs.gio_hang_id = gio_hangs.id 
    //         WHERE gio_hangs.tai_khoan_id = ?";
    //     $stmt = $this->conn->prepare($sql);
    //     $stmt->execute([$userId]);
    //     $result = $stmt->fetch();
    //     return $result['so_luong_san_pham'] ?? 0; // Trả về 0 nếu không có sản phẩm
    // }
}
