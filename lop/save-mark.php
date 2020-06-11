<?php 
    $path = "../";
    require_once $path.$path.'commons/utils.php';
    $first = $_POST['first_test'];
    $second = $_POST['second_test'];
    $final = $_POST['final_test'];
    
    $id = $_POST['class'];
    $listRoomQuery = "select * from dangky inner join student on dangky.student_id = student.id INNER join scores on student.id = scores.student_id where class_id = $id and status = 1";
    $cates = getSimpleQuery($listRoomQuery,true);

    foreach($cates as $i=> $row){
        $student = $row['student_id'];
        $fi = $first[$i];
        $se = $second[$i];
        $fin = $final[$i];
            if((is_numeric($fi) == false && $fi != "") || (is_numeric($se) == false && $se != "") || (is_numeric($fin) == false && $fin != "")){
                    header('location: '.$ADMIN_URL.'lop/mark.php?id='.$id.'&&d=Nhập điểm phải là số!');
                    die;
            }else if(($fi<0 && $fi != "") || ($se<0 && $se != "") ||($fin<0 && $fin != "") ||($fi>10 && $fi != "") ||($se>10 && $se != "") ||($fin>10 && $fin != "")){
                header('location: '.$ADMIN_URL.'lop/mark.php?id='.$id.'&&d=Điểm phải từ 0 - 10!');
                die;
            }
        $TB = round(($fi*0.2 + $se*0.2 + $fin*0.6),1);
        $listCheckQuery = "update scores set first_test = '$fi', secord_test = '$se' , final_test = '$fin', diemTB = '$TB' where student_id = '$student'";
        getSimpleQuery($listCheckQuery);
        echo $listCheckQuery;
    }
    header('location: '. $ADMIN_URL . 'thoikhoabieu');
    die;
?>