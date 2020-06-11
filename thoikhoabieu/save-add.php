
 <?php 
require_once '../../commons/utils.php';
if($_SERVER['REQUEST_METHOD'] != 'POST'){
	header('location: '. $ADMIN_URL .'thoikhoabieu');
	die;
}
$created = $_POST['created'];

$check = $_POST['check'];

$i = 0;
foreach($check as $row){
    $i += 1;
}
$solan = $i;
$sotiet = $_POST['soTiet'];

$room = $_POST['room_id'];
$teacher = $_POST['teacher_id'];
$session = $_POST['session_id'];
$class = $_POST['class_id'];
$course = $_POST['course_id'];

if($class == "0"){
    $c = "c=Chọn lớp&&";
}else{
    $c = "";
}

if($course == "0"){
    $k = "k=Chọn khóa học&&";
}else{
    $k = "";
}

if($created == ""){
    $cr = "cr=Chọn ngày bắt đầu&&";
}else{
    $cr = "";
}

if($session == "0"){
    $s = "s=Chọn ca học&&";
}else{
    $s = "";
}

if($room == "0"){
    $r = "r=Chọn phòng học&&";
}else{
    $r = "";
}

if($teacher == "0"){
    $t = "t=Chọn giáo viên&&";
}else{
    $t = "";
}

if($solan == "0"){
    $th = "th=Chọn thứ trong tuần";
}else{
    $th = "";
}


if($c !="" || $k != "" || $cr !="" || $s !="" || $r !="" || $t !="" || $th !=""){
    header('location: '.$ADMIN_URL.'thoikhoabieu/add.php?'.$c.$k.$cr.$s.$r.$t.$th);
    die;
}


// kiem tra xem ten co bi trong hay khong
// if($name == ""){
// 	header('location: '. $ADMIN_URL .'lop/add.php?errName=Vui lòng không để trống tên lớp học');
// 	die;
// }
// Kiem tra ten co bi trung hay khong
// $sql = "select * from classes where name = '$name'";
// $rs = getSimpleQuery($sql);
// if($rs != false){
// 	header('location: '. $ADMIN_URL .'lop/add.php?errName=Tên lớp học đã tồn tại, vui lòng chọn tên khác');
// 	die;
// }


// $sql = $conn->prepare("insert into classes (name , course_id , created_at) values (?, ?,?)");
// $data = array($name,$des, $created);
// $sql->execute($data);

// $sql = "select * from classes order by id desc";
// $rs = getSimpleQuery($sql);

