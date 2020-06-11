<?php 
// $path = "../";
// require_once $path.'../commons/utils.php';

if ($_SESSION['login']['role']==500) {
  include('admin-thoi-khoa-bieu.php');
} elseif ($_SESSION['login']['role']== 1) {
  include('giaovien-thoi-khoa-bieu.php');
} elseif ($_SESSION['login']['role']== 0) {
  include('hocvien-thoi-khoa-bieu.php');
}
?>