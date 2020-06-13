<?php  
    $path = "../";
    require_once $path.$path.'commons/utils.php';
      $output = '';   
      $course = $_POST['id'];
      $listRoomQuery = "select * from feedback_details inner join student on feedback_details.student_id = student.id where feedback_id = $course";
      $cates = getSimpleQuery($listRoomQuery,true);
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">
           <tr>  
                   <th width="5%">MãSV</td>  
                   <th width="30%">Tên học sinh</td>  
                   <th width="45%">Nội dung</td> 
                   <th width="20%">Ngày</td> 
           </tr>  ';  
      foreach($cates as $row)
      {  
           $output .= ' 
                <tr>  
                     <td width="5%">'.$row["student_id"].'</td> 
                     <td width="30%">'.$row["fullname"].'</td>  
                     <td width="45%">'.$row["des"].'</td>  
                     <td width="20%">'.$row["created_at"].'</td>  
                </tr>   
           ';  
      }  
      $output .= '  
           </table>  
      </div>  
      ';  
      echo $output;  
 ?>