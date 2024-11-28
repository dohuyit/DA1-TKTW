<?php
class DonHang
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function addDonHang($tai_khoan_id, $ten_nguoi_nhan, $email_nguoi_nhan, $sdt_nguoi_nhan, $dia_chi_nguoi_nhan, $ghi_chu, $tong_tien, $phuong_thuc_thanh_toan_id, $ngay_dat, $ma_don_hang, $trang_thai_id,)
    {
        try {
            $sql = "INSERT INTO don_hangs (tai_khoan_id, ten_nguoi_nhan, email_nguoi_nhan, sdt_nguoi_nhan, dia_chi_nguoi_nhan, ghi_chu, tong_tien, phuong_thuc_thanh_toan_id, ngay_dat, ma_don_hang,trang_thai_id) VALUES(:tai_khoan_id, :ten_nguoi_nhan, :email_nguoi_nhan, :sdt_nguoi_nhan, :dia_chi_nguoi_nhan, :ghi_chu, :tong_tien, :phuong_thuc_thanh_toan_id, :ngay_dat ,:ma_don_hang,:trang_thai_id)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(
                [
                    ':tai_khoan_id' => $tai_khoan_id,
                    ':ten_nguoi_nhan' => $ten_nguoi_nhan,
                    ':email_nguoi_nhan' => $email_nguoi_nhan,
                    ':sdt_nguoi_nhan' => $sdt_nguoi_nhan,
                    ':dia_chi_nguoi_nhan' => $dia_chi_nguoi_nhan,
                    ':ghi_chu' => $ghi_chu,
                    ':tong_tien' => $tong_tien,
                    ':phuong_thuc_thanh_toan_id' => $phuong_thuc_thanh_toan_id,
                    ':ngay_dat' => $ngay_dat,
                    ':ma_don_hang' => $ma_don_hang,
                    ':trang_thai_id' => $trang_thai_id,

                ]
            );
            return $this->conn->lastInsertId();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }


    public function addDetailDonHang($don_hang_id, $san_pham_id, $don_gia, $so_luong, $thanh_tien)
    {
        try {
            $sql = "INSERT INTO chi_tiet_don_hangs (don_hang_id, san_pham_id, don_gia, so_luong, thanh_tien) VALUES(:don_hang_id, :san_pham_id, :don_gia, :so_luong,:thanh_tien)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(
                [
                    ':don_hang_id' => $don_hang_id,
                    ':san_pham_id' => $san_pham_id,
                    ':don_gia' => $don_gia,
                    ':so_luong' => $so_luong,
                    ':thanh_tien' => $thanh_tien,
                ]
            );
            return $don_hang_id;
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }

    public function getAllDonHang($tai_khoan_id = null, $don_hang_id = null)
    {
        try {
            // Bắt đầu câu SQL
            $sql = "SELECT don_hangs.*, trang_thai_don_hangs.ten_trang_thai 
                FROM don_hangs
                INNER JOIN trang_thai_don_hangs ON don_hangs.trang_thai_id = trang_thai_don_hangs.id";

            // Thêm điều kiện WHERE nếu có tham số
            $conditions = [];
            $params = [];
            if ($tai_khoan_id !== null) {
                $conditions[] = "don_hangs.tai_khoan_id = :tai_khoan_id ORDER BY id DESC";
                $params[':tai_khoan_id'] = $tai_khoan_id;
            }
            if ($don_hang_id !== null) {
                $conditions[] = "don_hangs.id = :don_hang_id";
                $params[':don_hang_id'] = $don_hang_id;
            }

            // Ghép các điều kiện
            if (!empty($conditions)) {
                $sql .= " WHERE " . implode(" AND ", $conditions);
            }

            $stmt = $this->conn->prepare($sql);
            $stmt->execute($params);
            $donHang = $stmt->fetchAll();
            return $donHang;
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }


    public function getDetailDonHang($id)
    {
        try {
            $sql = "SELECT 
                    chi_tiet_don_hangs.*,
                    san_phams.ten_san_pham,
                    san_phams.hinh_anh
                FROM chi_tiet_don_hangs
                INNER JOIN san_phams ON chi_tiet_don_hangs.san_pham_id = san_phams.id
                WHERE chi_tiet_don_hangs.don_hang_id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);
            $details = $stmt->fetchAll();
            return $details;
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }

    public function getDonHangByMaDonHang($ma_don_hang)
    {
        try {
            $sql = "SELECT don_hangs.*, trang_thai_don_hangs.ten_trang_thai 
            FROM don_hangs
            INNER JOIN trang_thai_don_hangs ON don_hangs.trang_thai_id = trang_thai_don_hangs.id WHERE ma_don_hang = :ma_don_hang";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':ma_don_hang' => $ma_don_hang]);
            return $stmt->fetch();
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }

    public function updateThanhToanOnline($donHangId, $ma_giao_dich, $trangThaiThanhToan)
    {
        $sql = "UPDATE don_hangs SET ma_giao_dich=:ma_giao_dich,trang_thai_thanh_toan = :trangThaiThanhToan WHERE id = :donHangId";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':ma_giao_dich' => $ma_giao_dich,
            ':trangThaiThanhToan' => $trangThaiThanhToan,
            ':donHangId' => $donHangId,
        ]);
    }

    public function getTrangThaiDonHang()
    {
        try {
            $sql = "SELECT * FROM trang_thai_don_hangs  ";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            return $stmt->fetchALL(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }

    public function getPhuongThucThanhToan()
    {
        try {
            $sql = "SELECT * FROM phuong_thuc_thanh_toans  ";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            return $stmt->fetchALL(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }

    public function updateTrangThaiDonHang($donHangId, $trangThaiId)
    {
        try {
            $sql = "UPDATE don_hangs SET trang_thai_id= :trang_thai_id WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':trang_thai_id' => $trangThaiId,
                ':id' => $donHangId

            ]);

            return true;
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
}
