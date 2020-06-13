<?php 
require_once '../../commons/utils.php';
if($_SERVER['REQUEST_METHOD'] != 'POST'){
	header('location: '. $ADMIN_URL .'feedback');
	die;
}
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
	header('location: '.$ADMIN_URL.'feedback/add.php?'.$t.$c.$cr);
	die;
}

// Kiem tra ten co bi trung hay khong
$sql = "select * from feedback where title = '$title'";
$rs = getSimpleQuery($sql);
if($rs != false){
	header('location: '. $ADMIN_URL .'feedback/add.php?t=Tiêu đề đã tồn tại, vui lòng chọn tên khác');
	die;
}

$sql = $conn->prepare("insert into feedback (title,content, created_at) values (?,?,?)");
$data = array($title,$content,$created_at);
$sql->execute($data);

header('location: '. $ADMIN_URL . 'feedback?success=true');
die;
 ?>