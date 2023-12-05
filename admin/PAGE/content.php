<?php 
    if(isset($_GET['lam'])){
        $lam = $_GET['lam'];
    }else{
        $lam = 'menu';
    }

    if($lam == 'menu'){
        include('menu.php');
    }elseif($lam == 'qlsp'){
        include('sanpham/qlsp.php');
    }else if($lam == 'mathang'){
        include('sanpham/mathnag.php');
    }else if($lam == 'nhanhieu'){
        include('sanpham/nhanhieu.php');
    }
    elseif($lam == 'themsp'){
        include('sanpham/themsp.php');
    }elseif ($lam == 'dssp'){
        include('sanpham/DSsanpham.php');
    }elseif($lam == 'suasp'){
        include('sanpham/suaSanpham.php');
    }
    else{

    }
?>