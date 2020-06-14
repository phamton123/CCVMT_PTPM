<?php 
     require_once '../../commons/utils.php';
     $cateId = $_GET['id'];
     $course_id = $_GET['course_id'];

     $sql = "select * from lesson where id = $cateId";
     $cate = getSimpleQuery($sql);
     if(!$cate){
         header("Location:".$ADMIN_URL."khoahoc");
         die;
     }

     $sql = "delete from lesson where id = $cateId";
     getSimpleQuery($sql);

     header('location: '.$ADMIN_URL.'khoahoc/lesson.php?id='.$course_id);
	die;
?>