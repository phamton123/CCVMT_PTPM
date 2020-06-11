<?php 
$path = "../";
require_once $path.$path.'commons/utils.php';
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>POLY | Thêm tài khoản</title>
  <?php include_once $path.'_share/style_assets.php'; ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <?php include_once $path.'_share/header.php'; ?>
  
  <?php include_once $path.'_share/sidebar.php'; ?>
  
   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Thêm tài khoản
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
     <!-- Main content -->
    <section class="content">
      <form action="<?= $ADMIN_URL ?>_share/save_pass.php" method="post">
        <div class="col-md-6">
          <div class="form-group">
            <label>Mật khẩu cũ</label>
            <input type="password" name="old_pass" class="form-control">
            <?php 
              if(isset($_GET['msg'])){
                ?>
                <span class="text-danger"><?= $_GET['msg'] ?></span>
                <?php
              }
             ?>
          </div>
          <div class="form-group">
            <label>Mật khẩu mới</label>
            <input type="password" name="new_pass" class="form-control">
            <?php 
              if(isset($_GET['mkm1'])){
                ?>
                <span class="text-danger"><?= $_GET['mkm1'] ?></span>
                <?php
              }
             ?>
          </div>
          <div class="form-group">
            <label>Xác nhận mật khẩu</label>
            <input type="password" name="re_new_pass" class="form-control">
            <?php 
              if(isset($_GET['mkm'])){
                ?>
                <span class="text-danger"><?= $_GET['mkm'] ?></span>
                <?php
              }
             ?>
          </div>
          
          <div>
            <button type="submit" class="btn btn-xs btn-primary">Đối mật khẩu</button>
          </div>
         </div>
      </form>
     </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  <?php include_once $path.'_share/footer.php'; ?>
</div>
<!-- ./wrapper -->
 <?php include_once $path.'_share/script_assets.php'; ?>
</body>
</html>