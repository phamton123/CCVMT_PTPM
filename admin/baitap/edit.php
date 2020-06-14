<?php 
    $path = "../";
    require_once $path.$path.'commons/utils.php';
    $id = $_GET['id'];
    $listKTQuery = "select * from baikiemtra where id = $id";
    $kt = getSimpleQuery($listKTQuery);
    $khc = $kt['course_id'];
    $lc = $kt['class_id'];

    $listRoomQuery = "select * from courses";
    $cates = getSimpleQuery($listRoomQuery,true);

    $listClassQuery = "select * from classes";
    $classes = getSimpleQuery($listClassQuery,true);
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
              <h3 class="box-title">Thêm bài tập</h3>

            <!-- /.box-header -->
            <div class="box-body">
            <form action="<?= $ADMIN_URL ?>baitap/save-edit.php" method="post">
        <div class="col-md-6">
          <div class="form-group">
            <label>Tên bài kiểm tra</label>
            <input type="text" name="name" class="form-control" value="<?php echo $kt['name']; ?>">
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
            <select class="form-control" id="course_id" name="course_id">
                  <option value="0">--Chọn khóa học--</option>
                <?php foreach($cates as $row){ ?>
                  <option <?= $khc = $row['id'] ? "selected" : "";  ?> value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                <?php } ?>
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

            <label>Lớp học</label>
            <select class="form-control" id="class_id" name="class_id">
                  <option value="0">--Chọn lớp học--</option>
                <?php foreach($classes as $row){ ?>
                  <option <?= $lc = $row['id'] ? "selected" : "";  ?> value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                <?php } ?>
              </select>
              <?php 
              if(isset($_GET['cl'])){
                ?>
                <span class="text-danger"><?= $_GET['cl'] ?></span>
                <?php
              }
             ?>
              </div>
        <div class="form-group">
            <label>Ngày kiểm tra</label>
            <input type="date" name="day" class="form-control" value="<?php echo $kt['day'] ?>">
            <?php 
              if(isset($_GET['cr'])){
                ?>
                <span class="text-danger"><?= $_GET['cr'] ?></span>
                <?php
              }
             ?>
              </div>
              </div>
        <div class="col-md-12">
          <div class="form-group">
            <label>Nội dung</label>
            <textarea rows="5" class="form-control" name="des"><?php echo $kt['chitiet'] ?></textarea>
            <?php 
              if(isset($_GET['d'])){
                ?>
                <span class="text-danger"><?= $_GET['d'] ?></span>
                <?php
              }
             ?>
          </div>

          <div class="text-right">
          <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
            <a href="<?= $ADMIN_URL?>baitap" class="btn btn-danger btn-xs">Huỷ</a>
            <button type="submit" class="btn btn-xs btn-primary">Tạo mới</button>
          </div>

        </div>
      </form>

      <script type="text/javascript">
            $(document).ready(function(){
              $('#course_id').change(function(){
                                var course = $('#course_id').val();
                                $.ajax({
                                    url:"xulysubject.php",
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