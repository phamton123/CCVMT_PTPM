<?php 
    $path = "../";
    require_once $path.$path.'commons/utils.php';
    $date = $_POST['date'];
    // $lop = $_POST['lop'];
    $session = $_POST['session'];
    // $subject = $_POST['subject'];
    $room = $_POST['room'];

    $sql = "select * from timetable where day = '$date' and  session_id = '$session'";
    $query = getSimpleQuery($sql,true);

    $noi = "where ";
    foreach($query as $i => $row){
        $room[$i] = $row['teacher_id'];
        $noi .= " id <> ".$room[$i]." and "; 
    }

    print_r($noi);

    $sql1 = "select * from teachers ".$noi." status = 1";
    $query1 = getSimpleQuery($sql1,true);
    
    echo "<option value='0'>--Các giáo viên chưa dạy--</option>";
    foreach($query1 as $row1){
        echo "<option value='".$row1['id']."'>".$row1['fullname']."</option>";
    }
?>