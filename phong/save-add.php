<?php 
require_once '../../commons/utils.php';
if($_SERVER['REQUEST_METHOD'] != 'POST'){
	header('location: '. $ADMIN_URL .'phong');
	die;
}
$name = trim($_POST['name']);
$des = htmlentities($_POST['des'], ENT_QUOTES, "UTF-8");
// kiem tra xem ten co bi trong hay khong
if($name == ""){
	header('location: '. $ADMIN_URL .'phong/add.php?errName=Vui lòng không để trống tên phòng');
	die;
}
// Kiem tra ten co bi trung hay khong
$sql = "select * from rooms where name = '$name'";
$rs = getSimpleQuery($sql);
if($rs != false){
	header('location: '. $ADMIN_URL .'phong/add.php?errName=Tên phòng đã tồn tại, vui lòng chọn tên khác');
	die;
}
$sql = $conn->prepare("insert into rooms values ('', ?, ?,'1')");
$data = array($name,$des);
$sql->execute($data);

header('location: '. $ADMIN_URL . 'index.php?p=phong');
die;
 ?>