<?php 
     require_once '../../commons/utils.php';
     $cateId = $_GET['id'];

     $sql = "select * from baikiemtra where id = $cateId";
     $cate = getSimpleQuery($sql);
     if(!$cate){
         header("Location:".$ADMIN_URL."index.php?p=baitap");
         die;
     }


     $sql = "delete from baikiemtra where id = $cateId";
     getSimpleQuery($sql);
     
     header("Location:".$ADMIN_URL."index.php?p=baitap");
     die;
?>