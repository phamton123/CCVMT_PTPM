<?php 
require_once '../../commons/utils.php';
 if($_SERVER['REQUEST_METHOD'] != 'POST'){
	header('location: '. $ADMIN_URL .'giaovien/edit.php');
	die;
}
$id = $_POST['id'];
$fullname = trim($_POST['fullname']);
$address = $_POST['address'];
$phone = $_POST['phone'];
$gender= $_POST['gender'];

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
    }else if(is_numeric($phone)==false || strlen($phone) != 10){
        $ph = "ph=Số điện thoại phải là số và 10 kí tự&&";
    }else{
        $ph = "";
	}
    

    if($n != "" || $a !="" || $ph !=""){
        header('location: '.$ADMIN_URL.'giaovien/edit.php?id='.$id.'&&'.$n.$a.$ph);
        die;
    }

 $sql = "update teachers set fullname = '$fullname', address = '$address' , gender = '$gender', phone = '$phone' where id = '$id'";
 getSimpleQuery($sql);
 if($sql){
    $arrayNameEditGV = array('address' =>$address, 'fullname'=>$fullname,'phone'=>$phone,'gender'=>$gender);
	echo $js =  json_encode($arrayNameEditGV);
}else{
    $error ="Lỗi dữ liệu";
    $arrayNameEditGV = array('error'=>$error);
    die;
}
// header('location: '. $ADMIN_URL. 'index.php?p=giaovien');
// die;