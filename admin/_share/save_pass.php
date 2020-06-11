<?php 
require_once '../../commons/utils.php';
 if($_SERVER['REQUEST_METHOD'] != 'POST'){
	header('location:'. $ADMIN_URL .'_share/edit_pass.php');
	die;
}
echo $id = $_SESSION['login']['id'];
echo $email = $_SESSION['login']['email'];
echo $old = $_POST['old_pass'];
if($_SESSION['login']['role']==500){
$sql = "select * 
 from users 
 where email = '$email'";
$user = getSimpleQuery($sql);
}else if($_SESSION['login']['role']==0){
    $sql = "select * 
    from student
    where email = '$email'";
   $user = getSimpleQuery($sql);
}else if($_SESSION['login']['role']==1){
    $sql = "select * 
    from teachers
    where email = '$email'";
   $user = getSimpleQuery($sql);
}

$mkc = $mkm = "";
if(!$user || password_verify($old,$user['password']) == false){
  $mkc = "msg=Mật khẩu không chính xác&&";
}else{
    $mkc = "";
}
echo $mkc;
echo $new = $_POST['new_pass'];
echo $re_new= $_POST['re_new_pass'];

if($new == ""){
    $mk = "mkm1=Điền mật khẩu mới&&";
}else{
    $mk = "";
}

if($re_new == ""){
    $mkm = "mkm=Điền lại mật khẩu mới";
}else if($new != $re_new){
    $mkm = "mkm=Mật khẩu mới không trùng";
}else{
    $mkm = "";
}

if($mkc != "" || $mkm != "" || $mk != "" ){
    header('location:'. $ADMIN_URL .'_share/edit_pass.php?'.$mk.$mkc.$mkm);
}else{

$realpass = password_hash($re_new,PASSWORD_DEFAULT);
//  $sql = "update users set password = '$realpass' where id = '$id'";
//  getSimpleQuery($sql);
//  $listUserQuery = "select * from users where id = $id";
//     $user = getSimpleQuery($listUserQuery);
//  $_SESSION['login'] =  $user;

 if($_SESSION['login']['role']==500){
 $sql = "update users set password = '$realpass' where id = '$id'";
 getSimpleQuery($sql);
 $listUserQuery = "select * from users where id = $id";
    $user = getSimpleQuery($listUserQuery);
 $_SESSION['login'] =  $user;
}else if($_SESSION['login']['role']==0){
    $sql = "update student set password = '$realpass' where id = '$id'";
    getSimpleQuery($sql);
    $listUserQuery = "select * from student where id = $id";
       $user = getSimpleQuery($listUserQuery);
    $_SESSION['login'] =  $user;
}else if($_SESSION['login']['role']==1){
    $sql = "update teachers set password = '$realpass' where id = '$id'";
    getSimpleQuery($sql);
    $listUserQuery = "select * from teachers where id = $id";
       $user = getSimpleQuery($listUserQuery);
    $_SESSION['login'] =  $user;
}
header('location:'. $ADMIN_URL);
die; 
}
?>