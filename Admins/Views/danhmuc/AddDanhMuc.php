<div class="row">
    <div class="row title">
        <h1>THÊM MỚI HÀNG HÓA</h1>
    </div>
    <div class="row form_content">
        <form action="index.php?act=list" method="POST">
            <div class="row">
                Mã loại<br>
                <input type="text" name="maloai">
            </div>
            <div class="row">
                Tên loại<br>
                <input type="text" name="tenloai">
            </div>
            <div class="row">
                <input type="submit" name="add" value="Thêm mới">
                <input type="reset" value="Nhập lại">
                <a href="index.php?act=listdm">
                    <input type="button" name="listdm" value="Danh sách">
                </a>
            </div>
            <?php
                if(isset($thongbao) && ($thongbao!== "")){
                    echo $thongbao;
                }
            ?>
        </form>
    </div>
</div>