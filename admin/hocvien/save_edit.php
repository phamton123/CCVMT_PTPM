<?php 
require_once '../../commons/utils.php';
 if($_SERVER['REQUEST_METHOD'] != 'POST'){
	header('location: '. $ADMIN_URL .'hocvien/edit.php');
	die;
}
$id = $_POST['id'];
$fullname = trim($_POST['fullname']);
$address = $_POST['address'];
$phone = $_POST['phone'];
$gender= $_POST['gender'];
$date= $_POST['date'];
$class_id= $_POST['class_id'];

$d = $n = $a = $ph = "";
    if($date == ""){
        $d = "d=Chọn ngày sinh&&";
    }else{
        $d = "";
    }

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
    

    if($d !="" || $n != "" || $a !="" || $ph !=""){
        header('location: '.$ADMIN_URL.'hocvien/edit.php?id='.$id.'&&'.$d.$n.$a.$ph);
        die;
    }

 $sql = "update student set fullname = '$fullname', address = '$address' , gender = '$gender', phone = '$phone',date = '$date' where id = '$id'";
 getSimpleQuery($sql);
header('location: '. $ADMIN_URL.'index.php?p=hocvien');
die;