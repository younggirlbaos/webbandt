<?php
include('../modules/connect.php');

// lấy thông tin sản phẩm cần sửa
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql_get_sanpham = "SELECT * FROM sanpham WHERE s_ma = '$id'";
    $query_sql_get_sanpham = mysqli_query($conn, $sql_get_sanpham);
    $row_sanpham = mysqli_fetch_array($query_sql_get_sanpham);
}

// sửa sản phẩm
if(isset($_POST['suasp'])){

    // lấy thông tin mới của sản phẩm
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

    //nếu không có hình mới
    if($pic_sp == ''){
        $sql_sua_sp = "UPDATE sanpham
                       SET s_ten = '$namesp',
                           s_mathang = '$mathang',
                           s_nhanhieu =  '$nhanhieu',
                           s_gia ='$price',
                           s_soluong = '$stock',
                           s_mota = '$description'";
        $query_sql_sua_sp = mysqli_query($conn,$sql_sua_sp);
    }
    echo '<script>alert("thành công")</script>';
    header('location:admin.php?lam=dssp');
}

?>
<section>
    <div class="container">
        <form action="" class="box" method="POST" enctype="multipart/form-data">
            <label for="namepd">Tên Sản phẩm</label>
            <input type="text" name="namepd" value="<?php echo $row_sanpham['s_ten']; ?>" class="input_txt" required>
            <label for="pic">Hình ảnh</label><br>
            <img src="../admin/IMG/<?php echo $row_sanpham['s_hinh']; ?>" width="100px">
            <input type="file" name="picpd"  class="input_txt">

            <!-- hiện thị checkbox nhãn hiệu -->
            <label for="category">Nhãn hiệu</label>
            <!-- lấy dữ liệu trong bảng mặt hàng -->
            <select name="nhanhieu" id="">
                <?php
                $sql_nhanhieu = "SELECT * FROM `nhanhieu`";
                $query_sql_nhanhieu = mysqli_query($conn, $sql_nhanhieu);
                while ($row_nhanhieu = mysqli_fetch_array($query_sql_nhanhieu)) :
                    if ($row_nhanhieu['nh_ma'] == $row_sanpham['s_nhanhieu']) : ?>
                        <option value="<?php echo $row_nhanhieu['nh_ma'] ?>" selected><?php echo $row_nhanhieu['nh_name'] ?></option>
                    <?php else : ?>
                        <option value="<?php echo $row_nhanhieu['nh_ma'] ?>"><?php echo $row_nhanhieu['nh_name'] ?></option>
                <?php endif;
                endwhile; ?>
            </select><br><br>

            <!-- hiện thị checkbox mặt hàng -->
            <label for="category">Mặt hàng</label>
            <!-- lấy dữ liệu trong bảng mặt hàng -->
            <select name="mathang" id="">
                <?php
                $sql_mathang = "SELECT * FROM `mathang`";
                $query_sql_mathang = mysqli_query($conn, $sql_mathang);
                while ($row_mathang = mysqli_fetch_array($query_sql_mathang)) :
                    if($row_mathang['m_ma'] == $row_sanpham['s_mathang']):
                ?>
                        <option value="<?php echo $row_mathang['m_ma'] ?>" selected><?php echo $row_mathang['m_name'] ?></option>
                    <?php else: ?>
                        <option value="<?php echo $row_mathang['m_ma'] ?>"><?php echo $row_mathang['m_name'] ?></option>
                <?php endif; endwhile;
                mysqli_close($conn);
                ?>
            </select><br><br>

            <label for="price">Giá sản phẩm</label>
            <input type="number" name="price" value="<?php echo $row_sanpham['s_gia'] ?>" class="input_txt" required>
            <label for="stock">Số lượng</label>
            <input type="number" name="stock" value="<?php echo $row_sanpham['s_soluong'] ?>" class="input_txt" required>
            <label for="description">Mô tả</label>
            <textarea name="description" id="" cols="30" rows="10" placeholder="<?php echo $row_sanpham['s_mota'] ?>" class="input_txt"></textarea>
            <input type="submit" name="suasp" value="Sủa sản phẩm" class="btn"><br><br>
        </form>
        <div class="menu">
            <div class="menu_item">
                <a href="admin.php?lam=qlsp" id="btn_back"><i class="fa-solid fa-arrow-left"></i> Quay Lại</a>
            </div>
        </div>
    </div>
</section>