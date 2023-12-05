<style>
    .show_img {
        width: 40%;
        float: left;
    }

    .show_detail {
        text-align: center;
        width: 57%;
        float: right;
        border: 1px solid #343436;
    }

    .show_mota {

        clear: both;
        border: 1px solid #343436;
    }

    .show_detail a {
        background-color: #343436;
        color: gold;
        padding: 5px 15px;
        margin-top: 15px;
    }
</style>
<?php
include('modules/connect.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = '';
}
$sql_select_product = "SELECT * FROM sanpham WHERE s_ma = '$id'";
$query_sql_sql_select_product = mysqli_query($conn, $sql_select_product);
$row = mysqli_fetch_array($query_sql_sql_select_product);
?>
<section>
    <div class="container">
        <div class="show">
            <div class="show_img">
                <img src="admin/IMG/<?php echo $row['s_hinh']; ?>" alt="" width="100%">
            </div>
            <div class="show_detail">
                <h1><?php echo $row['s_ten']; ?></h1>
                <h2 style="color:green ;"><?php echo number_format($row['s_gia']) . " đ"; ?></h2>
                <br>
                <br>
                <a href="index.php?do=cart&id=<?php echo $row['s_ma']; ?>">Thêm vào gióa hàng</a>
            </div>
            <div class="show_mota">
                <h1>mô tả:</h1>
                <h2><?php echo $row['s_mota']; ?></h2>

            </div>

        </div>
    </div>
</section>