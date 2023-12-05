<?php if(isset($_GET['logout'])){
    unset($_SESSION['admin']);
    header('location:admin.php');
} ?>
<section>
    <div class="container">
        <div class="menu">
        <div class="menu_item" >
                <a href="admin.php?lam=menu&logout" style="background-color: red;">Đăng Xuất</a>
            </div>
            <div class="menu_item">
                <a href="admin.php?lam=qlsp">Quản lý sản phẩm</a>
            </div>

        </div>
    </div>
</section>