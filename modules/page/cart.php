<?php
session_start();
include('modules/connect.php');

//nếu khách bấm nút đăng xuất
if (isset($_GET['x'])) {
    if ($_GET['x'] == 'logout') {
        session_destroy();
        header('location:index.php?do=home');
    }
}

//thêm sảm phẩm nhận đã từ trang Detail 
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $newProduct = array();
    $query_sql_select_id_pd = $conn->query("SELECT * FROM sanpham WHERE s_ma = '$id'");
    $row = $query_sql_select_id_pd->fetch_array();
    $newProduct[$row['s_ma']] = array('id' => $row['s_ma'], 'namepd' => $row['s_ten'], 'Qty' => '', 'price' => $row['s_gia']);
    echo "<pre>";
    if (!isset($_SESSION['cartdt']) || $_SESSION['cartdt'] == null) {
        $newProduct[$id]['Qty'] = 1;
        $_SESSION['cartdt'][$id] = $newProduct[$id];
    } else {
        if (array_key_exists($id, $_SESSION['cartdt'])) {
            $_SESSION['cartdt'][$id]['Qty'] += 1;
        } else {
            $newProduct[$id]['Qty'] = 1;
            $_SESSION['cartdt'][$id] = $newProduct[$id];
        }
    }
    header('location:index.php?do=cart');
}
//------------------------------------------------------------------------------------------------------------------




//nút tăng,giảm,xóa sản phẩm
if (isset($_GET['active'])) {
    $id = $_GET['activeid'];
    switch ($_GET['active']) {
        case 'reduce':
            if ($_SESSION['cartdt'][$id]['Qty'] > 1) {
                $_SESSION['cartdt'][$id]['Qty'] -= 1;
            } else {
                $_SESSION['cartdt'][$id]['Qty'] = $_SESSION['cart'][$id]['Qty'];
            }
            header('location:index.php?do=cart');
            break;
        case 'increase':
            $_SESSION['cartdt'][$id]['Qty'] += 1;
            header('location:index.php?do=cart');
            break;
        case 'delete':
            unset($_SESSION['cartdt'][$id]);
            header('location:index.php?do=cart');
            break;
    }
}
//------------------------------------------------------------------------------------------------------------------
?>
<section>
    <div class="container">
        <div class="box_cart">

            <!-- nếu khách đã đăng nhập đăng ký -->
            <?php if (isset($_SESSION['nameKHh'])) : ?>
                <div class="box_user">
                    <h2>Welcome <?php echo $_SESSION['nameKHh']; ?></h2>
                </div>
            <?php endif ?>

            <!-- thông tin sản phẩm khách đẫ thêm vào gió hàng -->
            <?php if ($_SESSION['cartdt'] != null) : ?>
                <center>
                    <table border="1">
                        <tr>
                            <th>
                                STT
                            </th>
                            <th>
                                TÊN SẢN PHẨM
                            </th>
                            <th>
                                HÌNH
                            </th>
                            <th>
                                SỐ LƯỢNG
                            </th>
                            <th>
                                GÍA/Cái
                            </th>
                            <th>
                                TỔNG TIỀN
                            </th>
                        </tr>
                        <?php
                        $tatal_quantity = 0;
                        $tatal_price = 0;
                        $No = 1;

                        foreach ($_SESSION['cartdt'] as $item) :
                            $query = $conn->query("SELECT * FROM sanpham WHERE s_ma=" . $item['id']);
                            $row = $query->fetch_array();
                            $tatal_quantity = $item['price'] * $item['Qty'];
                            $tatal_price += $tatal_quantity; ?>
                            <tr>
                                <td>
                                    <?php echo $No;
                                    $No++; ?>
                                </td>
                                <td align="center">
                                    <?php echo $item['namepd']; ?>
                                </td>
                                <td>
                                    <img src="admin/IMG/<?php echo $row['s_hinh']; ?>" alt="" width="100px">
                                </td>
                                <td align="center">
                                    <a href="index.php?do=cart&active=reduce&activeid=<?php echo $item['id']; ?>"><i class="fa-solid fa-circle-minus"></i></a>
                                    <?php echo $item['Qty']; ?>
                                    <a href="index.php?do=cart&active=increase&activeid=<?php echo $item['id']; ?>"><i class="fa-solid fa-circle-plus"></i></a>
                                </td>
                                <td align="center">
                                    <?php echo number_format($item['price']); ?>
                                </td>
                                <td align="center">
                                    <?php echo number_format($tatal_quantity) ?>
                                </td>
                                <td align="center">
                                    <a href="index.php?do=cart&active=delete&activeid=<?php echo $item['id']; ?>"><i class="fa-solid fa-trash-can"></i></a>
                                </td>

                            </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td colspan="5" style="text-align:right ;">THÀNH TOÁN</td>
                            <td><?php echo number_format($tatal_price) . " đ";
                                $_SESSION['tatal'] = $tatal_price; ?></td>
                        </tr>
                    </table>
                </center>
                <!-- nếu chưa chọn sản phẩm -->
            <?php else : ?>
                <div class="box_prduct">
                    <h2>chua co san pham</h2>
                </div>
            <?php endif ?>


            <!-- nếu khách đã đăng nhập đăng ký -->
            <?php if (isset($_SESSION['nameKHh'])) : ?>
                <div class="box_user">
                    <a href="index.php?do=cart&x=logout">Đăng xuất</a>
                </div>
            <?php endif ?>

            <!-- nếu chưa có sản phẩm trên gió hàng thì không hiện thị nút đặt hàng -->
            <?php if ($_SESSION['cartdt'] != null) : ?>
                <div class="box">
                    <div class="btn_order" style="text-align: center;">
                        <a href="index.php?do=order&x" style="background-color:green;color:white;">ĐẶT HÀNG</a>
                    </div>
                </div>
            <?php endif ?>
        </div>
        <?php mysqli_close($conn); ?>
    </div>
</section>