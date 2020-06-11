<?php 
    $path = "../";
    require_once $path.$path.'commons/utils.php';
    $check = $_POST['check'];

    $tea = '....';
    if($_SESSION['login']['role']==1){
        $tea = $_SESSION['login']['role'];
    }
                    
    $id = $_POST['class'];
    $day = $_POST['day'];
    $listRoomQuery = "select * from dangky inner join student on dangky.student_id = student.id where class_id = '$id'";
    $cates = getSimpleQuery($listRoomQuery,true);

    foreach($cates as $i => $row){
        $student = $row['student_id'];
        $chek = $check[$i];
        $id = $_POST['class'];
        $listCheckQuery = "update student_check set teacher_id = '$tea'  , status = '$chek' , num_check = '1' where class_id = '$id' and day = '$day' and student_id = '$student'";
        getSimpleQuery($listCheckQuery);
    }
    header('location: '. $ADMIN_URL . 'thoikhoabieu/');
    die;
?>