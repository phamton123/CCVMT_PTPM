<?php 
     require_once '../../commons/utils.php';
     $id = $_GET['id'];

     $sql = "select * from student where id = $id";
     $user = getSimpleQuery($sql);
     if(!$user){
         header("Location:".$ADMIN_URL."index.php?p=khachhang");
         die;
     }

     $sql = "delete from scores where student_id = $id";
     getSimpleQuery($sql);

     $sql = "delete from dangky where student_id = $id";
     getSimpleQuery($sql);

     $sql = "delete from student where id = $id";
     getSimpleQuery($sql);
     
     header("Location:".$ADMIN_URL."index.php?p=khachhang");
     die;
?>