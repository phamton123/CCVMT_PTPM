<?php 
require_once '../../commons/utils.php';
 if($_SERVER['REQUEST_METHOD'] != 'POST'){
	header('location: '. $ADMIN_URL .'nhanvien');
	die;
}
 $email = trim($_POST['email']);
$fullname = trim($_POST['fullname']);
$password = $_POST['password'];
$cfpassword = $_POST['cfpassword'];
$role = $_POST['role'];

$e = $n = $p = $r = $cp=  "";
    if($email == ""){
        $e = "e=Nhập email&&";
    }else if(filter_var($email, FILTER_VALIDATE_EMAIL) == false ){
        $e = "e=Nhập đúng dạng email&&";
    }else{
        $e = "";
    }

    if($fullname == ""){
        $n = "n=Nhập tên&&";
    }else{
        $n = "";
    }

    if($password == ""){
        $p = "p=Nhập passwword&&";
    }else{
        $p = "";
	}

	if($cfpassword == ""){
        $cp = "cp=Nhập lại passwword&&";
    }else if($cfpassword != $password){
        $cp = "cp=Nhập trùng passwword&&";
	}else{
		$cp = "";
	}
	

    if($role == ""){
        $r = "r=Nhập role";
    }else{
        $r = "";
    }

    if($e !="" || $n != "" || $p !="" || $cp !="" || $r=""){
        header('location: '.$ADMIN_URL.'nhanvien/add.php?'.$e.$n.$p.$cp.$r);
        die;
    }

 $password = password_hash($password, PASSWORD_DEFAULT);
 $sql = "insert into users 
			(email, fullname, password, role)
		values 
			('$email', '$fullname', '$password', '$role')";
 getSimpleQuery($sql);
header('location: '. $ADMIN_URL . 'index.php?p=nhanvien');
die;