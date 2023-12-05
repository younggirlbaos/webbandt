<?php include('../modules/connect.php');

// nếu bấm nút them
if (isset($_POST['them'])) {
    $namemathang = $_POST['name'];
    $sql_add = "INSERT INTO `mathang`( `m_name`) VALUES ('$namemathang') Limit 1";
    $query_sql_add = mysqli_query($conn, $sql_add);
    echo '<script>alert("Thêm thành công")</script>';
    header("Refresh:0");
}





?>
<section>
    <div class="container">
        <div class="box">
            <div class="add">
                <form action="" method="POST">
                    <label for="namepd">Tên mặt hàng mới</label>
                    <input type="text" name="name" class="input_txt" required>
                    <input type="submit" name="them" value="Thêm" class="btn">
                </form>
                <br>
                <br>
                <hr>
            </div>
            <br>
            <!-- hiện thị mặt hang-->
            <div class="list">
                <center>
                    <table>
                        <?php
                        $sql_list_mathang = "SELECT *FROM mathang";
                        $query_sql_list_mathang = mysqli_query($conn, $sql_list_mathang);

                        ?>
                        <tr>
                            <th>Mã mặt hàng</th>
                            <th>Tên mặt hàng</th>
                        </tr>
                        <?php while ($row_mathang = mysqli_fetch_array($query_sql_list_mathang)) : ?>
                            <tr>
                                <td style="width:15%;"><?php echo $row_mathang['m_ma']; ?></td>
                                <td style="width:70%;"><?php echo $row_mathang['m_name']; ?></td>
                                <td><a href="admin.php?lam=mathang&x=sua&id=<?php echo $row_mathang['m_ma']; ?>" style="color:green;">Sửa</a></td>

                            </tr>
                        <?php endwhile ?>
                    </table>
                </center>
            </div>
            <div class="edit">
                <?php //sửa mặt hàng
                if (isset($_GET['x'])) :
                    // lấy tên mặt hàng cần sủa
                    $id = $_GET['id'];
                    $sql_show_mathang = "SELECT `m_name` FROM `mathang` WHERE m_ma = '$id'";
                    $query_sql_show_mathang = mysqli_query($conn, $sql_show_mathang);
                    $row_show = mysqli_fetch_array($query_sql_show_mathang);

                    //nếu admin bấm nút sửa
                    if (isset($_POST['sua'])) {
                        $newname = $_POST['namemh'];
                        $sql_edit = "UPDATE `mathang` SET `m_name`='$newname' WHERE m_ma = '$id'";
                        $quey_sql_edit = mysqli_query($conn, $sql_edit);

                        echo '<script>alert("Sửa thành công")</script>';
                        header("location:admin.php?lam=mathang");
                    }

                ?>

                    <br>
                    <hr>
                    <br>
                    <br>
                    <form action="" method="POST">
                        <label for="namepd">sửa mặt hàng</label>
                        <input type="text" name="namemh" placeholder="<?php echo $row_show['m_name']; ?>" class="input_txt" required>
                        <input type="submit" name="sua" value="Sửa" class="btn">
                    </form>
                <?php endif ?>
            </div>
        </div>
        <div class="menu">
            <div class="menu_item">
                <a href="admin.php?lam=qlsp" id="btn_back"><i class="fa-solid fa-arrow-left"></i> Quay Lại</a>
            </div>
        </div>

    </div>
</section>
<?php mysqli_close($conn); ?>