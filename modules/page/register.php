<?php 
    session_start();
    //gọi msql connect
    include('modules/connect.php');

    //nếu khách bấm vào nút đăng ký
    if(isset($_POST['register'])){
        //lấy thông tin của khách vào biến
        $name = $_POST['name'];
        $email = $_POST['email'];
        $pass1 = $_POST['pass1'];
        $pass2 = $_POST['pass2'];
        $phone = $_POST['phone_number'];
        $address = $_POST['address'];

        //kiểm tra mật khẩu1 và 2 giống nhâu hay không
        if($pass1 != $pass2){
            //nếu không giống nhâu thì thông báo
            echo '<script>alert("Mật khẩu không giống nhau")</script>';
        }else{
            //nếu giống nhâu thì kiểm tra email có trong csdl chưa
            $sql_check_email = "SELECT k_email FROM khachhang WHERE k_email = '$email'";
            $query_sql_check_email = mysqli_query($conn,$sql_check_email);

            //nếu có email trong csdl thi thong bao
            if(mysqli_num_rows($query_sql_check_email) != 0){
                echo '<script>alert("email này đã có")</script>';

            //nếu chưa có email
            }else{
                $sql_add = "INSERT INTO `khachhang`(`k_hoTen`, `k_email`, `k_matKhau`, `k_sdt`, `k_diachi`) VALUES ('$name','$email','$pass1','$phone','$address')";
                $query_sql_add = mysqli_query($conn,$sql_add);

                //nhớ tên khách hàng
                $_SESSION['nameKHh'] = $name;
                // đi trng giỏ hàng
                header('location:index.php?do=cart');
            }

        }
    }
    mysqli_close($conn);
?>
<section>
    <div class="container">
        <form action="" class="fr_box" method="POST">
            <label for="name">Họ và tên</label>
            <input type="text" name="name" placeholder="name & lastname" class="input_txt" required>
            <label for="email">Địa chỉ email</label>
            <input type="email" name="email" placeholder="email" class="input_txt" required>
            <label for="password">Mật khẩu</label>
            <input type="password" name="pass1" placeholder="password" class="input_txt" required>
            <label for="password">Xác nhận Mật khẩu</label>
            <input type="password" name="pass2" placeholder="Confirm password" class="input_txt" required>
            <label for="phone number">Điện thoại</label>
            <input type="text" name="phone_number" placeholder="phone number" class="input_txt" required>
            <label for="address">Địa chỉ nhận hàng</label>
            <input type="text" name="address" placeholder="address" class="input_txt" required>
            <input type="submit" name="register" value="Đăng ký" class="btn"><br><br>
            <a href="index.php?do=login">Link đăng nhập</a>
        </form>
    </div>
</section>