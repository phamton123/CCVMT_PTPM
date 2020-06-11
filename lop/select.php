<?php  
    $path = "../";
    require_once $path.$path.'commons/utils.php';
      $output = '';   
      $course = $_POST['id'];

      $listRoomQuery = "SELECT * FROM classes join dangky on classes.id = dangky.class_id join student on dangky.student_id = student.id where status = 1 and class_id = $course";
      $cates = getSimpleQuery($listRoomQuery,true);

      $cl = "SELECT * FROM classes where id = $course";
      $cla = getSimpleQuery($cl);
      $output .= '  
      <h3 style="margin-top:10px;">Lớp '.$cla['name'].'</h3>
      <form method="POST" action="excelUpload.php" enctype="multipart/form-data">
      <h4>Import file exel</h4>
      <div class="row">
		<div class="form-group col-md-6">
			<input type="file" name="file" class="form-control">
		</div>
          <div class="form-group col-md-6">
               <input type="hidden" name="class_id" value="'.$course.'">
               
			<button type="submit" name="Submit" class="btn btn-success">Upload</button>
          </div>
     </div>
	</form>
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
           <a name="" id="" class="btn btn-success" href="excel.php?id='.$course.'" role="button">Xuất Excel</a>
      </div>  
      ';  
      echo $output;  
 ?>