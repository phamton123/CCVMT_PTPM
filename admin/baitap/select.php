<?php  
    $path = "../";
    require_once $path.$path.'commons/utils.php';
      $output = '';   
      $course = $_POST['id'];
      $listRoomQuery = "select * from baikiemtra where id = $course";
      $cates = getSimpleQuery($listRoomQuery);
      $output .= '  
      <h3 class="mt-0">Đề bài:</h3>
      <p>'.$cates['name'].'</p>
      <h3>Nội dung:</h3>
      <p>'.$cates['chitiet'].'</p>
      ';  
      echo $output;  
 ?>