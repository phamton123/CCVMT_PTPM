<?php 
     require_once '../../commons/utils.php';
     $id = $_GET['id'];

     $sql = "select * from teachers where id = $id";
     $user = getSimpleQuery($sql);
     if(!$user){
         header("Location:".$ADMIN_URL."giaovien");
         die;
     }
     $sql = "delete from teachers where id = $id";
     getSimpleQuery($sql);
     
     header("Location:".$ADMIN_URL."index.php?p=giaovien");
     die;
?>