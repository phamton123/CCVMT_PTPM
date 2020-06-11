<?php 
$path = "../";
require_once $path.$path.'commons/utils.php';
$cateId = $_GET['id'];
$sql = "select * from rooms where id = $cateId";
$cate = getSimpleQuery($sql);
if(!$cate){
  header('location: ' . $ADMIN_URL . 'phong');
  die;
}
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>POLY | Dashboard</title>
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
        Dashboard
        <small>Sửa phòng</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Sửa phòng</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <form action="<?= $ADMIN_URL  ?>phong/save-edit.php" method="post">
        <input type="hidden" name="id" value="<?= $cate['id'] ?>">
        <div class="col-md-6">
          <div class="form-group">
            <label>Tên phòng</label>
            <input type="text" name="name" 
              value="<?= $cate['name'] ?>" 
              class="form-control">
            <?php 
              if(isset($_GET['errName'])){
                ?>
                <span class="text-danger"><?= $_GET['errName'] ?></span>
                <?php
              }
             ?>
          </div>

          <div class="form-group">
            <label>Mô tả</label>
            <textarea rows="5" class="form-control" name="des"><?= $cate['des'] ?></textarea>
          </div>

          <div class="text-right">
            <a href="<?= $ADMIN_URL ?>phong" class="btn btn-danger btn-xs">Huỷ</a>
            <button type="submit" class="btn btn-xs btn-primary">Sửa</button>
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