<?php 
require_once 'commons/utils.php';
$fullname = $_POST['fullname'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$class_id = $_POST['class_id'];
$course_id = $_POST['course_id'];
$created_at = date("Y/m/d");
$class = $_POST['class'];
$course = $_POST['course'];
$id = $_POST['id'];

if($fullname == ""){
    $n = "n=Nhập họ tên&&";
}else{
    $n = "";
}

if($phone == ""){
    $p = "p=Nhập số điệnt thoại&&";
}else if(is_numeric($phone)==false || strlen($phone) != 10){
    $p = "p=Số điện thoại phải là số và 10 kí tự&&";
}else{
    $p = "";
}

if($email == ""){
    $e = "e=Nhập email&&";
}else if(filter_var($email, FILTER_VALIDATE_EMAIL) == false ){
    $e = "e=Nhập đúng dạng email&&";
}else{
    $e = "";
}

if($course_id == "0"){
    $c = "c=Chọn khóa học&&";
}else{
    $c = "";
}

if($class_id == "0"){
    $cl = "cl=Chọn lớp học";
}else{
    $cl = "";
}


if($n !="" || $p != "" || $e !="" || $c !="" || $cl !="" ){
    header('location: '.SITE_URL.'course.php?id='.$id.'&&'.$n.$p.$e.$c.$cl);
    die;
}
$realpass = password_hash(1,PASSWORD_DEFAULT);
$sql = "insert into student 
			(email, fullname, password,phone,status)
		values 
			('$email', '$fullname', '$realpass','$phone','0')";
 getSimpleQuery($sql);
 
$sql = "select *
        from student order by id desc limit 1";
$users = getSimpleQuery($sql);
$user = $users['id'];

$sql = "insert into dangky values ('','$user', '$course_id', '$class_id','$created_at')";
 getSimpleQuery($sql);

 $sql = "insert into scores 
			(student_id, course_id)
		values 
			('$user', '$course_id')";
 getSimpleQuery($sql);

header('location: '. SITE_URL .'course.php?id='.$id.'&&?success=true');
die;
?>