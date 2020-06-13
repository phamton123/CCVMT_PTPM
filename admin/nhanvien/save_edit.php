<?php 
require_once '../../commons/utils.php';
 if($_SERVER['REQUEST_METHOD'] != 'POST'){
	header('location: '. $ADMIN_URL .'nhanvien/edit.php');
	die;
}
$id = $_POST['id'];
$fullname = trim($_POST['fullname']);
$address = $_POST['address'];
$phone = $_POST['phone'];
$gender= $_POST['gender'];
$role = $_POST['role'];

$n = $a = $ph = "";

    if($fullname == ""){
        $n = "n=Nhập tên&&";
    }else{
        $n = "";
	}
	
	if($address == ""){
        $a = "a=Nhập địa chỉ&&";
    }else{
        $a = "";
    }
    
    if($phone == ""){
        $ph = "ph=Nhập số điện thoại";
    }else{
        $ph = "";
	}
    

    if($n != "" || $a !="" || $ph !=""){
        header('location: '.$ADMIN_URL.'nhanvien/edit.php?id='.$id.'&&'.$n.$a.$ph);
        die;
    }

 $sql = "update users set fullname = '$fullname',role = '$role', address = '$address' , gender = '$gender', phone_number = '$phone' where id = '$id'";
 getSimpleQuery($sql);
header('location: '. $ADMIN_URL.'index.php?p=nhanvien');
die;