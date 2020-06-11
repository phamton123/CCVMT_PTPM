<?php 
    $path = "../";
    require_once $path.$path.'commons/utils.php';
    $id = $_GET['id'];

    $listLessQuery = "select * from lesson where id= $id";
    $cates = getSimpleQuery($listLessQuery);
    $course_id = $cates['course_id'];
    
    $listRoomQuery = "select * from courses where id= $course_id";
    $cour = getSimpleQuery($listRoomQuery);
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>POLY | Danh mục</title>
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
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Danh sách môn học</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      
            <div class="row">
                <div class="col-xs-12">
                <div class="box">
                <div class="box-header">
              <h3 class="box-title">Sửa bài giảng</h3>

            <!-- /.box-header -->
            <div class="box-body">
            <form action="<?= $ADMIN_URL ?>khoahoc/editsave.php" method="post"  enctype="multipart/form-data">
        <div class="col-md-6">
          <div class="form-group">
            <label>Tên bài giảng</label>
            <input type="text" name="name" class="form-control" value="<?php echo $cates['name']; ?>">
            <?php 
              if(isset($_GET['n'])){
                ?>
                <span class="text-danger"><?= $_GET['n'] ?></span>
                <?php
              }
             ?>
          </div>

          <div class="form-group">
            <label>Khóa học</label>
            <select class="form-control" id="course_id" name="course_id" disabled>
                  <option value="<?php echo $cour['id']; ?>"><?php echo $cour['name']; ?></option>
              </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                  <label for="">Chọn file</label>
                  <input type="file" class="form-control" name="chitiet" id="">
            </div>
            <?php 
              if(isset($_GET['i'])){
                ?>
                <span class="text-danger"><?= $_GET['i'] ?></span>
                <?php
              }
             ?>
             <p style="font-size:25px; margin-top:20px;"><a href="<?= SITE_URL.$cates['chitiet']; ?>"><i class="fa fa-file-o" style="font-size:30px;"></i> <?= end(explode('/',$cates['chitiet'])); ?></a></p>
        </div>
        <div class="col-md-12">
          <div>
          <input type="hidden" name="id" value="<?= $_GET['id']; ?>">
          <input type="hidden" name="old" value="<?= $cates['chitiet']; ?>">
          <input type="hidden" name="course_id" value="<?= $course_id ?>">
            <a href="<?= $ADMIN_URL?>baitap" class="btn btn-danger btn-xs">Huỷ</a>
            <button type="submit" class="btn btn-xs btn-primary">Tạo mới</button>
          </div>
        </div>

        </div>
      </form>
        </div>
            <!-- /.box-body -->
        </div>
        </div>
        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  <?php include_once $path.'_share/footer.php'; ?>
</div>
<!-- ./wrapper -->

<?php include_once $path.'_share/script_assets.php'; ?>
<script type="text/javascript">
$(document).ready(function(){
    $('[name="des"]').wysihtml5();
  });
    <?php 
      if(isset($_GET['success']) && $_GET['success'] == true){
    ?> 
       swal('Tạo mới môn học thành công!');
    <?php }else if(isset($_GET['editsuccess']) && $_GET['editsuccess'] == true){ ?>
      swal('Sửa môn học thành công!');
    <?php }?>
    $('.btn-remove').on('click',function(){
      swal({
      title: "Cảnh báo!",
      text: "Bạn có chắc chắn muốn xoá môn học này ?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        window.location.href = $(this).attr('linkurl');
      }
      });
    })
</script>
</body>
</html>