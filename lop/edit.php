<?php 
$path = "../";
require_once $path.$path.'commons/utils.php';
$cateId = $_GET['id'];
$sql = "select * from classes where id = $cateId";
$cate = getSimpleQuery($sql);
if(!$cate){
  header('location: ' . $ADMIN_URL . 'lop');
  die;
}

$listCateQuery =   "select *
                    from courses";
$cates = getSimpleQuery($listCateQuery,true);
$cate_id = $cate['course_id'];
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
        <small>Sửa lớp học</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Sửa lớp học</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <form action="<?= $ADMIN_URL  ?>lop/save-edit.php" method="post">
        <input type="hidden" name="id" value="<?= $cate['id'] ?>">
        <div class="col-md-6">
          <div class="form-group">
            <label>Tên lớp học</label>
            <input type="text" name="name" value="<?= $cate['name'] ?>" class="form-control">
            <?php 
              if(isset($_GET['errName'])){
                ?>
                <span class="text-danger"><?= $_GET['errName'] ?></span>
                <?php
              }
             ?>
          </div>

          <div class="form-group">
            <label>Khóa học</label>
            <select class="form-control" id="exampleFormControlSelect1" name="course_id">
                                                <?php foreach($cates as $row){ ?>
                                                    <option  
                                                        <?php if ($row['id'] === $cate_id): ?>
                                                            selected
                                                        <?php endif ?>
                                                    value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                                                <?php } ?>
                                                </select>
          </div>

          <div class="text-right">
            <a href="<?= $ADMIN_URL ?>khoahoc" class="btn btn-danger btn-xs">Huỷ</a>
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