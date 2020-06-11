<?php 
require_once '../../commons/utils.php';
 if($_SERVER['REQUEST_METHOD'] != 'POST'){
	header('location: '. $ADMIN_URL .'hocvien');
	die;
}
$email = trim($_POST['email']);
$fullname = trim($_POST['fullname']);
$password = $_POST['password'];
$cfpassword = $_POST['cfpassword'];
$class_id = $_POST['class_id'];
$course_id = $_POST['course_id'];
$phone = $_POST['phone'];
$created_at = date("Y/m/d");

$sql = "select *
         from classes where id = $class_id";
$users = getSimpleQuery($sql);
// $sql = "SELECT c.*, t.*
//         FROM classes as c, teachers as t
//         WHERE c.id = $class_id";
// $users = getSimpleQuery($sql);

$course = $users['course_id'];

$e = $n = $p = $cp= $c = $ph = "";
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

    if($class_id == "0"){
        $c = "c=Chọn lớp&&";
    }else{
        $c = "";
    }

    if($course_id == "0"){
        $k = "k=Chọn khóa học&&";
    }else{
        $k = "";
    }
    
    if($phone == ""){
        $ph = "ph=Nhập số điện thoại";
    }else{
        $ph = "";
	}
    

	

    if($e !="" || $n != "" || $p !="" || $cp !="" || $c !="" || $k !="" || $ph !=""){
        header('location: '.$ADMIN_URL.'hocvien/add.php?'.$e.$n.$p.$cp.$k.$c.$ph);
        die;
    }

 $password = password_hash($password, PASSWORD_DEFAULT);
//nhập dữ liệu
$sql = "INSERT INTO student 
			(email, fullname, password,phone,status)
		VALUES  
            ('$email', '$fullname', '$password','$phone','1')";
 getSimpleQuery($sql);
//
$sql = "select *
        from student order by id desc limit 1";
$users = getSimpleQuery($sql);
$user = $users['id'];
//
$sql = "INSERT INTO student_check 
			(student_id, day,status,class_id,num_check)
		VALUES  
            ('$user', '$created_at','0','$class_id','-1')";
getSimpleQuery($sql);
//           
$sql = "insert into dangky values ('','$user', '$course', '$class_id','$created_at')";
 getSimpleQuery($sql);

// $sql = "insert into orders 
// 			(student_id, course_id)
// 		values 
// 			('$user', '$course')";
//  getSimpleQuery($sql);

 $sql = "insert into scores 
			(student_id, course_id)
		values 
			('$user', '$course')";
 getSimpleQuery($sql);

header('location: '. $ADMIN_URL . 'index.php?p=hocvien');
die;