<?php 
require_once '../../commons/utils.php';
 if($_SERVER['REQUEST_METHOD'] != 'POST'){
	header('location: '. $ADMIN_URL .'_share/edit_user.php');
	die;
}
$id = $_SESSION['login']['id'];
$fullname = trim($_POST['fullname']);
$address = $_POST['address'];
$phone = $_POST['phone'];
$gender= $_POST['gender'];

$fn = $a = $p = $g = "";
    if($phone == ""){
        $p = "p=Nhập sdt&&";
    }else if(is_numeric($phone)==false || strlen($phone) != 10){
        $p = "p=Số điện thoại phải là số và 10 kí tự&&";
    }else{
        $p = "";
    }

    if($fullname == ""){
        $fn = "fn=Nhập họ tên&&";
    }else{
        $fn = "";
    }

    if($address == ""){
        $a = "a=Nhập địa chỉ&&";
    }else{
        $a = "";
    }
    if($gender == ""){
        $g = "g=Chọn giới tính";
    }else{
        $g = "";
	}
	
	if($p !="" || $fn != "" || $a !="" || $g=""){
        header('location: '.$ADMIN_URL.'_share/edit_user.php?id='.$id.'&&'.$p.$fn.$a.$g);
        die;
    }

$file = $_FILES['avatar'];
$path = $file['name'];
$ext = pathinfo($path, PATHINFO_EXTENSION);
$filename = "img/" . uniqid() . "." . $ext;
move_uploaded_file($file['tmp_name'], '../../' . $filename);
if($path == ""){
    $filename = $_SESSION['login']['avatar'];
}
$noi = "";
if($_SESSION['login']['role']==500){
    $sql = "update users set fullname = '$fullname', address = '$address' , gender = '$gender', avatar = '$filename', phone_number = '$phone' where id = '$id'";
    getSimpleQuery($sql);
    $listUserQuery = "select * from users where id = $id";
       $user = getSimpleQuery($listUserQuery);
    $_SESSION['login'] =  $user;
}else if($_SESSION['login']['role']==0){
    $sql = "update student set fullname = '$fullname', address = '$address' , gender = '$gender', avatar = '$filename', phone = '$phone' where id = '$id'";
    getSimpleQuery($sql);
    $listUserQuery = "select * from student where id = $id";
       $user = getSimpleQuery($listUserQuery);
    $_SESSION['login'] =  $user;
}else if($_SESSION['login']['role']==1){
 $sql = "update teachers set fullname = '$fullname', address = '$address' , gender = '$gender', avatar = '$filename', phone = '$phone' where id = '$id'";
 getSimpleQuery($sql);
 $listUserQuery = "select * from teachers where id = $id";
    $user = getSimpleQuery($listUserQuery);
 $_SESSION['login'] =  $user;
}
header('location: '. $ADMIN_URL);
die;