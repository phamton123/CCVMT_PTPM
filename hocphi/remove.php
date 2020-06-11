<?php 
     require_once '../../commons/utils.php';
     $cateId = $_GET['id'];

     $sql = "select * from orders where id = $cateId";
     $cate = getSimpleQuery($sql);
     if(!$cate){
         header("Location:".$ADMIN_URL."hocphi");
         die;
     }

     $sql = "delete from orders where id = $cateId";
     getSimpleQuery($sql);
     
     header("Location:".$ADMIN_URL."hocphi");
     die;
?>