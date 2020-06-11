<?php  
    $path = "../";
    require_once $path.$path.'commons/utils.php';
      $output = '';   
      $course = $_GET['id'];
      $listRoomQuery = "SELECT * FROM classes join dangky on classes.id = dangky.class_id join student on dangky.student_id = student.id where status = 1 and class_id = $course";
      $cates = getSimpleQuery($listRoomQuery,true);
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">
           <tr>  
                   <th width="10%">MaHV</td>  
                   <th width="30%">Tên Học Viên</td>  
                   <th width="20%">Email</td> 
                   <th width="20%">Địa chỉ</td>  
                   <th width="20%">Số điện thoại</td> 
           </tr>  ';  
      foreach($cates as $row)
      {  
           $output .= ' 
                <tr>  
                     <td width="10%">'.$row["student_id"].'</td>  
                     <td width="30%">'.$row["fullname"].'</td>  
                     <td width="20%">'.$row["email"].'</td>  
                     <td width="70%">'.$row["address"].'</td>  
                     <td width="20%">'.$row["phone"].'</td> 
                </tr>   
           ';  
      }  
      $output .= '  
           </table>  
      </div>  
      ';  
     $listCourQuery = "select * from classes where id = $course";
     $cour = getSimpleQuery($listCourQuery);
     $courname = $cour['name'];
     header('Content-Type: application/xls');
     header('Content-Disposition: attachment; filename=lop'.$courname.'.xls');
     echo $output;
 ?>