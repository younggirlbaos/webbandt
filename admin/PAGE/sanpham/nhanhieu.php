<?php include('../modules/connect.php');

// nếu bấm nút them
if (isset($_POST['them'])) {
    $namenhanhieu = $_POST['name'];
    $sql_add = "INSERT INTO `nhanhieu`(`nh_name`) VALUES ('$namenhanhieu') Limit 1";
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
                    <label for="namepd">Tên nhãn hiệu mới</label>
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
                        $sql_list_nhanhieu = "SELECT *FROM nhanhieu";
                        $query_sql_list_nhanhieu = mysqli_query($conn, $sql_list_nhanhieu);

                        ?>
                        <tr>
                            <th>Mã nhãn hiệu</th>
                            <th>Tênnhãn hiệu</th>
                        </tr>
                        <?php while ($row_nhanhieu = mysqli_fetch_array($query_sql_list_nhanhieu)) : ?>
                            <tr>
                                <td style="width:15%;"><?php echo $row_nhanhieu['nh_ma']; ?></td>
                                <td style="width:70%;"><?php echo $row_nhanhieu['nh_name']; ?></td>
                                <td><a href="admin.php?lam=nhanhieu&x=sua&id=<?php echo $row_nhanhieu['nh_ma']; ?>" style="color:green;">Sửa</a></td>
                            </tr>
                        <?php endwhile ?>
                    </table>
                </center>
            </div>
            <div class="edit">
                <?php //sửa nhãn hiệu
                if (isset($_GET['x'])) :
                    // lấy tên nhãn hiệu cần sủa
                    $id = $_GET['id'];
                    $sql_show_nhanhieu = "SELECT `nh_name` FROM `nhanhieu` WHERE nh_ma = '$id'";
                    $query_sql_show_nhanhieu = mysqli_query($conn, $sql_show_nhanhieu);
                    $row_show = mysqli_fetch_array($query_sql_show_nhanhieu);

                    //nếu admin bấm nút sửa
                    if (isset($_POST['sua'])) {
                        $newname = $_POST['namenh'];
                        $sql_edit = "UPDATE `nhanhieu` SET `nh_name`='$newname' WHERE nh_ma = '$id'";
                        $quey_sql_edit = mysqli_query($conn, $sql_edit);

                        echo '<script>alert("Sửa thành công")</script>';

                    }

                ?>

                    <br>
                    <hr>
                    <br>
                    <br>
                    <form action="" method="POST">
                        <label for="namepd">sửa nhãn hiệu</label>
                        <input type="text" name="namenh" placeholder="<?php echo $row_show['nh_name']; ?>" class="input_txt" required>
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