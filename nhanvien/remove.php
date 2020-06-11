<?php 
     require_once '../../commons/utils.php';
     $id = $_GET['id'];

     $sql = "select * from users where id = $id";
     $user = getSimpleQuery($sql);
     if(!$user){
         header("Location:".$ADMIN_URL."index.php?p=nhanvien");
         die;
     }

     $sql = "delete from users where id = $id";
     getSimpleQuery($sql);
     
     header("Location:".$ADMIN_URL."index.php?p=nhanvien");
     die;
?>