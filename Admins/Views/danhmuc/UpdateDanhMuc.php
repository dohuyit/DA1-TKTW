<?php
    if(is_array($dm)){
        extract($dm);
    }
?>
    <div class="row"></div>
        <div class="row title">
            <h1>Cập nhật loại hàng hóa</h1>
        </div>

        <div class="row form_content">
            <form action="index.php?act=updatedm" method="POST">
                <div class="row">
                    Mã loại <br>
                    <input type="text" name="maloai">
                </div>
                <div class="row">
                    Tên loại <br>
                    <input type="text" name="tenloai" value="<?php if(isset($name) && ($name!="")) echo $name; ?>">
                </div>
                <div class="row">
                    <input type="hidden" name="id" value="<?php if(isset($id) && ($id>0)) echo $id; ?>">
                    <input type="submit" name="capnhat" value="Cập nhật">
                    <input type="reset" value="Nhập lại">
                    <a href="index.php?act=listdm"><input type="button" name="listdm" value="Danh sách"></a>
                </div>
                <?php
                    if(isset($thongbao)&&($thongbao!= ""))
                    echo $thongbao;
                ?>
                </form>
            </div>
        </div>
    </div>