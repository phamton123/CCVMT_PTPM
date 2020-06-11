<?php 
require_once '../../commons/utils.php';
if($_SERVER['REQUEST_METHOD'] != 'POST'){
	header('location: '. $ADMIN_URL .'lop');
	die;
}
$id = $_POST['id'];
$name = trim($_POST['name']);
$des = $_POST['course_id'];
// kiem tra xem ten co bi trong hay khong
if($name == ""){
	header('location: '. $ADMIN_URL .'lop/edit.php?id='.$id.'&errName=Vui lòng không để trống tên lớp học');
	die;
}
// Kiem tra ten co bi trung hay khong
$sql = "select * 
		from classes 
		where name = '$name'
			and id != $id
";
$rs = getSimpleQuery($sql);
if($rs != false){
	header('location: '. $ADMIN_URL .'lop/edit.php?id='.$id.'&errName=Tên lớp học đã tồn tại, vui lòng chọn tên khác');
	die;
}
$sql = "update classes
		set
			name = :name,
			course_id = :des
		where id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':name', $name);
$stmt->bindParam(':des', $des);
$stmt->bindParam(':id', $id);
$stmt->execute();
header('location: '. $ADMIN_URL . 'index.php?p=lop');
die;
 ?>