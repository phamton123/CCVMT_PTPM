<?php 
    $path = "../";
    require_once $path.$path.'commons/utils.php';
    $course = $_POST['course'];

    $sql1 = "select * from classes where course_id = $course";
    $query1 = getSimpleQuery($sql1,true);
    
    echo "<option value='0'>--Chọn lớp học--</option>";
    foreach($query1 as $row1){
        echo "<option value='".$row1['id']."'>".$row1['name']."</option>";
    }
?>