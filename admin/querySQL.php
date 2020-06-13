<?php

$listRoomQuery = "select count(*) as total from courses";
$cates = getSimpleQuery($listRoomQuery);

$listClassQuery = "select count(*) as total from classes";
$classes = getSimpleQuery($listClassQuery);

$listUserQuery = "select count(*) as total from users";
$usersStaff = getSimpleQuery($listUserQuery);

$listTeaQuery = "select count(*) as total from teachers";
$teas = getSimpleQuery($listTeaQuery);

$listStuQuery = "select count(*) as total from student";
$stu = getSimpleQuery($listStuQuery);

$listCusQuery = "select count(*) as total from student where status = 0";
$cus = getSimpleQuery($listCusQuery);

$listCusQuery = "select count(*) as total from student";
$hocvien = getSimpleQuery($listCusQuery);

$listCusQuery = "select count(*) as total from rooms";
$room = getSimpleQuery($listCusQuery);
//khoa hoc
$listRoomQuery = "select c.*, (select count(*) from classes where course_id = c.id) as total, (select count(*) from lesson where course_id = c.id) as less from courses c";
$catesCourse = getSimpleQuery($listRoomQuery,true);
//end khoa hoc
//lop
$id = $_SESSION['login']['id'];
if($_SESSION['login']['role']==0){
  header("Location:xemcheck.php");
// }
// else if($_SESSION['login']['role']==1){
//   $listRoomQuery = "select * from timetable where teacher_id = $id group by class_id";
//   $cates = getSimpleQuery($listRoomQuery);
//   $class_id = $cates['class_id'];
//   $listRoomQuery = "select * from classes where id = $class_id";
//   $cates = getSimpleQuery($listRoomQuery,true);
}else{
$listRoomQuery = "select * from classes";
$catesClasses = getSimpleQuery($listRoomQuery,true);
}
//end lop
//giao vien
$search = "";
if(isset($_POST['tk'])){
  if($_POST['search'] != ""){
    $search = " where email like '%".$_POST['search']."%'";
  }
}
$sql = "select *
        from teachers".$search;
$usersSearch = getSimpleQuery($sql, true);
//end giao vien
//khach hang
$i = 0;
$search = "";
if(isset($_POST['tk'])){
  if($_POST['search'] != ""){
    $search = " and email like '%".$_POST['search']."%'";
    $i = 1;
  }
}
$sql = "SELECT * FROM dangky INNER join student on dangky.student_id = student.id  where status = 0".$search;
$usersCustomer = getSimpleQuery($sql, true);
//end khach hàng
//nhan vien
$i = 0;
$search = "";
if(isset($_POST['tk'])){
  if($_POST['search'] != ""){
    $search = " where email like '%".$_POST['search']."%' ";
    $i = 1;
  }
}
$sql = "select *
        from users".$search;
$usersNV = getSimpleQuery($sql, true);
//end nhan vien
//bai tap
$listRoomQuery = "select * from baikiemtra";
$catesExercise = getSimpleQuery($listRoomQuery,true);
//end bai tap
//hocvien
if($_SESSION['login']['role']==0){
  header("Location:../lop/xemdiem.php");
}
$i = 0;
$search = "";
if(isset($_POST['tk'])){
  if($_POST['search'] != ""){
    $search = " email like '%".$_POST['search']."%' and ";
    $i = 1;
  }
}
$sql1 = "SELECT * FROM student where ".$search." status = 1";
$users = getSimpleQuery($sql1, true);
//end hoc vien
//anh
$listBrandQuery = "select * from slideshows order by id";
$brands = getSimpleQuery($listBrandQuery,true);
//end anh
//settings
$listSettingQuery = "select * from web_settings order by id";
$setting = getSimpleQuery($listSettingQuery,true);
//end settings
//Rooms
$listRoomQuery = "select * from rooms";
$catesRooms = getSimpleQuery($listRoomQuery,true);
//end Rooms
//Quiz
// $listRoomQuery = "select q.*, (select count(*) from question where quiz_id = q.id) as total from quiz q";
// $catesQuiz = getSimpleQuery($listRoomQuery,true);
//end Quiz
//Thoi khoa bieu

//end Thoi khoa bieu
if($_SESSION['login']['role']==1){ 
  header('location: '. $ADMIN_URL . 'thoikhoabieu');
}

// if($_SESSION['login']['role']==0){ 
//   header('location: '. $AP_URL);
// }
?>