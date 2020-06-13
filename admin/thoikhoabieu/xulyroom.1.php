<?php 
    $path = "../";
    require_once $path.$path.'commons/utils.php';
    $date = $_POST['date'];
    $lop = $_POST['lop'];
    $session = $_POST['session'];
    $roo = $_POST['roo'];

    $sql = "select * from timetable where day = '$date' and session_id = '$session'";
    $query = getSimpleQuery($sql,true);

    $noi = "where ";
    foreach($query as $i => $row){
        if($row['room_id'] != $roo){
        $room[$i] = $row['room_id'];
        $noi .= " id <> ".$room[$i]." and "; 
        }
    }

    $sql1 = "select * from rooms ".$noi." status = 1";
    $query1 = getSimpleQuery($sql1,true);
    foreach($query1 as $row1){
        echo "<option value='".$row1['id']."'>".$row1['name']."</option>";
    }
?>