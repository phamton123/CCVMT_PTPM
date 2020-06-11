<?php 
    $path = "../";
    require_once $path.$path.'commons/utils.php';
    $id = $_GET['id'];
    $listRoomQuery = "select * from orders where id = $id";
    $cates = getSimpleQuery($listRoomQuery);
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
              <h3 class="box-title">Đóng học phí</h3>

            <!-- /.box-header -->
            <div class="box-body">
            <form action="<?= $ADMIN_URL ?>hocphi                                                                                                                                                                                           /save-dong.php" method="post">
        <div class="col-md-6">
          <div class="form-group">
            <label>Tên học viên</label>
            <input type="text" name="name" class="form-control" disabled value="<?php 
            $student = $cates['student_id'];
            $listRoomQuery = "select * from student where id = $student";
            $cate = getSimpleQuery($listRoomQuery);
            echo $cate['fullname'];
            ?>">
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
            <input type="text" name="name" class="form-control" disabled value="<?php $course = $cates['course_id'];
                  $listRoomQuery = "select * from courses where id = $course";
                  $cate = getSimpleQuery($listRoomQuery);
                  echo $cate['name']; ?>">
            <?php 
              if(isset($_GET['errName'])){
                ?>
                <span class="text-danger"><?= $_GET['errName'] ?></span>
                <?php
              }
             ?>
          </div>
        </div>
        <div class="col-md-6">
        <div class="form-group">
            <label>Ngày nộp</label>
            <input type="date" name="created_at" class="form-control" value="">
              </div>
        <div class="form-group">
              <label>Số tiền</label>
            <input type="text" name="soTien" class="form-control">
              </div>
              </div>
        <div class="col-md-12">
          <div class="form-group">
            <label>Ghi chú</label>
            <textarea rows="5" class="form-control" name="des"></textarea>
          </div>

          <div class="text-right">
          <input type="hidden" name="id" class="form-control" value="<?php echo $id ?>">
            <a href="<?= $ADMIN_URL?>baitap" class="btn btn-danger btn-xs">Huỷ</a>
            <button type="submit" class="btn btn-xs btn-primary">Tạo mới</button>
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