<?php
class DonHang
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function addDonHang($tai_khoan_id, $ten_nguoi_nhan, $email_nguoi_nhan, $sdt_nguoi_nhan, $dia_chi_nguoi_nhan, $ghi_chu, $tong_tien, $phuong_thuc_thanh_toan_id, $ngay_dat, $ma_don_hang, $trang_thai_id)
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

    public function getAllDonHang($id)
    {
        try {
            $sql = "SELECT don_hangs.*,trang_thai_don_hangs.ten_trang_thai  FROM don_hangs 
            INNER JOIN trang_thai_don_hangs ON don_hangs.trang_thai_id = trang_thai_don_hangs.id 
      
              WHERE don_hangs.id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(
                [
                    ':id' => $id
                ]
            );
            $donHang =  $stmt->fetchAll();
            return $donHang;
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
}
