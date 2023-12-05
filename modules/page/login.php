<?php
    session_start();
    include('modules/connect.php');

    //nếu khách bấm nút đăng nhập
    if(isset($_POST['login'])){
        $email = $_POST['email'];
        $pass = $_POST['pass'];

        //kiểm tra email và mặt khẩu trong csdl
        $sql_check_user = "SELECT k_hoTen, `k_email`, `k_matKhau` FROM `khachhang` WHERE k_email = '$email'";
        $query_sql_check_user = mysqli_query($conn,$sql_check_user);

        //nếu có email trong csdl
        if(mysqli_num_rows($query_sql_check_user) == 1){
            if($row = mysqli_fetch_array($query_sql_check_user)){

                //nếu email va mật khẩu đúng
                if($pass == $row['k_matKhau']){
                    //nhớ tên khách
                    $_SESSION['nameKHh'] = $row['k_hoTen'];

                    //đi giỏ hàng
                    header('location:index.php?do=cart');
                }
                //ngược lại mật khẩu sai
                else{
                    echo '<script>alert("Mật khẩu không đúng")</script>';
                }
            }

        //ngược lại không có email trong csdl
        }else{
            echo '<script>alert("email không đúng")</script>';
        }
    }
    mysqli_close($conn);
?>
<section>
    <div class="container">
        <form action="" class="fr_box" method="POST">
            <label for="email">Địa chỉ email</label>
            <input type="email" name="email" placeholder="email" class="input_txt" required>
            <label for="password">Mật khẩu</label>
            <input type="password" name="pass" placeholder="password" class="input_txt" required>
            <input type="submit" name="login" value="Đăng nhập" class="btn"><br><br>
            <a href="index.php?do=register">Link đăng ký</a>
        </form>
    </div>
</section>