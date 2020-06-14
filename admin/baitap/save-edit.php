<?php 
require_once '../../commons/utils.php';
if($_SERVER['REQUEST_METHOD'] != 'POST'){
	header('location: '. $ADMIN_URL .'baitap');
	die;
}
$id = $_POST['id'];
$name = trim($_POST['name']);
$des = $_POST['des'];
$class_id = $_POST['class_id'];
$course_id = $_POST['course_id'];
$created_at = $_POST['day'];

if($name == ""){
	$n = "n=Nhập tiêu đề&&";
}else{
	$n = "";
}

if($course_id == "0"){
	$c = "c=Chọn khóa học&&";
}else{
	$c = "";
}

if($class_id == "0"){
	$cl = "cl=Chọn khóa học&&";
}else{
	$cl = "";
}

if($created_at == ""){
	$cr = "cr=Chọn ngày&&";
}else{
	$cr = "";
}

if($des == ""){
	$d = "d=Nhập nội dung&&";
}else{
	$d = "";
}

if($n !="" || $c != "" || $cl !="" || $cr != "" || $d !="" ){
	header('location: '.$ADMIN_URL.'baitap/add.php?id='.$id.'&&'.$n.$c.$cl.$cr.$d);
	die;
}

$sql = "select * from baikiemtra where name = '$name' and id <> '$id'";
$rs = getSimpleQuery($sql);
if($rs != false){
	header('location: '. $ADMIN_URL .'baitap/edit.php?id='.$id.'&&n=Tiêu đề đã tồn tại, vui lòng chọn tên khác');
	die;
}

$sql = $conn->prepare("update baikiemtra set name = '$name' , day = '$created_at' , chitiet = '$des', class_id = '$class_id', course_id = '$course_id' where id = '$id'");
$sql->execute();
header('location: '. $ADMIN_URL . 'index.php?p=baitap');
die;
?>