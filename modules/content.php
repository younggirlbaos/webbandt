<?php 
    if(isset($_GET['do'])){
        $do = $_GET['do'];
    }else{
        $do = '';
    }

    if($do == 'home'){
        include('modules/page/home.php');
    }elseif($do == 'product'){
        include('modules/page/product.php');
    }elseif($do == 'login'){
        include('modules/page/login.php');
    }elseif($do == 'register'){
        include('modules/page/register.php');
    }elseif($do == 'cart'){
        include('modules/page/cart.php');  
    }elseif($do == 'contact'){
        include('modules/page/contact.php');
    }elseif($do == 'detail'){
        include('modules/page/detail.php');
    }elseif($do == 'search'){
        include('modules/search.php');
    }elseif($do == 'order'){
        include('modules/page/order.php');
    }
    else{
        include('modules/page/home.php');
    }
?>
