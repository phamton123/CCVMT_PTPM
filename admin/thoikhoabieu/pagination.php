<?php 
$path = "../";
require_once $path.$path.'commons/utils.php';
$record_per_page = 10;  
 $page = '';  
 $output = '';  
 if(isset($_POST["page"]))  
 {  
      $page = $_POST["page"];  
 }  
 else  
 {  
      $page = 1;  
 }  
 $start_from = ($page - 1)*$record_per_page;  
 $sql = $_POST['sql']." LIMIT $start_from, $record_per_page";
 $users = getSimpleQuery($sql, true);
 $output .= "  
 <table class='table table-bordered'>
 <tbody>
 <tr>
   <th>Ngày</th>
   <th>Khóa học</th>
   <th>Lớp học</th>
   <th>Phòng học</th>
   <th>Giáo viên</th>
   <th>Ca học</th>"?>
   <?php if($_SESSION['login']['role']==500 || $_SESSION['login']['role']==1){
   $output .= "<th style='width: 190px'>
   Điểm danh & Nhập điểm
                  </th>
 "; }
 $output .= "<th style='width: 110px'>
                  Chức năng
                  </th>
                  </tr>
 ";
 foreach($users as $u){
    $output .= '  
    <tr>  
         <td>'.tinhthu($u['day']).", ".$u['day'].'</td>  
         <td>'?> <?php $class =  $u['course_id'];
         $listQuery = "select * from courses where id = $class";
                      $c= getSimpleQuery($listQuery);
                      $output .= $c['name'].'</td>  
         <td>'?> <?php $class =  $u['class_id'];
         $listQuery = "select * from classes where id = $class";
                      $c= getSimpleQuery($listQuery);
                      $output .= $c['name'].'</td>
         <td>'?> <?php $class =  $u['room_id'];
         $listQuery = "select * from rooms where id = $class";
                      $c= getSimpleQuery($listQuery);
                      $output .= $c['name'].'</td>
         <td>'?> <?php $class =  $u['teacher_id'];
         $listQuery = "select * from teachers where id = $class";
                      $c= getSimpleQuery($listQuery);
                      $output .= $c['fullname'].'</td>
         <td>'?> <?php $class =  $u['session_id'];
         $listQuery = "select * from session where id = $class";
                      $c= getSimpleQuery($listQuery);
                      $output .= $c['name'].'</td>'?>
        <?php if($_SESSION['login']['role']==500 || $_SESSION['login']['role']==1){
                      $output .= '<td>';?>
         <?php if($_SESSION['login']['role']==500){
                  $output .= '<a href="'.$ADMIN_URL.'lop/check.php?class_id='.$u['class_id'].'&&day='.$u['day'].'"
                      class="btn btn-xs btn-link"
                      ><i class="fa fa-check-square-o"></i> Điểm danh</a>
                      <a href="'.$ADMIN_URL.'lop/mark.php?id='.$u['class_id'].'"
                      class="btn btn-xs btn-link"
                      >
                      <i class="fa fa-pencil-square-o"></i>  Nhập điểm
                      </a>'; }else{
                        $output .= '<button disabled type="button" name="" id="" class="btn btn-xs btn-link"><i class="fa fa-check"></i> Điểm danh</button>
                        <button disabled type="button" name="" id="" class="btn btn-xs btn-link"><i class="fa fa-pencil-square-o"></i> Điểm danh</button>';
                      } ?>
                <?php $output .= '</td>'; }
                $output .= '<td><a href="'.$ADMIN_URL.'thoikhoabieu/edit1.php?id='.$u['id'].'"
                class="btn btn-xs btn-primary"
                ><i class="fa fa-check-square-o"></i> Sửa</a>
                <a href="'.$ADMIN_URL.'thoikhoabieu/xoa.php?id='.$u['id'].'"
                class="btn btn-xs btn-danger btn-remove"
                >
                <i class="fa fa-pencil-square-o"></i>  Xóa
                </a></td>';
                 $output .= '</tr>';  
 }
 $sql = $_POST['sql'];
 $users = getSimpleQuery($sql, true);
count($users);
 $total_pages = ceil(count($users)/$record_per_page);  
 
 echo $output;  
echo '<tr><td colspan ="7">';
 if($page != 1){
    echo "<span class='pagination_link' style='border-radius:2px; cursor:pointer; margin:2px; padding-top:6px; padding-bottom:6px; padding-left:12px; border-radius:2px; padding-right:12px; border:1px solid #ccc;' id='".($page-1)."'>Previous</span>";  
}
 for($i=1; $i<=$total_pages; $i++)  
 {  
    if($i== $page){
        echo "<span class='pagination_link' style='color:white; background:#3c8dbc; margin:2px; cursor:pointer; padding-top:6px; padding-bottom:6px; padding-left:12px; border-radius:2px; padding-right:12px; border:1px solid #3c8dbc;' id='".$i."'>".$i."</span>";
    }else{
        echo "<span class='pagination_link' style=' cursor:pointer; padding-top:6px; padding-bottom:6px; padding-left:12px; border-radius:2px; padding-right:12px; margin:2px;  border:1px solid #ccc;' id='".$i."'>".$i."</span>";  
    } 
 }  
 if($page != $total_pages){
    echo "<span class='pagination_link' style='border-radius:2px; margin:2px; cursor:pointer; padding-top:6px; padding-bottom:6px; padding-left:12px; border-radius:2px; padding-right:12px; border:1px solid #ccc;' id='".($page+1)."'>Next</span>";  
}
echo '</tr></td>'; 

function tinhthu($ngay){
    $chuoi = explode("-",$ngay);
    $nam = $chuoi[0];
    $thang = $chuoi[1];
    $ngay = $chuoi[2];


$jd = cal_to_jd(CAL_GREGORIAN,$thang,$ngay,$nam);
$day = jddayofweek($jd,0);
switch($day){
    case 0:
    $thu = "Chủ nhật";
    break;
    case 1:
    $thu = "Thứ hai";
    break;
    case 2:
    $thu = "Thứ ba";
    break;
    case 3:
    $thu = "Thứ tư";
    break;
    case 4:
    $thu = "Thứ năm";
    break;
    case 5:
    $thu = "Thứ sáu";
    break;
    case 6:
    $thu = "Thứ bảy";
    break;
}
return $thu;
}
?>