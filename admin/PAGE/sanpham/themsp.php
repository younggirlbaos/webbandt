<?php
include('../modules/connect.php');
if (isset($_POST['addpd'])) {
    $namesp = $_POST['namepd'];

    $pic_sp = $_FILES['picpd']['name'];
    $type = $_FILES['picpd']['type'];
    $size = $_FILES['picpd']['size'];
    $tmp = $_FILES['picpd']['tmp_name'];
    move_uploaded_file($tmp, 'IMG/' . $pic_sp);

    $nhanhieu = $_POST['nhanhieu'];
    $mathang = $_POST['mathang'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $description = $_POST['description'];

    $sql_add_product = "INSERT INTO `sanpham`(`s_ten`, `s_hinh`, `s_mathang`,`s_nhanhieu`, `s_gia`, `s_soluong`, `s_mota`) VALUES ('$namesp','$pic_sp','$mathang','$nhanhieu','$price','$stock','$description')";
    $query_sql_add_product = mysqli_query($conn,$sql_add_product);
    echo '<script>alert("Thêm sản phẩm thành công")</script>';


}

?>
<section>
    <div class="container">
        <form action="" class="box" method="POST" enctype="multipart/form-data">
            <label for="namepd">Tên Sản phẩm</label>
            <input type="text" name="namepd" placeholder="name product" class="input_txt" required>
            <label for="pic">Hình ảnh</label>
            <input type="file" name="picpd" placeholder="picture product" class="input_txt">

            <!-- hiện thị checkbox nhãn hiệu -->
            <label for="category">Nhãn hiệu</label>
            <!-- lấy dữ liệu trong bảng mặt hàng -->
            <select name="nhanhieu" id="">
                <?php
                $sql_nhanhieu = "SELECT * FROM `nhanhieu`";
                $query_sql_nhanhieu = mysqli_query($conn, $sql_nhanhieu);
                while ($row_nhanhieu = mysqli_fetch_array($query_sql_nhanhieu)) :?>
                    <option value="<?php echo $row_nhanhieu['nh_ma'] ?>"><?php echo $row_nhanhieu['nh_name'] ?></option>
                <?php endwhile;
                ?>
            </select><br><br>

            <!-- hiện thị checkbox mặt hàng -->
            <label for="category">Mặt hàng</label>
            <!-- lấy dữ liệu trong bảng mặt hàng -->
            <select name="mathang" id="">
                <?php
                $sql_mathang = "SELECT * FROM `mathang`";
                $query_sql_mathang = mysqli_query($conn, $sql_mathang);
                while ($row_mathang = mysqli_fetch_array($query_sql_mathang)) :?>
                    <option value="<?php echo $row_mathang['m_ma'] ?>"><?php echo $row_mathang['m_name'] ?></option>
                <?php endwhile;
                mysqli_close($conn);
                ?>
            </select><br><br>
            
            <label for="price">Giá sản phẩm</label>
            <input type="number" name="price" placeholder="price" class="input_txt" required>
            <label for="stock">Số lượng</label>
            <input type="number" name="stock" placeholder="stock" class="input_txt" required>
            <label for="description">Mô tả</label>
            <textarea name="description" id="" cols="30" rows="10" class="input_txt"></textarea>
            <input type="submit" name="addpd" value="Thêm sản phẩm mới" class="btn"><br><br>
        </form>
        <div class="menu">
            <div class="menu_item">
                <a href="admin.php?lam=qlsp" id="btn_back"><i class="fa-solid fa-arrow-left"></i> Quay Lại</a>
            </div>
        </div>
    </div>
</section>