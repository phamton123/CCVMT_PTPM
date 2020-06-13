<?php 
require_once '../../commons/utils.php';
if($_SERVER['REQUEST_METHOD'] != 'POST'){
	header('location: '. $ADMIN_URL .'feedback');
	die;
}
$id = $_POST['id'];
$title = trim($_POST['title']);
$content = $_POST['content'];
$created_at = $_POST['created_at'];

if($title == ""){
	$t = "t=Nhập tiêu đề&&";
}else{
	$t = "";
}

if($content == ""){
	$c = "c=Nhập nội dung&&";
}else{
	$c = "";
}

if($created_at == ""){
	$cr = "cr=Chọn ngày";
}else{
	$cr = "";
}

if($t !="" || $c != "" || $cr !="" ){
	header('location: '.$ADMIN_URL.'feedback/edit.php?id='.$id.'&&'.$t.$c.$cr);
	die;
}

$sql = "select * from feedback where title = '$title' and id <> '$id'";
$rs = getSimpleQuery($sql);
if($rs != false){
	header('location: '. $ADMIN_URL .'feedback/edit.php?id='.$id.'&&t=Tiêu đề đã tồn tại, vui lòng chọn tên khác');
	die;
}

$sql = $conn->prepare("update feedback set title = '$title' , content = '$content' , created_at = '$created_at' where id = '$id'");
$sql->execute();
header('location: '. $ADMIN_URL . 'feedback?editsuccess=true');
die;
?>