<?php 
    $path = "../";
    require_once $path.$path.'commons/utils.php';
    $listRoomQuery = "select * from courses";
    $cates = getSimpleQuery($listRoomQuery,true);

     $listClassQuery = "select * from classes";
     $classes = getSimpleQuery($listClassQuery,true);

    // $listTeacherQuery = "select * from teachers";
    // $teacher = getSimpleQuery($listClassQuery,true);
    // $infoClass = "SELECT c.*, t.*
    // FROM classes as c, teachers as t
    // WHERE c.teacher_id = t.id";
    // $classes = getSimpleQuery($infoClass,true);
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
        <li class="active">Thêm học viên</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      
            <div class="row">
                <div class="col-xs-12">
                <div class="box">
                <div class="box-header">
              <h3 class="box-title">Thêm học viên</h3>

            <!-- /.box-header -->
            <div class="box-body">
            <form action="<?= $ADMIN_URL ?>hocvien/save-add.php" method="post" enctype="multipart/form-data">
        <div class="row">
                 <div class="col-md-6">
                 <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" class="form-control">
            <?php 
              if(isset($_GET['e'])){
                ?>
                <span class="text-danger"><?= $_GET['e'] ?></span>
                <?php
              }
             ?>
          </div>
          <div class="form-group">
            <label>Tên đầy đủ</label>
            <input type="text" name="fullname" class="form-control">
            <?php 
              if(isset($_GET['n'])){
                ?>
                <span class="text-danger"><?= $_GET['n'] ?></span>
                <?php
              }
             ?>
          </div>
          <div class="form-group">
            <label for="">Khóa học</label>
            <select class="form-control" name="course_id" id="course_id">
              <option value="0">--Chọn khóa học--</option>
              <?php foreach($cates as $row){ ?>
                <option value="<?= $row['id']; ?>"><?= $row['name']; ?></option>
              <?php }?>
            </select>
            <?php 
              if(isset($_GET['k'])){
                ?>
                <span class="text-danger"><?= $_GET['k'] ?></span>
                <?php
              }
             ?>
          </div>

          <div class="form-group">
            <label for="">Lớp học</label>
            <select class="form-control" name="class_id" id="class_id">
              <option value="0">--Chọn lớp học--</option>
              <?php  foreach($classes as $row){ ?>
                <option value="<?= $row['id']; ?>"><?= $row['name'];?></option>
              <?php }?>
            </select>
            <?php 
              if(isset($_GET['c'])){
                ?>
                <span class="text-danger"><?= $_GET['c'] ?></span>
                <?php
              }
             ?>
          </div>
          </div>
                <div class="col-md-6">
                  <div class="form-group">
                      <label for="">Số điện thoại</label>
                      <input type="text" class="form-control" name="phone">
                  </div>
                  <?php  
                          if(isset($_GET['ph'])){
                      ?>
                          <span class="text-danger"><?= $_GET['ph']; ?></span>
                      <?php        
                          }
                      ?>
                  <div class="form-group">
                    <label>Mật khẩu</label>
                    <input type="password" name="password" class="form-control">
                    <?php 
                      if(isset($_GET['p'])){
                        ?>
                        <span class="text-danger"><?= $_GET['p'] ?></span>
                        <?php
                      }
                    ?>
                  </div>
                    <div class="form-group">
                      <label>Xác nhận mật khẩu</label>
                      <input type="password" name="cfpassword" class="form-control">
                      <?php 
                        if(isset($_GET['cp'])){
                          ?>
                          <span class="text-danger"><?= $_GET['cp'] ?></span>
                          <?php
                        }
                      ?>
                    </div>
                  </div>
                  <!-- <input type="hidden" name="teacher_id" class="form-control"> -->
                </div>
                <div>
                    <a name="<?= $ADMIN_URL ?>hocvien" id="" class="btn btn-danger btn-xs" href="#" role="button">Hủy</a>
                    <button type="submit" name="" class="btn btn-xs btn-primary">Tạo mới</button>
                </div>
                
        </form>

      <script type="text/javascript">
            $(document).ready(function(){
              $('#course_id').change(function(){
                                var course = $('#course_id').val();
                                $.ajax({
                                    url:"../baitap/xulysubject.php",
                                    method:"post",
                                    data: {
                                      course:course},
                                    dataType:"text",
                                    success: function(kq){
                                        $('#class_id').html(kq);
                                    }
                                  }); 
                })
            });
          </script>
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