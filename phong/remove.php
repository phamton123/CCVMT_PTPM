<?php 
     require_once '../../commons/utils.php';
     $cateId = $_GET['id'];

     $sql = "select * from rooms where id = $cateId";
     $cate = getSimpleQuery($sql);
     if(!$cate){
         header("Location:".$ADMIN_URL."room");
         die;
     }

     $sql = "delete from rooms where id = $cateId";
     getSimpleQuery($sql);
     
     header("Location:".$ADMIN_URL."index.php?p=phong");
     die;
?>