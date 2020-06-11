<?php 
require_once '../../commons/utils.php';
if($_SERVER['REQUEST_METHOD'] != 'POST'){
	header('location: '. $ADMIN_URL .'khoahoc');
	die;
}
$name = trim($_POST['name']);
$course_id = $_POST['course_id'];
$day = date("Y/m/d");
$old = $_POST['old'];
$id = $_POST['id'];

if($name == ""){
	$n = "n=Nhập tiêu đề&&";
}else{
	$n = "";
}

    $file = $_FILES['chitiet'];
    $path = $file['name'];
    if($path == ""){
        $filename = $old;
    }else{
        $ext = strtolower(pathinfo($path, PATHINFO_EXTENSION));
        $allowed = array("pdf");
        
        $filename = "img/".$path;

        if($path == ""){
            $i ='i=Chọn ảnh';
        }
        else if(in_array($ext,$allowed)=== false){
            $i ='i=Chỉ hỗ trợ upload file pdf';
        }else{
            $i ='';
        } 
        if($n !="" || $i !="" ){
            header('location: '.$ADMIN_URL.'khoahoc/lessadd.php?course_id='.$course_id."&&".$n.$i);
            die;
        }
    move_uploaded_file($file['tmp_name'], '../../' . $filename);
    }   

if($n !="" ){
	header('location: '.$ADMIN_URL.'khoahoc/lessadd.php?course_id='.$course_id."&&".$n);
	die;
}
// kiem tra xem ten co bi trong hay khong
// if($name == ""){
// 	header('location: '. $ADMIN_URL .'baitap/add.php?errName=Vui lòng không để trống tên bài tập');
// 	die;
// }
// Kiem tra ten co bi trung hay khong
$sql = "select * from lesson where name = '$name' and course_id = '$course_id' and id <> $id";
$rs = getSimpleQuery($sql);
if($rs != false){
	header('location: '. $ADMIN_URL .'khoahoc/lessadd.php?course_id='.$course_id.'&&n=Tên bài kiểm tra đã tồn tại, vui lòng chọn tên khác');
	die;
}
$sql = $conn->prepare("update lesson set name = '$name' , chitiet = '$filename' where id = '$id'");
$sql->execute();

header('location: '. $ADMIN_URL . 'baitap?success=true');
die;
 ?>