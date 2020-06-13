<?php 
require_once '../../commons/utils.php';
 if($_SERVER['REQUEST_METHOD'] != 'POST'){
	header('location: '. $ADMIN_URL .'giaovien');
	die;
}
 $email = trim($_POST['email']);
$fullname = trim($_POST['fullname']);
$password = $_POST['password'];
$cfpassword = $_POST['cfpassword'];

$e = $n = $p = $cp=  "";
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
	

    if($e !="" || $n != "" || $p !="" || $cp !=""){
        header('location: '.$ADMIN_URL.'giaovien/add.php?'.$e.$n.$p.$cp);
        die;
    }

 $password = password_hash($password, PASSWORD_DEFAULT);
 $sql = "insert into teachers 
			(email, fullname, password)
		values 
			('$email', '$fullname', '$password')";
 getSimpleQuery($sql);
 if($sql){
    $arrayName = array('email' =>$email, 'fullname'=>$fullname);
	echo $js =  json_encode($arrayName);
}else{
    $error ="Lỗi dữ liệu";
    $arrayName = array('error'=>$error);
}

// header('location: '. $ADMIN_URL . 'index.php?p=giaovien');
// die;