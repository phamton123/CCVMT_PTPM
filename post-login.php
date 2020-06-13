<?php
require_once './commons/utils.php';
if($_SERVER['REQUEST_METHOD'] != 'POST'){
	header('location: '. SITE_URL. 'login.php');
	die;
}
 $email = $_POST['email'];
$password = $_POST['password'];

 $sql = "select * 
 from users 
 where email = '$email'";
$user = getSimpleQuery($sql);

$sql = "select * 
from teachers 
where email = '$email'";
$teacher = getSimpleQuery($sql);

$sql = "select * 
from student 
where email = '$email'";
$student = getSimpleQuery($sql);


$users = password_verify($password,$user['password']);
$teas = password_verify($password,$teacher['password']);
$stus = password_verify($password,$student['password']);

if($users == true){
	$_SESSION['login'] = $user;
}else if($teas == true){
	$_SESSION['login'] = $teacher;
}else if($stus == true){
	$_SESSION['login'] = $student;
}else{
	header('location: '. SITE_URL. 'login.php?msg=Email/mật khẩu không đúng!');
	die;
}
  ?>
  <h2>Đăng nhập thành công!</h2>
  <script type="text/javascript">
 	setTimeout(function(){
 		window.location.href = '<?= $ADMIN_URL ?>';
 	}, 2000);
 </script>