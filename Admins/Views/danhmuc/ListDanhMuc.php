<div class="row">
    <div class="row title">
        <h1>DANH SÁCH LOẠI HÀNG</h1>
    </div>
    <div class="row form content">
        <div class="row">
            <table>
                <tr>
                    <th></th>
                    <th>Mã loại</th>
                    <th>Tên loại</th>
                    <th></th>
                </tr>
                <?php
                    foreach($listdanhmuc as $danhmuc){
                        extract($danhmuc);
                        $update="index.php?act=update&id=".$id;
                        $delete="index.php?act=delete&id=".$id;
                        echo'
                    <tr>
                        <td><input type="checkbox"></td>
                        <td>'.$id.'</td>
                        <td>'.$name.'</td>
                        <td>
                            <a href="'.$update.'"><input type="button" value="Sửa"></a>
                            <a href="'.$delete.'"><input type="button" value="Xóa"></a>
                        </td>
                    </tr>';
                    }
                ?>
            </table>
        </div>
        <div class="row">
            <input type="button" value=" Chọn tất cả">
            <input type="button" value="Bỏ chọn tất cả">
            <input type="button" value="Xóa các mục đã chọn">
            <a href="index.php?act=list"><input type="button" value="Nhập thêm"></a>
        </div>
    </div>
</div>