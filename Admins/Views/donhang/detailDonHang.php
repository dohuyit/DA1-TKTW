<?php include './Views/layout/header.php' ?>
<!-- Navbar -->
<?php include './Views/layout/navbar.php' ?>

<!-- /.navbar -->

<!-- Main Sidebar Container -->
<?php include './Views/layout/sidebar.php' ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-9">
                    <h1>Quản lý danh sách đơn hàng: <?= $donHang['ma_don_hang'] ?></h1>
                </div>
                <div class="col-sm-3">
                 
                </div>
            </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                <?php
if (isset($donHang['trang_thai_id'])) {
    if ($donHang['trang_thai_id'] == 1) {
        $colorAlerts = 'primary';
    } elseif ($donHang['trang_thai_id'] >= 2 && $donHang['trang_thai_id'] <= 9) {
        $colorAlerts = 'warning';
    } elseif ($donHang['trang_thai_id'] == 10) {
        $colorAlerts = 'success';
    } else {
        $colorAlerts = 'danger';
    }
} else {
    // Xử lý trường hợp khi khóa 'trang_thai_id' không tồn tại
    $colorAlerts = 'danger';
}
?>
                    <div class="alert alert-<?=$colorAlerts?>" role="alert">
                        Đơn hàng: <?=$donHang['ten_trang_thai']?>
                    </div>


                    <!-- Main content -->
                    <div class="invoice p-3 mb-3">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-12">
                                <h4>
                                    <img src="<?=BASE_URL . 'Common/assets/image/logo.png'?>" alt="" width="120">
                                    <small class="float-right">Ngày đặt: <?= formatDate($donHang['ngay_dat']);?></small>
                                </h4>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- info row -->
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                               Thông tin người đặt
                                <address>
                                    <strong><?=$donHang['ho_ten']?></strong><br>
                                    Email: <?=$donHang['email'] ?><br>
                                    Số điện thoại: <?=$donHang['so_dien_thoai'] ?><br>
                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                Người nhận
                                <address>
                                    <strong><?=$donHang['ten_nguoi_nhan'] ?></strong><br>
                                    Email: <?=$donHang['email_nguoi_nhan'] ?><br>
                                    Số điện thoại: <?=$donHang['sdt_nguoi_nhan'] ?><br>
                                    Địa chỉ: <?=$donHang['dia_chi_nguoi_nhan'] ?><br>
                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                Thông tin
                                <address>
                                    <strong>Mã đơn hàng: <?=$donHang['ma_don_hang'] ?></strong><br>
                                    Tổng tiền: <?=$donHang['tong_tien'] ?><br>
                                    Ghi chú: <?=$donHang['ghi_chu'] ?><br>
                                    Địa chỉ: <?=$donHang['dia_chi_nguoi_nhan'] ?><br>
                                    Thanh toán: <?=$donHang['ten_phuong_thuc'] ?> <br>
                                </address>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- Table row -->
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Đơn giá</th>
                                            <th>Số lượng</th>
                                            <th>Thành tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $tong_tien = 0;?>
                                        <?php foreach($sanPhamDonHang as $key=>$sanPham) :?>
                                        <tr>
                                            <td><?= $key+1?></td>
                                            <td><?= $sanPham['ten_san_pham']?></td>
                                            <td><?= $sanPham['don_gia']?></td>
                                            <td><?= $sanPham['so_luong']?></td>
                                            <td><?= $sanPham['thanh_tien']?></td>
                                        </tr>
                                        <?php $tong_tien += $sanPham['thanh_tien']; ?>
                                        <?php endforeach?>
                                        
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <div class="row">
                            <!-- accepted payments column -->

                            <!-- /.col -->
                            <div class="col-6">
                                <p class="lead">Ngày đặt hàng: <?=$donHang['ngay_dat'] ?></p>

                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <th style="width:50%">Thành tiền:</th>
                                            <!-- <td><?=$tong_tien?></td> -->
                                             <td><?=$tong_tien ?></td>
                                        </tr>
                                        <tr>
                                            <th>Vận chuyển:</th>
                                            <td>200000</td>
                                        </tr>
                                        <tr>
                                            <th>Tổng tiền:</th>
                                            <td><?=$tong_tien + 200000?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- this row will not appear when printing -->
                        
                    </div>
                    <!-- /.invoice -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>


    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!--footer-->
<?php include './Views/layout/footer.php'; ?>

<!-- /.control-sidebar -->
</div>
<script>
    
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
    var faqs_row = 0;

    function addfaqs() {

        html = '<tr id="faqs-row' + faqs_row + '">';
        html += '<td><input type="text" class="form-control" placeholder="User name"></td>';
        html += '<td><input type="text" placeholder="Product name" class="form-control"></td>';
        html += '<td class="text-danger mt-10"> 18.76% <i class="fa fa-arrow-down"></i></td>';
        html += '<td class="mt-10"><button class="badge badge-danger" onclick="$(\'#faqs-row' + faqs_row + '\').remove();"><i class="fa fa-trash"></i> Delete</button></td>';

        html += '</tr>';

        $('#faqs tbody').append(html);

        faqs_row++;
    }
</script>
</body>

</html>