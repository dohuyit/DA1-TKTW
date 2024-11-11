<?php
class SanPham {
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

  
    public function getAllSanPham(){
        try{
            $sql = "SELECT san_phams.*, danh_mucs.ten_danh_muc FROM san_phams
            INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id";
            $stmt = $this->conn->prepare($sql); 
            $stmt->execute();
            
            return $stmt->fetchAll();
        }catch(Exception $e){
            echo "Lỗi: ".$e->getMessage();
        }
    }
  

    public function getDetailSanPham($id){
        try{
            $sql = "SELECT  san_phams.*, danh_mucs.ten_danh_muc 
            FROM san_phams
            INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id  
          WHERE san_phams.id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(
                [
                    ':id' => $id
                ]
            );
            return $stmt->fetch();
        }catch(Exception $e){
            echo "Lỗi: ".$e->getMessage();
        }
    }

    public function getListAnhSanPham($id){
        try{
            $sql = "SELECT * FROM hinh_anh_san_phams WHERE san_pham_id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(
                [
                    ':id' => $id
                ]
            );
            return $stmt->fetchAll();
        }catch(Exception $e){
            echo "Lỗi: ".$e->getMessage();
        }
    }
    public function getBinhLuanFromSanPham($id){
        try{
            $sql = "SELECT binh_luans.*, tai_khoans.ho_ten, tai_khoans.anh_dai_dien FROM binh_luans
            INNER JOIN tai_khoans ON binh_luans.tai_khoan_id = tai_khoans.id
            WHERE binh_luans.san_pham_id = :id" ;
            $stmt = $this->conn->prepare($sql); 
            $stmt->execute([':id'=>$id]);
            
            return $stmt->fetchAll();
        }catch(Exception $e){
            echo "Lỗi: ".$e->getMessage();
        }
    }


    private function getDanhMucId($id)
    {
        $sql = "SELECT danh_muc_id FROM san_phams WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id' => $id]);
        $result = $stmt->fetch();
        return $result['danh_muc_id'];
    }
    public function getListSanPhamdDanhMuc($id, $danh_muc_id){
        try{
            $sql = "SELECT san_phams.*, danh_mucs.ten_danh_muc FROM san_phams
            INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id
            WHERE san_phams.danh_muc_id = ".$danh_muc_id." AND san_phams.id <> ".$id;
            $stmt = $this->conn->prepare($sql); 
            $stmt->execute();
            
            return $stmt->fetchAll();
        }catch(Exception $e){
            echo "Lỗi: ".$e->getMessage();
        }
    }


    
    public function search($keyword)
    {
        try {
            $sql = "SELECT * FROM san_phams
            WHERE ten_san_pham LIKE :keyword
            ORDER BY luot_xem DESC";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':keyword' => '%' . $keyword . '%', // Use LIKE with wildcards
            ]);
    
            return $stmt->fetchAll();
        } catch (Exception $e) {
            throw new Exception("Error searching for products: " . $e->getMessage());
        }
    }

    public function top10(){
        try {
            $sql = "SELECT * FROM san_phams
            WHERE 1 ORDER BY luot_xem DESC LIMIT 10";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([]);
    
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }

    public function getAllDanhMuc(){
        try{
            $sql = "SELECT * FROM danh_mucs";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            
            return $stmt->fetchAll();
        }catch(Exception $e){
            echo "Lỗi: ".$e->getMessage();
        }
    }

    
    public function sanPhamTheoDanhMuc($id)
    {
        try {
            $sql = "SELECT san_phams.* FROM san_phams
            INNER JOIN danh_mucs ON danh_mucs.id  = san_phams.danh_muc_id
            WHERE san_phams.danh_muc_id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }

}
?>
