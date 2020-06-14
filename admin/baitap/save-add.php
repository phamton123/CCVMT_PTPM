<?php 
require_once '../../commons/utils.php';
if($_SERVER['REQUEST_METHOD'] != 'POST'){
	header('location: '. $ADMIN_URL .'baitap');
	die;
}
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
	header('location: '.$ADMIN_URL.'baitap/add.php?'.$n.$c.$cl.$cr.$d);
	die;
}
// kiem tra xem ten co bi trong hay khong
// if($name == ""){
// 	header('location: '. $ADMIN_URL .'baitap/add.php?errName=Vui lòng không để trống tên bài tập');
// 	die;
// }
// Kiem tra ten co bi trung hay khong
$sql = "select * from baikiemtra where name = '$name'";
$rs = getSimpleQuery($sql);
if($rs != false){
	header('location: '. $ADMIN_URL .'baitap/add.php?n=Tên bài kiểm tra đã tồn tại, vui lòng chọn tên khác');
	die;
}

$sql = $conn->prepare("insert into baikiemtra (name, day, chitiet, class_id, course_id) values (?,?,?,?,?)");
$data = array($name,$created_at, $des ,$class_id,$course_id);
$sql->execute($data);

header('location: '. $ADMIN_URL . 'index.php?p=baitap');
die;
 ?>