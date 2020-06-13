<?php 
$path = "../";
require_once $path.$path.'commons/utils.php';
$record_per_page = 8;  
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
   <th style='width: 10px'>#</th>
   <th>Email</th>
   <th>Tên học viên</th>
   <th>Địa chỉ</th>
   <th>Số điện thoại</th>
   <th style='width: 110px'>
                    <a href='hocvien/add.php'
                      class='btn btn-xs btn-success'
                      ><i class='fa fa-plus'></i>
                      Thêm
                    </a>
                  </th>
                  </tr>
 ";  
 foreach($users as $u){
    $output .= '  
    <tr>  
         <td>'.$u['id'].'</td>  
         <td>'.$u['email'].'</td>  
         <td>'.$u['fullname'].'</td>
         <td>'.$u['address'].'</td>
         <td>'.$u['phone'].'</td>
         <td>
                      <a href="'.$ADMIN_URL.'hocvien/edit.php?id='.$u['id'].'"
                      class="btn btn-xs btn-primary"
                      > <i class="fa fa-cog"></i>
                        Sửa
                      </a>
                      <a href="'.$ADMIN_URL.'hocvien/remove.php?id='.$u['id'].'"
                      class="btn btn-xs btn-danger btn-Student"
                      > <i class="fa fa-trash-o"></i>
                        Xoá
                      </a>
                    </td>
    </tr>  
';  
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
?>