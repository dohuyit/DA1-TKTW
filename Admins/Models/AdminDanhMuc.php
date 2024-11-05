<?php
    class AdminDanhMuc{
        public $conn;
        public function __construct()
        {
            $this->conn = connectDB();
        }
        public function insert_danhmuc($ten_danh_muc){
            try{
                $sql= "INSERT INTO danh_mucs (ten_danh_muc) values(:ten_danh_muc)";
                $stmt = $this->conn->prepare($sql);
                $stmt ->execute(
                    [
                        ':ten_danh_muc' => $ten_danh_muc,
                    ]
                    );
                return true;
            }catch(Exception $e){
                echo "Lỗi: ".$e->getMessage();
            }
        }

        public function delete_danhmuc($id){
            try{
                $sql = "DELETE FROM danh_mucs WHERE id = :id";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute(
                    [
                        ':id' => $id,
                    ]
                );
                return true;
            }catch(Exception $e){
                echo "Lỗi: ".$e->getMessage();
            }

        }

        public function getAllDanhMuc(){
            try{
                $sql = "SELECT * FROM danh_mucs";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute();
                return $stmt->fetchAll();
            }catch(Exception $e){
                echo"Lỗi: ".$e->getMessage();
            }
        }

        public function getDetailDanhMuc($id){
            try{
                $sql = "SELECT * FROM danh_mucs WHERE id = :id";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute(
                    [
                        ':id'=> $id
                    ]
                );
                return $stmt->fetch();
                
            }catch(Exception $e){
                echo"Lỗi: ".$e->getMessage();
            }
        }

        public function update_danhmuc($id, $ten_danh_muc){
            try{
                $sql = "UPDATE danh_mucs SET ten_danh_muc = :ten_danh_muc WHERE id = :id";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute(
                    [
                        ':ten_danh_muc' => $ten_danh_muc,
                        ':id' => $id 
                    ]
                );
                return true;
            }catch(Exception $e){
                echo"Lỗi: ".$e->getMessage();
            }
        
        }
        
    }
?>