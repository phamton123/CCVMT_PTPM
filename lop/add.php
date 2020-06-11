<?php 
$path = "../";
require_once $path.$path.'commons/utils.php';

$listCateQuery =   "select *
                    from courses";
$cates = getSimpleQuery($listCateQuery,true);

$listClassQuery = "select * from classes";
$class = getSimpleQuery($listClassQuery,true);


$listRoomQuery = "select * from rooms";
$room = getSimpleQuery($listRoomQuery,true);


$listSessionQuery = "select * from session";
$session = getSimpleQuery($listSessionQuery,true);


$listTeaQuery = "select * from teachers";
$teacher = getSimpleQuery($listTeaQuery,true);


$listSubQuery = "select * from subject";
$subject = getSimpleQuery($listSubQuery,true);
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>POLY | Thêm phòng</title>
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
        Thêm lớp học
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Thêm lớp học</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <form action="<?= $ADMIN_URL ?>lop/save-add.php" method="post">
      <div class="box">
        <div class="box-header">
                <h3 class="box-title">Thêm lớp học</h3>
        </div>
              <!-- /.box-header -->
        <div class="box-body">
        <div class="col-md-12">
          <div class="form-group">
            <label>Tên lớp học</label>
            <input type="text" name="name" class="form-control">
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
            <select class="form-control" name="course_id" id="course_id">
                <option value="0">--Chọn khóa học--</option>
                <?php foreach($cates as $row){ ?>
                    <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
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
          <div class="form-group">
            <label>Giáo Viên</label>
            <select class="form-control" name="teacher_id" id="teacher_id">
                <option value="0">--Chọn Giáo Viên--</option>
                <?php foreach($teacher as $row){ ?>
                    <option value="<?php echo $row['id']; ?>"><?php echo $row['fullname']; ?></option>
                <?php } ?>
            </select>
            <?php 
              if(isset($_GET['t'])){
                ?>
                <span class="text-danger"><?= $_GET['t'] ?></span>
                <?php
              }
             ?>
          </div>

          <!-- <div class="form-group">
            <label>Ngày bắt đầu</label>
            <input type="date" name="created" class="form-control" id="date">
          </div>

          <div class="form-group">
            <label>Ngày kết thúc</label>
            <input type="date" name="ended" class="form-control" id="date">
          </div>-->
          <div>
              <a href="<?= $ADMIN_URL?>lop" class="btn btn-danger btn-xs">Huỷ</a>
              <button type="submit" class="btn btn-xs btn-primary">Tạo mới</button>
          </div>
        </div> 
        </div>
            <!-- /.box-body -->
      </div>

      <script type="text/javascript">
            $(document).ready(function(){
              $('#session_id').change(function(){
                                var date = $('#date').val();
                                var lop = $('#class_id').val();
                                var session = $('#session_id').val();
                                // var subject = $('#subject_id').val();
                                $.ajax({
                                    url:"xulyroom.php",
                                    method:"post",
                                    data: {date:date,
                                      lop:lop,
                                      session:session,
                                      // subject:subject
                                      },
                                    dataType:"text",
                                    success: function(kq){
                                        $('#room_id').html(kq);
                                    }
                                  }); 
                })

                $('#course_id').change(function(){
                                var course = $('#course_id').val();
                                $.ajax({
                                    url:"xulycourse.php",
                                    method:"post",
                                    data: {
                                      course:course},
                                    dataType:"text",
                                    success: function(kq){
                                        $('#soTiet').val(kq);
                                    }
                                  }); 
                })


                $('#room_id').change(function(){
                                var date = $('#date').val();
                                var lop = $('#class_id').val();
                                var session = $('#session_id').val();
                                // var subject = $('#subject_id').val();
                                var room = $('#room_id').val();
                                $.ajax({
                                    url:"xulyteacher.php",
                                    method:"post",
                                    data: {date:date,
                                      lop:lop,
                                      session:session,
                                      // subject:subject,
                                      room:room},
                                    dataType:"text",
                                    success: function(kq){
                                      alert(kq);
                                        $('#teacher_id').html(kq);
                                    }
                                  }); 
                })
            });
          </script>
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