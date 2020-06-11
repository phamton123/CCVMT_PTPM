<?php 
     require_once '../../commons/utils.php';
     $cateId = $_GET['id'];

     $sql = "select * from classes where id = $cateId";
     $cate = getSimpleQuery($sql);
     if(!$cate){
         header("Location:".$ADMIN_URL."lop");
         die;
     }
     $sql = "delete from baikiemtra where class_id = $cateId";
     getSimpleQuery($sql);

     $sql = "delete from dangky where class_id = $cateId";
     getSimpleQuery($sql);

     $sql = "delete from timetable where class_id = $cateId";
     getSimpleQuery($sql);

     $sql = "delete from classes where id = $cateId";
     getSimpleQuery($sql);
     
     header("Location:".$ADMIN_URL."index.php?p=lop");
     die;
?>