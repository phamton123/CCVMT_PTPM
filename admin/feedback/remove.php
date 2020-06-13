<?php 
     require_once '../../commons/utils.php';
     $cateId = $_GET['id'];

     $sql = "delete from feedback_details where feedback_id = $cateId";
     getSimpleQuery($sql);

     $sql = "delete from feedback where id = $cateId";
     getSimpleQuery($sql);
     
     header("Location:".$ADMIN_URL."feedback");
     die;
?>