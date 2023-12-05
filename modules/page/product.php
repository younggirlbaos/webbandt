<?php
include('modules/connect.php');

if (isset($_GET['trang'])) {
    $trang = $_GET['trang'];
} else {
    $trang = 1;
}
$sosangpham1trang = 14;
$phantrang = ($trang * $sosangpham1trang) - $sosangpham1trang;
$sql = "SELECT * FROM sanpham LIMIT $phantrang,$sosangpham1trang";
$query_sql = mysqli_query($conn, $sql);


?>
<section>
    <div class="container">
        <div class="box_product">
            <div class="show_product">
                <?php while ($row_product = mysqli_fetch_array($query_sql)) : ?>
                    <div class="product">
                        <a href="index.php?do=detail&id=<?php echo $row_product['s_ma'] ?>">
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
            </div>
            <?php //phân trang	
            $sql_phantrang = "SELECT * FROM sanpham";
            $query_phantrang = mysqli_query($conn, $sql_phantrang);
            $row_phantrang = mysqli_num_rows($query_phantrang);
            $sotrang = ceil($row_phantrang / $sosangpham1trang);
            $tentrang = "product";
            include('phantrang.php'); ?>
        </div>
    </div>
</section>