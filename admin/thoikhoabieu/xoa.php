<?php 
     require_once '../../commons/utils.php';
     $id = $_GET['id'];
    $class = $_GET['class'];
     $sql = "select * from timetable where id = $id";
     $cate = getSimpleQuery($sql);
     if(!$cate){
         header("Location:".$ADMIN_URL."thoikhoabieu/edit.php?id=".$class);
         die;
     }

     $sql = "delete from timetable where id = $id";
     getSimpleQuery($sql);
     
     header("Location:".$ADMIN_URL."index.php?p=thoikhoabieu");
     die;
?>