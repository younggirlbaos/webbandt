
<?php
//kết nối csdl
	$tenmaychu = 'localhost';
	$tentaikhoan='root';
	$pass='';
	$csdl='dt';
    $conn = mysqli_connect($tenmaychu,$tentaikhoan,$pass,$csdl) or dir("No connected");
?>