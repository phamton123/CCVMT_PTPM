<?php 
require_once '../../commons/utils.php';
if($_SERVER['REQUEST_METHOD'] != 'POST'){
	header('location: '. $ADMIN_URL .'phong');
	die;
}
$id = $_POST['id'];
$name = trim($_POST['name']);
$des = htmlentities($_POST['des'], ENT_QUOTES, "UTF-8");
// kiem tra xem ten co bi trong hay khong
if($name == ""){
	header('location: '. $ADMIN_URL .'phong/edit.php?id='.$id.'&errName=Vui lòng không để trống tên phòng');
	die;
}
// Kiem tra ten co bi trung hay khong
$sql = "select * 
		from rooms 
		where name = '$name'
			and id != $id
";
$rs = getSimpleQuery($sql);
if($rs != false){
	header('location: '. $ADMIN_URL .'phong/edit.php?id='.$id.'&errName=Tên phòng đã tồn tại, vui lòng chọn tên khác');
	die;
}
$sql = "update rooms
		set
			name = :name,
			des = :des
		where id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':name', $name);
$stmt->bindParam(':des', $des);
$stmt->bindParam(':id', $id);
$stmt->execute();
header('location: '. $ADMIN_URL . 'index.php?p=phong');
die;
 ?>