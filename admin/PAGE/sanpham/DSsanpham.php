<?php
include('../modules/connect.php');

//nút xóa
if (isset($_GET['xoa'])) {
    $id = $_GET['xoa'];
    $sql_xoa = "DELETE FROM `sanpham` WHERE s_ma = '$id'";
    $query_sql_xoa = mysqli_query($conn, $sql_xoa);
    echo '<script>alert("Xóa thành công")</script>';
    header('location:admin.php?lam=dssp');
}

?>
<section>
    <div class="container">
        <div class="box">
            <div class="list">
                <center>
                    <table>
                        <?php
                        $sql_list_sanpham = "SELECT * FROM `sanpham`,nhanhieu,mathang WHERE sanpham.s_nhanhieu = nhanhieu.nh_ma AND sanpham.s_mathang = mathang.m_ma;";
                        $query_sql_list_sanpham = mysqli_query($conn, $sql_list_sanpham);

                        ?>
                        <tr>
                            <th>Mã</th>
                            <th>Tên</th>
                            <th>Hình</th>
                            <th>Nhãn hiệu</th>
                            <th>Mặt hàng</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Mô tả</th>

                        </tr>
                        <?php while ($row_sanpham = mysqli_fetch_array($query_sql_list_sanpham)) : ?>
                            <tr>
                                <td align="center"><?php echo $row_sanpham['s_ma']; ?></td>
                                <td align="center"><?php echo $row_sanpham['s_ten']; ?></td>
                                <td align="center"><img src="../admin/IMG/<?php echo $row_sanpham['s_hinh']; ?>" width="60px"></td>
                                <td align="center"><?php echo $row_sanpham['nh_name']; ?></td>
                                <td align="center"><?php echo $row_sanpham['m_name']; ?></td>
                                <td align="center"><?php echo number_format($row_sanpham['s_gia']); ?></td>
                                <td align="center"><?php echo $row_sanpham['s_soluong']; ?></td>
                                <td align="center"><?php echo $row_sanpham['s_mota']; ?></td>
                                <td align="center"><a href="admin.php?lam=suasp&id=<?php echo $row_sanpham['s_ma']; ?>" style="color:green;">Sửa</a></td>
                                <td align="center"><a href="admin.php?lam=dssp&xoa=<?php echo $row_sanpham['s_ma']; ?>" style="color:red;">Xóa</a></td>
                            </tr>
                        <?php endwhile ?>
                    </table>
                </center>
            </div>
            <div class="menu">
                <div class="menu_item">
                    <a href="admin.php?lam=qlsp" id="btn_back"><i class="fa-solid fa-arrow-left"></i> Quay Lại</a>
                </div>
            </div>
        </div>
    </div>
</section>