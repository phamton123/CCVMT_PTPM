<?php  
    $path = "../";
    require_once $path.$path.'commons/utils.php';
      $output = '';   
      $course = $_POST['id'];
      $listRoomQuery = "select * from classes where course_id = $course";
      $cates = getSimpleQuery($listRoomQuery,true);
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">
           <tr>  
                   <th width="30%">ID</td>  
                   <th width="70%">Tên lớp</td>  
           </tr>  ';  
      foreach($cates as $row)
      {  
           $output .= ' 
                <tr>  
                     <td width="30%">'.$row["id"].'</td>  
                     <td width="70%">'.$row["name"].'</td>  
                </tr>   
           ';  
      }  
      $output .= '  
           </table>  
      </div>  
      ';  
      echo $output;  
 ?>