<?php
include('modules/connect.php');

//lấy mặt hàng
$sql_select_mathang = "SELECT * FROM mathang";
$query_sl_select_mathang = mysqli_query($conn, $sql_select_mathang);
?>
<nav>
    <div class="container">
        <div class="nav-menu">
            <ul>
                <li><a href="index.php?do=home"><i class="fa-solid fa-house"></i>&nbsp;trang chủ</a></li>
                <li><a href="index.php?do=product">sản phẩm&nbsp;<i class="fa-solid fa-caret-down"></i></a>
                    <ul class="sub_menu">
                        <?php
                        //hiện thị mặt hàng
                        while ($row = mysqli_fetch_array($query_sl_select_mathang)) :
                        ?>
                            <li><a href="index.php?do=search&data=<?php echo $row['m_ma']; ?>"><?php echo $row['m_name']; ?></a></li>
                        <?php endwhile;
                        mysqli_close($conn) ?>
                    </ul>
                </li>
                <li><a href="index.php?do=register">đăng ký</a></li>
                <li><a href="index.php?do=login"><i class="fa-solid fa-arrow-right-to-bracket"></i>&nbsp;đăng nhập</a></li>
                <li><a href="index.php?do=cart"><i class="fa-solid fa-cart-shopping"></i>&nbsp;giỏ hàng</a></li>
                <li><a href="index.php?do=contact"><i class="fa-solid fa-phone"></i>&nbsp;liên hệ</a></li>
            </ul>
        </div>
    </div>
</nav>