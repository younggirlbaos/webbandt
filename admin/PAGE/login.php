<?php
    include('../modules/connect.php');

    //nếu admin bấm nút đăng nhập
    if(isset($_POST['login'])){
        $user = $_POST['username'];
        $pass = $_POST['pass'];

        //kiểm tra user và mặt khẩu trong csdl
        $sql_check_user = "SELECT * FROM nhanvien WHERE n_username = '$user'";
        $query_sql_check_user = mysqli_query($conn,$sql_check_user);

        //nếu có user trong csdl
        if(mysqli_num_rows($query_sql_check_user) == 1){
            if($row = mysqli_fetch_array($query_sql_check_user)){

                //nếu user va mật khẩu đúng
                if($pass == $row['n_password']){
                    //nhớ tên khách
                    $_SESSION['admin'] = $row['n_username'];
                    //đi giỏ hàng
                    header('location:admin.php');
                }
                //ngược lại mật khẩu sai
                else{
                    echo '<script>alert("Mật khẩu không đúng")</script>';
                }
            }

        //ngược lại không có email trong csdl
        }else{
            echo '<script>alert("username không đúng")</script>';
        }
    }
    mysqli_close($conn);
?>
<section>
    <div class="container">
        <form action="" class="fr_box" method="POST">
            <label for="email">username</label>
            <input type="text" name="username" placeholder="username" class="input_txt" required>
            <label for="password">Mật khẩu</label>
            <input type="password" name="pass" placeholder="password" class="input_txt" required>
            <input type="submit" name="login" value="Đăng nhập" class="btn"><br><br>
        </form>
    </div>
</section>