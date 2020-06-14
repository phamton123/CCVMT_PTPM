<?php 
require_once '../commons/utils.php';
if($_SERVER['REQUEST_METHOD'] != 'POST'){
	header('location: '. $ADMIN_URL);
	die;
}
$des = $_POST['des'];
$created_at = date("Y/m/d");
$student_id = $_SESSION['login']['id'];

$listTimeQuery = "select * from feedback order by id desc limit 1";
$time = getSimpleQuery($listTimeQuery);
$feedback_id = $time['id'];
// kiem tra xem ten co bi trong hay khong
// if($name == ""){
// 	header('location: '. $ADMIN_URL .'feedback/add.php?errName=Vui lòng không để trống tên bài tập');
// 	die;
// }
// Kiem tra ten co bi trung hay khong
// $sql = "select * from feedback where title = '$name'";
// $rs = getSimpleQuery($sql);
// if($rs != false){
// 	header('location: '. $ADMIN_URL .'feedback/add.php?errName=Tiêu đề đã tồn tại, vui lòng chọn tên khác');
// 	die;
// }

$sql = $conn->prepare("insert into feedback_details (feedback_id,student_id,created_at, des) values (?,?,?,?)");
$data = array($feedback_id,$student_id,$created_at,$des);
$sql->execute($data);

header('location: '. $ADMIN_URL . '?success=true');
die;
 ?>