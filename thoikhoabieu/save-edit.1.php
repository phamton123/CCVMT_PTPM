 <?php 
require_once '../../commons/utils.php';
if($_SERVER['REQUEST_METHOD'] != 'POST'){
	header('location: '. $ADMIN_URL .'index.php?p=thoikhoabieu');
	die;
}
$id= $_POST['id'];
$created = $_POST['created'];
$room = $_POST['room_id'];
$teacher = $_POST['teacher_id'];
$session = $_POST['session_id'];

$sql = $conn->prepare("update timetable set day = '$created', room_id = '$room', teacher_id = '$teacher',session_id = '$session' where id = '$id'");
$sql->execute();

// Kết thúc lưu thời khóa biểu

header('location: '. $ADMIN_URL . 'index.php?p=thoikhoabieu');
die;
 ?>
 