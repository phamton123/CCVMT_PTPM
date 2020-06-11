<?php 
     require_once '../../commons/utils.php';
     $cateId = $_GET['id'];

     $sql = "select * from courses where id = $cateId";
     $cate = getSimpleQuery($sql);
     if(!$cate){
         header("Location:".$ADMIN_URL."khoahoc");
         die;
     }

     $sql = "select * from classes where course_id = $cateId";
     $cate = getSimpleQuery($sql,true);

     foreach($cate as $row){
        $id = $row['id'];

        $sql = "select * from dangky where class_id = $id";
        $cate = getSimpleQuery($sql);
        $stu = $cate['student_id'];

        $sql = "delete from student where id = $stu";
        getSimpleQuery($sql);

        $sql = "delete from dangky where class_id = $id";
        getSimpleQuery($sql);
     }

     $sql = "delete from classes where course_id = $cateId";
     getSimpleQuery($sql);

     $sql = "delete from courses where id = $cateId";
     getSimpleQuery($sql);


     
     header("Location:".$ADMIN_URL."index.php?p=khoahoc");
     die;
?>