//  Lưu thời khóa biểu
			$ngay = $created;
            $sl = $sotiet;

            $chuoi = explode("-",$ngay);
            $year = $chuoi[0];
            $month = $chuoi[1];
            $day = $chuoi[2];
            $jd = cal_to_jd(CAL_GREGORIAN,$month,$day,$year);
            $day1 = jddayofweek($jd,0);
            $check[0];

            $l = 1;
            $n = 1;
            for($i = 0; $i<$sl; $i++){
                $date = date_create($ngay);

                if($n == 1){
					date_modify($date,"+".(($check[0]-$day1) >= 0 ? ($check[0]-$day1) : 7 + ($check[0]-$day1))." days");
                    $n = 2;
                }else{

                        if($solan == 1){
                                date_modify($date,"+7 days");
                        }else if($solan == 2){
                            if($l == 1){
                                date_modify($date,"+".($check[1]-$check[0])." days");
                                $l = 2;
                            }else{
                                date_modify($date,"+".(7-($check[1]-$check[0]))." days");
                                $l = 1;
                            }
                        }else if($solan == 3){
                            if($l == 1){
                                date_modify($date,"+".($check[1]-$check[0])." days");
                                $l = 2;
                            }else if($l == 2){
                                date_modify($date,"+".($check[2]-$check[1])." days");
                                $l = 3;
                            }else{
                                date_modify($date,"+".(7-(($check[1]-$check[0])+($check[2]-$check[1])))." days");
                                $l = 1;
                            }
                        }else if($solan == 4){
                            if($l == 1){
                                date_modify($date,"+".($check[1]-$check[0])." days");
                                $l = 2;
                            }else if($l == 2){
                                date_modify($date,"+".($check[2]-$check[1])." days");
                                $l = 3;
                            }else if($l == 3){
                                date_modify($date,"+".($check[3]-$check[2])." days");
                                $l = 4;
                            }else{
                                date_modify($date,"+".(7-(($check[1]-$check[0])+($check[2]-$check[1])+($check[3]-$check[2])))." days");
                                $l = 1;
                            }
                        }else if($solan == 5){
                            if($l == 1){
                                date_modify($date,"+".($check[1]-$check[0])." days");
                                $l = 2;
                            }else if($l == 2){
                                date_modify($date,"+".($check[2]-$check[1])." days");
                                $l = 3;
                            }else if($l == 3){
                                date_modify($date,"+".($check[3]-$check[2])." days");
                                $l = 4;
                            }else if($l == 4){
                                date_modify($date,"+".($check[4]-$check[3])." days");
                                $l = 5;
                            }else{
                                date_modify($date,"+".(7-(($check[1]-$check[0])+($check[2]-$check[1])+($check[3]-$check[2])+($check[4]-$check[3])))." days");
                                $l = 1;
                            }
                        }else if($solan == 6){
                            if($l == 1){
                                date_modify($date,"+".($check[1]-$check[0])." days");
                                $l = 2;
                            }else if($l == 2){
                                date_modify($date,"+".($check[2]-$check[1])." days");
                                $l = 3;
                            }else if($l == 3){
                                date_modify($date,"+".($check[3]-$check[2])." days");
                                $l = 4;
                            }else if($l == 4){
                                date_modify($date,"+".($check[4]-$check[3])." days");
                                $l = 5;
                            }else if($l == 5){
                                date_modify($date,"+".($check[5]-$check[4])." days");
                                $l = 6;
                            }else{
                                date_modify($date,"+".(7-(($check[1]-$check[0])+($check[2]-$check[1])+($check[3]-$check[2])+($check[4]-$check[3])+($check[5]-$check[4])))." days");
                                $l = 1;
                            }
                        }else{
                            date_modify($date,"+1 days");
                        }
                }


                echo $name = date_format($date,"Y-m-d");
                $chuoi = explode("-",$name);
                $year = $chuoi[0];
                $month = $chuoi[1];
                $day = $chuoi[2];
                $jd = cal_to_jd(CAL_GREGORIAN,$month,$day,$year);
                $day1 = jddayofweek($jd,0);

                switch($day1){
                    case 1:
                    $thu = "thu 2";
                    break;
                    case 2:
                    $thu = "thu 3";
                    break;
                    case 3:
                    $thu = "thu 4";
                    break;
                    case 4:
                    $thu = "thu 5";
                    break;
                    case 5:
                    $thu = "thu 6";
                    break;
                    case 6:
                    $thu = "thu 7";
                    break;
                    default:
                    $thu = "cn";
                }
                echo $thu."<br>";
				$ngay = $name;
                
                if(isset($_POST['ended'])){
                    if($ngay < $_POST['ended']){
                        $sql = $conn->prepare("insert into timetable values ('', ?, ?,?,?,?,?)");
                        $data = array($name,$course,$class,$room,$teacher,$session);
                        $sql->execute($data);

                        echo  $class;
                        $listStuQuery = "SELECT * FROM dangky INNER join student on dangky.student_id = student.id where class_id = '$class' and status = 1 ";
                        $stu = getSimpleQuery($listStuQuery,true);

                        foreach($stu as $row){
                            $student_id = $row['student_id']." <br>";
                            $sql = $conn->prepare("insert into student_check values ('', '$student_id', '','$name','','$class','-1')");
                            $sql->execute();
                        }
                    }
                }else{
				
                    $sql = $conn->prepare("insert into timetable values ('', ?, ?,?,?,?,?)");
                    $data = array($name,$course,$class,$room,$teacher,$session);
                    $sql->execute($data);
                    
                    echo  $class;
                    $listStuQuery = "SELECT * FROM dangky INNER join student on dangky.student_id = student.id where class_id = '$class' and status = 1 ";
                    $stu = getSimpleQuery($listStuQuery,true);

                    foreach($stu as $row){
                        $student_id = $row['student_id']." <br>";
                        $sql = $conn->prepare("insert into student_check values ('', '$student_id', '','$name','','$class','-1')");
                        $sql->execute();
                    }
                }
			}

			$sql = "select * from timetable order by id desc";
			$rs = getSimpleQuery($sql);
			echo $ended = $rs['day'];

			$sql = $conn->prepare("update classes set created_at = '$created' , ended_at = '$ended' where id = '$class'");
			$data = array();
			$sql->execute($data);

// Kết thúc lưu thời khóa biểu

header('location: '. $ADMIN_URL . 'index.php?p=thoikhoabieu');
die;
 ?>
 