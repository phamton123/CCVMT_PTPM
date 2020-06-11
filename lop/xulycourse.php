<?php 
    $path = "../";
    require_once $path.$path.'commons/utils.php';
    $course = $_POST['course'];

    $sql1 = "select * from courses where id = $course";
    $query1 = getSimpleQuery($sql1);
    
    echo $query1['soTiet'];
?>