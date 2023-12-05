<?php
include('modules/connect.php');
// nếu khách chọn mặt hàng trên menu bar
if (isset($_GET['data'])) {
    $id = $_GET['data'];

    $sql_select_prodct = "SELECT * FROM sanpham WHERE s_mathang = '$id' ORDER BY RAND()";
    $query_sql_sql_select_product = mysqli_query($conn, $sql_select_prodct);
}

// nếu khách hàng search
if (isset($_POST['search'])) {
    $txt = $_POST['txt_search'];
    $sql_select_product = "SELECT * FROM sanpham WHERE s_ten LIKE '%$txt%' OR s_mota LIKE '%$txt%'";
    $query_sql_sql_select_product = mysqli_query($conn, $sql_select_product);
}
?>
<section>
    <div class="container">
        <div class="box_product">
            <div class="show_product">
                <?php if (mysqli_num_rows($query_sql_sql_select_product) == 0) : ?>
                    <h1>Chưa có sản phẩm này</h1>
                <?php else : ?>
                    <?php while ($row_product = mysqli_fetch_array($query_sql_sql_select_product)) : ?>
                        <div class="product">
                            <a href="index.php?do=detail&id=<?php echo $row_product['s_ma']?>">
                                <div class="product_item">
                                    <div class="product-thumbnail">
                                        <img src="admin/IMG/<?php echo $row_product['s_hinh']; ?>" alt="" width="100%">
                                        <h4><?php echo $row_product['s_ten']; ?></h4>
                                        <hr>
                                    </div>
                                    <div class="product_info">
                                        <h4 style="color:green">Giá: <?php echo number_format($row_product['s_gia']) . " đ"; ?></h4>
                                        <hr>
                                        <h4>Mô tả: <br><?php echo $row_product['s_mota']; ?></h4>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endwhile ?>
                <?php endif ?>
            </div>

        </div>
    </div>
</section>