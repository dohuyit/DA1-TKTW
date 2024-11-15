<?php
class AdminBinhLuanController{
    public $modelDanhMuc;
    public $modelBinhLuan;

    public function __construct()
    {
        $this->modelDanhMuc = new AdminDanhMuc();
        $this->modelBinhLuan = new AdminBinhLuan();
    }

    public function updateTrangThaiBinhLuan()
    {
        //  var_dump($_POST);die();
        $id_binh_luan = $_POST['id_binh_luan'];
        $name_view = $_POST['name_view'];


        $binhLuan = $this->modelBinhLuan->getDetailBinhLuan($id_binh_luan);

        if ($binhLuan) {
            $trang_thai_update = '';
            if ($binhLuan['trang_thai'] == 1) {
                $trang_thai_update = 2;
            } else {
                $trang_thai_update = 1;
            }
            $status = $this->modelBinhLuan->updateTrangThaiBinhLuan($id_binh_luan, $trang_thai_update);

            if ($status) {
                if ($name_view == 'detail_khach') {
                    header('Location:' . BASE_URL_ADMIN . '?act=chi-tiet-khach-hang&id_khach_hang=' . $binhLuan['tai_khoan_id']);
                    // exit();
                } else {
                    header('Location:' . BASE_URL_ADMIN . '?act=chi-tiet-san-pham&id_san_pham=' . $binhLuan['san_pham_id']);
                }
            }
        }
    }


    public function xoaBinhLuan()
    {
        //  var_dump($_POST);die();
        $id_binh_luan = $_POST['id_binh_luan'];
        // $name_view = $_POST['name_view'];
        $xoa = $this->modelBinhLuan->deleteBinhLuan($id_binh_luan);
        // var_dump($xoa);die();


        $binhLuan = $this->modelBinhLuan->getDetailBinhLuan($id_binh_luan);
       
        // die();
        // $status = $this->modelBinhLuan->updateTrangThaiBinhLuan($id_binh_luan, $trang_thai_update);
        header('Location:' . BASE_URL_ADMIN . '?act=chi-tiet-san-pham&id_san_pham=' . $binhLuan['san_pham_id']);
    }

    
    public function xoaBinhLuanKhachHang()
    {
        //  var_dump($_POST);die();
        $id_binh_luan = $_POST['id_binh_luan'];
        $tai_khoan_id = $_POST['tai_khoan_id'];
        // var_dump($tai_khoan_id);die();
        // $name_view = $_POST['name_view'];
        $xoa = $this->modelBinhLuan->deleteBinhLuan($id_binh_luan);
        // var_dump($xoa);die();


        $binhLuan = $this->modelBinhLuan->getDetailBinhLuan($id_binh_luan);
       
        // die();
        // $status = $this->modelBinhLuan->updateTrangThaiBinhLuan($id_binh_luan, $trang_thai_update);
        header("Location: " . BASE_URL_ADMIN . '?act=chi-tiet-khach-hang&id_khach_hang=' . $tai_khoan_id);

    }
}

