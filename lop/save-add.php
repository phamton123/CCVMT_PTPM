<?php 
require_once '../../commons/utils.php';
if($_SERVER['REQUEST_METHOD'] != 'POST'){
	header('location: '. $ADMIN_URL .'lop');
	die;
}
$name = trim($_POST['name']);
$course = $_POST['course_id'];
$teacher = $_POST['teacher_id'];
// $created = $_POST['created'];
// $ended= $_POST['ended'];

if($name == ""){
	$n = "n=Nhập tên lớp học&&";
}else{
	$n = "";
}


if($course == "0"){
	$c = "c=Chọn khóa học";
}else{
	$c = "";
}
if($teacher == "0"){
	$t = "c=Chọn Giáo Viên";
}else{
	$t = "";
}


if($n !="" || $c != "" || $t != ""){
	header('location: '.$ADMIN_URL.'lop/add.php?'.$n.$c.$t);
	die;
}

$sql = "select * 
		from classes 
		where name = '$name'";
$rs = getSimpleQuery($sql);
if($rs != false){
	header('location: '. $ADMIN_URL .'lop/add.php?n=Tên lớp học đã tồn tại, vui lòng chọn tên khác');
	die;
}

$sql = $conn->prepare("insert into classes (name,course_id,teacher_id) values (?,?,?)");
$data = array($name,$course,$teacher);
$sql->execute($data);

			

// Kết thúc lưu thời khóa biểu

header('location: '. $ADMIN_URL . 'index.php?p=lop');
die;
 ?>