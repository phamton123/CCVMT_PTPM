<?php 
    $path = "../";
    require_once $path.$path.'commons/utils.php';
    $quiz = $_POST['quiz'];
    $sl = 0;
    $id = $_POST['class'];
    $listRoomQuery = "select * from dangky inner join student on dangky.student_id = student.id where class_id = $id and status = 1";
    $cates = getSimpleQuery($listRoomQuery,true);

    foreach($cates as $row){
        $student = $row['student_id'];
        $listSQuery = "select * from student_mark where student_id = $student";
        $stu = getSimpleQuery($listSQuery,true);
        foreach($stu as $i => $row1){
            $mark_id = $row1['id'];
            $mark = $quiz[$sl];
                if(is_numeric($mark) == false && $mark != ""){
                        header('location: '.$ADMIN_URL.'lop/mark.1.php?id='.$id.'&&d=Nhập điểm phải là số!');
                        die;
                }else if($mark<0 && $mark != ""){
                    header('location: '.$ADMIN_URL.'lop/mark.1.php?id='.$id.'&&d=Điểm phải từ 0 - 10!');
                    die;
                }
            $listCheckQuery = "update student_mark set point = '$mark' where student_id = '$student' and id = '$mark_id'";
            getSimpleQuery($listCheckQuery);
            $sl += 1;
        }
    }
    header('location: '. $ADMIN_URL . 'thoikhoabieu');
    die;
?>