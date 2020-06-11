<?php  
    $path = "../";
    require_once $path.$path.'commons/utils.php';
    $id = $_GET['id'];
    $sql = "update student set status = '1' where id = '$id'";
    getSimpleQuery($sql);
    header('location: '. $ADMIN_URL.'index.php?p=khachhang');
?>
